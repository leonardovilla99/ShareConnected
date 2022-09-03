<?php
    $current_user = $_SESSION['user_username'];
    
    $sql="SELECT giocorichiesto FROM notifiche WHERE achi = '$current_user'";
	$result=mysqli_query($database,$sql) or die(mysqli_error($database));
	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	        $giocorichiesto = $row["giocorichiesto"];
	    }
	}
	
	$sql="SELECT giocorichiesto FROM notifiche WHERE richiede = '$current_user'";
	$result=mysqli_query($database,$sql) or die(mysqli_error($database));
	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	        $giocoinvito = $row["giocorichiesto"];
	    }
	}
	
	
    $sql = "SELECT * FROM user WHERE user_username='$current_user'";
    $result = mysqli_query($database,$sql);
    while($row = mysqli_fetch_array($result,MYSQLI_BOTH)) {
	    
	    
		

	    
	    
?>
    <!-- Navbar1 -->
	    <div id="navigation" class="navbar navbar-default navbar-fixed-top">
	      <div class="fluid-container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse1">
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
                <a class="navbar-brand" href="home.php"><img src="https://www.shareconnected.com/community/image/logo.png" alt=""></a>
            </div>
	        <div class="navbar-collapse collapse" id="navbar-collapse1">
                <form class="navbar-form navbar-left navbar-margin" role="search" method="post" autocomplete="off" action="search-result.php">
                    <div class="form-group">
                        <input type="text" class="search form-control cerca-box" id="searchbox" placeholder="Cerca altri utenti..." name="search-form"/><br />
                        <div id="display"></div>
				    </div>
				</form>
                <ul class="nav navbar-nav navbar-right navbar-margin">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="https://www.shareconnected.com/community/userfiles/avatars/<?php echo $row['user_avatar'];?>" class="profile-avatar-menu"> <?php echo $row['user_firstname'];?> <?php echo $row['user_lastname'];?><strong class="caret"></strong></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="http://www.shareconnected.com/community/profile.php?user_username=<?php echo $current_user?>"><i class="fa fa-gamepad"></i> Profilo </a>
                            </li>
                            <li>
                                <a href="edit-profile.php"><i class="far fa-edit"></i> Modifica Profilo</a>
                            </li>
                            <li>
                                <a href="notification-profile.php"><div class="notification-center"><?php echo (count($giocorichiesto ));?></div>Notifiche</a>
                            </li>
                            <li>
                                <a href="components/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                            </li>
                            
                            <?php
	                            if($current_user == "leonardovilla" || $current_user == "ricky.gila"){
	                        ?>
	                        <li>
                                <a href="add-game.php"><i class="fas fa-plus"></i> Add game</a>
                            </li>
	                        <?php
	                            }
	                        ?>
                            
                        </ul>
                    </li>
                </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </div>
      <!-- ./Navbar1 -->
<?php
    }
?>
