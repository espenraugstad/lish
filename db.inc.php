<?php

class Database {
    // Konfig-detaljer for db
    private $host = '127.0.0.1';
    private $user = 'root';
    private $pass = 'root';
    private $dbname = 'lish';
    private $dsn; // Tilkoblingsstrengen
    private $pdo; // Variabel for PDO-tilkoblingen

    // Konstruktør
    public function __construct() {
        try {

            // Bygger DSN-strengen (Data Source Name) for tilkoblingen
            $this->dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;

            // Oppretter en ny PDO-tilkobling
            $this->pdo = new PDO($this->dsn, $this->user, $this->pass);

            // Setter PDO til å kaste unntak hvis en feil oppstår
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {

            // Håndterer feil ved tilkobling og viser en melding
            echo 'Feil ved tilkobling til databasen: ' . $e->getMessage();
            exit;
        }
    }

    // Getter-metode for å hente PDO-tilkoblingen
    public function getConnection() {
        return $this->pdo; // Returnerer PDO-objektet for å kunne bruke det i andre klasser
    }

    public function emailExists($email){
        // Prepare query
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    public function register($email, $password){
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->pdo->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
        try{
            $stmt->execute();
        } catch(PDOException $e){
            echo "Something went wrong";
            exit();
        }
        
        return $stmt->rowCount() === 0;
    }

    public function authenticate($email, $password){
        try{
            $stmt = $this->pdo->prepare('SELECT UID, password FROM users WHERE email = :email');

            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();

            if($stmt->rowCount() > 0){
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if(password_verify($password, $user['password'])){
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['uid'] = $user['UID'];
                    $_SESSION['email'] = $email;
                    return true;
                } else {
                    return false;
                }
            }

        } catch(PDOException $e){
            echo $e;
        }
    }

    public function addLink($link, $shortCode, $uid){
        try{
            $stmt = $this->pdo->prepare('INSERT INTO links (UID, link, shortCode) VALUES (:uid, :link, :shortCode)');

            $stmt->bindParam(':uid', $uid, PDO::PARAM_INT);
            $stmt->bindParam(':link', $link, PDO::PARAM_STR);
            $stmt->bindParam(':shortCode', $shortCode, PDO::PARAM_STR);

            $stmt->execute();
            return true;

        }catch(PDOException $e){
            echo $e;
        }
    }

    public function getFullLink($shortCode){
        try{
            $stmt = $this->pdo->prepare('SELECT link FROM links WHERE shortCode = :shortCode');
            $stmt->bindParam(':shortCode', $shortCode, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo $e;
        }
    }

}