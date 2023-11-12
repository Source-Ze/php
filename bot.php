<?php


$token = "6769330223:AAGAYAWqhJu6xuVqLUIwIqmEJpeFlVJj34U";
define('API_KEY',$token);
echo file_get_contents("https://api.telegram.org/bot" . API_KEY . "/setwebhook?url=" . $_SERVER['SERVER_NAME'] . "" . $_SERVER['SCRIPT_NAME']);
            function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
function SendChatAction($chat_id, $action)
{
    return bot('sendChatAction', [
        'chat_id' => $chat_id,
        'action' => $action
    ]);
}
function SendMessage($chat_id, $text, $parse_mode = "MARKDOWN", $disable_web_page_preview = true, $reply_to_message_id = null, $reply_markup = null)
{
    return bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => $text,
        'parse_mode' => $parse_mode,
        'disable_web_page_preview' => $disable_web_page_preview,
        'disable_notification' => false,
        'reply_to_message_id' => $reply_to_message_id,
        'reply_markup' => $reply_markup
    ]);
}



$update = json_decode(file_get_contents('php://input'));
if($update->message){
	$message = $update->message;
$message_id = $update->message->message_id;
$username = $message->from->username;
$chat_id = $message->chat->id;
$title = $message->chat->title;
$text = $message->text;
$user = $message->from->username;
$name = $message->from->first_name;
$name3 = $message->from->last_name;
$from_id = $message->from->id;
}
if($update->callback_query){
$data = $update->callback_query->data;
$chat_id = $update->callback_query->message->chat->id;
$title = $update->callback_query->message->chat->title;
$message_id = $update->callback_query->message->message_id;
$name = $update->callback_query->message->chat->first_name;
$user = $update->callback_query->message->chat->username;
$from_id = $update->callback_query->from->id;
}
if($update->edited_message){
	$message = $update->edited_message;
	$message_id = $message->message_id;
$username = $message->from->username;
$chat_id = $message->chat->id;
$chat_id = $message->chat->id;
$text = $message->text;
$user = $message->from->username;
$name = $message->from->first_name;
$from_id = $message->from->id;
	}
	if($update->channel_post){
	$message = $update->channel_post;
	$message_id = $message->message_id;
$chat_id = $message->chat->id;
$text = $message->text;
$user = $message->chat->username;
$title = $message->chat->title;
$name = $message->author_signature;
$from_id = $message->chat->id;
	}
	if($update->edited_channel_post){
	$message = $update->edited_channel_post;
	$message_id = $message->message_id;
$chat_id = $message->chat->id;
$text = $message->text;
$user = $message->chat->username;
$name = $message->author_signature;
$from_id = $message->chat->id;
	}
	if($update->inline_query){
		$inline = $update->inline_query;
		$message = $inline;
		$user = $message->from->username;
$name = $message->from->first_name;
$from_id = $message->from->id;
$query = $message->query;
$text = $query;
		}
	if($update->chosen_inline_result){
		$message = $update->chosen_inline_result;
		$user = $message->from->username;
$name = $message->from->first_name;
$from_id = $message->from->id;
$inline_message_id = $message->inline_message_id;
$message_id = $inline_message_id;
$text = $message->query;
$query = $text;
		}
		$tc = $update->message->chat->type;
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
$photo_id = $message->photo[back]->file_id;
$video_id= $message->video->file_id;
$sticker_id = $message->sticker->file_id;
$file_id = $message->document->file_id;
$music_id = $message->audio->file_id;
$forward = $message->forward_from_chat;
$forward_id = $message->forward_from_chat->id;
$title = $message->chat->title;
if($re){
	$forward_type = $re->forward_from->type;
$forward_name = $re->forward_from->first_name;
$forward_user = $re->forward_from->username;
	}else{
$forward_type = $message->forward_from->type;
$forward_name = $message->forward_from->first_name;
$forward_user = $message->forward_from->username;
$forward_id = $message->forward_from->id;
if($forward_name == null){
	$forward = $message->forward_from_chat;
$forward_id = $message->forward_from_chat->id;
$forward_title = $message->forward_from_chat->title;
	}
}

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$text = $message->text;
$chat_id2 = $update->callback_query->message->chat->id;
$message_id = $update->callback_query->message->message_id;
$data = $update->callback_query->data;
$from_id = $message->from->id;
$ch1 = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@set_Web&user_id=$from_id");
$ch2 = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@touch_t&user_id=$from_id");
$check_token = file_get_contents("https://api.telegram.org/bot$text/getWebhookInfo");
$check = json_decode($check_token);
$get_file = file_get_contents('hackeronion.php');
$get_done = file_get_contents('make/ex.txt');
$done = explode("\n", $get_done);
$get_id = file_get_contents('make/make.txt');
$getid = explode("\n", $get_id);
$mid = $message->message_id;



