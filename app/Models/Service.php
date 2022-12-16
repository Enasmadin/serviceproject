<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'service_name',
        'service_description',
        'service_price',
        'service_execution_period',
        'service_note'
        
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function orderes()
    {
        return $this->hasMany(Order::class);
    }
    
}
