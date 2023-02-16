<!DOCTYPE html>
<html>

<head>
    <title>Aulas - Listagem</title>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script>
        $(document).ready(function() {
            // ************* PEDIR TODOS XML ***************
            $('#bttodos').click(function() {
                $.ajax({
                    type: "GET",
                    url: "http://marcelotribuna.atwebpages.com/5425/projetofinal/servidorsurf.php?comando=veraulasxml",
                    dataType: "xml",
                    success: function(xml) {
                        $(xml).find('aula').each(function() {
                            var id = $(this).find('id').text();
                            var data = $(this).find('data').text();
                            var hora = $(this).find('hora').text();
                            var tipo = $(this).find('tipo').text();
                            var instrutor = $(this).find('instrutor').text();
                            var numAlunos = $(this).find('numAlunos').text();
                            $("#listagemtodos").append("<b class='text-secondary'>Id: </b>" + id + "<br>");
                            $("#listagemtodos").append("<b class='text-secondary'>Data: </b>" + data + "<br>");
                            $("#listagemtodos").append("<b class='text-secondary'>Hora: </b>" + hora + "<br>");
                            $("#listagemtodos").append("<b class='text-secondary'>Tipo de Aula: </b>" + tipo + "<br>");
                            $("#listagemtodos").append("<b class='text-secondary'>Instrutor Responsável: </b>" + instrutor + "<br>");
                            $("#listagemtodos").append("<b class='text-secondary'>Número de Alunos: </b>" + numAlunos + "<br><hr>");
                        });
                    },
                    error: function() {
                        alert("Não foi possível receber os dados do Servidor !");
                    }
                });
            });
            // ************* PEDIR UMA AULA  ***************
            $('#btsingle').click(function() {
                var escolha = $("#idaula").val();
                $.ajax({
                    type: "GET",
                    url: "http://marcelotribuna.atwebpages.com/5425/projetofinal/servidorsurf.php?comando=veraulaxml&id=" + escolha,
                    dataType: "xml",
                    success: function(xml) {
                        $(xml).find('aula').each(function() {
                            var id = $(this).find('id').text();
                            var data = $(this).find('data').text();
                            var hora = $(this).find('hora').text();
                            var tipo = $(this).find('tipo').text();
                            var instrutor = $(this).find('instrutor').text();
                            var numAlunos = $(this).find('numAlunos').text();
                            $("#listagemsingle").html(""); //limpa o conteudo da div com id listagemsingle
                            $("#listagemsingle").append("<b class='text-secondary'>Id: </b>" + id + "<br>");
                            $("#listagemsingle").append("<b class='text-secondary'>Data: </b>" + data + "<br>");
                            $("#listagemsingle").append("<b class='text-secondary'>Hora: </b>" + hora + "<br>");
                            $("#listagemsingle").append("<b class='text-secondary'>Tipo de Aula: </b>" + tipo + "<br>");
                            $("#listagemsingle").append("<b class='text-secondary'>Instrutor Responsável: </b>" + instrutor + "<br>");
                            $("#listagemsingle").append("<b class='text-secondary'>Número de Alunos: </b>" + numAlunos + "<br><hr>");
                        });
                    },
                    error: function() {
                        alert("Não foi possível receber os dados do Servidor !");
                    }
                });
            });
            // ************* INSERIR UMA AULA ***************
            $('#btnew').click(function() {
                var data = $("#data").val();
                var hora = $("#hora").val();
                var tipo = $("#tipo").val();
                var instrutor = $("#instrutor").val();
                var numAlunos = $("#numalunos").val();
                $.ajax({
                    type: "GET",
                    url: "http://marcelotribuna.atwebpages.com/5425/projetofinal/servidorsurf.php?comando=novaaula&data=" + data + "&hora=" + hora + "&tipo=" + tipo + "&instrutor=" + instrutor + "&numalunos=" + numAlunos,
                    dataType: "html",
                    success: function(resposta) {
                        $("#mensagem").html(resposta);
                    },
                    error: function() {
                        alert("Não foi possível receber os dados do Servidor !");
                    }
                });
            });
            // ************* ELIMINAR UMA AULA  ***************
            $('#btdrop').click(function() {
                var id = $("#aula").val();
                $.ajax({
                    type: "GET",
                    url: "http://marcelotribuna.atwebpages.com/5425/projetofinal/servidorsurf.php?comando=apagaaula&id=" + id,
                    dataType: "html",
                    success: function(resposta) {
                        $("#drop").html(resposta);
                    },
                    error: function() {
                        alert("Não foi possível receber os dados do Servidor !");
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // ************* PEDIR UMA AULA XML ***************
            $('#btget').click(function() {
                var escolha = $("#aulaupdate").val();
                $.ajax({
                    type: "GET",
                    url: "http://marcelotribuna.atwebpages.com/5425/projetofinal/servidorsurf.php?comando=veraulaxml&id=" + escolha,
                    dataType: "xml",
                    success: function(xml) {
                        var data = $(xml).find('data').text();
                        var hora = $(xml).find('hora').text();
                        var tipo = $(xml).find('tipo').text();
                        var instrutor = $(xml).find('instrutor').text();
                        var numAlunos = $(xml).find('numAlunos').text();
                        $("#data").val(data);
                        $("#hora").val(hora);
                        $("#tipo").val(tipo);
                        $("#instrutor").val(instrutor);
                        $("#numalunos").val(numAlunos);
                    },
                    error: function() {
                        alert("Não foi possível receber os dados do Servidor !");
                    }
                });
            });
            // ************* ALTERA UMA AULA ***************
            $('#btupdate').click(function() {
                var data = $("#data").val();
                var hora = $("#hora").val();
                var tipo = $("#tipo").val();
                var instrutor = $("#instrutor").val();
                var numAlunos = $("#numalunos").val();
                var id = $("#aulaupdate").val();
                $.ajax({
                    type: "GET",
                    url: "http://marcelotribuna.atwebpages.com/5425/projetofinal/servidorsurf.php?comando=editaaula&data=" + data + "&hora=" + hora + "&tipo=" + tipo + "&instrutor=" + instrutor + "&numalunos=" + numAlunos + "&id=" + id,
                    dataType: "html",
                    success: function(resposta) {
                        $("#mensagem").html(resposta);
                    },
                    error: function() {
                        alert("Não foi possível receber os dados do Servidor !");
                    }
                });
            });
            //limpa conteudo de listatodos
            $('#btlimpa').click(function() {
                $("#listagemtodos").html("");
            });
        });
    </script>
</head>
<body>
    <!-- HTML-->
    <div class="text-center">
        <h1 class="text-secondary">Gestão de Aulas - ISURF</h1>
        <div class="mb-2 mt-5"><img src="imagens/isurf2.jpg" alt="Snow" id="imgmet"></div>
        <a href="index.php">
            <button<button type="button" class="btn btn-secondary mt-3">HOME</button>
        </a>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <h3>Listagem de Todas as Aulas</h3>
                    <button id="bttodos" class="btn btn-secondary mt-3">LISTAR TODAS AS AULAS</button>
                    <button id="btlimpa" class="btn btn-secondary mt-3">LIMPAR</button>
                    <div id="listagemtodos"></div>
                </div>
                <div class="col-4">
                    <h3>Dados de uma Aula Individual</h3>
                    <input type="text" id="idaula" placeholder="Insira o ID">
                    <button id="btsingle" class="btn btn-secondary ml-2 mt-3">OBTER DADOS DA AULA</button>
                    <div id="listagemsingle" class="mt-3"></div>
                    <h3>Eliminar aula</h3>
                    <input type="text" id="aula" placeholder="Insira o ID">
                    <button id="btdrop" class="btn btn-secondary ml-2 mt-3">ELIMINAR AULA</button>
                    <div id="drop"></div>
                    <hr>
                </div>
                <div class="col-4">
                    <h3>Nova Aula</h3>
                    Data<br><input type="text" id="data" name="data"><br>
                    Hora<br><input type="text" id="hora" name="hora"><br>
                    Tipo de Aula<br><input type="text" id="tipo" name="tipo"><br>
                    Instrutor Responsável<br><input type="text" id="instrutor" name="instrutor"><br>
                    Número de Alunos<br><input type="text" id="numalunos" name="numalunos"><br>
                    <button id="btnew" class="btn btn-secondary mt-3">CRIAR NOVA AULA</button>
                    <h3>Atualizar aula</h3>
                    <input type="text" id="aulaupdate" placeholder="Insira o ID">
                    <button id="btget" class="btn btn-secondary ml-2 mt-3">OBTER DADOS DA AULA</button>
                    <button id="btupdate" class="btn btn-secondary ml-2 mt-3">ATUALIZAR AULA</button>
                    <div id="mensagem"></div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</body>
</html>