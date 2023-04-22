<?php 
ob_start(); 
$token = "6076098557:AAGIOrMMtN7afAqOZ8syZB4jDnug57EDeUw"; # Token
$userbot="O_0PBOT";

define("API_KEY", $token);
echo "setWebhook ~> <a href=\"https://api.telegram.org/bot".API_KEY."/setwebhook?url=".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME']."\">https://api.telegram.org/bot".API_KEY."/setwebhook?url=".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME']."</a>";
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
}}

# Short
$update = json_decode(file_get_contents("php://input"));
file_put_contents("update.txt",json_encode($update));
$message = $update->message;
$txt = $message->caption;
$text = $message->text;
$chat_id = $message->chat->id;
$from_id = $message->from->id;
$new = $message->new_chat_members;
$message_id = $message->message_id;
$type = $message->chat->type;
$name = $message->from->first_name;
if(isset($update->callback_query)){

$up = $update->callback_query;
$chat_id = $up->message->chat->id;
$from_id = $up->from->id;
$user = $up->from->username;
$name = $up->from->first_name;
$message_id = $up->message->message_id;
$data = $up->data;
}
$id = $update->inline_query->from->id; 
if(isset($update->inline_query)){
$chat_id = $update->inline_query->chat->id;
$from_id = $update->inline_query->from->id;
$name = $update->inline_query->from->first_name.' '.$update->inline_query->from->last_name;
$text_inline = $update->inline_query->query;
$mes_id = $update->inline_query->inline_message_id; 
$user = strtolower($update->inline_query->from->username); 
}
$sudo = array("5394337067","1963679966");
$wathq1 = 1963679966; 

mkdir("sudo");


$get_ban=file_get_contents('sudo/ban.txt');
$ban =explode("\n",$get_ban);
/////////////////////

$member = explode("\n",file_get_contents("sudo/member.txt"));
$cunte = count($member)-1;
$ban = explode("\n",file_get_contents("sudo/ban.txt"));
$countban = count($ban)-1;
//////////


if($message  and in_array($from_id,$ban)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"❌ لا تستطيع استخدام البوت انت محظور ❌
",
]);return false;}


@$infosudo = json_decode(file_get_contents("sudo.json"),true);
if (!file_exists("sudo.json")) {
#	$put = [];
	$infosudo["info"]["admins"][]="$wathq1";
	$infosudo["info"]["pro"]="مجاني";
$infosudo["info"]["fwrmember"]="معطل";
$infosudo["info"]["tnbih"]="مفعل";
$infosudo["info"]["silk"]="مفعل";
$infosudo["info"]["allch"]="مفردة";
$infosudo["info"]["start"]="non";
$infosudo["info"]["klish_sil"]="كليشة الاشتراك الاجباري";


file_put_contents("sudo.json", json_encode($infosudo));
}
$pro=$infosudo["info"]["pro"];
$fwrmember=$infosudo["info"]["fwrmember"];
$tnbih=$infosudo["info"]["tnbih"];
$silk=$infosudo["info"]["silk"];
$allch=$infosudo["info"]["allch"];
$start=$infosudo["info"]["start"];
$klish_sil=$infosudo["info"]["klish_sil"];
$klish_info=$infosudo["info"]["klish_info"];
$admins=$infosudo["info"]["admins"];

if($update and !in_array($from_id,$member) and $type=="private" and ! $data){file_put_contents("sudo/member.txt","$from_id\n",FILE_APPEND);
if($tnbih=="مفعل"){
bot("sendmessage",[
"chat_id"=>$wathq1,
"text"=>"- دخل شخص إلى البوت 🚶‍♂
[....$name](tg://user?id=$from_id) 
- ايديه $from_id 🆔
- معرفة : $user
---------
عدد اعضاء بوتك هو : $cunte
",
'disable_web_page_preview'=>'true',
'parse_mode'=>"markdown",
]);
}
}


$fromjson = json_decode(file_get_contents("from_id.json"),true);
$amrjson=$fromjson["info"][$from_id]["amr"];
function getChatstats($chat_id,$token) {
  $url = 'https://api.telegram.org/bot'.$token.'/getChatAdministrators?chat_id='.$chat_id;
  $result = file_get_contents($url);
  $result = json_decode ($result);
  $result = $result->ok;
  return $result;
}
function getmember($token,$idchannel,$from_id) {
  $join = file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=$idchannel&user_id=".$from_id);
if((strpos($join,'"status":"left"') or strpos($join,'"Bad Request: USER_ID_INVALID"') or strpos($join,'"Bad Request: user not found"') or strpos($join,'"ok": false') or strpos($join,'"status":"kicked"')) !== false){
$wataw="no";}else{$wataw="yes";}
return $wataw;


}
function infolike($code,$from_id){
$likejson = json_decode(file_get_contents("like.json"),true);
$member=$likejson['info'][$code]['member'];
if(!in_array($from_id,$member)){
$stlike="new";
}else{
$stlike="old";
}
return $stlike;
}

function addlike($code,$from_id){
$likejson = json_decode(file_get_contents("like.json"),true);
$likejson['info'][$code]['member'][]="$from_id";
file_put_contents("like.json", json_encode($likejson));
//~~~
$cojson = json_decode(file_get_contents("co.json"),true);
$like=$cojson['info'][$code]['co']+1;
$cojson['info'][$code]['co']="$like";
file_put_contents("co.json", json_encode($cojson));
return $like;
}
//~~~~~~~~~~~//
function dellike($code,$from_id){
$likejson = json_decode(file_get_contents("like.json"),true);
$members=$likejson['info'][$code]['member'];
$index = array_search($from_id, $members);
unset($likejson['info'][$code]['member'][$index]);
$likejson['info'][$code]['member']=array_values($likejson['info'][$code]['member']);

file_put_contents("like.json", json_encode($likejson));
//~~~
$cojson = json_decode(file_get_contents("co.json"),true);
$like=$cojson['info'][$code]['co']-1;
$cojson['info'][$code]['co']="$like";
file_put_contents("co.json", json_encode($cojson));
return $like;
}

function bakup($from_id,$st){

$postss = json_decode(file_get_contents("posts.json"),true);

$like = json_decode(file_get_contents("like.json"),true);
$cojson = json_decode(file_get_contents("co.json"),true);

$bakup['info']['posts']=$postss;
$bakup['info']['co']=$cojson;
$bakup['info']['like']=$like;

file_put_contents("bakup.json", json_encode($bakup));

bot('senddocument',[
'chat_id'=>$from_id,
'document'=>new CURLFile("bakup.json"),
'caption'=>" نسخة احتياطية - $st",

]);

}


$likejson = json_decode(file_get_contents("like.json"),true);
$cojson = json_decode(file_get_contents("co.json"),true);

$mes_id = $update->callback_query->inline_message_id; 

if(preg_match('/^(tsuit) (.*)/s', $data)){
$code = str_replace('tsuit ',"",$data);
$mm = json_decode(file_get_contents("posts.json"),true);
$send=$mm['info'][$code]['send'];
$txt=$mm['info'][$code]['text'];
$f=$mm['info'][$code]['f'];

$st=$mm['info'][$code]['st'];
$id_channel=$mm['info'][$code]["id_channel"];
if($st=="مفعل"){
$stuts = getmember($token,$id_channel,$from_id);
if($stuts=="no"){
bot('answerCallbackQuery',[
            'callback_query_id'=>$update->callback_query->id,
            'text'=>" عذرًا لا تستطيع التصويت اشترك فـي القـناه اولاً .",
            'show_alert'=>true
            ]);
return false;}
}
$posts = json_decode(file_get_contents("posts.json"),true);
$idmem=$posts['info'][$code]['from_id'];
$send=$posts['info'][$code]['send'];
$stzr=$posts['info'][$code]['stzr'];

	

if($code!=null and $send!=null ){

$infolike=infolike($code,$from_id);
if($infolike=="new"){

$like=addlike($code,$from_id);

$keyboard["inline_keyboard"][] =[['text'=>$f ."  $like",'callback_data'=>"tsuit $code"]];
if($stzr=="yes"){
	$namezr=$posts['info'][$code]["namezr"];
	$linkzr=$posts['info'][$code]["linkzr"];

		$keyboard["inline_keyboard"][] = [['text'=>"$namezr",'url'=>"$linkzr"]];
	}


$reply_markup=json_encode($keyboard);

bot('editMessageReplyMarkup',[
		"inline_message_id"=>$mes_id,
			'reply_markup'=>$reply_markup
]);

bot('answerCallbackQuery',[
            'callback_query_id'=>$update->callback_query->id,
            'text'=>" شـكراً عـزيزي تـم تصـويتك بنجـاح .",
            'show_alert'=>true
            ]);

bot('sendmessage',[
'chat_id'=>$idmem,
"text"=>"
- لقد قام  الُْعضُـوَ :【 [ $name](tg://user?id=$from_id) 】

- بالتصويت على المشـاركـه - ► .$txt ◄


- عـدد الايكـات المشـاركه - 【  $like  】
",
'parse_mode'=>'MarkDown',
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[['text'=>'╗ مـشاركه كود العضـو ╔' ,'switch_inline_query_current_chat'=>" #$code"]],
]])
]);   


}
if($infolike=="old"){
$like=dellike($code,$from_id);

$keyboard["inline_keyboard"][] =[['text'=>$f ."  $like",'callback_data'=>"tsuit $code"]];

if($stzr=="yes"){
	$namezr=$posts['info'][$code]["namezr"];
	$linkzr=$posts['info'][$code]["linkzr"];

		$keyboard["inline_keyboard"][] = [['text'=>"$namezr",'url'=>"$linkzr"]];
	}




$reply_markup=json_encode($keyboard);

bot('editMessageReplyMarkup',[
		"inline_message_id"=>$mes_id,
			'reply_markup'=>$reply_markup
]);
bot('answerCallbackQuery',[
            'callback_query_id'=>$update->callback_query->id,
            'text'=>" لقد قمت بالتصويت من قبل لذالك تم سحب تصويتك 
-1",
            'show_alert'=>true
            ]);

bot('sendmessage',[
'chat_id'=>$idmem,
"text"=>"- لقد قام  الُْعضُـوَ :【 [ $name](tg://user?id=$from_id) 】

- بسحب التصويت على المشـاركـه - ► .$txt ◄

- عـدد اللايكات - 【 $like 】
",
'parse_mode'=>'MarkDown',
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[['text'=>'╗ مـشاركه كـود العضـو ╔' ,'switch_inline_query_current_chat'=>" #$code"]],
]])
]);   
}

