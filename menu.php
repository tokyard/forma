<?php
  session_start();
?>
    
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 
<script src="bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active"><?php print_r($_SESSION['login']);?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link active">||</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../consultas/index.php">Logout</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="index.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Consutas</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="quad.php">Quadrado</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="tab.php">Tabuleiro</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="usuario.php">Usuário</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="tri.php">Triângulo</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="ret.php">Retângulo</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="circ.php">Círculo</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="cubo.php">Cubo</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Cadastros</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="../cadastros/cadquad.php">Cadastro de Quadrados</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="../cadastros/cadtab.php">Cadastro de Tabuleiros</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="../cadastros/caduser.php">Cadastro de Usuário</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="../cadastros/cadtri.php">Cadastro de Triangulo</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="../cadastros/cadret.php">Cadastro de Retangulos</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="../cadastros/cadcir.php">Cadastro de Circulos</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="../cadastros/cadcubo.php">Cadastro de Cubos</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>