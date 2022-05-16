<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admin';

    protected $primaryKey = 'id_admin';

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_admin',
        'user_id',
        'name',
        'no_telp',
        'address',
        'photo',
    ];

    public function getPhoto()
    {
        if ($this->photo === 'undraw_profile.svg') {
            return asset('/assets/img/undraw_profile.svg');
        }
        return asset('/assets/img/' . $this->foto);
    }

    function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}