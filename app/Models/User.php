<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Notifications\Notifiable;
use App\Models\Physical\User as Physical;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

/**
 * Class User
 * @package App\Models
 * @property $name string
 * @property $email string
 * @property $password mixed
 */
class User extends AbstractModel implements CanResetPasswordContract, AuthorizableContract, AuthenticatableContract
{
    use Authenticatable,
        Authorizable,
        CanResetPassword,
        Notifiable,
        Physical,
        SoftDeletes,
        EntrustUserTrait
    {
        EntrustUserTrait ::can insteadof Authorizable; //add insteadof avoid php trait conflict resolution
    }

    protected $table = 'user';

    protected $fillable = [
        'name', 'email', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }

    public function newQuery()
    {
        return parent::newQuery()->where('role','=',$this->getRole()->id);
    }

    public static function getTableName()
    {
        return 'user';
    }
}
