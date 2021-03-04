<?php

namespace Caravan\Package\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class PackageKeywordSearch implements Filter
{
    public function __invoke(Builder $query, $search, string $property = '')
    {
        $query->where(function ($q) use ($search) {
            $q->where('package_name', "like", "%{$search}%");
            //$q->orWhere('extra_price', 'like', "%{$search}%");
        });
    }
}
