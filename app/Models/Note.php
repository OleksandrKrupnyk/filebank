<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Note
 *
 * @property string $title
 * @property string $content
 * @property boolean $publish
 * @property int $price
 * @property string $from_date
 * @property string $till_date
 *
 * @package App\Models
 * @author Alex.Krupnik <krupnik_a@ukr.net>
 * @copyright (c), Thread
 */
class Note extends Model
{
    use HasFactory;

    public $fillable = [
        'title',
        'content',
        'publish',
        'price',
        'from_date',
        'till_date',
    ];

    protected $attributes = [
        'from_date' => null,
        'till_date' => null,
    ];

    public $casts = [
        'publish' => 'boolean',
    ];

//
    public function fromDate(): Attribute
    {
        return Attribute::make(
            get: function () {
                return Carbon::parse($this->attributes['from_date'] / 1000)->format('Y-m-d h:i');
            },
            set: function ($value) {
                return $this->from_date = Carbon::parse($value)->timestamp * 1000;
            }
        );
    }

    public function tillDate(): Attribute
    {
        return Attribute::make(
            get: function () {
                return Carbon::parse($this->attributes['till_date'] / 1000)->format('Y-m-d h:i');
            },
            set: function ($value) {
                return $this->till_date = Carbon::parse($value)->timestamp * 1000;
            }
        );
    }
}


