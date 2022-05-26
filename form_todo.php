<?php
    include_once 'MySQLiConnection.php';

    $conn = new MySQLiConnection();

    $consulta = "SELECT * FROM category";

    $result = $conn->query($consulta);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastrar ToDo</title>
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

  <form class="todo was-validated" name="todo" id="todo" action="cria_todo.php" method="POST" autocomplete="on">
    <div class="container-fluid p-3">
      <span>
        <h3>CADASTRAR TODO</h3>
      </span>
      <div class="flex-row p-2">
        <label for="title">Título do Todo</label>
        <input type="text" class="form-control" id="title" name="title" maxlength="45" required pattern="[a-zA-Z0-9][a-zA-Z0-9 ]*">
      </div>
      <div class="flex-row p-2">
        <label for="message">Mensagem</label>
        <input type="text" class="form-control" id="message" name="message" maxlength="100" required pattern="[a-zA-Z0-9][a-zA-Z0-9 ]*">
      </div>
      <div class="flex-row p-2">
        <label for="due_date">Data Final (prazo para realizar a tarefa)</label>
        <input type="datetime-local" class="form-control" id="due_date" name="due_date">
      </div>
      <div class="flex-row p-2">
        <label for="category_id">Categoria</label>
        <select class="form-select" id="category_id" name="category_id" required>
          <?php 
            foreach ($result as $row){
              echo "<option value='".$row['category_id']."'>".$row['name']."</option>";
            }       
          ?>  
        </select>
      </div>
      <div class="flex-row p-2">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="completed" name="completed" value="1">
          <label class="form-check-label" for="completed">Completa?</label>
        </div>
      </div>
      <div class="flex-row p-2">
        <button type="submit" class="btn btn-primary">Sign in</button>
      </div>
      </div>
  </form>
  

  <script src="js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
</body>

</html>