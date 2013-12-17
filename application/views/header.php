<!DOCTYPE html>
<html lang="en">

	<head>
		
		<meta charset="utf-8">
		<title><?php echo $header_title; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href='http://fonts.googleapis.com/css?family=Almendra+SC' rel='stylesheet' type='text/css'>		
		<link rel="stylesheet" href="<?php echo base_url('css/main.css'); ?>">
		<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
    	<script type="text/javascript" src="<?php echo base_url('js/tab.js'); ?>"></script>	

	</head>
	
<body>

<!--Header Content -->	
		<header id="header">
			<div id="head_div">
				<A id="logo_img" HREF="<?php echo base_url('index.php/cz_main_controller'); ?>"><img src="<?php echo base_url('imgs/czLogo.png'); ?>" alt="logo"></A>
				<div id="main_nav_div"><!--List Here-->
					<ul id="main_nav">
						<li><a href="<?php echo $nav_link . '/num' ?>" title="00" class="main_nav main_not_current">0 - 9</a></li>
						<li><a href="<?php echo $nav_link . '/af' ?>" title="af" class="main_nav main_not_current">A - F</a></li>
						<li><a href="<?php echo $nav_link . '/gl' ?>" title="gl" class="main_nav main_not_current">G - L</a></li>
						<li><a href="<?php echo $nav_link . '/mr' ?>" title="mr" class="main_nav main_not_current">M - R</a></li>
						<li><a href="<?php echo $nav_link . '/sz' ?>" title="sz" class="main_nav main_not_current">S - Z</a></li>	
					</ul>
				</div>
			<!--	<div id="login_button_div">
					<a href="<?php echo $login_link ?>" class="css3button">Login</a>
				</div>-->
			</div>
		</header>	
		<div class="clearfix"></div>
		