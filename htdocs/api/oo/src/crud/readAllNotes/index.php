<?php
require '../../../displayErrors.php';
require '../../../dbConfig.php';
require '../../../apiConfig.php';
require '../../dao/NotesDao.php';

$method = $_SERVER['REQUEST_METHOD'];

if($method === 'GET') {
    $notesDao = new NotesDao($pdo);
    $allNotes = $notesDao->getAllNotes();

    $apiData = $allNotes;

    require '../../return.php';

} else {
    echo "Esta rota só aceita requisições GET!";
}