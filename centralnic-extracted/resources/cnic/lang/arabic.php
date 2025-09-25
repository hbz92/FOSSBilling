<?php

// #########################################################################
// #########################################################################
// # Add translations for CNR registrar module additional domain fields    #
// #########################################################################
// #########################################################################

// ----------------------------------------------------------------------
// ------------------ .DK Checkout Page ---------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrdkcheckoutheading"] = "شروط وأحكام أسماء النطاق .dk";
$_LANG["cnrdkcheckoutintro"] = "لتسجيل اسم نطاق .dk، يجب عليك إبرام اتفاق مع Punktum.dk A/S. Punktum dk هو المسؤول عن جميع أسماء النطاق .dk.";
$_LANG["cnrdkcheckoutdomains"] = "أسماء النطاق:";
$_LANG["cnrdkcheckoutregistrant"] = "المسجل:";
$_LANG["cnrdkcheckoutregistrantaddress"] = "انظر أعلاه";
$_LANG["cnrdkcheckoutadmin"] = "مسؤول النطاق:";
$_LANG["cnrdkcheckoutadminaddress"] = "Punktum dk A/S<br/>Ørestads Boulevard 108, الطابق 11<br/>DK-2300 كوبنهاغن S";
$_LANG["cnrdkcheckouttac"] = implode("<br/><br/>", [
    "أوافق بموجب هذا على إبرام اتفاق على حق استخدام اسم النطاق .dk المحدد وفقًا للشروط المطبقة عليه. من بين أمور أخرى، يعني هذا أنني سأحرص على أن تكون تفاصيل الاتصال الخاصة بي كمسجل دقيقة في جميع الأوقات. سأقوم بإجراء التحقق من الهوية من Punktum dk A/S عند الطلب.",
    "قد يتم نقل أو تعليق أو حذف أو حظر حقي في استخدام اسم النطاق .dk المحدد وفقًا للشروط المحددة في شروط الاستخدام الخاصة بـ Punktum dk A/S.",
    "وفقًا للفقرة 18 (2) (13) من قانون عقد المستهلك الدنماركي، أوافق على التنازل عن الحق في سحب الموافقة على الاتفاق بشأن حق استخدام اسم النطاق .dk المحدد.",
    "أعطي موافقتي لـ Punktum dk A/S، كمسؤول عن النطاق، لاستخدام بياناتي الشخصية وفقًا لسياسة الخصوصية الخاصة بها.",
    "أوافق على أنني سأدفع لهذا المزود رسوم فترة التسجيل الأولى لاسم النطاق .dk المحدد، وأن الدفع للفترات اللاحقة يعتمد على اختياري لترتيب الإدارة، كما هو مذكور في القسم 2.1 من شروط وأحكام Punktum dk A/S."
]);
$_LANG["cnrdkcheckouttacurl"] = "https://www.punktum.dk/en/articles/terms-and-conditions-for-the-right-of-use-to-a-dk-domain-name";
$_LANG["cnrdkcheckouttacurltext"] = "الشروط والأحكام لحق استخدام اسم النطاق .dk";
$_LANG["cnrdkcheckoutpolicyurl"] = "https://www.punktum.dk/en/articles/privacy-policy";
$_LANG["cnrdkcheckoutpolicyurltext"] = "سياسة الخصوصية";
$_LANG["cnrdkcheckoutabouturl"] = "https://www.punktum.dk/en/about-us";
$_LANG["cnrdkcheckoutabouturltext"] = "عن Punktum dk A/S";
$_LANG["cnrdkcheckouttacagree"] = "نعم، أقبل اتفاق المستخدم مع Punktum dk A/S.";

// ----------------------------------------------------------------------
// ------------------ Common CNR Translations ---------------------------
// ----------------------------------------------------------------------
$_LANG["cnrchoose"] = "يرجى الاختيار";
$_LANG["cnroptional"] = "اختياري";
$_LANG["cnr1"] = "نعم";
$_LANG["cnr0"] = "لا";
$_LANG["cnrconsentforpublishing"] = "المسجل، الموافقة على النشر";
// .abogado, .aero, .attorney, .bank, .broker, .dentist, .forex, .insurance, .lotto, .law, .lawyer, .markets, .trading
$_LANG["cnrxallocationtoken"] = "رمز تخصيص السجل";
$_LANG["cnrxallocationtokendescr"] = "أخبرنا إذا كنت بحاجة إلى مساعدة في ذلك. مطلوب فقط للنطاقات المميزة. يصدره مزود السجل.";
// .app, .page, .dev, .new, .day, .channel, .boo, .foo, .zip, .mov, .nexus, .dad, .phd, .prof, .esq, .rsvp, .meme, .ing, .new
$_LANG["cnrxacceptsslrequirement"] = "متطلبات SSL";
$_LANG["cnrxacceptsslrequirementdescr"] = "أؤكد أنني أفهم وأقبل المتطلبات الخاصة بـ HTTPS / شهادة SSL. هذا النطاق الأعلى مستوى (TLD) هو نطاق أكثر أمانًا، مما يعني أن HTTPS مطلوب لجميع المواقع. يمكنك شراء اسم النطاق الخاص بك الآن، ولكن لكي يعمل بشكل صحيح في المتصفحات، تحتاج إلى تكوين HTTPS بناءً على شهادة SSL.";
$_LANG["cnrxacceptsslrequirement0"] = $_LANG["cnr0"];
$_LANG["cnrxacceptsslrequirement1"] = $_LANG["cnr1"];
// .attorney, .dentist, .lawyer
$_LANG["cnrxunitedtldregulatorydata"] = "معلومات الهيئة التنظيمية";
$_LANG["cnrxunitedtldregulatorydatadescr"] = "امتداد يحتوي على معلومات حول السلطة الموافقة / السلطة المسيطرة / الهيئة التنظيمية";
// .barcelona, .cat, .madrid, .scot, .sport, .swiss
$_LANG["cnrxintendeduse"] = "الاستخدام المقصود";
$_LANG["cnrxintendedusedescr"] = implode("<br/>", array_reverse([
    "بيان الاستخدام المقصود لاسم النطاق. إذا كان ذلك ممكنًا، يرجى تضمين إشارة صريحة إلى الحق المطالب به من قبل المتقدم للاسم (إذا لم يكن اسم الشركة للمتقدم).",
    "على سبيل المثال، إذا كان اسم النطاق يتطابق مع علامة تجارية، يجب تقديم رقم العلامة التجارية (بحد أقصى 256 حرفًا)."
]));
// .mk
$_LANG["cnrxcompanyvatid"] = "المسجل، معرف ضريبة القيمة المضافة للشركة";
// $_LANG["cnrxcompanyvatiddescr"] = "";
// .nu, .se
$_LANG["cnrxrequestauthcode"] = "طلب رمز EPP جديد";
$_LANG["cnrxrequestauthcode0"] = $_LANG["cnr0"];
$_LANG["cnrxrequestauthcode1"] = $_LANG["cnr1"];
$_LANG["cnrxrequestauthcodedescr"] = "إذا كنت ترغب في نقل النطاق إلى مسجل آخر، فأنت بحاجة إلى رمز المصادقة. سنقوم بإرساله إلى عنوان البريد الإلكتروني لمالك النطاق.";

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
$_LANG["cnrxaeroensauthid"] = "معرف العضوية";
$_LANG["cnrxaeroensauthiddescr"] = "معرف العضوية .AERO مطلوب لتسجيل نطاق في مجال الطيران. يمكنك التقديم للحصول عليه <a style=\"text-decoration:underline\" href=\"https://information.aero/node/add/request-aero-id\" target=\"_blank\">هنا</a>.";
$_LANG["cnrxaeroensauthkey"] = "كلمة مرور العضوية";
$_LANG["cnrxaeroensauthkeydescr"] = "كلمة المرور/رمز المصادقة المقدم من الموقع المذكور أعلاه في نفس الوقت مع معرف العضوية .AERO.";

// ----------------------------------------------------------------------
// ------------------ .AU Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxaudomainrelation"] = "العلاقة";
$_LANG["cnrxaudomainrelation1"] = "اسم النطاق من المستوى الثاني هو مطابق تمامًا، أو اختصار أو اختصار لاسم الشركة أو الاسم التجاري، أو اسم المنظمة أو الجمعية، أو العلامة التجارية.";
$_LANG["cnrxaudomainrelation2"] = "اسم النطاق من المستوى الثاني مرتبط بشكل وثيق وجوهري بالمنظمة أو الأنشطة التي تقوم بها المنظمة.";
$_LANG["cnrxaudomainrelationdescr"] = "يشير هذا إلى العلاقة بين نوع الأهلية (مثل اسم العمل) واسم النطاق.";
$_LANG["cnrxaudomainrelationtype"] = "نوع العلاقة";
$_LANG["cnrxaudomainrelationtypecompany"] = "شركة";
$_LANG["cnrxaudomainrelationtyperegisteredbusiness"] = "عمل مسجل";
$_LANG["cnrxaudomainrelationtypesoletrader"] = "تاجر فردي";
$_LANG["cnrxaudomainrelationtypepartnership"] = "شراكة";
$_LANG["cnrxaudomainrelationtypetrademarkowner"] = "مالك العلامة التجارية";
$_LANG["cnrxaudomainrelationtypependingtmowner"] = "مالك علامة تجارية قيد الانتظار";
$_LANG["cnrxaudomainrelationtypecitizenresident"] = "مواطن / مقيم"; // .id.au فقط
$_LANG["cnrxaudomainrelationtypeincorporatedassociation"] = "جمعية مدمجة";
$_LANG["cnrxaudomainrelationtypeclub"] = "نادي";
$_LANG["cnrxaudomainrelationtypenonprofitorganisation"] = "منظمة غير ربحية";
$_LANG["cnrxaudomainrelationtypecharity"] = "جمعية خيرية";
$_LANG["cnrxaudomainrelationtypetradeunion"] = "نقابة عمالية";
$_LANG["cnrxaudomainrelationtypeindustrybody"] = "هيئة صناعية";
$_LANG["cnrxaudomainrelationtypecommercialstatutorybody"] = "هيئة قانونية تجارية";
$_LANG["cnrxaudomainrelationtypepoliticalparty"] = "حزب سياسي";
$_LANG["cnrxaudomainrelationtypeother"] = "أخرى";
$_LANG["cnrxaudomainrelationtypereligiouschurchgroup"] = "مجموعة دينية / كنيسة";
$_LANG["cnrxaudomainrelationtypehighereducationinstitution"] = "مؤسسة تعليم عالي";
$_LANG["cnrxaudomainrelationtyperesearchorganisation"] = "منظمة بحثية";
$_LANG["cnrxaudomainrelationtypegovernmentschool"] = "مدرسة حكومية";
$_LANG["cnrxaudomainrelationtypechildcarecentre"] = "مركز رعاية الأطفال";
$_LANG["cnrxaudomainrelationtypepreschool"] = "روضة أطفال";
$_LANG["cnrxaudomainrelationtypenationalbody"] = "هيئة وطنية";
$_LANG["cnrxaudomainrelationtypetrainingorganisation"] = "منظمة تدريبية";
$_LANG["cnrxaudomainrelationtypenongovernmentschool"] = "مدرسة غير حكومية";
$_LANG["cnrxaudomainrelationtypeunincorporatedassociation"] = "جمعية غير مدمجة";
$_LANG["cnrxaudomainrelationtypeindustryorganisation"] = "منظمة صناعية";
$_LANG["cnrxaudomainrelationtyperegistrablebody"] = "هيئة قابلة للتسجيل";
$_LANG["cnrxaudomainrelationtypeindigenouscorporation"] = "شركة للسكان الأصليين";
$_LANG["cnrxaudomainrelationtyperegisteredorganisation"] = "منظمة مسجلة";
$_LANG["cnrxaudomainrelationtypetrust"] = "صندوق ائتماني";
$_LANG["cnrxaudomainrelationtypeeducationalinstitution"] = "مؤسسة تعليمية";
$_LANG["cnrxaudomainrelationtypecommonwealthentity"] = "كيان الكومنولث";
$_LANG["cnrxaudomainrelationtypestatutorybody"] = "هيئة قانونية";
$_LANG["cnrxaudomainrelationtypetradingcooperative"] = "تعاونية تجارية";
$_LANG["cnrxaudomainrelationtypecompanylimitedbyguarantee"] = "شركة محدودة بالضمان";
$_LANG["cnrxaudomainrelationtypenondistributingcooperative"] = "تعاونية غير موزعة";
$_LANG["cnrxaudomainrelationtypenontradingcooperative"] = "تعاونية غير تجارية";
$_LANG["cnrxaudomainrelationtypecharitabletrust"] = "صندوق خيري";
$_LANG["cnrxaudomainrelationtypepublicprivateancillaryfund"] = "صندوق مساعد عام / خاص";
$_LANG["cnrxaudomainrelationtypepeakstateterritorybody"] = "هيئة قمة الدولة / الإقليم";
$_LANG["cnrxaudomainrelationtypenotforprofitcommunitygroup"] = "مجموعة مجتمعية غير ربحية";
$_LANG["cnrxaudomainrelationtypeeducationandcareserviceschildcare"] = "خدمات التعليم والرعاية (رعاية الأطفال)";
$_LANG["cnrxaudomainrelationtypegovernmentbody"] = "هيئة حكومية";
$_LANG["cnrxaudomainrelationtypeproviderofnonaccreditedtraining"] = "مزود تدريب غير معتمد";
$_LANG["cnrxaudomainrelationtypedescr"] = "حدد ما يجعل المسجل مؤهلاً لتسجيل اسم النطاق";
$_LANG["cnrxauownerorganization"] = "المسجل، المنظمة";
$_LANG["cnrxauownerorganizationdescr"] = "اسم المنظمة (المسجل)";
$_LANG["cnrxauidwarranty"] = "المسجل،<br>هو مواطن أو مقيم أسترالي";
$_LANG["cnrxauidwarranty0"] = $_LANG["cnr0"];
$_LANG["cnrxauidwarranty1"] = $_LANG["cnr1"];
$_LANG["cnrxauidwarrantydescr"] = "يجب على المسجل لنطاق .id.au أن يضمن أنه مقيم أو مواطن أسترالي";
$_LANG["cnrxaueligibilityname"] = "اسم الأهلية";
$_LANG["cnrxaueligibilitynamedescr"] = "اسم نوع الأهلية (مثل اسم العمل)";
$_LANG["cnrxaudomainidnumber"] = "المسجل، رقم التعريف";
$_LANG["cnrxaudomainidnumberdescr"] = "";
$_LANG["cnrxaudomainidtype"] = "المسجل، نوع التعريف";
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
$_LANG["cnrxaueligibilityidnumber"] = "الأهلية، رقم التعريف";
$_LANG["cnrxaueligibilityidnumberdescr"] = "";
$_LANG["cnrxaueligibilityidtype"] = "الأهلية، نوع التعريف";
$_LANG["cnrxaueligibilityidtypedescr"] = "";

// ----------------------------------------------------------------------
// ------------------ .CA Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxcalegaltype"] = "المسجل، النوع القانوني";
$_LANG["cnrxcalegaltypeabo"] = "الشعوب الأصلية في كندا";
$_LANG["cnrxcalegaltypeass"] = "جمعية غير مسجلة في كندا";
$_LANG["cnrxcalegaltypecco"] = "شركة (كندا أو مقاطعة أو إقليم كندي)";
$_LANG["cnrxcalegaltypecct"] = "مواطن كندي";
$_LANG["cnrxcalegaltypeedu"] = "مؤسسة تعليمية كندية";
$_LANG["cnrxcalegaltypegov"] = "حكومة أو كيان حكومي في كندا";
$_LANG["cnrxcalegaltypehop"] = "مستشفى كندي";
$_LANG["cnrxcalegaltypeinb"] = "فرقة هندية معترف بها بموجب قانون الهند في كندا";
$_LANG["cnrxcalegaltypelam"] = "مكتبة أو أرشيف أو متحف كندي";
$_LANG["cnrxcalegaltypelgr"] = "الممثل القانوني لمواطن كندي أو مقيم دائم";
$_LANG["cnrxcalegaltypemaj"] = "جلالة الملكة";
$_LANG["cnrxcalegaltypeomk"] = "علامة رسمية مسجلة في كندا";
$_LANG["cnrxcalegaltypeplt"] = "حزب سياسي كندي";
$_LANG["cnrxcalegaltypeprt"] = "شراكة مسجلة في كندا";
$_LANG["cnrxcalegaltyperes"] = "مقيم دائم في كندا";
$_LANG["cnrxcalegaltypetdm"] = "علامة تجارية مسجلة في كندا (بواسطة مالك غير كندي)";
$_LANG["cnrxcalegaltypetrd"] = "اتحاد تجاري كندي";
$_LANG["cnrxcalegaltypetrs"] = "صندوق مؤسس في كندا";
// $_LANG["cnrxcalegaltypedescr"] = "";
$_LANG["cnrxcatrademark"] = "هل هو علامة تجارية مسجلة";
$_LANG["cnrxcatrademark0"] = $_LANG["cnr0"];
$_LANG["cnrxcatrademark1"] = $_LANG["cnr1"];
$_LANG["cnrxcatrademarkdescr"] = "يحدد ما إذا كان النطاق علامة تجارية مسجلة أم لا.";

