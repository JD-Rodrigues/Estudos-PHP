<?php

    class User {
        public $email;
        public $password;
        public $id;

        public function getEmail() {
            return $this->email;
        }

        public function setEmail($mail) {
            $this->email = $mail;
        }

        public function getPassword() {
            return $this->password;
        }

        public function setPassword($pass) {
            $this->password = $pass;
        }

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }
    }