
<form action="item.php" method="post" enctype="multipart/form-data">
	<fieldset>
		<div class="form-group">
			<?= "Are you sure you want to buy ". $qnty_to_buy. " pieces of ". $item_name. "?" ?>
		</div>
		<div class="form-group">
			<input type="hidden" name="sure" value="yes" />
			<input type="hidden" name="id" value="<?= $id ?>" />
			<input type="hidden" name="qnty_to_buy" value="<?= $qnty_to_buy ?>" />
			<input class="btn btn-default" type="submit" value="Yes" name="submit" />
		</div>
		<a href="/item.php?id=<?= $id ?>">Go Back</a>
	</fieldset>
</form>