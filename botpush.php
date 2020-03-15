<?php



require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');

$access_token = 'HxIzkqvwztsi0nd2P4n11oQeXrPyB99Qz5/PNQ79U2GlB0856crrxtW8kRuED2Srml0pci4pIZQ2TDR2YfAhD8tlp5P7wdIUgeSnRSqV0mho11Az0HYMHnrbxsLMocmPQTzcaLTn7ZZ14BgTBYuddQdB04t89/1O/w1cDnyilFU=';

$channelSecret = 'd2b99b3718e1ea7ca69f829cab4eea15';

// array id ของ user ที่ได้จาก webhook.php เพื่อยิง pushMessage ไปหาแต่ละเครื่อง
$arr_userID = ['Ua5a6ee4cde4a261ef472846e2a644130', 'Uae7c8f2625f6f2f2d7ca189d151ef097'];

for ($i=0; $i < count($arr_userID); $i++) {
  $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
  $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

  $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
  $response = $bot->pushMessage($arr_userID[$i], $textMessageBuilder);

  echo $response->getHTTPStatus() . ' ' . $response->getRawBody();

}
