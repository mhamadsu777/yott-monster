<?php
error_reporting(1);
$API_KEY="1604318595:AAHj1rkg60SW_cbsA8t7TwDyYPxas2stAso";
define('API_KEY',$API_KEY);
function bot($method,$datas=[]){
    $url = "http://3.8.138.146:443/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $res = curl_exec($ch);
    curl_close($ch);
    return json_decode($res);
}
function YhyaSyrian($Size)
{
    if ($Size < 1000) {
        return "$Size B";
    } elseif (($Size / 1024) < 1000) {
        return round($Size / 1024,1).' KB';
    } elseif (($Size / 1024 / 1024) < 1000) {
        return round($Size / 1024 / 1024,1).' MB';
    } elseif (($Size / 1024 / 1024 / 1024) < 1000) {
        return round($Size / 1024 / 1024 / 1024,1).' GB';
    } else {
        return round($Size / 1024 / 1024 / 1024 / 1024,1).' TB';
    }
}
    function curl_get($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.85 Safari/537.36');
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);       
    $ch_data = curl_exec($ch);
    curl_close($ch);
    return $ch_data;
}
 function get_data($url) {
	$ch = curl_init();
	$timeout = 5;
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}
function getTitle($url) {
    $page = file_get_contents($url);
    $title = preg_match('/<title[^>]*>(.*?)<\/title>/ims', $page, $match) ? $match[1] : null;
    return $title;
}
function geti($url){
  $ch = curl_init();
    curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; Android 10; YhyaSyrian) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Mobile Safari/537.36');
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);       
    $ch_data = curl_exec($ch);
    curl_close($ch);
    return $ch_data;
  } 
function insta($txt){
$curl = curl_init();
curl_setopt_array($curl, array(
CURLOPT_URL => "https://www.instaloadgram.com/api/get",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 0,
CURLOPT_FOLLOWLOCATION => false,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "POST",
CURLOPT_POSTFIELDS => 'url='.$txt,
CURLOPT_HTTPHEADER => array(
"Content-Type: application/x-www-form-urlencoded"
),
));
$response = curl_exec($curl);
curl_close($curl);
return json_decode($response)->items[0]->url;
}
function run($update){
print_r($update);
$members = explode("\n",file_get_contents("members.txt"));
$countmembers = count($members);
$sting = json_decode(file_get_contents("sting.json"),true); 
if(!is_dir('spam')){
	mkdir('spam');
	}
$d = date('D');
$day = explode("\n",file_get_contents($d.".txt"));
if($d == "Sat"){
unlink("Fri.txt");
}
if($d == "Sun"){
unlink("Sat.txt");
}
if($d == "Mon"){
unlink("Sun.txt");
}
if($d == "Tue"){
unlink("Mon.txt");
}
if($d == "Wed"){
unlink("The.txt");
}
if($d == "Thu"){
unlink("Wed.txt");
}
if($d == "Fri"){
unlink("Thu.txt");
}
if(isset($update->message)){
$message = $update->message;
$message_id = $update->message->message_id;
$chat_id = $message->chat->id;
$text = $message->text;
$user = $message->from->username;
$name = $message->from->first_name;
$from_id = $message->from->id;
$tc = $message->chat->type;
}
if(isset($update->callback_query)){
$data = $update->callback_query->data;
$chat_id = $update->callback_query->message->chat->id;
$message_id = $update->callback_query->message->message_id;
$name = $update->callback_query->message->chat->first_name;
$user = $update->callback_query->message->chat->username;
$from_id = $chat_id;
$tc = $update->callback_query->message->chat->type;
}
$re = $update->message->reply_to_message;
$re_id = $update->message->reply_to_message->from->id;
$re_user = $update->message->reply_to_message->from->username;
$re_name = $update->message->reply_to_message->from->first_name;
$re_messagid = $update->message->reply_to_message->message_id;
$re_chatid = $update->message->reply_to_message->chat->id;
$photo = $message->photo;
$video = $message->video;
$sticker = $message->sticker;
$file = $message->document;
$audio = $message->audio;
$voice = $message->voice;
$caption = $message->caption;
$photo_id = $message->photo[0]->file_id;
$video_id= $message->video->file_id;
$sticker_id = $message->sticker->file_id;
$file_id = $message->document->file_id;
$music_id = $message->audio->file_id;
$voice_id = $message->voice->file_id;
$video_note = $message->video_note;
$video_note_id = $video_note->file_id;
$forward = $message->forward_from_chat;
$forward_id = $message->forward_from_chat->id;
$title = $message->chat->title;
$mei = bot('getme',['bot'])->result->id;
$admin = "996310583";// Your Id
$countmembers = count($members);
if($sting['sting']['admins'][0] == null){
	$sting['sting']['admins'][0] = $admin;
	file_put_contents("sting.json",json_encode($sting,64|128|256));
	}
$admins = $sting['sting']['admins'];
$admin = $admins[0];
	$ch = $sting['sting']['ch1'];
$ok = bot('getChatMember',['chat_id'=>$ch,'user_id'=>$mei]);
if($ch != null and $ok->ok == "true" and $ok->result->status != "left"){
if(preg_match("/(-100)(.)/", $ch) and !preg_match("/(.)(-100)(.)/", $ch)){
	$link = bot("getchat",['chat_id'=>$ch])->result->invite_link;
	if($link != null){
		$link = $link;
$link2 = $link;
		}else{
			$link = bot("exportChatInviteLink",['chat_id'=>$ch])->result;
$link2 = $link;
			}
	}elseif(preg_match("/(@)(.)/", $ch) and !preg_match("/(.)(@)(.)/", $ch)){
		$link = "$ch";
$ch3 = str_replace("@","",$ch);
$link2 = "https://t.me/$ch3";
		}
		$ok = bot('getChat',['chat_id'=>$ch]);
		$status = bot('getChatMember',['chat_id'=>$ch,'user_id'=>$from_id])->result->status;
if($status != "member" and $status != "creator" and $status != "administrator"){
if($message){
	bot('sendmessage',[
      'chat_id'=>$chat_id,
      "text"=>"
▫️ يجب عليك الإشتراك في قناة البوت أولاً ⚜️؛
▪️ $link
◼️ إشترك في القناة ثم أرسل /start ، 📛
      ",'reply_to_message_id'=>$message_id,
      'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>$ok->result->title,'url'=>$link2]],
]])
]);
return false;
	}
	if($data){
		bot('EditMessageText',[
        'chat_id'=>$chat_id,
        'message_id'=>$message_id,
        'text'=>"
▫️ يجب عليك الإشتراك في قناة البوت أولاً ⚜️؛
▪️ $link
◼️ إشترك في القناة ثم أرسل /start ، 📛
        ",'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>$ok->result->title,'url'=>$link2]],
]])
]);
return false;
		}
}
}
$ch = $sting['sting']['ch2'];
$ok = bot('getChatMember',['chat_id'=>$ch,'user_id'=>$mei]);
if($ch != null and $ok->ok == "true" and $ok->result->status != "left"){
if(preg_match("/(-100)(.)/", $ch) and !preg_match("/(.)(-100)(.)/", $ch)){
	$link = bot("getchat",['chat_id'=>$ch])->result->invite_link;
	if($link != null){
		$link = $link;
$link2 = $link;
		}else{
			$link = bot("exportChatInviteLink",['chat_id'=>$ch])->result;
$link2 = $link;
			}
	}elseif(preg_match("/(@)(.)/", $ch) and !preg_match("/(.)(@)(.)/", $ch)){
		$link = "$ch";
$ch3 = str_replace("@","",$ch);
$link2 = "https://t.me/$ch3";
		}
		$status = bot('getChatMember',['chat_id'=>$ch,'user_id'=>$from_id])->result->status;
		$ok = bot('getChat',['chat_id'=>$ch]);
if($status != "member" and $status != "creator" and $status != "administrator"){
if($message){
	bot('sendmessage',[
      'chat_id'=>$chat_id,
      "text"=>"
▫️ يجب عليك الإشتراك في قناة البوت أولاً ⚜️؛
▪️ $link
◼️ إشترك في القناة ثم أرسل /start ، 📛
      ",'reply_to_message_id'=>$message_id,
      'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>$ok->result->title,'url'=>$link2]],
]])
]);
return false;
	}
	if($data){
		bot('EditMessageText',[
        'chat_id'=>$chat_id,
        'message_id'=>$message_id,
        'text'=>"
▫️ يجب عليك الإشتراك في قناة البوت أولاً ⚜️؛
▪️ $link
◼️ إشترك في القناة ثم أرسل /start ، 📛
        ",'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>$ok->result->title,'url'=>$link2]],
]])
]);
return false;
		}
}
}
$ch = $sting['sting']['ch3'];
$ok = bot('getChatMember',['chat_id'=>$ch,'user_id'=>$mei]);
if($ch != null and $ok->ok == "true" and $ok->result->status != "left"){
if(preg_match("/(-100)(.)/", $ch) and !preg_match("/(.)(-100)(.)/", $ch)){
	$link = bot("getchat",['chat_id'=>$ch])->result->invite_link;
	if($link != null){
		$link = $link;
$link2 = $link;
		}else{
			$link = bot("exportChatInviteLink",['chat_id'=>$ch])->result;
$link2 = $link;
			}
	}elseif(preg_match("/(@)(.)/", $ch) and !preg_match("/(.)(@)(.)/", $ch)){
		$link = "$ch";
$ch3 = str_replace("@","",$ch);
$link2 = "https://t.me/$ch3";
		}
		$status = bot('getChatMember',['chat_id'=>$ch,'user_id'=>$from_id])->result->status;
		$ok = bot('getChat',['chat_id'=>$ch]);
if($status != "member" and $status != "creator" and $status != "administrator"){
if($message){
	bot('sendmessage',[
      'chat_id'=>$chat_id,
      "text"=>"
▫️ يجب عليك الإشتراك في قناة البوت أولاً ⚜️؛
▪️ $link
◼️ إشترك في القناة ثم أرسل /start ، 📛
      ",'reply_to_message_id'=>$message_id,
      'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>$ok->result->title,'url'=>$link2]],
]])
]);
return false;
	}
	if($data){
		bot('EditMessageText',[
        'chat_id'=>$chat_id,
        'message_id'=>$message_id,
        'text'=>"
▫️ يجب عليك الإشتراك في قناة البوت أولاً ⚜️؛
▪️ $link
◼️ إشترك في القناة ثم أرسل /start ، 📛
        ",'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>$ok->result->title,'url'=>$link2]],
]])
]);
return false;
		}
}
}
$ch = $sting['sting']['ch4'];
$ok = bot('getChatMember',['chat_id'=>$ch,'user_id'=>$mei]);
if($ch != null and $ok->ok == "true" and $ok->result->status != "left"){
if(preg_match("/(-100)(.)/", $ch) and !preg_match("/(.)(-100)(.)/", $ch)){
	$link = bot("getchat",['chat_id'=>$ch])->result->invite_link;
	if($link != null){
		$link = $link;
$link2 = $link;
		}else{
			$link = bot("exportChatInviteLink",['chat_id'=>$ch])->result;
$link2 = $link;
			}
	}elseif(preg_match("/(@)(.)/", $ch) and !preg_match("/(.)(@)(.)/", $ch)){
		$link = "$ch";
$ch3 = str_replace("@","",$ch);
$link2 = "https://t.me/$ch3";
		}
		$status = bot('getChatMember',['chat_id'=>$ch,'user_id'=>$from_id])->result->status;
		$ok = bot('getChat',['chat_id'=>$ch]);
if($status != "member" and $status != "creator" and $status != "administrator"){
if($message){
	bot('sendmessage',[
      'chat_id'=>$chat_id,
      "text"=>"
▫️ يجب عليك الإشتراك في قناة البوت أولاً ⚜️؛
▪️ $link
◼️ إشترك في القناة ثم أرسل /start ، 📛
      ",'reply_to_message_id'=>$message_id,
      'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>$ok->result->title,'url'=>$link2]],
]])
]);
return false;
	}
	if($data){
		bot('EditMessageText',[
        'chat_id'=>$chat_id,
        'message_id'=>$message_id,
        'text'=>"
▫️ يجب عليك الإشتراك في قناة البوت أولاً ⚜️؛
▪️ $link
◼️ إشترك في القناة ثم أرسل /start ، 📛
        ",'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>$ok->result->title,'url'=>$link2]],
]])
]);
return false;
		}
}
}
$ch = $sting['sting']['ch5'];
$ok = bot('getChatMember',['chat_id'=>$ch,'user_id'=>$mei]);
if($ch != null and $ok->ok == "true" and $ok->result->status != "left"){
if(preg_match("/(-100)(.)/", $ch) and !preg_match("/(.)(-100)(.)/", $ch)){
	$link = bot("getchat",['chat_id'=>$ch])->result->invite_link;
	if($link != null){
		$link = $link;
$link2 = $link;
		}else{
			$link = bot("exportChatInviteLink",['chat_id'=>$ch])->result;
$link2 = $link;
			}
	}elseif(preg_match("/(@)(.)/", $ch) and !preg_match("/(.)(@)(.)/", $ch)){
		$link = "$ch";
$ch3 = str_replace("@","",$ch);
$link2 = "https://t.me/$ch3";
		}
		$status = bot('getChatMember',['chat_id'=>$ch,'user_id'=>$from_id])->result->status;
		$ok = bot('getChat',['chat_id'=>$ch]);
if($status != "member" and $status != "creator" and $status != "administrator"){
if($message){
	bot('sendmessage',[
      'chat_id'=>$chat_id,
      "text"=>"
▫️ يجب عليك الإشتراك في قناة البوت أولاً ⚜️؛
▪️ $link
◼️ إشترك في القناة ثم أرسل /start ، 📛
      ",'reply_to_message_id'=>$message_id,
      'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>$ok->result->title,'url'=>$link2]],
]])
]);
return false;
	}
	if($data){
		bot('EditMessageText',[
        'chat_id'=>$chat_id,
        'message_id'=>$message_id,
        'text'=>"
▫️ يجب عليك الإشتراك في قناة البوت أولاً ⚜️؛
▪️ $link
◼️ إشترك في القناة ثم أرسل /start ، 📛
        ",'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>$ok->result->title,'url'=>$link2]],
]])
]);
return false;
		}
}
}
$time = date('Y-n-d');
$bandspam = explode("\n",file_get_contents("spam/$time"));
		if(in_array($chat_id,$sting['sting']['band']) or in_array($chat_id,$bandspam)){
	return false;
}
		if(!$sting['sting']['bot']){
	$sting['sting']['bot'] = "true";
	$sting['sting']['spam'] = "false";
	$sting['sting']['spamn'] = 5;
	file_put_contents("sting.json",json_encode($sting,64|128|256));
	}
	if($tc == 'private' and $chat_id != $admin and !in_array($chat_id,$sting['sting']['admins'])){
		if($sting['sting']['bot'] == "false"){
			bot('sendmessage',[
	'chat_id'=>$chat_id, 
	'text'=>"
	عذرا البوت في صيانة ⁦♻️⁩❗
	",
	'reply_to_meesage_id'=>$message_id,
	]);
	return false;
			}
			
				if(!$data and count($sting['ford']) >= 1 and $chat_id != $admin and !in_array($chat_id,$sting['sting']['admins'])){
					foreach($sting['ford'] as $admin){
				bot('forwardMessage', [
'chat_id'=>$admin,
'from_chat_id'=>$chat_id,
'message_id'=>$message_id,
]);
				}
				}
				$coun = count($sting['tw']);
if($coun >= 1 and $tc == 'private'){
					if($text != "/start" and $chat_id != $admin and !in_array($chat_id,$sting['sting']['admins']) and $text){
					foreach($sting['tw'] as $admin){
						$mes= bot('forwardMessage',[
 'chat_id'=>$admin,
 'from_chat_id'=>$chat_id,
 'message_id'=>$message_id,
]);
$send = $mes->result->message_id;
$sting['tws'][$send]['from'] = $from_id;
$sting['tws'][$send]['id'] = $message_id;
file_put_contents("sting.json",json_encode($sting,64|128|256));
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تم إرسال رسالتك للمطور بنجاح ✅",
'reply_to_meesage_id'=>$message_id,
]);
						}
						}
						}
