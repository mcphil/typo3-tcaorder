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
 * FloorController
 */
class FloorController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * floorRepository
     * 
     * @var \Smt\Tcaorder\Domain\Repository\FloorRepository
     * @inject
     */
    protected $floorRepository = null;

    /**
     * action list
     * 
     * @return void
     */
    public function listAction()
    {
        $floors = $this->floorRepository->findAll();
        $this->view->assign('floors', $floors);
    }

    /**
     * action show
     * 
     * @param \Smt\Tcaorder\Domain\Model\Floor $floor
     * @return void
     */
    public function showAction(\Smt\Tcaorder\Domain\Model\Floor $floor)
    {
        $this->view->assign('floor', $floor);
    }
}
