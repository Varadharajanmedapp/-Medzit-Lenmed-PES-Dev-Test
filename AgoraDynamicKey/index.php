<?php
include("src/AccessToken2.php");

$appID = "77f7279ac852426ebbc6535834f81346";
$appCertificate = "38593720f1b94029a9009ea66d2a62a1";
$channelName = $_GET['channelName'];
// $channelName = "7d72365eb983485397e3e3f9d460bdda";
$uid = rand(10000,99999);

// $uidStr = "2882341273";
$expireTimeInSeconds = 600;

// $token = RtmTokenBuilder::buildToken($appID, $appCertificate, $user, $role, $privilegeExpiredTs);
$accessToken = new AccessToken2($appID, $appCertificate, $expireTimeInSeconds);

// grant rtc privileges
$serviceRtc = new ServiceRtc($channelName, $uid);
$serviceRtc->addPrivilege($serviceRtc::PRIVILEGE_JOIN_CHANNEL, $expireTimeInSeconds);
$accessToken->addService($serviceRtc);

// grant rtm privileges
// $serviceRtm = new ServiceRtm($uidStr);
// $serviceRtm->addPrivilege($serviceRtm::PRIVILEGE_LOGIN, $expireTimeInSeconds);
// $accessToken->addService($serviceRtm);

// grant chat privileges
// $serviceChat = new ServiceChat($uidStr);
// $serviceChat->addPrivilege($serviceChat::PRIVILEGE_USER, $expireTimeInSeconds);
// $accessToken->addService($serviceChat);

$token = array('uid' => $uid,'token' => $accessToken->build());
echo json_encode($token);