bakup("-1001477247218","تصويت");

}


}
if($message and $type=="private"){
$false="";
if($allch!="مفردة"){
$infosudo = json_decode(file_get_contents("sudo.json"),true);
$orothe= $infosudo["info"]["channel"];


$keyboard["inline_keyboard"]=[];

foreach($orothe as $co=>$s ){

$namechannel= $s["name"];
$st= $s["st"];
$userchannel=str_replace('@','', $s["user"]);
if($namechannel!=null){
$stuts = getmember($token,$co,$from_id);
if($stuts=="no"){
if($st=="عامة"){
$url="t.me/$userchannel";
$tt=$s["user"];
}else{
$url =$s["user"];
$tt=$s["user"];
}
if($silk=="مفعل"){
	$keyboard["inline_keyboard"][] = [['text'=>$namechannel,'url'=>$url]];

}else{
$txt=$txt."\n".$tt;

}
$false="yes";
}

}

}
$reply_markup=json_encode($keyboard);
if($false=="yes"){
	bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"$klish_sil
$txt
",

'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>$reply_markup,
]);
return $false;}
}else{
$infosudo = json_decode(file_get_contents("sudo.json"),true);
$orothe= $infosudo["info"]["channel"];




foreach($orothe as $co=>$s ){
$keyboard["inline_keyboard"]=[];
$namechannel= $s["name"];
$st= $s["st"];
$userchannel=str_replace('@','', $s["user"]);
if($namechannel!=null){
$stuts = getmember($token,$co,$from_id);
if($stuts=="no"){
if($st=="عامة"){
$url="t.me/$userchannel";
$tt=$s["user"];
}else{
$url =$s["user"];
$tt=$s["user"];

}
if($silk=="مفعل"){
	$keyboard["inline_keyboard"][] = [['text'=>$namechannel,'url'=>$url]];

}


#$reply_markup=json_encode($keyboard);
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"$klish_sil
$tt
",

'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode($keyboard),
]);
return $false;

}

}

}

}


}




if($text=="/start"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
"text"=>"مرحبا  [$name](tg://user?id=$chat_id) 

$start
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>' إنشاء منشور تصويت ➕' ,'callback_data'=>"newpost"]],
[['text'=>'💲 شراء اشتراك مدفوع ' ,'callback_data'=>"bay"]],
[['text'=>'📡| قناة تحديثات البوت   ' ,'url'=>"https://t.me/MANDOZ7"]],
   ] 
   ])
]);
}
if($data=="hooome"){
$fromjson["info"][$from_id]["amr"]="non";
file_put_contents("from_id.json", json_encode($fromjson));
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
"text"=>" مرحبا [$name](tg://user?id=$from_id)

$start
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>' إنشاء منشور تصويت ➕' ,'callback_data'=>"newpost"]],
[['text'=>'💲 شراء اشتراك مدفوع ' ,'callback_data'=>"bay"]],
[['text'=>'📡| قناة تحديثات البوت   ' ,'url'=>"https://t.me/MANDOZ7"]],
   ] 
   ])
]);
}

if($data=="bay"){
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
"text"=>" مرحبا [$name](tg://user?id=$from_id)

- لشراء عضوية مدفوعة قم بمراسلة مالك البوت .
@AZ_Z7
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'العودة  ' ,'callback_data'=>"hooome"]],

   ] 
   ])
]);
}
if($data=="newpost"){
$fromjson["info"][$from_id]["amr"]="newpost";
file_put_contents("from_id.json", json_encode($fromjson));
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
"text"=>" مرحبا [$name](tg://user?id=$from_id)

- قم بإرسال ( نص او صورة )  .
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'الغاء  ' ,'callback_data'=>"hooome"]],

   ] 
   ])
]);
}

if($text and !$date and $amrjson=="newpost"){
$fromjson["info"][$from_id]["amr"]="vice";
$fromjson["info"][$from_id]["انشاء"]["st"]="معطل";
$fromjson["info"][$from_id]["انشاء"]["stzr"]="no";
$fromjson["info"][$from_id]["انشاء"]["send"]="text";
$fromjson["info"][$from_id]["انشاء"]["text"]="$text";
file_put_contents("from_id.json", json_encode($fromjson));




bot('sendmessage',[
'chat_id'=>$from_id,
'message_id'=>$message_id,
"text"=>"قم بإرسال فيس التصويت 
- يقبل البوت فيس واحد فقط 
",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'الغاء  ' ,'callback_data'=>"hooome"]],

   ] 
   ])
]);




}


if($update->message->photo and !$date and $amrjson=="newpost"){
$file_id = $update->message->photo[2]->file_id;

$fromjson["info"][$from_id]["amr"]="وصف";
$fromjson["info"][$from_id]["انشاء"]["st"]="معطل";
$fromjson["info"][$from_id]["انشاء"]["send"]="photo";
$fromjson["info"][$from_id]["انشاء"]["file_id"]="$file_id";

file_put_contents("from_id.json", json_encode($fromjson));

bot('sendmessage',[
'chat_id'=>$from_id,
'message_id'=>$message_id,
"text"=>"قم بإرسال وصف الصورة 
",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'الغاء  ' ,'callback_data'=>"hooome"]],

   ] 
   ])
   ]);
}

if($text and !$date and $amrjson=="وصف"){
$fromjson["info"][$from_id]["amr"]="vice";
$fromjson["info"][$from_id]["انشاء"]["text"]="$text";
file_put_contents("from_id.json", json_encode($fromjson));




bot('sendmessage',[
'chat_id'=>$from_id,
'message_id'=>$message_id,
"text"=>"قم بإرسال فيس التصويت 
- نص او فيس زر التصويت 
",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'الغاء  ' ,'callback_data'=>"hooome"]],

   ] 
   ])
]);
}

if($text and !$date and $amrjson=="vice"){
$fromjson["info"][$from_id]["amr"]="none";

$fromjson["info"][$from_id]["انشاء"]["f"]="$text";
file_put_contents("from_id.json", json_encode($fromjson));



bot('sendmessage',[
'chat_id'=>$from_id,
'message_id'=>$message_id,
"text"=>"✅ قم بإختيار نوعية التصويت للمنشور 
",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'إشـتراك اجبـاري للقـناتك   ' ,'callback_data'=>"ashtrakajbare"]],
[['text'=>'بدون اشـتراك اجبـاري للقـناتك   ' ,'callback_data'=>"noashtrakajbare"]],

   ] 
   ])
]);
}

if($data=="noashtrakajbare"){
bot('deletemessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
]);


