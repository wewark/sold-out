
<div class="error_msg">
	<?
	if (isset($problem))
	{
		echo $problem;
	}
	?>
</div>
<div>
	<table style="margin: auto; position: relative; width: auto;">
		<tr>
			<td rowspan="4">
				<img src="<?= "/item_images/". $item["id"]. ".png" ?>" alt="profile pic" height="200" width="200" />
			</td>
		</tr>
		<tr>
			<td class="item_prob">
				<?= $item["name"] ?>
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
			<td class="desc" colspan="2" style="width: 500px">
				<?= $item["description"] ?>
			</td>
		</tr>
		<tr>
			<td class="desc" colspan="2" style="font-size: 100%">
				<a href="profile.php?id=<?= $item['user_id'] ?>">
					<?= CS50::query("SELECT * FROM users WHERE id = ?", $item["user_id"])[0]["full_name"] ?>
				</a>
				<br />
				<span style="font-size: 80%;">
					<?= $item["date_time"] ?>
				</span>
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
</div>