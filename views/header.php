<!DOCTYPE html>

<html>

    <head>

        <!-- http://getbootstrap.com/ -->
        <link href="/css/bootstrap.min.css" rel="stylesheet"/>

        <link href="/css/styles.css" rel="stylesheet"/>
		
		<title>Sold Out<?= isset($title) ? ": " . htmlspecialchars($title) : "" ?></title>

        <!-- https://jquery.com/ -->
        <script src="/js/jquery-1.11.3.min.js"></script>

        <!-- http://getbootstrap.com/ -->
        <script src="/js/bootstrap.min.js"></script>

        <script src="/js/scripts.js"></script>

    </head>

    <body>

        <div class="container">

            <div id="top">
                <div>
                    <a href="/"><img alt="C$50 Finance" src="/img/logo.png"/></a>
                </div>
			    <ul class="nav nav-pills">
					<li><a href="profile.php<?= isset($_SESSION['id']) ? '?id='. $_SESSION['id'] : '' ?>"><strong>
					<?= isset($_SESSION["id"]) ? CS50::query("SELECT * FROM users WHERE id = ?", $_SESSION["id"])[0]["full_name"] : "Guest" ?>
					</strong></a></li>
                    <li><a href="history.php"><?= isset($_SESSION["id"]) ? "$" . number_format(CS50::query("SELECT * FROM users WHERE id = ?", $_SESSION["id"])[0]["cash"], 2, '.', ',') : "Balance" ?></a></li>
			        <li><a href="categories.php">Categories</a></li>
					<?php if (isset($_SESSION["id"])): ?>
						<li><a href="add_item.php">Sell</a></li>
						<li><a href="deposite.php">Deposite</a></li>
						<li><a href="settings.php">Settings</a></li>
						<li><a href="logout.php"><strong>Log Out</strong></a></li>
					<?php else: ?>
						<li><a href="login.php"><strong>Login</strong></a></li>
					<?php endif ?>
			    </ul>
            </div>

            <div id="middle">
