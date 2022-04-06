<?php

    namespace app\controllers;

    class Categories {

        /**
         * PAGES
         */

        function nova ($params) {

            $site = findBy("sites", $params["site"], "slug");

            return [
                "view" => "templates/products/categories/new.php",
                "data" => [
                    "title" => "Criar nova categoria | {$site->name}",
                    "site" => $site
                ]
            ];
        }


        function editar ($params) {

            $site = findBy("sites", $params["site"], "slug");
            $category = findBy("categories", $params["categoria"], "id");

            return [
                "view" => "templates/products/categories/edit.php",
                "data" => [
                    "title" => "Criar nova categoria | {$site->name}",
                    "site" => $site,
                    "category" => $category
                ]
            ];
        }
        

        function remover ($params) {

            $site = findBy("sites", $params["site"], "slug");
            $category = findBy("categories", $params["categoria"], "id");
            $products = findAllBy("products", $category->id, "category_id");

            return [
                "view" => "templates/products/categories/remove.php",
                "data" => [
                    "title" => "Criar nova categoria | {$site->name}",
                    "site" => $site,
                    "category" => $category,
                    "products" => $products,
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
            ]);

            if (!$validate) {
                return redirectWithMessage("/site/{$params["site"]}/categoria/nova", "error", "Não deixe campos vazios");
            }


            $site = findBy("sites", $params["site"], "slug");

            $validate["site_id"] = $site->id;

            $create = create("categories", $validate);

            if (!$create) {
                return redirectWithMessage("/site/{$params["site"]}/categoria/nova", "error", "Não foi possível criar a categoria");
            }

            return redirectWithMessage("/site/{$params["site"]}", "success", "Categoria criada com sucesso!");
        }


        function edit ($params) {
            
            $validate = validate([
                "name" => "required",
                "description" => "required",
            ], true);

            $category = findBy("categories", $params["category"], "id");

            foreach ($validate as $index => $value) {
                if (empty($value)) {
                    $validate[$index] = $category->$index;
                }
            }


            $update = update("categories", $params["category"], "id", array_keys($validate), array_values($validate));

            if (!$update) {
                return redirectWithMessage("/site/{$params["site"]}/categoria/nova", "error", "Não foi possível criar a categoria");
            }

            return redirectWithMessage("/site/{$params["site"]}", "success", "Categoria criada com sucesso!");
        }

        function remove ($params) {
            $category = findBy("categories", $params["category"], "id");

            $remove = delete("categories", "id", $category->id);

            $products = findAllBy("products", $category->id, "category_id");

            foreach ($products as $index => $product) {
                unlink(UPLOAD_PATH . $product->photo);
            }

            if (!$remove) {
                return redirectWithMessage("/site/{$params["site"]}/produto/{$params["product"]}/remover", "error", "Não foi possível apagar a categoria {$category->name}");
            }

            return redirectWithMessage("/site/{$params["site"]}", "success", "Categoria {$category->name} apagada com sucesso!");
        }
    }