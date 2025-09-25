<?php

// #########################################################################
// #########################################################################
// # Add translations for CNR registrar module additional domain fields    #
// #########################################################################
// #########################################################################

// ----------------------------------------------------------------------
// ------------------ .DK Checkout Page ---------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrdkcheckoutheading"] = "Allgemeine Geschäftsbedingungen für .dk Domainnamen";
$_LANG["cnrdkcheckoutintro"] = "Um einen .dk Domainnamen zu registrieren, müssen Sie einen Vertrag mit Punktum.dk A/S abschließen. Punktum dk ist der Administrator für alle .dk Domainnamen.";
$_LANG["cnrdkcheckoutdomains"] = "Domainnamen:";
$_LANG["cnrdkcheckoutregistrant"] = "Inhaber:";
$_LANG["cnrdkcheckoutregistrantaddress"] = "Siehe oben";
$_LANG["cnrdkcheckoutadmin"] = "Domain-Administrator:";
$_LANG["cnrdkcheckoutadminaddress"] = "Punktum dk A/S<br/>Ørestads Boulevard 108, 11. Stock<br/>DK-2300 Kopenhagen S";
$_LANG["cnrdkcheckouttac"] = implode("<br/><br/>", [
    "Ich erkläre mich hiermit einverstanden, einen Vertrag über das Recht zur Nutzung des angegebenen .dk Domainnamens gemäß den geltenden Bedingungen abzuschließen. Unter anderem bedeutet dies, dass ich sicherstelle, dass meine Kontaktdaten als Inhaber jederzeit korrekt sind. Ich werde die Identitätsprüfung von Punktum dk A/S durchführen, wenn ich dazu aufgefordert werde.",
    "Mein Recht zur Nutzung des angegebenen .dk Domainnamens kann gemäß den Bedingungen in den Nutzungsbedingungen von Punktum dk A/S übertragen, ausgesetzt, gelöscht oder gesperrt werden.",
    "Gemäß Abschnitt 18 (2) (13) des dänischen Verbrauchervertragsgesetzes verzichte ich auf das Recht, vom Vertrag über das Nutzungsrecht des angegebenen .dk Domainnamens zurückzutreten.",
    "Ich gebe meine Zustimmung, dass Punktum dk A/S, als Domain-Administrator, meine persönlichen Daten gemäß seiner Datenschutzrichtlinie verwendet.",
    "Ich stimme zu, dass ich diesem Anbieter die Gebühr für den ersten Registrierungszeitraum des angegebenen .dk Domainnamens bezahle und dass die Zahlung für nachfolgende Registrierungszeiträume von meiner Wahl der Verwaltungsregelung abhängt, gemäß Abschnitt 2.1 der Allgemeinen Geschäftsbedingungen von Punktum dk A/S."
]);
$_LANG["cnrdkcheckouttacurl"] = "https://www.punktum.dk/en/articles/terms-and-conditions-for-the-right-of-use-to-a-dk-domain-name";
$_LANG["cnrdkcheckouttacurltext"] = "Allgemeine Geschäftsbedingungen für das Nutzungsrecht eines .dk Domainnamens";
$_LANG["cnrdkcheckoutpolicyurl"] = "https://www.punktum.dk/en/articles/privacy-policy";
$_LANG["cnrdkcheckoutpolicyurltext"] = "Datenschutzrichtlinie";
$_LANG["cnrdkcheckoutabouturl"] = "https://www.punktum.dk/en/about-us";
$_LANG["cnrdkcheckoutabouturltext"] = "Über Punktum dk A/S";
$_LANG["cnrdkcheckouttacagree"] = "Ja, ich akzeptiere die Benutzervereinbarung mit Punktum dk A/S.";

// ----------------------------------------------------------------------
// ------------------ Common CNR Translations ---------------------------
// ----------------------------------------------------------------------
$_LANG["cnrchoose"] = "Bitte wählen";
$_LANG["cnroptional"] = "optional";
$_LANG["cnr1"] = "Ja";
$_LANG["cnr0"] = "Nein";
$_LANG["cnrconsentforpublishing"] = "Registrant, Zustimmung zur Veröffentlichung";
// .abogado, .aero, .attorney, .bank, .broker, .dentist, .forex, .insurance, .lotto, .law, .lawyer, .markets, .trading
$_LANG["cnrxallocationtoken"] = "Bestellschlüssel der Registrierungsstelle";
$_LANG["cnrxallocationtokendescr"] = "Nur erforderlich für Premium-Domains. Ausgestellt durch den TLD-Provider. Lassen Sie uns wissen, wenn Sie Hilfe benötigen.";
// .app, .page, .dev, .new, .day, .channel, .boo, .foo, .zip, .mov, .nexus, .dad, .phd, .prof, .esq, .rsvp, .meme, .ing, .new
$_LANG["cnrxacceptsslrequirement"] = "SSL Anforderungen";
$_LANG["cnrxacceptsslrequirementdescr"] = "Ich bestätige, dass ich die Anforderungen für HTTPS / ein SSL-Zertifikat verstehe und akzeptiere. Diese TLD ist eine sicherere Domain, was bedeutet, dass HTTPS für alle Websites erforderlich ist. Sie können Ihren Domainnamen jetzt kaufen, aber damit er in Browsern ordnungsgemäß funktioniert, müssen Sie HTTPS basierend auf einem SSL-Zertifikat konfigurieren.";
$_LANG["cnrxacceptsslrequirement0"] = $_LANG["cnr0"];
$_LANG["cnrxacceptsslrequirement1"] = $_LANG["cnr1"];
// .attorney, .dentist, .lawyer
$_LANG["cnrxunitedtldregulatorydata"] = "Regulierungsbehörde Informationen";
$_LANG["cnrxunitedtldregulatorydatadescr"] = "Informationen über die genehmigende Behörde/kontrollierende Behörde/Regulierungsbehörde";
// .barcelona, .cat, .madrid, .scot, .sport, .swiss
$_LANG["cnrxintendeduse"] = "Beabsichtigte Nutzung";
$_LANG["cnrxintendedusedescr"] = implode("<br/>", [
    "Erklärung zur beabsichtigten Nutzung des Domainnamens. Falls zutreffend, bitte einen expliziten Verweis auf das beanspruchte Recht des Antragstellers auf den Namen angeben (falls nicht der Firmenname des Antragstellers).",
    "Zum Beispiel, wenn der Domainname einer Marke entspricht, muss die Markenregistrierungsnummer angegeben werden (max. 256 Zeichen)."
]);
// .mk
$_LANG["cnrxcompanyvatid"] = "Registrant, USt-IdNr.";
// $_LANG["cnrxcompanyvatiddescr"] = "";
// .nu, .se
$_LANG["cnrxrequestauthcode"] = "Neuen EPP-Code anfordern";
$_LANG["cnrxrequestauthcode0"] = $_LANG["cnr0"];
$_LANG["cnrxrequestauthcode1"] = $_LANG["cnr1"];
$_LANG["cnrxrequestauthcodedescr"] = "Wenn Sie die Domain zu einem anderen Registrar transferieren möchten, benötigen Sie den Auth-Code. Wir senden ihn an die E-Mail-Adresse des Domaininhabers.";

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
$_LANG["cnrxaeroensauthid"] = "Mitglieds-ID";
$_LANG["cnrxaeroensauthiddescr"] = "Die .AERO Mitglieds-ID wird benötigt, um eine Domain in der Luftfahrt zu registrieren. Sie können sie <a style=\"text-decoration:underline\" href=\"https://information.aero/node/add/request-aero-id\" target=\"_blank\">hier</a> beantragen.";
$_LANG["cnrxaeroensauthkey"] = "Mitglieds-Passwort";
$_LANG["cnrxaeroensauthkeydescr"] = "Das jeweilige Passwort/Authcode, das von der oben genannten Website gleichzeitig mit der .AERO Mitglieds-ID bereitgestellt wird.";

// ----------------------------------------------------------------------
// ------------------ .AU Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxaudomainrelation"] = "Beziehung";
$_LANG["cnrxaudomainrelation1"] = "Die Second-Level-Domain ist eine exakte Übereinstimmung, ein Akronym oder eine Abkürzung des Unternehmens- oder Handelsnamens, des Organisations- oder Vereinsnamens oder der Marke.";
$_LANG["cnrxaudomainrelation2"] = "Die Second-Level-Domain steht in enger und wesentlicher Verbindung zur Organisation oder den von der Organisation durchgeführten Aktivitäten.";
$_LANG["cnrxaudomainrelationdescr"] = "Dies gibt die Beziehung zwischen dem Berechtigungstyp (z.B. Geschäftsname) und dem Domainnamen an.";
$_LANG["cnrxaudomainrelationtype"] = "Beziehungstyp";
$_LANG["cnrxaudomainrelationtypecompany"] = "Unternehmen";
$_LANG["cnrxaudomainrelationtyperegisteredbusiness"] = "Eingetragenes Unternehmen";
$_LANG["cnrxaudomainrelationtypesoletrader"] = "Einzelunternehmer";
$_LANG["cnrxaudomainrelationtypepartnership"] = "Partnerschaft";
$_LANG["cnrxaudomainrelationtypetrademarkowner"] = "Markeninhaber";
$_LANG["cnrxaudomainrelationtypependingtmowner"] = "Markenanmeldung";
$_LANG["cnrxaudomainrelationtypecitizenresident"] = "Bürger / Einwohner"; // .id.au only
$_LANG["cnrxaudomainrelationtypeincorporatedassociation"] = "Eingetragener Verein";
$_LANG["cnrxaudomainrelationtypeclub"] = "Club";
$_LANG["cnrxaudomainrelationtypenonprofitorganisation"] = "Gemeinnützige Organisation";
$_LANG["cnrxaudomainrelationtypecharity"] = "Wohltätigkeitsorganisation";
$_LANG["cnrxaudomainrelationtypetradeunion"] = "Gewerkschaft";
$_LANG["cnrxaudomainrelationtypeindustrybody"] = "Branchenverband";
$_LANG["cnrxaudomainrelationtypecommercialstatutorybody"] = "Kommerzielle Körperschaft des öffentlichen Rechts";
$_LANG["cnrxaudomainrelationtypepoliticalparty"] = "Politische Partei";
$_LANG["cnrxaudomainrelationtypeother"] = "Andere";
$_LANG["cnrxaudomainrelationtypereligiouschurchgroup"] = "Religiöse / Kirchliche Gruppe";
$_LANG["cnrxaudomainrelationtypehighereducationinstitution"] = "Hochschule";
$_LANG["cnrxaudomainrelationtyperesearchorganisation"] = "Forschungseinrichtung";
$_LANG["cnrxaudomainrelationtypegovernmentschool"] = "Staatliche Schule";
$_LANG["cnrxaudomainrelationtypechildcarecentre"] = "Kindertagesstätte";
$_LANG["cnrxaudomainrelationtypepreschool"] = "Vorschule";
$_LANG["cnrxaudomainrelationtypenationalbody"] = "Nationale Organisation";
$_LANG["cnrxaudomainrelationtypetrainingorganisation"] = "Bildungseinrichtung";
$_LANG["cnrxaudomainrelationtypenongovernmentschool"] = "Nicht-staatliche Schule";
$_LANG["cnrxaudomainrelationtypeunincorporatedassociation"] = "Nicht eingetragener Verein";
$_LANG["cnrxaudomainrelationtypeindustryorganisation"] = "Branchenorganisation";
$_LANG["cnrxaudomainrelationtyperegistrablebody"] = "Registrierbare Körperschaft";
$_LANG["cnrxaudomainrelationtypeindigenouscorporation"] = "Indigene Körperschaft";
$_LANG["cnrxaudomainrelationtyperegisteredorganisation"] = "Eingetragene Organisation";
$_LANG["cnrxaudomainrelationtypetrust"] = "Treuhand";
$_LANG["cnrxaudomainrelationtypeeducationalinstitution"] = "Bildungseinrichtung";
$_LANG["cnrxaudomainrelationtypecommonwealthentity"] = "Commonwealth-Entität";
$_LANG["cnrxaudomainrelationtypestatutorybody"] = "Körperschaft des öffentlichen Rechts";
$_LANG["cnrxaudomainrelationtypetradingcooperative"] = "Handelsgenossenschaft";
$_LANG["cnrxaudomainrelationtypecompanylimitedbyguarantee"] = "Gesellschaft mit beschränkter Haftung";
$_LANG["cnrxaudomainrelationtypenondistributingcooperative"] = "Nicht-verteilende Genossenschaft";
$_LANG["cnrxaudomainrelationtypenontradingcooperative"] = "Nicht-handelsgenossenschaft";
$_LANG["cnrxaudomainrelationtypecharitabletrust"] = "Wohltätigkeitstreuhand";
$_LANG["cnrxaudomainrelationtypepublicprivateancillaryfund"] = "Öffentlicher / Privater Hilfsfonds";
$_LANG["cnrxaudomainrelationtypepeakstateterritorybody"] = "Spitzenverband des Staates / Territoriums";
$_LANG["cnrxaudomainrelationtypenotforprofitcommunitygroup"] = "Gemeinnützige Gemeinschaftsgruppe";
$_LANG["cnrxaudomainrelationtypeeducationandcareserviceschildcare"] = "Bildungs- und Betreuungsdienste (Kinderbetreuung)";
$_LANG["cnrxaudomainrelationtypegovernmentbody"] = "Regierungsbehörde";
$_LANG["cnrxaudomainrelationtypeproviderofnonaccreditedtraining"] = "Anbieter von nicht akkreditierten Schulungen";
$_LANG["cnrxaudomainrelationtypedescr"] = "Geben Sie an, was den Registranten berechtigt, den Domainnamen zu registrieren";
$_LANG["cnrxauownerorganization"] = "Registrant, Organisation";
$_LANG["cnrxauownerorganizationdescr"] = "Der Name der Organisation (Registrant)";
$_LANG["cnrxauidwarranty"] = "Registrant,<br>ist AU-Bürger oder Einwohner";
$_LANG["cnrxauidwarranty0"] = $_LANG["cnr0"];
$_LANG["cnrxauidwarranty1"] = $_LANG["cnr1"];
$_LANG["cnrxauidwarrantydescr"] = "Der Registrant einer .id.au-Domain muss garantieren, dass er ein australischer Einwohner oder Bürger ist";
$_LANG["cnrxaueligibilityname"] = "Berechtigungsname";
$_LANG["cnrxaueligibilitynamedescr"] = "Der Name des Berechtigungstyps (z.B. Geschäftsname)";
$_LANG["cnrxaudomainidnumber"] = "Registrant, Identifikationsnummer";
$_LANG["cnrxaudomainidnumberdescr"] = "";
$_LANG["cnrxaudomainidtype"] = "Registrant, Identifikationstyp";
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
$_LANG["cnrxaueligibilityidnumber"] = "Berechtigung, Identifikationsnummer";
$_LANG["cnrxaueligibilityidnumberdescr"] = "";
$_LANG["cnrxaueligibilityidtype"] = "Berechtigung, Identifikationstyp";
$_LANG["cnrxaueligibilityidtypedescr"] = "";

// ----------------------------------------------------------------------
// ------------------ .CA Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxcalegaltype"] = "Registrant, Rechtstyp";
$_LANG["cnrxcalegaltypeabo"] = "Ureinwohner Kanadas";
$_LANG["cnrxcalegaltypeass"] = "Kanadische nicht eingetragene Vereinigung";
$_LANG["cnrxcalegaltypecco"] = "Körperschaft (Kanada oder kanadische Provinz oder Territorium)";
$_LANG["cnrxcalegaltypecct"] = "Kanadischer Staatsbürger";
$_LANG["cnrxcalegaltypeedu"] = "Kanadische Bildungseinrichtung";
$_LANG["cnrxcalegaltypegov"] = "Regierung oder Regierungsbehörde in Kanada";
$_LANG["cnrxcalegaltypehop"] = "Kanadisches Krankenhaus";
$_LANG["cnrxcalegaltypeinb"] = "Indianischer Stamm anerkannt durch den Indian Act von Kanada";
$_LANG["cnrxcalegaltypelam"] = "Kanadische Bibliothek, Archiv oder Museum";
$_LANG["cnrxcalegaltypelgr"] = "Rechtlicher Vertreter eines kanadischen Staatsbürgers oder ständigen Bewohners";
$_LANG["cnrxcalegaltypemaj"] = "Ihre Majestät die Königin";
$_LANG["cnrxcalegaltypeomk"] = "Offizielles Markenzeichen in Kanada registriert";
$_LANG["cnrxcalegaltypeplt"] = "Kanadische politische Partei";
$_LANG["cnrxcalegaltypeprt"] = "In Kanada eingetragene Partnerschaft";
$_LANG["cnrxcalegaltyperes"] = "Ständiger Bewohner Kanadas";
$_LANG["cnrxcalegaltypetdm"] = "In Kanada registrierte Marke (durch einen nicht-kanadischen Inhaber)";
$_LANG["cnrxcalegaltypetrd"] = "Kanadische Gewerkschaft";
$_LANG["cnrxcalegaltypetrs"] = "In Kanada gegründetes Treuhandvermögen";
// $_LANG["cnrxcalegaltypedescr"] = "";
$_LANG["cnrxcatrademark"] = "Ist eine eingetragene Marke";
$_LANG["cnrxcatrademark0"] = $_LANG["cnr0"];
$_LANG["cnrxcatrademark1"] = $_LANG["cnr1"];
$_LANG["cnrxcatrademarkdescr"] = "Gibt an, ob die Domain eine eingetragene Marke ist oder nicht.";

