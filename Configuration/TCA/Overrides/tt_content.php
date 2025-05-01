<?php

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') || die();

call_user_func(
    static function (): void {
        ExtensionUtility::registerPlugin(
            'ChuMaths',
            'RecursiveSequence',
            'LLL:EXT:chu_maths/Resources/Private/Language/locallang.xlf:plugin.recursive_sequence',
            'EXT:chu_maths/Resources/Public/Icons/Extension.svg'
        );
    }
);
