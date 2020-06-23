<?php require_once('controlFormStud.php'); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Redirige l'utilisateur si Javascript est désactivé -->
    <noscript>
        <META HTTP-EQUIV="Refresh" CONTENT="0;URL=noScript.html">
    </noscript>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="assets/css/myMaterialize.css">
    <!-- Compiled and minified JavaScript -->
    <title>Partie 10 - TP-1</title>
</head>

<body class="container">

    <section>
        <?php
            if ($testFormPosted && 
                $testfName[0] && 
                $testlName[0] && 
                $testCountry[0] && 
                $testNationality[0] && 
                $testMail[0] && 
                $testTel[0] && 
                $testIdPolEmp &&
                $testNbBadge && 
                $testHero[0] && 
                $testLastHack[0] &&
                $testUrlCodecademy[0] && 
                $testFirstCode[0] && 
                $testDegree[0]
                ) { 
        ?>
        <div class="row">
            <div class="col s10">
                <h1>Vos informations :</h1>
                <ul>
                    <li><b>Nom :</b> <?= $testfName[1] ?></li>
                    <li><b>Prénom :</b> <?= $testlName[1] ?></li>
                    <li><b>Date de naissance :</b> <?= $testDateOfBirth[1] ?></li>
                    <li><b>Pays de naissance :</b> <?= $testCountry[1] ?></li>
                    <li><b>Nationalité :</b> <?= $testNationality[1] ?></li>
                    <li><b>Email :</b> <?= $testMail[1] ?></li>
                    <li><b>Tel :</b> <?= $testTel[1] ?></li>
                    <li><b>Diplômes :</b> <?= $testDegree[1] ?></li>
                    <li><b>Numéro Pôle Emploi :</b> <?= $testIdPolEmp[1] ?></li>
                    <li><b>Nombre de badge :</b> <?= $testNbBadge[1]?></li>
                    <li><b>Liens codecademy :</b> <?= $testUrlCodecademy[1]?></li>
                    <li><b>Si vous étiez un super héros/une super héroïne, qui seriez-vous et pourquoi ? :</b></li>
                    <p class='word-wrap'><?= $testHero[1] ?></p>
                    <li><b>Racontez-nous un de vos "hacks" (pas forcément technique ou informatique) :</b></li>
                    <p class='word-wrap'><?= $testLastHack[1] ?></p>
                    <li><b>Avez vous déjà eu une expérience avec la programmation et/ou l'informatique avant de remplir
                            ce formulaire ? :</b> <?= ($testFirstCode[1] == 'on') ? 'OUI' : 'NON'?></li>
                </ul>
            </div>
        </div>
        <?php        
                } else {

        ?>
        <form id="formAddStud" action="index.php" method="post" novalidate>
            <fieldset>
                <legend>Ajouter un apprenant :</legend>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">account_circle</i>
                        <input type="text" name="lName" id="lName" class="validate" placeholder="John" min="2" max="50"
                            maxlength="50" pattern="[a-zA-Zéèêëiîïôöüäç']{1,22}[ |-]?[a-zA-Zéèêëiîïôöüäç']{1,22}"
                            value="<?= (isset($testfName) && !empty($testfName))? $testfName[1] : '' ?>" autofocus
                            required>
                        <label for="lName">Nom</label>
                        <span class="helper-text"
                            data-error="Non conforme. Maximum un espace ou un '-', des lettres non accentuées à l'exception de : éèêëiîïôöüäç'"
                            data-success="ok">Maximum un espace ou un '-', des lettres non accentuées à l'exception de :
                            éèêëiîïôöüäç'</span>
                    </div>
                    <div class="input-field col s12 m6">
                        <input type="text" name="fName" id="fName" class="validate" placeholder="Doe" min="2" max="50"
                            maxlength="50" pattern="[a-zA-Zéèêëiîïôöüäç']{1,22}[ |-]?[a-zA-Zéèêëiîïôöüäç']{1,22}"
                            value="<?= (isset($testlName) && !empty($testfName))? $testlName[1] : '' ?>" required>
                        <label for="fName">Prénom</label>
                        <span class="helper-text"
                            data-error="Non conforme. Maximum un espace ou un '-', des lettres non accentuées à l'exception de : éèêëiîïôöüäç'"
                            data-success="ok">Maximum un espace ou un '-', des lettres non accentuées à l'exception de :
                            éèêëiîïôöüäç'</span>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">event</i>
                        <input type="text" class="datepicker validate" id="dOfB" name="dOfB" placeholder="19-06-2020"
                            pattern="(0?[1-9]|[12][0-9]|3[01])[/|-](0?[1-9]|1[012])[/|-]\d{4}"
                            value="<?= (isset($testDateOfBirth) && !empty($testDateOfBirth))? $testDateOfBirth[1] : '' ?>"
                            required>
                        <label for="dOfB">Date de naissance</label>
                        <span class="helper-text" data-error="Non conforme. Exemples: 05-12-1993 ou 05/12/1993"
                            data-success="ok">Exemples: 05-12-1993 ou 05/12/1993</span>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">emoji_flags</i>
                        <input type="text" name="country" id="country" class="validate" placeholder="France" min="2"
                            max="50" maxlength="50" pattern="[a-zA-Zéèêëiîïôöüäç' -]{2,50}"
                            value="<?= (isset($testCountry) && !empty($testCountry))? $testCountry[1] : '' ?>" required>
                        <label for="country">Pays de naissance</label>
                        <span class="helper-text"
                            data-error="Non conforme. Caractères autorisés : [a-zA-Zéèêëiîïôöüäç' -]"
                            data-success="ok">Caractères autorisés : [a-zA-Zéèêëiîïôöüäç' -]</span>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">person_pin_circle</i>
                        <input type="text" name="nationality" id="nationality" class="validate" placeholder="Française"
                            min="2" max="50" maxlength="50" pattern="[a-zA-Zéèêëiîïôöüäç' -]{2,50}"
                            value="<?= (isset($testNationality) && !empty($testNationality))? $testNationality[1] : '' ?>"
                            required>
                        <label for="nationality">Nationalité</label>
                        <span class="helper-text"
                            data-error="Non conforme. Caractères autorisés : [a-zA-Zéèêëiîïôöüäç' -]"
                            data-success="ok">Caractères autorisés : [a-zA-Zéèêëiîïôöüäç' -]</span>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">alternate_email</i>
                        <input type="email" name="email" id="email" class="validate" placeholder="johnDoe@mail.com"
                            min="4" max="50" pattern="([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})"
                            value="<?= (isset($testMail) && !empty($testMail))? $testMail[1] : '' ?>" required>
                        <label for="email">E-mail</label>
                        <span class="helper-text" data-error="Non conforme" data-success="ok">Ex :
                            johnDoe@mail.com</span>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">local_phone</i>
                        <input type="tel" name="tel" id="tel" class="validate" placeholder="0608000000" maxlength="10"
                            pattern="[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}"
                            value="<?= (isset($testTel) && !empty($testTel))? $testTel[1] : '' ?>" required>
                        <label for="nationality">Tel.</label>
                        <span class="helper-text"
                            data-error="Non conforme. Votre numéro doit comporter 10 chiffres. Ex: 0608000000"
                            data-success="ok">Votre numéro doit comporter 10 chiffres. Ex: 0608000000"</span>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">school</i>
                        <select name="degree" id="degree" name='degree' required>
                            <option value="NULL" disabled
                                <?= (empty($_POST['degree']) || empty($testDegree))? 'selected' : '' ?>>Choisissez
                            </option>
                            <option value="Sans" <?= testSelectedArr($testDegree, 'Sans') ?>>Sans</option>
                            <option value="Bac" <?= testSelectedArr($testDegree, 'Bac') ?>>Bac</option>
                            <option value="Bac+2" <?= testSelectedArr($testDegree, 'Bac+2') ?>>Bac+2</option>
                            <option value="Bac+3" <?= testSelectedArr($testDegree, 'Bac+3') ?>>Bac+3</option>
                            <option value="Bac+4 et plus" <?= testSelectedArr($testDegree, 'Bac+4 et plus') ?>>Bac+4 et
                                plus</option>
                        </select>
                        <label for="degree">Diplôme</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">perm_identity</i>
                        <input type="text" name="idPoleEmploi" id="idPoleEmploi" maxlength="8" class="validate"
                            placeholder="0342340N" pattern="[0-9]{7}[A-Z]{1}"
                            value="<?= (isset($testIdPolEmp) && !empty($testIdPolEmp))? $testIdPolEmp[1] : '' ?>"
                            required>
                        <label for="email">Numéro Pôle Emploi</label>
                        <span class="helper-text"
                            data-error="Non conforme. Votre identifiant doit comporter 7 chiffres suivi d'une Lettre majuscule"
                            data-success="ok">Votre identifiant doit comporter 7 chiffres suivi d'une Lettre
                            majuscule</span>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">military_tech</i>
                        <input type="number" name="numBadge" id="numBadge" maxlength="2" min="0" max="99"
                            class="validate" placeholder="0" pattern="[0-9]{1,2}" step="1"
                            value="<?= (isset($testNbBadge) && !empty($testNbBadge))? $testNbBadge[1] : '' ?>" required>
                        <label for="numBadge">Nombre de badge</label>
                        <span class="helper-text" data-error="Non conforme. Entrez un nombre de 0 à 99"
                            data-success="ok">Entrez un nombre de 0 à 99</span>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">links</i>
                        <input type="url" class="validate" name="urlCodedademy" id="urlCodedademy"
                            placeholder="https://codecademy.com/yourSpace" pattern="https://codecademy.com/.*"
                            maxlength="150"
                            value="<?= (isset($testUrlCodecademy) && !empty($testUrlCodecademy))? $testUrlCodecademy[1] : '' ?>"
                            required>
                        <label for="urlCodedademy">Liens codecademy</label>
                        <span class="helper-text"
                            data-error="Non conforme. L'adresse doit être de la forme : 'https://codecademy.com/yourSpace'"
                            data-success="ok">L'adresse doit être de la forme :
                            'https://codecademy.com/yourSpace'</span>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">history_edu</i>
                        <textarea id="wwHero" name="wwHero" class="materialize-textarea validate" maxlenght="250"
                            minlength="50" pattern="(.|\r|\n|\u2028|\u2029){5,250}" placeholder="Votre réponse ici..."
                            rows="10" required></textarea>
                        <label for="wwHero">Si vous étiez un super héros/une super héroïne, qui seriez-vous et pourquoi
                            ?</label>
                        <span class="helper-text"
                            data-error="Non conforme. Votre réponse doit comporter entre 50 et 250 caractères"
                            data-success="ok">Entre 50 et 250 caractères</span>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">history_edu</i>
                        <textarea id="lastHack" name="lastHack" class="materialize-textarea validate"
                            maxlenght="250" minlength="50" placeholder="Votre réponse ici..." rows="10"
                            pattern="(.|\r|\n|\u2028|\u2029){50,250}" required></textarea>
                        <label for="lastHack">Racontez-nous un de vos "hacks" (pas forcément technique ou
                            informatique)</label>
                        <span class="helper-text active"
                            data-error="Non conforme. Votre réponse doit comporter entre 50 et 250 caractères"
                            data-success="ok">Entre 50 et 250 caractères</span>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 switch">

                        <div name="firstCodeDiv" class="switch">

                            <div>
                                <i class="material-icons">code</i>
                                <label for="firstCode">Avez vous déjà eu une expérience avec la programmation et/ou
                                    l'informatique avant de remplir ce formulaire ?</label></div>

                            <label>
                                Non
                                <input id="firstCode" name="firstCode" type="checkbox"
                                    <?=(testSelectedArr($testFirstCode, 'on') === 'selected') ? 'checked' : ''?>>
                                <span class="lever"></span>
                                Oui
                            </label>
                        </div>

                    </div>
                </div>
                <input type="submit" value="Envoyer">
            </fieldset>

        </form>
        <?php } ?>
    </section>

    <!-- Vérifie que materialize.js est bien chargé et initialise les champs de formulaire -->
    <script type="text/javascript">
        //Création de la balise
        let tt = document.createElement('script');

        function importJS() {
            document.getElementById('initMat').insertBefore(tt, document.getElementById('initMat')[0]);
            tt.src = 'https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js';
        }
    </script>
    <script id="initMat" type="text/javascript">
        setTimeout(importJS, 10);
        // redirige vers page d'erreur si le script n'est pas chargé ou bloqué par le navigateur
        tt.onerror = function () {
            document.location.href = 'noScript.html';
        };
        // Initialise les champs quand materialise.js est chargé
        tt.onload = function () {
            var elems = document.querySelectorAll('.datepicker');
            var options = {
                firstDay: 1, //lundi en premier
                format: 'dd-mm-yyyy',
                maxDate: new Date(),
                yearRange: [1900, new Date().getFullYear()], //année maxi : année en cours
                selectMonths: true, //selecteur de mois
                i18n: {
                    nextMonth: '>',
                    previousMonth: '<',
                    months: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août',
                        'Septembre', 'Octobre', 'Novembre', 'Décembre'
                    ],
                    monthsShort: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun', 'Jul', 'Aoû', 'Sep', 'Oct',
                        'Nov', 'Déc'
                    ],
                    weekdays: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
                    weekdaysShort: ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'],
                    weekdaysAbbrev: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
                    clear: 'Réinitialiser',
                    cancel: 'Annuler',
                }

            };
            var instances = M.Datepicker.init(elems, options);

            // Initialise le select de materialize

            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);




            console.log(document.forms['formAddStud']); 
            <?php
            if ($testFormPosted) {
            ?>
                if (document.forms['formAddStud'] != null) {
                    fName.focus();
                    lName.focus();
                    dOfB.focus();
                    country.focus();
                    nationality.focus();
                    email.focus();
                    tel.focus();
                    degree.focus();
                    idPoleEmploi.focus();
                    numBadge.focus();
                    urlCodedademy.focus();
                    wwHero.value = "<?= ($testHero[0]) ? $testHero[1] : ''?>";
                    wwHero.focus();

                    lastHack.value = nl2br(<?= ($testLastHack[0]) ? $testLastHack[1] : ''?>);
                    lastHack.focus();


                    firstCode.focus();
                    lName.focus();
                    M.updateTextFields();
                    M.textareaAutoResize(lastHack);
                    M.textareaAutoResize(wwHero);
                }

            <?php
            } 
            ?>

        }
    </script>
</body>

</html>