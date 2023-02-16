<?php
header("Access-Control-Allow-Origin: *");
$ligacao = new PDO("mysql:host=fdb31.runhosting.com;dbname=4135249_5422", "4135249_5422", ".b}7S[/y3x3Xo5B:");
function homepage()
{
    echo "<div align='center'>";
    echo "<h1>Software Gestao Escola de Surf</h1>";
    echo "<h4>Direitos de Autor - Marcelo</h4>";
    echo "</div>";
}
//READ
//ver todas aulas html
function listaaulas()
{
    global $ligacao;
    $ligacao->query("SET NAMES utf8");
    $query = $ligacao->prepare("select * from aulas");
    $query->execute();
    while ($row = $query->fetch(PDO::FETCH_OBJ)) {
        echo "ID:" . $row->id . "<br>";
        echo "Data:" . $row->dia . "<br>";
        echo "Hora:" . $row->hora . "<br>";
        echo "Tipo de Aula:" . $row->tipo . "<br>";
        echo "Instrutor:" . $row->instrutor . "<br>";
        echo "Num. Alunos:" . $row->numAlunos . "<hr><br>";
    }
}
//ver todas aulas XML
function listaaulasxml()
{
    header('Content-Type: text/xml');
    global $ligacao;
    $ligacao->query("SET NAMES utf8");
    $query = $ligacao->prepare("select * from aulas");
    $query->execute();
    echo '<?xml version="1.0" encoding="UTF-8"?>';
    echo "<aulas>";
    while ($row = $query->fetch(PDO::FETCH_OBJ)) {
        echo "<aula>";
        echo "<id>" . $row->id . "</id>";
        echo "<data>" . $row->dia . "</data>";
        echo "<hora>" . $row->hora . "</hora>";
        echo "<tipo>" . $row->tipo . "</tipo>";
        echo "<instrutor>" . $row->instrutor . "</instrutor>";
        echo "<numAlunos>" . $row->numAlunos . "</numAlunos>";
        echo "</aula>";
    }
    echo "</aulas>";
}
//ver todas aulas JSON
function listaaulasjson()
{
    header('Content-Type: application/json');
    global $ligacao;
    $ligacao->query("SET NAMES utf8");
    $query = $ligacao->prepare("select * from aulas order by id asc");
    $query->execute();
    $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($resultado);
    echo $json;
}
//ver uma aula html
function listaaula($id)
{
    global $ligacao;
    $ligacao->query("SET NAMES utf8");
    $query = $ligacao->prepare("SELECT * FROM aulas WHERE id=$id");
    $query->execute();
    while ($row = $query->fetch(PDO::FETCH_OBJ)) {
        echo "ID:" . $row->id . "<br>";
        echo "Data:" . $row->dia . "<br>";
        echo "Hora:" . $row->hora . "<br>";
        echo "Tipo de Aula:" . $row->tipo . "<br>";
        echo "Instrutor:" . $row->instrutor . "<br>";
        echo "Num. Alunos:" . $row->numAlunos . "<hr><br>";
    }
}
//ver uma aula XML
function aulaxml($id)
{
    header('Content-Type: text/xml');
    global $ligacao;
    $ligacao->query("SET NAMES utf8");
    $query = $ligacao->prepare("select * from aulas where id=$id");
    $query->execute();
    echo '<?xml version="1.0" encoding="UTF-8"?>';
    echo "<aulas>";
    while ($row = $query->fetch(PDO::FETCH_OBJ)) {
        echo "<aula>";
        echo "<id>" . $row->id . "</id>";
        echo "<data>" . $row->dia . "</data>";
        echo "<hora>" . $row->hora . "</hora>";
        echo "<tipo>" . $row->tipo . "</tipo>";
        echo "<instrutor>" . $row->instrutor . "</instrutor>";
        echo "<numAlunos>" . $row->numAlunos . "</numAlunos>";
        echo "</aula>";
    }
    echo "</aulas>";
}
//ver uma aula JSON
function aulajson($id)
{
    header('Content-Type: application/json');
    global $ligacao;
    $ligacao->query("SET NAMES utf8");
    $query = $ligacao->prepare("select * from aulas where id=$id");
    $query->execute();
    $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($resultado);
    echo $json;
}
//ver todos alugueres html
function listaalugueres()
{
    global $ligacao;
    $ligacao->query("SET NAMES utf8");
    $query = $ligacao->prepare("select * from aluguer");
    $query->execute();
    while ($row = $query->fetch(PDO::FETCH_OBJ)) {
        echo "ID:" . $row->id . "<br>";
        echo "Cliente:" . $row->cliente . "<br>";
        echo "Cartao Cidadao:" . $row->cc . "<br>";
        echo "Tipo de Produto:" . $row->tipoprod . "<br>";
        echo "ID Produto:" . $row->idprod . "<br>";
        echo "Duracao Aluguer:" . $row->duracao . "<hr><br>";
    }
}
//ver todos alugueres XML
function listaalugueresxml()
{
    header('Content-Type: text/xml');
    global $ligacao;
    $ligacao->query("SET NAMES utf8");
    $query = $ligacao->prepare("select * from aluguer");
    $query->execute();
    echo '<?xml version="1.0" encoding="UTF-8"?>';
    echo "<alugueres>";
    while ($row = $query->fetch(PDO::FETCH_OBJ)) {
        echo "<aluguer>";
        echo "<id>" . $row->id . "</id>";
        echo "<cliente>" . $row->cliente . "</cliente>";
        echo "<cc>" . $row->cc . "</cc>";
        echo "<tipoProduto>" . $row->tipoprod . "</tipoProduto>";
        echo "<idProduto>" . $row->idprod . "</idProduto>";
        echo "<duracao>" . $row->duracao . "</duracao>";
        echo "</aluguer>";
    }
    echo "</alugueres>";
}
//ver todas alugueres JSON
function listaalugueresjson()
{
    header('Content-Type: application/json');
    global $ligacao;
    $ligacao->query("SET NAMES utf8");
    $query = $ligacao->prepare("select * from aluguer order by id asc");
    $query->execute();
    $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($resultado);
    echo $json;
}
//ver um aluguer html
function listaaluguer($id)
{
    global $ligacao;
    $ligacao->query("SET NAMES utf8");
    $query = $ligacao->prepare("SELECT * FROM aluguer WHERE id=$id");
    $query->execute();
    while ($row = $query->fetch(PDO::FETCH_OBJ)) {
        echo "ID:" . $row->id . "<br>";
        echo "Cliente:" . $row->cliente . "<br>";
        echo "Cartao Cidadao:" . $row->cc . "<br>";
        echo "Tipo de Produto:" . $row->tipoprod . "<br>";
        echo "ID Produto:" . $row->idprod . "<br>";
        echo "Duracao Aluguer:" . $row->duracao . "<hr><br>";
    }
}
//ver um aluguer XML
function aluguerxml($id)
{
    header('Content-Type: text/xml');
    global $ligacao;
    $ligacao->query("SET NAMES utf8");
    $query = $ligacao->prepare("select * from aluguer where id=$id");
    $query->execute();
    echo '<?xml version="1.0" encoding="UTF-8"?>';
    echo "<alugueres>";
    while ($row = $query->fetch(PDO::FETCH_OBJ)) {
        echo "<aluguer>";
        echo "<id>" . $row->id . "</id>";
        echo "<cliente>" . $row->cliente . "</cliente>";
        echo "<cc>" . $row->cc . "</cc>";
        echo "<tipoProduto>" . $row->tipoprod . "</tipoProduto>";
        echo "<idProduto>" . $row->idprod . "</idProduto>";
        echo "<duracao>" . $row->duracao . "</duracao>";
        echo "</aluguer>";
    }
    echo "</alugueres>";
}
//ver um aluguer JSON
function aluguerjson($id)
{
    header('Content-Type: application/json');
    global $ligacao;
    $ligacao->query("SET NAMES utf8");
    $query = $ligacao->prepare("select * from aluguer where id=$id");
    $query->execute();
    $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($resultado);
    echo $json;
}
//ver todos instrutores html
function listainstrutores()
{
    global $ligacao;
    $ligacao->query("SET NAMES utf8");
    $query = $ligacao->prepare("select * from instrutores");
    $query->execute();
    while ($row = $query->fetch(PDO::FETCH_OBJ)) {
        echo "ID:" . $row->id . "<br>";
        echo "Nome:" . $row->nome . "<br>";
        echo "Nivel de Treinador:" . $row->nivel . "<br>";
        echo "Idade:" . $row->dataNasc . "<br>";
        echo "Cartao Cidadao:" . $row->cc . "<br>";
        echo "Num. Licenca:" . $row->numfederado . "<hr><br>";
    }
}
//ver todos instrutores XML
function listainstrutoresxml()
{
    header('Content-Type: text/xml');
    global $ligacao;
    $ligacao->query("SET NAMES utf8");
    $query = $ligacao->prepare("select * from instrutores");
    $query->execute();
    echo '<?xml version="1.0" encoding="UTF-8"?>';
    echo "<instrutores>";
    while ($row = $query->fetch(PDO::FETCH_OBJ)) {
        echo "<instrutor>";
        echo "<id>" . $row->id . "</id>";
        echo "<nome>" . $row->nome . "</nome>";
        echo "<nivelTreinador>" . $row->nivel . "</nivelTreinador>";
        echo "<idade>" . $row->dataNasc . "</idade>";
        echo "<cc>" . $row->cc . "</cc>";
        echo "<numFederado>" . $row->numfederado . "</numFederado>";
        echo "</instrutor>";
    }
    echo "</instrutores>";
}
//ver todos instrutores JSON
function listainstrutoresjson()
{
    header('Content-Type: application/json');
    global $ligacao;
    $ligacao->query("SET NAMES utf8");
    $query = $ligacao->prepare("select * from instrutores order by id asc");
    $query->execute();
    $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($resultado);
    echo $json;
}
//ver um instrutor html
function listainstrutor($id)
{
    global $ligacao;
    $ligacao->query("SET NAMES utf8");
    $query = $ligacao->prepare("SELECT * FROM instrutores WHERE id=$id");
    $query->execute();
    while ($row = $query->fetch(PDO::FETCH_OBJ)) {
        echo "ID:" . $row->id . "<br>";
        echo "Nome:" . $row->nome . "<br>";
        echo "Nivel de Treinador:" . $row->nivel . "<br>";
        echo "Data de Nascimento:" . $row->dataNasc . "<br>";
        echo "Cartao Cidadao:" . $row->cc . "<br>";
        echo "Num. Licenca:" . $row->numfederado . "<hr><br>";
    }
}
//ver um instrutor XML
function instrutorxml($id)
{
    header('Content-Type: text/xml');
    global $ligacao;
    $ligacao->query("SET NAMES utf8");
    $query = $ligacao->prepare("select * from instrutores where id=$id");
    $query->execute();
    echo '<?xml version="1.0" encoding="UTF-8"?>';
    echo "<instrutores>";
    while ($row = $query->fetch(PDO::FETCH_OBJ)) {
        echo "<instrutor>";
        echo "<id>" . $row->id . "</id>";
        echo "<nome>" . $row->nome . "</nome>";
        echo "<nivelTreinador>" . $row->nivel . "</nivelTreinador>";
        echo "<idade>" . $row->dataNasc . "</idade>";
        echo "<cc>" . $row->cc . "</cc>";
        echo "<numFederado>" . $row->numfederado . "</numFederado>";
        echo "</instrutor>";
    }
    echo "</instrutores>";
}
//ver um instrutor JSON
function instrutorjson($id)
{
    header('Content-Type: application/json');
    global $ligacao;
    $ligacao->query("SET NAMES utf8");
    $query = $ligacao->prepare("select * from instrutores where id=$id");
    $query->execute();
    $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($resultado);
    echo $json;
}
//ver todos resultados comp html
function listaresultados()
{
    global $ligacao;
    $ligacao->query("SET NAMES utf8");
    $query = $ligacao->prepare("select * from resultadoscomp");
    $query->execute();
    while ($row = $query->fetch(PDO::FETCH_OBJ)) {
        echo "ID:" . $row->id . "<br>";
        echo "Atleta:" . $row->atleta . "<br>";
        echo "Escalao:" . $row->escalao . "<br>";
        echo "Competicao:" . $row->competicao . "<br>";
        echo "Posicao:" . $row->posicao . "<br>";
        echo "Descricao Performance:" . $row->descricao . "<hr><br>";
    }
}
//ver todos resultados comp XML
function listaresultadosxml()
{
    header('Content-Type: text/xml');
    global $ligacao;
    $ligacao->query("SET NAMES utf8");
    $query = $ligacao->prepare("select * from resultadoscomp");
    $query->execute();
    echo '<?xml version="1.0" encoding="UTF-8"?>';
    echo "<resultados>";
    while ($row = $query->fetch(PDO::FETCH_OBJ)) {
        echo "<resultado>";
        echo "<id>" . $row->id . "</id>";
        echo "<atleta>" . $row->atleta . "</atleta>";
        echo "<escalao>" . $row->escalao . "</escalao>";
        echo "<competicao>" . $row->competicao . "</competicao>";
        echo "<posicao>" . $row->posicao . "</posicao>";
        echo "<descricao>" . $row->descricao . "</descricao>";
        echo "</resultado>";
    }
    echo "</resultados>";
}
//ver todos resultados comp JSON
function listaresultadosjson()
{
    header('Content-Type: application/json');
    global $ligacao;
    $ligacao->query("SET NAMES utf8");
    $query = $ligacao->prepare("select * from resultadoscomp order by id asc");
    $query->execute();
    $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($resultado);
    echo $json;
}
//ver um resultado html
function listaresultado($id)
{
    global $ligacao;
    $ligacao->query("SET NAMES utf8");
    $query = $ligacao->prepare("SELECT * FROM resultadoscomp WHERE id=$id");
    $query->execute();
    while ($row = $query->fetch(PDO::FETCH_OBJ)) {
        echo "ID:" . $row->id . "<br>";
        echo "Atleta:" . $row->atleta . "<br>";
        echo "Escalao:" . $row->escalao . "<br>";
        echo "Competicao:" . $row->competicao . "<br>";
        echo "Posicao:" . $row->posicao . "<br>";
        echo "Descricao Performance:" . $row->descricao . "<hr><br>";
    }
}
//ver um resultado comp XML
function resultadoxml($id)
{
    header('Content-Type: text/xml');
    global $ligacao;
    $ligacao->query("SET NAMES utf8");
    $query = $ligacao->prepare("select * from resultadoscomp where id=$id");
    $query->execute();
    echo '<?xml version="1.0" encoding="UTF-8"?>';
    echo "<resultados>";
    while ($row = $query->fetch(PDO::FETCH_OBJ)) {
        echo "<resultado>";
        echo "<id>" . $row->id . "</id>";
        echo "<atleta>" . $row->atleta . "</atleta>";
        echo "<escalao>" . $row->escalao . "</escalao>";
        echo "<competicao>" . $row->competicao . "</competicao>";
        echo "<posicao>" . $row->posicao . "</posicao>";
        echo "<descricao>" . $row->descricao . "</descricao>";
        echo "</resultado>";
    }
    echo "</resultados>";
}
//ver um resultado comp JSON
function resultadojson($id)
{
    header('Content-Type: application/json');
    global $ligacao;
    $ligacao->query("SET NAMES utf8");
    $query = $ligacao->prepare("select * from resultadoscomp where id=$id");
    $query->execute();
    $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($resultado);
    echo $json;
}
//ver todos atletas html
function listaatletas()
{
    global $ligacao;
    $ligacao->query("SET NAMES utf8");
    $query = $ligacao->prepare("select * from atletas");
    $query->execute();
    while ($row = $query->fetch(PDO::FETCH_OBJ)) {
        echo "ID:" . $row->id . "<br>";
        echo "Nome:" . $row->nome . "<br>";
        echo "Data Nascimento:" . $row->datanasc . "<br>";
        echo "Genero:" . $row->genero . "<hr><br>";
    }
}
//ver todos atletas XML
function listaatletasxml()
{
    header('Content-Type: text/xml');
    global $ligacao;
    $ligacao->query("SET NAMES utf8");
    $query = $ligacao->prepare("select * from atletas");
    $query->execute();
    echo '<?xml version="1.0" encoding="UTF-8"?>';
    echo "<atletas>";
    while ($row = $query->fetch(PDO::FETCH_OBJ)) {
        echo "<atleta>";
        echo "<id>" . $row->id . "</id>";
        echo "<nome>" . $row->nome . "</nome>";
        echo "<dataNascimento>" . $row->datanasc . "</dataNascimento>";
        echo "<genero>" . $row->genero . "</genero>";
        echo "</atleta>";
    }
    echo "</atletas>";
}
//ver todos atletas JSON
function listaatletasjson()
{
    header('Content-Type: application/json');
    global $ligacao;
    $ligacao->query("SET NAMES utf8");
    $query = $ligacao->prepare("select * from atletas order by id asc");
    $query->execute();
    $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($resultado);
    echo $json;
}
//ver um atleta html
function listaatleta($id)
{
    global $ligacao;
    $ligacao->query("SET NAMES utf8");
    $query = $ligacao->prepare("SELECT * FROM atletas WHERE id=$id");
    $query->execute();
    while ($row = $query->fetch(PDO::FETCH_OBJ)) {
        echo "ID:" . $row->id . "<br>";
        echo "Nome:" . $row->nome . "<br>";
        echo "Data Nascimento:" . $row->datanasc . "<br>";
        echo "Genero:" . $row->genero . "<hr><br>";
    }
}
//ver um atleta XML
function atletaxml($id)
{
    header('Content-Type: text/xml');
    global $ligacao;
    $ligacao->query("SET NAMES utf8");
    $query = $ligacao->prepare("select * from atletas where id=$id");
    $query->execute();
    echo '<?xml version="1.0" encoding="UTF-8"?>';
    echo "<atletas>";
    while ($row = $query->fetch(PDO::FETCH_OBJ)) {
        echo "<atleta>";
        echo "<id>" . $row->id . "</id>";
        echo "<nome>" . $row->nome . "</nome>";
        echo "<dataNascimento>" . $row->datanasc . "</dataNascimento>";
        echo "<genero>" . $row->genero . "</genero>";
        echo "</atleta>";
    }
    echo "</atletas>";
}
//ver um atleta JSON
function atletajson($id)
{
    header('Content-Type: application/json');
    global $ligacao;
    $ligacao->query("SET NAMES utf8");
    $query = $ligacao->prepare("select * from atletas where id=$id");
    $query->execute();
    $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($resultado);
    echo $json;
}
//CREATE
//inserir nova aula html
function novaaula($data, $hora, $tipo, $instrutor, $numAlunos)
{
    //servidorsurf.php?comando=novaaula&data=2022-07-04&hora=12:30:00&tipo=grupo&instrutor=MarceloTribuna&numalunos=5
    global $ligacao;
    $ligacao->query("SET NAMES utf8");
    $query = $ligacao->prepare("insert into aulas (dia,hora,tipo,instrutor,numAlunos) values('$data','$hora','$tipo','$instrutor',$numAlunos)");
    $query->execute();
    if ($query->rowCount() > 0) {
        echo "<div id='estado'>Registo inserido com sucesso!!!</div>";
    } else {
        echo "<div id='estado'>Erro na insercao do registo</div>";
    }
}
//inserir novo aluguer html
function novoaluguer($cliente, $cc, $tipo, $idprod, $duracao)
{
    //servidorsurf.php?comando=novoaluguer&cliente=Ze Dias&cc=4553ffd343&tipo=Prancha&idprod=1232&duracao=6 horas
    global $ligacao;
    $ligacao->query("SET NAMES utf8");
    $query = $ligacao->prepare("insert into aluguer (cliente,cc,tipoprod,idprod,duracao) values('$cliente','$cc','$tipo','$idprod','$duracao')");
    $query->execute();
    if ($query->rowCount() > 0) {
        echo "Registo inserido com sucesso!!!";
    } else {
        echo "Erro na insercao do registo";
    }
}
//inserir novo instrutor html
function novoinstrutor($nome, $nivel, $idade, $cc, $numfederado)
{
    //servidorsurf.php?comando=novoinstrutor&nome=Ze Dias&nivel=4553ffd343&idade=23&cc=1232232ss232&numfederado=645465
    global $ligacao;
    $ligacao->query("SET NAMES utf8");
    $query = $ligacao->prepare("insert into instrutores (nome,nivel,dataNasc,cc,numfederado) values('$nome','$nivel','$idade','$cc','$numfederado')");
    $query->execute();
    if ($query->rowCount() > 0) {
        echo "Registo inserido com sucesso!!!";
    } else {
        echo "Erro na insercao do registo";
    }
}
//inserir novo atleta html
function novoatleta($nome, $datanasc, $genero)
{
    //servidorsurf.php?comando=novoatleta&nome=Ze Dias&datanasc=2002-07-04&genero=Masc
    global $ligacao;
    $ligacao->query("SET NAMES utf8");
    $query = $ligacao->prepare("insert into atletas (nome,datanasc,genero) values('$nome','$datanasc','$genero')");
    $query->execute();
    if ($query->rowCount() > 0) {
        echo "Registo inserido com sucesso!!!";
    } else {
        echo "Erro na insercao do registo";
    }
}
//inserir novo resultado html
function novoresultado($atleta, $escalao, $comp, $posicao, $descricao)
{
    //servidorsurf.php?comando=novoresultado&atleta=Ze Dias&escalao=sub-18&comp=1 etapa Inter-Socios Aveiro&posicao=2 lugar&descricao=asdasfavsadasd
    global $ligacao;
    $ligacao->query("SET NAMES utf8");
    $query = $ligacao->prepare("insert into resultadoscomp (atleta,escalao,competicao,posicao,descricao) values('$atleta','$escalao','$comp','$posicao','$descricao')");
    $query->execute();
    if ($query->rowCount() > 0) {
        echo "Registo inserido com sucesso!!!";
    } else {
        echo "Erro na insercao do registo";
    }
}
//UPDATE
//edita aula html
function alteraaula($id, $data, $hora, $tipo, $instrutor, $numAlunos)
{
    //servidorsurf.php?comando=editaaula&data=2022-07-04&hora=14:30:00&tipo=grupo&instrutor=Marcelo Tribuna&numalunos=4&id=4
    global $ligacao;
    $ligacao->query("SET NAMES utf8");
    $query = $ligacao->prepare("UPDATE aulas SET dia='$data',hora='$hora',tipo='$tipo',instrutor='$instrutor',numAlunos='$numAlunos' WHERE id=$id");
    $query->execute();
    if ($query->rowCount() > 0) {
        echo "Registo atualizado com sucesso !";
    } else {
        echo "Não foi possível atualizar o Registo !";
    }
}
//edita aluguer html
function alteraaluguer($id, $cliente, $cc, $tipoProd, $idProd, $duracao)
{
    //servidorsurf.php?comando=editaaluguer&cliente=Marcelo Tribuna&cc=12345ggv3434&tipoprod=Fato Janga&idprod=124&duracao=1 dia&id=5
    global $ligacao;
    $ligacao->query("SET NAMES utf8");
    $query = $ligacao->prepare("UPDATE aluguer SET cliente='$cliente',cc='$cc',tipoprod='$tipoProd',idprod='$idProd',duracao='$duracao' WHERE id=$id");
    $query->execute();
    if ($query->rowCount() > 0) {
        echo "Registo atualizado com sucesso !";
    } else {
        echo "Não foi possível atualizar o Registo !";
    }
}
//edita instrutor html
function alterainstrutor($id, $nome, $nivel, $idade, $cc, $numFed)
{
    //servidorsurf.php?comando=editainstrutor&nome=Marcelo Tribuna&nivel=5&idade=26&cc=12345ggv3434&numfed=12433&id=4
    global $ligacao;
    $ligacao->query("SET NAMES utf8");
    $query = $ligacao->prepare("UPDATE instrutores SET nome='$nome',nivel='$nivel',dataNasc='$idade',cc='$cc',numfederado='$numFed' WHERE id=$id");
    $query->execute();
    if ($query->rowCount() > 0) {
        echo "Registo atualizado com sucesso !";
    } else {
        echo "Não foi possível atualizar o Registo !";
    }
}
//edita atleta html
function alteraatleta($id, $nome, $dataNasc, $gen)
{
    //servidorsurf.php?comando=editaatleta&nome=Andre Silva&datanasc=2000-07-04&gen=Masc&id=3
    global $ligacao;
    $ligacao->query("SET NAMES utf8");
    $query = $ligacao->prepare("UPDATE atletas SET nome='$nome',datanasc='$dataNasc',genero='$gen' WHERE id=$id");
    $query->execute();
    if ($query->rowCount() > 0) {
        echo "Registo atualizado com sucesso !";
    } else {
        echo "Não foi possível atualizar o Registo !";
    }
}
//edita resultado comp html
function alteraresultado($id, $atleta, $escalao, $comp, $posicao, $descricao)
{
    //servidorsurf.php?comando=editaresultado&atleta=Andre Silva&escalao=Open&comp=1 etapa Regional Peniche&posicao=12 lugar&descricao=ssdascqw sdasdasdwaq&id=3
    global $ligacao;
    $ligacao->query("SET NAMES utf8");
    $query = $ligacao->prepare("UPDATE resultadoscomp SET atleta='$atleta',escalao='$escalao',competicao='$comp',posicao='$posicao',descricao='$descricao' WHERE id=$id");
    $query->execute();
    if ($query->rowCount() > 0) {
        echo "Registo atualizado com sucesso !";
    } else {
        echo "Não foi possível atualizar o Registo !";
    }
}
//DELETE
//apagar aula html
function apagaaula($id)
{
    global $ligacao;
    $ligacao->query("SET NAMES utf8");
    $query = $ligacao->prepare("delete from aulas where id=$id");
    $query->execute();
    if ($query->rowCount() > 0) {
        echo "Registo apagado com sucesso!!!";
    } else {
        echo "Erro na eliminacao do registo";
    }
}
//apagar aluguer html
function apagaaluguer($id)
{
    global $ligacao;
    $ligacao->query("SET NAMES utf8");
    $query = $ligacao->prepare("delete from aluguer where id=$id");
    $query->execute();
    if ($query->rowCount() > 0) {
        echo "Registo apagado com sucesso!!!";
    } else {
        echo "Erro na eliminacao do registo";
    }
}
//apagar instrutor html
function apagainstrutor($id)
{
    global $ligacao;
    $ligacao->query("SET NAMES utf8");
    $query = $ligacao->prepare("delete from instrutores where id=$id");
    $query->execute();
    if ($query->rowCount() > 0) {
        echo "Registo apagado com sucesso!!!";
    } else {
        echo "Erro na eliminacao do registo";
    }
}
//apagar atleta html
function apagaatleta($id)
{
    global $ligacao;
    $ligacao->query("SET NAMES utf8");
    $query = $ligacao->prepare("delete from atletas where id=$id");
    $query->execute();
    if ($query->rowCount() > 0) {
        echo "Registo apagado com sucesso!!!";
    } else {
        echo "Erro na eliminacao do registo";
    }
}
//apagar resultado comp html
function apagaresultado($id)
{
    global $ligacao;
    $ligacao->query("SET NAMES utf8");
    $query = $ligacao->prepare("delete from resultadoscomp where id=$id");
    $query->execute();
    if ($query->rowCount() > 0) {
        echo "Registo apagado com sucesso!!!";
    } else {
        echo "Erro na eliminacao do registo";
    }
}
//COMANDOS
$comando = $_GET["comando"];
if ($comando == "home")
    homepage();
