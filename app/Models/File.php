<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'file_name',
        'status',
        'account_id',
        'business_head_id',
        'ceo_id',
        'md_id',
    ];

    /**
     * Get the Account that created the file.
     */
    public function account()
    {
        return $this->belongsTo(User::class, 'account_id');
    }

    /**
     * Get the Business Head associated with the file.
     */
    public function businessHead()
    {
        return $this->belongsTo(User::class, 'business_head_id');
    }

    /**
     * Get the CEO associated with the file.
     */
    public function ceo()
    {
        return $this->belongsTo(User::class, 'ceo_id');
    }

    /**
     * Get the Managing Director associated with the file.
     */
    public function managingDirector()
    {
        return $this->belongsTo(User::class, 'md_id');
    }

    /**
     * Get the withdraw requests associated with the file.
     */
    public function withdrawRequests()
    {
        return $this->belongsToMany(WithdrawRequest::class, 'file_withdraw_request');
    }

    /**
     * Get the approvals associated with the file.
     */
    public function approvals()
    {
        return $this->hasMany(Approval::class);
    }
}
