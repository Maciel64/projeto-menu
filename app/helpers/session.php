<?php

    function admin ($site) {
        if (user()) {
            return (user()->id === $site->user_id);
        }
    }
    

    function user () {
        if (isset($_SESSION[LOGGED])) {
            return $_SESSION[LOGGED];
        }
    }


    function logged () {
        return isset($_SESSION[LOGGED]);
    }

?>