//comandos ver todos html
if ($comando == "veraulas") {
    listaaulas();
}
if ($comando == "veralugueres") {
    listaalugueres();
}
if ($comando == "verinstrutores") {
    listainstrutores();
}
if ($comando == "verresultados") {
    listaresultados();
}
if ($comando == "veratletas") {
    listaatletas();
}
//comandos ver todos XML
if ($comando == "veraulasxml") {
    listaaulasxml();
}
if ($comando == "veralugueresxml") {
    listaalugueresxml();
}
if ($comando == "verinstrutoresxml") {
    listainstrutoresxml();
}
if ($comando == "verresultadosxml") {
    listaresultadosxml();
}
if ($comando == "veratletasxml") {
    listaatletasxml();
}
//comandos ver todos JSON
if ($comando == "veraulasjson") {
    listaaulasjson();
}
if ($comando == "veralugueresjson") {
    listaalugueresjson();
}
if ($comando == "verinstrutoresjson") {
    listainstrutoresjson();
}
if ($comando == "verresultadosjson") {
    listaresultadosjson();
}
if ($comando == "veratletasjson") {
    listaatletasjson();
}
//comandos ver um XML
if ($comando == "veraulaxml") {
    $id = $_GET["id"];
    aulaxml($id);
}
if ($comando == "veraluguerxml") {
    $id = $_GET["id"];
    aluguerxml($id);
}
if ($comando == "verinstrutorxml") {
    $id = $_GET["id"];
    instrutorxml($id);
}
if ($comando == "verresultadoxml") {
    $id = $_GET["id"];
    resultadoxml($id);
}
if ($comando == "veratletaxml") {
    $id = $_GET["id"];
    atletaxml($id);
}

