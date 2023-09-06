<?php
require '../../displayErrors.php';
require '../models/Note.php';

class NotesDao implements NotesDaoInterface {
    private $pdo;

    function __construct(PDO $driver){
        $this->pdo = $driver;
    }

    public function getAllNotes(Note $noteObject){

    }

    public function getNoteById(int $id){

    }

    public function createNote(Note $noteObject){

    }

    public function updateNote(int $id){

    }

    public function deleteNote(int $id){

    }
}