bot('sendmessage',[
'chat_id'=>$from_id,
'message_id'=>$message_id,
"text"=>"

✅ تم ضبط المنشور نوعية الاشتراك ( غير اجباري ) .

هل تريد الحفظ ؟
",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>' الغاء  ' ,'callback_data'=>"hooome"]],
[['text'=>'  متابعة الانشاء  ' ,'callback_data'=>"savee"]],


   ] 
   ])
]);

}
if($data=="ashtrakajbare"){

if($pro=="مجاني"){

$fromjson["info"][$from_id]["amr"]="addch";
file_put_contents("from_id.json", json_encode($fromjson));
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
"text"=>" مرحبا [$name](tg://user?id=$from_id)
📌 اذا كانت قناة الاشتراك الجباري عامة قم فقط بارسال معرف القناة اما اذا كانت خاصة قم بإعادة توجية منشور من القناة الى البوت.

⚠تنوية : يجب ان تقوم برفع البوت ادمن في القناة قبل ارسال المعرف او ارسال التوجية .
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'الغاء  ' ,'callback_data'=>"hooome"]],

   ] 
   ])
]);
}else{
if(in_array($from_id,$admins) or in_array($from_id,$sudo) ){

$fromjson["info"][$from_id]["amr"]="addch";
file_put_contents("from_id.json", json_encode($fromjson));
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
"text"=>" مرحبا [$name](tg://user?id=$from_id)
📌 اذا كانت قناة الاشتراك الجباري عامة قم فقط بارسال معرف القناة اما اذا كانت خاصة قم بإعادة توجية منشور من القناة الى البوت.

⚠تنوية : يجب ان تقوم برفع البوت ادمن في القناة قبل ارسال المعرف او ارسال التوجية .
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'الغاء  ' ,'callback_data'=>"hooome"]],

   ] 
   ])
]);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
"text"=>" مرحبا [$name](tg://user?id=$from_id)
🚫 لا تستطيع وضع اشـتراك اجبـاري للقـناتك  لمنشوراتك
 هذة الميزة مدفوعة 
- لشراء عضوية مدفوعة قم بمراسلة مالك البوت .
@AZ_Z7
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'متابعة بدون اشـتراك اجبـاري للقـناتك   ' ,'callback_data'=>"noashtrakajbare"]],
[['text'=>'الغاء  ' ,'callback_data'=>"hooome"]],

   ] 
   ])
]);
}
}
}


if($text   and !$date and $text !="/start" and $amrjson=="addch"  and !$message->forward_from_chat ){
bot('deletemessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id-1,
]);
$ch_id = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$text"))->result->id;
$idchan=$ch_id;
if($ch_id != null){

  $checkadmin = getChatstats($text,$token);
  if($checkadmin == true){
$namechannel = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$text"))->result->title;
$fromjson["info"][$from_id]["amr"]="non";
$fromjson["info"][$from_id]["انشاء"]["st"]="مفعل";
$fromjson["info"][$from_id]["انشاء"]["id_channel"]="$idchan";
$fromjson["info"][$from_id]["انشاء"]["name_channel"]="$namechannel";
$fromjson["info"][$from_id]["انشاء"]["user"]="$text";
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"
✅ تم إضافة القناة بنجاح عزيز 
info channel 
user : $text 
name : $namechannel
id : $ch_id
 ",
 'reply_markup'=>json_encode(['inline_keyboard'=>[

 [['text'=>"- تغيير القناة  ",'callback_data'=>"ashtrakajbare"]],
[['text'=>'  متابعة الانشاء  ' ,'callback_data'=>"savee"]],
 ]])
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"❌ البوت ليس ادمن في القناة 
- قم برفع البوت اولا لكي تتمكن من إضافتها 
 ",
'reply_markup'=>json_encode(['inline_keyboard'=>[

 [['text'=>"- تغيير القناة  ",'callback_data'=>"ashtrakajbare"]],

 ]])
]);

}
}else{
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"
❌ لم تتم إضافة القناة لا توجد قناة تمتلك هذا المعرف 
$text ",
'reply_markup'=>json_encode(['inline_keyboard'=>[

 [['text'=>"- تغيير القناة  ",'callback_data'=>"ashtrakajbare"]],
 ]])
]);
}

file_put_contents("from_id.json", json_encode($fromjson));
return $false;
}
if($message->forward_from_chat and $amrjson=="addch"){
bot('deletemessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id-1,
]);
$id_channel= $message->forward_from_chat->id;
if($id_channel != null){
  $checkadmin = getChatstats($id_channel,$token);
  if($checkadmin == true){
$namechannel = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$text"))->result->title;
$fromjson["info"][$from_id]["انشاء"]["id_channel"]="$id_channel";
$fromjson["info"][$from_id]["انشاء"]["name_channel"]="$namechannel";
$fromjson["info"][$from_id]["amr"]="link";
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"
✅ تم إضافة القناة بنجاح عزيزي 
info channel 
user : • قناة خاصة • 
name : $namechannel
id : $id_channel

* الان قم بإرسال رابط القناة الخاص .
 ",
 'reply_markup'=>json_encode(['inline_keyboard'=>[
 
 [['text'=>"- تغيير القناة  ",'callback_data'=>"ashtrakajbare"]]
 ]])
 ]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"❌ البوت ليس ادمن في القناة 
- قم برفع البوت اولا لكي تتمكن من إضافتها 
 ",
'reply_markup'=>json_encode(['inline_keyboard'=>[

 [['text'=>"- تغيير القناة  ",'callback_data'=>"ashtrakajbare"]]
  ]])
]);

}
#return $false;
}

file_put_contents("from_id.json", json_encode($fromjson));
}


if($text and !$data and $text !="/start" and $amrjson=="link" and !$message->forward_from_chat ){
if(preg_match('/^(.*)([Hh]ttp|[Hh]ttps|t.me)(.*)|([Hh]ttp|[Hh]ttps|t.me)(.*)|(.*)([Hh]ttp|[Hh]ttps|t.me)|(.*)[Tt]elegram.me(.*)|[Tt]elegram.me(.*)|(.*)[Tt]elegram.me|(.*)[Tt].me(.*)|[Tt].me(.*)|(.*)[Tt].me/',$text))
{
$fromjson["info"][$from_id]["انشاء"]["user"]="$text";
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"
✅ تم حفظ رابط القناة بنجاح عزيزي 
info channel 
link : $text 
 ", 'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>'  متابعة الانشاء  ' ,'callback_data'=>"savee"]],
 ]])
]);
$fromjson["info"][$from_id]["amr"]="non";
$fromjson["info"][$from_id]["انشاء"]["st"]="مفعل";
file_put_contents("from_id.json", json_encode($fromjson));

}
}





if($data=="savee"){
bot('deletemessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
]);
$fromjson = json_decode(file_get_contents("from_id.json"),true);
$amrjson=$fromjson["info"][$from_id]["amr"];

$send=$fromjson["info"][$from_id]["انشاء"]["send"];
$tx=$fromjson["info"][$from_id]["انشاء"]["text"];
$file=$fromjson["info"][$from_id]["انشاء"]["file_id"];
$f=$fromjson["info"][$from_id]["انشاء"]["f"];



if($send=="text"){
bot('sendmessage',[
'chat_id'=>$from_id,
'message_id'=>$message_id,
"text"=>"$tx
",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"$f",'callback_data'=>"null"]],

   ] 
   ])
]);
}
if($send=="photo"){
bot('sendphoto',[
'chat_id'=>$from_id,
'photo'=>$file,
"caption"=>"$tx
",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"$f",'callback_data'=>"null"]],

   ] 
   ])
]);
}

bot('sendmessage',[
'chat_id'=>$from_id,
'message_id'=>$message_id,
"text"=>"هذا هو المنشور .
هل تريد الحفظ ؟!
",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'➕ اضافة زر شفاف  ' ,'callback_data'=>"addzrar"]],
[['text'=>'  حفط 💾 ' ,'callback_data'=>"save"]],

   ] 
   ])
]);

}

if($data=="addzrar"){
$fromjson["info"][$from_id]["amr"]="addzrar";
file_put_contents("from_id.json", json_encode($fromjson));
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
"text"=>" مرحبا [$name](tg://user?id=$from_id)

- قم بإرسال عنوان الزر الشفـاف
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'عودة  ' ,'callback_data'=>"savee"]],

   ] 
   ])
]);
}


