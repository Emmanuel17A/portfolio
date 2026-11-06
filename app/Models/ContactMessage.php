<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'subject',
        'project_category',
        'budget',
        'message',
        'preferred_contact',
        'ip_address',
        'is_read',
        'notes',
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];
}
