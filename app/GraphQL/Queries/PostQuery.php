<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Post;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL as GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class PostQuery extends Query
{
    protected $attributes = [
        'name' => 'PostType',
        'description' => 'A query'
    ];

    public function type(): Type
    {
        return GraphQL::paginate('post');
    }

    public function args(): array
    {
        return [

        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return Post::paginate();
    }
}