if($text and !$date and $amrjson=="addzrar"){
$fromjson["info"][$from_id]["amr"]="linkzr";
$fromjson["info"][$from_id]["انشاء"]["namezr"]="$text";

file_put_contents("from_id.json", json_encode($fromjson));
bot('sendmessage',[
'chat_id'=>$from_id,
'message_id'=>$message_id,
"text"=>"قم بإرسال رابط الشفاف
",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'عودة  ' ,'callback_data'=>"savee"]],

   ] 
   ])
]);
}
if($text and !$date and $amrjson=="linkzr"){
$fromjson["info"][$from_id]["amr"]="none";
$fromjson["info"][$from_id]["انشاء"]["stzr"]="yes";
$fromjson["info"][$from_id]["انشاء"]["linkzr"]="$text";

file_put_contents("from_id.json", json_encode($fromjson));
bot('sendmessage',[
'chat_id'=>$from_id,
'message_id'=>$message_id,
"text"=>"تم حفظ الزر بنجاح ",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'متابعة  ' ,'callback_data'=>"saveee"]],

   ] 
   ])
]);
}

if($data=="saveee"){
bot('deletemessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
]);
$fromjson = json_decode(file_get_contents("from_id.json"),true);
$amrjson=$fromjson["info"][$from_id]["amr"];

$send=$fromjson["info"][$from_id]["انشاء"]["send"];
$tx=$fromjson["info"][$from_id]["انشاء"]["text"];
$file=$fromjson["info"][$from_id]["انشاء"]["file_id"];
$f=$fromjson["info"][$from_id]["انشاء"]["f"];
$stzr=$fromjson["info"][$from_id]["انشاء"]["stzr"];

	$keyboard["inline_keyboard"]=[];
	$keyboard["inline_keyboard"][] = [['text'=>"$f",'callback_data'=>"null"]];
	if($stzr=="yes"){
	
	$namezr=$fromjson["info"][$from_id]["انشاء"]["namezr"];
	$linkzr=$fromjson["info"][$from_id]["انشاء"]["linkzr"];
	
		$keyboard["inline_keyboard"][] = [['text'=>"$namezr",'url'=>"$linkzr"]];
	
	
	}
	
$reply_markup=json_encode($keyboard);
	


if($send=="text"){
bot('sendmessage',[
'chat_id'=>$from_id,
'message_id'=>$message_id,
"text"=>"$tx
",
'disable_web_page_preview'=>true,
'reply_markup'=>$reply_markup
]);
}
if($send=="photo"){
bot('sendphoto',[
'chat_id'=>$from_id,
'photo'=>$file,
"caption"=>"$tx
",
'disable_web_page_preview'=>true,
'reply_markup'=>$reply_markup
]);
}

bot('sendmessage',[
'chat_id'=>$from_id,
'message_id'=>$message_id,
"text"=>"هذا هو المنشور .
هل تريد الحفظ ؟!
",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'  حفط 💾 ' ,'callback_data'=>"save"]],

   ] 
   ])
]);

}







if($data=="save"){
$fromjson = json_decode(file_get_contents("from_id.json"),true);
$amrjson=$fromjson["info"][$from_id]["amr"];

$send=$fromjson["info"][$from_id]["انشاء"]["send"];
$tx=$fromjson["info"][$from_id]["انشاء"]["text"];
$file=$fromjson["info"][$from_id]["انشاء"]["file_id"];
$f=$fromjson["info"][$from_id]["انشاء"]["f"];
$st=$fromjson["info"][$from_id]["انشاء"]["st"];
$id_channel=$fromjson["info"][$from_id]["انشاء"]["id_channel"];
$user_ch=$fromjson["info"][$from_id]["انشاء"]["user"];

	$stzr=$fromjson["info"][$from_id]["انشاء"]["stzr"];

	$namezr=$fromjson["info"][$from_id]["انشاء"]["namezr"];
	$linkzr=$fromjson["info"][$from_id]["انشاء"]["linkzr"];
	

if(isset($fromjson["info"][$from_id]["انشاء"])){
$code = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), -20);

bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
"text"=>"
- تم الحفظ الكود بنجاح 
- كود المشاركـه 
`@$userbot #$code`
",
'disable_web_page_preview'=>true,
'parse_mode'=>'MarkDown',
'reply_to_message_id'=>$message->message_id,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[['text'=>"مشـاركه المـنشور", 'switch_inline_query'=>" #$code"]],
[['text'=>' إنشاء منشور تصويت ➕' ,'callback_data'=>"newpost"]],
]])
]);   
}
$postss = json_decode(file_get_contents("posts.json"),true);
$postss['info'][$code]['from_id']="$from_id";
$postss['info'][$code]['send']="$send";
if($send=="photo"){
$postss['info'][$code]['file_id']="$file";
}
$postss['info'][$code]['f']="$f";
$postss['info'][$code]['text']="$tx";
if($st=="مفعل"){
$postss['info'][$code]['st']="مفعل";
$postss['info'][$code]['id_channel']="$id_channel";
$postss['info'][$code]['user']="$user_ch";
}

if($stzr=="yes"){
$postss['info'][$code]['stzr']="yes";
$postss['info'][$code]['namezr']="$namezr";
$postss['info'][$code]['linkzr']="$linkzr";
}
file_put_contents("posts.json", json_encode($postss));
$cojson = json_decode(file_get_contents("co.json"),true);
$cojson['info'][$code]['co']="0";
file_put_contents("co.json", json_encode($cojson));

file_put_contents("from_id.json", json_encode($fromjson));

bakup("-1001477247218","صنع");
}




if(isset($update->inline_query))
{ 

if($text_inline!=null ){
 if( strpos($text_inline,'#')===false){



 bot('answerInlineQuery',[
'inline_query_id'=>$update->inline_query->id,    
'cache_time'=>'0',
"results" => json_encode([
[
'type'=>'article',
            'id'=>base64_encode(rand(5,555)),
'title'=>'انشآء منشورات لايك',
'description' => "انشاء  ", 'input_message_content'=>[
'parse_mode'=>'HTML',
'message_text'=>"
.$start

"],
            'reply_markup'=>['inline_keyboard'=>[
[
['text'=>" انشاء منشورات 📝",'url'=>"https://telegram.me/$userbot?start"]], 

]]
]

]
)
#نهاية الازرار
]);

}else{
$code=str_replace('#','',$text_inline);
$mm = json_decode(file_get_contents("posts.json"),true);
$send=$mm['info'][$code]['send'];
$txt=$mm['info'][$code]['text'];
$co=$mm['info'][$code]['co'];
$st=$mm['info'][$code]['st'];
$f=$mm['info'][$code]["f"];

$stzr=$mm['info'][$code]['stzr'];

	$keyboard["inline_keyboard"]=[];
	$keyboard["inline_keyboard"][] = [['text'=>$f."  $co" ,'callback_data'=>"tsuit $code"]];
	if($stzr=="yes"){
	
	$namezr=$mm['info'][$code]["namezr"];
	$linkzr=$mm['info'][$code]["linkzr"];
	
		$keyboard["inline_keyboard"][] = [['text'=>"$namezr",'url'=>"$linkzr"]];
	
	
	}
	




if($st=="مفعل"){
$user_ch=$mm['info'][$code]['user'];
 $ss="$user_ch";}   
 
 
 if($send=="text" ){
 
 bot('answerInlineQuery',[
'inline_query_id'=>$update->inline_query->id,    
'cache_time'=>'0',
"results" => json_encode([
[
'type'=>'article',
            'id'=>base64_encode(rand(5,555)),
'title'=>$txt,
'description' => " $txt  ", 'input_message_content'=>[
'message_text'=>"
.$txt

$ss
" , 'disable_web_page_preview'=>true,],
'reply_markup'=>$keyboard,


]

]
)
#نهاية الازرار
]);
 
 
 }

 if($send=="photo" ){

$file_id=$mm['info'][$code]['file_id'];
 bot('answerInlineQuery',[ 
            'inline_query_id'=>$update->inline_query->id,   
              'cache_time'=>'0',
            'results' => json_encode([[
             
                'type'=>'photo', 
 'id'=>base64_encode(rand(5,555)), 
"photo_file_id"=>"$file_id", 
"thumb_url"=>"$file_id", 
"caption"=>"$txt\n$ss", 'reply_markup'=>$keyboard,


            
          ]]) 
        ]); 

}
}
}else{
bot('answerInlineQuery',[
'inline_query_id'=>$update->inline_query->id,    
'cache_time'=>'0',
"results" => json_encode([
[
'type'=>'article',
            'id'=>base64_encode(rand(5,555)),
'title'=>'انشآء منشورات لايك',
'description' => "انشاء  ", 'input_message_content'=>[
'parse_mode'=>'HTML',
'message_text'=>"
.$start

"],
            'reply_markup'=>['inline_keyboard'=>[
[
['text'=>" انشاء منشورات 📝",'url'=>"https://telegram.me/$userbot?start"]], 

]]
]

]
)
#نهاية الازرار
]);


}
}
if($countban<=0){
$countban="لايوجد محظورين";
}
if($text == "/start" and in_array($from_id,$sudo)){

bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"اهلا بك عزيزي الادمن في قائمة التحكم الخاص 

- الاحصائية : 

• عدد الاعضاء : $cunte

• المحظورين: $countban

",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"- تعيين رسالة /start ",'callback_data'=>"start"]],
[['text'=>"- المنشورات المصنوعة :$pro",'callback_data'=>"stpro"]],
[['text'=>"- التوجية من الاعضاء :$fwrmember",'callback_data'=>"fwrmember"]],
[['text'=>"- تنبية دخول الاعضاء : $tnbih",'callback_data'=>"tnbih"]],
[['text'=>"- حظر عضو ",'callback_data'=>"ban"],['text'=>"- الغاء حظر عضو ",'callback_data'=>"unban"]],
[['text'=>"- مسح قائمة الحظر ",'callback_data'=>"unbanall"]],
[['text'=>"- قسم الادمنية ",'callback_data'=>"admins"],['text'=>"- قسم الاذاعة ",'callback_data'=>"sendmessage"]],
[['text'=>"مسح قناة",'callback_data'=>"delchannel"],['text'=>"إضافة قناة",'callback_data'=>"addchannel"]],[['text'=>"- عرض قنوات الاشتراك الاجباري ",'callback_data'=>"viwechannel"]],
[['text'=>"- تعيين رسالة الاشتراك الاجباري ",'callback_data'=>"klish_sil"]],
[['text'=>"- خيارات عرض الاشتراك الاجباري ",'callback_data'=>"null"]],
[['text'=>"- ازرار انلاين :$silk ",'callback_data'=>"silk"],
['text'=>"- الرسالة :$allch ",'callback_data'=>"allch"]],

]
])
]);
}