mkdir("data");
$carlos = json_decode(file_get_contents("data/bot.json"),true);
#--------(carlos)--------#
$sudo = "6673736816";
$malke = $carlos['malk'];
if(!$malke){$malkei = "$sudo";}
elseif($malke){$malkei = "$malke";}
$admin = $malke;
$Dev = array("$admin","$sudo");
$Dev = array("$malkei","$sudo");
$userDev = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$Dev[1]"))->result->username;
$nameDev = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$Dev[1]"))->result->first_name;
#--------(carlos)--------#
$members = $carlos['members'];
$md3 = count($carlos['members']);
if($tc == 'private' and !in_array($from_id,$members)){
$carlos['members'][] = $from_id;
file_put_contents("data/bot.json",json_encode($carlos));
}
#--------(carlos)--------#
$setch = $carlos["chall"];
if($text == "/start" and $carlos['joenall'] == "off"){
if(!in_array($from_id,$Dev)){
$join = file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=@$setch&user_id=".$from_id);
if($message && (strpos($join,'"status":"left"') or strpos($join,'"Bad Request: USER_ID_INVALID"') or strpos($join,'"status":"kicked"'))!== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"☆︙عذرا عزيزي.
☆︙لا يمكنك استخدام البوت.
☆︙الا بعد الاشتراك بقناة.
☆︙القناة ← [@$setch]",
'parse_mode'=>'markdown','reply_to_message_id'=>$message->message_id,
]);
exit();
}
}
}


if($text == '/start' and !in_array($from_id, $getid) and !strpos($ch1 , '"status":"left"') !== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>'اهلا بك في بوت انشاء بوتات ',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'انشاء بوت  ','callback_data'=>'maka']],

[['text'=>'حذف البوت 🗑','callback_data'=>'delete']],

]
])
]);
}

if($data == 'maka' and !in_array($chat_id2,$done) and !strpos($ch1 , '"status":"left"') !== false){
file_put_contents('make/make.txt', "\n" . $chat_id2 . "\n",FILE_APPEND);    
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'قم بأرسال 💭 توكن البوت الان ✅',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'الغاء ❌','callback_data'=>'cancle']]
]
])
]);
}

if($data == 'maka' and in_array($chat_id2,$done) and !strpos($ch1 , '"status":"left"') !== false){

bot('answerCallbackQuery',[
'callback_query_id'=>$update->callback_query->id,
'message_id'=>$message_id,
'text'=>'لا يمكنك ❌ انشاء اكثر من بوت  ',
 'show_alert'=>true
 ]);      
}


if($text and in_array($from_id, $getid) and $check->ok == "true"){

for($i = $mid - 3; $i < $mid; $i++){
bot('deleteMessage',[
'chat_id'=>$chat_id,
'message_id'=>$i
]);
}

$str = str_replace($from_id, '', $get_id);    

file_put_contents('make/make.txt', $str);    

file_put_contents('make/ex.txt', $from_id . "\n", FILE_APPEND);
    
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>'تم ✅ انشاء البوت ✨',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'الصفحة الرئيسية 🏠️' , 'callback_data'=>"home"]
],
]
])

]); 


