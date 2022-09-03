<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php include 'components/authentication.php' ?>
<?php include 'components/session-check-profile.php' ?>
<?php include 'controllers/base/head.php' ?>
<div class="profilo-page">
<?php include 'controllers/navigation/first-navigation.php' ?>
<?php include 'controllers/base/style.php' ?>
<?php
    if($_GET["follow"]=="same"){
        $dialogue="Your can't follow yourself! ";
    }
?>
<?php
    session_start();
    $current_user = $_SESSION['user_username'];
    $user_username = mysqli_real_escape_string($database,$_REQUEST['user_username']);
    $profile_username=$rws['user_username'];
    $BackgroundNewImageName = $_SESSION['user_backgroundpicture'];
    $sql="SELECT user_backgroundpicture FROM user WHERE user_username = '$user_username'";
    $result=mysqli_query($database,$sql) or die(mysqli_error($database));
	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
		    
	        $BackgroundNewImageName = $row["user_backgroundpicture"];
	    }
	}
	
				
	if (isset($_GET["id"])) {

	$id_gioco_nuovo = $_GET["id"];
	
	$sql = "INSERT INTO usergame (utente, id) VALUES ( '".$current_user."' , '".$id_gioco_nuovo."')";
	mysqli_query($database,$sql) or die(mysqli_error($database));
	
	?>
	<script>
		
		var string = "<?php $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];?>"
		var stringurl = string + "?user_username=" + "<?php echo $current_user?>";
            window.history.replaceState(null, null, stringurl);
			location.reload();
		
	</script>
	<?php
	
	}
	
	
	if (isset($_GET["menoid"])) {

	$id_gioco_del = $_GET["menoid"];
	
	$sql = "DELETE FROM usergame WHERE utente='".$current_user."' AND id='".$id_gioco_del."'";
	mysqli_query($database,$sql) or die(mysqli_error($database));
	
	?>
	<script>
		
		var string = "<?php $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];?>"
		var stringurl = string + "?user_username=" + "<?php echo $current_user?>";
            window.history.replaceState(null, null, stringurl);
			location.reload();
		
	</script>
	<?php
	
	}
	
	
	
	if (isset($_GET["id_primo_scambio"])) {

	$id_primo_scambio = $_GET["id_primo_scambio"];
	$id_secondo_scambio = $_GET["id_secondo_scambio"];
	
	$sql = "INSERT INTO notifiche (richiede, achi, giocorichiesto, incambio) VALUES ( '".$current_user."' , '".$user_username."' , '".$id_primo_scambio."' , '".$id_secondo_scambio."')";
	mysqli_query($database,$sql) or die(mysqli_error($database));
	
	?>
	<script>
		
		var string = "<?php $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];?>"
		var stringurl = string + "?user_username=" + "<?php echo $user_username?>";
            window.history.replaceState(null, null, stringurl);
			location.reload();
		
	</script>
	<?php
	
	}
	
	
	
	
	
	
	
	
	
	
	$sqldb="SELECT id FROM usergame WHERE utente = '$user_username'";
	
    $risultato=mysqli_query($database,$sqldb) or die(mysqli_error($database));
	
	if ($risultato->num_rows > 0) {
	    $i= 1;
	    while($row = $risultato->fetch_assoc()) {
	        $id_game[$i] = $row["id"];
	        $i++;
	    }
	};
		
/*
	
 	$id_game1 = $id_game[1];
	echo "<script>console.log( 'id: $id_game1' );</script>";
*/	
?>
<?php
    $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
