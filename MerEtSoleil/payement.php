<html>
	<head>
	</head>
	<body bgcolor="black">
		
		<?php
		if ((isset($_POST['datedebloc'])) && (isset($_POST['datefinloc'])) )
			{
					
				if ((!empty($_POST['datedebloc'])) && (!empty($_POST['datefinloc'])))
					{
					
					//connection a la base
					include("config.php");

					$nomclient = $_POST['nomclient'];
					$numappart = $_POST['numappart'];
					$montantlocation = $_POST['montantlocation'];
					$montantacpte = $_POST['montantacpte'];

					$date = date('D d/m/Y');	
					$requete = "select IDLocataire from locataire where NomLocataire = '".$nomclient."'";
					$resultat = mysql_query ($requete);
					$idloc = mysql_fetch_object($resultat);
					$idlocataire = $idloc->IDLocataire;
						
					mysql_query("INSERT INTO location VALUES ('','$_POST[datedebloc]','$_POST[datefinloc]','$montantacpte','$date','$montantlocation','$numappart','$idlocataire')");
				}
			}
			
		   ?>
		
		<h1> <font color = "white"> Ici c'est la page paypal pour le payement de l'accompte.  </h1>
		<h4> <font color="white"> La creation de l'interface de payement est en cour par la sociétée Mer et Soleil <h4>
		</br></br><center><a class="bonton_retour" href='Mer et soleil.html'> Retour au site principal</a></center>
	</body>
</html>