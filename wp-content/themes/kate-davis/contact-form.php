<div id="contact">
    <div id="error">
    <?php

    if (sizeof($errorarray) > 0) {
        print '<ul>';
        foreach($errorarray as $error){
            print '<li>'.$error.'</li>';
        }
        print '</ul>';
    }    

    ?>
    </div>
    <div class="form">
        <form action="#" method="post">
            <label>Email address</label>
            <input type="text" name="email" id="email" value="<?php print $_POST['email']?>">
            <br/><br/>
            <label> Message </label>
            <textarea name="message" id="message" cols="30" rows="4"><?php print $_POST['message']?></textarea>
            <br/><br/>
            <input type="checkbox" id="sendcopy" name="sendcopy" <?php echo (isset($_POST['sendcopy'])?'checked="checked"':'') ?>>
            <label style="margin-bottom:0px;" for="sendcopy"><span></span>Please send a copy to my email address</label>
            <br/>
            <p></p>
            <input type="checkbox" id="updates" name="updates" <?php echo (isset($_POST['updates'])?'checked="checked"':'') ?>>
            <label for="updates"><span></span>Please sign me up for updates</label>
            <input type="hidden" id="submit" name="submit">
            <input type="submit" value="SUBMIT" />
        </form>
        <div class="details">
            <span style="float:left; border-right: 1px solid #aaaaaa;"> <a href="mailto:kate@katedavis.co.uk"> kate@katedavis.co.uk </a> </span>
            <span style="float:right; text-align: right;"> <a href="tel:+44 (0)777 9537 037"> +44 (0)777 9537 037</a> </span>     
        </div>
    </div>  
</div>