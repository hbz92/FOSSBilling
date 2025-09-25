<?php

// #########################################################################
// #########################################################################
// # Add translations for CNR registrar module additional domain fields    #
// #########################################################################
// #########################################################################

// ----------------------------------------------------------------------
// ------------------ .DK Checkout Page ---------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrdkcheckoutheading"] = "Algemene voorwaarden voor .dk domeinnamen";
$_LANG["cnrdkcheckoutintro"] = "Om een .dk domeinnaam te registreren, dient u een overeenkomst aan te gaan met Punktum.dk A/S. Punktum dk is de registry voor alle .dk domeinnamen.";
$_LANG["cnrdkcheckoutdomains"] = "Domeinnamen:";
$_LANG["cnrdkcheckoutregistrant"] = "Domeinhouder:";
$_LANG["cnrdkcheckoutregistrantaddress"] = "Zie hierboven";
$_LANG["cnrdkcheckoutadmin"] = "Domeinbeheerder:";
$_LANG["cnrdkcheckoutadminaddress"] = "Punktum dk A/S<br/>Ørestads Boulevard 108, 11e verdieping<br/>DK-2300 Kopenhagen S";
$_LANG["cnrdkcheckouttac"] = implode("<br/><br/>", [
    "Ik ga ermee akkoord een overeenkomst aan te gaan voor het recht op gebruik van de opgegeven .dk domeinnaam volgens de geldende voorwaarden. Dit betekent onder andere dat ik ervoor zorg dat mijn contactgegevens als houder altijd correct zijn. Ik zal de identiteitscontrole van Punktum dk A/S uitvoeren indien daarom wordt gevraagd.",
    "Mijn recht op gebruik van de opgegeven .dk domeinnaam kan worden overgedragen, opgeschort, verwijderd of geblokkeerd volgens de voorwaarden in de gebruiksvoorwaarden van Punktum dk A/S.",
    "Conform sectie 18 (2) (13) van de Deense consumentenovereenkomstenwet doe ik afstand van het recht om de overeenkomst betreffende het gebruiksrecht van de opgegeven .dk domeinnaam te herroepen.",
    "Ik geef toestemming dat Punktum dk A/S, als domeinbeheerder, mijn persoonsgegevens verwerkt volgens het privacybeleid.",
    "Ik ga ermee akkoord dat ik aan deze provider de vergoeding voor de eerste registratieperiode van de opgegeven .dk domeinnaam betaal en dat de betaling voor volgende registratieperiodes afhankelijk is van mijn keuze voor het beheerregime, conform sectie 2.1 van de algemene voorwaarden van Punktum dk A/S."
]);
$_LANG["cnrdkcheckouttacurl"] = "https://www.punktum.dk/en/articles/terms-and-conditions-for-the-right-of-use-to-a-dk-domain-name";
$_LANG["cnrdkcheckouttacurltext"] = "Algemene voorwaarden voor het gebruiksrecht van een .dk domeinnaam";
$_LANG["cnrdkcheckoutpolicyurl"] = "https://www.punktum.dk/en/articles/privacy-policy";
$_LANG["cnrdkcheckoutpolicyurltext"] = "Privacybeleid";
$_LANG["cnrdkcheckoutabouturl"] = "https://www.punktum.dk/en/about-us";
$_LANG["cnrdkcheckoutabouturltext"] = "Over Punktum dk A/S";
$_LANG["cnrdkcheckouttacagree"] = "Ja, ik accepteer de gebruikersovereenkomst met Punktum dk A/S.";

// ----------------------------------------------------------------------
// ------------------ Common CNR Translations ---------------------------
// ----------------------------------------------------------------------
$_LANG["cnrchoose"] = "Selecteer alstublieft";
$_LANG["cnroptional"] = "optioneel";
$_LANG["cnr1"] = "Ja";
$_LANG["cnr0"] = "Nee";
$_LANG["cnrconsentforpublishing"] = "Domeinhouder, toestemming voor publicatie";
// .abogado, .aero, .attorney, .bank, .broker, .dentist, .forex, .insurance, .lotto, .law, .lawyer, .markets, .trading
$_LANG["cnrxallocationtoken"] = "Registry bestelsleutel";
$_LANG["cnrxallocationtokendescr"] = "Alleen vereist voor premium domeinen. Uitgegeven door de TLD-provider. Neem contact op indien u hulp nodig heeft.";
// .app, .page, .dev, .new, .day, .channel, .boo, .foo, .zip, .mov, .nexus, .dad, .phd, .prof, .esq, .rsvp, .meme, .ing, .new
$_LANG["cnrxacceptsslrequirement"] = "SSL vereisten";
$_LANG["cnrxacceptsslrequirementdescr"] = "Ik bevestig dat ik de vereisten voor HTTPS / een SSL-certificaat begrijp en accepteer. Deze TLD is een beveiligde domeinextensie, wat betekent dat HTTPS verplicht is voor alle websites. U kunt uw domeinnaam nu registreren, maar om deze correct te laten functioneren in browsers, moet u HTTPS configureren op basis van een SSL-certificaat.";
$_LANG["cnrxacceptsslrequirement0"] = $_LANG["cnr0"];
$_LANG["cnrxacceptsslrequirement1"] = $_LANG["cnr1"];
// .attorney, .dentist, .lawyer
$_LANG["cnrxunitedtldregulatorydata"] = "Regulerende instantie informatie";
$_LANG["cnrxunitedtldregulatorydatadescr"] = "Informatie over de goedkeurende instantie/toezichthouder/regulerende autoriteit";
// .barcelona, .cat, .madrid, .scot, .sport, .swiss
$_LANG["cnrxintendeduse"] = "Beoogd gebruik";
$_LANG["cnrxintendedusedescr"] = implode("<br/>", [
    "Toelichting op het beoogde gebruik van de domeinnaam. Indien van toepassing, graag een expliciete verwijzing naar het geclaimde recht van de aanvrager op de naam (indien niet de bedrijfsnaam van de aanvrager).",
    "Bijvoorbeeld, als de domeinnaam overeenkomt met een merknaam, dient het merkregistratienummer te worden opgegeven (max. 256 tekens)."
]);
// .mk
$_LANG["cnrxcompanyvatid"] = "Domeinhouder, btw-nummer";
// $_LANG["cnrxcompanyvatiddescr"] = "";
// .nu, .se
$_LANG["cnrxrequestauthcode"] = "Nieuwe EPP-code aanvragen";
$_LANG["cnrxrequestauthcode0"] = $_LANG["cnr0"];
$_LANG["cnrxrequestauthcode1"] = $_LANG["cnr1"];
$_LANG["cnrxrequestauthcodedescr"] = "Indien u de domein wilt verhuizen naar een andere registrar, heeft u de Auth-code nodig. Deze wordt verstuurd naar het e-mailadres van de domeinhouder.";

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
$_LANG["cnrxaeroensauthid"] = "AERO Lidmaatschaps-ID";
$_LANG["cnrxaeroensauthiddescr"] = "De .AERO lidmaatschaps-ID is vereist om een domeinnaam in de luchtvaartsector te registreren. U kunt deze <a style=\"text-decoration:underline\" href=\"https://information.aero/node/add/request-aero-id\" target=\"_blank\">hier</a> aanvragen.";
$_LANG["cnrxaeroensauthkey"] = "Lidmaatschapswachtwoord";
$_LANG["cnrxaeroensauthkeydescr"] = "Het bijbehorende wachtwoord/authcode dat samen met de .AERO lidmaatschaps-ID via bovenstaande website wordt verstrekt.";

// ----------------------------------------------------------------------
// ------------------ .AU Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxaudomainrelation"] = "Relatie";
$_LANG["cnrxaudomainrelation1"] = "De second-level domeinnaam is een exacte overeenkomst, acroniem of afkorting van de bedrijfs- of handelsnaam, organisatienaam, verenigingsnaam of merknaam.";
$_LANG["cnrxaudomainrelation2"] = "De second-level domeinnaam heeft een nauwe en substantiële band met de organisatie of de activiteiten die door de organisatie worden uitgevoerd.";
$_LANG["cnrxaudomainrelationdescr"] = "Dit geeft de relatie aan tussen het type recht (bijv. handelsnaam) en de domeinnaam.";
$_LANG["cnrxaudomainrelationtype"] = "Relatietype";
$_LANG["cnrxaudomainrelationtypecompany"] = "Bedrijf";
$_LANG["cnrxaudomainrelationtyperegisteredbusiness"] = "Geregistreerd bedrijf";
$_LANG["cnrxaudomainrelationtypesoletrader"] = "Eenmanszaak";
$_LANG["cnrxaudomainrelationtypepartnership"] = "Vennootschap onder firma";
$_LANG["cnrxaudomainrelationtypetrademarkowner"] = "Merkhouder";
$_LANG["cnrxaudomainrelationtypependingtmowner"] = "Merkregistratie in aanvraag";
$_LANG["cnrxaudomainrelationtypecitizenresident"] = "Burger / Inwoner"; // .id.au only
$_LANG["cnrxaudomainrelationtypeincorporatedassociation"] = "Ingeschreven vereniging";
$_LANG["cnrxaudomainrelationtypeclub"] = "Club";
$_LANG["cnrxaudomainrelationtypenonprofitorganisation"] = "Non-profitorganisatie";
$_LANG["cnrxaudomainrelationtypecharity"] = "Goede doelen organisatie";
$_LANG["cnrxaudomainrelationtypetradeunion"] = "Vakbond";
$_LANG["cnrxaudomainrelationtypeindustrybody"] = "Brancheorganisatie";
$_LANG["cnrxaudomainrelationtypecommercialstatutorybody"] = "Commerciële publiekrechtelijke instelling";
$_LANG["cnrxaudomainrelationtypepoliticalparty"] = "Politieke partij";
$_LANG["cnrxaudomainrelationtypeother"] = "Overig";
$_LANG["cnrxaudomainrelationtypereligiouschurchgroup"] = "Religieuze / Kerkelijke groep";
$_LANG["cnrxaudomainrelationtypehighereducationinstitution"] = "Hoger onderwijsinstelling";
$_LANG["cnrxaudomainrelationtyperesearchorganisation"] = "Onderzoeksinstelling";
$_LANG["cnrxaudomainrelationtypegovernmentschool"] = "Openbare school";
$_LANG["cnrxaudomainrelationtypechildcarecentre"] = "Kinderopvangcentrum";
$_LANG["cnrxaudomainrelationtypepreschool"] = "Peuterspeelzaal";
$_LANG["cnrxaudomainrelationtypenationalbody"] = "Nationale organisatie";
$_LANG["cnrxaudomainrelationtypetrainingorganisation"] = "Opleidingsinstituut";
$_LANG["cnrxaudomainrelationtypenongovernmentschool"] = "Particuliere school";
$_LANG["cnrxaudomainrelationtypeunincorporatedassociation"] = "Niet-ingeschreven vereniging";
$_LANG["cnrxaudomainrelationtypeindustryorganisation"] = "Brancheorganisatie";
$_LANG["cnrxaudomainrelationtyperegistrablebody"] = "Registratieplichtige entiteit";
$_LANG["cnrxaudomainrelationtypeindigenouscorporation"] = "Inheemse corporatie";
$_LANG["cnrxaudomainrelationtyperegisteredorganisation"] = "Geregistreerde organisatie";
$_LANG["cnrxaudomainrelationtypetrust"] = "Trust";
$_LANG["cnrxaudomainrelationtypeeducationalinstitution"] = "Onderwijsinstelling";
$_LANG["cnrxaudomainrelationtypecommonwealthentity"] = "Commonwealth-entiteit";
$_LANG["cnrxaudomainrelationtypestatutorybody"] = "Publiekrechtelijke instelling";
$_LANG["cnrxaudomainrelationtypetradingcooperative"] = "Handelscoöperatie";
$_LANG["cnrxaudomainrelationtypecompanylimitedbyguarantee"] = "Vennootschap met beperkte aansprakelijkheid";
$_LANG["cnrxaudomainrelationtypenondistributingcooperative"] = "Niet-uitkerende coöperatie";
$_LANG["cnrxaudomainrelationtypenontradingcooperative"] = "Niet-handelscoöperatie";
$_LANG["cnrxaudomainrelationtypecharitabletrust"] = "Goede doelen trust";
$_LANG["cnrxaudomainrelationtypepublicprivateancillaryfund"] = "Publiek / Privaat ondersteuningsfonds";
$_LANG["cnrxaudomainrelationtypepeakstateterritorybody"] = "Koepelorganisatie staat/territorium";
$_LANG["cnrxaudomainrelationtypenotforprofitcommunitygroup"] = "Non-profit gemeenschapsgroep";
$_LANG["cnrxaudomainrelationtypeeducationandcareserviceschildcare"] = "Onderwijs- en zorgdiensten (kinderopvang)";
$_LANG["cnrxaudomainrelationtypegovernmentbody"] = "Overheidsinstantie";
$_LANG["cnrxaudomainrelationtypeproviderofnonaccreditedtraining"] = "Aanbieder van niet-geaccrediteerde trainingen";
$_LANG["cnrxaudomainrelationtypedescr"] = "Geef aan wat de registrant het recht geeft om de domeinnaam te registreren";
$_LANG["cnrxauownerorganization"] = "Domeinhouder, organisatie";
$_LANG["cnrxauownerorganizationdescr"] = "De naam van de organisatie (domeinhouder)";
$_LANG["cnrxauidwarranty"] = "Domeinhouder,<br>is AU-burger of inwoner";
$_LANG["cnrxauidwarranty0"] = $_LANG["cnr0"];
$_LANG["cnrxauidwarranty1"] = $_LANG["cnr1"];
$_LANG["cnrxauidwarrantydescr"] = "De houder van een .id.au-domein moet garanderen dat hij/zij een Australisch inwoner of burger is";
$_LANG["cnrxaueligibilityname"] = "Naam van recht";
$_LANG["cnrxaueligibilitynamedescr"] = "De naam van het rechtstype (bijv. handelsnaam)";
$_LANG["cnrxaudomainidnumber"] = "Domeinhouder, identificatienummer";
$_LANG["cnrxaudomainidnumberdescr"] = "";
$_LANG["cnrxaudomainidtype"] = "Domeinhouder, identificatietype";
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
$_LANG["cnrxaueligibilityidnumber"] = "Recht, identificatienummer";
$_LANG["cnrxaueligibilityidnumberdescr"] = "";
$_LANG["cnrxaueligibilityidtype"] = "Recht, identificatietype";
$_LANG["cnrxaueligibilityidtypedescr"] = "";

