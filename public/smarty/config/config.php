<?php
namespace a\public\smarty\config;
require_once __DIR__ . '/../../vendor/autoload.php';
use Smarty\Smarty;

$smarty = new Smarty();

$smarty->setCacheDir(__DIR__ . '/../cache/');
$smarty->setConfigDir(__DIR__ . '/../configs/');
$smarty->setCompileDir(__DIR__ . '/../templates_c/');
$smarty->setTemplateDir(__DIR__ . '/../templates/');