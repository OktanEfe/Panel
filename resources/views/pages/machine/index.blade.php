@extends('layouts/contentNavbarLayout')

@section('title', 'Makine Listesi')

@section('content')
<div class="container mt-4">
    <h2>Makine Listesi</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Makine İsmi</th>
                <th>Parça Sayısı</th>
                <th>Parça İsimleri</th>
            </tr>
        </thead>
        <tbody>
            @foreach($machines as $machine)
            <tr>
                <!-- Makine İsmi -->
                <td>{{ $machine->machine_name }}</td>

                <!-- Parça Sayısı -->
                <td>{{ $machine->parts->count() }}</td>

                <!-- Parça İsimleri -->
                <td>
                    <ul>
                        @foreach($machine->parts as $part)
                            <li>{{ $part->name }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
