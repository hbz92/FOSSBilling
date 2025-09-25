# Configuration Terraform pour déploiement HestiaCP sur OpenStack
terraform {
  required_version = ">= 1.0"
  required_providers {
    openstack = {
      source  = "terraform-provider-openstack/openstack"
      version = "~> 1.48.0"
    }
  }
}

# Configuration du provider OpenStack
provider "openstack" {
  auth_url    = var.openstack_auth_url
  user_name   = var.openstack_username
  password    = var.openstack_password
  tenant_name = var.openstack_tenant_name
  domain_name = var.openstack_domain_name
  region      = var.openstack_region
}

# Variables
variable "openstack_auth_url" {
  description = "URL d'authentification OpenStack"
  type        = string
}

variable "openstack_username" {
  description = "Nom d'utilisateur OpenStack"
  type        = string
}

variable "openstack_password" {
  description = "Mot de passe OpenStack"
  type        = string
  sensitive   = true
}

variable "openstack_tenant_name" {
  description = "Nom du tenant OpenStack"
  type        = string
}

variable "openstack_domain_name" {
  description = "Nom du domaine OpenStack"
  type        = string
  default     = "default"
}

variable "openstack_region" {
  description = "Région OpenStack"
  type        = string
  default     = "RegionOne"
}

variable "hestiacp_flavor" {
  description = "Flavor OpenStack pour HestiaCP"
  type        = string
  default     = "m1.medium"
}

variable "hestiacp_image" {
  description = "Image de base pour HestiaCP"
  type        = string
  default     = "ubuntu-20.04"
}

variable "hestiacp_keypair" {
  description = "Clé SSH pour HestiaCP"
  type        = string
}

variable "hestiacp_network" {
  description = "Réseau OpenStack pour HestiaCP"
  type        = string
}

variable "hestiacp_subnet" {
  description = "Sous-réseau OpenStack pour HestiaCP"
  type        = string
}

variable "hestiacp_security_group" {
  description = "Groupe de sécurité pour HestiaCP"
  type        = string
  default     = "hestiacp-security-group"
}

variable "hestiacp_server_name" {
  description = "Nom du serveur HestiaCP"
  type        = string
  default     = "hestiacp-auto-"
}

variable "hestiacp_domain" {
  description = "Domaine principal pour HestiaCP"
  type        = string
}

variable "fossbilling_ip" {
  description = "IP du serveur FOSSBilling"
  type        = string
}

# Récupération des données OpenStack
data "openstack_images_image_v2" "hestiacp_image" {
  name        = var.hestiacp_image
  most_recent = true
}

data "openstack_compute_flavor_v2" "hestiacp_flavor" {
  name = var.hestiacp_flavor
}

data "openstack_networking_network_v2" "hestiacp_network" {
  name = var.hestiacp_network
}

data "openstack_networking_subnet_v2" "hestiacp_subnet" {
  name = var.hestiacp_subnet
}

# Groupe de sécurité pour HestiaCP
resource "openstack_networking_secgroup_v2" "hestiacp_security_group" {
  name        = var.hestiacp_security_group
  description = "Groupe de sécurité pour HestiaCP"
}

# Règles de sécurité
resource "openstack_networking_secgroup_rule_v2" "hestiacp_ssh" {
  direction         = "ingress"
  ethertype        = "IPv4"
  protocol         = "tcp"
  port_range_min   = 22
  port_range_max   = 22
  remote_ip_prefix = "0.0.0.0/0"
  security_group_id = openstack_networking_secgroup_v2.hestiacp_security_group.id
}

resource "openstack_networking_secgroup_rule_v2" "hestiacp_http" {
  direction         = "ingress"
  ethertype        = "IPv4"
  protocol         = "tcp"
  port_range_min   = 80
  port_range_max   = 80
  remote_ip_prefix = "0.0.0.0/0"
  security_group_id = openstack_networking_secgroup_v2.hestiacp_security_group.id
}

resource "openstack_networking_secgroup_rule_v2" "hestiacp_https" {
  direction         = "ingress"
  ethertype        = "IPv4"
  protocol         = "tcp"
  port_range_min   = 443
  port_range_max   = 443
  remote_ip_prefix = "0.0.0.0/0"
  security_group_id = openstack_networking_secgroup_v2.hestiacp_security_group.id
}

resource "openstack_networking_secgroup_rule_v2" "hestiacp_hestia" {
  direction         = "ingress"
  ethertype        = "IPv4"
  protocol         = "tcp"
  port_range_min   = 8083
  port_range_max   = 8083
  remote_ip_prefix = "0.0.0.0/0"
  security_group_id = openstack_networking_secgroup_v2.hestiacp_security_group.id
}

# Règle pour FOSSBilling
resource "openstack_networking_secgroup_rule_v2" "hestiacp_fossbilling" {
  direction         = "ingress"
  ethertype        = "IPv4"
  protocol         = "tcp"
  port_range_min   = 8083
  port_range_max   = 8083
  remote_ip_prefix = "${var.fossbilling_ip}/32"
  security_group_id = openstack_networking_secgroup_v2.hestiacp_security_group.id
}

# Instance HestiaCP
resource "openstack_compute_instance_v2" "hestiacp_server" {
  name            = "${var.hestiacp_server_name}${formatdate("YYYYMMDD-hhmmss", timestamp())}"
  image_id        = data.openstack_images_image_v2.hestiacp_image.id
  flavor_id       = data.openstack_compute_flavor_v2.hestiacp_flavor.id
  key_pair        = var.hestiacp_keypair
  security_groups = [openstack_networking_secgroup_v2.hestiacp_security_group.name]

  network {
    name = data.openstack_networking_network_v2.hestiacp_network.name
  }

  user_data = templatefile("${path.module}/user_data.sh", {
    fossbilling_ip = var.fossbilling_ip
    hestiacp_domain = var.hestiacp_domain
  })

  metadata = {
    role = "hestiacp"
    environment = "production"
    managed_by = "terraform"
  }

  lifecycle {
    create_before_destroy = true
  }
}

# IP flottante pour HestiaCP
resource "openstack_networking_floatingip_v2" "hestiacp_floating_ip" {
  pool = "public"
}

# Association de l'IP flottante
resource "openstack_compute_floatingip_associate_v2" "hestiacp_floating_ip" {
  floating_ip = openstack_networking_floatingip_v2.hestiacp_floating_ip.address
  instance_id = openstack_compute_instance_v2.hestiacp_server.id
}

# Outputs
output "hestiacp_server_ip" {
  description = "IP publique du serveur HestiaCP"
  value       = openstack_networking_floatingip_v2.hestiacp_floating_ip.address
}

output "hestiacp_server_id" {
  description = "ID de l'instance HestiaCP"
  value       = openstack_compute_instance_v2.hestiacp_server.id
}

output "hestiacp_server_name" {
  description = "Nom du serveur HestiaCP"
  value       = openstack_compute_instance_v2.hestiacp_server.name
}