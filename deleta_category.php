<?php
$category_id = $_GET['category_id'];

include_once 'MySQLiConnection.php';

$conn = new MySQLiConnection();

$sql = "DELETE FROM category WHERE category_id = '$category_id'";

$result = $conn->query($sql);

if($result){
	echo ("<script>
        window.alert('Categoria excluida com sucesso !')
        window.location.href='main_category.php';
    </script>");
}
else
	echo "Erro ao excluir categoria: " . $conn->error;

?>