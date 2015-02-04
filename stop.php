<?php
$gameId = $_REQUEST['game_id'];


$startUrl = "http://vachat4relay.herokuapp.com/stop?game_id=".$gameId;
$jsonString = file_get_contents($startUrl);
$aryResult = json_decode($jsonString, true);
var_dump($aryResult);

if (is_array($aryResult)) {
  $gameId = $aryResult['game_id'];
  $run    = $aryResult['run?'];
}

echo $jsonString;
exit(0);
//$retunUrl = "vssystem.php";
//header("Location: $retunUrl");
  
?>
