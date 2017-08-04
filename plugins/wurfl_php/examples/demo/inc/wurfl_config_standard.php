<?php
/*
 * This is an example of configuring the WURFL PHP API
 */

// Enable all error logging while in development
// ini_set('display_errors', 'on');
// error_reporting(E_ALL);

$wurflDir = dirname(__FILE__) . '/../../../WURFL';
$resourcesDir = dirname(__FILE__) . '/../../resources';

require_once $wurflDir.'/Application.php';

$persistenceDir = $resourcesDir.'/storage/persistence';
$cacheDir = $resourcesDir.'/storage/cache';

// Create WURFL Configuration
$wurflConfig = new WURFL_Configuration_InMemoryConfig();

// Set location of the WURFL File
$wurflConfig->wurflFile($resourcesDir.'/wurfl.zip');

// Set the match mode for the API ('performance' or 'accuracy')
$wurflConfig->matchMode('accuracy');

// Automatically reload the WURFL data if it changes
$wurflConfig->allowReload(true);

// Optionally specify which capabilities should be loaded
/*$wurflConfig->capabilityFilter(array(
	"device_os",
	"device_os_version",
	"is_tablet",
	"mobile_browser",
	"mobile_browser_version",
	"resolution_height",
	"resolution_width",
	"ux_full_desktop",
	"xhtml_support_level",
	"can_assign_phone_number",
	"is_android",
	"is_ios",
	"is_windows_phone",
	"is_smartphone",
	"is_largescreen"
));*/

// Setup WURFL Persistence
$wurflConfig->persistence('file', array('dir' => $persistenceDir));

// Setup Caching
$wurflConfig->cache('file', array('dir' => $cacheDir, 'expiration' => 36000));


// Create a WURFL Manager Factory from the WURFL Configuration
$wurflManagerFactory = new WURFL_WURFLManagerFactory($wurflConfig);

// Create a WURFL Manager
/* @var $wurflManager WURFL_WURFLManager */
$wurflManager = $wurflManagerFactory->create();
