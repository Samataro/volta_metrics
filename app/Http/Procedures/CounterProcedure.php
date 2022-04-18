<?php

namespace App\Http\Procedures;

use App\Models\Activity;
use Illuminate\Http\Request;
use Sajya\Server\Procedure;

class CounterProcedure extends Procedure
{
    public static string $name = "counter";

    public function touch(Request $request)
    {
        if (! $request->input('url')) {
            throw new \Exception("The \"url\" param is required");
        }
        if (! $request->input('date')) {
            throw new \Exception("The \"date\" param is required");
        }

        $model = Activity::query()->create([
            "url" => strtolower($request->input('url')),
            "date" => $request->input('date')
        ]);

        return $model->id;
    }

    public function get(Request $request)
    {
        $page = $request->input('page');
        $perpage = $request->input('perpage') ?? 20;

        if (! ($page ?? null)) {
            throw new \Exception("The \"page\" param is required");
        }

        $query = Activity::query()
            ->selectRaw("COUNT(*) as ctr, MAX(date) as last_date, url")
            ->groupBy('url')
            ->orderBy('ctr', 'desc');

        $paginator = $query
            ->paginate($perpage, ['*'], 'page', $page);

        $items = $paginator->items();

        foreach ($items as $key => $item) {
            $items[$key] = $item->only(['url', 'ctr', 'last_date']);
        }

        return [
            "current_page" => $paginator->currentPage(),
            "total" => $paginator->total(),
            "perpage" => $perpage,
            "items" => $items
        ];
    }
}