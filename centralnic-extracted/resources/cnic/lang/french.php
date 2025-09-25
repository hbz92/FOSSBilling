<?php

// #########################################################################
// #########################################################################
// # Add translations for CNR registrar module additional domain fields    #
// #########################################################################
// #########################################################################

// ----------------------------------------------------------------------
// ------------------ .DK Checkout Page ---------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrdkcheckoutheading"] = "Conditions générales des noms de domaine .dk";
$_LANG["cnrdkcheckoutintro"] = "Pour enregistrer un nom de domaine .dk, vous devez conclure un accord avec Punktum.dk A/S. Punktum dk est l'administrateur de tous les noms de domaine .dk.";
$_LANG["cnrdkcheckoutdomains"] = "Noms de domaine :";
$_LANG["cnrdkcheckoutregistrant"] = "Titulaire :";
$_LANG["cnrdkcheckoutregistrantaddress"] = "Voir ci-dessus";
$_LANG["cnrdkcheckoutadmin"] = "Administrateur du domaine :";
$_LANG["cnrdkcheckoutadminaddress"] = "Punktum dk A/S<br/>Ørestads Boulevard 108, 11e étage<br/>DK-2300 Copenhague S";
$_LANG["cnrdkcheckouttac"] = implode("<br/><br/>", [
    "Je consens par la présente à conclure un contrat sur le droit d'utiliser le nom de domaine .dk spécifié conformément aux conditions applicables. Cela signifie notamment que je veillerai à ce que mes coordonnées en tant que titulaire soient exactes en tout temps. Je procéderai à la vérification de mon identité par Punktum dk A/S sur demande.",
    "Mon droit d'utiliser le nom de domaine .dk spécifié peut être transféré, suspendu, supprimé ou bloqué conformément aux conditions définies dans les conditions d'utilisation de Punktum dk A/S.",
    "Conformément à l'article 18 (2) (13) de la loi danoise sur les contrats de consommation, je renonce au droit de me rétracter du contrat concernant le droit d'utiliser le nom de domaine .dk spécifié.",
    "Je donne mon consentement à Punktum dk A/S, en tant qu'administrateur de domaine, pour utiliser mes données personnelles conformément à sa politique de confidentialité.",
    "Je consens à payer à ce fournisseur les frais pour la première période d'enregistrement du nom de domaine .dk spécifié, et que le paiement des périodes d'enregistrement suivantes dépend de mon choix d'arrangement de gestion, cf. section 2.1 des conditions générales de Punktum dk A/S."
]);
$_LANG["cnrdkcheckouttacurl"] = "https://www.punktum.dk/en/articles/terms-and-conditions-for-the-right-of-use-to-a-dk-domain-name";
$_LANG["cnrdkcheckouttacurltext"] = "Conditions générales pour le droit d'utiliser un nom de domaine .dk";
$_LANG["cnrdkcheckoutpolicyurl"] = "https://www.punktum.dk/en/articles/privacy-policy";
$_LANG["cnrdkcheckoutpolicyurltext"] = "Politique de confidentialité";
$_LANG["cnrdkcheckoutabouturl"] = "https://www.punktum.dk/en/about-us";
$_LANG["cnrdkcheckoutabouturltext"] = "À propos de Punktum dk A/S";
$_LANG["cnrdkcheckouttacagree"] = "Oui, j'accepte l'accord utilisateur avec Punktum dk A/S.";

// ----------------------------------------------------------------------
// ------------------ Common CNR Translations ---------------------------
// ----------------------------------------------------------------------
$_LANG["cnrchoose"] = "Veuillez choisir";
$_LANG["cnroptional"] = "optionnel";
$_LANG["cnr1"] = "Oui";
$_LANG["cnr0"] = "Non";
$_LANG["cnrconsentforpublishing"] = "Titulaire, Consentement pour la Publication";
// .abogado, .aero, .attorney, .bank, .broker, .dentist, .forex, .insurance, .lotto, .law, .lawyer, .markets, .trading
$_LANG["cnrxallocationtoken"] = "Jeton d'allocation du registre";
$_LANG["cnrxallocationtokendescr"] = "Requis uniquement pour les domaines Premium. Émis par le fournisseur de registre. Faites-nous savoir si vous avez besoin d'aide.";
// .app, .page, .dev, .new, .day, .channel, .boo, .foo, .zip, .mov, .nexus, .dad, .phd, .prof, .esq, .rsvp, .meme, .ing, .new
$_LANG["cnrxacceptsslrequirement"] = "Exigences SSL";
$_LANG["cnrxacceptsslrequirementdescr"] = "Je confirme que je comprends et accepte les exigences pour HTTPS / un certificat SSL. Ce TLD est un domaine plus sécurisé, ce qui signifie que HTTPS est requis pour tous les sites Web. Vous pouvez acheter votre nom de domaine maintenant, mais pour qu'il fonctionne correctement dans les navigateurs, vous devez configurer HTTPS basé sur un certificat SSL.";
$_LANG["cnrxacceptsslrequirement0"] = $_LANG["cnr0"];
$_LANG["cnrxacceptsslrequirement1"] = $_LANG["cnr1"];
// .attorney, .dentist, .lawyer
$_LANG["cnrxunitedtldregulatorydata"] = "Informations sur l'organisme de réglementation";
$_LANG["cnrxunitedtldregulatorydatadescr"] = "Extension contenant des informations sur l'autorité d'approbation/l'autorité de contrôle/l'organisme de réglementation";
// .barcelona, .cat, .madrid, .scot, .sport, .swiss
$_LANG["cnrxintendeduse"] = "Utilisation prévue";
$_LANG["cnrxintendedusedescr"] = implode("<br/>", [
    "Déclaration d'utilisation prévue pour le nom de domaine. Le cas échéant, veuillez inclure une référence explicite au droit revendiqué par le demandeur sur le nom (si ce n'est pas le nom commercial du demandeur).",
    "Par exemple, si le nom de domaine correspond à une marque déposée, le numéro de la marque doit être fourni (max. 256 caractères)."
]);
// .mk
$_LANG["cnrxcompanyvatid"] = "Titulaire, Numéro de TVA de l'entreprise";
// $_LANG["cnrxcompanyvatiddescr"] = "";
// .nu, .se
$_LANG["cnrxrequestauthcode"] = "Demander un nouveau code EPP";
$_LANG["cnrxrequestauthcode0"] = $_LANG["cnr0"];
$_LANG["cnrxrequestauthcode1"] = $_LANG["cnr1"];
$_LANG["cnrxrequestauthcodedescr"] = "Si vous souhaitez transférer le domaine vers un autre registrar, vous avez besoin du code d'authentification. Nous l'enverrons à l'adresse e-mail du propriétaire du domaine.";

// NOTE: The following translations are labeled as boilerplate and should
// be used as a template for other languages. English texts are returned
// by default from the CNR Backend System. If you want to override these
// default texts, please consider a language override file in WHMCS using
// the below translation keys.
// We added some translations to override the API defaults which sometimes
// suck.

// ----------------------------------------------------------------------
// ------------------ .AERO Fields --------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxaeroensauthid"] = "ID d'adhésion";
$_LANG["cnrxaeroensauthiddescr"] = "L'ID d'adhésion .AERO est nécessaire pour enregistrer un domaine dans l'aviation. Vous pouvez en faire la demande <a style=\"text-decoration:underline\" href=\"https://information.aero/node/add/request-aero-id\" target=\"_blank\">ici</a>.";
$_LANG["cnrxaeroensauthkey"] = "Mot de passe d'adhésion";
$_LANG["cnrxaeroensauthkeydescr"] = "Le mot de passe/code d'authentification respectif fourni par le site web ci-dessus en même temps que l'ID d'adhésion .AERO.";

// ----------------------------------------------------------------------
// ------------------ .AU Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxaudomainrelation"] = "Relation";
$_LANG["cnrxaudomainrelation1"] = "Le nom de domaine de deuxième niveau est une correspondance exacte, un acronyme ou une abréviation du nom de l'entreprise ou du nom commercial, du nom de l'organisation ou de l'association, ou de la marque déposée.";
$_LANG["cnrxaudomainrelation2"] = "Le nom de domaine de deuxième niveau est étroitement et substantiellement lié à l'organisation ou aux activités entreprises par l'organisation.";
$_LANG["cnrxaudomainrelationdescr"] = "Cela indique la relation entre le type d'éligibilité (par exemple, nom commercial) et le nom de domaine.";
$_LANG["cnrxaudomainrelationtype"] = "Type de Relation";
$_LANG["cnrxaudomainrelationtypecompany"] = "Entreprise";
$_LANG["cnrxaudomainrelationtyperegisteredbusiness"] = "Entreprise enregistrée";
$_LANG["cnrxaudomainrelationtypesoletrader"] = "Entrepreneur individuel";
$_LANG["cnrxaudomainrelationtypepartnership"] = "Partenariat";
$_LANG["cnrxaudomainrelationtypetrademarkowner"] = "Propriétaire de marque";
$_LANG["cnrxaudomainrelationtypependingtmowner"] = "Propriétaire de marque en attente";
$_LANG["cnrxaudomainrelationtypecitizenresident"] = "Citoyen / Résident"; // .id.au only
$_LANG["cnrxaudomainrelationtypeincorporatedassociation"] = "Association incorporée";
$_LANG["cnrxaudomainrelationtypeclub"] = "Club";
$_LANG["cnrxaudomainrelationtypenonprofitorganisation"] = "Organisation à but non lucratif";
$_LANG["cnrxaudomainrelationtypecharity"] = "Charité";
$_LANG["cnrxaudomainrelationtypetradeunion"] = "Syndicat";
$_LANG["cnrxaudomainrelationtypeindustrybody"] = "Organisme de l'industrie";
$_LANG["cnrxaudomainrelationtypecommercialstatutorybody"] = "Organisme statutaire commercial";
$_LANG["cnrxaudomainrelationtypepoliticalparty"] = "Parti politique";
$_LANG["cnrxaudomainrelationtypeother"] = "Autre";
$_LANG["cnrxaudomainrelationtypereligiouschurchgroup"] = "Groupe religieux / Église";
$_LANG["cnrxaudomainrelationtypehighereducationinstitution"] = "Établissement d'enseignement supérieur";
$_LANG["cnrxaudomainrelationtyperesearchorganisation"] = "Organisation de recherche";
$_LANG["cnrxaudomainrelationtypegovernmentschool"] = "École gouvernementale";
$_LANG["cnrxaudomainrelationtypechildcarecentre"] = "Centre de garde d'enfants";
$_LANG["cnrxaudomainrelationtypepreschool"] = "École maternelle";
$_LANG["cnrxaudomainrelationtypenationalbody"] = "Organisme national";
$_LANG["cnrxaudomainrelationtypetrainingorganisation"] = "Organisation de formation";
$_LANG["cnrxaudomainrelationtypenongovernmentschool"] = "École non gouvernementale";
$_LANG["cnrxaudomainrelationtypeunincorporatedassociation"] = "Association non incorporée";
$_LANG["cnrxaudomainrelationtypeindustryorganisation"] = "Organisation de l'industrie";
$_LANG["cnrxaudomainrelationtyperegistrablebody"] = "Organisme enregistrable";
$_LANG["cnrxaudomainrelationtypeindigenouscorporation"] = "Corporation autochtone";
$_LANG["cnrxaudomainrelationtyperegisteredorganisation"] = "Organisation enregistrée";
$_LANG["cnrxaudomainrelationtypetrust"] = "Fiducie";
$_LANG["cnrxaudomainrelationtypeeducationalinstitution"] = "Établissement éducatif";
$_LANG["cnrxaudomainrelationtypecommonwealthentity"] = "Entité du Commonwealth";
$_LANG["cnrxaudomainrelationtypestatutorybody"] = "Organisme statutaire";
$_LANG["cnrxaudomainrelationtypetradingcooperative"] = "Coopérative commerciale";
$_LANG["cnrxaudomainrelationtypecompanylimitedbyguarantee"] = "Société à responsabilité limitée par garantie";
$_LANG["cnrxaudomainrelationtypenondistributingcooperative"] = "Coopérative non distributive";
$_LANG["cnrxaudomainrelationtypenontradingcooperative"] = "Coopérative non commerciale";
$_LANG["cnrxaudomainrelationtypecharitabletrust"] = "Fiducie caritative";
$_LANG["cnrxaudomainrelationtypepublicprivateancillaryfund"] = "Fonds auxiliaire public / privé";
$_LANG["cnrxaudomainrelationtypepeakstateterritorybody"] = "Organisme de pointe de l'État / du Territoire";
$_LANG["cnrxaudomainrelationtypenotforprofitcommunitygroup"] = "Groupe communautaire à but non lucratif";
$_LANG["cnrxaudomainrelationtypeeducationandcareserviceschildcare"] = "Services d'éducation et de garde d'enfants";
$_LANG["cnrxaudomainrelationtypegovernmentbody"] = "Organisme gouvernemental";
$_LANG["cnrxaudomainrelationtypeproviderofnonaccreditedtraining"] = "Fournisseur de formation non accréditée";
$_LANG["cnrxaudomainrelationtypedescr"] = "Précisez ce qui rend le titulaire éligible pour enregistrer le nom de domaine";
$_LANG["cnrxauownerorganization"] = "Titulaire, Organisation";
$_LANG["cnrxauownerorganizationdescr"] = "Le nom de l'organisation (titulaire)";
$_LANG["cnrxauidwarranty"] = "Titulaire,<br>est citoyen ou résident australien";
$_LANG["cnrxauidwarranty0"] = $_LANG["cnr0"];
$_LANG["cnrxauidwarranty1"] = $_LANG["cnr1"];
$_LANG["cnrxauidwarrantydescr"] = "Le titulaire d'un domaine .id.au doit garantir qu'il est résident ou citoyen australien";
$_LANG["cnrxaueligibilityname"] = "Nom d'éligibilité";
$_LANG["cnrxaueligibilitynamedescr"] = "Le nom du type d'éligibilité (par exemple, nom commercial)";
$_LANG["cnrxaudomainidnumber"] = "Titulaire, Numéro d'identification";
$_LANG["cnrxaudomainidnumberdescr"] = "";
$_LANG["cnrxaudomainidtype"] = "Titulaire, Type d'identification";
// $_LANG["cnrxaudomainidtypetm"] = "TM";
// $_LANG["cnrxaudomainidtypeabn"] = "ABN";
// $_LANG["cnrxaudomainidtypeacn"] = "ACN";
// $_LANG["cnrxaudomainidtypeother"] = "Autre";
// $_LANG["cnrxaudomainidtypeact"] = "ACT";
// $_LANG["cnrxaudomainidtypensw"] = "NSW";
// $_LANG["cnrxaudomainidtypent"] = "NT";
// $_LANG["cnrxaudomainidtypeqld"] = "QLD";
// $_LANG["cnrxaudomainidtypesa"] = "SA";
// $_LANG["cnrxaudomainidtypetas"] = "TAS";
// $_LANG["cnrxaudomainidtypevic"] = "VIC";
// $_LANG["cnrxaudomainidtypewa"] = "WA";
// $_LANG["cnrxaudomainidtypeprivate"] = "Privé";
$_LANG["cnrxaudomainidtypedescr"] = "";
$_LANG["cnrxaueligibilityidnumber"] = "Éligibilité, Numéro d'identification";
$_LANG["cnrxaueligibilityidnumberdescr"] = "";
$_LANG["cnrxaueligibilityidtype"] = "Éligibilité, Type d'identification";
$_LANG["cnrxaueligibilityidtypedescr"] = "";

