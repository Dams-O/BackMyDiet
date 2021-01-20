@extends('layout.layout')

@section('custom_css')
    <link rel="stylesheet" href="{{ URL::asset("css/pages/addFood.css")}}"/>
@endsection

@include('layout.header_layout')

@section('content')
    <div class="container">
            <form class="text-center" method="GET" action="getAllProducts">
                {{ csrf_field() }}
                <label>Sélectionnez une catégorie</label>
                <select name="category" class="form-control">
                    <option value="">Aucune sélection</option>
                    @foreach ($cats as $cat)
                        {{--                          <option value="{{ $cat['id'] }}">{{ $cat['name'] }}</option>--}}
                        <option value="{{ $cat['name'] }}">{{ $cat['name'] }} ({{ $cat['products'] }} produits)</option>
                    @endforeach
                </select>

                <div class="form-group">
                    <input type="image" width="100" value="submit" src="{{URL::asset('img/addFood/check-rose.png')}}"
                           alt="submit Button"/>
                </div>
            </form>
            @isset($nutriments)
                <div>
                    <table class="table table-bordered" style="background: white">
                        <thead>
                        <tr>
                            <th>Nutriment</th>
                            <th>Moyenne pour 100g/100ml</th>
                            <th>Médiane pour 100g/100ml</th>
                        </tr>
                        </thead>
                        @foreach ($nutriments as $label => $nutriment)
                            <tr>
                                <td>{{ $label }}</td>
                                <td>{{ $nutriment['average'] }} {{ $nutriment['unit'] }}</td>
                                <td>{{ $nutriment['median'] }} {{ $nutriment['unit'] }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            @endisset
    </div>
    </div>
    </div>
    <script src="{{URL::asset('js/type-select.js')}}"></script>
@endsection
