<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * Class UserProfile
 *
 * @property ProjectFile $contractPdf
 * @property ProjectFile $digitalSignImg
 * @property ProjectFile $idScanImg
 * @property ProjectFile $avatarImg
 *
 * @package App\Models
 * @author Alex.Krupnik <krupnik_a@ukr.net>
 * @copyright (c), Thread
 */
class UserProfile extends Model
{

    const CONTRACT_PDF = 'contract_pdf';
    const DIGITAL_SIGN_IMG = 'digital_sign_img';
    const ID_SCAN_IMG = 'id_scan_img';
    const AVATAR_IMG = 'avatar_img';


    use HasFactory;

    public $fillable = [
        'name',
        'email',
    ];

    public function contractPdf(): MorphOne
    {
        return $this
            ->morphOne(ProjectFile::class, 'entity', 'entity_type', 'entity_id')
            ->where('entity_field', '=', self::CONTRACT_PDF)
            ->wherePublished(true);
    }

    public function digitalSignImg(): MorphOne
    {
        return $this
            ->morphOne(ProjectFile::class, 'entity', 'entity_type', 'entity_id')
            ->where('entity_field', '=', self::DIGITAL_SIGN_IMG)
            ->wherePublished(true);
    }

    public function idScanImg(): MorphOne
    {
        return $this
            ->morphOne(ProjectFile::class, 'entity', 'entity_type', 'entity_id')
            ->where('entity_field', '=', self::ID_SCAN_IMG)
            ->wherePublished(true);
    }

    public function avatarImg(): MorphOne
    {
        return $this
            ->morphOne(ProjectFile::class, 'entity', 'entity_type', 'entity_id')
            ->where('entity_field', '=', self::AVATAR_IMG)
            ->wherePublished(true);
    }
}
