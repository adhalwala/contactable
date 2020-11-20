<?php

namespace Aecor\Contact\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public function getTable()
    {
        return config('contactable.table-name');
    }

    protected $guarded = [];

    protected $casts = [
        'custom_attributes' => 'array',
        'order_column' => 'integer',
    ];

    protected $fillable = [
        'type',
        'value',
        'custom_attributes',
        'order_column',
    ];

    public function contactable()
    {
        return $this->morphTo('model');
    }
}
