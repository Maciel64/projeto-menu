<?php

    namespace app\controllers;

    class Web {

        function home () {

            return [
                "view" => "home.php",
                "data" => [
                    "title" => "Página inicial",
                ]
            ];
        }


        function login () {
            return [
                "view" => "login.php",
                "data" => [
                    "title" => "Faça login",
                ]
            ];
        }


        function logout () {
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
    }