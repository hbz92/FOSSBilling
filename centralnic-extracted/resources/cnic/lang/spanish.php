<?php

// #########################################################################
// #########################################################################
// # Add translations for CNR registrar module additional domain fields    #
// #########################################################################
// #########################################################################

// ----------------------------------------------------------------------
// ------------------ .DK Checkout Page ---------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrdkcheckoutheading"] = "Términos y Condiciones Generales para nombres de dominio .dk";
$_LANG["cnrdkcheckoutintro"] = "Para registrar un nombre de dominio .dk, debe celebrar un contrato con Punktum.dk A/S. Punktum dk es el administrador de todos los nombres de dominio .dk.";
$_LANG["cnrdkcheckoutdomains"] = "Nombres de dominio:";
$_LANG["cnrdkcheckoutregistrant"] = "Titular:";
$_LANG["cnrdkcheckoutregistrantaddress"] = "Ver arriba";
$_LANG["cnrdkcheckoutadmin"] = "Administrador del dominio:";
$_LANG["cnrdkcheckoutadminaddress"] = "Punktum dk A/S<br/>Ørestads Boulevard 108, 11. Stock<br/>DK-2300 Copenhague S";
$_LANG["cnrdkcheckouttac"] = implode("<br/><br/>", [
    "Por la presente acepto celebrar un contrato sobre el derecho de uso del nombre de dominio .dk especificado de acuerdo con los términos y condiciones aplicables. Esto significa, entre otras cosas, que garantizo que mis datos de contacto como titular estarán siempre actualizados. Realizaré la verificación de identidad de Punktum dk A/S si así se solicita.",
    "Mi derecho de uso del nombre de dominio .dk especificado puede ser transferido, suspendido, eliminado o bloqueado de acuerdo con los términos y condiciones de uso de Punktum dk A/S.",
    "De acuerdo con la sección 18 (2) (13) de la Ley de Contratos de Consumo danesa, renuncio al derecho de desistir del contrato sobre el derecho de uso del nombre de dominio .dk especificado.",
    "Doy mi consentimiento para que Punktum dk A/S, como administrador del dominio, utilice mis datos personales de acuerdo con su política de privacidad.",
    "Acepto pagar a este proveedor la tarifa por el primer período de registro del nombre de dominio .dk especificado y que el pago de los períodos de registro posteriores dependerá de mi elección de régimen de administración, según la sección 2.1 de los Términos y Condiciones Generales de Punktum dk A/S."
]);
$_LANG["cnrdkcheckouttacurl"] = "https://www.punktum.dk/en/articles/terms-and-conditions-for-the-right-of-use-to-a-dk-domain-name";
$_LANG["cnrdkcheckouttacurltext"] = "Términos y Condiciones Generales para el derecho de uso de un nombre de dominio .dk";
$_LANG["cnrdkcheckoutpolicyurl"] = "https://www.punktum.dk/en/articles/privacy-policy";
$_LANG["cnrdkcheckoutpolicyurltext"] = "Política de privacidad";
$_LANG["cnrdkcheckoutabouturl"] = "https://www.punktum.dk/en/about-us";
$_LANG["cnrdkcheckoutabouturltext"] = "Sobre Punktum dk A/S";
$_LANG["cnrdkcheckouttacagree"] = "Sí, acepto el acuerdo de usuario con Punktum dk A/S.";

// ----------------------------------------------------------------------
// ------------------ Common CNR Translations ---------------------------
// ----------------------------------------------------------------------
$_LANG["cnrchoose"] = "Por favor seleccione";
$_LANG["cnroptional"] = "opcional";
$_LANG["cnr1"] = "Sí";
$_LANG["cnr0"] = "No";
$_LANG["cnrconsentforpublishing"] = "Titular, consentimiento para publicación";
// .abogado, .aero, .attorney, .bank, .broker, .dentist, .forex, .insurance, .lotto, .law, .lawyer, .markets, .trading
$_LANG["cnrxallocationtoken"] = "Token de pedido del Registro";
$_LANG["cnrxallocationtokendescr"] = "Solo requerido para dominios premium. Emitido por el proveedor de la TLD. Contáctenos si necesita ayuda.";
// .app, .page, .dev, .new, .day, .channel, .boo, .foo, .zip, .mov, .nexus, .dad, .phd, .prof, .esq, .rsvp, .meme, .ing, .new
$_LANG["cnrxacceptsslrequirement"] = "Requisitos SSL";
$_LANG["cnrxacceptsslrequirementdescr"] = "Confirmo que entiendo y acepto los requisitos para HTTPS / un certificado SSL. Esta TLD es un dominio más seguro, lo que significa que HTTPS es obligatorio para todos los sitios web. Puede comprar su dominio ahora, pero para que funcione correctamente en los navegadores, debe configurar HTTPS basado en un certificado SSL.";
$_LANG["cnrxacceptsslrequirement0"] = $_LANG["cnr0"];
$_LANG["cnrxacceptsslrequirement1"] = $_LANG["cnr1"];
// .attorney, .dentist, .lawyer
$_LANG["cnrxunitedtldregulatorydata"] = "Información de la autoridad reguladora";
$_LANG["cnrxunitedtldregulatorydatadescr"] = "Información sobre la autoridad aprobadora/controladora/reguladora";
// .barcelona, .cat, .madrid, .scot, .sport, .swiss
$_LANG["cnrxintendeduse"] = "Uso previsto";
$_LANG["cnrxintendedusedescr"] = implode("<br/>", [
    "Declaración del uso previsto del nombre de dominio. Si corresponde, indique una referencia explícita al derecho reclamado por el solicitante sobre el nombre (si no es el nombre de la empresa del solicitante).",
    "Por ejemplo, si el nombre de dominio corresponde a una marca, debe indicarse el número de registro de la marca (máx. 256 caracteres)."
]);
// .mk
$_LANG["cnrxcompanyvatid"] = "Titular, NIF/CIF";
// $_LANG["cnrxcompanyvatiddescr"] = "";
// .nu, .se
$_LANG["cnrxrequestauthcode"] = "Solicitar nuevo código EPP";
$_LANG["cnrxrequestauthcode0"] = $_LANG["cnr0"];
$_LANG["cnrxrequestauthcode1"] = $_LANG["cnr1"];
$_LANG["cnrxrequestauthcodedescr"] = "Si desea transferir el dominio a otro registrador, necesita el código de autorización. Lo enviaremos al correo electrónico del titular del dominio.";

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
$_LANG["cnrxaeroensauthid"] = "ID de miembro";
$_LANG["cnrxaeroensauthiddescr"] = "El ID de miembro .AERO es necesario para registrar un dominio en la industria aeronáutica. Puede solicitarlo <a style=\"text-decoration:underline\" href=\"https://information.aero/node/add/request-aero-id\" target=\"_blank\">aquí</a>.";
$_LANG["cnrxaeroensauthkey"] = "Contraseña de miembro";
$_LANG["cnrxaeroensauthkeydescr"] = "La contraseña/código de autenticación proporcionado junto con el ID de miembro .AERO en el sitio web mencionado arriba.";

// ----------------------------------------------------------------------
// ------------------ .AU Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxaudomainrelation"] = "Relación";
$_LANG["cnrxaudomainrelation1"] = "El dominio de segundo nivel es una coincidencia exacta, acrónimo o abreviatura del nombre de la empresa, nombre comercial, nombre de la organización o marca.";
$_LANG["cnrxaudomainrelation2"] = "El dominio de segundo nivel está estrechamente relacionado y es esencial para la organización o las actividades realizadas por la organización.";
$_LANG["cnrxaudomainrelationdescr"] = "Esto indica la relación entre el tipo de elegibilidad (por ejemplo, nombre comercial) y el nombre de dominio.";
$_LANG["cnrxaudomainrelationtype"] = "Tipo de relación";
$_LANG["cnrxaudomainrelationtypecompany"] = "Empresa";
$_LANG["cnrxaudomainrelationtyperegisteredbusiness"] = "Negocio registrado";
$_LANG["cnrxaudomainrelationtypesoletrader"] = "Autónomo";
$_LANG["cnrxaudomainrelationtypepartnership"] = "Sociedad";
$_LANG["cnrxaudomainrelationtypetrademarkowner"] = "Titular de marca";
$_LANG["cnrxaudomainrelationtypependingtmowner"] = "Solicitud de marca";
$_LANG["cnrxaudomainrelationtypecitizenresident"] = "Ciudadano / Residente"; // .id.au only
$_LANG["cnrxaudomainrelationtypeincorporatedassociation"] = "Asociación incorporada";
$_LANG["cnrxaudomainrelationtypeclub"] = "Club";
$_LANG["cnrxaudomainrelationtypenonprofitorganisation"] = "Organización sin fines de lucro";
$_LANG["cnrxaudomainrelationtypecharity"] = "Organización benéfica";
$_LANG["cnrxaudomainrelationtypetradeunion"] = "Sindicato";
$_LANG["cnrxaudomainrelationtypeindustrybody"] = "Organismo sectorial";
$_LANG["cnrxaudomainrelationtypecommercialstatutorybody"] = "Entidad estatutaria comercial";
$_LANG["cnrxaudomainrelationtypepoliticalparty"] = "Partido político";
$_LANG["cnrxaudomainrelationtypeother"] = "Otro";
$_LANG["cnrxaudomainrelationtypereligiouschurchgroup"] = "Grupo religioso / iglesia";
$_LANG["cnrxaudomainrelationtypehighereducationinstitution"] = "Institución de educación superior";
$_LANG["cnrxaudomainrelationtyperesearchorganisation"] = "Organización de investigación";
$_LANG["cnrxaudomainrelationtypegovernmentschool"] = "Escuela pública";
$_LANG["cnrxaudomainrelationtypechildcarecentre"] = "Centro de cuidado infantil";
$_LANG["cnrxaudomainrelationtypepreschool"] = "Preescolar";
$_LANG["cnrxaudomainrelationtypenationalbody"] = "Organismo nacional";
$_LANG["cnrxaudomainrelationtypetrainingorganisation"] = "Organización de formación";
$_LANG["cnrxaudomainrelationtypenongovernmentschool"] = "Escuela privada";
$_LANG["cnrxaudomainrelationtypeunincorporatedassociation"] = "Asociación no incorporada";
$_LANG["cnrxaudomainrelationtypeindustryorganisation"] = "Organización sectorial";
$_LANG["cnrxaudomainrelationtyperegistrablebody"] = "Entidad registrable";
$_LANG["cnrxaudomainrelationtypeindigenouscorporation"] = "Corporación indígena";
$_LANG["cnrxaudomainrelationtyperegisteredorganisation"] = "Organización registrada";
$_LANG["cnrxaudomainrelationtypetrust"] = "Fideicomiso";
$_LANG["cnrxaudomainrelationtypeeducationalinstitution"] = "Institución educativa";
$_LANG["cnrxaudomainrelationtypecommonwealthentity"] = "Entidad de la Commonwealth";
$_LANG["cnrxaudomainrelationtypestatutorybody"] = "Entidad estatutaria";
$_LANG["cnrxaudomainrelationtypetradingcooperative"] = "Cooperativa comercial";
$_LANG["cnrxaudomainrelationtypecompanylimitedbyguarantee"] = "Sociedad limitada por garantía";
$_LANG["cnrxaudomainrelationtypenondistributingcooperative"] = "Cooperativa no distributiva";
$_LANG["cnrxaudomainrelationtypenontradingcooperative"] = "Cooperativa no comercial";
$_LANG["cnrxaudomainrelationtypecharitabletrust"] = "Fideicomiso benéfico";
$_LANG["cnrxaudomainrelationtypepublicprivateancillaryfund"] = "Fondo auxiliar público/privado";
$_LANG["cnrxaudomainrelationtypepeakstateterritorybody"] = "Órgano principal estatal/territorial";
$_LANG["cnrxaudomainrelationtypenotforprofitcommunitygroup"] = "Grupo comunitario sin fines de lucro";
$_LANG["cnrxaudomainrelationtypeeducationandcareserviceschildcare"] = "Servicios educativos y de cuidado (guardería)";
$_LANG["cnrxaudomainrelationtypegovernmentbody"] = "Organismo gubernamental";
$_LANG["cnrxaudomainrelationtypeproviderofnonaccreditedtraining"] = "Proveedor de formación no acreditada";
$_LANG["cnrxaudomainrelationtypedescr"] = "Indique qué habilita al titular a registrar el nombre de dominio";
$_LANG["cnrxauownerorganization"] = "Titular, organización";
$_LANG["cnrxauownerorganizationdescr"] = "Nombre de la organización (titular)";
$_LANG["cnrxauidwarranty"] = "Titular,<br>es ciudadano o residente AU";
$_LANG["cnrxauidwarranty0"] = $_LANG["cnr0"];
$_LANG["cnrxauidwarranty1"] = $_LANG["cnr1"];
$_LANG["cnrxauidwarrantydescr"] = "El titular de un dominio .id.au debe garantizar que es residente o ciudadano australiano";
$_LANG["cnrxaueligibilityname"] = "Nombre de elegibilidad";
$_LANG["cnrxaueligibilitynamedescr"] = "Nombre del tipo de elegibilidad (por ejemplo, nombre comercial)";
$_LANG["cnrxaudomainidnumber"] = "Titular, número de identificación";
$_LANG["cnrxaudomainidnumberdescr"] = "";
$_LANG["cnrxaudomainidtype"] = "Titular, tipo de identificación";
// $_LANG["cnrxaudomainidtypetm"] = "TM";
// $_LANG["cnrxaudomainidtypeabn"] = "ABN";
// $_LANG["cnrxaudomainidtypeacn"] = "ACN";
// $_LANG["cnrxaudomainidtypeother"] = "Other";
// $_LANG["cnrxaudomainidtypeact"] = "ACT";
// $_LANG["cnrxaudomainidtypensw"] = "NSW";
// $_LANG["cnrxaudomainidtypent"] = "NT";
// $_LANG["cnrxaudomainidtypeqld"] = "QLD";
// $_LANG["cnrxaudomainidtypesa"] = "SA";
// $_LANG["cnrxaudomainidtypetas"] = "TAS";
// $_LANG["cnrxaudomainidtypevic"] = "VIC";
// $_LANG["cnrxaudomainidtypewa"] = "WA";
// $_LANG["cnrxaudomainidtypeprivate"] = "Private";
$_LANG["cnrxaudomainidtypedescr"] = "";
$_LANG["cnrxaueligibilityidnumber"] = "Elegibilidad, número de identificación";
$_LANG["cnrxaueligibilityidnumberdescr"] = "";
$_LANG["cnrxaueligibilityidtype"] = "Elegibilidad, tipo de identificación";
$_LANG["cnrxaueligibilityidtypedescr"] = "";

