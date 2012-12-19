<?php namespace Hwj; require_once __DIR__."/defines.php";
/**
 * Bootstrap file for the Joomla Platform.  Including this file into your application will make Joomla
 * Platform libraries available for use.
 *
 * @package    Joomla.Platform
 *
 * @copyright  Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

// Set the platform root path as a constant if necessary.
if (!my_defined('JPATH_PLATFORM'))
{
    my_define('JPATH_PLATFORM', __DIR__);
}

// Detect the native operating system type.
$os = strtoupper(substr(PHP_OS, 0, 3));

if (!my_defined('IS_WIN'))
{
	my_define('IS_WIN', ($os === 'WIN') ? true : false);
}
if (!my_defined('IS_UNIX'))
{
	my_define('IS_UNIX', (IS_WIN === false) ? true : false);
}

// Import the platform version library if necessary.
if (!class_exists('Hwj\JPlatform'))
{
	require_once JPATH_PLATFORM . '/platform.php';
}

// Import the library loader if necessary.
if (!class_exists('Hwj\JLoader'))
{
	require_once JPATH_PLATFORM . '/loader.php';
}

// Make sure that the Joomla Platform has been successfully loaded.
if (!class_exists('Hwj\JLoader'))
{
	throw new RuntimeException('Joomla Platform not loaded.');
}
// Setup the autoloaders.
JLoader::setup();

// Register the legacy library base path for deprecated or legacy libraries.
JLoader::registerPrefix('Hwj\J', JPATH_PLATFORM . '/legacy');

// Import the base Joomla Platform libraries.
JLoader::import('joomla.factory');

// Register classes for compatability with PHP 5.3
if (version_compare(PHP_VERSION, '5.4.0', '<'))
{
	JLoader::register('Hwj\JsonSerializable', JPATH_PLATFORM . '/compat/jsonserializable.php');
}

// Register classes that don't follow one file per class naming conventions.
JLoader::register('Hwj\JText', JPATH_PLATFORM . '/joomla/language/text.php');
JLoader::register('Hwj\JRoute', JPATH_PLATFORM . '/joomla/application/route.php');

// Register the folder for the moved JHtml classes
JHtml::addIncludePath(JPATH_PLATFORM . '/legacy/html');