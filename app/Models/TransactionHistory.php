<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHistory extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'jumlah', 'saldo_sebelum', 'saldo_sesudah', ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