// ----------------------------------------------------------------------
// ------------------ .CA Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxcalegaltype"] = "Domeinhouder, rechtsvorm";
$_LANG["cnrxcalegaltypeabo"] = "Inheemse inwoner van Canada";
$_LANG["cnrxcalegaltypeass"] = "Niet-geregistreerde Canadese vereniging";
$_LANG["cnrxcalegaltypecco"] = "Vennootschap (Canada of Canadese provincie/territorium)";
$_LANG["cnrxcalegaltypecct"] = "Canadese staatsburger";
$_LANG["cnrxcalegaltypeedu"] = "Canadese onderwijsinstelling";
$_LANG["cnrxcalegaltypegov"] = "Overheid of overheidsinstantie in Canada";
$_LANG["cnrxcalegaltypehop"] = "Canadees ziekenhuis";
$_LANG["cnrxcalegaltypeinb"] = "Door de Indian Act erkende inheemse groep";
$_LANG["cnrxcalegaltypelam"] = "Canadese bibliotheek, archief of museum";
$_LANG["cnrxcalegaltypelgr"] = "Wettelijk vertegenwoordiger van een Canadese staatsburger of permanente inwoner";
$_LANG["cnrxcalegaltypemaj"] = "Hare Majesteit de Koningin";
$_LANG["cnrxcalegaltypeomk"] = "Officieel handelsmerk geregistreerd in Canada";
$_LANG["cnrxcalegaltypeplt"] = "Canadese politieke partij";
$_LANG["cnrxcalegaltypeprt"] = "In Canada geregistreerd partnerschap";
$_LANG["cnrxcalegaltyperes"] = "Permanente inwoner van Canada";
$_LANG["cnrxcalegaltypetdm"] = "In Canada geregistreerd merk (door niet-Canadese houder)";
$_LANG["cnrxcalegaltypetrd"] = "Canadese handelsvereniging";
$_LANG["cnrxcalegaltypetrs"] = "In Canada opgericht trustfonds";
// $_LANG["cnrxcalegaltypedescr"] = "";
$_LANG["cnrxcatrademark"] = "Is een geregistreerd merk";
$_LANG["cnrxcatrademark0"] = $_LANG["cnr0"];
$_LANG["cnrxcatrademark1"] = $_LANG["cnr1"];
$_LANG["cnrxcatrademarkdescr"] = "Geeft aan of het domein een geregistreerd merk is of niet.";

// ----------------------------------------------------------------------
// ------------------ .COM.BR Fields ------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxbrregisternumber"] = "Domeinhouder, Braziliaans registratienummer";
$_LANG["cnrxbrregisternumberdescr"] = "Het Braziliaanse ondernemingsregistratienummer (CNPJ) of het Braziliaanse persoonlijke registratienummer (CPF).";

// ----------------------------------------------------------------------
// ------------------ .CN Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxcnownertype"] = "Domeinhouder, type";
$_LANG["cnrxcnownertypei"] = "Particulier";
$_LANG["cnrxcnownertypee"] = "Bedrijf";
$_LANG["cnrxcnownertypedescr"] = "";
$_LANG["cnrxcnowneridtype"] = "Domeinhouder, ID-type";
$_LANG["cnrxcnowneridtypesfz"] = "SFZ (Identiteitskaart) - Domeinhouder type is particulier";
$_LANG["cnrxcnowneridtypehz"] = "HZ (Paspoort) - Domeinhouder type is particulier";
$_LANG["cnrxcnowneridtypegajmtx"] = "GAJMTX (Toestemming voor uitreis/terugkeer Hongkong en Macau) - Domeinhouder type is particulier";
$_LANG["cnrxcnowneridtypetwjmtx"] = "TWJMTX (Reisdocument voor inwoners van Taiwan voor in- en uitreizen) - Domeinhouder type is particulier";
$_LANG["cnrxcnowneridtypewjlsfz"] = "WJLSFZ (Buitenlandse verblijfsvergunning) - Domeinhouder type is particulier";
$_LANG["cnrxcnowneridtypegajzz"] = "GAJZZ (Verblijfsvergunning voor inwoners van Hongkong/Macau) - Domeinhouder type is particulier";
$_LANG["cnrxcnowneridtypetwjzz"] = "TWJZZ (Verblijfsvergunning voor inwoners van Taiwan) - Domeinhouder type is particulier";
$_LANG["cnrxcnowneridtypejgz"] = "JGZ (Militair identiteitsbewijs) - Domeinhouder type is particulier";
$_LANG["cnrxcnowneridtypeqt"] = "QT (Overig) - Domeinhouder type is particulier of bedrijf";
$_LANG["cnrxcnowneridtypeorg"] = "ORG (Organisatiecode-certificaat) - Domeinhouder type is bedrijf";
$_LANG["cnrxcnowneridtypeyyzz"] = "YYZZ (Zakelijke licentie) - Domeinhouder type is bedrijf";
$_LANG["cnrxcnowneridtypetydm"] = "TYDM (USCC-certificaat) - Domeinhouder type is bedrijf";
$_LANG["cnrxcnowneridtypebddm"] = "BDDM (Militaire code) - Domeinhouder type is bedrijf";
$_LANG["cnrxcnowneridtypejddwfw"] = "JDDWFW (Militair betaalde externe dienstverleningslicentie) - Domeinhouder type is bedrijf";
$_LANG["cnrxcnowneridtypesydwfr"] = "SYDWFR (Certificaat rechtspersoon publieke instelling) - Domeinhouder type is bedrijf";
$_LANG["cnrxcnowneridtypewgczjg"] = "WGCZJG (Registratieformulier buitenlandse vestiging) - Domeinhouder type is bedrijf";
$_LANG["cnrxcnowneridtypeshttfr"] = "SHTTFR (Registratiecertificaat sociale organisatie) - Domeinhouder type is bedrijf";
$_LANG["cnrxcnowneridtypezjcs"] = "ZJCS (Registratiecertificaat religieuze locatie) - Domeinhouder type is bedrijf";
$_LANG["cnrxcnowneridtypembfqy"] = "MBFQY (Registratiecertificaat private non-profit organisatie) - Domeinhouder type is bedrijf";
$_LANG["cnrxcnowneridtypejjhfr"] = "JJHFR (Registratiecertificaat stichting) - Domeinhouder type is bedrijf";
$_LANG["cnrxcnowneridtypelszy"] = "LSZY (Vergunning advocatenkantoor) - Domeinhouder type is bedrijf";
$_LANG["cnrxcnowneridtypewgzhwh"] = "WGZHWH (Registratiecertificaat buitenlands cultureel centrum in China) - Domeinhouder type is bedrijf";
$_LANG["cnrxcnowneridtypewlczzg"] = "WLCZJG (Registratiecertificaat buitenlandse toerismevertegenwoordiging) - Domeinhouder type is bedrijf";
$_LANG["cnrxcnowneridtypesfjd"] = "SFJD (Certificaat juridische entiteit) - Domeinhouder type is bedrijf";
$_LANG["cnrxcnowneridtypejwjg"] = "JWJG (Certificaat buitenlandse onderneming) - Domeinhouder type is bedrijf";
$_LANG["cnrxcnowneridtypeshfwjg"] = "SHFWJG (Registratiecertificaat sociale dienstverlener) - Domeinhouder type is bedrijf";
$_LANG["cnrxcnowneridtypembxxbx"] = "MBXXBX (Vergunning particuliere school) - Domeinhouder type is bedrijf";
$_LANG["cnrxcnowneridtypeyljgzy"] = "YLJGZY (Vergunning medische instelling) - Domeinhouder type is bedrijf";
$_LANG["cnrxcnowneridtypegzjgzy"] = "GZJGZY (Vergunning notariskantoor) - Domeinhouder type is bedrijf";
$_LANG["cnrxcnowneridtypebjwsxx"] = "BJWSXX (Vergunning school voor kinderen van buitenlandse diplomaten in Beijing/China) - Domeinhouder type is bedrijf";
$_LANG["cnrxcnowneridtypeqttyzm"] = "QTTYDM (Overig-certificaat USCC) - Domeinhouder type is bedrijf";
$_LANG["cnrxcnowneridtypedescr"] = "Type identificatiedocument";
$_LANG["cnrxcnowneridnumber"] = "Domeinhouder, ID-nummer";
$_LANG["cnrxcnowneridnumberdescr"] = "";

// ----------------------------------------------------------------------
// ------------------ .COOP Fields --------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxcoopeligibility"] = "Vereisten voor geschiktheid";
$_LANG["cnrxcoopeligibilitydescr"] = "Ik verklaar dat mijn organisatie aan minimaal één van de .COOP-geschiktheidscriteria voldoet. Zie <a style=\"text-decoration:underline\" href=\"https://identity.coop/coop-policies-and-agreements/\" target=\"_blank\">hier</a>.";
$_LANG["cnrxcoopeligibility0"] = $_LANG["cnr0"];
$_LANG["cnrxcoopeligibility1"] = $_LANG["cnr1"];

// ----------------------------------------------------------------------
// ------------------ .DE Fields ----------------------------------------
// ----------------------------------------------------------------------
 //$_LANG["cnrxdensentry0"] = "";
$_LANG["cnrxdensentry0descr"] = implode(" ", [
    "Maakt het gebruik van nsentry's in plaats van nameservers voor .de-domeinen mogelijk;",
    "NS-entry's stellen u in staat subdomeinen te configureren met alternatieve nameservers.",
    "<a target=\"_blank\" href=\"https://www.denic.de/en/domains/de-domains/registration/nameserver-and-nsentry-data/\" style=\"text-decoration:underline\">Gedetailleerde informatie</a>."
]);
//$_LANG["cnrxdensentry1"] = "";
$_LANG["cnrxdensentry1descr"] = "zie hierboven";
//$_LANG["cnrxdensentry2"] = "";
$_LANG["cnrxdensentry2descr"] = "zie hierboven";
//$_LANG["cnrxdensentry3"] = "";
$_LANG["cnrxdensentry3descr"] = "zie hierboven";
//$_LANG["cnrxdensentry4"] = "";
$_LANG["cnrxdensentry4descr"] = "zie hierboven";
//$_LANG["cnrxdegeneralrequest"] = "";
//$_LANG["cnrxdegeneralrequestdescr"] = "";
//$_LANG["cnrxdeabusecontact"] = "";
//$_LANG["cnrxdeabusecontactdescr "] = "";

// ----------------------------------------------------------------------
// ------------------ .DK Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxdkusertype"] = "Domeinhouder, type";
$_LANG["cnrxdkusertypeperson"] = "Persoon";
$_LANG["cnrxdkusertypecompany"] = "Bedrijf";
$_LANG["cnrxdkusertypeassociation"] = "Vereniging";
$_LANG["cnrxdkusertypepuborg"] = "Publieke organisatie";
// $_LANG["cnrxdkusertypedescr"] = "";
$_LANG["cnrxdkuseridnumber"] = "Domeinhouder, ID-nummer";
$_LANG["cnrxdkuseridnumberdescr"] = implode("", [
    "Identificatienummer van de domeinhouder. Dit kan een <i>EAN, CVR of P-nummer</i> zijn. ",
    "Het <i>CVR-nummer</i> wordt gebruikt voor de identificatie van de organisatie, en het <i>EAN-nummer</i> zorgt ervoor ",
    "dat documenten met betrekking tot elektronische facturatie naar het juiste account worden gestuurd. ",
    "Het <i>P-nummer</i> is een vestigingsnummer dat door het Deense Centrale Bedrijfsregister wordt toegekend om ",
    "fysieke locaties aan een organisatie te koppelen."
]);

// ----------------------------------------------------------------------
// ------------------ .ES Fields ----------------------------------------
// ----------------------------------------------------------------------
$types = [
    1 => "Particulier",
    39 => "Economische belangengroep",
    47 => "Vereniging",
    59 => "Sportvereniging",
    68 => "Beroepsvereniging",
    124 => "Spaarbank",
    150 => "Gemeenschappelijk goed",
    152 => "Vereniging van eigenaren",
    164 => "Orde of religieuze instelling",
    181 => "Consulaat",
    197 => "Publiekrechtelijke vereniging",
    203 => "Ambassade",
    229 => "Gemeentebestuur",
    269 => "Sportfederatie",
    286 => "Stichting",
    365 => "Wederzijdse verzekeringsmaatschappij",
    434 => "Regionale overheidsinstantie",
    436 => "Centrale overheidsinstantie",
    439 => "Politieke partij",
    476 => "Vakbond",
    510 => "Landbouwpartnerschap",
    524 => "Naamloze vennootschap",
    525 => "Sportclub",
    554 => "Burgerlijke maatschappij",
    560 => "Vennootschap onder firma",
    562 => "Vennootschap onder firma en commanditaire vennootschap",
    566 => "Coöperatie",
    608 => "Werknemersbedrijf",
    612 => "Besloten vennootschap",
    713 => "Spaans agentschap",
    717 => "Tijdelijke bedrijfscombinatie",
    744 => "Werknemersnaamloze vennootschap",
    745 => "Regionale publieke entiteit",
    746 => "Nationale publieke entiteit",
    747 => "Lokale publieke entiteit",
    877 => "Overig",
    878 => "Raad van oorsprongsbenaming",
    879 => "Entiteit voor beheer van natuurgebieden"
];
$idtypes = [
    0 => "Overig (voor contacten buiten Spanje)",
    1 => "DNI/NIF (voor Spaanse contacten)",
    2 => "Verouderd, gebruik de volgende optie.",
    3 => "NIE (voor Spaanse contacten)"
];
$idtypesdescr = implode("<br/>", [
    "DNI = &quot;Documento Nacional de Identidad&quot;",
    "NIF = &quot;Número de Identificación Fiscal&quot;",
    "NIE = &quot;Número de Identificación de Extranjero&quot;. Dit is het equivalent van een Spaanse NIF, maar wordt uitgegeven door Spaanse autoriteiten aan buitenlanders die langer dan 3 maanden in Spanje verblijven."
]);
$idnodescr = "Het identificatienummer van dit contact. Voor Spaanse contacten is dit het DNI/NIF/NIE-nummer – anders het ID- of paspoortnummer.";

$_LANG["cnrxesownertipoidentificacion"] = "Domeinhouder, identificatietype";
$_LANG["cnrxesadmintipoidentificacion"] = "Admin, identificatietype";
$_LANG["cnrxestechtipoidentificacion"] = "Technisch contact, identificatietype";
$_LANG["cnrxesbillingtipoidentificacion"] = "Facturatie, identificatietype";

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

$_LANG["cnrxesowneridentificacion"] = "Domeinhouder, identificatienummer";
$_LANG["cnrxesadminidentificacion"] = "Admin, identificatienummer";
$_LANG["cnrxestechidentificacion"] = "Technisch contact, identificatienummer";
$_LANG["cnrxesbillingidentificacion"] = "Facturatie, identificatienummer";

$_LANG["cnrxesowneridentificaciondescr"] = $idnodescr;
$_LANG["cnrxesadminidentificaciondescr"] = $idnodescr;
$_LANG["cnrxestechidentificaciondescr"] = $idnodescr;
$_LANG["cnrxesbillingidentificaciondescr"] = $idnodescr;

$_LANG["cnrxesownerlegalform"] = "Domeinhouder, rechtsvorm";
$_LANG["cnrxesadminlegalform"] = "Admin, rechtsvorm";
$_LANG["cnrxestechlegalform"] = "Technisch contact, rechtsvorm";
$_LANG["cnrxesbillinglegalform"] = "Facturatie, rechtsvorm";

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
$_LANG["cnrxeuregistrantlang"] = "Domeinhouder, taal";
$_LANG["cnrxeuregistrantcitizenship"] = "Domeinhouder, nationaliteit";
$_LANG["cnrxeuregistrantlangdescr"] = "Taal voor communicatie met de TLD-provider (standaard = Engels)";
$_LANG["cnrxeuregistrantcitizenshipdescr"] = "Particuliere registranten met een Europese nationaliteit die buiten de EU wonen, kunnen .eu-domeinen registreren met deze instelling.";