// ----------------------------------------------------------------------
// ------------------ .COM.BR Fields ------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxbrregisternumber"] = "المسجل، معرف قانوني برازيلي";
$_LANG["cnrxbrregisternumberdescr"] = "رقم تسجيل الشركة البرازيلية (CNPJ) أو رقم التسجيل الفردي البرازيلي (CPF).";

// ----------------------------------------------------------------------
// ------------------ .CN Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxcnownertype"] = "المسجل، النوع";
$_LANG["cnrxcnownertypei"] = "فرد";
$_LANG["cnrxcnownertypee"] = "مؤسسة";
$_LANG["cnrxcnownertypedescr"] = "";
$_LANG["cnrxcnowneridtype"] = "المسجل، نوع الهوية";
$_LANG["cnrxcnowneridtypesfz"] = "SFZ (بطاقة الهوية) - نوع المسجل فرد";
$_LANG["cnrxcnowneridtypehz"] = "HZ (جواز السفر) - نوع المسجل فرد";
$_LANG["cnrxcnowneridtypegajmtx"] = "GAJMTX (تصريح الدخول والخروج للسفر من وإلى هونغ كونغ وماكاو) - نوع المسجل فرد";
$_LANG["cnrxcnowneridtypetwjmtx"] = "TWJMTX (تصاريح السفر لسكان تايوان للدخول أو الخروج من البر الرئيسي) - نوع المسجل فرد";
$_LANG["cnrxcnowneridtypewjlsfz"] = "WJLSFZ (بطاقة هوية المقيم الدائم الأجنبي) - نوع المسجل فرد";
$_LANG["cnrxcnowneridtypegajzz"] = "GAJZZ (تصريح الإقامة لسكان هونغ كونغ وماكاو) - نوع المسجل فرد";
$_LANG["cnrxcnowneridtypetwjzz"] = "TWJZZ (تصريح الإقامة لسكان تايوان) - نوع المسجل فرد";
$_LANG["cnrxcnowneridtypejgz"] = "JGZ (بطاقة هوية الضابط) - نوع المسجل فرد";
$_LANG["cnrxcnowneridtypeqt"] = "QT (أخرى) - نوع المسجل فرد أو مؤسسة";
$_LANG["cnrxcnowneridtypeorg"] = "ORG (شهادة رمز المنظمة) - نوع المسجل مؤسسة";
$_LANG["cnrxcnowneridtypeyyzz"] = "YYZZ (رخصة تجارية) - نوع المسجل مؤسسة";
$_LANG["cnrxcnowneridtypetydm"] = "TYDM (شهادة رمز الائتمان الاجتماعي الموحد) - نوع المسجل مؤسسة";
$_LANG["cnrxcnowneridtypebddm"] = "BDDM (تعيين الرمز العسكري) - نوع المسجل مؤسسة";
$_LANG["cnrxcnowneridtypejddwfw"] = "JDDWFW (رخصة الخدمة الخارجية العسكرية مدفوعة الأجر) - نوع المسجل مؤسسة";
$_LANG["cnrxcnowneridtypesydwfr"] = "SYDWFR (شهادة الشخص الاعتباري للمؤسسة العامة) - نوع المسجل مؤسسة";
$_LANG["cnrxcnowneridtypewgczjg"] = "WGCZJG (نموذج تسجيل مكاتب الممثلين للمؤسسات الأجنبية) - نوع المسجل مؤسسة";
$_LANG["cnrxcnowneridtypeshttfr"] = "SHTTFR (شهادة تسجيل الشخص الاعتباري للمنظمة الاجتماعية) - نوع المسجل مؤسسة";
$_LANG["cnrxcnowneridtypezjcs"] = "ZJCS (شهادة تسجيل موقع النشاط الديني) - نوع المسجل مؤسسة";
$_LANG["cnrxcnowneridtypembfqy"] = "MBFQY (شهادة تسجيل كيان خاص غير مؤسسي) - نوع المسجل مؤسسة";
$_LANG["cnrxcnowneridtypejjhfr"] = "JJHFR (شهادة تسجيل الشخص الاعتباري للصندوق) - نوع المسجل مؤسسة";
$_LANG["cnrxcnowneridtypelszy"] = "LSZY (رخصة مزاولة مهنة المحاماة) - نوع المسجل مؤسسة";
$_LANG["cnrxcnowneridtypewgzhwh"] = "WGZHWH (شهادة تسجيل المركز الثقافي الأجنبي في الصين) - نوع المسجل مؤسسة";
$_LANG["cnrxcnowneridtypewlczzg"] = "WLCZJG (شهادة تسجيل موافقة مكتب الممثل المقيم لإدارات السياحة لحكومة أجنبية) - نوع المسجل مؤسسة";
$_LANG["cnrxcnowneridtypesfjd"] = "SFJD (رخصة الخبرة القضائية) - نوع المسجل مؤسسة";
$_LANG["cnrxcnowneridtypejwjg"] = "JWJG (شهادة منظمة في الخارج) - نوع المسجل مؤسسة";
$_LANG["cnrxcnowneridtypeshfwjg"] = "SHFWJG (شهادة تسجيل وكالة الخدمة الاجتماعية) - نوع المسجل مؤسسة";
$_LANG["cnrxcnowneridtypembxxbx"] = "MBXXBX (تصريح مدرسة خاصة) - نوع المسجل مؤسسة";
$_LANG["cnrxcnowneridtypeyljgzy"] = "YLJGZY (رخصة مزاولة مهنة الطب) - نوع المسجل مؤسسة";
$_LANG["cnrxcnowneridtypegzjgzy"] = "GZJGZY (رخصة ممارسة منظمة كاتب العدل) - نوع المسجل مؤسسة";
$_LANG["cnrxcnowneridtypebjwsxx"] = "BJWSXX (تصريح مدرسة بكين لأطفال موظفي السفارة الأجنبية في الصين) - نوع المسجل مؤسسة";
$_LANG["cnrxcnowneridtypeqttyzm"] = "QTTYDM (أخرى - شهادة رمز الائتمان الاجتماعي الموحد) - نوع المسجل مؤسسة";
$_LANG["cnrxcnowneridtypedescr"] = "نوع هوية بطاقة الهوية";
$_LANG["cnrxcnowneridnumber"] = "المسجل، رقم الهوية";
$_LANG["cnrxcnowneridnumberdescr"] = "";

// ----------------------------------------------------------------------
// ------------------ .COOP Fields --------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxcoopeligibility"] = "متطلبات الأهلية";
$_LANG["cnrxcoopeligibilitydescr"] = "أقبل أن مؤسستي تفي بواحد على الأقل من متطلبات الأهلية .COOP. اقرأ <a style=\"text-decoration:underline\" href=\"https://identity.coop/coop-policies-and-agreements/\" target=\"_blank\">هنا</a>.";
$_LANG["cnrxcoopeligibility0"] = $_LANG["cnr0"];
$_LANG["cnrxcoopeligibility1"] = $_LANG["cnr1"];

// ----------------------------------------------------------------------
// ------------------ .DE Fields ----------------------------------------
// ----------------------------------------------------------------------
//$_LANG["cnrxdensentry0"] = "";
$_LANG["cnrxdensentry0descr"] = implode(" ", array_reverse([
    "تمكين استخدام nsentrys بدلاً من خوادم الأسماء لنطاقات .de;",
    "تسمح سجلات NS بتكوين النطاقات الفرعية باستخدام خوادم أسماء بديلة.",
    "<a target=\"_blank\" href=\"https://www.denic.de/en/domains/de-domains/registration/nameserver-and-nsentry-data/\" style=\"text-decoration:underline\">قراءة مفصلة</a>."
]));
//$_LANG["cnrxdensentry1"] = "";
$_LANG["cnrxdensentry1descr"] = "انظر أعلاه";
//$_LANG["cnrxdensentry2"] = "";
$_LANG["cnrxdensentry2descr"] = "انظر أعلاه";
//$_LANG["cnrxdensentry3"] = "";
$_LANG["cnrxdensentry3descr"] = "انظر أعلاه";
//$_LANG["cnrxdensentry4"] = "";
$_LANG["cnrxdensentry4descr"] = "انظر أعلاه";
//$_LANG["cnrxdegeneralrequest"] = "";
//$_LANG["cnrxdegeneralrequestdescr"] = "";
//$_LANG["cnrxdeabusecontact"] = "";
//$_LANG["cnrxdeabusecontactdescr "] = "";

// ----------------------------------------------------------------------
// ------------------ .DK Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxdkusertype"] = "المسجل، النوع";
$_LANG["cnrxdkusertypeperson"] = "شخص";
$_LANG["cnrxdkusertypecompany"] = "شركة";
$_LANG["cnrxdkusertypeassociation"] = "جمعية";
$_LANG["cnrxdkusertypepuborg"] = "منظمة عامة";
// $_LANG["cnrxdkusertypedescr"] = "";
$_LANG["cnrxdkuseridnumber"] = "المسجل، رقم الهوية";
$_LANG["cnrxdkuseridnumberdescr"] = implode("", array_reverse([
    "رقم تعريف جهة اتصال المسجل. يمكن أن يكون <i>EAN، CVR أو P number.</i> ",
    "يستخدم <i>رقم CVR</i> لتحديد المنظمة، ويضمن <i>رقم EAN</i> ",
    "إرسال المستندات المتعلقة بالفواتير الإلكترونية إلى الحساب الصحيح. ",
    "<i>رقم P</i> هو معرف فرع يتم تعيينه بواسطة السجل المركزي للأعمال الدنماركية ",
    "لربط المواقع الفعلية بالمنظمة."
]));

// ----------------------------------------------------------------------
// ------------------ .ES Fields ----------------------------------------
// ----------------------------------------------------------------------
$types = [
    1 => "فردي",
    39 => "مجموعة المصالح الاقتصادية",
    47 => "جمعية",
    59 => "جمعية رياضية",
    68 => "جمعية مهنية",
    124 => "بنك الادخار",
    150 => "ممتلكات عامة",
    152 => "مجتمع المالكين",
    164 => "أنظباط أو مؤسسة دينية",
    181 => "قنصلية",
    197 => "جمعية القانون العام",
    203 => "السفارة",
    229 => "السلطة المحلية",
    269 => "الاتحاد الرياضي",
    286 => "مؤسسة",
    365 => "شركة التأمين التعاوني",
    434 => "الهيئة الحكومية الإقليمية",
    436 => "هيئة الحكومة المركزية",
    439 => "حزب سياسي",
    476 => "اتحاد تجاري",
    510 => "الشراكة الزراعية",
    524 => "الشركه العالميه المحدوده",
    525 => "الاتحاد الرياضي",
    554 => "المجتمع المدني",
    560 => "الشراكة العامة",
    562 => "الشراكة العامة والمحدودة",
    566 => "تعاوني",
    608 => "شركة مملوكة للموظف",
    612 => "شركة محدودة",
    713 => "المكتب الاسباني",
    717 => "التحالف المؤقت للمؤسسات",
    744 => "شركة محدودة مملوكة للموظف",
    745 => "الكيان العام الإقليمي",
    746 => "الكيان العام الوطني",
    747 => "الكيان العام المحلي",
    877 => "اخر",
    878 => "تسمية مجلس الإشراف على المنشأ",
    879 => "كيان إدارة المناطق الطبيعية"
];
$idtypes = [
    0 => "لمالك غير إسباني",
    1 => "لفرد أو منظمة أسبانية",
    2 => "Deprecated⸴ Use next option instead.",
    3 => "بطاقة تسجيل الأجنبي"
];
$idtypesdescr = implode("<br/>", [
    "DNI = &quot;Documento Nacional de Identidad&quot;",
    "NIF = &quot;Número de Identificación Fiscal&quot;",
    "NIE = &quot;Número de Identificación de Extranjero&quot; (رقم تعريف الأجنبي). وهو ما يعادل NIF الإسباني، ولكنه يصدر من قبل السلطات الإسبانية للأجانب الذين يخططون للبقاء لأكثر من 3 أشهر في إسبانيا."
]);
$idnodescr = "رقم تعريف هذا الاتصال. بالنسبة للاتصالات الإسبانية، هذا هو رقم DNI/NIF/NIE - رقم بطاقة الهوية أو جواز السفر.";

$_LANG["cnrxesownertipoidentificacion"] = "المالك، نوع التعريف";
$_LANG["cnrxesadmintipoidentificacion"] = "المسؤول، نوع التعريف";
$_LANG["cnrxestechtipoidentificacion"] = "التقني، نوع التعريف";
$_LANG["cnrxesbillingtipoidentificacion"] = "الفواتير، نوع التعريف";

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

$_LANG["cnrxesowneridentificacion"] = "المالك، رقم التعريف";
$_LANG["cnrxesadminidentificacion"] = "المسؤول، رقم التعريف";
$_LANG["cnrxestechidentificacion"] = "التقني، رقم التعريف";
$_LANG["cnrxesbillingidentificacion"] = "الفواتير، رقم التعريف";

$_LANG["cnrxesowneridentificaciondescr"] = $idnodescr;
$_LANG["cnrxesadminidentificaciondescr"] = $idnodescr;
$_LANG["cnrxestechidentificaciondescr"] = $idnodescr;
$_LANG["cnrxesbillingidentificaciondescr"] = $idnodescr;

$_LANG["cnrxesownerlegalform"] = "المالك، الشكل القانوني";
$_LANG["cnrxesadminlegalform"] = "المسؤول، الشكل القانوني";
$_LANG["cnrxestechlegalform"] = "التقني، الشكل القانوني";
$_LANG["cnrxesbillinglegalform"] = "الفواتير، الشكل القانوني";

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
$_LANG["cnrxeuregistrantlang"] = "المسجل، اللغة";
$_LANG["cnrxeuregistrantcitizenship"] = "المسجل، الجنسية";
$_LANG["cnrxeuregistrantlangdescr"] = "اللغة المستخدمة للتواصل مع مزود النطاق (الافتراضي = الإنجليزية)";
$_LANG["cnrxeuregistrantcitizenshipdescr"] = "يمكن للأشخاص الطبيعيين الذين يحملون جنسية أوروبية ولا يعيشون في الاتحاد الأوروبي تسجيل نطاقات .eu باستخدام هذا الإعداد.";

// ----------------------------------------------------------------------
// ------------------ .FI Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxficompanyregid"] = "المسجل، معرف العمل أو رقم التسجيل";
$_LANG["cnrxficompanyregiddescr"] = "كيان تجاري محلي (مسجل في السجل التجاري الفنلندي أو شركة داخل جمهورية فنلندا)<br/>(مطلوب للكيانات غير الفنلندية)";
$_LANG["cnrxfipersonalid"] = "المسجل، رقم الهوية الشخصية";
$_LANG["cnrxfipersonaliddescr"] = "رقم الهوية الشخصية الفنلندية<br/>(مطلوب للأفراد غير الفنلنديين)";
$_LANG["cnrxfibirthdate"] = "المسجل، تاريخ الميلاد";
$_LANG["cnrxfibirthdatedescr"] = "تاريخ الميلاد (YYYY-MM-DD)<br/>(مطلوب للأفراد غير الفنلنديين)";
$_LANG["cnrxficontacttype"] = "المسجل، نوع الاتصال";
$_LANG["cnrxficontacttype0"] = "شخص خاص";
$_LANG["cnrxficontacttype1"] = "شركة";
$_LANG["cnrxficontacttype2"] = "مؤسسة";
$_LANG["cnrxficontacttype3"] = "مؤسسة";
$_LANG["cnrxficontacttype4"] = "حزب سياسي";
$_LANG["cnrxficontacttype5"] = "بلدية";
$_LANG["cnrxficontacttype6"] = "حكومة";
$_LANG["cnrxficontacttype7"] = "مجتمع عام";
$_LANG["cnrxficontacttypedescr"] = "";

// ----------------------------------------------------------------------
// ------------------ .GAY Fields ---------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxgayacceptrequirements"] = "قبول المتطلبات";
$_LANG["cnrxgayacceptrequirements0"] = $_LANG["cnr0"];
$_LANG["cnrxgayacceptrequirements1"] = $_LANG["cnr1"];
$_LANG["cnrxgayacceptrequirementsdescr"] = "أؤكد أن النطاق لن يُستخدم للتحريض على العنف أو التنمر أو التحرش أو خطاب الكراهية ولن يُستخدم من قبل مجموعات الكراهية المعترف بها. تتبرع DotGay بنسبة 20٪ من كل نطاق جديد مسجل لشركائها، GLAAD و CenterLink.";

