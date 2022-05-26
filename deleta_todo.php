<?php
$todo_id = $_GET['todo_id'];

include_once 'MySQLiConnection.php';

$conn = new MySQLiConnection();

$sql = "DELETE FROM todo WHERE todo_id = '$todo_id'";

$result = $conn->query($sql);

if($result){
	echo ("<script>
        window.alert('Tarefa excluida com sucesso !')
        window.location.href='index.php';
    </script>");
}
else
	echo "Erro ao excluir tarefa: " . $conn->error;

?>
?>