// ----------------------------------------------------------------------
// ------------------ .FI Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxficompanyregid"] = "Domeinhouder, bedrijfs-ID of registratienummer";
$_LANG["cnrxficompanyregiddescr"] = "Lokale bedrijfsentiteit (geregistreerd in het Finse handelsregister of een rechtspersoon binnen de Finse Republiek)<br/>(vereist voor niet-Finse entiteiten)";
$_LANG["cnrxfipersonalid"] = "Domeinhouder, persoonlijk identificatienummer";
$_LANG["cnrxfipersonaliddescr"] = "Fins persoonlijk identificatienummer<br/>(vereist voor niet-Finse particulieren)";
$_LANG["cnrxfibirthdate"] = "Domeinhouder, geboortedatum";
$_LANG["cnrxfibirthdatedescr"] = "Geboortedatum (JJJJ-MM-DD)<br/>(vereist voor niet-Finse particulieren)";
$_LANG["cnrxficontacttype"] = "Domeinhouder, contacttype";
$_LANG["cnrxficontacttype0"] = "Particulier";
$_LANG["cnrxficontacttype1"] = "Bedrijf";
$_LANG["cnrxficontacttype2"] = "Rechtspersoon";
$_LANG["cnrxficontacttype3"] = "Instelling";
$_LANG["cnrxficontacttype4"] = "Politieke partij";
$_LANG["cnrxficontacttype5"] = "Gemeente";
$_LANG["cnrxficontacttype6"] = "Overheid";
$_LANG["cnrxficontacttype7"] = "Publieke gemeenschap";
$_LANG["cnrxficontacttypedescr"] = "";

// ----------------------------------------------------------------------
// ------------------ .GAY Fields ---------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxgayacceptrequirements"] = "Vereisten accepteren";
$_LANG["cnrxgayacceptrequirements0"] = $_LANG["cnr0"];
$_LANG["cnrxgayacceptrequirements1"] = $_LANG["cnr1"];
$_LANG["cnrxgayacceptrequirementsdescr"] = "Ik bevestig dat de domeinnaam NIET wordt gebruikt voor het aanzetten tot geweld, pesten, intimidatie of haatzaaien en NIET wordt gebruikt door erkende haatgroepen. DotGay doneert 20% van elke nieuw geregistreerde domeinnaam aan haar partners, GLAAD en CenterLink.";

// ----------------------------------------------------------------------
// ------------------ .HK Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxhkownerdocumenttype"] = "Domeinhouder, documenttype";
$_LANG["cnrxhkownerdocumenttypehkid"] = "Particulier: HK identiteitskaartnummer";
$_LANG["cnrxhkownerdocumenttypeothid"] = "Particulier: Identiteitsnummer van ander land";
$_LANG["cnrxhkownerdocumenttypepassno"] = "Particulier: Paspoortnummer";
$_LANG["cnrxhkownerdocumenttypebirthcert"] = "Particulier: Geboorteakte";
$_LANG["cnrxhkownerdocumenttypeothidv"] = "Particulier: Overig document";
$_LANG["cnrxhkownerdocumenttypebr"] = "Organisatie: Handelsregistratie";
$_LANG["cnrxhkownerdocumenttypeci"] = "Organisatie: Oprichtingsakte";
$_LANG["cnrxhkownerdocumenttypecrs"] = "Organisatie: Schoolregistratiecertificaat";
$_LANG["cnrxhkownerdocumenttypehksarg"] = "Organisatie: HK overheidsafdeling";
$_LANG["cnrxhkownerdocumenttypehkordinance"] = "Organisatie: HK verordening";
$_LANG["cnrxhkownerdocumenttypeothorg"] = "Organisatie: Overig document";
$_LANG["cnrxhkownerdocumenttypedescr"] = "";
$_LANG["cnrxhkownerdocumentnumber"] = "Domeinhouder, documentnummer";
$_LANG["cnrxhkownerdocumentnumberdescr"] = "";
$_LANG["cnrxhkownerdocumentorigincountry"] = "Domeinhouder, land van afgifte document";
$_LANG["cnrxhkownerdocumentorigincountrydescr"] = "Het land waar dit document is afgegeven (gebruik de 2-letterige ISO-landcode, bijv. NL of BE).";
$_LANG["cnrxhkownerotherdocumenttype"] = "Domeinhouder, ander documenttype";
$_LANG["cnrxhkownerotherdocumenttypedescr"] = "Vereist indien het eerder gekozen documenttype '" . $_LANG["cnrxhkownerdocumenttypeothidv"] . "' of '" . $_LANG["cnrxhkownerdocumenttypeothorg"] . "' is.";
$_LANG["cnrxhkdomaincategory"] = "Domeincategorie";
$_LANG["cnrxhkdomaincategoryi"] = "Particulier";
$_LANG["cnrxhkdomaincategoryo"] = "Organisatie";
$_LANG["cnrxhkdomaincategorydescr"] = "Juridisch type van alle domeincontacten";
$_LANG["cnrxhkownerageover18"] = "Domeinhouder, ouder dan 18 jaar";
$_LANG["cnrxhkownerageover18no"] = $_LANG["cnr0"];
$_LANG["cnrxhkownerageover18yes"] = $_LANG["cnr1"];
$_LANG["cnrxhkownerageover18descr"] = "Ik bevestig dat de domeinhouder minimaal 18 jaar oud is (alleen vereist voor particulieren).";

// ----------------------------------------------------------------------
// ------------------ .IE Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxiecontacttype"] = "Domeinhouder, contacttype";
$_LANG["cnrxiecontacttypecom"] = "Bedrijf";
$_LANG["cnrxiecontacttypecha"] = "Goede doel / Stichting";
$_LANG["cnrxiecontacttypeoth"] = "Overig";
$_LANG["cnrxiecontacttypedescr"] = "";
$_LANG["cnrxielanguage"] = "Domeinhouder, taal";
$_LANG["cnrxielanguageen"] = "Engels";
$_LANG["cnrxielanguagefr"] = "Frans";
$_LANG["cnrxielanguagedescr"] = "Taal voor communicatie met de TLD-provider (standaard = Engels)";
$_LANG["cnrxiecronumber"] = "Domeinhouder, CRO-nummer";
$_LANG["cnrxiecronumberdescr"] = "Bedrijfsregistratienummer (CRO-nummer)";
$_LANG["cnrxiesupportingnumber"] = "Domeinhouder, ondersteuningsnummer";
$_LANG["cnrxiesupportingnumberdescr"] = "Stichtings- / ondersteuningsnummer";

// ----------------------------------------------------------------------
// ------------------ .IT Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxitconsentforpublishing"] = $_LANG["cnrconsentforpublishing"];
$_LANG["cnrxitconsentforpublishing0"] = $_LANG["cnr0"];
$_LANG["cnrxitconsentforpublishing1"] = $_LANG["cnr1"];
$_LANG["cnrxitconsentforpublishingdescr"] = "Toestemming voor publicatie van persoonlijke contactgegevens. Weigering is alleen mogelijk indien het entiteitstype hieronder 1 is.";
$_LANG["cnrxitentitytype"] = "Domeinhouder, entiteitstype";
$_LANG["cnrxitentitytype1"] = "[1] Italiaanse en buitenlandse natuurlijke personen";
$_LANG["cnrxitentitytype2"] = "[2] Bedrijven/eenmanszaken";
$_LANG["cnrxitentitytype3"] = "[3] Zelfstandigen/professionals";
$_LANG["cnrxitentitytype4"] = "[4] Non-profitorganisaties";
$_LANG["cnrxitentitytype5"] = "[5] Publieke organisaties";
$_LANG["cnrxitentitytype6"] = "[6] Overige entiteiten";
$_LANG["cnrxitentitytype7"] = "[7] Buitenlandse entiteiten die overeenkomen met 2-6";
$_LANG["cnrxitentitytypedescr"] = "Entiteitstype ter identificatie van de domeinhouder.";
$_LANG["cnrxitpin"] = "Domeinhouder, fiscaal nummer";
//$_LANG["cnrxitpindescr"] = "";
$_LANG["cnrxitnationality"] = "Domeinhouder, nationaliteit";
$_LANG["cnrxitnationalitydescr"] = "Nationaliteit van de domeinhouder, aangeduid met de 2-letterige ISO-landcode.";
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
$_LANG["cnrxlvownerregnr"] = "Domeinhouder, registratienummer";
$_LANG["cnrxlvownerregnrdescr"] = "Het registratienummer van de Letse entiteit dat wordt gebruikt voor de domeinhouder (bijv. bedrijfsregistratienummer)";
$_LANG["cnrxlvadminregnr"] = "Admin, registratienummer";
$_LANG["cnrxlvadminregnrdescr"] = "Het registratienummer van de Letse entiteit dat wordt gebruikt voor de administratieve contactpersoon (bijv. bedrijfsregistratienummer)";
$_LANG["cnrxlvvatnr"] = "Domeinhouder, btw-nummer";
$_LANG["cnrxlvvatnrdescr"] = "Het btw-nummer van de domeinhouder (alleen voor bedrijven).";

// ----------------------------------------------------------------------
// ------------------ .LT Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxltcompanynumber"] = "Domeinhouder, ondernemingsnummer";
$_LANG["cnrxltcompanynumberdescr"] = "";

// ----------------------------------------------------------------------
// ------------------ .MY Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxmybusinessnumber"] = "Domeinhouder, ondernemingsnummer";
$_LANG["cnrxmybusinessnumberdescr"] = "Het bedrijfsregistratienummer van de domeinhouder (alleen voor bedrijven)";
$_LANG["cnrxmyorganizationtype"] = "Domeinhouder, organisatietype";
$_LANG["cnrxmyorganizationtypedescr"] = "Het type organisatie van de domeinhouder (alleen voor bedrijven)";
$_LANG["cnrxmyperidentity"] = "Domeinhouder, persoonlijk identificatienummer";
$_LANG["cnrxmyperidentitydescr"] = "Het persoonlijke identificatienummer van de domeinhouder (alleen voor particulieren)";
$_LANG["cnrxmyperdateofbirth"] = "Domeinhouder, geboortedatum";
$_LANG["cnrxmyperdateofbirthdescr"] = "De geboortedatum van de domeinhouder (JJJJ-MM-DD, alleen voor particulieren)";
$_LANG["cnrxmyrace"] = "Domeinhouder, etniciteit";
$_LANG["cnrxmyracemalay"] = "Maleis";
$_LANG["cnrxmyracechinese"] = "Chinees";
$_LANG["cnrxmyraceindian"] = "Indiaas";
$_LANG["cnrxmyraceothers"] = "Overig";
$_LANG["cnrxmyracedescr"] = "(alleen voor particulieren)";

// ----------------------------------------------------------------------
// ------------------ .NO Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxnoorganizationnumber"] = "Domeinhouder, organisatienummer";
$_LANG["cnrxnoorganizationnumberdescr"] = "Het Noorse registratienummer uitgegeven door het Centraal Coördinatieregister voor rechtspersonen.";
$_LANG["cnrxnopersonidentifier"] = "Norid persoons-ID";
$_LANG["cnrxnopersonidentifierdescr"] = "Vereist persoons-ID voor registratie van een particuliere .PRIV.NO-domein. Anders leeg laten.";

// ----------------------------------------------------------------------
// ------------------ .NU Fields ----------------------------------------
// ----------------------------------------------------------------------
// see further .nu fields at the top of the file
$_LANG["cnrxnuiisidno"] = "Domeinhouder, ID-nummer";
$_LANG["cnrxnuiisidnodescr"] = "Persoonlijk identificatienummer, ondernemingsnummer of registratieaanduiding in een nationaal register. Voor contacten in Zweden is een geldige Zweedse ID vereist (bijv.: 123456-1234).";
$_LANG["cnrxnuiisvatno"] = "Domeinhouder, btw-nummer";
$_LANG["cnrxnuiisvatnodescr"] = "Het btw-nummer van de domeinhouder (alleen voor bedrijven)";

// ----------------------------------------------------------------------
// ------------------ .NYC Fields ---------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxnycextcontact"] = "NY externe contactpersoon";
$_LANG["cnrxnycextcontactadmin"] = "Administratief contact";
$_LANG["cnrxnycextcontacttech"] = "Technisch contact";
$_LANG["cnrxnycextcontactbilling"] = "Facturatiecontact";
$_LANG["cnrxnycextcontactowner"] = "Domeinhouder";
$_LANG["cnrxnycextcontactdescr"] = "Het opgegeven contact moet een geldig fysiek adres in New York City hebben.";

// ----------------------------------------------------------------------
// ------------------ .PARIS Fields -------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxafniccode"] = $_LANG["cnrxallocationtoken"];
$_LANG["cnrxafniccodedescr"] = $_LANG["cnrxallocationtokendescr"];

// ----------------------------------------------------------------------
// ------------------ .FR, .PM, .RE, .TF, .WF, .YT Fields ---------------
// ----------------------------------------------------------------------
// Organizations (Companies, Associations, etc.)
$_LANG["cnrxfrannounce"] = "Organisatie, aankondigingsnummer<br/>(Journal Officiel)";
$_LANG["cnrxfrannouncedescr"] = "Het aankondigingsnummer (bijv. 5) in het Journal Officiel. Alleen cijfers toegestaan.";
$_LANG["cnrxfrdatepublicationjo"] = "Organisatie, publicatiedatum<br/>(Journal Officiel)";
$_LANG["cnrxfrdatepublicationjodescr"] = implode(" ", [
    "De publicatiedatum in het officiële staatsblad / Journal Officiel.",
    "Datumformaat JJJJ-MM-DD"
]);
$_LANG["cnrxfrnumerodepageannouncejo"] = "Organisatie, paginanummer van aankondiging<br/>(Journal Officiel)";
$_LANG["cnrxfrnumerodepageannouncejodescr"] = "Het paginanummer van de aankondiging in het Journal Officiel.";
$_LANG["cnrxfrwaldec"] = "Organisatie, Waldec-ID";
$_LANG["cnrxfrwaldecdescr"] = "Geeft de Waldec-identificatie aan die aan een vereniging is gekoppeld en volstaat om een vereniging te identificeren indien opgegeven. Alleen cijfers toegestaan.";
$_LANG["cnrxfrdateassociation"] = "Organisatie, datum van oprichting";
$_LANG["cnrxfrdateassociationdescr"] = "Toont de oprichtingsdatum van de vereniging. Datumformaat JJJJ-MM-DD.";
$_LANG["cnrxfrduns"] = "Organisatie, DUNS-nummer";
$_LANG["cnrxfrdunsdescr"] = implode(" ", [
    "Het DUNS-nummer is een unieke negen-cijferige identificatie voor organisaties. Afkorting van Data Universal",
    "Numbering System; verwijst naar een nieuwe identificatie die kan worden gebruikt voor validatie",
    "op Europees niveau."
]);
$_LANG["cnrxfrlocal"] = "Organisatie, lokale ID";
$_LANG["cnrxfrlocaldescr"] = "Een lokale identificatie die specifiek is voor een land binnen de Europese Economische Ruimte (bijv. ondernemingscertificaatnummer).";
$_LANG["cnrxfrnoprezonecheck0"] = $_LANG["cnr0"];
$_LANG["cnrxfrnoprezonecheck1"] = $_LANG["cnr1"];
$_LANG["cnrxfrsirenorsiret"] = "Organisatie, SIREN/SIRET-nummer";
$_LANG["cnrxfrsirenorsiretdescr"] = implode(" ", [
    "Voor organisaties met een geldig SIREN/SIRET-nummer.",
    "De SIREN-code is het unieke bedrijfsnummer in Frankrijk. Deze wordt uitgegeven door het",
    "Institut national de la statistique et des études économiques (INSEE) en bestaat uit 9 cijfers.",
    "De eerste 9 cijfers zijn het SIREN-nummer en de volgende 5 cijfers zijn het NIC-nummer",
    "(Numéro Interne de Classement). Het SIRET-nummer wordt uitgegeven zodra u uw",
    "bedrijf registreert bij de Kamer van Koophandel (RCS) voor handel, de Kamer van Ambachten voor ambachtelijk werk,",
    "of bij de URSSAF voor intellectuele diensten.",
    "SIRET-nummers bestaan uit 14 cijfers. Het SIRET-nummer geeft informatie over de vestigingslocatie van het bedrijf in Frankrijk",
    "(voor gevestigde ondernemingen). De bedrijfsnaam opgegeven bij de registrant moet",
    "exact overeenkomen met die in de SIREN/SIRET-database ( https://www.infogreffe.fr/ )."
]);
$_LANG["cnrxfrtrademark"] = "Organisatie, merkregistratienummer";
$_LANG["cnrxfrtrademarkdescr"] = "";
$_LANG["cnrxfrvatid"] = "Organisatie, btw-nummer";
$_LANG["cnrxfrvatiddescr"] = "Voor organisaties met een geldig btw-nummer.";

