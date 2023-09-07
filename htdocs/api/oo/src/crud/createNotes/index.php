<?php
require '../../../displayErrors.php';
require '../../../dbConfig.php';
require '../../dao/NotesDao.php';

$method = $_SERVER['REQUEST_METHOD'];

if($method === 'POST') {
    $title = trim(filter_input(INPUT_POST, 'title'));
    $body = trim(filter_input(INPUT_POST, 'body'));

    if($title && $body) {
        $noteObject = new Note($title, $body);

        $notesDao = new NotesDao($pdo);
        $notesDao->createNote($noteObject);

        header('location: ../readAllNotes');
    }else {
        header('location: ../../addNoteForm.html');
    }
} else {
    echo 'Esta rota só aceita requisições POST.';
}