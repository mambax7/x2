<?php
/**
 * ****************************************************************************
 *  - TDMDownloads By TDM   - TEAM DEV MODULE FOR XOOPS
 *  - GNU Licence Copyright (c)  (www.xoops.org)
 *
 * La licence GNU GPL, garanti � l'utilisateur les droits suivants
 *
 * 1. La libert� d'ex�cuter le logiciel, pour n'importe quel usage,
 * 2. La libert� de l' �tudier et de l'adapter � ses besoins,
 * 3. La libert� de redistribuer des copies,
 * 4. La libert� d'am�liorer et de rendre publiques les modifications afin
 * que l'ensemble de la communaut� en b�n�ficie.
 *
 * @copyright   http://www.tdmxoops.net
 * @license     http://www.fsf.org/copyleft/gpl.html GNU public license
 * @author		TDM (G.Mage); TEAM DEV MODULE
 *
 * ****************************************************************************
 */
// Non du module
define("_MI_TDMDOWNLOADS_NAME","تی دی ام دانلود");

// Description du module
define("_MI_TDMDOWNLOADS_DESC","ایجاد بخش دریافت فایل که در آن کاربران میتوانند فایل ارسال / دریافت / ارزیابی کنند.");

// Block
define("_MI_TDMDOWNLOADS_BNAME1","فایل های اخیر");
define("_MI_TDMDOWNLOADS_BNAMEDSC1","نمایش فایل های اخیر");
define("_MI_TDMDOWNLOADS_BNAME2","برترین فایل ها");
define("_MI_TDMDOWNLOADS_BNAMEDSC2","نمایش برترین فایل ها");
define("_MI_TDMDOWNLOADS_BNAME3","فایل هایی با بیشترین رای");
define("_MI_TDMDOWNLOADS_BNAMEDSC3","نمایش فایل ها با بیشترین رای");
define("_MI_TDMDOWNLOADS_BNAME4","فایل های تصادفی");
define("_MI_TDMDOWNLOADS_BNAMEDSC4","نمایش فایل های تصادفی");
define("_MI_TDMDOWNLOADS_BNAME5","جستجو در دانلود");
define("_MI_TDMDOWNLOADS_BNAMEDSC5","جستجو در دانلود");


// Sous menu
define("_MI_TDMDOWNLOADS_SMNAME1","ارسال");
define("_MI_TDMDOWNLOADS_SMNAME2","جستجو");

// Menu administration
define("_MI_TDMDOWNLOADS_ADMENU1", "صفحه اصلی");
define("_MI_TDMDOWNLOADS_ADMENU2","مدیریت شاخه ها");
define("_MI_TDMDOWNLOADS_ADMENU3","مدیریت فایل ها");
define("_MI_TDMDOWNLOADS_ADMENU4","فایل های خراب");
define("_MI_TDMDOWNLOADS_ADMENU5","فایل های ویرایش شده");
define("_MI_TDMDOWNLOADS_ADMENU6","مدیریت فیلد های اضافی");
define("_MI_TDMDOWNLOADS_ADMENU7","وارد کردن اطلاعات");
define("_MI_TDMDOWNLOADS_ADMENU8", "دسترسی");
define("_MI_TDMDOWNLOADS_ADMENU9", "درباره");



// Pr�f�rences

