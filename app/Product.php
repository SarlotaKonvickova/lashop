<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $softDelete = true;

    /**
     * @var string
     */
    protected $table = 'tb_product';

    /**
     * @var string
     */
    protected $primaryKey = 'IDproduct';

    /**
     * @var int
     */
    public $idParent;

    /**
     * @var string
     */
    public $sku;

    /**
     * @var string
     */
    public $code;

    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $technicalDescription;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $variantName;

    /**
     * @var int
     */
    public $variantSort = 0;

    /**
     * @var float
     */
    public $stock = 0.00;

    /**
     * @var float
     */
    public $price;

    /**
     * @var float
     */
    public $saleAmount = 0.000000;

    /**
     * @var int
     */
    public $hidden = 1;

    /**
     * @var string
     */
    public $ean;

    /**
     * @var string
     */
    public $tags;

    /**
     * @var string
     */
    public $url;

}
