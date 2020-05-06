<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use TCG\Voyager\Contracts\User as UserContract;
use TCG\Voyager\Traits\HasRelationships;
use TCG\Voyager\Traits\VoyagerUser;
use Illuminate\Notifications\Notifiable;
class User extends Authenticatable implements UserContract
{
    use Notifiable;
    use VoyagerUser,
        HasRelationships;
    protected $guarded = [];
    public function getAvatarAttribute($value)
    {
        if (is_null($value)) {
            return config('voyager.user.default_avatar', 'users/default.png');
        }
        return $value;
    }
    public function setCreatedAtAttribute($value)
    {
        $this->attributes['created_at'] = Carbon::parse($value)->format('Y-m-d H:i:s');
    }
}