// ----------------------------------------------------------------------
// ------------------ .CA Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxcalegaltype"] = "Titulaire, Type juridique";
$_LANG["cnrxcalegaltypeabo"] = "Peuples autochtones du Canada";
$_LANG["cnrxcalegaltypeass"] = "Association non constituée en société canadienne";
$_LANG["cnrxcalegaltypecco"] = "Société (Canada ou province ou territoire canadien)";
$_LANG["cnrxcalegaltypecct"] = "Citoyen canadien";
$_LANG["cnrxcalegaltypeedu"] = "Établissement d'enseignement canadien";
$_LANG["cnrxcalegaltypegov"] = "Gouvernement ou entité gouvernementale au Canada";
$_LANG["cnrxcalegaltypehop"] = "Hôpital canadien";
$_LANG["cnrxcalegaltypeinb"] = "Bande indienne reconnue par la Loi sur les Indiens du Canada";
$_LANG["cnrxcalegaltypelam"] = "Bibliothèque, Archive ou Musée canadien";
$_LANG["cnrxcalegaltypelgr"] = "Représentant légal d'un citoyen canadien ou résident permanent";
$_LANG["cnrxcalegaltypemaj"] = "Sa Majesté la Reine";
$_LANG["cnrxcalegaltypeomk"] = "Marque officielle enregistrée au Canada";
$_LANG["cnrxcalegaltypeplt"] = "Parti politique canadien";
$_LANG["cnrxcalegaltypeprt"] = "Partenariat enregistré au Canada";
$_LANG["cnrxcalegaltyperes"] = "Résident permanent du Canada";
$_LANG["cnrxcalegaltypetdm"] = "Marque déposée au Canada (par un propriétaire non canadien)";
$_LANG["cnrxcalegaltypetrd"] = "Syndicat canadien";
$_LANG["cnrxcalegaltypetrs"] = "Fiducie établie au Canada";
// $_LANG["cnrxcalegaltypedescr"] = "";
$_LANG["cnrxcatrademark"] = "Est une marque déposée";
$_LANG["cnrxcatrademark0"] = $_LANG["cnr0"];
$_LANG["cnrxcatrademark1"] = $_LANG["cnr1"];
$_LANG["cnrxcatrademarkdescr"] = "Indique si le domaine est une marque déposée ou non.";

// ----------------------------------------------------------------------
// ------------------ .COM.BR Fields ------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxbrregisternumber"] = "Titulaire, Identifiant Légal Brésilien";
$_LANG["cnrxbrregisternumberdescr"] = "Le numéro d'enregistrement de l'entreprise brésilienne (CNPJ) ou le numéro d'enregistrement individuel brésilien (CPF).";

// ----------------------------------------------------------------------
// ------------------ .CN Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxcnownertype"] = "Titulaire, Type";
$_LANG["cnrxcnownertypei"] = "Individu";
$_LANG["cnrxcnownertypee"] = "Entreprise";
$_LANG["cnrxcnownertypedescr"] = "";
$_LANG["cnrxcnowneridtype"] = "Titulaire, Type d'identification";
$_LANG["cnrxcnowneridtypesfz"] = "SFZ (ID) - Type de titulaire est Individu";
$_LANG["cnrxcnowneridtypehz"] = "HZ (Passeport) - Type de titulaire est Individu";
$_LANG["cnrxcnowneridtypegajmtx"] = "GAJMTX (Permis de sortie et d'entrée pour voyager vers et de Hong Kong et Macao) - Type de titulaire est Individu";
$_LANG["cnrxcnowneridtypetwjmtx"] = "TWJMTX (Passeports des résidents de Taiwan pour entrer ou quitter le continent) - Type de titulaire est Individu";
$_LANG["cnrxcnowneridtypewjlsfz"] = "WJLSFZ (Carte d'identité de résident permanent étranger) - Type de titulaire est Individu";
$_LANG["cnrxcnowneridtypegajzz"] = "GAJZZ (Permis de résidence pour les résidents de Hong Kong / Macao) - Type de titulaire est Individu";
$_LANG["cnrxcnowneridtypetwjzz"] = "TWJZZ (Permis de résidence pour les résidents de Taiwan) - Type de titulaire est Individu";
$_LANG["cnrxcnowneridtypejgz"] = "JGZ (Carte d'identité d'officier) - Type de titulaire est Individu";
$_LANG["cnrxcnowneridtypeqt"] = "QT (Autres) - Type de titulaire est Individu ou Entreprise";
$_LANG["cnrxcnowneridtypeorg"] = "ORG (Certificat de code d'organisation) - Type de titulaire est Entreprise";
$_LANG["cnrxcnowneridtypeyyzz"] = "YYZZ (Licence commerciale) - Type de titulaire est Entreprise";
$_LANG["cnrxcnowneridtypetydm"] = "TYDM (Certificat pour le Code Uniforme du Crédit Social) - Type de titulaire est Entreprise";
$_LANG["cnrxcnowneridtypebddm"] = "BDDM (Désignation du code militaire) - Type de titulaire est Entreprise";
$_LANG["cnrxcnowneridtypejddwfw"] = "JDDWFW (Licence de service externe payé par militaire) - Type de titulaire est Entreprise";
$_LANG["cnrxcnowneridtypesydwfr"] = "SYDWFR (Certificat de personne morale d'établissement public) - Type de titulaire est Entreprise";
$_LANG["cnrxcnowneridtypewgczjg"] = "WGCZJG (Formulaire d'enregistrement des bureaux de représentation résidents des entreprises étrangères) - Type de titulaire est Entreprise";
$_LANG["cnrxcnowneridtypeshttfr"] = "SHTTFR (Certificat d'enregistrement de personne morale d'organisation sociale) - Type de titulaire est Entreprise";
$_LANG["cnrxcnowneridtypezjcs"] = "ZJCS (Certificat d'enregistrement de site d'activités religieuses) - Type de titulaire est Entreprise";
$_LANG["cnrxcnowneridtypembfqy"] = "MBFQY (Certificat d'enregistrement d'entité privée non-entreprise) - Type de titulaire est Entreprise";
$_LANG["cnrxcnowneridtypejjhfr"] = "JJHFR (Certificat d'enregistrement de personne morale de fondation) - Type de titulaire est Entreprise";
$_LANG["cnrxcnowneridtypelszy"] = "LSZY (Licence de pratique de cabinet d'avocats) - Type de titulaire est Entreprise";
$_LANG["cnrxcnowneridtypewgzhwh"] = "WGZHWH (Certificat d'enregistrement de centre culturel étranger en Chine) - Type de titulaire est Entreprise";
$_LANG["cnrxcnowneridtypewlczzg"] = "WLCZJG (Certificat d'enregistrement des représentations résidentes des services touristiques d'un gouvernement étranger) - Type de titulaire est Entreprise";
$_LANG["cnrxcnowneridtypesfjd"] = "SFJD (Licence d'expertise judiciaire) - Type de titulaire est Entreprise";
$_LANG["cnrxcnowneridtypejwjg"] = "JWJG (Certificat d'organisation à l'étranger) - Type de titulaire est Entreprise";
$_LANG["cnrxcnowneridtypeshfwjg"] = "SHFWJG (Certificat d'enregistrement d'agence de service social) - Type de titulaire est Entreprise";
$_LANG["cnrxcnowneridtypembxxbx"] = "MBXXBX (Permis d'école privée) - Type de titulaire est Entreprise";
$_LANG["cnrxcnowneridtypeyljgzy"] = "YLJGZY (Licence de pratique d'établissement médical) - Type de titulaire est Entreprise";
$_LANG["cnrxcnowneridtypegzjgzy"] = "GZJGZY (Licence de notaire) - Type de titulaire est Entreprise";
$_LANG["cnrxcnowneridtypebjwsxx"] = "BJWSXX (Permis de l'école de Beijing pour les enfants du personnel diplomatique étranger en Chine) - Type de titulaire est Entreprise";
$_LANG["cnrxcnowneridtypeqttyzm"] = "QTTYDM (Autres - Certificat pour le Code Uniforme du Crédit Social) - Type de titulaire est Entreprise";
$_LANG["cnrxcnowneridtypedescr"] = "Type d'identité de la carte d'identité";
$_LANG["cnrxcnowneridnumber"] = "Titulaire, Numéro d'identification";
$_LANG["cnrxcnowneridnumberdescr"] = "";

// ----------------------------------------------------------------------
// ------------------ .COOP Fields --------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxcoopeligibility"] = "Conditions d'éligibilité";
$_LANG["cnrxcoopeligibilitydescr"] = "Acceptez que mon organisation remplisse au moins une des conditions d'éligibilité .COOP. Lisez <a style=\"text-decoration:underline\" href=\"https://identity.coop/coop-policies-and-agreements/\" target=\"_blank\">ici</a>.";
$_LANG["cnrxcoopeligibility0"] = $_LANG["cnr0"];
$_LANG["cnrxcoopeligibility1"] = $_LANG["cnr1"];

// ----------------------------------------------------------------------
// ------------------ .DE Fields ----------------------------------------
// ----------------------------------------------------------------------
//$_LANG["cnrxdensentry0"] = "";
$_LANG["cnrxdensentry0descr"] = implode(" ", [
    "Permet l'utilisation de nsentrys au lieu de serveurs de noms pour les domaines .de;",
    "Les enregistrements NS vous permettent de configurer des sous-domaines avec des serveurs de noms alternatifs.",
    "<a target=\"_blank\" href=\"https://www.denic.de/en/domains/de-domains/registration/nameserver-and-nsentry-data/\" style=\"text-decoration:underline\">Lire en détail</a>."
]);
//$_LANG["cnrxdensentry1"] = "";
$_LANG["cnrxdensentry1descr"] = "voir ci-dessus";
//$_LANG["cnrxdensentry2"] = "";
$_LANG["cnrxdensentry2descr"] = "voir ci-dessus";
//$_LANG["cnrxdensentry3"] = "";
$_LANG["cnrxdensentry3descr"] = "voir ci-dessus";
//$_LANG["cnrxdensentry4"] = "";
$_LANG["cnrxdensentry4descr"] = "voir ci-dessus";
//$_LANG["cnrxdegeneralrequest"] = "";
//$_LANG["cnrxdegeneralrequestdescr"] = "";
//$_LANG["cnrxdeabusecontact"] = "";
//$_LANG["cnrxdeabusecontactdescr "] = "";

// ----------------------------------------------------------------------
// ------------------ .DK Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxdkusertype"] = "Titulaire, Type";
$_LANG["cnrxdkusertypeperson"] = "Personne";
$_LANG["cnrxdkusertypecompany"] = "Entreprise";
$_LANG["cnrxdkusertypeassociation"] = "Association";
$_LANG["cnrxdkusertypepuborg"] = "Organisation Publique";
// $_LANG["cnrxdkusertypedescr"] = "";
$_LANG["cnrxdkuseridnumber"] = "Titulaire, Numéro d'Identification";
$_LANG["cnrxdkuseridnumberdescr"] = implode("", [
    "Numéro d'identification du contact titulaire. Cela peut être <i>EAN, CVR ou P number.</i> ",
    "Le <i>numéro CVR</i> est utilisé pour identifier l'organisation, et le <i>numéro EAN</i> garantit ",
    "que les documents liés à la facturation électronique sont envoyés au bon compte. ",
    "Le <i>numéro P</i> est un identifiant de succursale attribué par le Registre Central des Entreprises Danoises pour ",
    "lier les sites physiques à une organisation."
]);

// ----------------------------------------------------------------------
// ------------------ .ES Fields ----------------------------------------
// ----------------------------------------------------------------------
$types = [
    1 => "Individu",
    39 => "Groupement d'intérêt économique",
    47 => "Association",
    59 => "Association sportive",
    68 => "Association professionnelle",
    124 => "Caisse d'épargne",
    150 => "Communauté de biens",
    152 => "Communauté de propriétaires",
    164 => "Ordre ou institution religieuse",
    181 => "Consulat",
    197 => "Association de droit public",
    203 => "Ambassade",
    229 => "Autorité locale",
    269 => "Fédération sportive",
    286 => "Fondation",
    365 => "Mutuelle d'assurance",
    434 => "Organisme gouvernemental régional",
    436 => "Organisme gouvernemental central",
    439 => "Parti politique",
    476 => "Syndicat",
    510 => "Partenariat agricole",
    524 => "Société anonyme",
    525 => "Association sportive",
    554 => "Société civile",
    560 => "Société en nom collectif",
    562 => "Société en nom collectif et en commandite",
    566 => "Coopérative",
    608 => "Entreprise détenue par les employés",
    612 => "Société à responsabilité limitée",
    713 => "Bureau espagnol",
    717 => "Alliance temporaire d'entreprises",
    744 => "Société anonyme détenue par les employés",
    745 => "Entité publique régionale",
    746 => "Entité publique nationale",
    747 => "Entité publique locale",
    877 => "Autres",
    878 => "Conseil de surveillance de l'appellation d'origine",
    879 => "Entité gérant les espaces naturels"
];
$idtypes = [
    0 => "Autre (pour les contacts hors Espagne)",
    1 => "DNI/NIF (pour les contacts espagnols)",
    2 => "Obsolète, utilisez l'option suivante.",
    3 => "NIE (pour les contacts espagnols)"
];
$idtypesdescr = implode("<br/>", [
    "DNI = &quot;Documento Nacional de Identidad&quot;",
    "NIF = &quot;Número de Identificación Fiscal&quot;",
    "NIE = &quot;Número de Identificación de Extranjero&quot;. C'est l'équivalent d'un NIF espagnol, mais délivré par les autorités espagnoles aux étrangers qui prévoient de rester plus de 3 mois en Espagne."
]);
$idnodescr = "Le numéro d'identification de ce contact. Pour les contacts espagnols, il s'agit du numéro DNI/NIF/NIE - le numéro de carte d'identité ou de passeport sinon.";

$_LANG["cnrxesownertipoidentificacion"] = "Titulaire, Type d'identification";
$_LANG["cnrxesadmintipoidentificacion"] = "Admin, Type d'identification";
$_LANG["cnrxestechtipoidentificacion"] = "Tech, Type d'identification";
$_LANG["cnrxesbillingtipoidentificacion"] = "Facturation, Type d'identification";

foreach ($idtypes as $key => $value) {
    $_LANG["cnrxesownertipoidentificacion$key"] = $value;
    $_LANG["cnrxesadmintipoidentificacion$key"] = $value;
    $_LANG["cnrxestechtipoidentificacion$key"] = $value;
    $_LANG["cnrxesbillingtipoidentificacion$key"] = $value;
}

$_LANG["cnrxesownertipoidentificaciondescr"] = $idtypesdescr;
$_LANG["cnrxesadmintipoidentificaciondescr"] = $idtypesdescr;
$_LANG["cnrxestechtipoidentificaciondescr"] = $idtypesdescr;
$_LANG["cnrxesbillingtipoidentificaciondescr"] = $idtypesdescr;

$_LANG["cnrxesowneridentificacion"] = "Titulaire, Numéro d'identification";
$_LANG["cnrxesadminidentificacion"] = "Admin, Numéro d'identification";
$_LANG["cnrxestechidentificacion"] = "Tech, Numéro d'identification";
$_LANG["cnrxesbillingidentificacion"] = "Facturation, Numéro d'identification";

$_LANG["cnrxesowneridentificaciondescr"] = $idnodescr;
$_LANG["cnrxesadminidentificaciondescr"] = $idnodescr;
$_LANG["cnrxestechidentificaciondescr"] = $idnodescr;
$_LANG["cnrxesbillingidentificaciondescr"] = $idnodescr;

$_LANG["cnrxesownerlegalform"] = "Titulaire, Forme juridique";
$_LANG["cnrxesadminlegalform"] = "Admin, Forme juridique";
$_LANG["cnrxestechlegalform"] = "Tech, Forme juridique";
$_LANG["cnrxesbillinglegalform"] = "Facturation, Forme juridique";

foreach ($types as $key => $value) {
    $_LANG["cnrxesownerlegalform$key"] = $value;
    $_LANG["cnrxesadminlegalform$key"] = $value;
    $_LANG["cnrxestechlegalform$key"] = $value;
    $_LANG["cnrxesbillinglegalform$key"] = $value;
}

$_LANG["cnrxesownerlegalformdescr"] = "";
$_LANG["cnrxesadminlegalformdescr"] = "";
$_LANG["cnrxestechlegalformdescr"] = "";
$_LANG["cnrxesbillinglegalformdescr"] = "";

// ----------------------------------------------------------------------
// ------------------ .EU Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxeuregistrantlang"] = "Titulaire, Langue";
$_LANG["cnrxeuregistrantcitizenship"] = "Titulaire, Citoyenneté";
$_LANG["cnrxeuregistrantlangdescr"] = "Langue à utiliser pour la communication avec le fournisseur de TLD (Par défaut = Anglais)";
$_LANG["cnrxeuregistrantcitizenshipdescr"] = "Les particuliers ayant la citoyenneté européenne qui ne résident pas dans l'UE peuvent enregistrer des domaines .eu en utilisant ce paramètre.";

