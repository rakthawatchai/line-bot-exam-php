<?php

require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');

$access_token = 'HxIzkqvwztsi0nd2P4n11oQeXrPyB99Qz5/PNQ79U2GlB0856crrxtW8kRuED2Srml0pci4pIZQ2TDR2YfAhD8tlp5P7wdIUgeSnRSqV0mho11Az0HYMHnrbxsLMocmPQTzcaLTn7ZZ14BgTBYuddQdB04t89/1O/w1cDnyilFU=';

$channelSecret = 'd2b99b3718e1ea7ca69f829cab4eea15';
$Arr_userIds = array();
$arr_message = array();
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);
$Arr_userIds = ['Ua5a6ee4cde4a261ef472846e2a644130', 'Uae7c8f2625f6f2f2d7ca189d151ef097'];

$bot->multicast($Arr_userIds,new TextMessageBuilder("test text") );