function sendwataw($chat_id,$message_id){

$infosudo = json_decode(file_get_contents("sudo.json"),true);
$fwrmember=$infosudo["info"]["fwrmember"];
$pro=$infosudo["info"]["pro"];
$tnbih=$infosudo["info"]["tnbih"];
$silk=$infosudo["info"]["silk"];
$allch=$infosudo["info"]["allch"];
$member = explode("\n",file_get_contents("sudo/member.txt"));
$cunte = count($member)-1;
$ban = explode("\n",file_get_contents("sudo/ban.txt"));
$countban = count($ban)-1;
if($countban<=0){
$countban="لايوجد محظورين";
}	

bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"اهلا بك عزيزي الادمن في قائمة التحكم الخاص 

- الاحصائية : 

• عدد الاعضاء : $cunte

• المحظورين: $countban

",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"- تعيين رسالة /start ",'callback_data'=>"start"]],
[['text'=>"- المنشورات المصنوعة :$pro",'callback_data'=>"stpro"]],
[['text'=>"- التوجية من الاعضاء :$fwrmember",'callback_data'=>"fwrmember"]],


[['text'=>"- تنبية دخول الاعضاء : $tnbih",'callback_data'=>"tnbih"]],
[['text'=>"- حظر عضو ",'callback_data'=>"ban"],['text'=>"- الغاء حظر عضو ",'callback_data'=>"unban"]],
[['text'=>"- مسح قائمة الحظر ",'callback_data'=>"unbanall"]],
[['text'=>"- قسم الادمنية ",'callback_data'=>"admins"],['text'=>"- قسم الاذاعة ",'callback_data'=>"sendmessage"]],
[['text'=>"مسح قناة",'callback_data'=>"delchannel"],['text'=>"إضافة قناة",'callback_data'=>"addchannel"]],

[['text'=>"- عرض قنوات الاشتراك الاجباري ",'callback_data'=>"viwechannel"]],
[['text'=>"- تعيين رسالة الاشتراك الاجباري ",'callback_data'=>"klish_sil"]],
[['text'=>"- خيارات عرض الاشتراك الاجباري ",'callback_data'=>"null"]],
[['text'=>"- ازرار انلاين :$silk ",'callback_data'=>"silk"],
['text'=>"- الرسالة :$allch ",'callback_data'=>"allch"]],

]
])
]);
} 
  

//~~~~~~~~~~~//
if($data == "ban"){
$infosudo["info"]["amr"]="ban";
file_put_contents("sudo.json", json_encode($infosudo));
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- قم بارسال أيدي العضو لحظره",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"- الغاء  ",'callback_data'=>"home"]],
]
])
]);

}
if($text  and $text !="/start" and $infosudo["info"]["amr"]=="ban" and in_array($from_id,$sudo) and is_numeric($text)){
if(!in_array($text,$ban)){

file_put_contents("sudo/ban.txt","$text\n",FILE_APPEND);

bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"- ✅ تم حظر العضو بنجاح 
$text",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"- عودة  ",'callback_data'=>"home"]],
]
])
]);
bot('sendmessage',[
'chat_id'=>$text, 
'text'=>"❌ لقد قام الادمن بحظرك من استخدام البوت",
]);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"🚫 العضو محظور مسبقاً",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"- عودة  ",'callback_data'=>"home"]],
]
])
]);

}
$infosudo["info"]["amr"]="null";
file_put_contents("sudo.json", json_encode($infosudo));
}
#الغاء الحظر
if($data == "unban"){
$infosudo["info"]["amr"]="unban";
file_put_contents("sudo.json", json_encode($infosudo));
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- قم بارسال أيدي العضو للإلغاء الحظر عنه",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"- الغاء  ",'callback_data'=>"home"]],
]
])
]);

}
if($text  and $text !="/start" and $infosudo["info"]["amr"]=="ban" and in_array($from_id,$sudo) and is_numeric($text)){
if(in_array($text,$ban)){

$str=file_get_contents("sudo/ban.txt");
$str=str_replace("$text\n",'',$str);
file_put_contents("sudo/ban.txt",$str);

bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"- ✅ تم الغاء حظر العضو بنجاح 
$text",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"- عودة  ",'callback_data'=>"home"]],
]
])
]);

bot('sendmessage',[
'chat_id'=>$text, 
'text'=>"✅ لقد قام الادمن بالغاء الحظر عنك  .",
]);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"🚫 العضو ليسِ محظور مسبقاً",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"- عودة  ",'callback_data'=>"home"]],
]
])
]);

}
$infosudo["info"]["amr"]="null";
file_put_contents("sudo.json", json_encode($infosudo));
}

if($data == "unbanall"){
if($countban>0){
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- ✅ تم مسح قائمة المحظورين بنجاح ",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"- الغاء  ",'callback_data'=>"home"]],
]
])
]);
}else{
bot('answercallbackquery',[
        'callback_query_id'=>$update->callback_query->id,
        'text'=>"🚫 ليس لديك اعضاء محظورين ",
        'show_alert'=>true
        ]);

}
}




if($data == "start"){
$infosudo["info"]["amr"]="start";
file_put_contents("sudo.json", json_encode($infosudo));
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- قم بارسال نص رسالة /start
",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"- الغاء  ",'callback_data'=>"home"]],
]
])
]);

}
if($text  and $text !="/start" and $infosudo["info"]["amr"]=="start" and in_array($from_id,$sudo)){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"- ✅ تم حفظ كليشة /start 
-الكليشة : 
$text ",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"- عودة  ",'callback_data'=>"home"]],
]
])
]);
$infosudo["info"]["amr"]="null";
$infosudo["info"]["start"]="$text";
file_put_contents("sudo.json", json_encode($infosudo));
}

if($data == "stpro"){
$infosudo = json_decode(file_get_contents("sudo.json"),true);
$pro=$infosudo["info"]["pro"];
if($pro=="مجاني"){
$infosudo["info"]["pro"]="مدفوع";
}
if($pro=="مدفوع"){
$infosudo["info"]["pro"]="مجاني";
}
file_put_contents("sudo.json", json_encode($infosudo));
sendwataw($chat_id,$message_id);
}
if($data == "klish_sil"){
$infosudo["info"]["amr"]="klish_sil";
file_put_contents("sudo.json", json_encode($infosudo));
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- قم بارسال كليشة الاشتراك الاجباريي 
",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"- الغاء  ",'callback_data'=>"home"]],
]
])
]);

}
if($text  and $text !="/start" and $infosudo["info"]["amr"]=="klish_sil" and in_array($from_id,$sudo)){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"- ✅ تم حفظ كليشة الاشتراك الاجباري 
-الكليشة : 
$text ",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"- عودة  ",'callback_data'=>"home"]],
]
])
]);
$infosudo["info"]["amr"]="null";
$infosudo["info"]["klish_sil"]="$text";
file_put_contents("sudo.json", json_encode($infosudo));
}

