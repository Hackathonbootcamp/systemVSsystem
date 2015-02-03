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
<title>システム雑談</title>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css" media="all">
<script type="text/javascript">
<!--
  function execKaiwa(mode) {
    $("#mode").val(mode);
	document.startForm.submit();
  }
// -->
</script>


</head>
<body nowrap="" bgcolor="#ffffff" text="#333333">
  <form id="startform" action="exec.php" method="post">
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
  <input type="button"  onclick="execKaiwa(1);" value="　対話会話　">
  <input type="button"  onclick="execKaiwa(2);" value="　マルチ会話　">
</li>
</ul>
<input type="hidden" name="mode" id="mode" value="">
  </form>
</body>
</html>
