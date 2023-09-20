<?php
include("src/RtcTokenBuilder2.php");

$appId = "77f7279ac852426ebbc6535834f81346";
$appCertificate = "38593720f1b94029a9009ea66d2a62a1";
$channelName = $_GET['channelName'];
$uid = rand(10000,99999);
$uidStr = (string)$uid;
$tokenExpirationInSeconds = 600;
$privilegeExpirationInSeconds = 600;

$token_uid = RtcTokenBuilder2::buildTokenWithUid($appId, $appCertificate, $channelName, $uid, RtcTokenBuilder2::ROLE_PUBLISHER, $tokenExpirationInSeconds, $privilegeExpirationInSeconds);

$token_acc = RtcTokenBuilder2::buildTokenWithUserAccount($appId, $appCertificate, $channelName, $uidStr, RtcTokenBuilder2::ROLE_PUBLISHER, $tokenExpirationInSeconds, $privilegeExpirationInSeconds);

$token_uid_privilege = RtcTokenBuilder2::buildTokenWithUidAndPrivilege($appId, $appCertificate, $channelName, $uid, $privilegeExpirationInSeconds, $privilegeExpirationInSeconds, $privilegeExpirationInSeconds, $privilegeExpirationInSeconds, $privilegeExpirationInSeconds);

$token_with_user_account_privilege = RtcTokenBuilder2::buildTokenWithUserAccountAndPrivilege($appId, $appCertificate, $channelName, $uidStr, $privilegeExpirationInSeconds, $privilegeExpirationInSeconds, $privilegeExpirationInSeconds, $privilegeExpirationInSeconds, $privilegeExpirationInSeconds);

$token = array(
	'uid' => $uid,
	'token_with_uid' => $token_uid,
	'token_with_user_account' => $token_acc,
	'token_with_uid_privilege' => $token_uid_privilege,
	'token_with_user_account_privilege' => $token_with_user_account_privilege,
);
echo json_encode($token);