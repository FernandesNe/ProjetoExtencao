<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Listagem de Animais</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <?php 
        include 'includes/menu.html';
        require 'db.php';

        $sql = "SELECT id, nome, idade, sexo, especie, foto FROM animais";
        $result = $conn->query($sql);
    ?>

    <div class="container">
        <h1>Animais Disponíveis para Adoção</h1>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='animal-card'>";
                echo "<img src='imagens/" . htmlspecialchars($row["foto"]) . "' alt='" . htmlspecialchars($row["nome"]) . "'>";
                echo "<h2>" . htmlspecialchars($row["nome"]) . "</h2>";
                echo "<p>Idade: " . htmlspecialchars($row["idade"]) . " anos</p>";
                echo "<p>Sexo: " . htmlspecialchars($row["sexo"]) . "</p>";
                echo "<p>Espécie: " . htmlspecialchars($row["especie"]) . "</p>";
                echo "<a href='adotar.php?id=" . htmlspecialchars($row["id"]) . "' class='btn'>Adotar</a>";
                echo "</div>";
            }
        } else {
            echo "<p>Nenhum animal disponível para adoção no momento.</p>";
        }
        $conn->close();
        ?>
    </div>

</body>

</html>




