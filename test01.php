<?php
$json_string = file_get_contents(http://vachat4relay.herokuapp.com/botlist);

echo $json_string;
$obj = json_decode($json_string);
var_dump($obj);
?>
