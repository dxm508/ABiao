<?php 
$github_signa = $_SERVER['HTTP_X_HUB_SIGNATURE'];
list($hash_type, $hash_value) = explode('=', $github_signa, 2);
$payload = file_get_contents("php://input");$secret = '970508';$hash = hash_hmac($hash_type,$payload,$secret);if($hash && $hash === $hash_value)
{
	echo '认证成功，开始更新';
    echo exec("./github_pull.sh");

	echo date("Y-m-d H:i:s");
}