<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use LaravelDoctrine\ORM\Auth\Authenticatable;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user",uniqueConstraints={@ORM\UniqueConstraint(name="search_idx", columns={"email"})})
 */
class User implements AuthenticatableContract
{
    use Authenticatable, HasFactory, Notifiable;

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
     * @ORM\OneToOne(targetEntity="Supplier", mappedBy="user")
     * @var Supplier
     */
    protected $supplier;

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

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param Name $name
     */
    public function setName(Name $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setSupplier(Supplier $supplier)
    {
        if (!is_null($this->supplier) && $this->supplier->id != $supplier->id) {
            $supplier->setUser($this);
            $this->supplier = $supplier;
        }
    }

    public function getSupplier()
    {
        return $this->supplier;
    }
}
