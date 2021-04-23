<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="supplier",uniqueConstraints={@ORM\UniqueConstraint(name="search_idx", columns={"code"})})
 */
class Supplier
{
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
     * 
     */
    protected $code;

    /**
     * @ORM\OneToOne(targetEntity="User", mappedBy="supplier")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * @var User
     */
    protected $user;

    /**
     * @param $name
     * @param $code
     */
    public function __construct($name, $code)
    {
        $this->name = $name;
        $this->code  = $code;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setUser(User $user)
    {
        if ($this->user->id != $user->id) {
            $this->user = $user;
        }
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code
        ];
    }
}