// ----------------------------------------------------------------------
// ------------------ .COM.BR Fields ------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxbrregisternumber"] = "Registrant, Brasil. Identifikationsnummer";
$_LANG["cnrxbrregisternumberdescr"] = "Die brasilianische Unternehmensregisternummer (CNPJ) oder die brasilianische individuelle Registernummer (CPF).";

// ----------------------------------------------------------------------
// ------------------ .CN Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxcnownertype"] = "Registrant, Typ";
$_LANG["cnrxcnownertypei"] = "Privatperson";
$_LANG["cnrxcnownertypee"] = "Unternehmen";
$_LANG["cnrxcnownertypedescr"] = "";
$_LANG["cnrxcnowneridtype"] = "Registrant, ID Typ";
$_LANG["cnrxcnowneridtypesfz"] = "SFZ (Personalausweis) - Registrant Typ ist Privatperson";
$_LANG["cnrxcnowneridtypehz"] = "HZ (Reisepass) - Registrant Typ ist Privatperson";
$_LANG["cnrxcnowneridtypegajmtx"] = "GAJMTX (Ausreise-Einreise-Erlaubnis für Reisen nach Hongkong und Macao) - Registrant Typ ist Privatperson";
$_LANG["cnrxcnowneridtypetwjmtx"] = "TWJMTX (Reisepässe für Taiwan-Bewohner zur Ein- und Ausreise) - Registrant Typ ist Privatperson";
$_LANG["cnrxcnowneridtypewjlsfz"] = "WJLSFZ (Ausländischer Daueraufenthaltsausweis) - Registrant Typ ist Privatperson";
$_LANG["cnrxcnowneridtypegajzz"] = "GAJZZ (Aufenthaltserlaubnis für Hongkong und Macao Bewohner) - Registrant Typ ist Privatperson";
$_LANG["cnrxcnowneridtypetwjzz"] = "TWJZZ (Aufenthaltserlaubnis für Taiwan Bewohner) - Registrant Typ ist Privatperson";
$_LANG["cnrxcnowneridtypejgz"] = "JGZ (Offiziersausweis) - Registrant Typ ist Privatperson";
$_LANG["cnrxcnowneridtypeqt"] = "QT (Andere) - Registrant Typ ist Privatperson oder Unternehmen";
$_LANG["cnrxcnowneridtypeorg"] = "ORG (Organisationscode-Zertifikat) - Registrant Typ ist Unternehmen";
$_LANG["cnrxcnowneridtypeyyzz"] = "YYZZ (Gewerbeerlaubnis) - Registrant Typ ist Unternehmen";
$_LANG["cnrxcnowneridtypetydm"] = "TYDM (Zertifikat für einheitlichen Sozialkreditcode) - Registrant Typ ist Unternehmen";
$_LANG["cnrxcnowneridtypebddm"] = "BDDM (Militärischer Code-Bezeichnung) - Registrant Typ ist Unternehmen";
$_LANG["cnrxcnowneridtypejddwfw"] = "JDDWFW (Militärisch bezahlte externe Dienstleistungslizenz) - Registrant Typ ist Unternehmen";
$_LANG["cnrxcnowneridtypesydwfr"] = "SYDWFR (Zertifikat einer juristischen Person einer öffentlichen Einrichtung) - Registrant Typ ist Unternehmen";
$_LANG["cnrxcnowneridtypewgczjg"] = "WGCZJG (Registrierungsformular für ansässige Vertretungen ausländischer Unternehmen) - Registrant Typ ist Unternehmen";
$_LANG["cnrxcnowneridtypeshttfr"] = "SHTTFR (Registrierungszertifikat einer sozialen Organisation) - Registrant Typ ist Unternehmen";
$_LANG["cnrxcnowneridtypezjcs"] = "ZJCS (Registrierungszertifikat einer religiösen Aktivitätsstätte) - Registrant Typ ist Unternehmen";
$_LANG["cnrxcnowneridtypembfqy"] = "MBFQY (Registrierungszertifikat einer privaten Nichtunternehmenseinheit) - Registrant Typ ist Unternehmen";
$_LANG["cnrxcnowneridtypejjhfr"] = "JJHFR (Registrierungszertifikat einer Stiftung) - Registrant Typ ist Unternehmen";
$_LANG["cnrxcnowneridtypelszy"] = "LSZY (Lizenz einer Anwaltskanzlei) - Registrant Typ ist Unternehmen";
$_LANG["cnrxcnowneridtypewgzhwh"] = "WGZHWH (Registrierungszertifikat eines ausländischen Kulturzentrums in China) - Registrant Typ ist Unternehmen";
$_LANG["cnrxcnowneridtypewlczzg"] = "WLCZJG (Registrierungszertifikat für ansässige Vertretungen der Tourismusabteilungen einer ausländischen Regierung) - Registrant Typ ist Unternehmen";
$_LANG["cnrxcnowneridtypesfjd"] = "SFJD (Zertifikat einer juristischen Ausbildung) - Registrant Typ ist Unternehmen";
$_LANG["cnrxcnowneridtypejwjg"] = "JWJG (Zertifikat eines Unternehmens im Ausland) - Registrant Typ ist Unternehmen";
$_LANG["cnrxcnowneridtypeshfwjg"] = "SHFWJG (Registrierungszertifikat einer Sozialdienstagentur) - Registrant Typ ist Unternehmen";
$_LANG["cnrxcnowneridtypembxxbx"] = "MBXXBX (Erlaubnis einer Privatschule) - Registrant Typ ist Unternehmen";
$_LANG["cnrxcnowneridtypeyljgzy"] = "YLJGZY (Lizenz einer medizinischen Einrichtung) - Registrant Typ ist Unternehmen";
$_LANG["cnrxcnowneridtypegzjgzy"] = "GZJGZY (Lizenz eines notariellen Unternehmens) - Registrant Typ ist Unternehmen";
$_LANG["cnrxcnowneridtypebjwsxx"] = "BJWSXX (Erlaubnis der Schule für Kinder ausländischer Botschaftsmitarbeiter in Beijing/China) - Registrant Typ ist Unternehmen";
$_LANG["cnrxcnowneridtypeqttyzm"] = "QTTYDM (Andere-Zertifikat für einheitlichen Sozialkreditcode) - Registrant Typ ist Unternehmen";
$_LANG["cnrxcnowneridtypedescr"] = "Identifikationstyp des Ausweises";
$_LANG["cnrxcnowneridnumber"] = "Registrant, ID Nummer";
$_LANG["cnrxcnowneridnumberdescr"] = "";

// ----------------------------------------------------------------------
// ------------------ .COOP Fields --------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxcoopeligibility"] = "Berechtigungsvoraussetzungen";
$_LANG["cnrxcoopeligibilitydescr"] = "Akzeptieren Sie, dass meine Organisation mindestens eine der .COOP-Berechtigungsvoraussetzungen erfüllt. Lesen Sie <a style=\"text-decoration:underline\" href=\"https://identity.coop/coop-policies-and-agreements/\" target=\"_blank\">hier</a>.";
$_LANG["cnrxcoopeligibility0"] = $_LANG["cnr0"];
$_LANG["cnrxcoopeligibility1"] = $_LANG["cnr1"];

// ----------------------------------------------------------------------
// ------------------ .DE Fields ----------------------------------------
// ----------------------------------------------------------------------
//$_LANG["cnrxdensentry0"] = "";
$_LANG["cnrxdensentry0descr"] = implode(" ", [
    "Ermöglicht die Verwendung von nsentrys anstelle von Nameservern für .de-Domains;",
    "NS-Einträge ermöglichen die Konfiguration von Subdomains mit alternativen Nameservern.",
    "<a target=\"_blank\" href=\"https://www.denic.de/en/domains/de-domains/registration/nameserver-and-nsentry-data/\" style=\"text-decoration:underline\">Detaillierte Informationen</a>."
]);
//$_LANG["cnrxdensentry1"] = "";
$_LANG["cnrxdensentry1descr"] = "siehe oben";
//$_LANG["cnrxdensentry2"] = "";
$_LANG["cnrxdensentry2descr"] = "siehe oben";
//$_LANG["cnrxdensentry3"] = "";
$_LANG["cnrxdensentry3descr"] = "siehe oben";
//$_LANG["cnrxdensentry4"] = "";
$_LANG["cnrxdensentry4descr"] = "siehe oben";
//$_LANG["cnrxdegeneralrequest"] = "";
//$_LANG["cnrxdegeneralrequestdescr"] = "";
//$_LANG["cnrxdeabusecontact"] = "";
//$_LANG["cnrxdeabusecontactdescr "] = "";

// ----------------------------------------------------------------------
// ------------------ .DK Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxdkusertype"] = "Registrant, Typ";
$_LANG["cnrxdkusertypeperson"] = "Person";
$_LANG["cnrxdkusertypecompany"] = "Unternehmen";
$_LANG["cnrxdkusertypeassociation"] = "Verein";
$_LANG["cnrxdkusertypepuborg"] = "Öffentliche Organisation";
// $_LANG["cnrxdkusertypedescr"] = "";
$_LANG["cnrxdkuseridnumber"] = "Registrant, ID Nummer";
$_LANG["cnrxdkuseridnumberdescr"] = implode("", [
    "Identifikationsnummer des Registrantenkontakts. Dies kann <i>EAN, CVR oder P Nummer</i> sein. ",
    "Die <i>CVR Nummer</i> wird zur Identifizierung der Organisation verwendet, und die <i>EAN Nummer</i> stellt sicher, ",
    "dass Dokumente im Zusammenhang mit der elektronischen Rechnungsstellung an das richtige Konto gesendet werden. ",
    "Die <i>P Nummer</i> ist eine Filialkennzeichnung, die vom dänischen Zentralen Unternehmensregister zugewiesen wird, um ",
    "physische Standorte mit einer Organisation zu verknüpfen."
]);

// ----------------------------------------------------------------------
// ------------------ .ES Fields ----------------------------------------
// ----------------------------------------------------------------------
$types = [
    1 => "Privatperson",
    39 => "Wirtschaftliche Interessenvereinigung",
    47 => "Verband",
    59 => "Sportverein",
    68 => "Berufsverband",
    124 => "Sparkasse",
    150 => "Gemeinschaftsgut",
    152 => "Eigentümergemeinschaft",
    164 => "Orden oder religiöse Einrichtung",
    181 => "Konsulat",
    197 => "Verband des öffentlichen Rechts",
    203 => "Botschaft",
    229 => "Kommunalverwaltung",
    269 => "Sportbund",
    286 => "Stiftung",
    365 => "Gegenseitigkeitsversicherungsgesellschaft",
    434 => "Landesregierungsbehörde",
    436 => "Zentrale Regierungsbehörde",
    439 => "Politische Partei",
    476 => "Gewerkschaft",
    510 => "Landwirtschaftliche Partnerschaft",
    524 => "Aktiengesellschaft",
    525 => "Sportverein",
    554 => "Zivilgesellschaft",
    560 => "Allgemeine Partnerschaft",
    562 => "Allgemeine und beschränkte Partnerschaft",
    566 => "Genossenschaft",
    608 => "Mitarbeitergeführtes Unternehmen",
    612 => "Gesellschaft mit beschränkter Haftung",
    713 => "Spanisches Amt",
    717 => "Vorübergehende Unternehmenskooperation",
    744 => "Mitarbeitergeführte Aktiengesellschaft",
    745 => "Regionale öffentliche Einrichtung",
    746 => "Nationale öffentliche Einrichtung",
    747 => "Lokale öffentliche Einrichtung",
    877 => "Sonstige",
    878 => "Aufsichtsrat der Ursprungsbezeichnung",
    879 => "Einheit zur Verwaltung natürlicher Gebiete"
];
$idtypes = [
    0 => "Andere (für Kontakte außerhalb Spaniens)",
    1 => "DNI/NIF (für spanische Kontakte)",
    2 => "Veraltet, bitte nächste Option verwenden.",
    3 => "NIE (für spanische Kontakte)"
];
$idtypesdescr = implode("<br/>", [
    "DNI = &quot;Documento Nacional de Identidad&quot;",
    "NIF = &quot;Número de Identificación Fiscal&quot;",
    "NIE = &quot;Número de Identificación de Extranjero&quot;. Es ist das Äquivalent einer spanischen NIF, wird aber von spanischen Behörden an Ausländer ausgestellt, die länger als 3 Monate in Spanien bleiben."
]);
$idnodescr = "Die Identifikationsnummer dieses Kontakts. Für spanische Kontakte ist dies die DNI/NIF/NIE-Nummer - andernfalls die Ausweis- oder Passnummer.";

$_LANG["cnrxesownertipoidentificacion"] = "Inhaber, Identifikationstyp";
$_LANG["cnrxesadmintipoidentificacion"] = "Admin, Identifikationstyp";
$_LANG["cnrxestechtipoidentificacion"] = "Tech, Identifikationstyp";
$_LANG["cnrxesbillingtipoidentificacion"] = "Abrechnung, Identifikationstyp";

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

$_LANG["cnrxesowneridentificacion"] = "Inhaber, Identifikationsnummer";
$_LANG["cnrxesadminidentificacion"] = "Admin, Identifikationsnummer";
$_LANG["cnrxestechidentificacion"] = "Tech, Identifikationsnummer";
$_LANG["cnrxesbillingidentificacion"] = "Abrechnung, Identifikationsnummer";

$_LANG["cnrxesowneridentificaciondescr"] = $idnodescr;
$_LANG["cnrxesadminidentificaciondescr"] = $idnodescr;
$_LANG["cnrxestechidentificaciondescr"] = $idnodescr;
$_LANG["cnrxesbillingidentificaciondescr"] = $idnodescr;

$_LANG["cnrxesownerlegalform"] = "Inhaber, Rechtsform";
$_LANG["cnrxesadminlegalform"] = "Admin, Rechtsform";
$_LANG["cnrxestechlegalform"] = "Tech, Rechtsform";
$_LANG["cnrxesbillinglegalform"] = "Billing, Rechtsform";

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
$_LANG["cnrxeuregistrantlang"] = "Registrant, Sprache";
$_LANG["cnrxeuregistrantcitizenship"] = "Registrant, Staatsbürgerschaft";
$_LANG["cnrxeuregistrantlangdescr"] = "Sprache für die Kommunikation mit dem TLD-Anbieter (Standard = Englisch)";
$_LANG["cnrxeuregistrantcitizenshipdescr"] = "Privatpersonen mit europäischer Staatsbürgerschaft, die nicht in der EU leben, können .eu-Domains mit dieser Einstellung registrieren.";

// ----------------------------------------------------------------------
// ------------------ .FI Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxficompanyregid"] = "Registrant, Unternehmens-ID oder Registrierungsnummer";
$_LANG["cnrxficompanyregiddescr"] = "Lokale Geschäftseinheit (registriert im finnischen Handelsregister oder eine Körperschaft innerhalb der finnischen Republik)<br/>(erforderlich für nicht-finnische Einheiten)";
$_LANG["cnrxfipersonalid"] = "Registrant, persönliche Identifikationsnummer";
$_LANG["cnrxfipersonaliddescr"] = "Finnische persönliche Identifikationsnummer<br/>(erforderlich für nicht-finnische Privatpersonen)";
$_LANG["cnrxfibirthdate"] = "Registrant, Geburtsdatum";
$_LANG["cnrxfibirthdatedescr"] = "Geburtsdatum (YYYY-MM-DD)<br/>(erforderlich für nicht-finnische Privatpersonen)";
$_LANG["cnrxficontacttype"] = "Registrant, Kontakttyp";
$_LANG["cnrxficontacttype0"] = "Privatperson";
$_LANG["cnrxficontacttype1"] = "Unternehmen";
$_LANG["cnrxficontacttype2"] = "Körperschaft";
$_LANG["cnrxficontacttype3"] = "Institution";
$_LANG["cnrxficontacttype4"] = "Politische Partei";
$_LANG["cnrxficontacttype5"] = "Gemeinde";
$_LANG["cnrxficontacttype6"] = "Regierung";
$_LANG["cnrxficontacttype7"] = "Öffentliche Gemeinschaft";
$_LANG["cnrxficontacttypedescr"] = "";

