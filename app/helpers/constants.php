<?php

    /**
     * PATHS
     */

    define("ROOT", dirname(__FILE__, 3));
    define("VIEWS_PATH", ROOT . "/app/views/");
    define("UPLOAD_PATH", ROOT . "/public/upload/");
    define("TEMPLATE_PATH", VIEWS_PATH . "templates/");

    define("CONTROLLER_PATH", "app\\controllers\\");

    /**
     * UTILS
     */

    define("LOGGED", "logged");

    /**
     * DATABASE SETTINGS
     */


    // define("DATABASE", [
    //     "server_url" => "db4free.net",
    //     "user" => "estruturatestes",
    //     "passwd" => "estruturavip7!",
    //     "db_name" => "projetomenu"
    // ]);


    define("DATABASE", [
        "server_url" => "localhost",
        "user" => "root",
        "passwd" => "",
        "db_name" => "projetomenu"
    ]);


    define("MAIL", [
        "host" => "smtp.mailtrap.io",
        "port" => "2525",
        "user" => "0f177bc6a33c60",
        "passwd" => "5f7b2d22cbbae5",
        "from_name" => "Maciel",
        "from_mail" => "macielsuassuna14@gmail.com"
    ]);
?>