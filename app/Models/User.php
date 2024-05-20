<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
    use HasFactory, Notifiable;

       
        public function historiasComoPaciente()
        {
            return $this->hasMany(Story::class, 'paciente_id');
        }
    
        
        public function historiasComoProfesional()
        {
            return $this->hasMany(Story::class, 'profesional_id');
        }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
            'identification',
            'name',
            'last_name',
            'email',
            'phone',
            'location',
            'password'
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function stories()
    {
        return $this->hasMany(Story::class,'paciente_id');
        return $this->hasMany(Story::class,'profesional_id');
    }

}
