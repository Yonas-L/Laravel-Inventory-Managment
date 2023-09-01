<?php

namespace App\Jobs;

use App\Exports\ProductExport;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\RedirectResponse as HttpRedirectResponse;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ProcessReport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $products;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($products)
    {
        $this->products = $products;
        return new ProductExport();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Take the Products and convert them to excel format
        return new ProductExport();

        // Attach the file to a Mail class
        // flash the finished message.

        //or

        // Dispatch the email has been sent event
        // Make the listener of that event to send a flash notification
    }
}
