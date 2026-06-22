<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" href="/lpphpadst126/images/logo.jpeg">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Login - Clínica Estética</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="/lpphpadst126/view/css/style.css">
</head>
<body>
    <div class="had-container">
        <div class="parallax-container logueo pink lighten-5">
            <div class="row"><br>
                <div class="col m8 s10 offset-m2 offset-s1 center">
                    <h4 class="truncate bg-card-user">
                        <img src="/lpphpadst126/images/logo.jpeg" alt="Renata Faveri Beauty & Academy" class="login-logo">
                        <div class="row login">
                            <h5 class="pink-text text-darken-3">Controle de Acesso</h5>
                            <?php
                            session_start();
                            if (!empty($_SESSION['erro_login'])) {
                                echo '<p class="red-text center">' . htmlspecialchars($_SESSION['erro_login']) . '</p>';
                                unset($_SESSION['erro_login']);
                            }
                            ?>
                            <form class="col s12" method="POST" action="login.php">
                                <div class="row">
                                    <div class="input-field col m12 s12">
                                        <i class="material-icons iconis prefix pink-text">account_box</i>
                                        <input id="icon_prefix" type="text" name="usuario" class="validate" required>
                                        <label for="icon_prefix">Usuário</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col m12 s12">
                                        <i class="material-icons iconis prefix pink-text">lock</i>
                                        <input id="password" type="password" name="password" class="validate" required>
                                        <label for="password">Senha</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <button class="btn pink darken-1 waves-effect waves-light" type="submit">Acessar</button>
                                </div>
                            </form>
                        </div>
                    </h4>
                </div>
            </div>
        </div>
    </div>

    <footer class="page-footer pink lighten-3">
        <div class="footer-copyright">
            <div class="container center pink-text text-darken-3">
                Copyright © 2026 - Clínica Estética ADST1
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="/lpphpadst126/view/js/init.js"></script>
</body>
</html>
