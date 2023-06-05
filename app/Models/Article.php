<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * Class Article
 *
 * @property ProjectFile $mainImg
 * @property \Illuminate\Database\Eloquent\Collection<ProjectFile> $galery
 *
 * @package App\Models
 * @author Alex.Krupnik <krupnik_a@ukr.net>
 * @copyright (c), Thread
 */
class Article extends Model
{

    const MAIN_IMG = 'main_img';
    const GALERY = 'galery';
    use HasFactory;

    public $fillable = [
        'title',
        'descr'
    ];

    public function mainImg(): MorphOne
    {
        return $this
            ->morphOne(ProjectFile::class, 'entity', 'entity_type', 'entity_id')
            ->where('entity_field', '=', self::MAIN_IMG)
            ->wherePublished(true);
    }

    public function galery(): MorphMany
    {
        return $this
            ->morphMany(ProjectFile::class, 'entity', 'entity_type', 'entity_id')
            ->where('entity_field', '=', self::GALERY)
            ->wherePublished(true);
    }
}
