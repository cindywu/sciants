<?php include("EvernoteUtils.php") ?>
<?php 
	$noteStore = getNoteStore($authToken);
	$notebooks = getAllNotebooks($authToken, $noteStore);
?>

<html>
	<head>
		<title>SciAnts - All Projects</title>
		<link rel="icon" type="image/png" href="http://www.sciants.co/images/favicon.png">
		<link rel="stylesheet" href="http://meyerweb.com/eric/tools/css/reset/reset.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="http://www.sciants.co/style/project.css" type="text/css" media="screen" />
	</head>
	
	<body>
		<div id="container">
			<div id="user">Denny Luan</div>
			
			<a href="http://www.sciants.co/pages/index.html"><img src="http://www.sciants.co/images/logo_FULL.png" alt="logo" height="40px" /></a>
			
			<br /><br />
			
			<h1>My Projects (<a href="http://www.sciants.co/pages/index.html">Demo Home</a>)</h1>
			
			<br />
			
			<input type="text" name="search" value="Search" />
			
			<br /><br />
			<?php
			foreach ($notebooks as $notebook) {
			?>
				<div class="projects">
					<div class="project-right"><?=$notebook->serviceCreated?>6/20</div>
				
					<h2><a href="http://www.sciants.co/pages/project.html"><?=$notebook->name?></a></h2>
					<h3>[In Progress]</h3>
					
					<br />
					
					<em>insert tags here</em>
				</div>
			<?php
			}
			?>
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
			
		</div>
	</body>
</html>