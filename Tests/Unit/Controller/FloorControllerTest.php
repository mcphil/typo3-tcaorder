<?php
namespace Smt\Tcaorder\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Philipp Huberty <github@smartthings.de>
 */
class FloorControllerTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \Smt\Tcaorder\Controller\FloorController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Smt\Tcaorder\Controller\FloorController::class)
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
    public function listActionFetchesAllFloorsFromRepositoryAndAssignsThemToView()
    {

        $allFloors = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $floorRepository = $this->getMockBuilder(\Smt\Tcaorder\Domain\Repository\FloorRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $floorRepository->expects(self::once())->method('findAll')->will(self::returnValue($allFloors));
        $this->inject($this->subject, 'floorRepository', $floorRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('floors', $allFloors);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenFloorToView()
    {
        $floor = new \Smt\Tcaorder\Domain\Model\Floor();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('floor', $floor);

        $this->subject->showAction($floor);
    }
}
