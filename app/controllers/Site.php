<?php

    namespace app\controllers;

    use Exception;

    class Site {
        
        /**
         * PAGES
         */


        function novo () {
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
                redirectWithMessage("/", "error", "O site {$params["site"]} não possui um template");
            }


            $template = new $templateAndPath;


            $return = [
                "view" => "site/home.php",
                "data" => [
                    "title" => "Crie seu novo site",
                    "site" => $site,
                ]
            ];


            $return["data"] = array_merge($return["data"], $template->index($site));


            return $return;
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


            $create = create("sites", $validate);

            if (!$create) {
                return redirectWithMessage("/site/novo", "error", "Não foi possível criar um site novo ");
            }

            return redirectWithMessage("/dashboard", "success", "Site {$validate["name"]} criado com sucesso!");
        }
    }