// Individual
$_LANG["cnrxfrbirthpc"] = "Domeinhouder, postcode (geboorteplaats)";
$_LANG["cnrxfrbirthpcdescr"] = implode(" ", [
    "Alleen voor natuurlijke personen geboren in Frankrijk, Réunion, Mayotte, Guadeloupe, Martinique, Guyana,",
    "Polynesië, Wallis en Futuna of Saint-Pierre-et-Miquelon. Vul de postcode van de geboorteplaats in",
    "(of ten minste de departementcode)."
]);
$_LANG["cnrxfrbirthcity"] = "Domeinhouder, geboortestad";
$_LANG["cnrxfrbirthcitydescr"] = implode(" ", [
    "Alleen voor natuurlijke personen geboren in Frankrijk, Réunion, Mayotte, Guadeloupe, Martinique, Guyana,",
    "Polynesië, Wallis en Futuna of Saint-Pierre-et-Miquelon. Vul de naam van de stad in."
]);
$_LANG["cnrxfrbirthdate"] = "Domeinhouder, geboortedatum";
$_LANG["cnrxfrbirthdatedescr"] = "De geboortedatum van de domeinhouder in het formaat JJJJ-MM-DD.";
$_LANG["cnrxfrbirthplace"] = "Domeinhouder, geboorteplaats";
//$_LANG["cnrxfrbirthplacedescr"] = "";
$_LANG["cnrxfrrestrictpub"] = $_LANG["cnrconsentforpublishing"];
$_LANG["cnrxfrrestrictpub0"] = $_LANG["cnr0"];
$_LANG["cnrxfrrestrictpub1"] = $_LANG["cnr1"];
$_LANG["cnrxfrrestrictpubdescr"] = "Alleen voor natuurlijke personen. Toestemming voor publicatie van persoonlijke contactgegevens.";
$_LANG["cnrxfrnoprezonecheck"] = "DNS pre-check overslaan";
$_LANG["cnrxfrnoprezonecheckdescr"] = "Bepaalt of het systeem een DNS pre-check uitvoert voordat het verzoek naar de registry wordt gestuurd.";
//
// ----------------------------------------------------------------------
// ------------------ .PT Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxpttechidentification"] = "Technisch contact, btw-nummer";
$_LANG["cnrxpttechidentificationdescr"] = "Het btw-nummer van het technisch contact";
$_LANG["cnrxptowneridentification"] = "Domeinhouder, btw-nummer";
$_LANG["cnrxptowneridentificationdescr"] = "Het btw-nummer van de domeinhouder";
$_LANG["cnrxpttechmobile"] = "Technisch contact, mobiel nummer";
$_LANG["cnrxpttechmobiledescr"] = "Het mobiele telefoonnummer van het technisch contact";
$_LANG["cnrxptownermobile"] = "Domeinhouder, mobiel nummer";
$_LANG["cnrxptownermobiledescr"] = "Het mobiele telefoonnummer van de domeinhouder";

// ----------------------------------------------------------------------
// ------------------ .RO Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxrocompanynumber"] = "Domeinhouder, ondernemingsnummer";
$_LANG["cnrxrocompanynumberdescr"] = "(alleen vereist voor bedrijven)";
$_LANG["cnrxroidcardorpassportnumber"] = "Domeinhouder, ID-kaart- of paspoortnummer";
$_LANG["cnrxroidcardorpassportnumberdescr"] = "(alleen vereist voor particulieren)";
$_LANG["cnrxrovatnumber"] = "Domeinhouder, btw-nummer";
$_LANG["cnrxrovatnumberdescr"] = "(alleen vereist voor bedrijven)";

// ----------------------------------------------------------------------
// ------------------ .RU Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxrubirthdate"] = "Domeinhouder, geboortedatum";
$_LANG["cnrxrubirthdatedescr"] = "De geboortedatum van de domeinhouder (DD.MM.JJJJ)<br/>(alleen vereist voor particulieren)";
$_LANG["cnrxrufirstname"] = "Domeinhouder, voornaam";
$_LANG["cnrxrufirstnamedescr"] = "De voornaam van de domeinhouder in het Russisch. Moet ingevuld worden met Russische en Latijnse letters, geen punten.<br/>(alleen vereist voor particulieren)";
$_LANG["cnrxrumiddlename"] = "Domeinhouder, tweede voornaam";
$_LANG["cnrxrumiddlenamedescr"] = "De tweede voornaam van de domeinhouder in het Russisch. Moet ingevuld worden met Russische en Latijnse letters, geen punten.<br/>(alleen vereist voor particulieren)";
$_LANG["cnrxrulastname"] = "Domeinhouder, achternaam";
$_LANG["cnrxrulastnamedescr"] = "De achternaam van de domeinhouder in het Russisch. Moet ingevuld worden met Russische en Latijnse letters, geen punten.<br/>(alleen vereist voor particulieren)";
$_LANG["cnrxruorganization"] = "Domeinhouder, organisatienaam";
$_LANG["cnrxruorganizationdescr"] = "De organisatienaam van de domeinhouder in het Russisch. Dit veld mag Russische en Latijnse letters, cijfers, leestekens en spaties bevatten.<br/>(alleen vereist voor organisaties geregistreerd in de Russische Federatie)";
$_LANG["cnrxrucode"] = "Domeinhouder, fiscaal nummer";
$_LANG["cnrxrucodedescr"] = "Het fiscaal nummer (TIN) van de domeinhouder. Dit veld moet een getal van tien cijfers bevatten (laatste cijfer is een controlegetal).<br/>(alleen vereist voor organisaties geregistreerd in de Russische Federatie)";
$_LANG["cnrxrukpp"] = "Domeinhouder, redencode";
$_LANG["cnrxrukppdescr"] = "De redencode (KPP) van de domeinhouder. Dit veld moet een getal van negen cijfers bevatten.<br/>(alleen vereist voor organisaties geregistreerd in de Russische Federatie)";
$_LANG["cnrxrupassportdata"] = "Domeinhouder, paspoortgegevens";
$_LANG["cnrxrupassportdatadescr"] = "De paspoortgegevens van de domeinhouder. Dit veld wordt in het Russisch ingevuld en mag Russische en Latijnse letters, cijfers, leestekens en spaties bevatten. Formaat: documentnummer, uitgegeven door, uitgiftedatum<br/>(alleen vereist voor particulieren)";

// ----------------------------------------------------------------------
// ------------------ .SE Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxnicseidnumber"] = "Domeinhouder, ID-nummer";
$_LANG["cnrxnicseidnumberdescr"] = "Persoonlijk of organisatie-identificatienummer.";
$_LANG["cnrxnicsevatid"] = "Domeinhouder, btw-nummer";
$_LANG["cnrxnicsevatiddescr"] = "";
$_LANG["cnrxsediscloseemail"] = "Domeinhouder, e-mailadres openbaar maken";
$_LANG["cnrxsediscloseemaildescr"] = "Sta toe dat het e-mailadres van de domeinhouder wordt weergegeven in de publieke WHOIS-database.";
$_LANG["cnrxsedisclosefax"] = "Domeinhouder, faxnummer openbaar maken";
$_LANG["cnrxsedisclosefaxdescr"] = "Sta toe dat het faxnummer van de domeinhouder wordt weergegeven in de publieke WHOIS-database.";
$_LANG["cnrxsedisclosevoice"] = "Domeinhouder, telefoonnummer openbaar maken";
$_LANG["cnrxsedisclosevoicedescr"] = "Sta toe dat het telefoonnummer van de domeinhouder wordt weergegeven in de publieke WHOIS-database.";
foreach (["email", "fax", "voice"] as $field) {
    $_LANG["cnrxsedisclose$field" . "0"] = $_LANG["cnr0"];
    $_LANG["cnrxsedisclose$field" . "1"] = $_LANG["cnr1"];
}

// ----------------------------------------------------------------------
// ------------------ .SG Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxsgrcbid"] = "Domeinhouder, RCB-ID";
$_LANG["cnrxsgrcbiddescr"] = "Het unieke ondernemingsnummer (UEN) of het registratienummer van de onderneming (RCB) van de domeinhouder. Voor <u>bedrijven</u> gevestigd in Singapore dient het juiste bedrijfsregistratienummer te worden opgegeven OF de contact-ID-kaart voor een lokale aanwezigheid in Singapore (formaat: S1234567D).";
$_LANG["cnrxsgadminsingpassid"] = "Admin, SingPass-ID";
$_LANG["cnrxsgadminsingpassiddescr"] = "De contact-ID-kaart (SingPass-ID) van de administratieve contactpersoon<br/>(alleen voor Singaporese <u>particulieren</u>, formaat: S1234567D)";

// ----------------------------------------------------------------------
// ------------------ .SK Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxskcontactlegalform"] = "Domeinhouder, rechtsvorm";
$_LANG["cnrxskcontactlegalformdescr"] = "";
// $_LANG["cnrxskcontactlegalformcorp"] = "";
// $_LANG["cnrxskcontactlegalformpers"] = "";
$_LANG["cnrxskcontactidentnumber"] = "Domeinhouder, handelsregisternummer";
$_LANG["cnrxskcontactidentnumberdescr"] = "Verplicht veld voor bedrijven/organisaties";

// ----------------------------------------------------------------------
// ------------------ .SWISS Fields -------------------------------------
// ----------------------------------------------------------------------
// see other .swiss fields at top of the file
$_LANG["cnrxswissuid"] = "Domeinhouder, UID of UPI";
$_LANG["cnrxswissuiddescr"] = implode("", [
    "De ...<ul>",
    "<li>UID (ondernemingsidentificatienummer, formaat: \"CHE-ddd.ddd.ddd\") voor organisaties of</li>",
    "<li>UPI (universeel persoonsidentificatienummer, formaat: \"756.dddd.dddd.dd\") voor natuurlijke personen</li>",
    "</ul>... van de domeinhouder (d = cijfer).<br/>",
    "Let op: De naam van de persoon en de UPI worden NIET gepubliceerd in Whois/RDAP, in tegenstelling tot de organisatienaam en de UID, die wel zichtbaar zijn."
]);
$_LANG["cnrxswissownertype"] = "Domeinhouder, type";
$_LANG["cnrxswissownertypep"] = "Natuurlijke persoon";
$_LANG["cnrxswissownertypeo"] = "Organisatie / rechtspersoon";
$_LANG["cnrxswissownertypedescr"] = "Het identiteitstype van de domeinhouder.";

// ----------------------------------------------------------------------
// ------------------ .TRAVEL Fields ------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxtravelindustry"] = "Reissector";
$_LANG["cnrxtravelindustryn"] = $_LANG["cnr0"];
$_LANG["cnrxtravelindustryy"] = $_LANG["cnr1"];
$_LANG["cnrxtravelindustrydescr"] = "Ik bevestig dat de domeinhouder actief is in de reissector en een geldig lidmaatschapsnummer bezit.";

// ----------------------------------------------------------------------
// ------------------ .UK Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxukownercorporatetype"] = "Domeinhouder, bedrijfstype";
$_LANG["cnrxukownercorporatetypedescr"] = "";
$_LANG["cnrxukownercorporatetypeother"] = "Overig";
$_LANG["cnrxukownercorporatetypefother"] = "Overig (niet-UK)";
$_LANG["cnrxukownercorporatetypeind"] = "Particulier";
$_LANG["cnrxukownercorporatetypefind"] = "Particulier (niet-UK)";
$_LANG["cnrxukownercorporatetypefcorp"] = "Bedrijf (niet-UK)";
// $_LANG["cnrxukownercorporatetypeltd"] = "LTD";
// $_LANG["cnrxukownercorporatetypeplc"] = "PLC";
// $_LANG["cnrxukownercorporatetypellp"] = "LLP";
// $_LANG["cnrxukownercorporatetypeip"] = "IP";
$_LANG["cnrxukownercorporatetypecrc"] = "Bedrijf met koninklijk statuut";
$_LANG["cnrxukownercorporatetypegov"] = "Overheidsinstantie";
$_LANG["cnrxukownercorporatetypeptnr"] = "Brits partnerschap";
$_LANG["cnrxukownercorporatetyperchar"] = "Geregistreerde liefdadigheidsinstelling";
$_LANG["cnrxukownercorporatetypesch"] = "School";
$_LANG["cnrxukownercorporatietypestat"] = "Publiekrechtelijke entiteit";
$_LANG["cnrxukownercorporatetypestra"] = "Eenmanszaak";
$_LANG["cnrxukownercorporatenumber"] = "Domeinhouder, bedrijfsregistratienummer";
$_LANG["cnrxukownercorporatenumberdescr"] = "";

// ----------------------------------------------------------------------
// ------------------ .US Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxusnexusapppurpose"] = "US Nexus, beoogd gebruik";
$_LANG["cnrxusnexusapppurposep1"] = "Zakelijk gebruik met winstoogmerk";
$_LANG["cnrxusnexusapppurposep2"] = "Non-profitorganisatie, vereniging, religieuze organisatie, enz.";
$_LANG["cnrxusnexusapppurposep3"] = "Persoonlijk gebruik";
$_LANG["cnrxusnexusapppurposep4"] = "Educatieve doeleinden";
$_LANG["cnrxusnexusapppurposep5"] = "Overheidsdoeleinden";
$_LANG["cnrxusnexusapppurposedescr"] = "";
$_LANG["cnrxusnexuscategory"] = "US Nexus, categorie";
$_LANG["cnrxusnexuscategoryc11"] = "[C11] Amerikaans staatsburger";
$_LANG["cnrxusnexuscategoryc12"] = "[C12] Permanent ingezetene van de VS";
$_LANG["cnrxusnexuscategoryc21"] = "[C21] Amerikaanse organisatie";
$_LANG["cnrxusnexuscategoryc31"] = "[C31] Buitenlandse entiteit met activiteiten in de VS";
$_LANG["cnrxusnexuscategoryc32"] = "[C32] Buitenlandse entiteit met kantoor in de VS";
$_LANG["cnrxusnexuscategorydescr"] = "Classificatie van de entiteit die de aanvraag indient.<br/>Let op: Amerikaanse bezittingen en territoria zijn ook inbegrepen.";
$_LANG["cnrxusnexusvalidator"] = "US Nexus, land";
$_LANG["cnrxusnexusvalidatordescr"] = "Vul de ISO 2-letterige landcode van de registrant in (alleen vereist indien Nexus-categorie C31 of C32 is)";

