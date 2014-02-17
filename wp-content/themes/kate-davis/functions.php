<?php

add_theme_support('menus');

function formValidation() {
	$errorarray = array();
	
	if($_POST['email'] == "") {
		$errorarray[] = "Please enter an email address";
	} elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$errorarray[] = "Please enter a valid email address";
	}

	if($_POST['message'] == "") {
		$errorarray[] = "Please enter a message";
	}

	if(sizeof($errorarray) == 0){
		emailData();
	} 
	
	return $errorarray;
}

function emailData() {
	if ($_POST['sendcopy'] == 1){
		$to = 'kate@katedavis.co.uk,'.$_POST['email'];
	} else {
		$to = 'kate@katedavis.co.uk';
	}
	
	$subject = 'Website query';
	$message = 'Email: '.$_POST['email']." Message: ".$_POST['message']." Updates: ".$_POST['updates'];
	$headers = 'From: kate@katedavis.co.uk';

	mail($to, $subject, $message, $headers);
}

function array_flatten($array) { 
  if (!is_array($array)) { 
    return FALSE; 
  } 
  $result = array(); 
  foreach ($array as $key => $value) { 
    if (is_array($value)) { 
      $result = array_merge($result, array_flatten($value)); 
    } 
    else { 
      $result[$key] = $value; 
    } 
  } 
  return $result; 
}

?>