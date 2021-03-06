<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }*/
    public function roles()
    {
        // user have many roles
        //return $this->belongsTo(Role::class);
        return $this->belongsToMany(Role::class, 'assigned_roles'); // assigned_roles nombre de la tabla muchos a muchos
    }
    //public function hasRoles(array $roles)
    //{
    //   foreach ($roles as $role) {
    //       if ($this->role->name === $role)
    //           return true;
    //   }
    //   return false;
    //}
    public function hasRoles(array $roles)
    {
        //return $this->roles->pluck('name')->intersect($roles)->count(); // esto si es ideal
        foreach ($roles as $role) {
            //return $this->roles->pluck('name')->contains($role); // esto no es ideal ya que en la primera fallará
            foreach ($this->roles as $userRole) {
                if ($userRole->name === $role)
                    return true;
            }
        }
        return false;
    }

    public function isAdmin()
    {
        return $this->hasRoles(['admin']);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function note()
    {
        //return $this->hasOne(Note::class);
        return $this->morphOne(Note::class, 'notable');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable')->withTimestamps();
    }
     
    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}
