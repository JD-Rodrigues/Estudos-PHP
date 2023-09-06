<?php
require '../../displayErrors.php';

class Note {
    private $id;
    private $title;
    private $body;

    function __construct(string $title, string $body, int $id = 0) {
        $this->id = $id;
        $this->title = $title;
        $this->body = $body;
    }

    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getBody() {
        return $this->body;
    }
}

interface NotesDaoInterface {
    public function getAllNotes(Note $noteObject);
    public function getNoteById(int $id);
    public function createNote(Note $noteObject);
    public function updateNote(int $id);
    public function deleteNote(int $id);
}