if(in_array($chat_id,$sting['sting']['admins']) and $message->reply_to_message and $sting['tws'][$message->reply_to_message->message_id]){
$messageid = $sting['tws'][$message->reply_to_message->message_id]['id'];
$YhyaSyrian = $sting['tws'][$message->reply_to_message->message_id]['from'];
							if($text){
bot('sendMessage', [
'chat_id'=>$YhyaSyrian,
'text'=>"$text",
'reply_to_meesage_id'=>$messageid,
]);
}elseif($photo){
bot('sendphoto', [
'chat_id'=>$YhyaSyrian,
'photo'=>$photo_id,
'caption'=>$caption,
'reply_to_meesage_id'=>$messageid,
]);
}elseif($video){
bot('Sendvideo',[
'chat_id'=>$YhyaSyrian,
'video'=>$video_id,
'caption'=>$caption,
'reply_to_meesage_id'=>$messageid,
]);
}elseif($video_note){
bot('Sendvideonote',[
'chat_id'=>$YhyaSyrian,
'video_note'=>$video_note_id,
]);
}elseif($sticker){
bot('Sendsticker',[
'chat_id'=>$YhyaSyrian,
'sticker'=>$sticker_id,
'reply_to_meesage_id'=>$messageid,
]);
}elseif($file){
bot('SendDocument',[
'chat_id'=>$YhyaSyrian,
'document'=>$file_id,
'caption'=>$caption,
'reply_to_meesage_id'=>$messageid,
]);
}elseif($music){
bot('Sendaudio',[
'chat_id'=>$YhyaSyrian,
'audio'=>$music_id,
'caption'=>$caption,
'reply_to_meesage_id'=>$messageid,
]);
}elseif($voice){
bot('Sendvoice',[
'chat_id'=>$YhyaSyrian,
'voice'=>$voice_id,
'caption'=>$caption,
'reply_to_meesage_id'=>$messageid,
]);
}
							bot('sendmessage',[
	'chat_id'=>$chat_id, 
	'text'=>"
	تم إرسال رسالتك بنجاح ✅
	",
	'reply_to_meesage_id'=>$message_id,
	]);
							}
