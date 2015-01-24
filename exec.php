<?php
$startWord = $_POST['start_word'];
$endWord   = $_POST['end_word'];


$botId1 = $_POST['bot_id1'];
$botId2 = $_POST['bot_id2'];

// ゲームスタート
$startUrl = "http://vachat4relay.herokuapp.com/start?bot_id1=".$botId1."&bot_id2=".$botId2."&start=".$startWord."&goal=".$endWord;
$jsonString = file_get_contents($startUrl);
$aryResult = json_decode($jsonString, true);
var_dump($aryResult);

if (is_array($aryResult)) {
  $gameId = $aryResult['game_id'];
  $run    = $aryResult['run?'];
}

if ($run) {
  $retunUrl = "game.php?game_id=".$gameId;
} else {
  $retunUrl = "game_error.php";
}
header("Location: $retunUrl");
  
?>
