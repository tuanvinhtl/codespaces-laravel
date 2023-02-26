<?php
namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Support\Utils;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\ApplicationCollection;

trait FilterTrait
{
    public function filter(Request $request)
    {
        $where = $request->input(('clauses.where'));
        $orderBy = $request->input(('clauses.order_by'));
        $resource = $request->input(('resource'));

        $results = DB::table($resource)->where($where)->when(
            !empty($orderBy),
            function ($query) use ($orderBy) {
                foreach ($orderBy as $order) {
                    $query->orderBy(...$order);
                }
            }
        )->get();


        return new ApplicationCollection($results);
    }
}
