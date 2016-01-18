<?php 

function randpass() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array();
    $alphaLength = strlen($alphabet) - 1;
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass);
}

function emailkey() {
	$random_password = randpass();
	$random_number = rand();
	$datetime = date("w-Y.d.m:t-H::i::s");
	$str = $datetime . $random_password . $random_number;
	return md5($str);

}
?>
