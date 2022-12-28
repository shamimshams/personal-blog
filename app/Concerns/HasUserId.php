<?php

namespace App\Concerns;

trait HasUserId
{
    public static function bootHasUserId()
    {
        static::creating(function (self $model) {
            if (auth()->check()) {
                $model->user_id = auth()->id();
            }
        });
    }
}