if($data == "home" and in_array($from_id,$sudo)){
$infosudo["info"]["amr"]="null";
file_put_contents("sudo.json", json_encode($infosudo));
sendwataw($chat_id,$message_id);
}
if($data == "fwrmember"){
$infosudo = json_decode(file_get_contents("sudo.json"),true);
$fwrmember=$infosudo["info"]["fwrmember"];
if($fwrmember=="مفعل"){
$infosudo["info"]["fwrmember"]="معطل";
}
if($fwrmember=="معطل"){
$infosudo["info"]["fwrmember"]="مفعل";
}
file_put_contents("sudo.json", json_encode($infosudo));
sendwataw($chat_id,$message_id);
}
if($data == "tnbih"){
$infosudo = json_decode(file_get_contents("sudo.json"),true);
$tnbih=$infosudo["info"]["tnbih"];
if($tnbih=="مفعل"){
$infosudo["info"]["tnbih"]="معطل";
}
if($tnbih=="معطل"){
$infosudo["info"]["tnbih"]="مفعل";
}
file_put_contents("sudo.json", json_encode($infosudo));
sendwataw($chat_id,$message_id);
}

if($data == "silk"){
$infosudo = json_decode(file_get_contents("sudo.json"),true);
$skil=$infosudo["info"]["silk"];
if($skil=="مفعل"){
$infosudo["info"]["silk"]="معطل";
}
if($skil=="معطل"){
$infosudo["info"]["silk"]="مفعل";
}
file_put_contents("sudo.json", json_encode($infosudo));
sendwataw($chat_id,$message_id);
}

if($data == "allch"){
$infosudo = json_decode(file_get_contents("sudo.json"),true);
$allch=$infosudo["info"]["allch"];
if($allch=="مفردة"){
$infosudo["info"]["allch"]="مجموعة";
}
if($allch=="مجموعة"){
$infosudo["info"]["allch"]="مفردة";
}
file_put_contents("sudo.json", json_encode($infosudo));
sendwataw($chat_id,$message_id);
}


if($data == "addchannel"){
$infosudo = json_decode(file_get_contents("sudo.json"),true);
$orothe= $infosudo["info"]["channel"];
$count=count($orothe);
if($count<4){
$infosudo["info"]["amr"]="addchannel";
file_put_contents("sudo.json", json_encode($infosudo));
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- اذا كانت القناة التي تريد اضافتها عامة قم بارسال معرفها .
* اذا كانت خاصة قم بإعادة توجية منشور من القناة إلى هنا .
",

'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"- الغاء  ",'callback_data'=>"home"]],
]
])
]);
}else{
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- 🚫 لا يمكنك اضافة اكثر من  3 قنوات للإشتراك الاجباري 
",

'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"- عودة  ",'callback_data'=>"home"]],
]
])
]);
}
}
if($text  and $text !="/start" and $infosudo["info"]["amr"]=="addchannel" and in_array($from_id,$sudo) and !$message->forward_from_chat ){

$ch_id = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$text"))->result->id;
$idchan=$ch_id;
if($ch_id != null){

  $checkadmin = getChatstats($text,$token);
  if($checkadmin == true){
$namechannel = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$text"))->result->title;
$infosudo["info"]["channel"][$ch_id]["st"]="عامة";
$infosudo["info"]["channel"][$ch_id]["user"]="$text";
$infosudo["info"]["channel"][$ch_id]["name"]="$namechannel";
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"
✅ تم إضافة القناة بنجاح عزيزي الادمن 
info channel 
user : $text 
name : $namechannel
id : $ch_id
 ",
 'reply_markup'=>json_encode(['inline_keyboard'=>[

 [['text'=>"- إضافة قناة آخرى  ",'callback_data'=>"addchannel"]],
 ]])
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"❌ البوت ليس ادمن في القناة 
- قم برفع البوت اولا لكي تتمكن من إضافتها 
 ",
'reply_markup'=>json_encode(['inline_keyboard'=>[

 [['text'=>"- إعادة المحاولة   ",'callback_data'=>"addchannel"]],
 ]])
]);

}
}else{
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"
❌ لم تتم إضافة القناة لا توجد قناة تمتلك هذا المعرف 
$text ",
'reply_markup'=>json_encode(['inline_keyboard'=>[
 [['text'=>"- عودة   ",'callback_data'=>"home"]],
 ]])
]);
}
$infosudo["info"]["amr"]="null";
file_put_contents("sudo.json", json_encode($infosudo));
}
if($message->forward_from_chat and $infosudo["info"]["amr"]=="addchannel" and in_array($from_id, $sudo)){
$id_channel= $message->forward_from_chat->id;
if($id_channel != null){

  $checkadmin = getChatstats($id_channel,$token);
  if($checkadmin == true){
$namechannel = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$id_channel"))->result->title;
$infosudo["info"]["channel_id"]="$id_channel";


bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"
✅ تم إضافة القناة بنجاح عزيزي الادمن 
info channel 
user : • قناة خاصة • 
name : $namechannel
id : $id_channel

*يجب عليك ارسال رابط القناة الخاص قم بارسالة الان
 ",
 'reply_markup'=>json_encode(['inline_keyboard'=>[

 [['text'=>"- الغاء ",'callback_data'=>"addchannel"]],
 ]])
 ]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"❌ البوت ليس ادمن في القناة 
- قم برفع البوت اولا لكي تتمكن من إضافتها 
 ",
'reply_markup'=>json_encode(['inline_keyboard'=>[

 [['text'=>"- إعادة المحاولة   ",'callback_data'=>"addchannel"]],
 ]])
]);

}
}
$infosudo["info"]["amr"]="channel_id";
file_put_contents("sudo.json", json_encode($infosudo));
}
$channel_id=$infosudo["info"]["channel_id"];

if($text  and $text !="/start" and $infosudo["info"]["amr"]=="channel_id" and in_array($from_id,$sudo) and !$message->forward_from_chat ){

  $checkadmin = getChatstats($channel_id,$token);
  if($checkadmin == true){
$namechannel = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$channel_id"))->result->title;
$infosudo["info"]["channel"][$channel_id]["st"]="خاصة";
$infosudo["info"]["channel"][$channel_id]["user"]="$text";
$infosudo["info"]["channel"][$channel_id]["name"]="$namechannel";
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"
✅ تم إضافة القناة بنجاح عزيزي الادمن 

معـلومات القناه . 
نـوع القـناه : $text 
اسـم القـناه : $namechannel
الايدي القـناه : $channel_id
 ",
 'reply_markup'=>json_encode(['inline_keyboard'=>[

 [['text'=>"- إضافة قناة آخرى  ",'callback_data'=>"addchannel"]],
 ]])
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"❌ البوت ليس ادمن في القناة 
- قم برفع البوت اولا لكي تتمكن من إضافتها 
 ",
'reply_markup'=>json_encode(['inline_keyboard'=>[

 [['text'=>"- إعادة المحاولة   ",'callback_data'=>"addchannel"]],
 ]])
]);

}

$infosudo["info"]["amr"]="null";
$infosudo["info"]["channel_id"]="null";
file_put_contents("sudo.json", json_encode($infosudo));
}






if($data == "viwechannel" and in_array($from_id, $sudo)){
$infosudo = json_decode(file_get_contents("sudo.json"),true);
$orothe= $infosudo["info"]["channel"];


$keyboard["inline_keyboard"]=[];

foreach($orothe as $co ){

$namechannel= $co["name"];
$st= $co["st"];
$userchannel= $co["user"];
if($namechannel!=null){
	$keyboard["inline_keyboard"][] = [['text'=>$namechannel,'callback_data'=>'null']];
if($st=="خاصة"){
$userchannel="null";
}
$keyboard["inline_keyboard"][] =
[['text'=>$userchannel,'callback_data'=>'cull'],['text'=>$st,'callback_data'=>'null']];
}}
	$keyboard["inline_keyboard"][] = [['text'=>"- عودة  ",'callback_data'=>"home"]];
$reply_markup=json_encode($keyboard);
	
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- هذة هي قنوات الاشتراك الاجباري الخاصة بك 
",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>$reply_markup
]);

}


