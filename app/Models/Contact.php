<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory;

    // protected $table = 'contacts_secondary';
    // protected $primaryKey = 'contact_id';
    // public $incrementing = false;
    // public $timestamps = false;
    // protected $dateFormat = 'U';

    use SoftDeletes;
    
    protected $dates = ['deleted_at'];

    public function scopeActivateVips($query){
        return $query->where('vip', true)->where('trial', false);
    }

    public function scopeStatus($query, $status){
        return $query->where('status', $status);
    }

    public static function boot(){
        parent::boot();

        static::addGlobalScope('active', function(Builder $builder){
            $builder->where('active', true);
        });
    }
}


$allContacts = Contact::get();
$vipContacts = Contact::where('vip', true)->get();
