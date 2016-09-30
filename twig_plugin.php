<?php
/*
Plugin Name: Twig Plugin
Description: Include Twig Engine for make simple themes
Version: 1.0
Author: Sergio Guastaferro
Author URI: https://www.linkedin.com/in/sergio-guastaferro-5826a171
*/

#loading Twig template engine
require_once dirname(__FILE__).'/twig_plugin/twig/lib/Twig/Autoloader.php';

#loading model class of the page
require_once dirname(__FILE__).'/twig_plugin/PageModel.class.php';


$thisfile=basename(__FILE__, ".php");

register_plugin(
	$thisfile, 
	'Twig Plugin', 	
	'1.0', 		
	'Sergio Guastaferro',
	'https://www.linkedin.com/in/sergio-guastaferro-5826a171', 
	'Include Twig Engine for make simple themes',
	'',
	''  
);


//# functions

// get an initialized instance of twig
function getTwig(){
	$dbWebsite = GSDATAOTHERPATH . 'website.xml';
	$dataWebsite = getXML($dbWebsite);
	$currThemePath = dirname(__FILE__) . '/../theme/' . $dataWebsite->TEMPLATE; 

	Twig_Autoloader::register(true);
	$loader = new Twig_Loader_Filesystem( $currThemePath . '/views' );
	$twig = new Twig_Environment($loader);

	return $twig;
}

// get the page-model of the current page, this is the 'context' to pass to twig 
function getPageModel(){
	return new Page();
}

// a shortcut to render a specific template ( defined in 'theme/MYTHEME/view/' ) with the current page-model  
function render( $template_name ){
	$template = getTwig()->loadTemplate( $template_name );
	$pageModel = getPageModel();
	return $template->render( $pageModel->export() );
}

?>