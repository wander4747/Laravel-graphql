<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class PostType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Post',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID post'
            ],
            'title' => [
                'type' => Type::string(),
                'description' => 'Title post'
            ],
            'active' => [
                'type' => Type::boolean(),
                'description' => 'Status post'
            ]
        ];
    }
}
