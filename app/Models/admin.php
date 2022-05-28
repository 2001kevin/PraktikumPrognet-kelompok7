<?php

namespace App\Models;

use App\Notifications\VerifyUserNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Passport\HasApiTokens;

class Admin extends Authenticatable
{
    use SoftDeletes, Notifiable, HasApiTokens;

    public $table = 'admins';

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $dates = [
        'updated_at',
        'created_at',
    ];

    protected $fillable = [
        'name',
        'email',
        'password',
        'created_at',
        'updated_at',
        'remember_token',
    ];
    
    public function createNotif($data)
    {
        $notif = new admin_notification();
        $notif->type = 'App\Notifications\ProducNotification';
        $notif->notifiable_type = 'App\Models\Admin';
        $notif->notifiable_id = $this->id;
        $notif->data = $data;
        $notif->read_at = null;
        $notif->save();
    }
}
