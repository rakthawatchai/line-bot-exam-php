<?php


$access_token = 'HxIzkqvwztsi0nd2P4n11oQeXrPyB99Qz5/PNQ79U2GlB0856crrxtW8kRuED2Srml0pci4pIZQ2TDR2YfAhD8tlp5P7wdIUgeSnRSqV0mho11Az0HYMHnrbxsLMocmPQTzcaLTn7ZZ14BgTBYuddQdB04t89/1O/w1cDnyilFU=';

$userId = 'Ub06b3f2ec634f0d1ee5e754c98f9dbdc';

$url = 'https://api.line.me/v2/bot/profile/'.$userId;

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
