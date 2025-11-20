<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'amount',
        'reason',
        'status',
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
