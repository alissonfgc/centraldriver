<?php include("./Includes/ProtectAdm.php"); ?>
<nav class="navbar bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="homeADM.php">
            <img src="img/logo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
            Central Driver
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="homeADM.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Acessos
                        </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="homeADM.php">Aprovar acessos</a></li>
                    </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Conta
                        </a>
                    <ul class="dropdown-menu">
                        <li><p class="dropdown-item">Usuário: <?php echo $_SESSION['adm_email']; ?></p></li>
                        <li><a class="dropdown-item" href="./Login/LogoutAdm.php">Sair</a></li>
                    </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Outros
                        </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="https://wa.me/5561981145073">Suporte</a></li>
                    </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>