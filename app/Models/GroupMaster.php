<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupMaster extends Model
{
    use HasFactory;
    protected $fillable = [
        'group_code',
        'group_name',
        'group_type',
        'balsheet_head',
        'drcr',
        'status',
        'admin_id',
        'updatedBy',
        'session_id',
        'can_change',
        'created_at',
        'updated_at',
    ];
}
