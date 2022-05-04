<?php

    namespace app\controllers;

    class Products {

        /**
         * RENDER
         */


        function index ($site) {

            $categories = findAllBy("categories", $site->id, "site_id");

            foreach ($categories as $index => $category) {
                $categories[$index]->products = findAllby("products", $category->id, "category_id");
            }


            return [
                "categories" => $categories,
                "removeMain" => "container",
            ];
        }


        /**
         * PAGES
         */

        function pagamento(){
            return [
                "view" => "pagamento.php",
                "data" => [
                    "removeBody" => True,
                    "removeHeader" => True,
                    "title" => "Novo produto | {}"
                    
                ]
            ];
        }

        function novo ($params) {

            $site = findBy("sites", $params["site"], "slug");

            
            if ($site->template !== "products") {
                redirectWithMessage("/", "error", "O site {$site->name} não possui o template de produtos"); 
            }

            
            if (!admin($site)) {
                return redirectWithMessage("/site/{$site->slug}", "error", "Você não possui permissão para acessar essa página");
            }
            
            $category = findBy("categories", $params["categoria"], "id");



            if (!$category || $category->site_id !== $site->id) {
                return redirectWithMessage("/site/{$params["site"]}", "error", "A categoria especificada não existe");
            }

            return [
                "view" => "templates/products/new.php",
                "data" => [
                    "title" => "Novo produto | {$site->name}",
                    "site" => $site,
                    "category" => $category
                ]
            ];
        }


        function editar ($params) {

            $site = findBy("sites", $params["site"], "slug");
            $product = findBy("products", $params["produto"], "id");


            if ($site->template !== "products") {
                redirectWithMessage("/", "error", "O site {$site->name} não possui o template de produtos"); 
            }


            if (!admin($site)) {
                return redirectWithMessage("/site/{$site->slug}", "error", "Você não possui permissão para acessar essa página");
            }


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
                return redirectWithMessage("/site/{$params["site"]}/categoria/{$params["category"]}/produto/novo", "error", "Não deixe campos vazios");
            }

            
            $category = findBy("categories", $params["category"], "id");
            
            $validate["category_id"] = $category->id;

            if (!move_uploaded_file($validate["photo"]["tmp"], UPLOAD_PATH . $validate["photo"]["newName"])) {
                return redirectWithMessage("/site/{$params["site"]}/categoria/{$params["category"]}/produto/novo", "error", "Não foi possível fazer upload da foto");
            }
            
            $validate["photo"] = $validate["photo"]["newName"];

            $create = create("products", $validate);


            if (!$create) {
                return redirectWithMessage("/site/{$params["site"]}/categoria/{$params["category"]}/produto/novo", "error", "Não foi possível criar o produto");
            }

            return redirectWithMessage("/site/{$params["site"]}", "success", "Produto criado com sucesso!");
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
                    return redirectWithMessage("/site/{$params["site"]}/produto/{$params["product"]}/editar", "error", "Não foi possível fazer upload da foto");
                }
                
                unlink(UPLOAD_PATH . $product->photo);

                $validate["photo"] = $validate["photo"]["newName"];
            }

            
            $update = update("products", $params["product"], "id", array_keys($validate), array_values($validate));
        
            if (!$update) {
                return redirectWithMessage("/site/{$params["site"]}/produto/{$params["product"]}/editar", "error", "Não foi possível atualizar o item");
            }

            return redirectWithMessage("/site/{$params["site"]}", "success", "Item atualizado com sucesso!");
        }


        function remove ($params) {

            $product = findBy("products", $params["product"], "id");

            $remove = delete("products", "id", $product->id);

            if (!$remove) {
                return redirectWithMessage("/site/{$params["site"]}/produto/{$params["product"]}/remover", "error", "Não foi possível apagar o produto {$product->name}");
            }

            unlink(UPLOAD_PATH . $product->photo);

            return redirectWithMessage("/site/{$params["site"]}", "success", "Produto {$product->name} apagado com sucesso!");
        }
    }

?>