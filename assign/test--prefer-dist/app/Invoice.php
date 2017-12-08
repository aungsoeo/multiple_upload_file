<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Invoice;
use Illuminate\Http\Request;

class Invoice extends Model
{
	//protected $fillable = ['name'];
	protected $table="invoice_create";
	public function invoicedetail()
    {
        return $this->belongsTo('App\Invoicedetail');
    }

}