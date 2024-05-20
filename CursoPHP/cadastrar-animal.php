<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Cadastrar Animal</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <?php 
        include 'includes/menu.html';
        require 'db.php';

        $cadastrado = false;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome = $_POST['nome'];
            $idade = $_POST['idade'];
            $sexo = $_POST['sexo'];
            $especie = $_POST['especie'];
            $foto = $_FILES['foto']['name'];
            $target_dir = "imagens/";
            $target_file = $target_dir . basename($_FILES["foto"]["name"]);

            // Salva a imagem no servidor
            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
                $sql = "INSERT INTO animais (nome, idade, sexo, especie, foto) VALUES (?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sisss", $nome, $idade, $sexo, $especie, $foto);

                if ($stmt->execute()) {
                    $cadastrado = true;
                }
                $stmt->close();
            }
        }

        $conn->close();
    ?>

    <div class="container container-cadastro">
        <h2>Cadastro de Animal</h2>
        <form action="cadastrar-animal.php" method="POST" enctype="multipart/form-data">
            <p>Nome: <input type="text" name="nome" placeholder="Digite o nome do animal" required></p>
            <p>Idade: <input type="number" name="idade" placeholder="Digite a idade do animal" required></p>
            <p>Sexo: 
                <select name="sexo" required>
                    <option value="M">Macho</option>
                    <option value="F">Fêmea</option>
                </select>
            </p>
            <p>Espécie: <input type="text" name="especie" placeholder="Digite a espécie do animal" required></p>
            <p>Foto: <input type="file" name="foto" accept="image/*" required></p>
            <input type="submit" value="Cadastrar">
        </form>

        <?php if ($cadastrado): ?>
        <script>
            alert('Animal cadastrado com sucesso!');
        </script>
        <?php endif; ?>
    </div>

</body>

</html>

        
                


        

       



