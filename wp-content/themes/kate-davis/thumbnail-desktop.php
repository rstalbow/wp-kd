<?php

$images = array();
$term = get_term_by('name', $pagetitle, 'media-category');

$args = array(
    'parent' => $term->term_id, 
    'hide_empty' => false,
    'orderby' => 'term_order'
);

$taxonomys = get_terms('media-category',$args);

//$taxonomyids = get_term_children($term->term_id, 'media-category' );
$count = 0;
print ' <div id="thumbnail-images">';
print '<h5>'.$pagetitle.'</h5>';
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
    $post_count = 1;
    print '<div class="item">';
    foreach ($posts_array as $post){

        $attachment_thumb = wp_get_attachment_thumb_url($post->ID);
        if($attachment_meta['width'] > $attachment_meta['height']) {
            $orientation = "landscape"; 
        } else {
            $orientation = "portrait";
        }
        print '<a><img id="thumbnailid-'.$post->ID.'" src="'.$attachment_thumb.'" alt="'.$post->post_title.'" class="image thumbnail"></a>';

        $post_count++;
    };
    print '</div>';
    $count++;
}
 print '</div>';
?>