<?php
	session_start();
	require '../community/_database/database.php';
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php include 'components/authentication.php' ?>
<?php include 'components/session-check-profile.php' ?>
<?php include 'controllers/base/head.php' ?>
<div class="profilo-page">
<?php include 'controllers/navigation/first-navigation.php' ?>
<?php include 'controllers/base/style.php' ?>


<?php
	
    $current_user = $_SESSION['user_username'];
    if($current_user == "leonardovilla" || $current_user == "ricky.gila" || $current_user == "mcdonald"){
	
?>

	<div class="contenitore_add_form">
		<form action="components/add-game-controller.php" method="post" enctype="multipart/form-data">
			<div class="input_add_form">
		    	Nome: <input type="text" name="nome" id="nome">
		    </div>
		    <div class="input_add_form">
		    	Descrizione: <input type="text" name="descrizione" id="descrizione">
		    </div>
		    <div class="input_add_form">
		    	Genere: <input type="text" name="genere" id="genere">
		    </div>
		    <div class="input_add_form">
		    	Piattaforma (PlayStation 4, Xbox One, Nintendo Switch, PC): <input type="text" name="piattaforma" id="piattaforma">
		    </div>
		    <div class="input_add_form">
		    	Copertina (dimensioni 440x550px): <input type="file" name="fileToUpload" id="fileToUpload">
		    </div>
		    <div class="input_add_form">
		    	<input type="submit" value="Invia">
		    </div>
		</form>
	</div>


<?php
	}
?>