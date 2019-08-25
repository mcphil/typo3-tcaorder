<?php
namespace Smt\Tcaorder\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Philipp Huberty <github@smartthings.de>
 */
class HouseControllerTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \Smt\Tcaorder\Controller\HouseController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Smt\Tcaorder\Controller\HouseController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllHousesFromRepositoryAndAssignsThemToView()
    {

        $allHouses = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $houseRepository = $this->getMockBuilder(\Smt\Tcaorder\Domain\Repository\HouseRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $houseRepository->expects(self::once())->method('findAll')->will(self::returnValue($allHouses));
        $this->inject($this->subject, 'houseRepository', $houseRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('houses', $allHouses);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenHouseToView()
    {
        $house = new \Smt\Tcaorder\Domain\Model\House();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('house', $house);

        $this->subject->showAction($house);
    }
}
