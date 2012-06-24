<?php include("EvernoteUtils.php") ?>
<?php 
	$authToken = "S=s1:U=26f48:E=13f7353dff5:C=1381ba2b3f5:P=1cd:A=en-devtoken:H=db47bd43568923301e8c48040c574928"
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
			<p>Note?: <?=$fullNote->title?></p>
<?php
		}
	}
	createAndSendNewNote($authToken, $noteStore, "TESTING STUFFS!!!", "STUFFS!!!!!!");
?>
	
	<p>yay</p>
</body>
</html>

