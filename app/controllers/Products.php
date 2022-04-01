<?php

    namespace app\controllers;

    class Products {

        /**
         * RENDER
         */


        function index ($site) {

            $products = findAllBy("products", $site->id, "site_id");

            return [
                "body" => TEMPLATE_PATH . "/products/index.php",
                "products" => $products
            ];
        }


        /**
         * PAGES
         */

        function novo ($params) {

            $site = findBy("sites", $params["site"], "slug");

            return [
                "view" => "templates/products/new.php",
                "data" => [
                    "title" => "Novo produto | {$site->name}",
                    "site" => $site
                ]
            ];
        }


        function editar ($params) {

            $site = findBy("sites", $params["site"], "slug");
            $product = findBy("products", $params["produto"], "id");

            return [
                "view" => "templates/products/edit.php",
                "data" => [
                    "title" => "Editar o produto {$product->name} | {$site->name}",
                    "site" => $site,
                    "product" => $product
                ]
            ];
        }


        function remover ($params) {

            $site = findBy("sites", $params["site"], "slug");
            $product = findBy("products", $params["produto"], "id");

            return [
                "view" => "templates/products/remove.php",
                "data" => [
                    "title" => "Remover o produto {$product->name} | {$site->name}",
                    "site" => $site,
                    "product" => $product
                ]
            ];

        }

        /**
         * AUTH
         */

        function new ($params) {

            $validate = validate([
                "name" => "required",
                "description" => "required",
                "price" => "required",
                "photo" => "upload"
            ]);

            if (!$validate) {
                return redirectWithMessage("/site/{$params["site"]}/produto/novo", "error", "Não deixe campos vazios");
            }

            if (!move_uploaded_file($validate["photo"]["tmp"], UPLOAD_PATH . $validate["photo"]["newName"])) {
                return redirectWithMessage("/site/{$params["site"]}/produto/novo", "error", "Não foi possível fazer upload da foto");
            }

            $validate["photo"] = $validate["photo"]["newName"];


            
            $site = findBy("sites", $params["site"], "slug");
            
            $validate["site_id"] = $site->id;

            $create = create("products", $validate);


            if (!$create) {
                return redirectWithMessage("/site/{$params["site"]}/produto/novo", "error", "Não foi possível criar o produto");
            }

            return redirectWithMessage("/site/{$params["site"]}/produto/novo", "success", "Produto criado com sucesso!");
        }


        function edit ($params) {

            $product = findBy("products", $params["product"], "id");

            $validate = validate([
                "name" => "required",
                "description" => "required",
                "price" => "required",
                "photo" => "upload"
            ], true);
            
            foreach ($validate as $index => $value) {
                if (empty($value)) {
                    $validate[$index] = $product->$index;
                }
            }

            if ($validate["photo"] !== $product->photo) {
                if (!move_uploaded_file($validate["photo"]["tmp"], UPLOAD_PATH . $validate["photo"]["newName"])) {
                    return redirectWithMessage("/site/{$params["site"]}/produto/{$params["produto"]}/editar", "error", "Não foi possível fazer upload da foto");
                }
                
                unlink(UPLOAD_PATH . $product->photo);

                $validate["photo"] = $validate["photo"]["newName"];
            }

            
            $update = update("products", $params["product"], "id", array_keys($validate), array_values($validate));
        
            if (!$update) {
                return redirectWithMessage("/site/{$params["site"]}/produto/{$params["produto"]}/editar", "error", "Não foi possível atualizar o item");
            }

            return redirectWithMessage("/site/{$params["site"]}", "success", "Item atualizado com sucesso!");
        }


        function remove ($params) {

        }
    }

?>