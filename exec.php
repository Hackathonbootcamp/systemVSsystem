<?php
  $startWord = $_POST['start_word'];
  $endWord   = $_POST['end_word'];
  
  echo $startWord;
  echo $endWord;
  
  $botId1 = 1;
  $botId2 = 2;
  
  // ゲームスタート
  $startUrl = "http://vachat4relay.herokuapp.com/start?bot_id1=".$botId1."&bot_id2=".$botId2."&start=".$startWord."&goal=".$endWord;
echo $startUrl;

　//$jsonString = file_get_contents("$startUrl");
  //$aryResult = json_decode($jsonString);
  
  //var_dump($aryResult);
  
/*
  if (is_array($aryResult)) {
   $gameId = $aryResult['game_id'];
   $run    = $aryResult['run?'];
  }
  var_dump($aryResult);
  if ($run) {
    $retunUrl = "game_exec.php";
  } else {
    $retunUrl = "game_error.php";
  }
  echo $retunUrl;
  //header("Location: $retunUrl");
 */ 
?>
