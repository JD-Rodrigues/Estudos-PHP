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
        $rawNotes = $preparedNotes->fetchAll(PDO::FETCH_ASSOC);

        $notes = [];
        
        foreach($rawNotes as $rawNote) {
            $notes[] = ['id'=>$rawNote['id'],'title'=>$rawNote['title']];
        }
        return $notes;
    }

    public function getNoteById(int $id){
        $preparedNote = $this->pdo->prepare("SELECT * FROM notes WHERE id = :id");
        $preparedNote->bindValue(':id', $id);
        $preparedNote->execute();
        $note = $preparedNote->fetch();

        return $note;
    }

    public function createNote(Note $noteObject){
        $preparedNotes = $this->pdo->prepare("INSERT INTO notes (title, body) VALUES (:title, :body)");
        $preparedNotes->bindValue(':title', $noteObject->getTitle());
        $preparedNotes->bindValue(':body', $noteObject->getBody());
        $preparedNotes->execute();
    }

    public function updateNote(Note $noteObject){
        $preparedNotes = $this->pdo->prepare("UPDATE notes SET title = :title, body = :body WHERE id = :id");
        $preparedNotes->bindValue(':title', $noteObject->getTitle());
        $preparedNotes->bindValue(':body', $noteObject->getBody());
        $preparedNotes->bindValue(':id', $noteObject->getId());
        $preparedNotes->execute();
    }

    public function deleteNote(int $id){
        $preparedToDeletion = $this->pdo->prepare("DELETE FROM notes WHERE id = :id");
        $preparedToDeletion->bindValue(':id', $id);
        $preparedToDeletion->execute();
    }
}