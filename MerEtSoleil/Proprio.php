<html>
	<head>
		<link rel="stylesheet" href="style.css" type="text/css" />
	</head>
	<body bgcolor='beige'>
		<div id="corps">
			<h1><center> MER ET SOLEIL : Propriétaires</center></h1></br></br>


			<?php
			// on test si les variables envoyé en $_post existent
			if ((isset($_POST['nomproprio'])) && (isset($_POST['N°Appart'])) && (isset($_POST['TypeAp']))	 && (isset($_POST['prixhebdo'])))
				{
					//on teste si tous les champs du formulaire sont remplits
					if ((!empty($_POST['nomproprio'])) && (!empty($_POST['N°Appart']))	&& (!empty($_POST['TypeAp']))  && (!empty($_POST['prixhebdo'])))
						{
						
							//connection a la base
							include("config.php");
									
									
							// Si le numero d'appart est deja prit
							$numexiste = 0;
							$numappartpost = $_POST['N°Appart'];
							$num = mysql_query("SELECT NumAppart FROM appartement") or die (mysql_error());
							while ($donnees = mysql_fetch_array($num))
								{
									if($numappartpost == $donnees['NumAppart'])
										{
											$numexiste = 1;
										}
								}
							
							if ($numexiste == 1)
								{
									echo '<p>ERREUR : Le numero d\'appartement est d&eacute;ja prit, veillez r&eacute;esayer svp</p>';
								}
								
							else 
								{
									
									
									// Verification : Si le client existe deja, on ne l'ajoute pas une deuxieme fois
									$nom = $_POST['nomproprio'];
									$nomexistant = mysql_query("SELECT NomProprio FROM proprio") or die (mysql_error());
									$existe = 0;
									while ($donnees = mysql_fetch_array($nomexistant)) 
										{
											if ($nom == $donnees['NomProprio'])
												{
													$existe = 1;
												}
										}
									
									// si c'est un nouveau client, on l'ajoute a la base de données
									if ( $existe == 0)
										{
											mysql_query("INSERT INTO proprio VALUES ('','$_POST[nomproprio]')");
										}
												
												
									$requete = "select IDProprio from proprio where NomProprio = '".$nom."'";
									$resultat = mysql_query ($requete);
									$idproprio = mysql_fetch_object($resultat);
									$xxx = $idproprio->IDProprio;
									mysql_query("INSERT INTO appartement VALUES ('$_POST[N°Appart]', '$xxx', '$_POST[TypeAp]')");
									mysql_query("INSERT INTO tarif VALUES ('$_POST[N°Appart]', '1', '$_POST[prixhebdo]')");
									mysql_close($con);

									echo '<p>Enregistrement terminé avec succès !</p>' ;
								}
						}
				}
			?> 
			</br>


			<p> Veuillez remplir ce formulaire :  </p></br>
			<form action=""method="post">
			<p>Nom : <input type ="text" size = "50" name ="nomproprio"> </p></br>
			<p>Numero de l'appartement a enregistrer : <input type ="text" size ="14" name="N°Appart"> </p></br>
			<p>Type D'appartement : </p>
			   <p>
				   T1<input type ="radio" name ="TypeAp" value ="1">
				   T2<input type ="radio" name ="TypeAp" value ="2">
				   T3<input type ="radio" name ="TypeAp" value ="3">
				   T4<input type ="radio" name ="TypeAp" value ="4">
				   T5<input type ="radio" name ="TypeAp" value ="5">
				   T6<input type ="radio" name ="TypeAp" value ="6"></br></br>
			   </p>
			<p>Prix Hebdomadaire pour l'appartement : <input type="text" size="15" name="prixhebdo"> €</p></br>
			<input type="submit" >
			</form>
			 
			 
			 </br><center><a class="bonton_retour" href='Mer et soleil.html'> Retour </a></center>
		</div>
	</body>
</html>

















