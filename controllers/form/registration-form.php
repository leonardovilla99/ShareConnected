                    <form class="form col-md-12 center-block" action="components/registration.php" method="post" autocomplete="off">
                        <div class="row">
                            <div class="col-lg-6" style="z-index: 9;">
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" placeholder="Nome" name="user_firstname" required>
                                </div>
                            </div>
                            <div class="col-lg-6" style="z-index: 9;">
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" placeholder="Cognome" name="user_lastname" required>
                                </div>
                            </div>
                        </div>
                     <div class="row">
                         <div class="col-lg-12">
                            <div class="form-group">
                                <input type="email" class="form-control input-lg" placeholder="Email" name="user_email" required>
                            </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-lg-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <!-- http://<?php echo $rws['domain_websiteaddress'];?>/user_username= --> shareconnected.com/community/
                                    </span>
                                    <input type="username" class="form-control input-lg username-input" placeholder="Username" name="user_username" id="user_username" required>
                                </div>
                             </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="password" class="form-control input-lg" placeholder="Password" name="user_password" required>
                                </div>
                            </div>
                        </div>
                        <p style="color:#000;margin-left: 10px;">Registrati o <a href="login.php">effettua il Login</a></p><br>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <button class="btn btn-primary ladda-button" data-style="zoom-in" type="submit"  id="SubmitButton" value="Upload" style="float:left;" name="signup_button"/>Registrati</button>
                                </div>
                            </div>
                        </div>
                    </form>
