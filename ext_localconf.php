<?php

declare(strict_types=1);

use Chu\ChuMaths\Controller\RecursiveSequence\AjaxController;
use Chu\ChuMaths\Controller\RecursiveSequence\IndexController;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die('Access denied.');

ExtensionUtility::configurePlugin(
    'ChuMaths',
    'RecursiveSequence',
    [IndexController::class => 'index'],
);

ExtensionUtility::configurePlugin(
    'ChuMaths',
    'RecursiveSequenceAjax',
    [AjaxController::class => 'calculate'],
    [AjaxController::class => 'calculate']
);
