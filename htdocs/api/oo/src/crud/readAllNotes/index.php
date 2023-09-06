<?php
require '../../../displayErrors.php';
require '../../../dbConfig.php';
require '../../../apiConfig.php';
require '../../dao/NotesDao.php';

$notesDao = new NotesDao($pdo);
$allNotes = $notesDao->getAllNotes();

$apiData = $allNotes;

require '../../return.php';
