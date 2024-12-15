<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Consultation extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $fillable = [
        'farmer_id',
        'consultant_id',
        'topic',
        'description',
        'status',
        'scheduled_at',
        'notes',
        'recommendations',
        'follow_up_actions',
        'consultation_type',
        'consultation_fee',
        'payment_status',
    ];

    public function farmer(): BelongsTo
    {
        return $this->belongsTo(Farmer::class);
    }
    public function consultant(): BelongsTo { return $this->belongsTo(Consultant::class); }
}
