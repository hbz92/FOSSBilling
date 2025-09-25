<?php

// #########################################################################
// #########################################################################
// # Add translations for CNR registrar module additional domain fields    #
// #########################################################################
// #########################################################################

// ----------------------------------------------------------------------
// ------------------ .DK Checkout Page ---------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrdkcheckoutheading"] = ".dk domain names terms & conditions";
$_LANG["cnrdkcheckoutintro"] = "To register a .dk domain name, you have to enter into an agreement with Punktum.dk A/S. Punktum dk is the administrator for all .dk domain names.";
$_LANG["cnrdkcheckoutdomains"] = "Domain names:";
$_LANG["cnrdkcheckoutregistrant"] = "Registrant:";
$_LANG["cnrdkcheckoutregistrantaddress"] = "see above";
$_LANG["cnrdkcheckoutadmin"] = "Domain Administrator:";
$_LANG["cnrdkcheckoutadminaddress"] = "Punktum dk A/S<br/>Ørestads Boulevard 108, 11th floor<br/>DK-2300 Copenhagen S";
$_LANG["cnrdkcheckouttac"] = implode("<br/><br/>", [
    "I hereby agree to enter into an agreement on the right to use the specified .dk domain name according to the terms applicable hereto. Among other things, this means that I will ensure that my contact details as a registrant are accurate at all times. I will perform Punktum dk A/S' identity check when requested to do so.",
    "My right to use the specified .dk domain name may be transferred, suspended, deleted, or blocked according to the conditions set out in Punktum dk A/S' terms of use.",
    "Pursuant to Section 18 (2) (13) of the Danish Consumer Contract Act, I agree to renounce the right to withdraw from the agreement on the right to use the specified .dk domain name.",
    "I give my consent for Punktum dk A/S, as domain administrator, to use my personal data in accordance with its personal data policy.",
    "I agree that I will pay to this provider the fee for the first registration period for the specified .dk domain name, and that payment for subsequent registration periods depends on my choice of management arrangement, cf. section 2.1 of Punktum dk A/S' terms and conditions."
]);
$_LANG["cnrdkcheckouttacurl"] = "https://www.punktum.dk/en/articles/terms-and-conditions-for-the-right-of-use-to-a-dk-domain-name";
$_LANG["cnrdkcheckouttacurltext"] = "Terms and Conditions for the right of use to a .dk domain name";
$_LANG["cnrdkcheckoutpolicyurl"] = "https://www.punktum.dk/en/articles/privacy-policy";
$_LANG["cnrdkcheckoutpolicyurltext"] = "Privacy Policy";
$_LANG["cnrdkcheckoutabouturl"] = "https://www.punktum.dk/en/about-us";
$_LANG["cnrdkcheckoutabouturltext"] = "About Punktum dk A/S";
$_LANG["cnrdkcheckouttacagree"] = "Yes, I accept the user agreement with Punktum dk A/S.";

// ----------------------------------------------------------------------
// ------------------ Common CNR Translations ---------------------------
// ----------------------------------------------------------------------
$_LANG["cnrchoose"] = "Please Choose";
$_LANG["cnroptional"] = "optional";
$_LANG["cnr1"] = "Yes";
$_LANG["cnr0"] = "No";
$_LANG["cnrconsentforpublishing"] = "Registrant, Consent for Publishing";
// .abogado, .aero, .attorney, .bank, .broker, .dentist, .forex, .insurance, .lotto, .law, .lawyer, .markets, .trading
$_LANG["cnrxallocationtoken"] = "Registry's Allocation Token";
$_LANG["cnrxallocationtokendescr"] = "Only required for Premium Domains. Issued by the registry provider. Let us know if you need help with that.";
// .app, .page, .dev, .new, .day, .channel, .boo, .foo, .zip, .mov, .nexus, .dad, .phd, .prof, .esq, .rsvp, .meme, .ing, .new
$_LANG["cnrxacceptsslrequirement"] = "SSL Requirements";
$_LANG["cnrxacceptsslrequirementdescr"] = "I confirm that I understand and accept the requirements for HTTPS / an SSL certificate. This TLD is a more secure domain, which means HTTPS is required for all websites. You can buy your domain name now, but for it to work properly in browsers, you need to configure HTTPS based on an SSL certificate.";
$_LANG["cnrxacceptsslrequirement0"] = $_LANG["cnr0"];
$_LANG["cnrxacceptsslrequirement1"] = $_LANG["cnr1"];
// .attorney, .dentist, .lawyer
$_LANG["cnrxunitedtldregulatorydata"] = "Regulatory Body Information";
$_LANG["cnrxunitedtldregulatorydatadescr"] = "Extension containing information about the approving authority/controlling authority/regulatory body";
// .barcelona, .cat, .madrid, .scot, .sport, .swiss
$_LANG["cnrxintendeduse"] = "Intended Use";
$_LANG["cnrxintendedusedescr"] = implode("<br/>", [
    "Statement of intended use for the domain name. If applicable, please include an explicit reference to the applicants' claimed right to the name (if not the corporate name of the applicant).",
    "For example, if the domain name matches a trademark, the TM number must be provided (max. 256 characters)."
]);
// .mk
$_LANG["cnrxcompanyvatid"] = "Registrant, Company VAT ID";
// $_LANG["cnrxcompanyvatiddescr"] = "";
// .nu, .se
$_LANG["cnrxrequestauthcode"] = "Request new EPP Code";
$_LANG["cnrxrequestauthcode0"] = $_LANG["cnr0"];
$_LANG["cnrxrequestauthcode1"] = $_LANG["cnr1"];
$_LANG["cnrxrequestauthcodedescr"] = "If you want to transfer the domain to another registrar, you need the Auth Code. We will send it to the domain owner's email address.";

// NOTE: The following translations are labeled as boilerplate and should
// be used as a template for other languages. English texts are returned
// by default from the CNR Backend System. If you want to override these
// default texts, please consider a language override file in WHMCS using
// the below translation keys.
// We added some translations to override the API defaults which sometimes
// suck.

// ----------------------------------------------------------------------
// ------------------ .AERO Fields, Boilerplate -------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxaeroensauthid"] = "Membership ID";
$_LANG["cnrxaeroensauthiddescr"] = "The .AERO Membership ID is needed to register a domain in aviation. You can apply for it <a style=\"text-decoration:underline\" href=\"https://information.aero/node/add/request-aero-id\" target=\"_blank\">here</a>.";
$_LANG["cnrxaeroensauthkey"] = "Membership Password";
$_LANG["cnrxaeroensauthkeydescr"] = "The respective password/authcode provided by the above website at the same time as the .AERO Membership ID.";

// ----------------------------------------------------------------------
// ------------------ .AU Fields, Boilerplate ---------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxaudomainrelation"] = "Relationship";
// $_LANG["cnrxaudomainrelation1"] = "Second Level Domain name is an exact match⸴ an acronym or abbreviation of the company or trading name⸴ organisation or association name⸴ or trademark.";
$_LANG["cnrxaudomainrelation2"] = "Second Level Domain name is closely and substantially connected to the organisation or activities undertaken by the organisation.";
// $_LANG["cnrxaudomainrelationdescr"] = "This indicates the relationship between the Eligibility Type (e.g. business name) and domain name.";
$_LANG["cnrxaudomainrelationtype"] = "Relation Type";
$_LANG["cnrxaudomainrelationtypecompany"] = "Company";
$_LANG["cnrxaudomainrelationtyperegisteredbusiness"] = "Registered Business";
$_LANG["cnrxaudomainrelationtypesoletrader"] = "Sole Trader";
$_LANG["cnrxaudomainrelationtypepartnership"] = "Partnership";
$_LANG["cnrxaudomainrelationtypetrademarkowner"] = "Trademark Owner";
$_LANG["cnrxaudomainrelationtypependingtmowner"] = "Pending Trademark Owner";
$_LANG["cnrxaudomainrelationtypecitizenresident"] = "Citizen / Resident"; // .id.au only
$_LANG["cnrxaudomainrelationtypeincorporatedassociation"] = "Incorporated Association";
$_LANG["cnrxaudomainrelationtypeclub"] = "Club";
$_LANG["cnrxaudomainrelationtypenonprofitorganisation"] = "Non-profit Organization";
$_LANG["cnrxaudomainrelationtypecharity"] = "Charity";
$_LANG["cnrxaudomainrelationtypetradeunion"] = "Trade Union";
$_LANG["cnrxaudomainrelationtypeindustrybody"] = "Industry Body";
$_LANG["cnrxaudomainrelationtypecommercialstatutorybody"] = "Commercial Statutory Body";
$_LANG["cnrxaudomainrelationtypepoliticalparty"] = "Political Party";
$_LANG["cnrxaudomainrelationtypeother"] = "Other";
$_LANG["cnrxaudomainrelationtypereligiouschurchgroup"] = "Religious / Church Group";
$_LANG["cnrxaudomainrelationtypehighereducationinstitution"] = "Higher Education Institution";
$_LANG["cnrxaudomainrelationtyperesearchorganisation"] = "Research Organisation";
$_LANG["cnrxaudomainrelationtypegovernmentschool"] = "Government School";
$_LANG["cnrxaudomainrelationtypechildcarecentre"] = "Child Care Centre";
$_LANG["cnrxaudomainrelationtypepreschool"] = "Preschool";
$_LANG["cnrxaudomainrelationtypenationalbody"] = "National Body";
$_LANG["cnrxaudomainrelationtypetrainingorganisation"] = "Training Organisation";
$_LANG["cnrxaudomainrelationtypenongovernmentschool"] = "Non-Government School";
$_LANG["cnrxaudomainrelationtypeunincorporatedassociation"] = "Unincorporated Association";
$_LANG["cnrxaudomainrelationtypeindustryorganisation"] = "Industry Organisation";
$_LANG["cnrxaudomainrelationtyperegistrablebody"] = "Registrable Body";
$_LANG["cnrxaudomainrelationtypeindigenouscorporation"] = "Indigenous Corporation";
$_LANG["cnrxaudomainrelationtyperegisteredorganisation"] = "Registered Organisation";
$_LANG["cnrxaudomainrelationtypetrust"] = "Trust";
$_LANG["cnrxaudomainrelationtypeeducationalinstitution"] = "Educational Institution";
$_LANG["cnrxaudomainrelationtypecommonwealthentity"] = "Commonwealth Entity";
$_LANG["cnrxaudomainrelationtypestatutorybody"] = "Statutory Body";
$_LANG["cnrxaudomainrelationtypetradingcooperative"] = "Trading Cooperative";
$_LANG["cnrxaudomainrelationtypecompanylimitedbyguarantee"] = "Company Limited by Guarantee";
$_LANG["cnrxaudomainrelationtypenondistributingcooperative"] = "Non-Distributing Cooperative";
$_LANG["cnrxaudomainrelationtypenontradingcooperative"] = "Non-Trading Cooperative";
$_LANG["cnrxaudomainrelationtypecharitabletrust"] = "Charitable Trust";
$_LANG["cnrxaudomainrelationtypepublicprivateancillaryfund"] = "Public / Private Ancillary Fund";
$_LANG["cnrxaudomainrelationtypepeakstateterritorybody"] = "Peak State / Territory Body";
$_LANG["cnrxaudomainrelationtypenotforprofitcommunitygroup"] = "Not-for-Profit Community Group";
$_LANG["cnrxaudomainrelationtypeeducationandcareserviceschildcare"] = "Education and Care Services (Child Care)";
$_LANG["cnrxaudomainrelationtypegovernmentbody"] = "Government Body";
$_LANG["cnrxaudomainrelationtypeproviderofnonaccreditedtraining"] = "Provider of Non-Accredited Training";
// $_LANG["cnrxaudomainrelationtypedescr"] = "Specify what makes the registrant eligible to register the domain name";
$_LANG["cnrxauownerorganization"] = "Registrant, Organization";
$_LANG["cnrxauownerorganizationdescr"] = "The Organization (Registrant) name";
$_LANG["cnrxauidwarranty"] = "Registrant,<br>is AU Citizen or Resident";
$_LANG["cnrxauidwarranty0"] = $_LANG["cnr0"];
$_LANG["cnrxauidwarranty1"] = $_LANG["cnr1"];
// $_LANG["cnrxauidwarrantydescr"] = "The Registrant of an .id.au Domain must warrant that they are an Australian Resident or Citizen";
$_LANG["cnrxaueligibilityname"] = "Eligibility, Name";
$_LANG["cnrxaueligibilitynamedescr"] = "The name of the Eligibility Type (e.g. business name)";
$_LANG["cnrxaudomainidnumber"] = "Registrant, Identification Number";
$_LANG["cnrxaudomainidnumberdescr"] = "";
$_LANG["cnrxaudomainidtype"] = "Registrant, Identification Type";
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
$_LANG["cnrxaueligibilityidnumber"] = "Eligibility, Identification Number";
$_LANG["cnrxaueligibilityidnumberdescr"] = "";
$_LANG["cnrxaueligibilityidtype"] = "Eligibility, Identification Type";
$_LANG["cnrxaueligibilityidtypedescr"] = "";

// ----------------------------------------------------------------------
// ------------------ .CA Fields, Boilerplate ---------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxcalegaltype"] = "Registrant, Legal Type";
// $_LANG["cnrxcalegaltypeabo"] = "Aboriginal Peoples indigenous to Canada";
// $_LANG["cnrxcalegaltypeass"] = "Canadian Unincorporated Association";
// $_LANG["cnrxcalegaltypecco"] = "Corporation (Canada or Canadian province or territory)";
// $_LANG["cnrxcalegaltypecct"] = "Canadian citizen";
// $_LANG["cnrxcalegaltypeedu"] = "Canadian Educational Institution";
// $_LANG["cnrxcalegaltypegov"] = "Government or government entity in Canada";
// $_LANG["cnrxcalegaltypehop"] = "Canadian Hospital";
// $_LANG["cnrxcalegaltypeinb"] = "Indian Band recognized by the Indian Act of Canada";
// $_LANG["cnrxcalegaltypelam"] = "Canadian Library⸴ Archive or Museum";
// $_LANG["cnrxcalegaltypelgr"] = "Legal Rep. of a Canadian Citizen or Permanent Resident";
// $_LANG["cnrxcalegaltypemaj"] = "Her Majesty the Queen";
// $_LANG["cnrxcalegaltypeomk"] = "Official mark registered in Canada";
// $_LANG["cnrxcalegaltypeplt"] = "Canadian Political Party";
// $_LANG["cnrxcalegaltypeprt"] = "Partnership Registered in Canada";
// $_LANG["cnrxcalegaltyperes"] = "Permanent Resident of Canada";
// $_LANG["cnrxcalegaltypetdm"] = "Trade-mark registered in Canada (by a non-Canadian owner)";
// $_LANG["cnrxcalegaltypetrd"] = "Canadian Trade Union";
// $_LANG["cnrxcalegaltypetrs"] = "Trust established in Canada";
// $_LANG["cnrxcalegaltypedescr"] = "";
// $_LANG["cnrxcatrademark"] = "Is a registered trademark";
$_LANG["cnrxcatrademark0"] = $_LANG["cnr0"];
$_LANG["cnrxcatrademark1"] = $_LANG["cnr1"];
// $_LANG["cnrxcatrademarkdescr"] = "Specifies if the domain is a registered trademark or not.";

