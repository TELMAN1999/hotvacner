@extends('html')
@section('titles') Հոդվածներ @endsection
@section('shablon')
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
                <div>@if( Auth :: user())
                         <a href="/search"> Որոնել Հոդված </a> <br>
                        <a href="/new_author"> Նոր Հոդված </a>
                      @endif
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
                                @if( Auth :: user() &&
                                    $article->email == Auth::user()->email)
                                    <td><a href="/edit?id={{$article->id}}"> Փոփոխել </a>
                                    </td>
                                    <td>
                                        <form method="post" name="delete">
                                            @csrf
                                            <input type="hidden" value="{{$article->id}}" name="id">
                                            <button type="submit"> Ջնջել </button>
                                        </form>
                                    </td>
                                    @endif
                            </tr>
                            @endforeach

                    </table>
                </div>
        </div>
@endsection
