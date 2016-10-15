<?php

// configuration
require("../includes/config.php");
// to upload images
require("../includes/image.php");

// get categories from database
$cats = CS50::query("SELECT * FROM categories");

if ($_SERVER["REQUEST_METHOD"] == "GET")
{
	// render form
	render("add_item_form.php", ["title" => "Add New Item", "cats" => $cats]);
}
else if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	// if forms not filled
	if ($_POST["name"] == "" ||
		$_POST["price"] == "" ||
		$_POST["description"] == "" ||
		$_POST["quantity"] == "")
	{
		render("add_item_form.php", ["title" => "Add New Item", "cats" => $cats, "problem" => "Please fill all the forms"]);
	}

	// if no image selected
	else if (empty($_FILES["fileToUpload"]["name"]))
	{
		render("add_item_form.php", ["title" => "Add New Item", "cats" => $cats, "problem" => "Please upload an photo of your item"]);
	}
	else
	{
		// try to upload image with name "tmp"
		$result = uploadImage("item_images", "tmp");

		// if image was uploaded successfully
		if ($result === true)
		{
			// add the item to database
			CS50::query("INSERT INTO items (user_id, name, price, category, description, quantity, date_time) VALUES (?, ?, ?, ?, ?, ?, NOW())",
				$_SESSION["id"], $_POST["name"], $_POST["price"], $_POST["category"], $_POST["description"], $_POST["quantity"]);
			$item_id = CS50::query("SELECT LAST_INSERT_ID() AS id")[0]["id"];

			// rename img from tmp to its id
			rename("item_images/tmp.png", "item_images/". $item_id. ".png");

			// redirect to item page
			redirect("item.php?id=". $item_id);
		}
		else
		{
			render("add_item_form.php", ["title" => "Add New Item", "cats" => $cats, "problem" => $result]);
		}
	}
}

?>