// ----------------------------------------------------------------------
// ------------------ .FI Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxficompanyregid"] = "Titulaire, Numéro d'Entreprise ou d'Enregistrement";
$_LANG["cnrxficompanyregiddescr"] = "Entité commerciale locale (enregistrée au registre du commerce finlandais ou une société au sein de la République finlandaise)<br/>(requis pour les entités non finlandaises)";
$_LANG["cnrxfipersonalid"] = "Titulaire, Numéro d'Identité Personnel";
$_LANG["cnrxfipersonaliddescr"] = "Numéro d'identité personnel finlandais<br/>(requis pour les particuliers non finlandais)";
$_LANG["cnrxfibirthdate"] = "Titulaire, Date de Naissance";
$_LANG["cnrxfibirthdatedescr"] = "Date de naissance (AAAA-MM-JJ)<br/>(requis pour les particuliers non finlandais)";
$_LANG["cnrxficontacttype"] = "Titulaire, Type de Contact";
$_LANG["cnrxficontacttype0"] = "Personne Privée";
$_LANG["cnrxficontacttype1"] = "Entreprise";
$_LANG["cnrxficontacttype2"] = "Société";
$_LANG["cnrxficontacttype3"] = "Institution";
$_LANG["cnrxficontacttype4"] = "Parti Politique";
$_LANG["cnrxficontacttype5"] = "Commune";
$_LANG["cnrxficontacttype6"] = "Gouvernement";
$_LANG["cnrxficontacttype7"] = "Communauté Publique";
$_LANG["cnrxficontacttypedescr"] = "";

// ----------------------------------------------------------------------
// ------------------ .GAY Fields ---------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxgayacceptrequirements"] = "Accepter les exigences";
$_LANG["cnrxgayacceptrequirements0"] = $_LANG["cnr0"];
$_LANG["cnrxgayacceptrequirements1"] = $_LANG["cnr1"];
$_LANG["cnrxgayacceptrequirementsdescr"] = "Je confirme que le domaine NE SERA PAS utilisé pour inciter à la violence, harceler, intimider ou tenir des propos haineux et NE SERA PAS utilisé par des groupes de haine reconnus. DotGay fait don de 20% de chaque nouveau domaine enregistré à ses partenaires, GLAAD et CenterLink.";

// ----------------------------------------------------------------------
// ------------------ .HK Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxhkownerdocumenttype"] = "Titulaire, Type de Document";
$_LANG["cnrxhkownerdocumenttypehkid"] = "Individu: Numéro d'Identité de Hong Kong";
$_LANG["cnrxhkownerdocumenttypeothid"] = "Individu: Numéro d'Identité d'un autre pays";
$_LANG["cnrxhkownerdocumenttypepassno"] = "Individu: Numéro de Passeport";
$_LANG["cnrxhkownerdocumenttypebirthcert"] = "Individu: Certificat de Naissance";
$_LANG["cnrxhkownerdocumenttypeothidv"] = "Individu: Autre Document d'Identité";
$_LANG["cnrxhkownerdocumenttypebr"] = "Organisation: Certificat d'Enregistrement d'Entreprise";
$_LANG["cnrxhkownerdocumenttypeci"] = "Organisation: Certificat de Constitution";
$_LANG["cnrxhkownerdocumenttypecrs"] = "Organisation: Certificat d'Enregistrement d'École";
$_LANG["cnrxhkownerdocumenttypehksarg"] = "Organisation: Département du Gouvernement de Hong Kong";
$_LANG["cnrxhkownerdocumenttypehkordinance"] = "Organisation: Ordonnance de Hong Kong";
$_LANG["cnrxhkownerdocumenttypeothorg"] = "Organisation: Autre Document d'Organisation";
$_LANG["cnrxhkownerdocumenttypedescr"] = "";
$_LANG["cnrxhkownerdocumentnumber"] = "Titulaire, Numéro de Document";
$_LANG["cnrxhkownerdocumentnumberdescr"] = "";
$_LANG["cnrxhkownerdocumentorigincountry"] = "Titulaire, Pays d'Origine du Document";
$_LANG["cnrxhkownerdocumentorigincountrydescr"] = "Le pays où ce document a été délivré (veuillez fournir le code pays ISO à 2 caractères, par exemple DE ou US).";
$_LANG["cnrxhkownerotherdocumenttype"] = "Titulaire, Autre Type de Document";
$_LANG["cnrxhkownerotherdocumenttypedescr"] = "Requis si le type de document précédemment sélectionné est soit '" . $_LANG["cnrxhkownerdocumenttypeothidv"] . "' soit '" . $_LANG["cnrxhkownerdocumenttypeothorg"] . "'.";
$_LANG["cnrxhkdomaincategory"] = "Catégorie de Domaine";
$_LANG["cnrxhkdomaincategoryi"] = "Individu";
$_LANG["cnrxhkdomaincategoryo"] = "Organisation";
$_LANG["cnrxhkdomaincategorydescr"] = "Type Juridique de tous les Contacts de Domaine";
$_LANG["cnrxhkownerageover18"] = "Titulaire, Âge supérieur à 18 ans";
$_LANG["cnrxhkownerageover18no"] = $_LANG["cnr0"];
$_LANG["cnrxhkownerageover18yes"] = $_LANG["cnr1"];
$_LANG["cnrxhkownerageover18descr"] = "Je confirme que le Titulaire a au moins 18 ans (requis uniquement pour les Individus).";

// ----------------------------------------------------------------------
// ------------------ .IE Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxiecontacttype"] = "Titulaire, Type de Contact";
$_LANG["cnrxiecontacttypecom"] = "Entreprise";
$_LANG["cnrxiecontacttypecha"] = "Charité";
$_LANG["cnrxiecontacttypeoth"] = "Autre";
$_LANG["cnrxiecontacttypedescr"] = "";
$_LANG["cnrxielanguage"] = "Titulaire, Langue";
$_LANG["cnrxielanguageen"] = "Anglais";
$_LANG["cnrxielanguagefr"] = "Français";
$_LANG["cnrxielanguagedescr"] = "Langue à utiliser pour la communication avec le fournisseur de TLD (Par défaut = Anglais)";
$_LANG["cnrxiecronumber"] = "Titulaire, Numéro CRO";
$_LANG["cnrxiecronumberdescr"] = "Le numéro du registre des entreprises (CRO)";
$_LANG["cnrxiesupportingnumber"] = "Titulaire, Numéro de Charité";
$_LANG["cnrxiesupportingnumberdescr"] = "Numéro de Charité / Numéro de Soutien";

// ----------------------------------------------------------------------
// ------------------ .IT Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxitconsentforpublishing"] = $_LANG["cnrconsentforpublishing"];
$_LANG["cnrxitconsentforpublishing0"] = $_LANG["cnr0"];
$_LANG["cnrxitconsentforpublishing1"] = $_LANG["cnr1"];
$_LANG["cnrxitconsentforpublishingdescr"] = "Autoriser la publication des données personnelles des contacts. Refus uniquement possible si le type d’entité ci-dessous est 1.";
$_LANG["cnrxitentitytype"] = "Titulaire, Type d'entité";
$_LANG["cnrxitentitytype1"] = "[1] Personnes physiques italiennes et étrangères";
$_LANG["cnrxitentitytype2"] = "[2] Entreprises/entrepreneurs individuels";
$_LANG["cnrxitentitytype3"] = "[3] Travailleurs indépendants/professionnels";
$_LANG["cnrxitentitytype4"] = "[4] Organisations à but non lucratif";
$_LANG["cnrxitentitytype5"] = "[5] Organisations publiques";
$_LANG["cnrxitentitytype6"] = "[6] Autres sujets";
$_LANG["cnrxitentitytype7"] = "[7] Étrangers correspondant aux catégories 2-6";
$_LANG["cnrxitentitytypedescr"] = "Type d'entité pour identifier la typologie du titulaire.";
$_LANG["cnrxitpin"] = "Titulaire, Numéro fiscal";
//$_LANG["cnrxitpindescr"] = "";
$_LANG["cnrxitnationality"] = "Titulaire, Nationalité";
$_LANG["cnrxitnationalitydescr"] = "La nationalité du titulaire spécifiée par le code pays ISO à 2 caractères.";
//$_LANG["cnrxitsect3liability"] = "";
$_LANG["cnrxitsect3liabilitydescr"] = "";
$_LANG["cnrxitsect3liability0"] = $_LANG["cnr0"];
$_LANG["cnrxitsect3liability1"] = $_LANG["cnr1"];
//$_LANG["cnrxitsect5personaldataforregistration"] = "";
$_LANG["cnrxitsect5personaldataforregistrationdescr"] = "";
$_LANG["cnrxitsect5personaldataforregistration0"] = $_LANG["cnr0"];
$_LANG["cnrxitsect5personaldataforregistration1"] = $_LANG["cnr1"];
//$_LANG["cnrxitsect6personaldatafordiffusion"] = "";
$_LANG["cnrxitsect6personaldatafordiffusiondescr"] = "";
$_LANG["cnrxitsect6personaldatafordiffusion0"] = $_LANG["cnr0"];
$_LANG["cnrxitsect6personaldatafordiffusion1"] = $_LANG["cnr1"];
//$_LANG["cnrxitsect7explicitacceptance"] = "";
$_LANG["cnrxitsect7explicitacceptancedescr"] = "";
$_LANG["cnrxitsect7explicitacceptance0"] = $_LANG["cnr0"];
$_LANG["cnrxitsect7explicitacceptance1"] = $_LANG["cnr1"];

// ----------------------------------------------------------------------
// ------------------ .LV Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxlvownerregnr"] = "Titulaire, Numéro d'enregistrement";
$_LANG["cnrxlvownerregnrdescr"] = "Le numéro d'enregistrement du citoyen letton à utiliser pour le contact du titulaire (par exemple, numéro d'enregistrement de l'entreprise)";
$_LANG["cnrxlvadminregnr"] = "Admin, Numéro d'enregistrement";
$_LANG["cnrxlvadminregnrdescr"] = "Le numéro d'enregistrement du citoyen letton à utiliser pour le contact administratif (par exemple, numéro d'enregistrement de l'entreprise)";
$_LANG["cnrxlvvatnr"] = "Titulaire, Numéro de TVA";
$_LANG["cnrxlvvatnrdescr"] = "Le numéro de TVA du contact du titulaire (uniquement pour les entreprises).";

// ----------------------------------------------------------------------
// ------------------ .LT Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxltcompanynumber"] = "Titulaire, Numéro d'Entreprise";
$_LANG["cnrxltcompanynumberdescr"] = "";

// ----------------------------------------------------------------------
// ------------------ .MY Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxmybusinessnumber"] = "Titulaire, Numéro d'Entreprise";
$_LANG["cnrxmybusinessnumberdescr"] = "Le numéro d'enregistrement de l'entreprise du titulaire (uniquement pour les entreprises)";
$_LANG["cnrxmyorganizationtype"] = "Titulaire, Type d'Organisation";
$_LANG["cnrxmyorganizationtypedescr"] = "Le type d'entreprise du titulaire (uniquement pour les entreprises)";
$_LANG["cnrxmyperidentity"] = "Titulaire, Numéro d'Identité Personnel";
$_LANG["cnrxmyperidentitydescr"] = "Le numéro d'identité personnel du titulaire (uniquement pour les particuliers)";
$_LANG["cnrxmyperdateofbirth"] = "Titulaire, Date de Naissance";
$_LANG["cnrxmyperdateofbirthdescr"] = "La date de naissance du titulaire (AAAA-MM-JJ, uniquement pour les particuliers)";
$_LANG["cnrxmyrace"] = "Titulaire, Ethnie";
$_LANG["cnrxmyracemalay"] = "Malais";
$_LANG["cnrxmyracechinese"] = "Chinois";
$_LANG["cnrxmyraceindian"] = "Indien";
$_LANG["cnrxmyraceothers"] = "Autres";
$_LANG["cnrxmyracedescr"] = "(uniquement pour les particuliers)";

// ----------------------------------------------------------------------
// ------------------ .NO Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxnoorganizationnumber"] = "Titulaire, Numéro d'Organisation";
$_LANG["cnrxnoorganizationnumberdescr"] = "Le numéro d'enregistrement norvégien délivré par le Registre central de coordination pour les entités juridiques.";
$_LANG["cnrxnopersonidentifier"] = "Identifiant de personne Norid";
$_LANG["cnrxnopersonidentifierdescr"] = "Identifiant personnel requis pour enregistrer un nom de domaine privé .PRIV.NO. Laissez vide sinon.";

// ----------------------------------------------------------------------
// ------------------ .NU Fields ----------------------------------------
// ----------------------------------------------------------------------
// see further .nu fields at the top of the file
$_LANG["cnrxnuiisidno"] = "Titulaire, Numéro d'identification";
$_LANG["cnrxnuiisidnodescr"] = "Numéro d'identification personnel, numéro d'identité de l'entreprise ou désignation d'enregistrement dans un registre gouvernemental. Pour les contacts situés en Suède, un numéro d'identification suédois valide est nécessaire (par exemple : 123456-1234).";
$_LANG["cnrxnuiisvatno"] = "Titulaire, Numéro de TVA";
$_LANG["cnrxnuiisvatnodescr"] = "Le numéro de TVA du titulaire (uniquement pour les entreprises)";

// ----------------------------------------------------------------------
// ------------------ .NYC Fields ---------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxnycextcontact"] = "Contact Externe NY";
$_LANG["cnrxnycextcontactadmin"] = "Contact Administratif";
$_LANG["cnrxnycextcontacttech"] = "Contact Technique";
$_LANG["cnrxnycextcontactbilling"] = "Contact Facturation";
$_LANG["cnrxnycextcontactowner"] = "Contact du Titulaire";
$_LANG["cnrxnycextcontactdescr"] = "Le contact spécifié doit avoir une adresse physique valide dans la ville de New York.";

// ----------------------------------------------------------------------
// ------------------ .PARIS Fields -------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxafniccode"] = $_LANG["cnrxallocationtoken"];
$_LANG["cnrxafniccodedescr"] = $_LANG["cnrxallocationtokendescr"];

// ----------------------------------------------------------------------
// ------------------ .FR, .PM, .RE, .TF, .WF, .YT Fields ---------------
// ----------------------------------------------------------------------
// Organizations (Companies, Associations, etc.)
$_LANG["cnrxfrannounce"] = "Entreprise, Numéro d'annonce<br/>(Journal Officiel)";
$_LANG["cnrxfrannouncedescr"] = "Le numéro de l'annonce (par exemple 5) dans le Journal Officiel. Seuls les chiffres sont autorisés.";
$_LANG["cnrxfrdatepublicationjo"] = "Entreprise, Date de publication<br/>(Journal Officiel)";
$_LANG["cnrxfrdatepublicationjodescr"] = implode(" ", [
    "La date de publication dans le Journal Officiel.",
    "Format de date AAAA-MM-JJ"
]);
$_LANG["cnrxfrnumerodepageannouncejo"] = "Entreprise, Numéro de page de l'annonce<br/>(Journal Officiel)";
$_LANG["cnrxfrnumerodepageannouncejodescr"] = "Le numéro de page de l'annonce dans le Journal Officiel.";
$_LANG["cnrxfrwaldec"] = "Entreprise, ID Waldec";
$_LANG["cnrxfrwaldecdescr"] = "Indique l'identifiant Waldec lié à une association, suffisant pour identifier une association si fourni. Seuls les chiffres sont autorisés.";
$_LANG["cnrxfrdateassociation"] = "Entreprise, Date d'association";
$_LANG["cnrxfrdateassociationdescr"] = "Indique la date de l'association. Format de date AAAA-MM-JJ.";
$_LANG["cnrxfrduns"] = "Entreprise, Numéro DUNS";
$_LANG["cnrxfrdunsdescr"] = implode(" ", [
    "Le numéro DUNS est un identifiant unique à neuf chiffres pour les entreprises. Abréviation de Data Universal",
    "Numbering System; il s'agit d'un nouvel identifiant pouvant être envoyé pour une vérification d'éligibilité",
    "au niveau européen."
]);
$_LANG["cnrxfrlocal"] = "Entreprise, ID Local";
$_LANG["cnrxfrlocaldescr"] = "Un identifiant local spécifique à un pays de l'Espace Économique Européen (par exemple, numéro de certificat d'entreprise).";
$_LANG["cnrxfrnoprezonecheck0"] = $_LANG["cnr0"];
$_LANG["cnrxfrnoprezonecheck1"] = $_LANG["cnr1"];
$_LANG["cnrxfrsirenorsiret"] = "Entreprise, Numéro SIREN/SIRET";
$_LANG["cnrxfrsirenorsiretdescr"] = implode(" ", [
    "Pour les entreprises avec un numéro SIREN/SIRET valide.",
    "Le code SIREN est le numéro d'identification unique des entreprises en France. Il est délivré par l'",
    "Institut national de la statistique et des études économiques (INSEE) et comporte 9 chiffres.",
    "Les 9 premiers chiffres sont le numéro SIREN et les 5 chiffres suivants sont le numéro NIC",
    "(Numéro Interne de Classement). Le numéro SIRET est délivré une fois que vous avez enregistré votre",
    "entreprise auprès de la Chambre de Commerce (RCS) pour le commerce, de la Chambre de Métiers pour les artisans",
    "et les travaux manuels ou auprès de l'URSSAF pour les services intellectuels. Les numéros SIRET sont composés de 14",
    "chiffres. Le numéro SIRET fournit des informations sur l'emplacement de l'entreprise en France",
    "(pour les entreprises établies). Le nom de l'entreprise fourni dans les détails du contact du titulaire doit",
    "être exactement le même que celui indiqué dans la base de données SIREN/SIRET ( https://www.infogreffe.fr/ )."
]);
$_LANG["cnrxfrtrademark"] = "Entreprise, Numéro de Marque Déposée";
$_LANG["cnrxfrtrademarkdescr"] = "";
$_LANG["cnrxfrvatid"] = "Entreprise, Numéro de TVA";
$_LANG["cnrxfrvatiddescr"] = "Pour les entreprises avec un numéro de TVA valide.";

