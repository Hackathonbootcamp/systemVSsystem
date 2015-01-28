<?php
$word = $_POST['word'];
$botId1 = $_POST['bot_id1'];
$botId2 = $_POST['bot_id2'];
$gameId = $_POST['game_id'];

// ゲームスタート
$startUrl = "http://vachat4relay.herokuapp.com/chat?game_id=".$gameId."&word=".$word;
$jsonString = file_get_contents($startUrl);
$aryResult = json_decode($jsonString, true);
var_dump($aryResult);

if (is_array($aryResult)) {
  $id  = $aryResult['id'];
  $run = $aryResult['run?'];
}

if ($run) {
  $retunUrl = "game.php?game_id=".$gameId."&bot_id1=".$botId1."&bot_id2=".$botId2;
} else {
  $retunUrl = "game_error.php";
}
header("Location: $retunUrl");
  
?>
