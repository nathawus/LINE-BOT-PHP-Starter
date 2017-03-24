<?php
$access_token = 'GNMS5kI1t4EI5v38BelJH2jWZ30b85lNboGGphuVBfI4AEs51XskU89OIjOOXnqEZVLtfRJxnwapjE5yC0mYrV5++KLsdGTimEuNaLaRj1sfva+NILgqK84Mi4KYK6Tmo7ZZ2QFT/1gChuT61wrbMAdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