// Individuel
$_LANG["cnrxfrbirthpc"] = "Titulaire, Code Postal (Lieu de Naissance)";
$_LANG["cnrxfrbirthpcdescr"] = implode(" ", [
    "Uniquement pour les personnes physiques nées en France, Réunion, Mayotte, Guadeloupe, Martinique, Guyane,",
    "Polynésie Française, Wallis et Futuna ou Saint-Pierre-et-Miquelon. Veuillez fournir le",
    "code postal du lieu de naissance (ou au moins le code du département)"
]);
$_LANG["cnrxfrbirthcity"] = "Titulaire, Ville de Naissance";
$_LANG["cnrxfrbirthcitydescr"] = implode(" ", [
    "Uniquement pour les personnes physiques nées en France, Réunion, Mayotte, Guadeloupe, Martinique, Guyane,",
    "Polynésie Française, Wallis et Futuna ou Saint-Pierre-et-Miquelon. Veuillez fournir le nom",
    "de la ville."
]);
$_LANG["cnrxfrbirthdate"] = "Titulaire, Date de Naissance";
$_LANG["cnrxfrbirthdatedescr"] = "La date de naissance du titulaire au format AAAA-MM-JJ.";
$_LANG["cnrxfrbirthplace"] = "Titulaire, Lieu de Naissance";
//$_LANG["cnrxfrbirthplacedescr"] = "";
$_LANG["cnrxfrrestrictpub"] = $_LANG["cnrconsentforpublishing"];
$_LANG["cnrxfrrestrictpub0"] = $_LANG["cnr0"];
$_LANG["cnrxfrrestrictpub1"] = $_LANG["cnr1"];
$_LANG["cnrxfrrestrictpubdescr"] = "Uniquement pour les personnes physiques. Autoriser la publication des données personnelles des contacts.";
$_LANG["cnrxfrnoprezonecheck"] = "Supprimer la vérification DNS préalable";
$_LANG["cnrxfrnoprezonecheckdescr"] = "Détermine si le système doit effectuer une vérification DNS préalable avant d'envoyer la commande au registre.";

// ----------------------------------------------------------------------
// ------------------ .PT Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxpttechidentification"] = "Contact Technique, Numéro de TVA";
$_LANG["cnrxpttechidentificationdescr"] = "Le Numéro d'Identification Fiscale du Contact Technique";
$_LANG["cnrxptowneridentification"] = "Titulaire, Numéro de TVA";
$_LANG["cnrxptowneridentificationdescr"] = "Le Numéro d'Identification Fiscale du Titulaire";
$_LANG["cnrxpttechmobile"] = "Contact Technique, Téléphone Mobile";
$_LANG["cnrxpttechmobiledescr"] = "Le Numéro de Téléphone Mobile du Contact Technique";
$_LANG["cnrxptownermobile"] = "Titulaire, Téléphone Mobile";
$_LANG["cnrxptownermobiledescr"] = "Le Numéro de Téléphone Mobile du Titulaire";

// ----------------------------------------------------------------------
// ------------------ .RO Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxronumerosociete"] = "Titulaire, Numéro de Société";
$_LANG["cnrxronumerosocietedescr"] = "(requis uniquement pour les entreprises)";
$_LANG["cnrxronumerocarteidoupasseport"] = "Titulaire, Numéro de Carte d'Identité ou de Passeport";
$_LANG["cnrxronumerocarteidoupasseportdescr"] = "(requis uniquement pour les particuliers)";
$_LANG["cnrxronumerotva"] = "Titulaire, Numéro de TVA";
$_LANG["cnrxronumerotvadescr"] = "(requis uniquement pour les entreprises)";

// ----------------------------------------------------------------------
// ------------------ .RU Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxrubirthdate"] = "Titulaire, Date de Naissance";
$_LANG["cnrxrubirthdatedescr"] = "La Date de Naissance du Titulaire (JJ.MM.AAAA)<br/>(requis uniquement pour les particuliers)";
$_LANG["cnrxrufirstname"] = "Titulaire, Prénom";
$_LANG["cnrxrufirstnamedescr"] = "Le Prénom du Titulaire en russe. À remplir avec des lettres russes et latines, sans points.<br/>(requis uniquement pour les particuliers)";
$_LANG["cnrxrumiddlename"] = "Titulaire, Deuxième Prénom";
$_LANG["cnrxrumiddlenamedescr"] = "Le Deuxième Prénom du Titulaire en russe. À remplir avec des lettres russes et latines, sans points.<br/>(requis uniquement pour les particuliers)";
$_LANG["cnrxrulastname"] = "Titulaire, Nom de Famille";
$_LANG["cnrxrulastnamedescr"] = "Le Nom de Famille du Titulaire en russe. À remplir avec des lettres russes et latines, sans points.<br/>(requis uniquement pour les particuliers)";
$_LANG["cnrxruorganization"] = "Titulaire, Nom de l'Organisation";
$_LANG["cnrxruorganizationdescr"] = "Le Nom de l'Organisation du Titulaire en russe. Ce champ peut contenir des lettres russes et latines, des chiffres, des signes de ponctuation et des espaces.<br/>(requis uniquement pour les organisations incorporées en Fédération de Russie)";
$_LANG["cnrxrucode"] = "Titulaire, Numéro d'Identification Fiscale";
$_LANG["cnrxrucodedescr"] = "Le Numéro d'Identification Fiscale (NIF) du Titulaire. Ce champ doit contenir un numéro à dix chiffres (le dernier chiffre est un chiffre de contrôle).<br/>(requis uniquement pour les organisations incorporées en Fédération de Russie)";
$_LANG["cnrxrukpp"] = "Titulaire, Code de Raison";
$_LANG["cnrxrukppdescr"] = "Le Code de Raison (KPP) du Titulaire. Ce champ doit contenir un numéro à neuf chiffres.<br/>(requis uniquement pour les organisations incorporées en Fédération de Russie)";
$_LANG["cnrxrupassportdata"] = "Titulaire, Données du Passeport";
$_LANG["cnrxrupassportdatadescr"] = "Les Données du Passeport du Titulaire. Ce champ est rempli en russe et peut contenir des lettres russes et latines, des chiffres, des signes de ponctuation et des espaces. Format : Numéro du document, Délivré par, Date de délivrance<br/>(requis uniquement pour les particuliers)";

// ----------------------------------------------------------------------
// ------------------ .SE Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxnicseidnumber"] = "Titulaire, Numéro d'identification";
$_LANG["cnrxnicseidnumberdescr"] = "Numéro personnel ou organisationnel.";
$_LANG["cnrxnicsevatid"] = "Titulaire, Numéro de TVA";
$_LANG["cnrxnicsevatiddescr"] = "";
$_LANG["cnrxsediscloseemail"] = "Titulaire, Divulguer l'Email";
$_LANG["cnrxsediscloseemaildescr"] = "Autoriser la divulgation de l'adresse email du titulaire dans la base de données WHOIS publique.";
$_LANG["cnrxsedisclosefax"] = "Titulaire, Divulguer le Fax";
$_LANG["cnrxsedisclosefaxdescr"] = "Autoriser la divulgation du numéro de fax du titulaire dans la base de données WHOIS publique.";
$_LANG["cnrxsedisclosevoice"] = "Titulaire, Divulguer le Numéro de Téléphone";
$_LANG["cnrxsedisclosevoicedescr"] = "Autoriser la divulgation du numéro de téléphone du titulaire dans la base de données WHOIS publique.";
foreach (["email", "fax", "voice"] as $field) {
    $_LANG["cnrxsedisclose$field" . "0"] = $_LANG["cnr0"];
    $_LANG["cnrxsedisclose$field" . "1"] = $_LANG["cnr1"];
}

// ----------------------------------------------------------------------
// ------------------ .SG Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxsgrcbid"] = "Titulaire, ID RCB";
$_LANG["cnrxsgrcbiddescr"] = "Le numéro d'entité unique (UEN) ou le numéro d'enregistrement de l'entreprise (RCB) du titulaire. Pour les <u>entreprises</u> situées à Singapour, le numéro d'enregistrement de l'entreprise correspondant doit être spécifié OU la carte d'identité du contact pour une présence locale à Singapour (Format : S1234567D).";
$_LANG["cnrxsgadminsingpassid"] = "Admin, ID SingPass";
$_LANG["cnrxsgadminsingpassiddescr"] = "La carte d'identité du contact (ID SingPass) du contact administratif<br/>(pour les <u>particuliers</u> singapouriens uniquement, Format : S1234567D)";

// ----------------------------------------------------------------------
// ------------------ .SK Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxskcontactlegalform"] = "Titulaire, Forme Juridique";
$_LANG["cnrxskcontactlegalformdescr"] = "";
// $_LANG["cnrxskcontactlegalformcorp"] = "";
// $_LANG["cnrxskcontactlegalformpers"] = "";
$_LANG["cnrxskcontactidentnumber"] = "Titulaire, Numéro d'Entreprise";
$_LANG["cnrxskcontactidentnumberdescr"] = "Numéro de registre du commerce. Obligatoire pour les entreprises/organisations";

// ----------------------------------------------------------------------
// ------------------ .SWISS Fields -------------------------------------
// ----------------------------------------------------------------------
// see other .swiss fields at top of the file
$_LANG["cnrxswissuid"] = "Titulaire, UID ou UPI";
$_LANG["cnrxswissuiddescr"] = implode("", [
    "Le ...<ul>",
    "<li>UID (Numéro d'Identification Unique, Format: \"CHE-ddd.ddd.ddd\") pour les Organisations ou</li>",
    "<li>UPI (Identification Universelle de la Personne, Format: \"756.dddd.dddd.dd\") pour les Personnes Physiques</li>",
    "</ul>... du Titulaire (d = chiffre).<br/>",
    "Veuillez noter : Le nom de la personne et l'UPI ne sont PAS publiés dans le Whois/RDAP contrairement au nom de l'organisation et à l'UID, qui sont visibles."
]);
$_LANG["cnrxswissownertype"] = "Titulaire, Type";
$_LANG["cnrxswissownertypep"] = "Personne Physique";
$_LANG["cnrxswissownertypeo"] = "Organisation / Entité Juridique";
$_LANG["cnrxswissownertypedescr"] = "Le Type d'Identité du Titulaire.";

// ----------------------------------------------------------------------
// ------------------ .TRAVEL Fields ------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxtravelindustry"] = "Industrie du Voyage";
$_LANG["cnrxtravelindustryn"] = $_LANG["cnr0"];
$_LANG["cnrxtravelindustryy"] = $_LANG["cnr1"];
$_LANG["cnrxtravelindustrydescr"] = "Je confirme que le titulaire est membre de l'industrie du voyage et possède un identifiant de membre valide.";

// ----------------------------------------------------------------------
// ------------------ .UK Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxukownercorporatetype"] = "Titulaire, Type d'Entreprise";
$_LANG["cnrxukownercorporatetypedescr"] = "";
$_LANG["cnrxukownercorporatetypeother"] = "Autre";
$_LANG["cnrxukownercorporatetypefother"] = "Autre (Non-UK)";
$_LANG["cnrxukownercorporatetypeind"] = "Individu";
$_LANG["cnrxukownercorporatetypefind"] = "Individu (Non-UK)";
$_LANG["cnrxukownercorporatetypefcorp"] = "Société (Non-UK)";
// $_LANG["cnrxukownercorporatetypeltd"] = "LTD";
// $_LANG["cnrxukownercorporatetypeplc"] = "PLC";
// $_LANG["cnrxukownercorporatetypellp"] = "LLP";
// $_LANG["cnrxukownercorporatetypeip"] = "IP";
$_LANG["cnrxukownercorporatetypecrc"] = "Entreprise par Charte Royale";
$_LANG["cnrxukownercorporatetypegov"] = "Organisme Gouvernemental";
$_LANG["cnrxukownercorporatetypeptnr"] = "Partenariat UK";
$_LANG["cnrxukownercorporatetyperchar"] = "Charité Enregistrée";
$_LANG["cnrxukownercorporatetypesch"] = "École";
$_LANG["cnrxukownercorporatetypestat"] = "Organisme Statutaire";
$_LANG["cnrxukownercorporatetypestra"] = "Auto-Entrepreneur";
$_LANG["cnrxukownercorporatenumber"] = "Titulaire, Numéro d'Entreprise";
$_LANG["cnrxukownercorporatenumberdescr"] = "Numéro d'enregistrement auprès de Companies House UK";

// ----------------------------------------------------------------------
// ------------------ .US Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxusnexusapppurpose"] = "US Nexus, But de l'application";
$_LANG["cnrxusnexusapppurposep1"] = "Usage commercial à but lucratif";
$_LANG["cnrxusnexusapppurposep2"] = "Entreprise à but non lucratif, Club, Association, Organisation religieuse, etc.";
$_LANG["cnrxusnexusapppurposep3"] = "Usage personnel";
$_LANG["cnrxusnexusapppurposep4"] = "Objectifs éducatifs";
$_LANG["cnrxusnexusapppurposep5"] = "Objectifs gouvernementaux";
$_LANG["cnrxusnexusapppurposedescr"] = "";
$_LANG["cnrxusnexuscategory"] = "US Nexus, Catégorie";
$_LANG["cnrxusnexuscategoryc11"] = "[C11] Citoyen américain";
$_LANG["cnrxusnexuscategoryc12"] = "[C12] Résident permanent américain";
$_LANG["cnrxusnexuscategoryc21"] = "[C21] Organisation américaine";
$_LANG["cnrxusnexuscategoryc31"] = "[C31] Entité étrangère avec activités aux États-Unis";
$_LANG["cnrxusnexuscategoryc32"] = "[C32] Entité étrangère avec bureau aux États-Unis";
$_LANG["cnrxusnexuscategorydescr"] = "Catégorisation de l'entité demandant l'application.<br/>Remarque : Les possessions et territoires des États-Unis sont également inclus.";
$_LANG["cnrxusnexusvalidator"] = "US Nexus, Pays";
$_LANG["cnrxusnexusvalidatordescr"] = "Spécifiez le code pays à deux lettres du titulaire (si la catégorie Nexus est C31 ou C32)";

// ----------------------------------------------------------------------
// ------------------ .XXX Fields ---------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxxxxcommunityid"] = "ID de membre de la communauté";
$_LANG["cnrxxxxcommunityiddescr"] = "ID de membre de la communauté sponsorisée .XXX";
$_LANG["cnrxxxxdefensive"] = "Enregistrement défensif<br/>(Domaine non résolu)";
$_LANG["cnrxxxxdefensive0"] = $_LANG["cnr0"];
$_LANG["cnrxxxxdefensive1"] = $_LANG["cnr1"];
$_LANG["cnrxxxxdefensivedescr"] = implode("", [
    "Je confirme que le domaine est un enregistrement défensif. ",
    "L'enregistrement défensif consiste à enregistrer des noms de domaine, ",
    "souvent sur plusieurs TLD et dans divers formats grammaticaux, ",
    "dans le but principal de protéger la propriété intellectuelle ou la marque contre les abus, ",
    "tels que le cybersquattage. Il est défini comme un enregistrement qui n'est pas unique, ne résout pas, ",
    "redirige le trafic vers un enregistrement principal ou ne contient pas de contenu unique.<br/>",
    "Remarque : si non sélectionné, le domaine sera considéré comme un enregistrement défensif."
]);

