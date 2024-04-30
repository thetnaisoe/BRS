<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    /**
     * Display a listing of the rentals.
     *
     * @return \Illuminate\Http\Response
     */


     public function index()
     {
         $borrowsVar = [
             'pendingBorrows' => 'Pending Rentals',
             'acceptedInTimeBorrows' => 'Accepted In-Time Rentals',
             'acceptedLateBorrows' => 'Accepted Late Rentals',
             'rejectedBorrows' => 'Rejected Rentals',
             'returnedBorrows' => 'Returned Rentals'
         ];
     
         foreach ($borrowsVar as $key => $title) {
             if (auth()->user()->isLibrarian()) {
                 // If the user is a librarian, get all borrows
                 if ($key == 'acceptedInTimeBorrows') {
                     $$key = Borrow::where('status', 'ACCEPTED')
                         ->where('deadline', '>=', date('Y-m-d'))
                         ->get();
                 } elseif ($key == 'acceptedLateBorrows') {
                     $$key = Borrow::where('status', 'ACCEPTED')
                         ->where('deadline', '<', date('Y-m-d'))
                         ->get();
                 } else {
                     $$key = Borrow::where('status', strtoupper(str_replace('Borrows', '', $key)))->get();
                 }
             } else {
                 // If the user is a reader, only get their borrows
                 if ($key == 'acceptedInTimeBorrows') {
                     $$key = Borrow::where('status', 'ACCEPTED')
                         ->where('reader_id', auth()->id())
                         ->where('deadline', '>=', date('Y-m-d'))
                         ->get();
                 } elseif ($key == 'acceptedLateBorrows') {
                     $$key = Borrow::where('status', 'ACCEPTED')
                         ->where('reader_id', auth()->id())
                         ->where('deadline', '<', date('Y-m-d'))
                         ->get();
                 } else {
                     $$key = Borrow::where('status', strtoupper(str_replace('Borrows', '', $key)))
                         ->where('reader_id', auth()->id())
                         ->get();
                 }
             }
         }
     
         return view('rentals.index', compact(array_keys($borrowsVar)));
     }
     

    public function detail(Borrow $borrow)
    {
        $borrow->load('book');
        return view('rentals.detail', compact('borrow'));
    }


    /**
     * Show the form for creating a new rental.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rentals.create');
    }

    /**
     * Store a newly created rental in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rental = Rental::create($request->all());
        return redirect()->route('rentals.show', $rental);
    }

    /**
     * Display the specified rental.
     *
     * @param  \App\Models\Borrow $rental
     * @return \Illuminate\Http\Response
     */
    public function show(Borrow $borrow)
    {
        return view('rentals.show', compact('rental'));
    }

    /**
     * Show the form for editing the specified rental.
     *
     * @param  \App\Models\Borrow $rental
     * @return \Illuminate\Http\Response
     */
    public function edit(Borrow $borrow)
    {
        return view('rentals.edit', compact('rental'));
    }

    /**
     * Update the specified rental in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Borrow  $rental
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified rental.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Borrow $borrow)
    {
        $request->validate([
            'status' => 'required|in:PENDING,ACCEPTED,REJECTED,RETURNED',
            'deadline' => 'required|date',
        ]);
    
        $borrow->status = $request->status;
        $borrow->deadline = $request->deadline;
    
        if ($borrow->isDirty('status')) {
            if ($borrow->status == 'ACCEPTED' || $borrow->status == 'REJECTED') {
                $borrow->request_processed_at = now();
                $borrow->request_managed_by = auth()->id();
            } elseif ($borrow->status == 'RETURNED') {
                $borrow->returned_at = now();
                $borrow->return_managed_by = auth()->id();
            }
        }
    
        $borrow->save();
    
        return redirect()->route('rentals.detail', $borrow);
    }
    


    /**
     * Remove the specified rental from storage.
     *
     * @param  \App\Models\Rental  $rental
     * @return \Illuminate\Http\Response
     */
    public function destroy(Borrow $borrow)
    {
        $borrow->delete();
        return redirect()->route('rentals.index');
    }
}