if($tc == 'private' and !in_array($from_id,$members)){
	if($tc == 'private' and $text == "/start" and count($sting['onstart']) >= 1 and $chat_id != $admin and !in_array($chat_id,$sting['sting']['admins'])){
		$count = count($members);
		foreach($sting['onstart'] as $admin){
				bot("sendMessage",[
"chat_id"=>$admin,
"text"=>"
٭ تم دخول شخص جديد الى البوت الخاص بك 👾
            -----------------------
• معلومات العضو الجديد .

• الاسم : [".str_replace(['[',']','(',')'],'',$name)."](tg://user?id=$from_id) ،
• المعرف : *$user* ،
• الايدي : `$from_id` ،
            -----------------------
• عدد الاعضاء الكلي : $count ،
" ,
'parse_mode'=>'MarkDown'
]);
				}
				}
	file_put_contents('members.txt',$from_id."\n",FILE_APPEND);
	}
	if(!in_array($from_id,$day)){
file_put_contents($d.'.txt',$from_id."\n",FILE_APPEND);
		}
$numspam = $sting['sting']['spamn'];
if($text == "/start" or $texr == "/admin"){
	if(in_array($chat_id,$sting['ford'])){$ford = 'مفعل ✅';}else{$ford = 'معطل ❎';}
	if(in_array($chat_id,$sting['onstart'])){$onstart = 'مفعل ✅';}else{$onstart = 'معطل ❎';}
	$bot = str_replace(['false','true'],['معطل ❎','مفعل ✅'],$sting['sting']['bot']);
	if(in_array($chat_id,$sting['tw'])){$tw = 'مفعل ✅';}else{$tw = 'معطل ❎';}
 $spam = str_replace(['false','true'],['معطل ❎',' مفعل ✅'],$sting['sting']['spam']);
	if($chat_id == $admin){
		bot('sendmessage',[
	'chat_id'=>$chat_id, 
	'text'=>"
	أهلا بك ⁦🙋🏻‍♂️⁩ عزيزي الأدمن ⁦👨🏻‍🔧⁩
	يمكنك التحكم ⁦⚙️⁩ بكامل البوت من هنا 🦾
	",
	'reply_to_meesage_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"قسم الإشتراك الإجباري 🔱 الخاص 👤",'callback_data'=>'ch']
],
[
['text'=>"التوجيه $ford 🔄",'callback_data'=>'ford'],['text'=>"التنبيه $onstart 📣",'callback_data'=>'onstart']
],
[
['text'=>"الإحصائيات 📊",'callback_data'=>'km']
],
[
['text'=>"البوت $bot 🤖",'callback_data'=>"bot"],['text'=>"التواصل $tw 📞",'callback_data'=>'tw']
],
[
['text'=>"قسم الحظر 🚫",'callback_data'=>"band"]
],
[
['text'=>"التكرار $spam",'callback_data'=>"spam"],['text'=>"عدد التكرار $numspam 😬",'callback_data'=>"numspam"]
],
[
['text'=>"إذاعة 📣👤",'callback_data'=>'sendprofile'],['text'=>"توجيه 🔄",'callback_data'=>"forward"]
],
[
['text'=>"الأدمنة 👥⁦👮🏻‍♂️⁩",'callback_data'=>"admins"]
],
[
['text'=>"رفع مشرف ⁦👮🏻‍♂️⁩",'callback_data'=>"addadmin"],['text'=>"تنزيل مشرف ⁦👳🏻‍♂️⁩",'callback_data'=>"deladmin"]
],
[
['text'=>"نقل ملكية البوت 🔱",'callback_data'=>"MoveAdmin"]
],
[
['text'=>"جلب نسخة بيانات 📥🗃",'callback_data'=>"Download"],['text'=>"رفع نسخة 📤🗃",'callback_data'=>"Update"]
],
[
['text'=>"حذف التخزين المؤقت 🗑️⌛",'callback_data'=>"DeletFile"]
],
[
['text'=>"تعين نص الترحيب 💬♥️",'callback_data'=>'StartText'],['text'=>"تعين صورة الترحيب 🖼️♥️",'callback_data'=>'StartPhoto']
],
 [
['text'=>"مسح البيانات 🗑️🗂️",'callback_data'=>'DalAll']
],
]])
	]);
	$sting['sting']['sting'] = null;
	$sting['sting']['id'] = null;
	file_put_contents("sting.json",json_encode($sting,64|128|256));
		}elseif(in_array($chat_id,$sting['sting']['admins'])){
			bot('sendmessage',[
	'chat_id'=>$chat_id, 
	'text'=>"
	أهلا🙋🏻‍♂️⁩ عزيزي الأدمن ⁦👨🏻‍🔧⁩
	يمكنك التحكم ⁦⚙️⁩ بكامل البوت من هنا 🦾
	",
	'reply_to_meesage_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"قسم الإشتراك الإجباري 🔱 الخاص 👤",'callback_data'=>'ch']
],
[
['text'=>"التوجيه $ford 🔄",'callback_data'=>'ford'],['text'=>"التنبيه $onstart 📣",'callback_data'=>'onstart']
],
[
['text'=>"الإحصائيات 📊",'callback_data'=>'km']
],
[
['text'=>"البوت $bot 🤖",'callback_data'=>"bot"],['text'=>"التواصل $tw 📞",'callback_data'=>'tw']
],
[
['text'=>"قسم الحظر 🚫",'callback_data'=>"band"]
],
[
['text'=>"التكرار $spam",'callback_data'=>"spam"],['text'=>"عدد التكرار $numspam 😬",'callback_data'=>"numspam"]
],
[
['text'=>"إذاعة 📣👤",'callback_data'=>'sendprofile'],['text'=>"توجيه 🔄",'callback_data'=>"forward"]
],

]])
	]);
	$sting['sting']['sting'] = null;
	$sting['sting']['id'] = null;
	file_put_contents("sting.json",json_encode($sting,64|128|256));
			}
	}
if($data == "back"){
	if(in_array($chat_id,$sting['ford'])){$ford = 'مفعل ✅';}else{$ford = 'معطل ❎';}
	if(in_array($chat_id,$sting['onstart'])){$onstart = 'مفعل ✅';}else{$onstart = 'معطل ❎';}
	$bot = str_replace(['false','true'],['معطل ❎','مفعل ✅'],$sting['sting']['bot']);
	if(in_array($chat_id,$sting['tw'])){$tw = 'مفعل ✅';}else{$tw = 'معطل ❎';}
	
 $spam = str_replace(['false','true'],['معطل ❎',' مفعل ✅'],$sting['sting']['spam']);
	if($chat_id == $admin){
		bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
	أهلا بك ⁦🙋🏻‍♂️⁩ عزيزي الأدمن ⁦👨🏻‍🔧⁩
	يمكنك التحكم ⁦⚙️⁩ بكامل البوت من هنا 🦾
	",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"قسم الإشتراك الإجباري 🔱 الخاص 👤",'callback_data'=>'ch']
],
[
['text'=>"التوجيه $ford 🔄",'callback_data'=>'ford'],['text'=>"التنبيه $onstart 📣",'callback_data'=>'onstart']
],
[
['text'=>"الإحصائيات 📊",'callback_data'=>'km']
],
[
['text'=>"البوت $bot 🤖",'callback_data'=>"bot"],['text'=>"التواصل $tw 📞",'callback_data'=>'tw']
],
[
['text'=>"قسم الحظر 🚫",'callback_data'=>"band"]
],
[
['text'=>"التكرار $spam",'callback_data'=>"spam"],['text'=>"عدد التكرار $numspam 😬",'callback_data'=>"numspam"]
],
[
['text'=>"إذاعة 📣👤",'callback_data'=>'sendprofile'],['text'=>"توجيه 🔄",'callback_data'=>"forward"]
],
[
['text'=>"الأدمنة 👥⁦👮🏻‍♂️⁩",'callback_data'=>"admins"]
],
[
['text'=>"رفع مشرف ⁦👮🏻‍♂️⁩",'callback_data'=>"addadmin"],['text'=>"تنزيل مشرف ⁦👳🏻‍♂️⁩",'callback_data'=>"deladmin"]
],
[
['text'=>"نقل ملكية البوت 🔱",'callback_data'=>"MoveAdmin"]
],
[
['text'=>"جلب نسخة بيانات 📥🗃",'callback_data'=>"Download"],['text'=>"رفع نسخة 📤🗃",'callback_data'=>"Update"]
],
[
['text'=>"حذف التخزين المؤقت 🗑️⌛",'callback_data'=>"DeletFile"]
],
[
['text'=>"تعين نص الترحيب 💬♥️",'callback_data'=>'StartText'],['text'=>"تعين صورة الترحيب 🖼️♥️",'callback_data'=>'StartPhoto']
],
 [
['text'=>"مسح البيانات 🗑️🗂️",'callback_data'=>'DalAll']
],

]])
	]);
	$sting['sting']['sting'] = null;
	$sting['sting']['id'] = null;
	file_put_contents("sting.json",json_encode($sting,64|128|256));
		}elseif(in_array($chat_id,$sting['sting']['admins'])){
			bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
	أهلا بك ⁦🙋🏻‍♂️⁩ عزيزي الأدمن ⁦👨🏻‍🔧⁩
	يمكنك التحكم ⁦⚙️⁩ بكامل البوت من هنا 🦾
	",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"قسم الإشتراك الإجباري 🔱 الخاص 👤",'callback_data'=>'ch']
],
[
['text'=>"التوجيه $ford 🔄",'callback_data'=>'ford'],['text'=>"التنبيه $onstart 📣",'callback_data'=>'onstart']
],
[
['text'=>"الإحصائيات 📊",'callback_data'=>'km']
],
[
['text'=>"البوت $bot 🤖",'callback_data'=>"bot"],['text'=>"التواصل $tw 📞",'callback_data'=>'tw']
],
[
['text'=>"قسم الحظر 🚫",'callback_data'=>"band"]
],
[
['text'=>"التكرار $spam",'callback_data'=>"spam"],['text'=>"عدد التكرار $numspam 😬",'callback_data'=>"numspam"]
],
[
['text'=>"إذاعة 📣👤",'callback_data'=>'sendprofile'],['text'=>"توجيه 🔄",'callback_data'=>"forward"]
],

]])
	]);
	$sting['sting']['sting'] = null;
	$sting['sting']['id'] = null;
	file_put_contents("sting.json",json_encode($sting,64|128|256));
			}
	}
