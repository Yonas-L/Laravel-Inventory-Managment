<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
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
        notify()->success('Welcone brother');
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
        $simpleUsers = User::all();
        notify()->success('Welcone brother');
        return inertia(
            'Welcome',
            [
                'products' => $products,
                'analytics' => $analytics,
                'simpleUsers' => $simpleUsers
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
        notify()->success('Product Added Sucsessfully ⚡️');
        return to_route('home');
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
               
                notify()->success('Product updated successfully');
                return redirect()->route('home');
            }
            $productExists->name = $request->name;
            $productExists->category = $request->category;
            $productExists->image = $image_path;
            $productExists->price = $request->price;
            $productExists->save();
            notify()->success('Product updated successfully');
            return redirect()->route('home');
        } else     return redirect()->back();
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
        notify()->error('Product Deleted!');
        return redirect()->back();
    }

    /**
     * 
     * 
     * 
     */
}
