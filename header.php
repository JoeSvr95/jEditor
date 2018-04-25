<!DOCTYPE html>
<html>
<head>
	<title>
		<?php
			if (isset($title)){
				echo $title;
			}
		?>
	</title>
	<meta charset="utf-8">
	<meta name="description" content="Online image editor">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/basic-style.css">
	<link rel="icon" href="favicon.ico">﻿
	<?php
		if (isset($css)){
			echo '<link rel="stylesheet" type="text/css" href="css/'.$css.'">';
		}
	?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/fontawesome-all.js"></script>
	<script src="js/upload.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">jEditor</a>
			</div>
			<ul class="nav navbar-nav">
				<li class="active"><a href="index.php">Home</a></li>
				<li><a href="about.php">About</a></li>
			</ul>
		</div>
	</nav>