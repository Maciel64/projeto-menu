<?php

    namespace app\controllers;

    use Exception;

    class Site {
        
        /**
         * PAGES
         */


        function novo () {

            $site = findBy("sites", user()->id, "user_id");

            if ($site) {
                return redirectWithMessage("/dashboard", "error", "Só é possível cadastrar um site");
            }


            return [
                "view" => "site/new.php",
                "data" => [
                    "title" => "Crie seu novo site",
                ]
            ];
        }


        function inicio ($params) {

            $site = findBy("sites", $params["site"], "slug");

            if (!$site) {
                throw new Exception("Site {$params["site"]} não existe}");
            }


            $templateAndPath = CONTROLLER_PATH . ucfirst($site->template);

            
            if (!class_exists($templateAndPath)) {
                redirectWithMessage("/", "error", "O site {$params["site"]} não possui um template válido");
            }


            $template = new $templateAndPath;


            $return = [
                "view" => "templates/{$site->template}/index.php",
                "data" => [
                    "title" => "Bem vindo | {$site->name}",
                    "site" => $site,
                ]
            ];


            $return["data"] = array_merge($return["data"], $template->index($site));


            return $return;
        }


        function editar ($params) {

            $site = findBy("sites", $params["site"], "slug");

            if (!$site) {
                return redirectWithMessage("/", "error", "O site informado não existe");
            }

            return [
                "view" => "site/edit.php",
                "data" => [
                    "title" => "Editar informações | {$site->name}",
                    "site" => $site,
                ]
            ];
        }


        function remover ($params) {

            $site = findBy("sites", $params["site"], "slug");

            if (!$site) {
                return redirectWithMessage("/", "error", "O site informado não existe");
            }

            return [
                "view" => "site/remove.php",
                "data" => [
                    "title" => "Remover | {$site->name}",
                    "site" => $site,
                ]
            ];
        }


        /**
         * AUTHS
         */

        
        function create () {
            $validate = validate([
                "name" => "required",
                "description" => "required|maxlen:255",
                "slug" => "required|maxlen:20"
            ]);

            if (!$validate) {
                return redirectWithMessage("/site/novo", "error", "Não foi possível criar um site novo");
            }

            $validate["user_id"] = user()->id;
            $validate["template"] = "products";

            $create = create("sites", $validate);


            if (!$create) {
                return redirectWithMessage("/site/novo", "error", "Não foi possível criar um site novo");
            }

            return redirectWithMessage("/dashboard", "success", "Site {$validate["name"]} criado com sucesso!");
        }


        function edit ($params) {
            $validate = validate([
                "name" => "required",
                "description" => "required|maxlen:255",
                "slug" => "required|maxlen:20"
            ], true);


            if (!$validate) {
                return redirectWithMessage("/site/{$params["site"]}", "error", "Os dados passados são inválidos");
            }

            $site = findBy("sites", $params["site"], "slug");

            foreach($validate as $index => $value) {
                if (empty($value)) {
                    $validate[$index] = $site[$index];
                }
            }

            $update = update("sites", $site->slug, "slug", array_keys($validate), array_values($validate));

            if (!$update) {
                return redirectWithMessage("/site/{$params["site"]}", "error", "Não foi possível atualizar o site {$site->name}");
            }

            return redirectWithMessage("/site/{$site->slug}", "success", "O site {$site->name} foi atualizado com sucesso!");
        }


        function remove ($params) {
            $site = findBy("sites", $params["site"], "slug");
            $categories = findAllBy("categories", $site->id, "site_id");

            if (!$site) {
                return redirectWithMessage("/", "error", "O site informado não existe");
            }

            $remove = delete("sites", "id", $site->id);
            $remove = delete("categories", "site_id", $site->id);

            foreach ($categories as $index => $category) {
                $remove = delete("products", "category_id", $category->id);
            }

            if (!$remove) {
                return redirectWithMessage("/dashboard", "error", "Não foi possível remover o site {$site->name}");
            }

            return redirectWithMessage("/dashboard", "success", "O site {$site->name} foi apagado com sucesso");
        }
    }