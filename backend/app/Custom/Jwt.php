<?php

namespace App\Custom;

use App\Models\User;
use Firebase\JWT\JWT as JWTFIREBASE;

class Jwt
{
    public static function validate()
    {

    }
    public static function create(User $data)
    {
        $key = $_ENV['JWT_KEY'];

        $payload = [
            'exp' => time() + 1800,
            'iat' => time(),
            'data' => $data
        ];
        return JWTFIREBASE::encode($payload, $key, 'HS256');
    }
}
