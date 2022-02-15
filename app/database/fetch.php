<?php

    function all ($table, $fields = "*") {
        $connection = connect();

        $query = $connection->query("SELECT $fields FROM $table");

        return $query->fetchAll();
    }


    function findBy ($table, $value, $field, $fields = "*") {

        $connection = connect();

        $prepare = $connection->prepare("SELECT $fields FROM $table WHERE $field = :$field");
        $prepare->execute([
            $field => $value
        ]);

        return $prepare->fetch();
    }