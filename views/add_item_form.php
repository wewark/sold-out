
<div class="error_msg">
	<?php
	if (isset($problem))
	{
		echo $problem;
	}
	?>
</div>
<form action="add_item.php" method="post" enctype="multipart/form-data">
	<fieldset>
		<div class="form-group">
			<input autocomplete="off" autofocus class="form-control" name="name" placeholder="Item Name" type="text" />
			<select class="form-control" name="category">
				<?php
				foreach ($cats as $cat)
				{
					echo '<option value="'. $cat["id"].  '">'. $cat["name"]. "</option>\n";
				}
				?>
			</select>
		</div>
		<div class="form-group">
			<input class="form-control" type="file" name="fileToUpload" id="fileToUpload" />
		</div>
		<div class="form-group">
			<input autocomplete="off" class="form-control" name="price" placeholder="Price($)" type="text" size="4" />
			<input autocomplete="off" class="form-control" name="quantity" placeholder="Quantity" type="text" size="4" />
		</div>
		<div class="form-group">
			<textarea class="form-control" rows="4" cols="50" name="description" placeholder="Description"></textarea>
		</div>
		<div class="form-group">
			<input class="btn btn-default" type="submit" name="submit" value="Add Item" />
		</div>
	</fieldset>
</form>