// #########################################################################
// #########################################################################
// # Add reusable translations for ALL PROVIDERS                           #
// #########################################################################
// #########################################################################

// ----------------------------------------------------------------------
// ----------------------- DNSSEC MANAGEMENT ----------------------------
// ----------------------------------------------------------------------
$_LANG["cnicdnssecmanagement"] = "Gestion DNSSEC";




// #########################################################################
// #########################################################################
// # Add translations for ISPAPI registrar module additional domain fields #
// #########################################################################
// #########################################################################

// Terms and Conditions Fields, prefixed with hxflagstac
$_LANG["hxflagstacagreement"] = "Accord";
$_LANG["hxflagstacagreementindiv"] = "Conditions pour les particuliers";
$_LANG["hxflagstactrustee"] = "Service de présence locale";
$_LANG["hxflagstachighlyregulated"] = "TLD hautement réglementé";
$_LANG["hxflagstachighlyregulateddescrdefault"] = ("Cochez cette case pour confirmer que vous certifiez que le titulaire est admissible à enregistrer ce domaine et que toutes les " .
    "informations fournies sont véridiques et exactes. Les critères d'admissibilité peuvent être consultés <a href=\"{TAC}\" target=\"_blank\">ici</a>."
);
$_LANG["hxflagstachighlyregulateddescreco"] = ($_LANG["hxflagstachighlyregulateddescrdefault"] .
    "<br/>Tout les noms de domaine .ECO seront d'abord enregistrés avec le statut \"Server hold\" en attendant l'achèvement des exigences minimales du profil Eco, " .
    "à savoir, le titulaire du .ECO 1) affirmant sa conformité avec la politique d'éligibilité écologique et 2) s'engagant à soutenir un changement positif pour " .
    "la planète et à être honnête lors du partage d'informations sur ses actions environnementales. Le titulaire recevra par courriel des instructions sur la " .
    "façon de créer un profil .ECO. Une fois ces étapes terminées, le nom de domaine .ECO sera immédiatement activé par le registre."
);
$_LANG["hxflagstachighlyregulateddescrcoop"] = ("Je, le déclarant, comprends, accepte et certifie que mon organisation répond à au moins une des conditions d'éligibilité {TLD} :" .
    "<ul>" .
    "<li>une coopérative détenue par ses membres et contrôlée démocratiquement, conformément aux 7 principes coopératifs internationaux ; ou</li>" .
    "<li>une Association composée de coopératives; ou</li>" .
    "<li>une Organisation contrôlée majoritairement par une Coopérative ; ou</li>" .
    "<li>une Entité dont les opérations sont principalement dédiées au service des Coopératives.</li>" .
    "</ul>" .
    "Je comprends et j'accepte que DotCooperation LLC effectue des audits des enregistrements de domaine {TLD} et se réserve le droit d'annuler ou de modifier un nom de domaine conformément à ses politiques."
);
$_LANG["hxflagstachighlyregulateddescrnotac"] = ("Cochez cette case pour confirmer les <b>garanties pour les TLD hautement réglementés</b>:<br/>" .
    "<div style=\"text-align:justify\">Vous comprenez et acceptez que vous vous conformerez à ces conditions supplémentaires:" .
    "<ol><li>Coordonnées administratives. Vous acceptez de fournir les coordonnées administratives, qui doivent être mises à jour " .
    "pour la notification des plaintes ou des rapports d'abus d'enregistrement, ainsi que les coordonnées des organismes de réglementation " .
    "ou d'autorégulation de l'industrie concernés dans leur lieu d'affaires principal.</li>" .
    "<li>Représentation. Vous confirmez et déclarez que vous possédez toutes les autorisations, chartes, licences et / ou autres informations " .
    "d'identification nécessaires pour participer au secteur associé à un tel TLD hautement réglementé.</li>" .
    "<li>Rapport des changements d'autorisation, chartes, licences, informations d'identification. Vous acceptez de signaler tout changement " .
    "important à la validité de vos autorisations, chartes, licences et/ou autres informations d'identification connexes pour la participation dans " .
    "le secteur associé au TLD hautement réglementé afin de vous assurer de continuer à vous conformer aux réglementations et exigences de licence appropriées " .
    "et de mener généralement vos activités dans l'intérêt des consommateurs que vous servez..</li></ol></div>"
);
$_LANG["hxflagstacindividualregulateddescrdefault"] = "Cochez pour confirmer les <a href=\"{TAC}\" target=\"_blank\">conditions pour les particuliers</a>";
$_LANG["hxflagstacregulateddescrdefault"] = "Cochez cette case pour confirmer que vous acceptez les <a href=\"{TAC}\" target=\"_blank\">conditions d'enregistrement du registre</a> lors d'un nouvel enregistrement de noms de domaine {TLD}.";
$_LANG["hxflagstacregulateddescrcira"] = ("<div style=\"text-align:justify\">Cochez pour confirmer que vous acceptez <a href=\"{TAC}\" target=\"_blank\">le contrat CIRA d'enregistrement</a> " .
    "et que CIRA peut, de temps à autre et à sa discrétion, modifier tout ou partie des termes et conditions du contrat CIRA d'enregistrement, " .
    "comme CIRA le juge approprié, en affichant un avis des changements sur le site Web de CIRA et en envoyant un avis de tout changement " .
    "important au titulaire. Vous remplissez toutes les exigences de l'entente de titulaire pour être un titulaire, pour demander l'enregistrement " .
    "d'un enregistrement de nom de domaine et pour détenir et maintenir un enregistrement de nom de domaine, y compris, sans s'y limiter, " .
    "les exigences de présence au Canada pour les titulaires de CIRA, <a href=\"https://static.cira.ca/policy/canadian-presence-requirements-for-registrants.pdf\" target=\"_blank\">ici</a>. " .
    "CIRA recueillera, utilisera et divulguera vos renseignements personnels, comme indiqué dans la politique de confidentialité de CIRA, " .
    "<a href=\"https://www.cira.ca/policy/corporate/cira-privacy-policy\" target=\"_blank\">ici</a>.</div>"
);
$_LANG["hxflagstacregulateddescrngo"] = ($_LANG["hxflagstacregulateddescrdefault"] .
    "<div style=\"padding:10px 0px;\">L'enregistrement d'un nom de domaine {TLD} est livré avec un nom de domaine .ONG sans frais supplémentaires. Les modifications " .
    "sur le domaine {TLD} seront automatiquement appliquées au domaine .ONG. Vous ne trouverez donc pas le domaine .ONG répertorié dans votre inventaire de domaines.</div>"
);
$_LANG["hxflagstacregulateddescritsection3"] = ("Cochez cette case pour confirmer que vous acceptez la <b><a href=\"{TAC}\" target=\"_blank\">Section 3 - Declarations and Assumptions of Liability</a></b>.<br/>" .
    "<div style=\"text-align:justify;margin-bottom:10px;\">" .
    "Le titulaire du nom de domaine en question déclare sous sa propre responsabilité qu'il est:" .
    "<ul><li>en possession de la citoyenneté ou qu'il réside dans un pays appartenant à l'Union européenne (dans le cas de l'enregistrement des personnes physiques);</li>" .
    "<li>établi dans un pays appartenant à l'Union Européenne (dans le cas de l'enregistrement pour d'autres organisations);</li>" .
    "<li>conscient et accepte que l'enregistrement et la gestion d'un nom de domaine sont soumis aux <a href=\"{TAC}\" target=\"_blank\">'Management of synchronous operations on domain names of the ccTLD {TLD} - Guidelines'</a> " .
    "et aux <a href=\"{TAC}\" target=\"_blank\">'Dispute resolution in the ccTLD {TLD} - Regulations & Guidelines'</a> et leurs modifications ultérieures;</li>" .
    "<li>conscient du droit à l'utilisation et/ou de la disponibilité du nom de domaine demandé, et qu'ils ne portent pas atteinte, à la demande d'enregistrement, les droits d'autrui;</li>" .
    "<li>conscient que l'inclusion de données à caractère personnel dans la base de données des noms de domaine attribués, et leur éventuelle diffusion et accessibilité via Internet, le consentement doit être " .
    "donné explicitement en cochant les cases appropriées dans les informations ci-dessous. Voir: <a href=\"{TAC}\" target=\"_blank\">'the DBNA and WHOIS Policy'</a>;</li>" .
    "<li>conscient et accepte qu'en cas de déclarations erronées ou fausses dans cette demande, le registre doit immédiatement révoquer le nom de domaine, ou procéder à d'autres actions en justice. " .
    "Dans ce cas la révocation ne peut en aucune façon donner lieu à des réclamations contre le registre;</li>" .
    "<li>dégage le registre de toute responsabilité résultant de l'attribution et l'utilisation du nom de domaine par la personne physique qui en a fait la demande;</li>" .
    "<li>accepte la juridiction italienne et les lois de l'état italien.</li></ul>" .
    "</div>"
);
$_LANG["hxflagstacregulateddescritsection5"] = ("Cocher la case pour confirmer que vous acceptez la <b><a href=\"{TAC}\" target=\"_blank\">Section 5 - Consent to the processing of personal data for registration</b></a><br/>" .
    "<div style=\"text-align:justify;margin-bottom:10px;\">" .
    "La partie intéressée, après avoir lu la divulgation ci-dessus, donne son consentement au traitement des informations requises pour l'enregistrement, tel que défini dans la divulgation ci-dessus. " .
    "Le consentement est facultatif, mais si aucun consentement n'est donné, il ne sera pas possible de finaliser l'enregistrement, la cession et la gestion du nom de domaine.</div>"
);
$_LANG["hxflagstacregulateddescritsection6"] = ("Cocher la case pour confirmer que vous acceptez la <b><a href=\"{TAC}\" target=\"_blank\">Section 6 - Consent to the processing of personal data for diffusion and accessibility via the Internet</b></a><br/>" .
    "<div style=\"text-align:justify;margin-bottom:10px;\">" .
    "La partie intéressée, après avoir lu la divulgation ci-dessus, donne son consentement à la diffusion et à l'accessibilité via Internet, telles que définies dans la divulgation ci-dessus. Le consentement est " .
    "facultatif, mais l'absence de consentement ne permet pas la diffusion et l'accessibilité des données Internet.</div>"
);
$_LANG["hxflagstacregulateddescritsection7"] = ("Cocher la case pour confirmer que vous acceptez la <b><a href=\"{TAC}\" target=\"_blank\">Section 7 - Explicit Acceptance of the following points</b></a><br/>" .
    "<div style=\"text-align:justify;margin-bottom:10px;\">" .
    "Pour l'acceptation explicite, les parties intéressés déclarent qu'ils:" .
    "<ul><li>d) sont conscients et conviennent que l'enregistrement et la gestion d'un nom de domaine sont soumis aux règles <a href=\"{TAC}\" target=\"_blank\">'Management of " .
    "synchronous operations on domain names of the ccTLD {TLD} - Guidelines'</a> et <a href=\"{TAC}\" target=\"_blank\">'Dispute resolution in the ccTLD {TLD} - " .
    "Regulations & Guidelines'</a> et leurs modifications ultérieures;</li>"  .
    "<li>e) sont conscients et conviennent qu'en cas de déclarations erronées ou fausses dans cette demande, le registre doit immédiatement révoquer le nom de domaine, ou procéder à d'autres actions en justice. " .
    "Dans ce cas la révocation ne peut en aucune façon donner lieu à des réclamations contre le registre;</li>" .
    "<li>f) dégagent le registre de toute responsabilité résultant de l'attribution et l'utilisation du nom de domaine par la personne physique qui en a fait la demande;</li>" .
    "<li>g) acceptent la juridiction italienne et les lois de l'Etat italien.</li></ul></div>"
);
$_LANG["hxflagstacregulateddescrgoogle"] = ("Vous reconnaissez que {TLD} est un espace de noms sécurisé, ce qui signifie que les noms de domaine {TLD} nécessitent un certificat SSL pour fonctionner. " .
    "Les sites Web utilisant un nom de domaine {TLD} ne sont accessibles que par les navigateurs Web utilisant HTTPS via une connexion cryptée et sécurisée."
);

// Generic Fields, prefixed with hxflags
$_LANG["hxflagsintendeduse"] = "Utilisation prévue";
$_LANG["hxflagsyesnoyes"] = "Oui";
$_LANG["hxflagsyesnono"] = "Non";
$_LANG["hxflagsyesnoy"] = "Oui";
$_LANG["hxflagsyesnon"] = "Non";
$_LANG["hxflagsyesno1"] = "Oui";
$_LANG["hxflagsyesno0"] = "Non";

$_LANG["hxflagslegaltype"] = "Type juridique";
$_LANG["hxflagslegaltypeindiv"] = "Particulier";
$_LANG["hxflagslegaltypeorg"] = "Organisation";
$_LANG["hxflagsapplicationpurpose"] = "Cas d'utilisation";
$_LANG["hxflagsregistrantidnumber"] = "N° d'identification du titulaire";
$_LANG["hxflagsregistrantvatid"] = "N° de TVA du titulaire";
$_LANG["hxflagsadminidnumber"] = "N° d'identification du contact administratif";
$_LANG["hxflagsadminvatid"] = "N° de TVA du contact administratif";
$_LANG["hxflagstechidnumber"] = "N° d'identification du contact technique";
$_LANG["hxflagstechvatid"] = "N° de TVA du contact technique";
$_LANG["hxflagsbillingidnumber"] = "N° d'identification du contact facturation";
$_LANG["hxflagsregistrantidtype"] = "Type de N° d'identification du titulaire";
$_LANG["hxflagsallocationtoken"] = "Token d'allocation du registre";
$_LANG["hxflagsallocationtokendescr"] = ("Pour enregistrer un domaine {TLD}, vous devez fournir le token d'allocation émis par le registre. " .
    "Veuillez remplir la <a href=\"{TAC}\" target=\"_blank\">demande d'enregistration</a> pour obtenir le token."
);
$_LANG["hxflagsnexuscategory"] = "Catégorie Nexus";
$_LANG["hxflagsnexuscountry"] = "Pays Nexus";
$_LANG["hxflagsfax"] = "Fax requis";
$_LANG["hxflagsfaxregistrationdescr"] = "Je confirme qu'après cette demande d'enregistration, j'enverrai <a href=\"{FAXFORM}\" target=\"_blank\">ce formulaire</a> pour terminer ce processus.";
$_LANG["hxflagsfaxtransferdescr"] = "Je confirme qu'après cette demande de transfert, j'enverrai <a href=\"{FAXFORM}\" target=\"_blank\">ce formulaire</a> pour terminer ce processus.";
$_LANG["hxflagsidentificationnumber"] = "N° d'identification";
$_LANG["hxflagswhoisoptout"] = "Désactivation du WHOIS";
$_LANG["hxflagsregistrantbirthdate"] = "Date de naissance du titulaire";

// AFNIC TLDs, prefixed with hxflagsafnic
// Individuals
// reusing .ru translations for birthday
$_LANG["hxflagsafnictldregistrantbirthplace"] = "Lieu de naissance";
$_LANG["hxflagsafnictldregistrantbirthplacedescr"] = "(requis pour les particuliers)";
// Companies
$_LANG["hxflagsafnictldvatid"] = "N° TVA/SIREN/SIRET";
$_LANG["hxflagsafnictldvatiddescr"] = "(Uniquement pour les entreprises avec n° de TVA/SIREN/SIRET)";
$_LANG["hxflagsafnictldtrademark"] = "Marque déposée N°";
$_LANG["hxflagsafnictldtrademarkdescr"] = "(Uniquement pour les entreprises ayant une marque déposée européenne)";
$_LANG["hxflagsafnictldduns"] = "N° DUNS";
$_LANG["hxflagsafnictlddunsdescr"] = "(Uniquement pour les entreprises avec DUNS n°)";
$_LANG["hxflagsafnictldlocalid"] = "ID Local";
$_LANG["hxflagsafnictldlocaliddescr"] = "(Uniquement pour les entreprises avec identifiant local)";
// French Association, Data from Journal officiel [JO]
$_LANG["hxflagsafnictldjodod"] = "Date de la déclaration au Journal Officiel [JO]";
$_LANG["hxflagsafnictldjododdescr"] = "(Uniquement pour les associations françaises, format: <b>AAAA-MM-JJ</b>)";
$_LANG["hxflagsafnictldjonumber"] = "N° [JO]";
$_LANG["hxflagsafnictldjonumberdescr"] = "(Uniquement pour les associations françaises, le n° du Journal Officiel)";
$_LANG["hxflagsafnictldjopage"] = "Publication [JO]";
$_LANG["hxflagsafnictldjopagedescr"] = "(Uniquement pour les associations françaises, la page de l'annonce au Journal Officiel)";
$_LANG["hxflagsafnictldjodop"] = "Date de publication [JO]";
$_LANG["hxflagsafnictldjodopdescr"] = "(Uniquement pour les associations françaises, la date de publication au Journal Officiel; format: <b>AAAA-MM-JJ</b>)";
// Options, Legal Type
$_LANG["hxflagsafnictldlegaltypeindiv"] = "Particulier";
$_LANG["hxflagsafnictldlegaltypeorg1"] = "Société avec n° TVA/SIREN/SIRET";
$_LANG["hxflagsafnictldlegaltypeorg2"] = "Société avec marque déposée européenne";
$_LANG["hxflagsafnictldlegaltypeorg3"] = "Société avec n° DUNS";
$_LANG["hxflagsafnictldlegaltypeorg4"] = "Identifiant local de la société";
$_LANG["hxflagsafnictldlegaltypeass"] = "Association française";