// ----------------------------------------------------------------------
// ------------------ .XXX Fields ---------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxxxxcommunityid"] = "Community-lidmaatschaps-ID";
$_LANG["cnrxxxxcommunityiddescr"] = ".XXX gesponsorde community-lidmaatschaps-ID";
$_LANG["cnrxxxxdefensive"] = "Defensieve registratie<br/>(Niet-resolverende domein)";
$_LANG["cnrxxxxdefensive0"] = $_LANG["cnr0"];
$_LANG["cnrxxxxdefensive1"] = $_LANG["cnr1"];
$_LANG["cnrxxxxdefensivedescr"] = implode("", [
    "Ik bevestig dat dit domein een defensieve registratie betreft. ",
    "Defensieve registratie verwijst naar het registreren van domeinnamen, ",
    "vaak over meerdere TLD's en in verschillende grammaticale vormen, ",
    "met als primair doel het beschermen van intellectueel eigendom of merken tegen misbruik, ",
    "zoals cybersquatting. Het wordt gedefinieerd als een registratie die niet uniek is, niet resolveert, ",
    "verkeer terugstuurt naar een kernregistratie of geen unieke content bevat.<br/>",
    "Let op: Indien niet geselecteerd, wordt het domein als defensieve registratie beschouwd."
]);

// #########################################################################
// #########################################################################
// # Add reusable translations for ALL PROVIDERS                           #
// #########################################################################
// #########################################################################

// ----------------------------------------------------------------------
// ----------------------- DNSSEC MANAGEMENT ----------------------------
// ----------------------------------------------------------------------
$_LANG["cnicdnssecmanagement"] = "DNSSEC beheer";




// #########################################################################
// #########################################################################
// # Add translations for ISPAPI registrar module additional domain fields #
// #########################################################################
// #########################################################################

// Terms and Conditions Fields, prefixed with hxflagstac
$_LANG["hxflagstacagreement"] = "Overeenkomst";
$_LANG["hxflagstacagreementindiv"] = "Voorwaarden voor particulieren";
$_LANG["hxflagstactrustee"] = "Trustee-service";
$_LANG["hxflagstachighlyregulated"] = "Sterk gereguleerde TLD";
$_LANG["hxflagstachighlyregulateddescrdefault"] = ("Bevestig dat de registrant bevoegd is om deze domeinnaam te registreren en dat alle verstrekte gegevens correct en naar waarheid zijn ingevuld. " .
    "De vereisten voor registratie zijn <a href=\"{TAC}\" target=\"_blank\">hier</a> te vinden."
);
$_LANG["hxflagstachighlyregulateddescreco"] = ($_LANG["hxflagstachighlyregulateddescrdefault"] .
    "<br/>Alle .ECO domeinnamen worden eerst met de status \"server hold\" geregistreerd, totdat aan de minimale eisen van het .ECO-profiel is voldaan. " .
    "Dit betekent dat de .ECO-registrant 1) verklaart te voldoen aan de .ECO-registratiecriteria en 2) toezegt een positieve bijdrage te leveren aan het milieu " .
    "en eerlijke informatie te verstrekken over milieumaatregelen. De registrant ontvangt per e-mail instructies voor het aanmaken van een .ECO-profiel. Zodra dit is voltooid, wordt de {TLD} domeinnaam direct geactiveerd door de registry."
);
$_LANG["hxflagstachighlyregulateddescrcoop"] = ("Ik, de registrant, begrijp, ga akkoord en bevestig dat mijn organisatie aan minimaal één van de {TLD}-geschiktheidscriteria voldoet:" .
    "<ul>" .
    "<li>een democratisch gecontroleerde coöperatie in handen van leden, in overeenstemming met de 7 internationale coöperatieprincipes; of</li>" .
    "<li>een vereniging van coöperaties; of</li>" .
    "<li>een organisatie die merendeels door een coöperatie wordt gecontroleerd; of</li>" .
    "<li>een rechtspersoon waarvan de activiteiten hoofdzakelijk gericht zijn op het bedienen van coöperaties.</li>" .
    "</ul>" .
    "Ik begrijp en ga ermee akkoord dat DotCooperation LLC audits uitvoert op {TLD}-domeinregistraties en zich het recht voorbehoudt om een domeinnaam te annuleren of te wijzigen volgens haar beleid."
);
$_LANG["hxflagstachighlyregulateddescrnotac"] = ("Bevestig dat u de <b>maatregelen voor sterk gereguleerde TLD's</b> erkent:<br/>" .
    "<div style=\"text-align:justify\">U begrijpt en accepteert de aanvullende voorwaarden te respecteren en na te leven:" .
    "<ol><li>Gegevens van de administratieve contactpersoon. U stemt ermee in actuele gegevens van de administratieve contactpersoon te verstrekken en up-to-date te houden, " .
    "zodat u meldingen over klachten of misbruik van registratie kunt ontvangen, evenals contactgegevens van verantwoordelijke of " .
    "zelfregulerende instanties op uw hoofdvestigingsadres.</li>" .
    "<li>Vertegenwoordiging. U bevestigt dat u alle vereiste bevoegdheden, certificaten, licenties en/of andere relevante documenten " .
    "bezit voor de branche van deze sterk gereguleerde TLD.</li>" .
    "<li>Wijzigingen in bevoegdheden, certificaten, licenties en documenten. U bevestigt dat u essentiële wijzigingen in deze gegevens meldt, " .
    "om te waarborgen dat u blijft voldoen aan de regelgeving en uw activiteiten in het belang van uw klanten uitvoert." .
    "</li>" .
    "</ol></div>"
);
$_LANG["hxflagstacindividualregulateddescrdefault"] = "Bevestig dat u de <a href=\"{TAC}\" target=\"_blank\">richtlijnen voor particulieren</a> erkent.";
$_LANG["hxflagstacregulateddescrdefault"] = "Bevestig dat u de <a href=\"{TAC}\" target=\"_blank\">registratievoorwaarden van de registry</a> voor het registreren van {TLD}-domeinnamen erkent.";
$_LANG["hxflagstacregulateddescrcira"] = ("<div style=\"text-align:justify\">Klik hier om te bevestigen dat u akkoord gaat met de <a href=\"{TAC}\" target=\"_blank\">CIRA-registratieovereenkomst</a> en " .
    "dat CIRA naar eigen inzicht en op elk moment wijzigingen kan aanbrengen in de voorwaarden van de registrantenovereenkomst, " .
    "zoals CIRA dat passend acht, door een kennisgeving van de wijzigingen op de CIRA-website te plaatsen en door een melding van belangrijke wijzigingen aan registranten te sturen. U voldoet aan alle vereisten van de registrantenovereenkomst om registrant te zijn, een domeinnaamregistratie aan te vragen en te behouden, inclusief maar niet beperkt tot de Canadese aanwezigheidseisen van CIRA voor registranten, " .
    "<a href=\"https://static.cira.ca/policy/canadian-presence-requirements-for-registrants.pdf\" target=\"_blank\">hier</a>. " .
    "CIRA zal uw persoonsgegevens verzamelen, gebruiken en openbaar maken zoals uiteengezet in het privacybeleid van CIRA " .
    "<a href=\"https://www.cira.ca/policy/corporate/cira-privacy-policy\" target=\_blank\">hier</a>.</div>"
);
$_LANG["hxflagstacregulateddescrngo"] = ($_LANG["hxflagstacregulateddescrdefault"] .
    "<div style=\"padding:10px 0px;\">Bij registratie van een {TLD}-domein ontvangt u automatisch en zonder extra kosten ook een .ONG-domein. " .
    "Wijzigingen aan het {TLD}-domein worden automatisch doorgevoerd op het .ONG-domein. Daarom vindt u het .ONG-domein niet apart in uw domeinportfolio.</div>"
);
$_LANG["hxflagstacregulateddescritsection3"] = ("Bevestig dat u <b><a href=\"{TAC}\" target=\"_blank\">Sectie 3 - Verklaringen en aansprakelijkheidsaanvaarding</a></b> erkent.<br/>" .
    "<div style=\"text-align:justify;margin-bottom:10px;\">" .
    "De registrant van de betreffende domeinnaam verklaart op eigen verantwoordelijkheid het volgende te voldoen:" .
    "<ul><li>Bij registratie voor een particulier: In het bezit te zijn van het staatsburgerschap of een woonadres binnen de Europese Unie</li>" .
    "<li>Bij registratie voor andere entiteiten: Gevestigd te zijn binnen de Europese Unie.</li>" .
    "<li>Te weten en te accepteren dat registratie en beheer van een domeinnaam onderworpen is aan de <a href=\"{TAC}\" target=\"_blank\">" .
    "'Management of synchronous operations on domain names of the ccTLD {TLD} - Guidelines'</a> en de <a href=\"{TAC}\" target=\"_blank\">" .
    "'Dispute resolution in the ccTLD {TLD} - Regulations & Guidelines'</a> en latere wijzigingen.</li>" .
    "<li>Bevoegd te zijn tot gebruik en/of juridisch beheer van de aangevraagde domeinnaam en met de aanvraag geen rechten van derden te schenden.</li>" .
    "<li>Te weten dat opname van persoonsgegevens in de domeindatabase, en mogelijke verspreiding en inzage via internet, expliciet moet worden goedgekeurd via de betreffende selectievakjes. Zie <a href=\"{TAC}\" target=\"_blank\">'DBNA and WHOIS Policy'</a>.</li>" .
    "<li>Te weten en te accepteren dat de registry de domeinnaam direct intrekt bij foutieve of onjuiste gegevens in deze aanvraag of andere " .
    "juridische stappen onderneemt. In dat geval kan geen aanspraak worden gemaakt op schadevergoeding richting de registry.</li>" .
    "<li>De registry te vrijwaren van elke aansprakelijkheid voortvloeiend uit de toewijzing en het gebruik van de domeinnaam door de particulier die de aanvraag heeft ingediend.</li>" .
    "<li>Italiaans recht en de wetten van de Italiaanse staat te accepteren.</li></ul></div>"
);
$_LANG["hxflagstacregulateddescritsection5"] = ("Bevestig dat u <b><a href=\"{TAC}\" target=\"_blank\">Sectie 5 - Toestemming voor verwerking van persoonsgegevens voor registratie</b></a> erkent.<br/>" .
    "<div style=\"text-align:justify;margin-bottom:10px;\">" .
    "De aanvrager geeft na het lezen van bovenstaande publicatie toestemming voor de verwerking van gegevens die nodig zijn voor registratie, conform deze publicatie." .
    "Toestemming is niet verplicht. Zonder toestemming kan registratie, toewijzing en beheer van de domeinnaam niet worden afgerond.</div>"
);
$_LANG["hxflagstacregulateddescritsection6"] = ("Bevestig dat u <b><a href=\"{TAC}\" target=\"_blank\">Sectie 6 - Toestemming voor verspreiding van persoonsgegevens via internet</b></a> erkent.<br/>" .
    "<div style=\"text-align:justify;margin-bottom:10px;\">" .
    "De aanvrager geeft na het lezen van bovenstaande publicatie toestemming voor verspreiding en inzage van de gegevens via internet volgens deze publicatie." .
    "Toestemming is niet verplicht. Zonder toestemming is verspreiding en inzage van de gegevens via internet niet toegestaan.</div>"
);
$_LANG["hxflagstacregulateddescritsection7"] = ("Bevestig dat u <b><a href=\"{TAC}\" target=\"_blank\">Sectie 7 - Expliciete aanvaarding van de volgende punten</b></a> erkent.<br/>" .
    "<div style=\"text-align:justify;margin-bottom:10px;\">" .
    "De aanvrager verklaart uitdrukkelijk akkoord te gaan met het volgende:" .
    "<ul><li>d) te weten en te accepteren dat registratie en beheer van een domeinnaam onderworpen is aan de <a href=\"{TAC}\" target=\"_blank\">" .
    "'Management of synchronous operations on domain names of the ccTLD {TLD} - Guidelines'</a> en de <a href=\"{TAC}\" target=\"_blank\">" .
    "'Dispute resolution in the ccTLD {TLD} - Regulations & Guidelines'</a> en latere wijzigingen.</li>" .
    "<li>e) Te weten en te accepteren dat de registry de domeinnaam direct intrekt bij foutieve of onjuiste gegevens in deze aanvraag of andere " .
    "juridische stappen onderneemt. In dat geval kan geen aanspraak worden gemaakt op schadevergoeding richting de registry.</li>" .
    "<li>f) De registry te vrijwaren van elke aansprakelijkheid voortvloeiend uit de toewijzing en het gebruik van de domeinnaam door de particulier die de aanvraag heeft ingediend.</li>" .
    "<li>g) Italiaans recht en de wetten van de Italiaanse staat te accepteren.</li></ul></div>"
);
$_LANG["hxflagstacregulateddescrgoogle"] = ("U bevestigt dat {TLD} een veilige namespace is, d.w.z. voor het gebruik van een {TLD}-domeinnaam is een SSL-certificaat vereist. " .
    "Websites op een {TLD}-domein zijn alleen via een beveiligde HTTPS-verbinding bereikbaar."
);

// Generic Fields
$_LANG["hxflagsintendeduse"] = "Beoogd gebruik";
$_LANG["hxflagsyesnoyes"] = "Ja";
$_LANG["hxflagsyesnono"] = "Nee";
$_LANG["hxflagsyesnoy"] = "Ja";
$_LANG["hxflagsyesnon"] = "Nee";
$_LANG["hxflagsyesno1"] = "Ja";
$_LANG["hxflagsyesno0"] = "Nee";

$_LANG["hxflagslegaltype"] = "Rechtsvorm";
$_LANG["hxflagslegaltypeindiv"] = "Particulier";
$_LANG["hxflagslegaltypeorg"] = "Organisatie";
$_LANG["hxflagsapplicationpurpose"] = "Doel van gebruik";
$_LANG["hxflagsregistrantidnumber"] = "Domeinhouder, identificatienummer";
$_LANG["hxflagsregistrantvatid"] = "Domeinhouder, btw-nummer";
$_LANG["hxflagsadminidnumber"] = "Admin-C, identificatienummer";
$_LANG["hxflagsadminvatid"] = "Admin-C, btw-nummer";
$_LANG["hxflagstechidnumber"] = "Tech-C, identificatienummer";
$_LANG["hxflagstechvatid"] = "Tech-C, btw-nummer";
$_LANG["hxflagsbillingidnumber"] = "Billing-C, identificatienummer";
$_LANG["hxflagsregistrantidtype"] = "Domeinhouder, oorsprong identificatienummer";
$_LANG["hxflagsallocationtoken"] = "Registry bestelsleutel";
$_LANG["hxflagsallocationtokendescr"] = ("Om een {TLD} domein te registreren, dient u de door de registry uitgegeven bestelsleutel op te geven. " .
    "Vul <a href=\"{TAC}\" target=\"_blank\">hier</a> het aanvraagformulier in om de sleutel te verkrijgen."
);
$_LANG["hxflagsnexuscategory"] = "Nexus categorie";
$_LANG["hxflagsnexuscountry"] = "Nexus landcode";
$_LANG["hxflagsfax"] = "Fax vereist";
$_LANG["hxflagsfaxregistrationdescr"] = "Ik bevestig <a href=\"{FAXFORM}\" target=\"_blank\">dit formulier</a> na het indienen van de registratieaanvraag in te vullen en te verzenden om het proces te voltooien.";
$_LANG["hxflagsfaxtransferdescr"] = "Ik bevestig <a href=\"{FAXFORM}\" target=\"_blank\">dit formulier</a> na het indienen van de verhuisaanvraag in te vullen en te verzenden om het proces te voltooien.";
$_LANG["hxflagsidentificationnumber"] = "Identificatienummer";
$_LANG["hxflagswhoisoptout"] = "WHOIS opt-out";
$_LANG["hxflagsregistrantbirthdate"] = "Domeinhouder, geboortedatum";

