<?php
namespace Asvet\Kuehlschrank\Controller;

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
 * GetraenkefaecherController
 */
class GetraenkefaecherController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $getraenkefaechers = $this->getraenkefaecherRepository->findAll();
        $this->view->assign('getraenkefaechers', $getraenkefaechers);
    }

    /**
     * action show
     *
     * @param \Asvet\Kuehlschrank\Domain\Model\Getraenkefaecher $getraenkefaecher
     * @return void
     */
    public function showAction(\Asvet\Kuehlschrank\Domain\Model\Getraenkefaecher $getraenkefaecher)
    {
        $this->view->assign('getraenkefaecher', $getraenkefaecher);
    }
}
