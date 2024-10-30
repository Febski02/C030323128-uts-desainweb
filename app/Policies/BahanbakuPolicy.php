<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Bahanbaku;
use Illuminate\Auth\Access\Response;

class BahanbakuPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function __construct()
    {
        //
    }
}
