<?php

namespace App\Http\Controllers;

use App\Http\Facades\ProductFacade;
use Illuminate\View\View;

class ProductController extends Controller
{

    public $products;

    public function __construct()
    {
        $this->products = new ProductFacade();
    }

    public function index(): View
    {
        return view('product', [
            'products' => $this->products->getAllProducts()->paginate(10)
        ]);
    }

    public function search()
    {
        $products = $this->products->findProducts($_GET['word'])->paginate(10, ['*'], null, $_GET['currentPage'] ?? 1);
        return response()
            ->json($products);
    }


}
