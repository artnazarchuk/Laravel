<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'title',
        'description'
    ];

    // protected $table = 'categories';
    
    // public function getNewsCategory(): array
    // {
    //     return \DB::table($this->table)
    //         ->select(['id', 'title', 'description'])
    //         ->get()
    //         ->toArray();
    // }

    public function news(): HasMany
    {
        return $this->hasMany(News::class, 'category_id', 'id');
    }
}
