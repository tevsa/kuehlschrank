<?php
namespace Asvet\Kuehlschrank\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Asvet Jasari <tevsa2003@yahoo.de>
 * @author Jonas 
 */
class BenutzerControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Asvet\Kuehlschrank\Controller\BenutzerController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Asvet\Kuehlschrank\Controller\BenutzerController::class)
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
    public function listActionFetchesAllBenutzersFromRepositoryAndAssignsThemToView()
    {

        $allBenutzers = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $benutzerRepository = $this->getMockBuilder(\::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $benutzerRepository->expects(self::once())->method('findAll')->will(self::returnValue($allBenutzers));
        $this->inject($this->subject, 'benutzerRepository', $benutzerRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('benutzers', $allBenutzers);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenBenutzerToView()
    {
        $benutzer = new \Asvet\Kuehlschrank\Domain\Model\Benutzer();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('benutzer', $benutzer);

        $this->subject->showAction($benutzer);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenBenutzerToBenutzerRepository()
    {
        $benutzer = new \Asvet\Kuehlschrank\Domain\Model\Benutzer();

        $benutzerRepository = $this->getMockBuilder(\::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $benutzerRepository->expects(self::once())->method('add')->with($benutzer);
        $this->inject($this->subject, 'benutzerRepository', $benutzerRepository);

        $this->subject->createAction($benutzer);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenBenutzerToView()
    {
        $benutzer = new \Asvet\Kuehlschrank\Domain\Model\Benutzer();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('benutzer', $benutzer);

        $this->subject->editAction($benutzer);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenBenutzerInBenutzerRepository()
    {
        $benutzer = new \Asvet\Kuehlschrank\Domain\Model\Benutzer();

        $benutzerRepository = $this->getMockBuilder(\::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $benutzerRepository->expects(self::once())->method('update')->with($benutzer);
        $this->inject($this->subject, 'benutzerRepository', $benutzerRepository);

        $this->subject->updateAction($benutzer);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenBenutzerFromBenutzerRepository()
    {
        $benutzer = new \Asvet\Kuehlschrank\Domain\Model\Benutzer();

        $benutzerRepository = $this->getMockBuilder(\::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $benutzerRepository->expects(self::once())->method('remove')->with($benutzer);
        $this->inject($this->subject, 'benutzerRepository', $benutzerRepository);

        $this->subject->deleteAction($benutzer);
    }
}
