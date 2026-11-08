<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SintaResearcher extends Model
{
    use HasFactory;

    protected $table = 'sinta_researchers';

    protected $fillable = [
        'sinta_id',
        'name',
        'study_program',
        'affiliation',
        'sinta_score_3yr',
        'sinta_score_overall',
        'scopus_hindex',
        'gs_hindex',
        'sinta_hindex',
        'image_url',
        'profile_url',
        'last_synced_at',
    ];

    protected $casts = [
        'sinta_score_3yr' => 'integer',
        'sinta_score_overall' => 'integer',
        'scopus_hindex' => 'integer',
        'gs_hindex' => 'integer',
        'sinta_hindex' => 'integer',
        'last_synced_at' => 'datetime',
    ];
}
