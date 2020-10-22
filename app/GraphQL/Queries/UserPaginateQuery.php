<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\User;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL as GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class UserPaginateQuery extends Query
{
    protected $attributes = [
        'name' => 'UserPaginateQuery',
        'description' => 'Paginated list of users'
    ];

    public function type(): Type
    {
        return GraphQL::paginate('user');
    }

    public function args(): array
    {
        return [
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

        $fields = $getSelectFields();
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        $paginate = 15;

        if (isset($args['paginate'])) {
            $paginate = $args['paginate'];
        }

        $page = 1;
        if (isset($args['page'])) {
            $page = $args['page'];
        }

        return User::with($with)->paginate($paginate, ['*'], 'page', $page);
    }
}
