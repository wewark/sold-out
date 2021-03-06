<?php if(!isset($items)): ?>
<h1 style="opacity: 0.1; text-align: center; font-size: 420%; padding: 50px;">
	Nothing yet
</h1>
<?php else: ?>

<form action="home.php" method="get">
	<fieldset>
		<div class="form-group">
			Sort by 
			<select class="form-control" name="sort_by">
				<option value="name" <?= $sort_by == "name" ? "selected" : "" ?>>Name</option>
				<option value="date" <?= $sort_by == "date" ? "selected" : "" ?>>Date</option>
				<option value="price" <?= $sort_by == "price" ? "selected" : "" ?>>Price</option>
				<option value="quantity" <?= $sort_by == "quantity" ? "selected" : "" ?>>Quantity</option>
			</select>
			<select class="form-control" name="order">
				<option value="asc" <?= $order == "asc" ? "selected" : "" ?>>Ascending</option>
				<option value="dsc" <?= $order == "dsc" ? "selected" : "" ?>>Descending</option>
			</select>
			<input class="btn btn-default" type="submit" value="Go" />
		</div>
	</fieldset>
</form>

<ol class="nav nav-pills">
	<?php foreach ($items as $item): ?>
	<li>
	<table style="margin: auto; position: relative; width: 350px; height: 300px;">
		<tr>
			<td rowspan="4">
				<a href="item.php?id=<?= $item["id"] ?>">
					<img src="<?= "/item_images/". $item["id"]. ".png" ?>" alt="profile pic" height="200" width="200" />
				</a>
			</td>
		</tr>
		<tr>
			<td class="item_prob">
				<a href="item.php?id=<?= $item["id"] ?>" style="font-size: 70%;">
					<?= $item["name"] ?>
				</a>
			</td>
		</tr>
		<tr>
			<td class="cash item_prob">
				$<?= number_format($item["price"], 2, '.', ',') ?>
			</td>
		</tr>
		<tr>
			<td class="item_prob">
				<div style="font-size: 120%; font-weight: bold;">
					<?= $item["quantity"] ?>
				</div>
				<div style="font-size: 70%;">
					Pieces
				</div>
			</td>
		</tr>
		<tr>
			<td class="desc" colspan="2" style="font-size: 100%">
				<a href="profile.php?id=<?= $item['user_id'] ?>">
					<?= CS50::query("SELECT * FROM users WHERE id = ?", $item["user_id"])[0]["full_name"] ?>
				</a><br /><span style="font-size: 80%;"> <?= $item["date_time"] ?></span>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<form action="item.php" method="post" style="padding-top: 13px">
					<fieldset>
						<div class="form-group" style="">
							<select class="form-control" name="qnty_to_buy">
								<?php
			  for ($i = 1; $i <= $item["quantity"]; $i++)
			  {
				  echo '<option value="'. $i. '">'. $i. "</option>\n";
			  }
								?>
							</select>
							<input type="hidden" name="id" value="<?= $item['id'] ?>" />
							<input type="hidden" name="item_name" value="<?= $item['name'] ?>" />
							<input class="btn btn-default" type="submit" value="Buy" name="submit" />
						</div>
					</fieldset>
				</form>
			</td>
		</tr>
	</table>
	</li>
	<?php endforeach;
	  endif; ?>
</ol>