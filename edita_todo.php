<?php

$todo_id = $_POST['todo_id'];
if (isset($_POST["category_id"])) {
	$category_id = $_POST["category_id"];
}
if (isset($_POST["title"])) {
	$title = $_POST["title"];
}
if (isset($_POST["message"])) {
	$message = $_POST["message"];
}
if (isset($_POST["due_date"])) {
	$due_date = $_POST["due_date"];
}
if (isset($_POST["completed"])) {
	$completed = $_POST["completed"];
} else {
	$completed = 0;
}

if (empty(trim($category_id))) {
	echo "category_id em branco";
	return 0;
}
if (empty(trim($title))) {
	echo "title em branco";
	return 0;
}
if (empty(trim($message))) {
	echo "message em branco";
	return 0;
}

include_once 'MySQLiConnection.php';

$conn = new MySQLiConnection();

$sql = "SELECT t.* FROM todo AS t JOIN category AS c ON t.category_id = c.category_id WHERE todo_id = '$todo_id'";

$result = $conn->query($sql);

$row = $result->fetch_array();

$sql = "UPDATE todo SET category_id = '$category_id', title = '$title', message = '$message', due_date = '$due_date', completed = '$completed' WHERE todo_id = '$todo_id'";

$result = $conn->query($sql);

if ($result) {
	echo ("<script>
        window.alert('Tarefa modificada com sucesso !')
        window.location.href='index.php';
    </script>");
} else{
	echo "Erro ao alterar a Tarefa: " . $conn->error;
}
?>