// .AERO
$_LANG["hxflagsaerotldaeroid"] = ".AERO ID <sup style=\"cursor:help;\" title=\"Voir https://www.information.aero/\">Qu'est ce que c'est?</sup>";
$_LANG["hxflagsaerotldaerokey"] = ".AERO Key <sup style=\"cursor:help;\" title=\"Voir https://www.information.aero/\">Qu'est ce que c'est?</sup>";

// .BE
$_LANG["hxflagsbetldtradeauthdescr"] = "Le changement de titulaire nécessite un code EPP valide. Ceci s'applique lors du changement du nom, de l'organisation ou de l'adresse e-mail du titulaire.";

// .CA
$_LANG["hxflagscatldcontactlanguage"] = "Langue du contact";
$_LANG["hxflagscatldregistryinformation"] = "Information du registre";
$_LANG["hxflagscatldregistryinformationdescr"] = ("Chaque fois que vous enregistrez un domaine {TLD} pour un nouveau titulaire (ou changez le titulaire pour un nouveau), ce nouveau titulaire doit " .
    "accepter le contrat en 7 jours pour que le domaine devienne actif. Sinon, le domaine est supprimé par le registre sans aucun remboursement. " .
    "<br/><b>Ce n'est que dans un tel cas qu'un courriel de confirmation sera envoyé au nouveau titulaire couvrant les étapes nécessaires pour accepter le présent contrat.</b><br/>" .
    "Si ce titulaire a déjà été confirmé auparavant le domaine sera enregistré en temps réel."
);
// Options, Legal Type
$_LANG["hxflagscatldlegaltypecco"] = "Société";
$_LANG["hxflagscatldlegaltypecct"] = "Citoyen canadien";
$_LANG["hxflagscatldlegaltyperes"] = "Résident permanent du Canada";
$_LANG["hxflagscatldlegaltypegov"] = "Gouvernement ou entité gouvernementale au Canada";
$_LANG["hxflagscatldlegaltypeedu"] = "Établissement d'enseignement canadien";
$_LANG["hxflagscatldlegaltypeass"] = "Associations canadienne non incorporées";
$_LANG["hxflagscatldlegaltypehos"] = "Hôpital canadien";
$_LANG["hxflagscatldlegaltypeprt"] = "Partenariat enregistré au Canada";
$_LANG["hxflagscatldlegaltypetdm"] = "Marque déposée enregistrée au Canada (par un propriétaire non canadien)";
$_LANG["hxflagscatldlegaltypetrd"] = "Syndicat canadien";
$_LANG["hxflagscatldlegaltypeplt"] = "Parti politique canadien";
$_LANG["hxflagscatldlegaltypelam"] = "Bibliothèque, archives ou musée canadien";
$_LANG["hxflagscatldlegaltypetrs"] = "Compagnie d'assurance établie au Canada";
$_LANG["hxflagscatldlegaltypeabo"] = "Peuples autochtones (individus ou groupes) autochtones du Canada";
$_LANG["hxflagscatldlegaltypeinb"] = "Bande indienne reconnue par la Loi sur les Indiens du Canada";
$_LANG["hxflagscatldlegaltypelgr"] = "Représentant légal d'un citoyen canadien ou d'un résident permanent";
$_LANG["hxflagscatldlegaltypeomk"] = "Marque officielle enregistrée au Canada";
$_LANG["hxflagscatldlegaltypemaj"] = "Sa Majesté la Reine";
// Legal Type Description, don't move it up.
$_LANG["hxflagscatldlegaltypedescr"] = ("<p>Le registre canadien (`CIRA`) s'engage à protéger la confidentialité des renseignements personnels dans le cadre de son fonctionnement et de l'administration du nom de domaine.</p>" .
    "<p>Les personnes inscrites dans les catégories de présence canadienne suivantes sont considérées comme des individus:</p>" .
    "<ul>" .
    "<li>" . $_LANG["hxflagscatldlegaltypecct"] . "</li>" .
    "<li>" . $_LANG["hxflagscatldlegaltyperes"] . "</li>" .
    "<li>" . $_LANG["hxflagscatldlegaltypelgr"] . "</li>" .
    "<li>" . $_LANG["hxflagscatldlegaltypeabo"] . "</li>" .
    "</ul>" .
    "<p>Toutes les autres catégories sont considérées comme des déclarants non individuels et ne sont pas autorisées à modifier leurs paramètres de confidentialité WHOIS. Pour les non-particuliers, " .
    "les données de contact sont publiques et sont publiées dans le WHOIS par le registre. Les individus peuvent choisir en utilisant le champ `" . $_LANG["hxflagswhoisoptout"] . "` ci-dessous.</p>"
);

// .CN
// Options, Registrant ID Type
$_LANG["hxflagscntldregistrantidtypesfz"] = "Carte d'identité chinoise";
$_LANG["hxflagscntldregistrantidtypehz"] = "Passeport étranger";
$_LANG["hxflagscntldregistrantidtypegajmtx"] = "Permis de sortie et d'entrée pour voyager vers et de Hong Kong et Macao";
$_LANG["hxflagscntldregistrantidtypetwjmtx"] = "Passeports des résidents de Taiwan pour entrer ou sortir du continent";
$_LANG["hxflagscntldregistrantidtypewjlsfz"] = "Carte d'identité de résident permanent étranger";
$_LANG["hxflagscntldregistrantidtypegajzz"] = "Permis de résidence pour les résidents de Hong Kong / Macao";
$_LANG["hxflagscntldregistrantidtypetwjzz"] = "Permis de résidence pour les résidents de Taiwan";
$_LANG["hxflagscntldregistrantidtypejgz"] = "Certificat d'officier chinois";
$_LANG["hxflagscntldregistrantidtypeorg"] = "Certificat de code d'organisation chinois";
$_LANG["hxflagscntldregistrantidtypeyyzz"] = "Licence commerciale chinoise";
$_LANG["hxflagscntldregistrantidtypetydm"] = "Certificat USCC";
$_LANG["hxflagscntldregistrantidtypebddm"] = "Désignation du code militaire";
$_LANG["hxflagscntldregistrantidtypejddwfw"] = "Licence de service externe payé par militaire";
$_LANG["hxflagscntldregistrantidtypesydwfr"] = "Certificat d'une personne morale d'établissement public";
$_LANG["hxflagscntldregistrantidtypewgczjg"] = "Certificat d'inscription des bureaux de représentation résidents des entreprises étrangères";
$_LANG["hxflagscntldregistrantidtypeshttfr"] = "Certificat d'inscription d'une personne morale d'une organisation sociale";
$_LANG["hxflagscntldregistrantidtypezjcs"] = "Certificat d'inscription d'un site d'activités religieuses";
$_LANG["hxflagscntldregistrantidtypembfqy"] = "Certificat d'inscription d'une entité privée non-enterprise";
$_LANG["hxflagscntldregistrantidtypejjhfr"] = "Certificat d'inscription d'une personne morale d'une fondation";
$_LANG["hxflagscntldregistrantidtypelszy"] = "Permis De pratique du cabinet d'avocats";
$_LANG["hxflagscntldregistrantidtypewgzhwh"] = "Certificat d'inscription du centre culturel étranger en Chine";
$_LANG["hxflagscntldregistrantidtypewlczjg"] = "Certificat d'inscription des représentations résidentes des services touristiques d'un gouvernement étrangers";
$_LANG["hxflagscntldregistrantidtypesfjd"] = "Licence d'expertise judiciaire";
$_LANG["hxflagscntldregistrantidtypejwjg"] = "Certificat d'organisation à l'étranger";
$_LANG["hxflagscntldregistrantidtypeshfwjg"] = "Certificat d'inscription d'agence de service social";
$_LANG["hxflagscntldregistrantidtypembxxbx"] = "Permis d'école privée";
$_LANG["hxflagscntldregistrantidtypeyljgzy"] = "Permis de pratique d'établissement médical";
$_LANG["hxflagscntldregistrantidtypegzjgzy"] = "Licence de notaire";
$_LANG["hxflagscntldregistrantidtypebjwsxx"] = "Permis de l'école Bejing pour les enfants du personnel diplomatique étranger en Chine";
$_LANG["hxflagscntldregistrantidtypeqttydm"] = "Autres - Certificat pour le Code Uniforme du Crédit Social";
$_LANG["hxflagscntldregistrantidtypeqt"] = "Autres";

// .COM.AU
// Options, Registrant ID Type
$_LANG["hxflagsautldregistrantidtypeabn"] = "N° d'entreprise australien";
$_LANG["hxflagsautldregistrantidtypeacn"] = "N° de société australien";
$_LANG["hxflagsautldregistrantidtyperbn"] = "N° d'enregistrement commercial";
$_LANG["hxflagsautldregistrantidtypetm"] = "Marque N°";

// .COM.BR
$_LANG["hxflagscombrtldidentificationnumberdescr"] = "Veuillez fournir vos numéros CPF ou CNPJ qui sont émis par le ministère du revenu fédéral du Brésil à des fins fiscales";

// .DE
$_LANG["hxflagsdetldgeneralrequestcontact"] = "Contact de demande générale";
$_LANG["hxflagsdetldabuseteamcontact"] = "Contact de l'équipe d'abus";
$_LANG["hxflagsdetldgeneralrequestcontactdescr"] = "Le registre identifiera ces informations comme coordonnées générales de la demande. Vous pouvez fournir une adresse e-mail ou une URL de site Web.";
$_LANG["hxflagsdetldabuseteamcontactdescr"] = "Le registre identifiera ces informations comme les coordonnées de l'équipe chargée des abus. Vous pouvez fournir une adresse e-mail ou une URL de site Web.";

// .DK
$_LANG["hxflagsdktldregistrantcontact"] = "Contact du titulaire";
$_LANG["hxflagsdktldregistrantlegaltype"] = "Type juridique du titulaire";
$_LANG["hxflagsdktldregistrantvatiddescr"] = "(requis en cas d'option choisie `Organisation`)";
$_LANG["hxflagsdktldadminvatiddescr"] = "(requis en cas d'option choisie `Organisation`)";
$_LANG["hxflagsdktldregistrantlegaltypeindiv"] = "Particulier";
$_LANG["hxflagsdktldregistrantlegaltypeorg"] = "Société";
$_LANG["hxflagsdktldadmincontact"] = "Contact administrateur";
$_LANG["hxflagsdktldadminlegaltype"] = "Type juridique de l'administrateur";
$_LANG["hxflagsdktldadminlegaltypeindiv"] = "Particulier";
$_LANG["hxflagsdktldadminlegaltypeorg"] = "Société";
$_LANG["hxflagsdktldlegaltypedescr"] = "Choisissez également `Particulier` au cas où vous êtes une entreprise sans VATID (Les données de l'entreprise seront ensuite supprimées lors du processus d'enregistrement).";
$_LANG["hxflagsdktldregistrantlegaltypedescr"] = $_LANG["hxflagsdktldlegaltypedescr"] . "<div style=\"margin-top:10px\"><b>Remarque pour les inscrits:</b> DK Hostmaster demandera la confirmation par e-mail. Veuillez vérifier votre boîte de réception ainsi que votre dossier spam et confirmer dans les 4 jours.</div>";
$_LANG["hxflagsdktldcontactdescr"] = "DK-HOSTMASTER Identifiant d'utilisateur";

// .ES
$_LANG["hxflagsestldregistranttype"] = "Contact du titulaire";
$_LANG["hxflagsestldregistrantidentificationnumber"] = "N° d'identification du titulaire";
$_LANG["hxflagsestldadmintype"] = "Type de contact administrateur";
$_LANG["hxflagsestldadminidentificationnumber"] = "N° d'identification du contact administrateur";
$_LANG["hxflagsestldlegalform"] = "Type juridique du titulaire";
// Options, Legal Type
$_LANG["hxflagsestldlegalform1"] = "Particulier";
$_LANG["hxflagsestldlegalform39"] = "Groupement d'intérêt économique";
$_LANG["hxflagsestldlegalform47"] = "Association";
$_LANG["hxflagsestldlegalform59"] = "Association sportive";
$_LANG["hxflagsestldlegalform68"] = "Association professionelle";
$_LANG["hxflagsestldlegalform124"] = "Caisse d'épargne";
$_LANG["hxflagsestldlegalform150"] = "Propriété de la communauté";
$_LANG["hxflagsestldlegalform152"] = "Communauté de propriétaires";
$_LANG["hxflagsestldlegalform164"] = "Ordre ou institution religieuse";
$_LANG["hxflagsestldlegalform181"] = "Consulat";
$_LANG["hxflagsestldlegalform197"] = "Association de droit public";
$_LANG["hxflagsestldlegalform203"] = "Ambassade";
$_LANG["hxflagsestldlegalform229"] = "Autorité locale";
$_LANG["hxflagsestldlegalform269"] = "Fédération sportive";
$_LANG["hxflagsestldlegalform286"] = "Fondation";
$_LANG["hxflagsestldlegalform365"] = "Compagnie d'assurance mutuelle";
$_LANG["hxflagsestldlegalform434"] = "Organisation gouvernementale régionale";
$_LANG["hxflagsestldlegalform436"] = "Organisation gouvernementale centrale";
$_LANG["hxflagsestldlegalform439"] = "Parti politique";
$_LANG["hxflagsestldlegalform476"] = "Syndicat";
$_LANG["hxflagsestldlegalform510"] = "Partenariat agricole";
$_LANG["hxflagsestldlegalform524"] = "Société anonyme";
$_LANG["hxflagsestldlegalform525"] = "Association sportive";
$_LANG["hxflagsestldlegalform554"] = "Société civile";
$_LANG["hxflagsestldlegalform560"] = "Partenariat générale";
$_LANG["hxflagsestldlegalform562"] = "Partenariat générale et limité";
$_LANG["hxflagsestldlegalform566"] = "Coopération";
$_LANG["hxflagsestldlegalform608"] = "Société détenue par les employés";
$_LANG["hxflagsestldlegalform612"] = "Société anonyme";
$_LANG["hxflagsestldlegalform713"] = "Bureau espagnol";
$_LANG["hxflagsestldlegalform717"] = "Alliance temporaire des entreprises";
$_LANG["hxflagsestldlegalform744"] = "Société anonyme détenue par les employés";
$_LANG["hxflagsestldlegalform745"] = "Entité publique régionale";
$_LANG["hxflagsestldlegalform746"] = "Entité publique nationale";
$_LANG["hxflagsestldlegalform747"] = "Entité publique locale";
$_LANG["hxflagsestldlegalform878"] = "Conseil de surveillance de l'appellation d'origine";
$_LANG["hxflagsestldlegalform879"] = "Entité gérant les espaces naturels";
$_LANG["hxflagsestldlegalform877"] = "Autres";
// Options, Registrant ID Type
$_LANG["hxflagsestldregistranttype0"] = "Pour le titulaire non espagnol";
$_LANG["hxflagsestldregistranttype1"] = "Pour une personne ou une organisation espagnole";
$_LANG["hxflagsestldregistranttype3"] = "Carte d'enregistrement pour étranger";
$_LANG["hxflagsestldregistranttype4"] = "Numéro de TVA";
$_LANG["hxflagsestldadmintype0"] = "Pour le titulaire non espagnol";
$_LANG["hxflagsestldadmintype1"] = "Pour une personne ou une organisation espagnole";
$_LANG["hxflagsestldadmintype3"] = "Carte d'enregistrement pour étranger";