?>
	<div class="banner-user">
	  <img src="userfiles/background-images/<?php if($BackgroundNewImageName == ''){echo 'default.jpg';}else{echo $BackgroundNewImageName;};?>" alt="" style="width:100%; height:auto;">
	</div>
	<div class="profile">
		<div class="row clearfix">
			<!-- <div class="col-md-12 column"> -->
	            <div>
	                <center>
	                    <img src="userfiles/avatars/<?php echo $rws['user_avatar'];?>" class="img-responsive profile-avatar">
	                </center>
	                <h1 class="text-center profile-text profile-name"><?php echo $rws['user_firstname'];?> <?php echo $rws['user_lastname'];?></h1>
	                <h2 class="text-center profile-text profile-profession"><?php echo $rws['user_profession'];?></h2>
	                <br>
	                <div class="panel-group white" id="panel-profile">
	                    <div class="panel panel-default no-ombra">
	                        <div id="panel-element-info" class="panel-collapse collapse in">
	                            <div class="panel-body">
	                                <div class="col-md-8 column">
	                                    <p class="text-center profile-title"><i class="fa fa-info"></i> Info</p>
	                                    <hr>
											<?php
											    if ($rws['user_shortbio']){
											?>
	                                    <div class="col-md-4">
	                                        <p class="profile-details"><i class="fa fa-info"></i> Bio</p>
	                                    </div>
	                                    <div class="col-md-8">
	                                        <p><?php echo $rws['user_shortbio'];?></p>
	                                    </div>
										<?php } ?>
											<?php
											    if ($rws['user_address']){
										?>
	                                    <div class="col-md-4">
	                                        <p class="profile-details"><i class="fa fa-info"></i> Indirizzo</p>
	                                    </div>
	                                    <div class="col-md-8">
	                                        <p><?php echo $rws['user_address'];?></p>
	                                    </div>
											<?php } ?>
												<?php
												    if ($rws['user_email']){
											?>
	                                    <div class="col-md-4">
	                                        <p class="profile-details"><i class="fa fa-envelope"></i> Email</p>
	                                    </div>
	                                    <div class="col-md-8">
	                                        <p><?php echo $rws['user_email'];?></p>
	                                    </div>
											<?php } ?>
												<?php
												    if ($rws['user_country']){
											?>
	                                    <div class="col-md-4">
	                                        <p class="profile-details"><i class="fa fa-info"></i> Nazione</p>
	                                    </div>
	                                    <div class="col-md-8">
	                                        <p><?php echo $rws['user_country'];?></p>
	                                    </div>
											<?php } ?>
	                                </div>
	                                <div class="col-md-4 column">
	                                    <p class="text-center profile-title"><i class="fa fa-info"></i> Dati personali</p>
	                                    <hr>
											<?php
												if ($rws['user_gender']){
											?>
	                                    <div class="col-md-4">
	                                        <p class="profile-details"><i class="fa fa-user"></i> Genere</p>
	                                    </div>
	                                    <div class="col-md-8">
	                                        <p><?php echo $rws['user_gender'];?></p>
	                                    </div>
											<?php } ?>
												<?php
													if ($rws['user_dob']){
												?>
	                                    <div class="col-md-4">
	                                        <p class="profile-details"><i class="fa fa-calendar"></i> Data di nascita</p>
	                                    </div>
	                                    <div class="col-md-8">
	                                        <p><?php echo $rws['user_dob'];?></p>
	                                    </div>
											<?php } ?>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
			<!-- </div> -->
			<div class="content">
				<div class="title">
					<h3>Giochi</h3>
					<?php
						
						if($current_user === $user_username){
						
					?>
					<div class="aggiungi-button" id="aggiungi-button">Aggiungi +</div>
					<form class="searchbox-giochi-form form-invisibile" role="search" method="post" autocomplete="off" action="">
	                    <div class="">
	                        <input type="text" class="form-control" id="searchbox-giochi" placeholder="Voglio aggiungere..." name="search-form-giochi"/><br />
	                        <div id="display"></div>
					    </div>
					</form>
					<?php
						};
					?>
					<?php
						$sql=mysqli_query($database,"SELECT nome,id FROM game order by id");
						if( mysqli_num_rows($sql) > 0) {
							while($row_new = $sql->fetch_assoc()) {
							        $arrayJS[]=$row_new;
							    }
					 	}
					?>
					<div class="blocco-add-game form-invisibile"></div>
				</div>
				<div class="box-game">
					
					<?php	
						for ($a = 1; $a <= count($id_game); $a++) {
							$id_game_new = $id_game[$a];
 							
							$sql_new="SELECT copertina,nome,genere,id FROM game WHERE id = '$id_game_new'";
							$result_new=mysqli_query($database,$sql_new) or die(mysqli_error($database));
							if ($result_new->num_rows > 0) {
							    while($row_new = $result_new->fetch_assoc()) {
							        $copertina = $row_new["copertina"];
							        $nome = $row_new["nome"];
							        $genere = $row_new["genere"];
							        $id_old_game = $row_new["id"];
							    }
							}
							
					?>
					<div class="game-box">
						<img src="game/<?php echo $copertina;?>">
						<div class="overlay">
							<div class="text-game">
								<?php
									if($current_user === $user_username){
								?>
									<div class="elimina_game" onclick="rimuovigioco(id)" id="<?php echo $id_old_game?>">X</div>
								<?php
									}else{
								?>
									<i class="fa fa-handshake-o scambiagioco" onclick="scambiagioco(id)" id="<?php echo $id_old_game?>"></i>
								<?php
									}
								?>
							</div>
  						</div>
						<p class="nome-game"><?php echo $nome;?></p>
						<p class="genere-game"><?php echo $genere;?></p>
					</div>
					<?php		
						};	
					?>	
					
				</div>				
				
				
			</div>
			
			<div id="id-blocco-scambio" class="blocco-scambio">
				<div class="contenuto-blocco-scambio">
					
					<div class="chiudi-scambio">X</div>
					
					<div class="gioco-scambio"></div>
					
					<div class="scambia-testo">
						<i class="fas fa-retweet"></i>
					</div>
					
					
					<div class="box-game-miei">
					
						<?php	
							
							$sqldb_id="SELECT id FROM usergame WHERE utente = '$current_user'";
	
							$risultato_id=mysqli_query($database,$sqldb_id) or die(mysqli_error($database));
	
							if ($risultato_id->num_rows > 0) {
							    $i= 1;
							    while($row = $risultato_id->fetch_assoc()) {
							        $id_game_miei[$i] = $row["id"];
							        $i++;
							    }
							};
							
							for ($a = 1; $a <= count($id_game_miei); $a++) {
								$id_game_new_miei= $id_game_miei[$a];
	 							
								$sql_miei="SELECT copertina,nome,id FROM game WHERE id = '$id_game_new_miei'";
								$result_miei=mysqli_query($database,$sql_miei) or die(mysqli_error($database));
								if ($result_miei->num_rows > 0) {
								    while($row_new_miei = $result_miei->fetch_assoc()) {
								        $copertina_miei = $row_new_miei["copertina"];
								        $nome_miei = $row_new_miei["nome"];
								        $id_old_game_miei = $row_new_miei["id"];
								    }
								}
								
						?>
						
						<div class="game-box-miei">
							<img src="game/<?php echo $copertina_miei;?>" id="<?php echo $id_old_game_miei;?>" onclick='scambiagioco(id)'>
						</div>
						<?php		
							};	
						?>	
					</div>
					
					
					
					
					
					
  				</div>
			</div>
			
			
		</div>
	</div>
