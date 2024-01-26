<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * Orders Table
     *
     * @var string
     */
    protected $table = 'orders';

    /**
     * Primary Key
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Fillable
     *
     * @var array
     */
    protected $fillable = [
        'itemName',
        'itemQuantity',
        'itemPrice',
        'itemTotalPrice',
    ];

    public function userOrder()
    {
        return $this->hasMany(User::class, 'order_id');
    }
}
