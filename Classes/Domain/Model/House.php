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
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Smt\Tcaorder\Domain\Model\Floor>
     * @cascade remove
     */
    protected $floorsInTheHouse = null;

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
     * Sets the name
     * 
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * Adds a Floor
     * 
     * @param \Smt\Tcaorder\Domain\Model\Floor $floorsInTheHouse
     * @return void
     */
    public function addFloorsInTheHouse(\Smt\Tcaorder\Domain\Model\Floor $floorsInTheHouse)
    {
        $this->floorsInTheHouse->attach($floorsInTheHouse);
    }

    /**
     * Removes a Floor
     * 
     * @param \Smt\Tcaorder\Domain\Model\Floor $floorsInTheHouseToRemove The Floor to be removed
     * @return void
     */
    public function removeFloorsInTheHouse(\Smt\Tcaorder\Domain\Model\Floor $floorsInTheHouseToRemove)
    {
        $this->floorsInTheHouse->detach($floorsInTheHouseToRemove);
    }

    /**
     * Returns the floorsInTheHouse
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Smt\Tcaorder\Domain\Model\Floor> $floorsInTheHouse
     */
    public function getFloorsInTheHouse()
    {
        return $this->floorsInTheHouse;
    }

    /**
     * Sets the floorsInTheHouse
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Smt\Tcaorder\Domain\Model\Floor> $floorsInTheHouse
     * @return void
     */
    public function setFloorsInTheHouse(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $floorsInTheHouse)
    {
        $this->floorsInTheHouse = $floorsInTheHouse;
    }
}
