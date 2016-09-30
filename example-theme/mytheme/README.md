Here you can define the template pages.

You SHOULD only insert templates page; If you need a controller push it in a subdirectory.
Because GetSimple will read the php-files in this directory as a "template page-script".

To create a new page template : 
 - you must define a new 'view' in the views directory (for example 'page.html.twig' )
 - create a new php file (for example 'page.php')
 - put in this php file the following code :

	<?php
	   if(!defined('IN_GS')){ die('you cannot load this page directly.'); }
	   echo render('page.html.twig');
	?>

Now, when you select this template for a page, it will be run this script that render the associated twig-file