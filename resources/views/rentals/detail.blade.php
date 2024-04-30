
@extends('layouts.main')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header text-black">
                    <h3 class="mb-0">
                        <a href="{{ route('books.detail', $borrow->book) }}" class="text-decoration-none text-dark">
                            {{ $borrow->book->title }}
                        </a>
                    </h3>
                    <p class="mb-0"><em>by {{ $borrow->book->authors }}</em></p>
                    <p class="mb-0">Released at: {{ date('Y-m-d', strtotime($borrow->book->released_at)) }}</p>
                </div>

                <div class="card-body">
                    <p><strong>Borrower:</strong> {{ $borrow->reader->name }}</p>
                    <p><strong>Date of Rental Request:</strong> {{ date('Y-m-d', strtotime($borrow->created_at)) }}</p>
                    <p><strong>Status:</strong> {{ $borrow->status }}</p>
                 
                    @if($borrow->status != 'PENDING' && $borrow->requestManager)
                        <p><strong>Date of Procession:</strong> {{ date('Y-m-d', strtotime($borrow->request_processed_at)) }}</p>
                        @if($borrow->requestManager->isLibrarian())
                            <p><strong>Librarian:</strong> {{ $borrow->requestManager->name }}</p>
                        @endif
                    @endif
                    @if($borrow->status == 'RETURNED' && $borrow->returnManager)
                        <p><strong>Date of Return:</strong> {{ date('Y-m-d', strtotime($borrow->returned_at)) }}</p>
                        @if($borrow->returnManager->isLibrarian())
                            <p><strong>Librarian:</strong> {{ $borrow->returnManager->name }}</p>
                        @endif
                    @endif

                    @if($borrow->isLate())
                        <p class="text-danger"><strong>This rental is late.</strong></p>
                    @endif
                </div>

                @if(auth()->user()->isLibrarian())
                <div class="card mt-1 shadow-lg">
                    <div class="card-header text-black">
                        <h2 class="mb-0">Update Rental</h2>
                    </div>
                    <div class="card-body shadow-lg">
                        <form action="{{ route('rentals.update', $borrow) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select id="status" name="status" class="form-control @error('status') is-invalid @enderror">
                                    <option value="">Select status</option>
                                    <option value="PENDING" @if(old('status', $borrow->status) == 'PENDING') selected @endif>Pending</option>
                                    <option value="ACCEPTED" @if(old('status', $borrow->status) == 'ACCEPTED') selected @endif>Accepted</option>
                                    <option value="REJECTED" @if(old('status', $borrow->status) == 'REJECTED') selected @endif>Rejected</option>
                                    <option value="RETURNED" @if(old('status', $borrow->status) == 'RETURNED') selected @endif>Returned</option>
                                </select>

                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="deadline">Deadline</label>
                                <input type="date" id="deadline" name="deadline" class="form-control @error('deadline') is-invalid @enderror" value="{{ old('deadline', $borrow->deadline ? date('Y-m-d', strtotime($borrow->deadline)) : '') }}">

                                @error('deadline')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary mt-4">Update Rental</button>
                        </form>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