mkdir("bots/$from_id");

file_put_contents("bots/$from_id/info.txt",$text . "\n" . $from_id);

file_put_contents("bots/$from_id/bot.php", $get_file);

file_put_contents("bots/$from_id/chat.txt", $from_id . "\n");

file_put_contents("bots/$from_id/welcome.txt", 'اهلا بك في بوت التواصل' . "\n");


file_get_contents("https://api.telegram.org/bot$text/setwebhook?url=https://oniomhost.000webhostapp.com/bots/$from_id/bot.php");


}
if ($message && in_array($from_id,$carlos['ban'])){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"⋄︙عزيزي - [$name](tg://user?id=$from_id)
⋄︙تم انت محظور من قبل المطور",
'parse_mode'=>"Markdown",
'reply_to_message_id'=>$message->message_id,
]);
}
#--------(carlos)--------#
$d8 = $carlos['bots'];
if($message and $d8 == "❎" and $from_id != $admin2){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"☆︙اهلا بك عزيزي العضو
☆︙عذرا البوت متوقف لغرض الصيانة
",
'parse_mode'=>"Markdown",
'reply_to_message_id'=>$message->message_id,
]);
exit();
}
#--------(carlos)--------#
if( $text=="/start" &&  $tc == "private" or $text=="꙳. رجوع" &&  $tc == "private" ){
if (in_array($from_id,$Dev)) {
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"☆︙المطور ← [$name](tg://user?id=$from_id)
☆︙اليك قائمة المطورين 
☆︙يمكنك تحكم ب كل الاوامر الموجوده",
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"꙳. المشتركين"],['text'=>"꙳. تصفير المشتركين"]],
[['text'=>"꙳. تفعيل البوت"]],
[['text'=>"꙳. اذاعة"],['text'=>"꙳. توجية"]],
[['text'=>"꙳. تعطيل البوت"]],
[['text'=>"꙳. تعين الاستارت"],['text'=>"꙳. حذف الاستارت"]],
[['text'=>"꙳. قسم الاشتراك"]],
[['text'=>"꙳. حذف الملكية"],['text'=>"꙳. نقل الملكية"]],
[['text'=>"꙳. المحظورين"],['text'=>"꙳. مسح المحظورين"]],
[['text'=>"꙳. تفعيل التنبية"],['text'=>"꙳. تعطيل التنبية"]],
[['text'=>"꙳. تفعيل التوجيه"],['text'=>"꙳. تعطيل التوجيه"]],
],
'resize_keyboard'=>true
])
]);
}
}
#--------(carlos)--------#
if( $text=="꙳. قسم الاشتراك" &&  $tc == "private"){
if (in_array($from_id,$Dev)) {
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"☆︙المطور ← [$name](tg://user?id=$from_id)
☆︙اليك قائمة الاشتراك الاجباري
",
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"꙳. حذف الاشتراك"],['text'=>"꙳. وضع الاشتراك"]],
[['text'=>"꙳. قناة الاشتراك"]],
[['text'=>"꙳. تفعيل الاشتراك"],['text'=>"꙳. تعطيل الاشتراك"]],
],
'resize_keyboard'=>true
])
]);
}
}
#--------(carlos)--------#
if (in_array($from_id,$Dev)) {
if($text == "توجيه" or $text == "꙳. توجيه"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"⋄︙ارسل رسالتك ليتم توجيه 
⋄︙المشتركين - $md3",
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id, 
]);
$carlos['data'] = "okoo";
file_put_contents("data/bot.json",json_encode($carlos));
}
$mmdr = $carlos['members'];
if($message and $text != "توجيه عام" and $text != "اذاعة كروبات" and $text != "توجيه" and $text != "اذاعة" and $text != "توجيه كروبات" and $text != "꙳. اذاعة" and $text != "꙳. توجيه" and $text != "꙳. اذاعة كروبات" and $text != "꙳. توجيه كروبات" and $text != "꙳. اذاعة عام" and $text != "꙳. توجيه عام" and $text != "꙳. الغاء الامر" and $carlos['data'] == "okoo" and in_array($from_id,$Dev)){
bot("sendmessage",[
"chat_id"=>$chat_id,
"text"=>'⋄︙تم الاذاعة توجيه بنجاح',
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id, 
]);
for($i=0;$i<count($mmdr); $i++){
bot('forwardMessage', [
'chat_id'=>$mmdr[$i],
'from_chat_id'=>$from_id,
'message_id'=>$message->message_id
]);
$carlos['data'] = "stop";
file_put_contents("data/bot.json",json_encode($carlos));
}
}
}
#----------(carlos)----------#
if (in_array($from_id,$Dev)) {
if($text == "اذاعة" or $text == "꙳. اذاعة"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"⋄︙ارسل رسالتك ليتم اذاعة 
⋄︙المشتركين - $md3",
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id, 
]);
$carlos['data'] = "okkoo";
file_put_contents("data/bot.json",json_encode($carlos));
}
$mmdrr = $carlos['members'];
if($message and $text != "توجيه عام" and $text != "اذاعة كروبات" and $text != "توجيه" and $text != "اذاعة" and $text != "توجيه كروبات" and $text != "꙳. اذاعة" and $text != "꙳. توجيه" and $text != "꙳. اذاعة كروبات" and $text != "꙳. توجيه كروبات" and $text != "꙳. اذاعة عام" and $text != "꙳. توجيه عام" and $text != "꙳. الغاء الامر" and $carlos['data'] == "okkoo" and in_array($from_id,$Dev)){
bot("sendmessage",[
"chat_id"=>$chat_id,
"text"=>'⋄︙تم الاذاعة بنجاح',
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id, 
]);
for($i=0;$i<count($mmdrr); $i++){
bot('sendMessage', [
'chat_id'=>$mmdrr[$i],
'text'=>"$text",
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
$carlos['data'] = "stop";
file_put_contents("data/bot.json",json_encode($carlos));
}
}
}
#----------(carlos)----------#
if($text == "꙳. تصفير المشتركين"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"⋄︙تم تصفير جميع المشتركين",
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id, 
]);
$carlos['members'] = 0;
file_put_contents("data/bot.json",json_encode($carlos));
}
#----------(carlos)----------#
if($text == "وضع الاشتراك" or $text == "꙳. وضع الاشتراك"){
if (in_array($from_id,$Dev)) {
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"*⋄︙ارسل معرف القناة دون @ .*",'parse_mode'=>"markdown",'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message_id,
]);
$carlos["addch"] = "$from_id";
file_put_contents("data/bot.json",json_encode($carlos));
}
}
elseif($text and $carlos["addch"]=="$from_id"){
if(preg_match('/([a-z])/i',$text)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"*
⋄︙تم حفظ قناة الاشتراك الاجباري .
*",'parse_mode'=>"markdown",'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message_id,
]);
$carlos["addch"] = "done";
$carlos["chall"] = "$text";
file_put_contents("data/bot.json",json_encode($carlos));
}
}
if($text == "حذف الاشتراك" or $text == "꙳. حذف الاشتراك"){
if (in_array($from_id,$Dev)) {
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"*⋄︙تم حذف قناة الاشتراك الاجباري .*",'parse_mode'=>"markdown",'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message_id,
]);
$carlos["chall"] = "Done";
$carlos['joenall'] = "on";
file_put_contents("data/bot.json",json_encode($carlos));
}
}
$chall = $carlos["chall"];
if($text == "قناة الاشتراك" or $text == "꙳. قناة الاشتراك" and $carlos["chall"] != "Done"){
if (in_array($from_id,$Dev)) {
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"*⋄︙اليك قناة الاشتراك الاجباري : @$chall .*",'parse_mode'=>"markdown",'disable_web_page_preview'=>true,
'parse_mode'=>"Markdown",
'reply_to_message_id'=>$message->message_id,
]);
}
}
if($text == "قناة الاشتراك" or $text == "꙳. قناة الاشتراك" and $carlos["chall"] == "Done"){
if (in_array($from_id,$Dev)) {
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"*⋄︙اليك قناة الاشتراك الاجباري : لايوجد قناة .*",'parse_mode'=>"markdown",'disable_web_page_preview'=>true,
'parse_mode'=>"Markdown",
'reply_to_message_id'=>$message->message_id,
]);
}
}
#----------(carlos)----------#
if($text == "تفعيل الاشتراك" or $text == "꙳. تفعيل الاشتراك"){
if (in_array($from_id,$Dev)) {
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"☆︙*بواسطة* ← [$name](tg://user?id=$from_id)\n☆︙*تـم تفعيل الاشتراك الاجباري*",
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
$carlos['joenall'] = "off";
file_put_contents("data/bot.json",json_encode($carlos));
}
}
if($text == "تعطيل الاشتراك" or $text == "꙳. تعطيل الاشتراك"){
if (in_array($from_id,$Dev)) {
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"☆︙*بواسطة* ← [$name](tg://user?id=$from_id)\n☆︙*تـم تعطيل الاشتراك الاجباري*",
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
$carlos['joenall'] = "on";
file_put_contents("data/bot.json",json_encode($carlos));
}
}
#----------(carlos)----------#
if($text == "꙳. المشتركين"){
if (in_array($from_id,$Dev)) {
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"⋄︙اليك الاحصائيات خاصه في بوتك
⋄︙المشتركين - $md3",
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id, 
]);
}
}
#----------(carlos)----------#
$start = $carlos['start'];
$startt = $carlos['startt'];
if($text=="تعين الاستارت" or $text=="꙳. تعين الاستارت"){
if(in_array($from_id,$Dev)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
☆︙عزيزي ← [$name](tg://user?id=$from_id)
☆︙الان قم بأرسال كليشة الاستارت
",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
]);
$carlos['start'] = "ok_start";
$carlos['startt'] = "$from_id";
file_put_contents("data/bot.json",json_encode($carlos));
}
}
if($text and $start == "ok_start" and $startt == $from_id){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
☆︙بواسطة ← [$name](tg://user?id=$from_id)
☆︙تم تعين كليشة الاستارت بنجاح
",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
]);
$carlos['okstart'] = $text;
$carlos['start'] = "on";
file_put_contents("data/bot.json",json_encode($carlos));
}
if($text=="حذف الاستارت" or $text=="꙳. حذف الاستارت"){
if(in_array($from_id,$Dev)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
☆︙عزيزي ← [$name](tg://user?id=$from_id)
☆︙تم حذف كليشة المطور
☆︙تم اعادة كليشة السورس
",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
]);
$carlos['okstart'] = null;
file_put_contents("data/bot.json",json_encode($carlos));
}
}
#----------(carlos)----------#
$okstart = $carlos['okstart'];
if($text=="/start" and $carlos['okstart'] != null){
if($tc == "private"){
if( !in_array($from_id,$Dev)){
$okstart = str_replace('#name',$name,$okstart);
$okstart = str_replace('#bot',$namebot,$okstart);
$okstart = str_replace('#id',$from_id,$okstart);
$okstart = str_replace('#user',$user,$okstart);
$okstart = str_replace('#dev',[$DevUser],$okstart);
bot('sendmessage',['chat_id'=>$chat_id,'text'=>"$okstart",
'reply_to_message_id'=>$message_id,
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"꙳. ( $nameDev ) .꙳", "url"=>"tg://user?id=$Dev[1]"]],
]])
]);
exit();
}
}
}
if($text == "/start" and $carlos['okstart'] == null){
if($tc == "private"){
if( !in_array($from_id,$Dev)){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"☆︙*عزيزي* ← [$name](tg://user?id=$from_id)
☆︙*اهلأ فيك في بوت  مصنع بوتات حمايه*",
'reply_to_message_id'=>$message_id,
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"꙳. ( $nameDev ) .꙳", "url"=>"tg://user?id=$Dev[1]"]],
]])
]);
}
}
}
#----------(carlos)----------#
$malkbot = $carlos['malkbot'];
$malkkbot = $carlos['malkkbot'];
if($re and $text=="نقل الملكية"){
if(in_array($from_id,$Dev)){
bot('sendmessage',[
            'chat_id'=>$re_id,
            'text'=>"
⋄︙تم نقل ملكية البوت اليك 
⋄︙بواسطة ← [$name](tg://user?id=$from_id)
⋄︙اضغط ← /start 
⋄︙للتحكم في البوت كماتحب
",'parse_mode'=>"markdown",'disable_web_page_preview'=>true,
]);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
☆︙بواسطة ← [$name](tg://user?id=$from_id)
☆︙تم تعين المطور جديد بنجاح
",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
]);
$carlos['malk'] = "$re_id";
file_put_contents("data/bot.json",json_encode($carlos));
exit();
}
}
if($text=="نقل الملكية" or $text=="꙳. نقل الملكية"){
if(in_array($from_id,$Dev)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
☆︙عزيزي ← [$name](tg://user?id=$from_id)
☆︙الان قم بأرسال ايدي المطور
",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
]);
$carlos['malkbot'] = "ok_malk";
$carlos['malkkbot'] = "$from_id";
file_put_contents("data/bot.json",json_encode($carlos));
}
}
if($text and preg_match('/([0-9])/i',$text) and $malkbot == "ok_malk" and $malkkbot == $from_id){
bot('sendmessage',[
            'chat_id'=>$text,
            'text'=>"
⋄︙تم نقل ملكية البوت اليك 
⋄︙بواسطة ← [$name](tg://user?id=$from_id)
⋄︙اضغط ← /start 
⋄︙للتحكم في البوت كماتحب
",'parse_mode'=>"markdown",'disable_web_page_preview'=>true,
]);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
☆︙بواسطة ← [$name](tg://user?id=$from_id)
☆︙تم تعين المطور جديد بنجاح
",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
]);
$carlos['malk'] = $text;
$carlos['malkbot'] = "on";
file_put_contents("data/bot.json",json_encode($carlos));
}
if($text=="حذف المالك الثاني" or $text=="꙳. حذف الملكية"){
if(in_array($from_id,$Dev)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
☆︙عزيزي ← [$name](tg://user?id=$from_id)
☆︙تم حذف المطور
☆︙تم اعادة المطور الاساسي
",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
]);
$carlos['malk'] = null;
file_put_contents("data/bot.json",json_encode($carlos));
}
}
#----------(carlos)----------#
$ban_id = $message->reply_to_message->forward_from->id;
if($ban_id && $text == "حظر"){
$apiban = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$ban_id"));
$banuser =$apiban->result->username;
$banname =$apiban->result->first_name;
$banid =$apiban->result->id;
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"⋄︙العضو - [$banname](tg://user?id=$banid)
⋄︙تم حـظـرهه بـنـجاح",
'parse_mode'=>"Markdown",
'reply_to_message_id'=>$message->message_id,
]);
$carlos['ban'][] = "$ban_id";
file_put_contents("data/bot.json",json_encode($carlos));
}
if ($ban_id && $text == "الغاء حظر"){
$apiban = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$ban_id"));
$banuser =$apiban->result->username;
$banname =$apiban->result->first_name;
$banid =$apiban->result->id;
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
⋄︙العضو - [$banname](tg://user?id=$banid)
⋄︙تم الـغـاء حـظـرهه بـنـجاح
",
'parse_mode'=>"Markdown",
'reply_to_message_id'=>$message->message_id,
]);
$key = array_search($ban_id,$carlos["ban"]);
unset($carlos["ban"][$key]);
$carlos["ban"] = array_values($carlos["ban"]); 
$carlos = json_encode($carlos,true);
file_put_contents("data/bot.json",$carlos);
}
#----------(carlos)----------#
if($text=="꙳. المحظورين" and $carlos['ban'] != null){
$banlast = $carlos['ban'];
for($z = 0;$z <= count($banlast)-1;$z++){
$apiban = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$banlast[$z]"));
$banuser =$apiban->result->username;
$banname =$apiban->result->first_name;
$banid =$apiban->result->id;
$result = $result."⋄︙ $z ← [$banname](https://t.me/$banuser) - $banid"."\n";
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"⋄︙اليك قائمة المحظورين : 
ꔹ┉ ┉ ┉ ┉ ┉ ┉ ┉ꔹ
$result",
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id,
 ]);
