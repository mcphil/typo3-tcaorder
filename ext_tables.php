<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Smt.Tcaorder',
            'Houses',
            'Houses'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('tcaorder', 'Configuration/TypoScript', 'Respect sorting from Selectbox');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_tcaorder_domain_model_house', 'EXT:tcaorder/Resources/Private/Language/locallang_csh_tx_tcaorder_domain_model_house.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_tcaorder_domain_model_house');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_tcaorder_domain_model_floor', 'EXT:tcaorder/Resources/Private/Language/locallang_csh_tx_tcaorder_domain_model_floor.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_tcaorder_domain_model_floor');

    }
);