// ----------------------------------------------------------------------
// ------------------ .HK Fields ---------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxhkownerdocumenttype"] = "المسجل، نوع الوثيقة";
$_LANG["cnrxhkownerdocumenttypehkid"] = "فرد: رقم هوية هونغ كونغ";
$_LANG["cnrxhkownerdocumenttypeothid"] = "فرد: رقم هوية بلد آخر";
$_LANG["cnrxhkownerdocumenttypepassno"] = "فرد: رقم جواز السفر";
$_LANG["cnrxhkownerdocumenttypebirthcert"] = "فرد: شهادة الميلاد";
$_LANG["cnrxhkownerdocumenttypeothidv"] = "فرد: وثيقة فردية أخرى";
$_LANG["cnrxhkownerdocumenttypebr"] = "منظمة: شهادة تسجيل الأعمال";
$_LANG["cnrxhkownerdocumenttypeci"] = "منظمة: شهادة التأسيس";
$_LANG["cnrxhkownerdocumenttypecrs"] = "منظمة: شهادة تسجيل المدرسة";
$_LANG["cnrxhkownerdocumenttypehksarg"] = "منظمة: دائرة حكومة هونغ كونغ";
$_LANG["cnrxhkownerdocumenttypehkordinance"] = "منظمة: مرسوم هونغ كونغ";
$_LANG["cnrxhkownerdocumenttypeothorg"] = "منظمة: وثيقة منظمة أخرى";
$_LANG["cnrxhkownerdocumenttypedescr"] = "";
$_LANG["cnrxhkownerdocumentnumber"] = "المسجل، رقم الوثيقة";
$_LANG["cnrxhkownerdocumentnumberdescr"] = "";
$_LANG["cnrxhkownerdocumentorigincountry"] = "المسجل، بلد إصدار الوثيقة";
$_LANG["cnrxhkownerdocumentorigincountrydescr"] = "البلد الذي أصدرت فيه هذه الوثيقة (يرجى تقديم رمز البلد المكون من حرفين ISO، مثل DE أو US).";
$_LANG["cnrxhkownerotherdocumenttype"] = "المسجل، نوع الوثيقة الأخرى";
$_LANG["cnrxhkownerotherdocumenttypedescr"] = "مطلوب إذا كان نوع الوثيقة المحدد سابقًا هو إما '" . $_LANG["cnrxhkownerdocumenttypeothidv"] . "' أو '" . $_LANG["cnrxhkownerdocumenttypeothorg"] . "'.";
$_LANG["cnrxhkdomaincategory"] = "فئة النطاق";
$_LANG["cnrxhkdomaincategoryi"] = "فرد";
$_LANG["cnrxhkdomaincategoryo"] = "منظمة";
$_LANG["cnrxhkdomaincategorydescr"] = "النوع القانوني لجميع جهات اتصال النطاق";
$_LANG["cnrxhkownerageover18"] = "المسجل، العمر فوق 18";
$_LANG["cnrxhkownerageover18no"] = $_LANG["cnr0"];
$_LANG["cnrxhkownerageover18yes"] = $_LANG["cnr1"];
$_LANG["cnrxhkownerageover18descr"] = "أؤكد أن المسجل يبلغ من العمر 18 عامًا على الأقل (مطلوب للأفراد فقط).";

// ----------------------------------------------------------------------
// ------------------ .IE Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxiecontacttype"] = "المسجل، نوع الاتصال";
$_LANG["cnrxiecontacttypecom"] = "شركة";
$_LANG["cnrxiecontacttypecha"] = "جمعية خيرية";
$_LANG["cnrxiecontacttypeoth"] = "أخرى";
$_LANG["cnrxiecontacttypedescr"] = "";
$_LANG["cnrxielanguage"] = "المسجل، اللغة";
$_LANG["cnrxielanguageen"] = "الإنجليزية";
$_LANG["cnrxielanguagefr"] = "الفرنسية";
$_LANG["cnrxielanguagedescr"] = "اللغة المستخدمة للتواصل مع مزود النطاق (الافتراضي = الإنجليزية)";
$_LANG["cnrxiecronumber"] = "المسجل، رقم CRO";
$_LANG["cnrxiecronumberdescr"] = "رقم مكتب تسجيل الشركات (CRO)";
$_LANG["cnrxiesupportingnumber"] = "المسجل، رقم الجمعية الخيرية";
$_LANG["cnrxiesupportingnumberdescr"] = "رقم الجمعية الخيرية / الداعم";

// ----------------------------------------------------------------------
// ------------------ .IT Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxitconsentforpublishing"] = $_LANG["cnrconsentforpublishing"];
$_LANG["cnrxitconsentforpublishing0"] = $_LANG["cnr0"];
$_LANG["cnrxitconsentforpublishing1"] = $_LANG["cnr1"];
$_LANG["cnrxitconsentforpublishingdescr"] = "لسماح بنشر البيانات الشخصية لجهات الاتصال. الرفض ممكن فقط إذا كان نوع الكيان أدناه هو 1.";
$_LANG["cnrxitentitytype"] = "نوع الكيان للمسجل";
$_LANG["cnrxitentitytype1"] = "[1] الأشخاص الطبيعيون الإيطاليون والأجانب";
$_LANG["cnrxitentitytype2"] = "[2] الشركات/الشركات الفردية";
$_LANG["cnrxitentitytype3"] = "[3] العاملون المستقلون/المهنيون";
$_LANG["cnrxitentitytype4"] = "[4] المنظمات غير الربحية";
$_LANG["cnrxitentitytype5"] = "[5] المنظمات العامة";
$_LANG["cnrxitentitytype6"] = "[6] جهات أخرى";
$_LANG["cnrxitentitytype7"] = "[7] الأجانب الذين ينتمون إلى الفئات 2-6";
$_LANG["cnrxitentitytypedescr"] = "نوع الكيان لتحديد نوع المسجل.";
$_LANG["cnrxitpin"] = "رقم التعريف الضريبي للمسجل";
//$_LANG["cnrxitpindescr"] = "";
$_LANG["cnrxitnationality"] = "جنسية المسجل";
$_LANG["cnrxitnationalitydescr"] = "جنسية المسجل المحددة بواسطة رمز الدولة المكون من حرفين ISO.";
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
$_LANG["cnrxlvownerregnr"] = "المسجل، رقم التسجيل";
$_LANG["cnrxlvownerregnrdescr"] = "رقم تسجيل المواطن اللاتفي لاستخدامه في جهة اتصال المسجل (مثل رقم تسجيل الشركة)";
$_LANG["cnrxlvadminregnr"] = "المسؤول، رقم التسجيل";
$_LANG["cnrxlvadminregnrdescr"] = "رقم تسجيل المواطن اللاتفي لاستخدامه في جهة الاتصال الإدارية (مثل رقم تسجيل الشركة)";
$_LANG["cnrxlvvatnr"] = "المسجل، رقم ضريبة القيمة المضافة";
$_LANG["cnrxlvvatnrdescr"] = "رقم ضريبة القيمة المضافة لجهة اتصال المسجل (للشركات فقط).";

// ----------------------------------------------------------------------
// ------------------ .LT Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxltcompanynumber"] = "المسجل، رقم الشركة";
$_LANG["cnrxltcompanynumberdescr"] = "";

// ----------------------------------------------------------------------
// ------------------ .MY Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxmybusinessnumber"] = "المسجل، رقم العمل";
$_LANG["cnrxmybusinessnumberdescr"] = "رقم تسجيل الأعمال للمسجل (للشركات فقط)";
$_LANG["cnrxmyorganizationtype"] = "المسجل، نوع المنظمة";
$_LANG["cnrxmyorganizationtypedescr"] = "نوع العمل للمسجل (للشركات فقط)";
$_LANG["cnrxmyperidentity"] = "المسجل، الهوية الشخصية";
$_LANG["cnrxmyperidentitydescr"] = "رقم الهوية الشخصية للمسجل (للأفراد فقط)";
$_LANG["cnrxmyperdateofbirth"] = "المسجل، تاريخ الميلاد";
$_LANG["cnrxmyperdateofbirthdescr"] = "تاريخ ميلاد المسجل (YYYY-MM-DD، للأفراد فقط)";
$_LANG["cnrxmyrace"] = "المسجل، العرق";
$_LANG["cnrxmyracemalay"] = "ماليزي";
$_LANG["cnrxmyracechinese"] = "صيني";
$_LANG["cnrxmyraceindian"] = "هندي";
$_LANG["cnrxmyraceothers"] = "آخرون";
$_LANG["cnrxmyracedescr"] = "(للأفراد فقط)";

// ----------------------------------------------------------------------
// ------------------ .NO Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxnoorganizationnumber"] = "المسجل، رقم المنظمة";
$_LANG["cnrxnoorganizationnumberdescr"] = "رقم السجل النرويجي الصادر عن السجل المركزي لتنسيق الكيانات القانونية.";
$_LANG["cnrxnopersonidentifier"] = "معرف الشخص في نوريد";
$_LANG["cnrxnopersonidentifierdescr"] = "معرف شخصي مطلوب لتسجيل اسم نطاق خاص .PRIV.NO. اتركه فارغًا في غير ذلك.";

// ----------------------------------------------------------------------
// ------------------ .NU Fields ----------------------------------------
// ----------------------------------------------------------------------
// see further .nu fields at the top of the file
$_LANG["cnrxnuiisidno"] = "المسجل، رقم الهوية";
$_LANG["cnrxnuiisidnodescr"] = "رقم الهوية الشخصية، رقم هوية الشركة أو تعيين التسجيل في سجل حكومي. بالنسبة للجهات الموجودة في السويد، يلزم وجود رقم هوية سويدي صالح (مثل: 123456-1234).";
$_LANG["cnrxnuiisvatno"] = "المسجل، رقم ضريبة القيمة المضافة";
$_LANG["cnrxnuiisvatnodescr"] = "رقم ضريبة القيمة المضافة للمسجل (للشركات فقط)";

// ----------------------------------------------------------------------
// ------------------ .NYC Fields ---------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxnycextcontact"] = "جهة الاتصال الخارجية في نيويورك";
$_LANG["cnrxnycextcontactadmin"] = "جهة الاتصال الإدارية";
$_LANG["cnrxnycextcontacttech"] = "جهة الاتصال التقنية";
$_LANG["cnrxnycextcontactbilling"] = "جهة الاتصال بالفواتير";
$_LANG["cnrxnycextcontactowner"] = "جهة الاتصال بالمسجل";
$_LANG["cnrxnycextcontactdescr"] = "يجب أن يكون لدى جهة الاتصال المحددة عنوان فعلي صالح في مدينة نيويورك.";

// ----------------------------------------------------------------------
// ------------------ .PARIS Fields -------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxafniccode"] = $_LANG["cnrxallocationtoken"];
$_LANG["cnrxafniccodedescr"] = $_LANG["cnrxallocationtokendescr"];

// ----------------------------------------------------------------------
// ------------------ .FR, .PM, .RE, .TF, .WF, .YT Fields ---------------
// ----------------------------------------------------------------------
// Organizations (Companies, Associations, etc.)
$_LANG["cnrxfrannounce"] = "الشركة، رقم الإعلان<br/>(الجريدة الرسمية)";
$_LANG["cnrxfrannouncedescr"] = "رقم الإعلان (مثل 5) في الجريدة الرسمية. الأرقام فقط مسموح بها.";
$_LANG["cnrxfrdatepublicationjo"] = "الشركة، تاريخ النشر<br/>(الجريدة الرسمية)";
$_LANG["cnrxfrdatepublicationjodescr"] = implode(" ", array_reverse([
    "تاريخ النشر في الجريدة الرسمية.",
    "صيغة التاريخ YYYY-MM-DD"
]));
$_LANG["cnrxfrnumerodepageannouncejo"] = "الشركة، رقم صفحة الإعلان<br/>(الجريدة الرسمية)";
$_LANG["cnrxfrnumerodepageannouncejodescr"] = "رقم صفحة الإعلان في الجريدة الرسمية.";
$_LANG["cnrxfrwaldec"] = "الشركة، معرف Waldec";
$_LANG["cnrxfrwaldecdescr"] = "يشير إلى معرف Waldec المرتبط بجمعية والذي يكفي لتحديد الجمعية إذا تم توفيره. الأرقام فقط مسموح بها.";
$_LANG["cnrxfrdateassociation"] = "الشركة، تاريخ الجمعية";
$_LANG["cnrxfrdateassociationdescr"] = "يعرض تاريخ الجمعية. صيغة التاريخ YYYY-MM-DD.";
$_LANG["cnrxfrduns"] = "الشركة، رقم DUNS";
$_LANG["cnrxfrdunsdescr"] = implode(" ", array_reverse([
    "رقم DUNS هو معرف فريد مكون من تسعة أرقام للشركات. اختصار لنظام الترقيم العالمي للبيانات؛",
    "يشير إلى معرف جديد يمكن إرساله للتحقق من الأهلية",
    "على المستوى الأوروبي."
]));
$_LANG["cnrxfrlocal"] = "الشركة، معرف محلي";
$_LANG["cnrxfrlocaldescr"] = "معرف محلي خاص بدولة من المنطقة الاقتصادية الأوروبية (مثل رقم شهادة الأعمال).";
$_LANG["cnrxfrnoprezonecheck0"] = $_LANG["cnr0"];
$_LANG["cnrxfrnoprezonecheck1"] = $_LANG["cnr1"];
$_LANG["cnrxfrsirenorsiret"] = "الشركة، رقم SIREN/SIRET";
$_LANG["cnrxfrsirenorsiretdescr"] = implode(" ", array_reverse([
    "للشركات التي لديها رقم SIREN/SIRET صالح.",
    "رمز SIREN هو رقم تعريف الأعمال الفريد في فرنسا. يتم إصداره من قبل",
    "المعهد الوطني للإحصاء والدراسات الاقتصادية (INSEE) ويتكون من 9 أرقام.",
    "الأرقام التسعة الأولى هي رقم SIREN والأرقام الخمسة التالية هي رقم NIC",
    "(رقم التصنيف الداخلي). يتم إصدار رقم SIRET بمجرد تسجيل عملك",
    "مع غرفة التجارة (RCS) للتجارة، غرفة الحرف للأعمال اليدوية",
    "أو مع URSSAF للخدمات الفكرية. تتكون أرقام SIRET من 14",
    "رقمًا. يوفر رقم SIRET معلومات حول موقع العمل في فرنسا",
    "(للشركات القائمة). يجب أن يكون اسم الشركة المقدم في تفاصيل الاتصال بالمسجل",
    "مطابقًا تمامًا لما هو موضح في قاعدة بيانات SIREN/SIRET ( https://www.infogreffe.fr/ )."
]));
$_LANG["cnrxfrtrademark"] = "الشركة، رقم العلامة التجارية";
$_LANG["cnrxfrtrademarkdescr"] = "";
$_LANG["cnrxfrvatid"] = "الشركة، معرف VAT";
$_LANG["cnrxfrvatiddescr"] = "للشركات التي لديها معرف VAT صالح.";

// Individual
$_LANG["cnrxfrbirthpc"] = "المسجل، الرمز البريدي (مدينة الميلاد)";
$_LANG["cnrxfrbirthpcdescr"] = implode(" ", array_reverse([
    "فقط للأشخاص الطبيعيين المولودين في فرنسا، ريونيون، مايوت، جوادلوب، مارتينيك، جويانا،",
    "بولينيزيا الفرنسية، واليس وفوتونا أو سان بيير وميكلون. يرجى تقديم",
    "الرمز البريدي لمكان الميلاد (أو على الأقل رمز المقاطعة)"
]));
$_LANG["cnrxfrbirthcity"] = "المسجل، مدينة الميلاد";
$_LANG["cnrxfrbirthcitydescr"] = implode(" ", array_reverse([
    "فقط للأشخاص الطبيعيين المولودين في فرنسا، ريونيون، مايوت، جوادلوب، مارتينيك، جويانا،",
    "بولينيزيا الفرنسية، واليس وفوتونا أو سان بيير وميكلون. يرجى تقديم اسم",
    "المدينة."
]));
$_LANG["cnrxfrbirthdate"] = "المسجل، تاريخ الميلاد";
$_LANG["cnrxfrbirthdatedescr"] = "تاريخ ميلاد المسجل بصيغة YYYY-MM-DD.";
$_LANG["cnrxfrbirthplace"] = "المسجل، مكان الميلاد";
//$_LANG["cnrxfrbirthplacedescr"] = "";
$_LANG["cnrxfrrestrictpub"] = $_LANG["cnrconsentforpublishing"];
$_LANG["cnrxfrrestrictpub0"] = $_LANG["cnr0"];
$_LANG["cnrxfrrestrictpub1"] = $_LANG["cnr1"];
$_LANG["cnrxfrrestrictpubdescr"] = "للأفراد فقط. السماح بنشر البيانات الشخصية للاتصالات.";
$_LANG["cnrxfrnoprezonecheck"] = "تعطيل التحقق المسبق من DNS";
$_LANG["cnrxfrnoprezonecheckdescr"] = "يحدد ما إذا كان النظام يجب أن يقوم بالتحقق المسبق من DNS قبل إرسال الأمر إلى السجل.";

// ----------------------------------------------------------------------
// ------------------ .PT Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxpttechidentification"] = "جهة الاتصال التقنية، رقم ضريبة القيمة المضافة";
$_LANG["cnrxpttechidentificationdescr"] = "رقم التعريف الضريبي لجهة الاتصال التقنية";
$_LANG["cnrxptowneridentification"] = "المسجل، رقم ضريبة القيمة المضافة";
$_LANG["cnrxptowneridentificationdescr"] = "رقم التعريف الضريبي للمسجل";
$_LANG["cnrxpttechmobile"] = "جهة الاتصال التقنية، رقم الهاتف المحمول";
$_LANG["cnrxpttechmobiledescr"] = "رقم الهاتف المحمول لجهة الاتصال التقنية";
$_LANG["cnrxptownermobile"] = "المسجل، رقم الهاتف المحمول";
$_LANG["cnrxptownermobiledescr"] = "رقم الهاتف المحمول للمسجل";