define("_MI_TDMDOWNLOADS_PREFERENCE_BREAK_GENERAL", "عمومی");
define("_MI_TDMDOWNLOADS_POPULAR", "تعداد بازدید های که باعث میشوند یک فایل جز محبوب ها قرار بگیرد");
define("_MI_TDMDOWNLOADS_AUTO_SUMMARY","خلاصه خودکار؟");
define("_MI_TDMDOWNLOADS_SHOW_UPDATED","نمایش تصاویر 'به روز شده' و 'جدید'  ؟");
define("_MI_TDMDOWNLOADS_USESHOTS", "استفاده از لوگو");
define("_MI_TDMDOWNLOADS_IMGFLOAT", "چیدمان عکس");
define("_MI_TDMDOWNLOADS_IMGFLOAT_LEFT", "چپ");
define("_MI_TDMDOWNLOADS_IMGFLOAT_RIGHT", "راست");
define("_MI_TDMDOWNLOADS_SHOTWIDTH", "ارتفاع لوگو");
define("_MI_TDMDOWNLOADS_PLATEFORM","پلت فورم");
define("_MI_TDMDOWNLOADS_PLATEFORM_DSC","پلت فورم های مجاز را وارد و با علامت | از هم جدا کنید");
define("_MI_TDMDOWNLOADS_USETELLAFRIEND", "استفاده از ماژول Tellafriend برای معرفی فایل به دوستان؟");
define("_MI_TDMDOWNLOADS_USETELLAFRIENDDSC", "برای استفاده از این گزینه باید ماژول Tellafriend را نصب کنید");
define("_MI_TDMDOWNLOADS_USETAG", "استفاده از ماژول تگ برای تولید تگ ها");
define("_MI_TDMDOWNLOADS_USETAGDSC", " برای استفاده از این گزینه باید ماژول TAG را نصب کرده باشید");
define("_MI_TDMDOWNLOADS_FORM_OPTIONS","ویرایشگر");
define("_MI_TDMDOWNLOADS_PREFERENCE_BREAK_USER", "کاربر");
define("_MI_TDMDOWNLOADS_PERPAGE", "تعداد فایل هایی که در هر صفحه نمایش داده میشوند");
define("_MI_TDMDOWNLOADS_NBDOWCOL"," تعداد ستون هایی که برای نمایش فایل ها استفاده می شود");
define("_MI_TDMDOWNLOADS_NEWDLS", "تعداد فایل های جدید در صفحه اصلی ماژول");
define("_MI_TDMDOWNLOADS_TOPORDER","چگونگی ترتیب نمایش اطلاعات در صفحه اصلی؟");
define('_MI_TDMDOWNLOADS_TOPORDER1',"تاریخ ارسال (نزولی)");
define('_MI_TDMDOWNLOADS_TOPORDER2',"تاریخ ارسال (صعودی)");
define('_MI_TDMDOWNLOADS_TOPORDER3',"بازدید (نزولی)");
define('_MI_TDMDOWNLOADS_TOPORDER4',"بازدید (صعودی)");
define('_MI_TDMDOWNLOADS_TOPORDER5',"رای (نزولی)");
define('_MI_TDMDOWNLOADS_TOPORDER6',"رای (صعودی)");
define('_MI_TDMDOWNLOADS_TOPORDER7',"عنوان (نزولی)");
define('_MI_TDMDOWNLOADS_TOPORDER8',"عنوان (صعودی)");

