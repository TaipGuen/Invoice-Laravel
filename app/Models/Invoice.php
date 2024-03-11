<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $table = 'invoice';
    protected $primaryKey = 'invoiceID';
    public $timestamps = false;
    protected $fillable = ['invoiceID','userID','invoice_date','due_date','invoice_amount','status','total','tax_rate','tax_amount'];

    public function item()
    {
        return $this->hasMany(Item::class,'invoiceID');
    }
}