exit();
}
if($text=="꙳. المحظورين" and $carlos['ban'] == null){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
☆︙عزيزي ← [$name](tg://user?id=$from_id)
☆︙لايوجد محظور حاليأ
",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
]);
}
if($text == "꙳. مسح المحظورين" and $from_id == $admin2){
bot("SendMessage",[
'chat_id'=>$chat_id,
'text'=>"⋄︙بواسطة ⋙ [$name](tg://user?id=$from_id)
⋄︙ تم مسح قائمة المحظورين
",'parse_mode'=>"MARKDOWN",
'reply_to_message_id'=>$message_id,
'disable_web_page_preview'=>true,
]);
$carlos['ban'] = null;
file_put_contents("data/bot.json",json_encode($carlos));
}
#----------(carlos)----------#
$d6 = $carlos['sarat'];
if($text == "꙳. تفعيل التنبية" and in_array($from_id,$Dev)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"☆︙*تم تفعيل التنبية بنجاح*",
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"꙳. تعطيل التنبية"]],
[['text'=>"꙳. رجوع"]],
],
'resize_keyboard'=>true
])
]);
$carlos['sarat'] = "✅";
file_put_contents("data/bot.json",json_encode($carlos));
}
if($text == "꙳. تعطيل التنبية" and in_array($from_id,$Dev)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"☆︙*تم تعطيل التنبية بنجاح*",
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"꙳. تفعيل التنبية"]],
[['text'=>"꙳. رجوع"]],
],
'resize_keyboard'=>true
])
]);
$carlos['sarat'] = "❎";
file_put_contents("data/bot.json",json_encode($carlos));
}
#-----------(carlos)-----------#
$d7 = $carlos['tojahh'];
if($text == "꙳. تفعيل التوجيه" and in_array($from_id,$Dev)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"☆︙*تم تفعيل التوجيه بنجاح*",
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"꙳. تعطيل التوجيه"]],
[['text'=>"꙳. رجوع"]],
],
'resize_keyboard'=>true
])
]);
$carlos['tojahh'] = "✅";
file_put_contents("data/bot.json",json_encode($carlos));
}
if($text == "꙳. تعطيل التوجيه" and in_array($from_id,$Dev)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"☆︙*تم تعطيل التوجيه بنجاح*",
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"꙳. تفعيل التوجيه"]],
[['text'=>"꙳. رجوع"]],
],
'resize_keyboard'=>true
])
]);
$carlos['tojahh'] = "❎";
file_put_contents("data/bot.json",json_encode($carlos));
}
#-----------(carlos)-----------#
if($message and $text != "/start" and $from_id != $Dev[1] and $d7 == "✅" and !$data){
bot('forwardMessage',[
'chat_id'=>$Dev[1],
'from_chat_id'=>$chat_id,
 'message_id'=>$update->message->message_id,
'text'=>$text,
]);
}
#-----------(carlos)-----------#
if($user == null){
$user = "None";
}elseif($user != null){
$user = $user;
}
if($text =='/start' and $from_id !=$Dev[1] and $d6 =="✅"){ 
bot('sendmessage',[ 
'chat_id'=>$Dev[1],  
'text'=>"تم دخول عضو جديد الى البوت ℹ️ :
الاسم : [$name]
المعرف : [@$user]
الايدي : [$from_id](tg://user?id=$from_id)
⎯ ⎯ ⎯ ⎯
",  
'parse_mode'=>"MarkDown", 
'disable_web_page_preview'=>true, 
]);  
}
#-----------(carlos)-----------#
if($text == "꙳. تفعيل البوت" and in_array($from_id,$Dev)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"☆︙*تم تفعيل البوت بنجاح*",
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"꙳. تعطيل البوت"]],
[['text'=>"꙳. رجوع"]],
],
'resize_keyboard'=>true
])
]);
$carlos['bots'] = "✅";
file_put_contents("data/bot.json",json_encode($carlos));
}
if($text == "꙳. تعطيل البوت" and in_array($from_id,$Dev)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"☆︙*تم تعطيل البوت بنجاح*",
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"꙳. تفعيل البوت"]],
[['text'=>"꙳. رجوع"]],
],
'resize_keyboard'=>true
])
]);
$carlos['bots'] = "❎";
file_put_contents("data/carlos.json",json_encode($carlos));
}