if($chat_id == $admin or in_array($chat_id,$sting['sting']['admins'])){
	if($data == 'ford' or $data == 'onstart' or $data == 'bot' or $data == 'tw' or $data == "spam"){
		$a = str_replace(['ford','onstart','bot','tw','spam'],['التوجيه 🔄','التنبيه 📣','البوت 🤖','التواصل 📞','التكرار ♻️'],$data);
		if($data == 'ford' or $data == 'onstart' or $data == 'tw'){
if(in_array($chat_id,$sting[$data])){
$num = array_search($chat_id,$sting[$data]);
            	unset($sting[$data][$num]);
            $b = "تعطيل ❎";
            }else{
            $sting[$data][] = $chat_id;
            $b = "تفعيل ✅";
            }
}else{
if($sting['sting'][$data] == "true"){
			$sting['sting'][$data] = "false";
			$b = "تعطيل ❎";
			}else{
				$sting['sting'][$data] = "true";
			$b = "تفعيل ✅";
				}
				file_put_contents("sting.json",json_encode($sting,64|128|256));
				}
				bot('answerCallbackQuery',[ 
            'callback_query_id'=>$update->callback_query->id, 
            'text'=>"تم $b $a ❗", 
            'show_alert'=>true 
            ]); 
            if(in_array($chat_id,$sting['ford'])){$ford = 'مفعل ✅';}else{$ford = 'معطل ❎';}
	if(in_array($chat_id,$sting['onstart'])){$onstart = 'مفعل ✅';}else{$onstart = 'معطل ❎';}
	$bot = str_replace(['false','true'],['معطل ❎','مفعل ✅'],$sting['sting']['bot']);
	if(in_array($chat_id,$sting['tw'])){$tw = 'مفعل ✅';}else{$tw = 'معطل ❎';}
 $spam = str_replace(['false','true'],['معطل ❎',' مفعل ✅'],$sting['sting']['spam']);
            if($chat_id == $admin){
		bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
	أهلا بك ⁦🙋🏻‍♂️⁩ عزيزي الأدمن ⁦👨🏻‍🔧⁩
	يمكنك التحكم ⁦⚙️⁩ بكامل البوت من هنا 🦾
	",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"قسم الإشتراك الإجباري 🔱 الخاص 👤",'callback_data'=>'ch']
],
[
['text'=>"التوجيه $ford 🔄",'callback_data'=>'ford'],['text'=>"التنبيه $onstart 📣",'callback_data'=>'onstart']
],
[
['text'=>"الإحصائيات 📊",'callback_data'=>'km']
],
[
['text'=>"البوت $bot 🤖",'callback_data'=>"bot"],['text'=>"التواصل $tw 📞",'callback_data'=>'tw']
],
[
['text'=>"قسم الحظر 🚫",'callback_data'=>"band"]
],
[
['text'=>"التكرار $spam",'callback_data'=>"spam"],['text'=>"عدد التكرار $numspam 😬",'callback_data'=>"numspam"]
],
[
['text'=>"إذاعة 📣👤",'callback_data'=>'sendprofile'],['text'=>"توجيه 🔄",'callback_data'=>"forward"]
],
[
['text'=>"الأدمنة 👥⁦👮🏻‍♂️⁩",'callback_data'=>"admins"]
],
[
['text'=>"رفع مشرف ⁦👮🏻‍♂️⁩",'callback_data'=>"addadmin"],['text'=>"تنزيل مشرف ⁦👳🏻‍♂️⁩",'callback_data'=>"deladmin"]
],
[
['text'=>"نقل ملكية البوت 🔱",'callback_data'=>"MoveAdmin"]
],
[
['text'=>"جلب نسخة بيانات 📥🗃",'callback_data'=>"Download"],['text'=>"رفع نسخة 📤🗃",'callback_data'=>"Update"]
],
[
['text'=>"حذف التخزين المؤقت 🗑️⌛",'callback_data'=>"DeletFile"]
],
[
['text'=>"تعين نص الترحيب 💬♥️",'callback_data'=>'StartText'],['text'=>"تعين صورة الترحيب 🖼️♥️",'callback_data'=>'StartPhoto']
],
 [
['text'=>"مسح البيانات 🗑️🗂️",'callback_data'=>'DalAll']
],
]])
	]);
	$sting['sting']['sting'] = null;
	$sting['sting']['id'] = null;
	file_put_contents("sting.json",json_encode($sting,64|128|256));
		}elseif(in_array($chat_id,$sting['sting']['admins'])){
			bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
	أهلا بك ⁦🙋🏻‍♂️⁩ عزيزي الأدمن ⁦👨🏻‍🔧⁩
	يمكنك التحكم ⁦⚙️⁩ بكامل البوت من هنا 🦾
	",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"قسم الإشتراك الإجباري 🔱 الخاص 👤",'callback_data'=>'ch']
],
[
['text'=>"التوجيه $ford 🔄",'callback_data'=>'ford'],['text'=>"التنبيه $onstart 📣",'callback_data'=>'onstart']
],
[
['text'=>"الإحصائيات 📊",'callback_data'=>'km']
],
[
['text'=>"البوت $bot 🤖",'callback_data'=>"bot"],['text'=>"التواصل $tw 📞",'callback_data'=>'tw']
],
[
['text'=>"قسم الحظر 🚫",'callback_data'=>"band"]
],
[
['text'=>"التكرار $spam",'callback_data'=>"spam"],['text'=>"عدد التكرار $numspam 😬",'callback_data'=>"numspam"]
],
[
['text'=>"إذاعة 📣👤",'callback_data'=>'sendprofile'],['text'=>"توجيه 🔄",'callback_data'=>"forward"]
],
]])
	]);
	$sting['sting']['sting'] = null;
	$sting['sting']['id'] = null;
	file_put_contents("sting.json",json_encode($sting,64|128|256));
			}
		}
		if($data == "km"){
		$band = count($sting['sting']['band']);
		if(in_array($chat_id,$sting['ford'])){$ford = 'مفعل ✅';}else{$ford = 'معطل ❎';}
	if(in_array($chat_id,$sting['onstart'])){$onstart = 'مفعل ✅';}else{$onstart = 'معطل ❎';}
	$bot = str_replace(['false','true'],['معطل ❎','مفعل ✅'],$sting['sting']['bot']);
	if(in_array($chat_id,$sting['tw'])){$tw = 'مفعل ✅';}else{$tw = 'معطل ❎';}
	
 $spam = str_replace(['false','true'],['معطل ❎',' مفعل ✅'],$sting['sting']['spam']);
	$m = count($members) -1;
	$d = count($day)-1;
		bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
            'text'=>"إحصائيات البوت كالتالي 🤖:
عدا الأعضاء 👤 «".$m."»
عدد المتفاعلين اليوم : «".$d."»
عدد المحظورين 📛 : «".$band."»
التوجيه 🔄 : «".$ford."»
التنبيه 📣 : «".$onstart."»
البوت 🤖 : «".$bot."»
التواصل 📞 : «".$tw."»
", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"رجوع 🔙",'callback_data'=>"back"]
],
]])
            ]); 
		}
		
				if($data == "ch" or $data == "ch1del" or $data == "ch2del" or $data == "ch3del" or $data == "ch4del" or $data == "ch5del"){
					if($data == "ch1del"){
						bot('answerCallbackQuery',[ 
            'callback_query_id'=>$update->callback_query->id, 
            'text'=>"
            تم حذف قناة 1 من الإشتراك الإجباري ✅
", 
            'show_alert'=>true 
            ]); 
            unset($sting['sting']['ch1']);
						}
						if($data == "ch2del"){
						bot('answerCallbackQuery',[ 
            'callback_query_id'=>$update->callback_query->id, 
            'text'=>"
            تم حذف قناة 2 من الإشتراك الإجباري ✅
", 
            'show_alert'=>true 
            ]); 
            unset($sting['sting']['ch2']);
						}
						if($data == "ch3del"){
						bot('answerCallbackQuery',[ 
            'callback_query_id'=>$update->callback_query->id, 
            'text'=>"
            تم حذف قناة 3 من الإشتراك الإجباري ✅
", 
            'show_alert'=>true 
            ]); 
            unset($sting['sting']['ch3']);
						}
						if($data == "ch4del"){
						bot('answerCallbackQuery',[ 
            'callback_query_id'=>$update->callback_query->id, 
            'text'=>"
            تم حذف قناة 4 من الإشتراك الإجباري ✅
", 
            'show_alert'=>true 
            ]); 
            unset($sting['sting']['ch4']);
						}
						if($data == "ch5del"){
						bot('answerCallbackQuery',[ 
            'callback_query_id'=>$update->callback_query->id, 
            'text'=>"
            تم حذف قناة 5 من الإشتراك الإجباري ✅
", 
            'show_alert'=>true 
            ]); 
            unset($sting['sting']['ch5']);
						}
					if($sting['sting']['ch1'] == null){
						$ch1 = "قناة 1 🔱 لا يوجد 😴";
						}else{
							$ch3 = bot('getchat',['chat_id'=>$sting['sting']['ch1']]);
							if($ch3->ok == true){
								$ch1 = $ch3->result->title;
								}else{
									$ch1 = "قناة 1 🔱 لا يوجد 😴";
									}
							}
							if($sting['sting']['ch2'] == null){
						$ch2 = "قناة 2 🔱 لا يوجد 🌚";
						}else{
							$ch = bot('getchat',['chat_id'=>$sting['sting']['ch2']]);
							if($ch->ok == true){
								$ch2 = $ch->result->title;
								}else{
									$ch2 = "قناة 2 🔱 لا يوجد 🌚";
									}
							}
							if($sting['sting']['ch3'] == null){
						$ch3 = "قناة 3 🔱 لا يوجد 🌚";
						}else{
							$ch = bot('getchat',['chat_id'=>$sting['sting']['ch3']]);
							if($ch->ok == true){
								$ch3 = $ch->result->title;
								}else{
									$ch3 = "قناة 3 🔱 لا يوجد 🌚";
									}
							}
							if($sting['sting']['ch4'] == null){
						$ch4 = "قناة 4 🔱 لا يوجد 🌚";
						}else{
							$ch = bot('getchat',['chat_id'=>$sting['sting']['ch4']]);
							if($ch->ok == true){
								$ch4 = $ch->result->title;
								}else{
									$ch4 = "قناة 4 🔱 لا يوجد 🌚";
									}
							}
							if($sting['sting']['ch5'] == null){
						$ch5 = "قناة 5 🔱 لا يوجد 🌚";
						}else{
							$ch = bot('getchat',['chat_id'=>$sting['sting']['ch5']]);
							if($ch->ok == true){
								$ch5 = $ch->result->title;
								}else{
									$ch5 = "قناة 5 🔱 لا يوجد 🌚";
									}
							}
					bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
إليك أوامر الإشتراك الإجباري 😼
",'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"$ch1",'callback_data'=>"ch"]
],
[
['text'=>"وضع قناة 👌",'callback_data'=>"ch1add"],['text'=>"حذف قناة 🤟",'callback_data'=>"ch1del"]
],
[
['text'=>"$ch2",'callback_data'=>"ch"]
],
[
['text'=>"وضع قناة 😼",'callback_data'=>"ch2add"],['text'=>"حذف قناة 🤙",'callback_data'=>"ch2del"]
],
[
['text'=>"$ch3",'callback_data'=>"ch"]
],
[
['text'=>"وضع قناة 😎",'callback_data'=>"ch3add"],['text'=>"حذف قناة 😴",'callback_data'=>"ch3del"]
],
[
['text'=>"$ch4",'callback_data'=>"ch"]
],
[
['text'=>"وضع قناة 💐",'callback_data'=>"ch4add"],['text'=>"حذف قناة 🤸",'callback_data'=>"ch4del"]
],
[
['text'=>"$ch5",'callback_data'=>"ch"]
],
[
['text'=>"وضع قناة 👀",'callback_data'=>"ch5add"],['text'=>"حذف قناة 💀",'callback_data'=>"ch5del"]
],
[
['text'=>'رجوع 🔙','callback_data'=>'back']
],
]])
]);
$sting['sting']['sting'] = null;
	$sting['sting']['id'] = null;
	file_put_contents("sting.json",json_encode($sting,64|128|256));
					}
					if($data == "ch1add" or $data == "ch2add" or $data == "ch3add" or $data == "ch4add" or $data == "ch5add"){
						bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
أرسل الأن معرف القناة Ⓜ️ او وجه أي رسالة من القناة 🔄
",'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"إلغاء ❎",'callback_data'=>"ch"]
]
]])
]);
if($data == "ch1add"){
$sting['sting']['sting'] = "ch1";
}
if($data == "ch2add"){
$sting['sting']['sting'] = "ch2";
}
if($data == "ch3add"){
$sting['sting']['sting'] = "ch3";
}
if($data == "ch4add"){
$sting['sting']['sting'] = "ch4";
}
if($data == "ch5add"){
$sting['sting']['sting'] = "ch5";
}
	$sting['sting']['id'] = $from_id;
	file_put_contents("sting.json",json_encode($sting,64|128|256));
						}
						if(!$data and $sting['sting']['id'] == $from_id and $update->message->forward_from_chat or preg_match("/(@)(.)/", $text)){
							if($sting['sting']['sting'] == 'ch1' or $sting['sting']['sting'] == 'ch2' or $sting['sting']['sting'] == 'ch3' or $sting['sting']['sting'] == 'ch4' or $sting['sting']['sting'] == 'ch5'){
							bot('sendmessage',[
	'chat_id'=>$chat_id, 
	'text'=>"
	تم حفظ القناة بنجاح ✅
	تأكد أن البوت مشرف في القناة ⁦👮🏻‍♂️⁩
	",
	'reply_to_meesage_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'رجوع 🔙','callback_data'=>'ch']
],
]])
]);
if($update->message->forward_from_chat){
	$sting['sting'][$sting['sting']['sting']] = $update->message->forward_from_chat->id;
	}else{
		$sting['sting'][$sting['sting']['sting']] = $text;
		}
					$sting['sting']['sting'] = null;
					$sting['sting']['id'] = null;
	file_put_contents("sting.json",json_encode($sting,64|128|256));
							}
							}
	if($data == "admins"){
		foreach($sting['sting']['admins'] as $admins){
		$names = bot("getchat",["chat_id"=>$admins])->result->first_name;
		if($names != null){
		$addmins .= "[$names](tg://user?id=$admins)\n";
		}
		}
		if(addmins == null){
			bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
عذرا لا يوجد أي أدمن مرفوع 😅
",'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'رجوع 🔙','callback_data'=>'back']
],
]])
]);
			}else{
		bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
	تفضل عزيزي الأدمن ⁦👮🏻‍♂️⁩ قائمة الأدمنة 📃
	$addmins
",'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'رجوع 🔙','callback_data'=>'back']
],
]])
]);
		}
		}
							if($data == "band"){
								$band = count($sting['sting']['band']);
								bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
إليك أوامر الحظر 🤟
",'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"المحظورين 📛  «".$band."»",'callback_data'=>"bander"]
],
[
['text'=>"حظر ➕⛔",'callback_data'=>"bandadd"],['text'=>"إلغاء حظر ➖⛔",'callback_data'=>"delband"]
],
[
['text'=>'رجوع 🔙','callback_data'=>'back']
],
]])
]);
$sting['sting']['sting'] = null;
	$sting['sting']['id'] = null;
	file_put_contents("sting.json",json_encode($sting,64|128|256));
								}
								if($data == "bandadd" or $data == "delband"){
									$a = str_replace(['bandadd','delband'],['لأحظره من البوت 📛','لأزيله من المحظورين 😃'],$data);
									bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
أرسل الان ايدي 🆔 العضو $a 
",'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"إلغاء ❎",'callback_data'=>"band"]
],
]])
]);
$sting['sting']['sting'] = $data;
$sting['sting']['id'] = $from_id;
	file_put_contents("sting.json",json_encode($sting,64|128|256));
									}
									if(!$update->callback_query){
						if($text != null and $sting['sting']['sting'] == "bandadd" or $sting['sting']['sting'] == "delband" and $sting['sting']['id'] == $from_id){
							$a = str_replace(['bandadd','delband'],['حظره بنجاح 😏','إلغاء حظره بنجاح 😴'],$sting['sting']['sting']);
							bot('sendmessage',[
	'chat_id'=>$chat_id, 
	'text'=>"
	تم $a
	",
	'reply_to_meesage_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'رجوع 🔙','callback_data'=>'band']
],
]])
]);
if($sting['sting']['sting'] == "bandadd"){
	$sting['sting']['band'][] = $text;
	}else{
		$num = array_search($text,$sting['sting']['band']);
		unset($sting['sting']['band'][$num]);
		}
					$sting['sting']['sting'] = null;
					$sting['sting']['id'] = null;
	file_put_contents("sting.json",json_encode($sting,64|128|256));
							}
							}
							if($data == "bander"){
								foreach($sting['sting']['band'] as $band){
									if($band != null){
									$s .= "`$band` » [للدخول إلى الحساب 🍃](tg://user?id=$band)\n";
									}
}
if($s == null){
	bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
عذرا لا يوجد أي شخص محظور 😅❤️
",'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"رجوع 🔙",'callback_data'=>"band"]
],
]])
]);
	}else{
								bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
إليك قائمة المحظورين 📛
$s
",'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"رجوع 🔙",'callback_data'=>"band"]
],
]])
]);
								}
								}
								if($data == "addadmin" or $data == "deladmin"){
									$a = str_replace(['addadmin','deladmin'],['لأرفعه أدمن ⁦☺️⁩','لأزيله من قائمة الأدمنة 😼'],$data);
									bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
أرسل الان ايدي 🆔 العضو $a 
",'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"إلغاء ❎",'callback_data'=>"back"]
],
]])
]);
$sting['sting']['sting'] = $data;
$sting['sting']['id'] = $from_id;
	file_put_contents("sting.json",json_encode($sting,64|128|256));
									}
									if(!$update->callback_query){
						if($text != null and $sting['sting']['sting'] == "addadmin" or $sting['sting']['sting'] == "deladmin" and $sting['sting']['id'] == $from_id){
							$a = str_replace(['addadmin','deladmin'],['تم رفعه بنجاح 😉','تم تنزيله بنجاح 😏'],$sting['sting']['sting']);
if($sting['sting']['sting'] == "addadmin"){
	$sting['sting']['admins'][] = $text;
	bot('sendmessage',[
	'chat_id'=>$text, 
	'text'=>"
	مبارك تم رفعك كمشرف في البوت 🤩
	",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'القائمة الرئيسية 🏠','callback_data'=>'back']
],
]])
]);
bot('sendmessage',[
	'chat_id'=>$chat_id, 
	'text'=>"
	تم رفعه بنجاح 😉
	",
	'reply_to_meesage_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'رجوع 🔙','callback_data'=>'back']
],
]])
]);
	}else{
		$num = array_search($text,$sting['sting']['admins']);
		if($num){
		unset($sting['sting']['admins'][$num]);
		bot('sendmessage',[
	'chat_id'=>$text, 
	'text'=>"
	تم تنزيلك من الإشراف 😒
	",
]);
bot('sendmessage',[
	'chat_id'=>$chat_id, 
	'text'=>"
	تم تنزيله بنجاح 😉
	",
	'reply_to_meesage_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'رجوع 🔙','callback_data'=>'back']
],
]])
]);
		}else{
			bot('sendmessage',[
	'chat_id'=>$chat_id, 
	'text'=>"
	عذرا هذا العضو غير موجود 😶
	",
	'reply_to_meesage_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'رجوع 🔙','callback_data'=>'back']
],
]])
]);
			}
		}
					$sting['sting']['sting'] = null;
					$sting['sting']['id'] = null;
	file_put_contents("sting.json",json_encode($sting,64|128|256));
							}
							}
		}
			if($data == "numspam"){
bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
أرسل الأن عدد مرات التكرار المسموح بها 😉
",'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"إلغاء ❎",'callback_data'=>"back"]
]
]])
]);
$sting['sting']['sting'] = "spam";
$sting['sting']['id'] = $from_id;
file_put_contents("sting.json",json_encode($sting,64|128|256));
}