</div>





<script type="text/javascript">
	
	var array = <?php echo json_encode($arrayJS);?>;
	var nomeUtente = "<?php echo $user_username;?>";
	
	
	
	function assegnaGioco(id){
		var risultato = "false";
		var id_old_game = <?php echo json_encode($id_game);?>;
		var id_game_length = <?php echo (count($id_game));?>;
		if(id_game_length== 0){
			var string = "<?php $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];?>"
				
				var stringurl = string + "?user_username=" + nomeUtente + "&id=" + id ;
		        window.history.replaceState(null, null, stringurl);
				location.reload();
		}else{
			id_game_length += 1;
			for(var i=1; i<id_game_length;i++ ){
				var id_old_game_single = id_old_game[i];
				if (id === id_old_game_single){
					risultato = "false";
					break;
				}else{
					risultato = "true";
				}
			}
			if(risultato === "true"){
				
				var string = "<?php $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];?>"
				
				var stringurl = string + "?user_username=" + nomeUtente + "&id=" + id ;
		        window.history.replaceState(null, null, stringurl);
				location.reload();
					
			if(id_game_length === 1){
				var string = "<?php $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];?>"
				
				var stringurl = string + "?user_username=" + nomeUtente + "&id=" + id ;
		        window.history.replaceState(null, null, stringurl);
				location.reload();
			};
		};	
		}
	};
		
	
	function search($text){
		
		var html="";
			
		for(var i=0; i<array.length;i++ ){
			var game = array[i]["nome"];
			var id = array[i]["id"];
	
			if (array[i]["nome"].toLowerCase().indexOf($text.toLowerCase()) >= 0){
				
				html+="<div class='game-add' onclick='assegnaGioco(id)' id='"+id+"'>"+game+"</div>"

			}
		}
	jQuery( ".blocco-add-game" ).html(html);
	};
	

	jQuery(document).ready(function() {
		var x = document.getElementById("aggiungi-button");
		jQuery(".aggiungi-button").click(function(){
			jQuery(".searchbox-giochi-form").toggleClass("form-visibile");
			if (x.innerHTML === "Aggiungi +") {
				x.innerHTML = "Annulla";
  			} else {
  				x.innerHTML = "Aggiungi +";
  			};
  			jQuery("#searchbox-giochi").focus()
		});
		
		$( "#searchbox-giochi" ).keyup(function() {
		if ($("#searchbox-giochi").val() == ""){
			jQuery(".blocco-add-game").removeClass("form-visibile");
		}else{
			jQuery(".blocco-add-game").addClass("form-visibile");
			search($( "#searchbox-giochi" ).val());	
		}
		});
			
		
	});
	
	function rimuovigioco(id){
		
		var string = "<?php $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];?>"
			
		var stringurl = string + "?user_username=" + nomeUtente + "&menoid=" + id ;
        window.history.replaceState(null, null, stringurl);
		location.reload();
	}
	
	i = 0;
	
	function scambiagioco(id){
		jQuery(".chiudi-scambio").click(function() {
			i = 0;
		});
		if(i==0){
			var id_primo_scambio = id;
	        jQuery(".gioco-scambio").html("<img src='game/"+id_primo_scambio+".jpg' class='immagine-per-scambio' id='"+id_primo_scambio+"'></img>");
			var id_secondo_scambio = "";
			i+=1;
		}else{
			var id_secondo_scambio = id;
			var id_primo_scambio = jQuery('.immagine-per-scambio').attr('id');
			console.log(id_primo_scambio);
			console.log(id_secondo_scambio);
			
			
			var string = "<?php $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];?>"
			var stringurl = string + "?user_username=" + nomeUtente + "&id_primo_scambio=" + id_primo_scambio + "&id_secondo_scambio=" + id_secondo_scambio ;
			window.history.replaceState(null, null, stringurl);
			location.reload();
		
			
		};
		

	};
	
	
	
	jQuery(".scambiagioco").click(function() {
		jQuery(".blocco-scambio").css("display","block");
	});
	jQuery(".chiudi-scambio").click(function() {
		jQuery(".blocco-scambio").css("display","none");
	});
	
	
</script>
