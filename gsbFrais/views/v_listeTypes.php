<div id="contenu">
	<h2>Cumul des frais du mois</h2>
	<h3>Mois à sélectionner : </h3>
      	<form action="index.php?uc=cumul_frais&action=CumulDesFrais" method="post">
      		<div class="corpsForm">
			<p>
				<label for="lstMois" accesskey="n">Mois/Année : </label>
				<select id="lstMois" name="lstMois">
					<?php
					foreach ($lesMois as $unMois)
					{
						$mois = $unMois['mois'];
						$numAnnee =  $unMois['numAnnee'];
						$numMois =  $unMois['numMois'];
						if($mois == $moisASelectionner){
						?>
						<option selected value="<?php echo $mois ?>"><?php echo  $numMois."/".$numAnnee ?> </option>
						<?php 
						}
						else{ ?>
						<option value="<?php echo $mois ?>"><?php echo  $numMois."/".$numAnnee ?> </option>
						<?php 
						}
					} 
				?>    
					
					</select>
						<br>
						<br><label for="lstTypes" accesskey="n">Types de frais : </label>
						<select id="lstTypes" name="lstTypes">
							<?php
									
							foreach($lesTypes as $unType):?>
							{
							
								<option selected value="<?php echo $unType['id'];?>"><?php echo $unType['id'];?></option>
								<?php endforeach ?>
							
							}
							
					</select>
			</p>
			</div>


			<div class="piedForm">
			<p>
				<input id="ok" type="submit" value="Valider" size="20" />
				<input id="annuler" type="reset" value="Effacer" size="20" />
			</p> 
			</div>
        
      	</form>
</div>