<?php
namespace Asvet\Kuehlschrank\Domain\Model;

/***
 *
 * This file is part of the "Kühlschrank Verwaltung Dein Raum" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017 Asvet Jasari <tevsa2003@yahoo.de>, Green Dackel
 *           Jonas, Dein Raum
 *
 ***/

/**
 * Kuelschrank
 */
class Kuelschrank extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * name
     *
     * @var string
     * @validate NotEmpty
     */
    protected $name = '';

    /**
     * image
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @cascade remove
     */
    protected $image = null;

    /**
     * getraenkefaecher
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Asvet\Kuehlschrank\Domain\Model\Getraenkefaecher>
     * @cascade remove
     */
    protected $getraenkefaecher = null;

    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->getraenkefaecher = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     *
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the image
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets the image
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     * @return void
     */
    public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image)
    {
        $this->image = $image;
    }

    /**
     * Adds a Getraenkefaecher
     *
     * @param \Asvet\Kuehlschrank\Domain\Model\Getraenkefaecher $getraenkefaecher
     * @return void
     */
    public function addGetraenkefaecher(\Asvet\Kuehlschrank\Domain\Model\Getraenkefaecher $getraenkefaecher)
    {
        $this->getraenkefaecher->attach($getraenkefaecher);
    }

    /**
     * Removes a Getraenkefaecher
     *
     * @param \Asvet\Kuehlschrank\Domain\Model\Getraenkefaecher $getraenkefaecherToRemove The Getraenkefaecher to be removed
     * @return void
     */
    public function removeGetraenkefaecher(\Asvet\Kuehlschrank\Domain\Model\Getraenkefaecher $getraenkefaecherToRemove)
    {
        $this->getraenkefaecher->detach($getraenkefaecherToRemove);
    }

    /**
     * Returns the getraenkefaecher
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Asvet\Kuehlschrank\Domain\Model\Getraenkefaecher> $getraenkefaecher
     */
    public function getGetraenkefaecher()
    {
        return $this->getraenkefaecher;
    }

    /**
     * Sets the getraenkefaecher
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Asvet\Kuehlschrank\Domain\Model\Getraenkefaecher> $getraenkefaecher
     * @return void
     */
    public function setGetraenkefaecher(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $getraenkefaecher)
    {
        $this->getraenkefaecher = $getraenkefaecher;
    }
}
