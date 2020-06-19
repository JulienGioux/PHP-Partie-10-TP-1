<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Partie 10 - TP-1</title>
</head>

<body>

    <section>
        <form action="" method="post">
            <fieldset>
                <legend>Ajouter un apprenant :</legend>
                <div class="row">
                
                    <div class="input-field col s6">
                        <i class="material-icons prefix">account_circle</i>
                        <input type="text" name="lName" id="lName" class="validate" placeholder="John" min="2" max="50" pattern="[a-zA-Zéèêëiîïôöüäç]{1,22}[-]?[a-zA-Zéèêëiîïôöüäç]{1,22}" autofocus required>
                        <label for="lName">Nom</label>
                        <span class="helper-text" data-error="wrong" data-success="right">Helper text</span>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" name="fName" id="fName" class="validate" placeholder="Doe" min="2" max="50" pattern="[a-zA-Zéèêëiîïôöüäç]{1,22}[-]?[a-zA-Zéèêëiîïôöüäç]{1,22}" required>
                        <label for="fName">Prénom</label>
                        <span class="helper-text" data-error="wrong" data-success="right">Helper text</span>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input type="text" class="datepicker" id="dOfB" name="dOfB" class="validate" placeholder="1989-12-23" pattern="([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))" required>
                        <label for="dOfB">Date de naissance</label>
                        <span class="helper-text" data-error="wrong" data-success="right">Helper text</span>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">account_circle</i>
                        <input type="text" name="country" id="country" class="validate" placeholder="France" min="2" max="50" pattern="[a-zA-Zéèêëiîïôöüäç]{1,22}[-]?[a-zA-Zéèêëiîïôöüäç]{1,22}" autofocus required>
                        <label for="country">Pays de naissance</label>
                        <span class="helper-text" data-error="wrong" data-success="right">Helper text</span>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">account_circle</i>
                        <input type="text" name="nationality" id="nationality" class="validate" placeholder="Française" min="2" max="50" pattern="[a-zA-Zéèêëiîïôöüäç]{1,22}[-]?[a-zA-Zéèêëiîïôöüäç]{1,22}" autofocus required>
                        <label for="nationality">Nationalité</label>
                        <span class="helper-text" data-error="wrong" data-success="right">Helper text</span>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input type="email" name="email" id="email" class="validate" placeholder="johnDoe@mail.com" min="2" max="50" pattern="[a-zA-Zéèêëiîïôöüäç]{1,22}[-]?[a-zA-Zéèêëiîïôöüäç]{1,22}" autofocus required>
                        <label for="email">E-mail</label>
                        <span class="helper-text" data-error="wrong" data-success="right">Helper text</span>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">account_circle</i>
                        <input type="text" name="nationality" id="nationality" class="validate" placeholder="Française" min="2" max="50" pattern="[a-zA-Zéèêëiîïôöüäç]{1,22}[-]?[a-zA-Zéèêëiîïôöüäç]{1,22}" autofocus required>
                        <label for="nationality">Nationalité</label>
                        <span class="helper-text" data-error="wrong" data-success="right">Helper text</span>
                    </div>
                </div>

            </fieldset>

        </form>
    </section>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.datepicker');
            var options = {format:'yyyy-mm-dd'};
            var instances = M.Datepicker.init(elems, options);
        });
    </script>

</body>

</html>