// ----------------------------------------------------------------------
// ------------------ .COM.BR Fields, Boilerplate -----------------------
// ----------------------------------------------------------------------
$_LANG["cnrxbrregisternumber"] = "Registrant, Brazil Legal ID";
$_LANG["cnrxbrregisternumberdescr"] = "The Brazilian Company Register Number (CNPJ) or the Brazilian Individual Register Number (CPF).";

// ----------------------------------------------------------------------
// ------------------ .CN Fields, Boilerplate ---------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxcnownertype"] = "Registrant, Type";
$_LANG["cnrxcnownertypei"] = "Individual";
$_LANG["cnrxcnownertypee"] = "Enterprise";
$_LANG["cnrxcnownertypedescr"] = "";
$_LANG["cnrxcnowneridtype"] = "Registrant, ID Type";
$_LANG["cnrxcnowneridtypesfz"] = "SFZ (ID) - Registrant Type is Individual";
$_LANG["cnrxcnowneridtypehz"] = "HZ (Passport) - Registrant Type is Individual";
$_LANG["cnrxcnowneridtypegajmtx"] = "GAJMTX (Exit-Entry Permit for Travelling to and from Hong Kong and Macao) - Registrant Type is Individual";
$_LANG["cnrxcnowneridtypetwjmtx"] = "TWJMTX (Travel passes for Taiwan Residents to Enter or Leave the Mainland) - Registrant Type is Individual";
$_LANG["cnrxcnowneridtypewjlsfz"] = "WJLSFZ (Foreign Permanent Resident ID Card) - Registrant Type is Individual";
$_LANG["cnrxcnowneridtypegajzz"] = "GAJZZ (Residence permit for Hong Kong⸴ Macao residents) - Registrant Type is Individual";
$_LANG["cnrxcnowneridtypetwjzz"] = "TWJZZ (Residence permit for Taiwan residents) - Registrant Type is Individual";
$_LANG["cnrxcnowneridtypejgz"] = "JGZ (Officer’s identity card) - Registrant Type is Individual";
$_LANG["cnrxcnowneridtypeqt"] = "QT (Others) - Registrant Type is Individual or Enterprise";
$_LANG["cnrxcnowneridtypeorg"] = "ORG (Organization Code Certificate) - Registrant Type is Enterprise";
$_LANG["cnrxcnowneridtypeyyzz"] = "YYZZ (Business License) - Registrant Type is Enterprise";
$_LANG["cnrxcnowneridtypetydm"] = "TYDM (Certificate for Uniform Social Credit Code) - Registrant Type is Enterprise";
$_LANG["cnrxcnowneridtypebddm"] = "BDDM (Military Code Designation) - Registrant Type is Enterprise";
$_LANG["cnrxcnowneridtypejddwfw"] = "JDDWFW (Military Paid External Service License) - Registrant Type is Enterprise";
$_LANG["cnrxcnowneridtypesydwfr"] = "SYDWFR (Public Institution Legal Person Certificate) - Registrant Type is Enterprise";
$_LANG["cnrxcnowneridtypewgczjg"] = "WGCZJG (Resident Representative Offices of Foreign Enterprises Registration Form) - Registrant Type is Enterprise";
$_LANG["cnrxcnowneridtypeshttfr"] = "SHTTFR (Social Organization Legal Person Registration Certificate) - Registrant Type is Enterprise";
$_LANG["cnrxcnowneridtypezjcs"] = "ZJCS (Religion Activity Site Registration Certificate) - Registrant Type is Enterprise";
$_LANG["cnrxcnowneridtypembfqy"] = "MBFQY (Private Non-Enterprise Entity Registration Certificate) - Registrant Type is Enterprise";
$_LANG["cnrxcnowneridtypejjhfr"] = "JJHFR (Fund Legal Person Registration Certificate) - Registrant Type is Enterprise";
$_LANG["cnrxcnowneridtypelszy"] = "LSZY (Practicing License of Law Firm) - Registrant Type is Enterprise";
$_LANG["cnrxcnowneridtypewgzhwh"] = "WGZHWH (Registration Certificate of Foreign Cultural Center in China) - Registrant Type is Enterprise";
$_LANG["cnrxcnowneridtypewlczzg"] = "WLCZJG (Resident Representative Office of Tourism Departments of Foreign Government Approval Registration Certificate) - Registrant Type is Enterprise";
$_LANG["cnrxcnowneridtypesfjd"] = "SFJD (Judicial Expertise License) - Registrant Type is Enterprise";
$_LANG["cnrxcnowneridtypejwjg"] = "JWJG (Overseas Organization Certificate) - Registrant Type is Enterprise";
$_LANG["cnrxcnowneridtypeshfwjg"] = "SHFWJG (Social Service Agency Registration Certificate) - Registrant Type is Enterprise";
$_LANG["cnrxcnowneridtypembxxbx"] = "MBXXBX (Private School Permit) - Registrant Type is Enterprise";
$_LANG["cnrxcnowneridtypeyljgzy"] = "YLJGZY (Medical Institution Practicing License) - Registrant Type is Enterprise";
$_LANG["cnrxcnowneridtypegzjgzy"] = "GZJGZY (Notary Organization Practicing License) - Registrant Type is Enterprise";
$_LANG["cnrxcnowneridtypebjwsxx"] = "BJWSXX (Beijing School for Children of Foreign Embassy Staff in China Permit) - Registrant Type is Enterprise";
$_LANG["cnrxcnowneridtypeqttyzm"] = "QTTYDM (Others-Certificate for Uniform Social Credit Code) - Registrant Type is Enterprise";
$_LANG["cnrxcnowneridtypedescr"] = "Identity type of the ID card";
$_LANG["cnrxcnowneridnumber"] = "Registrant, ID Number";
$_LANG["cnrxcnowneridnumberdescr"] = "";

// ----------------------------------------------------------------------
// ------------------ .COOP Fields, Boilerplate -------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxcoopeligibility"] = "Eligibility Requirements";
$_LANG["cnrxcoopeligibilitydescr"] = "Accept that my organization meets at least one of the .COOP eligibility requirements. Read <a style=\"text-decoration:underline\" href=\"https://identity.coop/coop-policies-and-agreements/\" target=\"_blank\">here</a>.";
$_LANG["cnrxcoopeligibility0"] = $_LANG["cnr0"];
$_LANG["cnrxcoopeligibility1"] = $_LANG["cnr1"];

// ----------------------------------------------------------------------
// ------------------ .DE Fields, Boilerplate ---------------------------
// ----------------------------------------------------------------------
//$_LANG["cnrxdensentry0"] = "";
$_LANG["cnrxdensentry0descr"] = implode(" ", [
    "Enables the use of nsentrys instead of nameservers for .de domains;",
    "NS records allow you to configure subdomains with alternative nameservers.",
    "<a target=\"_blank\" href=\"https://www.denic.de/en/domains/de-domains/registration/nameserver-and-nsentry-data/\" style=\"text-decoration:underline\">Detailed Read</a>."
]);
//$_LANG["cnrxdensentry1"] = "";https://www.denic.de/en/domains/de-domains/registration/nameserver-and-nsentry-data/
$_LANG["cnrxdensentry1descr"] = "see above";
//$_LANG["cnrxdensentry2"] = "";
$_LANG["cnrxdensentry2descr"] = "see above";
//$_LANG["cnrxdensentry3"] = "";
$_LANG["cnrxdensentry3descr"] = "see above";
//$_LANG["cnrxdensentry4"] = "";
$_LANG["cnrxdensentry4descr"] = "see above";
//$_LANG["cnrxdegeneralrequest"] = "";
//$_LANG["cnrxdegeneralrequestdescr"] = "";
//$_LANG["cnrxdeabusecontact"] = "";
//$_LANG["cnrxdeabusecontactdescr "] = "";

// ----------------------------------------------------------------------
// ------------------ .DK Fields, Boilerplate ---------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxdkusertype"] = "Registrant, Type";
$_LANG["cnrxdkusertypeperson"] = "Person";
$_LANG["cnrxdkusertypecompany"] = "Company";
$_LANG["cnrxdkusertypeassociation"] = "Association";
$_LANG["cnrxdkusertypepuborg"] = "Public Organization";
// $_LANG["cnrxdkusertypedescr"] = "";
$_LANG["cnrxdkuseridnumber"] = "Registrant, ID Number";
$_LANG["cnrxdkuseridnumberdescr"] = implode("", [
    "Identification Number of the registrant contact. This can be <i>EAN, CVR or P number.</i> ",
    "The <i>CVR number</i> is used to identify the organization, and the <i>EAN number</i> ensures ",
    "that documents in connection with electronic invoicing are sent to the correct account. ",
    "The <i>P number</i> is a branch identifier assigned by the Danish Central Business Register for ",
    "linking physical sites to an organization."
]);

// ----------------------------------------------------------------------
// ------------------ .ES Fields, Boilerplate ---------------------------
// ----------------------------------------------------------------------
$types = [
    1 => "Individual",
    39 => "Economic Interest Group",
    47 => "Association",
    59 => "Sports Association",
    68 => "Professional Association",
    124 => "Savings Bank",
    150 => "Community Property",
    152 => "Community of Owners",
    164 => "Order or Religious Institution",
    181 => "Consulate",
    197 => "Public Law Association",
    203 => "Embassy",
    229 => "Local Authority",
    269 => "Sports Federation",
    286 => "Foundation",
    365 => "Mutual Insurance Company",
    434 => "Regional Government Body",
    436 => "Central Government Body",
    439 => "Political Party",
    476 => "Trade Union",
    510 => "Farm Partnership",
    524 => "Public Limited Company",
    525 => "Sports Association",
    554 => "Civil Society",
    560 => "General Partnership",
    562 => "General and Limited Partnership",
    566 => "Cooperative",
    608 => "Employee-owned Company",
    612 => "Limited Company",
    713 => "Spanish Office",
    717 => "Temporary Alliance of Enterprises",
    744 => "Employee-owned Limited Company",
    745 => "Regional Public Entity",
    746 => "National Public Entity",
    747 => "Local Public Entity",
    877 => "Others",
    878 => "Designation of Origin Supervisory Council",
    879 => "Entity Managing Natural Areas"
];
$idtypes = [
    0 => "Other (for Contacts outside Spain)",
    1 => "DNI/NIF (for spanish Contacts)",
    2 => "Deprecated⸴ Use next option instead.",
    3 => "NIE (for spanish contacts)"
];
$idtypesdescr = implode("<br/>", [
    "DNI = &quot;Documento Nacional de Identidad&quot;",
    "NIF = &quot;Número de Identificación Fiscal&quot;",
    "NIE = &quot;Número de Identificación de Extranjero&quot;. It is the equivalent of a Spanish NIF, but issued by Spanish authorities to foreigners who plan to stay longer than 3 months in Spain."
]);
$idnodescr = "The Identification Number of this contact. For Spanish contacts, this is the DNI/NIF/NIE number - the ID card or passport number otherwise.";

$_LANG["cnrxesownertipoidentificacion"] = "Owner, Identification Type";
$_LANG["cnrxesadmintipoidentificacion"] = "Admin, Identification Type";
$_LANG["cnrxestechtipoidentificacion"] = "Tech, Identification Type";
$_LANG["cnrxesbillingtipoidentificacion"] = "Billing, Identification Type";

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

$_LANG["cnrxesowneridentificacion"] = "Owner, Identification Number";
$_LANG["cnrxesadminidentificacion"] = "Admin, Identification Number";
$_LANG["cnrxestechidentificacion"] = "Tech, Identification Number";
$_LANG["cnrxesbillingidentificacion"] = "Billing, Identification Number";

$_LANG["cnrxesowneridentificaciondescr"] = $idnodescr;
$_LANG["cnrxesadminidentificaciondescr"] = $idnodescr;
$_LANG["cnrxestechidentificaciondescr"] = $idnodescr;
$_LANG["cnrxesbillingidentificaciondescr"] = $idnodescr;

$_LANG["cnrxesownerlegalform"] = "Owner, Legal Form";
$_LANG["cnrxesadminlegalform"] = "Admin, Legal Form";
$_LANG["cnrxestechlegalform"] = "Tech, Legal Form";
$_LANG["cnrxesbillinglegalform"] = "Billing, Legal Form";

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
// ------------------ .EU Fields, Boilerplate ---------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxeuregistrantlang"] = "Registrant, Language";
$_LANG["cnrxeuregistrantcitizenship"] = "Registrant, Citizenship";
$_LANG["cnrxeuregistrantlangdescr"] = "Language to use for communication with the TLD Provider (Default = English)";
$_LANG["cnrxeuregistrantcitizenshipdescr"] = "Private persons with European citizenship who do not live in the EU can register .eu domains using this setting.";

// ----------------------------------------------------------------------
// ------------------ .FI Fields, Boilerplate ---------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxficompanyregid"] = "Registrant, Business ID or Registration Number";
$_LANG["cnrxficompanyregiddescr"] = "Local business Entity (registered at the Finnish Trade Register or a corporation within the Finnish Republic)<br/>(required for non-finnish entities)";
$_LANG["cnrxfipersonalid"] = "Registrant, Personal Identity Number";
$_LANG["cnrxfipersonaliddescr"] = "Finnish Personal Identity Number<br/>(required for non-finnish individuals)";
$_LANG["cnrxfibirthdate"] = "Registrant, Birth Date";
$_LANG["cnrxfibirthdatedescr"] = "Date of Birth (YYYY-MM-DD)<br/>(required for non-finnish individuals)";
$_LANG["cnrxficontacttype"] = "Registrant, Type of Contact";
$_LANG["cnrxficontacttype0"] = "Private Person";
$_LANG["cnrxficontacttype1"] = "Company";
$_LANG["cnrxficontacttype2"] = "Corporation";
$_LANG["cnrxficontacttype3"] = "Institution";
$_LANG["cnrxficontacttype4"] = "Political Party";
$_LANG["cnrxficontacttype5"] = "Township";
$_LANG["cnrxficontacttype6"] = "Government";
$_LANG["cnrxficontacttype7"] = "Public Community";
$_LANG["cnrxficontacttypedescr"] = "";

