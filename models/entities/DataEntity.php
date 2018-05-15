<?php

namespace app\models\entities;

use app\models\Model;

abstract class DataEntity extends Model
{
    public function getPublicVars()
    {
        return call_user_func('get_object_vars', $this);
    }
}
