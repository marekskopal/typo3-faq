<?php

declare(strict_types=1);

$llPath = 'LLL:EXT:ms_faq/Resources/Private/Language/locallang_db.xlf';
$table = 'tx_msfaq_domain_model_question';

return [
    'ctrl' => [
        'title' => $llPath . ':' . $table,
        'label' => 'title',
        'sortby' => 'sorting',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'iconfile' => 'EXT:ms_faq/Resources/Public/Icons/Question.svg',
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
        'title' => [
            'label' => $llPath . ':' . $table . '.title',
            'config' => [
                'type' => 'input',
                'size' => 40,
                'max' => 255,
                'eval' => 'trim',
                'required' => true,
            ],
        ],
        'perex' => [
            'label' => $llPath . ':' . $table . '.perex',
            'config' => [
                'type' => 'text',
                'rows' => 3,
                'cols' => 40,
                'eval' => 'trim',
            ],
        ],
        'categories' => [
            'config' => [
                'type' => 'category',
            ],
        ],
        'always_open' => [
            'label' => $llPath . ':' . $table . '.always_open',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    ['label' => ''],
                ],
            ],
        ],
        'answers' => [
            'label' => $llPath . ':' . $table . '.answers',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_msfaq_domain_model_answer',
                'foreign_field' => 'question',
                'appearance' => [
                    'collapseAll' => true,
                    'useSortable' => true,
                ],
            ],
        ],
    ],
    'types' => [
        '0' => [
            'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                    title, perex, always_open, answers,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
                    categories,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                    sys_language_uid, l10n_parent, l10n_diffsource,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                    hidden
            ',
        ],
    ],
];
