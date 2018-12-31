<?php

function ppmquickstart_shortcode_options( $options ) {
    $options = array();
    return $options;
}
add_filter( 'cs_shortcode_options', 'ppmquickstart_shortcode_options' );

function ppmquickstart_customize_options( $options ) {
    $options = array();
    return $options;
}
add_filter( 'cs_customize_options', 'ppmquickstart_customize_options' );

function ppmquickstart_framework_settings( $settings ) {
  
    $settings = array();    

    $settings           = array(
      'menu_title'      => esc_html__('Theme Options', 'ppm-quickstart'),
      'menu_type'       => 'menu', // menu, submenu, options, theme, etc.
      'menu_slug'       => 'ppm-theme-options',
      'ajax_save'       => true,
      'show_reset_all'  => true,
      'framework_title' => esc_html__('Theme Options', 'ppm-quickstart'),
    );    


    return $settings;

}
add_filter( 'cs_framework_settings', 'ppmquickstart_framework_settings' );

function ppmquickstart_framework_options( $options ) {

    $options      = array(); // remove old options
    
    $options[]    = array(
        'name'      => 'general',
        'title'     => esc_html__('General Settings', 'ppm-quickstart'),
        'icon'      => 'fa fa-cog',
        'fields'    => array(
			array(
				'id'              => 'socials',
				'type'            => 'group',
				'title'           => 'Social Links',
				'button_title'    => 'Add New Link',
				'accordion_title' => 'Add New',
				'fields'          => array(
					array(
						'id'    => 'icon',
						'type'  => 'icon',
						'title' => 'Select icon',
					),
					array(
						'id'    => 'link',
						'type'  => 'text',
						'title' => 'Link',
						'desc'  => esc_html__('Type social link', 'ppm-quickstart'),
					),
				),
			),

        )
    );

    $options[]    = array(
        'name'      => 'backup',
        'title'     => esc_html__('Backup', 'ppm-quickstart'),
        'icon'      => 'fa fa-shield',
        'fields'    => array(
			array(
				'id'              => 'backup',
				'type'            => 'backup',
				'title'           => 'Backup',
			),

        )
    );
    
    
  	return $options;

}
add_filter( 'cs_framework_options', 'ppmquickstart_framework_options' );

function ppmquickstart_metabox_options( $options ) {

    $options      = array();

    $options[]    = array(
        'id'        => 'ppm_quickstart_page_options',
        'title'     => esc_html__('Page Options', 'ppm-quickstart'),
        'post_type' => 'page',
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => array(
            array(
                'name'  => 'ppm-quickstart_page_meta_1',
                'fields' => array(
                    array(
                        'id'    => 'page_alternative_title',
                        'type'  => 'text',
                        'title' => esc_html__('Page alternative title', 'ppm-quickstart'),
                    )
                )
            )
        )
    );

    return $options;

}
add_filter( 'cs_metabox_options', 'ppmquickstart_metabox_options' );