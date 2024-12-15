<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Training extends Model
{
    //

    use HasFactory;
    protected $fillable = [ 'title', 'start_date', 'end_date', 'trainer_id', 'location', 'max_participants', 'description' ];

    public function trainer() { return $this->belongsTo(Consultant::class, 'trainer_id'); }

    public function participants(): HasMany
    {
        return $this->hasMany(TrainingParticipant::class);
    }
}
