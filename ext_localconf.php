<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function($extKey)
	{

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Asvet.Kuehlschrank',
            'Kuehlschrankverwaltung',
            [
                'Kuelschrank' => 'show,calculateajax',
                'Benutzer' => 'list, show, new, create, edit, update, delete',
                'Getraenkefaecher' => 'list, show'
            ],
            // non-cacheable actions
            [
                'Kuelschrank' => 'show,calculateajax',
                'Benutzer' => 'create, update, delete',
                'Getraenkefaecher' => ''
            ]
        );

	// wizards
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
		'mod {
			wizards.newContentElement.wizardItems.plugins {
				elements {
					kuehlschrankverwaltung {
						icon = ' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($extKey) . 'Resources/Public/Icons/user_plugin_kuehlschrankverwaltung.svg
						title = LLL:EXT:kuehlschrank/Resources/Private/Language/locallang_db.xlf:tx_kuehlschrank_domain_model_kuehlschrankverwaltung
						description = LLL:EXT:kuehlschrank/Resources/Private/Language/locallang_db.xlf:tx_kuehlschrank_domain_model_kuehlschrankverwaltung.description
						tt_content_defValues {
							CType = list
							list_type = kuehlschrank_kuehlschrankverwaltung
						}
					}
				}
				show = *
			}
	   }'
	);
    },
    $_EXTKEY
);
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder