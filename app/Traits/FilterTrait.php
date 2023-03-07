<?php
namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Support\Utils;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\ApplicationCollection;

trait FilterTrait
{
    static public function filter($clauses, $queryParams)
    {

        $where = $clauses['where'];
        $orderBy = $clauses['order_by'];
        $perPage = isset($queryParams['per_page']) ? $queryParams['per_page'] : 10;

        $results = self::where($where)->when(
            !empty($orderBy),
            function ($query) use ($orderBy) {
                foreach ($orderBy as $order) {
                    $query->orderBy(...$order);
                }
            }
        )->paginate($perPage);

        return new ApplicationCollection($results);
    }
}
