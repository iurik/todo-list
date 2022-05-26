<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ToDo List</title>
  <link rel="stylesheet" href="CSS/main.css">
  <script src="https://kit.fontawesome.com/13eefb6f67.js" crossorigin="anonymous"></script>
</head>

<body>
  <header>
    <nav id="navbar_header" class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
          <img id="logo" src="./img/list.png" alt="logo todo list" class="d-inline-block align-text-center">
          ToDo List
        </a>
        <div class="collapse navbar-collapse">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            <li class="nav-item">
              <a class="nav-link" href="main_category.php">Category</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <div class="container-fluid">
    <div class="float-start">
      <h2 class="text-start p-3">Lista de Tarefas</h2>
    </div>
    <div class="float-end pt-3 pe-5">
      <a href="form_todo.php" class="btn btn-primary">Cadastrar ToDo</a>
    </div>
    <div id="container">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">Categoria</th>
            <th scope="col">Título</th>
            <th scope="col">Mensagem</th>
            <th scope="col">Criado em</th>
            <th scope="col">Data Final</th>
            <th scope="col">Completa</th>
          </tr>
        </thead>
        <tbody>
          <?php
            include_once 'MySQLiConnection.php';
            $conn = new MySQLiConnection();
            $consulta = 'SELECT t.*, c.name FROM todo AS t JOIN category AS c ON t.category_id = c.category_id ';
            $result = $conn->query($consulta);
      
            if($result){
              foreach ($result as $row) {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['title'] . "</td>";
                echo "<td>" . $row['message'] . "</td>";
                echo "<td>" . $row['created_at'] . "</td>";
                if($row['due_date'] == '0000-00-00 00:00:00'){
                  echo "<td>Não informada</td>";
                }else{
                  echo "<td>" . $row['due_date'] . "</td>";
                }
                if($row['completed']){
                  echo "<td>Completa</td>";
                }else{
                  echo "<td>Não completa</td>";
                }
                echo "</tr>";
              }
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <script src="js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
</body>

</html>