if(is_numeric($text) and $sting['sting']['sting'] == "spam" and $sting['sting']['id'] == $from_id){
bot('sendmessage',[
	'chat_id'=>$chat_id, 
	'text'=>"
	تم حفظ عدد مرات التكرار بنجاح ✓.
	",
	'reply_to_meesage_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'رجوع 🔙','callback_data'=>'back']
],
]])
]);
$sting['sting']['sting'] = null;
$sting['sting']['id'] = null;
$sting['sting']['spamn'] = $text;
file_put_contents("sting.json",json_encode($sting,64|128|256));
}
if($data == "MoveAdmin" and $chat_id == $admin){
bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
قم بإرسال ايدي العضو المراد نقل ملكية البوت له 🆔🔱
",'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"إلغاء ❎",'callback_data'=>"back"]
]
]])
]);
$sting['sting']['sting'] = "moveadmin";
file_put_contents("sting.json",json_encode($sting,64|128|256));
}
if($text != "/start" and !$data and $from_id == $admin and $sting['sting']['sting'] == "moveadmin"){
$namer = bot('getchat',['chat_id'=>$text])->result->first_name;
if($namer){
bot('sendmessage',[
	'chat_id'=>$chat_id, 
	'text'=>"
	هل أنت متأكد 🧐 أنك تريد نقل ملكية البوت 🤔؟
	سيتم نقل ملكية البوت إلى $namer 👤 وتنزيلك لرتبة عضو 🙁
	",
	'reply_to_meesage_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'نعم ✅','callback_data'=>'yes*'.$text],['text'=>'لا ❎','callback_data'=>'back']
],
]])
]);
}else{
bot('sendmessage',[
	'chat_id'=>$chat_id, 
	'text'=>"
	عذرا هذا العضو غير موجود 😅 يمكنك إرسل أيدي العضو مرة أخرة 😉
	",
	'reply_to_meesage_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'رجوع 🔙','callback_data'=>'back']
],
]])
]);
}
}
$ex = explode('*',$data);
if($ex[0] == 'yes' and $from_id == $admin and $sting['sting']['sting'] == "moveadmin"){
bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
	تم نقل ملكية البوت بنجاح ✓.
	",
]);
bot('sendmessage',[
	'chat_id'=>$ex[1], 
	'text'=>"
	تم نقل ملكية البوت لك 🔱♥️
	",
	'reply_to_meesage_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'الصفحة الرئيسية 🏠','callback_data'=>'back']
],
]])
]);
$sting['sting']['sting'] = null;
$sting['sting']['admins'][0] = $ex[1];
	file_put_contents("sting.json",json_encode($sting,64|128|256));
}
if($data == "Download" and $from_id == $admin){
bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
	جاري جلب نسخة إحتياطية 😁
	"]);
	bot('SendDocument',[
'chat_id'=>$chat_id,
'document'=>new CURLFile('sting.json'),
'caption'=>'نسخة للبينات ℹ️',
]);
bot('SendDocument',[
'chat_id'=>$chat_id,
'document'=>new CURLFile('members.txt'),
'caption'=>'نسخة للمشتركين ℹ️',
]);
bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
	تم جلب نسخة إحتياطية بنجاح ✓.
	",'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"رجوع 🔙",'callback_data'=>"back"]
]
]])
]);
}
if($data == "Update"){
bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>'
	لرفع نسخة إحتياطية من البيانات أرسل ملف بصيغة .json 🗃️
			ولرفع نسخة إحتياطية من الأعضاء أرسل ملف بصيغة .txt 🗂️
			','reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"رجوع 🔙",'callback_data'=>"back"]],
]])
]);
$sting['sting']['sting'] = 'file';
	file_put_contents("sting.json",json_encode($sting,64|128|256));
}
if($chat_id == $admin and $sting['sting']['sting'] == 'file'){
				if($message->document){
					if(preg_match('/(.txt)/',$message->document->file_name)){
    $file = "http://3.8.138.146:443/file/bot".API_KEY."/".bot('getfile',['file_id'=>$message->document->file_id])->result->file_path;
	    file_put_contents('members.txt',file_get_contents($file));
	bot('sendmessage',[
      'chat_id'=>$chat_id,
      "text"=>"
تم رفع ملف المشتركين بنجاح ✓
      ",'reply_to_message_id'=>$message_id,
      'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>'رجوع 🔙','callback_data'=>"back"]],
     ]])
     ]);
}elseif(preg_match('/(.json)/',$message->document->file_name)){
    $file = "http://3.8.138.146:443/file/bot".API_KEY."/".bot('getfile',['file_id'=>$message->document->file_id])->result->file_path;
	    file_put_contents('sting.json',file_get_contents($file));
	bot('sendmessage',[
      'chat_id'=>$chat_id,
      "text"=>"
تم رفع ملف البيانات بنجاح ✓
      ",'reply_to_message_id'=>$message_id,
      'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>'رجوع 🔙','callback_data'=>"back"]],
     ]])
     ]);
     }else{
     bot('sendmessage',[
      'chat_id'=>$chat_id,
      "text"=>"
عذرا هذا الملف خاطء يجب ان تنتهي نهايته ب .json او .txt !
      ",'reply_to_message_id'=>$message_id,
      'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>'رجوع 🔙','callback_data'=>"back"]],
     ]])
     ]);
     }
				}
			}
			if($data == "DeletFile"){
bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
	جاري حذف الملفات المؤقتة ♻️🗑️
			"
]);
$a = filesize('sting.json');
unset($sting['tws']);
$a -= filesize('sting.json');
$file = scandir('spam');
foreach($file as $u){
if($u != '.' and $u != '..'){
$a += filesize("spam/$u");
unlink("spam/$u");
}
}
$day = ['Sat','Sun','Mon','Tue','Wed','Thu','Fri'];
$d = date('Y');
unset($day[array_search($d)]);
foreach($day as $Day){
$a += filesize($Day);
unlink($Day.'.txt');
}
sleep(1);
$size = YhyaSyrian($a);
bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
	تم حذف الملفات المؤقتة ♻️🗑️
	تم تفريغ $size مساحة من الذاكرة المؤقتة 🗑️
			",'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'رجوع 🔙','callback_data'=>'back']
],
]])
]);
}
if($data == "StartText"){
bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
أرسل الأن نص الترحيب 💬❤️
يمكنك وضع 🎟️ التالي في نص الترحيب : 
#name لوضع اسم العضو 💫
#id لوضع ايدي العضو 🆔
@#user لوضع يوزر العضو Ⓜ️
#number لوضع عدد مشتركين البوت 📊
",'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"إلغاء ❎",'callback_data'=>"back"]
]
]])
]);
$sting['sting']['sting'] = "Start";
$sting['sting']['id'] = $from_id;
file_put_contents("sting.json",json_encode($sting,64|128|256));
}

