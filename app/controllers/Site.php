<?php

    namespace app\controllers;

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
                return redirectWithMessage("/site/novo", "error", "Não foi possível criar um site novo 1");
            }

            return redirectWithMessage("/dashboard", "success", "Site {$validate["name"]} criado com sucesso!");
        }
    }