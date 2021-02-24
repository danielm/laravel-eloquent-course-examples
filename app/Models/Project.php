<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Scopes\CreatedScope;


class Project extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'user_id',
        'company_id',
        'city_id',
        'execution_date'
    ];

    //protected $table = 'projects';
    protected $primaryKey = 'project_id';

    //public $incrementing = false;
    //protected $keyType = 'string';
    //public $timestamps = false;

    //const CREATED_AT = 'creation_date';
    //const UPDATED_AT = 'last_update';

    /*protected $attributes = [
        'name' => 'hola',
    ];*/


    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new CreatedScope);

        /*static::addGlobalScope('created_at', function (Builder $builder) {
            $builder->where('created_at', '>', now()->subYears(1));
        });*/
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function city(){
        return $this->belongsTo(City::class, 'city_id');
    }

    public function company(){
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
}
