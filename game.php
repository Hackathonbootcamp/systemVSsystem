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
  tm = setInterval("location.reload()",5000);
}
// -->
</script>
</head>
<body body onLoad="tm()" nowrap="" bgcolor="#ffffff" text="#333333">

<?php

$host = "ec2-174-129-1-179.compute-1.amazonaws.com";
$dbname = "d76k2v0lvos1l3";
$user = "ollzkkdgygzkti";
$pass = "3fdgK_t5FBW2n4-yGs5_D6Xh8f";

$gameId = $_GET['game_id'];
echo $gameId."<br />";

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
var_dump($aryBotList);

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
<div class="<?php echo $className ?>_image"><img src="<?php echo $imgUrl ?>" alt="<?=$botName?>" width="90" height="90"/></div>
<div class="arrow_<?php echo $className ?>">
     <?php echo $word ?>
</div><!-- /.arrow_question -->
</div><!-- /.question_Box -->
<?php } ?>
</div>
</body>
</html>
