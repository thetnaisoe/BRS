<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Book;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create books.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //dd($user);
        // Only allow authenticated users to create a book
        // You can replace this with your own logic
        // Only allow librarians to create a book
        return $user->is_librarian;
    }
}