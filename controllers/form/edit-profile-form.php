<form action="components/update-profile.php" method="post" enctype="multipart/form-data" id="UploadForm">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
      <li class="active"><a href="#general" data-toggle="tab">Generale</a></li>
      <li><a href="#personal" data-toggle="tab">Personale</a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane fade in active" id="general">
            <div class="col-md-6">
                <div class="form-group float-label-control">
                    <label for="">Nome</label>
                    <input type="text" class="form-control" placeholder="<?php echo $rws['user_firstname'];?>" name="user_firstname" value="<?php echo $rws['user_firstname'];?>">
                </div>
                <div class="form-group float-label-control">
                    <label for="">Cognome</label>
                    <input type="text" class="form-control" placeholder="<?php echo $rws['user_lastname'];?>" name="user_lastname" value="<?php echo $rws['user_lastname'];?>">
                </div>
                <div class="form-group float-label-control">
                    <label for="">Immagine profilo</label>
                    <input name="ImageFile" type="file" id="uploadFile"/>
                </div>
                <div class="form-group float-label-control">
                    <label for="">Immagine background</label>
                    <input name="BackgroundImageFile" type="file" id="uploadFile"/>
                </div>
            </div>
            <div class="col-md-6">
                <label for="">Username</label>
                <div class="form-group float-label-control">
                    <div class="input-group">
                        <fieldset disabled>
                            <input type="text" class="form-control" placeholder="<?php echo $rws['user_username'];?>" name="user_username" value="<?php echo $rws['user_username'];?>" id="disabledTextInput" autocomplete="off">
                        </fieldset>
                    </div>
                </div>
                <div class="form-group float-label-control">
                    <label for="">Password</label>
                    <input type="password" class="form-control" placeholder="<?php echo $rws['user_password'];?>" name="user_password" value="<?php echo $rws['user_password'];?>">
                </div>
                <div class="form-group float-label-control">
                    <label for="">Email</label>
                    <input type="text" class="form-control" placeholder="<?php echo $rws['user_email'];?>" name="user_email" value="<?php echo $rws['user_email'];?>">
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="personal">
            <div class="col-md-6">
                <div class="form-group float-label-control">
                    <label for="">Biografia</label>
                    <textarea class="form-control" placeholder="<?php echo $rws['user_shortbio'];?>" rows="10" placeholder="<?php echo $rws['user_shortbio'];?>" name="user_shortbio" value="<?php echo $rws['user_shortbio'];?>"><?php echo $rws['user_shortbio'];?></textarea>
                </div>
                <div class="form-group float-label-control">
                    <label for="">Data di nascita</label>
                    <input type="date" class="form-control" placeholder="<?php echo $rws['user_dob'];?>" name="user_dob" value="<?php echo $rws['user_dob'];?>">
                </div>
                <div class="form-group float-label-control">
                    <label for="">Professione</label>
                    <input type="text" class="form-control" placeholder="<?php echo $rws['user_profession'];?>" name="user_profession" value="<?php echo $rws['user_profession'];?>" id="profession">
                </div>
                <label for="">Genere</label>
                <div class="form-group float-label-control">
                    <div class="radio-inline">
                        <label>
                            <input type="radio" name="user_gender" id="optionsRadios1" value="Male" checked>Maschio</label>
                    </div>
                    <div class="radio-inline">
                        <label>
                            <input type="radio" name="user_gender" id="optionsRadios1" value="Female">Femmina</label>
                    </div>
                </div>
                <div class="form-group float-label-control">
                    <label for="">Nazione</label>
                    <input type="text" class="form-control" placeholder="<?php echo $rws['user_country'];?>" name="user_country" value="<?php echo $rws['user_country'];?>" id="country">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group float-label-control">
                    <label for="">Indirizzo</label>
                    <input type="text" class="form-control" placeholder="<?php echo $rws['user_address'];?>" name="user_address" value="<?php echo $rws['user_address'];?>">
                </div>
                <label for="">Sito WEB</label>
                <div class="form-group float-label-control">
                    <div class="input-group">
                        <span class="input-group-addon">http://</span>
                        <input type="text" class="form-control" placeholder="<?php echo $rws['user_website'];?>" name="user_website" value="<?php echo $rws['user_website'];?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="submit">
        <center>
            <button class="btn btn-primary ladda-button" data-style="zoom-in" type="submit"  id="SubmitButton" value="Upload" />Salva</button>
        </center>
    </div>
</form>