define("_MI_TDMDOWNLOADS_PERPAGELISTE", "تعداد دریافت هایی که در فهرست فایل ها نمایش داده میشد");
define("_MI_TDMDOWNLOADS_SEARCHORDER","چگونگی نمایش فایل ها در لیست");
define("_MI_TDMDOWNLOADS_SUBCATPARENT", "تعداد زیر شاخه هایی که در شاخه ی اصلی نمایش داده می شود");
define("_MI_TDMDOWNLOADS_NBCATCOL","تعداد ستون های شاخه ها در صفحه ی اصلی ماژول");
define("_MI_TDMDOWNLOADS_BLDATE", "نمایش آخرین دانلود ها در صفحه اصلی و شاخه (خلاصه)؟");
define("_MI_TDMDOWNLOADS_BLPOP", "نمایش فایل های محبوب در صفحه اصلی و شاخه (خلاصه)؟");
define("_MI_TDMDOWNLOADS_BLRATING", "نمایش پربیننده ترین فایل ها در صفحه اصلی و شاخه (خلاصه)؟");
define("_MI_TDMDOWNLOADS_NBBL", "تعداد دانلود هایی که در خلاصه نمایش گذاشته می شود");
define("_MI_TDMDOWNLOADS_LONGBL", "طول عنوان در خلاصه");
define("_MI_TDMDOWNLOADS_BOOKMARK", "به اشتراک گذاری");
define("_MI_TDMDOWNLOADS_BOOKMARK_DSC", "نمایش یا عدم نمایش ایکون های به اشتراک گذاری");
define("_MI_TDMDOWNLOADS_SOCIAL", "شبکه های اجتماعی");
define("_MI_TDMDOWNLOADS_SOCIAL_DSC", "نمایش یا عدم نمایش ایکون های شبکه اجتماعی");
define("_MI_TDMDOWNLOADS_DOWNLOADFLOAT", "چیدمان صفحه دانلود");
define("_MI_TDMDOWNLOADS_DOWNLOADFLOAT_DSC", "<ul><li>چپ به راست: نمایش توضیحات در سمت راست و جدول اطلاعات در سمت چپ</li><li>راست به چپ: نمایش توضیحات در سمت چپ و جدول اطلاعات در سمت راست </li></ul>");
define("_MI_TDMDOWNLOADS_DOWNLOADFLOAT_LTR", "چپ به راست");
define("_MI_TDMDOWNLOADS_DOWNLOADFLOAT_RTL", "راست به چپ");
define("_MI_TDMDOWNLOADS_PREFERENCE_BREAK_ADMIN", "مدیریت");
define("_MI_TDMDOWNLOADS_PERPAGEADMIN", "تعداد فایلهایی که در صفحه مدیریت نمایش داده می شود");
define("_MI_TDMDOWNLOADS_PREFERENCE_BREAK_DOWNLOADS", "دانلودها");
define('_MI_TDMDOWNLOADS_PERMISSIONDOWNLOAD',"نوع دسترسي را براي 'دسترسي دانلود'  انتخاب کنيد");
define('_MI_TDMDOWNLOADS_PERMISSIONDOWNLOAD1',"دسترسي با شاخه");
define('_MI_TDMDOWNLOADS_PERMISSIONDOWNLOAD2',"دسترسي با فايل");
define("_MI_TDMDOWNLOADS_DOWNLOAD_NAME", "تغییر نام فایل های بارگذاری شده؟");
define("_MI_TDMDOWNLOADS_DOWNLOAD_NAMEDSC", "اگر نه را انتخاب نمایید و در صورتی که فایلی با اسم مشابه بارگذاری نمایید فایل جدید به جای فایل قبلی جایگزی خواهد شد");
define("_MI_TDMDOWNLOADS_DOWNLOAD_PREFIX", "پیشوند فایلهای آپلود شده");
define("_MI_TDMDOWNLOADS_DOWNLOAD_PREFIXDSC", "در صورتی که تغییر نام را روی بله گذاشته باشید فعال می شود");
define("_MI_TDMDOWNLOADS_MAXUPLOAD_SIZE","بيشترين اندازه فايل براي بارگذاري");
define("_MI_TDMDOWNLOADS_MIMETYPE","mime type هاي مجاز ");
define("_MI_TDMDOWNLOADS_MIMETYPE_DSC","mime type هاي مجاز را وارد کنيد و آنها را با | از هم جدا کنيد");
define("_MI_TDMDOWNLOADS_CHECKHOST", "عدم اجازه لينک فايل مستقيم؟ (leeching)");
define("_MI_TDMDOWNLOADS_REFERERS", "اين سايت ها بدون واسطه به فايل شما لينک ميدهند هر کدام را با | از بقيه جدا کنيد");
define("_MI_TDMDOWNLOADS_DOWNLIMIT", "محدودیت دانلود");
define("_MI_TDMDOWNLOADS_DOWNLIMITDSC", "استفاده از محدودیت دانلود");
define("_MI_TDMDOWNLOADS_LIMITGLOBAL", "تعداد دانلودهای مجاز در 24 ساعت");
define("_MI_TDMDOWNLOADS_LIMITGLOBALDSC", "تعداد فایل هایی که هر کاربر می تواند در 24 ساعت دانلود کند. عدد 0 برای دانلود نامحدود");
define("_MI_TDMDOWNLOADS_LIMITLID", "تعداد دانلود مجاز هر فایل در 24 ساعت");
define("_MI_TDMDOWNLOADS_LIMITLIDDSC", "تعداد دانلود هر فایل که کاربر می تواند در 24 ساعت دانلود کند. عدد 0 برای دانلود نامحدود");
define("_MI_TDMDOWNLOADS_PREFERENCE_BREAK_PAYPAL", "پی پال");
define("_MI_TDMDOWNLOADS_USEPAYPAL","استفاده از دکمه پرداخت با پی پال ");
define("_MI_TDMDOWNLOADS_CURRENCYPAYPAL","واحد پول");
define("_MI_TDMDOWNLOADS_IMAGEPAYPAL","تصویر برای دکمه پرداخت");
define("_MI_TDMDOWNLOADS_IMAGEPAYPALDSC","لطفا آدرس تصویر خود را وارد کنید");
define("_MI_TDMDOWNLOADS_PREFERENCE_BREAK_RSS", "RSS");
define("_MI_TDMDOWNLOADS_PERPAGERSS", "RSS تعداد  دانلودها");
define("_MI_TDMDOWNLOADS_PERPAGERSSDSCC", "تعداد  فایل های دانلود در هر صفحه RSS ");
define("_MI_TDMDOWNLOADS_TIMECACHERSS", "RSS زمان کش");
define("_MI_TDMDOWNLOADS_TIMECACHERSSDSC", "زمان کش برای RSS بر حسب دقیقه");
define("_MI_TDMDOWNLOADS_LOGORSS", "لوگوی سایت در صفحه RSS");
define("_MI_TDMDOWNLOADS_PREFERENCE_BREAK_COMNOTI", "نظرات و آگهی رسانی");

