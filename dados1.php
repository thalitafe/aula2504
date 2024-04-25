<?php
require_once "config.php";
$nome = $_POST["nome"];
$email = $_POST["email"];
$contato = $_POST["phone"];
$sexo = $_POST["sexo"];
$curso = $_POST["curso"];
$data_atual = date ("d/m/Y");
$hora_atual = date("H:i:s");

//INSTRUÇÕES PARA INSERIR DADOS NA TABELA
$smtp = $conn->prepare("INSERT INTO alunos(nome, email, phone, sexo, curso, data,hora) values (?,?,?,?,?,?,?)");
$smtp ->bind_param("sssssss", $nome, $email, $contato, $sexo, $curso, $data_atual, $hora_atual);

//Mensagem caso os dados sejam enviados com sucesso!
if($smtp->execute()){
    echo "<h2>Parabéns, $nome, voçê está matriculado no curso de $curso.</h2>";
}
else {
    echo "<h2>Erro no envio de dados. ". $smtp->error."</h2>";
}
$smtp->close();
$conn->close();

?>