<?php

$taxonomys = array();

$pages = get_pages(array(
    'meta_key' => '_wp_page_template',
    'meta_value' => 'media-category.php'
));

foreach($pages as $page){

    $term = get_term_by('name', $page->post_title, 'media-category');

    $args = array(
        'child_of' => $term->term_id,
        'hide_empty' => false
    );

    $taxonomys[] = get_terms('media-category',$args);
}

$taxonomys = array_flatten($taxonomys);

$slidecount = count($taxonomys);
shuffle ($taxonomys);

$count = 0;
$imagecount = 0;
foreach ($taxonomys as $taxonomy) {
    $args = array(
        'orderby' => 'rand',
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
        if($attachment_meta['width'] > $attachment_meta['height']) {
            $orientation = "landscape"; 
        } else {
            $orientation = "portrait";
        }
        print '<div class="item'; if ($count == 0) {print' active';} 
        print '">';
        print '<img src="'.$post->guid.'" alt="'.$post->post_title.'" class="'.$orientation.'">';
        print '</div>';
        $count++;
        $imagecount++;
    };  
}
    
?>