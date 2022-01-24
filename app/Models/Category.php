<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    
    public function getNewsCategory(): array
    {

        //return \DB::select("SELECT id, title, slug, author, status, description FROM {$this->table}");
        return \DB::table($this->table)
            ->select(['id', 'title', 'description'])
            ->get()
            ->toArray();
    }
}
