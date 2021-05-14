
@php
$img =  $data['room']['img'];
$diceHand = $data['diceHand'] ?? false;
@endphp

    <div class="adventure-room">
        <h1>{{ $data['room']['name'] }}</h1>
        <img src="{{ url('img/'). '/'.$img }}" alt="{{ $data['room']['img'] }}">
        <p>{{ $data['room']['description'] ?? "" }}</p>

     @if ($diceHand)
        <div class="dice">
        @foreach ($data['classes'] as $class)
            <i class="dice-sprite {{  $class }}"></i>
        @endforeach
    </div>
        <form method="post" action="roll">
            @csrf
            <input type="submit" name="submit" value="{{ $message }}">
        </form>
    @else
    <div class="path">
        @foreach ($data['roomAndPath'] as $nextRoom)
    <form method="post" action="room">
        @csrf
        <input type="submit" name="description" value="{{ $nextRoom['description'] }}">
        <input type="hidden" name="id" value="{{ $nextRoom['room_2'] }}">
    </form>
    @endforeach
    @endif
    </div>

    @if ($data['room']['name'] === 'Game over' || $data['room']['name'] === 'Skatten')
        <a href="{{url('/adventure')}}">Tillbaka till start</a>
    @endif
    </div>
