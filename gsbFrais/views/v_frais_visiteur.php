<div id="contenu">
	<h2>Etats de tous les frais par visiteur:</h2>
	
      	<form action="index.php?uc=cumul_frais&action=fraisDesVisiteurs" method="post">
      		<div class="corpsForm">
				<h2><strong>Visiteur</strong></h2>
			<p>
				<label for="lstVisiteurs" accesskey="n">Numéro: </label>
				<select id="lstVisiteurs" name="lstVisiteurs">
                    
                    <?php foreach ($lesVisiteurs as $unVisiteur)
					{   
						$visiteur = $unVisiteur;
						
						if(!empty($visiteur == $visiteurASelectionner)){
						?>
						<option selected value="<?php echo $visiteur['id']; ?>"><?php echo  $visiteur['id'];?> </option>
						<?php 
						}
						else{ ?>
						<option value="<?php echo $visiteur['id'];?>"><?php echo $visiteur['id'];?> </option>
						<?php 
						}
                       

					} 
				  ?> 
                </select>
                
				</select>
						<br>
						<br><label for="lstTypes" accesskey="n">Types de frais : </label>
						<select id="lstTypes" name="lstTypes">
							<?php
									foreach($lesTypes as $unType):?>
									{
										<option  value="<?php echo $unType['id'];?>"><?php echo $unType['id'];?></option>
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