if($text and !$data and $sting['sting']['sting'] == "Start" and $sting['sting']['id'] == $from_id){
bot('sendmessage',[
	'chat_id'=>$chat_id, 
	'text'=>"
	تم حفظ نص الترحيب بنجاح ✓.
	",
	'reply_to_meesage_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'رجوع 🔙','callback_data'=>'back']
],
]])
]);
$sting['sting']['sting'] = null;
$sting['sting']['id'] = null;
$sting['sting']['start'] = $text;
file_put_contents("sting.json",json_encode($sting,64|128|256));
}
if($data == "StartPhoto"){
bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
أرسل صورة الترحيب الأن 🖼️❤️.
",'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"رجوع 🔙",'callback_data'=>"back"]
]
]])
]);
$sting['sting']['sting'] = "StartPhoto";
$sting['sting']['id'] = $from_id;
file_put_contents("sting.json",json_encode($sting,64|128|256));
}

if($photo and !$data and $sting['sting']['sting'] == "StartPhoto" and $sting['sting']['id'] == $from_id){
bot('sendmessage',[
	'chat_id'=>$chat_id, 
	'text'=>"
	تم حفظ صورة الترحيب بنجاح ✓.
	في حال حصول أي مشكلة سيتم إرسال نص الترحيب بدلا من توقف البوت عن العمل ♻️
	",
	'reply_to_meesage_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'رجوع 🔙','callback_data'=>'back']
],
]])
]);
$sting['sting']['sting'] = null;
$sting['sting']['id'] = null;
$sting['sting']['photostart'] = $photo[0]->file_id;
file_put_contents("sting.json",json_encode($sting,64|128|256));
}
if($data == "DalAll"){
bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
هل أنت متأكد من حذف البيانات ‼️
سيترتب على ذالك حذف جميع ملف الأعضاء والإعدادات ⚙️🗑️
",'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'نعم ✅','callback_data'=>'yesdel'],['text'=>'لا ❎','callback_data'=>'back']
]
]])
]);
}
if($data == "yesdel" and $chat_id == $admin){
	bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
	جاري حذف البيانات ♻️🗑️
	"]);
	unlink("members.txt");
	unlink("sting.json");
	$file = scandir('spam');
foreach($file as $u){
if($u != '.' and $u != '..'){
$a += filesize("spam/$u");
unlink("spam/$u");
}
}
sleep(1);
bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
	جاري رفعك مالك في البوت 🔰🔱
	"]);
	sleep(1);
	$ab['sting']['admins'][0] = $chat_id;
	file_put_contents("sting.json",json_encode($ab));
	bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
	تم حذف جميع البيانات 🗑️ وتصفير البوت 🔰.
	",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'الصفحة الرئيسية 🏠','callback_data'=>'back']
],
]])
]);
	}
	$timer = json_decode(file_get_contents("spam/time.json"),1);
