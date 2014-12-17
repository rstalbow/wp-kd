<?php
/*
Template Name: PDF Creator
*/

get_header(); 

$pagetitle = get_the_title();
?>

<?php
ob_start();
ob_get_clean();
    $content = "
<page>
    <h1>Exemple d'utilisation</h1>
    <br>
    Ceci est un <b>exemple d'utilisation</b>
    de <a href='http://html2pdf.fr/'>HTML2PDF</a>.<br>
</page>";

    // convert in PDF
    require_once('pdf/html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'fr');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        ob_end_clean();
        $html2pdf->Output('pdf-output/exemple01.pdf', 'F');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }


?>


<?php get_footer(); ?>