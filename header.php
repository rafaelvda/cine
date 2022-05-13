
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark" aria-label="Third navbar example">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">CC</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample03">
                <ul class="navbar-nav me-auto mb-2 mb-sm-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="movie.php">Nos films</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" aria-haspopup="true" data-bs-toggle="dropdown" aria-expanded="false">Genre</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="actionMovie.php">Action</a></li>
                        <li><a class="dropdown-item" href="policyMovie.php">Policier</a></li>
                        <li><a class="dropdown-item" href="thrillerMovie.php">Thriller</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" aria-haspopup="true" data-bs-toggle="dropdown" aria-expanded="false">Distributeur</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="waltMovie.php">Walt Disney Studios</a></li>
                        <li><a class="dropdown-item" href="warnerMovie.php">Waner Bros</a></li>
                        <li><a class="dropdown-item" href="sonyMovie.php">Sony Pictures</a></li>
                        <li><a class="dropdown-item" href="universalMovie.php">Universal Pictures</a></li>
                    </ul>
                </li>
                </ul>
                <form action="movieSearch.php" method="post">
                    <input class="form-control" type="text" placeholder="Rechercher" aria-label="Search">
                </form>
                <?php
                    if (isset($_SESSION['username'])) 
                    {
                        ?>
                        <a id="btnC" class="btn btn-outline-primary" href="account.php">Mon Compte</a>
                        <a class="btn btn-outline-danger" href="logout.php">Déconnexion</a>
                        <?php
                    }
                    else
                    {
                        ?>
                        <a id="btnC" class="btn btn-outline-primary" href="register.php">S'inscrire</a>
                        <a class="btn btn-outline-success" href="login.php">Connexion</a>
                        <?php
                    }
                    ?>
            </div>
        </div>
    </nav>
