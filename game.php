<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
<title>SAMPLE</title>

<script type="text/javascript" src="js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css" media="all">

</head>
<body nowrap="" bgcolor="#ffffff" text="#333333">

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

$sql = "select id, word picture_url from chat_log where game_id = " . $gameId . " order by ins_time desc";
$rs = pg_query($dba, $sql);
while ($row = pg_fetch_array($rs)) {
  $className = "bot".$row['bot_id'];
  $word = $row['word'];
  $imgUrl = $row['word'];
?>
<div class="bot_Box">
<div class="question_image"><img src="http://stat.ameba.jp/user_images/20140923/20/muse-baba/0b/60/j/t02200193_0300026313076027133.jpg" alt="" width="90" height="90"/></div>
<div class="arrow_question">
     {?php echo $word ?}
</div><!-- /.arrow_question -->
</div><!-- /.question_Box -->
<?php } ?>

</body>
</html>
