<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['login'])) {
    header("Location: /lpphpadst126/view/index.php");
    exit;
}
?>
<link rel="stylesheet" href="/lpphpadst126/view/css/style.css">

<a href="#" data-target="slide-out" class="sidenav-trigger btn pink darken-1 menu-fab waves-effect waves-light" title="Abrir menu">Menu</a>

<ul id="slide-out" class="sidenav pink lighten-4">
    <li>
        <div class="user-view pink lighten-3">
            <span class="pink-text text-darken-3 name"><?php echo $_SESSION['nome'] ?? ''; ?></span>
            <span class="pink-text text-darken-2 email"><?php echo ucfirst($_SESSION['nivel'] ?? ''); ?></span>
        </div>
    </li>
    <li><a href="/lpphpadst126/view/home.php">Home</a></li>
    <li><a href="/lpphpadst126/view/cliente/lstcliente.php">Clientes</a></li>
    <li><a href="/lpphpadst126/view/produto/lstproduto.php">Produtos</a></li>
    <li><a href="/lpphpadst126/view/servico/lstservico.php">Serviços</a></li>
    <li><a href="/lpphpadst126/view/relatorio/relatorio.php">Relatórios</a></li>
    <?php if (isset($_SESSION['nivel']) && $_SESSION['nivel'] == 'admin') { ?>
    <li><a href="/lpphpadst126/view/usuario/lstusuario.php">Usuários</a></li>
    <?php } ?>
    <li><div class="divider"></div></li>
    <li><a href="/lpphpadst126/view/logout.php">Sair</a></li>
</ul>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="/lpphpadst126/view/js/init.js"></script>