// ----------------------------------------------------------------------
// ------------------ .CA Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxcalegaltype"] = "Titular, tipo legal";
$_LANG["cnrxcalegaltypeabo"] = "Aborigen canadiense";
$_LANG["cnrxcalegaltypeass"] = "Asociación canadiense no incorporada";
$_LANG["cnrxcalegaltypecco"] = "Corporación (Canadá o provincia/territorio canadiense)";
$_LANG["cnrxcalegaltypecct"] = "Ciudadano canadiense";
$_LANG["cnrxcalegaltypeedu"] = "Institución educativa canadiense";
$_LANG["cnrxcalegaltypegov"] = "Gobierno o agencia gubernamental en Canadá";
$_LANG["cnrxcalegaltypehop"] = "Hospital canadiense";
$_LANG["cnrxcalegaltypeinb"] = "Tribu india reconocida por la Ley de Indios de Canadá";
$_LANG["cnrxcalegaltypelam"] = "Biblioteca, archivo o museo canadiense";
$_LANG["cnrxcalegaltypelgr"] = "Representante legal de un ciudadano canadiense o residente permanente";
$_LANG["cnrxcalegaltypemaj"] = "Su Majestad la Reina";
$_LANG["cnrxcalegaltypeomk"] = "Marca oficial registrada en Canadá";
$_LANG["cnrxcalegaltypeplt"] = "Partido político canadiense";
$_LANG["cnrxcalegaltypeprt"] = "Sociedad registrada en Canadá";
$_LANG["cnrxcalegaltyperes"] = "Residente permanente de Canadá";
$_LANG["cnrxcalegaltypetdm"] = "Marca registrada en Canadá (por titular no canadiense)";
$_LANG["cnrxcalegaltypetrd"] = "Sindicato canadiense";
$_LANG["cnrxcalegaltypetrs"] = "Fideicomiso constituido en Canadá";
// $_LANG["cnrxcalegaltypedescr"] = "";
$_LANG["cnrxcatrademark"] = "Es una marca registrada";
$_LANG["cnrxcatrademark0"] = $_LANG["cnr0"];
$_LANG["cnrxcatrademark1"] = $_LANG["cnr1"];
$_LANG["cnrxcatrademarkdescr"] = "Indica si el dominio es una marca registrada o no.";

// ----------------------------------------------------------------------
// ------------------ .COM.BR Fields ------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxbrregisternumber"] = "Titular, número de identificación brasileño";
$_LANG["cnrxbrregisternumberdescr"] = "El número de registro de empresa brasileña (CNPJ) o el número de registro individual brasileño (CPF).";

// ----------------------------------------------------------------------
// ------------------ .CN Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxcnownertype"] = "Titular, tipo";
$_LANG["cnrxcnownertypei"] = "Persona física";
$_LANG["cnrxcnownertypee"] = "Empresa";
$_LANG["cnrxcnownertypedescr"] = "";
$_LANG["cnrxcnowneridtype"] = "Titular, tipo de ID";
$_LANG["cnrxcnowneridtypesfz"] = "SFZ (DNI) - Tipo de titular es persona física";
$_LANG["cnrxcnowneridtypehz"] = "HZ (Pasaporte) - Tipo de titular es persona física";
$_LANG["cnrxcnowneridtypegajmtx"] = "GAJMTX (Permiso de entrada/salida para Hong Kong y Macao) - Tipo de titular es persona física";
$_LANG["cnrxcnowneridtypetwjmtx"] = "TWJMTX (Pasaporte para residentes de Taiwán para entrada/salida) - Tipo de titular es persona física";
$_LANG["cnrxcnowneridtypewjlsfz"] = "WJLSFZ (Permiso de residencia permanente extranjero) - Tipo de titular es persona física";
$_LANG["cnrxcnowneridtypegajzz"] = "GAJZZ (Permiso de residencia para residentes de Hong Kong y Macao) - Tipo de titular es persona física";
$_LANG["cnrxcnowneridtypetwjzz"] = "TWJZZ (Permiso de residencia para residentes de Taiwán) - Tipo de titular es persona física";
$_LANG["cnrxcnowneridtypejgz"] = "JGZ (Carnet de oficial) - Tipo de titular es persona física";
$_LANG["cnrxcnowneridtypeqt"] = "QT (Otro) - Tipo de titular es persona física o empresa";
$_LANG["cnrxcnowneridtypeorg"] = "ORG (Certificado de código organizacional) - Tipo de titular es empresa";
$_LANG["cnrxcnowneridtypeyyzz"] = "YYZZ (Licencia comercial) - Tipo de titular es empresa";
$_LANG["cnrxcnowneridtypetydm"] = "TYDM (Certificado de código de crédito social unificado) - Tipo de titular es empresa";
$_LANG["cnrxcnowneridtypebddm"] = "BDDM (Código militar) - Tipo de titular es empresa";
$_LANG["cnrxcnowneridtypejddwfw"] = "JDDWFW (Licencia de servicio externo militar) - Tipo de titular es empresa";
$_LANG["cnrxcnowneridtypesydwfr"] = "SYDWFR (Certificado de persona jurídica de institución pública) - Tipo de titular es empresa";
$_LANG["cnrxcnowneridtypewgczjg"] = "WGCZJG (Formulario de registro para representaciones de empresas extranjeras) - Tipo de titular es empresa";
$_LANG["cnrxcnowneridtypeshttfr"] = "SHTTFR (Certificado de registro de organización social) - Tipo de titular es empresa";
$_LANG["cnrxcnowneridtypezjcs"] = "ZJCS (Certificado de registro de lugar de actividad religiosa) - Tipo de titular es empresa";
$_LANG["cnrxcnowneridtypembfqy"] = "MBFQY (Certificado de registro de entidad privada no empresarial) - Tipo de titular es empresa";
$_LANG["cnrxcnowneridtypejjhfr"] = "JJHFR (Certificado de registro de fundación) - Tipo de titular es empresa";
$_LANG["cnrxcnowneridtypelszy"] = "LSZY (Licencia de bufete de abogados) - Tipo de titular es empresa";
$_LANG["cnrxcnowneridtypewgzhwh"] = "WGZHWH (Certificado de registro de centro cultural extranjero en China) - Tipo de titular es empresa";
$_LANG["cnrxcnowneridtypewlczzg"] = "WLCZJG (Certificado de registro para representaciones de departamentos turísticos extranjeros) - Tipo de titular es empresa";
$_LANG["cnrxcnowneridtypesfjd"] = "SFJD (Certificado de formación jurídica) - Tipo de titular es empresa";
$_LANG["cnrxcnowneridtypejwjg"] = "JWJG (Certificado de empresa extranjera) - Tipo de titular es empresa";
$_LANG["cnrxcnowneridtypeshfwjg"] = "SHFWJG (Certificado de registro de agencia de servicios sociales) - Tipo de titular es empresa";
$_LANG["cnrxcnowneridtypembxxbx"] = "MBXXBX (Permiso de escuela privada) - Tipo de titular es empresa";
$_LANG["cnrxcnowneridtypeyljgzy"] = "YLJGZY (Licencia de institución médica) - Tipo de titular es empresa";
$_LANG["cnrxcnowneridtypegzjgzy"] = "GZJGZY (Licencia de notaría) - Tipo de titular es empresa";
$_LANG["cnrxcnowneridtypebjwsxx"] = "BJWSXX (Permiso de escuela para hijos de diplomáticos extranjeros en Beijing/China) - Tipo de titular es empresa";
$_LANG["cnrxcnowneridtypeqttyzm"] = "QTTYDM (Otro-certificado de código de crédito social unificado) - Tipo de titular es empresa";
$_LANG["cnrxcnowneridtypedescr"] = "Tipo de identificación del documento";
$_LANG["cnrxcnowneridnumber"] = "Titular, número de ID";
$_LANG["cnrxcnowneridnumberdescr"] = "";

// ----------------------------------------------------------------------
// ------------------ .COOP Fields --------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxcoopeligibility"] = "Requisitos de elegibilidad";
$_LANG["cnrxcoopeligibilitydescr"] = "Acepto que mi organización cumple al menos uno de los requisitos de elegibilidad .COOP. Lea <a style=\"text-decoration:underline\" href=\"https://identity.coop/coop-policies-and-agreements/\" target=\"_blank\">aquí</a>.";
$_LANG["cnrxcoopeligibility0"] = $_LANG["cnr0"];
$_LANG["cnrxcoopeligibility1"] = $_LANG["cnr1"];

