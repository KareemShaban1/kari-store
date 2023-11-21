<?php

namespace App\Http\Controllers\Backend\Vendor;

use App\Http\Controllers\Controller;
use App\Http\Traits\UploadImageTrait;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductVariantsController extends Controller
{
    use UploadImageTrait;
    //
    public function index()
    {
        $vendor = Auth::user('vendor');
        $productIds = Product::where('store_id', $vendor->store_id)->pluck('id');
        $product_variants = ProductVariant::whereIn('product_id', $productIds)->get();
        // dd($vendor,$productIds);
        return view('backend.dashboards.vendor.product_variant.index', compact('product_variants'));
    }

    public function show($id)
    {
        $product_variants = ProductVariant::where('product_id', '=', $id)->get();
        return view('backend.dashboards.vendor.product_variant.show', compact('product_variants'));
    }


    public function create($product_id)
    {

        $attributes = Attribute::all();
        $attribute_values = AttributeValue::all();
        $product_variants = ProductVariant::where('product_id', '=', $product_id)->get();
        $product =  Product::where('id', '=', $product_id)->first();

        // dd($product);

        return view(
            'backend.dashboards.vendor.product_variant.create',
            compact('attributes', 'attribute_values', 'product', 'product_variants')
        );
    }

    public function get_attribute_value($attribute_id)
    {

        $attribute_value = AttributeValue::where('attribute_id', $attribute_id)
            ->pluck('name', 'id');
        return $attribute_value;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required',
            'attribute_id' => 'required',
            'attribute_value_id' => 'required',
            'sku' => 'required',
            'price' => 'required',
            'compare_price' => 'required',
            'quantity' => 'required',
        ]);
        // $data = $request->all();

        // get requst input array without [image]
        $data = $request->except('image');

        // add 'image' to the input array $data
        $data['image'] = $this->ProcessImage($request, 'image', 'products_variants');
        $data['vendor_id'] = Auth::user('vendor')->id; 
        $product_variant =  ProductVariant::create($data);
        // Prepare the response data
        $responseData = [
            'id' => $product_variant->id,
            'image_url' => $product_variant->image_url,
            'product_name' => $product_variant->product->name,
            'attribute_name' => $product_variant->attribute->name,
            'attribute_value_name' => $product_variant->attribute_value->name,
            'quantity' => $product_variant->quantity,
            'price' => $product_variant->price,
            'compare_price' => $product_variant->compare_price,
            'edit_url' => route('vendor.product_variants.edit', $product_variant->id),
            'delete_url' => route('vendor.product_variants.destroy', $product_variant->id),
        ];

        // Return the response as JSON
        return response()->json($responseData);
    }
    public function edit($id)
    {
        $product_variant = ProductVariant::find($id);
        $attributes = Attribute::all();
        $attribute_values = AttributeValue::all();
        $product =  Product::where('id', '=', $product_variant->product_id)->first();

        return view(
            'backend.dashboards.vendor.product_variant.edit',
            compact('attributes', 'attribute_values', 'product', 'product_variant')
        );
    }
    public function update(Request $request,$id)
    {
        // dd($request->all());
        $product_variant = ProductVariant::find($id);
        $data = $request->except('image');
        // add 'image' to the input array $data
        $data['image'] = $this->ProcessImage($request, 'image', 'products_variants');
        $product_variant->update($data);

        return redirect()->route('vendor.product_variants.index');
    }
    public function destroy()
    {
    }
}