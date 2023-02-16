<!DOCTYPE html>
<html>
<head>
<title>ISURF-Gestão</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
a:hover {
  text-decoration: none;
}
button {
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}
footer {
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 6vh;            
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
    <div class="col-md-6">
      <h2>ISURF<img src="imagens/isurf4.jpg" class="img-fluid ml-3 mt-2"></h2>
              <div><a href="aulas_gestao.php"><button class="btn btn-secondary mt-4 btn-lg">AULAS</button></a></div>
              <div><a href="atletas_gestao.php"><button class="btn btn-secondary mt-4 btn-lg">ATLETAS</button></a></div>
              <div><a href="instrutores_gestao.php"><button class="btn btn-secondary mt-4 btn-lg">INSTRUTORES</button></a></div>
              <div><a href="aluguer_gestao.php"><button class="btn btn-secondary mt-4 btn-lg">ALUGUER DE MATERIAL</button></a></div>
              <div><a href="rescomp_gestao.php"><button class="btn btn-secondary mt-4 btn-lg">RESULTADOS COMPETITIVOS</button></a></div>
              <div><a href="weather.php"><button class="btn btn-secondary mt-4 btn-lg">METEOROLOGIA</button></a></div>
    </div>
    <div class="col-md-6">
      <img src="imagens/surflessons.png" class="img-fluid" style="width:auto;height:650px;">
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