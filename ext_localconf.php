<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Smt.Tcaorder',
            'Houses',
            [
                'House' => 'list, show',
                'Floor' => 'list, show'
            ],
            // non-cacheable actions
            [
                'House' => '',
                'Floor' => ''
            ]
        );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    houses {
                        iconIdentifier = tcaorder-plugin-houses
                        title = LLL:EXT:tcaorder/Resources/Private/Language/locallang_db.xlf:tx_tcaorder_houses.name
                        description = LLL:EXT:tcaorder/Resources/Private/Language/locallang_db.xlf:tx_tcaorder_houses.description
                        tt_content_defValues {
                            CType = list
                            list_type = tcaorder_houses
                        }
                    }
                }
                show = *
            }
       }'
    );
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
		
			$iconRegistry->registerIcon(
				'tcaorder-plugin-houses',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:tcaorder/Resources/Public/Icons/user_plugin_houses.svg']
			);
		
    }
);
