
<div>
	<?php if (count($rows) != 0): ?>
	<table class="history" style="margin: auto;">
		<tr>
			<td class="history_header">Date Time</td>
			<td class="history_header">Type</td>
			<td class="history_header">Item</td>
			<td class="history_header">From / To</td>
			<td class="history_header">Price</td>
			<td class="history_header">Quantity</td>
			<td class="history_header">Total</td>
		</tr>
		<?php foreach(array_reverse($rows) as $row): ?>
		<tr>
			<td class="history_data">
				<?= $row["date_time"] ?>
			</td>
			<td class="history_data">
				<?= $row["type"] ?>
			</td>
			<td class="history_data">
				<?= $row["item_name"] ?>
			</td>
			<td class="history_data">
				<?=
				  $row["fromto"] == "" ? "" :
				  "<a href='profile.php?id=". $row["fromto"]. "'>". CS50::query("SELECT * FROM users WHERE id = ?", $row["fromto"])[0]["full_name"]. "</a>";
				?>
			</td>
			<td class="history_data">
				$<?= number_format($row["price"], 2, '.', ',') ?>
			</td>
			<td class="history_data">
				<?= $row["quantity"] ?>
			</td>
			<td class="history_data" style="color: <?= $row["type"] == 'Purchase' ? 'red' : 'green' ?>;">
				$<?= number_format($row["total"], 2, '.', ',') ?>
			</td>
		</tr>
		<?php endforeach ?>
	</table>
	<?php else: ?>
	<h1 style="opacity: 0.1; text-align: center; font-size: 420%; padding: 50px;">
		No history yet
	</h1>
	<?php endif ?>
</div>