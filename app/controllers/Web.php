<?php

    namespace app\controllers;

    class Web {

        function home () {

            $products = all("products");


            return [
                "view" => "home.php",
                "data" => [
                    "title" => "Página inicial",
                    "products" => $products
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


        function cadastrar () {
            return [
                "view" => "cadastrar.php",
                "data" => [
                    "title" => "Faça seu cadastro",
                ]
            ];
        }


        function dashboard () {

            $products = all("products");

            return [
                "view" => "dashboard.php",
                "data" => [
                    "title" => "Sua dashboard",
                    "products" => $products
                ]
            ];
        }


        function addProduct () {

            return [
                "view" => "dashboard.php",
                "data" => [
                    "title" => "Adicione um produto"
                ]
            ];

        }
    }