// ----------------------------------------------------------------------
// ------------------ .GAY Fields ---------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxgayacceptrequirements"] = "Anforderungen akzeptieren";
$_LANG["cnrxgayacceptrequirements0"] = $_LANG["cnr0"];
$_LANG["cnrxgayacceptrequirements1"] = $_LANG["cnr1"];
$_LANG["cnrxgayacceptrequirementsdescr"] = "Ich bestätige, dass die Domain NICHT zur Anstiftung zu Gewalt, Mobbing, Belästigung oder Hassrede verwendet wird und NICHT von anerkannten Hassgruppen genutzt wird. DotGay spendet 20% jeder neu registrierten Domain an ihre Partner, GLAAD und CenterLink.";

// ----------------------------------------------------------------------
// ------------------ .HK Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxhkownerdocumenttype"] = "Registrant, Dokumenttyp";
$_LANG["cnrxhkownerdocumenttypehkid"] = "Privatperson: HK Ausweisnummer";
$_LANG["cnrxhkownerdocumenttypeothid"] = "Privatperson: Ausweisnummer eines anderen Landes";
$_LANG["cnrxhkownerdocumenttypepassno"] = "Privatperson: Reisepassnummer";
$_LANG["cnrxhkownerdocumenttypebirthcert"] = "Privatperson: Geburtsurkunde";
$_LANG["cnrxhkownerdocumenttypeothidv"] = "Privatperson: Sonstiges Dokument";
$_LANG["cnrxhkownerdocumenttypebr"] = "Organisation: Gewerbeanmeldung";
$_LANG["cnrxhkownerdocumenttypeci"] = "Organisation: Gründungsurkunde";
$_LANG["cnrxhkownerdocumenttypecrs"] = "Organisation: Schulregistrierungszertifikat";
$_LANG["cnrxhkownerdocumenttypehksarg"] = "Organisation: HK Regierungsabteilung";
$_LANG["cnrxhkownerdocumenttypehkordinance"] = "Organisation: HK Verordnung";
$_LANG["cnrxhkownerdocumenttypeothorg"] = "Organisation: Sonstiges Dokument";
$_LANG["cnrxhkownerdocumenttypedescr"] = "";
$_LANG["cnrxhkownerdocumentnumber"] = "Registrant, Dokumentnummer";
$_LANG["cnrxhkownerdocumentnumberdescr"] = "";
$_LANG["cnrxhkownerdocumentorigincountry"] = "Registrant, Ausstellungsland des Dokuments";
$_LANG["cnrxhkownerdocumentorigincountrydescr"] = "Das Land, in dem dieses Dokument ausgestellt wurde (bitte den 2-stelligen ISO-Ländercode angeben, z.B. DE oder US).";
$_LANG["cnrxhkownerotherdocumenttype"] = "Registrant, anderer Dokumenttyp";
$_LANG["cnrxhkownerotherdocumenttypedescr"] = "Erforderlich, wenn der zuvor ausgewählte Dokumenttyp entweder '" . $_LANG["cnrxhkownerdocumenttypeothidv"] . "' oder '" . $_LANG["cnrxhkownerdocumenttypeothorg"] . "' ist.";
$_LANG["cnrxhkdomaincategory"] = "Domainkategorie";
$_LANG["cnrxhkdomaincategoryi"] = "Privatperson";
$_LANG["cnrxhkdomaincategoryo"] = "Organisation";
$_LANG["cnrxhkdomaincategorydescr"] = "Rechtstyp aller Domainkontakte";
$_LANG["cnrxhkownerageover18"] = "Registrant, Alter über 18";
$_LANG["cnrxhkownerageover18no"] = $_LANG["cnr0"];
$_LANG["cnrxhkownerageover18yes"] = $_LANG["cnr1"];
$_LANG["cnrxhkownerageover18descr"] = "Ich bestätige, dass der Registrant mindestens 18 Jahre alt ist (nur für Privatpersonen erforderlich).";

// ----------------------------------------------------------------------
// ------------------ .IE Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxiecontacttype"] = "Registrant, Kontakttyp";
$_LANG["cnrxiecontacttypecom"] = "Unternehmen";
$_LANG["cnrxiecontacttypecha"] = "Stiftung";
$_LANG["cnrxiecontacttypeoth"] = "Andere";
$_LANG["cnrxiecontacttypedescr"] = "";
$_LANG["cnrxielanguage"] = "Registrant, Sprache";
$_LANG["cnrxielanguageen"] = "Englisch";
$_LANG["cnrxielanguagefr"] = "Französisch";
$_LANG["cnrxielanguagedescr"] = "Sprache für die Kommunikation mit dem TLD-Anbieter (Standard = Englisch)";
$_LANG["cnrxiecronumber"] = "Registrant, CRO-Nummer";
$_LANG["cnrxiecronumberdescr"] = "Die Unternehmensregisternummer (CRO-Nummer)";
$_LANG["cnrxiesupportingnumber"] = "Registrant, Stiftungsnummer";
$_LANG["cnrxiesupportingnumberdescr"] = "Stiftungs- / Unterstützungsnummer";

// ----------------------------------------------------------------------
// ------------------ .IT Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxitconsentforpublishing"] = $_LANG["cnrconsentforpublishing"];
$_LANG["cnrxitconsentforpublishing0"] = $_LANG["cnr0"];
$_LANG["cnrxitconsentforpublishing1"] = $_LANG["cnr1"];
$_LANG["cnrxitconsentforpublishingdescr"] = "Erlauben Sie die Veröffentlichung der persönlichen Kontaktdaten. Ablehnung nur möglich, wenn der Entitätstyp unten 1 ist.";
$_LANG["cnrxitentitytype"] = "Registrant, Entitätstyp";
$_LANG["cnrxitentitytype1"] = "[1] Italienische und ausländische natürliche Personen";
$_LANG["cnrxitentitytype2"] = "[2] Unternehmen/Einzelunternehmen";
$_LANG["cnrxitentitytype3"] = "[3] Freiberufler/Professionals";
$_LANG["cnrxitentitytype4"] = "[4] gemeinnützige Organisationen";
$_LANG["cnrxitentitytype5"] = "[5] öffentliche Organisationen";
$_LANG["cnrxitentitytype6"] = "[6] andere Subjekte";
$_LANG["cnrxitentitytype7"] = "[7] Ausländer, die 2-6 entsprechen";
$_LANG["cnrxitentitytypedescr"] = "Entitätstyp zur Identifizierung des Registranten.";
$_LANG["cnrxitpin"] = "Registrant, Steuernummer";
//$_LANG["cnrxitpindescr"] = "";
$_LANG["cnrxitnationality"] = "Registrant, Nationalität";
$_LANG["cnrxitnationalitydescr"] = "Die Nationalität des Registranten, angegeben durch den 2-stelligen ISO-Ländercode.";
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
$_LANG["cnrxlvownerregnr"] = "Registrant, Registrierungsnummer";
$_LANG["cnrxlvownerregnrdescr"] = "Die Registrierungsnummer des lettischen Bürgers, die für den Registrantenkontakt verwendet wird (z.B. Firmenregistrierungsnummer)";
$_LANG["cnrxlvadminregnr"] = "Admin, Registrierungsnummer";
$_LANG["cnrxlvadminregnrdescr"] = "Die Registrierungsnummer des lettischen Bürgers, die für den administrativen Kontakt verwendet wird (z.B. Firmenregistrierungsnummer)";
$_LANG["cnrxlvvatnr"] = "Registrant, USt-IdNr.";
$_LANG["cnrxlvvatnrdescr"] = "Die USt-IdNr. des Registrantenkontakts (nur für Unternehmen).";

// ----------------------------------------------------------------------
// ------------------ .LT Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxltcompanynumber"] = "Registrant, Unternehmensnummer";
$_LANG["cnrxltcompanynumberdescr"] = "";

// ----------------------------------------------------------------------
// ------------------ .MY Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxmybusinessnumber"] = "Registrant, Unternehmensnummer";
$_LANG["cnrxmybusinessnumberdescr"] = "Die Unternehmensregisternummer des Registranten (nur für Unternehmen)";
$_LANG["cnrxmyorganizationtype"] = "Registrant, Organisationstyp";
$_LANG["cnrxmyorganizationtypedescr"] = "Der Unternehmenstyp des Registranten (nur für Unternehmen)";
$_LANG["cnrxmyperidentity"] = "Registrant, persönliche Identifikationsnummer";
$_LANG["cnrxmyperidentitydescr"] = "Die persönliche Identifikationsnummer des Registranten (nur für Privatpersonen)";
$_LANG["cnrxmyperdateofbirth"] = "Registrant, Geburtsdatum";
$_LANG["cnrxmyperdateofbirthdescr"] = "Das Geburtsdatum des Registranten (YYYY-MM-DD, nur für Privatpersonen)";
$_LANG["cnrxmyrace"] = "Registrant, ethnische Zugehörigkeit";
$_LANG["cnrxmyracemalay"] = "Malayisch";
$_LANG["cnrxmyracechinese"] = "Chinesisch";
$_LANG["cnrxmyraceindian"] = "Indisch";
$_LANG["cnrxmyraceothers"] = "Andere";
$_LANG["cnrxmyracedescr"] = "(nur für Privatpersonen)";

// ----------------------------------------------------------------------
// ------------------ .NO Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxnoorganizationnumber"] = "Registrant, Organisationsnummer";
$_LANG["cnrxnoorganizationnumberdescr"] = "Die norwegische Registrierungsnummer, die vom Zentralen Koordinierungsregister für juristische Personen ausgestellt wird.";
$_LANG["cnrxnopersonidentifier"] = "Norid Personen-ID";
$_LANG["cnrxnopersonidentifierdescr"] = "Erforderliche persönliche ID zur Registrierung einer privaten .PRIV.NO-Domain. Andernfalls leer lassen.";

// ----------------------------------------------------------------------
// ------------------ .NU Fields ----------------------------------------
// ----------------------------------------------------------------------
// see further .nu fields at the top of the file
$_LANG["cnrxnuiisidno"] = "Registrant, ID Nummer";
$_LANG["cnrxnuiisidnodescr"] = "Personalausweisnummer, Unternehmensidentifikationsnummer oder Registrierungsbezeichnung in einem staatlichen Register. Für Kontakte in Schweden ist eine gültige schwedische ID-Nummer erforderlich (z.B.: 123456-1234).";
$_LANG["cnrxnuiisvatno"] = "Registrant, USt-IdNr.";
$_LANG["cnrxnuiisvatnodescr"] = "Die USt-IdNr. des Registranten (nur für Unternehmen)";

// ----------------------------------------------------------------------
// ------------------ .NYC Fields ---------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxnycextcontact"] = "NY Externer Kontakt";
$_LANG["cnrxnycextcontactadmin"] = "Administrativer Kontakt";
$_LANG["cnrxnycextcontacttech"] = "Technischer Kontakt";
$_LANG["cnrxnycextcontactbilling"] = "Abrechnungskontakt";
$_LANG["cnrxnycextcontactowner"] = "Registrant";
$_LANG["cnrxnycextcontactdescr"] = "Der angegebene Kontakt muss eine gültige physische Adresse in der Stadt New York haben.";

// ----------------------------------------------------------------------
// ------------------ .PARIS Fields -------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxafniccode"] = $_LANG["cnrxallocationtoken"];
$_LANG["cnrxafniccodedescr"] = $_LANG["cnrxallocationtokendescr"];

// ----------------------------------------------------------------------
// ------------------ .FR, .PM, .RE, .TF, .WF, .YT Fields ---------------
// ----------------------------------------------------------------------
// Organizations (Companies, Associations, etc.)
$_LANG["cnrxfrannounce"] = "Unternehmen, Ankündigungsnummer<br/>(Journal Officiel)";
$_LANG["cnrxfrannouncedescr"] = "Die Nummer der Ankündigung (z.B. 5) im Journal Officiel. Nur Ziffern erlaubt.";
$_LANG["cnrxfrdatepublicationjo"] = "Unternehmen, Veröffentlichungsdatum<br/>(Journal Officiel)";
$_LANG["cnrxfrdatepublicationjodescr"] = implode(" ", [
    "Das Veröffentlichungsdatum im offiziellen Amtsblatt / Journal Officiel.",
    "Datumsformat YYYY-MM-DD"
]);
$_LANG["cnrxfrnumerodepageannouncejo"] = "Unternehmen, Seitennummer der Ankündigung<br/>(Journal Officiel)";
$_LANG["cnrxfrnumerodepageannouncejodescr"] = "Die Seitennummer der Ankündigung im Journal Officiel.";
$_LANG["cnrxfrwaldec"] = "Unternehmen, Waldec-ID";
$_LANG["cnrxfrwaldecdescr"] = "Gibt die Waldec-Kennung an, die mit einer Vereinigung verknüpft ist und ausreicht, um eine Vereinigung zu identifizieren, wenn sie angegeben wird. Nur Ziffern erlaubt.";
$_LANG["cnrxfrdateassociation"] = "Unternehmen, Datum der Vereinigung";
$_LANG["cnrxfrdateassociationdescr"] = "Zeigt das Datum der Vereinigung an. Datumsformat YYYY-MM-DD.";
$_LANG["cnrxfrduns"] = "Unternehmen, DUNS-Nummer";
$_LANG["cnrxfrdunsdescr"] = implode(" ", [
    "Die DUNS-Nummer ist eine eindeutige neunstellige Kennung für Unternehmen. Kurz für Data Universal",
    "Numbering System; bezieht sich auf eine neue Kennung, die für eine Berechtigungsüberprüfung",
    "auf europäischer Ebene gesendet werden kann."
]);
$_LANG["cnrxfrlocal"] = "Unternehmen, lokale ID";
$_LANG["cnrxfrlocaldescr"] = "Eine lokale Kennung, die spezifisch für ein Land des Europäischen Wirtschaftsraums ist (z.B. Geschäftszertifikatsnummer).";
$_LANG["cnrxfrnoprezonecheck0"] = $_LANG["cnr0"];
$_LANG["cnrxfrnoprezonecheck1"] = $_LANG["cnr1"];
$_LANG["cnrxfrsirenorsiret"] = "Unternehmen, SIREN/SIRET-Nummer";
$_LANG["cnrxfrsirenorsiretdescr"] = implode(" ", [
    "Für Unternehmen mit gültiger SIREN/SIRET-Nummer.",
    "Der SIREN-Code ist die eindeutige Unternehmenskennnummer in Frankreich. Er wird vom",
    "Institut national de la statistique et des études économiques (INSEE) ausgegeben und hat 9 Ziffern.",
    "Die ersten 9 Ziffern sind die SIREN-Nummer und die folgenden 5 Ziffern sind die NIC-Nummer",
    "(Numéro Interne de Classement). Die SIRET-Nummer wird ausgegeben, sobald Sie Ihr",
    "Unternehmen bei der Handelskammer (RCS) für Handel, der Handwerkskammer für Handwerk und",
    "manuelle Arbeit oder bei der URSSAF für intellektuelle Dienstleistungen registriert haben.",
    "SIRET-Nummern bestehen aus 14 Ziffern. Die SIRET-Nummer liefert Informationen über den Standort des Unternehmens in Frankreich",
    "(für etablierte Unternehmen). Der im Registrantenkontakt angegebene Firmenname muss",
    "genau mit dem im SIREN/SIRET-Datenbank ( https://www.infogreffe.fr/ ) übereinstimmen."
]);
$_LANG["cnrxfrtrademark"] = "Unternehmen, Marken-Nr.";
$_LANG["cnrxfrtrademarkdescr"] = "";
$_LANG["cnrxfrvatid"] = "Unternehmen, USt-IdNr.";
$_LANG["cnrxfrvatiddescr"] = "Für Unternehmen mit gültiger USt-IdNr.";

// Individual
$_LANG["cnrxfrbirthpc"] = "Registrant, Postleitzahl (Geburtsort)";
$_LANG["cnrxfrbirthpcdescr"] = implode(" ", [
    "Nur für natürliche Personen, die in Frankreich, Réunion, Mayotte, Guadeloupe, Martinique, Guyane,",
    "Polynesien, Wallis und Futuna oder Saint-Pierre-et-Miquelon geboren sind. Bitte geben Sie die",
    "Postleitzahl des Geburtsortes an (oder zumindest den Departementcode)."
]);
$_LANG["cnrxfrbirthcity"] = "Registrant, Geburtsstadt";
$_LANG["cnrxfrbirthcitydescr"] = implode(" ", [
    "Nur für natürliche Personen, die in Frankreich, Réunion, Mayotte, Guadeloupe, Martinique, Guyane,",
    "Polynesien, Wallis und Futuna oder Saint-Pierre-et-Miquelon geboren sind. Bitte geben Sie den Namen",
    "der Stadt an."
]);
$_LANG["cnrxfrbirthdate"] = "Registrant, Geburtsdatum";
$_LANG["cnrxfrbirthdatedescr"] = "Das Geburtsdatum des Registranten im Format YYYY-MM-DD.";
$_LANG["cnrxfrbirthplace"] = "Registrant, Geburtsort";
//$_LANG["cnrxfrbirthplacedescr"] = "";
$_LANG["cnrxfrrestrictpub"] = $_LANG["cnrconsentforpublishing"];
$_LANG["cnrxfrrestrictpub0"] = $_LANG["cnr0"];
$_LANG["cnrxfrrestrictpub1"] = $_LANG["cnr1"];
$_LANG["cnrxfrrestrictpubdescr"] = "Nur für natürliche Personen. Erlauben Sie die Veröffentlichung der persönlichen Kontaktdaten.";
$_LANG["cnrxfrnoprezonecheck"] = "DNS-Vorprüfung unterdrücken";
$_LANG["cnrxfrnoprezonecheckdescr"] = "Bestimmt, ob das System eine DNS-Vorprüfung durchführen soll, bevor der Befehl an die Registrierungsstelle gesendet wird.";

