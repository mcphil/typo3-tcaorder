<?php
namespace Smt\Tcaorder\Controller;


/***
 *
 * This file is part of the "Respect sorting from Selectbox" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2019 
 *
 ***/
/**
 * HouseController
 */
class HouseController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * houseRepository
     * 
     * @var \Smt\Tcaorder\Domain\Repository\HouseRepository
     * @inject
     */
    protected $houseRepository = null;

    /**
     * action list
     * 
     * @return void
     */
    public function listAction()
    {
        $houses = $this->houseRepository->findAll();
        $this->view->assign('houses', $houses);
    }

    /**
     * action show
     * 
     * @param \Smt\Tcaorder\Domain\Model\House $house
     * @return void
     */
    public function showAction(\Smt\Tcaorder\Domain\Model\House $house)
    {
        $this->view->assign('house', $house);
    }
}
