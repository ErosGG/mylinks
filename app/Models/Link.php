<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(string[] $array)
 */
class Link extends Model
{
    use HasFactory;
    use SoftDeletes;

    /*
     * Camps assignables massivament
     */
    protected $fillable = [
        "title",
        "url",
    ];
}