// ----------------------------------------------------------------------
// ------------------ .PT Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxpttechidentification"] = "Technischer Kontakt, USt-IdNr.";
$_LANG["cnrxpttechidentificationdescr"] = "Die Steueridentifikationsnummer des technischen Kontakts";
$_LANG["cnrxptowneridentification"] = "Registrant, USt-IdNr.";
$_LANG["cnrxptowneridentificationdescr"] = "Die Steueridentifikationsnummer des Registranten";
$_LANG["cnrxpttechmobile"] = "Technischer Kontakt, Mobiltelefon";
$_LANG["cnrxpttechmobiledescr"] = "Die Mobiltelefonnummer des technischen Kontakts";
$_LANG["cnrxptownermobile"] = "Registrant, Mobiltelefon";
$_LANG["cnrxptownermobiledescr"] = "Die Mobiltelefonnummer des Registranten";

// ----------------------------------------------------------------------
// ------------------ .RO Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxrocompanynumber"] = "Registrant, Unternehmensnummer";
$_LANG["cnrxrocompanynumberdescr"] = "(nur für Unternehmen erforderlich)";
$_LANG["cnrxroidcardorpassportnumber"] = "Registrant, Personalausweis- oder Reisepassnummer";
$_LANG["cnrxroidcardorpassportnumberdescr"] = "(nur für Privatpersonen erforderlich)";
$_LANG["cnrxrovatnumber"] = "Registrant, USt-IdNr.";
$_LANG["cnrxrovatnumberdescr"] = "(nur für Unternehmen erforderlich)";

// ----------------------------------------------------------------------
// ------------------ .RU Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxrubirthdate"] = "Registrant, Geburtsdatum";
$_LANG["cnrxrubirthdatedescr"] = "Das Geburtsdatum des Registranten (TT.MM.JJJJ)<br/>(nur für Privatpersonen erforderlich)";
$_LANG["cnrxrufirstname"] = "Registrant, Vorname";
$_LANG["cnrxrufirstnamedescr"] = "Der Vorname des Registranten auf Russisch. Muss mit russischen und lateinischen Buchstaben ausgefüllt werden, keine Punkte.<br/>(nur für Privatpersonen erforderlich)";
$_LANG["cnrxrumiddlename"] = "Registrant, Zweiter Vorname";
$_LANG["cnrxrumiddlenamedescr"] = "Der zweite Vorname des Registranten auf Russisch. Muss mit russischen und lateinischen Buchstaben ausgefüllt werden, keine Punkte.<br/>(nur für Privatpersonen erforderlich)";
$_LANG["cnrxrulastname"] = "Registrant, Nachname";
$_LANG["cnrxrulastnamedescr"] = "Der Nachname des Registranten auf Russisch. Muss mit russischen und lateinischen Buchstaben ausgefüllt werden, keine Punkte.<br/>(nur für Privatpersonen erforderlich)";
$_LANG["cnrxruorganization"] = "Registrant, Organisationsname";
$_LANG["cnrxruorganizationdescr"] = "Der Name der Organisation des Registranten auf Russisch. Dieses Feld kann russische und lateinische Buchstaben, Zahlen, Satzzeichen und Leerzeichen enthalten.<br/>(nur für Organisationen, die in der Russischen Föderation eingetragen sind, erforderlich)";
$_LANG["cnrxrucode"] = "Registrant, Steuernummer";
$_LANG["cnrxrucodedescr"] = "Die Steuernummer (TIN) des Registranten. Dieses Feld muss eine zehnstellige Zahl enthalten (die letzte Ziffer ist eine Prüfziffer).<br/>(nur für Organisationen, die in der Russischen Föderation eingetragen sind, erforderlich)";
$_LANG["cnrxrukpp"] = "Registrant, Grundcode";
$_LANG["cnrxrukppdescr"] = "Der Grundcode (KPP) des Registranten. Dieses Feld muss eine neunstellige Zahl enthalten.<br/>(nur für Organisationen, die in der Russischen Föderation eingetragen sind, erforderlich)";
$_LANG["cnrxrupassportdata"] = "Registrant, Passdaten";
$_LANG["cnrxrupassportdatadescr"] = "Die Passdaten des Registranten. Dieses Feld wird auf Russisch ausgefüllt und kann russische und lateinische Buchstaben, Zahlen, Satzzeichen und Leerzeichen enthalten. Format: Dokumentnummer, Ausgestellt von, Ausstellungsdatum<br/>(nur für Privatpersonen erforderlich)";

// ----------------------------------------------------------------------
// ------------------ .SE Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxnicseidnumber"] = "Registrant, ID Nummer";
$_LANG["cnrxnicseidnumberdescr"] = "Persönliche oder organisatorische Nummer.";
$_LANG["cnrxnicsevatid"] = "Registrant, USt-IdNr.";
$_LANG["cnrxnicsevatiddescr"] = "";
$_LANG["cnrxsediscloseemail"] = "Registrant, E-Mail-Adresse offenlegen";
$_LANG["cnrxsediscloseemaildescr"] = "Erlauben Sie die Offenlegung der E-Mail-Adresse des Registranten in der öffentlichen WHOIS-Datenbank.";
$_LANG["cnrxsedisclosefax"] = "Registrant, Faxnummer offenlegen";
$_LANG["cnrxsedisclosefaxdescr"] = "Erlauben Sie die Offenlegung der Faxnummer des Registranten in der öffentlichen WHOIS-Datenbank.";
$_LANG["cnrxsedisclosevoice"] = "Registrant, Telefonnummer offenlegen";
$_LANG["cnrxsedisclosevoicedescr"] = "Erlauben Sie die Offenlegung der Telefonnummer des Registranten in der öffentlichen WHOIS-Datenbank.";
foreach (["email", "fax", "voice"] as $field) {
    $_LANG["cnrxsedisclose$field" . "0"] = $_LANG["cnr0"];
    $_LANG["cnrxsedisclose$field" . "1"] = $_LANG["cnr1"];
}

// ----------------------------------------------------------------------
// ------------------ .SG Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxsgrcbid"] = "Registrant, RCB ID";
$_LANG["cnrxsgrcbiddescr"] = "Die eindeutige Unternehmensnummer (UEN) oder die Registrierungsnummer des Unternehmens (RCB) des Registranten. Für <u>Unternehmen</u> mit Sitz in Singapur muss die entsprechende Unternehmensregistrierungsnummer angegeben werden ODER die Kontaktidentitätskarte für eine lokale Präsenz in Singapur (Format: S1234567D).";
$_LANG["cnrxsgadminsingpassid"] = "Admin, SingPass ID";
$_LANG["cnrxsgadminsingpassiddescr"] = "Die Kontaktidentitätskarte (SingPass ID) des administrativen Kontakts<br/>(nur für singapurische <u>Privatpersonen</u>, Format: S1234567D)";

// ----------------------------------------------------------------------
// ------------------ .SK Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxskcontactlegalform"] = "Registrant, Rechtsform";
$_LANG["cnrxskcontactlegalformdescr"] = "";
// $_LANG["cnrxskcontactlegalformcorp"] = "";
// $_LANG["cnrxskcontactlegalformpers"] = "";
$_LANG["cnrxskcontactidentnumber"] = "Registrant, Handelsregisternummer";
$_LANG["cnrxskcontactidentnumberdescr"] = "Pflichtfeld für Unternehmen/Organisationen";

// ----------------------------------------------------------------------
// ------------------ .SWISS Fields -------------------------------------
// ----------------------------------------------------------------------
// see other .swiss fields at top of the file
$_LANG["cnrxswissuid"] = "Registrant, UID oder UPI";
$_LANG["cnrxswissuiddescr"] = implode("", [
    "Die ...<ul>",
    "<li>UID (Unternehmens-Identifikationsnummer, Format: \"CHE-ddd.ddd.ddd\") für Organisationen oder</li>",
    "<li>UPI (Universelle Personen-Identifikationsnummer, Format: \"756.dddd.dddd.dd\") für natürliche Personen</li>",
    "</ul>... des Registranten (d = Ziffer).<br/>",
    "Bitte beachten: Der Name der Person und die UPI werden NICHT im Whois/RDAP veröffentlicht, im Gegensatz zum Namen der Organisation und der UID, die sichtbar sind."
]);
$_LANG["cnrxswissownertype"] = "Registrant, Typ";
$_LANG["cnrxswissownertypep"] = "Natürliche Person";
$_LANG["cnrxswissownertypeo"] = "Organisation / Juristische Person";
$_LANG["cnrxswissownertypedescr"] = "Der Identitätstyp des Registranten.";

// ----------------------------------------------------------------------
// ------------------ .TRAVEL Fields ------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxtravelindustry"] = "Reisebranche";
$_LANG["cnrxtravelindustryn"] = $_LANG["cnr0"];
$_LANG["cnrxtravelindustryy"] = $_LANG["cnr1"];
$_LANG["cnrxtravelindustrydescr"] = "Ich bestätige, dass der Registrant Mitglied der Reisebranche ist und eine gültige Mitgliedsnummer besitzt.";

// ----------------------------------------------------------------------
// ------------------ .UK Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxukownercorporatetype"] = "Registrant, Unternehmensart";
$_LANG["cnrxukownercorporatetypedescr"] = "";
$_LANG["cnrxukownercorporatetypeother"] = "Andere";
$_LANG["cnrxukownercorporatetypefother"] = "Andere (Nicht-UK)";
$_LANG["cnrxukownercorporatetypeind"] = "Einzelperson";
$_LANG["cnrxukownercorporatetypefind"] = "Einzelperson (Nicht-UK)";
$_LANG["cnrxukownercorporatetypefcorp"] = "Unternehmen (Nicht-UK)";
// $_LANG["cnrxukownercorporatetypeltd"] = "LTD";
// $_LANG["cnrxukownercorporatetypeplc"] = "PLC";
// $_LANG["cnrxukownercorporatetypellp"] = "LLP";
// $_LANG["cnrxukownercorporatetypeip"] = "IP";
$_LANG["cnrxukownercorporatetypecrc"] = "Unternehmen mit königlicher Satzung";
$_LANG["cnrxukownercorporatetypegov"] = "Regierungsbehörde";
$_LANG["cnrxukownercorporatetypeptnr"] = "Britische Partnerschaft";
$_LANG["cnrxukownercorporatetyperchar"] = "Eingetragene Wohltätigkeitsorganisation";
$_LANG["cnrxukownercorporatetypesch"] = "Schule";
$_LANG["cnrxukownercorporatetypestat"] = "Körperschaft des öffentlichen Rechts";
$_LANG["cnrxukownercorporatetypestra"] = "Einzelunternehmer";
$_LANG["cnrxukownercorporatenumber"] = "Registrant, Handelsregisternummer";
$_LANG["cnrxukownercorporatenumberdescr"] = "";

// ----------------------------------------------------------------------
// ------------------ .US Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxusnexusapppurpose"] = "US Nexus, Verwendungszweck";
$_LANG["cnrxusnexusapppurposep1"] = "Geschäftliche Nutzung für Gewinnzwecke";
$_LANG["cnrxusnexusapppurposep2"] = "Gemeinnützige Organisation, Verein, religiöse Organisation, etc.";
$_LANG["cnrxusnexusapppurposep3"] = "Persönliche Nutzung";
$_LANG["cnrxusnexusapppurposep4"] = "Bildungszwecke";
$_LANG["cnrxusnexusapppurposep5"] = "Regierungszwecke";
$_LANG["cnrxusnexusapppurposedescr"] = "";
$_LANG["cnrxusnexuscategory"] = "US Nexus, Kategorie";
$_LANG["cnrxusnexuscategoryc11"] = "[C11] US-Bürger";
$_LANG["cnrxusnexuscategoryc12"] = "[C12] US-Daueraufenthaltsberechtigter";
$_LANG["cnrxusnexuscategoryc21"] = "[C21] US-Organisation";
$_LANG["cnrxusnexuscategoryc31"] = "[C31] Ausländische Entität mit US-Aktivitäten";
$_LANG["cnrxusnexuscategoryc32"] = "[C32] Ausländische Entität mit US-Büro";
$_LANG["cnrxusnexuscategorydescr"] = "Kategorisierung der Entität, die den Antrag stellt.<br/>Hinweis: Besitzungen und Territorien der USA sind ebenfalls eingeschlossen.";
$_LANG["cnrxusnexusvalidator"] = "US Nexus, Land";
$_LANG["cnrxusnexusvalidatordescr"] = "Geben Sie den zweibuchstabigen Ländercode des Registranten an (wenn die Nexus-Kategorie entweder C31 oder C32 ist)";

// ----------------------------------------------------------------------
// ------------------ .XXX Fields ---------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxxxxcommunityid"] = "Community-Mitglieds-ID";
$_LANG["cnrxxxxcommunityiddescr"] = ".XXX Gesponserte Community-Mitglieds-ID";
$_LANG["cnrxxxxdefensive"] = "Defensive Registrierung<br/>(Nicht-auflösende Domain)";
$_LANG["cnrxxxxdefensive0"] = $_LANG["cnr0"];
$_LANG["cnrxxxxdefensive1"] = $_LANG["cnr1"];
$_LANG["cnrxxxxdefensivedescr"] = implode("", [
    "Ich bestätige, dass die Domain eine defensive Registrierung ist. ",
    "Defensive Registrierung bezieht sich auf die Registrierung von Domainnamen, ",
    "oft über mehrere TLDs hinweg und in verschiedenen grammatikalischen Formaten, ",
    "mit dem primären Zweck, geistiges Eigentum oder Marken vor Missbrauch zu schützen, ",
    "wie z.B. Cybersquatting. Es wird definiert als eine Registrierung, die nicht einzigartig ist, nicht auflöst, ",
    "den Verkehr zurück zu einer Kernregistrierung umleitet oder keinen einzigartigen Inhalt enthält.<br/>",
    "Hinweis: Wenn nicht ausgewählt, wird die Domain als defensive Registrierung betrachtet."
]);

// #########################################################################
// #########################################################################
// # Add reusable translations for ALL PROVIDERS                           #
// #########################################################################
// #########################################################################

// ----------------------------------------------------------------------
// ----------------------- DNSSEC MANAGEMENT ----------------------------
// ----------------------------------------------------------------------
$_LANG["cnicdnssecmanagement"] = "DNSSEC Verwaltung";




// #########################################################################
// #########################################################################
// # Add translations for ISPAPI registrar module additional domain fields #
// #########################################################################
// #########################################################################