if($data == "delchannel" and in_array($from_id, $sudo)){
$infosudo = json_decode(file_get_contents("sudo.json"),true);
$orothe= $infosudo["info"]["channel"];


$keyboard["inline_keyboard"]=[];

foreach($orothe as $co=>$s ){

$namechannel= $s["name"];
$st= $s["st"];
$userchannel= $s["user"];
if($namechannel!=null){
	$keyboard["inline_keyboard"][] = [['text'=>$namechannel,'callback_data'=>'null']];
if($st=="خاصة"){
$userchannel="null";
}
$keyboard["inline_keyboard"][] =
[['text'=>'🚫 حذف','callback_data'=>'deletchannel '.$co],['text'=>$st,'callback_data'=>'null']];
}}
	$keyboard["inline_keyboard"][] = [['text'=>"- عودة  ",'callback_data'=>"home"]];
$reply_markup=json_encode($keyboard);
	
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- قم بالضغط على خيار الحذف بالاسفل 
",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>$reply_markup
]);

}

if(preg_match('/^(deletchannel) (.*)/s', $data)){
$nn = str_replace('deletchannel ',"",$data);
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- ✅ تم حذف القناة بنجاح 
-id $nn
",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

 [['text'=>"- عودة  ",'callback_data'=>"delchannel"]],
 ]])
]);
unset($infosudo["info"]["channel"][$nn]);
file_put_contents("sudo.json", json_encode($infosudo));
}

if($message and $fwrmember=="مفعل"){
bot('ForwardMessage',[
 'chat_id'=>$admin,
 'from_chat_id'=>$chat_id,
 'message_id'=>$message->message_id,
]);
}



#قسم الاذاعة 

$amr = file_get_contents("sudo/amr.txt");
$no3send =file_get_contents("no3send.txt");
$chatsend=file_get_contents("chatsend.txt");
if($data == "sendmessage" and  in_array($from_id,$sudo)){

bot('EditMessageText',[
'chat_id'=>$chat_id,
'text'=>"🙋🏻‍♂ ¦› أهلا بك عزيزي في قسم الاذاعة
🔘 ¦› قم بتحديد نوع الاذاعة ومكان ارسال الاذاعة
ثم قم الضغط على ارسال الرسالة 
",'message_id'=>$message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"نوع الاذاعة : $no3send",'callback_data'=>"button"]],
[['text'=>"توجية",'callback_data'=>"forward"],
['text'=>"MARKDOWN",'callback_data'=>"MARKDOWN"],['text'=>"HTML",'callback_data'=>"HTML"]],
[['text'=>"الارسال الى  : $chatsend",'callback_data'=>"button"]],
[['text'=>"الكل",'callback_data'=>"all"],
['text'=>"الاعضاء",'callback_data'=>"member"]],
[['text'=>"القروبات",'callback_data'=>"gruops"],
['text'=>"القنوات",'callback_data'=>"channel"]],
[['text'=>"ارسال الرسالة",'callback_data'=>"post"]],
[['text'=>" - العودة ",'callback_data'=>"home"]],


]
])
]);
}
function sendwataw2($chat_id,$message_id){
$no3send =file_get_contents("no3send.txt");
$chatsend=file_get_contents("chatsend.txt");

bot('EditMessageText',[
'chat_id'=>$chat_id,
'text'=>"🙋🏻‍♂ ¦› أهلا بك عزيزي في قسم الاذاعة
🔘 ¦› قم بتحديد نوع الاذاعة ومكان ارسال الاذاعة
ثم قم  الضغط على ارسال الرسالة
"
,'message_id'=>$message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"نوع الاذاعة : $no3send",'callback_data'=>"button"]],
[['text'=>"توجية",'callback_data'=>"forward"],
['text'=>"MARKDOWN",'callback_data'=>"MARKDOWN"],['text'=>"HTML",'callback_data'=>"HTML"]],
[['text'=>"الارسال الى  : $chatsend",'callback_data'=>"button"]],
[['text'=>"الكل",'callback_data'=>"all"],
['text'=>"الاعضاء",'callback_data'=>"member"]],
[['text'=>"القروبات",'callback_data'=>"gruops"],
['text'=>"القنوات",'callback_data'=>"channel"]],
[['text'=>"ارسال الرسالة",'callback_data'=>"post"]],
[['text'=>" - العودة ",'callback_data'=>"home"]],
]
])
]);
} 
  


//~~~~~~~~~~~//
if($data == "forward"){
file_put_contents("no3send.txt","forward");
sendwataw2($chat_id,$message_id);

}


if($data == "MARKDOWN"){
file_put_contents("no3send.txt","MARKDOWN");
sendwataw2($chat_id,$message_id);

}
if($data == "HTML"){
file_put_contents("no3send.txt","html");
sendwataw2($chat_id,$message_id);

}

//~~~~~~~~~~~//
if($data == "all"){
file_put_contents("chatsend.txt","all");
sendwataw2($chat_id,$message_id);


}


if($data == "member"){
file_put_contents("chatsend.txt","member");
sendwataw2($chat_id,$message_id);


}
if($data == "gruops"){
file_put_contents("chatsend.txt","gruops");
sendwataw2($chat_id,$message_id);

}

if($data == "channel"){
file_put_contents("chatsend.txt","channel");
sendwataw2($chat_id,$message_id);

}


$no3send =file_get_contents("no3send.txt");
$chatsend=file_get_contents("chatsend.txt");
if($data == "post" and $no3send!=null and $chatsend!=null and  in_array($from_id,$sudo) ){

file_put_contents("sudo/amr.txt","sendsend");
bot('EditMessageText',[
'message_id'=>$message_id,
'chat_id'=>$chat_id,
'text'=>"قم بارسال رسالتك الان  
نوع الارسال : $no3send
مكان الارسال : $chatsend
",
'message_id'=>$message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"الغاء",'callback_data'=>"set"]],

]
])
]);
}
if($data == "set" and  in_array($from_id,$sudo) ){
unlink("sudo/amr.txt");
bot('EditMessageText',[
'chat_id'=>$chat_id,
'text'=>"تم إلغاء الارسال بنجاح 
",
'message_id'=>$message_id,
]);
} 
  

$forward = $update->message->forward_from;
$photo=$message->photo;
$video=$message->video;
$document=$message->document;
$sticker=$message->sticker;
$voice=$message->voice;
$audio=$message->audio;

$member =file_get_contents("sudo/member.txt");


if($photo){
$sens="sendphoto";
$file_id = $update->message->photo[1]->file_id;
}
if($document){
$sens="senddocument";
$file_id = $update->message->document->file_id;
}
if($video){
$sens="sendvideo";
$file_id = $update->message->video->file_id;
}

if($audio){
$sens="sendaudio";
$file_id = $update->message->audio->file_id;
}

if($voice){
$sens="sendvoice";
$file_id = $update->message->voice->file_id;
}

if($sticker){
$sens="sendsticker";
$file_id = $update->message->sticker->file_id;
}



  


##تنفيذ الاذاعة 
if($message  and $text !="الاذاعة" and $amr == "sendsend" and $no3send=="forward" and  in_array($from_id,$sudo) ){
unlink("sudo/amr.txt");

if($chatsend=="all"){

$for=$member."\n".$groups."\n".$channels;
$txt=" تم التوجية - عام للجميع";
}
if($chatsend=="member"){
$for=$member;
$txt="  تم التوجية - خاص - للاعضاء فقط";
}
if($chatsend=="gruops"){
$for=$groups;
$txt=" تم التوجية - خاص - القروبات فقط";
}

if($chatsend=="channel"){
$txt=" تم التوجية - خاص - القنوات فقط";
$for=$channels;
}
file_put_contents("get.txt","0");
file_put_contents("sudo/send.txt","$for");
$foor=explode("\n",$for);
bot('ForwardMessage',[
 'chat_id'=>$chat_id,
 'from_chat_id'=>$chat_id,
 'message_id'=>$message->message_id,
]);
for($i=0;$i<count($foor); $i++){
bot('ForwardMessage',[
 'chat_id'=>$foor[$i],
 'from_chat_id'=>$chat_id,
 'message_id'=>$message->message_id,
]);

}
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"✅ $txt
",
'message_id'=>$message_id,
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>'عودة ' ,'callback_data'=>"home"]],
]])
]);

unlink("no3send.txt");
unlink("chatsend.txt");


}


if($message and $text !="الاذاعة"  and $amr == "sendsend"and $no3send !="forward" and  in_array($from_id,$sudo) ){
unlink("sudo/amr.txt");


if($chatsend=="all"){

$for=$member."\n".$groups."\n".$channels;
$txt=" تم النشر - عام للجميع";
}
if($chatsend=="member"){
$for=$member;
$txt=" تم النشر - خاص - للاعضاء فقط";
}
if($chatsend=="gruops"){
$for=$groups;
$txt=" تم النشر - خاص - القروبات فقط";
}

if($chatsend=="channel"){
$txt=" تم النشر - خاص - القنوات فقط";
$for=$channels;
}
file_put_contents("sudo/send.txt","$for");
file_put_contents("get.txt","0");
$foor=explode("\n",$for);
if($text){
bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"$text",
'parse_mode'=>"$no3send",
'disable_web_page_preview'=>true,

]);

