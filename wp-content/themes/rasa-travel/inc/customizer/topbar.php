<?php

$rasa_travel_default = rasa_travel_get_default_theme_options();
/**
* Header Top Panel
*/
$wp_customize->add_panel( 'rasa_travel_header_top_panel', array(
    'title'          => __( 'Top Header', 'rasa-travel' ),
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
) );

// Contact Details Section
$wp_customize->add_section(
    'rasa_travel_contact_details_section',
    array(
        'title'    => __( 'Contact Details', 'rasa-travel' ),
        'panel'    => 'rasa_travel_header_top_panel',
    )
);

// Show Contact Details
$wp_customize->add_setting( 
    'theme_options[rasa_travel_show_contact_details]', 
    array(
        'default'           => $rasa_travel_default['rasa_travel_show_contact_details'],
        'sanitize_callback' => 'rasa_travel_sanitize_checkbox',
    ) 
);

$wp_customize->add_control(
    'theme_options[rasa_travel_show_contact_details]',
    array(
        'label'       => __( 'Show Contact Details', 'rasa-travel' ),
        'section'     => 'rasa_travel_contact_details_section',
        'type'        => 'checkbox',
    )
);

// Address 1
$wp_customize->add_setting( 'theme_options[rasa_travel_address_one]',
    array(
    'default'           => $rasa_travel_default['rasa_travel_address_one'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'refresh',
    )
);

$wp_customize->add_control( 'theme_options[rasa_travel_address_one]',
    array(
    'label'    => __( 'Address 1', 'rasa-travel' ),
    'section'  => 'rasa_travel_contact_details_section',
    'type'     => 'text',
    )
);

// Address 2
$wp_customize->add_setting( 'theme_options[rasa_travel_address_two]',
    array(
    'default'           => $rasa_travel_default['rasa_travel_address_two'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'refresh',
    )
);

$wp_customize->add_control( 'theme_options[rasa_travel_address_two]',
    array(
    'label'    => __( 'Address 2', 'rasa-travel' ),
    'section'  => 'rasa_travel_contact_details_section',
    'type'     => 'text',
    )
);

// Phone Number
$wp_customize->add_setting( 'theme_options[rasa_travel_phone_number]',
    array(
    'default'           => $rasa_travel_default['rasa_travel_phone_number'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'refresh',
    )
);

$wp_customize->add_control( 'theme_options[rasa_travel_phone_number]',
    array(
    'label'    => __( 'Phone Number', 'rasa-travel' ),
    'section'  => 'rasa_travel_contact_details_section',
    'type'     => 'text',
    )
);

// Opening Time
$wp_customize->add_setting( 'theme_options[rasa_travel_opening_time]',
    array(
    'default'           => $rasa_travel_default['rasa_travel_opening_time'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'refresh',
    )
);

$wp_customize->add_control( 'theme_options[rasa_travel_opening_time]',
    array(
    'label'    => __( 'Opening Time', 'rasa-travel' ),
    'section'  => 'rasa_travel_contact_details_section',
    'type'     => 'text',
    )
);

// Email ID
$wp_customize->add_setting( 'theme_options[rasa_travel_email_id]',
    array(
    'default'           => $rasa_travel_default['rasa_travel_email_id'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'refresh',
    )
);

$wp_customize->add_control( 'theme_options[rasa_travel_email_id]',
    array(
    'label'    => __( 'Email ID', 'rasa-travel' ),
    'section'  => 'rasa_travel_contact_details_section',
    'type'     => 'text',
    )
);

// Support Text
$wp_customize->add_setting( 'theme_options[rasa_travel_support_text]',
    array(
    'default'           => $rasa_travel_default['rasa_travel_support_text'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'refresh',
    )
);

$wp_customize->add_control( 'theme_options[rasa_travel_support_text]',
    array(
    'label'    => __( 'Support Text', 'rasa-travel' ),
    'section'  => 'rasa_travel_contact_details_section',
    'type'     => 'text',
    )
);

// Menu Button Section
$wp_customize->add_section(
    'rasa_travel_menu_button_section',
    array(
        'title'    => __( 'Apply Now', 'rasa-travel' ),
        'panel'    => 'rasa_travel_header_top_panel',
    )
);

// Show Menu Button
$wp_customize->add_setting( 
    'theme_options[rasa_travel_show_menu_button]', 
    array(
        'default'           => $rasa_travel_default['rasa_travel_show_menu_button'],
        'sanitize_callback' => 'rasa_travel_sanitize_checkbox',
    ) 
);

$wp_customize->add_control(
    'theme_options[rasa_travel_show_menu_button]',
    array(
        'label'       => __( 'Show Menu Button', 'rasa-travel' ),
        'section'     => 'rasa_travel_menu_button_section',
        'type'        => 'checkbox',
    )
);

// Button Text
$wp_customize->add_setting( 'theme_options[rasa_travel_menu_button_text]',
    array(
    'default'           => $rasa_travel_default['rasa_travel_menu_button_text'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'refresh',
    )
);

$wp_customize->add_control( 'theme_options[rasa_travel_menu_button_text]',
    array(
    'label'    => __( 'Button Text', 'rasa-travel' ),
    'section'  => 'rasa_travel_menu_button_section',
    'type'     => 'text',
    )
);

// Button Url
$wp_customize->add_setting( 'theme_options[rasa_travel_menu_button_url]',
    array(
    'default'           => $rasa_travel_default['rasa_travel_menu_button_url'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'esc_url_raw',
    'transport'         => 'refresh',
    )
);

$wp_customize->add_control( 'theme_options[rasa_travel_menu_button_url]',
    array(
    'label'    => __( 'Button Url', 'rasa-travel' ),
    'section'  => 'rasa_travel_menu_button_section',
    'type'     => 'url',
    )
);