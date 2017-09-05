<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function($extKey)
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Asvet.Kuehlschrank',
            'Kuehlschrankverwaltung',
            'kuehlschrank'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($extKey, 'Configuration/TypoScript', 'Kühlschrank Verwaltung Dein Raum');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_kuehlschrank_domain_model_kuelschrank', 'EXT:kuehlschrank/Resources/Private/Language/locallang_csh_tx_kuehlschrank_domain_model_kuelschrank.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_kuehlschrank_domain_model_kuelschrank');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_kuehlschrank_domain_model_benutzer', 'EXT:kuehlschrank/Resources/Private/Language/locallang_csh_tx_kuehlschrank_domain_model_benutzer.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_kuehlschrank_domain_model_benutzer');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_kuehlschrank_domain_model_getraenkefaecher', 'EXT:kuehlschrank/Resources/Private/Language/locallang_csh_tx_kuehlschrank_domain_model_getraenkefaecher.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_kuehlschrank_domain_model_getraenkefaecher');

    },
    $_EXTKEY
);
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder