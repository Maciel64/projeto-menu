<?php

    function delete ($table, $fieldToBeCompare, $valueToCompare) {
        try {
            $connection = connect();

            $sql = "DELETE FROM $table WHERE $fieldToBeCompare = $valueToCompare;";

            $prepare = $connection->prepare($sql);
            
            return $prepare->execute();

        } catch (PDOException $e) {
            var_dump($e);
        }
    }

?>