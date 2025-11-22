<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserFinancialData extends Model
{
    protected $fillable = [
        'user_id',
        'bank_id',
        'iban_number',
        'account_owner_name',
        'account_owner_id',
    ];
}