// AFNIC TLDs, prefixed with hxflagsafnic
// Individuals
// reusing .ru translations for birthday
$_LANG["hxflagsafnictldregistrantbirthplace"] = "Domeinhouder, geboorteplaats";
$_LANG["hxflagsafnictldregistrantbirthplacedescr"] = "(vereist voor particulieren)";
// Companies
$_LANG["hxflagsafnictldvatid"] = "Btw- of SIREN/SIRET-nummer";
$_LANG["hxflagsafnictldvatiddescr"] = "(Alleen voor organisaties met btw- of SIREN/SIRET-nummer)";
$_LANG["hxflagsafnictldtrademark"] = "Merkregistratienummer";
$_LANG["hxflagsafnictldtrademarkdescr"] = "(Alleen voor organisaties met een Europees merk)";
$_LANG["hxflagsafnictldduns"] = "DUNS-nummer";
$_LANG["hxflagsafnictlddunsdescr"] = "(Alleen voor organisaties met een DUNS-nummer)";
$_LANG["hxflagsafnictldlocalid"] = "Regionale identificatie";
$_LANG["hxflagsafnictldlocaliddescr"] = "(Alleen voor organisaties met een regionale identificatie)";
// French Association, Data from Journal officiel [JO]
$_LANG["hxflagsafnictldjodod"] = "Datum van aankondiging [JO]";
$_LANG["hxflagsafnictldjododdescr"] = "(Alleen voor Franse verenigingen, formaat <b>JJJJ-MM-DD</b>)";
$_LANG["hxflagsafnictldjonumber"] = "Nummer [JO]";
$_LANG["hxflagsafnictldjonumberdescr"] = "(Alleen voor Franse verenigingen, nummer van de Journal Officiel)";
$_LANG["hxflagsafnictldjopage"] = "Pagina van aankondiging [JO]";
$_LANG["hxflagsafnictldjopagedescr"] = "(Alleen voor Franse verenigingen, paginanummer van aankondiging in de Journal Officiel)";
$_LANG["hxflagsafnictldjodop"] = "Datum van publicatie [JO]";
$_LANG["hxflagsafnictldjodopdescr"] = "(Alleen voor Franse verenigingen, publicatiedatum in formaat <b>JJJJ-MM-DD</b>)";
// Options, Legal Type
$_LANG["hxflagsafnictldlegaltypeindiv"] = "Particulier";
$_LANG["hxflagsafnictldlegaltypeorg1"] = "Organisatie met btw- of SIREN/SIRET-nummer";
$_LANG["hxflagsafnictldlegaltypeorg2"] = "Organisatie met Europees merk";
$_LANG["hxflagsafnictldlegaltypeorg3"] = "Organisatie met DUNS-nummer";
$_LANG["hxflagsafnictldlegaltypeorg4"] = "Organisatie met regionale identificatie";
$_LANG["hxflagsafnictldlegaltypeass"] = "Franse vereniging";

// .AERO
$_LANG["hxflagsaerotldaeroid"] = ".AERO ID <sup style=\"cursor:help;\" title=\"Hier aanvragen https://www.information.aero/\">wat is dit?</sup>";
$_LANG["hxflagsaerotldaerokey"] = ".AERO Key <sup style=\"cursor:help;\" title=\"Hier aanvragen https://www.information.aero/\">wat is dit?</sup>";

// .BE
$_LANG["hxflagsbetldtradeauthdescr"] = "Het wijzigen van de registrant vereist een geldige EPP-code. Verplicht indien naam, organisatie of e-mailadres van de registrant wordt aangepast.";

// .CA
$_LANG["hxflagscatldcontactlanguage"] = "Contacttaal";
$_LANG["hxflagscatldregistryinformation"] = "Registry-informatie";
$_LANG["hxflagscatldregistryinformationdescr"] = ("Telkens wanneer u een {TLD}-domein voor een nieuwe registrant bestelt of een houderwijziging naar een nieuwe registrant uitvoert, moet deze nieuwe registrant binnen 7 dagen akkoord gaan met de registrantenovereenkomst, zodat het domein wordt geactiveerd. Anders wordt het domein door de registry zonder restitutie verwijderd. " .
    "<br/><b>Alleen in dit geval ontvangt de registrant een bevestigingsmail met alle stappen om akkoord te gaan met deze overeenkomst.</b><br/>" .
    "Indien een reeds bevestigde registrant wordt gebruikt bij een bestelling/wijziging, wordt het proces realtime verwerkt."
);
// Options, Legal Type
$_LANG["hxflagscatldlegaltypecco"] = "Bedrijf";
$_LANG["hxflagscatldlegaltypecct"] = "Canadese staatsburger";
$_LANG["hxflagscatldlegaltyperes"] = "Permanent inwoner van Canada";
$_LANG["hxflagscatldlegaltypegov"] = "Overheid of overheidsinstantie in Canada";
$_LANG["hxflagscatldlegaltypeedu"] = "Canadese onderwijsinstelling";
$_LANG["hxflagscatldlegaltypeass"] = "Niet-geregistreerde Canadese vereniging";
$_LANG["hxflagscatldlegaltypehos"] = "Canadees ziekenhuis";
$_LANG["hxflagscatldlegaltypeprt"] = "In Canada geregistreerd partnerschap";
$_LANG["hxflagscatldlegaltypetdm"] = "In Canada geregistreerd merk (door niet-Canadese houder)";
$_LANG["hxflagscatldlegaltypetrd"] = "Canadese handelsvereniging";
$_LANG["hxflagscatldlegaltypeplt"] = "Canadese politieke partij";
$_LANG["hxflagscatldlegaltypelam"] = "Canadese bibliotheek, archief of museum";
$_LANG["hxflagscatldlegaltypetrs"] = "In Canada opgericht trustfonds";
$_LANG["hxflagscatldlegaltypeabo"] = "Inheemse inwoner of groep in Canada";
$_LANG["hxflagscatldlegaltypeinb"] = "Door de Indian Act erkende inheemse groep";
$_LANG["hxflagscatldlegaltypelgr"] = "Wettelijk vertegenwoordiger van een Canadese staatsburger of permanente inwoner";
$_LANG["hxflagscatldlegaltypeomk"] = "Officieel handelsmerk geregistreerd in Canada";
$_LANG["hxflagscatldlegaltypemaj"] = "Hare Majesteit de Koningin";
// Legal Type Description, don't move it up.
$_LANG["hxflagscatldlegaltypedescr"] = ("<p>De Canadese registry (`CIRA`) verplicht zich tot het beschermen van persoonsgegevens bij het beheren van domeinnamen.</p>" .
    "<p>Registranten met de volgende Canadese aanwezigheidscategorieën worden als particulier beschouwd:</p>" .
    "<ul>" .
    "<li>" . $_LANG["hxflagscatldlegaltypecct"] . "</li>" .
    "<li>" . $_LANG["hxflagscatldlegaltyperes"] . "</li>" .
    "<li>" . $_LANG["hxflagscatldlegaltypelgr"] . "</li>" .
    "<li>" . $_LANG["hxflagscatldlegaltypeabo"] . "</li>" .
    "</ul>" .
    "<p>Alle overige categorieën worden niet als particulier aangemerkt en kunnen daarom hun WHOIS-privacyinstellingen niet wijzigen. In dat geval worden de contactgegevens door de registry publiek gepubliceerd in WHOIS. Particulieren kunnen dit via het veld `" . $_LANG["hxflagswhoisoptout"] . "` uitsluiten.</p>"
);

// .CN
 // Options, Registrant ID Type
$_LANG["hxflagscntldregistrantidtypesfz"] = "Chinees identiteitsbewijs";
$_LANG["hxflagscntldregistrantidtypehz"] = "Buitenlands paspoort";
$_LANG["hxflagscntldregistrantidtypegajmtx"] = "Uitreis-/inreisvergunning voor Hongkong en Macau";
$_LANG["hxflagscntldregistrantidtypetwjmtx"] = "Reisdocument voor inwoners van Taiwan voor in- en uitreizen";
$_LANG["hxflagscntldregistrantidtypewjlsfz"] = "Buitenlands verblijfsvergunning";
$_LANG["hxflagscntldregistrantidtypegajzz"] = "Verblijfsvergunning voor inwoners van Hongkong/Macau";
$_LANG["hxflagscntldregistrantidtypetwjzz"] = "Verblijfsvergunning voor inwoners van Taiwan";
$_LANG["hxflagscntldregistrantidtypejgz"] = "Officieel Chinees certificaat";
$_LANG["hxflagscntldregistrantidtypeorg"] = "Organisatiecode-certificaat";
$_LANG["hxflagscntldregistrantidtypeyyzz"] = "Zakelijke licentie";
$_LANG["hxflagscntldregistrantidtypetydm"] = "USCC-certificaat";
$_LANG["hxflagscntldregistrantidtypebddm"] = "Militaire code";
$_LANG["hxflagscntldregistrantidtypejddwfw"] = "Militair betaalde externe dienstverleningslicentie";
$_LANG["hxflagscntldregistrantidtypesydwfr"] = "Certificaat rechtspersoon publieke instelling";
$_LANG["hxflagscntldregistrantidtypewgczjg"] = "Registratieformulier buitenlandse vestiging";
$_LANG["hxflagscntldregistrantidtypeshttfr"] = "Registratiecertificaat sociale organisatie";
$_LANG["hxflagscntldregistrantidtypezjcs"] = "Registratiecertificaat religieuze locatie";
$_LANG["hxflagscntldregistrantidtypembfqy"] = "Registratiecertificaat private non-profit organisatie";
$_LANG["hxflagscntldregistrantidtypejjhfr"] = "Registratiecertificaat stichting";
$_LANG["hxflagscntldregistrantidtypelszy"] = "Vergunning advocatenkantoor";
$_LANG["hxflagscntldregistrantidtypewgzhwh"] = "Registratiecertificaat buitenlands cultureel centrum in China";
$_LANG["hxflagscntldregistrantidtypewlczjg"] = "Registratiecertificaat buitenlandse toerismevertegenwoordiging";
$_LANG["hxflagscntldregistrantidtypesfjd"] = "Certificaat juridische entiteit";
$_LANG["hxflagscntldregistrantidtypejwjg"] = "Certificaat buitenlandse onderneming";
$_LANG["hxflagscntldregistrantidtypeshfwjg"] = "Registratiecertificaat sociale dienstverlener";
$_LANG["hxflagscntldregistrantidtypembxxbx"] = "Vergunning particuliere school";
$_LANG["hxflagscntldregistrantidtypeyljgzy"] = "Vergunning medische instelling";
$_LANG["hxflagscntldregistrantidtypegzjgzy"] = "Vergunning notariskantoor";
$_LANG["hxflagscntldregistrantidtypebjwsxx"] = "Vergunning school voor kinderen van buitenlandse diplomaten in Beijing/China";
$_LANG["hxflagscntldregistrantidtypeqttydm"] = "Overig-certificaat USCC";
$_LANG["hxflagscntldregistrantidtypeqt"] = "Overig";

// .COM.AU
// Options, Registrant ID Type
$_LANG["hxflagsautldregistrantidtypeabn"] = "Australisch btw-nummer (ABN)";
$_LANG["hxflagsautldregistrantidtypeacn"] = "Australisch ondernemingsnummer (ACN)";
$_LANG["hxflagsautldregistrantidtyperbn"] = "Handelsregistratienummer";
$_LANG["hxflagsautldregistrantidtypetm"] = "Merkregistratienummer";

// .COM.BR
$_LANG["hxflagscombrtldidentificationnumberdescr"] = "Vul uw CPF- of CNPJ-nummer in, uitgegeven door het Braziliaanse ministerie van Financiën voor fiscale doeleinden.";

// .DE
$_LANG["hxflagsdetldgeneralrequestcontact"] = "Contact voor algemene verzoeken";
$_LANG["hxflagsdetldabuseteamcontact"] = "Contact voor abuse-meldingen";
$_LANG["hxflagsdetldgeneralrequestcontactdescr"] = "U kunt een e-mailadres of websiteadres opgeven";
$_LANG["hxflagsdetldabuseteamcontactdescr"] = "U kunt een e-mailadres of websiteadres opgeven";

// .DK
$_LANG["hxflagsdktldregistrantcontact"] = "Domeinhouder, contact";
$_LANG["hxflagsdktldregistrantlegaltype"] = "Domeinhouder, rechtsvorm";
$_LANG["hxflagsdktldregistrantvatiddescr"] = "(alleen vereist indien hierboven 'Bedrijf' is geselecteerd)";
$_LANG["hxflagsdktldadminvatiddescr"] = "(alleen vereist indien hierboven 'Bedrijf' is geselecteerd)";
$_LANG["hxflagsdktldregistrantlegaltypeindiv"] = "Particulier";
$_LANG["hxflagsdktldregistrantlegaltypeorg"] = "Bedrijf";
$_LANG["hxflagsdktldadmincontact"] = "Admin-C, contact";
$_LANG["hxflagsdktldadminlegaltype"] = "Admin-C, rechtsvorm";
$_LANG["hxflagsdktldadminlegaltypeindiv"] = "Particulier";
$_LANG["hxflagsdktldadminlegaltypeorg"] = "Bedrijf";
$_LANG["hxflagsdktldlegaltypedescr"] = "Selecteer 'Particulier' bij een eenmanszaak zonder btw-nummer (bedrijfsgegevens worden dan niet gepubliceerd bij registratie).";
$_LANG["hxflagsdktldregistrantlegaltypedescr"] = $_LANG["hxflagsdktldlegaltypedescr"] . "<div style=\"margin-top:10px\"><b>Let op voor domeinhouders:</b> DK Hostmaster stuurt een bevestiging per e-mail. Controleer uw inbox en spamfolder en bevestig binnen 4 dagen.</div>";
$_LANG["hxflagsdktldcontactdescr"] = "DK-HOSTMASTER gebruikers-ID";

