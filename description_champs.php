<!DOCTYPE html>
<html>
	<head>
		<meta charset ="utf-8" />
		<title>mon super site</title>
	</head>
	<body>
		
		<?php 
//variables :
//		echo "</br>";
//		echo $_POST['header'];
//		echo "</br>";
//		echo $_POST['separateur'];
//		echo "</br>";
//		echo $_POST['environnement'];
//		echo "</br>";
		print_r($_FILES);
		print_r($_POST);
//		echo "test</br>";
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
		echo "$environnement";
		if($environnement=="New_environnement")
		{
			$environnement=$_POST['environnement_name'];
		}
		
		if (isset($_FILES['base_ajouter']) AND $_FILES['base_ajouter']['error'] == 0)
		{
			echo "here !";
			move_uploaded_file($_FILES['base_ajouter']['tmp_name'], '/home/quentin/php/' . basename($environnement));
		        echo "L'envoi a bien été effectué !";
		}
echo "$environnement";
$array = file("/home/quentin/php/$environnement");

echo "<table style=\"width:100%\">";
echo "<tr>";
echo "<th>OMIM</th>";
echo "<th>GENE</th>";
echo "<th>GENE_ID</th>";
echo "<th>HPO_ID</th>";
echo "<th>HPO_termname</th>";
echo "<tr>";
$cpt=0;
	foreach($array as $row => $data)
	{
		$cpt++;
		if($header == True and $cpt>1)
		{			
				
			 
	//get row data
			$row_data = explode($separateur, $data);
//			echo $row_data[0];
//			echo "</br>";
			$info[$row]['OMIM'] = $row_data[0];
			$info[$row]['GENE'] = $row_data[1];
			$info[$row]['GENE_ID'] = $row_data[2];
			$info[$row]['HPO_ID'] = $row_data[3];
			$info[$row]['HPO_termname'] = $row_data[4];
//			echo $info[$row]['OMIM'];
//			echo "$row";
			echo "<tr>";
			echo "<td>"; echo $info[$row]['OMIM'] ; echo "</td>";
			echo "<td>"; echo $info[$row]['GENE'] ; echo "</td>";
			echo "<td>"; echo $info[$row]['GENE_ID'] ; echo " </td>";
			echo "<td>"; echo $info[$row]['HPO_ID'] ;  echo "</td>";
			echo "<td>"; echo $info[$row]['HPO_termname'] ; echo " </td>";
			echo "</tr>";

			//display data
//			echo $row . ' OMIM : ' . $info[$row]['OMIM'] . '<br />';
//			echo $row . ' Gene : ' . $info[$row]['Gene'] . '<br />';
//			echo $row . ' Gene_ID : ' . $info[$row]['Gene_ID'] . '<br />';
//			echo $row . ' HPO_ID : ' . $info[$row]['HPO_ID'] . '<br />';
//			echo $row . ' HPO_termname : ' . $info[$row]['HPO_termname'] . '<br />';
		}
	}
		?>

	</body>
</html>
