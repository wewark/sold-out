
<div class="error_msg">
	<?php
	if (isset($problem))
	{
		echo $problem;
	}
	?>
</div>
<form action="settings.php" method="post" enctype="multipart/form-data">
	<fieldset>
		<div class="form-group">
			Select profile picture
		</div>
		<div class="form-group">
			<input class="form-control" type="file" name="fileToUpload" id="fileToUpload" style="padding-bottom: 30px" />
		</div>
		<div class="form-group">
			<input autocomplete="off" class="form-control" name="full_name" placeholder="Full Name" type="text" value="<?= CS50::query("SELECT * FROM users WHERE id = ?", $_SESSION["id"])[0]["full_name"] ?>" />
		</div>
		<div class="form-group">
			<input class="form-control" name="current_password" placeholder="Current Password" type="password" />
		</div>
		<div class="form-group">
			<input class="form-control" name="new_password" placeholder="New Password" type="password" />
		</div>
		<div class="form-group">
			<input class="form-control" name="confirmation" placeholder="Confirm Password" type="password" />
		</div>
		<div class="form-group">
			<input class="btn btn-default" type="submit" value="Save" name="submit" />
		</div>
	</fieldset>
</form>