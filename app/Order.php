<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Orderpizza;

class Order extends Model
{
    public static $status = [
        'new' => 'new',
        'process' => 'process',
        'done' => 'done',
    ];
    public function orderpizzas()
    {
        return $this->hasMany(Orderpizza::class);
    }
}