// ----------------------------------------------------------------------
// ------------------ .GAY Fields, Boilerplate --------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxgayacceptrequirements"] = "Accept Requirements";
$_LANG["cnrxgayacceptrequirements0"] = $_LANG["cnr0"];
$_LANG["cnrxgayacceptrequirements1"] = $_LANG["cnr1"];
$_LANG["cnrxgayacceptrequirementsdescr"] = "I confirm that the domain will NOT be used for inciting violence, bullying, harassing, or hate speech and NOT be used by recognized hate groups. DotGay donates 20% from each new domain registered to their partners, GLAAD and CenterLink.";

// ----------------------------------------------------------------------
// ------------------ .HK Fields, Boilerplate ---------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxhkownerdocumenttype"] = "Registrant, Document Type";
$_LANG["cnrxhkownerdocumenttypehkid"] = "Individual: HK ID Number";
$_LANG["cnrxhkownerdocumenttypeothid"] = "Individual: Other Country ID Number";
$_LANG["cnrxhkownerdocumenttypepassno"] = "Individual: Passport Number";
$_LANG["cnrxhkownerdocumenttypebirthcert"] = "Individual: Birth Certificate";
$_LANG["cnrxhkownerdocumenttypeothidv"] = "Individual: Other Individual Document";
$_LANG["cnrxhkownerdocumenttypebr"] = "Organization: Business Registration Certificate";
$_LANG["cnrxhkownerdocumenttypeci"] = "Organization: Certificate of Incorporation";
$_LANG["cnrxhkownerdocumenttypecrs"] = "Organization: School Registration Certificate";
$_LANG["cnrxhkownerdocumenttypehksarg"] = "Organization: HK Government Department";
$_LANG["cnrxhkownerdocumenttypehkordinance"] = "Organization: HK Ordinance";
$_LANG["cnrxhkownerdocumenttypeothorg"] = "Organization: Other Organization Document";
$_LANG["cnrxhkownerdocumenttypedescr"] = "";
$_LANG["cnrxhkownerdocumentnumber"] = "Registrant, Document Number";
$_LANG["cnrxhkownerdocumentnumberdescr"] = "";
$_LANG["cnrxhkownerdocumentorigincountry"] = "Registrant, Document Origin Country";
$_LANG["cnrxhkownerdocumentorigincountrydescr"] = "The country where this document was issued (please provide the 2-char ISO country code, e.g. DE or US).";
$_LANG["cnrxhkownerotherdocumenttype"] = "Registrant, Other Document Type";
$_LANG["cnrxhkownerotherdocumenttypedescr"] = "Required if the previously selected Document Type is either '" . $_LANG["cnrxhkownerdocumenttypeothidv"] . "' or '" . $_LANG["cnrxhkownerdocumenttypeothorg"] . "'.";
$_LANG["cnrxhkdomaincategory"] = "Domain Category";
$_LANG["cnrxhkdomaincategoryi"] = "Individual";
$_LANG["cnrxhkdomaincategoryo"] = "Organization";
// $_LANG["cnrxhkdomaincategorydescr"] = "Legal Type of all Domain Contacts";
$_LANG["cnrxhkownerageover18"] = "Registrant, Age over 18";
$_LANG["cnrxhkownerageover18no"] = $_LANG["cnr0"];
$_LANG["cnrxhkownerageover18yes"] = $_LANG["cnr1"];
$_LANG["cnrxhkownerageover18descr"] = "I confirm, that the Registrant is at least 18 years old (required for Individuals only).";

// ----------------------------------------------------------------------
// ------------------ .IE Fields, Boilerplate ---------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxiecontacttype"] = "Registrant, Contact Type";
$_LANG["cnrxiecontacttypecom"] = "Company";
$_LANG["cnrxiecontacttypecha"] = "Charity";
$_LANG["cnrxiecontacttypeoth"] = "Other";
$_LANG["cnrxiecontacttypedescr"] = "";
$_LANG["cnrxielanguage"] = "Registrant, Language";
$_LANG["cnrxielanguageen"] = "English";
$_LANG["cnrxielanguagefr"] = "French";
$_LANG["cnrxielanguagedescr"] = "Language to use for communication with the TLD Provider (Default = English)";
$_LANG["cnrxiecronumber"] = "Registrant, CRO Number";
$_LANG["cnrxiecronumberdescr"] = "The Company Registration Office (CRO) Number";
$_LANG["cnrxiesupportingnumber"] = "Registrant, Charity Number";
$_LANG["cnrxiesupportingnumberdescr"] = "Charity / Supporting Number";

// ----------------------------------------------------------------------
// ------------------ .IT Fields, Boilerplate ---------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxitconsentforpublishing"] = $_LANG["cnrconsentforpublishing"];
$_LANG["cnrxitconsentforpublishing0"] = $_LANG["cnr0"];
$_LANG["cnrxitconsentforpublishing1"] = $_LANG["cnr1"];
$_LANG["cnrxitconsentforpublishingdescr"] = "Allow the publication of contacts personal data. Deny only possible if Entity Type below is 1.";
$_LANG["cnrxitentitytype"] = "Registrant, Entity Type";
$_LANG["cnrxitentitytype1"] = "[1] Italian and foreign natural persons";
$_LANG["cnrxitentitytype2"] = "[2] Companies/one man companies";
$_LANG["cnrxitentitytype3"] = "[3] Freelance workers/professionals";
$_LANG["cnrxitentitytype4"] = "[4] non-profit organizations";
$_LANG["cnrxitentitytype5"] = "[5] public organizations";
$_LANG["cnrxitentitytype6"] = "[6] other subjects";
$_LANG["cnrxitentitytype7"] = "[7] foreigners who match 2-6";
$_LANG["cnrxitentitytypedescr"] = "Entity Type to identify the Registrant Typology.";
$_LANG["cnrxitpin"] = "Registrant, Tax ID";
//$_LANG["cnrxitpindescr"] = "";
$_LANG["cnrxitnationality"] = "Registrant, Nationality";
$_LANG["cnrxitnationalitydescr"] = "The Nationality of the Registrant specified by 2-char ISO Country Code.";
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
// ------------------ .LV Fields, Boilerplate ---------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxlvownerregnr"] = "Registrant, Registration Number";
$_LANG["cnrxlvownerregnrdescr"] = "The Registration Number of the Latvian Citizen to be used for the Registrant Contact (e.g. Company Registration Number)";
$_LANG["cnrxlvadminregnr"] = "Admin, Registration Number";
$_LANG["cnrxlvadminregnrdescr"] = "The Registration Number of the latvian Citizen to be used for the Administrative Contact (e.g. Company Registration Number)";
$_LANG["cnrxlvvatnr"] = "Registrant, VAT Number";
$_LANG["cnrxlvvatnrdescr"] = "The VAT Number of the Registrant Contact (for companies only).";

// ----------------------------------------------------------------------
// ------------------ .LT Fields, Boilerplate ---------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxltcompanynumber"] = "Registrant, Company Number";
$_LANG["cnrxltcompanynumberdescr"] = "";

// ----------------------------------------------------------------------
// ------------------ .MY Fields, Boilerplate ---------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxmybusinessnumber"] = "Registrant, Business Number";
$_LANG["cnrxmybusinessnumberdescr"] = "The Business Registration Number of the Registrant (for Companies only)";
$_LANG["cnrxmyorganizationtype"] = "Registrant, Organization Type";
$_LANG["cnrxmyorganizationtypedescr"] = "The Buisness Type of the Registrant (for Companies only)";
$_LANG["cnrxmyperidentity"] = "Registrant, Personal Identity";
$_LANG["cnrxmyperidentitydescr"] = "The Personal Identity Number of the Registrant (for Individuals only).";
$_LANG["cnrxmyperdateofbirth"] = "Registrant, Date of Birth";
$_LANG["cnrxmyperdateofbirthdescr"] = "The Date of Birth of the Registrant (YYYY-MM-DD, for Individuals only)";
$_LANG["cnrxmyrace"] = "Registrant, Race";
$_LANG["cnrxmyracemalay"] = "Malay";
$_LANG["cnrxmyracechinese"] = "Chinese";
$_LANG["cnrxmyraceindian"] = "Indian";
$_LANG["cnrxmyraceothers"] = "Others";
$_LANG["cnrxmyracedescr"] = "(for Individuals only)";

// ----------------------------------------------------------------------
// ------------------ .NO Fields, Boilerplate ---------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxnoorganizationnumber"] = "Registrant, Organization Number";
$_LANG["cnrxnoorganizationnumberdescr"] = "The Norwegian Register Number issued by the Central Coordinating Register for Legal Entities.";
//$_LANG["cnrxnopersonidentifier"] = "Norid Person ID";
$_LANG["cnrxnopersonidentifierdescr"] = "Required personal ID to register a private .PRIV.NO domain name. Leave empty otherwise.";

// ----------------------------------------------------------------------
// ------------------ .NU Fields, Boilerplate ---------------------------
// ----------------------------------------------------------------------
// see further .nu fields at the top of the file
$_LANG["cnrxnuiisidno"] = "Registrant, ID Number";
$_LANG["cnrxnuiisidnodescr"] = "Personal identification number, corporate identity number or registration designation in a governmental register. For contacts located in Sweden a valid Swedish ID number is necessary (e.g.: 123456-1234).";
$_LANG["cnrxnuiisvatno"] = "Registrant, VAT Number";
$_LANG["cnrxnuiisvatnodescr"] = "The VAT Number of the Registrant (for Companies only)";

// ----------------------------------------------------------------------
// ------------------ .NYC Fields, Boilerplate --------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxnycextcontact"] = "NY External Contact";
$_LANG["cnrxnycextcontactadmin"] = "Administrative Contact";
$_LANG["cnrxnycextcontacttech"] = "Technical Contact";
$_LANG["cnrxnycextcontactbilling"] = "Billing Contact";
$_LANG["cnrxnycextcontactowner"] = "Registrant Contact";
// $_LANG["cnrxnycextcontactdescr"] = "Specified contact must have a valid physical address in the City of New York.";

// ----------------------------------------------------------------------
// ------------------ .PARIS Fields, Boilerplate ------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxafniccode"] = $_LANG["cnrxallocationtoken"];
$_LANG["cnrxafniccodedescr"] = $_LANG["cnrxallocationtokendescr"];

// ----------------------------------------------------------------------
// ------------------ .FR, .PM, .RE, .TF, .WF, .YT Fields, Boilerplate --
// ----------------------------------------------------------------------
// Organizations (Companies, Associations, etc.)
$_LANG["cnrxfrannounce"] = "Company, Number of Announcement<br/>(Journal Officiel)";
$_LANG["cnrxfrannouncedescr"] = "The number of the announcement (e.g. 5) in the Journal Officiel. Only digits allowed.";
$_LANG["cnrxfrdatepublicationjo"] = "Company, Date of Publication<br/>(Journal Officiel)";
$_LANG["cnrxfrdatepublicationjodescr"] = implode(" ", [
    "The date of publication in the official gazette / Journal Officiel.",
    "Date format YYYY-MM-DD"
]);
$_LANG["cnrxfrnumerodepageannouncejo"] = "Company, Page No. of Announcement<br/>(Journal Officiel)";
$_LANG["cnrxfrnumerodepageannouncejodescr"] = "The page number of the announcement in the Journal Officiel.";
$_LANG["cnrxfrwaldec"] = "Company, Waldec ID";
$_LANG["cnrxfrwaldecdescr"] = "Indicates the Waldec identifier linked to an association which is sufficient to identify an association if provided. Only digits allowed.";
$_LANG["cnrxfrdateassociation"] = "Company, Date of Association";
$_LANG["cnrxfrdateassociationdescr"] = "Shows the date of association. Date Format YYYY-MM-DD.";
$_LANG["cnrxfrduns"] = "Company, DUNS Number";
$_LANG["cnrxfrdunsdescr"] = implode(" ", [
    "The DUNS number is a unique nine-digit identifier for businesses. Short for Data Universal",
    "Numbering System; refers to a new identifier that can be sent for an Eligibility Verification",
    "at European level."
]);
$_LANG["cnrxfrlocal"] = "Company, Local ID";
$_LANG["cnrxfrlocaldescr"] = "A local identifier specific to a country of the European Economic Area (e.g. business certificate number).";
$_LANG["cnrxfrnoprezonecheck0"] = $_LANG["cnr0"];
$_LANG["cnrxfrnoprezonecheck1"] = $_LANG["cnr1"];
$_LANG["cnrxfrsirenorsiret"] = "Company, SIREN/SIRET Number";
$_LANG["cnrxfrsirenorsiretdescr"] = implode(" ", [
    "For companies with valid SIREN/SIRET number.",
    "The SIREN code is the unique business identification number in France. It is issued by the",
    "institut national de la statistique et des études économiques (INSEE) and has 9 digits.",
    "The first 9 digits are the SIREN number and the following 5 digits are the NIC number",
    "(Numéro Interne de Classement). The SIRET number is issued once you have registered your",
    "business with the Chambre de Commerce (RCS) for trade, Chambre de Metiers for crafts and",
    "manual work or with URSSAF for intellectual services. SIRET numbers are made up of 14",
    "numbers. The SIRET number provides information about the location of the business in France",
    "(for established companies). The company name provided in the registrant contact details must",
    "be exactly the same as shown in the SIREN/SIRET database ( https://www.infogreffe.fr/ )."
]);
$_LANG["cnrxfrtrademark"] = "Company, Trademark No.";
$_LANG["cnrxfrtrademarkdescr"] = "";
$_LANG["cnrxfrvatid"] = "Company, VAT ID";
$_LANG["cnrxfrvatiddescr"] = "For companies with valid VATID";

