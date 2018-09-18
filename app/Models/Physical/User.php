<?php
/**
 * Created by PhpStorm.
 * User: kameisha_p
 * Date: 17.09.2018
 * Time: 10:26
 */

namespace App\Models\Physical;

trait User
{
    /**
     * @return
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return $this
     */
    public function setName($value)
    {
        $this->name = trim($value);

        return $this;
    }

    /**
     * @return
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return $this
     */
    public function setEmail($value)
    {
        $this->email = trim($value);

        return $this;
    }

    /**
     * @return
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return $this
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);

        return $this;
    }
}