<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;//delete論理削除


class Post extends Model
{
    use HasFactory;
    use SoftDeletes;//論理的削除の定義
    public function getByLimit(int $limit_count)
    {//ペジネート機能はいらないが、昇格順に並べたいため
        return $this->oderBy('updated_at', 'DESC')->get();
    }
    protected $fillable = [//postで入力されものを保存するものたち
        'user_id',
        'category_id',
        'body',
        'image_url',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
