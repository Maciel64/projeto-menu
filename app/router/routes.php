<?php

    return [
        "GET" => [

            "/" => "Home@inicio",
            "/cadastrar" => "Home@cadastrar",
            "/dashboard" => "Home@dashboard",
            "/entrar" => "Home@entrar",
            "/sair" => "Home@sair",
            "/recuperar" => "Home@recuperar",
            "/mudar/forget/[a-z0-9]+" => "Home@mudar",

            "/site/novo" => "Site@novo",
            "/site/[a-z]{1,30}" => "Site@inicio",
            "/site/[a-z]{1,30}/editar" => "Site@editar",
            "/site/[a-z]{1,30}/remover" => "Site@remover",
            "/site/[a-z]{1,30}/dashboard" => "Site@dashboard",

            
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

            "/site/[a-z]{1,30}/cart/add/product/[0-9]+" => "Cart@add",
            "/site/[a-z]{1,30}/cart/remove/product/[0-9]+" => "Cart@remove"
        ],
        
        "POST" => [
            "/login" => "Home@login",
            "/register" => "Home@register",
            "/recovery" => "Home@recovery",
            "/change" => "Home@change",

            "/site/create" => "Site@create",
            "/site/[a-z]{1,30}/edit" => "Site@edit",
            "/site/[a-z]{1,30}/remove" => "Site@remove",
            "/site/[a-z]{1,30}/dashboard" => "Site@editDashboard",
            
            "/site/[a-z]{1,30}/category/new" => "Categories@new",
            "/site/[a-z]{1,30}/category/[0-9]+/edit" => "Categories@edit",
            "/site/[a-z]{1,30}/category/[0-9]+/remove" => "Categories@remove",
            
            "/site/[a-z]{1,30}/category/[0-9]+/product/new" => "Products@new",

            "/site/[a-z]{1,30}/product/[0-9]+/edit" => "Products@edit",
            "/site/[a-z]{1,30}/product/[0-9]+/remove" => "Products@remove",

            "/site/[a-z]{1,30}/payment" => "Products@payment",

            /**
             * AUTHS to PAGES
             */

            "/site/[a-z]{1,30}/pagamento" => "Products@pagamento",
        ]
    ];
?>