<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name',
        'description',
        'user_id',
    ];

    public function getStatusLabelAttribute(): string
    {
        if (is_null($this->status)) {
            return 'Por definir';
        }

        return $this->status ? 'Concluída' : 'Em progresso';
    }
}
