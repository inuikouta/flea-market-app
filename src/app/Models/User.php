<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * プロフィール新規作成時
     *
     * 
     */
    public static function updateProfile($request)
    {
        $userId = auth()->id();
        DB::table('users')
            ->where('id', $userId)
            ->update([
                'name' => $request['user-name'],
                'postal_code' => $request['post-code'],
                'address' => $request['address'],
                'building_name' => $request['building'],
                'image_path' => $request['image_path'],
            ]);



        // dd($request->all());
    }
}
