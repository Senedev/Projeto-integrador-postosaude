<?php

# Inclui o arquivo responsável pela configuração do sistema
include_once '../../config/config.php';

# Inclui o arquivo responsável com as informações e a conexão do banco
include_once '../../database/connection.php';

# Inclui o arquivo responsável por restringir o acesso dos usuários ao sistema
include_once '../../config/valida-acesso.php';

?>

<?php

$excluir = $_POST['excluir'];

$sql = "DELETE FROM medicos WHERE idMedico = '$excluir'";

$result = mysqli_query($connection, $sql);

if (mysqli_affected_rows($connection)) {
    $_SESSION['info'] = "<div class='alert alert-success text-center' role='alert'>Médico deletado com sucesso!</div>";
} else {
    $_SESSION['info'] = "<div class='alert alert-danger text-center' role='alert'>ID inexistente ou digitado de forma incorreta!</div>";
}

mysqli_close($connection);

header("Location: deletar-medico.php");

?>