<?php include_once 'v_frais_visiteur.php'?>
    <h3 class ="align-center"> Fiche de cumul des frais du mois : </h3>
        <div class ="encadre">
            <table class="listeLegere">
                <tr>
                    <th class="montant">Visiteur</th>
                    <th class="montant">Type de frais:</th>
                    <th class='montant'>Montant cumulé: </th>
                    <th class='montant'>Mois: </th>                   
                </tr>
                <?php foreach ($lesInfosFrais as $uneInfoFrais):?>
                    <tr>

                    <td><?php echo $uneInfoFrais['idVisiteur']; ?></td>
                    <td><?php echo $idFraisForfait=$uneInfoFrais ['idFraisForfait'];?></td>
                    <td><?php echo $uneInfoFrais ['prix']; ?></td>
                    <td><?php echo $uneInfoFrais ['mois'];?></td>

                    <tr>
                    <?php endforeach?>

            </table>
        </div>
                    
                    
                
                