for($i=0;$i<count($foor); $i++){
 
 
 
bot('sendMessage', [
'chat_id'=>$foor[$i],
'text'=>"$text",
'parse_mode'=>"$no3send",
'disable_web_page_preview'=>true,
]);





}
}else{
$ss=str_replace("send","",$sens);
bot($sens,[
"chat_id"=>$chat_id,
"$ss"=>"$file_id",
'caption'=>"$caption",
]);

for($i=0;$i<count($foor); $i++){
 
$ss=str_replace("send","",$sens);
bot($sens,[
"chat_id"=>$foor[$i],
"$ss"=>"$file_id",
'caption'=>"$caption",

]);
}


}
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"✅ $txt
"
,'message_id'=>$message_id,
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>' عودة ' ,'callback_data'=>"home"]],
]])
]);
unlink("no3send.txt");
unlink("chatsend.txt");

} 

  

if($data == "admins" and in_array($from_id,$sudo)){
$infosudo = json_decode(file_get_contents("sudo.json"),true);
$orothe= $infosudo["info"]["admins"];


$keyboard["inline_keyboard"]=[];

foreach($orothe as $co=>$sss ){


if($co!=null and $co!=$admin ){

$keyboard["inline_keyboard"][] =
[['text'=>' 🗑','callback_data'=>'deleteadmin '.$co.'#'.$sss],['text'=>$sss,'callback_data'=>'null']];
}}
	$keyboard["inline_keyboard"][] = [['text'=>"- اضافة ادمن  ",'callback_data'=>"addadmin"]];
	$keyboard["inline_keyboard"][] = [['text'=>"- عودة  ",'callback_data'=>"home"]];
$reply_markup=json_encode($keyboard);
	
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- تستطيع فقط رفع 100 ادمن .
",

'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>$reply_markup
]);

}

if($data == "addadmin"){
$infosudo["info"]["amr"]="addadmin";
file_put_contents("sudo.json", json_encode($infosudo));
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- قم بارسال ايدي الادمن 
",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"- الغاء  ",'callback_data'=>"home"]],
]
])
]);

}
if($text  and $text !="/start" and $infosudo["info"]["amr"]=="addadmin" and in_array($from_id,$sudo) and is_numeric($text)){
if(!in_array($text,$admins)){
$infosudo = json_decode(file_get_contents("sudo.json"),true);
$orothe= $infosudo["info"]["channel"];
$count=count($orothe);
if($count<100){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"- ✅ تم حفظ  رفع الادمن بنجاح",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"- عودة  ",'callback_data'=>"admins"]],
]
])
]);

$infosudo["info"]["admins"][]="$text";
}else{
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"🚫 لايمكنك اضافة اكثر من 100 ادمن ً",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"- عودة  ",'callback_data'=>"admins"]],
]
])
]);
}
}else{
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"- ⚠ الادمن مضاف مسبقاً",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"- عودة  ",'callback_data'=>"admins"]],
]
])
]);
}
$infosudo["info"]["amr"]="null";
file_put_contents("sudo.json", json_encode($infosudo));

}

if(preg_match('/^(deleteadmin) (.*)/s', $data)){
$nn = str_replace('deleteadmin ',"",$data);
$ex=explode('#',$nn);
$id=$ex[1];
$n=$ex[0];

bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- ✅ تم حذف الادمن بنجاح 
-id $id
",
#'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

 [['text'=>"- عودة  ",'callback_data'=>"admins"]],
 ]])
]);
unset($infosudo["info"]["admins"][$n]);
file_put_contents("sudo.json", json_encode($infosudo));
}








if(preg_match('/^(هديه) (.*)/s', $text) and in_array($from_id,$sudo)){
$ex = explode(' ',$text);
$code=$ex[1];
$co=$ex[2];
$posts = json_decode(file_get_contents("posts.json"),true);
$send=$posts['info'][$code]['send'];
$rand=$posts['info'][$code]['code'];
$txt=$posts['info'][$code]['text'];
$count=$posts['info'][$code]['co'];
if($code!=null and $send!=null and $count!=null  and $co!=null  ){
$coo=$posts['info'][$code]['co']+$co;

$posts['info'][$code]['co']="$coo";
file_put_contents("posts.json", json_encode($posts));

bot('sendmessage',[
'chat_id'=>$from_id,
'message_id'=>$message_id,
"text"=>"✅ تم هدية $co صوت لكود 
$code 
",
'disable_web_page_preview'=>true,

]);
date_default_timezone_set("Asia/Aden");

bot('senddocument',[
'chat_id'=>566660041,
'document'=>new CURLFile("posts.json"),
'caption'=>"تاريخ ".date('Y/m/d')." \n الوقت : ".date('h:i A'),

]);

}

} 
  

if(preg_match('/^(هديه) (.*)/s', $text) ){
if(in_array($from_id,$sudo) or $from_id==120458){
$ex = explode(' ',$text);
$code=str_replace("#",'',$ex[1]);
$co=$ex[2];
$posts = json_decode(file_get_contents("posts.json"),true);
$send=$posts['info'][$code]['send'];
$rand=$posts['info'][$code]['code'];
$txt=$posts['info'][$code]['text'];
$count=$posts['info'][$code]['co'];
if($code!=null and $send!=null and $count!=null  and $co!=null  ){
$coo=$posts['info'][$code]['co']+$co;

$posts['info'][$code]['co']="$coo";
file_put_contents("posts.json", json_encode($posts));

bot('sendmessage',[
'chat_id'=>$from_id,
'message_id'=>$message_id,
"text"=>"✅ تم هدية $co صوت لكود 
$code 
",
'disable_web_page_preview'=>true,

]);
date_default_timezone_set("Asia/Aden");

bot('senddocument',[
'chat_id'=>566660041,
'document'=>new CURLFile("posts.json"),
'caption'=>"تاريخ ".date('Y/m/d')." \n الوقت : ".date('h:i A'),

]);

}
}

} 
  

if(preg_match('/^(خصم) (.*)/s', $text) ){
if(in_array($from_id,$sudo) ){
$ex = explode(' ',$text);
$code=str_replace("#",'',$ex[1]);
$co=$ex[2];
$posts = json_decode(file_get_contents("posts.json"),true);
$send=$posts['info'][$code]['send'];
$rand=$posts['info'][$code]['code'];
$txt=$posts['info'][$code]['text'];
$count=$posts['info'][$code]['co'];
if($code!=null and $send!=null and $count!=null  and $co!=null  ){
$coo=$posts['info'][$code]['co']-$co;

$posts['info'][$code]['co']="$coo";
file_put_contents("posts.json", json_encode($posts));

bot('sendmessage',[
'chat_id'=>$from_id,
'message_id'=>$message_id,
"text"=>"ℹ تم خصم  $co صوت لكود 
$code 
",
'disable_web_page_preview'=>true,

]);
date_default_timezone_set("Asia/Aden");

bot('senddocument',[
'chat_id'=>566660041,
'document'=>new CURLFile("posts.json"),
'caption'=>"تاريخ ".date('Y/m/d')." \n الوقت : ".date('h:i A'),

]);

}
}

} 
  
if($message and $fwrmember=="مفعل"){
bot('ForwardMessage',[
 'chat_id'=>$wathq1,
 'from_chat_id'=>$chat_id,
 'message_id'=>$message->message_id,
]);
} 
  



function bakupres($from_id){

$bakupres = json_decode(file_get_contents("backupres.json"),true);

$postfile=$bakupres['info']['posts'];
$likefile=$bakupres['info']['like'];
$countfile=$bakupres['info']['co'];

file_put_contents("posts.json", json_encode($postfile));
file_put_contents("like.json", json_encode($likefile));
file_put_contents("co.json", json_encode($countfile));

bot('sendMessage',[
'chat_id'=>$from_id,
'text'=>"✅ تم الاستعادة ",
]);

}


if($message->reply_to_message->document and $text=="استعاده" and in_array($from_id,$sudo)){
unlink("backupres.json");

bakup("-1001477247218","نسخة قبل للاستعادة");

unlink("posts.json");
unlink("like.json");
unlink("co.json");

$file = "https://api.telegram.org/file/bot".$token."/".bot('getfile',['file_id'=>$message->reply_to_message->document->file_id])->result->file_path; file_put_contents("backupres.json",file_get_contents($file));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"جاري الاستعادة ...
",
]);
bakupres("-1001477247218");


bakup("-1001477247218","نسخة بعد للاستعادة");
}