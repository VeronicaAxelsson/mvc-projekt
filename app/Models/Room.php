<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $img
 * @method where()
 * @method select()
 */
class Room extends Model
{
    // use HasFactory;

    protected $primaryKey = 'id';
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mvc_room';

    /**
    * Indicates if the model should be timestamped.
    *
    * @var bool
    */
    public $timestamps = false;


    public function paths()
    {
        return $this->hasMany(RoomToRoom::class, "room_1");
    }

    public function findWherePrimaryKey($value)
    {
        return $this->find($value);
    }
}
