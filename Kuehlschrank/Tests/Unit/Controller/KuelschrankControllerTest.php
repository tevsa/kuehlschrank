<?php
namespace Asvet\Kuehlschrank\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Asvet Jasari <tevsa2003@yahoo.de>
 * @author Jonas 
 */
class KuelschrankControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Asvet\Kuehlschrank\Controller\KuelschrankController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Asvet\Kuehlschrank\Controller\KuelschrankController::class)
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
    public function showActionAssignsTheGivenKuelschrankToView()
    {
        $kuelschrank = new \Asvet\Kuehlschrank\Domain\Model\Kuelschrank();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('kuelschrank', $kuelschrank);

        $this->subject->showAction($kuelschrank);
    }
}
