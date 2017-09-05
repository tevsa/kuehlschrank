<?php
namespace Asvet\Kuehlschrank\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Asvet Jasari <tevsa2003@yahoo.de>
 * @author Jonas 
 */
class GetraenkefaecherTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Asvet\Kuehlschrank\Domain\Model\Getraenkefaecher
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Asvet\Kuehlschrank\Domain\Model\Getraenkefaecher();
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
    public function getMaxAnzahlReturnsInitialValueForInt()
    {
    }

    /**
     * @test
     */
    public function setMaxAnzahlForIntSetsMaxAnzahl()
    {
    }

    /**
     * @test
     */
    public function getIstAnzahlReturnsInitialValueForInt()
    {
    }

    /**
     * @test
     */
    public function setIstAnzahlForIntSetsIstAnzahl()
    {
    }

    /**
     * @test
     */
    public function getPreisReturnsInitialValueForFloat()
    {
        self::assertSame(
            0.0,
            $this->subject->getPreis()
        );

    }

    /**
     * @test
     */
    public function setPreisForFloatSetsPreis()
    {
        $this->subject->setPreis(3.14159265);

        self::assertAttributeEquals(
            3.14159265,
            'preis',
            $this->subject,
            '',
            0.000000001
        );

    }
}
