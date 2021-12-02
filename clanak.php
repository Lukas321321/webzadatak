		<article class="clanak">
			<div class="listaslika">
				<img src="<?php dajClanak($connection, intval($_GET['id']), 3)?>">
				<?php dajSlikeClanak($connection, intval($_GET['id'])); ?>
			</div>
			
			<hr/>
			<div class="datumObjave">
			<?php dajClanak($connection, intval($_GET['id']), 2)?>
			</div>
			<h1><?php dajClanak($connection, intval($_GET['id']), 0)?></h1>
			
			<p>
				<?php dajClanak($connection, intval($_GET['id']), 1)?>
			</p>
			
			<a href="novosti.html">
			Natrag
			</a>
		</article>