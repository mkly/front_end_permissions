<?php defined('C5_EXECUTE') or die("Access Denied.") ?>

<?php $pk = PermissionKey::getByID($_REQUEST['pkID']) ?>
<?php Loader::element('permission/detail', array('permissionKey' => $pk), Package::getByHandle('front_end')) ?>
<script type="text/javascript">
	var ccm_permissionDialogURL = '<?= REL_DIR_FILES_TOOLS_REQUIRED ?>/permissions/dialogs/front_end';
</script>
