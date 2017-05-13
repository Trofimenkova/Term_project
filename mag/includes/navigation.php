<div class="pagination">
	<ul>
		<li><a href="products.php?page=<?=($_GET['page']-1)?>&sort=<?=$_POST['sort']?>&min_price=<?=$_POST['min_price']?>&max_price=<?=$_POST['max_price']?>" onclick="return stopPrev(<?=($_GET['page']-1)?>)"><span class="ico-prev"></span></a></li>
		<?php
			$str = 1;
			while ($str <= ceil($amount/12)): 
		?>
		<li><a href="products.php?page=<?=$str?>&sort=<?=$_POST['sort']?>&min_price=<?=$_POST['min_price']?>&max_price=<?=$_POST['max_price']?>"><?=$str?></a></li>
		<?php
			$str++;
			endwhile;
		?>
		<li><a href="products.php?page=<?=($_GET['page']+1)?>&sort=<?=$_POST['sort']?>&min_price=<?=$_POST['min_price']?>&max_price=<?=$_POST['max_price']?>" onclick="return stopNext(<?=($_GET['page']+1)?>, <?=ceil($amount/12)?>)"><span class="ico-next"></span></a></li>
	</ul>
</div>