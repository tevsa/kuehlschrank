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
 * BenutzerController
 */
class BenutzerController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $benutzers = $this->benutzerRepository->findAll();
        $this->view->assign('benutzers', $benutzers);
    }

    /**
     * action show
     *
     * @param \Asvet\Kuehlschrank\Domain\Model\Benutzer $benutzer
     * @return void
     */
    public function showAction(\Asvet\Kuehlschrank\Domain\Model\Benutzer $benutzer)
    {
        $this->view->assign('benutzer', $benutzer);
    }

    /**
     * action new
     *
     * @return void
     */
    public function newAction()
    {

    }

    /**
     * action create
     *
     * @param \Asvet\Kuehlschrank\Domain\Model\Benutzer $newBenutzer
     * @return void
     */
    public function createAction(\Asvet\Kuehlschrank\Domain\Model\Benutzer $newBenutzer)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->benutzerRepository->add($newBenutzer);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \Asvet\Kuehlschrank\Domain\Model\Benutzer $benutzer
     * @ignorevalidation $benutzer
     * @return void
     */
    public function editAction(\Asvet\Kuehlschrank\Domain\Model\Benutzer $benutzer)
    {
        $this->view->assign('benutzer', $benutzer);
    }

    /**
     * action update
     *
     * @param \Asvet\Kuehlschrank\Domain\Model\Benutzer $benutzer
     * @return void
     */
    public function updateAction(\Asvet\Kuehlschrank\Domain\Model\Benutzer $benutzer)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->benutzerRepository->update($benutzer);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \Asvet\Kuehlschrank\Domain\Model\Benutzer $benutzer
     * @return void
     */
    public function deleteAction(\Asvet\Kuehlschrank\Domain\Model\Benutzer $benutzer)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->benutzerRepository->remove($benutzer);
        $this->redirect('list');
    }
}
