<!DOCTYPE html>
<html>

<head>
    <title>Atletas - Listagem</title>
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
                    url: "http://marcelotribuna.atwebpages.com/5425/projetofinal/servidorsurf.php?comando=veratletasxml",
                    dataType: "xml",
                    success: function(xml) {
                        $(xml).find('atleta').each(function() {
                            var id = $(this).find('id').text();
                            var nome = $(this).find('nome').text();
                            var age = $(this).find('dataNascimento').text();
                            var gen = $(this).find('genero').text();
                            $("#listagemtodos").append("<b class='text-secondary'>Id: </b>" + id + "<br>");
                            $("#listagemtodos").append("<b class='text-secondary'>Nome: </b>" + nome + "<br>");
                            $("#listagemtodos").append("<b class='text-secondary'>Data de Nascimento: </b>" + age + "<br>");
                            $("#listagemtodos").append("<b class='text-secondary'>Género: </b>" + gen + "<br><hr>");
                        });
                    },
                    error: function() {
                        alert("Não foi possível receber os dados do Servidor !");
                    }
                });
            });
            // ************* PEDIR UM ATLETA  ***************
            $('#btsingle').click(function() {
                var escolha = $("#idatleta").val();
                $.ajax({
                    type: "GET",
                    url: "http://marcelotribuna.atwebpages.com/5425/projetofinal/servidorsurf.php?comando=veratletaxml&id=" + escolha,
                    dataType: "xml",
                    success: function(xml) {
                        $(xml).find('atleta').each(function() {
                            var id = $(this).find('id').text();
                            var nome = $(this).find('nome').text();
                            var age = $(this).find('dataNascimento').text();
                            var gen = $(this).find('genero').text();
                            $("#listagemsingle").html(""); //limpa o conteudo da div listagemsingle para evitar acumulacao de resultados
                            $("#listagemsingle").append("<b class='text-secondary'>Id: </b>" + id + "<br>");
                            $("#listagemsingle").append("<b class='text-secondary'>Nome: </b>" + nome + "<br>");
                            $("#listagemsingle").append("<b class='text-secondary'>Data de Nascimento: </b>" + age + "<br>");
                            $("#listagemsingle").append("<b class='text-secondary'>Género: </b>" + gen + "<br><hr>");
                        });
                    },
                    error: function() {
                        alert("Não foi possível receber os dados do Servidor !");
                    }
                });
            });
            // ************* INSERIR UM ATLETA ***************
            $('#btnew').click(function() {
                var nome = $("#nome").val();
                var age = $("#age").val();
                var gen = $("#gen").val();
                $.ajax({
                    type: "GET",
                    url: "http://marcelotribuna.atwebpages.com/5425/projetofinal/servidorsurf.php?comando=novoatleta&nome=" + nome + "&datanasc=" + age + "&genero=" + gen,
                    dataType: "html",
                    success: function(resposta) {
                        $("#mensagem").html(resposta);
                    },
                    error: function() {
                        alert("Não foi possível receber os dados do Servidor !");
                    }
                });
            });
            // ************* ELIMINAR UM ATLETA  ***************
            $('#btdrop').click(function() {
                var id = $("#atleta").val();
                $.ajax({
                    type: "GET",
                    url: "http://marcelotribuna.atwebpages.com/5425/projetofinal/servidorsurf.php?comando=apagaatleta&id=" + id,
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
            // ************* OBTER UM ATLETA XML ***************
            $('#btget').click(function() {
                var escolha = $("#atletaupdate").val();
                $.ajax({
                    type: "GET",
                    url: "http://marcelotribuna.atwebpages.com/5425/projetofinal/servidorsurf.php?comando=veratletaxml&id=" + escolha,
                    dataType: "xml",
                    success: function(xml) {
                        var id = $(xml).find('id').text();
                        var nome = $(xml).find('nome').text();
                        var age = $(xml).find('dataNascimento').text();
                        var gen = $(xml).find('genero').text();
                        $("#nome").val(nome);
                        $("#age").val(age);
                        $("#gen").val(gen);
                    },
                    error: function() {
                        alert("Não foi possível receber os dados do Servidor !");
                    }
                });
            });
            // ************* ALTERA UM ATLETA ***************
            $('#btupdate').click(function() {
                var nome = $("#nome").val();
                var age = $("#age").val();
                var gen = $("#gen").val();
                var id = $("#atletaupdate").val();
                $.ajax({
                    type: "GET",
                    url: "http://marcelotribuna.atwebpages.com/5425/projetofinal/servidorsurf.php?comando=editaatleta&nome=" + nome + "&datanasc=" + age + "&gen=" + gen + "&id=" + id,
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
        <h1 class="text-secondary">Gestão de Atletas - ISURF</h1>
        <div class="mb-2 mt-5"><img src="imagens/isurf2.jpg" alt="Snow" id="imgmet"></div>
        <a href="index.php">
            <button<button type="button" class="btn btn-secondary mt-3">HOME</button>
        </a>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <h3>Listagem de Todos os Atletas</h3>
                    <button id="bttodos" class="btn btn-secondary mt-3">LISTAR TODOS OS ATLETAS</button>
                    <button id="btlimpa" class="btn btn-secondary mt-3">LIMPAR</button>
                    <div id="listagemtodos"></div>
                </div>
                <div class="col-4">
                    <h3>Dados de um Atleta Individual</h3>
                    <input type="text" id="idatleta" placeholder="Insira o ID">
                    <button id="btsingle" class="btn btn-secondary ml-2 mt-3">OBTER DADOS DO ATLETA</button>
                    <div id="listagemsingle" class="mt-3"></div>
                    <h3>Eliminar Atleta</h3>
                    <input type="text" id="atleta" placeholder="Insira o ID">
                    <button id="btdrop" class="btn btn-secondary ml-2 mt-3">ELIMINAR ATLETA</button>
                    <div id="drop"></div>
                    <hr>
                </div>
                <div class="col-4">
                    <h3>Novo Atleta</h3>
                    Nome<br><input type="text" id="nome" name="nome"><br>
                    Data de Nascimento<br><input type="text" id="age" name="age"><br>
                    Género<br><input type="text" id="gen" name="gen"><br>
                    <button id="btnew" class="btn btn-secondary mt-3">CRIAR NOVO ATLETA</button>
                    <h3>Atualizar Atleta</h3>
                    <input type="text" id="atletaupdate" placeholder="Insira o ID">
                    <button id="btget" class="btn btn-secondary ml-2 mt-3">OBTER DADOS DO ATLETA</button>
                    <button id="btupdate" class="btn btn-secondary ml-2 mt-3">ATUALIZAR ATLETA</button>
                    <div id="mensagem"></div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</body>

</html>