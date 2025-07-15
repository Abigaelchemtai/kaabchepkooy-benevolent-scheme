@extends('layouts.app')

@section('content')
<div class="container py-5">

    {{-- Page Header --}}
    <div class="text-center mb-5">
        <h2 class="fw-bold text-primary">My Contributions</h2>
        <h4> <p class="text-muted">Welcome {{ $user->first_name }}! </p> </h4>
        <p> Here's a summary of your contribution progress and account information.</p>
    </div>

    {{-- Membership Tier Card --}}
    <div class="row justify-content-center mb-4">
        <div class="col-md-6">
            <div class="card border-info shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title text-info">Membership Tier</h5>
                    <p class="fs-4 fw-bold text-dark">{{ ucfirst($user->membership_tier ?? 'Starter Circle') }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Contribution Summary Cards --}}
    <div class="row text-center mb-4">
        <div class="col-md-4 mb-3">
            <div class="card bg-light shadow-sm h-100">
                <div class="card-body">
                    <h6 class="text-muted">Monthly Contributions</h6>
                    <h4 class="fw-bold text-success">KES {{ number_format($monthlyContributions) }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card bg-light shadow-sm h-100">
                <div class="card-body">
                    <h6 class="text-muted">Yearly Contributions</h6>
                    <h4 class="fw-bold text-primary">KES {{ number_format($yearlyContributions) }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card bg-light shadow-sm h-100">
                <div class="card-body">
                    <h6 class="text-muted">Total Contributions</h6>
                    <h4 class="fw-bold text-dark">KES {{ number_format($totalContributions) }}</h4>
                </div>
            </div>
        </div>
    </div>

    {{-- Pay Now via M-Pesa --}}
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <div class="card border-success shadow-sm">
                <div class="card-header bg-success text-white fw-semibold">
                    Make a New Contribution
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form method="POST" action="{{ route('stk.push') }}">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Phone Number (M-Pesa)</label>
                            <input type="text" name="phone" class="form-control" placeholder="07XXXXXXXX" required>
                        </div>
                        <div class="col-md-6">
                            <label for="amount" class="form-label">Amount (KES)</label>
                            <input type="number" name="amount" class="form-control"
                                value="{{ $user->tier->monthly_fee ?? 500 }}" min="10" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success w-100">
                        <i class="bi bi-phone-fill me-1"></i> Pay Now via M-Pesa
                    </button>
                </form>

                </div>
            </div>
        </div>
    </div>

    {{-- Contribution History Table --}}
    <div class="card shadow-sm mb-5">
        <div class="card-header bg-primary text-white fw-semibold">
            Contribution History
        </div>
        <div class="card-body p-0">
            @if(isset($contributions) && count($contributions) > 0)
                <div class="table-responsive">
                    <table class="table table-hover table-bordered m-0">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Amount (KES)</th>
                                <th>Frequency</th>
                                <th>Status</th>
                                <th>Paid Date</th>
                                <th>Paid Time</th>
                                <th>Method</th>
                                <th>Notes</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contributions as $index => $contribution)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ number_format($contribution->amount) }}</td>
                                    <td>{{ ucfirst($contribution->frequency) }}</td>
                                    <td>
                                        @if($contribution->status === 'confirmed')
                                            <span class="badge bg-success">Confirmed</span>
                                        @else
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        @endif
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($contribution->paid_at ?? $contribution->created_at)->format('d M Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($contribution->paid_at ?? $contribution->created_at)->format('h:i A') }}</td>
                                    <td>{{ $contribution->payment_method ?? 'N/A' }}</td>
                                    <td>{{ $contribution->notes ?? '-' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="p-4 text-center text-muted">No contributions found.</div>
            @endif
        </div>
    </div>
</div>
@endsection
