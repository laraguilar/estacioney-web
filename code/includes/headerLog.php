<?php
require_once 'php_actions/sessaoLog.php';
?>
<div class="navbar">
    <nav>
        <div class="nav-wrapper indigo darken-4">
            <a href="home.php" class="brand-logo" style="margin-left:2%; margin-top: 1%;"><img src="imagem/logo_estacioney50px.png" alt="" width="35" height="35"></a>
            <a href="#" data-target="mobile-navbar" class="sidenav-trigger">
                <i class="material-icons">menu</i>
            </a>

            <ul id="dropdown1" class="dropdown-content">
                <li><a href="empresa.php">Dados da Empresa</a></li>
                <li><a href="listEstacs.php">Lista de Estacionamento</a></li>
                <li><form method="$_GET">
                    <input type="submit" value="Sair" name="sair" class="btn" method="GET">
                </form>
                </li>

            </ul>

            <ul id="navbar-items" class="right hide-on-med-and-down" style="padding-right: 1%;">
                <li><a href="home.php">Home</a></li>
                <li><a href="historico.php">Histórico</a></li>
                <li><a href="estacionamento.php">Estacionamento</a></li>
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown1" style="margin-left:2%; margin-top: 0%; padding-right: 5%"><b> <?php echo $dados['nomEmpresa']; ?> </b><img src="imagem/imagem_perf.png" alt="" width="35" height="35"><i class="material-icons right"></i></a></li>
            </ul>
            </ul>
        </div>
    </nav>
</div>

<!-- Menu Mobile -->
<ul id="mobile-navbar" class="sidenav">
    <li><a href="home.php">Home</a></li>
    <li><a href="historico.php">Histórico</a></li>
    <li><a href="empresa.php">Empresa</a></li>
    <li><a href="estacionamento.php">Estacionamento</a></li>
</ul>