<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Module\User\Entity\SimpleUserEntity;
use Module\User\Entity\UserEntity;
use Module\User\ValueObject\Email;
use Module\User\ValueObject\UserId;
use Module\User\ValueObject\Username;

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
        'password' => 'hashed',
        'created_at' => 'immutable_datetime',
        'updated_at' => 'immutable_datetime',
    ];

    public function toSimpleUserEntity(): SimpleUserEntity
    {
        return new SimpleUserEntity(
            id: UserId::from($this->id),
            username: Username::from($this->name),
            email: Email::from($this->email)
        );
    }

    public function toUserEntity(): UserEntity
    {
        return UserEntity::fromSimpleUserEntity(
            simpleUserEntity: $this->toSimpleUserEntity(),
            createdAt: $this->createdAt,
            updatedAt: $this->updatedAt,
        );
    }
}
