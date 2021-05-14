@php
$adventure = $data['adventure'] ?? false;
@endphp

@include('includes.header')

@if ($adventure)
    @include('adventure')
@else
    <div class="adventure-room">
        <h1>Äventyret</h1>
        <p>Det finns rykten om en skatt, någonstanns djupt in i skogen. Ännu har ingen lyckats
        nå den, ska du bli den första?</p>
        <a href="{{ url('/adventure/quest') }}">Starta äventyret</a>
    </div>

@endif
@include('includes.footer')
