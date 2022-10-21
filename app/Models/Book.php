<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**+
 * @author Narvaez Ruiz Alexis 
 * Modelo que representa a la tabla en la base de datos,
 * Tabla "books"
 */
class Book extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
}
