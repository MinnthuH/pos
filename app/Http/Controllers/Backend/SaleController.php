<?php

namespace App\Http\Controllers\Backend;

use App\Models\Sale;
use App\Models\Product;
use App\Models\OrderDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    // All Sale Method
    public function allSale()
    {
        $sales = Sale::orderBy('id', 'DESC')->get();
        return view('backend.sale.all_sale', compact('sales'));
    } // End Method

    // Detail Sale
    public function detailSale($id)
    {
        $sale = Sale::where('id', $id)->first();
        $saleItem = OrderDetail::with('product')->where('sale_id', $id)->orderBy('id', 'DESC')->get();
        return view('backend.sale.detail_sale', compact('sale', 'saleItem'));
    }// End Method

    public function stockProduct($id){

        $product = OrderDetail::where('sale_id',$id)->get();
        foreach ($product as $item) {
            Product::where('id', $item->product_id)
                ->update(['product_store' => DB::raw('product_store-' . $item->quantity)]);
        }
        return redirect()->route('pos');

    } // End Method
}
