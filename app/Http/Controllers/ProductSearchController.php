<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;

class ProductSearchController extends Controller
{

    /**
     * !: This method only gets triggered by the admin
     *  */
    public function SearchAdmin(Request $request)
    {
        $productExists = Product::where('name',  'like', '%' . $request->searchValue . '%')
            ->orWhere('category',  'like', '%' . $request->searchValue . '%')->get();
        $searchedUser = User::where('name',  'like', '%' . $request->searchValue . '%')
            ->orWhere('email',  'like', '%' . $request->searchValue . '%')->get();

        if ($productExists  || $searchedUser) {
            return inertia('Welcome', [
                'products' => $productExists,
                'searchedUser' => $searchedUser
            ]);
        }
        return inertia('Welcome', [
            'products' => [],
            'searchedUser' => []
        ]);
    }
    //
    public function searchProducts(Request $request)
    {
        $productExists = Product::where('name',  'like', '%' . $request->searchValue . '%')
            ->orWhere('category',  'like', '%' . $request->searchValue . '%')->get();
        if ($productExists) {
            return inertia('Welcome', [
                'products' => $productExists,

            ]);
        }
        return inertia('Welcome', [
            'products' => [],
            'searchedUser' => []
        ]);
    }
    // Searching for product by date
    public function searchProductsByDate(Request $request)
    {
        $productExists = Product::where('created_at',  'like', '%' . $request->date . '%')->get();
        if ($productExists) {
            return inertia('Welcome', [
                'products' => $productExists,
            ]);
        }
        return inertia('Welcome', [
            'products' => [],
            'searchedUser' => []
        ]);
    }
    public function filterPrice(Request $request)
    {
        $priceInRange = Product::whereBetween('price', [Product::min('price'), $request->priceRange])->get();
        if ($priceInRange) {
            return inertia('Welcome', [
                'products' => $priceInRange,
            ]);
        }
    }

    /**
     *  Report generation trigger
     *  @param somthing;
     */
    public function generateReport(): RedirectResponse
    {
        $products = Product::all();
        sleep(10);
        //flash a look out Notification here.
        flash()->addInfo('We Will Notify You When We Are Done.', 'Generating Report.');

        //dispatch the Job for processing report here

        return to_route('home');
    }
}
