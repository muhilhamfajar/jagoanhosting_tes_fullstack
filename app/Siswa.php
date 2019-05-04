<?php

namespace App;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Siswa extends Model
{
    protected $table = 'siswa';
    
    public function scopeGender($query)
    {
        return $query->whereNull('gender');
    }

    public function scopeFirstname($query, $firstname='')
    {
        return $query->where('firstname',$firstname);
    }    
    
    public function scopeLastname($query, $lastname='')
    {
        return $query->where('lastname',$lastname);
    }

    public function scopeStatusWhereNotIn($query, $status)
    {
        return $query->whereNotIn('status', $status);
    }

    public function scopeStatusWhereIn($query, $status='')
    {
        return $query->whereIn('status', $status);
    }

    public function scopeIdNotBetween($query, $id='')
    {
        return $query->whereNotBetween('id', $id);
    }

    public function scopeIdBetween($query, $id='')
    {
        return $query->whereBetween('id', $id);
    }

    public function scopeIdOrWhere($query, $id='', $sign='>')
    {
        return $query->orWhere('id',$sign,$id);
    }

    public function scopeStatusOrNotIn($query, $status='')
    {
        return $query->orWhere(function ($query) use ($status) {
            $query->whereNotIn('status',$status);
        });
    }

    public function scopeStatusOrIn($query, $status='')
    {
        return $query->orWhere(function ($query) use ($status) {
            $query->whereIn('status',$status);
        });
    }

    public function scopeDataOrderBy($query, $field='', $order='asc')
    {
        return $query->orderBy($field, $order);
    }
}
