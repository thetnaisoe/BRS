<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Book extends Model
{
    use HasFactory;

    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function activeBorrows()
    {
        return $this->borrows()->where('status', '=', 'ACCEPTED');
    }

    public function hasOngoingRental(User $user)
    {
        return $this->borrows()
            ->where('reader_id', $user->id)
            ->where('status', '!=', 'RETURNED')
            ->exists();
    }
}
