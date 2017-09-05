<?php
namespace Asvet\Kuehlschrank\Domain\Repository;

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
 * The repository for Kuelschranks
 */
class BenutzerRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
		public function findAllUsers($group) 
	{
		$query = $this->createquery();
		$query->getQuerySettings()->setRespectStoragePage(FALSE);
    	$query->statement('SELECT * FROM fe_users where FIND_IN_SET('.$group.', usergroup)');
    	return $query->execute();
	}

   }
