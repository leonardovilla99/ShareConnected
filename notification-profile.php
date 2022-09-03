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
	if (isset($_GET["delateinvite"])) {
	
		$delateinvite = $_GET["delateinvite"];
		
		$sql = "DELETE FROM notifiche WHERE achi='".$current_user."' AND incambio='".$delateinvite."'";
		mysqli_query($database,$sql) or die(mysqli_error($database));
		
		?>
		<script>
			
			var string = "<?php $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];?>"
			var stringurl = string + "notification-profile.php";
	            window.history.replaceState(null, null, stringurl);
				location.reload();
			
		</script>
		
<?php
	}
?>

<?php
	if (isset($_GET["delatereq"])) {
	
		$delatereq = $_GET["delatereq"];
		
		$sql = "DELETE FROM notifiche WHERE richiede='".$current_user."' AND incambio='".$delatereq."'";
		mysqli_query($database,$sql) or die(mysqli_error($database));
		
		?>
		<script>
			
			var string = "<?php $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];?>"
			var stringurl = string + "notification-profile.php";
	            window.history.replaceState(null, null, stringurl);
				location.reload();
			
		</script>
		
<?php
	}
?>




<div class=" container container-notification">
	<div class="notifiche">
		<h2>Proposte ricevute</h2>
		
		<?php
			
			$richieste = count($giocorichiesto);
			
			if($richieste != 0){
					
				$sql="SELECT giocorichiesto, incambio, richiede FROM notifiche WHERE achi = '$current_user'";
				$result=mysqli_query($database,$sql) or die(mysqli_error($database));
				if ($result->num_rows > 0) {
				    while($row = $result->fetch_assoc()) {
				        $giocorichiesto = $row["giocorichiesto"];
				        $incambio = $row["incambio"];
				        $richiede = $row["richiede"];      
					   
		?>
						<div class="rischieste-box clearfix">
							
							<img src="game/<?php echo $giocorichiesto;+".jpg"?>" id="<?php echo $giocorichiesto;?>" class="richiesta-giochi">
							<div class="box-scambia-bottone">
								<p><?php echo $current_user?></p>
								<div class="scambia-bottone">
									<i class="fas fa-check bottone-condivisione-notifica"></i> <i class="fas fa-retweet bottone-condivisione-notifica"></i><i class="fas fa-trash bottone-condivisione-notifica" id="<?php echo $incambio;?>" onclick="delateinvite(id)"></i> 
								</div>
								<p><?php echo $richiede?></p>
							</div>
							<img src="game/<?php echo $incambio;+".jpg"?>" id="<?php echo $incambio;?>" class="incambio-giochi">
							
						</div>
	
		<?php
			 		}
			 	}	
			}else{
				echo "non ci sono notifiche";
			}
		?>	
	</div>
	
	
	<div class="inviate">
		<h2>Proposte inviate</h2>
		
		<?php
			
			$inviate = count($giocoinvito);
			
			if($inviate != 0){
					
				$sql="SELECT giocorichiesto, incambio, achi FROM notifiche WHERE richiede = '$current_user'";
				$result=mysqli_query($database,$sql) or die(mysqli_error($database));
				if ($result->num_rows > 0) {
				    while($row = $result->fetch_assoc()) {
				        $giocorichiesto = $row["giocorichiesto"];
				        $incambio = $row["incambio"];
				        $achi = $row["achi"];      
					   
		?>
						
						<div class="rischieste-box clearfix">
							
							<img src="game/<?php echo $incambio;+".jpg"?>" id="<?php echo $incambio;?>" class="richiesta-giochi">
							<div class="box-scambia-bottone">
								<p><?php echo $current_user?></p>
								<div class="scambia-bottone">
									<i class="fas fa-retweet bottone-condivisione-notifica"></i><i class="fas fa-trash bottone-condivisione-notifica" id="<?php echo $incambio;?>" onclick="delatereq(id)"></i>
								</div>
								<p><?php echo $achi?></p>
							</div>
							<img src="game/<?php echo $giocorichiesto;+".jpg"?>" id="<?php echo $giocorichiesto;?>" class="incambio-giochi">
							
						</div>
						
	
		<?php
			 		}
			 	}	
			}else{
				echo "non ci sono inviti";
			}
		?>	
		
	</div>
</div>


<script type="text/javascript">
	
	function delatereq(id){
		
		console.log(id);
	   	var string = "<?php $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];?>"
		var stringurl = string + "notification-profile.php" + "?delatereq=" + id ;
		window.history.replaceState(null, null, stringurl);
		location.reload();
		
	}
	
	function delateinvite(id){
		
		console.log(id);
	   	var string = "<?php $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];?>"
		var stringurl = string + "notification-profile.php" + "?delateinvite=" + id ;
		window.history.replaceState(null, null, stringurl);
		location.reload();
		
	}
	
</script>


