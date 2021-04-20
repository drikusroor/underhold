<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Doctrine\ORM\Mapping as ORM;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @ORM\Column(type="string")
     */
    protected $email;

    /**
     * @ORM\Column(type="string")
     */
    protected $password;

    /**
     * @param $firstname
     * @param $lastname
     */
    public function __construct($name, $email, $password)
    {
        $this->name = $name;
        $this->email  = $email;
        $this->password = $password;
    }


    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->id;
    }

    public function getPassword()
    {
        return $this->password;
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
