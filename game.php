<?php
$gameId = $_GET['game_id'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
<title>SAMPLE</title>

<script type="text/javascript" src="js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css" media="all">

<script type="text/javascript">
<!--
//タイマーをセット
function tm(){
  tm = setInterval("location.reload()",10000);
}

function execStop(){
  $.ajax({
    type: "GET",
    url: "http://vachat4relay.herokuapp.com/stop",
    game_id: "<?=$gameid?>",
    success: function(data){
        alert("停止しました。");
        return false;
    }
});
}

// -->
</script>
</head>
<body body onLoad="tm()" nowrap="" bgcolor="#ffffff" text="#333333">
<form method="post" action="">
<div>
<input type="text" name="ins_word" class="txtfiled" size="20">
<input type="button" value="　介入　" onclick="execStop();">
</div>
</form>
<div>
<img src="img/stop.png" border=1 alt="停止">
</div>

<?php

$host = "ec2-174-129-1-179.compute-1.amazonaws.com";
$dbname = "d76k2v0lvos1l3";
$user = "ollzkkdgygzkti";
$pass = "3fdgK_t5FBW2n4-yGs5_D6Xh8f";

$dba = pg_connect("host=$host dbname=$dbname user=$user password=$pass");

if (!$dba) {
    die('接続失敗(ToT)'.pg_last_error());
}

$json_string = file_get_contents('http://vachat4relay.herokuapp.com/botlist');
$aryBot = json_decode($json_string, true);
$aryBotList = array();
foreach($aryBot as $val) {
	$botid = $val['bot_id'];
	$tmpBot = array();
	$tmpBot['profile'] = $val['profile'];
	$tmpBot['picture_url'] = $val['picture_url'];
	$tmpBot['bot_name'] = $val['bot_name'];
	$aryBotList[$botid] = array();
  $aryBotList[$botid] = $tmpBot;
}

$sql = "select bot_id, word, picture_url from chat_log where game_id = '" . $gameId . "' order by ins_time desc";
$rs = pg_query($dba, $sql);
while ($row = pg_fetch_array($rs)) {
  $aryBot = $aryBotList[$row['bot_id']];
  $className = "bot".$row['bot_id'];
  $word = $row['word'];
  $imgUrl = $aryBot['picture_url'];
  $botName = $aryBot['bot_name'];
?>
<div id="ress_area">
<div class="bot_Box">
<div class="<?php echo $className ?>_image"><img src="<?=$imgUrl ?>" alt="<?=$botName?>" width="90" height="90"/></div>
<div class="arrow_<?php echo $className ?>">
     <?=$word?>
</div><!-- /.arrow_question -->
</div><!-- /.question_Box -->
<?php } ?>
</div>
</body>
</html>
