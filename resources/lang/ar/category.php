<?php
return [
    'id'             => '#',
    'title'          => 'العنوان',
    'title'          => 'العنوان',
    'keyword'        => "الكلمات الدلالية",
    'alias'          => 'Url customize <span class="seo" title="SEO"><i class="fa fa-coffee" aria-hidden="true"></i></span>',
    'alias_validate' => 'اقصى عدد 100 ويكون من ضمن : "A-Z", "a-z", "0-9" and "-_" ',
    'alias_unique'   => "الاسم المستعار موجود بالفعل" ,
    'description'    => 'الوصف',
    'image'          => 'الصورة',
    'parent'         => 'متفرع من',
    'top'            => "يعرض في الموقع",
    'top_help'       => "سيتم عرض هذا القسم خارج الصفحة الرئيسية. ",
    'status'         => 'الحالة',
    'sort'           => 'الترتيب',
    'admin'       => [
        'title'           => 'ادارة الاقسام',
        'create_success'  => "تم بنجاح إنشاء عنصر جديد!" ,
        'edit_success'    => "تم بنجاح تعديل العنصر!" ,
        'list'            => 'قائمة الفئات',
        'action'          => 'الاجراء',
        'delete'          => 'الحذف',
        'edit'            => 'التعديل',
        'add_new'         => 'اضف جديد',
        'add_new_title'   => 'إضافة قسم جديد',
        'add_new_des'     => "إنشاء قسم جديد",
        'export'          => 'تصدير',
        'refresh'         => 'تحديث',
        'result_item'     => 'Showing <b>:item_from</b> to <b>:item_to</b> of <b>:item_total</b> items</b>',
        'sort'            => 'ترتيب',
        'select_category' => 'اختر قسـم',

        'sort_order'      => [
            'id_asc'     => " تصاعدي" ,
            'id_desc'    => "تنازلي",
            'title_asc'  => " العنوان تصاعدي" ,
            'title_desc' => " العنوان تنازلي",
        ],
        'search'          =>  'البحث',
        'search_place'    =>  "البحث بالعنوان" ,
    ],
];
