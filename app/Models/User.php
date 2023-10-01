<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
//class User extends Model
{
    use HasFactory;

    //Sets this model to be used only with users MySQL table
    protected $table = 'users';

    //Defines which fields will be considered when the users INSERTS or UPDATES data
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    //Whenever a record is inserted or updated in the database, Eloquent automatically saves current timestamp 
    //into update_at column by default. Disable this to avoid errors. 
    public $timestamps = false;

    //Defines the primary key of the database as the user_id
    protected $primaryKey = 'user_id';

    
}
