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
            
            "/site/[a-z]{1,30}/categoria/nova" => "Categories@nova",
            "/site/[a-z]{1,30}/categoria/[0-9]+/editar" => "Categories@editar",
            "/site/[a-z]{1,30}/categoria/[0-9]+/remover" => "Categories@remover",

            "/site/[a-z]{1,30}/categoria/[0-9]+/produto/novo" => "Products@novo",

            "/site/[a-z]{1,30}/carrinho" => "Cart@index",
            
            "/site/[a-z]{1,30}/produto/[0-9]+/editar" => "Products@editar",
            "/site/[a-z]{1,30}/produto/[0-9]+/remover" => "Products@remover",

            /**
             * LINK AUTHS
             */

            "/site/[a-z]{1,30}/carrinho/adicionar/produto/[0-9]+" => "Cart@add"
            
        ],
        
        "POST" => [
            "/login" => "Home@login",
            "/register" => "Home@register",

            "/site/create" => "Site@create",

            
            "/site/[a-z]{1,30}/category/new" => "Categories@new",
            "/site/[a-z]{1,30}/category/[0-9]+/edit" => "Categories@edit",
            "/site/[a-z]{1,30}/category/[0-9]+/remove" => "Categories@remove",
            
            "/site/[a-z]{1,30}/category/[0-9]+/product/new" => "Products@new",

            "/site/[a-z]{1,30}/product/[0-9]+/edit" => "Products@edit",
            "/site/[a-z]{1,30}/product/[0-9]+/remove" => "Products@remove",
        ]
    ];

?>