// Individual
$_LANG["cnrxfrbirthpc"] = "Registrant, ZIP Code (City of Birth)";
$_LANG["cnrxfrbirthpcdescr"] = implode(" ", [
    "Only for natural persons born in France, Reunion, Mayotte, Guadeloupe, Martinique, Guyane,",
    "Polynesie Francaise, Wallis et Futuna or Saint-Pierre-et-Miquelon. Please provide the",
    "postcode of the place of birth (or at least the department code)"
]);
$_LANG["cnrxfrbirthcity"] = "Registrant, City of Birth";
$_LANG["cnrxfrbirthcitydescr"] = implode(" ", [
    "Only for natural persons born in France, Reunion, Mayotte, Guadeloupe, Martinique, Guyane,",
    "Polynesie Francaise, Wallis et Futuna or Saint-Pierre-et-Miquelon. Please provide the Name",
    "of City."
]);
$_LANG["cnrxfrbirthdate"] = "Registrant, Date of Birth";
$_LANG["cnrxfrbirthdatedescr"] = "The registrant's birthdate in the form YYYY-MM-DD.";
$_LANG["cnrxfrbirthplace"] = "Registrant, Place of Birth";
//$_LANG["cnrxfrbirthplacedescr"] = "";
$_LANG["cnrxfrrestrictpub"] = $_LANG["cnrconsentforpublishing"];
$_LANG["cnrxfrrestrictpub0"] = $_LANG["cnr0"];
$_LANG["cnrxfrrestrictpub1"] = $_LANG["cnr1"];
$_LANG["cnrxfrrestrictpubdescr"] = "For Individuals only. Allow the publication of contacts personal data.";
// $_LANG["cnrxfrnoprezonecheck"] = "Suppress DNS precheck";
// $_LANG["cnrxfrnoprezonecheckdescr"] = "Determines, if the system should do a DNS precheck before sending the command to the registry.";

// ----------------------------------------------------------------------
// ------------------ .PT Fields, Boilerplate ---------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxpttechidentification"] = "Technical Contact, VAT Number";
$_LANG["cnrxpttechidentificationdescr"] = "The Fiscal Identification Number of the Technical Contact";
$_LANG["cnrxptowneridentification"] = "Registrant, VAT Number";
$_LANG["cnrxptowneridentificationdescr"] = "The Fiscal Identification Number of the Registrant";
$_LANG["cnrxpttechmobile"] = "Technical Contact, Mobile Phone";
$_LANG["cnrxpttechmobiledescr"] = "The Mobile Phone Number of the Technical Contact";
$_LANG["cnrxptownermobile"] = "Registrant, Mobile Phone";
$_LANG["cnrxptownermobiledescr"] = "The Mobile Phone Number of the Registrant";

// ----------------------------------------------------------------------
// ------------------ .RO Fields, Boilerplate ---------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxrocompanynumber"] = "Registrant, Company Number";
$_LANG["cnrxrocompanynumberdescr"] = "(required for Companies only)";
$_LANG["cnrxroidcardorpassportnumber"] = "Registrant, ID Card or Passport Number";
$_LANG["cnrxroidcardorpassportnumberdescr"] = "(required for Individuals only)";
$_LANG["cnrxrovatnumber"] = "Registrant, VAT Number";
$_LANG["cnrxrovatnumberdescr"] = "(required for Companies only)";

// ----------------------------------------------------------------------
// ------------------ .RU Fields, Boilerplate ---------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxrubirthdate"] = "Registrant, Date of Birth";
$_LANG["cnrxrubirthdatedescr"] = "The Date of Birth of the Registrant (DD.MM.YYYY)<br/>(required for Individuals only)";
$_LANG["cnrxrufirstname"] = "Registrant, First Name";
$_LANG["cnrxrufirstnamedescr"] = "The First Name of the Registrant in Russian. To be filled with Russian and Latin letters, no dots.<br/>(required for Individuals only)";
$_LANG["cnrxrumiddlename"] = "Registrant, Middle Name";
$_LANG["cnrxrumiddlenamedescr"] = "The Middle Name of the Registrant in Russian. To be filled with Russian and Latin letters, no dots.<br/>(required for Individuals only)";
$_LANG["cnrxrulastname"] = "Registrant, Last Name";
$_LANG["cnrxrulastnamedescr"] = "The Last Name of the Registrant in Russian. To be filled with Russian and Latin letters, no dots.<br/>(required for Individuals only)";
$_LANG["cnrxruorganization"] = "Registrant, Organization Name";
$_LANG["cnrxruorganizationdescr"] = "The Registrant's Organization Name in Russian. This field can contain Russian and Latin letters, figures, punctuation marks and spaces.<br/>(required for Organizations incorporated in the Russian Federation only)";
$_LANG["cnrxrucode"] = "Registrant, TIN";
$_LANG["cnrxrucodedescr"] = "The Taxpayer Identification Number (TIN) of the Registrant. This field must contain a ten digit number (the last figure is a control figure).<br/>(required for Organizations incorporated in the Russian Federation only)";
$_LANG["cnrxrukpp"] = "Registrant, Reason Code";
$_LANG["cnrxrukppdescr"] = "The Reason Code (KPP) of the Registrant. This field must contain a nine digit number.<br/>(required for Organizations incorporated in the Russian Federation only)";
$_LANG["cnrxrupassportdata"] = "Registrant, Passport Data";
$_LANG["cnrxrupassportdatadescr"] = "The Passport Data of the Registrant. This field is filled in Russian and can contain Russian and Latin letters, figures, punctuation marks and spaces. Format: Document number, Issued by, Issued Date<br/>(required for Individuals only)";

// ----------------------------------------------------------------------
// ------------------ .SE Fields, Boilerplate ---------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxnicseidnumber"] = "Registrant, ID Number";
$_LANG["cnrxnicseidnumberdescr"] = "Personal or organisational number.";
$_LANG["cnrxnicsevatid"] = "Registrant, VAT Number";
$_LANG["cnrxnicsevatiddescr"] = "";
$_LANG["cnrxsediscloseemail"] = "Registrant, Disclose Email";
$_LANG["cnrxsediscloseemaildescr"] = "Allow the disclosure of the Registrant's email address in the public WHOIS database.";
$_LANG["cnrxsedisclosefax"] = "Registrant, Disclose Fax";
$_LANG["cnrxsedisclosefaxdescr"] = "Allow the disclosure of the Registrant's fax number in the public WHOIS database.";
$_LANG["cnrxsedisclosevoice"] = "Registrant, Disclose Voice";
$_LANG["cnrxsedisclosevoicedescr"] = "Allow the disclosure of the Registrant's voice number in the public WHOIS database.";
foreach (["email", "fax", "voice"] as $field) {
    $_LANG["cnrxsedisclose$field" . "0"] = $_LANG["cnr0"];
    $_LANG["cnrxsedisclose$field" . "1"] = $_LANG["cnr1"];
}

// ----------------------------------------------------------------------
// ------------------ .SG Fields, Boilerplate ---------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxsgrcbid"] = "Registrant, RCB ID";
$_LANG["cnrxsgrcbiddescr"] = "The Unique Entity Number (UEN) or the Registered Company Number (RCB) of the Registrant. For <u>companies</u> located in Singapore, the corresponding company registration number has to be specified OR the contact identity card for a local presence in Singapore (Format: S1234567D).";
$_LANG["cnrxsgadminsingpassid"] = "Admin, SingPass ID";
$_LANG["cnrxsgadminsingpassiddescr"] = "The contact identity card (SingPass ID) of the Administrative Contact<br/>(for Singaporean <u>Individuals</u> only, Format: S1234567D)";

// ----------------------------------------------------------------------
// ------------------ .SK Fields, Boilerplate ---------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxskcontactlegalform"] = "Registrant, Legal Form";
$_LANG["cnrxskcontactlegalformdescr"] = "";
// $_LANG["cnrxskcontactlegalformcorp"] = "";
// $_LANG["cnrxskcontactlegalformpers"] = "";
$_LANG["cnrxskcontactidentnumber"] = "Registrant, Company Number";
$_LANG["cnrxskcontactidentnumberdescr"] = "Commercial register number. Mandatory for companies/organisations";

// ----------------------------------------------------------------------
// ------------------ .SWISS Fields, Boilerplate ------------------------
// ----------------------------------------------------------------------
// see other .swiss fields at top of the file
$_LANG["cnrxswissuid"] = "Registrant, UID or UPI";
$_LANG["cnrxswissuiddescr"] = implode("", [
    "The ...<ul>",
    "<li>UID (Unique Identification Number, Format: \"CHE-ddd.ddd.ddd\") for Organizations or</li>",
    "<li>UPI (Universal Person Identification, Format: \"756.dddd.dddd.dd\") for Natural Persons</li>",
    "</ul>... of the Registrant (d = digit).<br/>",
    "Please note: The person’s name and UPI are NOT published on the Whois/RDAP unlike the organization's name and UID, which are visible."
]);
$_LANG["cnrxswissownertype"] = "Registrant, Type";
$_LANG["cnrxswissownertypep"] = "Natural Person";
$_LANG["cnrxswissownertypeo"] = "Organization / Legal Entity";
$_LANG["cnrxswissownertypedescr"] = "The Identity Type of the Registrant.";

// ----------------------------------------------------------------------
// ------------------ .TRAVEL Fields, Boilerplate -----------------------
// ----------------------------------------------------------------------
$_LANG["cnrxtravelindustry"] = "Travel Industry";
$_LANG["cnrxtravelindustryn"] = $_LANG["cnr0"];
$_LANG["cnrxtravelindustryy"] = $_LANG["cnr1"];
$_LANG["cnrxtravelindustrydescr"] = "I confirm that the Registrant is a member of the Travel Industry and has a valid Membership ID.";

// ----------------------------------------------------------------------
// ------------------ .UK Fields, Boilerplate ---------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxukownercorporatetype"] = "Registrant, Corporate Type";
$_LANG["cnrxukownercorporatetypedescr"] = "";
$_LANG["cnrxukownercorporatetypeother"] = "Other";
$_LANG["cnrxukownercorporatetypefother"] = "Other (Non-UK)";
// $_LANG["cnrxukownercorporatetypeind"] = "Individual";
$_LANG["cnrxukownercorporatetypefind"] = "Individual (Non-UK)";
$_LANG["cnrxukownercorporatetypefcorp"] = "Corporation (Non-UK)";
// $_LANG["cnrxukownercorporatetypeltd"] = "LTD";
// $_LANG["cnrxukownercorporatetypeplc"] = "PLC";
// $_LANG["cnrxukownercorporatetypellp"] = "LLP";
// $_LANG["cnrxukownercorporatetypeip"] = "IP";
// $_LANG["cnrxukownercorporatetypecrc"] = "Corporate by Royal Charter";
// $_LANG["cnrxukownercorporatetypegov"] = "Government Body";
// $_LANG["cnrxukownercorporatetypeptnr"] = "UK Partnership";
// $_LANG["cnrxukownercorporatetyperchar"] = "Registered Charity";
// $_LANG["cnrxukownercorporatetypesch"] = "School";
// $_LANG["cnrxukownercorporatetypestat"] = "Statutory Body";
// $_LANG["cnrxukownercorporatetypestra"] = "Sole Trader";
$_LANG["cnrxukownercorporatenumber"] = "Registrant, Corporate Number";
$_LANG["cnrxukownercorporatenumberdescr"] = "UK companies house registration number";


// ----------------------------------------------------------------------
// ------------------ .US Fields, Boilerplate ---------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxusnexusapppurpose"] = "US Nexus, Application Purpose";
$_LANG["cnrxusnexusapppurposep1"] = "Business Use for Profit";
$_LANG["cnrxusnexusapppurposep2"] = "Non-Profit Business, Club, Association, religious Organization, etc.";
$_LANG["cnrxusnexusapppurposep3"] = "Personal Use";
$_LANG["cnrxusnexusapppurposep4"] = "Educational Purposes";
$_LANG["cnrxusnexusapppurposep5"] = "Government Purposes";
$_LANG["cnrxusnexusapppurposedescr"] = "";
$_LANG["cnrxusnexuscategory"] = "US Nexus, Category";
$_LANG["cnrxusnexuscategoryc11"] = "[C11] U.S. Citizen";
$_LANG["cnrxusnexuscategoryc12"] = "[C12] U.S. Permanent Resident";
$_LANG["cnrxusnexuscategoryc21"] = "[C21] U.S. Organization";
$_LANG["cnrxusnexuscategoryc31"] = "[C31] Foreign Entity with U.S. Activities";
$_LANG["cnrxusnexuscategoryc32"] = "[C32] Foreign Entity with U.S. Office";
$_LANG["cnrxusnexuscategorydescr"] = "Categorization of the entity requesting the application.<br/>Note: Possessions and Territories of the U.S. are considered as included as well.";
$_LANG["cnrxusnexusvalidator"] = "US Nexus, Country";
$_LANG["cnrxusnexusvalidatordescr"] = "Specify the two-letter country code of the registrant (if Nexus Category is either C31 or C32)";

// ----------------------------------------------------------------------
// ------------------ .XXX Fields, Boilerplate --------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxxxxcommunityid"] = "Community Member ID";
$_LANG["cnrxxxxcommunityiddescr"] = ".XXX Sponsored Community Member ID";
$_LANG["cnrxxxxdefensive"] = "Defensive Registration<br/>(Non-Resolving Domain)";
$_LANG["cnrxxxxdefensive0"] = $_LANG["cnr0"];
$_LANG["cnrxxxxdefensive1"] = $_LANG["cnr1"];
$_LANG["cnrxxxxdefensivedescr"] = implode("", [
    "I confirm that the domain is a defensive registration. ",
    "Defensive registration refers to registering domain names, ",
    "often across multiple TLDs and in varied grammatical formats, ",
    "for the primary purpose of protecting intellectual property or trademark from abuse, ",
    "such as cybersquatting. It is defined as registration that is not unique, does not resolve, ",
    "redirects traffic back to a core registration or does not contain unique content.<br/>",
    "Note: if not selected, the domain will be considered as a defensive registration."
]);

// #########################################################################
// #########################################################################
// # Add reusable translations for ALL PROVIDERS                           #
// #########################################################################
// #########################################################################

// ----------------------------------------------------------------------
// ----------------------- DNSSEC MANAGEMENT ----------------------------
// ----------------------------------------------------------------------
$_LANG["cnicdnssecmanagement"] = "DNSSEC Management";


/// ----------------------------------------------------------------------
// ---------------- EMAIL VERIFICATION ----------------------------------
// ----------------------------------------------------------------------
// $_LANG["cnicemailverification"] = "Email Verification";
// $_LANG["emailverificationtitle"] = "Verify Your Email";
// $_LANG["emailverificationinfo"] = "For the following contact information verification is required";
// $_LANG["emailverificationconsequences"] = "Failure to verify your email may result in the suspension of your domain.";
// $_LANG["emailverificationresendemailinfo"] = "If you have not received the email, please click the button below to resend the verification email.";
// $_LANG["verified"] = "Verified";
// $_LANG["emailverificationpending"] = "Pending";

