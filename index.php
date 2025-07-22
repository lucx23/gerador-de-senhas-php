<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de Senhas em PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>    
    <main>
        <h1>Gerador de Senhas em PHP</h1>
        <p>Este é um gerador de senhas simples feito em PHP.</p>
        <p>Você pode personalizar a lógica de geração de senhas conforme necessário.</p>

        <section id="form">
            <form action="index.php" method="GET">
                <label for="tamanho">Tamanho da Senha:</label>
                <input type="number" id="tamanho" name="tamanho" min="1" max="100">
                <div id="incluir-letras">
                    <label for="letras">Incluir Letras:</label>
                    <input type="checkbox" id="letras" name="letras">
                </div>

                <button type="submit" name="gerar" id="gerar">Gerar Senha</button>
            </form>
        </section>
    </main>
    <?php 
        if(isset($_GET['gerar']) && $_GET['tamanho'] < 21 && $_GET['tamanho'] > 0){
            if(!empty($_GET['tamanho']) && is_numeric($_GET['tamanho']) && $_GET['tamanho'] > 0){
                $tamanhoSenha = $_GET['tamanho'];
            } else {
                echo "<p>Por favor, insira um tamanho válido para a senha.</p>";
                exit;
            }
            $incluirLetras = isset($_GET['letras']) ? true : false;
            $btnGera = isset($_GET['gerar']) ? true : false;
            
            
            $senha = array();
            if($incluirLetras == false){
                for($i = 0; $i < $tamanhoSenha; $i++){
                    $criaSenha = rand(1, 9);
                    array_push($senha, $criaSenha);
                }
            } else{
                $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                for($i = 0; $i < $tamanhoSenha; $i++){
                    $criaSenha = $caracteres[rand(0, strlen($caracteres) - 1)];
                    array_push($senha, $criaSenha);
                }
            }
            echo "<div id='senha-gerada'>";
                echo "<h2>Senha Gerada:</h2>";
                echo "<p>" . implode("", $senha) . "</p>";
            echo "</div>";
        }
        else {
            echo "<div id='senha-gerada'>";
            echo "<h2 style=\"color: red;\">Erro:</h2>";
            echo "<p>O número máximo de caracteres para a senha é <strong>20</strong>.</p>";
            echo "</div>";
        }
    ?>
</body>
</html>