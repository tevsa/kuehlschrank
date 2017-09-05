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
 * KuelschrankController
 */
class KuelschrankController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * kuelschrankRepository
     *
     * @var \Asvet\Kuehlschrank\Domain\Repository\KuelschrankRepository
     * @inject
     */
    protected $kuelschrankRepository = null;

/**
     * 
     *
     * @var \Asvet\Kuehlschrank\Domain\Repository\GetraenkefaecherRepository
     * 
     */
    protected $getraenkefaecherRepository;
    
    /**
     * 
     * @param \Asvet\Kuehlschrank\Domain\Repository\GetraenkefaecherRepository
     * 
     */    
    public function injectGetraenkefaecherRepository(\Asvet\Kuehlschrank\Domain\Repository\GetraenkefaecherRepository $getraenkefaecherRepository)
    {
        $this->getraenkefaecherRepository = $getraenkefaecherRepository;
    }

 /**
     * benutzerRepository
     *
     * @var \Asvet\Kuehlschrank\Domain\Repository\BenutzerRepository
     * @inject
     */
    protected $benutzerRepository = null;
/**
     * A special action which is called if the originally intended action could
     * not be called, for example if the arguments were not valid.
     *
     * The default implementation sets a flash message, request errors and forwards back
     * to the originating action. This is suitable for most actions dealing with form input.
     *
     * We clear the page cache by default on an error as well, as we need to make sure the
     * data is re-evaluated when the user changes something.
     *
     * @return string
     */
    protected function errorAction() {
        echo 'ErrorAction';
        $this->clearCacheOnError();
        if ($this->configurationManager->isFeatureEnabled('rewrittenPropertyMapper')) {
            echo 'Rewritten Property Mapper';

            echo '<pre>';
            foreach ($this->arguments->getValidationResults()->getFlattenedErrors() as $propertyPath => $errors) {
                foreach ($errors as $error) {
                    $message .= 'Error for ' . $propertyPath . ': ' . $error->render() .
                        PHP_EOL;
                }
                echo 'Error: ' . $message;
    
            }
            echo '</pre>';

            $errorFlashMessage = $this->getErrorFlashMessage();
            if ($errorFlashMessage !== FALSE) {
                $errorFlashMessageObject = new \TYPO3\CMS\Core\Messaging\FlashMessage(
                    $errorFlashMessage,
                    '',
                    \TYPO3\CMS\Core\Messaging\FlashMessage::ERROR
                );
                $this->controllerContext->getFlashMessageQueue()->enqueue($errorFlashMessageObject);
            }
            $referringRequest = $this->request->getReferringRequest();
            if ($referringRequest !== NULL) {
                $originalRequest = clone $this->request;
                $this->request->setOriginalRequest($originalRequest);
                $this->request->setOriginalRequestMappingResults($this->arguments->getValidationResults());
                $this->forward($referringRequest->getControllerActionName(), $referringRequest->getControllerName(), $referringRequest->getControllerExtensionName(), $referringRequest->getArguments());
            }


            $message = 'An error occurred while trying to call ' . get_class($this) . '->' . $this->actionMethodName . '().' . PHP_EOL;
            return $message;
        } else {
            // @deprecated since Extbase 1.4.0, will be removed two versions after Extbase 6.1
            $this->request->setErrors($this->argumentsMappingResults->getErrors());
            $errorFlashMessage = $this->getErrorFlashMessage();
            if ($errorFlashMessage !== FALSE) {
                $errorFlashMessageObject = new \TYPO3\CMS\Core\Messaging\FlashMessage(
                    $errorFlashMessage,
                    '',
                    \TYPO3\CMS\Core\Messaging\FlashMessage::ERROR
                );
                $this->controllerContext->getFlashMessageQueue()->enqueue($errorFlashMessageObject);
            }
            $referrer = $this->request->getInternalArgument('__referrer');
            if ($referrer !== NULL) {
                $this->forward($referrer['actionName'], $referrer['controllerName'], $referrer['extensionName'], $this->request->getArguments());
            }
            $message = 'An error occurred while trying to call ' . get_class($this) . '->' . $this->actionMethodName . '().' . PHP_EOL;
            return $message;
        }
    }




    /**
     * action show
     *
     * @param \Asvet\Kuehlschrank\Domain\Model\Kuelschrank $kuelschrank
     * @return void
     */
    public function showAction(\Asvet\Kuehlschrank\Domain\Model\Kuelschrank $kuelschrank = NUll)
    {
        $kuelschrank = $this->kuelschrankRepository->findByUid(1);
        $user = $this->benutzerRepository->findAll();
        $this->view->assign('users', $user);
        $this->view->assign('kuelschrank', $kuelschrank);
    }

    /**
     * action reduce
     * @param \Asvet\Kuehlschrank\Domain\Model\Kuelschrank  $kuelschrank
     * @param \Asvet\Kuehlschrank\Domain\Model\Getraenkefaecher  $getraenkefaecher
     * @return void
     *
     * @param \Asvet\Kuehlschrank\Domain\Model\Kuelschrank $kuelschrank
     * @param \Asvet\Kuehlschrank\Domain\Model\Getraenkefaecher $getraenkefaecher
     */
    public function reduceAction(
        \Asvet\Kuehlschrank\Domain\Model\Kuelschrank $kuelschrank,
        \Asvet\Kuehlschrank\Domain\Model\Getraenkefaecher $getraenkefaecher)
    {
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($this->settings);
        $this->informMailAction($kuelschrank, $getraenkefaecher);
        $derzeit = $getraenkefaecher->getIstAnzahl();
        $getraenkefaecher->setIstAnzahl($derzeit - 1);
        $this->kuelschrankRepository->update($kuelschrank);
        if ($derzeit <= $this->settings[kuelschrank][min]) {

        }
    }

    /**
     * action calculateajax
     * @return string
	 */
	 public function calculateajaxAction
     (\Asvet\Kuehlschrank\Domain\Model\Kuelschrank $kuelschrank = NUll)
     {
        $kuelschrank = $this->kuelschrankRepository->findByUid(1);

        $Daten          =  $this->request->getArguments();

        $getraenkeuid   =  explode(',',$Daten[getraenkeuid]);
        array_pop($getraenkeuid);

        // a)Getränk ermitteln
        foreach ($getraenkeuid as $key => $value) {
            $drink  =  $this->getraenkefaecherRepository->findByUid($value);
            // Preis Ermitteln
            $Preis += $drink->getPreis();
            $derzeit = $drink->getIstAnzahl();
            $nameDrink[] = $drink->getName();
            $drink->setIstAnzahl($derzeit - 1);
            $this->kuelschrankRepository->update($kuelschrank); 
            $danach[]  = $drink->getIstAnzahl();
            //            echo $danach . '<-';
        }
        if ($Preis =='') {
            $Preis = '0.00';
        }
        floatval($Preis);
        $PreisAlsFloatArr = array (
                'kontostand' => $Preis
            );
        $propertyMapper = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Property\\PropertyMapper');
        $PreisAlsFloat = $propertyMapper->convert(
            $PreisAlsFloatArr,
            'Asvet\Kuehlschrank\Domain\Model\Benutzer'
            );

        $benutzer           =  $this->benutzerRepository->findByUid($Daten[benutzer]);
        $KontostandVorher   = $benutzer->getKontostand(); // Aktueller Kontostand ermitteln
        $p = $Kontostandvorher+$Preis;
 
//var_dump( $benutzer  );
//var_dump($KontostandVorher);
//var_dump($Preis);
        //echo $KontostandVorher.'<-ICI';
//var_dump($p);
        $KontostandNachher = $benutzer->setKontostand($p);
        //echo $KontostandNachher.'<-ICI';

        $this->benutzerRepository->update($benutzer);
        # Den Vorschlaghammer instanzieren / aus der Kiste kramen
        $persistenceManager = $this->objectManager->get("TYPO3\\CMS\\Extbase\\Persistence\\Generic\\PersistenceManager");
        # Mit dem Vorschlaghammer in die Datenbank speichern / Nägel mit Köpfen machen
        $persistenceManager->persistAll();
        
        if ($derzeit <= $this->settings[kuelschrank][min]) {
                   // $this->informMailAction($kuelschrank, $getraenkefaecher);
        }
        $AntwortArr = array(
        'Text'    => 'Hallo '.(string)$benutzer->getName()."\r\n".'Danke für deine Bestellung.'."\r\n".' Es werden '.(string)number_format($Preis,2).' € zu deinem Konto hinzugefügt. '.
        'Dein Aktueller Kontostand ist '.(string)number_format($p,2).' €' 
        ); 
        
        $search = array("Ä", "Ö", "Ü", "ä", "ö", "ü", "ß", "´"," ");
        $replace = array("Ae", "Oe", "Ue", "ae", "oe", "ue", "ss", "","");
        foreach ($nameDrink as $key => $value) {
            $OhneLeerzeichen = str_replace($search, $replace,$value);
            $AntwortArr2[$OhneLeerzeichen] = $danach[$key];
        }
        array_push($AntwortArr,array('drink'=>$AntwortArr2));
        return json_encode($AntwortArr);     
	 }
	 
	 
     /*
     * @param \Asvet\Kuehlschrank\Domain\Model\Kuelschrank $kuelschrank
     * @param \Asvet\Kuehlschrank\Domain\Model\Getraenkefaecher $getraenkefaecher
     */
    public function informMailAction(
        \Asvet\Kuehlschrank\Domain\Model\Kuelschrank $kuelschrank,
        \Asvet\Kuehlschrank\Domain\Model\Getraenkefaecher $getraenkefaecher)
    {
        $MailText[] = 'Lieber XXX
        Der Kühlschrank schreit nach deiner Aufmerksamkeit.
        folgendes Getränk neigt sich dem Ende zu: ' . '';
        $MailText[] = $getraenkefaecher->getName() . '';
        $MailText[] = 'Es sind nur noch ' . $this->settings[kuelschrank][min] . ' Flaschen drin';
        // Create the message
        $mail = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Mail\\MailMessage');
        // Prepare and send the message
        $mail->setSubject('Your subject')->setFrom(array('john@doe.com' => 'John Doe'))->setTo(array('tevsa2003@yahoo', 'tevsa2003@yahoo.de' => 'Asvet'))->setBody(implode('
        ', $MailText))->addPart(implode('
        ', $MailText), 'text/html')->send();
        return FALSE;
    }
}