// #########################################################################
// #########################################################################
// # Add translations for ISPAPI registrar module additional domain fields #
// #########################################################################
// #########################################################################

// Terms and Conditions Fields, prefixed with hxflagstac
$_LANG["hxflagstacagreement"] = "Agreement";
$_LANG["hxflagstacagreementindiv"] = "Terms for Individuals";
$_LANG["hxflagstactrustee"] = "Local Presence Service";
$_LANG["hxflagstachighlyregulated"] = "Highly Regulated TLD";
$_LANG["hxflagstachighlyregulateddescrdefault"] = ("Tick to confirm that you certify that the Registrant is eligibile to register this domain and that all provided information is " .
    "true and accurate. Eligibility criteria may be viewed <a href=\"{TAC}\" target=\"_blank\">here</a>."
);
$_LANG["hxflagstachighlyregulateddescreco"] = ($_LANG["hxflagstachighlyregulateddescrdefault"] .
    "<br/>All .ECO domain names will be first registered with \"server hold\" status pending the completion of the minimum requirements of the Eco Profile, namely, " .
    "the .ECO registrant 1) affirming their compliance with the .ECO Eligibility Policy and 2) pledging to support positive change for " .
    "the planet and to be honest when sharing information on their environmental actions. The registrant will be emailed with instructions " .
    "on how to create an Eco Profile. Once these steps have been completed, the .ECO domain will be immediately activated by the registry."
);
$_LANG["hxflagstachighlyregulateddescrcoop"] = ("I, the registrant, understand, agree to, and certify that my organization meets at least one of the .COOP eligibility requirements:" .
    "<ul>" .
    "<li>a democratically controlled member-owned cooperative, consistent with the International 7 Cooperative Principles; or</li>" .
    "<li>an Association comprised of cooperatives; or</li>" .
    "<li>an Organization that is majority controlled by a Cooperative; or</li>" .
    "<li>an Entity whose operations are principally dedicated to serving Cooperatives.</li>" .
    "</ul>" .
    "I understand and agree that DotCooperation LLC conducts audits of .COOP domain registrations and reserves the right to cancel or modify a domain name in accordance with their policies."
);
$_LANG["hxflagstachighlyregulateddescrnotac"] = ("Tick to confirm the <b>Safeguards for Highly-regulated TLDs</b>:<br/>" .
    "<div style=\"text-align:justify\">You understand and agree that you will abide by and be compliant with these additional terms:" .
    "<ol><li>Administrative Contact Information. You agree to provide administrative contact information, which must be kept up-to-date, " .
    "for the notification of complaints or reports of registration abuse, as well as the contact details of the relevant regulatory, or " .
    "industry selfregulatory, bodies in their main place of business.</li>" .
    "<li>Representation. You confirm and represent that you possesses any necessary authorizations, charters, licenses and/or other related " .
    "credentials for participation in the sector associated with such Highly-Regulated TLD.</li>" .
    "<li>Report of Changes of Authorization, Charters, Licenses, Credentials. You agree to report any material changes to the validity of " .
    "your authorizations, charters, licenses and/or other related credentials for participation in the sector associated with the Highly-Regulated " .
    "TLD to ensure you continue to conform to the appropriate regulations and licensing requirements and generally conduct you activities in the " .
    "interests of the consumers you serve..</li></ol></div>"
);
$_LANG["hxflagstacindividualregulateddescrdefault"] = "Tick to confirm the <a href=\"{TAC}\" target=\"_blank\">Terms for Individuals</a>";
$_LANG["hxflagstacregulateddescrdefault"] = "Tick to confirm that you agree to the <a href=\"{TAC}\" target=\"_blank\">Registry Terms and Conditions of Registration</a> upon new registration of {TLD} domain names.";
$_LANG["hxflagstacregulateddescrcira"] = ("<div style=\"text-align:justify\">Tick to confirm you agree to the <a href=\"{TAC}\" target=\"_blank\">CIRA Registration Agreement</a> " .
    "and that CIRA may, from time to time and at its discretion, amend any or all of the terms and conditions of the " .
    "Registrant Agreement, as CIRA deems appropriate, by posting a notice of the changes on the CIRA website and by " .
    "sending a notice of any material changes to Registrant. You meet all the requirements of the Registrant Agreement " .
    "to be a Registrant, to apply for the registration of a Domain Name Registration, and to hold and maintain a Domain " .
    "Name Registration, including without limitation CIRA's Canadian Presence Requirements for Registrants, " .
    "<a href=\"https://static.cira.ca/policy/canadian-presence-requirements-for-registrants.pdf\" target=\"_blank\">here</a>. " .
    "CIRA will collect, use and disclose your personal information, as set out in CIRA's Privacy Policy, " .
    "<a href=\"https://www.cira.ca/policy/corporate/cira-privacy-policy\" target=\"_blank\">here</a>.</div>"
);
$_LANG["hxflagstacregulateddescrngo"] = ($_LANG["hxflagstacregulateddescrdefault"] .
    "<div style=\"padding:10px 0px;\">The registration of a {TLD} domain name is bundled with an .ONG domain name without additional costs. " .
    "Changes on the {TLD} Domain will be auto-applied to the .ONG Domain. You won't find the .ONG domain therefore listed in your domain inventory.</div>"
);
$_LANG["hxflagstacregulateddescritsection3"] = ("Tick to confirm that you agree to <b><a href=\"{TAC}\" target=\"_blank\">Section 3 - Declarations and Assumptions of Liability</a></b>.<br/>" .
    "<div style=\"text-align:justify;margin-bottom:10px;\">" .
    "The Registrant of the domain name in question, declares under their own responsibility that they are:" .
    "<ul><li>in possession of the citizenship or resident in a country belonging to the European Union (in the case of registration for natural persons);</li>" .
    "<li>established in a country belonging to the European Union (in the case of registration for other organizations);</li>" .
    "<li>aware and accept that the registration and management of a domain name is subject to the <a href=\"{TAC}\" target=\"_blank\">'Management of synchronous operations on domain names of the ccTLD {TLD} - Guidelines'</a> " .
    "and <a href=\"{TAC}\" target=\"_blank\">'Dispute resolution in the ccTLD {TLD} - Regulations & Guidelines'</a> and their subsequent amendments;</li>" .
    "<li>entitled to the use and/or legal availability of the domain name applied for, and that they do not prejudice, with the request for registration, the rights of others;</li>" .
    "<li>aware that for the inclusion of personal data in the Database of assigned domain names, and their possible dissemination and accessibility via the Internet, consent must be " .
    "given explicitly by ticking the appropriate boxes in the information below. See the <a href=\"{TAC}\" target=\"_blank\">'DBNA and WHOIS Policy'</a>;</li>" .
    "<li>aware and agree that in the case of erroneous or false declarations in this request, the Registry shall immediately revoke the domain name, or proceed with other legal actions. " .
    "In such case the revocation shall not in any way give rise to claims against the Registry;</li>" .
    "<li>release the Registry from any liability resulting from the assignment and use of the domain name by the natural person that has made the request;</li>" .
    "<li>accept Italian jurisdiction and laws of the Italian State.</li></ul>" .
    "</div>"
);
$_LANG["hxflagstacregulateddescritsection5"] = ("Tick to confirm that you agree to <b><a href=\"{TAC}\" target=\"_blank\">Section 5 - Consent to the processing of personal data for registration</b></a><br/>" .
    "<div style=\"text-align:justify;margin-bottom:10px;\">" .
    "The interested party, after reading the above disclosure, gives consent to the processing of information required for registration, as defined " .
    "in the above disclosure. Giving consent is optional, but if no consent is given, it will not be possible to finalize the registration, assignment and management of the domain name.</div>"
);
$_LANG["hxflagstacregulateddescritsection6"] = ("Tick to confirm that you agree to <b><a href=\"{TAC}\" target=\"_blank\">Section 6 - Consent to the processing of personal data for diffusion and accessibility via the Internet</b></a><br/>" .
    "<div style=\"text-align:justify;margin-bottom:10px;\">" .
    "The interested party, after reading the above disclosure, gives consent to the dissemination and accessibility via the Internet, as defined in the disclosure above. " .
    "Giving consent is optional, but absence of consent does not allow the dissemination and accessibility of Internet data.</div>"
);
$_LANG["hxflagstacregulateddescritsection7"] = ("Tick to confirm that you agree to <b><a href=\"{TAC}\" target=\"_blank\">Section 7 - Explicit Acceptance of the following points</b></a><br/>" .
    "<div style=\"text-align:justify;margin-bottom:10px;\">" .
    "For explicit acceptance, the interested party declares that they:" .
    "<ul><li>d) are aware and agree that the registration and management of a domain name is subject to the <a href=\"{TAC}\" target=\"_blank\">Rules of assignment and management of domain names " .
    "in ccTLD {TLD}'</a> and <a href=\"{TAC}\" target=\"_blank\">Regulations for the resolution of disputes in the ccTLD {TLD}'</a> and their subsequent amendments;</li>" .
    "<li>e) are aware and agree that in the case of erroneous or false declarations in this request, the Registry shall immediately revoke the domain name, or " .
    "proceed with other legal actions. In such case the revocation shall not in any way give rise to claims against the Registry;</li>" .
    "<li>f) release the Registry from any liability resulting from the assignment and use of the domain name by the natural person that has made the request;</li>" .
    "<li>g) accept the Italian jurisdiction and laws of the Italian State.</li></ul>" .
    "</div>"
);
$_LANG["hxflagstacregulateddescrgoogle"] = ("You acknowledge that {TLD} is a secured namespace, meaning that {TLD} domain names require an SSL certificate to work. " .
    "Websites using a {TLD} domain name can only be accessed by web browsers using HTTPS through an encrypted and secured connection."
);

// Generic Fields, prefixed with hxflags
$_LANG["hxflagsintendeduse"] = "Intended Use";
$_LANG["hxflagsyesnoyes"] = "Yes";
$_LANG["hxflagsyesnono"] = "No";
$_LANG["hxflagsyesnoy"] = "Yes";
$_LANG["hxflagsyesnon"] = "No";
$_LANG["hxflagsyesno1"] = "Yes";
$_LANG["hxflagsyesno0"] = "No";

$_LANG["hxflagslegaltype"] = "Legal Type";
$_LANG["hxflagslegaltypeindiv"] = "Individual";
$_LANG["hxflagslegaltypeorg"] = "Organization";
$_LANG["hxflagsapplicationpurpose"] = "Intended Use";
$_LANG["hxflagsregistrantidnumber"] = "Registrant ID Number";
$_LANG["hxflagsregistrantvatid"] = "Registrant VAT ID";
$_LANG["hxflagsadminidnumber"] = "Admin-C ID Number";
$_LANG["hxflagsadminvatid"] = "Admin-C VAT ID";
$_LANG["hxflagstechidnumber"] = "Tech-C ID Number";
$_LANG["hxflagstechvatid"] = "Tech-C VAT ID";
$_LANG["hxflagsbillingidnumber"] = "Billing-C ID Number";
$_LANG["hxflagsregistrantidtype"] = "Registrant ID Type";
$_LANG["hxflagsallocationtoken"] = "Registry's Allocation Token";
$_LANG["hxflagsallocationtokendescr"] = ("To register a {TLD} domain, you must provide the allocation token issued by the registry. " .
    "Please complete the registrant application <a href=\"{TAC}\" target=\"_blank\">here</a> to obtain the token."
);
$_LANG["hxflagsnexuscategory"] = "Nexus Category";
$_LANG["hxflagsnexuscountry"] = "Nexus Country";
$_LANG["hxflagsfax"] = "Fax Required";
$_LANG["hxflagsfaxregistrationdescr"] = "I confirm that after this registration request I will send <a href=\"{FAXFORM}\" target=\"_blank\">this form</a> back to complete the process.";
$_LANG["hxflagsfaxtransferdescr"] = "I confirm that after this transfer request I will send <a href=\"{FAXFORM}\" target=\"_blank\">this form</a> back to complete the process.";
$_LANG["hxflagsidentificationnumber"] = "Identification Number";
$_LANG["hxflagswhoisoptout"] = "WHOIS Opt-out";
$_LANG["hxflagsregistrantbirthdate"] = "Registrant Birthdate";

// AFNIC TLDs, prefixed with hxflagsafnic
// Individuals
// reusing .ru translations for birthday
$_LANG["hxflagsafnictldregistrantbirthplace"] = "Individuals Birthplace";
$_LANG["hxflagsafnictldregistrantbirthplacedescr"] = "(required for individuals)";
// Companies
$_LANG["hxflagsafnictldvatid"] = "VATID or SIREN/SIRET number";
$_LANG["hxflagsafnictldvatiddescr"] = "(Only for companies with VATID or SIREN/SIRET number)";
$_LANG["hxflagsafnictldtrademark"] = "Trademark Number";
$_LANG["hxflagsafnictldtrademarkdescr"] = "(Only for companies with a European trademark)";
$_LANG["hxflagsafnictldduns"] = "DUNS Number";
$_LANG["hxflagsafnictlddunsdescr"] = "(Only for companies with DUNS number)";
$_LANG["hxflagsafnictldlocalid"] = "Local ID";
$_LANG["hxflagsafnictldlocaliddescr"] = "(Only for companies with local identifier)";
// French Association, Data from Journal officiel [JO]
$_LANG["hxflagsafnictldjodod"] = "Date of Declaration [JO]";
$_LANG["hxflagsafnictldjododdescr"] = "(Only for french association, form: <b>YYYY-MM-DD</b>)";
$_LANG["hxflagsafnictldjonumber"] = "Number [JO]";
$_LANG["hxflagsafnictldjonumberdescr"] = "(Only for french association, The number of the Journal Officiel)";
$_LANG["hxflagsafnictldjopage"] = "Page of Announcement [JO]";
$_LANG["hxflagsafnictldjopagedescr"] = "(Only for french association, The page of the announcement in the Journal Officiel)";
$_LANG["hxflagsafnictldjodop"] = "Date of Publication [JO]";
$_LANG["hxflagsafnictldjodopdescr"] = "(Only for french association, The date of publication in the Journal Officiel in the form <b>YYYY-MM-DD</b>)";
// Options, Legal Type
$_LANG["hxflagsafnictldlegaltypeindiv"] = "Individual";
$_LANG["hxflagsafnictldlegaltypeorg1"] = "Company with VATID or SIREN/SIRET number";
$_LANG["hxflagsafnictldlegaltypeorg2"] = "Company with European Trademark";
$_LANG["hxflagsafnictldlegaltypeorg3"] = "Company with DUNS Number";
$_LANG["hxflagsafnictldlegaltypeorg4"] = "Company local identifier";
$_LANG["hxflagsafnictldlegaltypeass"] = "French Association";

