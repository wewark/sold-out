<?php

	// configuration
	require("../includes/config.php");

	// if user reached page via GET (as by clicking a link of via redirect)
	if ($_SERVER["REQUEST_METHOD"] == "GET")
	{
		// render form
		render("register_form.php", ["title" => "Register"]);
	}

	// else if the user reached page via POST (as by submitting a form via POST)
	else if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		// if the user left any entry blank
		if ($_POST["username"] == "" ||
			$_POST["password"] == "" ||
			$_POST["confirmation"] == "" ||
			$_POST["fullname"] == "")
		{
			render("register_form.php", ["title" => "Register", "problem" => "Please fill all the forms", "username_value" => $_POST["username"], "fullname_value" => $_POST["fullname"]]);
		}

		// else if password and confirmation doesn't match
		else if ($_POST["password"] != $_POST["confirmation"])
		{
			render("register_form.php", ["title" => "Register", "problem" => "Password and confirmation must match", "username_value" => $_POST["username"], "fullname_value" => $_POST["fullname"]]);
		}

		// register the user
		else
		{
			$reg = CS50::query("INSERT IGNORE INTO users (username, full_name, hash, cash) VALUES(?, ?, ?, 0.0000)", $_POST["username"], $_POST["fullname"], password_hash($_POST["password"], PASSWORD_DEFAULT));
			if ($reg == 0)
			{
				render("register_form.php", ["title" => "Register", "problem" => "This username is already taken", "username_value" => $_POST["username"]]);
			}
			else
			{
				$rows = CS50::query("SELECT LAST_INSERT_ID() AS id");
				$_SESSION["id"] = $rows[0]["id"];
				redirect("pp_upload.php");
			}
		}
	}
?>