<?php

class Database {

    public $connection = null;

    function __construct()
    {
       $this->connect();
    }

    public function connect()
    {
        $this->connection = new PDO('sqlite:db/upqode.sqlite3');
    }

    public function getUserById($id) {
   		return $this->connection->query(
                "SELECT id, username, email, country_id
                FROM users
                WHERE id = $id"
        )->fetch(PDO::FETCH_ASSOC);
    }

    public function getUsers() {
        return $this->connection->query(
                "SELECT
                    users.id AS user_id,
					users.username,
					users.email,
					users.country_id,
					countries.id AS country_id,
					countries.country
				FROM
					users
				INNER JOIN 
					countries ON users.country_id = countries.id"
        )->fetchAll();
    }

    public function createUser(array $data)
    {
        $query = $this->connection->prepare(
                "SELECT email FROM users WHERE email = :email"
        );
        $query->bindParam(':email', $data['email'], PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetchAll();
        if(count($result) !== 0) {
            header('Location: /register.php?error=email'); exit;
        }

        $query = $this->connection->prepare(
                "INSERT INTO users (
                    username, email, country_id
                ) VALUES (
                    :username, :email, :country
                )"
        );
        $query->bindParam(':username', $data['username'], PDO::PARAM_STR);
        $query->bindParam(':email', $data['email'], PDO::PARAM_STR);
        $query->bindParam(':country', $data['country'], PDO::PARAM_INT);
        $query->execute($data);
    }

    public function editUser(array $data)
    {
        $data = [
            ':username' => $data['username'],
            ':email' => $data['email'],
            ':country' => $data['country'],
            ':id' => $data['id']
        ];

        $query = $this->connection->prepare(
            "UPDATE users SET 
                username = :username,
                email = :email,
                country_id = :country
            WHERE id = :id"
         );
        $query->execute($data);
    }

    public function deleteUser($id) {
        $query = $this->connection->prepare("DELETE FROM users WHERE id = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);   
        $query->execute();
    }

    public function getCountries() {
		return $this->connection->query(
            "SELECT id, country FROM countries"
        )->fetchAll();
    }
}

