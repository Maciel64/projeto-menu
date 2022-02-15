<?php

    namespace app\controllers;

    class Auth {

        function login () {


            $validate = validate([
                "email" => "email|required|exists:user",
                "passwd" => "required|exists:user"
            ]);


            if (!$validate) {
                redirect("/login");
            }

            

        }

    }

?>