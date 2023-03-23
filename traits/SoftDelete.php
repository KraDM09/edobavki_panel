<?php

namespace app\traits;

trait SoftDelete
{
    protected static function findByCondition($condition) {
        return parent::findByCondition($condition)
            ->andWhere(['is_deleted' => false]);
    }

    public static function find() {
        return parent::find()
            ->where(['is_deleted' => false]);
    }
}
