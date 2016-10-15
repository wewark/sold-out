<?php

// configuration
require("../includes/config.php");

if (!isset($_SESSION["id"]))
{
	redirect("login.php");
}
else
{
	$rows = CS50::query("SELECT * FROM history WHERE user_id = ?", $_SESSION["id"]);
	render("history_view.php", ["title" => "History", "rows" => $rows]);
}

?>