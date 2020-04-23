<?php
/*
Plugin Name: Twig Plugin
Description: Include Twig Engine for make simple themes
Version: 1.3
Author: Sergio Guastaferro
Author URI: https://www.linkedin.com/in/sergio-guastaferro-5826a171
*/

//loading other dependencies
require_once dirname(__FILE__).'/twig_plugin/vendor/autoload.php';

//loading model class of the page
require_once dirname(__FILE__).'/twig_plugin/PageModel.class.php';

$thisfile=basename(__FILE__, ".php");

register_plugin(
	$thisfile, 
	'Twig Plugin', 	
	'1.3', 		
	'Sergio Guastaferro',
	'https://www.linkedin.com/in/sergio-guastaferro-5826a171', 
	'Include Twig Engine for make simple themes',
	'',
	''  
);


// functions
// get an initialized twig instance
function getTwig(){
	$dbWebsite = GSDATAOTHERPATH . 'website.xml';
	$dataWebsite = getXML($dbWebsite);
	$currThemePath = dirname(__FILE__) . '/../theme/' . $dataWebsite->TEMPLATE; 

    $loader = new \Twig\Loader\FilesystemLoader($currThemePath . '/views');
	$twig = new \Twig\Environment($loader);

	$getSimpleWrapFunc = new \Twig\TwigFunction("_gs", function ($function_name, array $params = [] ){
        return call_user_func_array($function_name, $params);
    }, ['is_variadic' => true]);
    $twig->addFunction($getSimpleWrapFunc);

	return $twig;
}

// get the page-model of the current page, this is the 'context' to pass to twig 
function getPageModel(){
	return new Labgua\Twig_Plugin\Page();
}

// shortcut to render a specific template ( defined in 'theme/MYTHEME/view/' ) with the current page-model
function render( $template_name ){
	$template = getTwig()->loadTemplate( $template_name );
	$pageModel = getPageModel();
	return $template->render( $pageModel->export() );
}

?>