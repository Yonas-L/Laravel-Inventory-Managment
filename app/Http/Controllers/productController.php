<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Product;
use Inertia\Response;

class productController extends Controller
{
    /**
     * Create a new controller instance.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('isAdmin', ['except' => 'index']);
        $this->middleware(['auth', 'verified'], ['only' => 'index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {

        $products = Product::all();
        $analytics = $products->count();
        return inertia(
            'Welcome',
            [
                'products' => $products,
                'analytics' => $analytics
            ]
        );
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * 
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // validate the incoming data
        $request->validate([
            'name' => ['required', 'max:20'],
            'price' => ['required', 'max:20'],
            'category' => ['required', 'max:20'],
        ]);

        //image storing logic will go on here
        $image_path = '';
        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('/avatars', 'public');
        }
        $newProduct = new Product();
        $newProduct->name = $request->name;
        $newProduct->category = $request->category;
        $newProduct->image = 'storage/' . $image_path;
        $newProduct->price = $request->price;
        $newProduct->save();
        return redirect()->back()->with('successMessage', 'Product added successfully!!');
    }



    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse

    {
        //validate the coming data

        $request->validate([
            'name' => ['required', 'max:20'],
            'price' => ['required', 'max:20'],
            'category' => ['required', 'max:20']
        ]);

        //find a specific product

        $productExists = Product::find($id);
        $image_path = $productExists->image;
        if ($productExists) {

            if ($request->hasFile('image')) {
                $image_path = $request->file('image')->store('/avatars', 'public');

                $productExists->name = $request->name;
                $productExists->category = $request->category;
                $productExists->image = 'storage/' . $image_path;
                $productExists->price = $request->price;
                $productExists->save();
                //                dd($image_path);
                return redirect()->route('home')->with('successMessage', 'Product Updated successfully!!');
            }
            $productExists->name = $request->name;
            $productExists->category = $request->category;
            $productExists->image = $image_path;
            $productExists->price = $request->price;
            $productExists->save();
            //            dd($image_path);
            return redirect()->route('home')->with('successMessage', 'Product Updated successfully!!');
        } else     return redirect()->back()->with('errorMessage', 'product not found!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        //find a specific product
        $productExists = Product::find($id);
        $productExists->delete();
        return redirect()->back()->with('successMessage', 'You have successfully deleted ' . ' ' . $productExists->name . ' ' . '!');
    }

    /**
     * 
     * 
     * 
     */
}