<?php
require_once __DIR__ . '/../config/db.php';

//$sql -- é basicamente um rascunho do comando Mysql, como se voce escrevesse o código no bloco de notas, ele não faz nada mas está ali
//prepare -- seguindo a lógica do bloco de notas, o prepare seria quando voce copia e cola o código no SGBD
//stmt -- é quando o SGBD já leu o código e esta esperando voce enviar os dados
//execute é quando voce da o enter no código e o SGBD literalmente executa o código

function listar_tarefas(): array
{
    $sql = "SELECT * FROM tarefas ORDER BY id DESC";
    return db()->query($sql)->fetchAll();//oq é fetchAll?
}

function criar_tarefa(string $titulo, ?string $descricao, string $status): int
{
    $sql = "INSERT INTO tarefas (titulo, descricao, status) VALUES (?, ?, ?)";
    $stmt = db()->prepare($sql);
    $stmt->execute([$titulo, $descricao, $status]);
return (int) db()->lastInsertId();//oq é lastInsertId??
}

function buscar_tarefa(int $id): ?array
{
    $sql = "SELECT * FROM tarefas WHERE id = ?";
    $stmt = db()->prepare($sql);
    $stmt->execute([$id]);
    $row = $stmt->fetch();//oq é fetch?
    return $row ?: null;
}

function atualizar_tarefa(int $id, string $titulo, ?string $descricao, string$status): bool
{
    $sql = "UPDATE tarefas SET titulo = ?, descricao = ?, status = ? WHERE id=?";
    $stmt = db()->prepare($sql);
    return $stmt->execute([$titulo, $descricao, $status, $id]);
}

function excluir_tarefa(int $id)
{
    $sql = "DELETE FROM tarefas WHERE id = ?";
    $stmt = db()->prepare($sql);
    return $stmt->execute([$id]);
}