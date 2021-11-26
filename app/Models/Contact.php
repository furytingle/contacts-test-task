<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 *
 * @method static Contact create(array $data)
 */
class Contact extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'name',
        'email'
    ];
}
