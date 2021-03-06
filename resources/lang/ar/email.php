<?php

return [
    'id'                        => 'هوية شخصية',
    'sort'                      => 'فرز',
    'status'                    => 'حالة',
    'smtp_host'                 => "مضيف SMTP" ,
    'smtp_user'                 => "مستخدم SMTP",
    'smtp_password'             => "كلمة مرور SMTP" ,
    'smtp_security'             => "أمان SMTP" ,
    'smtp_port'                 => "منفذ SMTP",
    'smtp_name'                 => "اسم البريد الإلكتروني" ,
    'smtp_from'                 => "إرسال بريد من" ,
    'smtp_load_config'          => "تهيئة تحميل SMTP" ,
    'smtp_load_config_file'     => "تحميل ملف التكوين",
    'smtp_load_config_database' => "تحميل من قاعدة البيانات" ,
    'msg_goodbye'               => 'يعتبر،',
    'admin'            => [
        'title'          => "تكوين البريد الإلكتروني",
        'create_success' => "نجاح إنشاء عنصر جديد!" ,
        'edit_success'   => "نجح تحرير العنصر!" ,
        'list'           => "تكوين قائمة البريد الإلكتروني" ,
        'field'          => 'مجال',
        'value'          => 'قيمة',
        'config_mode'    => "وضع التكوين",
        'config_smtp'    => "تكوين SMTP" ,
        'status'         => 'حالة',
        'action'         => 'عمل',
        'edit'           => 'يحرر',
        'export'         => 'يصدر',
        'delete'         => 'حذف',
        'refresh'        => 'تحديث',
        'result_item'    => 'Showing <b>:item_from</b> to <b>:item_to</b> of <b>:item_total</b> items</b>',
        'sort'           => 'فرز',
        'search'         => 'يبحث',
        'add_new'        => 'اضف جديد',
        'add_new_title'  => "إضافة التكوين",
        'add_new_des'    => "إنشاء تكوين جديد" ,
        'smtp_mode'      => "استخدام SMTP" ,
        'smtp_port'      => "منفذ SMTP" ,
        'smtp_security'  => "أمان SMTP" ,
        'smtp_password'  => "كلمة مرور SMTP" ,
        'smtp_user'      => "Tài khoản SMTP" ,
        'smtp_host'      => "خادم SMTP" ,
        'help_note'      => '<span class="text-red">(*)</span>: Emails will not be sent directly, but through a queue. You need to set up "artisan schedule: run" first, details <a href="#">HERE</a>',


    ],
    'email_action'     => [
        'manager'                        => "مدير إجراءات البريد الإلكتروني",
        'type'                           => "نوع الإجراء",
        'mode'                           => "وضع العمل",
        'sort'                           => "فرز العمل",
        'order_success_to_admin'         => "أرسل نجاح الطلب إلى المسؤول" ,
        'order_success_to_cutomer'       => "إرسال نجاح الطلب إلى العميل" ,
        'order_success_to_cutomer_pdf'   => "أرسل نجاح الطلب إلى العميل باستخدام فاتورة pdf" ,
        'forgot_password'                => "نسيت إرسال بريد إلكتروني" ,
        'customer_verify'                => "التحقق من العميل" ,
        'welcome_customer'               => "إرسال بريد إلكتروني ترحيب" ,
        'contact_to_customer'            => "إرسال بريد إلكتروني إلى العميل" ,
        'contact_to_admin'               => "إرسال بريد إلكتروني جهة اتصال إلى المسؤول" ,
        'email_action_mode'              => "تشغيل / إيقاف إرسال البريد" ,
        'email_action_queue'             => 'Use send mail queue <span class="text-red">(*)</span>',
        'email_action_smtp_mode'         => "وضع SMTP" ,
        'config_smtp'                    => "تكوين SMTP" ,
        'other'                          => 'آخر',
        'customer_verify'                => "إرسال بريد إلكتروني للتحقق من الحساب" ,
    ],
    'forgot_password'  => [
        'title'            => 'مرحبا!',
        'reset_button'     => "إعادة تعيين كلمة المرور",
        'reason_sendmail'  => "أنت تتلقى هذا البريد الإلكتروني لأننا تلقينا طلبًا لإعادة تعيين كلمة المرور لحسابك.",
        'note_sendmail'    => "ستنتهي صلاحية رابط إعادة تعيين كلمة المرور خلال: عدد الدقائق. <br> <br> إذا لم تطلب إعادة تعيين كلمة المرور ، فلا داعي لاتخاذ أي إجراء آخر.",
        'note_access_link' => 'إذا كنت تواجه مشكلة في النقر فوق الزر ": reset_button" ، فانسخ عنوان URL أدناه والصقه في متصفح الويب الخاص بك: url' ,
    ],
    'verification_content' => [
        'title'            =>'مرحبا!',
        'button'           =>  'التحقق من عنوان البريد الإلكتروني',
        'reason_sendmail'  =>  "الرجاء النقر فوق الزر أدناه للتحقق من عنوان بريدك الإلكتروني.",
        'note_sendmail'    =>  "ستنتهي صلاحية رابط إعادة تعيين كلمة المرور في: عدد الدقائق. <br> <br> إذا لم تقم بإنشاء حساب ، فلا داعي لاتخاذ أي إجراء آخر.",
        'note_access_link' =>  'إذا كنت تواجه مشكلة في النقر على الزر ": button" ، انسخ والصق عنوان URL أدناه في متصفح الويب الخاص بك: url' ,
    ],
    'welcome_customer' => [
                'title' => 'مرحبا!',
    ],
    'order'            => [
        'title_1'      => 'أهلا! موقع الويب: موقع الويب له طلب جديد! ',
        'order_id'     => 'رقم التعريف الخاص بالطلب',
        'toname'       => 'اسم الزبون',
        'address'      => 'عنوان',
        'phone'        => 'هاتف',
        'note'         => 'ملحوظة',
        'order_detail' => 'تفاصيل الطلب',
        'sort'         => 'لا.',
        'sku'          => 'SKU ',
        'price'        => 'سعر',
        'name'         => 'اسم',
        'qty'          => "الكمية",
        'total'        => 'مجموع',
        'sub_total'    => 'المجموع الفرعي ',
        'shipping_fee' => 'رسوم الشحن',
        'discount'     => 'خصم',
        'order_total'  => 'الطلب الكلي',
    ],

];
