<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionMaster extends Model
{
    use HasFactory;
    protected $fillable = [
        'startDate',
        'endDate',
        'session_name',
        'status',
        'auditPerformed',
        'updatedBy',
        'created_at',
        'updated_at',
    ];
}
