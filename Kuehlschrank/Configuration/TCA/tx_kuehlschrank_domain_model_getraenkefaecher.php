<?php
return [
    'ctrl' => [
        'title'	=> 'LLL:EXT:kuehlschrank/Resources/Private/Language/locallang_db.xlf:tx_kuehlschrank_domain_model_getraenkefaecher',
        'label' => 'name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
		'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => [
        ],
		'searchFields' => 'name,max_anzahl,ist_anzahl,preis',
        'iconfile' => 'EXT:kuehlschrank/Resources/Public/Icons/tx_kuehlschrank_domain_model_getraenkefaecher.gif'
    ],
    'interface' => [
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, name, max_anzahl, ist_anzahl, preis',
    ],
    'types' => [
		'1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, name, max_anzahl, ist_anzahl, preis'],
    ],
    'columns' => [
		'sys_language_uid' => [
			'exclude' => true,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => [
				'type' => 'select',
				'renderType' => 'selectSingle',
				'special' => 'languages',
				'items' => [
					[
						'LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages',
						-1,
						'flags-multiple'
					]
				],
				'default' => 0,
			],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_kuehlschrank_domain_model_getraenkefaecher',
                'foreign_table_where' => 'AND tx_kuehlschrank_domain_model_getraenkefaecher.pid=###CURRENT_PID### AND tx_kuehlschrank_domain_model_getraenkefaecher.sys_language_uid IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
		't3ver_label' => [
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],
        'name' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:kuehlschrank/Resources/Private/Language/locallang_db.xlf:tx_kuehlschrank_domain_model_getraenkefaecher.name',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim,required'
			],
	    ],
	    'max_anzahl' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:kuehlschrank/Resources/Private/Language/locallang_db.xlf:tx_kuehlschrank_domain_model_getraenkefaecher.max_anzahl',
	        'config' => [
			    'type' => 'input',
			    'size' => 4,
			    'eval' => 'int,required'
			]
	    ],
	    'ist_anzahl' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:kuehlschrank/Resources/Private/Language/locallang_db.xlf:tx_kuehlschrank_domain_model_getraenkefaecher.ist_anzahl',
	        'config' => [
			    'type' => 'input',
			    'size' => 4,
			    'eval' => 'int'
			]
	    ],
	    'preis' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:kuehlschrank/Resources/Private/Language/locallang_db.xlf:tx_kuehlschrank_domain_model_getraenkefaecher.preis',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'double2',
                'default' => '1.50'
			]
	    ],
        'kuelschrank' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
    ],
];