// Terms and Conditions Fields, prefixed with hxflagstac
$_LANG["hxflagstacagreement"] = "Vereinbarung";
$_LANG["hxflagstacagreementindiv"] = "Bedingungen für Privatpersonen";
$_LANG["hxflagstactrustee"] = "Treuhandservice";
$_LANG["hxflagstachighlyregulated"] = "Stark Regulierte TLD";
$_LANG["hxflagstachighlyregulateddescrdefault"] = ("Bestätigen Sie, daß der Registrant berechtigt ist diese Domain zu registrieren und daß alle angegebenen Daten korrekt und wahrheitsgemäß sind. " .
    "Berechtigungskriterien können <a href=\"{TAC}\" target=\"_blank\">hier</a> eingesehen werden."
);
$_LANG["hxflagstachighlyregulateddescreco"] = ($_LANG["hxflagstachighlyregulateddescrdefault"] .
    "<br/>Alle .ECO Domainnamen werden erst Status \"server hold\" registriert, bis zur Vervollständing/Erfüllung der Minimumanforderungen des .ECO Profils. " .
    "D.h. der .ECO Registrant 1) sichert die Einhaltung der .ECO Berechtigungskriterien zu und 2) verspricht eine positive Änderung für den Planeten zu unterstützen " .
    "und bei jeglichen Umweltmaßnahmen wahrheitsgemäße Informationen weiterzugeben. Der Registrant wird per Email informiert, " .
    "wie ein .ECO Profil zu erstellen ist. Sobald dieser Schritt erfolgt ist, wird die {TLD} Domain umgehend seitens der Registrierungsstelle aktiviert."
);
$_LANG["hxflagstachighlyregulateddescrcoop"] = ("Ich, der Registrant, verstehe, stimme zu und bestätige, dass mein Unternehmen mindestens eine der {TLD}-Berechtigungsvoraussetzungen erfüllt:" .
    "<ul>" .
    "<li>eine demokratisch kontrollierte Genossenschaft im Besitz der Mitglieder, die mit den internationalen 7 Genossenschaftsprinzipien übereinstimmt; oder</li>" .
    "<li>eine aus Genossenschaften bestehende Vereinigung; oder</li>" .
    "<li>eine Organisation, die mehrheitlich von einer Genossenschaft kontrolliert wird; oder</li>" .
    "<li>eine Körperschaft, deren Geschäftstätigkeit hauptsächlich darauf ausgerichtet ist, Genossenschaften zu dienen.</li>" .
    "</ul>" .
    "Ich verstehe und stimme zu, dass DotCooperation LLC Audits von {TLD}-Domainregistrierungen durchführt und sich das Recht vorbehält, einen Domainnamen gemäß ihren Richtlinien zu stornieren oder zu ändern."
);
$_LANG["hxflagstachighlyregulateddescrnotac"] = ("Bestätigen Sie die <b>Schutzmaßnahmen für stark regulierte TLDs</b> anzuerkennen:<br/>" .
    "<div style=\"text-align:justify\">Sie verstehen und akzeptieren die Zusatzbedingungen zu beachten und zu befolgen:" .
    "<ol><li>Daten des administrativen Kontakts. Sie stimmen zu aktuelle Daten des administrativen Kontakts anzugeben und diese aktuell zu halten, " .
    "um Benachrichtigungen über Beschwerden oder Registrierungsmissbrauchsmeldungen erhalten zu können, als auch Kontaktdaten verantwortlicher / " .
    " branchen-selbstreguliernder Stellen in ihrem Hauptunternehmenssitz.</li>" .
    "<li>Vertretung. Sie bestätigen jegliche Berechtigungen, Urkunden, Lizenzen und/oder andere ähnliche Mitwirkungsberechtigungen " .
    "in der Branche einer solchen stark regulierten TLD zu besitzen.</li>" .
    "<li>Änderung der Berechtigungen, Urkunden, Lizenzen und Mitwirkungsberechtigungen. Sie bestätigen wesentliche Änderungen der Gültigkeit dieser Daten zu melden, " .
    " um sicherzustellen, daß Sie weiterhin den Bestimmungen und Zulassungsvorschriften entsprechen und Ihre Aktivitäten in den Interessen Ihrer Kunden ausüben." .
    "</li>" .
    "</ol></div>"
);
$_LANG["hxflagstacindividualregulateddescrdefault"] = "Bestätigen Sie die <a href=\"{TAC}\" target=\"_blank\">Richtlinien für Privatpersonen</a> anzuerkennen.";
$_LANG["hxflagstacregulateddescrdefault"] = "Bestätigen Sie die <a href=\"{TAC}\" target=\"_blank\">Registrierungsbedingungen der Registrierungsstelle</a> bzgl. Neuregistrierung von {TLD} Domainnamen anzuerkennen.";
$_LANG["hxflagstacregulateddescrcira"] = ("<div style=\"text-align:justify\">Klicken Sie hier, um zu bestätigen, dass Sie der <a href=\"{TAC}\" target=\"_blank\">CIRA-Registrierungsvereinbarung</a> zustimmen und " .
    "dass CIRA von Zeit zu Zeit und nach eigenem Ermessen Änderungen an oder vornehmen kann alle Bedingungen der Registrantenvereinbarung, " .
    "wie CIRA es für angemessen hält, durch Veröffentlichung einer Mitteilung über die Änderungen auf der CIRA-Website und durch Beendigung " .
    "einer Benachrichtigung über wesentliche Änderungen an den Registranten. Sie erfüllen alle Anforderungen der Registrantenvereinbarung, " .
    "um ein Registrant zu sein, die Registrierung einer Domänennamenregistrierung zu beantragen und eine Domänennamenregistrierung zu halten " .
    "und aufrechtzuerhalten, einschließlich, aber nicht beschränkt auf die kanadischen Präsenzanforderungen von CIRA für Registranten, " .
    "<a href=\"https://static.cira.ca/policy/canadian-presence-requirements-for-registrants.pdf\" target=\"_blank\">hier</a>. " .
    "CIRA wird Ihre personenbezogenen Daten erfassen, verwenden und offenlegen, wie in der Datenschutzrichtlinie von CIRA " .
    "<a href=\"https://www.cira.ca/policy/corporate/cira-privacy-policy\" target=\_blank\">hier</a> dargelegt.</div>"
);
$_LANG["hxflagstacregulateddescrngo"] = ($_LANG["hxflagstacregulateddescrdefault"] .
    "<div style=\"padding:10px 0px;\">Mit der Registrierung einer {TLD} Domain erhalten Sie auch gleichzeitig und ohne zusätzliche Kosten eine .ONG Domain. " .
    "Änderungen an der {TLD} Domain werden auch automatisch bei der .ONG Domain durchgeführt. Aus diesem Grund finden Sie die .ONG Domain auch nicht in Ihrem Domaininventar gelistet.</div>"
);
$_LANG["hxflagstacregulateddescritsection3"] = ("Bestätigen Sie <b><a href=\"{TAC}\" target=\"_blank\">Abschnitt 3 - Declarations and Assumptions of Liability</a></b> anzuerkennen.<br/>" .
    "<div style=\"text-align:justify;margin-bottom:10px;\">" .
    "Der Registrant des betreffenden Domainnamens erklärt in eignerer Verantwortung folgende Punkte zu erfüllen:" .
    "<ul><li>Im Falle einer Registrierung für eine Privatperson: Im Besitz der Staatsbürgerschaft oder eines Wohnsitzes in der Europäischen Union zu sein</li>" .
    "<li>Im Falle einer Registrierung für andere Firmen: In der Europäischen Union etabliert zu sein.</li>" .
    "<li>Zu wissen und zu akzeptieren, dass die Registrierung und Verwaltung eines Domainnamens den <a href=\"{TAC}\" target=\"_blank\">" .
    "'Management of synchronous operations on domain names of the ccTLD {TLD} - Guidelines'</a> und den <a href=\"{TAC}\" target=\"_blank\">" .
    "'Dispute resolution in the ccTLD {TLD} - Regulations & Guidelines'</a> und deren späteren Änderungen unterliegt.</li>" .
    "<li>Zur Nutzung und/oder rechtliche Verwaltung des beantragten Domainnames berechtigt zu sein und den Rechten Anderer mit der Registrierungsanfrage nicht zu schaden.</li>" .
    "<li>Zu wissen, dass der Aufnahme persönlicher Daten in der Datenbank zugeordneter Domains, und deren möglicher Verbreitung und Einsehbarkeit über das Internet, explizit über die " .
    "Aktivierung entsprechenden Ankreuzfelder zugestimmt werden muss. Siehe <a href=\"{TAC}\" target=\"_blank\">'DBNA and WHOIS Policy'</a>.</li>" .
    "<li>Zu wissen und zu akzeptieren, dass die Registierungsstelle umgehend den Domainnamen im Falle fehlerhafter oder falscher Angaben in dieser Anfrage widerrufen wird oder andere " .
    "rechtliche Schritte einleiten wird. In einem solchen Fall wird der Widerruf in keinster Weise Anlass geben gegen die Registrierungsstelle zu klagen.</li>" .
    "<li>Die Registrierungsstelle von jeglicher Verantwortung entstehend aus der Zuweisung und Nutzung der Domainnamens durch die Privatperson, die die Anfrage gestellt hat, zu entbinden.</li>" .
    "<li>Italienische Rechtsprechung und Gesetze des Staates Italien zu akzeptieren.</li></ul></div>"
);
$_LANG["hxflagstacregulateddescritsection5"] = ("Bestätigen Sie <b><a href=\"{TAC}\" target=\"_blank\">Abschnitt 5 - Consent to the processing of personal data for registration</b></a> anzuerkennen.<br/>" .
    "<div style=\"text-align:justify;margin-bottom:10px;\">" .
    "Der Interessent erteilt nach der Lektüre o.g. Veröffentlichung sein Einverständnis zur für die Registrierung notwendigen Datenverarbeitung, gemäß dieser Veröffentlichung." .
    "Die Einwilligung ist kein Muss. Wird diese nicht erteilt, so kann die Registrierung, Zuweisung und Verwaltung des Domainnamens nicht abgeschlossen werden.</div>"
);
$_LANG["hxflagstacregulateddescritsection6"] = ("Bestätigen Sie <b><a href=\"{TAC}\" target=\"_blank\">Abschnitt 6 - Consent to the processing of personal data for diffusion and accessibility via the Internet</b></a> anzuerkennen.<br/>" .
    "<div style=\"text-align:justify;margin-bottom:10px;\">" .
    "Der Interessent erteilt nach Lektüre o.g. Veröffentlichung sein Einverständnis zur Verbreitung und Einsehbarkeit der Daten über das Internet gemäßt dieser Veröffentlichung." .
    "Die Einwilligung ist kein Muss. Wird diese nicht erteilt, ist die Verbreitung und Einsehbarkeit der Daten über das Internet nicht erlaubt.</div>"
);
$_LANG["hxflagstacregulateddescritsection7"] = ("Bestätigen Sie <b><a href=\"{TAC}\" target=\"_blank\">Abschnitt 7 - Explicit Acceptance of the following points</b></a> anzuerkennen.<br/>" .
    "<div style=\"text-align:justify;margin-bottom:10px;\">" .
    "Zur ausdrücklichen Zustimmung erklärt der Interessent:" .
    "<ul><li>d) zu wissen und zu akzeptieren, dass die Registrierung und Verwaltung eines Domainnamens den <a href=\"{TAC}\" target=\"_blank\">" .
    "'Management of synchronous operations on domain names of the ccTLD {TLD} - Guidelines'</a> und den <a href=\"{TAC}\" target=\"_blank\">" .
    "'Dispute resolution in the ccTLD {TLD} - Regulations & Guidelines'</a> und deren späteren Änderungen unterliegt.</li>" .
    "<li>e) Zu wissen und zu akzeptieren, dass die Registierungsstelle umgehend den Domainnamen im Falle fehlerhafter oder falscher Angaben in dieser Anfrage widerrufen wird oder andere " .
    "rechtliche Schritte einleiten wird. In einem solchen Fall wird der Widerruf in keinster Weise Anlass geben gegen die Registrierungsstelle zu klagen.</li>" .
    "<li>f) Die Registrierungsstelle von jeglicher Verantwortung entstehend aus der Zuweisung und Nutzung der Domainnamens durch die Privatperson, die die Anfrage gestellt hat, zu entbinden.</li>" .
    "<li>g) Italienische Rechtsprechung und Gesetze des Staates Italien zu akzeptieren.</li></ul></div>"
);
$_LANG["hxflagstacregulateddescrgoogle"] = ("Sie best&auml;tigen {TLD} als sicheren Namensraum, d.h. für den Betrieb eines {TLD} Domainnamens ben&ouml;tigen ein SSL Zertifikat. " .
    "Auf Webseiten einer {TLD} Domain kann nur über eine verschlüsselte und sichere HTTPS Verbindung zugegriffen werden."
);

// Generic Fields
$_LANG["hxflagsintendeduse"] = "Verwendungszweck";
$_LANG["hxflagsyesnoyes"] = "Ja";
$_LANG["hxflagsyesnono"] = "Nein";
$_LANG["hxflagsyesnoy"] = "Ja";
$_LANG["hxflagsyesnon"] = "Nein";
$_LANG["hxflagsyesno1"] = "Ja";
$_LANG["hxflagsyesno0"] = "Nein";

$_LANG["hxflagslegaltype"] = "Rechtsform";
$_LANG["hxflagslegaltypeindiv"] = "Privatperson";
$_LANG["hxflagslegaltypeorg"] = "Unternehmen";
$_LANG["hxflagsapplicationpurpose"] = "Verwendungszweck";
$_LANG["hxflagsregistrantidnumber"] = "Registrant, Identifikationsnr.";
$_LANG["hxflagsregistrantvatid"] = "Registrant, Steuernr.";
$_LANG["hxflagsadminidnumber"] = "Admin-C, Identifikationsnr.";
$_LANG["hxflagsadminvatid"] = "Admin-C, Steuernr.";
$_LANG["hxflagstechidnumber"] = "Tech-C, Identifikationsnr.";
$_LANG["hxflagstechvatid"] = "Tech-C Steuernr.";
$_LANG["hxflagsbillingidnumber"] = "Billing-C, Identifikationsnr.";
$_LANG["hxflagsregistrantidtype"] = "Registrant, Ursprung der Identifikationsnr.";
$_LANG["hxflagsallocationtoken"] = "Bestellschlüssel der Registrierungsstelle";
$_LANG["hxflagsallocationtokendescr"] = ("Um eine {TLD} Domain zu registrieren, müssen Sie den durch die Registrierungsstelle ausgestellten Bestellschlüssel angeben. " .
    "Füllen Sie bitte <a href=\"{TAC}\" target=\"_blank\">hier</a> den Antrag aus, um den Schlüssel zu erhalten."
);
$_LANG["hxflagsnexuscategory"] = "Nexus Kategorie";
$_LANG["hxflagsnexuscountry"] = "Nexus Länderschlüssel";
$_LANG["hxflagsfax"] = "Fax benötigt";
$_LANG["hxflagsfaxregistrationdescr"] = "Ich versichere <a href=\"{FAXFORM}\" target=\"_blank\">dieses Formular</a> nach Übermittlung der Registrierungsanfrage auszufüllen und zu übersenden, um den Prozess abzuschließen.";
$_LANG["hxflagsfaxtransferdescr"] = "Ich versichere <a href=\"{FAXFORM}\" target=\"_blank\">dieses Formular</a> nach Übermittlung der Transferanfrage auszufüllen und zu übersenden, um den Prozess abzuschließen.";
$_LANG["hxflagsidentificationnumber"] = "Identifikationsnr.";
$_LANG["hxflagswhoisoptout"] = "WHOIS Widerspruch";
$_LANG["hxflagsregistrantbirthdate"] = "Registrant, Geburtsdatum";

// AFNIC TLDs, prefixed with hxflagsafnic
// Individuals
// reusing .ru translations for birthday
$_LANG["hxflagsafnictldregistrantbirthplace"] = "Registrant, Geburtsort";
$_LANG["hxflagsafnictldregistrantbirthplacedescr"] = "(benötigt bei Privatpersonen)";
// Companies
$_LANG["hxflagsafnictldvatid"] = "Steuernr. oder SIREN/SIRET-Nr.";
$_LANG["hxflagsafnictldvatiddescr"] = "(Nur für Unternehmen mit Steuernr. oder SIREN/SIRET Nr.)";
$_LANG["hxflagsafnictldtrademark"] = "Markenzeichennr.";
$_LANG["hxflagsafnictldtrademarkdescr"] = "(Nur für Unternehmen mit europäischer Marke)";
$_LANG["hxflagsafnictldduns"] = "DUNS Nr.";
$_LANG["hxflagsafnictlddunsdescr"] = "(Nur für Unternehmen mit DUNS Nr.)";
$_LANG["hxflagsafnictldlocalid"] = "Regionale Kennung";
$_LANG["hxflagsafnictldlocaliddescr"] = "(Nur für Unternehmen mit regionaler Kennung)";
// French Association, Data from Journal officiel [JO]
$_LANG["hxflagsafnictldjodod"] = "Datum der Ankündigung [JO]";
$_LANG["hxflagsafnictldjododdescr"] = "(Nur für französische Verbände, Format <b>JJJJ-MM-TT</b>)";
$_LANG["hxflagsafnictldjonumber"] = "Nummer [JO]";
$_LANG["hxflagsafnictldjonumberdescr"] = "(Nur für französische Verbände, Nr. des Journal Officiel)";
$_LANG["hxflagsafnictldjopage"] = "Seite der Ankündigung [JO]";
$_LANG["hxflagsafnictldjopagedescr"] = "(Nur für französische Verbände, Seite der Ankündigung im Journal Officiel)";
$_LANG["hxflagsafnictldjodop"] = "Datum der Veröffentlichung [JO]";
$_LANG["hxflagsafnictldjodopdescr"] = "(Nur für französische Verbände, Veröffentlichungsdatum im Format <b>JJJJ-MM-TT</b>)";
// Options, Legal Type
$_LANG["hxflagsafnictldlegaltypeindiv"] = "Privatperson";
$_LANG["hxflagsafnictldlegaltypeorg1"] = "Unternehmen mit Steuernr. oder SIREN/SIRET Nr.";
$_LANG["hxflagsafnictldlegaltypeorg2"] = "Unternehmen mit europäischer Marke";
$_LANG["hxflagsafnictldlegaltypeorg3"] = "Unternehmen mit DUNS Nr.";
$_LANG["hxflagsafnictldlegaltypeorg4"] = "Unternehmen mit regionaler Kennung";
$_LANG["hxflagsafnictldlegaltypeass"] = "Französischer Verband";

// .AERO
$_LANG["hxflagsaerotldaeroid"] = ".AERO ID <sup style=\"cursor:help;\" title=\"Hier ausstellen lassen https://www.information.aero/\">was ist das?</sup>";
$_LANG["hxflagsaerotldaerokey"] = ".AERO Key <sup style=\"cursor:help;\" title=\"Hier ausstellen lassen https://www.information.aero/\">was ist das?</sup>";

