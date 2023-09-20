<?php
include("src/RtcTokenBuilder.php");

$appID = "77f7279ac852426ebbc6535834f81346";
$appCertificate = "38593720f1b94029a9009ea66d2a62a1";
$channelName = $_GET['channelName'];
$uid = rand(10000,99999);
$uidStr = (string)$uid;
$role = RtcTokenBuilder::RoleAttendee;
$expireTimeInSeconds = 600;
$currentTimestamp = (new DateTime("now", new DateTimeZone('UTC')))->getTimestamp();
$privilegeExpiredTs = $currentTimestamp + $expireTimeInSeconds;

$token_uid = RtcTokenBuilder::buildTokenWithUid($appID, $appCertificate, $channelName, $uid, $role, $privilegeExpiredTs);

$token_acc = RtcTokenBuilder::buildTokenWithUserAccount($appID, $appCertificate, $channelName, $uidStr, $role, $privilegeExpiredTs);

$token = array(
	'uid' => $uid,
	'token_with_uid' => $token_uid,
	'token_with_user_account' => $token_acc,
);
echo json_encode($token);