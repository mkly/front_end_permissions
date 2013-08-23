<?php defined('C5_EXECUTE') or die("Access Denied.") ?>

<p><?= t('Be sure to add the following to %s', '/config/site_post_autoload.php') ?></p>
<p><?= t('The autoloader entries are needed for the new permission key category to function') ?></p>

<pre><code>Loader::registerAutoload(array(
	'FrontEndPermissionKey' => array('model','permission/keys/front_end', 'front_end_permissions'),
	'FrontEndPermissionAccess' => array('model', 'permission/access/categories/front_end', 'front_end_permissions')
));</code></pre>