// .AERO
$_LANG["hxflagsaerotldaeroid"] = ".AERO ID <sup style=\"cursor:help;\" title=\"Obtain from https://www.information.aero/\">what's this?</sup>";
$_LANG["hxflagsaerotldaerokey"] = ".AERO Key <sup style=\"cursor:help;\" title=\"Obtain from https://www.information.aero/\">what's this?</sup>";

// .BE
$_LANG["hxflagsbetldtradeauthdescr"] = "The Change of Registrant requires a valid EPP Code. This applies when changing Registrant's Name, Organization or Email Address.";

// .CA
$_LANG["hxflagscatldcontactlanguage"] = "Contact Language";
$_LANG["hxflagscatldregistryinformation"] = "Registry Information";
$_LANG["hxflagscatldregistryinformationdescr"] = ("Whenever you register a {TLD} domain for a new registrant (or change the registrant to a new one), this new registrant has to agree to the " .
    "registrant agreement within 7 days so that the domain becomes active. Otherwise the domain is getting deleted by the registry without any refund. " .
    "<br/><b>Only in such a case, a confirmation email will be send out to the new registrant covering the necessary steps to accept this agreement.</b><br/>" .
    "If the same (already confirmed) registrant contact is used to register another {TLD} domain then the domain will be registered in real-time."
);
// Options, Legal Type
$_LANG["hxflagscatldlegaltypecco"] = "Corporation";
$_LANG["hxflagscatldlegaltypecct"] = "Canadian Citizen";
$_LANG["hxflagscatldlegaltyperes"] = "Permanent Resident of Canada";
$_LANG["hxflagscatldlegaltypegov"] = "Government or government entity in Canada";
$_LANG["hxflagscatldlegaltypeedu"] = "Canadian Educational Institution";
$_LANG["hxflagscatldlegaltypeass"] = "Canadian Unincorporated Association";
$_LANG["hxflagscatldlegaltypehos"] = "Canadian Hospital";
$_LANG["hxflagscatldlegaltypeprt"] = "Partnership Registered in Canada";
$_LANG["hxflagscatldlegaltypetdm"] = "Trade-mark registered in Canada (by a non-Canadian owner)";
$_LANG["hxflagscatldlegaltypetrd"] = "Canadian Trade Union";
$_LANG["hxflagscatldlegaltypeplt"] = "Canadian Political Party";
$_LANG["hxflagscatldlegaltypelam"] = "Canadian Library Archive or Museum";
$_LANG["hxflagscatldlegaltypetrs"] = "Trust established in Canada";
$_LANG["hxflagscatldlegaltypeabo"] = "Aboriginal Peoples (individuals or groups) indigenous to Canada";
$_LANG["hxflagscatldlegaltypeinb"] = "Indian Band recognized by the Indian Act of Canada";
$_LANG["hxflagscatldlegaltypelgr"] = "Legal Representative of a Canadian Citizen or Permanent Resident";
$_LANG["hxflagscatldlegaltypeomk"] = "Official mark registered in Canada";
$_LANG["hxflagscatldlegaltypemaj"] = "Her Majesty the Queen";
// Legal Type Description, don't move it up.
$_LANG["hxflagscatldlegaltypedescr"] = ("<p>The canadian Registry (`CIRA`) is committed to protecting the privacy of personal information in the course of its operation and administration of the domain name.</p>" .
    "<p>Registrants with the following canadian presence categories are considered to be individuals:</p>" .
    "<ul>" .
    "<li>" . $_LANG["hxflagscatldlegaltypecct"] . "</li>" .
    "<li>" . $_LANG["hxflagscatldlegaltyperes"] . "</li>" .
    "<li>" . $_LANG["hxflagscatldlegaltypelgr"] . "</li>" .
    "<li>" . $_LANG["hxflagscatldlegaltypeabo"] . "</li>" .
    "</ul>" .
    "<p>All other categories are considered to be non-individual registrants and are not permitted to change their WHOIS privacy settings. For non-individuals " .
    "contact data is public and is published in WHOIS by the registry. Individuals can decide by using the `" . $_LANG["hxflagswhoisoptout"] . "` field below.</p>"
);

// .CN
// Options, Registrant ID Type
$_LANG["hxflagscntldregistrantidtypesfz"] = "Chinese ID Card";
$_LANG["hxflagscntldregistrantidtypehz"] = "Foreign Passport";
$_LANG["hxflagscntldregistrantidtypegajmtx"] = "Exit-Entry Permit for Travelling to and from Hong Kong and Macao";
$_LANG["hxflagscntldregistrantidtypetwjmtx"] = "Travel passes for Taiwan Residents to Enter or Leave the Mainland";
$_LANG["hxflagscntldregistrantidtypewjlsfz"] = "Foreign Permanent Resident ID Card";
$_LANG["hxflagscntldregistrantidtypegajzz"] = "Residence permit for Hong Kong / Macao residents";
$_LANG["hxflagscntldregistrantidtypetwjzz"] = "Residence permit for Taiwan residents";
$_LANG["hxflagscntldregistrantidtypejgz"] = "Chinese officer certificate";
$_LANG["hxflagscntldregistrantidtypeorg"] = "Chinese Organization Code Certificate";
$_LANG["hxflagscntldregistrantidtypeyyzz"] = "Chinese business license";
$_LANG["hxflagscntldregistrantidtypetydm"] = "Certificate for Uniform Social Credit Code";
$_LANG["hxflagscntldregistrantidtypebddm"] = "Military Code Designation";
$_LANG["hxflagscntldregistrantidtypejddwfw"] = "Military Paid External Service License";
$_LANG["hxflagscntldregistrantidtypesydwfr"] = "Public Institution Legal Person Certificate";
$_LANG["hxflagscntldregistrantidtypewgczjg"] = "Resident Representative Offices of Foreign Enterprises Registration Form";
$_LANG["hxflagscntldregistrantidtypeshttfr"] = "Social Organization Legal Person Registration Certificate";
$_LANG["hxflagscntldregistrantidtypezjcs"] = "Religion Activity Site Registration Certificate";
$_LANG["hxflagscntldregistrantidtypembfqy"] = "Private Non-Enterprise Entity Registration Certificate";
$_LANG["hxflagscntldregistrantidtypejjhfr"] = "Fund Legal Person Registration Certificate";
$_LANG["hxflagscntldregistrantidtypelszy"] = "Practicing License of Law Firm";
$_LANG["hxflagscntldregistrantidtypewgzhwh"] = "Registration Certificate of Foreign Cultural Center in China";
$_LANG["hxflagscntldregistrantidtypewlczjg"] = "Resident Representative Office of Tourism Departments of Foreign Government Approval Registration Certificate";
$_LANG["hxflagscntldregistrantidtypesfjd"] = "Judicial Expertise License";
$_LANG["hxflagscntldregistrantidtypejwjg"] = "Overseas Organization Certificate";
$_LANG["hxflagscntldregistrantidtypeshfwjg"] = "Social Service Agency Registration Certificate";
$_LANG["hxflagscntldregistrantidtypembxxbx"] = "Private School Permit";
$_LANG["hxflagscntldregistrantidtypeyljgzy"] = "Medical Institution Practicing License";
$_LANG["hxflagscntldregistrantidtypegzjgzy"] = "Notary Organization Practicing License";
$_LANG["hxflagscntldregistrantidtypebjwsxx"] = "Beijing School for Children of Foreign Embassy Staff in China Permit";
$_LANG["hxflagscntldregistrantidtypeqttydm"] = "Others - Certificate for Uniform Social Credit Code";
$_LANG["hxflagscntldregistrantidtypeqt"] = "Others";

// .COM.AU
// Options, Registrant ID Type
$_LANG["hxflagsautldregistrantidtypeabn"] = "Australian Business Number";
$_LANG["hxflagsautldregistrantidtypeacn"] = "Australian Company Number";
$_LANG["hxflagsautldregistrantidtyperbn"] = "Business Registration Number";
$_LANG["hxflagsautldregistrantidtypetm"] = "Trademark Number";

// .COM.BR
$_LANG["hxflagscombrtldidentificationnumberdescr"] = "Please provide your CPF or CNPJ numbers which are issued by the Department of Federal Revenue of Brazil for tax purposes";

// .DE
$_LANG["hxflagsdetldgeneralrequestcontact"] = "General Request Contact";
$_LANG["hxflagsdetldabuseteamcontact"] = "Abuse Team Contact";
$_LANG["hxflagsdetldgeneralrequestcontactdescr"] = "The registry will identify this as the general request contact information. You can provide an email address or a website url.";
$_LANG["hxflagsdetldabuseteamcontactdescr"] = "The registry will identify this as the abuse team contact information. You can provide an email address or a website url.";

// .DK
$_LANG["hxflagsdktldregistrantcontact"] = "Registrant Contact";
$_LANG["hxflagsdktldregistrantlegaltype"] = "Registrant Legal Type";
$_LANG["hxflagsdktldregistrantvatiddescr"] = "(required in case of chosen option `Organization`)";
$_LANG["hxflagsdktldadminvatiddescr"] = "(required in case of chosen option `Organization`)";
$_LANG["hxflagsdktldregistrantlegaltypeindiv"] = "Individual";
$_LANG["hxflagsdktldregistrantlegaltypeorg"] = "Organization";
$_LANG["hxflagsdktldadmincontact"] = "Admin Contact";
$_LANG["hxflagsdktldadminlegaltype"] = "Admin Legal Type";
$_LANG["hxflagsdktldadminlegaltypeindiv"] = "Individual";
$_LANG["hxflagsdktldadminlegaltypeorg"] = "Organization";
$_LANG["hxflagsdktldlegaltypedescr"] = "Also choose `Individual` in case you're a company without VATID (Company data will then be suppressed in registration process).";
$_LANG["hxflagsdktldregistrantlegaltypedescr"] = $_LANG["hxflagsdktldlegaltypedescr"] . "<div style=\"margin-top:10px\"><b>Note for Registrants:</b> DK Hostmaster will be requesting the Confirmation by Email. Please check your inbox plus spam folder and confirm within 4 days.</div>";
$_LANG["hxflagsdktldcontactdescr"] = "DK-HOSTMASTER User ID";

// .ES
$_LANG["hxflagsestldregistranttype"] = "Registrant Contact Type";
$_LANG["hxflagsestldregistrantidentificationnumber"] = "Registrant Identification Number";
$_LANG["hxflagsestldadmintype"] = "Admin Contact Type";
$_LANG["hxflagsestldadminidentificationnumber"] = "Admin Contact Identification Number";
$_LANG["hxflagsestldlegalform"] = "Registrant Legal Type";
// Options, Legal Type
$_LANG["hxflagsestldlegalform1"] = "Individual";
$_LANG["hxflagsestldlegalform39"] = "Economic Interest Group";
$_LANG["hxflagsestldlegalform47"] = "Association";
$_LANG["hxflagsestldlegalform59"] = "Sports Association";
$_LANG["hxflagsestldlegalform68"] = "Professional Association";
$_LANG["hxflagsestldlegalform124"] = "Savings Bank";
$_LANG["hxflagsestldlegalform150"] = "Community Property";
$_LANG["hxflagsestldlegalform152"] = "Community of Owners";
$_LANG["hxflagsestldlegalform164"] = "Order or Religious Institution";
$_LANG["hxflagsestldlegalform181"] = "Consulate";
$_LANG["hxflagsestldlegalform197"] = "Public Law Association";
$_LANG["hxflagsestldlegalform203"] = "Embassy";
$_LANG["hxflagsestldlegalform229"] = "Local Authority";
$_LANG["hxflagsestldlegalform269"] = "Sports Federation";
$_LANG["hxflagsestldlegalform286"] = "Foundation";
$_LANG["hxflagsestldlegalform365"] = "Mutual Insurance Company";
$_LANG["hxflagsestldlegalform434"] = "Regional Government Body";
$_LANG["hxflagsestldlegalform436"] = "Central Government Body";
$_LANG["hxflagsestldlegalform439"] = "Political Party";
$_LANG["hxflagsestldlegalform476"] = "Trade Union";
$_LANG["hxflagsestldlegalform510"] = "Farm Partnership";
$_LANG["hxflagsestldlegalform524"] = "Public Limited Company";
$_LANG["hxflagsestldlegalform525"] = "Sports Association";
$_LANG["hxflagsestldlegalform554"] = "Civil Society";
$_LANG["hxflagsestldlegalform560"] = "General Partnership";
$_LANG["hxflagsestldlegalform562"] = "General and Limited Partnership";
$_LANG["hxflagsestldlegalform566"] = "Cooperative";
$_LANG["hxflagsestldlegalform608"] = "Employee-owned Company";
$_LANG["hxflagsestldlegalform612"] = "Limited Company";
$_LANG["hxflagsestldlegalform713"] = "Spanish Office";
$_LANG["hxflagsestldlegalform717"] = "Temporary Alliance of Enterprises";
$_LANG["hxflagsestldlegalform744"] = "Employee-owned Limited Company";
$_LANG["hxflagsestldlegalform745"] = "Regional Public Entity";
$_LANG["hxflagsestldlegalform746"] = "National Public Entity";
$_LANG["hxflagsestldlegalform747"] = "Local Public Entity";
$_LANG["hxflagsestldlegalform878"] = "Designation of Origin Supervisory Council";
$_LANG["hxflagsestldlegalform879"] = "Entity Managing Natural Areas";
$_LANG["hxflagsestldlegalform877"] = "Others";
// Options, Registrant ID Type
$_LANG["hxflagsestldregistranttype0"] = "For non-spanish owner";
$_LANG["hxflagsestldregistranttype1"] = "For Spanish Individual or Organization";
$_LANG["hxflagsestldregistranttype3"] = "Alien registration card";
$_LANG["hxflagsestldregistranttype4"] = "VAT ID";
$_LANG["hxflagsestldadmintype0"] = "For non-spanish entity";
$_LANG["hxflagsestldadmintype1"] = "For Spanish Individual or Organization";
$_LANG["hxflagsestldadmintype3"] = "Alien registration card";

