<?php

declare(strict_types=1);

use MarekSkopal\MsFaq\Controller\FaqController;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

ExtensionUtility::configurePlugin(
    'MsFaq',
    'Faq',
    [FaqController::class => 'list'],
    [],
    ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT,
);
