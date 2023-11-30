<?php
namespace Attar\App\Rahmatan\Travel\Model;

class LoginModel
{
    private \PDO $connection;
    public function __construct(\PDO $pdo)
    {
        $this->connection = $pdo;
    }

    public function login(string $email, string $password)
    {
        $statement = $this->connection->prepare("SELECT * FROM user WHERE email = ? AND password = ?");
        $statement->execute([
            $email,$password
        ]);

        if($row = $statement->fetch()){
            return $row;
        }else{
            return null;
        }
    }
}