// ----------------------------------------------------------------------
// ------------------ .DE Fields ----------------------------------------
// ----------------------------------------------------------------------
//$_LANG["cnrxdensentry0"] = "";
$_LANG["cnrxdensentry0descr"] = implode(" ", [
    "Permite el uso de nsentrys en lugar de servidores de nombres para dominios .de;",
    "Las entradas NS permiten la configuración de subdominios con servidores de nombres alternativos.",
    "<a target=\"_blank\" href=\"https://www.denic.de/en/domains/de-domains/registration/nameserver-and-nsentry-data/\" style=\"text-decoration:underline\">Información detallada</a>."
]);
//$_LANG["cnrxdensentry1"] = "";
$_LANG["cnrxdensentry1descr"] = "ver arriba";
//$_LANG["cnrxdensentry2"] = "";
$_LANG["cnrxdensentry2descr"] = "ver arriba";
//$_LANG["cnrxdensentry3"] = "";
$_LANG["cnrxdensentry3descr"] = "ver arriba";
//$_LANG["cnrxdensentry4"] = "";
$_LANG["cnrxdensentry4descr"] = "ver arriba";
//$_LANG["cnrxdegeneralrequest"] = "";
//$_LANG["cnrxdegeneralrequestdescr"] = "";
//$_LANG["cnrxdeabusecontact"] = "";
//$_LANG["cnrxdeabusecontactdescr "] = "";

// ----------------------------------------------------------------------
// ------------------ .DK Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxdkusertype"] = "Titular, tipo";
$_LANG["cnrxdkusertypeperson"] = "Persona";
$_LANG["cnrxdkusertypecompany"] = "Empresa";
$_LANG["cnrxdkusertypeassociation"] = "Asociación";
$_LANG["cnrxdkusertypepuborg"] = "Organización pública";
// $_LANG["cnrxdkusertypedescr"] = "";
$_LANG["cnrxdkuseridnumber"] = "Titular, número de ID";
$_LANG["cnrxdkuseridnumberdescr"] = implode("", [
    "Número de identificación del contacto titular. Puede ser <i>EAN, CVR o P Número</i>. ",
    "El <i>número CVR</i> se utiliza para identificar la organización, y el <i>número EAN</i> garantiza ",
    "que los documentos relacionados con la facturación electrónica se envíen a la cuenta correcta. ",
    "El <i>número P</i> es una designación de sucursal asignada por el Registro Central de Empresas danés para ",
    "vincular ubicaciones físicas con una organización."
]);

// ----------------------------------------------------------------------
// ------------------ .ES Fields ----------------------------------------
// ----------------------------------------------------------------------
$types = [
    1 => "Persona física",
    39 => "Asociación de intereses económicos",
    47 => "Asociación",
    59 => "Club deportivo",
    68 => "Asociación profesional",
    124 => "Caja de ahorros",
    150 => "Bienes comunales",
    152 => "Comunidad de propietarios",
    164 => "Orden o institución religiosa",
    181 => "Consulado",
    197 => "Corporación de derecho público",
    203 => "Embajada",
    229 => "Administración local",
    269 => "Federación deportiva",
    286 => "Fundación",
    365 => "Mutua de seguros",
    434 => "Autoridad gubernamental regional",
    436 => "Autoridad gubernamental central",
    439 => "Partido político",
    476 => "Sociedad mercantil",
    510 => "Sociedad agraria",
    524 => "Sociedad anónima",
    525 => "Club deportivo",
    554 => "Sociedad civil",
    560 => "Sociedad colectiva",
    562 => "Sociedad colectiva y comanditaria",
    566 => "Cooperativa",
    608 => "Empresa gestionada por empleados",
    612 => "Sociedad limitada",
    713 => "Oficina española",
    717 => "Cooperación empresarial temporal",
    744 => "Sociedad anónima gestionada por empleados",
    745 => "Entidad pública regional",
    746 => "Entidad pública nacional",
    747 => "Entidad pública local",
    877 => "Otros",
    878 => "Consejo regulador de denominación de origen",
    879 => "Entidad gestora de espacios naturales"
];
$idtypes = [
    0 => "Otro (para contactos fuera de España)",
    1 => "DNI/NIF (para contactos españoles)",
    2 => "Obsoleto, use la siguiente opción.",
    3 => "NIE (para contactos españoles)"
];
$idtypesdescr = implode("<br/>", [
    "DNI = &quot;Documento Nacional de Identidad&quot;",
    "NIF = &quot;Número de Identificación Fiscal&quot;",
    "NIE = &quot;Número de Identificación de Extranjero&quot;. Es el equivalente a un NIF español, pero lo expiden las autoridades españolas a extranjeros que permanecen más de 3 meses en España."
]);
$idnodescr = "El número de identificación de este contacto. Para contactos españoles es el número DNI/NIF/NIE; de lo contrario, el número de documento o pasaporte.";

$_LANG["cnrxesownertipoidentificacion"] = "Titular, tipo de identificación";
$_LANG["cnrxesadmintipoidentificacion"] = "Admin, tipo de identificación";
$_LANG["cnrxestechtipoidentificacion"] = "Técnico, tipo de identificación";
$_LANG["cnrxesbillingtipoidentificacion"] = "Facturación, tipo de identificación";

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

$_LANG["cnrxesowneridentificacion"] = "Titular, número de identificación";
$_LANG["cnrxesadminidentificacion"] = "Admin, número de identificación";
$_LANG["cnrxestechidentificacion"] = "Técnico, número de identificación";
$_LANG["cnrxesbillingidentificacion"] = "Facturación, número de identificación";

$_LANG["cnrxesowneridentificaciondescr"] = $idnodescr;
$_LANG["cnrxesadminidentificaciondescr"] = $idnodescr;
$_LANG["cnrxestechidentificaciondescr"] = $idnodescr;
$_LANG["cnrxesbillingidentificaciondescr"] = $idnodescr;

$_LANG["cnrxesownerlegalform"] = "Titular, forma jurídica";
$_LANG["cnrxesadminlegalform"] = "Admin, forma jurídica";
$_LANG["cnrxestechlegalform"] = "Técnico, forma jurídica";
$_LANG["cnrxesbillinglegalform"] = "Facturación, forma jurídica";

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
$_LANG["cnrxeuregistrantlang"] = "Titular, idioma";
$_LANG["cnrxeuregistrantcitizenship"] = "Titular, nacionalidad";
$_LANG["cnrxeuregistrantlangdescr"] = "Idioma para la comunicación con el operador de la TLD (por defecto = inglés)";
$_LANG["cnrxeuregistrantcitizenshipdescr"] = "Las personas físicas con ciudadanía europea que no residan en la UE pueden registrar dominios .eu con esta configuración.";

// ----------------------------------------------------------------------
// ------------------ .FI Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxficompanyregid"] = "Titular, ID de empresa o número de registro";
$_LANG["cnrxficompanyregiddescr"] = "Entidad comercial local (registrada en el registro mercantil finlandés o una corporación dentro de la República de Finlandia)<br/>(requerido para entidades no finlandesas)";
$_LANG["cnrxfipersonalid"] = "Titular, número de identificación personal";
$_LANG["cnrxfipersonaliddescr"] = "Número de identificación personal finlandés<br/>(requerido para personas físicas no finlandesas)";
$_LANG["cnrxfibirthdate"] = "Titular, fecha de nacimiento";
$_LANG["cnrxfibirthdatedescr"] = "Fecha de nacimiento (AAAA-MM-DD)<br/>(requerido para personas físicas no finlandesas)";
$_LANG["cnrxficontacttype"] = "Titular, tipo de contacto";
$_LANG["cnrxficontacttype0"] = "Persona física";
$_LANG["cnrxficontacttype1"] = "Empresa";
$_LANG["cnrxficontacttype2"] = "Corporación";
$_LANG["cnrxficontacttype3"] = "Institución";
$_LANG["cnrxficontacttype4"] = "Partido político";
$_LANG["cnrxficontacttype5"] = "Municipio";
$_LANG["cnrxficontacttype6"] = "Gobierno";
$_LANG["cnrxficontacttype7"] = "Comunidad pública";
$_LANG["cnrxficontacttypedescr"] = "";

// ----------------------------------------------------------------------
// ------------------ .GAY Fields ---------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxgayacceptrequirements"] = "Aceptar requisitos";
$_LANG["cnrxgayacceptrequirements0"] = $_LANG["cnr0"];
$_LANG["cnrxgayacceptrequirements1"] = $_LANG["cnr1"];
$_LANG["cnrxgayacceptrequirementsdescr"] = "Confirmo que el dominio NO se utilizará para incitar a la violencia, acoso, intimidación o discurso de odio y que NO será utilizado por grupos reconocidos de odio. DotGay dona el 20% de cada dominio registrado a sus socios, GLAAD y CenterLink.";

// ----------------------------------------------------------------------
// ------------------ .HK Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxhkownerdocumenttype"] = "Titular, tipo de documento";
$_LANG["cnrxhkownerdocumenttypehkid"] = "Persona física: número de identificación de Hong Kong";
$_LANG["cnrxhkownerdocumenttypeothid"] = "Persona física: número de identificación de otro país";
$_LANG["cnrxhkownerdocumenttypepassno"] = "Persona física: número de pasaporte";
$_LANG["cnrxhkownerdocumenttypebirthcert"] = "Persona física: certificado de nacimiento";
$_LANG["cnrxhkownerdocumenttypeothidv"] = "Persona física: otro documento";
$_LANG["cnrxhkownerdocumenttypebr"] = "Organización: registro mercantil";
$_LANG["cnrxhkownerdocumenttypeci"] = "Organización: certificado de constitución";
$_LANG["cnrxhkownerdocumenttypecrs"] = "Organización: certificado de registro escolar";
$_LANG["cnrxhkownerdocumenttypehksarg"] = "Organización: departamento gubernamental de Hong Kong";
$_LANG["cnrxhkownerdocumenttypehkordinance"] = "Organización: ordenanza de Hong Kong";
$_LANG["cnrxhkownerdocumenttypeothorg"] = "Organización: otro documento";
$_LANG["cnrxhkownerdocumenttypedescr"] = "";
$_LANG["cnrxhkownerdocumentnumber"] = "Titular, número de documento";
$_LANG["cnrxhkownerdocumentnumberdescr"] = "";
$_LANG["cnrxhkownerdocumentorigincountry"] = "Titular, país de emisión del documento";
$_LANG["cnrxhkownerdocumentorigincountrydescr"] = "El país donde se emitió este documento (por favor, indique el código ISO de 2 letras, por ejemplo, ES o US).";
$_LANG["cnrxhkownerotherdocumenttype"] = "Titular, otro tipo de documento";
$_LANG["cnrxhkownerotherdocumenttypedescr"] = "Requerido si el tipo de documento seleccionado anteriormente es '" . $_LANG["cnrxhkownerdocumenttypeothidv"] . "' o '" . $_LANG["cnrxhkownerdocumenttypeothorg"] . "'.";
$_LANG["cnrxhkdomaincategory"] = "Categoría de dominio";
$_LANG["cnrxhkdomaincategoryi"] = "Persona física";
$_LANG["cnrxhkdomaincategoryo"] = "Organización";
$_LANG["cnrxhkdomaincategorydescr"] = "Tipo legal de todos los contactos del dominio";
$_LANG["cnrxhkownerageover18"] = "Titular, mayor de 18 años";
$_LANG["cnrxhkownerageover18no"] = $_LANG["cnr0"];
$_LANG["cnrxhkownerageover18yes"] = $_LANG["cnr1"];
$_LANG["cnrxhkownerageover18descr"] = "Confirmo que el titular tiene al menos 18 años (solo requerido para personas físicas).";

