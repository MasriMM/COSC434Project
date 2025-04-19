<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;


class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Start the query for orders with related data
        $query = Order::with('orderSupplements.supplement', 'user');

        // Handle search by user name
        if ($request->has('search') && $request->search != '') {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%');
            });
        }

        // Handle sorting by newest or oldest
        if ($request->has('sort')) {
            if ($request->sort === 'oldest') {
                $query->orderBy('created_at', 'asc');
            } else {
                $query->orderBy('created_at', 'desc'); // default to newest first
            }
        } else {
            $query->orderBy('created_at', 'desc'); // default to newest first
        }

        // Fetch orders with pagination to avoid loading too many at once
        $orders = $query->paginate(10)->appends($request->all()); // Ensure filters stay applied during pagination

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Implement creation logic if necessary
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Implement store logic if necessary
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Fetch single order by ID with related order_supplements data and user information
        $order = Order::with('orderSupplements.supplement', 'user')->findOrFail($id);

        return view('admin.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Implement edit logic if necessary
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateStatus(Request $request)
{
    $request->validate([
        'order_id' => 'required|exists:orders,id',
        'status' => 'required|string'
    ]);

    $order = Order::findOrFail($request->order_id);
    $order->status = $request->status;
    $order->save();

    return response()->json(['success' => true, 'message' => 'Order status updated']);
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find and delete order
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully.');
    }
}