// .BE
$_LANG["hxflagsbetldtradeauthdescr"] = "Die Änderung des Registranten erfordert einen gültigen EPP Code. Erforderlich, wenn der Name, die Organisation oder die E-Mail-Adresse des Registranten geändert werden.";

// .CA
$_LANG["hxflagscatldcontactlanguage"] = "Kontaktsprache";
$_LANG["hxflagscatldregistryinformation"] = "Information der Registrierungsstelle";
$_LANG["hxflagscatldregistryinformationdescr"] = ("Immer wenn Sie eine {TLD} Domain für einen neuen Registranten bestellen oder einen Besitzerwechsel zu einem neuen Registranten durchführen, so muss dieser neue Registrant die " .
    "den Vereinbarungen für Registranten innerhalb von 7 Tagen zustimmen, damit die Domain aktiviert wird. Ansonsten wird die Domain seitens der Registrierungssteller ohne Rückerstattung gelöscht. " .
    "<br/><b>Nur in einem solchen Fall erhält der Registrant eine Bestätigungemail mit allen durchzuführenden Schritten zum Akzeptieren dieser Vereinbarungen.</b><br/>" .
    "Falls ein bereits bestätigter Registrant bei einer Bestellung/Inhaberänderung benutzt wird, so wird dieser Vorgang in Echtzeit verarbeitet."
);
// Options, Legal Type
$_LANG["hxflagscatldlegaltypecco"] = "Unternehmen";
$_LANG["hxflagscatldlegaltypecct"] = "Kanadischer Staatsbürger";
$_LANG["hxflagscatldlegaltyperes"] = "Ständiger Wohnsitz in Kanada";
$_LANG["hxflagscatldlegaltypegov"] = "Regierung oder Regierungsbehörde in Kanada";
$_LANG["hxflagscatldlegaltypeedu"] = "Kanadische Bildungseinrichtung";
$_LANG["hxflagscatldlegaltypeass"] = "Kanadischer nicht eingetragener Verein";
$_LANG["hxflagscatldlegaltypehos"] = "Kanadisches Krankenhaus";
$_LANG["hxflagscatldlegaltypeprt"] = "In Kanada eingetragene Partnerschaft";
$_LANG["hxflagscatldlegaltypetdm"] = "In Kanada registrierte Marke (durch einen nicht-kanadischen Inhaber)";
$_LANG["hxflagscatldlegaltypetrd"] = "Kanadische Handelsgesellschaft";
$_LANG["hxflagscatldlegaltypeplt"] = "Kanadische politische Partei";
$_LANG["hxflagscatldlegaltypelam"] = "Kanadisches Bibliotheksarchiv oder Museum";
$_LANG["hxflagscatldlegaltypetrs"] = "In Kanada etablierter Konzern";
$_LANG["hxflagscatldlegaltypeabo"] = "Ureinwohner (Einzelpersonen oder Gruppen) uransässig in Kanada";
$_LANG["hxflagscatldlegaltypeinb"] = "Durch den Indian Act Kanadas anerkannter Indianischer Stamm";
$_LANG["hxflagscatldlegaltypelgr"] = "Rechtlicher Vertreter eines kanadischen Staatsbürgers oder ständigen Bewohners";
$_LANG["hxflagscatldlegaltypeomk"] = "Offzielle in Kanada registrierte Marke";
$_LANG["hxflagscatldlegaltypemaj"] = "Ihre Majestät die Königin";
// Legal Type Description, don't move it up.
$_LANG["hxflagscatldlegaltypedescr"] = ("<p>Die kanadische Registrierungsstelle (`CIRA`) verpflichtet sich, die Privatsphäre personenbezogener Daten während des Betriebs und der Verwaltung des Domainnamens zu schützen.</p>" .
    "<p>Registranten mit folgender kanadischer Präsenzkategorisierung werden als Privatpersonen eingestuft:</p>" .
    "<ul>" .
    "<li>" . $_LANG["hxflagscatldlegaltypecct"] . "</li>" .
    "<li>" . $_LANG["hxflagscatldlegaltyperes"] . "</li>" .
    "<li>" . $_LANG["hxflagscatldlegaltypelgr"] . "</li>" .
    "<li>" . $_LANG["hxflagscatldlegaltypeabo"] . "</li>" .
    "</ul>" .
    "<p>Alle anderen Kategorien werden nicht als Privatperson eingestuft und können aufgrunddessen Ihre WHOIS Datenschutzeinstellungen nicht ändern. In dem Fall werden die Kontaktdaten " .
    "seitens der Registrierungsstelle im WHOIS veröffentlicht und sind somit öffentlich einsehbar. Privatpersonen hingegen können dies über das Feld `" . $_LANG["hxflagswhoisoptout"] . "` untersagen.</p>"
);

// .CN
// Options, Registrant ID Type
$_LANG["hxflagscntldregistrantidtypesfz"] = "Chinesischer Personalausweis";
$_LANG["hxflagscntldregistrantidtypehz"] = "Ausländischer Reisepass";
$_LANG["hxflagscntldregistrantidtypegajmtx"] = "Ausreise-Einreise Erlaubnis zur Reise nach Hong Kong und Macao und zurück";
$_LANG["hxflagscntldregistrantidtypetwjmtx"] = "Reisepässe für Bewohner Taiwans um das Festland zu betreten oder zu belassen";
$_LANG["hxflagscntldregistrantidtypewjlsfz"] = "Ausländischer Personalausweis";
$_LANG["hxflagscntldregistrantidtypegajzz"] = "Wohnsitzerlaubnis für Bewohner von Hong Kong und Macao";
$_LANG["hxflagscntldregistrantidtypetwjzz"] = "Wohnsitzerlaubnis für Bewohner von Taiwan";
$_LANG["hxflagscntldregistrantidtypejgz"] = "Amtliches chinesisches Zertifikat";
$_LANG["hxflagscntldregistrantidtypeorg"] = "CCC Zertifikat";
$_LANG["hxflagscntldregistrantidtypeyyzz"] = "Chinesische Gewerbeerlaubnis";
$_LANG["hxflagscntldregistrantidtypetydm"] = "USCC Zertifikat";
$_LANG["hxflagscntldregistrantidtypebddm"] = "Militärische Code-Bezeichnung";
$_LANG["hxflagscntldregistrantidtypejddwfw"] = "Militärisch-bezahlte ausländische Service-Lizenz";
$_LANG["hxflagscntldregistrantidtypesydwfr"] = "Zertifikat einer juristischen Person der öffentlichen Einrichtung";
$_LANG["hxflagscntldregistrantidtypewgczjg"] = "Registrierungsformular für Ansässige Vertretungen ausländischer Unternehmen";
$_LANG["hxflagscntldregistrantidtypeshttfr"] = "Registrierungszertifikat einer juristischen Person einer sozialen Einrichtung";
$_LANG["hxflagscntldregistrantidtypezjcs"] = "Registrierungszertifikat einer relgiösen Aktivitätsseite";
$_LANG["hxflagscntldregistrantidtypembfqy"] = "Registrierungszertifikat einer privaten Nichtunternehmenseinheiten";
$_LANG["hxflagscntldregistrantidtypejjhfr"] = "Registrierungszertifikat einer juristische Person einer Stiftung";
$_LANG["hxflagscntldregistrantidtypelszy"] = "Ausübungszertifikat einer Kanzlei";
$_LANG["hxflagscntldregistrantidtypewgzhwh"] = "Registrierungszertifikat eines ausländischen Kulturzentrums in China";
$_LANG["hxflagscntldregistrantidtypewlczjg"] = "Registrierungszertifikat für ansässige Vertretungen der Touristenabteilungen einer ausländischen Regierung";
$_LANG["hxflagscntldregistrantidtypesfjd"] = "Zertifikat einer juristische Ausbildung";
$_LANG["hxflagscntldregistrantidtypejwjg"] = "Zertifikat eines Unternehmens im Ausland";
$_LANG["hxflagscntldregistrantidtypeshfwjg"] = "Registrierungszertifikat einer Sozialdienstagentur";
$_LANG["hxflagscntldregistrantidtypembxxbx"] = "Erlaubnis einer Privatschule";
$_LANG["hxflagscntldregistrantidtypeyljgzy"] = "Ausübungszertifikat einer medizinischen Einrichtung";
$_LANG["hxflagscntldregistrantidtypegzjgzy"] = "Ausübungszertifikat eines notoriellen Unternehmens";
$_LANG["hxflagscntldregistrantidtypebjwsxx"] = "Erlaubnis der Schule für Kinder ausländischer Botschaftsmitarbeiter in Beijing/China";
$_LANG["hxflagscntldregistrantidtypeqttydm"] = "Sonstiges - Zertifikat für Uniform Social Credit Code";
$_LANG["hxflagscntldregistrantidtypeqt"] = "Sonstiges";

// .COM.AU
// Options, Registrant ID Type
$_LANG["hxflagsautldregistrantidtypeabn"] = "Australische Steuernummer";
$_LANG["hxflagsautldregistrantidtypeacn"] = "Australische Firmennummer";
$_LANG["hxflagsautldregistrantidtyperbn"] = "Handelsregisternummer";
$_LANG["hxflagsautldregistrantidtypetm"] = "Markennummer";

// .COM.BR
$_LANG["hxflagscombrtldidentificationnumberdescr"] = "Bitte geben Sie Ihre CPF oder CNPJ Nummer an, welche Ihnen das staatlische Finanzministerium Brasiliens für steuerliche Zwecke ausstellt.";

// .DE
$_LANG["hxflagsdetldgeneralrequestcontact"] = "Kontakt für allg. Anfragen";
$_LANG["hxflagsdetldabuseteamcontact"] = "Kontakt für Missbrauchsmeldungen";
$_LANG["hxflagsdetldgeneralrequestcontactdescr"] = "Sie können eine Email- oder Webseitenadresse angeben";
$_LANG["hxflagsdetldabuseteamcontactdescr"] = "Sie können eine Email- oder Webseitenadresse angeben";

// .DK
$_LANG["hxflagsdktldregistrantcontact"] = "Registrant, Kontakt";
$_LANG["hxflagsdktldregistrantlegaltype"] = "Registrant, Rechtsform";
$_LANG["hxflagsdktldregistrantvatiddescr"] = "(nur bei obiger Auswahl `Unternehmen` benötigt)";
$_LANG["hxflagsdktldadminvatiddescr"] = "(nur bei obiger Auswahl `Unternehmen` benötigt)";
$_LANG["hxflagsdktldregistrantlegaltypeindiv"] = "Privatperson";
$_LANG["hxflagsdktldregistrantlegaltypeorg"] = "Unternehmen";
$_LANG["hxflagsdktldadmincontact"] = "Admin-C, Kontakt";
$_LANG["hxflagsdktldadminlegaltype"] = "Admin-C, Rechtsform";
$_LANG["hxflagsdktldadminlegaltypeindiv"] = "Privatperson";
$_LANG["hxflagsdktldadminlegaltypeorg"] = "Unternehmen";
$_LANG["hxflagsdktldlegaltypedescr"] = "Wählen Sie bitte auch `Privatperson` im Falle eines Kleinunternehmens ohne Umsatzsteuer-ID-Nr. (Firmendaten werden dann bei der Registrierung unterdrückt).";
$_LANG["hxflagsdktldregistrantlegaltypedescr"] = $_LANG["hxflagsdktldlegaltypedescr"] . "<div style=\"margin-top:10px\"><b>Hinweis für Registranten:</b> DK Hostmaster fordert eine Bestätigung via Email an. Prüfen Sie bitte Ihren Posteingang plus Spamfolder und bestätigen Sie den Vorgang innerhalb von 4 Tagen.</div>";
$_LANG["hxflagsdktldcontactdescr"] = "DK-HOSTMASTER Benutzer ID";

// .ES
$_LANG["hxflagsestldregistranttype"] = "Registrant, Typ";
$_LANG["hxflagsestldregistrantidentificationnumber"] = "Registrant, Identifikationsnr.";
$_LANG["hxflagsestldadmintype"] = "Admin-C, Typ";
$_LANG["hxflagsestldadminidentificationnumber"] = "Admin-C, Identifikationsnr.";
$_LANG["hxflagsestldlegalform"] = "Registrant, Rechtsform";
// Options, Legal Type
$_LANG["hxflagsestldlegalform1"] = "Privatperson";
$_LANG["hxflagsestldlegalform39"] = "Wirtschaftliche Interessenvereinigung";
$_LANG["hxflagsestldlegalform47"] = "Verband";
$_LANG["hxflagsestldlegalform59"] = "Sportverein";
$_LANG["hxflagsestldlegalform68"] = "Fachverband";
$_LANG["hxflagsestldlegalform124"] = "Sparkasse";
$_LANG["hxflagsestldlegalform150"] = "Gemeinschaftsgut";
$_LANG["hxflagsestldlegalform152"] = "Eigentümergemeinschaft";
$_LANG["hxflagsestldlegalform164"] = "Orden oder religiöse Einrichtung";
$_LANG["hxflagsestldlegalform181"] = "Konsulat";
$_LANG["hxflagsestldlegalform197"] = "Verband des öffentlichen Rechts";
$_LANG["hxflagsestldlegalform203"] = "Botschaft";
$_LANG["hxflagsestldlegalform229"] = "Komunalverwaltung";
$_LANG["hxflagsestldlegalform269"] = "Sportbund";
$_LANG["hxflagsestldlegalform286"] = "Stiftung";
$_LANG["hxflagsestldlegalform365"] = "Gegenseitigkeitsversicherungsgesellschaft";
$_LANG["hxflagsestldlegalform434"] = "Landesregierungsbehörde";
$_LANG["hxflagsestldlegalform436"] = "Zentrale Regierungsbehörde";
$_LANG["hxflagsestldlegalform439"] = "Politische Partei";
$_LANG["hxflagsestldlegalform476"] = "Handelsgesellschaft";
$_LANG["hxflagsestldlegalform510"] = "Landwirtschaftliche Partnerschaft";
$_LANG["hxflagsestldlegalform524"] = "Aktiengesellschaft";
$_LANG["hxflagsestldlegalform525"] = "Sportverein";
$_LANG["hxflagsestldlegalform554"] = "Zivilgesellschaft";
$_LANG["hxflagsestldlegalform560"] = "Allgemeine Partnerschaft";
$_LANG["hxflagsestldlegalform562"] = "Allgemeine und beschränkte Partnerschaft";
$_LANG["hxflagsestldlegalform566"] = "Genossenschaft";
$_LANG["hxflagsestldlegalform608"] = "Unternehmen im Belegschaftsbesitz";
$_LANG["hxflagsestldlegalform612"] = "Aktiengesellschaft";
$_LANG["hxflagsestldlegalform713"] = "Spanisches Amt";
$_LANG["hxflagsestldlegalform717"] = "Vorübergehende Unternehmenskooperation";
$_LANG["hxflagsestldlegalform744"] = "Aktiengesellschaft im Belegschaftsbesitz";
$_LANG["hxflagsestldlegalform745"] = "Regionale öffentliche Einrichtung";
$_LANG["hxflagsestldlegalform746"] = "Nationale öffentliche Einrichtung";
$_LANG["hxflagsestldlegalform747"] = "Lokale öffentliche Einrichtung";
$_LANG["hxflagsestldlegalform878"] = "Herkunftsbezeichnung Aufsichtsrat";
$_LANG["hxflagsestldlegalform879"] = "Naturräume verwaltende Entität";
$_LANG["hxflagsestldlegalform877"] = "Sonstiges";
// Options, Registrant ID Type
$_LANG["hxflagsestldregistranttype0"] = "Nicht-spanischer Besitzer";
$_LANG["hxflagsestldregistranttype1"] = "Spanische Privatperson oder Firma";
$_LANG["hxflagsestldregistranttype3"] = "Meldebescheinigung der Ausländerbehörde";
$_LANG["hxflagsestldregistranttype4"] = "Umsatzsteuer-ID";
$_LANG["hxflagsestldadmintype0"] = "Nicht-spanische Entität";
$_LANG["hxflagsestldadmintype1"] = "Spanische Privatperson oder Firma";
$_LANG["hxflagsestldadmintype3"] = "Meldebescheinigung der Ausländerbehörde";

// .EU
$_LANG["hxflagseutldregistrantcitizenship"] = "Registrant, Staatsangehörigkeit";
$_LANG["hxflagseutldregistrantcitizenshipdescr"] = "Benötigt für europäische Statsbürger (Privatpersonen) wohnhaft außerhalb der EU";
$_LANG["hxflagseutldlegaltypeindiv"] = $_LANG["hxflagslegaltypeindiv"];
$_LANG["hxflagseutldlegaltypeorg"] = $_LANG["hxflagslegaltypeorg"];

