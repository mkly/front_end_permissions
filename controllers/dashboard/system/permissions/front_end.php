<?php
defined('C5_EXECUTE') or die("Access Denied.");

class DashboardSystemPermissionsFrontEndController extends DashboardBaseController {

	public function view() {
		$this->set('dh', Loader::helper('concrete/dashboard'));
		$this->set('ih', Loader::helper('concrete/interface'));
		$this->set('vt', Loader::helper('validation/token'));
	}

	public function save() {
		if (!Loader::helper('validation/token')->validate('save_permissions')) {
			$this->error->add(t('Invalid Token'));
			$this->view();
		}
		$tp = new TaskPermission();
		if (!$tp->canAccessTaskPermissions()) {
			$this->error-add(t('Access Denied'));
			$this->view();
		}
		$pkID = $this->post('pkID');
		foreach (PermissionKey::getList('front_end') as $pk) {
			$paID = $pkID[$pk->getPermissionKeyID()];
			$pt = $pk->getPermissionAssignmentObject();
			$pt->clearPermissionAssignment();
			if ($paID > 0) {
				$pa = PermissionAccess::getByID($paID, $pk);
				if (is_object($pa)) {
					$pt->assignPermissionAccess($pa);
				}
			}
		}
		$this->redirect('/dashboard/system/permissions/front_end', 'updated');
	}

	public function updated() {
		$this->view();
		$this->set('message', t('Permissions Updated'));
	}
}
