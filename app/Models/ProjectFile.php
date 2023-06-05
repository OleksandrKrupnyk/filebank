<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProjectFile
 *
 * @property string $entity_type
 * @property string $entity_field
 * @property string $file_name
 * @property string $ext
 * @property int $entity_id
 * @property bool $published
 * @property bool $is_collection
 * @property int $position
 *
 * @package App\Models
 * @author Alex.Krupnik <krupnik_a@ukr.net>
 * @copyright (c), Thread
 */
class ProjectFile extends Model
{
    use HasFactory;
}
