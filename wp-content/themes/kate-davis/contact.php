<?php
/*
Template Name: Contact
*/
get_header(); 

$formsubmit = false;
$errorarray = array(); 

if (isset($_POST['submit'])) {
    $formsubmit = true;
    $errorarray = formValidation(); 
}

if ($formsubmit == false || sizeof($errorarray) > 0) {
    include('contact-form.php');
} else {
    include('thanks.php');
}

?>  

</div><!-- /.container -->

<?php get_footer(); ?>