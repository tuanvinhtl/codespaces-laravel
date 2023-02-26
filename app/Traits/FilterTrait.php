<?php
namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Support\Utils;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\ApplicationCollection;

trait FilterTrait
{
    static public function filter($clauses)
    {
        $where = $clauses['where'];
        $orderBy = $clauses['order_by'];

        $results = self::where($where)->when(
            !empty($orderBy),
            function ($query) use ($orderBy) {
                foreach ($orderBy as $order) {
                    $query->orderBy(...$order);
                }
            }
        )->paginate(15);

        return new ApplicationCollection($results);
    }
}
