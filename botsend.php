<?php

// example: https://github.com/onlinetuts/line-bot-api/blob/master/php/example/chapter-02.php

include ('line-bot-api/php/line-bot.php');

$channelSecret = '54ab7ab9e5504eb59da33bf10c66d00c';
$access_token  = '6UB4djtvkbO+5TDTdUtP+2CtLFpf8ZQflBLAV3ZT8H8PkXDqmNk1PLltrfhtf2gW2l/QqtB+eRuJOpV3kslPa0HEZLvQAn7FvOQQ1UfQ+eIE756qNrfUUqHSxfpm5tVnzYsA8nGrXcrfl1aPjLRANgdB04t89/1O/w1cDnyilFU=';

$bot = new BOT_API($channelSecret, $access_token);
	
$bot->sendMessageNew('u81238bdd1dbb0bdc9613508eadb6c690', 'Hello World !!');

if ($bot->isSuccess()) {
	echo 'Succeeded!';
	exit();
}

// Failed
echo $bot->response->getHTTPStatus . ' ' . $bot->response->getRawBody(); 
exit();
