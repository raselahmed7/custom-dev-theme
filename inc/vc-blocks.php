<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function ppm_quickstart_page_list( ) {

    $args = wp_parse_args( array(
        'post_type'   => 'page',
        'numberposts' => -1,
        'orderby' => 'title',
        'order' => 'ASC',
    ) );

    $posts = get_posts( $args );

    $post_options = array(esc_html__('-- Select page --', 'ppm-quickstart')=>'');
    if ( $posts ) {
        foreach ( $posts as $post ) {
            $post_options[ $post->post_title ] = $post->ID;
        }
    }

    return $post_options;
}



vc_map(
    array(
        "name" => esc_html__( "Button", "inventor-toolkit" ),
        "base" => "btn",
        "category" => esc_html__( "Theme Addons", "inventor-toolkit"),
        "params" => array(
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Button text", "inventor-toolkit" ),
                "param_name" => "text",
                "admin_label" => true,
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Button link", "inventor-toolkit" ),
                "param_name" => "link",
                "admin_label" => true,
            ),
            array(
                "type" => "dropdown",
                "heading" => esc_html__( "Button target", "inventor-toolkit" ),
                "param_name" => "target",
                "value" => array(
                    "Same tab" => "_self",
                    "New tab" => "_blank"
                ),
            )
        )
    )
);