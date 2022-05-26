<?php
$category_id = $_GET['category_id'];

include_once 'MySQLiConnection.php';

$conn = new MySQLiConnection();

$consulta = "SELECT * FROM category WHERE category_id = '$category_id'";

$result = $conn->query($consulta);

$row = $result->fetch_array();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Categoria</title>
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

  <form class="edita_category was-validated" name="edita_category" id="edita_category" action="edita_category.php" method="POST" autocomplete="on">
    <div class="container-fluid p-3">
      <span>
        <h3>EDITAR CATEGORIA</h3>
      </span>
      <input type="hidden" name="category_id" value="<?php echo $row['category_id']; ?>">
      <div class="flex-row p-2">
        <label for="name">Nome: </label>
        <input type="text" class="form-control" id="name" name="name" value=<?php echo $row['name']; ?> maxlength="45" required pattern="[a-zA-Z0-9][a-zA-Z0-9 ]*">
      </div>
      <div class="flex-row p-2">
        <button type="submit" class="btn btn-primary">Sign in</button>
      </div>
    </div>
  </form>

  <script src="js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
</body>

</html>