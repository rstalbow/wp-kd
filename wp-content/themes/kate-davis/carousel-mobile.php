<?php

$category = get_the_title();

$images = array();
$term = get_term_by('name', $category, 'media-category');

$args = array(
    'parent' => $term->term_id,
    'hide_empty' => false,
    'orderby' => 'term_order'
);

$taxonomys = get_terms('media-category',$args);

//$taxonomyids = get_term_children($term->term_id, 'media-category' );

$count = 0;
$imagecount = 0;
$slidecount = 0;

foreach ($taxonomys as $taxonomy) {
    $args = array(
        'post_type' => 'attachment',
        'tax_query' => array(
            array(
                'taxonomy' => 'media-category', // or the name of your custom taxonomy
                'field' => 'id',
                'terms' => $taxonomy->term_id // FYI, it's more stable imho to use the ID if you can. If you do, that switch 'slug' in the preceding line to 'id'
            )
        )
    );
    $posts_array = get_posts($args);
    foreach ($posts_array as $post){
        $slidecount++;
    };

};

foreach ($taxonomys as $taxonomy) {
    $args = array(
        'post_type' => 'attachment',
        'tax_query' => array(
            array(
                'taxonomy' => 'media-category', // or the name of your custom taxonomy
                'field' => 'id',
                'terms' => $taxonomy->term_id // FYI, it's more stable imho to use the ID if you can. If you do, that switch 'slug' in the preceding line to 'id'
            )
        )
    );

    $taxterm = 'media-category_'.$taxonomy->term_id;
    $showtitle = get_field('showtitle', $taxterm);
    $posts_array = get_posts($args);
    $post_count = 1;
    
    foreach ($posts_array as $post){

        $attachment_meta = wp_get_attachment_metadata($post->ID);
        
        if (wpmd_is_phone() == true) {
            $imagesrc = wp_get_attachment_image_src($post->ID, 'medium');
            $imagesrc = $imagesrc[0];
        } else {
            $imagesrc = $post->guid;
        }
        
        if($attachment_meta['width'] > $attachment_meta['height']) {
            $orientation = "landscape"; 
        } else {
            $orientation = "portrait";
        }
        print '<div class="item'; if ($count == 0) {print' active';} 
        print '">';
        print '<img id="carouselid-'.$post->ID.'" src="'.$imagesrc.'" alt="'.$post->post_title.'"  class="'.$orientation.'">';
        $count++;
        print '<div class="image-count">'.$count.' <span class="of">OF</span> <span id="image-total">'.$slidecount.'</span></div>';
        $imagecount++;
        print '</div>';
    };  
}
    
?>