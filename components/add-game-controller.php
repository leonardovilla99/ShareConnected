<?php
	session_start();
	require '../../community/_database/database.php';
	
	$temp=$_SESSION['user_username'];
		
	$sqldb_id="SELECT id FROM game";

	$risultato_id=mysqli_query($database,$sqldb_id) or die(mysqli_error($database));

	if ($risultato_id->num_rows > 0) {
		$i= 1;
		while($row = $risultato_id->fetch_assoc()) {
		    $idarray[$i] = $row["id"];
		    $i++;
		}
	};
	$id = count($idarray) + 1;
	
	$Destination = '../game';
    $ImageName = $id;
    $ImageNamecomp = $ImageName.'.jpg';
  if( move_uploaded_file($_FILES['fileToUpload']['tmp_name'], "$Destination/$ImageNamecomp")){
	  	echo "<script>console.log( 'Andato a buon fine' );</script>";
  }else{


  $BackgroundNewImageName= 'default.jpg';
        move_uploaded_file($_FILES['BackgroundImageFile']['tmp_name'], "$Destination/$BackgroundNewImageName");
	  	echo "<script>console.log( ".print_r($_FILES).");</script>";
  }
	






    $nome = $_POST['nome'];
	$descrizione = $_POST['descrizione'];
	$genere = $_POST['genere'];
	$piattaforma = $_POST['piattaforma'];
	$copertina = $id.'.jpg';
	
	$sql = "INSERT INTO game (id, nome, copertina, descrizione, genere, piattaforma) VALUES ('$id','$nome','$copertina','$descrizione','$genere','$piattaforma')";
	mysqli_query($database,$sql) or die(mysqli_error($database));	
	
?>