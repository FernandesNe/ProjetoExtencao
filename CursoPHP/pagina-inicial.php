<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .animal-card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin: 10px;
            width: 200px;
            float: left;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .animal-card img {
            width: 100%;
            border-radius: 5px;
        }
    </style>
</head>

<body>

    <?php 
        include 'includes/menu.html';
        session_start();
    ?>

    <div class="container">
        <h1>Seja bem-vindo!</h1>

        <?php 
            // Diretório onde as imagens estão armazenadas
            $diretorio_imagens = 'imagens/';

            // Verifica se o diretório existe e é acessível
            if (is_dir($diretorio_imagens)) {
                // Abre o diretório
                if ($handle = opendir($diretorio_imagens)) {
                    // Percorre cada arquivo no diretório
                    while (false !== ($entry = readdir($handle))) {
                        // Verifica se é um arquivo e se é uma imagem
                        if ($entry != "." && $entry != ".." && (strpos($entry, '.jpg') !== false || strpos($entry, '.jpeg') !== false || strpos($entry, '.png') !== false || strpos($entry, '.gif') !== false)) {
                            // Exibe o card de foto com o caminho do arquivo de imagem
                            echo '<div class="animal-card">';
                            echo '<img src="' . $diretorio_imagens . $entry . '" alt="' . $entry . '">';
                            echo '</div>';
                        }
                    }
                    // Fecha o manipulador de diretório
                    closedir($handle);
                }
            }
        ?>

    </div>

</body>

</html>






