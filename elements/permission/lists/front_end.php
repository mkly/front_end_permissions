<?php defined('C5_EXECUTE') or die("Access Denied.") ?>

<table class="ccm-permission-grid">
<?php foreach (PermissionKey::getList('front_end') as $pk) { ?>
	<tr>
		<td class="ccm-permission-grid-name"
		    id="ccm-permission-grid-name-<?=$pk->getPermissionKeyID()?>">
			<strong><a dialog-title = "<?= tc('PermissionKeyName', $pk->getPermissionKeyName()) ?>"
			           data-pkID    = "<?= $pk->getPermissionKeyID() ?>"
			           data-paID    = "<?= $pk->getPermissionAccessID() ?>"
			           onclick      = "ccm_permissionLaunchDialog(this)"
			           href         = "javascript:void(0)"><?= tc('PermissionKeyName', $pk->getPermissionKeyName()) ?></a></strong>
		</td>
		<td id    = "ccm-permission-grid-cell-<?= $pk->getPermissionKeyID() ?>"
		    class = "ccm-permission-grid-cell"><?= Loader::element('permission/labels', array('pk' => $pk)) ?>
		</td>
	</tr>
<?php } /* foreach */ ?>
</table>

<script type="text/javascript">
ccm_permissionLaunchDialog = function(link) {
	var $link = $(link),
			title = $link.attr('dialog-title'),
	    pkID  = $link.attr('data-pkID'),
	    paID  = $link.attr('data-paID'),
	    href  = '<?= Loader::helper('concrete/urls')->getToolsURL('permissions/dialogs/front_end') ?>?pkID=' + pkID + '&paID=' + paID;

	jQuery.fn.dialog.open({
		title  : title,
		href   : href,
		modal  : false,
		width  : 500,
		height : 380
	});		
}
</script>
