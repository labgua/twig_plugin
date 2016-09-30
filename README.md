# twig_plugin
Include Twig Engine in GetSimple CMS for make simple themes

This plugin allows you to use the Twig template engine within the themes that use it.
In particular, the plug-in incorporates the twig code and offers 3 functions that allow you to instantiate and run the render of a twig-script.
These functions can be easily called in the GetSimple template file.

The plugin defines the following functions:

## getTwig ()
This function returns an instance of twig already initialized.
The plugin is assumed that into the theme is present the 'views' folder where the script will look for twig-files

## getPageModel ()
This function return a Page object; This object contains all the information which refer the page to load, the selected theme, general information of the site, including of course the title of the page and its contents.
This is a wrapper of the most important information for implementing the page to display

## render ()
This method is a shortcut that allows you to run the render the page in question, the requested page.
This uses the above functions to RETURN the content to display.

#Installation
You can download the plugin from the GetSimple repository [here](http://get-simple.info/extend/plugin/twig-plugin/1066/) and extract the content in to the 'plugins' folder of GetSimple;
OR you can download the master in github and put in the plugin directory only the 'twig_plugin' folder and the 'twig_plugin.php' file.


#How To build a theme with the plugin?
In mytheme folder you will also find a skeleton theme, to be used to build new themes
