<?php include("EvernoteUtils.php") ?>
<?php 
	$authToken = "S=s1:U=26f56:E=13f738b8344:C=1381bda5744:P=1cd:A=en-devtoken:H=1fc3322861382db56c9ee0b3ea862e84";
	$noteStore = getNoteStore($authToken);
	$notebooks = getAllNotebooks($authToken, $noteStore);
	foreach ($notebooks as $notebook) {
		if ($notebook->name == "Silencing of MIR-124") {
			$mynotebook = $notebook;
		}
	}
	$notes = getAllNotes($authToken, $noteStore, $mynotebook);
?>

<html>
	<head>
		<title>SciAnts - <?=$mynotebook->name?></title>
		<link rel="icon" type="image/png" href="http://www.sciants.co/images/favicon.png">
		<link rel="stylesheet" href="http://meyerweb.com/eric/tools/css/reset/reset.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="http://www.sciants.co/style/project.css" type="text/css" media="screen" />
	</head>
	
	<body>
		<div id="container">
			<div id="user">Denny Luan</div>
			
			<a href="http://www.sciants.co/pages/index.html">
				<img src="http://www.sciants.co/images/logo_FULL.png" alt="logo" height="40px" />
			</a>
			
			<br />
			<br />
			
			<h1><a href="http://www.sciants.co/pages/projectssplash.php">Projects:</a> Silencing of MIR-124</h1>
			
			<div id="search">
				<input type="text" name="search" value="Search" />
				<div>
					<img id="search_button" src="http://sciants.co/images/search.png" alt="search"/>
				</div>
			</div>
			
			<div><h2>To-do</h2></div>
			
			<ul id="to-do">
				<li><div id="red"></div> Prepare for faculty presentation at 3pm <img src="http://www.sciants.co/images/delete.png" alt="delete" /></li>
				<li><div id="green"></div> Analyze flow cytometer results <img src="http://www.sciants.co/images/delete.png" alt="delete" /></li>
				<li><div id="blue"></div> Re-sequence colony PCR results <img src="http://www.sciants.co/images/delete.png" alt="delete" /></li>
				<li><div id="blue"></div> Stock of tris-buffer and RNAase-freewater <img src="http://www.sciants.co/images/delete.png" alt="delete" /></li>
			</ul>
			
			<h2>Notes</h2>
			<?php
			foreach ($notes as $note) {
			?>
				<a href="http://www.sciants.co/pages/notes.html">
					<div class="notes">
					<div class="notes_date">6/20</div>
						<br />
						<h3><?=$note->title?></h3>
						<br />
						<p>Content?:<?=$note->content?></p>
						<p>ContentHash?:<?=$note->contentHash?></p>
						<p>Content?:<?=$note->notebookGuid?></p>
					</div>
				</a>
			<?php
			}
			?>
<!--			
			<a href=""><div class="notes">
				<div class="notes_date">6/20</div>
				<br />
				<h3>Tissue culture results</h3>
				<br />
				<p>Stuff goes here</p>
			</div></a>
			
			<a href=""><div class="notes">
				<div class="notes_date">6/20</div>
				
				<br /><h3>Note</h3><br />
				
				<p>Stuff goes here</p>
			</div></a>
			
			<a href=""><div class="notes">
				<div class="notes_date">6/20</div>
				
				<br /><h3>Note</h3><br />
				
				<p>Stuff goes here</p>
			</div></a>
			
			<a href=""><div class="notes">
				<div class="notes_date">6/20</div>
				
				<br /><h3>Note</h3><br />
				
				<p>Stuff goes here</p>
			</div></a>
			
			<a href=""><div class="notes">
				<div class="notes_date">6/20</div>
				
				<br /><h3>Note</h3><br />
				
				<p>Stuff goes here</p>
			</div></a>
			
			<a href=""><div class="notes">
				<div class="notes_date">6/20</div>
				
				<br /><h3>Note</h3><br />
				
				<p>Stuff goes here</p>
			</div></a>
			
			<a href=""><div class="notes">
				<div class="notes_date">6/20</div>
				
				<br /><h3>Note</h3><br />
				
				<p>Stuff goes here</p>
			</div></a>
-->
		</div>
	</body>
</html>