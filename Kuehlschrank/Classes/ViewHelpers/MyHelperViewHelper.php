<?php
namespace Asvet\Kuehlschrank\ViewHelpers;

class MyHelperViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {



 /**
     * Main method of the View Helper
     *
     * @param String $Text
     * 
     * 
     */
    public function render($Text) {
        $search = array("Ä", "Ö", "Ü", "ä", "ö", "ü", "ß", "´"," ");
        $replace = array("Ae", "Oe", "Ue", "ae", "oe", "ue", "ss", "","");

        
        if($Text ) {
            $result =  str_replace($search, $replace, $Text);
        }
        return $result;
    }
}