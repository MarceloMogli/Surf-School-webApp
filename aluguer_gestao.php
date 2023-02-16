<!DOCTYPE html>
<html>
<head>
    <title>Alugueres - Listagem</title>
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
                    url: "http://marcelotribuna.atwebpages.com/5425/projetofinal/servidorsurf.php?comando=veralugueresxml",
                    dataType: "xml",
                    success: function(xml) {
                        $(xml).find('aluguer').each(function() {
                            var id = $(this).find('id').text();
                            var cliente = $(this).find('cliente').text();
                            var cc = $(this).find('cc').text();
                            var tipo = $(this).find('tipoProduto').text();
                            var idprod = $(this).find('idProduto').text();
                            var duracao = $(this).find('duracao').text();
                            $("#listagemtodos").append("<b class='text-secondary'>Id: </b>" + id + "<br>");
                            $("#listagemtodos").append("<b class='text-secondary'>Cliente: </b>" + cliente + "<br>");
                            $("#listagemtodos").append("<b class='text-secondary'>Doc. Identificação: </b>" + cc + "<br>");
                            $("#listagemtodos").append("<b class='text-secondary'>Tipo de Produto: </b>" + tipo + "<br>");
                            $("#listagemtodos").append("<b class='text-secondary'>ID do Produto: </b>" + idprod + "<br>");
                            $("#listagemtodos").append("<b class='text-secondary'>Duração: </b>" + duracao + "<br><hr>");
                        });
                    },
                    error: function() {
                        alert("Não foi possível receber os dados do Servidor !");
                    }
                });
            });
            // ************* PEDIR UM ALUGUER  ***************
            $('#btsingle').click(function() {
                var escolha = $("#idaluguer").val();
                $.ajax({
                    type: "GET",
                    url: "http://marcelotribuna.atwebpages.com/5425/projetofinal/servidorsurf.php?comando=veraluguerxml&id=" + escolha,
                    dataType: "xml",
                    success: function(xml) {
                        $(xml).find('aluguer').each(function() {
                            var id = $(this).find('id').text();
                            var cliente = $(this).find('cliente').text();
                            var cc = $(this).find('cc').text();
                            var tipo = $(this).find('tipoProduto').text();
                            var idprod = $(this).find('idProduto').text();
                            var duracao = $(this).find('duracao').text();
                            $("#listagemsingle").html(""); //limpa o conteudo da div com id listagemsingle para evitar acumulacao de resultados
                            $("#listagemsingle").append("<b class='text-secondary'>Id: </b>" + id + "<br>");
                            $("#listagemsingle").append("<b class='text-secondary'>Cliente: </b>" + cliente + "<br>");
                            $("#listagemsingle").append("<b class='text-secondary'>Doc. Identificação: </b>" + cc + "<br>");
                            $("#listagemsingle").append("<b class='text-secondary'>Tipo de Produto: </b>" + tipo + "<br>");
                            $("#listagemsingle").append("<b class='text-secondary'>ID do Produto: </b>" + idprod + "<br>");
                            $("#listagemsingle").append("<b class='text-secondary'>Duração: </b>" + duracao + "<br><hr>");
                        });
                    },
                    error: function() {
                        alert("Não foi possível receber os dados do Servidor !");
                    }
                });
            });
            // ************* INSERIR UM ALUGUER ***************
            $('#btnew').click(function() {
                var cliente = $("#cliente").val();
                var cc = $("#cc").val();
                var tipo = $("#tipo").val();
                var idprod = $("#idprod").val();
                var duracao = $("#duracao").val();
                $.ajax({
                    type: "GET",
                    url: "http://marcelotribuna.atwebpages.com/5425/projetofinal/servidorsurf.php?comando=novoaluguer&cliente=" + cliente + "&cc=" + cc + "&tipo=" + tipo + "&idprod=" + idprod + "&duracao=" + duracao,
                    dataType: "html",
                    success: function(resposta) {
                        $("#mensagem").html(resposta);
                    },
                    error: function() {
                        alert("Não foi possível receber os dados do Servidor !");
                    }
                });
            });
            // ************* ELIMINAR UM ALUGUER  ***************
            $('#btdrop').click(function() {
                var id = $("#aluguer").val();
                $.ajax({
                    type: "GET",
                    url: "http://marcelotribuna.atwebpages.com/5425/projetofinal/servidorsurf.php?comando=apagaaluguer&id=" + id,
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
            // ************* OBTER UM ALUGUER XML ***************
            $('#btget').click(function() {
                var escolha = $("#aluguerupdate").val();
                $.ajax({
                    type: "GET",
                    url: "http://marcelotribuna.atwebpages.com/5425/projetofinal/servidorsurf.php?comando=veraluguerxml&id=" + escolha,
                    dataType: "xml",
                    success: function(xml) {
                        var id = $(xml).find('id').text();
                        var cliente = $(xml).find('cliente').text();
                        var cc = $(xml).find('cc').text();
                        var tipo = $(xml).find('tipoProduto').text();
                        var idprod = $(xml).find('idProduto').text();
                        var duracao = $(xml).find('duracao').text();
                        $("#cliente").val(cliente);
                        $("#cc").val(cc);
                        $("#tipo").val(tipo);
                        $("#idprod").val(idprod);
                        $("#duracao").val(duracao);
                    },
                    error: function() {
                        alert("Não foi possível receber os dados do Servidor !");
                    }
                });
            });
            // ************* ALTERA UM ALUGUER ***************
            $('#btupdate').click(function() {
                var cliente = $("#cliente").val();
                var cc = $("#cc").val();
                var tipo = $("#tipo").val();
                var idprod = $("#idprod").val();
                var duracao = $("#duracao").val();
                var id = $("#aluguerupdate").val();
                $.ajax({
                    type: "GET",
                    url: "http://marcelotribuna.atwebpages.com/5425/projetofinal/servidorsurf.php?comando=editaaluguer&cliente=" + cliente + "&cc=" + cc + "&tipoprod=" + tipo + "&idprod=" + idprod + "&duracao=" + duracao + "&id=" + id,
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
        <h1 class="text-secondary">Gestão de Alugueres - ISURF</h1>
        <div class="mb-2 mt-5"><img src="imagens/isurf2.jpg" alt="Snow" id="imgmet"></div>
        <a href="index.php">
            <button<button type="button" class="btn btn-secondary mt-3">HOME</button>
        </a>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <h3>Listagem de Todos os Alugueres</h3>
                    <button id="bttodos" class="btn btn-secondary mt-3">LISTAR TODOS OS ALUGUERES</button>
                    <button id="btlimpa" class="btn btn-secondary mt-3">LIMPAR</button>
                    <div id="listagemtodos"></div>
                </div>
                <div class="col-4">
                    <h3>Dados de um Aluguer Individual</h3>
                    <input type="text" id="idaluguer" placeholder="Insira o ID">
                    <button id="btsingle" class="btn btn-secondary ml-2 mt-3">OBTER DADOS DO ALUGUER</button>
                    <div id="listagemsingle" class="mt-3"></div>
                    <h3>Eliminar Aluguer</h3>
                    <input type="text" id="aluguer" placeholder="Insira o ID">
                    <button id="btdrop" class="btn btn-secondary ml-2 mt-3">ELIMINAR ALUGUER</button>
                    <div id="drop"></div>
                    <hr>
                </div>
                <div class="col-4">
                    <h3>Novo Aluguer</h3>
                    Cliente<br><input type="text" id="cliente" name="cliente"><br>
                    Doc. de Identificação<br><input type="text" id="cc" name="cc"><br>
                    Tipo de Produto<br><input type="text" id="tipo" name="tipo"><br>
                    ID do Produto<br><input type="text" id="idprod" name="idprod"><br>
                    Duração<br><input type="text" id="duracao" name="duracao"><br>
                    <button id="btnew" class="btn btn-secondary mt-3">CRIAR NOVO ALUGUER</button>
                    <h3>Atualizar Aluguer</h3>
                    <input type="text" id="aluguerupdate" placeholder="Insira o ID">
                    <button id="btget" class="btn btn-secondary ml-2 mt-3">OBTER DADOS DO ALUGUER</button>
                    <button id="btupdate" class="btn btn-secondary ml-2 mt-3">ATUALIZAR ALUGUER</button>
                    <div id="mensagem"></div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</body>
</html>