<?php
include("src/RtmTokenBuilder.php");

$appID = "77f7279ac852426ebbc6535834f81346";
$appCertificate = "38593720f1b94029a9009ea66d2a62a1";
$user = rand(10000,99999);
$role = RtmTokenBuilder::RoleRtmUser;
$expireTimeInSeconds = 600;
$currentTimestamp = (new DateTime("now", new DateTimeZone('UTC')))->getTimestamp();
$privilegeExpiredTs = $currentTimestamp + $expireTimeInSeconds;

$token = RtmTokenBuilder::buildToken($appID, $appCertificate, (string)$user, $role, $privilegeExpiredTs);

$token = array(
	'user' => $user,
	'token_with_user' => $token
);
echo json_encode($token);