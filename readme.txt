/**
 * Project:
 * dceBadBehavior Plugin
 *
 * Description:
 * readme file
 *
 * @package    dceBadBehavior plugin
 * @version    $Rev$
 * @author     Ortwin Pinke
 * @copyright  Copyright (c) 2010, Ortwin Pinke <www.dceonline.de>
 * @license    GPL
 * @link       http://www.dceonline.de
 *
 * $Id$
 */


## Description ##
This is the initial version of dceBadBehavior Plugin for Contenido >= 4.8.x, which plugs the
spam killer script, available on http://www.bad-behavior.ioerror.us, to the frontend of Contenido.

At the moment the plugin has no backend part and it will be installed automatic for all clients.
You only may use the settings-array in includes/config.plugin.php to configurate the plugin. In further
versions there will be a backend part where you can change settings and display stats.

## Installation ##
The only thing you have to do is to unzip the package localy and upload all folders and files to
your Contenido plugin folder.

## Usage ##
With the next call of your frontend needed db-table will be installed and plugin now saves your frontend.
Calls within the Contenido-Backend or logged in as backenduser in frontend will neither be logged nor
blocked.
You may switch logging on or off within the settings-array in includes/config.plugin.php.
More information about 'Bad Behavior' will be found at http://www.bad-behavior.ioerror.us.


## Todo ##
- adding backendarea with config and stats part
- usage for multi client system
- better documentation



## History ##

Version 0.1.0 (2010-01-07)
- initial version of plugin