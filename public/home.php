<?php

// configuration
require("../includes/config.php");

// get items for sale
$items = array_reverse(CS50::query("SELECT * FROM items"));

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
	render("home_view.php", ["items" => $items,
		"sort_by" => $_GET["sort_by"],
		"order" => $_GET["order"]
		]);
}
else if (isset($_GET["sort_by"]) && $_GET["sort_by"] == "date" && $_GET["order"] == "asc")
{
	$items = array_reverse($items);
	render("home_view.php", ["items" => $items,
		"sort_by" => "date",
		"order" => "asc"
		]);
}
else
{
	render("home_view.php", ["items" => $items,
		"sort_by" => "date",
		"order" => "dsc"
		]);
}

?>