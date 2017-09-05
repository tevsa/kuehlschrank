<?php
defined('TYPO3_MODE') || die();

if (!isset($GLOBALS['TCA']['fe_users']['ctrl']['type'])) {
    if (file_exists($GLOBALS['TCA']['fe_users']['ctrl']['dynamicConfigFile'])) {
        require_once($GLOBALS['TCA']['fe_users']['ctrl']['dynamicConfigFile']);
    }
    // no type field defined, so we define it here. This will only happen the first time the extension is installed!!
    $GLOBALS['TCA']['fe_users']['ctrl']['type'] = 'tx_extbase_type';
    $tempColumnstx_kuehlschrank_fe_users = [];
    $tempColumnstx_kuehlschrank_fe_users[$GLOBALS['TCA']['fe_users']['ctrl']['type']] = [
        'exclude' => true,
        'label'   => 'LLL:EXT:kuehlschrank/Resources/Private/Language/locallang_db.xlf:tx_kuehlschrank.tx_extbase_type',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                ['MyFeUsers','Tx_Kuehlschrank_MyFeUsers']
            ],
            'default' => 'Tx_Kuehlschrank_MyFeUsers',
            'size' => 1,
            'maxitems' => 1,
        ]
    ];
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('fe_users', $tempColumnstx_kuehlschrank_fe_users);
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'fe_users',
    $GLOBALS['TCA']['fe_users']['ctrl']['type'],
    '',
    'after:' . $GLOBALS['TCA']['fe_users']['ctrl']['label']
);

/* inherit and extend the show items from the parent class */

if (isset($GLOBALS['TCA']['fe_users']['types']['0']['showitem'])) {
    $GLOBALS['TCA']['fe_users']['types']['Tx_Kuehlschrank_MyFeUsers']['showitem'] = $GLOBALS['TCA']['fe_users']['types']['0']['showitem'];
} elseif(is_array($GLOBALS['TCA']['fe_users']['types'])) {
    // use first entry in types array
    $fe_users_type_definition = reset($GLOBALS['TCA']['fe_users']['types']);
    $GLOBALS['TCA']['fe_users']['types']['Tx_Kuehlschrank_MyFeUsers']['showitem'] = $fe_users_type_definition['showitem'];
} else {
    $GLOBALS['TCA']['fe_users']['types']['Tx_Kuehlschrank_MyFeUsers']['showitem'] = '';
}
$GLOBALS['TCA']['fe_users']['types']['Tx_Kuehlschrank_MyFeUsers']['showitem'] .= ',--div--;LLL:EXT:kuehlschrank/Resources/Private/Language/locallang_db.xlf:tx_kuehlschrank_domain_model_myfeusers,';
$GLOBALS['TCA']['fe_users']['types']['Tx_Kuehlschrank_MyFeUsers']['showitem'] .= '';

$GLOBALS['TCA']['fe_users']['columns'][$GLOBALS['TCA']['fe_users']['ctrl']['type']]['config']['items'][] = ['LLL:EXT:kuehlschrank/Resources/Private/Language/locallang_db.xlf:fe_users.tx_extbase_type.Tx_Kuehlschrank_MyFeUsers','Tx_Kuehlschrank_MyFeUsers'];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
    '',
    'EXT:/Resources/Private/Language/locallang_csh_.xlf'
);
