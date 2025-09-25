<?php

// #########################################################################
// #########################################################################
// # Add translations for CNR registrar module additional domain fields    #
// #########################################################################
// #########################################################################

// ----------------------------------------------------------------------
// ------------------ .DK Checkout Page ---------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrdkcheckoutheading"] = ".dk domænenavne vilkår og betingelser";
$_LANG["cnrdkcheckoutintro"] = "For at registrere et .dk-domænenavn skal du indgå en aftale om brugsret med Punktum dk A/S. Punktum dk er administrator for alle .dk-domænenavne.";
$_LANG["cnrdkcheckoutdomains"] = "Domænenavne:";
$_LANG["cnrdkcheckoutregistrant"] = "Registrant:";
$_LANG["cnrdkcheckoutregistrantaddress"] = "se ovenfor";
$_LANG["cnrdkcheckoutadmin"] = "Domæneadministrator:";
$_LANG["cnrdkcheckoutadminaddress"] = "Punktum dk A/S<br/>Ørestads Boulevard 108, 11. etage<br/>2300 København S";
$_LANG["cnrdkcheckouttac"] = implode("<br/><br/>", [
    "Jeg accepterer hermed at indgå en aftale om brugsret til det angivne .dk-domænenavn på de vilkår, der gælder herfor. Dette indebærer bl.a., at jeg til enhver tid skal sikre, at mine kontaktoplysninger som registrant er korrekte. Jeg gennemfører Punktum dk A/S' identitetskontrol, når der anmodes herom.",
    "Min brugsret til det angivne .dk-domænenavn kan overdrages, suspenderes, slettes og blokeres på de betingelser, der fremgår af Punktum dk A/S' vilkår.",
    "Jeg accepterer, at jeg efter den danske forbrugeraftalelov, § 18, stk. 2, nr. 13 giver afkald på retten til at fortryde indgåelse af aftale om brugsret til det angivne .dk-domænenavn.",
    "Jeg er indforstået med, at Punktum dk A/S som domæneadministrator anvender personoplysninger om mig i overensstemmelse med sin persondatapolitik.",
    "Jeg er indforstået med, at betaling for den første registreringsperiode af det angivne .dk-domænenavn sker til denne udbyder, og at betaling for efterfølgende registreringsperioder afhænger af mit valg af håndteringsordning, jf. punkt 2.1 i Punktum dk A/S' vilkår."
]);
$_LANG["cnrdkcheckouttacurl"] = "https://www.punktum.dk/artikler/vilkaar-for-brugsret-til-et-dkdomaenenavn";
$_LANG["cnrdkcheckouttacurltext"] = "Vilkår og betingelser for brugsretten til et .dk-domænenavn";
$_LANG["cnrdkcheckoutpolicyurl"] = "https://www.punktum.dk/artikler/persondatapolitik";
$_LANG["cnrdkcheckoutpolicyurltext"] = "Persondatapolitik";
$_LANG["cnrdkcheckoutabouturl"] = "https://www.punktum.dk/om-os";
$_LANG["cnrdkcheckoutabouturltext"] = "Om Punktum dk A/S";
$_LANG["cnrdkcheckouttacagree"] = "Ja, jeg accepterer brugeraftalen med Punktum dk A/S.";

// ----------------------------------------------------------------------
// ------------------ DNSSEC --------------------------------------------
// ----------------------------------------------------------------------

// Statusmeddelelser
$_LANG["dnssecautomaticupdatesuccessmsg"] = "DNSSEC er blevet <span style=\"color:green;font-weight:bold;\">aktiveret</span> for dit domæne.<br> DNSSEC-posterne blev importeret fra din DNS-zone og opdateret hos din domæneregistrator.<br><br><span style=\"color:#007bff;\">For din sikkerhed hjælper DNSSEC med at beskytte dit domæne mod visse typer angreb ved at validere DNS-svar.</span>";
$_LANG["dnssecautoenable"] = "Aktiver DNSSEC og auto-importér DNSSEC-poster fra DNS-zone";
$_LANG["dnssecsyncrecords"] = "Synkroniser DNSSEC-poster fra DNS-zone";

// Posthåndtering
$_LANG["dnssecaddnewdskey"] = "Tilføj ny DS-nøgle";
$_LANG["dnssecaddnewkeyrecord"] = "Tilføj ny nøglepost";

// Modal dialog
$_LANG["dnssecconfirmdisable"] = "Er du sikker på, at du vil deaktivere DNSSEC for dette domæne? Denne handling kan påvirke domæneopløsning.";
$_LANG["dnssecmodaltitle"] = "Deaktiver DNSSEC";
$_LANG["dnssecmodalcancel"] = "Annuller";
$_LANG["dnssecmodaldisable"] = "Deaktiver DNSSEC";
