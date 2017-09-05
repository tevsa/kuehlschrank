<?php
namespace Asvet\Kuehlschrank\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Asvet Jasari <tevsa2003@yahoo.de>
 * @author Jonas 
 */
class BenutzerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Asvet\Kuehlschrank\Domain\Model\Benutzer
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Asvet\Kuehlschrank\Domain\Model\Benutzer();
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
    public function getKontostandReturnsInitialValueForFloat()
    {
        self::assertSame(
            0.0,
            $this->subject->getKontostand()
        );

    }

    /**
     * @test
     */
    public function setKontostandForFloatSetsKontostand()
    {
        $this->subject->setKontostand(3.14159265);

        self::assertAttributeEquals(
            3.14159265,
            'kontostand',
            $this->subject,
            '',
            0.000000001
        );

    }

    /**
     * @test
     */
    public function getFeUsersReturnsInitialValueForMyFeUsers()
    {
        self::assertEquals(
            null,
            $this->subject->getFeUsers()
        );

    }

    /**
     * @test
     */
    public function setFeUsersForMyFeUsersSetsFeUsers()
    {
        $feUsersFixture = new \Asvet\Kuehlschrank\Domain\Model\MyFeUsers();
        $this->subject->setFeUsers($feUsersFixture);

        self::assertAttributeEquals(
            $feUsersFixture,
            'feUsers',
            $this->subject
        );

    }
}
