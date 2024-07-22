<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lead extends Model
{
    use HasFactory;

    // public function clientApp(): BelongsTo
    // {
    //     return $this->belongsTo(clientApp::class,'website_url','web_url');
    // }
}
