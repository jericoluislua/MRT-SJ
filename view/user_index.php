<article class="hreview open special">
	<?php if (empty($users)): ?>
		<div class="dhd">
			<h2 class="item title">Hoopla! Keine User gefunden.</h2>
		</div>
	<?php else: ?>
		<?php foreach ($users as $user): ?>
			<div class="panel panel-default">
				<div class="panel-heading"><?= $user->uname;?></div>
				<div class="panel-body">
					<p>
						<a title="Löschen" href="/user/delete?id=<?= $user->id ?>">Löschen</a>
					</p>
				</div>
			</div>
		<?php endforeach ?>
	<?php endif ?>

</article>