if($text and in_array($from_id, $getid) and $check->ok != "true" and !strpos($ch1 , '"status":"left"') !== false){

bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>'عذرا ❗️هاذا التوكن غير صالح ♻️',
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'الغاء ❌','callback_data'=>'cancle']]
]
])
]);
}    

if($data == 'cancle' and in_array($from_id, $getid)){

$str = str_replace($chat_id2, "", $get_id) ;
file_put_contents('make/make.txt', $str);
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'اهلا بك في بوت انشاء بوتات ',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'انشاء بوت  ','callback_data'=>'maka']],

[['text'=>'حذف البوت 🗑','callback_data'=>'delete']],

]    
])
]);
}

if($data == 'home'){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'اهلا بك في بوت انشاء بوتات ',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'انشاء بوت  ','callback_data'=>'maka']],
[
['text'=>'معلوماتك❕','callback_data'=>'info'],
['text'=>'شراء البوت 💸','callback_data'=>'buy']

],

[['text'=>'حذف البوت 🗑','callback_data'=>'delete']],


]    
])
]);
}

if($data == 'delete' and in_array($chat_id2,$done)){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'هل انت متأكد ⁉️ من انك تريد حذف البوت 🗑',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'لا ❌', 'callback_data'=>'home'],
['text'=>'نعم ✅','callback_data'=>'yesdel'],
]    
]])
]);    
}

