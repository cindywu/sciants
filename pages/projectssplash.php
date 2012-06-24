<?php include("EvernoteUtils.php") ?>
<?php 
	$authToken = "S=s1:U=26f56:E=13f738b8344:C=1381bda5744:P=1cd:A=en-devtoken:H=1fc3322861382db56c9ee0b3ea862e84";
	$noteStore = getNoteStore($authToken);
	$notebooks = getAllNotebooks($authToken, $noteStore);
?>

<html>
	<head>
		<title>SciAnts - All Projects</title>
		<link rel="icon" type="image/png" href="../images/favicon.png">
		<link rel="stylesheet" href="http://meyerweb.com/eric/tools/css/reset/reset.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="../style/project.css" type="text/css" media="screen" />
	</head>
	
	<body>
		<div id="container">
			<div id="user">Denny Luan</div>
			
			<a href="../pages/index.html"><img src="../images/logo_FULL.png" alt="logo" height="40px" /></a>
			
			<br /><br />
			
			<h1>My Projects (<a href="../pages/index.html">Demo Home</a>)</h1>
			
			<br />
			
			<input type="text" name="search" value="Search" />
			
			<br /><br />
			<?php
			foreach ($notebooks as $notebook) {
				if ($notebook->name != "wujsean's notebook") {
			?>
					<div class="projects">
						<div class="project-right">6/20</div>
					
						<h2><a href="../pages/project.php"><?=$notebook->name?></a></h2>
						<h3>[In Progress]</h3>
						
						<br />
						
						<em>insert tags here</em>
					</div>
			<?php
				}
			}
			?>
<!--
			<div class="projects">
				<div class="project-right">6/20</div>
				
				<h2><a href="">DNA Analysis</a></h2>
				<h3>[In Progress]</h3>
				
				<br />
				
				<em>insert tags here</em>
			</div>
			
			<div class="projects">
				<div class="project-right">6/19</div>
				
				<h2><a href="">Genome Sequencing</a></h2>
				<h3>[Completed]</h3>
				
				<br />
				
				<em>insert tags here</em>
			</div>
			
			<div class="projects">
				<div class="project-right">6/18</div>
				<h2><a href="">Fluid Inhibitors</a></h2>
				<h3>[Completed]</h3>
				
				<br />
	
				<em>insert tags here</em>
			</div>
-->
		</div>
	</body>
</html>