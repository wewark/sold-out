<?php

// configuration
require("../includes/config.php");

// viewing item
if ($_SERVER["REQUEST_METHOD"] == "GET")
{
	// get item data
	$item = CS50::query("SELECT * FROM items WHERE id = ?", $_GET["id"])[0];

	// render form
	render("item_view.php", [
		"title" => $item["name"],
		"item" => $item]);
}

else if (!isset($_SESSION["id"]))
{
	redirect("login.php");
}

// buying item
else if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	// confirm
	if (!isset($_POST["sure"]))
	{
		render("confirm_view.php", [
			"title" => "Are you Sure?",
			"id" => $_POST["id"],
			"qnty_to_buy" => $_POST["qnty_to_buy"],
			"item_name" => $_POST["item_name"]]);
	}

	// buy it
	else
	{
		$item = CS50::query("SELECT * FROM items WHERE id = ?", $_POST["id"])[0];
		$seller = CS50::query("SELECT * FROM users WHERE id = ?", $item["user_id"])[0];
		$buyer = CS50::query("SELECT * FROM users WHERE id = ?", $_SESSION["id"])[0];

		// if the buyer is not rich enough
		if ($item["price"] * $_POST["qnty_to_buy"] > $buyer["cash"])
		{
			// render form
			render("item_view.php", [
				"title" => $item["name"],
				"item" => $item,
				"problem" => "Sorry! You don't have enough balance to buy the selected quantity of this item"]);
		}

		// else buy it
		else
		{
			// tell history guy1 bought from guy2
			CS50::query("INSERT INTO history (user_id, type, item_name, fromto, item_id, price, quantity, total, date_time) VALUES (?, 'Purchase', ?, ?, ?, ?, ?, ?, NOW())",
				$buyer["id"],
				$item["name"],
				$seller["id"],
				$item["id"],
				$item["price"],
				$_POST["qnty_to_buy"],
				$item["price"] * $_POST["qnty_to_buy"]);

			// tell history guy2 sold to guy1
			CS50::query("INSERT INTO history (user_id, type, item_name, fromto, item_id, price, quantity, total, date_time) VALUES (?, 'Sale', ?, ?, ?, ?, ?, ?, NOW())",
				$seller["id"],
				$item["name"],
				$buyer["id"],
				$item["id"],
				$item["price"],
				$_POST["qnty_to_buy"],
				$item["price"] * $_POST["qnty_to_buy"]);

			// take money
			CS50::query("UPDATE users SET cash = cash - ? WHERE id = ?",
				$item["price"] * $_POST["qnty_to_buy"],
				$_SESSION["id"]);

			// give money, so simple
			CS50::query("UPDATE users SET cash = cash + ? WHERE id = ?",
				$item["price"] * $_POST["qnty_to_buy"],
				$item["user_id"]);

			if ($item["quantity"] - $_POST["qnty_to_buy"] == 0)
			{
				CS50::query("DELETE FROM items WHERE id = ?", $item["id"]);
			}
			else
			{
				CS50::query("UPDATE items SET quantity = quantity - ? WHERE id = ?",
					$_POST["qnty_to_buy"],
					$item["id"]);
			}
			redirect("profile.php");
		}
	}
}

?>