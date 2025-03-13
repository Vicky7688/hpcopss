<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LedgerMaster extends Model
{
    use HasFactory;

    // use SoftDeletes;
    protected $fillable = [
        'group_code',
        'ledger_name',
        'ledger_code',
        'reference_id',
        'openingAmount',
        'openingType',
        'status',
        'admin_id',
        'updatedBy',
        'session_id',
        'can_change',
        'created_at',
        'updated_at',
    ];
}
