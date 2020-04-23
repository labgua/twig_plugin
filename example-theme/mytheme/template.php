<?php

	if(!defined('IN_GS')){ die('you cannot load this page directly.'); }

	/*
	$template = getTwig()->loadTemplate('template.html.twig');
	$pageModel = getPageModel();

	echo $template->render( $pageModel->export() );
	*/

	echo render('bootstrap.html.twig');
?>