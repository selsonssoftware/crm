<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice_items extends Model
{
    use HasFactory;
    protected $table='invoice_items';
    protected $guarded=[];
    protected $primaryKey = 'item_id';
}
