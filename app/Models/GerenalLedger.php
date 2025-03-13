<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GerenalLedger extends Model
{
    protected $fillable = [
        'serialNo',
        'transactionType',
        'formName',
        'referenceNo',
        'transactionDate',
        'transactionAmount',
        'narration',
        'groupCode',
        'ledgerCode',
        'sessionId',
        'branchId',
        'enteredId',
        'updatedBy',
        'created_at',
        'updated_at'
    ];
}
