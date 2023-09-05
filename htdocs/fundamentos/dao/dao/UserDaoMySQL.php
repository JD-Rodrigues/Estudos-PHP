<?php 
require 'models/User.php';


interface UserDao {
    public function findAll();
    public function findById($id);
    public function add(User $user);
    public function update(User $user);
    public function delete($id);
}

class UserDaoMySQL {
    public $pdo;

    public function __construct(PDO $driver) {
        $this->pdo = $driver;
    }

    public function findAll() {
        $array = [];
        $preparedUsers = $this->pdo->prepare("SELECT * FROM usuarios");
        $preparedUsers->execute();
        $users = $preparedUsers->fetchAll();

        foreach($users as $user) {
            
            $u = new User();
            $u->setEmail($user['email']);            
            $u->setPassword($user['senha']);
            $u->setId($user['id']);
            
            $array[] = $u;
        }

        return $array;
    }

    public function findById($id) {
        
    }

    public function add(User $user) {
        $preparedUsers = $this->pdo->prepare("INSERT INTO usuarios (email, senha) VALUES (:email, :senha)");

        $preparedUsers->bindValue(':email', $user->email);
        $preparedUsers->bindValue(':senha', $user->password);
        $preparedUsers->execute();

    }

    public function update(User $user) {
        
    }

    public function delete($id) {
        
    }
}