<?php

namespace App\Http\Controllers;

use App\Exports\ProductExport;
use App\Imports\UsersImport;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    // Exporting function
    public function export()
    {


        //flash a look out Notification here.
        flash()->addSuccess('Download will start in a minuet.', 'Downloading.');

        return new ProductExport();
        return to_route('hosme');
    }
    // importing function
 
}
