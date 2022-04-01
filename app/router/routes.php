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

            "/site/[a-z]{1,30}/produto/novo" => "Products@novo",
            "/site/[a-z]{1,30}/produto/[0-9]+/editar" => "Products@editar",
            "/site/[a-z]{1,30}/produto/[0-9]+/remover" => "Products@remover"
        ],
        
        "POST" => [
            "/login" => "Home@login",
            "/register" => "Home@register",

            "/site/create" => "Site@create",

            "/site/[a-z]{1,30}/product/new" => "Products@new",
            "/site/[a-z]{1,30}/product/[0-9]+/edit" => "Products@edit",
            "/site/[a-z]{1,30}/product/[0-9]+/remove" => "Products@remove",
        ]
    ];

?>