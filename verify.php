<?php
$access_token = '6UB4djtvkbO+5TDTdUtP+2CtLFpf8ZQflBLAV3ZT8H8PkXDqmNk1PLltrfhtf2gW2l/QqtB+eRuJOpV3kslPa0HEZLvQAn7FvOQQ1UfQ+eIE756qNrfUUqHSxfpm5tVnzYsA8nGrXcrfl1aPjLRANgdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
