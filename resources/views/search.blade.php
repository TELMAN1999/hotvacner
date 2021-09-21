@extends('html')
@section('titles') Որոնել @endsection
@section('shablon')

<form method="post"  >
@csrf <!-- {{ csrf_field() }} -->
    <input type="text" name="title" placeholder="Որոնել">
    <input type="submit" value="Փնդրել">
</form>
@if($articles)

<table>
    <thead>
    <tr>
        <th>Թիվ</th>
        <th>Հոդվածի վերնագիրը</th>
        <th>Հոդված</th>
        <th>Հեղինակ</th>
        <th>Գրման Ժամանակը</th>
    </tr>
    </thead>

    @foreach ($articles as $article)
        <tr>
            <td>{{$article->id}}</td>
            <td>{{$article->Article_title}}</td>
            <td>{{$article->Article}}</td>
            <td>{{$article->Author}}</td>
            <td>{{$article->Year}}</td>

        </tr>
    @endforeach

</table>
@endif
@endsection
