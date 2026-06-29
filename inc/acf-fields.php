<?php
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
    'key' => 'group_homepage_settings',
    'title' => 'إعدادات الصفحة الرئيسية والعامة',
    'fields' => array(
        // Tab 1: Hero Section
        array(
            'key' => 'tab_hero_section',
            'label' => 'قسم البداية (Hero)',
            'name' => '',
            'type' => 'tab',
        ),
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
        
        // Tab 2: Process Section
        array(
            'key' => 'tab_process_section',
            'label' => 'مراحل العمل',
            'name' => '',
            'type' => 'tab',
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
        
        // Tab 3: CTA Section
        array(
            'key' => 'tab_cta_section',
            'label' => 'قسم التواصل المباشر',
            'name' => '',
            'type' => 'tab',
        ),
        array(
            'key' => 'field_enable_custom_cursor',
            'label' => 'تفعيل المؤشر المخصص (Custom Cursor)',
            'name' => 'enable_custom_cursor',
            'type' => 'true_false',
            'message' => 'تفعيل',
            'default_value' => 1,
            'ui' => 1,
        ),
        array(
            'key' => 'field_enable_floating_whatsapp',
            'label' => 'تفعيل أيقونة الواتساب العائمة',
            'name' => 'enable_floating_whatsapp',
            'type' => 'true_false',
            'message' => 'تفعيل',
            'default_value' => 1,
            'ui' => 1,
        ),
        array(
            'key' => 'field_enable_social_media',
            'label' => 'تفعيل روابط السوشيال ميديا',
            'name' => 'enable_social_media',
            'type' => 'true_false',
            'message' => 'تفعيل',
            'default_value' => 1,
            'ui' => 1,
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

        // Tab 4: General Settings (Moved from Options Page)
        array(
            'key' => 'tab_general_settings',
            'label' => 'الإعدادات العامة (الفوتر والتواصل)',
            'name' => '',
            'type' => 'tab',
        ),
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

endif;
