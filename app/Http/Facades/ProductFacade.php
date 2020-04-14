<?php


namespace App\Http\Facades;

use App\Product;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\DB;

class ProductFacade
{
    // SELECT * FROM `tb_product` WHERE name IS NOT NULL
    /**
     * @return \Illuminate\Database\Query\Builder
     */
    public function getAllProducts()
    {
        return DB::table('tb_product')->whereNotNull('name');
    }

    public function findProducts(String $word)
    {
        return DB::table('tb_product')->where('name', 'like', "%$word%");
    }

}
