<?php
namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
use HasFactory;
protected $connection = 'mysql_user';
    protected $table = 'addresses';

    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'pincode',
        'state',
        'city',
        'address_line1',
        'address_line2',
        'is_default',
    ];
 public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}


    public function orders()
{
    return $this->hasMany(Order::class, 'address_id');
}
  
}
