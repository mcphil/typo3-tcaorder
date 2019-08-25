<?php
namespace Smt\Tcaorder\Domain\Model;


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
 * House
 */
class House extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * name
     * 
     * @var string
     * @validate NotEmpty
     */
    protected $name = '';

    /**
     * floorsInTheHouse
     * 
     * @var string
     */
    protected $floorsInTheHouse = '';

    /**
     * sortedFloorsInTheHouse
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Smt\Tcaorder\Domain\Model\Floor>
     */
    protected $sortedFloorsInTheHouse = null;

    /**
     * Returns the name
     * 
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * __construct
     */
    public function __construct()
    {

        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     * 
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->floorsInTheHouse = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the sortedFloorsInTheHouse
     *      
     * floorRepository
     * 
     * @var \Smt\Tcaorder\Domain\Repository\FloorRepository
     * @inject
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Smt\Tcaorder\Domain\Model\Floor> $floorsInTheHouse
     */

    protected $floorRepository = null;

    public function getsortedFloorsInTheHouse()
    {
        $uids = explode(',',$this->floorsInTheHouse);
        $sortedFloorsInTheHouse = $this->floorRepository->findSortedFloorsInTheHouse($uids);
        return $sortedFloorsInTheHouse;
    }

    /**
     * Returns the floorsInTheHouse
     * 
     * @return string $floorsInTheHouse
     */
    public function getFloorsInTheHouse()
    {
        return $this->floorsInTheHouse;
    }

}
