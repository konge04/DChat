<html>
<head>
	<title>Chat</title>
	<?php if($_GET['id'] == null || $_GET['pass'] == null){
	header("Location:ER001.php?cd=".urlencode('E001'));
	}
	$dsn = 'mysql:dbname=PChat;host=127.0.0.1';
	$user = 'root';
	$pw = 'H@chiouji1';
	$user_sql = 'select * from User';
	$chat_sql = 'select dispname,chat,register_date from User,Chat WHERE User.id = Chat.id ORDER BY DESC LIMIT 15';
	$count = 'select count(*) from Chat';
	$dbh = new PDO($dsn, $user, $pw);
	$sth = $dbh->prepare($user_sql);
	$sth->execute();
	$id = false;
	while(($buff = $sth->fetch()) !== false)
	{
	 $chara[] = $buff;
	 if($_GET['id'] === $buff[1]){
	 $id = true;
	 }
	}
	if($id === false){
	header("Location:ER001.php?cd=".urlencode('E002'));
	}
	$login = false;
	for($i=0;$i<3;$i++){
	if($_GET['id'] == $chara[$i][1] && $_GET['pass'] == $chara[$i][2]){
	$login = true;
	break;
	}
	}
	if($id === true && $login === false){
	header("Location:ER001.php?cd=".urlencode('E003'));
	}
	$std = $dbh->prepare($chat_sql);
	$std->execute();
	$sti = $dbh->prepare($count);
	$num = $sti->execute();
	?>
<style type="text/css">
/** 書き込み **/
.log{
  border: 1px solid gray;
  margin: 5px;
  padding: 5px;
  
}

/** 名前 **/
.handlename{
  font-weight: bold;  /* 太字 */
}

/** 書き込み時間  **/
.timestamp{
  color: gray;       /* 文字色を灰色 */
  font-size: 80%;    /* 文字サイズを少し小さく */
}

/** 書き込み内容  **/
.message{
  font-size: 150%;
}
</style>
</head>
<?php
//onclick="php SendMessage() "
?>
<body>
<form action="WC201.php">
<table border="0" width="50%">
<tr>
<td height="30" align="right"><?php print $chara[$i][3]; ?></td>
<td align="center"><input type="text" name="chat" size="50" maxlength="50"></td>
<td align="left"><input type="button" value="Write" ></td>
</tr>
</table>
<form/>
<hr>
<form action="WC201.php">
<p style="padding-left: 20px;">
<button type="submit">Refresh</button>
</p>
</form>
<?php
	
	if($num >= 1){
    for($i=0; $i<$num; $i++){
      printf(
          '<div class="log">'
        . '  <span class="handlename">%s</span> <span class="message">%s</span> <span class="timestamp">(%s)</span>'
        . '</div>'
          
        , $std[$i][0]
        , $std[$i][1]
        , $std[$i][2]
      );
    }
    }
?>
<hr>
<form action="WC101.php">
<table border="0" width="50%">
<tr>
<td><a href="WC301.php" target="_blank">History</a></td>
<td align="right"><input type="submit" value="Logout"></td>
</tr>
</table>
</form>
</body>

</html>