if($data == 'yesdel' and in_array($chat_id2, $done)){


bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"تم ✅  حذف البوت بنجاح 🗑",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'الصفحة الرئيسية 🏠️' , 'callback_data'=>"home"]
]
]
])
]);



$str1 = str_replace($chat_id2, '', $get_done);

file_put_contents('make/ex.txt', $str1);

$get_token = file_get_contents("bots/$chat_id2/info.txt");

$get_url = file_get_contents("https://api.telegram.org/bot$get_token/getWebhookInfo");

$json = json_decode($get_url);

$url = $json->result->url;

file_get_contents("https://https://api.telegram.org/bot$get_token/deletewebhook?url=$url");

unlink("bots/$chat_id2/bot.php");
unlink("bots/$chat_id2/info.txt");

}


if($data == 'delete' and !in_array($chat_id2,$done)){

bot('answerCallbackQuery',[
'callback_query_id'=>$update->callback_query->id,
'message_id'=>$message_id,
'text'=>'قم ♻️ بأنشاء بوت اولا ~💟',
 'show_alert'=>true
 ]);  
 
}




if($data == 'info' and in_array($chat_id2,$done)){
    
$get_info = file_get_contents("bots/$chat_id2/info.txt");

$url_info = file_get_contents("https://api.telegram.org/bot$get_info/getMe");

$json_info = json_decode($url_info);

$id = $json_info->result->id;

$user = $json_info->result->username;

$name = $json_info->result->first_name;

if($data == 'info' and !in_array($chat_id2,$done)){
bot('answerCallbackQuery',[
'callback_query_id'=>$update->callback_query->id,
'message_id'=>$message_id,
'text'=>'قم ♻️ بأنشاء بوت اولا ~💟',
 'show_alert'=>true
 ]);  
}



} 
