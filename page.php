<?php get_header(); if(have_posts()) : while(have_posts())  : the_post(); 
    if(get_post_meta($post->ID, 'ppm_quickstart_page_options', true)) {
        $page_meta = get_post_meta($post->ID, 'ppm_quickstart_page_options', true);
    } else {
        $page_meta = array();
    }

    if(array_key_exists('page_alternative_title', $page_meta)) {
        $page_alternative_title = $page_meta['page_alternative_title'];
    } else {
        $page_alternative_title = '';
    }

    $vc_enabled = get_post_meta($post->ID, '_wpb_vc_js_status', true);
    if($vc_enabled != 'true') {
        $vc_check_class = 'content-block';
    } else {
        $vc_check_class = 'enable-cb-padding';
    }
?> 



    <div class="<?php echo $vc_check_class; ?>">
        <div class="container">
            <div class="row">   
                <div class="col">
                    <div class="internal-content-wrap">
                       <?php if($vc_enabled != 'true') : ?>
                        <h2 class="internal-page-title"><?php if(!empty($page_alternative_title)) {echo $page_alternative_title;} else { the_title();} ?></h2>
                        <?php endif; ?>
                       <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php endwhile; endif; get_footer(); ?>