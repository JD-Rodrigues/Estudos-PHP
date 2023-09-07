<?php
require '../../../displayErrors.php';
require '../../../dbConfig.php';
require '../../dao/NotesDao.php';

$method = $_SERVER['REQUEST_METHOD'];


if($method === 'PUT'){
    parse_str(file_get_contents('php://input'), $input);
    

    $id = $input['id'];
    $title = $input['title'];
    $body = $input['body'];
    
    if($id && $title && $body) {
        $dao = new NotesDao($pdo);
        $noteExists = $dao->getNoteById($id);       

        if($noteExists) {
            $noteObject = new Note($title, $body, $id);

            $notesDao = new NotesDao($pdo);
            $notesDao->updateNote($noteObject);
            
        } else {
            echo "Não há nota com o id informado na base de dados.";
        }
    } else {
        echo "Passe todas as informações.";
    }
} else {
    echo "Esta rota só aceita requisições PUT.";
}