<?php
require_once 'app/DB.php';

if (!isset($_SESSION)) {
    session_start();
}

if ($user->estaLogado() != "") {
    $user->redirecionar('site/dashboard.php');
}

if (isset($_POST['login'])) {
    $anome = $_POST['nome'];
    $asenha = $_POST['senha'];

    if ($user->login($anome, $asenha)) {
        $user->redirecionar('site/dashboard.php');
    } else {
        $error = "Nome/Senha inválidos!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Login | Admin</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="res/style.css" type="text/css"/>
</head>
<body>
<div class="container">
    <div class="form-container">
        <form method="post">
            <h2>Logo entrar pagina admin</h2>
            <hr/>

            <?php
            if (isset($error)) { ?>
                <div class="alert alert-danger">
                    <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                </div>
            <?php } ?>

            <div class="form-group">
                <input type="text" class="form-control" name="nome" placeholder="Nome"
                       required/>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="senha" placeholder="Senha" required/>
            </div>
            <div class="clearfix"></div>
            <hr/>
            <div class="form-group">
                <button type="submit" name="login" class="btn btn-block btn-primary">
                    <i class="glyphicon glyphicon-log-in"></i>&nbsp;Entrar
                </button>
            </div>
            <br/>
        </form>
    </div>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
</body>
</html>