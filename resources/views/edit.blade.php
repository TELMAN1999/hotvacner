@extends('html')
@section('titles') Փոփոխել @endsection
@section('shablon')
<form method="post" action="">
    @csrf
    <input pattern=".+" required type="text" name="Article_title" id="Article_title" placeholder="Հոդվածի վերնագիր"><br>
    <textarea min="3" required type="text" name="Article" id="Article" placeholder="Հոդված"></textarea><br>
    <input pattern=".+" required type="text" name="Author" id="Author" placeholder="Հեղինակ"><br>
    <input type="number" min="1901" max="2021" step="1" value="2021" name="Year" id="Year" placeholder="Գրման թվականը"><br>
    <button type="submit"> Փոփոխել </button>
</form>
@endsection
