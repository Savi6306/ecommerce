<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\User;     // User model
use App\Models\Seller;   // Seller model (adjust namespace if needed)
use App\Models\Admin\Admin;    // Admin model
use App\Models\Admin\Message;  // Message model

class Chat extends Model
{
    protected $fillable = ['user_id', 'seller_id', 'admin_id', 'chat_type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
