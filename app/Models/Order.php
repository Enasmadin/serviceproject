<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'service_id',
        'comment',
        'delivery_date',
        'status'
        
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
