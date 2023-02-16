<!DOCTYPE html>
<html>

<head>
    <title>Resultados Competitivos - Gestão</title>
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
                    url: "http://marcelotribuna.atwebpages.com/5425/projetofinal/servidorsurf.php?comando=verresultadosxml",
                    dataType: "xml",
                    success: function(xml) {
                        $(xml).find('resultado').each(function() {
                            var id = $(this).find('id').text();
                            var atl = $(this).find('atleta').text();
                            var esc = $(this).find('escalao').text();
                            var comp = $(this).find('competicao').text();
                            var posi = $(this).find('posicao').text();
                            var desc = $(this).find('descricao').text();
                            $("#listagemtodos").append("<b class='text-secondary'>Id: </b>" + id + "<br>");
                            $("#listagemtodos").append("<b class='text-secondary'>Atleta: </b>" + atl + "<br>");
                            $("#listagemtodos").append("<b class='text-secondary'>Escalão: </b>" + esc + "<br>");
                            $("#listagemtodos").append("<b class='text-secondary'>Competição: </b>" + comp + "<br>");
                            $("#listagemtodos").append("<b class='text-secondary'>Posição: </b>" + posi + "<br>");
                            $("#listagemtodos").append("<b class='text-secondary'>Descrição: </b>" + desc + "<br><hr>");
                        });
                    },
                    error: function() {
                        alert("Não foi possível receber os dados do Servidor !");
                    }
                });
            });
            // ************* PEDIR UM RES  ***************
            $('#btsingle').click(function() {
                var escolha = $("#idres").val();
                $.ajax({
                    type: "GET",
                    url: "http://marcelotribuna.atwebpages.com/5425/projetofinal/servidorsurf.php?comando=verresultadoxml&id=" + escolha,
                    dataType: "xml",
                    success: function(xml) {
                        $(xml).find('resultado').each(function() {
                            var id = $(this).find('id').text();
                            var atl = $(this).find('atleta').text();
                            var esc = $(this).find('escalao').text();
                            var comp = $(this).find('competicao').text();
                            var posi = $(this).find('posicao').text();
                            var desc = $(this).find('descricao').text();
                            $("#listagemsingle").html(""); //limpa o conteudo da div com id listagemsingle para evitar acumulacao de resultados
                            $("#listagemsingle").append("<b class='text-secondary'>Id: </b>" + id + "<br>");
                            $("#listagemsingle").append("<b class='text-secondary'>Atleta: </b>" + atl + "<br>");
                            $("#listagemsingle").append("<b class='text-secondary'>Escalão: </b>" + esc + "<br>");
                            $("#listagemsingle").append("<b class='text-secondary'>Competição: </b>" + comp + "<br>");
                            $("#listagemsingle").append("<b class='text-secondary'>Posição: </b>" + posi + "<br>");
                            $("#listagemsingle").append("<b class='text-secondary'>Descrição: </b>" + desc + "<br><hr>");
                        });
                    },
                    error: function() {
                        alert("Não foi possível receber os dados do Servidor !");
                    }
                });
            });
            // ************* INSERIR UM RESULTADO ***************
            $('#btnew').click(function() {
                var atl = $("#atl").val();
                var esc = $("#esc").val();
                var comp = $("#comp").val();
                var posi = $("#posi").val();
                var desc = $("#desc").val();
                $.ajax({
                    type: "GET",
                    url: "http://marcelotribuna.atwebpages.com/5425/projetofinal/servidorsurf.php?comando=novoresultado&atleta=" + atl + "&escalao=" + esc + "&comp=" + comp + "&posicao=" + posi + "&descricao=" + desc,
                    dataType: "html",
                    success: function(resposta) {
                        $("#mensagem").html(resposta);
                    },
                    error: function() {
                        alert("Não foi possível receber os dados do Servidor !");
                    }
                });
            });
            // ************* ELIMINAR UM RESULTADO  ***************
            $('#btdrop').click(function() {
                var id = $("#result").val();
                $.ajax({
                    type: "GET",
                    url: "http://marcelotribuna.atwebpages.com/5425/projetofinal/servidorsurf.php?comando=apagaresultado&id=" + id,
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
            // ************* OBTER UM RESULTADO XML ***************
            $('#btget').click(function() {
                var escolha = $("#resupdate").val();
                $.ajax({
                    type: "GET",
                    url: "http://marcelotribuna.atwebpages.com/5425/projetofinal/servidorsurf.php?comando=verresultadoxml&id=" + escolha,
                    dataType: "xml",
                    success: function(xml) {
                        var id = $(xml).find('id').text();
                        var atl = $(xml).find('atleta').text();
                        var esc = $(xml).find('escalao').text();
                        var comp = $(xml).find('competicao').text();
                        var posi = $(xml).find('posicao').text();
                        var desc = $(xml).find('descricao').text();
                        $("#atl").val(atl);
                        $("#esc").val(esc);
                        $("#comp").val(comp);
                        $("#posi").val(posi);
                        $("#desc").val(desc);
                    },
                    error: function() {
                        alert("Não foi possível receber os dados do Servidor !");
                    }
                });
            });
            // ************* ALTERA UM RESULTADO ***************
            $('#btupdate').click(function() {
                var atl = $("#atl").val();
                var esc = $("#esc").val();
                var comp = $("#comp").val();
                var posi = $("#posi").val();
                var desc = $("#desc").val();
                var id = $("#resupdate").val();
                $.ajax({
                    type: "GET",
                    url: "http://marcelotribuna.atwebpages.com/5425/projetofinal/servidorsurf.php?comando=editaresultado&atleta=" + atl + "&escalao=" + esc + "&comp=" + comp + "&posicao=" + posi + "&descricao=" + desc + "&id=" + id,
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
        <h1 class="text-secondary">Gestão de Prestações Competitivas - ISURF</h1>
        <div class="mb-2 mt-5"><img src="imagens/isurf2.jpg" alt="Snow" id="imgmet"></div>
        <a href="index.php">
            <button<button type="button" class="btn btn-secondary mt-3">HOME</button>
        </a>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <h3>Listagem de Todos os Resultados</h3>
                    <button id="bttodos" class="btn btn-secondary mt-3">LISTAR TODOS OS RESULTADOS</button>
                    <button id="btlimpa" class="btn btn-secondary mt-3">LIMPAR</button>
                    <div id="listagemtodos"></div>
                </div>
                <div class="col-4">
                    <h3>Dados de um Resultado Individual</h3>
                    <input type="text" id="idres" placeholder="Insira o ID">
                    <button id="btsingle" class="btn btn-secondary ml-2 mt-3">OBTER DADOS DO RESULTADO</button>
                    <div id="listagemsingle" class="mt-3"></div>
                    <h3>Eliminar Resultado</h3>
                    <input type="text" id="result" placeholder="Insira o ID">
                    <button id="btdrop" class="btn btn-secondary ml-2 mt-3">ELIMINAR RESULTADO</button>
                    <div id="drop"></div>
                    <hr>
                </div>
                <div class="col-4">
                    <h3>Novo Resultado</h3>
                    Atleta<br><input type="text" id="atl" name="atl"><br>
                    Escalão<br><input type="text" id="esc" name="esc"><br>
                    Competição<br><input type="text" id="comp" name="comp"><br>
                    Posição<br><input type="text" id="posi" name="posi"><br>
                    Descrição<br><input type="text" id="desc" name="desc"><br>
                    <button id="btnew" class="btn btn-secondary mt-3">CRIAR NOVO RESULTADO</button>
                    <h3>Atualizar Resultado</h3>
                    <input type="text" id="resupdate" placeholder="Insira o ID">
                    <button id="btget" class="btn btn-secondary ml-2 mt-3">OBTER DADOS DO RESULTADO</button>
                    <button id="btupdate" class="btn btn-secondary ml-2 mt-3">ATUALIZAR RESULTADO</button>
                    <div id="mensagem"></div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</body>

</html>