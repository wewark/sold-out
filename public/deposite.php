<?php

	// configuration
	require("../includes/config.php");

	// if user reached page via GET (as by clicking a link of via redirect)
	if ($_SERVER["REQUEST_METHOD"] == "GET")
	{
		// render form
		render("deposite_form.php", ["title" => "Deposite Funds"]);
	}

	// else if the user reached page via POST (as by submitting a form via POST)
	else if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		// update user cash
		CS50::query("UPDATE users SET cash = cash + ? WHERE id = ?", $_POST["amount"], $_SESSION["id"]);

		// history saving
        CS50::query("INSERT INTO history(user_id, type, total, date_time) VALUES (?, ?, ?, NOW())", $_SESSION["id"], 'Deposite', $_POST["amount"]);

		render("deposite_form.php", ["title" => "Deposite Funds", "successful" => "Deposition Successful!"]);
	}

?>