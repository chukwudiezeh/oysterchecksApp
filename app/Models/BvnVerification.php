<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BvnVerification extends Model
{
    use HasFactory;

    protected $table = 'bvn_verifications';


    protected $filled = [
        'verification_id',
        'user_id',
        'ref',
        'pin',
        'subject_consent',
        'type',
        'country'
    ];

    protected $casts = [
        'validations' => 'array',
        
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function verification(){
        return $this->belongsTo(Verification::class, 'user_id');
    }
}