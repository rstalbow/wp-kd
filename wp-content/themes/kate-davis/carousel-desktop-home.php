<script type="text/javascript">
$(document).ready(function() {  
    imageResize();

    $(window).resize(function() {
        imageResize();  
    });
});
</script>

<?php

$category = "Home";

$images = array();
$term = get_term_by('name', $category, 'media-category');

$args = array(
    'parent' => $term->term_id,
    'hide_empty' => false,
    'orderby' => 'term_order'
);

$taxonomys = get_terms('media-category',$args);

$slidecount = count($taxonomys);
//$taxonomyids = get_term_children($term->term_id, 'media-category' );

$count = 0;
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
    $categoryname = $taxonomy->name;
    $posts_array = get_posts($args);
    $post_count = 1;
    print '<div class="item'; if ($count == 0) {print' active';} 
    print '">';
    $twoimages = "";
    if (count($posts_array) > 1){ 
        $twoimages = "twoimages";
    }
    foreach ($posts_array as $post){

        $attachment_meta = wp_get_attachment_metadata($post->ID);
        $imagename = $post->post_title;
        if($attachment_meta['width'] > $attachment_meta['height']) {
            $orientation = "landscape"; 
        } else {
            $orientation = "portrait";
        }
        print '<img id="carouselid-'.$post->ID.'" src="'.$post->guid.'" alt="'.$post->post_title.'" class="'.$orientation." ".$twoimages.'">';
        
        $post_count++;
    };
    $count++;
    print '<div class="image-count">'.$count.' <span class="of">OF</span> <span id="image-total">'.$slidecount.'</span></div>';
    if ($showtitle == true){
        print '<div class="image-name"><span id="picture-name">'.$categoryname.'</span></div>';
    }
    print '</div>';
    
}
    
?>