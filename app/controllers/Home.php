<?php

    namespace app\controllers;

    class Home {

        function inicio () {

            return [
                "view" => "home.php",
                "data" => [
                    "title" => "Página inicial",
                ]
            ];
        }


        function entrar () {
            return [
                "view" => "login.php",
                "data" => [
                    "title" => "Faça login",
                    "removeHeader" => true,
                    "removeMain" => true
                ]
            ];
        }


        function sair () {
            unset($_SESSION[LOGGED]);
            return redirectWithMessage("/", "success", "Você saiu de sua sessão com sucesso!");
        }


        function cadastrar () {

            $users = all("users");

            return [
                "view" => "register.php",
                "data" => [
                    "users" => $users,
                    "title" => "Faça seu cadastro",
                    "removeHeader" => true,
                    "removeMain" => true
                ]
            ];
        }


        function dashboard () {

            $site = findBy("sites", user()->id, "user_id");

            
            if (!logged()) {
                return redirectWithMessage("/entrar", "error", "Faça login para conectar-se a sua dashboard"); 
            }


            return [
                "view" => "dashboard.php",
                "data" => [
                    "title" => "Sua dashboard",
                    "site" => $site
                ]
            ];
        }


        function recuperar () {
            return [
                "view" => "recovery.php",
                "data" => [
                    "title" => "Recupere sua senha",
                    "removeHeader" => True,
                    "removeMain" => True
                ]
            ];
        }


        function mudar ($params) {

            $user = findBy("users", $params["forget"], "forget");


            if (!$user || !$_SESSION["forget"]) {
                return redirectWithMessage("/", "error", "Você precisa requisitar a troca de senha antes de acessar essa página");
            }

            return [
                "view" => "change.php",
                "data" => [
                    "title" => "Recupere sua senha",
                    "removeHeader" => True,
                    "removeMain" => True
                ]
            ];
        }


        /**
         * AUTH
         */


        function login () {
            
            $validate = validate([
                "email" => "required|email|exists:users",
                "passwd" => "required"
            ]);

            if (!$validate) {
                return redirectWithMessage("/entrar", "error", "Não foi possível realizar o login");
            }

            $user = findBy("users", $validate["email"], "email");


            if (!password_verify($validate["passwd"], $user->passwd)) {
                return redirectWithMessage("/entrar", "error", "Email ou senha incorretos");
            }

            $_SESSION[LOGGED] = $user;
            return redirectWithMessage("/dashboard", "success", "Login realizado com sucesso!");
        }


        function register () {

            $validate = validate([
                "name" => "required",
                "email" => "email|required|notExists:users",
                "passwd" => "required"
            ]);


            if (!$validate) {
                return redirectWithMessage("/cadastrar", "error", "Dados passados são inválidos ou já estão cadastrados.");
            }

            $validate["passwd"] = password_hash($validate["passwd"], PASSWORD_DEFAULT);

            $create = create("users", $validate);

            if (!$create) {
                return redirectWithMessage("/cadastrar", "error", "Não foi possível realizar o cadastro");
            }

            return redirectWithMessage("/entrar", "success", "Cadastrado com sucesso! Agora realize o login");
        }


        function recovery () {
            $validate = validate(["email" => "required|email"]);
            
            if (!$validate) {
                return redirectWithMessage("/recuperar", "error", "Email inválido");
            }

            $user = findBy("users", $validate["email"], "email");

            if (!$user) {
                return redirectWithMessage("/recuperar", "error", "Email não cadastrado no sistema");
            }

            $forget = md5(uniqid(rand(), true));
            $update = update("users", $user->id, "id", ["forget"], [$forget]);

            if (!$update) {
                return redirectWithMessage("/recuperar", "error", "Não foi possível fazer a troca de emails");
            }


            $template = file_get_contents(VIEWS_PATH . "email/recoveryMail.php");
            $template = str_replace(['{name}', '{forget}'], [$user->name, $forget], $template);

            sendMail("Email de recuperação", $template, $user->name, $user->email);

            $_SESSION["forget"] = $forget;
        
            return redirectWithMessage("/", "success", "Verifique sua caixa de mensagens.");
        }


        function change () {
            $validate = validate([
                "passwd" => "required"
            ]);

            if (!$validate) {
                return redirectWithMessage("/mudar/forget/{$_SESSION["forget"]}", "error", "A senha informada é inválida");
            }

            $validate["passwd"] = password_hash($validate["passwd"], PASSWORD_DEFAULT);

            $update = update("users", $_SESSION["forget"], "forget", array_keys($validate), array_values($validate));

            if (!$update) {
                return redirectWithMessage("/mudar/forget/{$_SESSION["forget"]}", "error", "Não foi possível atualizar o banco.");
            }

            return redirectWithMessage("/entrar", "success", "Senha atualizada com sucesso!");
        }
    }