@extends('layouts.admins.index')

@section('titlePage', 'Orders')

@section('content')

    <h4>Order List</h4>
    <div class="order-menu">
        <a href="{{ route('orders.index') }}" class="btn btn-link">Processing</a>
        <a href="{{ route('orders.completed') }}" class="btn btn-link">Compeleted</a>
        <a href="{{ route('orders.canceled') }}" class="btn btn-link">Canceled</a>
    </div>

    <!-- Orders table -->
    @if (isset($processing))
        <h5>Processing</h5>
        <table class="table table-striped table-hover mb-4">
            <thead class="">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Order code</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Day</th>
                    <th scope="col">Total amount</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($processing as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->order_code }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->created_at->format('d/m/Y') }}</td>
                        <td>{{ $item->total_amount }} .000 đ</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <a href="{{ route('orders.detail', $item->id) }}" class="btn btn-primary btn-sm btn-custom">Detail</a>
                            <a href="{{ route('orders.cancel', $item->id) }}" class="btn btn-danger btn-sm btn-custom">Cancel</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $processing->links('pagination::bootstrap-5') }}

        <h5>Pending</h5>
        <table class="table table-striped table-hover">
            <thead class="">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Order code</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Day</th>
                    <th scope="col">Total amount</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pending as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->order_code }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->created_at->format('d/m/Y') }}</td>
                        <td>{{ $item->total_amount }} .000 đ</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <a href="{{ route('orders.detail', $item->id) }}" class="btn btn-primary btn-sm btn-custom">Detail</a>
                            <a href="{{ route('orders.cancel', $item->id) }}" class="btn btn-danger btn-sm btn-custom">Cancel</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $pending->links('pagination::bootstrap-5') }}

    @elseif (isset($completed))
    <h5>Completed</h5>
    <table class="table table-striped table-hover">
        <thead class="">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Order code</th>
                <th scope="col">Customer</th>
                <th scope="col">Day</th>
                <th scope="col">Total amount</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($completed as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->order_code }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->created_at->format('d/m/Y') }}</td>
                    <td>{{ $item->total_amount }} .000 đ</td>
                    <td>{{ $item->status }}</td>
                    <td>
                        <a href="{{ route('orders.detail', $item->id) }}" class="btn btn-primary btn-sm btn-custom">Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $completed->links('pagination::bootstrap-5') }}
    @else
    <h5>Canceled</h5>
    <table class="table table-striped table-hover">
        <thead class="">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Order code</th>
                <th scope="col">Customer</th>
                <th scope="col">Day</th>
                <th scope="col">Total amount</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($canceled as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->order_code }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->created_at->format('d/m/Y') }}</td>
                    <td>{{ $item->total_amount }} .000 đ</td>
                    <td>{{ $item->status }}</td>
                    <td>
                        <a href="{{ route('orders.detail', $item->id) }}" class="btn btn-primary btn-sm btn-custom">Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $canceled->links('pagination::bootstrap-5') }}
    @endif
@endsection
