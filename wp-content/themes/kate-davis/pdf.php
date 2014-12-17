<?php
/*
Template Name: PDF
*/

get_header(); 

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
foreach ($taxonomys as $taxonomy) {  
    if ($taxonomy->name != "Home") {
        print '<br/><div id="thumbnail-images" class="pdf">';
        print '<h5>'.$taxonomy->name.'</h5>';  
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
        
        foreach ($posts_array as $post){
            print '<div class="item" id="thumbnailid-'.$post->ID.'">';
            $attachment_thumb = wp_get_attachment_thumb_url($post->ID);
            if($attachment_meta['width'] > $attachment_meta['height']) {
                $orientation = "landscape"; 
            } else {
                $orientation = "portrait";
            }
            print '<a><img src="'.$attachment_thumb.'" alt="'.$post->post_title.'" class="image thumbnail">
            <div id="overlay"></div></a>';

            $post_count++;
            print '</div>';
        };
        
        print '</div><br/>';
        $count++;
    }
}
?>

<div id="pdf-email">
    <div class="content">Select your favourite images and get and get them emailed to you</div>
    <button id="pdfbtn">Email</button> 
</div>

<div id="emailForm" style="display:none;">
    <div class="header">
        <h3>Email PDF</h3>
        <div class="close-thumbnails closeForm">
            <a href="#" class="close-thumbnails-link">
                <span> CLOSE WINDOW </span>
                <img src="<?php echo get_template_directory_uri(); ?>/images/close-btn.png" />
            </a>    
        </div>
    </div>
    <div class="form">
        <form method="post" action="<?php print get_site_url(); ?>/pdf-creator" id="pdfForm">
            <label for="toLabel">To</label>
            <input type="text" name="to" id="to" value="<?php print $_POST['to']?>">
            <br/>
            <label id="emailLabel" for="email">Email address</label>
            <input type="text" name="email" id="email" value="<?php print $_POST['email']?>">
            <br/>
            <label id="subjectLabel" for="subject">Subject</label>
            <input type="text" name="subject" id="subject" value="<?php print $_POST['subject']?>">
            <br/>
            <label id="subjectLabel" for="message"> Message </label>
            <textarea name="message" id="message"><?php print $_POST['message']?></textarea>
            <br/>
            <input type="submit" value="SEND" />
            <input type="hidden" id="imagesList" name="imagesList" value="" />
        </form>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {   

        var selectedImages = new Array();

        $('.item a').click(function() {
            $(this).children("div").toggleClass("overlay");
            $(this).toggleClass('selectedImage');
            $(this).parent().toggleClass('opacity');
            imageID = $(this).parent().attr('id');
            addOrRemove(selectedImages, imageID);
        });     

        $('#pdfbtn').click(function() {
            $("#emailForm").dialog({
                draggable: false,
                resizable: false,
                modal: true,
                width: 475
            });
        });

        $('.closeForm').click(function() {
            $("#emailForm").dialog("close");
        });

        $("#pdfForm").submit(function() {
            event.preventDefault();
            console.log(selectedImages);
            selectedImages.toString();
            $('#imagesList').val(selectedImages);
            validatePDFForm()
        });
   
    });        
</script>

<?php get_footer(); ?>