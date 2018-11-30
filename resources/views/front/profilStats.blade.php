@extends('layout')

@section('content')
    <h1>Statistique</h1>

    <table class="table table-hover">
        <thead>
            <tr class="success">
                <th>Xp</th>
                <th>Grade</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($stats as $stat)
            <tr>
                <td><strong><?php echo $stat->xp; ?></strong></td>
                <td><?php echo $stat->tier; ?></td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
