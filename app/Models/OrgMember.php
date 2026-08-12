<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrgMember extends Model
{
    protected $fillable = [
        'name', 'position', 'role_type', 'rt_number',
        'photo_url', 'phone', 'period', 'description', 'bg_color', 'sort_order',
    ];

    /** Falls back to a generated avatar when no photo_url is set. */
    public function getPhotoUrlAttribute(?string $value): string
    {
        if ($value) {
            return $value;
        }

        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name)
            . '&background=' . ltrim($this->bg_color, '#')
            . '&color=ffffff&size=128&bold=true';
    }
}
