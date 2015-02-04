<?php
$gameId = $_GET['game_id'];
$botId1 =  $_GET['bot_id1'];
$botId2 =  $_GET['bot_id2'];
$mode = $_GET['mode'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
<title>SAMPLE</title>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css" media="all">

<script type="text/javascript">
<!--
var stopFlg;
var tm;

//タイマーをセット
function tm(){
  if (!stopFlg) {
    //tm = setTimeOut("location.reload()",10000);
	tm = setTimeout('location.reload()',5000);
  }
}

function execStop(){
  $.ajax({
    type: 'POST',
	data:{game_id: '<?=$gameId?>'},
    url: 'http://systemvssystem.herokuapp.com/stop.php',
    success: function(data){
    	stopFlg = true;
		clearTimeout(tm);
        alert("停止しました。");
        return true;
    },
	error: function(data){
	  alert(data);
	}
});
}

// -->
</script>
</head>
<body body onLoad="tm()" nowrap="" bgcolor="#ffffff" text="#333333">
<form method="post" action="exec_kainyu.php">
<div>
<input type="text" name="word" class="txtfiled" size="20">
<input type="submit" value="　介入　">
<input type="hidden" name="game_id" value="<?=$gameId?>">
<input type="hidden" name="bot_id1" value="<?=$botId1?>">
<input type="hidden" name="bot_id2" value="<?=$botId2?>">
</div>
</form>
<div>
<img src="http://www.material-land.com/material/1172.png" border=0 alt="停止" width="30" height="30" onclick="execStop();">
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

$sql = "select bot_id, word, picture_url from chat_log where game_id = '" . $gameId . "' order by id desc, ins_time desc";
$rs = pg_query($dba, $sql);
while ($row = pg_fetch_array($rs)) {
  $botId = $row['bot_id'];
  $aryBot = $aryBotList[$row['bot_id']];
  if ($mode == 2) {
    $className = "bot1";
  } else {
    if ($botId1 == $botId) {
      $className = "bot1";
    } else {
      $className = "bot2";
    }
  }
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