// ----------------------------------------------------------------------
// ------------------ .IE Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxiecontacttype"] = "Titular, tipo de contacto";
$_LANG["cnrxiecontacttypecom"] = "Empresa";
$_LANG["cnrxiecontacttypecha"] = "Fundación";
$_LANG["cnrxiecontacttypeoth"] = "Otro";
$_LANG["cnrxiecontacttypedescr"] = "";
$_LANG["cnrxielanguage"] = "Titular, idioma";
$_LANG["cnrxielanguageen"] = "Inglés";
$_LANG["cnrxielanguagefr"] = "Francés";
$_LANG["cnrxielanguagedescr"] = "Idioma para la comunicación con el operador de la TLD (por defecto = inglés)";
$_LANG["cnrxiecronumber"] = "Titular, número CRO";
$_LANG["cnrxiecronumberdescr"] = "Número de registro mercantil (CRO)";
$_LANG["cnrxiesupportingnumber"] = "Titular, número de soporte";
$_LANG["cnrxiesupportingnumberdescr"] = "Número de soporte/fundación";

// ----------------------------------------------------------------------
// ------------------ .IT Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxitconsentforpublishing"] = $_LANG["cnrconsentforpublishing"];
$_LANG["cnrxitconsentforpublishing0"] = $_LANG["cnr0"];
$_LANG["cnrxitconsentforpublishing1"] = $_LANG["cnr1"];
$_LANG["cnrxitconsentforpublishingdescr"] = "Permitir la publicación de los datos de contacto personales. Solo se puede rechazar si el tipo de entidad abajo es 1.";
$_LANG["cnrxitentitytype"] = "Titular, tipo de entidad";
$_LANG["cnrxitentitytype1"] = "[1] Personas físicas italianas y extranjeras";
$_LANG["cnrxitentitytype2"] = "[2] Empresas/empresarios individuales";
$_LANG["cnrxitentitytype3"] = "[3] Profesionales/liberales";
$_LANG["cnrxitentitytype4"] = "[4] Organizaciones sin ánimo de lucro";
$_LANG["cnrxitentitytype5"] = "[5] Organizaciones públicas";
$_LANG["cnrxitentitytype6"] = "[6] Otros sujetos";
$_LANG["cnrxitentitytype7"] = "[7] Extranjeros equivalentes a 2-6";
$_LANG["cnrxitentitytypedescr"] = "Tipo de entidad para identificar al titular.";
$_LANG["cnrxitpin"] = "Titular, código fiscal";
//$_LANG["cnrxitpindescr"] = "";
$_LANG["cnrxitnationality"] = "Titular, nacionalidad";
$_LANG["cnrxitnationalitydescr"] = "La nacionalidad del titular, indicada por el código ISO de 2 letras.";
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
$_LANG["cnrxlvownerregnr"] = "Titular, número de registro";
$_LANG["cnrxlvownerregnrdescr"] = "Número de registro letón utilizado para el contacto titular (por ejemplo, número de registro de empresa)";
$_LANG["cnrxlvadminregnr"] = "Admin, número de registro";
$_LANG["cnrxlvadminregnrdescr"] = "Número de registro letón utilizado para el contacto administrativo (por ejemplo, número de registro de empresa)";
$_LANG["cnrxlvvatnr"] = "Titular, NIF";
$_LANG["cnrxlvvatnrdescr"] = "El NIF del contacto titular (solo para empresas).";

// ----------------------------------------------------------------------
// ------------------ .LT Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxltcompanynumber"] = "Titular, número de empresa";
$_LANG["cnrxltcompanynumberdescr"] = "";

// ----------------------------------------------------------------------
// ------------------ .MY Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxmybusinessnumber"] = "Titular, número de empresa";
$_LANG["cnrxmybusinessnumberdescr"] = "Número de registro de empresa del titular (solo para empresas)";
$_LANG["cnrxmyorganizationtype"] = "Titular, tipo de organización";
$_LANG["cnrxmyorganizationtypedescr"] = "Tipo de empresa del titular (solo para empresas)";
$_LANG["cnrxmyperidentity"] = "Titular, número de identificación personal";
$_LANG["cnrxmyperidentitydescr"] = "Número de identificación personal del titular (solo para personas físicas)";
$_LANG["cnrxmyperdateofbirth"] = "Titular, fecha de nacimiento";
$_LANG["cnrxmyperdateofbirthdescr"] = "Fecha de nacimiento del titular (AAAA-MM-DD, solo para personas físicas)";
$_LANG["cnrxmyrace"] = "Titular, etnia";
$_LANG["cnrxmyracemalay"] = "Malayo";
$_LANG["cnrxmyracechinese"] = "Chino";
$_LANG["cnrxmyraceindian"] = "Indio";
$_LANG["cnrxmyraceothers"] = "Otro";
$_LANG["cnrxmyracedescr"] = "(solo para personas físicas)";

// ----------------------------------------------------------------------
// ------------------ .NO Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxnoorganizationnumber"] = "Titular, número de organización";
$_LANG["cnrxnoorganizationnumberdescr"] = "Número de registro noruego emitido por el Registro Central de Entidades Jurídicas.";
$_LANG["cnrxnopersonidentifier"] = "ID personal Norid";
$_LANG["cnrxnopersonidentifierdescr"] = "ID personal requerida para registrar un dominio .PRIV.NO privado. De lo contrario, dejar en blanco.";

// ----------------------------------------------------------------------
// ------------------ .NU Fields ----------------------------------------
// ----------------------------------------------------------------------
// see further .nu fields at the top of the file
$_LANG["cnrxnuiisidno"] = "Titular, número de identificación";
$_LANG["cnrxnuiisidnodescr"] = "Número de identificación personal, número de identificación de empresa o designación de registro en un registro estatal. Para contactos en Suecia se requiere un número de identificación sueco válido (ejemplo: 123456-1234).";
$_LANG["cnrxnuiisvatno"] = "Titular, NIF";
$_LANG["cnrxnuiisvatnodescr"] = "El NIF del titular (solo para empresas)";

// ----------------------------------------------------------------------
// ------------------ .NYC Fields ---------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxnycextcontact"] = "Contacto externo NY";
$_LANG["cnrxnycextcontactadmin"] = "Contacto administrativo";
$_LANG["cnrxnycextcontacttech"] = "Contacto técnico";
$_LANG["cnrxnycextcontactbilling"] = "Contacto de facturación";
$_LANG["cnrxnycextcontactowner"] = "Titular";
$_LANG["cnrxnycextcontactdescr"] = "El contacto proporcionado debe tener una dirección física válida en la ciudad de Nueva York.";

// ----------------------------------------------------------------------
// ------------------ .PARIS Fields -------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxafniccode"] = $_LANG["cnrxallocationtoken"];
$_LANG["cnrxafniccodedescr"] = $_LANG["cnrxallocationtokendescr"];

// ----------------------------------------------------------------------
// ------------------ .FR, .PM, .RE, .TF, .WF, .YT Fields ---------------
// ----------------------------------------------------------------------
// Organizations (Companies, Associations, etc.)
$_LANG["cnrxfrannounce"] = "Empresa, número de anuncio<br/>(Journal Officiel)";
$_LANG["cnrxfrannouncedescr"] = "El número de anuncio (por ejemplo, 5) en el Journal Officiel. Solo se permiten dígitos.";
$_LANG["cnrxfrdatepublicationjo"] = "Empresa, fecha de publicación<br/>(Journal Officiel)";
$_LANG["cnrxfrdatepublicationjodescr"] = implode(" ", [
    "La fecha de publicación en el boletín oficial / Journal Officiel.",
    "Formato de fecha AAAA-MM-DD"
]);
$_LANG["cnrxfrnumerodepageannouncejo"] = "Empresa, número de página del anuncio<br/>(Journal Officiel)";
$_LANG["cnrxfrnumerodepageannouncejodescr"] = "El número de página del anuncio en el Journal Officiel.";
$_LANG["cnrxfrwaldec"] = "Empresa, ID Waldec";
$_LANG["cnrxfrwaldecdescr"] = "Indica el identificador Waldec asociado a una asociación y suficiente para identificarla si se proporciona. Solo se permiten dígitos.";
$_LANG["cnrxfrdateassociation"] = "Empresa, fecha de la asociación";
$_LANG["cnrxfrdateassociationdescr"] = "Indica la fecha de la asociación. Formato de fecha AAAA-MM-DD.";
$_LANG["cnrxfrduns"] = "Empresa, número DUNS";
$_LANG["cnrxfrdunsdescr"] = implode(" ", [
    "El número DUNS es un identificador único de nueve dígitos para empresas. Abreviatura de Data Universal",
    "Numbering System; se refiere a un nuevo identificador que puede enviarse para una verificación de elegibilidad",
    "a nivel europeo."
]);
$_LANG["cnrxfrlocal"] = "Empresa, ID local";
$_LANG["cnrxfrlocaldescr"] = "Un identificador local específico de un país del Espacio Económico Europeo (por ejemplo, número de certificado comercial).";
$_LANG["cnrxfrnoprezonecheck0"] = $_LANG["cnr0"];
$_LANG["cnrxfrnoprezonecheck1"] = $_LANG["cnr1"];
$_LANG["cnrxfrsirenorsiret"] = "Empresa, número SIREN/SIRET";
$_LANG["cnrxfrsirenorsiretdescr"] = implode(" ", [
    "Para empresas con número SIREN/SIRET válido.",
    "El código SIREN es el número único de empresa en Francia. Lo emite el",
    "Institut national de la statistique et des études économiques (INSEE) y tiene 9 dígitos.",
    "Los primeros 9 dígitos son el número SIREN y los siguientes 5 dígitos son el número NIC",
    "(Numéro Interne de Classement). El número SIRET se emite una vez que registra su",
    "empresa en la Cámara de Comercio (RCS) para comercio, la Cámara de Artesanía para artesanía y",
    "trabajo manual o en la URSSAF para servicios intelectuales.",
    "Los números SIRET constan de 14 dígitos. El número SIRET proporciona información sobre la ubicación de la empresa en Francia",
    "(para empresas establecidas). El nombre de la empresa proporcionado en el contacto titular debe",
    "coincidir exactamente con el de la base de datos SIREN/SIRET ( https://www.infogreffe.fr/ )."
]);
$_LANG["cnrxfrtrademark"] = "Empresa, número de marca";
$_LANG["cnrxfrtrademarkdescr"] = "";
$_LANG["cnrxfrvatid"] = "Empresa, NIF";
$_LANG["cnrxfrvatiddescr"] = "Para empresas con NIF válido.";

// Individual
$_LANG["cnrxfrbirthpc"] = "Titular, código postal (lugar de nacimiento)";
$_LANG["cnrxfrbirthpcdescr"] = implode(" ", [
    "Solo para personas físicas nacidas en Francia, Reunión, Mayotte, Guadalupe, Martinica, Guayana,",
    "Polinesia, Wallis y Futuna o Saint-Pierre-et-Miquelon. Por favor, indique el",
    "código postal del lugar de nacimiento (o al menos el código del departamento)."
]);
$_LANG["cnrxfrbirthcity"] = "Titular, ciudad de nacimiento";
$_LANG["cnrxfrbirthcitydescr"] = implode(" ", [
    "Solo para personas físicas nacidas en Francia, Reunión, Mayotte, Guadalupe, Martinica, Guayana,",
    "Polinesia, Wallis y Futuna o Saint-Pierre-et-Miquelon. Por favor, indique el nombre",
    "de la ciudad."
]);
$_LANG["cnrxfrbirthdate"] = "Titular, fecha de nacimiento";
$_LANG["cnrxfrbirthdatedescr"] = "La fecha de nacimiento del titular en formato AAAA-MM-DD.";
$_LANG["cnrxfrbirthplace"] = "Titular, lugar de nacimiento";
//$_LANG["cnrxfrbirthplacedescr"] = "";
$_LANG["cnrxfrrestrictpub"] = $_LANG["cnrconsentforpublishing"];
$_LANG["cnrxfrrestrictpub0"] = $_LANG["cnr0"];
$_LANG["cnrxfrrestrictpub1"] = $_LANG["cnr1"];
$_LANG["cnrxfrrestrictpubdescr"] = "Solo para personas físicas. Permitir la publicación de los datos de contacto personales.";
$_LANG["cnrxfrnoprezonecheck"] = "Omitir prechequeo DNS";
$_LANG["cnrxfrnoprezonecheckdescr"] = "Determina si el sistema debe realizar una prevalidación DNS antes de enviar la orden al registro.";

