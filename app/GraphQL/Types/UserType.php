<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\User;
use Rebing\GraphQL\Support\Facades\GraphQL as GraphQL;
use PHPUnit\Util\Type as TypeUnit;
use GraphQL\Type\Definition\Type;

use Rebing\GraphQL\Support\Type as GraphQLType;



class UserType extends GraphQLType
{
    protected $attributes = [
        'name' => 'UserType',
        'description' => 'A type for users',
        'model' => User::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID user'
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'Name user'
            ],
            'email' => [
                'type' => Type::string(),
                'description' => 'Email user'
            ],
            'posts' => [
                'type' => Type::listOf(GraphQL::type('post')),
                'description' => 'Posts by user',
                'query' => function ($args, $query) {
                    return $query->where('posts.active', true);
                }
            ]
        ];
    }
}
