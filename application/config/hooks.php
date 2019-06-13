<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/
$hook['display_override'][] = array(
	'class' => '', // classe que contém o hook, deixar em branco para forma procedural
	'function' => 'compress', // função ou método que executará o hook
	'filename' => 'compress.php', // nome do arquivo que contém o hook
	'filepath' => 'hooks' // Define caminho padrão do arquivo que contém o hook
);
