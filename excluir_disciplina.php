<?php
$arquivo = 'disciplinas.txt';
$mensagem = ''; 
$tipo_msg = ''; 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_disciplina'])) {
    $id_para_excluir = trim($_POST['id_disciplina']);
    
    if (file_exists($arquivo)) {
        $linhas = file($arquivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $novas_linhas = [];
        $disciplina_excluida = false;

        foreach ($linhas as $linha) {
            $dados = explode(';', $linha);
            $id_atual = $dados[0];

            if ($id_atual !== $id_para_excluir) {
                $novas_linhas[] = $linha;
            } else {
                $disciplina_excluida = true;
            }
        }

        if ($disciplina_excluida) {
            $novo_conteudo = implode(PHP_EOL, $novas_linhas);
            if (!empty($novo_conteudo)) {
                $novo_conteudo .= PHP_EOL;
            }
            file_put_contents($arquivo, $novo_conteudo);
            
            $mensagem = "Disciplina excluída com sucesso!";
            $tipo_msg = "sucesso";
        } else {
            $mensagem = "ID não encontrado.";
            $tipo_msg = "aviso";
        }
    } else {
        $mensagem = "Arquivo não existe.";
        $tipo_msg = "erro";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Disciplina</title>
    <!-- Chamando o CSS -->
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

    <div class="container">
        <h2>Excluir Disciplina</h2>
        <p class="subtitle">Insira as informações da disciplina</p>
        
        <?php if (!empty($mensagem)): ?>
            <div class="msg <?= $tipo_msg; ?>">
                <?= $mensagem; ?>
            </div>
        <?php endif; ?>
        
        <form action="" method="POST">
            <label for="id_disciplina">ID da Disciplina:</label>
            <input type="text" name="id_disciplina" id="id_disciplina" required>
            
            <!-- Botão com o mesmo estilo visual da imagem -->
            <button type="submit">Excluir Dados</button>
        </form>
        
        <div class="txt-viewer">
            <label>Disciplinas no TXT:</label>
            <pre><?php 
                if (file_exists($arquivo)) {
                    $conteudo = file_get_contents($arquivo);
                    echo trim($conteudo) === '' ? 'Nenhuma disciplina cadastrada.' : htmlspecialchars($conteudo); 
                } else {
                    echo 'Arquivo não encontrado.';
                }
            ?></pre>
        </div>
    </div>

</body>
</html>