<?php defined('C5_EXECUTE') or die("Access Denied.") ?>

<?php $pk = PermissionKey::getByID($_REQUEST['pkID']) ?>
<?php Loader::element('permission/detail', array('permissionKey' => $pk)) ?>
<script type="text/javascript">
	var ccm_permissionDialogURL = '<?= Loader::helper('concrete/urls')->getToolsURL('permissions/dialogs/front_end', 'front_end_permissions') ?>';
</script>
