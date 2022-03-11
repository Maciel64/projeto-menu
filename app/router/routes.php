<?php

    return [
        "GET" => [
            "/" => "Web@home",
            "/cadastrar" => "Web@cadastrar",
            "/dashboard" => "Web@dashboard",
            "/login" => "Web@login",
            "/logout" => "Web@logout",
            "/site/novo" => "Site@novo"
        ],
        
        "POST" => [
            "/login" => "Auth@login",
            "/register" => "Auth@register",
            "/site/create" => "Site@create"
        ]
    ];

?>