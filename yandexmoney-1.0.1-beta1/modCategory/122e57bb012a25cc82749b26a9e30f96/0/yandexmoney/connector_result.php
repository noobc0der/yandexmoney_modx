<?php
require_once dirname(dirname(dirname(dirname(__FILE__)))).'/config.core.php';

require_once MODX_CORE_PATH.'config/'.MODX_CONFIG_KEY.'.inc.php';
require_once MODX_CORE_PATH.'model/modx/modx.class.php';

$modx= new modX();
$modx->initialize('web');

$snippet = $modx->getObject('modSnippet',array('name'=>'YandexMoney'));
$config = $snippet->getProperties();

if (!defined('YANDEXMONEY_PATH')) {
	define('YANDEXMONEY_PATH', MODX_CORE_PATH."components/yandexmoney/");
}

if ($_GET['fail'] == 1){
	if ($res = $modx->getObject('modResource', $config['fail_page_id'])) {
		$modx->sendRedirect($modx->makeUrl($config['fail_page_id'],'','','full'));
	}
	exit;
}elseif($_GET['success']==1){
	if ($res = $modx->getObject('modResource', $config['success_page_id'])) {
		$modx->sendRedirect($modx->makeUrl($config['success_page_id'],'','','full'));
	}
	exit;
}


require_once YANDEXMONEY_PATH.'model/yandexmoney.class.php';
$ym = new Yandexmoney($modx, $config);

$order_id = $ym->ProcessResult();

if ($order_id){
	$modx->addPackage('shopkeeper', MODX_CORE_PATH."components/shopkeeper/model/");
	$order = $modx->getObject('SHKorder',array('id'=>$order_id));

	$order->set('status', 5);
	$order->save();
}

?>
