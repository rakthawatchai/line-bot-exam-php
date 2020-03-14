<?php // callback.php

require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');

$access_token = 'HxIzkqvwztsi0nd2P4n11oQeXrPyB99Qz5/PNQ79U2GlB0856crrxtW8kRuED2Srml0pci4pIZQ2TDR2YfAhD8tlp5P7wdIUgeSnRSqV0mho11Az0HYMHnrbxsLMocmPQTzcaLTn7ZZ14BgTBYuddQdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['source']['userId'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = [
				//'type' => 'text',
				//'text' => $text
				'type' => 'image',
				'originalContentUrl' => 'https://s.isanook.com/fi/0/rp/rc/w165h99/ya0xa0m1w0/aHR0cHM6Ly9zLmlzYW5vb2suY29tL2ZpLzAvZnAvMjcyLzEzNjQzMDUvMV8xNTg0MDkyMTI3LmpwZw==.jpg',
    		'previewImageUrl' =>  'https://s.isanook.com/hi/0/rp/r/w728/ya0xa0m1w0/aHR0cHM6Ly9zLmlzYW5vb2suY29tL2hpLzAvdWQvMjk5LzE0OTY5NjUvMi5qcGc=.jpg'
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK";
