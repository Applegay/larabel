<?php

namespace App\Http\Controllers\Seller;

use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SellerStoreController extends Controller
{
    //
    public function index()
    {
        return view('seller.store.create');
    }
    public function manage()
    {
        $user_id = Auth::user()->id;
        $stores = Store::where('user_id', $user_id)->get();
        return view('seller.store.manage',compact('stores'));
    }
    public function store(Request $request)
    {
        $validate_data = $request->validate([
            'store_name' => 'unique:stores|max:100|min:3',
            'slug'=> 'required|unique:stores',
            'details'=> 'required',
        ]);

        Store::create([
            'store_name' => $request->store_name,
            'slug' => $request->slug,
            'details' => $request->details,
            'user_id' => Auth::user()->id,

        ]);
        
        return redirect()->back()->with('success', 'Store Created Successfully');
    }

    public function showstore($id)
    {
        $store_info = Store::find($id);
        return view('show.store', compact('store_info'));
    }

    
    public function deletestore($id)
    {
        Store::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Store Deleted Successfully');
    }
}