// .FI
$_LANG["hxflagsfitldregistrantidnumberdescr"] = ("<ul><li>Unternehmen: Bitte die Handelsregistrierungsnr. angeben.</li>" .
    "<li>Privatpersonen aus Finland: Bitte die Ausweisnr. angeben.</li>" .
    "<li>Sonstige Privatpersonen: Nichts angeben.</li></ul>" .
    "Die Eingabe für Privatpersonen muss aus elf Zeichen der Form `TTMMJJCZZZQ` erfolgen. Dabei entspricht `TTMMJJ` dem Geburtsdatum; " .
    "`C` dem Jahrhundertzeichen: `+` für 1800–1899, `-` für 1900–1999 oder `A` für 2000-2099;" .
    "`ZZZ` der Individuellen Nummer: ungerade für Männer, gerade für Frauen und für in Finland Geborene der Bereich 002-899 " .
    "(In Ausnahmefällen auch größere Nummern);" .
    "`Q` dem Kontrollzeichen (Prüfsumme). Beispiel für eine gültige Kennung: 311280-888Y."
);
$_LANG["hxflagsfitldregistrantbirthdatedescr"] = "(YYYY-MM-DD; only required for Individuals not from Finland)";

// .HK
$_LANG["hxflagshktldregistrantdocumenttype"] = "Registrant, Dokumenttyp";
$_LANG["hxflagshktldregistrantotherdocumenttype"] = "Registrant, anderer Dokumenttyp";
$_LANG["hxflagshktldregistrantdocumentnumber"] = "Registrant, Dokumentnr.";
$_LANG["hxflagshktldregistrantdocumentorigincountry"] = "Registrant, Ausstellungsland des Dokuments";
$_LANG["hxflagshktldregistrantbirthdateforindividuals"] = "Registrant, Geburtsdatum für Privatpersonen";
// Options, Registrant Document Type
$_LANG["hxflagshktldregistrantdocumenttypehkid"] = "Privatperson - Hong Kong Ausweisnummer";
$_LANG["hxflagshktldregistrantdocumenttypeothid"] = "Privatperson - Ausweisnummer eines anderen Landes";
$_LANG["hxflagshktldregistrantdocumenttypepassno"] = "Privatperson - Reisepassnummer";
$_LANG["hxflagshktldregistrantdocumenttypebirthcert"] = "Privatperson - Geburtsurkunde";
$_LANG["hxflagshktldregistrantdocumenttypeothidv"] = "Privatperson - Sonstiges Dokument";
$_LANG["hxflagshktldregistrantdocumenttypebr"] = "Unternehmen - Urkunde der Gewerbeanmeldung";
$_LANG["hxflagshktldregistrantdocumenttypeci"] = "Unternehmen - Gründungsurkunde";
$_LANG["hxflagshktldregistrantdocumenttypecrs"] = "Unternehmen - Registrierungsbescheinigung einer Schule";
$_LANG["hxflagshktldregistrantdocumenttypehksarg"] = "Unternehmen - Hong Kong Sonderverwaltungsregion einer Regierungsabteilung";
$_LANG["hxflagshktldregistrantdocumenttypehkordinance"] = "Unternhemen - Verordnung von Hong Kong";
$_LANG["hxflagshktldregistrantdocumenttypeothorg"] = "Unternehmen - Sonstiges Dokument";
$_LANG["hxflagshktldregistrantdocumenttypedescr"] = ("(HINWEIS: Zusätzlich könnte es erforderlich sein, dass Sie uns eine Kopie des Dokuments per Email zusenden müssen. Für .HK ist dieser Schritt nur notwendig " .
    "auf Anfrage der Registrierungsstelle. Für .COM.HK wird die Gewerbeerlaubnis benötigt, bevor der Registrierungsanfrage bearbeitet werden kann.)"
);
$_LANG["hxflagshktldregistrantotherdocumenttypedescr"] = "(benötigt für Typauswahl `Privatperson/Unternehmen - Sonstiges Dokument`)";
$_LANG["hxflagshktldregistrantbirthdateforindividualsdescr"] = "(benötigt für Privatpersonen, Format JJJJ-MM-TT)";

// .IE
$_LANG["hxflagsietldregistrantclass"] = "Registrant, Klassifizierung";
$_LANG["hxflagsietldproofofconnectiontoireland"] = "Ihre Verbindung zu Irland";
$_LANG["hxflagsietldproofofconnectiontoirelanddescr"] = ("Geben Sie bitte alle Daten zur Stützung Ihrer Registrierungsanfrage an, wie den Verbindungsnachweis (z.B. " .
    "VAT, RBN, CRO, CHY, NIC oder Markennummer; Schulrollennummer; Link zur Social-Media-Seite oder eine " .
    "kurze Erklärung warum und wofür Sie diese Domain registrieren möchten)."
);
// Options, Registrant Class
$_LANG["hxflagsietldregistrantclasscompany"] = "Unternehmen";
$_LANG["hxflagsietldregistrantclassbusinessowner"] = "Geschäftsinhaber";
$_LANG["hxflagsietldregistrantclassclubbandlocalgroup"] = "Klub/Band/Ortsverband";
$_LANG["hxflagsietldregistrantclassschoolcollege"] = "Schule/Hochschule";
$_LANG["hxflagsietldregistrantclassstateagency"] = "Staatliche Behörde";
$_LANG["hxflagsietldregistrantclasscharity"] = "Stiftung";
$_LANG["hxflagsietldregistrantclassbloggerother"] = "Blogger/Sonstiges";

// .IT
$_LANG["hxflagsittldpin"] = "PIN";
$_LANG["hxflagsittldpindescr"] = (
    "Wenn es sich bei dem Registranten um eine <b>Einzelperson</b> handelt:<ul>" .
    "<li>Die Steuernummer des Registranten (für italienische Staatsbürger bestehend aus genau 16 Zeichen und Zahlen) oder</li>" .
    "<li>Die Nummer eines Ausweisdokuments (für Bürger mit Wohnsitz in anderen EU-Staaten, in denen es keine entsprechende individuelle Steuernr. gibt).</li>" .
    "</ul>Wenn der Registrant ein <b>Unternehmen</b> ist:<ul>" .
    "<li>Die Steuernummer des Unternehmens (für italienische Unternehmen bestehend aus genau 11 Ziffern) oder</li>" .
    "<li>Die Umsatzsteuer-Identifikationsnummer des Unternehmens</li></ul>"
);
$_LANG["hxflagsittldacceptsection3"] = "Abschnitt 3 des .IT Registrarvertrags";
$_LANG["hxflagsittldacceptsection5"] = "Abschnitt 5 des .IT Registrarvertrags";
$_LANG["hxflagsittldacceptsection6"] = "Abschnitt 6 des .IT Registrarvertrags";
$_LANG["hxflagsittldacceptsection7"] = "Abschnitt 7 des .IT Registrarvertrags";
$_LANG["hxflagsittldregistrantnationality"] = "Registrant, Nationalität";
$_LANG["hxflagsittldregistrantnationalitydescr"] = "(die Nationalität des Registranten, sofern diese vom Länderschlüssel abweicht.)";
$_LANG["hxflagsittldregistrantlegaltype"] = "Registrant, Rechtsform";
$_LANG["hxflagsittldregistrantlegaltype1"] = "[1] Italienische und ausländische natürliche Person";
$_LANG["hxflagsittldregistrantlegaltype2"] = "[2] Italienisches Unternehmen / Ein-Mann-Firma";
$_LANG["hxflagsittldregistrantlegaltype3"] = "[3] Italienischer freier Mitarbeiter / Fachpersonal ";
$_LANG["hxflagsittldregistrantlegaltype4"] = "[4] Italienische gemeinnützige Organisation";
$_LANG["hxflagsittldregistrantlegaltype5"] = "[5] Italienische öffentliche Organisation";
$_LANG["hxflagsittldregistrantlegaltype6"] = "[6] Andere italienische Subjekte";
$_LANG["hxflagsittldregistrantlegaltype7"] = "[7] Organisation aus anderen EU Mitgliedsstaaten (2 - 6 zutreffend)";

// .JOBS
$_LANG["hxflagsjobstldyesnono"] = "Nein";
$_LANG["hxflagsjobstldyesnoyes"] = "Ja";
$_LANG["hxflagsjobstldwebsite"] = "Webseite";
$_LANG["hxflagsjobstldindustryclassification"] = "Branchenklassifizierung";
$_LANG["hxflagsjobstldmemberofahrassociation"] = "Mitglied eines HR Verbandes";
$_LANG["hxflagsjobstldcontactjobtitle"] = "Kontakt, Berufsbezeichnung (e.g. CEO)";
$_LANG["hxflagsjobstldcontacttype"] = "Kontakt, Typ";
// Options, Industry Classification
$_LANG["hxflagsjobstldindustryclassification2"] = "Buchhaltung/Bankwesen/Finanzwesen";
$_LANG["hxflagsjobstldindustryclassification3"] = "Agrar-/Landwirtschaft";
$_LANG["hxflagsjobstldindustryclassification21"] = "Biotechnik/Wissenschaft";
$_LANG["hxflagsjobstldindustryclassification5"] = "Computertechnik/Informationstechnologie";
$_LANG["hxflagsjobstldindustryclassification4"] = "Bauleistungen";
$_LANG["hxflagsjobstldindustryclassification12"] = "Beratung";
$_LANG["hxflagsjobstldindustryclassification6"] = "Bildung/Fortbildung/Bibliothek";
$_LANG["hxflagsjobstldindustryclassification7"] = "Unterhaltungsindustrie";
$_LANG["hxflagsjobstldindustryclassification13"] = "Umweltbranche";
$_LANG["hxflagsjobstldindustryclassification19"] = "Hotelbranche";
$_LANG["hxflagsjobstldindustryclassification10"] = "Regierung/Bürgerdienst";
$_LANG["hxflagsjobstldindustryclassification11"] = "Gesundheitswesen";
$_LANG["hxflagsjobstldindustryclassification15"] = "Personalwesen/HR";
$_LANG["hxflagsjobstldindustryclassification16"] = "Versicherungswesen";
$_LANG["hxflagsjobstldindustryclassification17"] = "Rechtsbranche";
$_LANG["hxflagsjobstldindustryclassification18"] = "Fertigung";
$_LANG["hxflagsjobstldindustryclassification20"] = "Medien/Werbung";
$_LANG["hxflagsjobstldindustryclassification9"] = "Parks & Freizeit";
$_LANG["hxflagsjobstldindustryclassification26"] = "Pharmaindustrie";
$_LANG["hxflagsjobstldindustryclassification22"] = "Immobilienbranche";
$_LANG["hxflagsjobstldindustryclassification14"] = "Restaurant/Nahrungsmitteldienstleistung";
$_LANG["hxflagsjobstldindustryclassification23"] = "Einzelhandel";
$_LANG["hxflagsjobstldindustryclassification8"] = "Telemarketing";
$_LANG["hxflagsjobstldindustryclassification24"] = "Transportindustrie";
$_LANG["hxflagsjobstldindustryclassification25"] = "Sonstiges";
// Options, Contact Type
$_LANG["hxflagsjobstldcontacttype1"] = "Administrativ";
$_LANG["hxflagsjobstldcontacttype0"] = "Sonstiges";

// .LOTTO
$_LANG["hxflagslottotldmembershipcontactid"] = "Mitglied, Kontakt ID";
$_LANG["hxflagslottotldverificationcode"] = "Verifizierungscode";

// .LT
$_LANG["hxflagslttldlegalentityidentificationcode"] = "Rechtsträger, Identifikationsnr.";

// .MELBOURNE
// Options, Nexus Category
$_LANG["hxflagsmelbournetldnexuscategorya"] = "Unternehmen von Victoria";
$_LANG["hxflagsmelbournetldnexuscategoryb"] = "Bewohner von Victoria";
$_LANG["hxflagsmelbournetldnexuscategoryc"] = "Assoziiertes Unternehmen";
$_LANG["hxflagsmelbournetldnexuscategorydescr"] = ("<div style=\"padding:10px 0px;text-align:justify\"><b>Registrierungsberechtigung</b><br/>" .
    "Um eine Domain zu verlängern oder zu registrieren muss der Besitzer oder Registrant eine der folgenden Kriterien A, B oder C erfüllen:<br/><br/>" .
    "<b>Kriterium A – Unternehmen von Victoria</b><br/>Der Registrant muss ein im <a href=\"https://register.business.gov.au/\" target=\"_blank\">australischen Handelsregister</a> oder über die " .
    "`<a href=\"https://asic.gov.au/\" target=\"_blank\">Australian Securities and Investment Commission</a>` registriertes Unternehmen sein. Der Registrant <ul>" .
    "<li>hat eine mit seiner ABN, ACN, RBN oder ARBN Nummer verknüpfte Adresse im Staat Victoria, oder</li>" .
    "<li>hat eine gültige Firmenanschrift im Staat Victoria.</li></ul><br/>" .
    "<b>Kritermium B – Bewohner von Victoria</b><br/>Der Registrant muss ein australischer Staatbürger sein oder eine gültige Wohnsitzadresse im Staat Victoria vorweisen können.<br/><br/>" .
    "<b>Kritermium C – Assoziiertes Unternehmen</b><br/>Der Registrant muss ein assoziiertes Unternehmen sein. Er kann sich nur um einen Domainnamen bewerben, der in Bezug folgender Punkte " .
    " einer Abkürzung, einem Akronym oder einem direkten oder nur teilweisen Treffer entspricht:" .
    "<ul><li>Firmenname oder Name/Rufname/Pseudonym des Registranten, wobei der Firmenname bei der für den Geschäftsbereich zuständigen Behörde registiert sein muss,</li>" .
    "<li>ein Produkt welches durch das assoziierte Unternehmen selbst hergestellt oder an Firmen und Privatkunden im Staat Victoria verkauft wird,</li>" .
    "<li>eine Dienstleistung des Unternehmens, die Bewohnern des Staats Victoria angeboten wird,</li>" .
    "<li>eine Veranstaltung im Staat Victoria, welche das Unternehmen organisiert oder fördert,</li>" .
    "<li>eine Tätigkeit, die das Unternehmen im Staat Victoria erleichtert,</li>" .
    "<li>für die Bewohner des Staats Vicoria bereitgestellter Kurs oder bereitgestelltes Ausbildungsprogramm.</li></ul></div>"
);

// .MY
$_LANG["hxflagsmytldregistrantorganisationtype"] = "Registrant, Unternehmenstyp";
// Options, Registrant Organisation Type
$_LANG["hxflagsmytldregistrantorganisationtype1"] = "Architekturbüro";
$_LANG["hxflagsmytldregistrantorganisationtype2"] = "Wirtschaftprüfungsgesellschaft";
$_LANG["hxflagsmytldregistrantorganisationtype3"] = "Geschäftsbetrieb gemäß `Business Registration Act (ROB)`";
$_LANG["hxflagsmytldregistrantorganisationtype4"] = "Geschäftsbetrieb gemäß Gewerbescheinverordnung";
$_LANG["hxflagsmytldregistrantorganisationtype5"] = "Unternehmen gemäß `Companies Act (ROC)`";
$_LANG["hxflagsmytldregistrantorganisationtype6"] = "Durch zuständige Regierungsstelle/Behörde akreditierte/registrierte Bildungsstätte";
$_LANG["hxflagsmytldregistrantorganisationtype7"] = "Organisation der Landwirte";
$_LANG["hxflagsmytldregistrantorganisationtype8"] = "Bundesregierungsbehörde/-stelle";
$_LANG["hxflagsmytldregistrantorganisationtype9"] = "Ausländische Botschaft";
$_LANG["hxflagsmytldregistrantorganisationtype10"] = "Auswärtiges Amt";
$_LANG["hxflagsmytldregistrantorganisationtype11"] = "staatlich geförderte Grund- oder weiterführende Schule";
$_LANG["hxflagsmytldregistrantorganisationtype12"] = "Anwaltskanzlei";
$_LANG["hxflagsmytldregistrantorganisationtype13"] = "Lembaga (Board)";
$_LANG["hxflagsmytldregistrantorganisationtype14"] = "Kommunalbehörde/-stelle";
$_LANG["hxflagsmytldregistrantorganisationtype15"] = "MARA Junior Science College (MRSM)";
$_LANG["hxflagsmytldregistrantorganisationtype16"] = "Abteilung/Dienststelle des Verteidigunsministeriums";
$_LANG["hxflagsmytldregistrantorganisationtype17"] = "Briefkastenfirma";
$_LANG["hxflagsmytldregistrantorganisationtype18"] = "Eltern/Lehrerverband";
$_LANG["hxflagsmytldregistrantorganisationtype19"] = "Fachhochschule unter Leitung des Bildungsministeriums";
$_LANG["hxflagsmytldregistrantorganisationtype20"] = "Private höhere Bildungsstätte";
$_LANG["hxflagsmytldregistrantorganisationtype21"] = "Privatschule";
$_LANG["hxflagsmytldregistrantorganisationtype22"] = "Regionalbüro";
$_LANG["hxflagsmytldregistrantorganisationtype23"] = "Religiöse Einheit";
$_LANG["hxflagsmytldregistrantorganisationtype24"] = "Vetretungsbüro";
$_LANG["hxflagsmytldregistrantorganisationtype25"] = "Gesellschaft gemäß `Societies Act (ROS)`";
$_LANG["hxflagsmytldregistrantorganisationtype26"] = "Organisation des Sports";
$_LANG["hxflagsmytldregistrantorganisationtype27"] = "Landesregierungsbehörde/-stelle";
$_LANG["hxflagsmytldregistrantorganisationtype28"] = "Handelsgesellschaft";
$_LANG["hxflagsmytldregistrantorganisationtype29"] = "Treuhänder";
$_LANG["hxflagsmytldregistrantorganisationtype30"] = "Universität unter Leitung des Bildungsministeriums";
$_LANG["hxflagsmytldregistrantorganisationtype31"] = "Gutachter-, Sachverständigen-, Immobiliengunternehmen";

