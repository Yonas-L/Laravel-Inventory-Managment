<?php

namespace App\Exports;

use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Excel;

class ProductExport implements FromCollection,Responsable,ShouldQueue, WithHeadings
{
    use Exportable;

    private $fileName = 'products.xlsx';
    
    /**
    * Optional Writer Type
    */
    private $writerType = Excel::XLSX;
    /**
    * @return \Illuminate\Support\Collection
    */
    

    public function headings(): array
    {
        return [
            'Product Id',
            'Name',
            'Category',
            'Image',
            'Price',
            'Created_At',
            'Updated_At',
        ];
    }

    public function collection()
    {
        return Product::all();
    }
}
