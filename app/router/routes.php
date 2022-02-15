<?php

    return [
        "GET" => [
            "/" => "Web@home",
            "/login" => "Web@login",
            "/cadastrar" => "Web@cadastrar",
            "/dashboard" => "Web@dashboard"
        ],
        
        "POST" => [
            "/login" => "Auth@login"
        ]
    ];

?>