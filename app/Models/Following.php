<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Following extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'following_user_id',
    ];
    //フォロワーのユーザー情報を取得    
    public function follower()
    {
        return $this->belongsTo(User::class, 'user_id'); // フォロワーを取得
    }
    //フォローされているユーザー情報を取得
    public function followedUser()
    {
        return $this->belongsTo(User::class, 'following_user_id'); // フォローされているユーザーを取得
    }
}
