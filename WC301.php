<html>
<head>
	<title>Chat - History</title>
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

<body>
	<h1>Chat History</h1>
<form action="WC301.php">
<button type="submit">Refresh</button>
</form>
<hr>
<?php
	$fp = fopen("log.dat","r");
	$log = [];
    while( ($line = fgets($fp)) !== false ){
      $line = rtrim($line);
      $buff = explode(',', $line);
      
      $log[] = [
          'timestamp' => $buff[0]
        , 'name'      => $buff[1]
        , 'message'   => $buff[2]
      ];
    }
	$length = count($log);
	if($length >= 1){
    for($i=0; $i<$length; $i++){
      printf(
          '<div class="log">'
        . '  <span class="handlename">%s</span> <span class="message">%s</span> <span class="timestamp">(%s)</span>'
        . '</div>'
          
        , $log[$i]['name']
        , $log[$i]['message']
        , $log[$i]['timestamp']
      );
    }
    }
	fclose($fp);
?>
<form>
<table border="0" width="50%">
<tr>
<td><button type="submit">Refresh</button></td>
<td align="center"><input type="button" value="Close" onclick="window.close()"></td>
</tr>
</table>
</form>
</body>

</html>
