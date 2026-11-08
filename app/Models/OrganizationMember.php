<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganizationMember extends Model
{
    protected $fillable = ['name', 'position', 'image', 'order'];

    protected $casts = [
        'order' => 'integer',
    ];

    /**
     * Scope: urutkan berdasarkan order, lalu nama.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc')->orderBy('name', 'asc');
    }
}
