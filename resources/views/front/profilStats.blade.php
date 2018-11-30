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

    <table class="table table-hover">
        <thead>
            <tr class="success">
                <th>Calcium</th>
                <th>Protéine</th>
                <th>GL</th>
                <th>FVSM</th>
                <th>MG</th>
                <th>Sucre</th>
                <th>Score</th>
                <th>Crée le</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($ds as $donnee)
            <tr>
                <td><strong><?php echo $donnee->calcium; ?></strong></td>
                <td><?php echo $donnee->prot; ?></td>
                <td><strong><?php echo $donnee->GL; ?></strong></td>
                <td><?php echo $donnee->FVSM; ?></td>
                <td><strong><?php echo $donnee->MG; ?></strong></td>
                <td><?php echo $donnee->sucre; ?></td>
                <td><strong><?php echo $donnee->score; ?></strong></td>
                <td><?php echo $donnee->create_at; ?></td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
