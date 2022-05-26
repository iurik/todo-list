<?php
if(isset($_POST["category_id"])){
	$category_id = $_POST["category_id"];
}
if(isset($_POST["title"])){
	$title = $_POST["title"];
}
if(isset($_POST["message"])){
	$message = $_POST["message"];
}
if(isset($_POST["due_date"])){
	$due_date = $_POST["due_date"];
}
if(isset($_POST["completed"])){
	$completed = $_POST["completed"];
}else{
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

$sql = "INSERT INTO todo(category_id, title, message, due_date, completed) VALUES ('$category_id', '$title', '$message', '$due_date', '$completed')";

$result = $conn->query($sql);
if($result){
	echo ("<script>
        window.alert('Tarefa cadastrada com sucesso !')
        window.location.href='index.php';
    </script>");
}else{
	echo "Erro ao gravar a Categoria: " . $conn->error;
}
