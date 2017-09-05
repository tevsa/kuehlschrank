<?php
namespace Asvet\Kuehlschrank\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Asvet Jasari <tevsa2003@yahoo.de>
 * @author Jonas 
 */
class KuelschrankTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Asvet\Kuehlschrank\Domain\Model\Kuelschrank
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Asvet\Kuehlschrank\Domain\Model\Kuelschrank();
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
    public function getImageReturnsInitialValueForFileReference()
    {
        self::assertEquals(
            null,
            $this->subject->getImage()
        );

    }

    /**
     * @test
     */
    public function setImageForFileReferenceSetsImage()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setImage($fileReferenceFixture);

        self::assertAttributeEquals(
            $fileReferenceFixture,
            'image',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getGetraenkefaecherReturnsInitialValueForGetraenkefaecher()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getGetraenkefaecher()
        );

    }

    /**
     * @test
     */
    public function setGetraenkefaecherForObjectStorageContainingGetraenkefaecherSetsGetraenkefaecher()
    {
        $getraenkefaecher = new \Asvet\Kuehlschrank\Domain\Model\Getraenkefaecher();
        $objectStorageHoldingExactlyOneGetraenkefaecher = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneGetraenkefaecher->attach($getraenkefaecher);
        $this->subject->setGetraenkefaecher($objectStorageHoldingExactlyOneGetraenkefaecher);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneGetraenkefaecher,
            'getraenkefaecher',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function addGetraenkefaecherToObjectStorageHoldingGetraenkefaecher()
    {
        $getraenkefaecher = new \Asvet\Kuehlschrank\Domain\Model\Getraenkefaecher();
        $getraenkefaecherObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $getraenkefaecherObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($getraenkefaecher));
        $this->inject($this->subject, 'getraenkefaecher', $getraenkefaecherObjectStorageMock);

        $this->subject->addGetraenkefaecher($getraenkefaecher);
    }

    /**
     * @test
     */
    public function removeGetraenkefaecherFromObjectStorageHoldingGetraenkefaecher()
    {
        $getraenkefaecher = new \Asvet\Kuehlschrank\Domain\Model\Getraenkefaecher();
        $getraenkefaecherObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $getraenkefaecherObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($getraenkefaecher));
        $this->inject($this->subject, 'getraenkefaecher', $getraenkefaecherObjectStorageMock);

        $this->subject->removeGetraenkefaecher($getraenkefaecher);

    }
}
