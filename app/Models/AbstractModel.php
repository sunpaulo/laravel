<?php
/**
 * Created by PhpStorm.
 * User: kameisha_p
 * Date: 17.09.2018
 * Time: 10:33
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AbstractModel
 *
 * @mixin \Eloquent
 */
class AbstractModel extends Model
{
    protected function getId()
    {
        return $this->id;
    }

    protected function getDeletedAtColumn()
    {
        return $this->deleted_at;
    }

    public static function getTableName()
    {
        return with(new static())->getTable();
    }
}