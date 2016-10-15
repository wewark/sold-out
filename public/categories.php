<?php

// configuration
require("../includes/config.php");

// if user requested to view a category
if (isset($_GET["cat_id"]))
{
	$items = CS50::query("SELECT * FROM items WHERE category = ?", $_GET["cat_id"]);

	render("view_cat_view.php",[
			"title" => CS50::query("SELECT * FROM categories WHERE id = ?", $_GET["cat_id"])[0]["name"],
			"items" => $items]);
}
else
{
	// get categories names and ids
	$cats = CS50::query("SELECT * FROM categories");

	render("categories_view.php",[
		"title" => "Categories",
		"cats" => $cats]);
}

?>