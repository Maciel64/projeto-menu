<?php

    function setFlash($index, $message) {
        if (!isset($_SESSION["flash"][$index])) {
            $_SESSION["flash"][$index] = $message;
        }
    }

    function getFlash($index) {
        if (isset($_SESSION["flash"][$index])) {

            $flash = $_SESSION["flash"][$index];
            unset($_SESSION["flash"][$index]);

            $transcription = [
                "advertise" => [
                    "icon" => "check_circle",
                    "color" => "sky"
                ],
                "success" => [
                    "icon" => "done",
                    "color" => "green"
                ],
                "error" => [
                    "icon" => "warning",
                    "color" => "red"
                ],
            ];

            $color = $transcription[$index]["color"];
            $icon = $transcription[$index]["icon"];

            require "../app/views/partials/messageBox.php";
        }
    }