// .ES
$_LANG["hxflagsestldregistranttype"] = "Domeinhouder, type";
$_LANG["hxflagsestldregistrantidentificationnumber"] = "Domeinhouder, identificatienummer";
$_LANG["hxflagsestldadmintype"] = "Admin-C, type";
$_LANG["hxflagsestldadminidentificationnumber"] = "Admin-C, identificatienummer";
$_LANG["hxflagsestldlegalform"] = "Domeinhouder, rechtsvorm";
// Options, Legal Type
$_LANG["hxflagsestldlegalform1"] = "Particulier";
$_LANG["hxflagsestldlegalform39"] = "Economische belangengroep";
$_LANG["hxflagsestldlegalform47"] = "Vereniging";
$_LANG["hxflagsestldlegalform59"] = "Sportvereniging";
$_LANG["hxflagsestldlegalform68"] = "Beroepsvereniging";
$_LANG["hxflagsestldlegalform124"] = "Spaarbank";
$_LANG["hxflagsestldlegalform150"] = "Gemeenschappelijk goed";
$_LANG["hxflagsestldlegalform152"] = "Vereniging van eigenaren";
$_LANG["hxflagsestldlegalform164"] = "Orde of religieuze instelling";
$_LANG["hxflagsestldlegalform181"] = "Consulaat";
$_LANG["hxflagsestldlegalform197"] = "Publiekrechtelijke vereniging";
$_LANG["hxflagsestldlegalform203"] = "Ambassade";
$_LANG["hxflagsestldlegalform229"] = "Gemeentebestuur";
$_LANG["hxflagsestldlegalform269"] = "Sportfederatie";
$_LANG["hxflagsestldlegalform286"] = "Stichting";
$_LANG["hxflagsestldlegalform365"] = "Wederzijdse verzekeringsmaatschappij";
$_LANG["hxflagsestldlegalform434"] = "Regionale overheidsinstantie";
$_LANG["hxflagsestldlegalform436"] = "Centrale overheidsinstantie";
$_LANG["hxflagsestldlegalform439"] = "Politieke partij";
$_LANG["hxflagsestldlegalform476"] = "Vennootschap onder firma";
$_LANG["hxflagsestldlegalform510"] = "Landbouwpartnerschap";
$_LANG["hxflagsestldlegalform524"] = "Naamloze vennootschap";
$_LANG["hxflagsestldlegalform525"] = "Sportclub";
$_LANG["hxflagsestldlegalform554"] = "Burgerlijke maatschappij";
$_LANG["hxflagsestldlegalform560"] = "Vennootschap onder firma";
$_LANG["hxflagsestldlegalform562"] = "Vennootschap onder firma en commanditaire vennootschap";
$_LANG["hxflagsestldlegalform566"] = "Coöperatie";
$_LANG["hxflagsestldlegalform608"] = "Werknemersbedrijf";
$_LANG["hxflagsestldlegalform612"] = "Besloten vennootschap";
$_LANG["hxflagsestldlegalform713"] = "Spaans agentschap";
$_LANG["hxflagsestldlegalform717"] = "Tijdelijke bedrijfscombinatie";
$_LANG["hxflagsestldlegalform744"] = "Werknemersnaamloze vennootschap";
$_LANG["hxflagsestldlegalform745"] = "Regionale publieke entiteit";
$_LANG["hxflagsestldlegalform746"] = "Nationale publieke entiteit";
$_LANG["hxflagsestldlegalform747"] = "Lokale publieke entiteit";
$_LANG["hxflagsestldlegalform878"] = "Raad van oorsprongsbenaming";
$_LANG["hxflagsestldlegalform879"] = "Entiteit voor beheer van natuurgebieden";
$_LANG["hxflagsestldlegalform877"] = "Overig";
// Options, Registrant ID Type
$_LANG["hxflagsestldregistranttype0"] = "Niet-Spaanse houder";
$_LANG["hxflagsestldregistranttype1"] = "Spaanse particulier of bedrijf";
$_LANG["hxflagsestldregistranttype3"] = "NIE (buitenlanders-ID)";
$_LANG["hxflagsestldregistranttype4"] = "Btw-nummer";
$_LANG["hxflagsestldadmintype0"] = "Niet-Spaanse entiteit";
$_LANG["hxflagsestldadmintype1"] = "Spaanse particulier of bedrijf";
$_LANG["hxflagsestldadmintype3"] = "NIE (buitenlanders-ID)";

// .EU
$_LANG["hxflagseutldregistrantcitizenship"] = "Domeinhouder, nationaliteit";
$_LANG["hxflagseutldregistrantcitizenshipdescr"] = "Vereist voor Europese particulieren woonachtig buiten de EU";
$_LANG["hxflagseutldlegaltypeindiv"] = $_LANG["hxflagslegaltypeindiv"];
$_LANG["hxflagseutldlegaltypeorg"] = $_LANG["hxflagslegaltypeorg"];

// .FI
$_LANG["hxflagsfitldregistrantidnumberdescr"] = ("<ul><li>Bedrijven: Geef het handelsregisternummer op.</li>" .
    "<li>Particulieren uit Finland: Geef het identificatienummer op.</li>" .
    "<li>Overige particulieren: Laat leeg.</li></ul>" .
    "Voor particulieren moet de invoer bestaan uit elf tekens in de vorm `DDMMJJ-CZZZQ`. Hierbij staat `DDMMJJ` voor geboortedatum; " .
    "`C` voor het eeuwteken: `+` voor 1800–1899, `-` voor 1900–1999 of `A` voor 2000-2099;" .
    "`ZZZ` voor het individueel nummer: oneven voor mannen, even voor vrouwen en voor in Finland geborenen tussen 002-899 " .
    "(in uitzonderlijke gevallen ook hogere nummers);" .
    "`Q` voor het controlekarakter (checksum). Voorbeeld van een geldige code: 311280-888Y."
);
$_LANG["hxflagsfitldregistrantbirthdatedescr"] = "(JJJJ-MM-DD; alleen vereist voor particulieren die niet uit Finland komen)";

// .HK
$_LANG["hxflagshktldregistrantdocumenttype"] = "Domeinhouder, documenttype";
$_LANG["hxflagshktldregistrantotherdocumenttype"] = "Domeinhouder, ander documenttype";
$_LANG["hxflagshktldregistrantdocumentnumber"] = "Domeinhouder, documentnummer";
$_LANG["hxflagshktldregistrantdocumentorigincountry"] = "Domeinhouder, land van afgifte document";
$_LANG["hxflagshktldregistrantbirthdateforindividuals"] = "Domeinhouder, geboortedatum voor particulieren";
// Options, Registrant Document Type
$_LANG["hxflagshktldregistrantdocumenttypehkid"] = "Particulier - Hong Kong identiteitskaartnummer";
$_LANG["hxflagshktldregistrantdocumenttypeothid"] = "Particulier - Identiteitsnummer van ander land";
$_LANG["hxflagshktldregistrantdocumenttypepassno"] = "Particulier - Paspoortnummer";
$_LANG["hxflagshktldregistrantdocumenttypebirthcert"] = "Particulier - Geboorteakte";
$_LANG["hxflagshktldregistrantdocumenttypeothidv"] = "Particulier - Overig document";
$_LANG["hxflagshktldregistrantdocumenttypebr"] = "Organisatie - Handelsregistratie";
$_LANG["hxflagshktldregistrantdocumenttypeci"] = "Organisatie - Oprichtingsakte";
$_LANG["hxflagshktldregistrantdocumenttypecrs"] = "Organisatie - Schoolregistratiecertificaat";
$_LANG["hxflagshktldregistrantdocumenttypehksarg"] = "Organisatie - HK overheidsafdeling";
$_LANG["hxflagshktldregistrantdocumenttypehkordinance"] = "Organisatie - HK verordening";
$_LANG["hxflagshktldregistrantdocumenttypeothorg"] = "Organisatie - Overig document";
$_LANG["hxflagshktldregistrantdocumenttypedescr"] = ("(LET OP: Mogelijk wordt u gevraagd een kopie van het document per e-mail aan te leveren. Voor .HK is dit alleen vereist op verzoek van de registry. Voor .COM.HK is een handelsregistratie vereist voordat de registratieaanvraag wordt verwerkt.)"
);
$_LANG["hxflagshktldregistrantotherdocumenttypedescr"] = "(vereist indien type 'Particulier/Organisatie - Overig document' is geselecteerd)";
$_LANG["hxflagshktldregistrantbirthdateforindividualsdescr"] = "(vereist voor particulieren, formaat JJJJ-MM-DD)";

// .JOBS
$_LANG["hxflagsjobstldyesnono"] = "Nee";
$_LANG["hxflagsjobstldyesnoyes"] = "Ja";
$_LANG["hxflagsjobstldwebsite"] = "Website";
$_LANG["hxflagsjobstldindustryclassification"] = "Brancheclassificatie";
$_LANG["hxflagsjobstldmemberofahrassociation"] = "Lid van HR-vereniging";
$_LANG["hxflagsjobstldcontactjobtitle"] = "Contact, functietitel (bijv. CEO)";
$_LANG["hxflagsjobstldcontacttype"] = "Contact, type";
// Options, Industry Classification
$_LANG["hxflagsjobstldindustryclassification2"] = "Accountancy/Bankwezen/Financiën";
$_LANG["hxflagsjobstldindustryclassification3"] = "Landbouw/Agribusiness";
$_LANG["hxflagsjobstldindustryclassification21"] = "Biotechnologie/Wetenschap";
$_LANG["hxflagsjobstldindustryclassification5"] = "ICT/Informatietechnologie";
$_LANG["hxflagsjobstldindustryclassification4"] = "Bouwsector";
$_LANG["hxflagsjobstldindustryclassification12"] = "Consultancy";
$_LANG["hxflagsjobstldindustryclassification6"] = "Onderwijs/Opleiding/Bibliotheek";
$_LANG["hxflagsjobstldindustryclassification7"] = "Entertainmentindustrie";
$_LANG["hxflagsjobstldindustryclassification13"] = "Milieubranche";
$_LANG["hxflagsjobstldindustryclassification19"] = "Hotelsector";
$_LANG["hxflagsjobstldindustryclassification10"] = "Overheid/Burgerzaken";
$_LANG["hxflagsjobstldindustryclassification11"] = "Gezondheidszorg";
$_LANG["hxflagsjobstldindustryclassification15"] = "Human Resources/HR";
$_LANG["hxflagsjobstldindustryclassification16"] = "Verzekeringswezen";
$_LANG["hxflagsjobstldindustryclassification17"] = "Juridische sector";
$_LANG["hxflagsjobstldindustryclassification18"] = "Productie/Industrie";
$_LANG["hxflagsjobstldindustryclassification20"] = "Media/Reclame";
$_LANG["hxflagsjobstldindustryclassification9"] = "Recreatie & Vrije tijd";
$_LANG["hxflagsjobstldindustryclassification26"] = "Farmaceutische industrie";
$_LANG["hxflagsjobstldindustryclassification22"] = "Vastgoedsector";
$_LANG["hxflagsjobstldindustryclassification14"] = "Horeca/Voedingsdienstverlening";
$_LANG["hxflagsjobstldindustryclassification23"] = "Detailhandel";
$_LANG["hxflagsjobstldindustryclassification8"] = "Telemarketing";
$_LANG["hxflagsjobstldindustryclassification24"] = "Transport & Logistiek";
$_LANG["hxflagsjobstldindustryclassification25"] = "Overig";
// Options, Contact Type
$_LANG["hxflagsjobstldcontacttype1"] = "Administratief";
$_LANG["hxflagsjobstldcontacttype0"] = "Overig";

// .LOTTO
$_LANG["hxflagslottotldmembershipcontactid"] = "Lid, contact-ID";
$_LANG["hxflagslottotldverificationcode"] = "Verificatiecode";

// .LT
$_LANG["hxflagslttldlegalentityidentificationcode"] = "Rechtspersoon, identificatienummer";

// .MELBOURNE
// Options, Nexus Category
$_LANG["hxflagsmelbournetldnexuscategorya"] = "Victoriaans bedrijf";
$_LANG["hxflagsmelbournetldnexuscategoryb"] = "Inwoner van Victoria";
$_LANG["hxflagsmelbournetldnexuscategoryc"] = "Gelieerde onderneming";
$_LANG["hxflagsmelbournetldnexuscategorydescr"] = ("<div style=\"padding:10px 0px;text-align:justify\"><b>Registratievereisten</b><br/>" .
    "Om een domeinnaam te verlengen of te registreren moet de eigenaar of registrant voldoen aan één van de volgende criteria A, B of C:<br/><br/>" .
    "<b>Criteria A – Victoriaans bedrijf</b><br/>De registrant moet een bedrijf zijn dat geregistreerd is in het <a href=\"https://register.business.gov.au/\" target=\"_blank\">Australisch handelsregister</a> of via de " .
    "`<a href=\"https://asic.gov.au/\" target=\"_blank\">Australian Securities and Investment Commission</a>`. De registrant <ul>" .
    "<li>heeft een adres in Victoria gekoppeld aan zijn ABN, ACN, RBN of ARBN, of</li>" .
    "<li>heeft een geldig zakelijk adres in Victoria.</li></ul><br/>" .
    "<b>Criteria B – Inwoner van Victoria</b><br/>De registrant moet Australisch staatsburger zijn of een geldig woonadres in Victoria hebben.<br/><br/>" .
    "<b>Criteria C – Gelieerde onderneming</b><br/>De registrant moet een gelieerde onderneming zijn. Alleen domeinnamen aanvragen die overeenkomen met of afgeleid zijn van:<ul>" .
    "<li>Bedrijfsnaam of (roep)naam/pseudoniem van de registrant, waarbij de bedrijfsnaam geregistreerd moet zijn bij de bevoegde instantie,</li>" .
    "<li>een product dat door de gelieerde onderneming wordt geproduceerd of verkocht aan bedrijven/particulieren in Victoria,</li>" .
    "<li>een dienst die wordt aangeboden aan inwoners van Victoria,</li>" .
    "<li>een evenement in Victoria dat door het bedrijf wordt georganiseerd of gesponsord,</li>" .
    "<li>een activiteit die het bedrijf in Victoria faciliteert,</li>" .
    "<li>een cursus of opleidingsprogramma voor inwoners van Victoria.</li></ul></div>"
);

// .MY
$_LANG["hxflagsmytldregistrantorganisationtype"] = "Domeinhouder, organisatietype";
// Options, Registrant Organisation Type
$_LANG["hxflagsmytldregistrantorganisationtype1"] = "Architectenbureau";
$_LANG["hxflagsmytldregistrantorganisationtype2"] = "Accountantskantoor";
$_LANG["hxflagsmytldregistrantorganisationtype3"] = "Bedrijf volgens Business Registration Act (ROB)";
$_LANG["hxflagsmytldregistrantorganisationtype4"] = "Bedrijf volgens handelsvergunning";
$_LANG["hxflagsmytldregistrantorganisationtype5"] = "Bedrijf volgens Companies Act (ROC)";
$_LANG["hxflagsmytldregistrantorganisationtype6"] = "Door overheid geaccrediteerde onderwijsinstelling";
$_LANG["hxflagsmytldregistrantorganisationtype7"] = "Landbouworganisatie";
$_LANG["hxflagsmytldregistrantorganisationtype8"] = "Federale overheidsinstantie";
$_LANG["hxflagsmytldregistrantorganisationtype9"] = "Buitenlandse ambassade";
$_LANG["hxflagsmytldregistrantorganisationtype10"] = "Ministerie van Buitenlandse Zaken";
$_LANG["hxflagsmytldregistrantorganisationtype11"] = "Gesubsidieerde basis- of middelbare school";
$_LANG["hxflagsmytldregistrantorganisationtype12"] = "Advocatenkantoor";
$_LANG["hxflagsmytldregistrantorganisationtype13"] = "Lembaga (Raad)";
$_LANG["hxflagsmytldregistrantorganisationtype14"] = "Gemeentelijke instantie";
$_LANG["hxflagsmytldregistrantorganisationtype15"] = "MARA Junior Science College (MRSM)";
$_LANG["hxflagsmytldregistrantorganisationtype16"] = "Afdeling van het Ministerie van Defensie";
$_LANG["hxflagsmytldregistrantorganisationtype17"] = "Brievenbusfirma";
$_LANG["hxflagsmytldregistrantorganisationtype18"] = "Ouder-/lerarenvereniging";
$_LANG["hxflagsmytldregistrantorganisationtype19"] = "Hogeschool onder ministerie van Onderwijs";
$_LANG["hxflagsmytldregistrantorganisationtype20"] = "Particuliere hogeronderwijsinstelling";
$_LANG["hxflagsmytldregistrantorganisationtype21"] = "Particuliere school";
$_LANG["hxflagsmytldregistrantorganisationtype22"] = "Regionaal kantoor";
$_LANG["hxflagsmytldregistrantorganisationtype23"] = "Religieuze entiteit";
$_LANG["hxflagsmytldregistrantorganisationtype24"] = "Vertegenwoordiging";
$_LANG["hxflagsmytldregistrantorganisationtype25"] = "Vereniging volgens Societies Act (ROS)";
$_LANG["hxflagsmytldregistrantorganisationtype26"] = "Sportorganisatie";
$_LANG["hxflagsmytldregistrantorganisationtype27"] = "Regionale overheidsinstantie";
$_LANG["hxflagsmytldregistrantorganisationtype28"] = "Handelsmaatschappij";
$_LANG["hxflagsmytldregistrantorganisationtype29"] = "Trustee";
$_LANG["hxflagsmytldregistrantorganisationtype30"] = "Universiteit onder ministerie van Onderwijs";
$_LANG["hxflagsmytldregistrantorganisationtype31"] = "Taxatie-/expertise-/vastgoedbedrijf";

