<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $table = 'content';

    public function getContent(): array
    {
        return \DB::table($this->table)
            ->select(['id', 'title', 'site', 'active'])
            ->get()
            ->toArray();
    }
}
