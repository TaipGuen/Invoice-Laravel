<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    use HasFactory;
    protected $table = 'item';
    public $timestamps = false;
    protected $primaryKey = 'itemID';
    protected $fillable = ['itemID','invoiceID','productID','quantity','price','amount'];


}
