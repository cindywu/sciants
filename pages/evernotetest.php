<?php include("EvernoteUtils.php") ?>
<?php 
	$authToken = "S=s1:U=26f56:E=13f738b8344:C=1381bda5744:P=1cd:A=en-devtoken:H=1fc3322861382db56c9ee0b3ea862e84"
?>

<!DOCTYPE HTML>

<html>
<head>
	<title>Test</title>
</head>
<body>
	<p>Number of Notebooks:</p>
<?php
	$noteStore = getNoteStore($authToken);
	$notebooks = getAllNotebooks($authToken, $noteStore);
	foreach ($notebooks as $notebook) {
?>
		<p>Notebook Name:<?=$notebook->name?></p>
		<p><?=$notebook->guid?></p>
<?php
		$notes = getAllNotes($authToken, $noteStore, $notebook);
		if (empty($notes)) {
?>
			<p>Empty.....</p>
<?php
		}
		
		foreach ($notes as $note) {
			$fullNote = $noteStore->getNote($authToken, $note->guid, true, false, false, false);
?>
			<p>Note?: <?=$fullNote->content?></p>
<?php
		}
	}
	createAndSendNewNote($authToken, $noteStore, "TESTING STUFFS!!!", "STUFFS!!!!!!");
?>
	
	<p>yay</p>
</body>
</html>