// .EU
$_LANG["hxflagseutldregistrantcitizenship"] = "Registrant Citizenship";
$_LANG["hxflagseutldregistrantcitizenshipdescr"] = "Please provide this information only if you are an 'Individual' and you are a European citizen residing outside of the European Union.";
$_LANG["hxflagseutldlegaltypeindiv"] = $_LANG["hxflagslegaltypeindiv"];
$_LANG["hxflagseutldlegaltypeorg"] = $_LANG["hxflagslegaltypeorg"];

// .FI
$_LANG["hxflagsfitldregistrantidnumberdescr"] = ("<ul><li>Companies: Please provide the registernumber.</li>" .
    "<li>Individuals from Finland: provide the identity number.</li>" .
    "<li>Other Individuals: leave empty.</li></ul>" .
    "For individuals, please note that the X-FI-REGISTRANT-IDNUMBER has to contain of eleven characters of the form DDMMYYCZZZQ, " .
    "where DDMMYY is the date of birth, C the century sign, ZZZ the individual number and Q the control character (checksum). The " .
    "sign for the century is either + (1800–1899), - (1900–1999), or A (2000–2099). The individual number ZZZ is odd for males and " .
    "even for females and for people born in Finland its range is 002-899 (larger numbers may be used in special cases). An example " .
    "of a valid code is 311280-888Y."
);
$_LANG["hxflagsfitldregistrantbirthdatedescr"] = "(YYYY-MM-DD; only required for Individuals not from Finland)";

// .HK
$_LANG["hxflagshktldregistrantdocumenttype"] = "Registrant Document Type";
$_LANG["hxflagshktldregistrantotherdocumenttype"] = "Registrant Other Document Type";
$_LANG["hxflagshktldregistrantdocumentnumber"] = "Registrant Document Number";
$_LANG["hxflagshktldregistrantdocumentorigincountry"] = "Registrant Document Origin Country";
$_LANG["hxflagshktldregistrantbirthdateforindividuals"] = "Registrant Birth Date for individuals";
// Options, Registrant Document Type
$_LANG["hxflagshktldregistrantdocumenttypehkid"] = "Individual - Hong Kong Identity Number";
$_LANG["hxflagshktldregistrantdocumenttypeothid"] = "Individual - Other's Country Identity Number";
$_LANG["hxflagshktldregistrantdocumenttypepassno"] = "Individual - Passport No.";
$_LANG["hxflagshktldregistrantdocumenttypebirthcert"] = "Individual - Birth Certificate";
$_LANG["hxflagshktldregistrantdocumenttypeothidv"] = "Individual - Others Individual Document";
$_LANG["hxflagshktldregistrantdocumenttypebr"] = "Organization - Business Registration Certificate";
$_LANG["hxflagshktldregistrantdocumenttypeci"] = "Organization - Certificate of Incorporation";
$_LANG["hxflagshktldregistrantdocumenttypecrs"] = "Organization - Certificate of Registration of a School";
$_LANG["hxflagshktldregistrantdocumenttypehksarg"] = "Organization - Hong Kong Special Administrative Region Government Department";
$_LANG["hxflagshktldregistrantdocumenttypehkordinance"] = "Organization - Ordinance of Hong Kong";
$_LANG["hxflagshktldregistrantdocumenttypeothorg"] = "Organization - Others Organization Document";
$_LANG["hxflagshktldregistrantdocumenttypedescr"] = ("(NOTE: Additionally, you may need to send us a copy of the document via email. For .HK, this step is only required " .
    "upon request by the registry. For .COM.HK, a copy of a business certificate is required before we can process the registration.)"
);
$_LANG["hxflagshktldregistrantotherdocumenttypedescr"] = "(required for Registrant Document Types `Others Individual/Organization Document`)";
$_LANG["hxflagshktldregistrantbirthdateforindividualsdescr"] = "(mandatory for individuals, form YYYY-MM-DD)";

// .IE
$_LANG["hxflagsietldregistrantclass"] = "Registrant Classification";
$_LANG["hxflagsietldproofofconnectiontoireland"] = "Proof of connection to Ireland";
$_LANG["hxflagsietldproofofconnectiontoirelanddescr"] = ("Provide any information supporting your registration request, such as proof of eligibility (e.g. " .
    "VAT, RBN, CRO, CHY, NIC, or Trademark number; school roll number; link to social media page) or a " .
    "brief explanation of why you want this domain and what you will use it for."
);
// Options, Registrant Class
$_LANG["hxflagsietldregistrantclasscompany"] = "Company";
$_LANG["hxflagsietldregistrantclassbusinessowner"] = "Business Owner";
$_LANG["hxflagsietldregistrantclassclubbandlocalgroup"] = "Club/Band/Local Group";
$_LANG["hxflagsietldregistrantclassschoolcollege"] = "School/College";
$_LANG["hxflagsietldregistrantclassstateagency"] = "State Agency";
$_LANG["hxflagsietldregistrantclasscharity"] = "Charity";
$_LANG["hxflagsietldregistrantclassbloggerother"] = "Blogger/Other";

// .IT
$_LANG["hxflagsittldpin"] = "PIN";
$_LANG["hxflagsittldpindescr"] = (
    "If the registrant is an <b>Individual</b>, the .IT PIN has to be:<ul>" .
    "<li>The registrant's fiscal code (for Italian citizens consisting of exactly 16 characters and numbers) or</li>" .
    "<li>The number of an identity document (for citizens resident in other EU states, where there is no equivalent individual fiscal code).</li>" .
    "</ul>If the registrant is an <b>Organization</b>, the .IT PIN has to be:<ul>" .
    "<li>The company's fiscal code (for Italian companies consisting of exactly 11 digits) or</li>" .
    "<li>The company's VAT number</li></ul>"
);
$_LANG["hxflagsittldacceptsection3"] = "Section 3 of .IT registrar contract";
$_LANG["hxflagsittldacceptsection5"] = "Section 5 of .IT registrar contract";
$_LANG["hxflagsittldacceptsection6"] = "Section 6 of .IT registrar contract";
$_LANG["hxflagsittldacceptsection7"] = "Section 7 of .IT registrar contract";
$_LANG["hxflagsittldregistrantnationality"] = "Registrant Nationality";
$_LANG["hxflagsittldregistrantnationalitydescr"] = "(the nationality of the registrant contact if it deviates from the country code.)";
$_LANG["hxflagsittldregistrantlegaltype"] = "Registrant Legal Type";
$_LANG["hxflagsittldregistrantlegaltype1"] = "[1] Italian and foreign natural persons";
$_LANG["hxflagsittldregistrantlegaltype2"] = "[2] Italian Companies / One man companies";
$_LANG["hxflagsittldregistrantlegaltype3"] = "[3] Italian Freelance workers / Professionals";
$_LANG["hxflagsittldregistrantlegaltype4"] = "[4] Italian non-profit Organizations";
$_LANG["hxflagsittldregistrantlegaltype5"] = "[5] Italian public Organizations";
$_LANG["hxflagsittldregistrantlegaltype6"] = "[6] Other Italian Subjects";
$_LANG["hxflagsittldregistrantlegaltype7"] = "[7] Other EU-member state Organisation (matching 2 - 6)";

// .JOBS
$_LANG["hxflagsjobstldyesnono"] = "No";
$_LANG["hxflagsjobstldyesnoyes"] = "Yes";
$_LANG["hxflagsjobstldwebsite"] = "Website";
$_LANG["hxflagsjobstldindustryclassification"] = "Industry Classification";
$_LANG["hxflagsjobstldmemberofahrassociation"] = "Member of a Human Resources Association";
$_LANG["hxflagsjobstldcontactjobtitle"] = "Contact Job Title (e.g. CEO)";
$_LANG["hxflagsjobstldcontacttype"] = "Contact Type";
// Options, Industry Classification
$_LANG["hxflagsjobstldindustryclassification2"] = "Accounting/Banking/Finance";
$_LANG["hxflagsjobstldindustryclassification3"] = "Agriculture/Farming";
$_LANG["hxflagsjobstldindustryclassification21"] = "Biotechnology/Science";
$_LANG["hxflagsjobstldindustryclassification5"] = "Computer/Information Technology";
$_LANG["hxflagsjobstldindustryclassification4"] = "Construction/Building Services";
$_LANG["hxflagsjobstldindustryclassification12"] = "Consulting";
$_LANG["hxflagsjobstldindustryclassification6"] = "Education/Training/Library";
$_LANG["hxflagsjobstldindustryclassification7"] = "Entertainment";
$_LANG["hxflagsjobstldindustryclassification13"] = "Environmental";
$_LANG["hxflagsjobstldindustryclassification19"] = "Hospitality";
$_LANG["hxflagsjobstldindustryclassification10"] = "Government/Civil Service";
$_LANG["hxflagsjobstldindustryclassification11"] = "Healthcare";
$_LANG["hxflagsjobstldindustryclassification15"] = "HR/Recruiting";
$_LANG["hxflagsjobstldindustryclassification16"] = "Insurance";
$_LANG["hxflagsjobstldindustryclassification17"] = "Legal";
$_LANG["hxflagsjobstldindustryclassification18"] = "Manufacturing";
$_LANG["hxflagsjobstldindustryclassification20"] = "Media/Advertising";
$_LANG["hxflagsjobstldindustryclassification9"] = "Parks & Recreation";
$_LANG["hxflagsjobstldindustryclassification26"] = "Pharmaceutical";
$_LANG["hxflagsjobstldindustryclassification22"] = "Real Estate";
$_LANG["hxflagsjobstldindustryclassification14"] = "Restaurant/Food Service";
$_LANG["hxflagsjobstldindustryclassification23"] = "Retail";
$_LANG["hxflagsjobstldindustryclassification8"] = "Telemarketing";
$_LANG["hxflagsjobstldindustryclassification24"] = "Transportation";
$_LANG["hxflagsjobstldindustryclassification25"] = "Other";
// Options, Contact Type
$_LANG["hxflagsjobstldcontacttype1"] = "Administrative";
$_LANG["hxflagsjobstldcontacttype0"] = "Other";

// .LOTTO
$_LANG["hxflagslottotldmembershipcontactid"] = "Membership Contact ID";
$_LANG["hxflagslottotldverificationcode"] = "Verification Code";

// .LT
$_LANG["hxflagslttldlegalentityidentificationcode"] = "Legal Entity Identification Code";

// .MELBOURNE
// Options, Nexus Category
$_LANG["hxflagsmelbournetldnexuscategorya"] = "Victorian Entities";
$_LANG["hxflagsmelbournetldnexuscategoryb"] = "Victorian Residents";
$_LANG["hxflagsmelbournetldnexuscategoryc"] = "Associated Entities";
$_LANG["hxflagsmelbournetldnexuscategorydescr"] = ("<div style=\"padding:10px 0px;text-align:justify\"><b>Registration Eligibility</b><br/>In order to register or " .
    "renew a domain name the Applicant or Registrant must satisfy one of the following Criteria A, B or C below:<br/><br/>" .
    "<b>Criteria A – Victorian Entities</b><br/>The Applicant must be an entity registered with the `<a href=\"https://asic.gov.au/\" target=\"_blank\">Australian Securities " .
    "and Investments Commission</a>` or the `<a href=\"https://register.business.gov.au/\" target=\"_blank\">Australian Business Register</a>` that:<ul>" .
    "<li>has an address in the State of Victoria associated with its ABN, ACN, RBN or ARBN; or</li><li>has a valid corporate address in the State of Victoria.</li></ul><br/>" .
    "<b>Criteria B – Victorian Residents</b><br/>The Applicant must be an Australian citizen or resident with a valid address in the State of Victoria.<br/><br/>" .
    "<b>Criteria C – Associated Entities</b><br/>The Applicant must be an Associated Entity. The Applicant may only apply for a domain name that is an Exact Match " .
    "or Partial Match to, or an Abbreviation, or an Acronym of:" .
    "<ul><li>the business name of the Applicant, or name by which the Applicant is commonly known ( i.e. a nickname) and the business name must be registered with the " .
    "appropriate authority in the jurisdiction in which that business is domiciled; or</li>" .
    "<li>a product that the Associated Entity manufactures or sells to entities or individuals residing in the State of Victoria;</li>" .
    "<li>a service that the Associated Entity provides to residents of the State of Victoria;</li>" .
    "<li>an event that the Associated Entity organises or sponsors in the State of Victoria;</li>" .
    "<li>an activity that the Associated Entity facilitates in the State of Victoria; or</li>" .
    "<li>a course or training program that the Associated Entity provides to residents of the State of Victoria.</li></div>"
);

// .MY
$_LANG["hxflagsmytldregistrantorganisationtype"] = "Registrant Organisation Type";
// Options, Registrant Organisation Type
$_LANG["hxflagsmytldregistrantorganisationtype1"] = "architect firm";
$_LANG["hxflagsmytldregistrantorganisationtype2"] = "audit firm";
$_LANG["hxflagsmytldregistrantorganisationtype3"] = "business pursuant to business registration act(rob)";
$_LANG["hxflagsmytldregistrantorganisationtype4"] = "business pursuant to commercial license ordinance";
$_LANG["hxflagsmytldregistrantorganisationtype5"] = "company pursuant to companies act(roc)";
$_LANG["hxflagsmytldregistrantorganisationtype6"] = "educational institution accredited/registered by relevant government department/agency";
$_LANG["hxflagsmytldregistrantorganisationtype7"] = "farmers organisation";
$_LANG["hxflagsmytldregistrantorganisationtype8"] = "federal government department or agency";
$_LANG["hxflagsmytldregistrantorganisationtype9"] = "foreign embassy";
$_LANG["hxflagsmytldregistrantorganisationtype10"] = "foreign office";
$_LANG["hxflagsmytldregistrantorganisationtype11"] = "government aided primary and/or secondary school";
$_LANG["hxflagsmytldregistrantorganisationtype12"] = "law firm";
$_LANG["hxflagsmytldregistrantorganisationtype13"] = "lembega (board)";
$_LANG["hxflagsmytldregistrantorganisationtype14"] = "local authority department or agency";
$_LANG["hxflagsmytldregistrantorganisationtype15"] = "maktab rendah sains mara (mrsm) under the administration of mara";
$_LANG["hxflagsmytldregistrantorganisationtype16"] = "ministry of defences department or agency";
$_LANG["hxflagsmytldregistrantorganisationtype17"] = "offshore company";
$_LANG["hxflagsmytldregistrantorganisationtype18"] = "parents teachers association";
$_LANG["hxflagsmytldregistrantorganisationtype19"] = "polytechnic under ministry of education administration";
$_LANG["hxflagsmytldregistrantorganisationtype20"] = "private higher educational institution";
$_LANG["hxflagsmytldregistrantorganisationtype21"] = "private school";
$_LANG["hxflagsmytldregistrantorganisationtype22"] = "regional office";
$_LANG["hxflagsmytldregistrantorganisationtype23"] = "religious entity";
$_LANG["hxflagsmytldregistrantorganisationtype24"] = "representative office";
$_LANG["hxflagsmytldregistrantorganisationtype25"] = "society pursuant to societies act(ros)";
$_LANG["hxflagsmytldregistrantorganisationtype26"] = "sports organisation";
$_LANG["hxflagsmytldregistrantorganisationtype27"] = "state government department or agency";
$_LANG["hxflagsmytldregistrantorganisationtype28"] = "trade union";
$_LANG["hxflagsmytldregistrantorganisationtype29"] = "trustee";
$_LANG["hxflagsmytldregistrantorganisationtype30"] = "university under the administration of ministry of education";
$_LANG["hxflagsmytldregistrantorganisationtype31"] = "valuer, appraiser, estate agent firm";

