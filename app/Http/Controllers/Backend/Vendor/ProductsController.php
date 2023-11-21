<?php

namespace App\Http\Controllers\Backend\Vendor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreProductRequest;
use App\Http\Requests\Backend\UpdateProductRequest;
use App\Http\Traits\UploadImageTrait;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use App\Models\Tag;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
    use UploadImageTrait;
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $this->authorize('viewAny',Product::class);
        // dd($this->authorize('viewAny',Product::class));
        $products = Product::with(['category', 'store', 'brand'])
            ->withCount([
                'product_variants' => function ($query) {
                    return $query;
                }
            ])
            ->get();
        // SELECT * FROM products
        // SELECT * FROM categories WHERE id IN (...)
        // SELECT * FROM stores WHERE id IN (....)


        return view('backend.dashboards.vendor.products.index', compact('products'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $vendor = Vendor::where('id', Auth::user('vendor')->id)->first();
        $stores = Store::where('id', $vendor->store_id)->get();
        // $category =  Category::where('id', $store->category_id)->first();
        $categories = Category::all();
        $brands = Brand::all();
        $attributes = Attribute::all();
        return view(
            'backend.dashboards.vendor.products.create',
            compact('categories', 'stores', 'brands', 'attributes')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {

    // Validating the request
    $validated = $request->validated();

    // Process 'slug' only if not provided in the request
    if (!$request->has('slug')) {
        $validated['slug'] = Str::slug($validated['name']);
    }

    // Process the image if provided
    if ($request->hasFile('image')) {
        $validated['image'] = $this->ProcessImage($request, 'image', 'products');
    }

    // dd($validated);

    // Create the product
    $product = Product::create($validated);

    // dd($product);

    // Process tags if available in the request
    if ($request->has('tags')) {
        $tags = json_decode($request->input('tags'));

        if ($tags) {
            $tagIds = [];
            foreach ($tags as $item) {
                $slug = Str::slug($item->value);
                $tag = Tag::firstOrNew(['slug' => $slug], ['name' => $item->value]);
                $tag->save();
                $tagIds[] = $tag->id;
            }
            $product->tags()->sync($tagIds);
        }
    }

        return redirect()->route('vendor.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $product = Product::findOrFail($id);

        return view('backend.dashboards.vendor.products.edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $product = Product::findOrFail($id);
        $vendor = Vendor::where('id', Auth::user('vendor')->id)->first();
        $store = Store::where('id', $vendor->store_id)->first();
        $category = Category::where('id', $store->category_id)->first();
        $brands = Brand::all();
        $attributes = Attribute::all();
        $tags = implode(',', $product->tags()->pluck('name')->toArray());



        return view('backend.dashboards.vendor.products.edit', compact(
            'tags',
            'product',
            'category',
            'store',
            'brands',
            'attributes'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $request->validated();

        $request->merge([
            'slug' => Str::slug($request->post('name'))
        ]);
        // get product old image
        $old_image = $product->image;
        $data = $request->except('image', 'tags');
        $new_image = $this->uploadImage($request, 'image', 'products');
        // dd($new_image);
        if ($new_image) {
            $data['image'] = $new_image;
        }
        $product->update($data);
        // isset => Determine if a variable is declared and is different than NULL
        if ($old_image && $new_image) {
            // Storage::disk('disk_name')->delete('image_path');
            Storage::disk('uploads')->delete($old_image);
        }

        $tags = json_decode($request->post('tags'));
        $tag_ids = [];
        $saved_tags = Tag::all();
        if ($tags) {
            foreach ($tags as $item) {
                $slug = Str::slug($item->value);
                $tag = $saved_tags->where('slug', $slug)->first();
                if (!$tag) {
                    $tag = Tag::create([
                        'name' => $item->value,
                        'slug' => $slug
                    ]);
                }
                $tag_ids[] = $tag->id;
            }
        }

        $product->tags()->sync($tag_ids);


        // $product->tags()->attach($tag_ids);
        // $product->tags()->detach($tag_ids);
        // $product->tags()->syncWithoutDetaching($tag_ids);

        return redirect()->route('vendor.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Product::findOrFail($id);
        return redirect()->route('vendor.products.index');
    }


    public function add_variant($id)
    {
        $attributes = Attribute::all();
        $product = Product::findOrFail($id);

        return view(
            'backend.dashboards.vendor.products.product_variant',
            compact('attributes', 'product')
        );
    }

    public function edit_products_price(){

        $products = Product::select('id','name','price')->get();

        // dd($products);
        
        return view(
            'backend.dashboards.vendor.products.edit_products_price',
            compact('products')
        );
    }
    
    public function updateProductsPrice(Request $request) {
        // dd($request->all());
        $productIds = $request->input('product_id');
        $prices = $request->input('price');

    
        foreach ($productIds as $key => $productId) {
            // Find the product by ID
            $product = Product::findOrFail($productId);
    
            if ($product) {
                // Update the product's price
                $product->price = $prices[$key];
                $product->save();
            }
        }
    
        // Redirect back or to a specific route after the update
        return redirect()->route('vendor.products.index')->with('success', 'Prices updated successfully');
    }
}