// ----------------------------------------------------------------------
// ------------------ .RO Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxrocompanynumber"] = "المسجل، رقم الشركة";
$_LANG["cnrxrocompanynumberdescr"] = "(مطلوب للشركات فقط)";
$_LANG["cnrxroidcardorpassportnumber"] = "المسجل، رقم بطاقة الهوية أو جواز السفر";
$_LANG["cnrxroidcardorpassportnumberdescr"] = "(مطلوب للأفراد فقط)";
$_LANG["cnrxrovatnumber"] = "المسجل، رقم ضريبة القيمة المضافة";
$_LANG["cnrxrovatnumberdescr"] = "(مطلوب للشركات فقط)";

// ----------------------------------------------------------------------
// ------------------ .RU Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxrubirthdate"] = "المسجل، تاريخ الميلاد";
$_LANG["cnrxrubirthdatedescr"] = "تاريخ ميلاد المسجل (DD.MM.YYYY)<br/>(مطلوب للأفراد فقط)";
$_LANG["cnrxrufirstname"] = "المسجل، الاسم الأول";
$_LANG["cnrxrufirstnamedescr"] = "الاسم الأول للمسجل باللغة الروسية. يجب أن يحتوي على أحرف روسية ولاتينية، بدون نقاط.<br/>(مطلوب للأفراد فقط)";
$_LANG["cnrxrumiddlename"] = "المسجل، الاسم الأوسط";
$_LANG["cnrxrumiddlenamedescr"] = "الاسم الأوسط للمسجل باللغة الروسية. يجب أن يحتوي على أحرف روسية ولاتينية، بدون نقاط.<br/>(مطلوب للأفراد فقط)";
$_LANG["cnrxrulastname"] = "المسجل، اسم العائلة";
$_LANG["cnrxrulastnamedescr"] = "اسم العائلة للمسجل باللغة الروسية. يجب أن يحتوي على أحرف روسية ولاتينية، بدون نقاط.<br/>(مطلوب للأفراد فقط)";
$_LANG["cnrxruorganization"] = "المسجل، اسم المنظمة";
$_LANG["cnrxruorganizationdescr"] = "اسم المنظمة للمسجل باللغة الروسية. يمكن أن يحتوي هذا الحقل على أحرف روسية ولاتينية، أرقام، علامات ترقيم ومسافات.<br/>(مطلوب للمنظمات المسجلة في الاتحاد الروسي فقط)";
$_LANG["cnrxrucode"] = "المسجل، رقم التعريف الضريبي";
$_LANG["cnrxrucodedescr"] = "رقم التعريف الضريبي (TIN) للمسجل. يجب أن يحتوي هذا الحقل على رقم مكون من عشرة أرقام (الرقم الأخير هو رقم تحكم).<br/>(مطلوب للمنظمات المسجلة في الاتحاد الروسي فقط)";
$_LANG["cnrxrukpp"] = "المسجل، رمز السبب";
$_LANG["cnrxrukppdescr"] = "رمز السبب (KPP) للمسجل. يجب أن يحتوي هذا الحقل على رقم مكون من تسعة أرقام.<br/>(مطلوب للمنظمات المسجلة في الاتحاد الروسي فقط)";
$_LANG["cnrxrupassportdata"] = "المسجل، بيانات جواز السفر";
$_LANG["cnrxrupassportdatadescr"] = "بيانات جواز السفر للمسجل. يجب أن يحتوي هذا الحقل على أحرف روسية ولاتينية، أرقام، علامات ترقيم ومسافات. التنسيق: رقم الوثيقة، الجهة المصدرة، تاريخ الإصدار<br/>(مطلوب للأفراد فقط)";

// ----------------------------------------------------------------------
// ------------------ .SE Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxnicseidnumber"] = "المسجل، رقم الهوية";
$_LANG["cnrxnicseidnumberdescr"] = "رقم الهوية الشخصية أو التنظيمية.";
$_LANG["cnrxnicsevatid"] = "المسجل، رقم ضريبة القيمة المضافة";
$_LANG["cnrxnicsevatiddescr"] = "";
$_LANG["cnrxsediscloseemail"] = "المسجل، الكشف عن البريد الإلكتروني";
$_LANG["cnrxsediscloseemaildescr"] = "السماح بالكشف عن عنوان البريد الإلكتروني للمسجل في قاعدة بيانات WHOIS العامة.";
$_LANG["cnrxsedisclosefax"] = "المسجل، الكشف عن الفاكس";
$_LANG["cnrxsedisclosefaxdescr"] = "السماح بالكشف عن رقم الفاكس للمسجل في قاعدة بيانات WHOIS العامة.";
$_LANG["cnrxsedisclosevoice"] = "المسجل، الكشف عن الهاتف";
$_LANG["cnrxsedisclosevoicedescr"] = "السماح بالكشف عن رقم الهاتف للمسجل في قاعدة بيانات WHOIS العامة.";
foreach (["email", "fax", "voice"] as $field) {
    $_LANG["cnrxsedisclose$field" . "0"] = $_LANG["cnr0"];
    $_LANG["cnrxsedisclose$field" . "1"] = $_LANG["cnr1"];
}

// ----------------------------------------------------------------------
// ------------------ .SG Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxsgrcbid"] = "المسجل، معرف RCB";
$_LANG["cnrxsgrcbiddescr"] = "رقم الكيان الفريد (UEN) أو رقم الشركة المسجلة (RCB) للمسجل. بالنسبة <u>للشركات</u> الموجودة في سنغافورة، يجب تحديد رقم تسجيل الشركة المقابل أو بطاقة هوية الاتصال للحضور المحلي في سنغافورة (التنسيق: S1234567D).";
$_LANG["cnrxsgadminsingpassid"] = "المسؤول، معرف SingPass";
$_LANG["cnrxsgadminsingpassiddescr"] = "بطاقة هوية الاتصال (معرف SingPass) لجهة الاتصال الإدارية<br/>(للفرد السنغافوري <u>الأفراد</u> فقط، التنسيق: S1234567D)";

// ----------------------------------------------------------------------
// ------------------ .SK Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxskcontactlegalform"] = "المسجل، الشكل القانوني";
$_LANG["cnrxskcontactlegalformdescr"] = "";
// $_LANG["cnrxskcontactlegalformcorp"] = "";
// $_LANG["cnrxskcontactlegalformpers"] = "";
$_LANG["cnrxskcontactidentnumber"] = "المسجل، رقم الشركة";
$_LANG["cnrxskcontactidentnumberdescr"] = "رقم السجل التجاري. إلزامي للشركات/المنظمات";

// ----------------------------------------------------------------------
// ------------------ .SWISS Fields -------------------------------------
// ----------------------------------------------------------------------
// see other .swiss fields at top of the file
$_LANG["cnrxswissuid"] = "المسجل، UID أو UPI";
$_LANG["cnrxswissuiddescr"] = implode("", array_reverse([
    "المعرف ...<ul>",
    "<li>UID (رقم التعريف الفريد، التنسيق: \"CHE-ddd.ddd.ddd\") للمنظمات أو</li>",
    "<li>UPI (معرف الشخص العالمي، التنسيق: \"756.dddd.dddd.dd\") للأشخاص الطبيعيين</li>",
    "</ul>... للمسجل (d = رقم).<br/>",
    "يرجى ملاحظة: لا يتم نشر اسم الشخص وUPI في Whois/RDAP على عكس اسم المنظمة وUID، التي تكون مرئية."
]));
$_LANG["cnrxswissownertype"] = "المسجل، النوع";
$_LANG["cnrxswissownertypep"] = "شخص طبيعي";
$_LANG["cnrxswissownertypeo"] = "منظمة / كيان قانوني";
$_LANG["cnrxswissownertypedescr"] = "نوع هوية المسجل.";

// ----------------------------------------------------------------------
// ------------------ .TRAVEL Fields ------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxtravelindustry"] = "صناعة السفر";
$_LANG["cnrxtravelindustryn"] = $_LANG["cnr0"];
$_LANG["cnrxtravelindustryy"] = $_LANG["cnr1"];
$_LANG["cnrxtravelindustrydescr"] = "أؤكد أن المسجل عضو في صناعة السفر ولديه معرف عضوية صالح.";

// ----------------------------------------------------------------------
// ------------------ .UK Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxukownercorporatetype"] = "المسجل، نوع الشركة";
$_LANG["cnrxukownercorporatetypedescr"] = "";
$_LANG["cnrxukownercorporatetypeother"] = "أخرى";
$_LANG["cnrxukownercorporatetypefother"] = "أخرى (غير بريطانية)";
$_LANG["cnrxukownercorporatetypeind"] = "فرد";
$_LANG["cnrxukownercorporatetypefind"] = "فرد (غير بريطاني)";
$_LANG["cnrxukownercorporatetypefcorp"] = "شركة (غير بريطانية)";
// $_LANG["cnrxukownercorporatetypeltd"] = "LTD";
// $_LANG["cnrxukownercorporatetypeplc"] = "PLC";
// $_LANG["cnrxukownercorporatetypellp"] = "LLP";
// $_LANG["cnrxukownercorporatetypeip"] = "IP";
$_LANG["cnrxukownercorporatetypecrc"] = "شركة بموجب الميثاق الملكي";
$_LANG["cnrxukownercorporatetypegov"] = "هيئة حكومية";
$_LANG["cnrxukownercorporatetypeptnr"] = "شراكة بريطانية";
$_LANG["cnrxukownercorporatetyperchar"] = "جمعية خيرية مسجلة";
$_LANG["cnrxukownercorporatetypesch"] = "مدرسة";
$_LANG["cnrxukownercorporatetypestat"] = "هيئة قانونية";
$_LANG["cnrxukownercorporatetypestra"] = "تاجر فردي";
$_LANG["cnrxukownercorporatenumber"] = "المسجل، رقم الشركة";
$_LANG["cnrxukownercorporatenumberdescr"] = "رقم تسجيل الشركات في المملكة المتحدة";

// ----------------------------------------------------------------------
// ------------------ .US Fields ----------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxusnexusapppurpose"] = "الغرض من التطبيق، US Nexus";
$_LANG["cnrxusnexusapppurposep1"] = "استخدام الأعمال للربح";
$_LANG["cnrxusnexusapppurposep2"] = "منظمة غير ربحية، نادي، جمعية، منظمة دينية، إلخ.";
$_LANG["cnrxusnexusapppurposep3"] = "استخدام شخصي";
$_LANG["cnrxusnexusapppurposep4"] = "أغراض تعليمية";
$_LANG["cnrxusnexusapppurposep5"] = "أغراض حكومية";
$_LANG["cnrxusnexusapppurposedescr"] = "";
$_LANG["cnrxusnexuscategory"] = "US Nexus، الفئة";
$_LANG["cnrxusnexuscategoryc11"] = "[C11] مواطن أمريكي";
$_LANG["cnrxusnexuscategoryc12"] = "[C12] مقيم دائم في الولايات المتحدة";
$_LANG["cnrxusnexuscategoryc21"] = "[C21] منظمة أمريكية";
$_LANG["cnrxusnexuscategoryc31"] = "[C31] كيان أجنبي لديه أنشطة في الولايات المتحدة";
$_LANG["cnrxusnexuscategoryc32"] = "[C32] كيان أجنبي لديه مكتب في الولايات المتحدة";
$_LANG["cnrxusnexuscategorydescr"] = "تصنيف الكيان الذي يطلب التطبيق.<br/>ملاحظة: تعتبر ممتلكات وأقاليم الولايات المتحدة مشمولة أيضًا.";
$_LANG["cnrxusnexusvalidator"] = "US Nexus، البلد";
$_LANG["cnrxusnexusvalidatordescr"] = "حدد رمز البلد المكون من حرفين للمسجل (إذا كانت فئة Nexus هي C31 أو C32)";

// ----------------------------------------------------------------------
// ------------------ .XXX Fields ---------------------------------------
// ----------------------------------------------------------------------
$_LANG["cnrxxxxcommunityid"] = "معرف عضو المجتمع";
$_LANG["cnrxxxxcommunityiddescr"] = "معرف عضو المجتمع المدعوم .XXX";
$_LANG["cnrxxxxdefensive"] = "تسجيل دفاعي<br/>(نطاق غير قابل للحل)";
$_LANG["cnrxxxxdefensive0"] = $_LANG["cnr0"];
$_LANG["cnrxxxxdefensive1"] = $_LANG["cnr1"];
$_LANG["cnrxxxxdefensivedescr"] = implode("", array_reverse([
    "أؤكد أن النطاق هو تسجيل دفاعي. ",
    "يشير التسجيل الدفاعي إلى تسجيل أسماء النطاقات، ",
    "غالبًا عبر نطاقات المستوى الأعلى المتعددة وفي تنسيقات نحوية متنوعة، ",
    "لغرض أساسي هو حماية الملكية الفكرية أو العلامة التجارية من الإساءة، ",
    "مثل الاستيلاء على النطاقات. يتم تعريفه على أنه تسجيل غير فريد، لا يمكن حله، ",
    "يعيد توجيه حركة المرور إلى تسجيل أساسي أو لا يحتوي على محتوى فريد.<br/>",
    "ملاحظة: إذا لم يتم التحديد، سيتم اعتبار النطاق تسجيلًا دفاعيًا."
]));

// #########################################################################
// #########################################################################
// # Add reusable translations for ALL PROVIDERS                           #
// #########################################################################
// #########################################################################

// ----------------------------------------------------------------------
// ----------------------- DNSSEC MANAGEMENT ----------------------------
// ----------------------------------------------------------------------
$_LANG["cnicdnssecmanagement"] = "إدارة DNSSEC";




// #########################################################################
// #########################################################################
// # Add translations for ISPAPI registrar module additional domain fields #
// #########################################################################
// #########################################################################