// ----------------------------------------------------------------------
// ------------------ .PT Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxpttechidentification"] = "Contacto técnico, NIF";
$_LANG["cnrxpttechidentificationdescr"] = "El número de identificación fiscal del contacto técnico";
$_LANG["cnrxptowneridentification"] = "Titular, NIF";
$_LANG["cnrxptowneridentificationdescr"] = "El número de identificación fiscal del titular";
$_LANG["cnrxpttechmobile"] = "Contacto técnico, móvil";
$_LANG["cnrxpttechmobiledescr"] = "El número de móvil del contacto técnico";
$_LANG["cnrxptownermobile"] = "Titular, móvil";
$_LANG["cnrxptownermobiledescr"] = "El número de móvil del titular";

// ----------------------------------------------------------------------
// ------------------ .RO Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxrocompanynumber"] = "Titular, número de empresa";
$_LANG["cnrxrocompanynumberdescr"] = "(solo requerido para empresas)";
$_LANG["cnrxroidcardorpassportnumber"] = "Titular, número de DNI o pasaporte";
$_LANG["cnrxroidcardorpassportnumberdescr"] = "(solo requerido para personas físicas)";
$_LANG["cnrxrovatnumber"] = "Titular, NIF";
$_LANG["cnrxrovatnumberdescr"] = "(solo requerido para empresas)";

// ----------------------------------------------------------------------
// ------------------ .RU Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxrubirthdate"] = "Titular, fecha de nacimiento";
$_LANG["cnrxrubirthdatedescr"] = "La fecha de nacimiento del titular (DD.MM.AAAA)<br/>(solo requerido para personas físicas)";
$_LANG["cnrxrufirstname"] = "Titular, nombre";
$_LANG["cnrxrufirstnamedescr"] = "El nombre del titular en ruso. Debe completarse con letras rusas y latinas, sin puntos.<br/>(solo requerido para personas físicas)";
$_LANG["cnrxrumiddlename"] = "Titular, segundo nombre";
$_LANG["cnrxrumiddlenamedescr"] = "El segundo nombre del titular en ruso. Debe completarse con letras rusas y latinas, sin puntos.<br/>(solo requerido para personas físicas)";
$_LANG["cnrxrulastname"] = "Titular, apellido";
$_LANG["cnrxrulastnamedescr"] = "El apellido del titular en ruso. Debe completarse con letras rusas y latinas, sin puntos.<br/>(solo requerido para personas físicas)";
$_LANG["cnrxruorganization"] = "Titular, nombre de la organización";
$_LANG["cnrxruorganizationdescr"] = "El nombre de la organización del titular en ruso. Este campo puede contener letras rusas y latinas, números, signos de puntuación y espacios.<br/>(solo requerido para organizaciones registradas en la Federación Rusa)";
$_LANG["cnrxrucode"] = "Titular, número fiscal";
$_LANG["cnrxrucodedescr"] = "El número fiscal (TIN) del titular. Este campo debe contener un número de diez dígitos (el último dígito es un dígito de control).<br/>(solo requerido para organizaciones registradas en la Federación Rusa)";
$_LANG["cnrxrukpp"] = "Titular, código base";
$_LANG["cnrxrukppdescr"] = "El código base (KPP) del titular. Este campo debe contener un número de nueve dígitos.<br/>(solo requerido para organizaciones registradas en la Federación Rusa)";
$_LANG["cnrxrupassportdata"] = "Titular, datos del pasaporte";
$_LANG["cnrxrupassportdatadescr"] = "Los datos del pasaporte del titular. Este campo se completa en ruso y puede contener letras rusas y latinas, números, signos de puntuación y espacios. Formato: número de documento, emitido por, fecha de emisión<br/>(solo requerido para personas físicas)";

// ----------------------------------------------------------------------
// ------------------ .SE Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxnicseidnumber"] = "Titular, número de identificación";
$_LANG["cnrxnicseidnumberdescr"] = "Número personal u organizacional.";
$_LANG["cnrxnicsevatid"] = "Titular, NIF";
$_LANG["cnrxnicsevatiddescr"] = "";
$_LANG["cnrxsediscloseemail"] = "Titular, mostrar correo electrónico";
$_LANG["cnrxsediscloseemaildescr"] = "Permitir la publicación del correo electrónico del titular en el WHOIS público.";
$_LANG["cnrxsedisclosefax"] = "Titular, mostrar fax";
$_LANG["cnrxsedisclosefaxdescr"] = "Permitir la publicación del número de fax del titular en el WHOIS público.";
$_LANG["cnrxsedisclosevoice"] = "Titular, mostrar teléfono";
$_LANG["cnrxsedisclosevoicedescr"] = "Permitir la publicación del número de teléfono del titular en el WHOIS público.";
foreach (["email", "fax", "voice"] as $field) {
    $_LANG["cnrxsedisclose$field" . "0"] = $_LANG["cnr0"];
    $_LANG["cnrxsedisclose$field" . "1"] = $_LANG["cnr1"];
}

// ----------------------------------------------------------------------
// ------------------ .SG Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxsgrcbid"] = "Titular, ID RCB";
$_LANG["cnrxsgrcbiddescr"] = "El número único de empresa (UEN) o el número de registro de empresa (RCB) del titular. Para <u>empresas</u> con sede en Singapur, debe proporcionarse el número de registro de empresa correspondiente O la tarjeta de identidad de contacto para presencia local en Singapur (Formato: S1234567D).";
$_LANG["cnrxsgadminsingpassid"] = "Admin, ID SingPass";
$_LANG["cnrxsgadminsingpassiddescr"] = "La tarjeta de identidad de contacto (ID SingPass) del contacto administrativo<br/>(solo para <u>personas físicas</u> de Singapur, formato: S1234567D)";

// ----------------------------------------------------------------------
// ------------------ .SK Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxskcontactlegalform"] = "Titular, forma jurídica";
$_LANG["cnrxskcontactlegalformdescr"] = "";
// $_LANG["cnrxskcontactlegalformcorp"] = "";
// $_LANG["cnrxskcontactlegalformpers"] = "";
$_LANG["cnrxskcontactidentnumber"] = "Titular, número de registro mercantil";
$_LANG["cnrxskcontactidentnumberdescr"] = "Campo obligatorio para empresas/organizaciones";

// ----------------------------------------------------------------------
// ------------------ .SWISS Fields -------------------------------------
// ----------------------------------------------------------------------
// see other .swiss fields at top of the file
$_LANG["cnrxswissuid"] = "Titular, UID o UPI";
$_LANG["cnrxswissuiddescr"] = implode("", [
    "El ...<ul>",
    "<li>UID (Número de Identificación Empresarial, formato: \"CHE-ddd.ddd.ddd\") para organizaciones o</li>",
    "<li>UPI (Número de Identificación Personal Universal, formato: \"756.dddd.dddd.dd\") para personas físicas</li>",
    "</ul>... del titular (d = dígito).<br/>",
    "Nota: El nombre de la persona y la UPI NO se publican en Whois/RDAP, a diferencia del nombre de la organización y la UID, que sí son visibles."
]);
$_LANG["cnrxswissownertype"] = "Titular, tipo";
$_LANG["cnrxswissownertypep"] = "Persona física";
$_LANG["cnrxswissownertypeo"] = "Organización / Persona jurídica";
$_LANG["cnrxswissownertypedescr"] = "El tipo de identidad del titular.";

// ----------------------------------------------------------------------
// ------------------ .TRAVEL Fields ------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxtravelindustry"] = "Industria de viajes";
$_LANG["cnrxtravelindustryn"] = $_LANG["cnr0"];
$_LANG["cnrxtravelindustryy"] = $_LANG["cnr1"];
$_LANG["cnrxtravelindustrydescr"] = "Confirmo que el titular es miembro de la industria de viajes y posee un número de membresía válido.";

// ----------------------------------------------------------------------
// ------------------ .UK Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxukownercorporatetype"] = "Titular, tipo de empresa";
$_LANG["cnrxukownercorporatetypedescr"] = "";
$_LANG["cnrxukownercorporatetypeother"] = "Otro";
$_LANG["cnrxukownercorporatetypefother"] = "Otro (No-UK)";
$_LANG["cnrxukownercorporatetypeind"] = "Persona física";
$_LANG["cnrxukownercorporatetypefind"] = "Persona física (No-UK)";
$_LANG["cnrxukownercorporatetypefcorp"] = "Empresa (No-UK)";
// $_LANG["cnrxukownercorporatetypeltd"] = "LTD";
// $_LANG["cnrxukownercorporatetypeplc"] = "PLC";
// $_LANG["cnrxukownercorporatetypellp"] = "LLP";
// $_LANG["cnrxukownercorporatetypeip"] = "IP";
$_LANG["cnrxukownercorporatetypecrc"] = "Empresa con carta real";
$_LANG["cnrxukownercorporatetypegov"] = "Agencia gubernamental";
$_LANG["cnrxukownercorporatetypeptnr"] = "Sociedad británica";
$_LANG["cnrxukownercorporatetyperchar"] = "Organización benéfica registrada";
$_LANG["cnrxukownercorporatetypesch"] = "Escuela";
$_LANG["cnrxukownercorporatetypestat"] = "Corporación pública";
$_LANG["cnrxukownercorporatetypestra"] = "Empresario individual";
$_LANG["cnrxukownercorporatenumber"] = "Titular, número de registro mercantil";
$_LANG["cnrxukownercorporatenumberdescr"] = "";

// ----------------------------------------------------------------------
// ------------------ .US Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxusnexusapppurpose"] = "Nexus US, propósito de uso";
$_LANG["cnrxusnexusapppurposep1"] = "Uso comercial con fines de lucro";
$_LANG["cnrxusnexusapppurposep2"] = "Organización sin fines de lucro, asociación, organización religiosa, etc.";
$_LANG["cnrxusnexusapppurposep3"] = "Uso personal";
$_LANG["cnrxusnexusapppurposep4"] = "Fines educativos";
$_LANG["cnrxusnexusapppurposep5"] = "Fines gubernamentales";
$_LANG["cnrxusnexusapppurposedescr"] = "";
$_LANG["cnrxusnexuscategory"] = "Nexus US, categoría";
$_LANG["cnrxusnexuscategoryc11"] = "[C11] Ciudadano estadounidense";
$_LANG["cnrxusnexuscategoryc12"] = "[C12] Residente permanente de EE.UU.";
$_LANG["cnrxusnexuscategoryc21"] = "[C21] Organización estadounidense";
$_LANG["cnrxusnexuscategoryc31"] = "[C31] Entidad extranjera con actividades en EE.UU.";
$_LANG["cnrxusnexuscategoryc32"] = "[C32] Entidad extranjera con oficina en EE.UU.";
$_LANG["cnrxusnexuscategorydescr"] = "Categorización de la entidad que realiza la solicitud.<br/>Nota: También se incluyen los territorios y posesiones de EE.UU.";
$_LANG["cnrxusnexusvalidator"] = "Nexus US, país";
$_LANG["cnrxusnexusvalidatordescr"] = "Indique el código de país de dos letras del titular (si la categoría Nexus es C31 o C32)";

