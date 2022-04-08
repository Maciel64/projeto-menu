<?php

    namespace app\controllers;

    class Home {

        function inicio () {

            return [
                "view" => "home.php",
                "data" => [
                    "title" => "Página inicial",
                ]
            ];
        }


        function entrar () {
            return [
                "view" => "login.php",
                "data" => [
                    "title" => "Faça login",
                    "removeHeader" => true,
                    "removeMain" => true
                ]
            ];
        }


        function sair () {
            unset($_SESSION[LOGGED]);
            return redirectWithMessage("/", "success", "Você saiu de sua sessão com sucesso!");
        }


        function cadastrar () {

            $users = all("users");

            return [
                "view" => "register.php",
                "data" => [
                    "users" => $users,
                    "title" => "Faça seu cadastro",
                    "removeHeader" => true,
                    "removeMain" => true
                ]
            ];
        }


        function dashboard () {

            $site = findBy("sites", $_SESSION[LOGGED]->id, "user_id");


            return [
                "view" => "dashboard.php",
                "data" => [
                    "title" => "Sua dashboard",
                    "site" => $site
                ]
            ];
        }


        /**
         * AUTH
         */


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

            return redirectWithMessage("/entrar", "success", "Cadastrado com sucesso! Agora realize o login");
        }
    }