<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**+
 * @author Narvaez Ruiz Alexis 
 * Modelo que representa a la tabla en la base de datos,
 * Tabla "Answer Form"
 */
class AnswerForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'form_id',
        'data',
        'metadata'
    ];
}
