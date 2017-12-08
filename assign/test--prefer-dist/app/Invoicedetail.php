<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Invoicedetail;

class Invoicedetail extends Model
{
	public function invoice()
    {
        return $this->hasMany('App\Invoice');
    }


}