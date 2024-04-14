<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function reader()
    {
        return $this->belongsTo(User::class, 'reader_id');
    }

    public function requestManager()
    {
        return $this->belongsTo(User::class, 'request_managed_by');
    }

    public function returnManager()
    {
        return $this->belongsTo(User::class, 'return_managed_by');
    }
}