// Notifications
define('_MI_TDMDOWNLOADS_GLOBAL_NOTIFY', 'سراسرس');
define('_MI_TDMDOWNLOADS_GLOBAL_NOTIFYDSC', 'اگاهی رسانی های سراسری دریافت فایل.');
define('_MI_TDMDOWNLOADS_CATEGORY_NOTIFY', 'شاخه');
define('_MI_TDMDOWNLOADS_CATEGORY_NOTIFYDSC', "تنظیمات اطلاع رسانی که برای همین شاخه به کار میرود.");
define('_MI_TDMDOWNLOADS_FILE_NOTIFY', 'فایل');
define('_MI_TDMDOWNLOADS_FILE_NOTIFYDSC', "تنظیمات اطلاع رسانی که برای همین فایل به کار میرود.");
define('_MI_TDMDOWNLOADS_GLOBAL_NEWCATEGORY_NOTIFY', 'شاخه جدید');
define('_MI_TDMDOWNLOADS_GLOBAL_NEWCATEGORY_NOTIFYCAP', 'هرگاه شاخه جدیدی ایجاد شد مرا باخبر کن.');
define('_MI_TDMDOWNLOADS_GLOBAL_NEWCATEGORY_NOTIFYDSC', "هرگاه شاخه جدیدی ایجاد شد به من ارسال کن");
define('_MI_TDMDOWNLOADS_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} اطلاع رسانی خودکار:شاخه جدید');
define('_MI_TDMDOWNLOADS_GLOBAL_FILEMODIFY_NOTIFY', 'اطلاع رسانی خودکار:شاخه جدید');
define('_MI_TDMDOWNLOADS_GLOBAL_FILEMODIFY_NOTIFYCAP', 'هر گاه درخواستی برای اصلاح فایل رسید مرا با خبر کن.');
define('_MI_TDMDOWNLOADS_GLOBAL_FILEMODIFY_NOTIFYDSC', "هر گاه درخواستی برای اصلاح فایل رسید به من ارسال کن.");
define('_MI_TDMDOWNLOADS_GLOBAL_FILEMODIFY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE}  اطلاع رسانی خودکار: درخواست اصلاح فایل');
define('_MI_TDMDOWNLOADS_GLOBAL_FILEBROKEN_NOTIFY', 'تایید گزارش فایل خرابر');
define('_MI_TDMDOWNLOADS_GLOBAL_FILEBROKEN_NOTIFYCAP', 'هر گزارشی راجع به ارسال فایل خراب از سایت رسید مرا با خبر کن.');
define('_MI_TDMDOWNLOADS_GLOBAL_FILEBROKEN_NOTIFYDSC', 'هر گزارشی راجع به ارسال فایل  خراب از سایت رسید به من ارسال کن.');
define('_MI_TDMDOWNLOADS_GLOBAL_FILEBROKEN_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} اطلاع رسانی خودکار:ارسال فایل از خارج سایت‌');
define('_MI_TDMDOWNLOADS_GLOBAL_FILESUBMIT_NOTIFY', 'فایل ارسال شده');
define('_MI_TDMDOWNLOADS_GLOBAL_FILESUBMIT_NOTIFYCAP', "هر فایلی ارسال شد مرا با خبر کن (در انتظار تایید).");
define('_MI_TDMDOWNLOADS_GLOBAL_FILESUBMIT_NOTIFYDSC', "هر فایلی ارسال شد به من ارسال کن (در انتظار تایید).");
define('_MI_TDMDOWNLOADS_GLOBAL_FILESUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} اطلاع رسانی خودکار:فایل ارسال شده');

