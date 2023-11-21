<?php
/** @var PdoGsb $pdo */
include 'views/v_sommaire.php';
$action = $_REQUEST['action'];
$idVisiteur = $_SESSION['idVisiteur'];
switch($action){
	//Mission 1.a

	    case 'selectionnerType':{
		$lesMois=$pdo->getLesMoisDisponibles($idVisiteur);
		$lesCles = array_keys( $lesMois);
		$moisASelectionner = $lesCles[0];
		$lesTypes=$pdo->getTypeForfait();
        $lesCles = array_keys( $lesTypes);
        $typesASelectionner = $lesCles[0];
        include("views/v_listeTypes.php");
        break;
    }
	case 'CumulDesFrais':{
		$Unnmois = $_REQUEST['lstMois'];
		$lesMois=$pdo->getLesMoisDisponibles($idVisiteur);
		$moisASelectionner = $Unnmois;
		$idFraisForfait = $_REQUEST['lstTypes'];
		$lesTypes = $pdo->getTypeForfait();
		var_dump($lesTypes);
		$typesASelectionner = $idFraisForfait;
		include("views/v_listeTypes.php");
		$lesInfosFrais = $pdo->getInfosFraisMois($idVisiteur, $Unnmois, $idFraisForfait); // Ajoutez l'ID du visiteur et le mois en tant qu'arguments
		var_dump($lesInfosFrais);
		$numAnnee =substr( $Unnmois,0,4);
		$numMois =substr( $Unnmois,4,2);

		if (is_array($lesInfosFrais)) {
			// Boucle sur lesInfosFrais pour obtenir des données individuelles
			foreach ($lesInfosFrais as $uneInfoFrais) {
				$idVisiteur = $uneInfoFrais['idVisiteur'];
				$uneInfoFrais['idFraisForfait'];
				$prix = $uneInfoFrais['prix'];
				$uneInfoFrais['mois'];
			}
		}
		
		//Gestion des dates
		@list($annee,$mois,$jour) = explode('-',$dateModif);
		$dateModif = "$jour"."/".$mois."/".$annee;				

		//$dateModif =  dateAnglaisVersFrancais($dateModif);
		include("views/v_voircumul_frais.php");
		break;
	}

	/*case 'VoirCumulDesFrais':{
		$leMois = $_REQUEST['lstMois'];
		include("views/v_listeTypes.php");
		$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur,$leMois);
		$lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur,$leMois);
		$numAnnee =substr( $leMois,0,4);
		$numMois =substr( $leMois,4,2);
		$libEtat = $lesInfosFicheFrais['libEtat'];
		$montantValide = $lesInfosFicheFrais['montantValide'];
		$nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
		$dateModif =  $lesInfosFicheFrais['dateModif'];
		$leType = $_REQUEST['lstTypes'];
		$lesTypes=$pdo->getTypeForfait();
		$typesASelectionner = $leType;
		include("views/v_listeTypes.php");
		$lesTypes = $pdo->getTypeForfait();
		//Gestion des dates
		@list($annee,$mois,$jour) = explode('-',$dateModif);
		$dateModif = "$jour"."/".$mois."/".$annee;
		break;
	}*/
	//Mission 1.b
	case 'selectionnerNumero':{
		$lesVisiteurs=$pdo->getVisiteur();
		$lesCles = array_keys( $lesVisiteurs);
		$visiteurASelectionner = $lesCles[0];
		$lesTypes=$pdo->getTypeForfait();
        $lesCles = array_keys( $lesTypes);
        $typesASelectionner = $lesCles[0];
        include("views/v_frais_visiteur.php");
        break;
    }
	case 'fraisDesVisiteurs':{
		$idVisiteur = $_REQUEST['lstVisiteurs'];
		$lesVisiteurs=$pdo->getVisiteur();
		$visiteurASelectionner = $idVisiteur;
		$idFraisForfait = $_REQUEST['lstTypes'];
		$lesTypes=$pdo->getTypeForfait();
		$typesASelectionner = $idFraisForfait;

		include("views/v_frais_visiteur.php");
		$lesInfosFrais = $pdo->getInfosFraisMois2($idVisiteur, $idFraisForfait); // Ajoutez l'ID du visiteur et le mois en tant qu'arguments

		if (is_array($lesInfosFrais)) {
			// Boucle sur lesInfosFrais pour obtenir des données individuelles
			foreach ($lesInfosFrais as $uneInfoFrais) {
				$idVisiteur = $uneInfoFrais['idVisiteur'];
				$uneInfoFrais['idFraisForfait'];
				$prix = $uneInfoFrais['prix'];
				$uneInfoFrais['mois'];
			}
		}
		//Gestion des dates
		@list($annee,$mois,$jour) = explode('-',$dateModif);
		$dateModif = "$jour"."/".$mois."/".$annee;

		//$dateModif =  dateAnglaisVersFrancais($dateModif);
		include("views/v_voirfrais_visiteur.php");
		break;
	}
	//Mission 1.c
	case 'selectionnerMois':{
		$lesMois=$pdo->getLesMoisDisponibles($idVisiteur);
		// Afin de sélectionner par défaut le dernier mois dans la zone de liste,
		// on demande toutes les clés, et on prend la première,
		// les mois étant triés décroissants
		$lesCles = array_keys( $lesMois );
		$moisASelectionner = $lesCles[0];
		include("views/v_cumul_tout.php");
		break;
	}

	case 'CumulTout':{
		$Unmois = $_REQUEST['lstMois'];
		$lesMois=$pdo->getLesMoisDisponibles($idVisiteur);
		$moisASelectionner = $Unmois;
		include("views/v_cumul_tout.php");
		/*
		$idFraisForfait = ''; // Initialisation avec une valeur par défaut
		$etp = '';
		$km = '';
		$nui = '';
		$rep = '';

		// ...

		// Plus loin dans votre code, assurez-vous d'assigner les valeurs appropriées à ces variables en fonction de la logique de votre application.

		// Par exemple, si vous avez un tableau contenant des données :
		if (isset($donnees['idFraisForfait'])) {
			$idFraisForfait = $donnees['idFraisForfait'];
		}
		if (isset($donnees['km'])) {
			$km = $donnees['km'];
		}

		// Créez un tableau associatif pour stocker les valeurs
		$idFraisForfait = array();

		// Ajoutez les valeurs d'ETP, KM, NUI, et REP dans le tableau
		$idFraisForfait['ETP'] = $etp;
		$idFraisForfait['KM'] = $km;
		$idFraisForfait['NUI'] = $nui;
		$idFraisForfait['REP'] = $rep;
		var_dump($idFraisForfait);
		*/
		$lesTypesFrais = $pdo->getCumulTous($idVisiteur,$Unmois);
		var_dump($lesTypesFrais);
		$lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur,$mois);
		$numAnnee =substr( $Unmois,0,4);
		$numMois =substr( $Unmois,4,2);

		//Gestion des dates
		@list($annee,$mois,$jour) = explode('-',$dateModif);
		$dateModif = "$jour"."/".$mois."/".$annee;

		//$dateModif =  dateAnglaisVersFrancais($dateModif);
		include("views/v_voircumul_tout.php");
		break;
	}
	//Mission 1.d
	case 'selectionnerNumeroVisiteur':{
		$lesVisiteurs=$pdo->getVisiteur();
		$lesCles = array_keys( $lesVisiteurs);
		$visiteurASelectionner = $lesCles[0];
        include("views/v_cumul_un_visiteur.php");
        break;
    }
	case 'cumulPourUnVisiteur':{
		$idVisiteur = $_REQUEST['lstVisiteurs'];
		$lesVisiteurs=$pdo->getVisiteur();
		$visiteurASelectionner = $idVisiteur;
		include("views/v_cumul_un_visiteur.php");

		$lesTypesFrais = $pdo->getCumulToutVisiteur($idVisiteur); // Ajoutez l'ID du visiteur et le mois en tant qu'arguments
		var_dump($lesTypesFrais);
		

		//$dateModif =  dateAnglaisVersFrancais($dateModif);
		include("views/v_voircumul_un_visiteur.php");
		break;
	}
	case 'insertion':
        {
            $lesid=$pdo->getIdClient();
            $lesMois=$pdo->getLesMoisDisponibles($idVisiteur);
		    // Afin de sélectionner par défaut le dernier mois dans la zone de liste,
		    // on demande toutes les clés, et on prend la première,
		    // les mois étant triés décroissants
		    $lesCles = array_keys( $lesMois );
		    $moisASelectionner = $lesCles[0];
            include("views/v_insertionform.php");
            break;
        }

    case 'apresinsertion':{
        $annee=$_REQUEST['lstannee'];
        $mois=$_REQUEST['lstmoiss'];
        $date=$annee.$mois;
        $idd=$_REQUEST['id'];
        $nui=$_REQUEST['nui'];
        $rep=$_REQUEST['rep'];
        $km=$_REQUEST['km'];
        $etp=$_REQUEST['etp'];
        $test=$pdo->selectionnerid($idd,$date);
        if(empty($test)){
            $pre =$pdo->prerequete($idd,$date);
        }
        //teste si la ligne existe deja ou pas
        //appel de la fonction de select sur fraisforfait 
        //sinon si ligne existe pas insertion de la ligne frais forfait
    
        if($nui>0 && isset($_REQUEST['nui'])){
            $tf1='NUI';
            $res1 = $pdo->inscrirePersonne($idd,$date,$tf1,$nui);
        }
    
        if($etp>0 && isset($_REQUEST['etp'])){
            $tf2='ETP';
            $res2 = $pdo->inscrirePersonne($idd,$date,$tf2, $etp);
        }
    
        if(isset($_REQUEST['km']) && $km>0){
            $tf3='KM';
            $res3 = $pdo->inscrirePersonne($idd,$date,$tf3,$km);
        }
        if(isset($_REQUEST['rep']) && $rep>0){
            $tf4='REP';
            $res4 = $pdo->inscrirePersonne($idd,$date,$tf4,$rep);
        }
        if($rep==null or $rep==0 and $km==null or $km==0 and $etp==0 or $etp==null and $nui==0 or $nui==null ){
            echo "Vous n'avez rien rempli";
        }
        $lesid=$pdo->getIdClient();
        $montant=$pdo->selectionnerNouvelEntrant($idd,$date);
        include("views/v_afficherRes1e.php");
        break;
    }
}