// .EU
$_LANG["hxflagseutldregistrantcitizenship"] = "Citoyenneté du titulaire";
$_LANG["hxflagseutldregistrantcitizenshipdescr"] = "Requis uniquement si vous êtes un citoyen européen résidant (Particulier) en dehors de l'UE";
$_LANG["hxflagseutldlegaltypeindiv"] = $_LANG["hxflagslegaltypeindiv"];
$_LANG["hxflagseutldlegaltypeorg"] = $_LANG["hxflagslegaltypeorg"];

// .FI
$_LANG["hxflagsfitldregistrantidnumberdescr"] = ("<ul><li>Entreprises: veuillez indiquer le numéro d'enregistrement.</li>" .
    "<li>Particuliers finlandais: fournir le numéro d'identité.</li>" .
    "<li>Autres individus: laisser vide.</li></ul>" .
    "Pour les particuliers, veuillez noter que le X-FI-REGISTRANT-IDNUMBER doit contenir onze caractères dans le format JJMMAASZZZQ, " .
    "où JJMMAA est la date de naissance, S le signe du siècle, ZZZ le numéro individuel et Q le caractère de contrôle (somme de contrôle). " .
    "Le signe pour le siècle est soit + (1800–1899), - (1900–1999) ou A (2000–2099). Le nombre individuel ZZZ est impair pour les hommes et " .
    "les femmes et pour les personnes nées en Finlande, sa fourchette est de 002 à 899 (un plus grand nombre peut être utilisé dans des cas spéciaux). " .
    "Un exemple de code valide est 311280-888Y."
);
$_LANG["hxflagsfitldregistrantbirthdatedescr"] = "(AAAA-MM-JJ; requis uniquement pour les personnes ne venant pas de Finlande)";

// .HK
$_LANG["hxflagshktldregistrantdocumenttype"] = "Type de document du titulaire";
$_LANG["hxflagshktldregistrantotherdocumenttype"] = "Autre type de document du titulaire";
$_LANG["hxflagshktldregistrantdocumentnumber"] = "N° de document du titulaire";
$_LANG["hxflagshktldregistrantdocumentorigincountry"] = "Pays d'origine du document du titulaire";
$_LANG["hxflagshktldregistrantbirthdateforindividuals"] = "Date de naissance du titulaire pour les particuliers";
// Options, Registrant Document Type
$_LANG["hxflagshktldregistrantdocumenttypehkid"] = "Particulier - N° d'identité de Hong Kong";
$_LANG["hxflagshktldregistrantdocumenttypeothid"] = "Particulier - N° d'identité d'un autre pays";
$_LANG["hxflagshktldregistrantdocumenttypepassno"] = "Particulier - N° Passeport";
$_LANG["hxflagshktldregistrantdocumenttypebirthcert"] = "Particulier - Acte de naissance";
$_LANG["hxflagshktldregistrantdocumenttypeothidv"] = "Particulier - Autres documents";
$_LANG["hxflagshktldregistrantdocumenttypebr"] = "Société - Certificat d'enregistrement d'entreprise";
$_LANG["hxflagshktldregistrantdocumenttypeci"] = "Société - Certificat de constitution";
$_LANG["hxflagshktldregistrantdocumenttypecrs"] = "Société - Certificat d'inscription d'une école";
$_LANG["hxflagshktldregistrantdocumenttypehksarg"] = "Société - Département administratif de la Région administrative spéciale de Hong Kong";
$_LANG["hxflagshktldregistrantdocumenttypehkordinance"] = "Société - Ordonnance de Hong Kong";
$_LANG["hxflagshktldregistrantdocumenttypeothorg"] = "Société - Autres documents";
$_LANG["hxflagshktldregistrantdocumenttypedescr"] = ("(REMARQUE: En outre, vous devrez peut-être nous envoyer une copie du document par e-mail. Pour .HK, cette étape n'est requise que " .
    "sur demande du registre. Pour .COM.HK, une copie d'un certificat d'entreprise est requise avant de pouvoir procéder à l'enregistrement.)"
);
$_LANG["hxflagshktldregistrantotherdocumenttypedescr"] = "(requis pour les types de documents du déclarant `Autres documents`)";
$_LANG["hxflagshktldregistrantbirthdateforindividualsdescr"] = "(obligatoire pour les particuliers, format: AAAA-MM-JJ)";

// .IE
$_LANG["hxflagsietldregistrantclass"] = "Classification du titulaire";
$_LANG["hxflagsietldproofofconnectiontoireland"] = "Preuve de connexion à l'Irlande";
$_LANG["hxflagsietldproofofconnectiontoirelanddescr"] = ("Fournissez toute information à l'appui de votre demande d'inscription, telle qu'une preuve d'admissibilité (Ex. " .
    "TVA, RBN, CRO, CHY, NIC ou numéro de marque; numéro de rôle scolaire; lien vers la page des médias sociaux) " .
    "ou une brève explication de la raison pour laquelle vous voulez ce domaine et ce que vous allez en faire."
);
// Options, Registrant Class
$_LANG["hxflagsietldregistrantclasscompany"] = "Entreprise";
$_LANG["hxflagsietldregistrantclassbusinessowner"] = "Propriétaire d'entreprise";
$_LANG["hxflagsietldregistrantclassclubbandlocalgroup"] = "Club/Groupe/Groupe local";
$_LANG["hxflagsietldregistrantclassschoolcollege"] = "École/Collège";
$_LANG["hxflagsietldregistrantclassstateagency"] = "Agence d'état";
$_LANG["hxflagsietldregistrantclasscharity"] = "Charité";
$_LANG["hxflagsietldregistrantclassbloggerother"] = "Blogueur/Autre";

// .IT
$_LANG["hxflagsittldpin"] = ".IT PIN";
$_LANG["hxflagsittldpindescr"] = (
    "Si le déclarant est un <b>Particulier</b>, le code PIN .IT doit être:<ul>" .
    "<li>Le code fiscal du déclarant (pour les citoyens italiens composé d'exactement 16 caractères et chiffres) ou</li>" .
    "<li>Le numéro d'une pièce d'identité (pour les citoyens résidant dans d'autres États de l'UE, où il n'existe pas de code fiscal individuel équivalent).</li>" .
    "</ul>Si le déclarant est une <b>organisation</b>, le code PIN .IT doit être:<ul>" .
    "<li>Le code fiscal de l'entreprise (pour les entreprises italiennes composé d'exactement 11 chiffres) ou</li>" .
    "<li>Le numéro de TVA de l'entreprise</li></ul>"
);
$_LANG["hxflagsittldacceptsection3"] = "Section 3 du contrat d'enregistrement .IT";
$_LANG["hxflagsittldacceptsection5"] = "Section 5 du contrat d'enregistrement .IT";
$_LANG["hxflagsittldacceptsection6"] = "Section 6 du contrat d'enregistrement .IT";
$_LANG["hxflagsittldacceptsection7"] = "Section 7 du contrat d'enregistrement .IT";
$_LANG["hxflagsittldregistrantnationality"] = "Nationalité du titulaire";
$_LANG["hxflagsittldregistrantnationalitydescr"] = "(la nationalité du contact inscrit si elle est différente du code pays.)";
$_LANG["hxflagsittldregistrantlegaltype"] = "Type juridique du titulaire";
$_LANG["hxflagsittldregistrantlegaltype1"] = "[1] Personnes physiques italiennes et étrangères";
$_LANG["hxflagsittldregistrantlegaltype2"] = "[2] Entreprises / Sociétés monoparentales (IT)";
$_LANG["hxflagsittldregistrantlegaltype3"] = "[3] Travailleurs indépendants / Professionnels (IT)";
$_LANG["hxflagsittldregistrantlegaltype4"] = "[4] Associations à but non lucratif (IT)";
$_LANG["hxflagsittldregistrantlegaltype5"] = "[5] Organisations publiques (IT)";
$_LANG["hxflagsittldregistrantlegaltype6"] = "[6] Autres sujets (IT)";
$_LANG["hxflagsittldregistrantlegaltype7"] = "[7] Organisation d'un autre état membre de l'UE (correspondant à 2 - 6)";

// .JOBS
$_LANG["hxflagsjobstldyesnono"] = "Non";
$_LANG["hxflagsjobstldyesnoyes"] = "Oui";
$_LANG["hxflagsjobstldwebsite"] = "Site Internet";
$_LANG["hxflagsjobstldindustryclassification"] = "Classification de l'industrie";
$_LANG["hxflagsjobstldmemberofahrassociation"] = "Membre d'une association de ressources humaines";
$_LANG["hxflagsjobstldcontactjobtitle"] = "Titre du poste (p. ex. CEO)";
$_LANG["hxflagsjobstldcontacttype"] = "Type de contact";
// Options, Industry Classification
$_LANG["hxflagsjobstldindustryclassification2"] = "Comptabilité / Banque / Finance";
$_LANG["hxflagsjobstldindustryclassification3"] = "Agriculture / Élevage";
$_LANG["hxflagsjobstldindustryclassification21"] = "Biotechnologie / Science";
$_LANG["hxflagsjobstldindustryclassification5"] = "Informatique / Technologie de l'information";
$_LANG["hxflagsjobstldindustryclassification4"] = "Construction / Services de construction";
$_LANG["hxflagsjobstldindustryclassification12"] = "Consultant";
$_LANG["hxflagsjobstldindustryclassification6"] = "Éducation / Formation / Bibliothèque";
$_LANG["hxflagsjobstldindustryclassification7"] = "Divertissement";
$_LANG["hxflagsjobstldindustryclassification13"] = "Environnement";
$_LANG["hxflagsjobstldindustryclassification19"] = "Hospitalité";
$_LANG["hxflagsjobstldindustryclassification10"] = "Service Gouvernement/Publique";
$_LANG["hxflagsjobstldindustryclassification11"] = "Soins de santé";
$_LANG["hxflagsjobstldindustryclassification15"] = "RH / Recrutement";
$_LANG["hxflagsjobstldindustryclassification16"] = "Assurance";
$_LANG["hxflagsjobstldindustryclassification17"] = "Droit";
$_LANG["hxflagsjobstldindustryclassification18"] = "Fabrication";
$_LANG["hxflagsjobstldindustryclassification20"] = "Publicité dans les médias";
$_LANG["hxflagsjobstldindustryclassification9"] = "Parcs et loisirs";
$_LANG["hxflagsjobstldindustryclassification26"] = "Pharmacie";
$_LANG["hxflagsjobstldindustryclassification22"] = "Immobilier";
$_LANG["hxflagsjobstldindustryclassification14"] = "Restaurant / Service alimentaire";
$_LANG["hxflagsjobstldindustryclassification23"] = "Vente au détail";
$_LANG["hxflagsjobstldindustryclassification8"] = "Télémarketing";
$_LANG["hxflagsjobstldindustryclassification24"] = "Transport";
$_LANG["hxflagsjobstldindustryclassification25"] = "Autres";
// Options, Contact Type
$_LANG["hxflagsjobstldcontacttype1"] = "Administratif";
$_LANG["hxflagsjobstldcontacttype0"] = "Autre";

// .LOTTO
$_LANG["hxflagslottotldmembershipcontactid"] = "ID du membre (Membership Contact ID)";
$_LANG["hxflagslottotldverificationcode"] = "Code de vérification";

// .LT
$_LANG["hxflagslttldlegalentityidentificationcode"] = "Code d'identification d'entité légale";

// .MELBOURNE
// Options, Nexus Category
$_LANG["hxflagsmelbournetldnexuscategorya"] = "Entités victoriennes";
$_LANG["hxflagsmelbournetldnexuscategoryb"] = "Résidents victoriens";
$_LANG["hxflagsmelbournetldnexuscategoryc"] = "Entités associées";
$_LANG["hxflagsmelbournetldnexuscategorydescr"] = ("<div style=\"padding:10px 0px;text-align:justify\"><b>Admissibilité à l'inscription</b><br/>" .
    "Pour enregistrer ou renouveler un nom de domaine, le demandeur ou le titulaire doit satisfaire à l'un des critères A, B ou C ci-dessous.:<br/><br/>" .
    "<b>Critère A - Entités victoriennes</b><br/>Le demandeur doit être une entité enregistrée auprès de la `<a href=\"https://asic.gov.au/\" target=\"_blank\">Australian Securities and " .
    "Investments Commission</a>` ou du `<a href=\"https://register.business.gov.au/\" target=\"_blank\">Australian Business Register</a>` qui:<ul>" .
    "<li>possède une adresse dans l'État de Victoria associée à son ABN, ACN, RBN ou ARBN; ou</li><li>a une adresse d'entreprise valide dans l'État de Victoria.</li></ul><br/>" .
    "<b>Critère B - Résidents victoriens</b><br/>Le demandeur doit être un citoyen australien ou un résident ayant une adresse valide dans l'État de Victoria.<br/><br/>" .
    "<b>Critère C - Entités associées</b><br/>Le demandeur doit être une entité associée. Le demandeur peut demander un nom de domaine qui est une correspondance exacte ou " .
    "une correspondance partielle avec, ou une abréviation, ou un acronyme de:" .
    "<ul><li>Le nom commercial du demandeur ou le nom sous lequel le demandeur est généralement connu (c'est-à-dire un surnom) " .
    "et le nom de l'entreprise doit être enregistré auprès de l'autorité compétente dans la juridiction où cette entreprise est domiciliée; ou</li>" .
    "<li>un produit que l'entité associée fabrique ou vend à des entités ou des particuliers résidant dans l'État de Victoria;</li>" .
    "<li>un service que l'entité associée fournit aux résidents de l'État de Victoria;</li>" .
    "<li>un événement que l'entité associée organise ou parraine dans l'État de Victoria;</li>" .
    "<li>une activité que l'Entité associée facilite dans l'État de Victoria; ou</li>" .
    "<li>un cours ou un programme de formation que l'entité associée offre aux résidents de l'État de Victoria.</li></div>"
);

// .MY
$_LANG["hxflagsmytldregistrantorganisationtype"] = "Type d'organisation inscrite";
// Options, Registrant Organisation Type
$_LANG["hxflagsmytldregistrantorganisationtype1"] = "cabinet d'architectes";
$_LANG["hxflagsmytldregistrantorganisationtype2"] = "cabinet d'audit";
$_LANG["hxflagsmytldregistrantorganisationtype3"] = "entreprise en vertu de la loi sur l'enregistrement des entreprises (ROB)";
$_LANG["hxflagsmytldregistrantorganisationtype4"] = "entreprise conformément à l'ordonnance sur les licences commerciales";
$_LANG["hxflagsmytldregistrantorganisationtype5"] = "société en vertu de la loi sur les sociétés (ROC)";
$_LANG["hxflagsmytldregistrantorganisationtype6"] = "établissement d'enseignement accrédité / enregistré par le ministère / organe gouvernemental compétent";
$_LANG["hxflagsmytldregistrantorganisationtype7"] = "organisation paysanne";
$_LANG["hxflagsmytldregistrantorganisationtype8"] = "ministère ou organisme du gouvernement fédéral";
$_LANG["hxflagsmytldregistrantorganisationtype9"] = "ambassade étrangère";
$_LANG["hxflagsmytldregistrantorganisationtype10"] = "bureau étranger";
$_LANG["hxflagsmytldregistrantorganisationtype11"] = "école primaire et / ou secondaire subventionnée par le gouvernement";
$_LANG["hxflagsmytldregistrantorganisationtype12"] = "cabinet d'avocats";
$_LANG["hxflagsmytldregistrantorganisationtype13"] = "lembega (bord)";
$_LANG["hxflagsmytldregistrantorganisationtype14"] = "service ou agence de l'autorité locale";
$_LANG["hxflagsmytldregistrantorganisationtype15"] = "maktab rendah sains mara (MRSM) sous l'administration de mara";
$_LANG["hxflagsmytldregistrantorganisationtype16"] = "ministère ou organisme du ministère de la défense";
$_LANG["hxflagsmytldregistrantorganisationtype17"] = "entreprise délocalisée";
$_LANG["hxflagsmytldregistrantorganisationtype18"] = "association parents-enseignants";
$_LANG["hxflagsmytldregistrantorganisationtype19"] = "école polytechnique sous l'administration du ministère de l'éducation";
$_LANG["hxflagsmytldregistrantorganisationtype20"] = "établissement d'enseignement supérieur privé";
$_LANG["hxflagsmytldregistrantorganisationtype21"] = "école privée";
$_LANG["hxflagsmytldregistrantorganisationtype22"] = "bureau régional";
$_LANG["hxflagsmytldregistrantorganisationtype23"] = "entité religieuse";
$_LANG["hxflagsmytldregistrantorganisationtype24"] = "bureau de représentation";
$_LANG["hxflagsmytldregistrantorganisationtype25"] = "société conformément à la loi sur les sociétés (ROS)";
$_LANG["hxflagsmytldregistrantorganisationtype26"] = "organisation sportive";
$_LANG["hxflagsmytldregistrantorganisationtype27"] = "ministère ou organisme du gouvernement de l'État";
$_LANG["hxflagsmytldregistrantorganisationtype28"] = "syndicat";
$_LANG["hxflagsmytldregistrantorganisationtype29"] = "curateur";
$_LANG["hxflagsmytldregistrantorganisationtype30"] = "université sous l'administration du ministère de l'éducation";
$_LANG["hxflagsmytldregistrantorganisationtype31"] = "évaluateur, cabinet d'agent immobilier";

