<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'file_id',
        'approved_by',
        'role',
        'status',
        'comments',
    ];

    /**
     * Get the file associated with the approval.
     */
    public function file()
    {
        return $this->belongsTo(File::class);
    }

    /**
     * Get the user who gave the approval.
     */
    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
