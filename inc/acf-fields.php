<?php
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
    'key' => 'group_homepage_settings',
    'title' => 'إعدادات الصفحة الرئيسية',
    'fields' => array(
        array(
            'key' => 'field_hero_background',
            'label' => 'خلفية قسم البداية (Hero Background)',
            'name' => 'hero_background',
            'type' => 'image',
            'return_format' => 'url',
            'instructions' => 'يفضل رفع صورة بجودة عالية وتنسيق WebP',
        ),
        array(
            'key' => 'field_hero_title',
            'label' => 'عنوان البداية (Hero Title)',
            'name' => 'hero_title',
            'type' => 'text',
            'instructions' => 'استخدم <br> للنزول سطر جديد',
        ),
        array(
            'key' => 'field_hero_subtitle',
            'label' => 'الوصف الترويجي (Hero Subtitle)',
            'name' => 'hero_subtitle',
            'type' => 'textarea',
            'rows' => 3,
        ),
        array(
            'key' => 'field_process_title',
            'label' => 'عنوان قسم مراحل العمل',
            'name' => 'process_title',
            'type' => 'text',
        ),
        array(
            'key' => 'field_step_1_title',
            'label' => 'عنوان الخطوة الأولى',
            'name' => 'step_1_title',
            'type' => 'text',
        ),
        array(
            'key' => 'field_step_2_title',
            'label' => 'عنوان الخطوة الثانية',
            'name' => 'step_2_title',
            'type' => 'text',
        ),
        array(
            'key' => 'field_step_3_title',
            'label' => 'عنوان الخطوة الثالثة',
            'name' => 'step_3_title',
            'type' => 'text',
        ),
        array(
            'key' => 'field_step_4_title',
            'label' => 'عنوان الخطوة الرابعة',
            'name' => 'step_4_title',
            'type' => 'text',
        ),
        array(
            'key' => 'field_cta_background',
            'label' => 'خلفية قسم التواصل (CTA Background)',
            'name' => 'cta_background',
            'type' => 'image',
            'return_format' => 'url',
        ),
        array(
            'key' => 'field_cta_text',
            'label' => 'عنوان بانر التواصل (CTA Banner)',
            'name' => 'cta_text',
            'type' => 'text',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_type',
                'operator' => '==',
                'value' => 'front_page',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
));

// Options Page for Global Settings (Footer, etc)
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'إعدادات القالب العامة',
        'menu_title'    => 'إعدادات أكسس',
        'menu_slug'     => 'axiis-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false,
        'icon_url'      => 'dashicons-admin-generic',
        'position'      => 4,
    ));

    acf_add_local_field_group(array(
        'key' => 'group_theme_settings',
        'title' => 'إعدادات الفوتر والتواصل',
        'fields' => array(
            array(
                'key' => 'field_site_logo',
                'label' => 'شعار الموقع (اللوجو)',
                'name' => 'site_logo',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_footer_desc',
                'label' => 'وصف الفوتر',
                'name' => 'footer_description',
                'type' => 'textarea',
                'rows' => 4,
            ),
            array(
                'key' => 'field_whatsapp_number',
                'label' => 'رقم الواتساب',
                'name' => 'whatsapp_number',
                'type' => 'text',
                'instructions' => 'الرقم بالصيغة الدولية (مثل: 966500000000)',
            ),
            array(
                'key' => 'field_phone_number',
                'label' => 'رقم الهاتف',
                'name' => 'phone_number',
                'type' => 'text',
            ),
            array(
                'key' => 'field_email_address',
                'label' => 'البريد الإلكتروني',
                'name' => 'email_address',
                'type' => 'email',
            ),
            array(
                'key' => 'field_facebook_url',
                'label' => 'رابط فيسبوك',
                'name' => 'facebook_url',
                'type' => 'url',
            ),
            array(
                'key' => 'field_twitter_url',
                'label' => 'رابط تويتر / X',
                'name' => 'twitter_url',
                'type' => 'url',
            ),
            array(
                'key' => 'field_instagram_url',
                'label' => 'رابط انستجرام',
                'name' => 'instagram_url',
                'type' => 'url',
            ),
            array(
                'key' => 'field_linkedin_url',
                'label' => 'رابط لينكد إن',
                'name' => 'linkedin_url',
                'type' => 'url',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'axiis-settings',
                ),
            ),
        ),
    ));
}

endif;
