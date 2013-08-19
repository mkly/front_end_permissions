<?php defined('C5_EXECUTE') or die("Access Denied.") ?>

<?= $dh->getDashboardPaneHeaderWrapper(t('Front End Permissions'), false, 'span8 offset2', false) ?>

<form method="post" action="<?= $this->action('save') ?>">
	<?= $vt->output('save_front_end_permissions') ?>

	<div class="ccm-pane-body">
		<?php Loader::element('permission/lists/front_end', array(), Package::getByHandle('front_end_permissions')) ?>
	</div><!-- .ccm-pane-body -->

	<div class="ccm-pane-footer">
		<?= $ih->button(t('Cancel'), $this->url('/dashboard/system/permissions/front_end'), 'left') ?>
		<button type="submit" value="<?= t('Save') ?>" class="btn primary ccm-button-right"><?= t('Save') ?> <i class="icon-ok-sign icon-white"></i></button>
	</div><!-- .ccm-pane-footer -->

</form>

<?= $dh->getDashboardPaneFooterWrapper(false) ?>
