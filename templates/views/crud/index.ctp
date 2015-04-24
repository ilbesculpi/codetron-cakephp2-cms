<?php 
	$navigation = array(
		array(
			'icon' => 'fa fa-dashboard',
			'url' => Router::url(array('controller' => 'dashboard', 'action' => 'home')),
			'text' => __d('cms', 'Dashboard')
		),
		array(
			'icon' => 'fa fa-circle-o',
			'text' => __d('cms', '{{ Models }}')
		)
	);
?>

<div class="{{models}}">

	<?php echo $this->Theme->breadcrumbs($navigation); ?>

	<h2 class="page-header">
		<i class="fa fa-circle-o"></i>
		<?php echo __d('cms', '{{ Models }}'); ?>
	</h2>

	<h3 class="margin">
		<a href="<?php echo Router::url(array('action' => 'create')); ?>" class="btn btn-primary">
			<i class="fa fa-plus-circle"></i>
			<?php echo __d('cms', 'Create'); ?>
		</a>
	</h3>

	<?php if( !${{models}} ): ?>
    <div class="alert alert-info"><?php echo __d('cms', 'No {{Models}} found.'); ?></div>
	<?php else: ?>
    <div class="row">
        <table class="table table-striped">
            <tr>
                {{#fields}}
                <th><?php echo __d('cms', '{{ label }}'); ?></th>
                {{/fields}}
                <th>&nbsp;</th>
            </tr>
            <?php foreach(${{models}} as ${{model}}): ?>
            <tr>
                {{#fields}}
                <td><?php echo h(${{model}}['{{Model}}']['{{name}}']); ?></td>
                {{/fields}}
                <td class="text-right">
                    <a href="<?php echo Router::url(array('action' => 'view', ${{model}}['{{Model}}']['id'])); ?>" class="btn btn-default">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a href="<?php echo Router::url(array('action' => 'edit', ${{model}}['{{Model}}']['id'])); ?>" class="btn btn-default">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="<?php echo Router::url(array('action' => 'delete', ${{model}}['{{Model}}']['id'])); ?>" class="btn btn-default"
                       data-confirm="<?php echo __d('cms', 'Are you sure you want to delete this {{Model}}?'); ?>">
                        <i class="fa fa-trash-o"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    
    <?php if( $this->Paginator->numbers() ): ?>
    <div class="pagination pagination-right">
        <ul class="pagination">
            <?php
                echo $this->Paginator->prev( '<<', array( 'class' => '', 'tag' => 'li' ), null, array( 'class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a' ) );
                echo $this->Paginator->numbers( array( 'tag' => 'li', 'separator' => '', 'currentClass' => 'active', 'currentTag' => 'a' ) );
                echo $this->Paginator->next( '>>', array( 'class' => '', 'tag' => 'li' ), null, array( 'class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a' ) );
            ?>
        </ul>
    </div>
    <?php endif; ?>
    
	<?php endif; ?>

</div>