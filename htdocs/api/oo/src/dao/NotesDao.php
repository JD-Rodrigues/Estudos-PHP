<?php
require '../../models/Note.php';

class NotesDao implements NotesDaoInterface {
    private $pdo;

    function __construct(PDO $driver){
        $this->pdo = $driver;
    }

    public function getAllNotes(){
        $preparedNotes = $this->pdo->prepare("SELECT * FROM notes");
        $preparedNotes->execute();
        $notes = $preparedNotes->fetchAll(PDO::FETCH_ASSOC);

        return $notes;
    }

    public function getNoteById(int $id){

    }

    public function createNote(Note $noteObject){
        $preparedNotes = $this->pdo->prepare("INSERT INTO notes (title, body) VALUES (:title, :body)");
        $preparedNotes->bindValue(':title', $noteObject->title);
        $preparedNotes->bindValue(':body', $noteObject->body);
        $preparedNotes->execute();
    }

    public function updateNote(int $id){

    }

    public function deleteNote(int $id){

    }
}