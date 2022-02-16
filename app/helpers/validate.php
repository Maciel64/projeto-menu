<?php

    function validate (array $validates) {
        $results = [];
        $param = "";

        foreach ($validates as $field => $validate) {
            $results[$field] = (!str_contains($validate, "|")) ?
            singleValidation($validate, $field, $param) :
            multipleValidation($validate, $field, $param);
        }


        if (in_array(false, $results)) {
            return false;
        }


        return $results;
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
            setFlash($field, "Não deixe campos vazios");
            return false;
        }

        return filter_input(INPUT_POST, $field, FILTER_SANITIZE_STRING);
    }


    function email ($field) {
        $isEmailValid = filter_input(INPUT_POST, $field, FILTER_VALIDATE_EMAIL);

        if (!$isEmailValid) {
            setFlash($field, "O campo precisa ser um email válido");
            return false;
        }

        return filter_input(INPUT_POST, $field, FILTER_SANITIZE_STRING);
    }


    function unique ($field, $param) {
        $data = filter_input(INPUT_POST, $field, FILTER_SANITIZE_STRING);
        $user = findBy($param, $data, $field);

        if ($user) {
            setFlash($field, "O valor desse campo já está cadastrado");
            return false;
        }

        return $data;
    }


    function maxlen ($field, $param) {
        $data = filter_input(INPUT_POST, $field, FILTER_SANITIZE_STRING);

        if (strlen($data) > $param) {
            setFlash($field, "O tamanho do campo não pode ser maior que $param");
            return false;
        }

        return $data;
    }


    function equals ($field, $param) {
        $data = filter_input(INPUT_POST, $field, FILTER_SANITIZE_STRING);
        $compare = filter_input(INPUT_POST, $param, FILTER_SANITIZE_STRING);

        if ($data !== $compare) {
            setFlash($field, "Os campos não batem");
            return false;
        }

        return $data;
    }


    function exists ($field, $param) {
        $data = filter_input(INPUT_POST, $field, FILTER_SANITIZE_STRING);
        $exists = findBy($param, $data, "email");

        if(!$exists) {
            setFlash($field, "O valor passado não está cadastrado");
            return false;
        }

        return $data;
    }


    function notExists ($field, $param) {
        $data = filter_input(INPUT_POST, $field, FILTER_SANITIZE_STRING);
        $exists = findBy($param, $data, "email");


        if($exists) {
            setFlash($field, "O valor passado já está cadastrado");
            return false;
        }

        return $data;
    }

?>