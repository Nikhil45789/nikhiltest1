<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class subcription_model extends Model
{
    protected $table = 'subscription_date'; // Replace 'your_table' with your actual table name

    // Define fillable columns if using mass assignment
    protected $fillable = ['date'];

    // Define relationships if needed (e.g., belongsTo, hasMany, etc.)
}
