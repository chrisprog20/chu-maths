<?php
declare(strict_types=1);

use Chu\ChuMaths\Controller\RecursiveSequenceController;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die('Access denied.');

ExtensionUtility::configurePlugin(
        'ChuMaths',
        'RecursiveSequence',
        // all actions
        [
            RecursiveSequenceController::class => 'index',
        ],
        // non-cacheable actions
        [
            RecursiveSequenceController::class => 'index',
        ]
);