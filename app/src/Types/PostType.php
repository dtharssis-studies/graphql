<?php

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class PostType extends ObjectType
{
    public function __construct()
    {
        $config = $this->config();
        parent::__construct($config);
    }

    public function config()
    {
        return [
            'name' => 'Post',
            'decription' => 'Exibe um post',
            'fields' => [
                'id' => [
                    'type' => Type::id(),
                ],
                'title' => [
                    'type' => Type::string(),
                ],
                'body' => [
                    'type' => Type::string(),
                ],
            ]
        ];
    }
}