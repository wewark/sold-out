<?php

foreach ($cats as $cat)
{
	echo "<a href='categories.php?cat_id=". $cat["id"]. "'>". $cat["name"]. "</a>\n<br/>";
}

?>