// .NO
$_LANG["hxflagsnotldregistrantidnumberdescr"] = ("Norwegische Umsatzsteuer-Identifikationsnummer oder eine persönliche ID (PID <a href='https://pid.norid.no/personid/lookup' target='_blank'>Person-ID</a>) ist erforderlich.");

// .NU
$_LANG["hxflagsnutldregistrantlegaltype"] = "Registrant, Rechtsform";
$_LANG["hxflagsnutldregistrantlegaltypeother"] = "Andere";
$_LANG["hxflagsnutldregistrantlegaltypeorgeu"] = "EU Unternehmen außerhalb von Schweden";
$_LANG["hxflagsnutldregistrantidnumberdescr"] = ("<b>Für in Schweden ansässige Privatpersonen und Unternehmen</b> muss eine gültige swedische Personalausweisnr. oder gleichwertige Firmennr. angegeben werden.<br/>" .
    "<b>Für Privatpersonen und Unternehmen mit Sitz außerhalb von Schweden</b> muss eine Kennnr. angegeben werden (e.g. Personalausweisnr., Handelsregisternr. o.ä.)."
);
$_LANG["hxflagsnutldvatiddescr"] = "(Nur benötigt für Unternehmen mit Sitz in der EU, aber außerhalb von Schweden)";

// .NYC
// Options, Nexus Category
$_LANG["hxflagsnyctldnexuscategory1"] = "Natürliche Person mit primärem Wohnsitz in NYC";
$_LANG["hxflagsnyctldnexuscategory2"] = "Entität oder Unternehmen mit primärem Wohnsitz in NYC";
$_LANG["hxflagsnyctldnexuscategorydescr"] = "(Postfächer sind unzulässig, siehe <a href=\"{TAC}\" target=\"_blank\">.NYC Nexus-Richtlinien</a>.)";

// .PRO
$_LANG["hxflagsprotldprofession"] = "Beruf";
$_LANG["hxflagsprotldlicensenumber"] = "Lizenznummber";
$_LANG["hxflagsprotldauthority"] = "Behörde";
$_LANG["hxflagsprotldauthoritywebsite"] = "Webseite der Behörde";

// .PT
$_LANG["hxflagspttldroid"] = "ROID";

// .RO
$_LANG["hxflagsrotldregistrantvatiddescr"] = "(benötigt bei Staaten der EU, SOWIE bei rumänischen Registranten)";

// .RU
$_LANG["hxflagsrutldlegaltypeindiv"] = "Privatperson";
$_LANG["hxflagsrutldlegaltypeorg"] = "Unternehmen";
$_LANG["hxflagsrutldregistrantbirthday"] = "Registrant, Geburtstag";
$_LANG["hxflagsrutldregistrantbirthdaydescr"] = "(benötigt bei Privatpersonen, YYYY-MM-DD)";
$_LANG["hxflagsrutldregistrantpassportdata"] = "Registrant, Ausweisdaten";
$_LANG["hxflagsrutldregistrantpassportdatadescr"] = "(benötigt bei Privatpersonen; inkl. Reisepassnummer, Ausstellungsdatum u. -ort)<br/><br/>";

// .SE
$_LANG["hxflagssetldidentificationnumberdescr"] = ("<div style=\"text-align:justify\"><b>Bei Privatpersonen und Unternehmen mit Sitz in Schweden</b> muss eine gültige schwedische Identifikations- oder Firmennummer angegeben werden.<br/>" .
    "<b>Bei Privatpersonen oder Firmen außerhalb von Schweden</b> muss eine Identifizierungsnummer angegeben werden (z.B. bürgerliche Meldenr., Handelsregisternr., oder vergleichbar).</div>"
);

// .SG
$_LANG["hxflagssgtldrcbsingaporeid"] = "RCB/Singapore ID";

// .SWISS
$_LANG["hxflagsswisstlduid"] = "Registrant, ID";
$_LANG["hxflagsswisstlduiddescr"] = "(Die ID ist im spezifischen Kontext von {TLD} basierend auf den aktuellen Regeln die Schweizer UID/UPI/IDE/IDI.<br/>Format für natürliche Personen: „756.dddd.dddd.dd“, das dedizierte Format für UPI / Universal Person Identification.<br/>Format für Organisationen: „CHE-ddd.ddd.ddd“, das spezielle Format für die Unternehmensidentifikationsnummer oder Unternehmens-ID.<br/>d = Ziffer)";
$_LANG["hxflagsswisstldownertype"] = "Registrant, Typ";
$_LANG["hxflagsswisstldownertypep"] = "Natürliche Person";
$_LANG["hxflagsswisstldownertypeo"] = "Unternehmen";
$_LANG["hxflagsswisstldownertypedescr"] = "(Der Inhabertyp, im spezifischen Kontext von {TLD} basierend auf den geltenden Regeln, je nach Antrag für natürliche Personen oder Organisationen)";

// .SYDNEY
// Options, Nexus Category
$_LANG["hxflagssydneytldnexuscategorya"] = "Kriterium A - Unternehmen von New South Wales";
$_LANG["hxflagssydneytldnexuscategoryb"] = "Kriterium B - Bewohner von New South Wales";
$_LANG["hxflagssydneytldnexuscategoryc"] = "Kriterium C - Assoziierte Unternehmen";
$_LANG["hxflagssydneytldnexuscategorydescr"] = ("Um einen {TLD} Domainnamen zu verlängern oder zu registrieren, muss der Antragsteller/Registrant eine der folgenden Kriterien A, B oder C erfüllen:<br/><br/>" .
    "<b>Kriterium A – Unternehmen von New South Wales</b><br/>" .
    "Der Antragsteller muss ein Unternehmen sein, welches über `Australian Securities and Investments Commission` registiert ist oder im Australischen Handelsregister eingetragen ist und " .
    "hat im Staat New South Wales eine mit seiner ABN-, ACN-, RBN- oder ARBN-Nr. verknüpften Adresse oder eine dort gültige Firmenadresse.<br/>" .
    "<b>Kriterium B – Bewohnt von New South Wales</b><br/>Der Antragsteller ist ein australischer Staatsbürger oder Bewohner mit gültiger Adresse im Staat New South Wales.<br/>" .
    "<b>Kriterium C – Assoziierte Unternehmen</b><br/>Der Antragsteller muss ein assoziiertes Unternehmen sein und darf sich nur dann um einen Domainnamen bewerben, wenn dieser in Bezug " .
    "folgender Punkte einer Abkürzung, einem Akronym oder einem direkten oder nur teilweisen Treffer entspricht:<br/>" .
    "<ul><li>Firmenname oder Name/Rufname/Pseudonym des Registranten, wobei der Firmenname bei der für den Geschäftsbereich zuständigen Behörde registiert sein muss,</li>" .
    "<li>ein Produkt welches durch das assoziierte Unternehmen selbst hergestellt oder an Firmen und Privatkunden im Staat New South Wales verkauft wird,</li>" .
    "<li>eine Dienstleistung des Unternehmens, die Bewohnern des Staats New Sout Wales angeboten wird,</li>" .
    "<li>eine Veranstaltung im Staat New South Wales, welche das Unternehmen organisiert oder fördert,</li>" .
    "<li>eine Tätigkeit, die das Unternehmen im Staat New Sout Wales erleichtert,</li><li>für die Bewohner des Staats New South Wales bereitgestellter Kurs oder bereitgestelltes Ausbildungsprogramm.</li></ul>"
);

// .TRAVEL
$_LANG["hxflagstraveltldtravelindustry"] = "Verbindung zur Reisebranche";
$_LANG["hxflagstraveltldtravelindustrydescr"] = "(Wir bestätigen eine Verbindnung zur Reisebranche und daß wir an reisebezogenen Aktivitäten beteiligt sind oder dies planen.)";
$_LANG["hxflagstraveltldyesno1"] = "Ja";
$_LANG["hxflagstraveltldyesno0"] = "Nein";

// .US
// Options, Intended Use
$_LANG["hxflagsustldapplicationpurposep1"] = "Geschäft zu Profitzwecken";
$_LANG["hxflagsustldapplicationpurposep2"] = "Nicht-kommerzielles Unternehmen / Klub / Verein / religiöse Vereinigung";
$_LANG["hxflagsustldapplicationpurposep3"] = "Privatgebrauch";
$_LANG["hxflagsustldapplicationpurposep4"] = "Bildungszwecke";
$_LANG["hxflagsustldapplicationpurposep5"] = "Regierungszwecke";
// Options, Nexus Category, https://www.about.us/policies/ustld-nexus-codes
$_LANG["hxflagsustldnexuscategoryc11"] = "[C11] Natürliche Person - Bürger der Vereinigten Staaten";
$_LANG["hxflagsustldnexuscategoryc12"] = "[C12] Natürliche Person - Ständiger Wohnsitz in den USA oder in einem der zugehörigen Gebiete/Territorien";
$_LANG["hxflagsustldnexuscategoryc21"] = "[C21] Eine U.S.-Organisation oder Firma; Details s.u.";
$_LANG["hxflagsustldnexuscategoryc31"] = "[C31] Eine ausländische Entität oder Firma; Details s.u.";
$_LANG["hxflagsustldnexuscategoryc32"] = "[C32] Ein ausländisches Unternehmen mit Büro oder Werk in den Vereinigten Staaten";
$_LANG["hxflagsustldnexuscategorycdescr"] = ("<ul><li>[C21]: Eine U.S.-Organisation oder Firma; in einem der 50 U.S. Staaten, im Bezirk Columbien oder in einem der US-Gebiete/Territorien gegründet " .
    "oder aufgebaut wurde, oder anderweitig unter der Gesetzen der USA, des Bezirks Columbien oder in einem der US-Gebiete/Territorien errichtet wurde " .
    "oder eine U.S. Bundes-, Landes-, Kommunalbehörde oder eine Gebietskörperschaft davon.</li>" .
    "<li>[C31]: Eine ausländische Entität oder Firma mit echter Präsenz in den USA oder in einem der zugehörigen Gebiete/Territorien, die sich regelmäßig mit " .
    "gesetzlichen Angelegenheiten, Güterverkauf, Dienstleistungen oder sonstigen kommerziellen oder nicht-kommerziellen Geschäften befasst inkl. gemeinnützige " .
    "Beziehungen zu den Vereinigte Staaten</li></ul>"
);
$_LANG["hxflagsustldnexuscountrydescr"] = "<div>Geben Sie die ursprüngliche Staatsbürgerschaft des Registranten an (NUR benötigt für die letzen beiden Optionen der Nexus Kategorie (C31 oder C32)).</div>";

// .XXX
$_LANG["hxflagsxxxtldnonresolvingdomain"] = "NICHT-Auflösende Domain";
$_LANG["hxflagsxxxtldmembershipid"] = ".XXX Mitgliedsnr.";
$_LANG["hxflagsxxxtldmembershipiddescr"] = "(Benötigt, damit Ihre .XXX Domain auflöst)";
// Options, Non-Resolving Domain
$_LANG["hxflagsxxxtldnonresolvingdomain0"] = "Nein - dieser Domainname SOLL auflösen.";
$_LANG["hxflagsxxxtldnonresolvingdomain1"] = "Ja - dieser Domainname SOLL NICHT auflösen";

// ----------------------------------------------------------------------
// ----------------------- WHOIS PRIVACY --------------------------------
// ----------------------------------------------------------------------
$_LANG["hxwhoisprivacy"] = "WHOIS Datenschutz";
$_LANG["hxwhoisprivacyrequestsuccess"] = "Änderungen für WHOIS Datenschutzdienst ausgerollt.";
$_LANG["hxwhoisprivacywhy"] = "Warum ist WHOIS Datenschutz so wichtig?";
$_LANG["hxwhoisprivacyreason"] = ("Bei der Registrierung von Domainnamen müssen persönliche Daten angegeben werden, welche dauerhaft von WHOIS Servern von Drittanbietern verwaltet werden. " .
    "Das bedeutet, dass Ihr Name, Ihre Adresse / Telefonnummer / Email-Adresse ohne Einschränkung gespeichert und vorgehalten werden. Einige Registrierungsstellen bieten Ihren eigenen " .
    "kostenlosen WHOIS Datenschutzdienst an, welcher es ermöglicht WHOIS Informationen für Dritte uneinsehbar zu machen."
);
$_LANG["hxwhoisprivacystatus"] = "WHOIS Datenschutz, Status";
$_LANG["hxwhoisprivacystatus1"] = "Ihre WHOIS Daten sind derzeit geschützt";
$_LANG["hxwhoisprivacystatus0"] = "Ihre WHOIS Daten sind derzeit ungeschützt";
$_LANG["hxwhoisprivacystatusnp"] = "Der WHOIS Datenschutzdienst ist NUR für Privatpersonen verfügbar";
$_LANG["hxwhoisprivacybttnenable"] = "Aktivieren";
$_LANG["hxwhoisprivacybttndisable"] = "Deaktivieren";

// ----------------------------------------------------------------------
// ----------------------- Private Nameservers List ---------------------
// ----------------------------------------------------------------------
$_LANG["hxpnslist"] = "private Nameserver Übersicht";
$_LANG["hxpnscolpns"] = "privater Nameserver";
$_LANG["hxpnscolip"] = "IP Adresse";
$_LANG["hxpnsempty"] = "Keine privaten Nameserver unter dieser Domain registiert.";

// ----------------------------------------------------------------------
// ----------------------- Web Apps -------------------------------------
// ----------------------------------------------------------------------
$_LANG["hxwebapps"] = "Web-Apps";

// ----------------------------------------------------------------------
// ------------------ Contact Information -------------------------------
// ----------------------------------------------------------------------
$_LANG["hxdomaincontactstradeinfo"] = ("Änderungen an den Kontaktdaten des Registranten können zu einem sogenannten Trade-Prozess " .
    "führen, der in manchen Fällen nicht in Echtzeit abgeschlossen wird. Bitte haben Sie Geduld, " .
    "wenn Änderungen nicht sofort übernommen werden."
);
// ----------------------------------------------------------------------
// ------------------ .CA Contact Confirmation --------------------------
// ----------------------------------------------------------------------
$_LANG["hxcacontactconfirmation"] = ".CA Kontaktbestätigung";
$_LANG["hxcacontactconfirmationdescr"] = "Bitte besuchen Sie <a href=\"https://www.cira.ca/registrant-agreement\" target=\"_blank\">https://cira.ca</a> und verwenden Sie die unten angegebene ID, um die CIRA-Registrierungsvereinbarung zu bestätigen. Wird derselbe (bereits bestätigte) Registrantenkontakt zur Registrierung einer weiteren .CA-Domain verwendet, erfolgt die Registrierung der Domain in Echtzeit.";

// ----------------------------------------------------------------------
// ------------------ DNSSEC --------------------------------------------
// ----------------------------------------------------------------------

// Statusmeldungen
$_LANG["dnssecautomaticupdatesuccessmsg"] = "DNSSEC wurde für Ihre Domain <span style=\"color:green;font-weight:bold;\">aktiviert</span>.<br> Die DNSSEC-Datensätze wurden aus Ihrer DNS-Zone importiert und bei Ihrem Domain-Registrar aktualisiert.<br><br><span style=\"color:#007bff;\">Zu Ihrer Sicherheit hilft DNSSEC, Ihre Domain vor bestimmten Arten von Angriffen zu schützen, indem DNS-Antworten validiert werden.</span>";
$_LANG["dnssecautoenable"] = "DNSSEC aktivieren und DNSSEC-Einträge automatisch aus der DNS-Zone importieren";
$_LANG["dnssecsyncrecords"] = "DNSSEC-Einträge aus der DNS-Zone synchronisieren";

// Verwaltung von Einträgen
$_LANG["dnssecaddnewdskey"] = "Neue DS-Schlüssel hinzufügen";
$_LANG["dnssecaddnewkeyrecord"] = "Neuen Schlüssel-Eintrag hinzufügen";

// Modal-Dialog
$_LANG["dnssecconfirmdisable"] = "Sind Sie sicher, dass Sie DNSSEC für diese Domain deaktivieren möchten? Diese Aktion kann die Domainauflösung beeinflussen.";
$_LANG["dnssecmodaltitle"] = "DNSSEC deaktivieren";
$_LANG["dnssecmodalcancel"] = "Abbrechen";
$_LANG["dnssecmodaldisable"] = "DNSSEC deaktivieren";
