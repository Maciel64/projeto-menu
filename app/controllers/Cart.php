<?php

namespace app\controllers;

    class Cart {

        /**
         * PAGES
         */

        function index ($params) {

            $site = findBy("sites", $params["site"], "slug");
            $products = [];

            if(isset($_SESSION["userCart"][$site->slug])) {
                foreach ($_SESSION["userCart"][$site->slug] as $index => $product) {
                    $products[] = $product;
                }
            }

            return [
                "view" => "templates/products/cart.php",
                "data" => [
                    "title" => "Meu carrinho do site {$site->name}",
                    "site" => $site,
                    "products" => $products
                ]
            ];
        }


        /**
         * AUTH
         */


        function add ($params) {
            $site = findBy("sites", $params["site"], "slug");
            $product = findBy("products", $params["product"], "id");
            $category = findBy("categories", $product->category_id, "id");

            if ($site->id !== $category-> site_id) {
                return redirectWithMessage("/site/{$site->slug}", "error", "O produto especificado não existe nesse site");
            }

            if (!isset($_SESSION["userCart"][$site->slug][$product->id])) {
                $product->quantity = 1;
                $_SESSION["userCart"][$site->slug][$product->id] = $product;
            } else {
                $_SESSION["userCart"][$site->slug][$product->id]->quantity += 1;
            }


            return redirectWithMessage("/site/{$site->slug}", "success", "Produto adicionado ao carrinho");
        }
    }
