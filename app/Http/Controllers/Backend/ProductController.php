<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Carbon\Carbon;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Image;
use App\Exports\ProductExport;
use App\Imports\ProductImport;
use Maatwebsite\Excel\Facades\Excel;
use Picqer\Barcode\BarcodeGeneratorPNG;

class ProductController extends Controller
{
    // All Product Page Method
    public function AllProduct()
    {
        $product = Product::latest()->get();
        return view('backend.product.all_product', compact('product'));
    } // End Method

    // Add Product Page Method
    public function AddProduct()
    {
        $product = Product::latest()->get();
        $category = Category::latest()->get();
        $supplier = Supplier::latest()->get();

        return view('backend.product.add_product', compact('product', 'category', 'supplier'));

    } //End Method

    // Store Product Method
    public function StoreProduct(Request $request)
    {

        $pcode = IdGenerator::generate(['table' => 'products', 'field' => 'porduct_code', 'length' =>6, 'prefix' => 'SC']);

        $image = $request->file('productImage');
        $nameGen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); // set photo name (1326491.jpg/png..)
        Image::make($image)->resize(300, 300)->save('upload/product/' . $nameGen);
        $saveUrl = 'upload/product/' . $nameGen;

        Product::insert([
            'product_name' => $request->productName,
            'category_id' => $request->categoryId,
            'supplier_id' => $request->supplierId,
            'porduct_code' => $pcode,
            'product_garage' => $request->productGarage,
            'product_image' => $saveUrl,
            'product_store' => $request->productStore,
            'buying_date' => $request->buyingDate,
            'expire_date' => $request->expireDate,
            'buy_price' => $request->buyingPrice,
            'selling_price' => $request->sellingPrice,
            'created_at' => Carbon::now(),
        ]);
        $noti = [
            'message' => 'Product Add Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('all#product')->with($noti);

    } // End Method

    // Edit Product Method
    public function EditProduct($id)
    {

        $product = Product::findOrFail($id);
        $category = Category::latest()->get();
        $supplier = Supplier::latest()->get();

        return view('backend.product.edit_product', compact('product', 'category', 'supplier'));

    } // End Method

    // Update Product Method
    public function UpdateProduct(Request $request)
    {

        $productId = $request->id;

        if ($request->file('productImage')) {

            $image = $request->file('productImage');
            $nameGen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); // set photo name (1326491.jpg/png..)
            Image::make($image)->resize(300, 300)->save('upload/product/' . $nameGen);
            $saveUrl = 'upload/product/' . $nameGen;

            Product::findOrFail($productId)->update([
                'product_name' => $request->productName,
                'category_id' => $request->categoryId,
                'supplier_id' => $request->supplierId,
                'porduct_code' => $request->productCode,
                'product_garage' => $request->productGarage,
                'product_image' => $saveUrl,
                'product_store' => $request->productStore,
                'buying_date' => $request->buyingDate,
                'expire_date' => $request->expireDate,
                'buy_price' => $request->buyingPrice,
                'selling_price' => $request->sellingPrice,
                'created_at' => Carbon::now(),
            ]);
            $noti = [
                'message' => 'Product Updated Successfully',
                'alert-type' => 'success',
            ];
            return redirect()->route('all#product')->with($noti);

        } else {
            Product::findOrFail($productId)->update([
                'product_name' => $request->productName,
                'category_id' => $request->categoryId,
                'supplier_id' => $request->supplierId,
                'porduct_code' => $request->productCode,
                'product_garage' => $request->productGarage,
                'product_store' => $request->productStore,
                'buying_date' => $request->buyingDate,
                'expire_date' => $request->expireDate,
                'buy_price' => $request->buyingPrice,
                'selling_price' => $request->sellingPrice,
                'created_at' => Carbon::now(),
            ]);
            $noti = [
                'message' => 'Product Update Without Image Successfully',
                'alert-type' => 'success',
            ];
            return redirect()->route('all#product')->with($noti);
        } // end end else
    } // End Method

    // Delete Customer Method
    public function DeleteProduct($id)
    {
        $productImg = Product::find($id);
        $Img = $productImg->product_image;
        unlink($Img);

        Product::findOrFail($id)->delete();
        $noti = [
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('all#product')->with($noti);

    } // End Method

    // Code Product Method
    public function CodeProduct($id)
    {

        $product = Product::findOrFail($id);
        $generator = new BarcodeGeneratorPNG();
        $barcodeData = $generator->getBarcode($product->porduct_code, $generator::TYPE_CODE_128);
        $barcodeImage = base64_encode($barcodeData);
        return view('backend.product.code_product', compact('product', 'barcodeImage'));
    } //End Method

    // Import Product
    public function ImportProduct(){

        return view('backend.product.import_product');
    }// End Method

    // Export Product
    public function ExportProduct(){
        return Excel::download(new ProductExport,'producs.xlsx');
    }// End Method

    // Import Product
    public function Import(Request $request){
        Excel::import(new ProductImport,$request->file('importfile'));

        $noti = [
            'message' => 'Product Import Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('all#product')->with($noti);

    } // End Method


    //Refill Stock Method
    public function refillStock(Request $request)

    {

        $id = $request->productId;
        $quantity = $request->refillStock;

        try {
            $product = Product::findOrFail($id);

            // Update the stock quantity
            $product->product_store += $quantity;

            $product->save();

            $noti = [
                'message' => 'Stock Import Successful',
                'alert-type' => 'success',
            ];

            return redirect()->route('manage#stock')->with($noti);
        } catch (\Exception $e) {
            // Handle the exception or display an error message
            $noti = [
                'message' => 'Error: Stock Import Failed',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($noti);
        }
    }

}
