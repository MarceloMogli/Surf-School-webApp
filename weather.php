<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Meterologia</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 6vh;
        }
    </style>
    <script>
        //FUNCAO LIGACAO A API
        $(document).ready(function() {
            $('#bt').click(function() {
                $("#hoje").html('');
                $("#amanha").html(''); //limpar o conteudo para evitar repeticoes 
                $("#dpama").html('');
                var hoje = new Date();
                var dd = String(hoje.getDate()).padStart(2, '0'); //hoje
                var ddd = String(hoje.getDate() + 1).padStart(2, '0'); //amanha
                var dddd = String(hoje.getDate() + 2).padStart(2, '0'); // depois de amanha
                var mm = String(hoje.getMonth() + 1).padStart(2, '0'); //Janeiro = 0!
                var yyyy = hoje.getFullYear();
                hoje = dd + '/' + mm + '/' + yyyy;
                $.getJSON("https://api.worldweatheronline.com/premium/v1/marine.ashx?key=048b8fafe5be4ad9a16130908222809&format=json&q=40,-8&tp=24", function(json) {
                    $("#hoje").append("<h4 class='text-center mt-5'>" + hoje + "</h4><br>");
                    $("#hoje").append("<b class='text-secondary mt-5'>Temperatura: </b>" + json.data.weather[0].hourly[0].tempC + " °C<br>");
                    $("#hoje").append("<b class='text-secondary mt-5'>Temperatura Agua: </b>" + json.data.weather[0].hourly[0].waterTemp_C + " °C<br>");
                    $("#hoje").append("<b class='text-secondary mt-5' >Tam. Ondas: </b>" + json.data.weather[0].hourly[0].swellHeight_m + " m<br>");
                    $("#hoje").append("<b class='text-secondary mt-5'>Direcao Swell: </b>" + json.data.weather[0].hourly[0].swellDir16Point + "<br>");
                    $("#hoje").append("<b class='text-secondary mt-5'>Vento: </b>" + json.data.weather[0].hourly[0].windspeedKmph + " km/h<br>");
                    $("#hoje").append("<b class='text-secondary mt-5'>Direcao Vento: </b>" + json.data.weather[0].hourly[0].winddir16Point + "<br>");
                    $("#hoje").append("<b class='text-secondary mt-5'>Precipitacao: </b>" + json.data.weather[0].hourly[0].precipMM + " mm/24hr<br><hr>");
                    hoje = ddd + '/' + mm + '/' + yyyy;
                    $("#amanha").append("<h4 class='text-center mt-5'>" + hoje + "</h4><br>");
                    $("#amanha").append("<b class='text-secondary mt-5'>Temperatura: </b>" + json.data.weather[1].hourly[0].tempC + " °C<br>");
                    $("#amanha").append("<b class='text-secondary mt-5'>Temperatura Agua: </b>" + json.data.weather[1].hourly[0].waterTemp_C + " °C<br>");
                    $("#amanha").append("<b class='text-secondary mt-5' >Tam. Ondas: </b>" + json.data.weather[1].hourly[0].swellHeight_m + " m<br>");
                    $("#amanha").append("<b class='text-secondary mt-5'>Direcao Swell: </b>" + json.data.weather[1].hourly[0].swellDir16Point + "<br>");
                    $("#amanha").append("<b class='text-secondary mt-5'>Vento: </b>" + json.data.weather[1].hourly[0].windspeedKmph + " km/h<br>");
                    $("#amanha").append("<b class='text-secondary mt-5'>Direcao Vento: </b>" + json.data.weather[1].hourly[0].winddir16Point + "<br>");
                    $("#amanha").append("<b class='text-secondary mt-5'>Precipitacao: </b>" + json.data.weather[1].hourly[0].precipMM + " mm/24hr<br><hr>");
                    hoje = dddd + '/' + mm + '/' + yyyy;
                    $("#dpama").append("<h4 class='text-center mt-5'>" + hoje + "</h4><br>");
                    $("#dpama").append("<b class='text-secondary mt-5'>Temperatura: </b>" + json.data.weather[2].hourly[0].tempC + " °C<br>");
                    $("#dpama").append("<b class='text-secondary mt-5'>Temperatura Agua: </b>" + json.data.weather[2].hourly[0].waterTemp_C + " °C<br>");
                    $("#dpama").append("<b class='text-secondary mt-5' >Tam. Ondas: </b>" + json.data.weather[2].hourly[0].swellHeight_m + " m<br>");
                    $("#dpama").append("<b class='text-secondary mt-5'>Direcao Swell: </b>" + json.data.weather[2].hourly[0].swellDir16Point + "<br>");
                    $("#dpama").append("<b class='text-secondary mt-5'>Vento: </b>" + json.data.weather[2].hourly[0].windspeedKmph + " km/h<br>");
                    $("#dpama").append("<b class='text-secondary mt-5'>Direcao Vento: </b>" + json.data.weather[2].hourly[0].winddir16Point + "<br>");
                    $("#dpama").append("<b class='text-secondary mt-5'>Precipitacao: </b>" + json.data.weather[2].hourly[0].precipMM + " mm/24hr<br><hr>");
                });
            });
        });
    </script>
</head>
<body>
    <div class="text-center">
        <h1 class="text-secondary">Previsões Meteorológicas - API</h1>
        <div class="mb-2 mt-5"><img src="imagens/isurf2.jpg" alt="" id="imgmet"></div>
        <a href="index.php"><button type="button" class="btn btn-secondary mt-3">HOME</button></a>
        <hr>
        <button type="button" class="btn btn-secondary mt-3" id="bt">VER METEOROLOGIA </button>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div id="hoje"></div>
            </div>
            <div class="col-4">
                <div id="amanha"></div>
                <hr>
            </div>
            <div class="col-4">
                <div id="dpama"></div>
                <hr>
            </div>
        </div>
    </div>
    <footer class="bg-secondary position-absolute text-center text-light">
    <div>Direitos de Autor: Marcelo Tribuna</div>
    <div>CET -TPSI 2022 / 5425</div>
    </footer>
</body>
</html>