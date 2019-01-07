<?php 

function post_list_shortcode($atts){
    extract( shortcode_atts( array(
        'count' => -1,
    ), $atts) );
     
    $q = new WP_Query(
        array(
            'posts_per_page' => $count, 
            'post_type' => 'posttype', 
            'orderby' => 'menu_order',
            'order' => 'ASC'
        )
    );      
         
    $html = '<div class="custom-post-list">';
    while($q->have_posts()) : $q->the_post();
        $idd = get_the_ID();
        if(get_post_meta($idd, 'ppm_page_meta', true)) {
            $meta = get_post_meta($idd, 'ppm_page_meta', true);
        } else {
            $meta = array();
        }

        if(array_key_exists('value', $meta)) {
            $value = $meta['value'];
        } else {
            $value = '';
        }

        $html .= '
        <div class="single-post-item">
            <h2>' .do_shortcode( get_the_title() ). '</h2>
            '.wpautop( get_the_content() ).'
        </div>
        ';        
    endwhile;
    $html.= '</div>';
    wp_reset_query();
    return $html;
}
add_shortcode('post_list', 'post_list_shortcode');  

function btn_shortcode( $atts, $content = null  ) {
 
    extract( shortcode_atts( array(
        'link' => '',
        'text' => 'Read More',
        'target' => '_self'
    ), $atts ) );

    $html = '<a href="'.$link.'" target="'.$target.'" class="boxed-btn">'.$text.'</a>';
 
    return $html;
}   
add_shortcode('btn', 'btn_shortcode');

function phone_btn_shortcode( $atts, $content = null  ) {
    $options = get_option('ppm_theme_options');
    $phone = $options['phone'];

    if(!empty($phone)) {
        $html = '<a href="tel:'.$phone.'" class="boxed-btn phone-btn">'.$phone.'</a>';
    } else {
        $html = '';
    }
 
    return $html;
}   
add_shortcode('phone_btn', 'phone_btn_shortcode');

function phone_text_btn_shortcode( $atts, $content = null  ) {
    $options = get_option('ppm_theme_options');
    $phone = $options['phone'];

    if(!empty($phone)) {
        $html = '<a href="tel:'.$phone.'" class="phone-text-btn">'.$phone.'</a>';
    } else {
        $html = '';
    }
 
    return $html;
}   
add_shortcode('phone_text_btn', 'phone_text_btn_shortcode');

function socials_shortcode( $atts, $content = null  ) {
 
    $options = get_option('ppm_theme_options');
    $socials_markup = $options['socials'];
    
    if(!empty($socials_markup)) {
        $social_icons_markup = '<div class="social-links">';
        
        foreach($socials_markup as $link) {
            $social_icons_markup .= '<a href="'.$link['link'].'" target="_blank"><i class="'.$link['icon'].'"></i></a>';
        }
        
        $social_icons_markup .= '</div>';
        
    } else {
        $social_icons_markup = '';
    }
    
    return $social_icons_markup;
}   
add_shortcode('socials', 'socials_shortcode');