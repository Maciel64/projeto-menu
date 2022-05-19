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


    function findAllBy ($table, $value, $field, $fields = "*") {
        $connection = connect();

        $prepare = $connection->prepare("SELECT $fields FROM $table WHERE $field = :$field");
        $prepare->execute([
            $field => $value
        ]);

        return $prepare->fetchAll();
    }


    function findAllByLimit ($table, $value, $field, $offSet, $limit, $fields = "*") {
        $connection = connect();

        $prepare = $connection->prepare("SELECT $fields FROM $table WHERE $field = :$field LIMIT $offSet, $limit");
        $prepare->execute([
            $field => $value
        ]);

        return $prepare->fetchAll();
    }