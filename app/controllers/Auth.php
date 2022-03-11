<?php

    namespace app\controllers;

    class Auth {


        function login () {
            
            $validate = validate([
                "email" => "required|email|exists:users",
                "passwd" => "required"
            ]);

            if (!$validate) {
                return redirectWithMessage("/login", "error", "Não foi possível realizar o login");
            }

            $user = findBy("users", $validate["email"], "email");


            if (!password_verify($validate["passwd"], $user->passwd)) {
                return redirectWithMessage("/login", "error", "Email ou senha incorretos");
            }

            $_SESSION[LOGGED] = $user;
            return redirectWithMessage("/dashboard", "success", "Login realizado com sucesso!");
        }


        function register () {

            $validate = validate([
                "name" => "required",
                "email" => "email|required|notExists:users",
                "passwd" => "required"
            ]);


            if (!$validate) {
                return redirectWithMessage("/cadastrar", "error", "Dados passados são inválidos ou já estão cadastrados.");
            }

            $validate["passwd"] = password_hash($validate["passwd"], PASSWORD_DEFAULT);

            $create = create("users", $validate);

            if (!$create) {
                return redirectWithMessage("/cadastrar", "error", "Não foi possível realizar o cadastro");
            }

            return redirectWithMessage("/login", "success", "Cadastrado com sucesso! Agora realize o login");
        }
    }

?>