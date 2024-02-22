<?php

namespace App\Models;

use App\InstrumentsFamily;
use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstrumentsInfo extends Model
{
    protected $fillable = ['id', 'name', 'details', 'credit_card_number', 'object','price', 'in_store', 'preview', 'created_at', 'updated_at', 'instrument_family'];
    protected $table = 'instruments_info';
    public $incrementing = false;


    public function family() {
        return $this->belongsTo(InstrumentsFamily::class);
    }

}
