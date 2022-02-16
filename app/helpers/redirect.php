<?php

    function redirect ($to) {
        return header("Location: $to");
    }


    function redirectWithMessage ($to, $index, $message) {
        setFlash($index, $message);
        return redirect($to);
    }

?>