<?php
session_start();
function randomText($length){
	$pattern = "123456789qwertyuiopñlkjhgfdsazxcvbnm";
	$key = '';
	for($i=0;$i<$length;$i++){
		$key .=  $pattern{rand(0,35)};
	}
	return $key;
}

$_SESSION['tmptxt'] = randomText(5);
$captcha = imagecreatefromgif("bgcaptcha.gif");
$colText = imagecolorallocate($captcha, 0, 0, 0);
imagestring($captcha, 5, 16, 7, $_SESSION['tmptxt'], $colText);
header ("Content-type: image/gif");
imagegif($captcha);
imagedestroy($captcha);

?>