<?php
/**
 * Created by PhpStorm.
 * User: kameisha_p
 * Date: 17.09.2018
 * Time: 10:57
 */

namespace App\Models\Physical;

trait Role
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
        $this->name = $value;

        return $this;
    }

    /**
     * @return
     */
    public function getDisplayName()
    {
        return $this->display_name;
    }

    /**
     * @return $this
     */
    public function setDisplayName($value)
    {
        $this->display_name = $value;

        return $this;
    }

    /**
     * @return
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return $this
     */
    public function setDescription($value)
    {
        $this->description = $value;

        return $this;
    }

    /**
     * @return $this
     */
    public function setId($value)
    {
        $this->id = $value;

        return $this;
    }
}