# Sistema de Exclusão de Disciplinas (PHP + TXT)

Um sistema simples e direto para excluir registros de disciplinas salvos em um arquivo de texto, utilizando PHP e um layout limpo com CSS.

## 🚀 Funcionalidades
* Exclusão de registros baseada em ID sem uso de banco de dados SQL.
* Leitura e reescrita de arquivos de texto (`.txt`).
* Interface estilizada moderna com mensagens de alerta (Sucesso/Erro).
* Visualização em tempo real do conteúdo do arquivo na própria tela.

## 🛠️ Tecnologias Utilizadas
* **PHP:** Processamento de formulários e manipulação do arquivo TXT (`file`, `explode`, `file_put_contents`).
* **HTML5 & CSS3:** Estruturação e estilização visual (design de cartão centralizado).

## ⚙️ Como Executar

1. Crie uma pasta no seu ambiente de servidor local (ex: XAMPP na pasta `htdocs`) ou em uma pasta comum caso use o terminal.
2. Certifique-se de que os arquivos `excluir_txt.php`, `estilo.css` e `disciplinas.txt` estão juntos na mesma pasta.
3. Inicie o seu servidor local. Se estiver usando o terminal, rode o comando para iniciar o PHP na porta 8000.
4. Abra o seu navegador de internet padrão.
5. Digite o endereço correspondente ao servidor (por exemplo, http://localhost/sua-pasta/excluir_txt.php ou a porta específica configurada) para acessar e testar a aplicação.
