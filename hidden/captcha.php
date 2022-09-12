<?php
include("header1.php");

$permitted_chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ0123456789';
$string_length = 5;
$width = 200;
$height = 50;

function generate_string($input, $strength) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[random_int(0, $input_length - 1)];
        $random_string .= $random_character;
    }
  
    return $random_string;
}
 
$image = imagecreatetruecolor($width, $height);
imageantialias($image, true);
$colors = [];
$red = rand(125, 175);
$green = rand(125, 175);
$blue = rand(125, 175);
for($i = 0; $i < 5; $i++) {
  $colors[] = imagecolorallocate($image, $red - 20*$i, $green - 20*$i, $blue - 20*$i);
}
imagefill($image, 0, 0, $colors[0]);
 
for($i = 0; $i < 10; $i++) {
  imagesetthickness($image, rand(2, 10));
  $line_color = $colors[rand(1, 4)];
  imagerectangle($image, rand(0, $width), rand(-10, 10), rand(0, $width), rand(40, 60), $line_color);
}
$black = imagecolorallocate($image, 0, 0, 0);
$white = imagecolorallocate($image, 255, 255, 255);
$textcolors = [$black, $white, $blue];
$fonts = ['../fonts/arial.ttf', '../fonts/verdana.ttf', '../fonts/Acme.ttf', '../fonts/Alatsi.ttf', '../fonts/Baloo.ttf', '../fonts/Auber.ttf', '../fonts/BigShoulders.ttf'];
$captcha_string = generate_string($permitted_chars, $string_length);
$_SESSION['captcha_text'] = $captcha_string;
$letter_space = ($width-30)/$string_length;
$initial = 15;
for($i = 0; $i < $string_length; $i++) {
  imagettftext($image, 24, rand(-$initial, $initial), $initial + $i*$letter_space, rand(25, 45), $textcolors[rand(0, 2)], $fonts[array_rand($fonts)], $captcha_string[$i]);
}
imageline($image, 0, rand(0,$height), $width, rand(0,$height), $colors[rand(1,4)]);
imageline($image, 0, rand(0,$height), $width, rand(0,$height), $colors[rand(1,4)]);
 
header('Content-type: image/png');
imagepng($image);
imagedestroy($image);

