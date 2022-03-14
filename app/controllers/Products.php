<?php

    namespace app\controllers;

    class Products {

        /**
         * RENDER
         */


        function index($site) {

            $products = findBy("products", $site->id, "site_id");

            return [
                "body" => TEMPLATE_PATH . "/products/index.php",
                "products" => $products
            ];
        }


        /**
         * PAGES
         */

        function novo($params) {

            $site = findBy("sites", $params["site"], "slug");

            return [
                "view" => "templates/products/new.php",
                "data" => [
                    "title" => "Faça login",
                    "site" => $site
                ]
            ];
        }

        /**
         * AUTH
         */

        function new () {
            
        }
    }

?>