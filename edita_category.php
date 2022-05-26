<?php
$category_id = $_POST['category_id'];
if(isset($_POST['name'])){
	$name = $_POST['name'];
}

if (empty(trim($name))) {
	echo "Nome em branco";
	return 0;
} 

include_once 'MySQLiConnection.php';

$conn = new MySQLiConnection();

$sql = "UPDATE category SET name = '$name' WHERE category_id = '$category_id'";

$result = $conn->query($sql);
if($result){
	echo ("<script>
        window.alert('Categoria modificada com sucesso !')
        window.location.href='main_category.php';
    </script>");
}else{
	echo "Erro ao gravar a Categoria: " . $conn->error;
}
?>