// Terms and Conditions Fields, prefixed with hxflagstac
$_LANG["hxflagstacagreement"] = "ألاتفاقية";
$_LANG["hxflagstacagreementindiv"] = "شروط ألاتفاقية للافراد";
$_LANG["hxflagstactrustee"] = "خدمة الحضور المحلية";
$_LANG["hxflagstachighlyregulated"] = "عالي التنظيم - نطاق المستوى الاعلى";
$_LANG["hxflagstachighlyregulateddescrdefault"] = ("<div dir=\"rtl\" style=\"text-align:justify\">" .
    "<span style=\"text-align:right\">" . "اختر المربع هنا للتأكد من أن المسجل مؤهل لتسجيل هذا النطاق وأن جميع المعلومات المقدمة صحيحة ودقيقة" . "</span><br><br>" .
    "<span style=\"float:right\">" . "يمكن الاطلاع على معايير الأهلية <a href=\"{TAC}\" target=\"_blank\">هنا</a>." . "</span><br>" .
    "</div>"
);
$_LANG["hxflagstachighlyregulateddescreco"] = ($_LANG["hxflagstachighlyregulateddescrdefault"] .
    "<div dir=\"rtl\" style=\"text-align:justify; margin-bottom: 10px\">" .
    "<br/>سيتم تسجيل جميع أسماء النطاقات .ECO أولاً مع \"server hold \"  لحين استكمال الحد الأدنى لمتطلبات Eco Profile,وتحديداً مسجيل ECO, " .
    "1) مما يؤكد التزامها بسياسة أهلية .ECO 2)حول كيفية إنشاء ملف تعريف Eco التعهد بدعم التغيير الإيجابي للبيئه وأن يكون صادق عند مشاركة المعلومات حول تصرفاتهم. سيتم إرسال التعليمات الى المسجل عن طريق الايميل الالكتروني " .
    ". بمجرد الانتهاء من هذه الخطوات ، سيتم تنشيط نطاق .ECO على الفور بواسطة السجل." .
    "</div>"
);
$_LANG["hxflagstachighlyregulateddescrcoop"] = ("<div dir=\"rtl\" style=\"text-align:justify;\">" .
    "أنا ، صاحب التسجيل ، أفهم وأوافق وأوافق على أن منظمتي تفي بواحد على الأقل من متطلبات أهلية {TLD}:" .
    "<ul>" .
    "<li>تعاونية مملوكة للأعضاء خاضعة للسيطرة الديمقراطية ، بما يتفق مع المبادئ التعاونية السبعة الدولية ؛ أو</li>" .
    "<li>جمعية تتألف من تعاونيات ؛ أو</li>" .
    "<li>منظمة تسيطر عليها تعاونية بأغلبية ؛ أو</li>" .
    "<li>كيان عملياته مكرسة بشكل أساسي لخدمة التعاونيات.</li>" .
    "</ul>" .
    "أفهم وأوافق على أن DotCooperation LLC تجري عمليات تدقيق لتسجيلات نطاق COOP وتحتفظ بالحق في إلغاء أو تعديل اسم النطاق وفقًا لسياساتها." .
    "</div>"
);
$_LANG["hxflagstachighlyregulateddescrnotac"] = ("حدد لتأكيد <b>الإجراءات الوقائية لنطاقات TLD عالية التنظيم</b>:<br/>" .
    "<div style=\"text-align:justify\">أنت تفهم وتوافق على أنك ستلتزم بهذه الشروط الإضافية وستتوافق معها:" .
    "<ol><li>معلومات الاتصال الإدارية. أنت توافق على تقديم معلومات الاتصال الإداري ، والتي يجب تحديثها عند التغيير, " .
    " للإبلاغ عن الشكاوى أو تقارير عن إساءة استخدام التسجيل ، فضلاً عن تفاصيل الاتصال بالهيئات التنظيمية ذات الصلة بالعمل في مكان عملها الرئيسي</li>" .
    "<li>أنت تؤكد وتقر بأنك تمتلك أي تصاريح ضرورية ومواثيق و / أو تراخيص و / أو بيانات اعتماد أخرى ذات صلة للمشاركة في القطاع المرتبط بـ TLD..</li>" .
    "<li>تقرير التغييرات التفويض، والمواثيق، التراخيص، وثائق التفويض. أنت توافق على الإبلاغ عن أي تغييرات جوهرية في صلاحية تراخيصك والمواثيق والتراخيص و / أو بيانات الاعتماد الأخرى ذات الصلة للمشاركة في القطاع المرتبط بـ TLD عالي التنظيم لضمان استمرارك في الامتثال التنظيمات ومتطلبات الترخيص عمومًا إجراء أنشطة لك في مصلحة المستهلكين الذين تخدمهم.</li></ol></div>"
);
$_LANG["hxflagstacindividualregulateddescrdefault"] = "حدد لتأكيد <a href=\"{TAC}\" target=\"_blank\">شروط للأفراد</a>";
$_LANG["hxflagstacregulateddescrdefault"] = "حدد لتأكيد موافقتك على <a href=\"{TAC}\" target=\"_blank\">شروط وأحكام التسجيل</a> عند تسجيلك الجديد ل {TLD} أسماء النطاقات.";
$_LANG["hxflagstacregulateddescrcira"] = ("<div dir=\"rtl\" style=\"text-align:justify\">ضع علامة لتأكيد موافقتك على اتفاقية تسجيل CIRA وأنه يجوز لـ CIRA ، من وقت لآخر ووفقًا لتقديرها ، تعديل أي من أو كل شروط وأحكام اتفاقية المسجل ، كما تراه CIRA مناسبًا ، عن طريق نشر إشعار بالتغييرات على موقع CIRA الإلكتروني وإنهاء إشعار بأي تغييرات جوهرية للمسجل. أنت تستوفي جميع متطلبات اتفاقية المُسجل لتكون مُسجلًا ، ولتقدم طلبًا لتسجيل اسم المجال ، وللحفاظ على تسجيل اسم المجال والحفاظ عليه ، بما في ذلك على سبيل المثال لا الحصر ، متطلبات التواجد الكندي للمسجلين في CIRA ، هنا. ستقوم CIRA بجمع معلوماتك الشخصية واستخدامها والكشف عنها ، على النحو المنصوص عليه في سياسة الخصوصية لـ CIRA ، هنا. " .
    "<a href=\"{TAC}\" target=\"_blank\">المستند 1</a>, " .
    "<a href=\"https://static.cira.ca/policy/canadian-presence-requirements-for-registrants.pdf\" target=\"_blank\">المستند 2</a>, " .
    "<a href=\"https://www.cira.ca/policy/corporate/cira-privacy-policy\" target=\"_blank\">المستند 3</a></div>"
);
$_LANG["hxflagstacregulateddescrngo"] = ($_LANG["hxflagstacregulateddescrdefault"] .
    "<div style=\"padding:10px 0px;\">تسجيل {TLD} مع اسم نطاق .ONG دون تكاليف إضافية. " .
    "سيتم تطبيق التغييرات على نطاق {TLD} تلقائيًا على نطاق .ONG. لذلك لن تجد نطاق .ONG مدرجًا في كاتلوك نطاقك.</div>"
);
$_LANG["hxflagstacregulateddescritsection3"] = ("<span dir=\"rtl\" style=\"float:right\">" .
    " الرجاء حدد المربع لتأكيد موافقتك على <b><a href=\"{TAC}\" target=\"_blank\">القسم 3 - تصريحات وافتراضات المسؤولية</a></b>" . "</span><br>" .
    "<span style=\"float:right\">:يعلن مسجل اسم النطاق المعني ، تحت مسؤوليته الخاصة ، أنه</span><br>" .
    "<div style=\"text-align:justify;margin-bottom:10px;clear:both;\">" .
    "<ul dir=\"rtl\"><li>يمتلك الجنسية أو مقيم في بلد ينتمي إلى الاتحاد الأوروبي (في حالة تسجيل الأشخاص الطبيعيين)</li>" .
    "<li >أنشئت في بلد ينتمي إلى الاتحاد الأوروبي (في حالة التسجيل للمنظمات الأخرى)</li>" .
    "<li >تدرك وتقبل أن تسجيل وإدارة اسم النطاق يخضع ل <a href=\"{TAC}\" target=\"_blank\">'إدارة العمليات المتزامنة على أسماء نطاقات ccTLD {TLD} - المبادئ التوجيهية'</a> " .
    " و <a href=\"{TAC}\" target=\"_blank\">'حل النزاعات في ccTLD {TLD} - اللوائح والإرشادات'</a> والتعديلات اللاحقة</li>" .
    "<li >يحق له استخدام التوافر القانوني لاسم النطاق الذي تم تقديم طلب له ولا يخل بطلب تسجيل حقوق الآخرين</li>" .
    "<li >تدرك أنه من أجل إدراج البيانات الشخصية في قاعدة بيانات أسماء النطاقات المخصصة ونشرها وإمكانية الوصول إليها عبر الإنترنت ، يجب منح الموافقة عن طريق وضع علامة في المربعات المناسبة في المعلومات أدناه. انظر <a href=\"{TAC}\" target=\"_blank\">'DBNA and WHOIS Policy'</a></li>" .
    "<li >تدرك وتوافق على أنه في حالة التصريحات الخاطئة في هذا الطلب ، يقوم المسجل على الفور بإلغاء اسم النطاق أو متابعة الإجراءات القانونية الأخرى. في هذه الحالة ، لن يؤدي الإلغاء بأي حال إلى رفع دعوه في المحكمة</li>" .
    "<li >تحرير السجل من أي مسؤولية ناتجة عن تعيين واستخدام اسم المجال من قبل الشخص الذي قدم الطلب</li>" .
    "<li >قبول سلطة القضاء الإيطالي وقوانين الدولة الإيطالية</li></ul>" .
    "</div>"
);
$_LANG["hxflagstacregulateddescritsection5"] = ("<span dir=\"rtl\" style=\"float:right\">" . "حدد المربع للتأكيد أنك توافق على <b> <a href=\"{TAC}\" target=\"_blank\"> القسم 5 - الموافقة على معالجة البيانات الشخصية للتسجيل</a></b><br/>" . "</span>" .
    "<div dir=\"rtl\" style=\"text-align:justify;margin-bottom:10px;\">يقوم الطرف المهتم ، بعد قراءة الكشف أعلاه ، بالموافقة على معالجة المعلومات المطلوبة للتسجيل ، على النحو المحدد في الكشف أعلاه. منح الموافقة اختياري ، ولكن إذا لم يتم منح أي موافقة ، فلن يكون من الممكن إنهاء تسجيل اسم النطاق وتعيينه وإدارته.</div>"
);
$_LANG["hxflagstacregulateddescritsection6"] = ("<span style=\"float:right\">" . "حدد المربع لتأكيد موافقتك على <a href=\"{TAC}\" target=\"_blank\"> القسم 6 - الموافقة على معالجة البيانات الشخصية للنشر وإمكانية الوصول إليها عبر الإنترنت </a>" . "</span>" .
    "<div dir=\"rtl\" style=\"text-align:justify;margin-bottom:10px;\">الطرف المعني ، بعد قراءة الكشف أعلاه ، يعطي موافقته على النشر وإمكانية الوصول عبر الإنترنت ، على النحو المحدد في الكشف أعلاه. منح الموافقة أمر اختياري ، لكن عدم الموافقة لا يسمح بنشر بيانات الإنترنت والوصول إليها.</div>"
);
$_LANG["hxflagstacregulateddescritsection7"] = ("<span dir=\"rtl\" style=\"float:right\">حدد المربع لتأكيد موافقتك على <a href=\"{TAC}\" target=\"_blank\"> القسم 7 - القبول الصريح بالنقاط التالية </a></span>" .
    "<div dir=\"rtl\" style=\"text-align:justify;margin-bottom:10px;\">" .
    "للقبول الصريح ، يعلن الطرف المعني أنه:" .
    "<ul><li>يدرك ويوافق على أن تسجيل وإدارة اسم النطاق يخضعان لـ <a href=\"{TAC}\" target=\"_blank\"> قواعد تخصيص وإدارة أسماء النطاقات في ccTLD {TLD} '</a> و <a href=\"{TAC}\" target=\"_blank\"> لوائح حل النزاعات في ccTLD {TLD} '</a> وتعديلاتها اللاحقة</li>" .
    "<li>يدرك ويوافق على أنه في حالة التصريحات الخاطئة في هذا الطلب ، يقوم السجل على الفور بإلغاء اسم النطاق أو متابعة الإجراءات القانونية الأخرى. في هذه الحالة ، لن يؤدي الإلغاء بأي حال إلى رفع دعاوى ضد السجل</li>" .
    "<li>تحرير السجل من أي مسؤولية ناتجة عن تعيين واستخدام اسم المجال من قبل الشخص الطبيعي الذي قدم الطلب</li>" .
    "<li>قبول سلطة القضاء الإيطالية وقوانين الدولة الإيطالية</li></ul>" .
    "</div>"
);
$_LANG["hxflagstacregulateddescrgoogle"] = ("أنت تقر بأن {TLD} عبارة عن مساحة اسم آمنة ، مما يعني أن أسماء نطاقات {TLD} تتطلب شهادة SSL للعمل. لا يمكن الوصول إلى مواقع الويب التي تستخدم اسم نطاق {TLD} إلا عن طريق متصفحات الويب باستخدام HTTPS من خلال اتصال مشفر وآمن."
);

// Generic Fields, prefixed with hxflags
$_LANG["hxflagsintendeduse"] = "الاستخدام المقصود";
$_LANG["hxflagsyesnoyes"] = "نعم";
$_LANG["hxflagsyesnono"] = "لا";
$_LANG["hxflagsyesnoy"] = "نعم";
$_LANG["hxflagsyesnon"] = "لا";
$_LANG["hxflagsyesno1"] = "نعم";
$_LANG["hxflagsyesno0"] = "لا";

$_LANG["hxflagslegaltype"] = "النوع القانوني";
$_LANG["hxflagslegaltypeindiv"] = "فردي";
$_LANG["hxflagslegaltypeorg"] = "منظمة";
$_LANG["hxflagsapplicationpurpose"] = "غرض الاستخدام";
$_LANG["hxflagsregistrantidnumber"] = "رقم معرف المسجل";
$_LANG["hxflagsregistrantvatid"] = "ID VAT المسجل";
$_LANG["hxflagsadminidnumber"] = "رقم Admin-C ID";
$_LANG["hxflagsadminvatid"] = "Admin-C VAT ID";
$_LANG["hxflagstechidnumber"] = "Tech-C ID رقم";
$_LANG["hxflagstechvatid"] = "Tech-C VAT ID";
$_LANG["hxflagsbillingidnumber"] = "Billing-C ID رقم";
$_LANG["hxflagsregistrantidtype"] = "نوع المسجل ID";
$_LANG["hxflagsallocationtoken"] = "رمز تخصيص التسجيل";
$_LANG["hxflagsallocationtokendescr"] = ("لتسجيل نطاق {TLD} ، يجب عليك توفير رمز التخصيص الذي أصدره السجل. يرجى إكمال تطبيق المسجل <a href=\"{TAC}\" target=\"_blank\"> هنا </a> للحصول على الرمز المميز"
);
$_LANG["hxflagsnexuscategory"] = "Nexus فئة";
$_LANG["hxflagsnexuscountry"] = "Nexus بلد";
$_LANG["hxflagsfax"] = "Fax Required";
$_LANG["hxflagsfaxregistrationdescr"] = "أؤكد أنه بعد طلب التسجيل هذا ، سأرسل <a href=\"{FAXFORM}\" target=\"_blank\"> هذا النموذج </a> مرة أخرى لإكمال العملية";
$_LANG["hxflagsfaxtransferdescr"] = "أؤكد أنه بعد طلب النقل هذا ، سأرسل <a href=\"{FAXFORM}\" target=\"_blank\"> هذا النموذج </a> مرة أخرى لإكمال العملية";
$_LANG["hxflagsidentificationnumber"] = "رقم التعريف ID";
$_LANG["hxflagswhoisoptout"] = "WHOIS Opt-out";
$_LANG["hxflagsregistrantbirthdate"] = "تاريخ ميلاد المسجل";

// AFNIC TLDs, prefixed with hxflagsafnic
// Individuals
// reusing .ru translations for birthday
$_LANG["hxflagsafnictldregistrantbirthplace"] = "مسقط رأس الفرد";
$_LANG["hxflagsafnictldregistrantbirthplacedescr"] = "(مطلوب للأفراد)";
// Companies
$_LANG["hxflagsafnictldvatid"] = "VATID or SIREN/SIRET رقم";
$_LANG["hxflagsafnictldvatiddescr"] = "(فقط للشركات التي لها رقم VATID أو SIREN / SIRET)";
$_LANG["hxflagsafnictldtrademark"] = "رقم العلامة التجارية";
$_LANG["hxflagsafnictldtrademarkdescr"] = "(فقط للشركات ذات العلامة التجارية الأوروبية)";
$_LANG["hxflagsafnictldduns"] = "DUNS رقم ال";
$_LANG["hxflagsafnictlddunsdescr"] = "(فقط للشركات التي لديها رقم DUNS)";
$_LANG["hxflagsafnictldlocalid"] = "ID المحلي";
$_LANG["hxflagsafnictldlocaliddescr"] = "(فقط للشركات ذات المعرف المحلي)";
// French Association, Data from Journal officiel [JO]
$_LANG["hxflagsafnictldjodod"] = "تاريخ الإعلان [JO]";
$_LANG["hxflagsafnictldjododdescr"] = "(فقط للرابطة الفرنسية ، من: <b>YYYY-MM-DD</b>)";
$_LANG["hxflagsafnictldjonumber"] = "رقم [JO]";
$_LANG["hxflagsafnictldjonumberdescr"] = "(فقط للرابطة الفرنسية ، وعدد من المجللات الرسمية)";
$_LANG["hxflagsafnictldjopage"] = "صفحة الإعلان [JO]";
$_LANG["hxflagsafnictldjopagedescr"] = "(فقط للرابطة الفرنسية ، صفحة الإعلان في جورنال أوفيس)";
$_LANG["hxflagsafnictldjodop"] = "Date of Publication [JO]";
$_LANG["hxflagsafnictldjodopdescr"] = "(Only for french association, The date of publication in the Journal Officiel in the form <b>YYYY-MM-DD</b>)";
// Options, Legal Type
$_LANG["hxflagsafnictldlegaltypeindiv"] = "الفردي";
$_LANG["hxflagsafnictldlegaltypeorg1"] = "شركة مع رقم VATID or SIREN/SIRET";
$_LANG["hxflagsafnictldlegaltypeorg2"] = "شركة ذات علامة تجارية أوروبية";
$_LANG["hxflagsafnictldlegaltypeorg3"] = "شركة برقم DUNS";
$_LANG["hxflagsafnictldlegaltypeorg4"] = "معرف الشركة المحلية";
$_LANG["hxflagsafnictldlegaltypeass"] = "الرابطة الفرنسية";

// .AERO
$_LANG["hxflagsaerotldaeroid"] = ".AERO ID <sup style=\"cursor:help;\" title=\"Obtain from https://www.information.aero/\">ماهذا؟</sup>";
$_LANG["hxflagsaerotldaerokey"] = ".AERO Key <sup style=\"cursor:help;\" title=\"Obtain from https://www.information.aero/\">ماهذا؟</sup>";

// .BE
$_LANG["hxflagsbetldtradeauthdescr"] = "يتطلب تغيير المسجل رمز EPP Code صالحًا. ينطبق هذا عند تغيير اسم المسجل أو المنظمة أو عنوان البريد الإلكتروني";

