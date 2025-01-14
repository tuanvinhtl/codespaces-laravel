<?php
namespace App\Traits;

use Illuminate\Support\Str;
use App\Support\Utils;

trait UuidTrait
{
    /**
     * Boot the Uuid trait for the model.
     *
     * @return void
     */
    public static function bootUuidTrait()
    {
        static::creating(function ($model) {
            if (Utils::notEmpty($model->uuid)) {
                return;
            }

            if (isset($model->uuidColumn)) {
                if (is_array($model->uuidColumn)) {
                    foreach ($model->uuidColumn as $column) {
                        $model->{$column} = static::generateUuid($column);
                    }
                } elseif (is_string($model->uuidColumn)) {
                    $model->{$model->uuidColumn} = static::generateUuid($model->uuidColumn);
                }

                return;
            }

            $model->uuid = static::generateUuid();
        });
    }

    public static function generateUuid($column = 'uuid')
    {
        $model = new static();
        $uuid = (string) Str::uuid();

        $exists = $model
            ->where($column, $uuid)
            ->withTrashed()
            ->exists();

        if ($exists) {
            return static::generateUuid($column);
        }

        return $uuid;
    }
}
