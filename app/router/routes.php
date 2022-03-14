<?php

    return [
        "GET" => [
            "/" => "Home@inicio",
            "/cadastrar" => "Home@cadastrar",
            "/dashboard" => "Home@dashboard",
            "/entrar" => "Home@entrar",
            "/sair" => "Home@sair",

            "/site/novo" => "Site@novo",
            "/site/[a-z]{1,30}" => "Site@inicio",

            "/site/[a-z]{1,30}/produtos/novo" => "Products@novo"
        ],
        
        "POST" => [
            "/login" => "Home@login",
            "/register" => "Home@register",

            "/site/create" => "Site@create",
            "/site/[a-z]{1,30}/product/new" => "Products@new",
        ]
    ];

?>