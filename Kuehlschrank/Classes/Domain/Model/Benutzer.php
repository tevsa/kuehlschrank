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
 * Benutzer
 */
class Benutzer extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * name
     *
     * @var string
     * @validate NotEmpty
     */
    protected $name = '';

    /**
     * kontostand
     *
     * @var float
     */
    protected $kontostand = 0.0;

    /**
     * feUsers
     *
     * @var \Asvet\Kuehlschrank\Domain\Model\MyFeUsers
     */
    protected $feUsers = null;

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
     * Returns the kontostand
     *
     * @return float $kontostand
     */
    public function getKontostand()
    {
        return $this->kontostand;
    }

    /**
     * Sets the kontostand
     *
     * @param float $kontostand
     * @return void
     */
    public function setKontostand($kontostand)
    {
        $this->kontostand = $kontostand;
    }

    /**
     * Returns the feUsers
     *
     * @return \Asvet\Kuehlschrank\Domain\Model\MyFeUsers $feUsers
     */
    public function getFeUsers()
    {
        return $this->feUsers;
    }

    /**
     * Sets the feUsers
     *
     * @param \Asvet\Kuehlschrank\Domain\Model\MyFeUsers $feUsers
     * @return void
     */
    public function setFeUsers(\Asvet\Kuehlschrank\Domain\Model\MyFeUsers $feUsers)
    {
        $this->feUsers = $feUsers;
    }
}
