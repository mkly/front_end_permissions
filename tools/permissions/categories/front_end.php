<?php
defined('C5_EXECUTE') or die("Access Denied.");

$p = new Permissions();
if (!$p->canAccessTaskPermissions()) {
	return;
}
if (!isset($_REQUEST['task'])) {
	return;
}
if(!Loader::helper('validation/token')->validate($_REQUEST['task'])) {
	return;
}

switch ($_REQUEST['task']) {
	case 'add_access_entity':
		$pk = FrontEndPermissionKey::getByID($_REQUEST['pkID']);
		$pa = PermissionAccess::getByID($_REQUEST['paID'], $pk);
		$pe = PermissionAccessEntity::getByID($_REQUEST['peID']);
		$pd = PermissionDuration::getByID($_REQUEST['pdID']);
		$pa->addListItem($pe, $pd, $_REQUEST['accessType']);
	break;
	case 'remove_access_entity':
		$pk = FrontEndPermissionKey::getByID($_REQUEST['pkID']);
		$pa = PermissionAccess::getByID($_REQUEST['paID'], $pk);
		$pe = PermissionAccessEntity::getByID($_REQUEST['peID']);
		$pa->removeListItem($pe);
	break;
	case 'save_permission':
		$pk = FrontEndPermissionKey::getByID($_REQUEST['pkID']);
		$pa = PermissionAccess::getByID($_REQUEST['paID'], $pk);
		$pa->save($_POST);
	break;
	case 'display_access_cell':
		$pk = FrontEndPermissionKey::getByID($_REQUEST['pkID']);
		$pa = PermissionAccess::getByID($_REQUEST['paID'], $pk);
		Loader::element('permission/labels', array('pk' => $pk, 'pa' => $pa));
	break;
	case 'save_workflows':
		$pk = FrontEndPermissionKey::getByID($_REQUEST['pkID']);
		foreach($_POST['wfID'] as $wfID) {
			$wf = Workflow::getByID($wfID);
			if (is_object($wf)) {
				$pk->attachWorkflow($wf);
			}
		}
	break;
}