// .NO
$_LANG["hxflagsnotldregistrantidnumberdescr"] = ("Norwegian VAT number or a Personal ID (PID <a href='https://pid.norid.no/personid/lookup' target='_blank'>Person-ID</a>) is required."
);

// .NU
$_LANG["hxflagsnutldregistrantlegaltype"] = "Registrant Legal Type";
$_LANG["hxflagsnutldregistrantlegaltypeother"] = "Others";
$_LANG["hxflagsnutldregistrantlegaltypeorgeu"] = "EU Organization outside of Sweden";
$_LANG["hxflagsnutldregistrantidnumberdescr"] = ("<b>For individuals or companies located in Sweden</b> a valid Swedish personal or organizational number must be stated.<br/>" .
    "<b>For individuals and companies outside of Sweden</b> the ID number (e.g. Civic registration number, company registration number, or the equivalent) must be stated."
);
$_LANG["hxflagsnutldvatiddescr"] = "(Only required for companies that are located inside the European Union but outside Sweden)";

// .NYC
// Options, Nexus Category
$_LANG["hxflagsnyctldnexuscategory1"] = "Natural Person - primary domicile with physical address in NYC";
$_LANG["hxflagsnyctldnexuscategory2"] = "Entity or Organization - primary domicile with physical address in NYC";
$_LANG["hxflagsnyctldnexuscategorydescr"] = "(P.O Boxes are prohibited, see <a href=\"{TAC}\" target=\"_blank\">.nyc Nexus Policies</a>.)";

// .PRO
$_LANG["hxflagsprotldprofession"] = "Profession";
$_LANG["hxflagsprotldlicensenumber"] = "License Number";
$_LANG["hxflagsprotldauthority"] = "Authority";
$_LANG["hxflagsprotldauthoritywebsite"] = "Authority Website";

// .PT
$_LANG["hxflagspttldroid"] = "ROID";

// .RO
$_LANG["hxflagsrotldregistrantvatiddescr"] = "(required for EU countries AND for romanian registrants)";

// .RU
$_LANG["hxflagsrutldlegaltypeindiv"] = "Individual";
$_LANG["hxflagsrutldlegaltypeorg"] = "Organization";
$_LANG["hxflagsrutldregistrantbirthday"] = "Individuals Birthday";
$_LANG["hxflagsrutldregistrantbirthdaydescr"] = "(required for individuals, YYYY-MM-DD)";
$_LANG["hxflagsrutldregistrantpassportdata"] = "Individuals Passport Data";
$_LANG["hxflagsrutldregistrantpassportdatadescr"] = "(required for individuals; including passport number, issue date, and place of issue)<br/><br/>";

// .SE
$_LANG["hxflagssetldidentificationnumberdescr"] = ("<div style=\"text-align:justify\"><b>For individuals or companies located in Sweden</b> a valid Swedish personal or organizational number must be stated.<br/>" .
    "<b>For individuals and companies outside of Sweden</b> the ID number (e.g. Civic registration number, company registration number, or the equivalent) must be stated.</div>"
);

// .SG
$_LANG["hxflagssgtldrcbsingaporeid"] = "RCB Singapore ID";

// .SWISS
$_LANG["hxflagsswisstlduid"] = "Owner ID Number";
$_LANG["hxflagsswisstlduiddescr"] = "(The ID, in the specific context of {TLD} based on current rules, is the Swiss UID/UPI/IDE/IDI.<br/>Format for natural Persons: \"756.dddd.dddd.dd\" which is the dedicated format for UPI / Universal Person Identification.<br/>Format for Organizations: \"CHE-ddd.ddd.ddd\" which is the dedicated format for Business Identification Number or Enterprise ID.<br/>d = digit)";
$_LANG["hxflagsswisstldownertype"] = "Owner Type";
$_LANG["hxflagsswisstldownertypep"] = "Natural Person";
$_LANG["hxflagsswisstldownertypeo"] = "Organization";
$_LANG["hxflagsswisstldownertypedescr"] = "(The owner type, in the specific context of {TLD} based on current rules, depending on application for natural persons or organizations)";

// .SYDNEY
// Options, Nexus Category
$_LANG["hxflagssydneytldnexuscategorya"] = "Criteria A - New South Wales Entities";
$_LANG["hxflagssydneytldnexuscategoryb"] = "Criteria B - New South Wales Residents";
$_LANG["hxflagssydneytldnexuscategoryc"] = "Criteria C - Associated Entities";
$_LANG["hxflagssydneytldnexuscategorydescr"] = ("In order to register or renew a {TLD} domain name the Applicant or Registrant must satisfy one of the following Criteria A, B or C below:<br/><br/>" .
    "<b>Criteria A – New South Wales Entities</b><br/>" .
    "The Applicant must be an entity registered with the Australian Securities and Investments Commission or the Australian Business Register that:<br/>" .
    "has an address in the State of New South Wales associated with its ABN, ACN, RBN or ARBN; or has a valid corporate address in the State of New South Wales.<br/>" .
    "<b>Criteria B – New South Wales Residents</b><br/>" .
    "The Applicant must be an Australian citizen or resident with a valid address in the State of New South Wales.<br/>" .
    "<b>Criteria C – Associated Entities</b><br/>" .
    "The Applicant must be an Associated Entity. The Applicant may only apply for a domain name that is an Exact Match or Partial Match to, or an Abbreviation, or an Acronym of:<br/>" .
    "the business name of the Applicant, or name by which the Applicant is commonly known ( i.e. a nickname) and the business name must be registered with the appropriate authority in " .
    "the jurisdiction in which that business is domiciled; or a product that the Associated Entity manufactures or sells to entities or individuals residing in the State of New South Wales;" .
    "a service that the Associated Entity provides to residents of the State of New South Wales; an event that the Associated Entity organises or sponsors in the State of New South Wales;" .
    "an activity that the Associated Entity facilitates in the State of New South Wales; or a course or training program that the Associated Entity provides to residents of the State of New South Wales."
);

// .TRAVEL
$_LANG["hxflagstraveltldtravelindustry"] = "Related to the Travel Industry";
$_LANG["hxflagstraveltldtravelindustrydescr"] = "(We acknowledge a relationship to the travel industry and that we are engaged in or plan to engage in activities related to travel.)";
$_LANG["hxflagstraveltldyesno1"] = "Yes";
$_LANG["hxflagstraveltldyesno0"] = "No";

// .US
// Options, Intended Use
$_LANG["hxflagsustldapplicationpurposep1"] = "Business use for profit";
$_LANG["hxflagsustldapplicationpurposep2"] = "Non-profit business / Club / Association / Religious Organization";
$_LANG["hxflagsustldapplicationpurposep3"] = "Personal Use";
$_LANG["hxflagsustldapplicationpurposep4"] = "Educational purposes";
$_LANG["hxflagsustldapplicationpurposep5"] = "Government purposes";
// Options, Nexus Category, https://www.about.us/policies/ustld-nexus-codes
$_LANG["hxflagsustldnexuscategoryc11"] = "[C11] A natural person who is a US Citizen";
$_LANG["hxflagsustldnexuscategoryc12"] = "[C12] A natural person who is a permanent resident of the USA, or any of its possessions or territories";
$_LANG["hxflagsustldnexuscategoryc21"] = "[C21] A U.S.-based organization or company; explained in detail below";
$_LANG["hxflagsustldnexuscategoryc31"] = "[C31] A foreign entity or organization; explained in detail below";
$_LANG["hxflagsustldnexuscategoryc32"] = "[C32] A foreign entity that has an office or other facility in the US";
$_LANG["hxflagsustldnexuscategorycdescr"] = ("<ul><li>[C21]: A U.S.-based organization or company formed within one of the fifty (50) U.S. states, the District of Columbia, or any of the United States " .
    "possessions or territories; or organized or otherwise constituted under the laws of a state of the United States of America, the District of " .
    "Columbia or any of its possessions or territories or a U.S. federal, state, or local government entity or a political subdivision thereof</li>" .
    "<li>[C31]: A foreign entity or organization that has a bona fide presence in the United States of America or any of its possessions or territories who " .
    "regularly engages in lawful activities / sales of goods or services or other business, commercial or non-commercial, including not-for-profit relations in " .
    "the United States</li></ul>"
);
$_LANG["hxflagsustldnexuscountrydescr"] = "<div>Specify registrant's origin citizenship (in case of last two Nexus Category Options (C31 or C32)).</div>";

// .XXX
$_LANG["hxflagsxxxtldnonresolvingdomain"] = "NON-Resolving Domain";
$_LANG["hxflagsxxxtldmembershipid"] = ".XXX Membership ID";
$_LANG["hxflagsxxxtldmembershipiddescr"] = "(Required in order to make your .XXX domain resolving)";
// Options, Non-Resolving Domain
$_LANG["hxflagsxxxtldnonresolvingdomain0"] = "No - This domain SHOULD resolve";
$_LANG["hxflagsxxxtldnonresolvingdomain1"] = "Yes - This domain SHOULD NOT resolve";

// ----------------------------------------------------------------------
// ----------------------- WHOIS PRIVACY --------------------------------
// ----------------------------------------------------------------------
$_LANG["hxwhoisprivacy"] = "WHOIS Privacy";
$_LANG["hxwhoisprivacyrequestsuccess"] = "WHOIS Privacy Service changes applied successfully.";
$_LANG["hxwhoisprivacywhy"] = "Why WHOIS Privacy is important";
$_LANG["hxwhoisprivacyreason"] = ("Domain name registration requires personal contact information be provided for permanent storage managed by third party servers for WHOIS. " .
    "This means that your name, address, phone number and email is recorded and held by third parties without restriction. Some registries offer their own WHOIS Privacy service " .
    "for free that allows to shield WHOIS data from all third parties."
);
$_LANG["hxwhoisprivacystatus"] = "WHOIS Privacy Status";
$_LANG["hxwhoisprivacystatus1"] = "Your WHOIS information is currently protected";
$_LANG["hxwhoisprivacystatus0"] = "Your WHOIS information is currently unprotected";
$_LANG["hxwhoisprivacystatusnp"] = "WHOIS Privacy Service is ONLY available for Individuals";
$_LANG["hxwhoisprivacybttnenable"] = "Enable WHOIS Privacy";
$_LANG["hxwhoisprivacybttndisable"] = "Disable WHOIS Privacy";

// ----------------------------------------------------------------------
// ----------------------- DNSSEC MANAGEMENT ----------------------------
// ----------------------------------------------------------------------
$_LANG["cnicdnssecmanagement"] = "DNSSEC Management";

// ----------------------------------------------------------------------
// ----------------------- Private Nameservers List ---------------------
// ----------------------------------------------------------------------
$_LANG["hxpnslist"] = "Private Nameservers Listing";
$_LANG["hxpnscolpns"] = "Private Nameserver";
$_LANG["hxpnscolip"] = "IP Address";
$_LANG["hxpnsempty"] = "No private Nameserver registered under this domain name.";

// ----------------------------------------------------------------------
// ----------------------- Web Apps -------------------------------------
// ----------------------------------------------------------------------
$_LANG["hxwebapps"] = "Web Apps";

// ----------------------------------------------------------------------
// ------------------ Contact Information -------------------------------
// ----------------------------------------------------------------------
$_LANG["hxdomaincontactstradeinfo"] = ("Registrant Contact Data Changes may lead to a so-called Trade process that is " .
    "in some cases not completed in realtime. Please be patient if changes are not " .
    "reflected immediately."
);
// ----------------------------------------------------------------------
// ------------------ .CA Contact Confirmation --------------------------
// ----------------------------------------------------------------------
$_LANG["hxcacontactconfirmation"] = ".CA Contact Confirmation";
$_LANG["hxcacontactconfirmationdescr"] = "Please visit <a href=\"https://www.cira.ca/registrant-agreement\" target=\"_blank\">https://cira.ca</a> and use the below given ID to confirm the CIRA Registrant Agreement. If the same (already confirmed) registrant contact is used to register another .CA domain then the domain will be registered in real-time.";


// ----------------------------------------------------------------------
// ------------------ DNSSEC --------------------------------------------
// ----------------------------------------------------------------------
// Status Messages
$_LANG["dnssecautomaticupdatesuccessmsg"] = "DNSSEC has been <span style=\"color:green;font-weight:bold;\">activated</span> for your domain.<br> The DNSSEC records were imported from your DNS zone and updated at your domain registrar.<br><br><span style=\"color:#007bff;\">For your security, DNSSEC helps protect your domain from certain types of attacks by validating DNS responses.</span>";
$_LANG["dnssecautoenable"] = "Enable DNSSEC & auto-import records from DNS zone";
$_LANG["dnssecsyncrecords"] = "Sync DNSSEC records from DNS zone";

// Record Management
$_LANG["dnssecaddnewdskey"] = "Add New DS Key";
$_LANG["dnssecaddnewkeyrecord"] = "Add New Key Record";

// Modal Dialog
$_LANG["dnssecconfirmdisable"] = "Are you sure you want to disable DNSSEC for this domain? This action may affect domain resolution.";
$_LANG["dnssecmodaltitle"] = "Disable DNSSEC";
$_LANG["dnssecmodalcancel"] = "Cancel";
$_LANG["dnssecmodaldisable"] = "Disable DNSSEC";
