<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; // or Customer model

class SupportTicket extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject',
        'status',
        'user_id',
        'assigned_to'
    ];

    // Ticket submitted by user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Ticket assigned to admin
    public function assignedAdmin()
    {
        return $this->belongsTo(User::class, 'assigned_to'); // or Admin model
    }

    // All messages of this ticket
    public function messages()
    {
        return $this->hasMany(SupportTicketMessage::class, 'ticket_id');
    }
}