// ----------------------------------------------------------------------
// ------------------ .XXX Fields ---------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxxxxcommunityid"] = "ID de miembro de la comunidad";
$_LANG["cnrxxxxcommunityiddescr"] = "ID de miembro de la comunidad patrocinada .XXX";
$_LANG["cnrxxxxdefensive"] = "Registro defensivo<br/>(Dominio no resolvente)";
$_LANG["cnrxxxxdefensive0"] = $_LANG["cnr0"];
$_LANG["cnrxxxxdefensive1"] = $_LANG["cnr1"];
$_LANG["cnrxxxxdefensivedescr"] = implode("", [
    "Confirmo que el dominio es un registro defensivo. ",
    "El registro defensivo se refiere al registro de nombres de dominio, ",
    "a menudo en varias TLD y en diferentes formatos gramaticales, ",
    "con el propósito principal de proteger la propiedad intelectual o marcas contra abusos, ",
    "como el ciberocupación. Se define como un registro que no es único, no resuelve, ",
    "redirige el tráfico a un registro principal o no contiene contenido único.<br/>",
    "Nota: Si no se selecciona, el dominio se considerará como registro defensivo."
]);

// #########################################################################
// #########################################################################
// # Add reusable translations for ALL PROVIDERS                           #
// #########################################################################
// #########################################################################

// ----------------------------------------------------------------------
// ----------------------- DNSSEC MANAGEMENT ----------------------------
// ----------------------------------------------------------------------
$_LANG["cnicdnssecmanagement"] = "Gestión de DNSSEC";




// #########################################################################
// #########################################################################
// # Add translations for ISPAPI registrar module additional domain fields #
// #########################################################################
// #########################################################################

// Terms and Conditions Fields, prefixed with hxflagstac
$_LANG["hxflagstacagreement"] = "Acuerdo";
$_LANG["hxflagstacagreementindiv"] = "Condiciones para particulares";
$_LANG["hxflagstactrustee"] = "Servicio de fiduciario";
$_LANG["hxflagstachighlyregulated"] = "TLD altamente regulada";
$_LANG["hxflagstachighlyregulateddescrdefault"] = ("Confirmo que el titular cumple con los requisitos para registrar este dominio y que todos los datos proporcionados son correctos y verídicos. " .
    "Los criterios de elegibilidad pueden consultarse <a href=\"{TAC}\" target=\"_blank\">aquí</a>."
);
$_LANG["hxflagstachighlyregulateddescreco"] = ($_LANG["hxflagstachighlyregulateddescrdefault"] .
    "<br/>Todos los nombres de dominio .ECO se registran inicialmente con el estado \"server hold\" hasta que se complete/cumpla el perfil mínimo .ECO. " .
    "Esto significa que el titular .ECO 1) garantiza el cumplimiento de los criterios de elegibilidad .ECO y 2) se compromete a apoyar un cambio positivo para el planeta y proporcionar información veraz sobre cualquier acción medioambiental. El titular recibirá un correo electrónico con instrucciones para crear el perfil .ECO. Una vez completado este paso, el dominio {TLD} será activado inmediatamente por el registro."
);
$_LANG["hxflagstachighlyregulateddescrcoop"] = ("Yo, el titular, entiendo, acepto y confirmo que mi organización cumple al menos uno de los requisitos de elegibilidad de {TLD}:" .
    "<ul>" .
    "<li>una cooperativa democrática propiedad de sus miembros, alineada con los 7 principios internacionales de la cooperación; o</li>" .
    "<li>una asociación compuesta por cooperativas; o</li>" .
    "<li>una organización mayoritariamente controlada por una cooperativa; o</li>" .
    "<li>una entidad cuya actividad principal es servir a cooperativas.</li>" .
    "</ul>" .
    "Entiendo y acepto que DotCooperation LLC realiza auditorías de los registros de dominios {TLD} y se reserva el derecho de cancelar o modificar un nombre de dominio según sus políticas."
);
$_LANG["hxflagstachighlyregulateddescrnotac"] = ("Confirmo que reconozco las <b>medidas de protección para TLDs altamente reguladas</b>:<br/>" .
    "<div style=\"text-align:justify\">Usted entiende y acepta cumplir con los requisitos adicionales:" .
    "<ol><li>Datos del contacto administrativo. Usted acepta proporcionar y mantener actualizados los datos del contacto administrativo para recibir notificaciones sobre reclamaciones o reportes de abuso de registro, así como los datos de contacto de las entidades responsables o autorreguladoras del sector en su sede principal.</li>" .
    "<li>Representación. Usted confirma que posee todas las autorizaciones, licencias y/o permisos requeridos para operar en el sector correspondiente a la TLD altamente regulada.</li>" .
    "<li>Cambios en autorizaciones, licencias y permisos. Usted se compromete a notificar cualquier cambio relevante en la validez de estos datos para asegurar el cumplimiento continuo de los requisitos y ejercer su actividad conforme a la normativa y en interés de sus clientes.</li>" .
    "</ol></div>"
);
$_LANG["hxflagstacindividualregulateddescrdefault"] = "Confirme que reconoce las <a href=\"{TAC}\" target=\"_blank\">políticas para particulares</a>.";
$_LANG["hxflagstacregulateddescrdefault"] = "Confirme que reconoce las <a href=\"{TAC}\" target=\"_blank\">condiciones de registro del registro</a> para nuevos registros de dominios {TLD}.";
$_LANG["hxflagstacregulateddescrcira"] = ("<div style=\"text-align:justify\">Haga clic aquí para confirmar que acepta el <a href=\"{TAC}\" target=\"_blank\">Acuerdo de Registro de CIRA</a> y que CIRA puede, a su entera discreción, modificar cualquier término del acuerdo de registro, publicando un aviso de los cambios en el sitio web de CIRA y notificando los cambios materiales a los registrantes. Cumple con todos los requisitos del acuerdo de registro para ser registrante, solicitar el registro de un nombre de dominio y mantener dicho registro, incluyendo, pero no limitado a, los requisitos de presencia canadiense de CIRA para registrantes, <a href=\"https://static.cira.ca/policy/canadian-presence-requirements-for-registrants.pdf\" target=\"_blank\">aquí</a>. CIRA recopilará, usará y divulgará sus datos personales según lo establecido en la política de privacidad de CIRA <a href=\"https://www.cira.ca/policy/corporate/cira-privacy-policy\" target=\_blank\">aquí</a>.</div>"
);
$_LANG["hxflagstacregulateddescrngo"] = ($_LANG["hxflagstacregulateddescrdefault"] .
    "<div style=\"padding:10px 0px;\">Al registrar un dominio {TLD}, también recibirá automáticamente y sin coste adicional un dominio .ONG. Los cambios realizados en el dominio {TLD} se aplicarán automáticamente al dominio .ONG. Por este motivo, el dominio .ONG no aparecerá listado en su inventario de dominios.</div>"
);
$_LANG["hxflagstacregulateddescritsection3"] = ("Confirme que reconoce <b><a href=\"{TAC}\" target=\"_blank\">la Sección 3 - Declaraciones y Asunción de Responsabilidad</a></b>.<br/>" .
    "<div style=\"text-align:justify;margin-bottom:10px;\">" .
    "El titular del nombre de dominio declara bajo su responsabilidad cumplir con los siguientes puntos:" .
    "<ul><li>En caso de registro para una persona física: Poseer ciudadanía o residencia en la Unión Europea.</li>" .
    "<li>En caso de registro para otras entidades: Estar establecido en la Unión Europea.</li>" .
    "<li>Reconocer y aceptar que el registro y la gestión del nombre de dominio están sujetos a las <a href=\"{TAC}\" target=\"_blank\">'Directrices para la gestión de operaciones síncronas en nombres de dominio del ccTLD {TLD}'</a> y las <a href=\"{TAC}\" target=\"_blank\">'Normas y directrices de resolución de disputas en el ccTLD {TLD}'</a> y sus futuras modificaciones.</li>" .
    "<li>Estar autorizado para el uso y/o gestión legal del nombre de dominio solicitado y no infringir derechos de terceros con la solicitud de registro.</li>" .
    "<li>Reconocer que la inclusión de datos personales en la base de datos de dominios asociados, y su posible difusión y acceso a través de Internet, requiere consentimiento explícito mediante la activación de las casillas correspondientes. Véase <a href=\"{TAC}\" target=\"_blank\">'Política DBNA y WHOIS'</a>.</li>" .
    "<li>Reconocer y aceptar que el registro revocará inmediatamente el nombre de dominio en caso de datos incorrectos o falsos en esta solicitud, o tomará otras acciones legales. En tal caso, la revocación no dará lugar a reclamaciones contra el registro.</li>" .
    "<li>Liberar al registro de cualquier responsabilidad derivada de la asignación y uso del nombre de dominio por parte de la persona física que realizó la solicitud.</li>" .
    "<li>Aceptar la jurisdicción y leyes del Estado italiano.</li></ul></div>"
);
$_LANG["hxflagstacregulateddescritsection5"] = ("Confirme que reconoce <b><a href=\"{TAC}\" target=\"_blank\">la Sección 5 - Consentimiento para el tratamiento de datos personales para el registro</b></a>.<br/>" .
    "<div style=\"text-align:justify;margin-bottom:10px;\">" .
    "El solicitante, tras leer la publicación mencionada, otorga su consentimiento para el tratamiento de datos necesario para el registro, conforme a dicha publicación. El consentimiento no es obligatorio. Si no se otorga, el registro, asignación y gestión del nombre de dominio no podrán completarse.</div>"
);
$_LANG["hxflagstacregulateddescritsection6"] = ("Confirme que reconoce <b><a href=\"{TAC}\" target=\"_blank\">la Sección 6 - Consentimiento para la difusión y accesibilidad de datos personales vía Internet</b></a>.<br/>" .
    "<div style=\"text-align:justify;margin-bottom:10px;\">" .
    "El solicitante, tras leer la publicación mencionada, otorga su consentimiento para la difusión y accesibilidad de los datos a través de Internet conforme a dicha publicación. El consentimiento no es obligatorio. Si no se otorga, la difusión y accesibilidad de los datos vía Internet no está permitida.</div>"
);
$_LANG["hxflagstacregulateddescritsection7"] = ("Confirme que reconoce <b><a href=\"{TAC}\" target=\"_blank\">la Sección 7 - Aceptación explícita de los siguientes puntos</b></a>.<br/>" .
    "<div style=\"text-align:justify;margin-bottom:10px;\">" .
    "El solicitante declara expresamente:" .
    "<ul><li>d) Reconocer y aceptar que el registro y la gestión de un nombre de dominio están sujetos a las <a href=\"{TAC}\" target=\"_blank\">'Directrices para la gestión de operaciones síncronas en nombres de dominio del ccTLD {TLD}'</a> y las <a href=\"{TAC}\" target=\"_blank\">'Normas y directrices de resolución de disputas en el ccTLD {TLD}'</a> y sus futuras modificaciones.</li>" .
    "<li>e) Reconocer y aceptar que el registro revocará inmediatamente el nombre de dominio en caso de datos incorrectos o falsos en esta solicitud, o tomará otras acciones legales. En tal caso, la revocación no dará lugar a reclamaciones contra el registro.</li>" .
    "<li>f) Liberar al registro de cualquier responsabilidad derivada de la asignación y uso del nombre de dominio por parte de la persona física que realizó la solicitud.</li>" .
    "<li>g) Aceptar la jurisdicción y leyes del Estado italiano.</li></ul></div>"
);
$_LANG["hxflagstacregulateddescrgoogle"] = ("Usted confirma que {TLD} es un espacio de nombres seguro, es decir, para operar un dominio {TLD} se requiere un certificado SSL. Los sitios web bajo un dominio {TLD} solo serán accesibles mediante una conexión HTTPS cifrada y segura."
);

// Generic Fields
$_LANG["hxflagsintendeduse"] = "Uso previsto";
$_LANG["hxflagsyesnoyes"] = "Sí";
$_LANG["hxflagsyesnono"] = "No";
$_LANG["hxflagsyesnoy"] = "Sí";
$_LANG["hxflagsyesnon"] = "No";
$_LANG["hxflagsyesno1"] = "Sí";
$_LANG["hxflagsyesno0"] = "No";

