
@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Rentals</h1>

    @foreach (['pendingBorrows' => 'Pending Rentals', 'acceptedInTimeBorrows' => 'Accepted In-Time Rentals', 'acceptedLateBorrows' => 'Accepted Late Rentals', 'rejectedBorrows' => 'Rejected Rentals', 'returnedBorrows' => 'Returned Rentals'] as $borrowsVar => $title)
        <div class="card mb-4 shadow-lg">
            <div class="card-header text-black">
                <h2 class="mb-0">{{ $title }}</h2>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    @foreach ($$borrowsVar as $borrow)
                        <li class="list-group-item">
                            <a href="{{ route('rentals.detail', $borrow) }}" class="text-decoration-none">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong class="text-dark">{{ $borrow->book->title }}</strong> by <em class="text-muted">{{ $borrow->book->authors }}</em> - 
                                        Rental Date: <span class="text-muted">{{ $borrow->request_processed_at ? date('Y-m-d', strtotime($borrow->request_processed_at)) : 'N/A' }}</span>

                                    </div>
                                    <div>
                                    Deadline: <span class="text-danger">{{ $borrow->deadline ? date('Y-m-d', strtotime($borrow->deadline)) : 'N/A' }}</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endforeach
</div>
@endsection
