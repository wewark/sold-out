
<div class="error_msg">
	<?php
	if (isset($problem))
	{
		if ($problem == "username")
			echo "Please provide your username";

		else if ($problem == "password")
			echo "Please provide your password";

		else if ($problem == "invalid")
			echo "Invalid username and/or password";
	}
	?>
</div>
<form action="login.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="username" placeholder="Username" type="text"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="password" placeholder="Password" type="password"/>
        </div>
        <div class="form-group">
            <button class="btn btn-default" type="submit">
                <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                Log In
            </button>
        </div>
    </fieldset>
</form>
<div>
    or <a href="register.php">register</a> for an account
</div>
