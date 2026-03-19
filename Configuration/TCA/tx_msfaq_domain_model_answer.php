<?php

declare(strict_types=1);

$llPath = 'LLL:EXT:ms_faq/Resources/Private/Language/locallang_db.xlf';
$table = 'tx_msfaq_domain_model_answer';

return [
    'ctrl' => [
        'title' => $llPath . ':' . $table,
        'label' => 'content',
        'sortby' => 'sorting',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'iconfile' => 'EXT:ms_faq/Resources/Public/Icons/Extension.svg',
    ],
    'columns' => [
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    ['label' => '', 'invertStateDisplay' => true],
                ],
            ],
        ],
        'question' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'content' => [
            'label' => $llPath . ':' . $table . '.content',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'required' => true,
            ],
        ],
    ],
    'types' => [
        '0' => [
            'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                    content,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                    hidden
            ',
        ],
    ],
];
