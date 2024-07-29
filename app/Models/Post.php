<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public function getByLimit(int $limit_count)
    {//ペジネート機能はいらないが、昇格順に並べたいため
        return $this->oderBy('updated_at', 'DESC')->get();
    }
    protected $fillable = [
        'body',
    ];
}
