<?php
return [
    'id'                        => 'هوية شخصية',
    'name'                      => 'اسم',
    'slug'                      => 'سبيكة',
    'permission'                => 'الإذن',
    'http_path'                 => "مسار HTTP" ,
    'http_method'               => "طريقة HTTP",
    'created_at'                => 'أنشئت في',
    'updated_at'                => 'تم التحديث في',
    'password_confirmation'     => 'تأكيد',
    'slug_validate'             =>'فقط الحروف ضمن المجموعه: "A-Z", "a-z", "0-9" and "._-" ',
    'admin' => [
        'title'                 => "مدير الأذونات",
        'create_success'        => "نجاح إنشاء عنصر جديد!" ,
        'edit_success'          => "نجح تحرير العنصر!" ,
        'list'                  => "مدير الأذونات",
        'action'                => 'عمل',
        'delete'                => 'حذف',
        'edit'                  => 'يحرر',
        'add_new'               => 'اضف جديد',
        'add_new_title'         => "إضافة إذن جديد" ,
        'add_new_des'           => "إنشاء إذن جديد" ,
        'export'                => 'يصدر',
        'refresh'               => 'تحديث',
        'result_item'           => 'إظهار <b>: item_from </b> إلى <b>: item_to </b> من <b>: item_total </b> من العناصر </ b>' ,
        'sort'                  => 'فرز',
        'keep_password'         => "اتركه فارغًا إذا كنت لا تريد تغيير كلمة المرور" ,
        'select_http_method'    => "حدد الطريقة",
        'select_http_uri'       => "حدد إجراء URI" ,
        'select_permission'     => "تحديد الإذن",
        'method_placeholder'    => "طريقة HTTP",
        'method_helper'         => "كل الطرق إذا كانت فارغة" ,

        'sort_order' => [
            'id_asc'            => "ID تصاعدي" ,
            'id_desc'           => "وصف المعرف",
            'name_asc'          => "الاسم تصاعدي" ,
            'name_desc'         => "وصف الاسم" ,
        ],
        'search'                => 'يبحث',
        'search_place'          => 'بحث',

    ],

];