if($message and $sting['sting']['spam'] == "true" and !in_array($chat_id,$sting['sting']['admins'])){
$time = date('Y-n-d-h-i');
$timer[$time][$chat_id] += 1;
file_put_contents("spam/time.json",json_encode($timer));
if($timer[$time][$chat_id] >= $sting['sting']['spamn']){
$H = date('H');
$H = 23 - $H;
$H += 1;
if($H == 1){
$H = 'ساعة';
}elseif($H == 2){
$H = 'ساعتان';
}else{
$H = "$H ساعات";
}
bot('sendmessage',[
	'chat_id'=>$chat_id, 
	'text'=>"
	تم حظرك لمدة $H 🕛 بسبب تكرارك للرسائل 😑
	"]);
	$date = date('Y-n-d');
	file_put_contents("spam/$date",$from_id."\n",FILE_APPEND);
	return false;
}
}
if($data == "sendprofile"){
bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
	قم بإرسال أي شيء حتى أرسله لـ $countmembers عضو 👤
	",'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'إلغاء ❎','callback_data'=>'back']
],
]])
]);
$sting['sting']['sting'] = 'send';
					$sting['sting']['id'] = $chat_id;
	file_put_contents("sting.json",json_encode($sting,64|128|256));
}
if($message and !$data and $sting['sting']['sting'] == 'send' and $sting['sting']['id'] == $chat_id){
bot('sendmessage',[
	'chat_id'=>$chat_id, 
	'text'=>"
	جاري بدأ الإذاعة 😌♥️
	",'reply_to_meesage_id'=>$message_id,
	]);
if($text){
foreach($members as $YhyaSyrian){
bot('sendMessage', [
'chat_id'=>$YhyaSyrian,
'text'=>$text,
]); 
}}
if($photo){
foreach($members as $YhyaSyrian){
bot('sendphoto', [
'chat_id'=>$YhyaSyrian,
'photo'=>$photo_id,
'caption'=>$caption,
]); 
}}
if($video){
foreach($members as $YhyaSyrian){
bot('Sendvideo',[
'chat_id'=>$YhyaSyrian,
'video'=>$video_id,
'caption'=>$caption,
]); 
}}
if($video_note){
foreach($members as $YhyaSyrian){
bot('Sendvideonote',[
'chat_id'=>$YhyaSyrian,
'video_note'=>$video_note_id,
]); 
}}
if($sticker){
foreach($members as $YhyaSyrian){
bot('Sendsticker',[
'chat_id'=>$YhyaSyrian,
'sticker'=>$sticker_id,
]); 
}}
if($file){
foreach($members as $YhyaSyrian){
bot('SendDocument',[
'chat_id'=>$YhyaSyrian,
'document'=>$file_id,
'caption'=>$caption,
]); 
}}
if($music){
foreach($members as $YhyaSyrian){
bot('Sendaudio',[
'chat_id'=>$YhyaSyrian,
'audio'=>$music_id,
'caption'=>$caption,
]); 
}}
if($voice){
foreach($members as $YhyaSyrian){
bot('Sendvoice',[
'chat_id'=>$YhyaSyrian,
'voice'=>$voice_id,
'caption'=>$caption,
]); 
}}
$sting['sting']['sting'] = null;
					$sting['sting']['id'] = null;
	file_put_contents("sting.json",json_encode($sting,64|128|256));
}
if($data == "forward"){
			            bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
قم بإرسال أي شيء لأقوم بتوجيهه لجميع الأعضاء 📣
",'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"إلغاء ❎",'callback_data'=>"back"]
],
]])
]);
$sting['sting']['sting'] = 'forward';
$sting['sting']['id'] = $from_id;
	file_put_contents("sting.json",json_encode($sting,64|128|256));
			}
			if(!$data and $sting['sting']['sting'] == 'forward' and $sting['sting']['id'] == $from_id){
	bot('sendmessage',[
	'chat_id'=>$chat_id, 
	'text'=>"
	جاري بدأ الإذاعة 😌❤️
	",
	'reply_to_meesage_id'=>$message_id,
])->result->message_id;

foreach($members as $YhyaSyrian){
bot('forwardMessage', [
'chat_id'=>$YhyaSyrian,
'from_chat_id'=>$chat_id,
'message_id'=>$message_id,
]); 
}
$sting['sting']['sting'] = null;
					$sting['sting']['id'] = null;
	file_put_contents("sting.json",json_encode($sting,64|128|256));
			}
			if($text == "/start"){
			$name = str_replace(['[',']','(',')','*'],'',$name);
		$start = str_replace(['#name','#id','#user','#number'],[$name,$from_id,$user,$countmembers],$sting['sting']['start']);
		$ok = bot('sendphoto',[
		'chat_id'=>$chat_id,
		'photo'=>$sting['sting']['photostart'],
		'caption'=>$start,
		'parse_mode'=>"MarkDown",
	])->ok;
	if(!$ok){
		bot('sendmessage',[
		'chat_id'=>$chat_id,
		'text'=>$start,
		'parse_mode'=>"MarkDown",
	]);
		}
		}
$message = $update->message;
$message = $update->message;
$username = $message->from->username;
$message_id2 = $update->callback_query->message->message_id;
$text = $message->text;
$chat_id2= $update->callback_query->message->chat->id;
$data = $update->callback_query->data;
$chat_id2 = $update->callback_query->message->chat->id;
$Name = $update->callback_query->from->first_name;
$message_id = $update->callback_query->message->message_id;
$data = $update->callback_query->data;
$message = $update->message;
$from_id = $message->from->id;
$chat_id = $message->chat->id;
$text = $message->text;
$useree = $update->callback_query->message->chat->id;
$username = $message->from->username;
$fn = $message->from->first_name;
$user_id = $message->from->id;
$from_id = $message->from->id;
$user_id = $message->from->id;
$userbot = "@media_sobot";

#---------------#
$bano = file_get_contents('ban/'.$from_id.'.txt',"yes");
if($bano=="yes"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"انت محظور 🛃",
]);
}else{
if($text == '/start'){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>'اهلا وسهلا بك في بوت التحميل من جميع مواقع التواصل الاجتماعي 

Welcome To bot for download From Social Media 

Facebook , youtube , instagram posts , soundcloud'
,'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"طريقة التحميل",'callback_data'=>"video"],['text'=>"لشراء الملف",'url'=>"https://t.me/J_69_L"]],
[['text'=>"Monster Dev™",'url'=>"https://t.me/J_69_L"]],
]]),'parse_mode'=>"MarkDown",
]);
}
#---------------#
if($data=="video"){
bot('sendvideo',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'video'=>"https://t.me/modzx_dev/3",
'caption'=>$userbot,
]);
}
#------------------------------------#
if(preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $text, $getyt)){
$idyt = $getyt[1];
$urlyt = "http://".$getyt[0];
$getinfos = json_decode(file_get_contents("https://projectlounge.pw/ytdl/info?url=".urlencode($urlyt)));
$title = $getinfos->title;
$thumb = end($getinfos->thumbnails)->url;
bot('sendphoto',[
'chat_id'=>$chat_id,
'photo'=>$urlyt,
'caption'=>$title,
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"Video 🎥",'callback_data'=>"vido#$idyt"]],[['text'=>"Voice 🎙",'callback_data'=>"vid#$idyt"]],[['text'=>"Music 🎧",'callback_data'=>"music#$idyt"]],
]]),
'parse_mode'=>"MarkDown",
]);
}
$exi = explode('#',$data);
if($exi[0]=="vid"){
bot('editMessageReplyMarkup',[
'chat_id'=>$update->callback_query->message->chat->id,
'message_id'=>$update->callback_query->message->message_id,
'reply_markup'=>null,
]);
$idyt = $exi[1];
$mid2 = bot('sendmessage',['chat_id'=>$chat_id2,'text'=>"جاري التحميل..."])->result->message_id;
$youtub = "https://projectlounge.pw/ytdl/download?url=http://www.youtube.com/watch?v=$exi[1]&format=251";
file_put_contents($idyt.".ogg",curl_get($youtub));
bot('sendvoice',[
'chat_id'=>$chat_id2,
'voice'=>new CURLFile($idyt.".ogg"),
'caption'=>$userbot,
]);
unlink($idyt.".ogg");
}
if($exi[0]=="music"){
bot('editMessageReplyMarkup',[
'chat_id'=>$update->callback_query->message->chat->id,
'message_id'=>$update->callback_query->message->message_id,
'reply_markup'=>null,
]);
$idyt = $exi[1];
$mid2 = bot('sendmessage',['chat_id'=>$chat_id2,'text'=>"جاري التحميل..."])->result->message_id;
$getinfos = json_decode(file_get_contents("https://projectlounge.pw/ytdl/info?url=http://www.youtube.com/watch?v=".urlencode($exi[1])));
$title = $getinfos->title;
$thumb = end($getinfos->thumbnails)->url;
$uploader = $getinfos->uploader;
$duration = $getinfos->duration;
$youtub = "https://projectlounge.pw/ytdl/download?url=http://www.youtube.com/watch?v=$exi[1]&format=251";
file_put_contents($idyt.".jpg",curl_get($thumb));
file_put_contents($idyt.".mp3",curl_get($youtub));
bot('sendAudio',[
'chat_id'=>$chat_id2,
'audio'=>new CURLFile($idyt.".mp3"),
'thumb'=>new CURLFile($idyt.".jpg"),
'title'=>$title,
'caption'=>$title."\n".$userbot,
'duration'=>$duration,
'performer'=>$uploader
]);
unlink($idyt.".mp3");
unlink($idyt.".jpg");
}
if($exi[0]=="vido"){
bot('editMessageReplyMarkup',[
'chat_id'=>$update->callback_query->message->chat->id,
'message_id'=>$update->callback_query->message->message_id,
'reply_markup'=>null,
]);
$idyt = $exi[1];
$mid2 = bot('sendmessage',['chat_id'=>$chat_id2,'text'=>"جاري التحميل..."])->result->message_id;
$getinfos = json_decode(file_get_contents("https://projectlounge.pw/ytdl/info?url=http://www.youtube.com/watch?v=".urlencode($exi[1])));
$title = $getinfos->title;
$thumb = end($getinfos->thumbnails)->url;
$uploader = $getinfos->uploader;
$duration = $getinfos->duration;
$youtub = "https://projectlounge.pw/ytdl/download?url=http://www.youtube.com/watch?v=$exi[1]";
file_put_contents($idyt.".jpg",curl_get($thumb));
file_put_contents($idyt.".mp4",curl_get($youtub));
bot('sendvideo',[
'chat_id'=>$chat_id2,
'video'=>new CURLFile($idyt.".mp4"),
'thumb'=>new CURLFile($idyt.".jpg"),
'caption'=>$title."\n".$userbot,
'duration'=>$duration,
'supports_streaming'=>true,
]);
unlink($idyt.".mp4");
unlink($idyt.".jpg");
}
#---------------#
$channel = "@media_sobot";
if(preg_match('/.*soundcloud\.*/i',$text)){
$Api = json_decode(file_get_contents("https://api.soundcloud.com/resolve?client_id=709a0470b89a200205b2f7fda6d95d2e&url=".urlencode($text)));
$music = $Api->id;
$title = $Api->title;
$misc = json_decode(file_get_contents("https://api.soundcloud.com/i1/tracks/".$music."/streams?client_id=709a0470b89a200205b2f7fda6d95d2e&format=json"))->http_mp3_128_url;
file_put_contents("hi.mp3",get_data($misc));
$getsinfo = json_decode(file_get_contents("https://projectlounge.pw/ytdl/info?url=".urlencode($text)));
$ti = explode(".",$getsinfo->duration)[0];
$duration = $getinfos->_duration_raw;
$thu = end($getsinfo->thumbnails)->url;
$performer = $getsinfo->uploader;
file_put_contents($title.".jpg",file_get_contents($thu));
bot('sendaudio',[
'chat_id'=>$chat_id,
'audio'=>new CURLFile("hi.mp3") ,
'caption'=>"$channel ♪ $ti ⏳",
'thumb'=>new CURLFile($title.".jpg"),
'performer'=>$performer,
'title'=>$title,
'duration'=>$duration,
]);
unlink("hi.mp3");
unlink($title.".jpg");
}
#---------------#
#---------------#
$monstr = str_replace("/dlfile ",null,$text);
if($text == "/dlfile $monstr"){
file_put_contents("dlfile.html",curl_get($monstr));
bot('sendDocument',[
'chat_id'=>$chat_id,
'document' => new CURLFile("dlfile.html"),
]);
unlink("dlfile.html");
}
#---------------#

