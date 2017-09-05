<?php
namespace Asvet\Kuehlschrank\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Asvet Jasari <tevsa2003@yahoo.de>
 * @author Jonas 
 */
class MyFeUsersTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Asvet\Kuehlschrank\Domain\Model\MyFeUsers
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Asvet\Kuehlschrank\Domain\Model\MyFeUsers();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function dummyTestToNotLeaveThisFileEmpty()
    {
        self::markTestIncomplete();
    }
}
