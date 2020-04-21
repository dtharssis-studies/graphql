<?php

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use App\GraphQL\Database\Post;
use App\GraphQL\AppType;

class UserType extends ObjectType
{
    public function __construct()
    {
        $config = $this->config();
        parent::__construct($config);
    }

    public function config()
    {
        return [
            'name' => 'User',
            'decription' => 'Exibe um usuário',
            'fields' => [
                'id' => [
                    'type' => Type::id(),
                ],
                'name' => [
                    'description' => 'Nome do autor',
                    'type' => Type::string(),
                ],
                'email' => [
                    'type' => Type::string(),
                ],
                'posts' => [
                    'description' => 'Artigos escritos por este autor',
                    'type' => Type::listOf(AppType::post())
                ]
            ],
            'resolvedField' => function($value, $args, $context, $info) {
                if ($info->fieldName == 'posts') {
                    return Post::byAuthor($value['id']);
                }
                return $value[$info->fieldName];
            }
        ];
    }
}