<?php

    function validate (array $validates, $edit = false) {
        $results = [];
        $param = "";

        foreach ($validates as $field => $validate) {
            $results[$field] = (!str_contains($validate, "|")) ?
            singleValidation($validate, $field, $param) :
            multipleValidation($validate, $field, $param);
        }
        

        if (!in_array(false, $results) || $edit) {
            return $results;
        }
        
        return false;
    }


    function singleValidation ($validate, $field, $param) {
        if (str_contains($validate, ":")) {
            [$validate, $param] = explode(":", $validate);
        } 
        return $validate($field, $param);
    }


    function multipleValidation ($validate, $field, $param) {
        $values = explode("|", $validate);

        foreach ($values as $validate) {
            if (str_contains($validate, ":")) {
                [$validate, $param] = explode(":", $validate);
            }
            
            $result = $validate($field, $param);

            if (!$result) {
                break;
            }
        }

        return $result;
    }

    
    function required ($field) {
        if (empty($_POST[$field])) {
            return false;
        }

        return filter_input(INPUT_POST, $field, FILTER_DEFAULT);
    }


    function email ($field) {
        $isEmailValid = filter_input(INPUT_POST, $field, FILTER_VALIDATE_EMAIL);

        if (!$isEmailValid) {
            return false;
        }

        return filter_input(INPUT_POST, $field, FILTER_DEFAULT);
    }


    function unique ($field, $param) {
        $data = filter_input(INPUT_POST, $field, FILTER_DEFAULT);
        $user = findBy($param, $data, $field);

        if ($user) {
            return false;
        }

        return $data;
    }


    function maxlen ($field, $param) {
        $data = filter_input(INPUT_POST, $field, FILTER_DEFAULT);

        if (strlen($data) > $param) {
            return false;
        }

        return $data;
    }


    function minlen ($field, $param) {
        $data = filter_input(INPUT_POST, $field, FILTER_DEFAULT);

        if (strlen($data) < $param) {
            return false;
        }

        return $data;
    }


    function equals ($field, $param) {
        $data = filter_input(INPUT_POST, $field, FILTER_DEFAULT);
        $compare = filter_input(INPUT_POST, $param, FILTER_DEFAULT);

        if ($data !== $compare) {
            return false;
        }

        return $data;
    }


    function exists ($field, $param) {
        $data = filter_input(INPUT_POST, $field, FILTER_DEFAULT);
        $exists = findBy($param, $data, "email");

        if(!$exists) {
            return false;
        }

        return $data;
    }


    function notExists ($field, $param) {
        $data = filter_input(INPUT_POST, $field, FILTER_DEFAULT);
        $exists = findBy($param, $data, "email");


        if($exists) {
            return false;
        }

        return $data;
    }


    function upload ($field, $param) {
        $extension = pathinfo($_FILES[$field]["name"], PATHINFO_EXTENSION);

        if (!in_array($extension, array("png", "jpg", "jpeg"))) {
            return false;
        }

        $tmp = $_FILES[$field]["tmp_name"];
        $newName = uniqid() . ".$extension";

        return ["tmp" => $tmp, "newName" => $newName];
    }
?>