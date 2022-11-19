<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paintings extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'paintings';

    protected $fillable = ['name', 'width', 'height', 'idPainter'];

    public function getPainter(){
        return $this->belongsTo(Painter::class,'idPainter');
    }
}
