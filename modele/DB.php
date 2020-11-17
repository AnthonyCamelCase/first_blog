<?php
class DB
{
    public function connect()
    {
        // on récupère une BDD
        $dsn = 'mysql:host=localhost;dbname=blog;'; 
        $user = 'root'; 
        $password = ''; 
        try 
        { 
            return new PDO($dsn, $user, $password); 
        } 
        catch (PDOException $e) 
        { 
            echo 'Connection failed: ' . $e->getMessage(); 
        }
    }
}