define('_MI_TDMDOWNLOADS_GLOBAL_NEWFILE_NOTIFY', 'فایل جدید');
define('_MI_TDMDOWNLOADS_GLOBAL_NEWFILE_NOTIFYCAP', "هر فایل جدیدی ارسال شد مرا با خبر کن.");
define('_MI_TDMDOWNLOADS_GLOBAL_NEWFILE_NOTIFYDSC', 'هر فایل جدیدی ارسال شد به من ارسال کن.');
define('_MI_TDMDOWNLOADS_GLOBAL_NEWFILE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} اطلاع رسانی خودکار:فایل جدید');
define('_MI_TDMDOWNLOADS_CATEGORY_FILESUBMIT_NOTIFY', 'فایل ثبت شده');
define('_MI_TDMDOWNLOADS_CATEGORY_FILESUBMIT_NOTIFYCAP', "هر فایل جدیدی ثبت شد مرا با خبر کن.");
define('_MI_TDMDOWNLOADS_CATEGORY_FILESUBMIT_NOTIFYDSC', "هر فایل جدیدی ثبت شد به من ارسال کن.");
define('_MI_TDMDOWNLOADS_CATEGORY_FILESUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE}  اطلاع رسانی خودکار:فایل ثبت شده در شاخه');
define('_MI_TDMDOWNLOADS_CATEGORY_NEWFILE_NOTIFY', 'فایل جدید');
define('_MI_TDMDOWNLOADS_CATEGORY_NEWFILE_NOTIFYCAP', "وقتی یک فایل در همین شاخه قرار گرفت مرا با خبر کن.");
define('_MI_TDMDOWNLOADS_CATEGORY_NEWFILE_NOTIFYDSC', "وقتی یک فایل در همین شاخه قرار گرفت به من ارسال کن.");
define('_MI_TDMDOWNLOADS_CATEGORY_NEWFILE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} اطلاع رسانی خودکار:فایل جدید در شاخه');
define('_MI_TDMDOWNLOADS_FILE_APPROVE_NOTIFY', 'فایل تایید شده');
define('_MI_TDMDOWNLOADS_FILE_APPROVE_NOTIFYCAP', 'هر فایلی تایید شد مرا با خبر کن.');
define('_MI_TDMDOWNLOADS_FILE_APPROVE_NOTIFYDSC', 'هر فایلی تایید شد به من ارسال کن.');
define('_MI_TDMDOWNLOADS_FILE_APPROVE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} اطلاع رسانی خودکار:فایل تایید شده');

?>