// .CA
$_LANG["hxflagscatldcontactlanguage"] = "لغة الاتصال";
$_LANG["hxflagscatldwhoisoptoutdescr"] = "حدد لإخفاء معلومات الاتصال الخاصة بك في سجل WHOIS (متاح فقط للأفراد ، اقرأ أعلاه.)";
$_LANG["hxflagscatldregistryinformation"] = "معلومات التسجيل";
$_LANG["hxflagscatldregistryinformationdescr"] = ("عندما تقوم بتسجيل نطاق {TLD} لأحد المسجلين الجدد (أو تغيير المسجل إلى مجال جديد) ، يتعين على هذا المسجل الجديد الموافقة على اتفاقية المسجل خلال 7 أيام حتى يصبح النطاق نشطًا. خلاف ذلك يتم الحصول على حذف المجال من قبل التسجيل دون أي رد." .
    "<br/><b>في مثل هذه الحالة فقط ، سيتم إرسال رسالة تأكيد بالبريد الإلكتروني إلى المسجل الجديد تغطي الخطوات اللازمة لقبول هذه الاتفاقية.</b><br/>" .
    "إذا تم استخدام جهة اتصال المسجل (المؤكدة بالفعل) لتسجيل نطاق {TLD} آخر ، فسيتم تسجيل النطاق في الوقت الفعلي."
);
// Options, Legal Type
$_LANG["hxflagscatldlegaltypecco"] = "مؤسسة";
$_LANG["hxflagscatldlegaltypecct"] = "المواطن كندي";
$_LANG["hxflagscatldlegaltyperes"] = "المقيم الدائم في كندا";
$_LANG["hxflagscatldlegaltypegov"] = "الحكومة أو الكيان الحكومي في كندا";
$_LANG["hxflagscatldlegaltypeedu"] = "المؤسسة التعليمية الكندية";
$_LANG["hxflagscatldlegaltypeass"] = "الرابطة الكندية غير المسجلة";
$_LANG["hxflagscatldlegaltypehos"] = "المستشفى الكندي";
$_LANG["hxflagscatldlegaltypeprt"] = "شراكة مسجلة في كندا";
$_LANG["hxflagscatldlegaltypetdm"] = "العلامة التجارية المسجلة في كندا (بواسطة مالك غير كندي)";
$_LANG["hxflagscatldlegaltypetrd"] = "الاتحاد التجاري الكندي";
$_LANG["hxflagscatldlegaltypeplt"] = "الحزب السياسي الكندي";
$_LANG["hxflagscatldlegaltypelam"] = "أرشيف المكتبة الكندية أو المتحف";
$_LANG["hxflagscatldlegaltypetrs"] = "تأسيس الثقة في كندا";
$_LANG["hxflagscatldlegaltypeabo"] = "الشعوب الأصلية (أفراد أو مجموعات) من السكان الأصليين في كندا";
$_LANG["hxflagscatldlegaltypeinb"] = "الفرقة الهندية المعترف بها بموجب القانون الهندي لكندا";
$_LANG["hxflagscatldlegaltypelgr"] = "الممثل القانوني للمواطن الكندي أو المقيم الدائم";
$_LANG["hxflagscatldlegaltypeomk"] = "العلامة الرسمية المسجلة في كندا";
$_LANG["hxflagscatldlegaltypemaj"] = "جلالة الملكة";
// Legal Type Description, don't move it up.
$_LANG["hxflagscatldlegaltypedescr"] = ("<p>يلتزم السجل الكندي (`CIRA`) بحماية خصوصية المعلومات الشخصية أثناء تشغيله وإدارته لاسم النطاق.</p>" .
    "<p>يعتبر المسجلون الذين يحملون فئات التواجد الكندي التالية أفرادًا:</p>" .
    "<ul>" .
    "<li>" . $_LANG["hxflagscatldlegaltypecct"] . "</li>" .
    "<li>" . $_LANG["hxflagscatldlegaltyperes"] . "</li>" .
    "<li>" . $_LANG["hxflagscatldlegaltypelgr"] . "</li>" .
    "<li>" . $_LANG["hxflagscatldlegaltypeabo"] . "</li>" .
    "</ul>" .
    "<p>تُعتبر جميع الفئات الأخرى مسجِّلين غير فرديين ولا يُسمح لهم بتغيير إعدادات خصوصية WHOIS الخاصة بهم. بالنسبة لبيانات الاتصال لغير الأفراد ، يتم نشرها في WHOIS بواسطة السجل. يمكن للأفراد اتخاذ قرار باستخدام `" . $_LANG["hxflagswhoisoptout"] . "` الحقل أدناه</p>"
);

// .CN
// Options, Registrant ID Type
$_LANG["hxflagscntldregistrantidtypesfz"] = "بطاقة الهوية الصينية";
$_LANG["hxflagscntldregistrantidtypehz"] = "جواز سفر أجنبي";
$_LANG["hxflagscntldregistrantidtypegajmtx"] = "تصريح الدخول والخروج للسفر من وإلى هونج كونج وماكاو";
$_LANG["hxflagscntldregistrantidtypetwjmtx"] = "يسمح لسكان تايوان بالسفر للدخول إلى البر الرئيسي أو الخروج منه";
$_LANG["hxflagscntldregistrantidtypewjlsfz"] = "بطاقة هوية المقيم الدائم الأجنبية";
$_LANG["hxflagscntldregistrantidtypegajzz"] = "تصريح إقامة لسكان هونج كونج / ماكاو";
$_LANG["hxflagscntldregistrantidtypetwjzz"] = "تصريح إقامة لسكان تايوان";
$_LANG["hxflagscntldregistrantidtypejgz"] = "شهادة الضابط الصيني";
$_LANG["hxflagscntldregistrantidtypeorg"] = "شهادة رمز المنظمة الصينية";
$_LANG["hxflagscntldregistrantidtypeyyzz"] = "رخصة تجارية صينية";
$_LANG["hxflagscntldregistrantidtypetydm"] = "شهادة لقانون الائتمان الاجتماعي الموحد";
$_LANG["hxflagscntldregistrantidtypebddm"] = "تعيين الرمز العسكري";
$_LANG["hxflagscntldregistrantidtypejddwfw"] = "رخصة الخدمة الخارجية العسكرية مدفوعة الأجر";
$_LANG["hxflagscntldregistrantidtypesydwfr"] = "شهادة الشخص الاعتباري للمؤسسة العامة";
$_LANG["hxflagscntldregistrantidtypewgczjg"] = "مكاتب تسجيل الممثلين في الشركات الأجنبية";
$_LANG["hxflagscntldregistrantidtypeshttfr"] = "شهادة تسجيل الشخص الاعتباري بالمنظمة الاجتماعية";
$_LANG["hxflagscntldregistrantidtypezjcs"] = "شهادة تسجيل نشاط الدين";
$_LANG["hxflagscntldregistrantidtypembfqy"] = "شهادة تسجيل كيان خاص بخلاف المؤسسات";
$_LANG["hxflagscntldregistrantidtypejjhfr"] = "شهادة تسجيل الشخص الاعتباري في الصندوق";
$_LANG["hxflagscntldregistrantidtypelszy"] = "رخصة مزاولة محاماة";
$_LANG["hxflagscntldregistrantidtypewgzhwh"] = "شهادة تسجيل المركز الثقافي الأجنبي في الصين";
$_LANG["hxflagscntldregistrantidtypewlczjg"] = "مكتب الممثل المقيم لإدارات السياحة لشهادة تسجيل موافقة الحكومة الأجنبية";
$_LANG["hxflagscntldregistrantidtypesfjd"] = "ترخيص الخبرة القضائية";
$_LANG["hxflagscntldregistrantidtypejwjg"] = "شهادة منظمة في الخارج";
$_LANG["hxflagscntldregistrantidtypeshfwjg"] = "شهادة تسجيل وكالة الخدمة الاجتماعية";
$_LANG["hxflagscntldregistrantidtypembxxbx"] = "تصريح مدرسة خاصة";
$_LANG["hxflagscntldregistrantidtypeyljgzy"] = "رخصة مزاولة مهنة الطب";
$_LANG["hxflagscntldregistrantidtypegzjgzy"] = "رخصة ممارسة منظمة كاتب العدل";
$_LANG["hxflagscntldregistrantidtypebjwsxx"] = " تصريح مدرسة بكين للأطفال من موظفي السفارة الأجنبية في الصين";
$_LANG["hxflagscntldregistrantidtypeqttydm"] = "أخرى - شهادة كود الائتمان الاجتماعي الموحد";
$_LANG["hxflagscntldregistrantidtypeqt"] = "الآخرين";

// .COM.AU
// Options, Registrant ID Type
$_LANG["hxflagsautldregistrantidtypeabn"] = "رقم العمل الأسترالي";
$_LANG["hxflagsautldregistrantidtypeacn"] = "رقم الشركة الأسترالية";
$_LANG["hxflagsautldregistrantidtyperbn"] = "رقم تسجيل الأعمال";
$_LANG["hxflagsautldregistrantidtypetm"] = "رقم العلامة التجارية";

// .COM.BR
$_LANG["hxflagscombrtldidentificationnumberdescr"] = "يرجى تقديم أرقام CPF أو CNPJ الصادرة عن دائرة الإيرادات الفيدرالية في البرازيل لأغراض الضرائب";

// .DE
$_LANG["hxflagsdetldgeneralrequestcontact"] = "الاتصال لطلب عام ";
$_LANG["hxflagsdetldabuseteamcontact"] = " فريق اتصال إساءة إستعمال";
$_LANG["hxflagsdetldgeneralrequestcontactdescr"] = "يحدد السجل هذا على أنه معلومات الاتصال بالطلب العام. يمكنك تقديم عنوان بريد إلكتروني أو عنوان url لموقع الويب.";
$_LANG["hxflagsdetldabuseteamcontactdescr"] = "سيعرف السجل هذا على أنه معلومات الاتصال بفريق إساءة الاستخدام. يمكنك تقديم عنوان بريد إلكتروني أو عنوان url لموقع الويب.";

// .DK
$_LANG["hxflagsdktldregistrantcontact"] = "الاتصال بالمسجل";
$_LANG["hxflagsdktldregistrantlegaltype"] = "المسجل النوع القانوني";
$_LANG["hxflagsdktldregistrantvatiddescr"] = "(مطلوب في حالة الخيار الذي تم اختياره `Organization`)";
$_LANG["hxflagsdktldadminvatiddescr"] = "(مطلوب في حالة الخيار الذي تم اختياره `Organization`)";
$_LANG["hxflagsdktldregistrantlegaltypeindiv"] = "فرد";
$_LANG["hxflagsdktldregistrantlegaltypeorg"] = "منظمة";
$_LANG["hxflagsdktldadmincontact"] = "الاتصال الإداري";
$_LANG["hxflagsdktldadminlegaltype"] = "المشرف النوع القانوني";
$_LANG["hxflagsdktldadminlegaltypeindiv"] = "فرد";
$_LANG["hxflagsdktldadminlegaltypeorg"] = "منظمة";
$_LANG["hxflagsdktldlegaltypedescr"] = "اختر أيضًا 'فرد' في حال كنت شركة بدون VATID (سيتم بعد ذلك إلغاء بيانات الشركة في عملية التسجيل).";
$_LANG["hxflagsdktldregistrantlegaltypedescr"] = $_LANG["hxflagsdktldlegaltypedescr"] . "<div dir=\"rtl\" style=\"margin-top:10px\"><b> ملاحظة للمسجلين:</b> سيطلب DK Hostmaster التأكيد عبر البريد الإلكتروني. يرجى التحقق من مجلد البريد الوارد بالإضافة إلى البريد العشوائي والتأكيد في غضون 4 أيام.</div>";
$_LANG["hxflagsdktldcontactdescr"] = "معرف مستخدم DK-HOSTMASTER";

// .ES
$_LANG["hxflagsestldregistranttype"] = "المسجل نوع الاتصال";
$_LANG["hxflagsestldregistrantidentificationnumber"] = "رقم تعريف المسجل";
$_LANG["hxflagsestldadmintype"] = "Admin Contact Type";
$_LANG["hxflagsestldadminidentificationnumber"] = "رقم تعريف جهة اتصال المسؤول";
$_LANG["hxflagsestldlegalform"] = "المسجل النوع القانوني";
// Options, Legal Type
$_LANG["hxflagsestldlegalform1"] = "فردي";
$_LANG["hxflagsestldlegalform39"] = "مجموعة المصالح الاقتصادية";
$_LANG["hxflagsestldlegalform47"] = "جمعية";
$_LANG["hxflagsestldlegalform59"] = "الاتحاد الرياضي";
$_LANG["hxflagsestldlegalform68"] = "الرابطة المهنية";
$_LANG["hxflagsestldlegalform124"] = "بنك الادخار";
$_LANG["hxflagsestldlegalform150"] = "ممتلكات عامة";
$_LANG["hxflagsestldlegalform152"] = "مجتمع المالكين";
$_LANG["hxflagsestldlegalform164"] = "أنظباط أو مؤسسة دينية";
$_LANG["hxflagsestldlegalform181"] = "قنصلية";
$_LANG["hxflagsestldlegalform197"] = "جمعية القانون العام";
$_LANG["hxflagsestldlegalform203"] = "السفارة";
$_LANG["hxflagsestldlegalform229"] = "السلطة المحلية";
$_LANG["hxflagsestldlegalform269"] = "الاتحاد الرياضي";
$_LANG["hxflagsestldlegalform286"] = "مؤسسة";
$_LANG["hxflagsestldlegalform365"] = "شركة التأمين التعاوني";
$_LANG["hxflagsestldlegalform434"] = "الهيئة الحكومية الإقليمية";
$_LANG["hxflagsestldlegalform436"] = "هيئة الحكومة المركزية";
$_LANG["hxflagsestldlegalform439"] = "حزب سياسي";
$_LANG["hxflagsestldlegalform476"] = "اتحاد تجاري";
$_LANG["hxflagsestldlegalform510"] = "الشراكة الزراعية";
$_LANG["hxflagsestldlegalform524"] = "الشركه العالميه المحدوده";
$_LANG["hxflagsestldlegalform525"] = "الاتحاد الرياضي";
$_LANG["hxflagsestldlegalform554"] = "المجتمع المدني";
$_LANG["hxflagsestldlegalform560"] = "الشراكة العامة";
$_LANG["hxflagsestldlegalform562"] = "الشراكة العامة والمحدودة";
$_LANG["hxflagsestldlegalform566"] = "تعاوني";
$_LANG["hxflagsestldlegalform608"] = "شركة مملوكة للموظف";
$_LANG["hxflagsestldlegalform612"] = "شركة محدودة";
$_LANG["hxflagsestldlegalform713"] = "المكتب الاسباني";
$_LANG["hxflagsestldlegalform717"] = "التحالف المؤقت للمؤسسات";
$_LANG["hxflagsestldlegalform744"] = "شركة محدودة مملوكة للموظف";
$_LANG["hxflagsestldlegalform745"] = "الكيان العام الإقليمي";
$_LANG["hxflagsestldlegalform746"] = "الكيان العام الوطني";
$_LANG["hxflagsestldlegalform747"] = "الكيان العام المحلي";
$_LANG["hxflagsestldlegalform878"] = "تسمية مجلس الإشراف على المنشأ";
$_LANG["hxflagsestldlegalform879"] = "كيان إدارة المناطق الطبيعية";
$_LANG["hxflagsestldlegalform877"] = "اخر";
// Options, Registrant ID Type
$_LANG["hxflagsestldregistranttype0"] = "لمالك غير إسباني";
$_LANG["hxflagsestldregistranttype1"] = "لفرد أو منظمة أسبانية";
$_LANG["hxflagsestldregistranttype3"] = "بطاقة تسجيل الأجنبي";
$_LANG["hxflagsestldregistranttype4"] = "ظريبه الشراء";
$_LANG["hxflagsestldadmintype0"] = "للكيان غير الأسباني";
$_LANG["hxflagsestldadmintype1"] = "لفرد أو منظمة أسبانية";
$_LANG["hxflagsestldadmintype3"] = "بطاقة تسجيل الأجنبي";

// .EU
$_LANG["hxflagseutldregistrantcitizenship"] = "جنسية المسجل";
$_LANG["hxflagseutldregistrantcitizenshipdescr"] = "يرجى تقديم هذه المعلومات فقط إذا كنت \"شخصاً فردياً\" وأنت مواطن أوروبي يقيم خارج الاتحاد الأوروبي.";
$_LANG["hxflagseutldlegaltypeindiv"] = $_LANG["hxflagslegaltypeindiv"];
$_LANG["hxflagseutldlegaltypeorg"] = $_LANG["hxflagslegaltypeorg"];

// .FI
$_LANG["hxflagsfitldregistrantidnumberdescr"] = ("<ul><li>الشركات: يرجى تقديم رقم التسجيل</li>" .
    "<li>الأفراد من فنلندا: تقديم رقم الهوية</li>" .
    "<li>الأفراد الآخرون: اتركوها فارغة</li></ul>" .
    "بالنسبة للأفراد ، يرجى ملاحظة أن X-FI-REGISTRANT-IDNUMBER يجب أن تحتوي على أحد عشر حرفًا من النموذج DDMMYYCZZZQ ، حيث DDMMYY هو تاريخ الميلاد ، C علامة القرن ، ZZZ الرقم الفردي و Q حرف التحكم (المجموع الاختباري) . علامة القرن هي + (1800-1899) ، - (1900-1999) ، أو A (2000-2099). الرقم الفردي ZZZ غريب بالنسبة للذكور وحتى بالنسبة للإناث وللأشخاص المولودين في فنلندا ، يتراوح مداها بين 002-899 (يمكن استخدام أعداد أكبر في حالات خاصة). مثال على رمز صالح هو 311280-888Y."
);
$_LANG["hxflagsfitldregistrantbirthdatedescr"] = "(YYYY-MM-DD; مطلوب فقط للأفراد ليس من فنلندا)";

