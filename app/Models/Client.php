<?php

namespace App\Models;

use App\Models\Order;
use Laravel\Cashier\Billable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;
    use Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'phone',
        'first_name',
        'last_name',
        'email'
    ];

    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
