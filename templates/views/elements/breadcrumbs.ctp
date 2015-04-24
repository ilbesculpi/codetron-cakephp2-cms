<ol class="breadcrumb">
	<?php foreach($navigation as $item): ?>
	<?php if( $item != end($navigation) ): ?>
	<li>
		<a href="<?php echo $item['url']; ?>">
			<?php if( isset($item['icon']) ): ?>
			<i class="<?php echo $item['icon']; ?>"></i>
			<?php endif; ?>
			<?php echo $item['text']; ?>
		</a>
	</li>
	<?php else: ?>
	<li class="active">
		<?php if( isset($item['icon']) ): ?>
		<i class="<?php echo $item['icon']; ?>"></i>
		<?php endif; ?>
		<?php echo $item['text']; ?>
	</li>
	<?php endif; ?>
	<?php endforeach; ?>
</ol>