// .HK
$_LANG["hxflagshktldregistrantdocumenttype"] = "نوع وثيقة المسجل ";
$_LANG["hxflagshktldregistrantotherdocumenttype"] = "نوع الوثيقة الأخرى للمسجل";
$_LANG["hxflagshktldregistrantdocumentnumber"] = "رقم وثيقة المسجل";
$_LANG["hxflagshktldregistrantdocumentorigincountry"] = "وثيقة بلد المنشأ للمسجل";
$_LANG["hxflagshktldregistrantbirthdateforindividuals"] = "تاريخ الميلاد المسجل للأفراد";
// Options, Registrant Document Type
$_LANG["hxflagshktldregistrantdocumenttypehkid"] = "الافراد - رقم هوية هونج كونج";
$_LANG["hxflagshktldregistrantdocumenttypeothid"] = "الافراد - رقم هوية البلد الآخر";
$_LANG["hxflagshktldregistrantdocumenttypepassno"] = "الافراد - رقم جواز السفر";
$_LANG["hxflagshktldregistrantdocumenttypebirthcert"] = "شهادة الميلاد الفردية";
$_LANG["hxflagshktldregistrantdocumenttypeothidv"] = "الافراد - أخرى وثيقة فردية";
$_LANG["hxflagshktldregistrantdocumenttypebr"] = "المنظمة - شهادة تسجيل الأعمال";
$_LANG["hxflagshktldregistrantdocumenttypeci"] = "المنظمة - شهادة التأسيس";
$_LANG["hxflagshktldregistrantdocumenttypecrs"] = "منظمة - شهادة تسجيل مدرسة";
$_LANG["hxflagshktldregistrantdocumenttypehksarg"] = "منظمة - حكومة منطقة هونغ كونغ الإدارية الخاصة";
$_LANG["hxflagshktldregistrantdocumenttypehkordinance"] = "منظمة - مرسوم هونغ كونغ";
$_LANG["hxflagshktldregistrantdocumenttypeothorg"] = "منظمة - وثيقة منظمة أخرى";
$_LANG["hxflagshktldregistrantdocumenttypedescr"] = ("(ملاحظة: بالإضافة إلى ذلك ، قد تحتاج إلى إرسال نسخة من المستند إلينا عبر البريد الإلكتروني. بالنسبة لـ .HK ، هذه الخطوة مطلوبة فقط بناءً على طلب التسجيل. بالنسبة إلى .COM.HK ، يلزم الحصول على نسخة من شهادة العمل قبل أن نتمكن من معالجة التسجيل.)"
);
$_LANG["hxflagshktldregistrantotherdocumenttypedescr"] = "(مطلوب لأنواع مستندات المسجل `وثيقة فردية / منظمة أخرى)";
$_LANG["hxflagshktldregistrantbirthdateforindividualsdescr"] = "(إلزامي للأفراد, بالصيغه YYYY-MM-DD)";

// .IE
$_LANG["hxflagsietldregistrantclass"] = "تصنيف المسجل";
$_LANG["hxflagsietldproofofconnectiontoireland"] = "دليل على اتصال أيرلندا";
$_LANG["hxflagsietldproofofconnectiontoirelanddescr"] = ("قدم أي معلومات تدعم طلب التسجيل الخاص بك ، مثل إثبات الأهلية (مثل ضريبة القيمة المضافة أو RBN أو CRO أو CHY أو NIC أو رقم العلامة التجارية أو رقم السجل المدرسي أو رابط إلى صفحة الوسائط الاجتماعية) أو شرح موجز عن سبب رغبتك في هذا المجال وفي ماذا سوف تستخدمه."
);
// Options, Registrant Class
$_LANG["hxflagsietldregistrantclasscompany"] = "شركة";
$_LANG["hxflagsietldregistrantclassbusinessowner"] = "صاحب العمل";
$_LANG["hxflagsietldregistrantclassclubbandlocalgroup"] = "النادي / الفرقة / المجموعة المحلية";
$_LANG["hxflagsietldregistrantclassschoolcollege"] = "مدرسة / كلية";
$_LANG["hxflagsietldregistrantclassstateagency"] = "وكالة دولية";
$_LANG["hxflagsietldregistrantclasscharity"] = "مؤسسة خيرية";
$_LANG["hxflagsietldregistrantclassbloggerother"] = "مدون / أخرى";

// .IT
$_LANG["hxflagsittldpin"] = "PIN";
$_LANG["hxflagsittldpindescr"] = (
    "<div dir=\"rtl\" style=\"text-align:justify\">إذا كان المسجل <b>فردًا</b>، فيجب أن يكون رقم التعريف الشخصي لـ .IT<ul>" .
    "<li>الرمز المالي للمسجل (للمواطنين الإيطاليين يتكون بالضبط من 16 حرفًا ورقمًا) أو</li>" .
    "<li>رقم وثيقة الهوية (للمواطنين المقيمين في دول الاتحاد الأوروبي الأخرى، حيث لا يوجد رمز مالي فردي مكافئ).</li>" .
    "</ul>إذا كان المسجل <b>مؤسسة</b>، فيجب أن يكون رقم التعريف الشخصي لـ .IT<ul>" .
    "<li>الرمز المالي للشركة (للشركات الإيطالية المكون من 11 رقمًا بالضبط) أو</li>" .
    "<li>رقم ضريبة القيمة المضافة الخاص بالشركة</li></ul></div>"
);
$_LANG["hxflagsittldacceptsection3"] = "القسم 3 من عقد مسجل IT";
$_LANG["hxflagsittldacceptsection5"] = "القسم 5 من عقد مسجل IT";
$_LANG["hxflagsittldacceptsection6"] = "القسم 6 من. عقد المسجل";
$_LANG["hxflagsittldacceptsection7"] = "القسم 7 من .IT عقد المسجل";
$_LANG["hxflagsittldregistrantnationality"] = "جنسية المسجل";
$_LANG["hxflagsittldregistrantnationalitydescr"] = "(جنسية جهة اتصال المسجل إذا كانت تختلف عن رمز البلد.)";
$_LANG["hxflagsittldregistrantlegaltype"] = "النوع القانوني للمسجل";
$_LANG["hxflagsittldregistrantlegaltype1"] = "[1] الأشخاص الطبيعيين الإيطاليين والأجانب";
$_LANG["hxflagsittldregistrantlegaltype2"] = "[2] الشركات الإيطالية / شركات رجل واحد";
$_LANG["hxflagsittldregistrantlegaltype3"] = "[3] عمال ايطاليين لحسابهم الخاص / المهنيين";
$_LANG["hxflagsittldregistrantlegaltype4"] = "[4] المنظمات غير الربحية الايطالية";
$_LANG["hxflagsittldregistrantlegaltype5"] = "[5] المنظمات العامة الإيطالية";
$_LANG["hxflagsittldregistrantlegaltype6"] = "[6] الموضوعات الإيطالية الأخرى";
$_LANG["hxflagsittldregistrantlegaltype7"] = "[7] منظمة دولة أخرى عضو في الاتحاد الأوروبي (مطابقة 2 - 6)";

// .JOBS
$_LANG["hxflagsjobstldyesnono"] = "لا";
$_LANG["hxflagsjobstldyesnoyes"] = "نعم";
$_LANG["hxflagsjobstldwebsite"] = "موقع";
$_LANG["hxflagsjobstldindustryclassification"] = "تصنيف الصناعة";
$_LANG["hxflagsjobstldmemberofahrassociation"] = "عضو في جمعية الموارد البشرية";
$_LANG["hxflagsjobstldcontactjobtitle"] = "عنوان الوظيفة (على سبيل المثال الرئيس التنفيذي)";
$_LANG["hxflagsjobstldcontacttype"] = "نوع الاتصال";
// Options, Industry Classification
$_LANG["hxflagsjobstldindustryclassification2"] = "المحاسبة / المصرفية / المالية";
$_LANG["hxflagsjobstldindustryclassification3"] = "علم الزراعة / الزراعة";
$_LANG["hxflagsjobstldindustryclassification21"] = "التكنولوجيا الحيوية / العلوم";
$_LANG["hxflagsjobstldindustryclassification5"] = "الكمبيوتر / تكنولوجيا المعلومات";
$_LANG["hxflagsjobstldindustryclassification4"] = "البناء / خدمات البناء";
$_LANG["hxflagsjobstldindustryclassification12"] = "مستشار";
$_LANG["hxflagsjobstldindustryclassification6"] = "التعليم / التدريب / مكتبة";
$_LANG["hxflagsjobstldindustryclassification7"] = "وسائل الترفيه";
$_LANG["hxflagsjobstldindustryclassification13"] = "بيئي";
$_LANG["hxflagsjobstldindustryclassification19"] = "حسن الضيافة";
$_LANG["hxflagsjobstldindustryclassification10"] = "الحكومة / الخدمة المدنية";
$_LANG["hxflagsjobstldindustryclassification11"] = "رعاية صحية";
$_LANG["hxflagsjobstldindustryclassification15"] = "توظيف / موارد بشرية";
$_LANG["hxflagsjobstldindustryclassification16"] = "تأمين";
$_LANG["hxflagsjobstldindustryclassification17"] = "قانوني";
$_LANG["hxflagsjobstldindustryclassification18"] = "تصنيع";
$_LANG["hxflagsjobstldindustryclassification20"] = "وسائل الإعلام / إعلان";
$_LANG["hxflagsjobstldindustryclassification9"] = "الحدائق والترفيه";
$_LANG["hxflagsjobstldindustryclassification26"] = "الأدوية";
$_LANG["hxflagsjobstldindustryclassification22"] = "العقارات";
$_LANG["hxflagsjobstldindustryclassification14"] = "مطعم / خدمة الغذاء";
$_LANG["hxflagsjobstldindustryclassification23"] = "قطاعي";
$_LANG["hxflagsjobstldindustryclassification8"] = "التسويق عبر الهاتف";
$_LANG["hxflagsjobstldindustryclassification24"] = "وسائل النقل";
$_LANG["hxflagsjobstldindustryclassification25"] = "اخرى";
// Options, Contact Type
$_LANG["hxflagsjobstldcontacttype1"] = "إداري";
$_LANG["hxflagsjobstldcontacttype0"] = "اخرى";

// .LOTTO
$_LANG["hxflagslottotldmembershipcontactid"] = "عضوية الاتصال ID";
$_LANG["hxflagslottotldverificationcode"] = "كود التفعيل";

// .LT
$_LANG["hxflagslttldlegalentityidentificationcode"] = "كود تحديد الكيان القانوني";

// .MELBOURNE
// Options, Nexus Category
$_LANG["hxflagsmelbournetldnexuscategorya"] = "الكيانات الفيكتورية";
$_LANG["hxflagsmelbournetldnexuscategoryb"] = "سكان فيكتوريا";
$_LANG["hxflagsmelbournetldnexuscategoryc"] = "الكيانات المرتبطة";
$_LANG["hxflagsmelbournetldnexuscategorydescr"] = ("<div dir=\"rtl\" style=\"padding:10px 0px;text-align:justify\"><b>أهلية التسجيل</b><br/>للتسجيل أو تجديد اسم النطاق ، يجب على مقدم الطلب أو المسجل استيفاء أحد المعايير التالية A أو B أو C أدناه:<br/><br/>" .
    "<b>المعيار A - الكيانات الفيكتورية</b><br/>يجب أن يكون مقدم الطلب كيانًا مسجلاً في `<a href=\"https://asic.gov.au/\" target=\"_blank\"> هيئة الأوراق المالية والاستثمارات الأسترالية</a>` أو `<a href=\"https://register.business.gov.au/\" target=\"_blank\">سجل الأعمال الأسترالي</a>` الذي:<ul>" .
    "<li>لديه عنوان في ولاية فيكتوريا يرتبط بـ ABN أو ACN أو RBN أو ARBN ؛ أو</li>" .
    "<li>لديه عنوان شركة صالح في ولاية فيكتوريا</li>" .
    "</ul><br/>" .
    "<b>المعيار B - سكان فيكتوريا</b><br/>يجب أن يكون مقدم الطلب مواطنًا أستراليًا أو مقيمًا له عنوان صالح في ولاية فيكتوريا<br/><br/>" .
    "<b>المعيار C - الكيانات المرتبطة</b><br/>يجب أن يكون مقدم الطلب كيانًا مشاركًا. لا يجوز لمقدم الطلب التقدم إلا للحصول على اسم نطاق مطابق تمامًا أو مطابقة جزئية لـ ، أو اختصار ، أو اختصار لـ:" .
    "<ul><li>الاسم التجاري لمقدم الطلب ، أو الاسم الذي يُعرف به مقدم الطلب عمومًا (أي اسم مستعار) ، ويجب تسجيل اسم النشاط التجاري بالسلطة المناسبة في الولاية القضائية التي يقع فيها مقر النشاط التجاري ؛ أو</li>" .
    "<li>منتج تقوم الجهة المرتبطة بتصنيعه أو بيعه لكيانات أو أفراد مقيمين في ولاية فيكتوريا ؛</li>" .
    "<li>خدمة يقدمها الكيان المرتبط لسكان ولاية فيكتوريا ؛</li>" .
    "<li>حدث ينظمه الكيان المرتبط أو يرعى في ولاية فيكتوريا ؛</li>" .
    "<li>نشاط ييسره الكيان المرتبط في ولاية فيكتوريا ؛ أو</li>" .
    "<li>دورة أو برنامج تدريبي يوفره الكيان المرتبط لسكان ولاية فيكتوريا</li></div>"
);

// .MY
$_LANG["hxflagsmytldregistrantorganisationtype"] = "نوع منظمة المسجل";
// Options, Registrant Organisation Type
$_LANG["hxflagsmytldregistrantorganisationtype1"] = "شركة المعماري";
$_LANG["hxflagsmytldregistrantorganisationtype2"] = "شركة مراجعة الحسابات";
$_LANG["hxflagsmytldregistrantorganisationtype3"] = "العمل وفقًا لقانون تسجيل الأعمال (rob)";
$_LANG["hxflagsmytldregistrantorganisationtype4"] = "العمل بموجب مرسوم الترخيص التجاري";
$_LANG["hxflagsmytldregistrantorganisationtype5"] = "شركة وفقا لقانون الشركات (ROC)";
$_LANG["hxflagsmytldregistrantorganisationtype6"] = "مؤسسة تعليمية معتمدة / مسجلة من قبل الإدارة / الوكالة الحكومية ذات الصلة";
$_LANG["hxflagsmytldregistrantorganisationtype7"] = "منظمة المزارعين";
$_LANG["hxflagsmytldregistrantorganisationtype8"] = "إدارة أو وكالة حكومية اتحادية";
$_LANG["hxflagsmytldregistrantorganisationtype9"] = "سفارة اجنبية";
$_LANG["hxflagsmytldregistrantorganisationtype10"] = "مكتب خارجي";
$_LANG["hxflagsmytldregistrantorganisationtype11"] = "المدارس الابتدائية و / أو الثانوية التي تدعمها الحكومة";
$_LANG["hxflagsmytldregistrantorganisationtype12"] = "مكتب محاماة";
$_LANG["hxflagsmytldregistrantorganisationtype13"] = "ليمباجا (مجلس)";
$_LANG["hxflagsmytldregistrantorganisationtype14"] = "إدارة أو وكالة السلطة المحلية";
$_LANG["hxflagsmytldregistrantorganisationtype15"] = "maktab rendah sains mara (mrsm) تحت إدارة mara";
$_LANG["hxflagsmytldregistrantorganisationtype16"] = "وزارة الدفاع دائره أو وكالة";
$_LANG["hxflagsmytldregistrantorganisationtype17"] = "شركة خارجية";
$_LANG["hxflagsmytldregistrantorganisationtype18"] = "جمعية المعلمين الآباء";
$_LANG["hxflagsmytldregistrantorganisationtype19"] = "كلية الفنون التطبيقية التابعة لوزارة التعليم";
$_LANG["hxflagsmytldregistrantorganisationtype20"] = "مؤسسة التعليم العالي الخاصة";
$_LANG["hxflagsmytldregistrantorganisationtype21"] = "مدرسة خاصة";
$_LANG["hxflagsmytldregistrantorganisationtype22"] = "المكتب الاقليمي";
$_LANG["hxflagsmytldregistrantorganisationtype23"] = "كيان ديني";
$_LANG["hxflagsmytldregistrantorganisationtype24"] = "مكتب الممثل";
$_LANG["hxflagsmytldregistrantorganisationtype25"] = "المجتمع بموجب قانون المجتمعات (ros)";
$_LANG["hxflagsmytldregistrantorganisationtype26"] = "منظمة رياضية";
$_LANG["hxflagsmytldregistrantorganisationtype27"] = "إدارة حكومة الولاية أو الوكالة";
$_LANG["hxflagsmytldregistrantorganisationtype28"] = "اتحاد تجاري";
$_LANG["hxflagsmytldregistrantorganisationtype29"] = "الوصي";
$_LANG["hxflagsmytldregistrantorganisationtype30"] = "جامعة تحت إدارة وزارة التعليم";
$_LANG["hxflagsmytldregistrantorganisationtype31"] = "مثمن ، مخمن ، شركة الوكيل العقاري";