// .NO
$_LANG["hxflagsnotldregistrantidnumberdescr"] = ("Noors btw-nummer of een persoonlijk ID (PID <a href='https://pid.norid.no/personid/lookup' target='_blank'>Persoon-ID</a>) is vereist.");

// .NU
$_LANG["hxflagsnutldregistrantlegaltype"] = "Domeinhouder, rechtsvorm";
$_LANG["hxflagsnutldregistrantlegaltypeother"] = "Overig";
$_LANG["hxflagsnutldregistrantlegaltypeorgeu"] = "EU-bedrijf buiten Zweden";
$_LANG["hxflagsnutldregistrantidnumberdescr"] = ("<b>Voor particulieren en bedrijven gevestigd in Zweden</b> moet een geldig Zweeds persoonsnummer of gelijkwaardig ondernemingsnummer worden opgegeven.<br/>" .
    "<b>Voor particulieren en bedrijven buiten Zweden</b> moet een identificatienummer worden opgegeven (bijv. persoonsnummer, handelsregisternummer of vergelijkbaar)."
);
$_LANG["hxflagsnutldvatiddescr"] = "(Alleen vereist voor bedrijven binnen de EU, maar buiten Zweden)";

// .NYC
// Options, Nexus Category
$_LANG["hxflagsnyctldnexuscategory1"] = "Natuurlijk persoon met hoofdverblijf in NYC";
$_LANG["hxflagsnyctldnexuscategory2"] = "Entiteit of bedrijf met hoofdvestiging in NYC";
$_LANG["hxflagsnyctldnexuscategorydescr"] = "(Postbussen zijn niet toegestaan, zie <a href=\"{TAC}\" target=\"_blank\">.NYC Nexus-beleid</a>.)";

// .PRO
$_LANG["hxflagsprotldprofession"] = "Beroep";
$_LANG["hxflagsprotldlicensenumber"] = "Licentienummer";
$_LANG["hxflagsprotldauthority"] = "Bevoegde instantie";
$_LANG["hxflagsprotldauthoritywebsite"] = "Website van de bevoegde instantie";

// .PT
$_LANG["hxflagspttldroid"] = "ROID";

// .RO
$_LANG["hxflagsrotldregistrantvatiddescr"] = "(vereist voor EU-landen EN voor Roemeense domeinhouders)";

// .RU
$_LANG["hxflagsrutldlegaltypeindiv"] = "Particulier";
$_LANG["hxflagsrutldlegaltypeorg"] = "Organisatie";
$_LANG["hxflagsrutldregistrantbirthday"] = "Domeinhouder, geboortedatum";
$_LANG["hxflagsrutldregistrantbirthdaydescr"] = "(vereist voor particulieren, JJJJ-MM-DD)";
$_LANG["hxflagsrutldregistrantpassportdata"] = "Domeinhouder, identiteitsgegevens";
$_LANG["hxflagsrutldregistrantpassportdatadescr"] = "(vereist voor particulieren; inclusief paspoortnummer, uitgiftedatum en -plaats)<br/><br/>";

// .SE
$_LANG["hxflagssetldidentificationnumberdescr"] = ("<div style=\"text-align:justify\"><b>Voor particulieren en bedrijven gevestigd in Zweden</b> moet een geldig Zweeds identificatie- of ondernemingsnummer worden opgegeven.<br/>" .
    "<b>Voor particulieren of bedrijven buiten Zweden</b> moet een identificatienummer worden opgegeven (bijv. burgerservicenummer, handelsregisternummer of vergelijkbaar).</div>"
);

// .SG
$_LANG["hxflagssgtldrcbsingaporeid"] = "RCB/Singapore ID";

// .SWISS
$_LANG["hxflagsswisstlduid"] = "Domeinhouder, ID";
$_LANG["hxflagsswisstlduiddescr"] = "(De ID is in de context van {TLD} volgens de actuele regels de Zwitserse UID/UPI/IDE/IDI.<br/>Formaat voor natuurlijke personen: “756.dddd.dddd.dd”, het specifieke UPI-formaat (Universeel Persoonsidentificatienummer).<br/>Formaat voor organisaties: “CHE-ddd.ddd.ddd”, het specifieke ondernemingsidentificatienummer.<br/>d = cijfer)";
$_LANG["hxflagsswisstldownertype"] = "Domeinhouder, type";
$_LANG["hxflagsswisstldownertypep"] = "Natuurlijk persoon";
$_LANG["hxflagsswisstldownertypeo"] = "Organisatie";
$_LANG["hxflagsswisstldownertypedescr"] = "(Het type houder, in de context van {TLD} volgens de geldende regels, afhankelijk van aanvraag voor natuurlijke personen of organisaties)";

// .SYDNEY
// Options, Nexus Category
$_LANG["hxflagssydneytldnexuscategorya"] = "Criterium A - Bedrijf uit New South Wales";
$_LANG["hxflagssydneytldnexuscategoryb"] = "Criterium B - Inwoner van New South Wales";
$_LANG["hxflagssydneytldnexuscategoryc"] = "Criterium C - Gelieerde onderneming";
$_LANG["hxflagssydneytldnexuscategorydescr"] = ("Om een {TLD}-domeinnaam te verlengen of te registreren, moet de aanvrager/domeinhouder voldoen aan één van de volgende criteria A, B of C:<br/><br/>" .
    "<b>Criterium A – Bedrijf uit New South Wales</b><br/>" .
    "De aanvrager moet een bedrijf zijn dat geregistreerd is bij de `Australian Securities and Investments Commission` of in het Australisch handelsregister en " .
    "een adres in New South Wales hebben dat gekoppeld is aan zijn ABN-, ACN-, RBN- of ARBN-nummer, of een geldig zakelijk adres in New South Wales.<br/>" .
    "<b>Criterium B – Inwoner van New South Wales</b><br/>De aanvrager is een Australisch staatsburger of inwoner met een geldig adres in New South Wales.<br/>" .
    "<b>Criterium C – Gelieerde onderneming</b><br/>De aanvrager moet een gelieerde onderneming zijn en mag alleen een domeinnaam aanvragen als deze overeenkomt met of afgeleid is van:<br/>" .
    "<ul><li>Bedrijfsnaam of (roep)naam/pseudoniem van de domeinhouder, waarbij de bedrijfsnaam geregistreerd moet zijn bij de bevoegde instantie,</li>" .
    "<li>een product dat door de gelieerde onderneming wordt geproduceerd of verkocht aan bedrijven/particulieren in New South Wales,</li>" .
    "<li>een dienst die wordt aangeboden aan inwoners van New South Wales,</li>" .
    "<li>een evenement in New South Wales dat door het bedrijf wordt georganiseerd of gesponsord,</li>" .
    "<li>een activiteit die het bedrijf in New South Wales faciliteert,</li><li>een cursus of opleidingsprogramma voor inwoners van New South Wales.</li></ul>"
);

// .TRAVEL
$_LANG["hxflagstraveltldtravelindustry"] = "Relatie met reisbranche";
$_LANG["hxflagstraveltldtravelindustrydescr"] = "(Wij bevestigen een relatie met de reisbranche en dat wij betrokken zijn bij of plannen hebben voor reisgerelateerde activiteiten.)";
$_LANG["hxflagstraveltldyesno1"] = "Ja";
$_LANG["hxflagstraveltldyesno0"] = "Nee";

// .US
// Options, Intended Use
$_LANG["hxflagsustldapplicationpurposep1"] = "Zakelijk gebruik met winstoogmerk";
$_LANG["hxflagsustldapplicationpurposep2"] = "Non-profitorganisatie / club / vereniging / religieuze organisatie";
$_LANG["hxflagsustldapplicationpurposep3"] = "Persoonlijk gebruik";
$_LANG["hxflagsustldapplicationpurposep4"] = "Educatieve doeleinden";
$_LANG["hxflagsustldapplicationpurposep5"] = "Overheidsdoeleinden";
// Options, Nexus Category, https://www.about.us/policies/ustld-nexus-codes
$_LANG["hxflagsustldnexuscategoryc11"] = "[C11] Natuurlijk persoon - Amerikaans staatsburger";
$_LANG["hxflagsustldnexuscategoryc12"] = "[C12] Natuurlijk persoon - Permanent ingezetene van de VS of een van de bijbehorende gebieden/territoria";
$_LANG["hxflagsustldnexuscategoryc21"] = "[C21] Een Amerikaanse organisatie of onderneming; zie details hieronder.";
$_LANG["hxflagsustldnexuscategoryc31"] = "[C31] Een buitenlandse entiteit of onderneming; zie details hieronder.";
$_LANG["hxflagsustldnexuscategoryc32"] = "[C32] Een buitenlandse onderneming met kantoor of vestiging in de Verenigde Staten";
$_LANG["hxflagsustldnexuscategorycdescr"] = ("<ul><li>[C21]: Een Amerikaanse organisatie of onderneming; opgericht in een van de 50 Amerikaanse staten, het District of Columbia of een van de Amerikaanse gebieden/territoria, of anderszins opgericht onder de wetten van de VS, het District of Columbia of een van de Amerikaanse gebieden/territoria, of een Amerikaanse federale, staats-, lokale overheid of een daarvan afgeleide entiteit.</li>" .
    "<li>[C31]: Een buitenlandse entiteit of onderneming met daadwerkelijke aanwezigheid in de VS of een van de bijbehorende gebieden/territoria, die zich regelmatig bezighoudt met wettelijke zaken, goederenverkoop, dienstverlening of andere commerciële of non-profitactiviteiten, inclusief non-profitrelaties met de Verenigde Staten.</li></ul>"
);
$_LANG["hxflagsustldnexuscountrydescr"] = "<div>Geef de oorspronkelijke nationaliteit van de registrant op (ALLEEN vereist voor de laatste twee opties van de Nexus-categorie (C31 of C32)).</div>";

// .XXX
$_LANG["hxflagsxxxtldnonresolvingdomain"] = "NIET-resolverend domein";
$_LANG["hxflagsxxxtldmembershipid"] = ".XXX lidmaatschapsnummer";
$_LANG["hxflagsxxxtldmembershipiddescr"] = "(Vereist om uw .XXX domein te laten resolven)";
// Options, Non-Resolving Domain
$_LANG["hxflagsxxxtldnonresolvingdomain0"] = "Nee - deze domeinnaam MOET resolven.";
$_LANG["hxflagsxxxtldnonresolvingdomain1"] = "Ja - deze domeinnaam MOET NIET resolven";

// ----------------------------------------------------------------------
// ----------------------- WHOIS PRIVACY --------------------------------
// ----------------------------------------------------------------------
$_LANG["hxwhoisprivacy"] = "WHOIS privacybescherming";
$_LANG["hxwhoisprivacyrequestsuccess"] = "Wijzigingen voor WHOIS privacydienst zijn doorgevoerd.";
$_LANG["hxwhoisprivacywhy"] = "Waarom is WHOIS privacybescherming belangrijk?";
$_LANG["hxwhoisprivacyreason"] = ("Bij domeinregistratie moeten persoonsgegevens worden opgegeven, die permanent worden beheerd door externe WHOIS-servers. " .
    "Dit betekent dat uw naam, adres/telefoonnummer/e-mailadres zonder beperking wordt opgeslagen en beschikbaar is. Sommige registries bieden een eigen " .
    "gratis WHOIS privacydienst aan, waarmee WHOIS-informatie voor derden wordt afgeschermd."
);
$_LANG["hxwhoisprivacystatus"] = "WHOIS privacybescherming, status";
$_LANG["hxwhoisprivacystatus1"] = "Uw WHOIS-gegevens zijn momenteel beschermd";
$_LANG["hxwhoisprivacystatus0"] = "Uw WHOIS-gegevens zijn momenteel niet beschermd";
$_LANG["hxwhoisprivacystatusnp"] = "De WHOIS privacydienst is ALLEEN beschikbaar voor particulieren";
$_LANG["hxwhoisprivacybttnenable"] = "Inschakelen";
$_LANG["hxwhoisprivacybttndisable"] = "Uitschakelen";

// ----------------------------------------------------------------------
// ----------------------- Private Nameservers List ---------------------
// ----------------------------------------------------------------------
$_LANG["hxpnslist"] = "Overzicht private nameservers";
$_LANG["hxpnscolpns"] = "Private nameserver";
$_LANG["hxpnscolip"] = "IP-adres";
$_LANG["hxpnsempty"] = "Geen private nameservers geregistreerd onder dit domein.";

// ----------------------------------------------------------------------
// ----------------------- Web Apps -------------------------------------
// ----------------------------------------------------------------------
$_LANG["hxwebapps"] = "Web-apps";

// ----------------------------------------------------------------------
// ------------------ Contact Information -------------------------------
// ----------------------------------------------------------------------
$_LANG["hxdomaincontactstradeinfo"] = ("Wijzigingen aan de registrantgegevens kunnen leiden tot een zogeheten trade-proces " .
    "dat in sommige gevallen niet direct wordt afgerond. Heb geduld als wijzigingen niet direct zichtbaar zijn."
);
// ----------------------------------------------------------------------
// ------------------ .CA Contact Confirmation --------------------------
// ----------------------------------------------------------------------
$_LANG["hxcacontactconfirmation"] = ".CA contactbevestiging";
$_LANG["hxcacontactconfirmationdescr"] = "Bezoek <a href=\"https://www.cira.ca/registrant-agreement\" target=\"_blank\">https://cira.ca</a> en gebruik de onderstaande ID om de CIRA-registratieovereenkomst te bevestigen. Wordt dezelfde (al bevestigde) registrantcontact gebruikt voor een extra .CA-domein, dan wordt de registratie direct verwerkt.";

// ----------------------------------------------------------------------
// ------------------ DNSSEC --------------------------------------------
// ----------------------------------------------------------------------

// Statusmeldingen
$_LANG["dnssecautomaticupdatesuccessmsg"] = "DNSSEC is voor uw domein <span style=\"color:green;font-weight:bold;\">geactiveerd</span>.<br> De DNSSEC-records zijn geïmporteerd uit uw DNS-zone en bij uw domeinregistrar bijgewerkt.<br><br><span style=\"color:#007bff;\">Voor uw veiligheid helpt DNSSEC uw domein te beschermen tegen bepaalde soorten aanvallen door DNS-antwoorden te valideren.</span>";
$_LANG["dnssecautoenable"] = "DNSSEC inschakelen en DNSSEC-records automatisch uit de DNS-zone importeren";
$_LANG["dnssecsyncrecords"] = "DNSSEC-records synchroniseren vanuit de DNS-zone";

// Beheer van records
$_LANG["dnssecaddnewdskey"] = "Nieuwe DS-sleutel toevoegen";
$_LANG["dnssecaddnewkeyrecord"] = "Nieuw sleutelrecord toevoegen";

// Modal-Dialog
$_LANG["dnssecconfirmdisable"] = "Weet u zeker dat u DNSSEC voor dit domein wilt uitschakelen? Deze actie kan de domeinresolutie beïnvloeden.";
$_LANG["dnssecmodaltitle"] = "DNSSEC uitschakelen";
$_LANG["dnssecmodalcancel"] = "Annuleren";
$_LANG["dnssecmodaldisable"] = "DNSSEC uitschakelen";
