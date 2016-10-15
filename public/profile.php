<?php

// configuration
require("../includes/config.php");

if (!isset($_SESSION["id"]) && !isset($_GET["id"]))
{
	redirect("login.php");
}

else if ($_SERVER["REQUEST_METHOD"] == "GET")
{
	// get profile data and render it
	$user = CS50::query("SELECT * FROM users WHERE id = ?", isset($_GET["id"]) ? $_GET["id"] : $_SESSION["id"])[0];
	$items = CS50::query("SELECT * FROM items WHERE user_id = ?", isset($_GET["id"]) ? $_GET["id"] : $_SESSION["id"]);

	// decide which sorting of items the user wants
	if (isset($_GET["sort_by"]) && $_GET["sort_by"] != "date")
	{
		function cmp($a, $b)
		{
			if ($a[$_GET["sort_by"]] == $b[$_GET["sort_by"]])
			{
				return 0;
			}
			return $a[$_GET["sort_by"]] < $b[$_GET["sort_by"]] ? -1 : 1;
		}
		usort($items, "cmp");
		if ($_GET["order"] == "dsc")
		{
			$items = array_reverse($items);
		}
		render("profile_view.php", [
			"title" => $user["full_name"],
			"user" => $user,
			"items" => $items,
			"sort_by" => $_GET["sort_by"],
			"order" => $_GET["order"]
			]);
	}
	else if (isset($_GET["sort_by"]) && $_GET["sort_by"] == "date" && $_GET["order"] == "asc")
	{
		$items = array_reverse($items);
		render("profile_view.php", [
			"title" => $user["full_name"],
			"user" => $user,
			"items" => $items,
			"sort_by" => "date",
			"order" => "asc"
			]);
	}
	else
	{
		render("profile_view.php", [
			"title" => $user["full_name"],
			"user" => $user,
			"items" => $items,
			"sort_by" => "date",
			"order" => "dsc"
			]);
	}
}

?>