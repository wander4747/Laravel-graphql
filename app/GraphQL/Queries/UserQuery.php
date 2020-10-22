<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\User;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;
use Rebing\GraphQL\Support\Facades\GraphQL as GraphQL;

class UserQuery extends Query
{
    protected $attributes = [
        'name' => 'user',
        'description' => 'A query'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('user'));
    }

    public function args(): array
    {
        return [
            'id' => [
                'type' => Type::int(),
                'description' => 'ID user'
            ],
            'paginate' => [
                'type' => Type::int(),
                'description' => 'Count register'
            ],
            'page' => [
                'type' => Type::int(),
                'description' => 'Count page'
            ],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        /** @var SelectFields $fields */
        //$fields = $getSelectFields();
        //$select = $fields->getSelect();
        //$with = $fields->getRelations();

        if (isset($args['id'])) {
            return User::where('id', $args['id'])->get();
        }
        if (isset($args['paginate'])) {
            $page = 1;
            if (isset($args['page'])) {
                $page = $args['page'];
            }
            return User::paginate($args['paginate'], ['*'], 'page', $page);
        }

        return User::all();
    }
}
