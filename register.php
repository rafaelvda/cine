<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>

    <?php require 'header.php'?>
    <title>Ciné & Chill - Inscription</title>

        <?php
        require('db.php');
        if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['password'])){
            // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
            $username = stripslashes($_REQUEST['username']);
            $username = mysqli_real_escape_string($conn, $username); 

            // récupérer l'email et supprimer les antislashes ajoutés par le formulaire
            $email = stripslashes($_REQUEST['email']);
            $email = mysqli_real_escape_string($conn, $email);

            // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
            $password = stripslashes($_REQUEST['password']);
            $password = mysqli_real_escape_string($conn, $password);

            //requéte SQL + mot de passe crypté
                $query = "INSERT into `user` (username, email, password)
                        VALUES ('$username', '$email', '".hash('sha256', $password)."')";

            // Exécuter la requête sur la base de données
                $res = mysqli_query($conn, $query);
                if($res){
                echo "<div class='sucess'>
                        <h3>Vous êtes inscrit avec succès.</h3>
                        <p>Cliquez ici pour vous connecter</p>
                        <a class='btn btn-success' href='login.php'>Connexion</a>

                </div>";
                }
            }else{
            ?>
            <form class="box" action="" method="post">
                    <h1 class="box-title">S'inscrire</h1>
                <input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" required />
                    <input type="text" class="box-input" name="email" placeholder="Email" required />
                    <input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
                    <input type="submit" name="submit" value="S'inscrire" class="box-button" />
                    <p class="box-register">Déjà inscrit? <a href="login.php">Connectez-vous ici</a></p>
            </form>
        <?php } ?>
    </body>
</html>