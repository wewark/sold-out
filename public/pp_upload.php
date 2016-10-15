<?php

// configuration
require("../includes/config.php");
// to upload image
require("../includes/image.php");

// if user reached page via GET (as by clicking a link or via redirect)
if ($_SERVER["REQUEST_METHOD"] == "GET")
{
	// else render form
	render("pp_upload_view.php");
}

// else if user reached page via POST (as by submitting a form via POST)
else if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$result = uploadImage("pp", $_SESSION["id"]);
	if ($result === true)
	{
		redirect("profile.php");
	}
	else
	{
		render("pp_upload_view.php", ["title" => "Upload Profile Picture", "problem" => $result]);
	}

}

?>