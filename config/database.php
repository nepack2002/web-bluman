<?php
     define('DATABASE_SERVER', 'localhost');
     define('DATABASE_USER', 'root');
     define('DATABASE_PASSWORD', '');
     define('DATABASE_NAME', 'grooming');
          try {
               $connection = new PDO(
                    "mysql:host=" . DATABASE_SERVER . ";dbname=".DATABASE_NAME,DATABASE_USER,DATABASE_PASSWORD);
               $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          
          }catch(PDOException $e){
               $error = "connection failed: ". $e->getMessage();
          }