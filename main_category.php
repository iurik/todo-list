<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Category</title>
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
        <h3 class="text-start p-3">Categorias Cadastradas</h3>
      </div>  
      <div class="float-end pt-3 pe-5"> 
        <a href="form_category.php" class="btn btn-primary">Adicionar Categoria</a>
      </div>
    <table class="table table-hover" >
      <thead>
        <tr>
          <th style="width: 80%;">Nome</th>
          <th class="text-center" style="width: 10%;">Editar </th>
          <th class="text-center" style="width: 10%;">Excluir</th>
        </tr>
      </thead>
      <tbody>
        <?php
          include_once 'MySQLiConnection.php';

          $conn = new MySQLiConnection();

          $consulta = 'SELECT * FROM category ORDER BY name';

          $result = $conn->query($consulta);

          if($result){
            foreach ($result as $row) { 
              echo "<tr>";                          
              echo "<td>" . $row['name'] . "</td>";
              echo "<td class='text-center'> <a href='edita_category_form.php?category_id=".$row['category_id']."'> <i class='far fa-edit'></i> </a></td>";
              echo "<td class='text-center'> <a href='deleta_category.php?category_id=".$row['category_id']."'> <i class='far fa-trash-alt'></i> </a></td>";
              echo "</tr>";   
            }
          }
        ?>
      </tbody>
    </table>
  </div>

  <script src="js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
</body>

</html>