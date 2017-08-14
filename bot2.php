<?php
 
$strAccessToken = "6UB4djtvkbO+5TDTdUtP+2CtLFpf8ZQflBLAV3ZT8H8PkXDqmNk1PLltrfhtf2gW2l/QqtB+eRuJOpV3kslPa0HEZLvQAn7FvOQQ1UfQ+eIE756qNrfUUqHSxfpm5tVnzYsA8nGrXcrfl1aPjLRANgdB04t89/1O/w1cDnyilFU=";
 
$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);
 
$strUrl = "https://api.line.me/v2/bot/message/reply";
 
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
 
if($arrJson['events'][0]['message']['text'] == "สวัสดี"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "สวัสดี ID คุณคือ ".$arrJson['events'][0]['source']['userId'];
}else if($arrJson['events'][0]['message']['text'] == "ชื่ออะไร"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ฉันยังไม่มีชื่อนะ";
}else if($arrJson['events'][0]['message']['text'] == "ทำอะไรได้บ้าง"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ฉันทำอะไรไม่ได้เลย คุณต้องสอนฉันอีกเยอะ";
}else if(substr($arrJson['events'][0]['message']['text'],0,3) == "reg"){
  $ch = curl_init('http://www.d-mtonline.com/shop/line/register_line.php?cid='.substr($arrJson['events'][0]['message']['text'],4).'&id='.$arrJson['events'][0]['source']['userId']);
  //$param = '&id=
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, '');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $result = curl_exec($ch);
 
  //$message='http://www.d-mtonline.com/shop/line/register_line.php?cid='.substr($arrJson['events'][0]['message']['text'],4).'&id='.$arrJson['events'][0]['source']['userId'];
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = $result;
}else if($arrJson['events'][0]['message']['text'] == "verify"){
  $ch = curl_init('http://www.d-mtonline.com/shop/line/register_line_test.php?id='.$arrJson['events'][0]['source']['userId']);
  //$param = '&id=
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, '');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $result = curl_exec($ch);
 
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = $result;
}else if(($arrJson['events'][0]['message']['text'] == "expired") or ($arrJson['events'][0]['message']['text'] == "วันหมดอายุ")){
  $ch = curl_init('http://www.d-mtonline.com/shop/line/register_line_command.php?id='.$arrJson['events'][0]['source']['userId'].'&cmd=expired');
  //$param = '&id=
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, '');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $result = curl_exec($ch);
 
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = $result;
}else if(($arrJson['events'][0]['message']['text'] == "point") or ($arrJson['events'][0]['message']['text'] == "คะแนน")){
  $ch = curl_init('http://www.d-mtonline.com/shop/line/register_line_command.php?id='.$arrJson['events'][0]['source']['userId']."&cmd=mypoint");
  //$param = '&id=
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, '');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $result = curl_exec($ch);
 
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = $result;
}else if(($arrJson['events'][0]['message']['text'] == "trainer") or ($arrJson['events'][0]['message']['text'] == "เทรน")){
  $ch = curl_init('http://www.d-mtonline.com/shop/line/register_line_command.php?id='.$arrJson['events'][0]['source']['userId']."&cmd=trainer");
  //$param = '&id=
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, '');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $result = curl_exec($ch);
 
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = $result;
}else if(($arrJson['events'][0]['message']['text'] == "help")){
  $message = "วิธีการใช้งานมีคำสั่งดังนี้ \r\n".
  "- reg [รหัสบัตร] ใช้ในการลงทะเบียนเพื่อผูก Line กับ ID บัตรของสมาชิก\r\n".
  "เช่น reg 5215326548 \r\n".
  "- verify ใช้ตรวจสอบการผูก Line กับระบบว่าสำเสร็จหรือไม่\r\n".
  "- expired ใช้ในการตรวจสอบวันหมดอายุสมาชิก\r\n".
  "- trainer ใช้ในการตรวจสอบจำนวนครั้งเทรนเนอร์\r\n".
  "- point ใช้ในการตรวจสอบคะแนนของสมาชิก\r\n";
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = $message;
}else{
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ฉันไม่เข้าใจคำสั่ง พิมพ์ help เพื่อดูคำสั่งในการใช้งาน";
}
 
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$strUrl);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close ($ch);
 
?>
