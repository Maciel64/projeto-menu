<?php

    return [
        "GET" => [
            "/" => "Web@home",
            "/cadastrar" => "Web@cadastrar",
            "/dashboard" => "Web@dashboard",
            "/login" => "Web@login",
            "/logout" => "Web@logout"
        ],
        
        "POST" => [
            "/login" => "Auth@login",
            "/register" => "Auth@register"
        ]
    ];

?>