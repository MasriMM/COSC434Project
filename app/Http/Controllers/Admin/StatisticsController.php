<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Supplement;
use App\Models\User;
use App\Models\Program;

class StatisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $topSupplements = DB::table('order_supplements')
        ->select('supplement_id', DB::raw('SUM(quantity) as total_quantity'))
        ->groupBy('supplement_id')
        ->orderByDesc('total_quantity')
        ->take(5)
        ->get()
        ->map(function ($item) {
            $supplement = Supplement::find($item->supplement_id);
            return [
                'name' => $supplement?->name ?? 'Unknown',
                'total_quantity' => $item->total_quantity,
            ];
        });

    $topUser = DB::table('orders')
        ->select('user_id', DB::raw('COUNT(*) as total_orders'))
        ->groupBy('user_id')
        ->orderByDesc('total_orders')
        ->first();

    $userOfMonth = $topUser ? User::find($topUser->user_id) : null;

    $likedPrograms = DB::table('program_users')
        ->select('programs_id', DB::raw('COUNT(*) as like_count'))
        ->groupBy('programs_id')
        ->orderByDesc('like_count')
        ->take(5)
        ->get()
        ->map(function ($item) {
            $program = Program::find($item->programs_id);
            return [
                'name' => $program?->name ?? 'Unknown',
                'like_count' => $item->like_count,
            ];
        });

    return view('admin.statistics.index', compact('topSupplements', 'userOfMonth', 'likedPrograms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
