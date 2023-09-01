<?php

namespace App\Http\Controllers;

use App\Exports\ProductExport;
use App\Jobs\ProcessReport;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Process;

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
     *  ;
     */
 
}
