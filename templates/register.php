<?php

global $errors;
// var_dump( $errors );
// var_dump( $_POST );

// var_dump($_SERVER['REQUEST_METHOD'] );
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Registrierung</title>
        <link href="assets/css/mainstyle.css" rel="stylesheet">
        <link href="assets/css/registerstyle.css" rel="stylesheet">
    </head>
    <body>
    <section class="bg">
        <form method="post">
            <article id="welcomebox" style="display: block;">
                <div class="registerbox">
                    <div class="polyroidImgRegister">
                        <img src="assets/img/logo/logo_986.svg">
                    </div>
                    <div class="title-wrapper">
                        <h3>Willkommen!</h3>
                        <h4>Wie möchtest du Starten?</h4>
                    </div>
                    <div class="register-possibilities-wrapper">
                        <div class="register-googleApple-wrapper">
                            <div class="signIn-with-apple-wrapper">
                                <img src="assets/img/apple-icon.svg">
                                <h6>Sign in with Apple</h6>
                            </div>
                            <div class="signIn-with-google-wrapper">
                                <img src="assets/img/google-icon.svg">
                                <h6>Sign in with Google</h6>
                            </div>
                        </div>
                        <div class="other-line-wrapper">
                            <hr>
                            <p>oder</p>
                            <hr>
                        </div>
                        <button  class="button-forward">E-Mail-Adresse</button>
                        <div class="legal">
                            <p>By signing up, you agree to our Terms.
                                See how we use your data in our Privacy Policy.</p>
                        </div>
                    </div>
                </div>
            </article>

            <article id="registration-gender" class="registerinput-box" style="display: block;">
                <div class="registerbox">
                    <div class="polyroidImgRegister">
                        <img src="assets/img/logo/logo_986.svg">
                    </div>
                    <div class="progress-bullets-wrapper">
                        <div class="progress-bullet bullet-active"></div>
                        <div class="progress-bullet"></div>
                        <div class="progress-bullet"></div>
                        <div class="progress-bullet"></div>
                        <div class="progress-bullet"></div>
                        <div class="progress-bullet"></div>
                        <div class="progress-bullet"></div>
                        <div class="progress-bullet"></div>
                        <div class="progress-bullet"></div>
                    </div>
                    <div class="registration-title">
                        <h3>Ich bin ...</h3>
                    </div>
                    <div class="registration-selection-gender">
                        <div class="registration-selection-gender">
                            <div class="gender-box-wrapper">
                                <div class="gender-female">
                                    <label for="gender--female">Weiblich</label>
                                    <input id="gender--female" type="radio" name="gender" value="gender--female" <?php if(isset($_POST['gender']) && $_POST['gender'] == 'genderresearch--female'){echo 'checked';}?>>
                                </div>
                                <div class="gender-male">
                                    <label for="gender--male">Männlich</label>
                                    <input id="gender--male" type="radio" name="gender" value="gender--male" <?php if(isset($_POST['gender']) && $_POST['gender'] == 'genderresearch--male'){echo 'checked';}?>>
                                </div>
                                <div class="gender-human">
                                    <label for="gender--human">Mensch</label>
                                    <input id="gender--human" type="radio" name="gender" value="gender--human" <?php if(isset($_POST['gender']) && $_POST['gender'] == 'genderresearch--human'){echo 'checked';}?>>
                                </div>
                                <div class="error-wrapper">
                                    <?php if ( isset( $errors[ 'gender' ] ) ):?>
                                             <?php  foreach( $errors[ 'gender' ] as $error_msg ):?>
                                                <span id="errormessage"><?= $error_msg ?></span>
                                            <?php endforeach; ?>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="button-forward">Weiter</button>
                </div>
                <div class="background-shape">
                    <img src="assets/img/backgroundshape-regist.svg">
                </div>
            </article>

            <article id="registration-gender-search" class="registerinput-box" style="display: block;">
                <div class="registerbox">
                    <div class="polyroidImgRegister">
                        <img src="assets/img/logo/logo_986.svg">
                    </div>
                    <div class="progress-bullets-wrapper">
                        <div class="progress-bullet bullet-active"></div>
                        <div class="progress-bullet bullet-active"></div>
                        <div class="progress-bullet"></div>
                        <div class="progress-bullet"></div>
                        <div class="progress-bullet"></div>
                        <div class="progress-bullet"></div>
                        <div class="progress-bullet"></div>
                        <div class="progress-bullet"></div>
                        <div class="progress-bullet"></div>
                    </div>
                    <div class="registration-title">
                        <h3>Ich suche ...</h3>
                    </div>
                    <div class="registration-selection-gender">
                        <div class="registration-selection-gender">
                            <div class="gender-box-wrapper">
                                <div class="gender-female">
                                    <label for="genderresearch--female">Weiblich</label>
                                    <input id="genderresearch--female" type="radio" name="genderresearch" value="genderresearch--female" <?php if(isset($_POST['genderresearch']) && $_POST['genderresearch'] == 'genderresearch--female'){echo 'checked';}?> />
                                </div>
                                <div class="gender-male">
                                    <label for="genderresearch--male">Männlich</label>
                                    <input id="genderresearch--male" type="radio" name="genderresearch" value="genderresearch--male" <?php if(isset($_POST['genderresearch']) && $_POST['genderresearch'] == 'genderresearch--male'){echo 'checked';}?> />
                                </div>
                                <div class="gender-human">
                                    <label for="genderresearch--human">Mensch</label>
                                    <input id="genderresearch--human" type="radio" name="genderresearch" value="genderresearch--human" <?php if(isset($_POST['genderresearch']) && $_POST['genderresearch'] == 'genderresearch--human'){echo 'checked';}?>>
                                </div>
                                <div class="error-wrapper">
                                    <?php if ( isset( $errors[ 'gendersearch' ] ) ):?>
                                        <?php  foreach( $errors[ 'gendersearch' ] as $error_msg ):?>
                                            <span id="errormessage"><?= $error_msg ?></span>
                                        <?php endforeach; ?>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                    <button type="button" class="button-forward">Weiter</button>
                </div>
                <div class="background-shape">
                    <img src="assets/img/backgroundshape-regist.svg">
                </div>
            </article>

            <article id="registration-img-upload" class="registerinput-box"style="display: block;">
                <div class="registerbox">
                    <div class="polyroidImgRegister">
                        <img src="assets/img/logo/logo_986.svg">
                    </div>
                    <div class="progress-bullets-wrapper">
                        <div class="progress-bullet bullet-active"></div>
                        <div class="progress-bullet bullet-active"></div>
                        <div class="progress-bullet bullet-active"></div>
                        <div class="progress-bullet"></div>
                        <div class="progress-bullet"></div>
                        <div class="progress-bullet"></div>
                        <div class="progress-bullet"></div>
                        <div class="progress-bullet"></div>
                        <div class="progress-bullet"></div>
                    </div>
                    <div class="registration-title">
                        <h3>Wähle ein Profilbild</h3>
                        <p>Das Profilbild wird als erstes Bild
                            beim Matchen angezeigt.</p>
                    </div>
                    <div id="registration-img-upload-box">
                        <img src="assets/img/icons/upload_FILL1_wght400_GRAD0_opsz48.svg" alt="upload icon">
                    </div>
                    <div class="button-wrapper">
                        <button type="button" class="button-forward">Weiter</button>
                        <button type="button" class="button-back">Zurück</button>
                    </div>

                </div>
                <div class="background-shape">
                    <img src="assets/img/backgroundshape-regist.svg">
                </div>
            </article>

            <article id="registration-username" class="registerinput-box"style="display: block;">
                <div class="registerbox">
                    <div class="polyroidImgRegister">
                        <img src="assets/img/logo/logo_986.svg">
                    </div>
                    <div class="progress-bullets-wrapper">
                        <div class="progress-bullet bullet-active"></div>
                        <div class="progress-bullet bullet-active"></div>
                        <div class="progress-bullet bullet-active"></div>
                        <div class="progress-bullet bullet-active"></div>
                        <div class="progress-bullet bullet-active"></div>
                        <div class="progress-bullet"></div>
                        <div class="progress-bullet"></div>
                        <div class="progress-bullet"></div>
                        <div class="progress-bullet"></div>
                    </div>
                    <div class="registration-title">
                        <h3>Wähle einen Nutzernamen</h3>
                        <p>Der Benutzername wird beim
                            Matchen angezeigt.</p>
                    </div>
                    <div id="registration-username-wrapper">
                        <label for="text">Nutzername</label>
                        <div id="registration-username-input">
                            <input id="username" type="text" name="username" placeholder="Dein Nutzername lautet..." />
                            <img src="assets/img/icons/close_FILL0_wght400_GRAD0_opsz48.svg" style="display: none;">
                            <img src="assets/img/icons/check_FILL0_wght400_GRAD0_opsz48.svg" style="display: none;">
                        </div>
                        <div class="error-wrapper">
                            <?php if ( isset( $errors[ 'username' ] ) ):?>
                                <?php  foreach( $errors[ 'username' ] as $error_msg ):?>
                                    <span id="errormessage"><?= $error_msg ?></span>
                                <?php endforeach; ?>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="button-wrapper">
                        <button type="button" class="button-forward">Weiter</button>
                        <button type="button" class="button-back">Zurück</button>
                    </div>

                </div>
                <div class="background-shape">
                    <img src="assets/img/backgroundshape-regist.svg">
                </div>
            </article>

            <article id="registration-userinfos" class="registerinput-box" style="display: block;">
                <div class="registerbox">
                    <div class="polyroidImgRegister">
                        <img src="assets/img/logo/logo_986.svg">
                    </div>
                    <div class="progress-bullets-wrapper">
                        <div class="progress-bullet bullet-active"></div>
                        <div class="progress-bullet bullet-active"></div>
                        <div class="progress-bullet bullet-active"></div>
                        <div class="progress-bullet bullet-active"></div>
                        <div class="progress-bullet bullet-active"></div>
                        <div class="progress-bullet bullet-active"></div>
                        <div class="progress-bullet bullet-active"></div>
                        <div class="progress-bullet"></div>
                        <div class="progress-bullet"></div>
                    </div>
                    <div class="registration-title">
                        <h3>Wer bist du?</h3>
                        <p>Trage deinen Namen und dein Alter ein.
                            Dein Alter kann im Nachgang nicht
                            mehr geändert werden.</p>
                    </div>
                    <div id="registration-username-wrapper">
                        <label for="text">Name</label>
                        <div id="registration-mail-input">
                            <input id="name" type="text" name="name" placeholder="Dein Nutzername lautet..." >
                            <img src="assets/img/icons/close_FILL0_wght400_GRAD0_opsz48.svg" style="display: none;">
                            <img src="assets/img/icons/check_FILL0_wght400_GRAD0_opsz48.svg" style="display: none;">
                        </div>
                        <div class="error-wrapper">
                            <?php if ( isset( $errors[ 'username' ] ) ):?>
                                <?php  foreach( $errors[ 'username' ] as $error_msg ):?>
                                    <span id="errormessage"><?= $error_msg ?></span>
                                <?php endforeach; ?>
                            <?php endif;?>
                        </div>
                    </div>
                    <div id="registration-birthday-wrapper">
                        <label for="text">Geburtsdatum</label>
                        <div id="registration-mail-input">
                            <input id="birthday" type="date" name="birthday" placeholder="Du wurdest geboren am..." >
                            <img src="assets/img/icons/close_FILL0_wght400_GRAD0_opsz48.svg" style="display: none;">
                            <img src="assets/img/icons/check_FILL0_wght400_GRAD0_opsz48.svg" style="display: none;">
                        </div>
                        <span id="errormessage"></span>
                    </div>
                    <div id="registration-sexualität-wrapper">
                        <label for="text">Sexualität</label>
                        <select name="sexuality" >
                            <option value="">Deine Sexualität...</option>
                            <option value="bisexuell">Bisexuell</option>
                            <option value="homosexuell">Homosexuell</option>
                            <option value="pansexuell">Pansexuell</option>
                            <option value="polysexuell">Polysexuell</option>
                            <option value="notSure">Ich bin mir nicht sicher</option>
                        </select>
                        <div class="error-wrapper">
                            <?php if ( isset( $errors[ 'sexuality' ] ) ):?>
                                <?php  foreach( $errors[ 'sexuality' ] as $error_msg ):?>
                                    <span id="errormessage"><?= $error_msg ?></span>
                                <?php endforeach; ?>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="button-wrapper">
                        <button type="button" class="button-forward">Weiter</button>
                        <button type="button" class="button-back">Zurück</button>
                    </div>
                </div>
                <div class="background-shape">
                    <img src="assets/img/backgroundshape-regist.svg">
                </div>
            </article>

            <article id="registration-emailadress" class="registerinput-box" style="display: block;">
                <div class="registerbox">
                    <div class="polyroidImgRegister">
                        <img src="assets/img/logo/logo_986.svg">
                    </div>
                    <div class="progress-bullets-wrapper">
                        <div class="progress-bullet bullet-active"></div>
                        <div class="progress-bullet bullet-active"></div>
                        <div class="progress-bullet bullet-active"></div>
                        <div class="progress-bullet bullet-active"></div>
                        <div class="progress-bullet bullet-active"></div>
                        <div class="progress-bullet bullet-active"></div>
                        <div class="progress-bullet bullet-active"></div>
                        <div class="progress-bullet"></div>
                        <div class="progress-bullet"></div>
                    </div>
                    <div class="registration-title">
                        <h3>Wie lautet deine E-Mail-Adresse</h3>
                        <p>Trage deinen deine E-Mail-Adresse ein.
                            Mit dieser loggst du dich in Polyroid ein.</p>
                    </div>
                    <div id="registration-username-wrapper">
                        <label for="text">E-Mail-Adresse</label>
                        <div id="registration-mail-input">
                            <input id="email-adress" type="email" name="email" placeholder="Dein E-Mail-Adresse lautet..." >
                            <img src="assets/img/icons/close_FILL0_wght400_GRAD0_opsz48.svg" style="display: none;">
                            <img src="assets/img/icons/check_FILL0_wght400_GRAD0_opsz48.svg" style="display: none;">
                        </div>
                        <div class="error-wrapper">
                            <?php if ( isset( $errors[ 'email' ] ) ):?>
                                <?php  foreach( $errors[ 'email' ] as $error_msg ):?>
                                    <span id="errormessage"><?= $error_msg ?></span>
                                <?php endforeach; ?>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="button-wrapper">
                        <button type="button" class="button-forward">Weiter</button>
                        <button type="button" class="button-back">Zurück</button>
                    </div>
                </div>
                <div class="background-shape">
                    <img src="assets/img/backgroundshape-regist.svg">
                </div>
            </article>

            <article id="registration-password" class="registerinput-box" style="display: block;">
                <div class="registerbox">
                    <div class="polyroidImgRegister">
                        <img src="assets/img/logo/logo_986.svg">
                    </div>
                    <div class="progress-bullets-wrapper">
                        <div class="progress-bullet bullet-active"></div>
                        <div class="progress-bullet bullet-active"></div>
                        <div class="progress-bullet bullet-active"></div>
                        <div class="progress-bullet bullet-active"></div>
                        <div class="progress-bullet bullet-active"></div>
                        <div class="progress-bullet bullet-active"></div>
                        <div class="progress-bullet bullet-active"></div>
                        <div class="progress-bullet"></div>
                        <div class="progress-bullet"></div>
                    </div>
                    <div class="registration-title">
                        <h3>Wie lautet deine
                            Passwort?</h3>
                        <p>Trage dein Passwort ein.
                            Dein Passwort kann im Nachgang im Profil
                            geändert werden.</p>
                    </div>
                    <div id="registration-username-wrapper">
                        <label for="text">Passwort</label>
                        <div id="registration-mail-input">
                            <input id="password" type="password" name="password" placeholder="Dein Passwort lautet..." />
                            <img src="assets/img/icons/close_FILL0_wght400_GRAD0_opsz48.svg" style="display: none;">
                            <img src="assets/img/icons/check_FILL0_wght400_GRAD0_opsz48.svg" style="display: none;">
                        </div>
                        <div class="error-wrapper">
                            <?php if ( isset( $errors[ 'password' ] ) ):?>
                                <?php  foreach( $errors[ 'password' ] as $error_msg ):?>
                                    <span id="errormessage"><?= $error_msg ?></span>
                                <?php endforeach; ?>
                            <?php endif;?>
                        </div>
                    </div>
                    <div id="registration-username-wrapper">
                        <label for="text">Passwort wiederholen</label>
                        <div id="registration-mail-input">
                            <input id="password_repeat" type="password" name="password_repeat" placeholder="Wiederhole dein Passwort"  />
                            <img src="assets/img/icons/close_FILL0_wght400_GRAD0_opsz48.svg" style="display: none;">
                            <img src="assets/img/icons/check_FILL0_wght400_GRAD0_opsz48.svg" style="display: none;">
                        </div>
                        <div class="error-wrapper">
                            <?php if ( isset( $errors[ 'password_repeat' ] ) ):?>
                                <?php  foreach( $errors[ 'password_repeat' ] as $error_msg ):?>
                                    <span id="errormessage"><?= $error_msg ?></span>
                                <?php endforeach; ?>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="button-wrapper">
                        <button type="button" class="button-forward">Weiter</button>
                        <button type="button" class="button-back">Zurück</button>
                    </div>
                </div>
                <div class="background-shape">
                    <img src="assets/img/backgroundshape-regist.svg">
                </div>
            </article>

            <article id="registration-legal" class="registerinput-box" style="display: block;">
                <div class="registerbox">
                    <div class="polyroidImgRegister">
                        <img src="assets/img/logo/logo_986.svg">
                    </div>
                    <div class="progress-bullets-wrapper">
                        <div class="progress-bullet bullet-active"></div>
                        <div class="progress-bullet bullet-active"></div>
                        <div class="progress-bullet bullet-active"></div>
                        <div class="progress-bullet bullet-active"></div>
                        <div class="progress-bullet bullet-active"></div>
                        <div class="progress-bullet bullet-active"></div>
                        <div class="progress-bullet bullet-active"></div>
                        <div class="progress-bullet"></div>
                        <div class="progress-bullet"></div>
                    </div>
                    <div class="registration-title">
                        <h3>Die wirklich wichtigen
                            Dinge</h3>
                    </div>

                    <div class="legals">
                        <h6>AGB*</h6>
                        <div class="legals-wrapper">
                            <input type="checkbox" id="agb" name="agb" value="1" <?php if(isset($_POST['privacy']) && $_POST['privacy'] == 1){echo 'checked';}?>>
                            <label for="scales">Ich habe die AGB gelesen und stimme
                                diesen zu.</label>
                        </div>
                        <div class="error-wrapper">
                            <?php if ( isset( $errors[ 'agb' ] ) ):?>
                                <?php  foreach( $errors[ 'agb' ] as $error_msg ):?>
                                    <span id="errormessage"><?= $error_msg ?></span>
                                <?php endforeach; ?>
                            <?php endif;?>
                        </div>
                        <h6>Datenschutz*</h6>
                        <div class="legals-wrapper">
                            <input type="checkbox" id="privacy" name="privacy" value="1" <?php if(isset($_POST['privacy']) && $_POST['privacy'] == 1){echo 'checked';}?>>
                            <label for="scales">Ich habe die Datenschutzbestimmungen
                                gelesen und stimme diesen zu.</label>
                        </div>
                        <div class="error-wrapper">
                            <?php if ( isset( $errors[ 'privacy' ] ) ):?>
                                <?php  foreach( $errors[ 'privacy' ] as $error_msg ):?>
                                    <span id="errormessage"><?= $error_msg ?></span>
                                <?php endforeach; ?>
                            <?php endif;?>
                        </div>
                        <h6>Jugendschutz*</h6>
                        <div class="legals-wrapper">
                            <input type="checkbox" id="youthprotection" name="youthprotection" value="1" <?php if(isset($_POST['youthprotection']) && $_POST['youthprotection'] == 1){echo 'checked';}?>>
                            <label for="scales">Ich bestätige, mindestens 18 Jahre alt
                                zu sein.</label>
                        </div>
                        <div class="error-wrapper">
                            <?php if ( isset( $errors[ 'youthprotection' ] ) ):?>
                                <?php  foreach( $errors[ 'youthprotection' ] as $error_msg ):?>
                                    <span id="errormessage"><?= $error_msg ?></span>
                                <?php endforeach; ?>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="button-wrapper">
                        <button value="register" type= "submit" class="button-forward">Registrieren</button>
                    </div>
                    <div class="button-login">
                        <a href="?page=login">Zum Login</a>
                    </div>
                </div>
                <div class="background-shape">
                    <img src="assets/img/backgroundshape-regist.svg">
                </div>
            </article>

            <article id="registration-end" class="registerinput-box" style="display: block;">

            </article>
        </form>
    </section>
    </body>
</html>
