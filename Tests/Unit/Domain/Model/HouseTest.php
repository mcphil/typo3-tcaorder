<?php
namespace Smt\Tcaorder\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Philipp Huberty <github@smartthings.de>
 */
class HouseTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \Smt\Tcaorder\Domain\Model\House
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Smt\Tcaorder\Domain\Model\House();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getName()
        );
    }

    /**
     * @test
     */
    public function setNameForStringSetsName()
    {
        $this->subject->setName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'name',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getFloorsInTheHouseReturnsInitialValueForFloor()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getFloorsInTheHouse()
        );
    }

    /**
     * @test
     */
    public function setFloorsInTheHouseForObjectStorageContainingFloorSetsFloorsInTheHouse()
    {
        $floorsInTheHouse = new \Smt\Tcaorder\Domain\Model\Floor();
        $objectStorageHoldingExactlyOneFloorsInTheHouse = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneFloorsInTheHouse->attach($floorsInTheHouse);
        $this->subject->setFloorsInTheHouse($objectStorageHoldingExactlyOneFloorsInTheHouse);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneFloorsInTheHouse,
            'floorsInTheHouse',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addFloorsInTheHouseToObjectStorageHoldingFloorsInTheHouse()
    {
        $floorsInTheHouse = new \Smt\Tcaorder\Domain\Model\Floor();
        $floorsInTheHouseObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $floorsInTheHouseObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($floorsInTheHouse));
        $this->inject($this->subject, 'floorsInTheHouse', $floorsInTheHouseObjectStorageMock);

        $this->subject->addFloorsInTheHouse($floorsInTheHouse);
    }

    /**
     * @test
     */
    public function removeFloorsInTheHouseFromObjectStorageHoldingFloorsInTheHouse()
    {
        $floorsInTheHouse = new \Smt\Tcaorder\Domain\Model\Floor();
        $floorsInTheHouseObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $floorsInTheHouseObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($floorsInTheHouse));
        $this->inject($this->subject, 'floorsInTheHouse', $floorsInTheHouseObjectStorageMock);

        $this->subject->removeFloorsInTheHouse($floorsInTheHouse);
    }
}
