<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';
    protected $guarded = ['id'];

    public function accountHead(): BelongsTo
    {
        return $this->belongsTo(AccountHead::class, 'source');
    }
}
