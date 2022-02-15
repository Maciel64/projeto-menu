<?php

    function connect() {
        try {
            $db = new PDO("mysql:host=localhost;dbname=projeto_menu", "root", "");
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

            return $db;
    
        } catch (PDOException $e) {
            echo "Erro na conexão do BD";
        }
    }

?>