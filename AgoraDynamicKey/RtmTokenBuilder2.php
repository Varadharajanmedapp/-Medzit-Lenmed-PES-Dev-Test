<?php
include("src/RtmTokenBuilder2.php");

$appId = "77f7279ac852426ebbc6535834f81346";
$appCertificate = "38593720f1b94029a9009ea66d2a62a1";
$user = rand(10000,99999);
$expireTimeInSeconds = 600;

$token = RtmTokenBuilder2::buildToken($appId, $appCertificate, $user, $expireTimeInSeconds);
$token = array(
	'user' => $user,
	'token_with_user' => $token
);
echo json_encode($token);