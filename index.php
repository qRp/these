<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon super site</title>
    </head>
 
    <body>

<!--    ?php include("entete.php"); ?>  
 
    ?php include("menus.php"); ?> -->
   

    <!-- Le corps -->
    
    <div id="corps">
        <h1></h1>
        
       </div>
	<p>
	Quel environnement souhaitez vous utiliser ?
	<form method="post" action="cible_envoi.php"enctype="multipart/form-data" >
		<select name="environnement">
			<option value="New_environnement" selected="selected">Nouvel environnement</option>
		</select>
		Nom du nouvel environnement : 
	        <input type="text" name="environnement_name" />
	</p>
	<p>
	Est ce qu'il y a un header ?
		<input type="radio" name="header" value="oui" id="oui" checked="checked" /> <label for="oui">Oui</label>
		<input type="radio" name="header" value="non" id="non" /> <label for="non">Non</label>
	</p>
        <p>
        Base à ajouter : <br />
        <input type="file" name="base_ajouter" /><br />
        <!-- <input type="submit" value="Envoyer le fichier" />-->
        </p>
	<p>
	Quel séparateur ?
		<select name="separateur">
		    <option value="|">|</option>
		    <option value=",">,</option>
		    <option value=";">;</option>
		    <option value=" ">espace</option>
		    <option value="tabulation">tabulation</option>
		</select>
	</p>
	<input type="submit" name="champs_valides" value="envoyer !"/>	
   	Description des champs :
	<input type="submit" name="champs_invalides" value="description champs"/>
	</form>
    <!-- Le pied de page -->
    
<!--    ?php include("footpage.php"); ?> -->
    
    </body>
</html>
