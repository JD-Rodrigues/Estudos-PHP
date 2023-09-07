<?php
require '../../../displayErrors.php';
require '../../../dbConfig.php';
require '../../dao/NotesDao.php';
require '../../../apiConfig.php';

$method = $_SERVER['REQUEST_METHOD'];

if($method === 'DELETE'){
    parse_str(file_get_contents('php://input'), $input);    

    $id = $input['id'];    
    
    if($id) {
        $dao = new NotesDao($pdo);
        $noteExists = $dao->getNoteById($id);       

        if($noteExists) {
            $notesDao = new NotesDao($pdo);
            $notesDao->deleteNote($id);

            echo "A nota de id $id foi deletada.";

        } else {
            echo "Não há nota com o id informado na base de dados.";
        }
    } else {
        echo "O id não está sendo informado.";
    }

} else {
    echo "Esta rota só aceita requisições DELETE.";
}