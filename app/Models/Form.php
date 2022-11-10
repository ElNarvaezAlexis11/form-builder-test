<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**+
 * @author Narvaez Ruiz Alexis 
 * Modelo que representa a la tabla en la base de datos,
 * Tabla "Form"
 */
class Form extends Model
{
    use HasFactory;

    protected $primaryKey = "id";

    /**
     * The attributes that are mass assignable. 
     */
    protected $fillable = [
        'title',
        'form'
    ];
    
}