// .NO
$_LANG["hxflagsnotldregistrantidnumberdescr"] = ("Le numéro de TVA norvégien ou un numéro d'identification personnel (PID <a href='https://pid.norid.no/personid/lookup' target='_blank'>Person-ID</a>) est requis.");

// .NU
$_LANG["hxflagsnutldregistrantlegaltype"] = "Type juridique du titulaire";
$_LANG["hxflagsnutldregistrantlegaltypeother"] = "Autres cas";
$_LANG["hxflagsnutldregistrantlegaltypeorgeu"] = "Organisation de l'UE en dehors de la Suède";
$_LANG["hxflagsnutldregistrantidnumberdescr"] = ("<b>Pour les particuliers ou les entreprises situés en Suède</b>, un numéro personnel ou organisationnel suédois valide doit être indiqué.<br/>" .
    "<b>Pour les particuliers et les sociétés en dehors de la Suède</b>, le numéro d'identification (par exemple, le numéro d'enregistrement civique, le numéro d'enregistrement de la société ou l'équivalent) doit être indiqué."
);
$_LANG["hxflagsnutldvatiddescr"] = "(Requis uniquement pour les entreprises situées à l'intérieur de l'Union européenne mais en dehors de la Suède)";

// .NYC
// Options, Nexus Category
$_LANG["hxflagsnyctldnexuscategory1"] = "Personne physique - domicile principal avec adresse physique à NYC";
$_LANG["hxflagsnyctldnexuscategory2"] = "Entité ou organisation - domicile principal avec adresse physique à NYC";
$_LANG["hxflagsnyctldnexuscategorydescr"] = "(Les boîtes postales sont interdites, voir <a href=\"{TAC}\" target=\"_blank\">.NYC Politiques Nexus</a>.)";

// .PRO
$_LANG["hxflagsprotldprofession"] = "Profession";
$_LANG["hxflagsprotldlicensenumber"] = "N° de Licence";
$_LANG["hxflagsprotldauthority"] = "Autorité";
$_LANG["hxflagsprotldauthoritywebsite"] = "Site Web de l'autorité";

// .PT
$_LANG["hxflagspttldroid"] = "ROID";

// .RO
$_LANG["hxflagsrotldregistrantvatiddescr"] = "(requis pour les pays de l'UE et pour les déclarants roumains)";

// .RU
$_LANG["hxflagsrutldlegaltypeindiv"] = "Particulier";
$_LANG["hxflagsrutldlegaltypeorg"] = "Société";
$_LANG["hxflagsrutldregistrantbirthday"] = "Date de naissance";
$_LANG["hxflagsrutldregistrantbirthdaydescr"] = "(requis pour les particuliers, YYYY-MM-DD)";
$_LANG["hxflagsrutldregistrantpassportdata"] = "Données de passeport";
$_LANG["hxflagsrutldregistrantpassportdatadescr"] = "(requis pour les particuliers; y compris le numéro de passeport, la date de délivrance et le lieu de délivrance)<br/><br/>";

// .SE
$_LANG["hxflagssetldidentificationnumberdescr"] = ("<div style=\"text-align:justify\"><b>Pour les particuliers ou les sociétés situés en Suède </b>, un numéro suédois personnel ou organisationnel valide doit être indiqué.<br/>" .
    "<b>Pour les individus et les sociétés en dehors de la Suède </b>, le numéro d'identification (p. ex., le n° d'enregistrement civique, le n° d'enregistrement de la société ou l'équivalent) doit être indiqué.</div>"
);

// .SG
$_LANG["hxflagssgtldrcbsingaporeid"] = "RCB Singapore ID";

// .SWISS
$_LANG["hxflagsswisstlduid"] = "ID de titulaire";
$_LANG["hxflagsswisstlduiddescr"] = "(N° d'identification, dans le contexte spécifique des {TLD} basé sur les règles en vigueur, est le Suisse UID/UPI/IDE/IDI.<br/>Format pour les Personnes physiques : \"756.dddd.dddd.dd\" qui est le format dédié pour UPI / Universal Person Identification.<br/>Format pour les organisations : \"CHE-ddd.ddd.ddd\" qui est le format dédié au numéro d'identification d'entreprise ou à l'ID d'entreprise.<br/>d = chiffre)";
$_LANG["hxflagsswisstldownertype"] = "Type de titulaire";
$_LANG["hxflagsswisstldownertypep"] = "Personne physique";
$_LANG["hxflagsswisstldownertypeo"] = "Organisation";
$_LANG["hxflagsswisstldownertypedescr"] = "(Le type de titulaire, dans le contexte spécifique du {TLD} sur la base des règles en vigueur, en fonction de l’application pour les personnes physiques ou les organisations)";

// .SYDNEY
// Options, Nexus Category
$_LANG["hxflagssydneytldnexuscategorya"] = "Critère A - Entités de Nouvelle-Galles du Sud";
$_LANG["hxflagssydneytldnexuscategoryb"] = "Critère B - Résidents de la Nouvelle-Galles du Sud";
$_LANG["hxflagssydneytldnexuscategoryc"] = "Critère C - Entités associées";
$_LANG["hxflagssydneytldnexuscategorydescr"] = ("Pour enregistrer ou renouveler un nom de domaine {TLD}, le demandeur ou le titulaire doit satisfaire à l'un des critères A, B ou C ci-dessous.:<br/><br/>" .
    "<b>Critère A - Entités de Nouvelle-Galles du Sud</b><br/>" .
    "Le demandeur doit être une entité enregistrée auprès de la Australian Securities and Investments Commission ou du Australian Business Register qui:<br/>" .
    "a une adresse dans l'État de Nouvelle-Galles du Sud associée à son ABN, ACN, RBN ou ARBN; ou a une adresse d'entreprise valide dans l'État de Nouvelle-Galles du Sud.<br/>" .
    "<b>Critère B - Résidents de la Nouvelle-Galles du Sud</b><br/>" .
    "Le demandeur doit être un citoyen australien ou un résident ayant une adresse valide dans l'État de Nouvelle-Galles du Sud.<br/>" .
    "<b>Critère C - Entités associées</b><br/>" .
    "Le demandeur doit être une entité associée. Le demandeur peut demander un nom de domaine qui est a une correspondance exacte ou partielle, ou qui est une abréviation, ou un acronyme du:<br/>" .
    "nom commercial du demandeur ou du nom sous lequel le demandeur est généralement connu (c'est-à-dire un surnom), le nom de l'entreprise doit être enregistré auprès de l'autorité compétente " .
    "dans la juridiction où cette entreprise est domiciliée; ou un produit que l'entité associée fabrique ou vend à des entités ou des particuliers résidant dans l'État de Nouvelle-Galles du Sud;" .
    "un service que l'entité associée fournit aux résidents de l'État de Nouvelle-Galles du Sud; un événement que l'entité associée organise ou parraine dans l'État de la Nouvelle-Galles du Sud;" .
    "une activité que l'entité associée facilite dans l'État de Nouvelle-Galles du Sud; ou un cours ou programme de formation que l'entité associée propose aux résidents de l'État de Nouvelle-Galles du Sud."
);

// .TRAVEL
$_LANG["hxflagstraveltldtravelindustry"] = "Liés à l'industrie du voyage";
$_LANG["hxflagstraveltldtravelindustrydescr"] = "(Nous reconnaissons avoir une relation avec l'industrie du voyage et nous sommes engagés ou prévoyons de nous engager dans des activités liées aux voyages.)";
$_LANG["hxflagstraveltldyesno1"] = "Oui";
$_LANG["hxflagstraveltldyesno0"] = "Non";

// .US
// Options, Intended Use
$_LANG["hxflagsustldapplicationpurposep1"] = "Utilisation commerciale à but lucratif";
$_LANG["hxflagsustldapplicationpurposep2"] = "Entreprise à but non lucratif / Club / Association / Organisation religieuse";
$_LANG["hxflagsustldapplicationpurposep3"] = "Usage personnel";
$_LANG["hxflagsustldapplicationpurposep4"] = "Un but éducatif";
$_LANG["hxflagsustldapplicationpurposep5"] = "Objectifs gouvernementaux";
// Options, Nexus Category, https://www.about.us/policies/ustld-nexus-codes
$_LANG["hxflagsustldnexuscategoryc11"] = "[C11] Une personne physique qui est un citoyen américain";
$_LANG["hxflagsustldnexuscategoryc12"] = "[C12] Une personne physique qui est un résident permanent des États-Unis d'Amérique ou de l'un de ses biens ou territoires";
$_LANG["hxflagsustldnexuscategoryc21"] = "[C21] Une organisation ou entreprise basée aux États-Unis; voir ci-dessous";
$_LANG["hxflagsustldnexuscategoryc31"] = "[C31] Une entité ou organisation étrangère; voir ci-dessous";
$_LANG["hxflagsustldnexuscategoryc32"] = "[C32] Une entité étrangère qui a un bureau ou une autre installation aux États-Unis";
$_LANG["hxflagsustldnexuscategorycdescr"] = ("<ul><li>[C21]: Une organisation ou entreprise basée aux États-Unis dans l'un des cinquante (50) états américains, dans le District de Columbia ou dans l'un des territoires des États-Unis; " .
    "ou constitué en vertu des lois d'un état des États-Unis d'Amérique, le district de " .
    "Columbia ou de l'un quelconque de ses biens ou territoires ou d'une entité gouvernementale fédérale, d'état ou locale des États-Unis ou d'une de ses subdivisions politiques</li>" .
    "<li>[C31]: Une entité ou organisation étrangère qui a une présence de bonne foi aux États-Unis d'Amérique ou dans l'un de ses biens ou territoires et qui se livre régulièrement à des " .
    "activités / ventes licites de biens ou de services ou d'autres activités commerciales ou non commerciales. (à but lucratif ou non lucratif)" .
    "</li></ul>"
);
$_LANG["hxflagsustldnexuscountrydescr"] = "<div>préciser la nationalité d'origine du titulaire (dans le cas des deux dernières options de catégorie Nexus (C31 ou C32)).</div>";

// .XXX
$_LANG["hxflagsxxxtldnonresolvingdomain"] = "Domaine sans résolution";
$_LANG["hxflagsxxxtldmembershipid"] = "ID d'adhésion .XXX";
$_LANG["hxflagsxxxtldmembershipiddescr"] = "(Obligatoire pour que votre domaine .XXX fonctionne)";
// Options, Non-Resolving Domain
$_LANG["hxflagsxxxtldnonresolvingdomain0"] = "Non - Ce domaine DOIT résoudre";
$_LANG["hxflagsxxxtldnonresolvingdomain1"] = "Oui - Ce domaine NE DOIT PAS résoudre";

// ----------------------------------------------------------------------
// ----------------------- WHOIS PRIVACY --------------------------------
// ----------------------------------------------------------------------
$_LANG["hxwhoisprivacy"] = "Confidentialité WHOIS";
$_LANG["hxwhoisprivacyrequestsuccess"] = "Les modifications apportées au service de confidentialité WHOIS ont été appliquées avec succès.";
$_LANG["hxwhoisprivacywhy"] = "Pourquoi la confidentialité WHOIS est importante";
$_LANG["hxwhoisprivacyreason"] = ("L'enregistrement de nom de domaine nécessite la fourniture d'informations de contact personnelles pour un stockage permanent géré par des serveurs tiers pour le WHOIS. " .
    "Cela signifie que votre nom, adresse, numéro de téléphone et e-mail sont enregistrés et détenus par des tiers sans restriction. Certains registres proposent leur " .
    "propre service de confidentialité WHOIS gratuitement qui permet de protéger les données WHOIS de tous les tiers."
);
$_LANG["hxwhoisprivacystatus"] = "Statut de confidentialité WHOIS";
$_LANG["hxwhoisprivacystatus1"] = "Vos informations WHOIS sont actuellement protégées";
$_LANG["hxwhoisprivacystatus0"] = "Vos informations WHOIS ne sont actuellement pas protégées";
$_LANG["hxwhoisprivacystatusnp"] = "Le service de confidentialité WHOIS est UNIQUEMENT disponible pour les particuliers";
$_LANG["hxwhoisprivacybttnenable"] = "Activer";
$_LANG["hxwhoisprivacybttndisable"] = "Désactiver";

// ----------------------------------------------------------------------
// ----------------------- Private Nameservers List ---------------------
// ----------------------------------------------------------------------
$_LANG["hxpnslist"] = "Liste Serveur DNS privé";
$_LANG["hxpnscolpns"] = "Serveur DNS privé";
$_LANG["hxpnscolip"] = "adresse IP";
$_LANG["hxpnsempty"] = "Aucun serveur DNS privé enregistré sous ce nom de domaine.";

// ----------------------------------------------------------------------
// ----------------------- Web Apps -------------------------------------
// ----------------------------------------------------------------------
$_LANG["hxwebapps"] = "Applications Web";

// ----------------------------------------------------------------------
// ------------------ Contact Information -------------------------------
// ----------------------------------------------------------------------
$_LANG["hxdomaincontactstradeinfo"] = ("Les modifications des données de contact du titulaire peuvent entraîner un " .
    "processus dit de \"Trade\" qui, dans certains cas, n'est pas achevé en temps réel. " .
    "Veuillez être patient si les changements ne sont pas reflétés immédiatement."
);
// ----------------------------------------------------------------------
// ------------------ .CA Contact Confirmation --------------------------
// ----------------------------------------------------------------------
$_LANG["hxcacontactconfirmation"] = ".CA Confirmation de Contact";
$_LANG["hxcacontactconfirmationdescr"] = "Veuillez visiter <a href=\"https://www.cira.ca/registrant-agreement\" target=\"_blank\">https://cira.ca</a> et utiliser l'identifiant ci-dessous pour confirmer l'entente d'enregistrement de l'ACEI. Si le même contact du titulaire (déjà confirmé) est utilisé pour enregistrer un autre domaine .CA, alors le domaine sera enregistré en temps réel.";

// ----------------------------------------------------------------------
// ------------------ DNSSEC --------------------------------------------
// ----------------------------------------------------------------------

// Messages d'état
$_LANG["dnssecautomaticupdatesuccessmsg"] = "DNSSEC a été <span style=\"color:green;font-weight:bold;\">activé</span> pour votre domaine.<br> Les enregistrements DNSSEC ont été importés depuis votre zone DNS et mis à jour auprès de votre bureau d'enregistrement de domaine.<br><br><span style=\"color:#007bff;\">Pour votre sécurité, DNSSEC aide à protéger votre domaine contre certains types d'attaques en validant les réponses DNS.</span>";
$_LANG["dnssecautoenable"] = "Activer DNSSEC et importer automatiquement les enregistrements DNSSEC depuis la zone DNS";
$_LANG["dnssecsyncrecords"] = "Synchroniser les enregistrements DNSSEC depuis la zone DNS";

// Gestion des enregistrements
$_LANG["dnssecaddnewdskey"] = "Ajouter une nouvelle clé DS";
$_LANG["dnssecaddnewkeyrecord"] = "Ajouter un nouvel enregistrement de clé";

// Boîte de dialogue modale
$_LANG["dnssecconfirmdisable"] = "Êtes-vous sûr de vouloir désactiver DNSSEC pour ce domaine ? Cette action peut affecter la résolution du domaine.";
$_LANG["dnssecmodaltitle"] = "Désactiver DNSSEC";
$_LANG["dnssecmodalcancel"] = "Annuler";
$_LANG["dnssecmodaldisable"] = "Désactiver DNSSEC";