#----------------------------------------------------------------#
if(preg_match('/.*facebook\.com.*/i',$text)){
preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)video[-a-zA-Z0-9+&@#\/%?=~_.]*[-a-z0-9+&#\/=_.]/i",str_replace(['\/','amp;'],['/',null],curl_get("$text")),$urlo);
$mid = bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"جاري التحقق من رابط الفيديو...",
'reply_to_message_id'=>$message->message_id,
])->result->message_id;
$get = json_decode(curl_get("https://www.fbvideodownloader.org/data.php?v=$text"));
$url = $get->download_url;
if($url){
$ok = bot('sendvideo',[
'chat_id'=>$chat_id,
'video'=>$url,
'reply_to_message_id'=>$message->message_id,
]);
if($ok->ok != true){
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$mid,
'text'=>"جاري تحميل الفيديو...",
]);
file_put_contents("fb$chat_id.mp4",curl_get($url));
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$mid,
'text'=>"جاري الرفع الى تيليجرام..."
]);
$ok = bot('sendvideo',[
'chat_id'=>$chat_id,
'video'=>new CURLFile("fb$chat_id.mp4"),
'reply_to_message_id'=>$message->message_id,
]);
unlink("fb$chat_id.mp4");
if($ok->ok != true){
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$mid,
'text'=>"فشل رفع الفيديو الى تيليجرام!، من الممكن ان حجم الفيديو اكبر من 50MB",
]);
}else{
bot('deletemessage',[
'chat_id'=>$chat_id,
'message_id'=>$mid
]);
}
}else{
bot('deletemessage',[
'chat_id'=>$chat_id,
'message_id'=>$mid
]);
}
}else{
bot('sendchataction',[
'chat_id'=>$chat_id,
'action'=>"upload_video"
]);
bot('sendvideo',[
'chat_id'=>$chat_id,
'video'=>$urlo[0],
'caption'=>$userbot,
]);
}
}
#----------------------------------------------------------------#
    if(preg_match('/.*twitter\.com.*/i',$text)){
$twitter = "https://projectlounge.pw/ytdl/download?url=$text";
file_put_contents($chat_id.".mp4",curl_get($twitter));
bot('sendphoto',[
 'chat_id'=>$chat_id,
  'photo'=>"$text",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
    ]);
bot('sendvideo',[
  'chat_id'=>$chat_id,
   'video'=> new CURLFile($chat_id.".mp4"),
    ]);
    unlink($chat_id.".mp4");
    }
    if(preg_match('/.*tiktok\.com.*/i',$text)){
$tiktok = "https://projectlounge.pw/ytdl/download?url=$text";
file_put_contents($chat_id.".mp4",curl_get($tiktok));
bot('sendphoto',[
 'chat_id'=>$chat_id,
  'photo'=>"$text",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
    ]);
bot('sendvideo',[
  'chat_id'=>$chat_id,
   'video'=> new CURLFile($chat_id.".mp4"),
    ]);
    unlink($chat_id.".mp4");
    }
        if(preg_match('/.*fb\.watch.*/i',$text)){
$watch = "https://projectlounge.pw/ytdl/download?url=$text";
file_put_contents($chat_id.".mp4",curl_get($watch));
bot('sendphoto',[
 'chat_id'=>$chat_id,
  'photo'=>"$text",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
    ]);
bot('sendvideo',[
  'chat_id'=>$chat_id,
   'video'=> new CURLFile($chat_id.".mp4"),
    ]);
    unlink($chat_id.".mp4");
    }
$mp4 = str_replace("/mp4 ",null,$text);
if($text == "/mp4 $mp4"){
preg_match_all('!https:(.*).mp4!',curl_get($mp4),$mpp);
file_put_contents("hello.mp4",curl_get($mpp));
bot('sendvideo',[
'chat_id'=>$chat_id,
'video'=>new CURLFile("hello.mp4"),
'caption'=>$userbot,
]);
}
}
if(preg_match('/.*instagram\.com.*/i',$text)){
$instaapi = json_decode(curl_get("https://www.download4.cc/media/parse?address=".$text));
$pic = $instaapi->data->thumbnail;
$vid = $instaapi->data->formats[0]->url;
file_put_contents("insta.mp4",curl_get($vid));
bot('sendMessage',[
 'chat_id'=>$chat_id,
  'text'=>"جار المعالجة (قد تستغرق بعض الوقت)",
    ]);
bot('sendphoto',[
 'chat_id'=>$chat_id,
  'photo'=>"$pic",
  'caption'=>$userbot,
    ]);
 bot('sendvideo',[
  'chat_id'=>$chat_id,
   'video'=>new CURLFile("insta.mp4"),
   'caption'=>$userbot,
    ]);
    }
    $exapp = str_replace('تطبيق ','',$text);
if($text== "تطبيق $exapp"){
$get = explode('<dl class="search-dl">', file_get_contents('https://apkpure.com/ar/search?q=' . urlencode($exapp)));
for($i = 1; $i<2; $i++){
$app = explode('"', $get[$i]);
$name = $app[1];
$url = $app[5];
$res['inline_keyboard'][] = [['text'=>$name,'callback_data'=>'dl#'.$url]];
bot('sendmessage',[
'chat_id'=>$chat_id,
'text' => 'اختر التطبيق ليتم تحميله :', 'reply_markup' => json_encode($res),
 ]);
 }}
$do = explode('#', $data);
if($do[0] == "dl"){
$hhzzz = explode('<a id="download_link"', file_get_contents('https://apkpure.com' . $do[1] . '/download?from=details'));
$hassan = explode('"', $hhzzz[1]);
$muaed = $hassan[9];
$vhhhhh = file_get_contents($muaed);
file_put_contents("WZSSS.apk",$vhhhhh);

bot('sendMessage', [
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"Downloading .....",
]);
bot('sendDocument',[
'chat_id'=>$chat_id2,
'document' => new CURLFile("WZSSS.apk"),
'caption'=>" Downloaded Done our channel ==> @WZSSS ",
 ]);
 unlink(WZSSS.apk);
 }
}
function getupdate($offset){
  $update = bot('getupdates',[
    'offset'=>$offset])->result;
    return end($update);
}
while(true){
	try{
	  $update_id = $update_id ?? 0;
	  $update = getupdate($update_id+1);
		run($update);
	  $update_id = $update->update_id;
  } catch (Exception $e) {
		bot('sendmessage',[
		'chat_id'=>'996310583',
		'text'=>$e->getMessage()]);
		print_r($e->getMessage());
		break;
	}
}