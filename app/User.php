<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Rackbeat\UIAvatars\HasAvatar;

class User extends Authenticatable
{
    use Notifiable;
    use HasAvatar;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'phone_verified', 'password',
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

    /**
     * Get the monitors for the user.
     */
    public function monitors()
    {
        return $this->hasMany('App\Monitor');
    }

    /**
     * Get the user avatar.
     */
    public function getAvatar($size = 64)
    {
        return $this->getGravatar($this->email, $size);
    }

    public function selectPersonalData(PersonalDataSelection $personalData): void
    {
        $personalData
            ->add('user.json', ['name' => $this->name, 'email' => $this->email, 'phone' => $this->phone, 'created_at', $this->created_at, 'updated_at', $this->updated_at]);
    }

    public function personalDataExportName(string $realFilename): string {
        $userName = Str::slug($this->name);

        return "personal-data-{$userName}.zip";
    }
}
