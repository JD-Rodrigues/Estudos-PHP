<?php
require '../../../displayErrors.php';
require '../../../dbConfig.php';
require '../../../apiConfig.php';
require '../../dao/NotesDao.php';

$method = $_SERVER['REQUEST_METHOD'];

if($method === 'GET') {
    $id = trim(filter_input(INPUT_GET, 'id'));
    
    $notesDao = new NotesDao($pdo);
    $note = $notesDao->getNoteById($id);

    $apiData = $note;

    require '../../return.php';

} else {
    echo "Esta rota só aceita requisições GET!";
}