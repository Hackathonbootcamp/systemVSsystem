<?php
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

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
<title>SAMPLE</title>

<script type="text/javascript" src="js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css" media="all">
</head>
<body nowrap="" bgcolor="#ffffff" text="#333333">
  <form id="startform" action="exec.php">
  <ul>
  <li>
  <label>
    <span>かいしもじ</span>
    <input type="text" name="start_word" class="txtfiled" size="20">
  </label>
  </li>
  <li>
  <label>
    <span>おわりもじ</span>
    <input type="text" name="end_word" class="txtfiled" size="20">
  </label>
  </li>
  <li>
  <div class="botid1">
	  会話１<br>
    <?php
	$i = 0;
    foreach ($aryBotList as $key => $val) {
	  $i++;
	  $botName = $val['bot_name'];
	?>
    <input type="radio" name="bot_id1" id="select1<?=$i?>" value="<?=$key?>" <?php if ($i==1){echo "checked";}?>>
    <label for="select1<?=$i?>"><?=$botName?></label>
    <?php
	}
	?>
</div>
  <div style="clear:both"></div>
  </li>
  <li>
  <div class="botid2">
	  会話２<br>
    <?php
	$i = 0;
    foreach ($aryBotList as $key => $val) {
	  $i++;
	  $botName = $val['bot_name'];
	?>
    <input type="radio" name="bot_id2" id="select2<?=$i?>" value="<?=$key?>" <?php if ($i==1){echo "checked";}?>>
    <label for="select2<?=$i?>"><?=$botName?></label>
    <?php
	}
	?>
  </div>
  <div style="clear:both"></div>
  </li>
  <li>
  <input type="submit" value="　かいし　">
</li>
</ul>
  </form>
</body>
</html>
