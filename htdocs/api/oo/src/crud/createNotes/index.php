<?php
require '../../../displayErrors.php';
require '../../../dbConfig.php';
require '../../dao/NotesDao.php';

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