$_LANG["hxflagslegaltype"] = "Tipo jurídico";
$_LANG["hxflagslegaltypeindiv"] = "Persona física";
$_LANG["hxflagslegaltypeorg"] = "Entidad/Empresa";
$_LANG["hxflagsapplicationpurpose"] = "Finalidad de uso";
$_LANG["hxflagsregistrantidnumber"] = "Titular, número de identificación";
$_LANG["hxflagsregistrantvatid"] = "Titular, NIF/CIF";
$_LANG["hxflagsadminidnumber"] = "Admin-C, número de identificación";
$_LANG["hxflagsadminvatid"] = "Admin-C, NIF/CIF";
$_LANG["hxflagstechidnumber"] = "Tech-C, número de identificación";
$_LANG["hxflagstechvatid"] = "Tech-C, NIF/CIF";
$_LANG["hxflagsbillingidnumber"] = "Billing-C, número de identificación";
$_LANG["hxflagsregistrantidtype"] = "Titular, origen del número de identificación";
$_LANG["hxflagsallocationtoken"] = "Token de asignación del Registro";
$_LANG["hxflagsallocationtokendescr"] = ("Para registrar un dominio {TLD}, debe proporcionar el token de asignación emitido por el Registro. " .
    "Por favor, complete la solicitud <a href=\"{TAC}\" target=\"_blank\">aquí</a> para obtener el token."
);
$_LANG["hxflagsnexuscategory"] = "Categoría Nexus";
$_LANG["hxflagsnexuscountry"] = "Código de país Nexus";
$_LANG["hxflagsfax"] = "Fax requerido";
$_LANG["hxflagsfaxregistrationdescr"] = "Me comprometo a completar y enviar <a href=\"{FAXFORM}\" target=\"_blank\">este formulario</a> después de enviar la solicitud de registro para finalizar el proceso.";
$_LANG["hxflagsfaxtransferdescr"] = "Me comprometo a completar y enviar <a href=\"{FAXFORM}\" target=\"_blank\">este formulario</a> después de enviar la solicitud de transferencia para finalizar el proceso.";
$_LANG["hxflagsidentificationnumber"] = "Número de identificación";
$_LANG["hxflagswhoisoptout"] = "Exclusión WHOIS";
$_LANG["hxflagsregistrantbirthdate"] = "Titular, fecha de nacimiento";

// AFNIC TLDs, prefixed with hxflagsafnic
// Individuals
// reusing .ru translations for birthday
$_LANG["hxflagsafnictldregistrantbirthplace"] = "Titular, lugar de nacimiento";
$_LANG["hxflagsafnictldregistrantbirthplacedescr"] = "(solo requerido para personas físicas)";
// Companies
$_LANG["hxflagsafnictldvatid"] = "NIF o número SIREN/SIRET";
$_LANG["hxflagsafnictldvatiddescr"] = "(solo para entidades con NIF o número SIREN/SIRET)";
$_LANG["hxflagsafnictldtrademark"] = "Número de marca registrada";
$_LANG["hxflagsafnictldtrademarkdescr"] = "(solo para entidades con marca europea)";
$_LANG["hxflagsafnictldduns"] = "Número DUNS";
$_LANG["hxflagsafnictlddunsdescr"] = "(solo para entidades con número DUNS)";
$_LANG["hxflagsafnictldlocalid"] = "Identificador regional";
$_LANG["hxflagsafnictldlocaliddescr"] = "(solo para entidades con identificador regional)";
// French Association, Data from Journal officiel [JO]
$_LANG["hxflagsafnictldjodod"] = "Fecha de anuncio [JO]";
$_LANG["hxflagsafnictldjododdescr"] = "(solo para asociaciones francesas, formato <b>AAAA-MM-DD</b>)";
$_LANG["hxflagsafnictldjonumber"] = "Número [JO]";
$_LANG["hxflagsafnictldjonumberdescr"] = "(solo para asociaciones francesas, número del Journal Officiel)";
$_LANG["hxflagsafnictldjopage"] = "Página del anuncio [JO]";
$_LANG["hxflagsafnictldjopagedescr"] = "(solo para asociaciones francesas, página del anuncio en el Journal Officiel)";
$_LANG["hxflagsafnictldjodop"] = "Fecha de publicación [JO]";
$_LANG["hxflagsafnictldjodopdescr"] = "(solo para asociaciones francesas, fecha de publicación en formato <b>AAAA-MM-DD</b>)";
// Options, Legal Type
$_LANG["hxflagsafnictldlegaltypeindiv"] = "Persona física";
$_LANG["hxflagsafnictldlegaltypeorg1"] = "Entidad con NIF o número SIREN/SIRET";
$_LANG["hxflagsafnictldlegaltypeorg2"] = "Entidad con marca europea";
$_LANG["hxflagsafnictldlegaltypeorg3"] = "Entidad con número DUNS";
$_LANG["hxflagsafnictldlegaltypeorg4"] = "Entidad con identificador regional";
$_LANG["hxflagsafnictldlegaltypeass"] = "Asociación francesa";

// .AERO
$_LANG["hxflagsaerotldaeroid"] = ".AERO ID <sup style=\"cursor:help;\" title=\"Hier ausstellen lassen https://www.information.aero/\">was ist das?</sup>";
$_LANG["hxflagsaerotldaerokey"] = ".AERO Key <sup style=\"cursor:help;\" title=\"Hier ausstellen lassen https://www.information.aero/\">was ist das?</sup>";

// .BE
$_LANG["hxflagsbetldtradeauthdescr"] = "El cambio de titular requiere un código EPP válido. Obligatorio si se modifica el nombre, la organización o el correo electrónico del titular.";

// .CA
$_LANG["hxflagscatldcontactlanguage"] = "Idioma de contacto";
$_LANG["hxflagscatldregistryinformation"] = "Información del registro";
$_LANG["hxflagscatldregistryinformationdescr"] = ("Siempre que registre un dominio {TLD} para un nuevo titular o realice un cambio de titularidad a un nuevo titular, este nuevo titular debe aceptar los " .
    "acuerdos de registro en un plazo de 7 días para que el dominio sea activado. De lo contrario, el registro eliminará el dominio sin reembolso. " .
    "<br/><b>Solo en estos casos el titular recibirá un correo de confirmación con los pasos a seguir para aceptar los acuerdos.</b><br/>" .
    "Si se utiliza un titular ya confirmado para un registro/cambio de titularidad, el proceso se realiza en tiempo real."
);
// Options, Legal Type
$_LANG["hxflagscatldlegaltypecco"] = "Empresa";
$_LANG["hxflagscatldlegaltypecct"] = "Ciudadano canadiense";
$_LANG["hxflagscatldlegaltyperes"] = "Residente permanente en Canadá";
$_LANG["hxflagscatldlegaltypegov"] = "Gobierno o agencia gubernamental en Canadá";
$_LANG["hxflagscatldlegaltypeedu"] = "Institución educativa canadiense";
$_LANG["hxflagscatldlegaltypeass"] = "Asociación canadiense no incorporada";
$_LANG["hxflagscatldlegaltypehos"] = "Hospital canadiense";
$_LANG["hxflagscatldlegaltypeprt"] = "Sociedad registrada en Canadá";
$_LANG["hxflagscatldlegaltypetdm"] = "Marca registrada en Canadá (por titular no canadiense)";
$_LANG["hxflagscatldlegaltypetrd"] = "Sindicato canadiense";
$_LANG["hxflagscatldlegaltypeplt"] = "Partido político canadiense";
$_LANG["hxflagscatldlegaltypelam"] = "Biblioteca, archivo o museo canadiense";
$_LANG["hxflagscatldlegaltypetrs"] = "Fideicomiso constituido en Canadá";
$_LANG["hxflagscatldlegaltypeabo"] = "Pueblos originarios (personas o grupos) residentes en Canadá";
$_LANG["hxflagscatldlegaltypeinb"] = "Tribu indígena reconocida por la Ley de Indios de Canadá";
$_LANG["hxflagscatldlegaltypelgr"] = "Representante legal de un ciudadano canadiense o residente permanente";
$_LANG["hxflagscatldlegaltypeomk"] = "Marca oficial registrada en Canadá";
$_LANG["hxflagscatldlegaltypemaj"] = "Su Majestad la Reina";
// Legal Type Description, don't move it up.
$_LANG["hxflagscatldlegaltypedescr"] = ("<p>El registro canadiense (`CIRA`) se compromete a proteger la privacidad de los datos personales durante la operación y gestión del nombre de dominio.</p>" .
    "<p>Los titulares con la siguiente categorización de presencia canadiense se consideran personas físicas:</p>" .
    "<ul>" .
    "<li>" . $_LANG["hxflagscatldlegaltypecct"] . "</li>" .
    "<li>" . $_LANG["hxflagscatldlegaltyperes"] . "</li>" .
    "<li>" . $_LANG["hxflagscatldlegaltypelgr"] . "</li>" .
    "<li>" . $_LANG["hxflagscatldlegaltypeabo"] . "</li>" .
    "</ul>" .
    "<p>Todas las demás categorías no se consideran personas físicas y, por lo tanto, no pueden modificar la configuración de privacidad WHOIS. En estos casos, los datos de contacto " .
    "serán publicados por el registro en el WHOIS y serán de acceso público. Las personas físicas pueden optar por no publicar estos datos mediante el campo `" . $_LANG["hxflagswhoisoptout"] . "`.</p>"
);

// .CN
// Options, Registrant ID Type
$_LANG["hxflagscntldregistrantidtypesfz"] = "Documento nacional de identidad chino";
$_LANG["hxflagscntldregistrantidtypehz"] = "Pasaporte extranjero";
$_LANG["hxflagscntldregistrantidtypegajmtx"] = "Permiso de entrada/salida para Hong Kong y Macao";
$_LANG["hxflagscntldregistrantidtypetwjmtx"] = "Pasaporte para residentes de Taiwán para entrada/salida";
$_LANG["hxflagscntldregistrantidtypewjlsfz"] = "Documento nacional de identidad extranjero";
$_LANG["hxflagscntldregistrantidtypegajzz"] = "Permiso de residencia para residentes de Hong Kong y Macao";
$_LANG["hxflagscntldregistrantidtypetwjzz"] = "Permiso de residencia para residentes de Taiwán";
$_LANG["hxflagscntldregistrantidtypejgz"] = "Certificado oficial chino";
$_LANG["hxflagscntldregistrantidtypeorg"] = "Certificado CCC";
$_LANG["hxflagscntldregistrantidtypeyyzz"] = "Licencia comercial china";
$_LANG["hxflagscntldregistrantidtypetydm"] = "Certificado USCC";
$_LANG["hxflagscntldregistrantidtypebddm"] = "Código militar";
$_LANG["hxflagscntldregistrantidtypejddwfw"] = "Licencia de servicio externo militar";
$_LANG["hxflagscntldregistrantidtypesydwfr"] = "Certificado de persona jurídica de institución pública";
$_LANG["hxflagscntldregistrantidtypewgczjg"] = "Formulario de registro para representaciones de empresas extranjeras";
$_LANG["hxflagscntldregistrantidtypeshttfr"] = "Certificado de registro de organización social";
$_LANG["hxflagscntldregistrantidtypezjcs"] = "Certificado de registro de lugar de actividad religiosa";
$_LANG["hxflagscntldregistrantidtypembfqy"] = "Certificado de registro de entidad privada no empresarial";
$_LANG["hxflagscntldregistrantidtypejjhfr"] = "Certificado de registro de fundación";
$_LANG["hxflagscntldregistrantidtypelszy"] = "Licencia de bufete de abogados";
$_LANG["hxflagscntldregistrantidtypewgzhwh"] = "Certificado de registro de centro cultural extranjero en China";
$_LANG["hxflagscntldregistrantidtypewlczjg"] = "Certificado de registro para representaciones de departamentos turísticos extranjeros";
$_LANG["hxflagscntldregistrantidtypesfjd"] = "Certificado de formación jurídica";
$_LANG["hxflagscntldregistrantidtypejwjg"] = "Certificado de empresa extranjera";
$_LANG["hxflagscntldregistrantidtypeshfwjg"] = "Certificado de registro de agencia de servicios sociales";
$_LANG["hxflagscntldregistrantidtypembxxbx"] = "Permiso de escuela privada";
$_LANG["hxflagscntldregistrantidtypeyljgzy"] = "Licencia de institución médica";
$_LANG["hxflagscntldregistrantidtypegzjgzy"] = "Licencia de notaría";
$_LANG["hxflagscntldregistrantidtypebjwsxx"] = "Permiso de escuela para hijos de diplomáticos extranjeros en Beijing/China";
$_LANG["hxflagscntldregistrantidtypeqttydm"] = "Otro - Certificado de código de crédito social unificado";
$_LANG["hxflagscntldregistrantidtypeqt"] = "Otro";

