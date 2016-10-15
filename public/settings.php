<?php
// configuration
require("../includes/config.php");

// if user reached page via GET (as by clicking a link of via redirect)
if ($_SERVER["REQUEST_METHOD"] == "GET")
{
	// render form
	render("settings_form.php", ["title" => "Settings"]);
}

// else if the user reached page via POST (as by submitting a form via POST)
else if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	// update full name
	CS50::query("UPDATE users SET full_name = ? WHERE id = ?", $_POST["full_name"], $_SESSION["id"]);
	$uploadOk = true;
	if (!empty($_FILES["fileToUpload"]["name"]))
	{
		$result = uploadImage("pp", $_SESSION["id"]);
		if ($result !== true)
		{
			render("settings_form.php", ["title" => "Upload Profile Picture", "problem" => $result]);
		}
	}

	if ($uploadOk)
	{
		// no password change
		if ($_POST["current_password"] == "" &&
			$_POST["new_password"] == "" &&
			$_POST["confirmation"] == "")
		{
			redirect("profile.php");
		}

		// if not all the password fields are filled (no problem if they're all empty)
		else if (!($_POST["current_password"] == "" &&
			$_POST["new_password"] == "" &&
			$_POST["confirmation"] == "")
			&&
			($_POST["current_password"] == "" ||
			$_POST["new_password"] == "" ||
			$_POST["confirmation"] == ""))
		{
			render("settings_form.php", ["title" => "Settings", "problem" => "Please fill all the forms"]);
		}

		// if the 3 password fields are filled
		else if (!($_POST["current_password"] == "" ||
				$_POST["new_password"] == "" ||
				$_POST["confirmation"] == ""))
		{
			$user = CS50::query("SELECT * FROM users WHERE ID = ?", $_SESSION["id"])[0];

			// if the original password is wrong
			if (!password_verify($_POST["current_password"], $user["hash"]))
			{
				render("settings_form.php", ["title" => "Settings", "problem" => "Wrong password"]);
			}

			// else if password and confirmation don't match
			else if ($_POST["new_password"] != $_POST["confirmation"])
			{
				render("settings_form.php", ["title" => "Settings", "problem" => "New password and confirmation must match"]);
			}

			// if everything is ok, change password
			else
			{
				CS50::query("UPDATE users SET hash = ? WHERE id = ?", password_hash($_POST["new_password"], PASSWORD_DEFAULT), $_SESSION["id"]);

				// redirect to profile
				redirect("profile.php");
			}
		}
	}
}
?>