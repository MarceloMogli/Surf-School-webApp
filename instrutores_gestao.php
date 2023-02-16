<!DOCTYPE html>
<html>

<head>
    <title>Instrutores - Gestao</title>
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
                    url: "http://marcelotribuna.atwebpages.com/5425/projetofinal/servidorsurf.php?comando=verinstrutoresxml",
                    dataType: "xml",
                    success: function(xml) {
                        $(xml).find('instrutor').each(function() {
                            var id = $(this).find('id').text();
                            var nome = $(this).find('nome').text();
                            var niv = $(this).find('nivelTreinador').text();
                            var age = $(this).find('idade').text();
                            var cc = $(this).find('cc').text();
                            var numfed = $(this).find('numFederado').text();
                            $("#listagemtodos").append("<b class='text-secondary'>Id: </b>" + id + "<br>");
                            $("#listagemtodos").append("<b class='text-secondary'>Nome: </b>" + nome + "<br>");
                            $("#listagemtodos").append("<b class='text-secondary'>Nível de Treinador: </b>" + niv + "<br>");
                            $("#listagemtodos").append("<b class='text-secondary'>Data de Nascimento: </b>" + age + "<br>");
                            $("#listagemtodos").append("<b class='text-secondary'>Doc. Identificação: </b>" + cc + "<br>");
                            $("#listagemtodos").append("<b class='text-secondary'>Número da Licença: </b>" + numfed + "<br><hr>");
                        });
                    },
                    error: function() {
                        alert("Não foi possível receber os dados do Servidor !");
                    }
                });
            });
            // ************* PEDIR UM ALUGUER  ***************
            $('#btsingle').click(function() {
                var escolha = $("#idinstrutor").val();
                $.ajax({
                    type: "GET",
                    url: "http://marcelotribuna.atwebpages.com/5425/projetofinal/servidorsurf.php?comando=verinstrutorxml&id=" + escolha,
                    dataType: "xml",
                    success: function(xml) {
                        $(xml).find('instrutor').each(function() {
                            var id = $(this).find('id').text();
                            var nome = $(this).find('nome').text();
                            var niv = $(this).find('nivelTreinador').text();
                            var age = $(this).find('idade').text();
                            var cc = $(this).find('cc').text();
                            var numfed = $(this).find('numFederado').text();
                            $("#listagemsingle").html(""); //limpa o conteudo da div com id listagemsingle para evitar acumulacao de resultados
                            $("#listagemsingle").append("<b class='text-secondary'>Id: </b>" + id + "<br>");
                            $("#listagemsingle").append("<b class='text-secondary'>Nome: </b>" + nome + "<br>");
                            $("#listagemsingle").append("<b class='text-secondary'>Nível de Treinador: </b>" + niv + "<br>");
                            $("#listagemsingle").append("<b class='text-secondary'>Data de Nascimento: </b>" + age + "<br>");
                            $("#listagemsingle").append("<b class='text-secondary'>Doc. Identificação: </b>" + cc + "<br>");
                            $("#listagemsingle").append("<b class='text-secondary'>Número da Licença: </b>" + numfed + "<br><hr>");
                        });
                    },
                    error: function() {
                        alert("Não foi possível receber os dados do Servidor !");
                    }
                });
            });
            // ************* INSERIR UM ALUGUER ***************
            $('#btnew').click(function() {
                var nome = $("#nome").val();
                var niv = $("#niv").val();
                var age = $("#age").val();
                var cc = $("#cc").val();
                var numfed = $("#numfed").val();
                $.ajax({
                    type: "GET",
                    url: "http://marcelotribuna.atwebpages.com/5425/projetofinal/servidorsurf.php?comando=novoinstrutor&nome=" + nome + "&nivel=" + niv + "&idade=" + age + "&cc=" + cc + "&numfederado=" + numfed,
                    dataType: "html",
                    success: function(resposta) {
                        $("#mensagem").html(resposta);
                    },
                    error: function() {
                        alert("Não foi possível receber os dados do Servidor !");
                    }
                });
            });
            // ************* ELIMINAR UM INSTRUTOR  ***************
            $('#btdrop').click(function() {
                var id = $("#instrutor").val();
                $.ajax({
                    type: "GET",
                    url: "http://marcelotribuna.atwebpages.com/5425/projetofinal/servidorsurf.php?comando=apagainstrutor&id=" + id,
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
            // ************* OBTER UM INSTRUTOR XML ***************
            $('#btget').click(function() {
                var escolha = $("#instrutorupdate").val();
                $.ajax({
                    type: "GET",
                    url: "http://marcelotribuna.atwebpages.com/5425/projetofinal/servidorsurf.php?comando=verinstrutorxml&id=" + escolha,
                    dataType: "xml",
                    success: function(xml) {
                        var id = $(xml).find('id').text();
                        var nome = $(xml).find('nome').text();
                        var niv = $(xml).find('nivelTreinador').text();
                        var age = $(xml).find('idade').text();
                        var cc = $(xml).find('cc').text();
                        var numfed = $(xml).find('numFederado').text();
                        $("#nome").val(nome);
                        $("#niv").val(niv);
                        $("#age").val(age);
                        $("#cc").val(cc);
                        $("#numfed").val(numfed);
                    },
                    error: function() {
                        alert("Não foi possível receber os dados do Servidor !");
                    }
                });
            });
            // ************* ALTERA UM INSTRUTOR ***************
            $('#btupdate').click(function() {
                var nome = $("#nome").val();
                var niv = $("#niv").val();
                var age = $("#age").val();
                var cc = $("#cc").val();
                var numfed = $("#numfed").val();
                var id = $("#instrutorupdate").val();
                $.ajax({
                    type: "GET",
                    url: "http://marcelotribuna.atwebpages.com/5425/projetofinal/servidorsurf.php?comando=editainstrutor&nome=" + nome + "&nivel=" + niv + "&idade=" + age + "&cc=" + cc + "&numfed=" + numfed + "&id=" + id,
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
        <h1 class="text-secondary">Gestão de Instrutores - ISURF</h1>
        <div class="mb-2 mt-5"><img src="imagens/isurf2.jpg" alt="Snow" id="imgmet"></div>
        <a href="index.php">
            <button<button type="button" class="btn btn-secondary mt-3">HOME</button>
        </a>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <h3>Listagem de Todos os Instrutores</h3>
                    <button id="bttodos" class="btn btn-secondary mt-3">LISTAR TODOS OS INSTRUTORES</button>
                    <button id="btlimpa" class="btn btn-secondary mt-3">LIMPAR</button>
                    <div id="listagemtodos"></div>
                </div>
                <div class="col-4">
                    <h3>Dados de um Instrutor Individual</h3>
                    <input type="text" id="idinstrutor" placeholder="Insira o ID">
                    <button id="btsingle" class="btn btn-secondary ml-2 mt-3">OBTER DADOS DO INSTRUTOR</button>
                    <div id="listagemsingle" class="mt-3"></div>
                    <h3>Eliminar Instrutor</h3>
                    <input type="text" id="instrutor" placeholder="Insira o ID">
                    <button id="btdrop" class="btn btn-secondary ml-2 mt-3">ELIMINAR INSTRUTOR</button>
                    <div id="drop"></div>
                    <hr>
                </div>
                <div class="col-4">
                    <h3>Novo Instrutor</h3>
                    Nome<br><input type="text" id="nome" name="nome"><br>
                    Nível de Treinador<br><input type="text" id="niv" name="niv"><br>
                    Data de Nascimento<br><input type="text" id="age" name="age"><br>
                    Doc. Identificação<br><input type="text" id="cc" name="cc"><br>
                    Número da Licença<br><input type="text" id="numfed" name="numfed"><br>
                    <button id="btnew" class="btn btn-secondary mt-3">CRIAR NOVO INSTRUTOR</button>
                    <h3>Atualizar Instrutor</h3>
                    <input type="text" id="instrutorupdate" placeholder="Insira o ID">
                    <button id="btget" class="btn btn-secondary ml-2 mt-3">OBTER DADOS DO INSTRUTOR</button>
                    <button id="btupdate" class="btn btn-secondary ml-2 mt-3">ATUALIZAR INSTRUTOR</button>
                    <div id="mensagem"></div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</body>

</html>