// .COM.AU
// Options, Registrant ID Type
$_LANG["hxflagsautldregistrantidtypeabn"] = "Número de empresa australiano (ABN)";
$_LANG["hxflagsautldregistrantidtypeacn"] = "Número de compañía australiana (ACN)";
$_LANG["hxflagsautldregistrantidtyperbn"] = "Número de registro comercial";
$_LANG["hxflagsautldregistrantidtypetm"] = "Número de marca registrada";

// .COM.BR
$_LANG["hxflagscombrtldidentificationnumberdescr"] = "Por favor, indique su número CPF o CNPJ, emitido por el Ministerio de Hacienda de Brasil para fines fiscales.";

// .DE
$_LANG["hxflagsdetldgeneralrequestcontact"] = "Contacto para consultas generales";
$_LANG["hxflagsdetldabuseteamcontact"] = "Contacto para reportes de abuso";
$_LANG["hxflagsdetldgeneralrequestcontactdescr"] = "Puede indicar una dirección de correo electrónico o sitio web";
$_LANG["hxflagsdetldabuseteamcontactdescr"] = "Puede indicar una dirección de correo electrónico o sitio web";

// .DK
$_LANG["hxflagsdktldregistrantcontact"] = "Titular, contacto";
$_LANG["hxflagsdktldregistrantlegaltype"] = "Titular, tipo jurídico";
$_LANG["hxflagsdktldregistrantvatiddescr"] = "(solo requerido si arriba seleccionó `Empresa`)";
$_LANG["hxflagsdktldadminvatiddescr"] = "(solo requerido si arriba seleccionó `Empresa`)";
$_LANG["hxflagsdktldregistrantlegaltypeindiv"] = "Persona física";
$_LANG["hxflagsdktldregistrantlegaltypeorg"] = "Empresa";
$_LANG["hxflagsdktldadmincontact"] = "Admin-C, contacto";
$_LANG["hxflagsdktldadminlegaltype"] = "Admin-C, tipo jurídico";
$_LANG["hxflagsdktldadminlegaltypeindiv"] = "Persona física";
$_LANG["hxflagsdktldadminlegaltypeorg"] = "Empresa";
$_LANG["hxflagsdktldlegaltypedescr"] = "Seleccione también `Persona física` en caso de microempresa sin número de IVA (los datos de empresa serán ocultados en el registro).";
$_LANG["hxflagsdktldregistrantlegaltypedescr"] = $_LANG["hxflagsdktldlegaltypedescr"] . "<div style=\"margin-top:10px\"><b>Nota para titulares:</b> DK Hostmaster requiere confirmación por correo electrónico. Revise su bandeja de entrada y spam y confirme el proceso en un plazo de 4 días.</div>";
$_LANG["hxflagsdktldcontactdescr"] = "ID de usuario de DK-HOSTMASTER";

// .ES
$_LANG["hxflagsestldregistranttype"] = "Titular, tipo";
$_LANG["hxflagsestldregistrantidentificationnumber"] = "Titular, número de identificación";
$_LANG["hxflagsestldadmintype"] = "Admin-C, tipo";
$_LANG["hxflagsestldadminidentificationnumber"] = "Admin-C, número de identificación";
$_LANG["hxflagsestldlegalform"] = "Titular, forma jurídica";
// Options, Legal Type
$_LANG["hxflagsestldlegalform1"] = "Persona física";
$_LANG["hxflagsestldlegalform39"] = "Asociación de intereses económicos";
$_LANG["hxflagsestldlegalform47"] = "Asociación";
$_LANG["hxflagsestldlegalform59"] = "Club deportivo";
$_LANG["hxflagsestldlegalform68"] = "Asociación profesional";
$_LANG["hxflagsestldlegalform124"] = "Caja de ahorros";
$_LANG["hxflagsestldlegalform150"] = "Bienes comunales";
$_LANG["hxflagsestldlegalform152"] = "Comunidad de propietarios";
$_LANG["hxflagsestldlegalform164"] = "Orden o institución religiosa";
$_LANG["hxflagsestldlegalform181"] = "Consulado";
$_LANG["hxflagsestldlegalform197"] = "Corporación de derecho público";
$_LANG["hxflagsestldlegalform203"] = "Embajada";
$_LANG["hxflagsestldlegalform229"] = "Administración local";
$_LANG["hxflagsestldlegalform269"] = "Federación deportiva";
$_LANG["hxflagsestldlegalform286"] = "Fundación";
$_LANG["hxflagsestldlegalform365"] = "Mutua de seguros";
$_LANG["hxflagsestldlegalform434"] = "Autoridad gubernamental regional";
$_LANG["hxflagsestldlegalform436"] = "Autoridad gubernamental central";
$_LANG["hxflagsestldlegalform439"] = "Partido político";
$_LANG["hxflagsestldlegalform476"] = "Sociedad mercantil";
$_LANG["hxflagsestldlegalform510"] = "Sociedad agraria";
$_LANG["hxflagsestldlegalform524"] = "Sociedad anónima";
$_LANG["hxflagsestldlegalform525"] = "Club deportivo";
$_LANG["hxflagsestldlegalform554"] = "Sociedad civil";
$_LANG["hxflagsestldlegalform560"] = "Sociedad colectiva";
$_LANG["hxflagsestldlegalform562"] = "Sociedad colectiva y comanditaria";
$_LANG["hxflagsestldlegalform566"] = "Cooperativa";
$_LANG["hxflagsestldlegalform608"] = "Empresa gestionada por empleados";
$_LANG["hxflagsestldlegalform612"] = "Sociedad limitada";
$_LANG["hxflagsestldlegalform713"] = "Oficina española";
$_LANG["hxflagsestldlegalform717"] = "Cooperación empresarial temporal";
$_LANG["hxflagsestldlegalform744"] = "Sociedad anónima gestionada por empleados";
$_LANG["hxflagsestldlegalform745"] = "Entidad pública regional";
$_LANG["hxflagsestldlegalform746"] = "Entidad pública nacional";
$_LANG["hxflagsestldlegalform747"] = "Entidad pública local";
$_LANG["hxflagsestldlegalform878"] = "Consejo regulador de denominación de origen";
$_LANG["hxflagsestldlegalform879"] = "Entidad gestora de espacios naturales";
$_LANG["hxflagsestldlegalform877"] = "Otros";
// Options, Registrant ID Type
$_LANG["hxflagsestldregistranttype0"] = "Titular no español";
$_LANG["hxflagsestldregistranttype1"] = "Persona física o empresa española";
$_LANG["hxflagsestldregistranttype3"] = "Certificado de registro de extranjero";
$_LANG["hxflagsestldregistranttype4"] = "NIF";
$_LANG["hxflagsestldadmintype0"] = "Entidad no española";
$_LANG["hxflagsestldadmintype1"] = "Persona física o empresa española";
$_LANG["hxflagsestldadmintype3"] = "Certificado de registro de extranjero";

// .EU
$_LANG["hxflagseutldregistrantcitizenship"] = "Titular, nacionalidad";
$_LANG["hxflagseutldregistrantcitizenshipdescr"] = "Requerido para ciudadanos europeos (personas físicas) residentes fuera de la UE";
$_LANG["hxflagseutldlegaltypeindiv"] = $_LANG["hxflagslegaltypeindiv"];
$_LANG["hxflagseutldlegaltypeorg"] = $_LANG["hxflagslegaltypeorg"];

// .FI
$_LANG["hxflagsfitldregistrantidnumberdescr"] = ("<ul><li>Empresas: Indique el número de registro mercantil.</li>" .
    "<li>Personas físicas de Finlandia: Indique el número de identificación personal.</li>" .
    "<li>Otras personas físicas: No indicar nada.</li></ul>" .
    "La entrada para personas físicas debe tener once caracteres con el formato `DDMMYYCZZZQ`. Aquí, `DDMMYY` es la fecha de nacimiento; " .
    "`C` es el signo de siglo: `+` para 1800–1899, `-` para 1900–1999 o `A` para 2000-2099;" .
    "`ZZZ` es el número individual: impar para hombres, par para mujeres y para nacidos en Finlandia el rango 002-899 " .
    "(En casos excepcionales también números mayores);" .
    "`Q` es el carácter de control (checksum). Ejemplo de identificación válida: 311280-888Y."
);
$_LANG["hxflagsfitldregistrantbirthdatedescr"] = "(AAAA-MM-DD; solo requerido para personas físicas no finlandesas)";

// .HK
$_LANG["hxflagshktldregistrantdocumenttype"] = "Titular, tipo de documento";
$_LANG["hxflagshktldregistrantotherdocumenttype"] = "Titular, otro tipo de documento";
$_LANG["hxflagshktldregistrantdocumentnumber"] = "Titular, número de documento";
$_LANG["hxflagshktldregistrantdocumentorigincountry"] = "Titular, país de emisión del documento";
$_LANG["hxflagshktldregistrantbirthdateforindividuals"] = "Titular, fecha de nacimiento (personas físicas)";
// Options, Registrant Document Type
$_LANG["hxflagshktldregistrantdocumenttypehkid"] = "Persona física: número de identificación de Hong Kong";
$_LANG["hxflagshktldregistrantdocumenttypeothid"] = "Persona física: número de identificación de otro país";
$_LANG["hxflagshktldregistrantdocumenttypepassno"] = "Persona física: número de pasaporte";
$_LANG["hxflagshktldregistrantdocumenttypebirthcert"] = "Persona física: certificado de nacimiento";
$_LANG["hxflagshktldregistrantdocumenttypeothidv"] = "Persona física: otro documento";
$_LANG["hxflagshktldregistrantdocumenttypebr"] = "Organización: registro mercantil";
$_LANG["hxflagshktldregistrantdocumenttypeci"] = "Organización: certificado de constitución";
$_LANG["hxflagshktldregistrantdocumenttypecrs"] = "Organización: certificado de registro escolar";
$_LANG["hxflagshktldregistrantdocumenttypehksarg"] = "Organización: departamento gubernamental de Hong Kong";
$_LANG["hxflagshktldregistrantdocumenttypehkordinance"] = "Organización: ordenanza de Hong Kong";
$_LANG["hxflagshktldregistrantdocumenttypeothorg"] = "Organización: otro documento";
$_LANG["hxflagshktldregistrantdocumenttypedescr"] = ("(NOTA: Adicionalmente, puede ser necesario que nos envíe una copia del documento por correo electrónico. Para .HK este paso solo es necesario " .
    "si lo solicita el registro. Para .COM.HK se requiere la licencia comercial antes de procesar la solicitud de registro.)"
);
$_LANG["hxflagshktldregistrantotherdocumenttypedescr"] = "(requerido si selecciona el tipo `Persona física/Organización - Otro documento`)";
$_LANG["hxflagshktldregistrantbirthdateforindividualsdescr"] = "(requerido para personas físicas, formato AAAA-MM-DD)";
