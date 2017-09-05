<?php
namespace Asvet\Kuehlschrank\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Asvet Jasari <tevsa2003@yahoo.de>
 * @author Jonas 
 */
class GetraenkefaecherControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Asvet\Kuehlschrank\Controller\GetraenkefaecherController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Asvet\Kuehlschrank\Controller\GetraenkefaecherController::class)
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
    public function listActionFetchesAllGetraenkefaechersFromRepositoryAndAssignsThemToView()
    {

        $allGetraenkefaechers = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $getraenkefaecherRepository = $this->getMockBuilder(\::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $getraenkefaecherRepository->expects(self::once())->method('findAll')->will(self::returnValue($allGetraenkefaechers));
        $this->inject($this->subject, 'getraenkefaecherRepository', $getraenkefaecherRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('getraenkefaechers', $allGetraenkefaechers);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenGetraenkefaecherToView()
    {
        $getraenkefaecher = new \Asvet\Kuehlschrank\Domain\Model\Getraenkefaecher();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('getraenkefaecher', $getraenkefaecher);

        $this->subject->showAction($getraenkefaecher);
    }
}