//comandos ver um html
if ($comando == 'veraula') {
    $id = $_GET["id"];
    listaaula($id);
}
if ($comando == 'veraluguer') {
    $id = $_GET["id"];
    listaaluguer($id);
}
if ($comando == 'verinstrutor') {
    $id = $_GET["id"];
    listainstrutor($id);
}
if ($comando == 'verresultado') {
    $id = $_GET["id"];
    listaresultado($id);
}
if ($comando == 'veratleta') {
    $id = $_GET["id"];
    listaatleta($id);
}
//comandos ver um JSON
if ($comando == "veraulajson") {
    $id = $_GET["id"];
    aulajson($id);
}
if ($comando == "veraluguerjson") {
    $id = $_GET["id"];
    aluguerjson($id);
}
if ($comando == "verinstrutorjson") {
    $id = $_GET["id"];
    instrutorjson($id);
}
if ($comando == "verresultadojson") {
    $id = $_GET["id"];
    resultadojson($id);
}
if ($comando == "veratletajson") {
    $id = $_GET["id"];
    atletajson($id);
}
//comando para inserir registos
if ($comando == 'novaaula') {
    $data = $_GET["data"];
    $hora = $_GET["hora"];
    $tipo = $_GET["tipo"];
    $instrutor = $_GET["instrutor"];
    $numAlunos = $_GET["numalunos"];
    novaaula($data, $hora, $tipo, $instrutor, $numAlunos);
}
if ($comando == 'novoaluguer') {
    $cliente = $_GET["cliente"];
    $cc = $_GET["cc"];
    $tipo = $_GET["tipo"];
    $idprod = $_GET["idprod"];
    $duracao = $_GET["duracao"];
    novoaluguer($cliente, $cc, $tipo, $idprod, $duracao);
}
if ($comando == 'novoinstrutor') {
    $nome = $_GET["nome"];
    $nivel = $_GET["nivel"];
    $idade = $_GET["idade"];
    $cc = $_GET["cc"];
    $numfederado = $_GET["numfederado"];
    novoinstrutor($nome, $nivel, $idade, $cc, $numfederado);
}
if ($comando == 'novoatleta') {
    $nome = $_GET["nome"];
    $datanasc = $_GET["datanasc"];
    $genero = $_GET["genero"];
    novoatleta($nome, $datanasc, $genero);
}
if ($comando == 'novoresultado') {
    $atleta = $_GET["atleta"];
    $escalao = $_GET["escalao"];
    $comp = $_GET["comp"];
    $posicao = $_GET["posicao"];
    $descricao = $_GET["descricao"];
    novoresultado($atleta, $escalao, $comp, $posicao, $descricao);
}
//comandos para alterar registos
if ($comando == 'editaaula') {
    $id = $_GET["id"];
    $data = $_GET["data"];
    $hora = $_GET["hora"];
    $tipo = $_GET["tipo"];
    $instrutor = $_GET["instrutor"];
    $numAlunos = $_GET["numalunos"];
    alteraaula($id, $data, $hora, $tipo, $instrutor, $numAlunos);
}
if ($comando == 'editaaluguer') {
    $id = $_GET["id"];
    $cliente = $_GET["cliente"];
    $cc = $_GET["cc"];
    $tipoProd = $_GET["tipoprod"];
    $idProd = $_GET["idprod"];
    $duracao = $_GET["duracao"];
    alteraaluguer($id, $cliente, $cc, $tipoProd, $idProd, $duracao);
}
if ($comando == 'editainstrutor') {
    $id = $_GET["id"];
    $nome = $_GET["nome"];
    $nivel = $_GET["nivel"];
    $idade = $_GET["idade"];
    $cc = $_GET["cc"];
    $numFed = $_GET["numfed"];
    alterainstrutor($id, $nome, $nivel, $idade, $cc, $numFed);
}
if ($comando == 'editaatleta') {
    $id = $_GET["id"];
    $nome = $_GET["nome"];
    $dataNasc = $_GET["datanasc"];
    $gen = $_GET["gen"];
    alteraatleta($id, $nome, $dataNasc, $gen);
}
if ($comando == 'editaresultado') {
    $id = $_GET["id"];
    $atleta = $_GET["atleta"];
    $escalao = $_GET["escalao"];
    $comp = $_GET["comp"];
    $posicao = $_GET["posicao"];
    $descricao = $_GET["descricao"];
    alteraresultado($id, $atleta, $escalao, $comp, $posicao, $descricao);
}
//comandos para apagar registos
if ($comando == 'apagaaula') {
    $id = $_GET["id"];
    apagaaula($id);
}
if ($comando == 'apagaaluguer') {
    $id = $_GET["id"];
    apagaaluguer($id);
}
if ($comando == 'apagainstrutor') {
    $id = $_GET["id"];
    apagainstrutor($id);
}
if ($comando == 'apagaatleta') {
    $id = $_GET["id"];
    apagaatleta($id);
}
if ($comando == 'apagaresultado') {
    $id = $_GET["id"];
    apagaresultado($id);
}
