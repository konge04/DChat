<?php
	$cd = $_REQUEST['cd'];
	
	if($cd === 'E001')
	$message = 'Plese input your ID and Password.';
	if($cd === 'E002')
	$message = 'Not found ID.';
	if($cd === 'E003')
	$message = 'ID or Password is incorrect.';
?>

<html>
<head>
	<title>Chat - Error101</title>
	
</head>

<body>
	<h1>Chat</h1>
	<font size="5" color="red">Error</font><br>
	<font color="red">
	<?php print $message; ?>
	</font><br><br>
	<form action="WC101.php">
	<button type="submit">&nbsp;&nbsp;back&nbsp;&nbsp;</button>
	</form>
</body>

</html>
