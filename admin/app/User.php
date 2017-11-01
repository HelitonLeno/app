<?php

class User
{
    private $conn;

    //construtor user
    function __construct($conn)
    {
        $this->conn = $conn;
    }

    //metodo para autenticar login na pagina de admin
    public function login($anome, $asenha)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM admin WHERE nome = :anome LIMIT 1");
            $stmt->bindparam(':anome', $anome);
            //$stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
            $stmt->execute();
            $adminLinha = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($stmt->rowCount() > 0) {
                if ($adminLinha['senha'] == $asenha) {
                    $_SESSION['admin'] = $adminLinha['id'];
                    return true;

                } else {
                    return false;
                }
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    //Verifica se ja esta com a sessao aberta
    public function estaLogado()
    {
        if (isset($_SESSION['admin'])) {
            return true;
        }
    }

    //redirecionar para outra pagina
    public function redirecionar($url)
    {
        header("Location: $url");
    }

    //deslogar admin da pagina
    public function logout()
    {
        session_destroy();
        unset($_SESSION['admin']);
        return true;
    }
}