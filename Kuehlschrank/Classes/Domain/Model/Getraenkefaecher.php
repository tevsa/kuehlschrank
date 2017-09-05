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
 * Getraenkefaecher
 */
class Getraenkefaecher extends \TYPO3\CMS\Extbase\DomainObject\AbstractValueObject
{
    /**
     * name
     *
     * @var string
     * @validate NotEmpty
     */
    protected $name = '';

    /**
     * maxAnzahl
     *
     * @var int
     * @validate NotEmpty
     */
    protected $maxAnzahl = 0;

    /**
     * istAnzahl
     *
     * @var int
     */
    protected $istAnzahl = 0;

    /**
     * preis
     *
     * @var float
     */
    protected $preis = 0.0;

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
     * Returns the maxAnzahl
     *
     * @return int $maxAnzahl
     */
    public function getMaxAnzahl()
    {
        return $this->maxAnzahl;
    }

    /**
     * Sets the maxAnzahl
     *
     * @param int $maxAnzahl
     * @return void
     */
    public function setMaxAnzahl($maxAnzahl)
    {
        $this->maxAnzahl = $maxAnzahl;
    }

    /**
     * Returns the istAnzahl
     *
     * @return int $istAnzahl
     */
    public function getIstAnzahl()
    {
        return $this->istAnzahl;
    }

    /**
     * Sets the istAnzahl
     *
     * @param int $istAnzahl
     * @return void
     */
    public function setIstAnzahl($istAnzahl)
    {
        $this->istAnzahl = $istAnzahl;
    }

    /**
     * Returns the preis
     *
     * @return float $preis
     */
    public function getPreis()
    {
        return $this->preis;
    }

    /**
     * Sets the preis
     *
     * @param float $preis
     * @return void
     */
    public function setPreis($preis)
    {
        $this->preis = $preis;
    }
}
