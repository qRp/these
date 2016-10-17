<!DOCTYPE html>
<html>
	<head>
		<meta charset ="utf-8" />
		<title>mon super site</title>
	</head>
	<body>
		
		<?php 
//variables :
/*		echo "</br>";
		echo $_POST['header'];
		echo "</br>";
		echo $_POST['separateur'];
		echo "</br>";
		echo $_POST['environnement'];
		echo "</br>";
//		int_r($_FILES);
//		print_r($_POST);
		echo "test</br>";
*/	

if(! isset($_POST['columns']))
{
//		echo "here !";
		if($_POST['separateur']=="tabulation")
		{
			$separateur="\t";
		}
		else
		{
			$separateur=$_POST['separateur'];
		}
		$header=$_POST['header'];
		$environnement=$_POST['environnement'];
//		echo "$environnement";
		if(isset($_POST['environnement']) and $environnement=="New_environnement")
		{
			$environnement=$_POST['environnement_name'];
		}
//	return $return_array;
}	

/*		$array_retour=set_variables();
		$environnement=$array_retour[0];
		$header=$array_retour[1];
		$separateur=$array_retour[2];
*/
		if (isset($_FILES['base_ajouter']) AND $_FILES['base_ajouter']['error'] == 0)
		{
//			echo "here !";
			move_uploaded_file($_FILES['base_ajouter']['tmp_name'], '/home/quentin/php/' . basename($environnement));
//		        echo "L'envoi a bien été effectué !";
		}
//echo "$environnement";
//$array = file("/home/nurtal/php/$environnement");


$monfichier = fopen("/home/quentin/php/$environnement", "r+");
$cpt=0;
//echo fgets($monfichier);
$nb_columns=0;
//print_r($monfichier);
for ($i = 0; $i <= 5; $i++)
{
	$cpt++;
	$ligne = fgets($monfichier);
//	echo $ligne ;
	if ($header == True and $cpt>1)
	{
		$array_line = explode ($separateur, $ligne);
//		echo "</br></br>";
//		print_r($ligne);
//		echo sizeof($array_line);
//		echo "</br></br>";
		if ($nb_columns ==0) {$nb_columns = sizeof($array_line);}
//		print_r($nb_columns);
		for ($j = 0; $j <= $nb_columns ; $j ++)
		{
//			print_r($array_line[$j]);
			$data[$i][$j]=$array_line[$j];
		}
	}
}
echo "</br></br>";
//print_r($data);
//echo "test"; echo $environnement ; echo $header ; echo "test";
 
echo "<form method=\"post\" action=\"\" enctype=\"multipart/form-data\">";
for ($i = 0 ; $i < $nb_columns ; $i++)
{
//	echo $i;
	for ($j = 1 ; $j <= 5 ; $j++)
	{
		echo $data[$j][$i];
		echo " ; ";
	}
	echo "</br></br>";
	echo "<input type=\"text\" name=\"columns[]\">";
	echo "</br></br></br>";

}
echo "<input type=\"hidden\" name=\"environnement\" value=\""; echo $environnement; echo "\" />";
echo "<input type=\"hidden\" name=\"separateur\"    value=\"";     echo $separateur   ; echo "\" />";
echo "<input type=\"hidden\" name=\"header\"        value=\"";         echo $header       ; echo "\" />";
if(! isset($_POST['columns'])){echo "<input type=\"submit\" name=\"valider_champs\" value=\"valider\">";}
echo "</form>";
//echo "test"; echo $environnement ; echo $header ; echo "test";
//print_r($_POST);

fclose($monfichier);
if(isset($_POST['valider_champs'])){

//	$array_retour=set_variables();
	$environnement=$_POST['environnement'];
	$header=$_POST['header'];
	$separateur=$_POST['separateur'];

	
	$columns=$_POST['columns'];
//	print_r($columns);
	echo "<table style=\"width:100%\">";
	echo "<tr>";
	for ($i = 0 ; $i < sizeof($columns) ; $i++)
	{
		echo "<th>";echo $columns[$i]; echo "</th>";
	}
	echo "<tr>";
//	echo "test"; echo $environnement ; echo "test";
	$array = file("/home/quentin/php/$environnement");
//	print_r($array);
	$cpt=0;
	foreach($array as $row => $data) 
	{
	$cpt++;
	if( $header==True and $cpt>1)
	{
//		echo "here !";
		$row_data = explode($separateur, $data);
		for ($i = 0 ; $i < sizeof($columns) ; $i++)
		{
			$info[$row][$columns[$i]] = $row_data[$i];
		}
//		$info[$row]['OMIM'] = $row_data[0];
//		$info[$row]['GENE'] = $row_data[1];
//		$info[$row]['GENE_ID'] = $row_data[2];
//		$info[$row]['HPO_ID'] = $row_data[3];
//		$info[$row]['HPO_termname'] = $row_data[4];
	//			echo $info[$row]['OMIM'];
	//			echo "$row";

		echo "<tr>";
		for ($i = 0 ; $i < sizeof($columns) ; $i ++)
		{
			echo "<td>"; echo $info[$row][$columns[$i]] ; echo "</td>";
		}
//		echo "<td>"; echo $info[$row]['OMIM'] ; echo "</td>";
//		echo "<td>"; echo $info[$row]['GENE'] ; echo "</td>";
//		echo "<td>"; echo $info[$row]['GENE_ID'] ; echo " </td>";
//		echo "<td>"; echo $info[$row]['HPO_ID'] ;  echo "</td>";
//		echo "<td>"; echo $info[$row]['HPO_termname'] ; echo " </td>";
		echo "</tr>";
	
	}
	}
}
		?>

	</body>
</html>
