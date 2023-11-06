<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreProductVariantRequest;
use App\Http\Requests\Backend\UpdateProductVariantRequest;
use App\Http\Traits\UploadImageTrait;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class ProductVariantsController extends Controller
{
    use UploadImageTrait;
    //
    public function index()
    {
        $product_variants = ProductVariant::all();
        return view('backend.Admin_Dashboard.product_variant.index', compact('product_variants'));
    }

    public function show($id)
    {
        $product_variants = ProductVariant::where('product_id', '=', $id)->get();
        return view('backend.Admin_Dashboard.product_variant.show', compact('product_variants'));
    }


    public function create($product_id)
    {

        $attributes = Attribute::all();
        $attribute_values = AttributeValue::all();
        $product_variants = ProductVariant::where('product_id', '=', $product_id)->get();
        $product =  Product::where('id', '=', $product_id)->first();


        return view(
            'backend.Admin_Dashboard.product_variant.create',
            compact('attributes', 'attribute_values', 'product', 'product_variants')
        );
    }

    public function get_attribute_value($attribute_id)
    {

        $attribute_value = AttributeValue::where('attribute_id', $attribute_id)
            ->pluck('name', 'id');
        return $attribute_value;
    }

    public function store(StoreProductVariantRequest $request)
    {
        // Validate the request data
        $validatedData = $request->validated();
    
        // Process and store the image
        $image = $this->ProcessImage($request, 'image', 'products_variants');
        $validatedData['image'] = $image;
    
        // Find the associated product and store_id
        $product = Product::findOrFail($validatedData['product_id']);
        $validatedData['store_id'] = $product->store_id;
    
        // Create the product variant
        $productVariant = ProductVariant::create($validatedData);
    
        // Prepare the response data
        $responseData = [
            'id' => $productVariant->id,
            'image_url' => $productVariant->image_url,
            'product_name' => $productVariant->product->name,
            'attribute_name' => $productVariant->attribute->name,
            'attribute_value_name' => $productVariant->attribute_value->name,
            'quantity' => $productVariant->quantity,
            'price' => $productVariant->price,
            'compare_price' => $productVariant->compare_price,
            'edit_url' => route('admin.product_variants.edit', $productVariant->id),
            'delete_url' => route('admin.product_variants.destroy', $productVariant->id),
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
            'backend.Admin_Dashboard.product_variant.edit',
            compact('attributes', 'attribute_values', 'product', 'product_variant')
        );
    }
    public function update(UpdateProductVariantRequest $request, $id)
    {
        $productVariant = ProductVariant::find($id);
    
        // Validate the request data
        $validatedData = $request->validated();
    
        // Process and update the image if it's included in the request
        if ($request->hasFile('image')) {
            $image = $this->ProcessImage($request, 'image', 'products_variants');
            $validatedData['image'] = $image;
        }
    
        $productVariant->update($validatedData);
    
        return redirect()->route('admin.product_variants.index');
    }
    
    public function destroy($id)
    {
        
    }
}