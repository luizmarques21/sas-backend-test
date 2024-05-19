<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreController extends Controller
{

    public function index()
    {
        $stores = Store::all();
        return response()->json([
            'status' => true,
            'stores' => $stores
        ]);
    }

    public function store(Request $request)
    {
        $store = Store::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Store created successfully',
            'store' => $store
        ]);
    }

    public function show(Request $request)
    {
        $store = Store::find($request->id);

        if (is_null($store)) {
            return response()->json([
                'status' => false,
                'message' => 'Store not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'store' => $store
        ]);
    }

    public function update(Request $request, $id)
    {
        $store = Store::find($id);
        $store->name = $request->input('name');
        $store->address = $request->input('address');
        $store->active = $request->input('active');
        $store->save();

        return response()->json([
            'status' => true,
            'message' => 'Store updated successfully',
            'store' => $store
        ]);
    }

    public function destroy(Request $request)
    {
        $store = Store::find($request->id);
        $store->delete();

        return response()->json([
            'status' => true,
            'message' => 'Store deleted successfully'
        ]);
    }
}
