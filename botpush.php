<?php



require "vendor/autoload.php";

$access_token = 'HxIzkqvwztsi0nd2P4n11oQeXrPyB99Qz5/PNQ79U2GlB0856crrxtW8kRuED2Srml0pci4pIZQ2TDR2YfAhD8tlp5P7wdIUgeSnRSqV0mho11Az0HYMHnrbxsLMocmPQTzcaLTn7ZZ14BgTBYuddQdB04t89/1O/w1cDnyilFU=';

$channelSecret = 'd2b99b3718e1ea7ca69f829cab4eea15';

$pushID = 'Ua5a6ee4cde4a261ef472846e2a644130';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
