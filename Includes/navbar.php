<?php include("{$_SERVER['DOCUMENT_ROOT']}/centraldriver/Includes/Protect.php"); ?>
    <nav class="navbar bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.php">
                <img src="img/logo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                Central Driver 
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Editar dados
                        </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="cadastraDia.php">Dia</a></li>
                        <li><a class="dropdown-item" href="cadastraMetas.php">Metas</a></li>
                        <li><a class="dropdown-item" href="cadastraVeiculo.php">Veículo</a></li>
                    </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Conta
                        </a>
                    <ul class="dropdown-menu">
                        <li><p class="dropdown-item">Usuário: <?php echo $_SESSION['nome']; ?> <?php echo $_SESSION['sobrenome']; ?></p></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="editaCadastro.php">Dados de cadastro</a></li>
                        <li><a class="dropdown-item" href="./Login/Logout.php">Sair</a></li>
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
