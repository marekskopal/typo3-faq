<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') or die;

ExtensionManagementUtility::addStaticFile('ms_faq', 'Configuration/Sets/MsFaq/', 'FAQ');
