<?php
$username = $_POST["uname"];
$pass = $_POST["psw"];

if (isset($username) && isset($pass)) {
  $ligacao = new PDO("mysql:host=fdb31.runhosting.com;dbname=4135249_5422", "4135249_5422", ".b}7S[/y3x3Xo5B:");
  $ligacao->query("SET NAMES utf8");
  $query = $ligacao->prepare("SELECT * FROM users WHERE username='$username' AND pass='$pass';");
  $query->execute();
  if ($query->rowCount() == 1) {
    header("Location: index.php");
  } else {
    echo "<div class='alert alert-danger' role='alert'>
                  This is a danger alert—check it out!
              </div>";
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>ISURF-Gestão</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <style>
    footer {
      position: absolute;
      bottom: 0;
      width: 100%;
      height: 6vh;
    }

    a:hover {
      text-decoration: none;
    }

    input[type=text],
    input[type=password] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }

    button {
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
    }
  </style>
</head>

<body>
  <!-- HTML-->
  <div class="text-center">
    <h1 class="text-secondary">Software de Gestão - Escola de Surf</h1>
    <hr>
    <div class="container">
      <div class="row">
        <div class="col-6">
          <form action="#" method="POST">
            <div class="imgcontainer">
              <img src="imagens/isurf2.jpg" alt="Avatar" class="mb-3">
            </div>
            <label for="uname"><b>Username</b></label><br>
            <input class="mb-2" type="text" placeholder="Enter Username" name="uname" required><br>
            <label for="psw"><b>Password</b></label><br>
            <input type="password" placeholder="Enter Password" name="psw" required><br>
            <button id="btlogin" class="btn-secondary" type="submit">Login</button>
          </form>
        </div>
        <div class="col-6">
          <img src="imagens/surflessons.png" style="width:auto;height: 650px;;">
        </div>
      </div>
    </div>
  </div>
  <footer class="bg-secondary position-absolute text-center text-light">
    <div>Direitos de Autor: Marcelo Tribuna</div>
    <div>CET -TPSI 2022 / 5425</div>
  </footer>
</body>

</html>