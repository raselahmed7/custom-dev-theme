<?php get_header(); if(have_posts()) : while(have_posts())  : the_post(); 
    if(get_post_meta($post->ID, 'ppm_page_meta', true)) {
        $page_meta = get_post_meta($post->ID, 'ppm_page_meta', true);
    } else {
        $page_meta = array();
    }

    if(array_key_exists('alternative_title', $page_meta)) {
        $alternative_title = $page_meta['alternative_title'];
    } else {
        $alternative_title = '';
    }

    if(array_key_exists('default_padding', $page_meta)) {
        $default_padding = $page_meta['default_padding'];
    } else {
        $default_padding = true;
    }

    $vc_enabled = get_post_meta($post->ID, '_wpb_vc_js_status', true);
    if($vc_enabled != 'true') {
        $vc_check_class = 'content-block';
    } else {
        $vc_check_class = 'enable-cb-padding';
    }
?> 



    <div class="<?php echo $vc_check_class; ?> <?php if($default_padding == true) : ?>enable-default-padding<?php endif; ?>">
        <div class="container">
            <div class="row">   
                <div class="col">
                    <div class="internal-content-wrap">
                       <?php if($vc_enabled != 'true') : ?>
                        <h2 class="internal-page-title"><?php if(!empty($alternative_title)) {echo $alternative_title;} else { the_title();} ?></h2>
                        <?php endif; ?>
                       <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php endwhile; endif; get_footer(); ?>