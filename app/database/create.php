<?php

    function create ($table, $fields) {
        try {
            $connection = connect();

            $sql = "INSERT INTO `$table` (`";
            $sql .= implode("`, `", array_keys($fields)) . "`) VALUES (:";
            $sql .= implode(", :", array_keys($fields)) . ")";


            $prepare = $connection->prepare($sql);
            
            return $prepare->execute($fields);

        } catch (PDOException $e) {
            var_dump($e);
        }
    }

?>