<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\FilterTrait;

class Company extends Model
{
    use UuidTrait, HasFactory, SoftDeletes, FilterTrait;

    // column name of key
    protected $primaryKey = 'uuid';

    // type of key
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'uuid',
        'status',
    ];
}
