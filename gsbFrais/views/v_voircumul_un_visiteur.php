<?php include_once 'v_cumul_un_visiteur.php'?>
    <h3 class ="align-center"> Fiche de cumul des frais du mois pour tous les visiteurs : </h3>
        <div class ="encadre">
            <table class="listeLegere">
                <tr>
                    <th class="montant">ETP</th>
                    <th class="montant">KM</th>
                    <th class='montant'>NUI</th>
                    <th class='montant'>REP</th>                   
                </tr>
                <tr> 
                    
                    <?php foreach ($lesTypesFrais as $unTypeFrais):?>
                    <tr>

                    <td><?php echo $unTypeFrais['somme']; ?></td>
                    <td><?php echo $unTypeFrais ['somme'];?></td>
                    <td><?php echo $unTypeFrais ['somme']; ?></td>
                    <td><?php echo $unTypeFrais ['somme'];?></td>

                    <tr>
                    <?php endforeach?>
                <tr>

            </table>
        </div>
                    
                    
                
                


