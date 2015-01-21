<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
<title>SAMPLE</title>

<script type="text/javascript" src="js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css" media="all">

</head>

<?php

$host = "ec2-174-129-1-179.compute-1.amazonaws.com";
$dbname = "d76k2v0lvos1l3";
$user = "ollzkkdgygzkti";
$pass = "3fdgK_t5FBW2n4-yGs5_D6Xh8f";

$dba = pg_connect("host=$host dbname=$dbname user=$user password=$pass");
if (!$dba) {
    die('接続失敗(ToT)'.pg_last_error());
}
print('接続に成功!<br>');
?>
<body nowrap="" bgcolor="#ffffff" text="#333333">
<div class="question_Box">
<div class="question_image"><img src="http://stat.ameba.jp/user_images/20140923/20/muse-baba/0b/60/j/t02200193_0300026313076027133.jpg" alt="" width="90" height="90"/></div>
<div class="arrow_question">
     ここに会話内容
</div><!-- /.arrow_question -->
</div><!-- /.question_Box -->

<div class="question_Box">
<div class="answer_image"><img src="http://stat.ameba.jp/user_images/20140924/21/muse-baba/ac/05/j/t01430130_0143013013077200212.jpg" alt="" width="90" height="90" /></div>
<div class="arrow_answer">
     ここに会話内容
</div><!-- /.arrow_answer -->
</div><!-- /.question_Box -->
</body>
</html>