// .NO
$_LANG["hxflagsnotldregistrantidnumberdescr"] = ("مطلوب رقم ضريبة القيمة المضافة النرويجي أو رقم هوية شخصية (PID <a href='https://pid.norid.no/personid/lookup' target='_blank'>الرقم الشخصي</a>)." );

// .NU
$_LANG["hxflagsnutldregistrantlegaltype"] = "المسجل النوع القانوني";
$_LANG["hxflagsnutldregistrantlegaltypeother"] = "حالات أخرى";
$_LANG["hxflagsnutldregistrantlegaltypeorgeu"] = "منظمة في الأتحاد ألأوربي لكن خارج السويد";
$_LANG["hxflagsnutldregistrantidnumberdescr"] = ("<b> للأفراد أو الشركات الموجودة في السويد </ b> ، يجب ذكر رقم شخصي أو  رقم منظمه صالح.<br/>" .
    "<b> للأفراد والشركات خارج السويد </ b> ، يجب ذكر رقم الهوية (مثل رقم السجل المدني أو رقم تسجيل الشركة أو ما يعادلها)."
);
$_LANG["hxflagsnutldvatiddescr"] = "(مطلوب فقط للشركات التي تقع داخل الاتحاد الأوروبي ولكن خارج السويد)";


// .NYC
// Options, Nexus Category
$_LANG["hxflagsnyctldnexuscategory1"] = "الشخص الطبيعي - الموطن الرئيسي مع عنوان فعلياً في مدينة نيويورك";
$_LANG["hxflagsnyctldnexuscategory2"] = "الكيان أو المنظمة - الموطن الرئيسي مع عنوان فعلياً في مدينة نيويورك";
$_LANG["hxflagsnyctldnexuscategorydescr"] = "(P.O Boxes are prohibited, see <a href=\"{TAC}\" target=\"_blank\">سياسات NYC Nexus</a>)";

// .PRO
$_LANG["hxflagsprotldprofession"] = "مهنة";
$_LANG["hxflagsprotldlicensenumber"] = "رقم الرخصة";
$_LANG["hxflagsprotldauthority"] = "السلطة";
$_LANG["hxflagsprotldauthoritywebsite"] = "موقع السلطة";

// .PT
$_LANG["hxflagspttldroid"] = "ROID";

// .RO
$_LANG["hxflagsrotldregistrantvatiddescr"] = "(مطلوبة لدول الاتحاد الأوروبي والمسجلين الرومانية)";

// .RU
$_LANG["hxflagsrutldlegaltypeindiv"] = "فردي";
$_LANG["hxflagsrutldlegaltypeorg"] = "منظمة";
$_LANG["hxflagsrutldregistrantbirthday"] = "عيد ميلاد الأفراد";
$_LANG["hxflagsrutldregistrantbirthdaydescr"] = "(YYYY-MM-DD, مطلوب للأفراد)";
$_LANG["hxflagsrutldregistrantpassportdata"] = "بيانات جواز السفر للأفراد";
$_LANG["hxflagsrutldregistrantpassportdatadescr"] = "(مطلوب للأفراد ؛ بما في ذلك رقم جواز السفر وتاريخ الإصدار ومكان الإصدار)<br/><br/>";

// .SE
$_LANG["hxflagssetldidentificationnumberdescr"] = ("<div style=\"text-align:justify\"><b>للأفراد أو الشركات الموجودة في السويد</b>يجب ذكر رقم شخصي أو تنظيمي سويدي فعال.<br/>" .
    "<b>للأفراد والشركات خارج السويد</b>يجب ذكر رقم الهوية (مثل رقم التسجيل المدني أو رقم تسجيل الشركة أو ما يعادلها).</div>"
);

// .SG
$_LANG["hxflagssgtldrcbsingaporeid"] = "RCB Singapore ID";

// .SWISS
$_LANG["hxflagsswisstlduid"] = "رقم هوية المالك";
$_LANG["hxflagsswisstlduiddescr"] = "المعرف، في السياق المحدد لـ {TLD} استنادًا إلى القواعد الحالية، هو UID/UPI/IDE/IDI السويسري.<br/>التنسيق للأشخاص الطبيعيين: \"756.dddd.dddd.dd\" وهو التنسيق المخصص لـ UPI / تحديد هوية الشخص العالمي.<br/>التنسيق للمؤسسات: \"CHE-ddd.ddd.ddd\" وهو التنسيق المخصص لرقم تعريف العمل أو معرف المؤسسة.<br/>d = digit";
$_LANG["hxflagsswisstldownertype"] = "نوع المالك";
$_LANG["hxflagsswisstldownertypep"] = "شخص طبيعي";
$_LANG["hxflagsswisstldownertypeo"] = "منظمة";
$_LANG["hxflagsswisstldownertypedescr"] = "(نوع المالك، في السياق المحدد ل {TLD} استنادا إلى القواعد الحالية، اعتمادا على التطبيق للأشخاص الطبيعيين أو المنظمات)";

// .SYDNEY
// Options, Nexus Category
$_LANG["hxflagssydneytldnexuscategorya"] = "المعيار A - كيانات نيو ساوث ويلز";
$_LANG["hxflagssydneytldnexuscategoryb"] = "المعيار B - سكان نيو ساوث ويلز";
$_LANG["hxflagssydneytldnexuscategoryc"] = "المعيار C - الكيانات المرتبطة";
$_LANG["hxflagssydneytldnexuscategorydescr"] = ("للتسجيل أو تجديد اسم نطاق {TLD} ، يجب على مقدم الطلب أو المسجل استيفاء أحد المعايير التالية A أو B أو C أدناه:<br/><br/>" .
    "<b>المعيار A - كيانات نيو ساوث ويلز</b><br/>" .
    "يجب أن يكون مقدم الطلب كيانًا مسجلًا لدى هيئة الأوراق المالية والاستثمارات الأسترالية أو سجل الأعمال الأسترالي:<br/>" .
    "لديه عنوان في ولاية نيو ساوث ويلز مرتبط بـ ABN أو ACN أو RBN أو ARBN ؛ أو لديه عنوان صالح للشركة في ولاية نيو ساوث ويلز<br/>" .
    "<b>المعيار B - سكان نيو ساوث ويلز</b><br/>" .
    "يجب أن يكون مقدم الطلب مواطنًا أستراليًا أو مقيمًا له عنوان صالح في ولاية نيو ساوث ويلز.<br/>" .
    "<b>المعيار C - الكيانات المرتبطة</b><br/>" .
    "يجب أن يكون مقدم الطلب كيانًا مشاركًا. لا يجوز لمقدم الطلب التقدم إلا للحصول على اسم مجال مطابق تمامًا أو مطابقة جزئية لـ ، أو اختصار لـ:<br/>" .
    "الاسم التجاري لمقدم الطلب ، أو الاسم الذي يعرف به مقدم الطلب عادة (أي الاسم المستعار) ويجب تسجيل اسم النشاط التجاري لدى السلطة المختصة في" .
    "الاختصاص القضائي الذي يقع فيه النشاط التجاري ؛ أو منتجًا يقوم الكيان المرتبط بتصنيعه أو بيعه لكيانات أو أفراد مقيمين في ولاية نيو ساوث ويلز ؛" .
    "خدمة يقدمها الكيان المرتبط لسكان ولاية نيو ساوث ويلز ؛ حدث ينظمه الكيان المرتبط أو يرعى في ولاية نيو ساوث ويلز ؛" .
    "نشاط ييسره الكيان المرتبط في ولاية نيو ساوث ويلز ؛ أو دورة أو برنامج تدريبي يوفره الكيان المرتبط لسكان ولاية نيو ساوث ويلز."
);

// .TRAVEL
$_LANG["hxflagstraveltldtravelindustry"] = "المتعلقة بقطاع السفر";
$_LANG["hxflagstraveltldtravelindustrydescr"] = "(نحن نعترف بوجود علاقة بقطاع السفر وأننا نشارك أو نخطط للمشاركة في الأنشطة المتعلقة بالسفر.)";
$_LANG["hxflagstraveltldyesno1"] = "نعم";
$_LANG["hxflagstraveltldyesno0"] = "لا";

// .US
// Options, Intended Use
$_LANG["hxflagsustldapplicationpurposep1"] = "استخدام العمل من أجل الربح";
$_LANG["hxflagsustldapplicationpurposep2"] = "مؤسسة غير ربحية / نادي / جمعية / منظمة دينية";
$_LANG["hxflagsustldapplicationpurposep3"] = "استخدام شخصي";
$_LANG["hxflagsustldapplicationpurposep4"] = "أغراض تعليمية";
$_LANG["hxflagsustldapplicationpurposep5"] = "أغراض الحكومة";
// Options, Nexus Category, https://www.about.us/policies/ustld-nexus-codes
$_LANG["hxflagsustldnexuscategoryc11"] = "[C11] شخص طبيعي وهو مواطن أمريكي";
$_LANG["hxflagsustldnexuscategoryc12"] = "[C12] شخص طبيعي مقيم دائمًا في الولايات المتحدة الأمريكية أو أي من ممتلكاته";
$_LANG["hxflagsustldnexuscategoryc21"] = "[C21] منظمة أو شركة مقرها الولايات المتحدة ؛ موضحه بالتفصيل أدناه";
$_LANG["hxflagsustldnexuscategoryc31"] = "[C31] كيان أو منظمة أجنبية ؛ موضحه بالتفصيل أدناه";
$_LANG["hxflagsustldnexuscategoryc32"] = "[C32] كيان أجنبي لديه مكتب أو منشآت أخرى في الولايات المتحدة";
$_LANG["hxflagsustldnexuscategorycdescr"] = ("<ul>" .
    "<li>[C21]: منظمة أو شركة مقرها الولايات المتحدة تشكلت في واحدة من خمسين ولاية أمريكية (50) ، أو مقاطعة كولومبيا ، أو أي من ممتلكات أو أقاليم الولايات المتحدة ؛ أو نظمت أو تشكلت بطريقة أخرى بموجب قوانين ولاية في الولايات المتحدة الأمريكية ، أو مقاطعة كولومبيا أو أي من ممتلكاتها أو أقاليمها أو كيان حكومي فيدرالي أو ولاية أو حكومة محلية أو أحد أقسامها السياسية</li>" .
    "<li>[C31]: كيان أو منظمة أجنبية لها وجود حسن النية في الولايات المتحدة الأمريكية أو أي من ممتلكاتها أو أقاليمها التي تمارس بانتظام أنشطة / مبيعات قانونية للسلع أو الخدمات أو غيرها من الأعمال التجارية أو غير التجارية ، بما في ذلك غير علاقات ربحية في الولايات المتحدة</li></ul>"
);
$_LANG["hxflagsustldnexuscountrydescr"] = "<div>حدد الجنسية الأصلية للمسجِّل (في حالة الخيارين الأخيرين من فئة Nexus (C31 أو C32)).</div>";

// .XXX
$_LANG["hxflagsxxxtldnonresolvingdomain"] = "مجال غير ممكن حله";
$_LANG["hxflagsxxxtldmembershipid"] = ".XXX ID العضوية";
$_LANG["hxflagsxxxtldmembershipiddescr"] = "(مطلوب لحل النطاق .XXX الخاص بك)";
// Options, Non-Resolving Domain
$_LANG["hxflagsxxxtldnonresolvingdomain0"] = "لا - يجب حل هذا المجال";
$_LANG["hxflagsxxxtldnonresolvingdomain1"] = "نعم - لا يجب حل هذا المجال";

// ----------------------------------------------------------------------
// ----------------------- WHOIS PRIVACY --------------------------------
// ----------------------------------------------------------------------
$_LANG["hxwhoisprivacy"] = "خصوصية WHOIS";
$_LANG["hxwhoisprivacyrequestsuccess"] = "تم تطبيق تغييرات خدمة خصوصية WHOIS بنجاح.";
$_LANG["hxwhoisprivacywhy"] = "أهمية خصوصية WHOIS";
$_LANG["hxwhoisprivacyreason"] = ("يتطلب تسجيل اسم النطاق توفير معلومات الاتصال الشخصية للتخزين الدائم الذي تديره خوادم الجهة الخارجية لـ WHOIS. هذا يعني أن اسمك وعنوانك ورقم هاتفك والبريد الإلكتروني يتم تسجيلها والاحتفاظ بها من قبل أطراف ثالثة دون قيود. تقدم بعض السجلات خدمة الخصوصية لـ WHOIS الخاصة بها مجانًا والتي تتيح حماية بيانات WHOIS من جميع الأطراف الثالثة."
);
$_LANG["hxwhoisprivacystatus"] = "حالة خصوصية WHOIS";
$_LANG["hxwhoisprivacystatus1"] = "معلومات WHOIS لديك محمية حاليًا";
$_LANG["hxwhoisprivacystatus0"] = "معلومات WHOIS الخاصة بك غير محمية في الوقت الحالي";
$_LANG["hxwhoisprivacystatusnp"] = "خدمة خصوصية WHOIS متاحة فقط للأفراد";
$_LANG["hxwhoisprivacybttnenable"] = "تمكين خصوصية WHOIS";
$_LANG["hxwhoisprivacybttndisable"] = "تعطيل خصوصية WHOIS";

// ----------------------------------------------------------------------
// ----------------------- DNSSEC MANAGEMENT ----------------------------
// ----------------------------------------------------------------------
$_LANG["cnicdnssecmanagement"] = "إدارة DNSSEC";

// ----------------------------------------------------------------------
// ----------------------- Private Nameservers List ---------------------
// ----------------------------------------------------------------------
$_LANG["hxpnslist"] = "قائمة خادم الأسماء الخاصة";
$_LANG["hxpnscolpns"] = "خادم الأسماء الخاص";
$_LANG["hxpnscolip"] = "IP عنوان";
$_LANG["hxpnsempty"] = "لا يوجد خادم أسماء خاص مسجل تحت اسم المجال هذا.";

// ----------------------------------------------------------------------
// ----------------------- Web Apps -------------------------------------
// ----------------------------------------------------------------------
$_LANG["hxwebapps"] = "تطبيقات الويب";

// ----------------------------------------------------------------------
// ------------------ Contact Information -------------------------------
// ----------------------------------------------------------------------
$_LANG["hxdomaincontactstradeinfo"] = ("قد تؤدي تغييرات بيانات جهة اتصال المسجل إلى ما يسمى بعملية \"Trade\"" .
    " التي لا تكتمل في بعض الحالات في الوقت الفعلي. يرجى التحلي بالصبر إذا لم تنعكس التغييرات على الفور."
);
// ----------------------------------------------------------------------
// ------------------ .CA Contact Confirmation --------------------------
// ----------------------------------------------------------------------
$_LANG["hxcacontactconfirmation"] = ".CA تأكيد الاتصال";
$_LANG["hxcacontactconfirmationdescr"] = "يرجى زيارة <a href=\"https://www.cira.ca/registrant-agreement\" target=\"_blank\">https://cira.ca</a> واستخدام المعرف أدناه لتأكيد اتفاقية CIRA المسجل. إذا تم استخدام نفس جهة اتصال المسجل (التي تم تأكيدها بالفعل) لتسجيل نطاق .CA آخر ، فسيتم تسجيل النطاق في الوقت الفعلي.";

// ----------------------------------------------------------------------
// ------------------ DNSSEC --------------------------------------------
// ----------------------------------------------------------------------

// رسائل الحالة
$_LANG["dnssecautomaticupdatesuccessmsg"] = "تم <span style=\"color:green;font-weight:bold;\">تفعيل</span> DNSSEC لنطاقك.<br> تم استيراد سجلات DNSSEC من منطقة DNS الخاصة بك وتحديثها لدى مسجل النطاق الخاص بك.<br><br><span style=\"color:#007bff;\">لأمانك، يساعد DNSSEC في حماية نطاقك من أنواع معينة من الهجمات عن طريق التحقق من استجابات DNS.</span>";
$_LANG["dnssecautoenable"] = "تفعيل DNSSEC واستيراد سجلات DNSSEC تلقائيًا من منطقة DNS";
$_LANG["dnssecsyncrecords"] = "مزامنة سجلات DNSSEC من منطقة DNS";

// إدارة السجلات
$_LANG["dnssecaddnewdskey"] = "إضافة مفتاح DS جديد";
$_LANG["dnssecaddnewkeyrecord"] = "إضافة سجل مفتاح جديد";

// مربع الحوار
$_LANG["dnssecconfirmdisable"] = "هل أنت متأكد أنك تريد تعطيل DNSSEC لهذا النطاق؟ قد يؤثر هذا الإجراء على حل النطاق.";
$_LANG["dnssecmodaltitle"] = "تعطيل DNSSEC";
$_LANG["dnssecmodalcancel"] = "إلغاء";
$_LANG["dnssecmodaldisable"] = "تعطيل DNSSEC";
