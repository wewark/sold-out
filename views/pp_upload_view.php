<div class="error_msg">
	<?php
	if (isset($problem))
	{
		echo $problem;
	}
	?>
</div>
<form action="pp_upload.php" method="post" enctype="multipart/form-data">
	<div class="form-group">
		Upload a profile picture
	</div>
	<div class="form-group">
		<input class="form-control" type="file" name="fileToUpload" id="fileToUpload" />
	</div>
	<div class="form-group">
		<input class="btn btn-default" type="submit" value="Upload Image" name="submit" />
	</div>
</form>