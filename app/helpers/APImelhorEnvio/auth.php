<?php

    function authToken () {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => '{{url}}/oauth/token',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            
            CURLOPT_POSTFIELDS => array(
                'grant_type' => 'authorization_code',
                'client_id' => '{{client_id}}',
                'client_secret' => '{{client_secret}}',
                'redirect_uri' => '{{callback}}',
                'code' => '{{code}}'
            ),

            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'User-Agent: Aplicação (email para contato técnico)'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }