<?php

/**
 * View for Dice.
 */

declare(strict_types=1);

var_dump($data);
$rooms = $data['rooms'] ?? [];
// $roomId = $data['roomId'] ?? "";
$diceHand = $data['diceHand'] ?? false;
$classes = $data['classes'] ?? [];
$diceSum = $data['diceSum'] ?? null;
$message = $data['message'] ?? null;
$roomAndPath = $data['roomAndPath'] ?? [];
// var_dump($diceHand);
// var_dump($roomId);
// var_dump($classes);
// var_dump($_POST);
// var_dump($rooms);
?>
    <?php foreach ($rooms as $room) {
        $img =  $room['img'] ?>
    <div class="adventure-room">
        <h1><?= $room['name'] ?></h1>
        <img src="{{ url('img/'). '/'.$img }}" alt="<?= $room['img'] ?>">
        <p><?= $room['description'] ?></p>
    </div>
    <?php } ?>

    <?php if ($diceHand) : ?>
        <div class="dice">
        <?php
        foreach ($classes as $class) {
            ?>
            <i class="dice-sprite <?= $class ?>"></i>
            <?php
        }
        ?>
    </div>
        <form method="post" action="roll">
            @csrf
            <input type="submit" name="submit" value="<?=$message?>">
        </form>
    <?php else : ?>
        <?php foreach ($roomAndPath as $room) { ?>
    <form method="post" action="room">
        @csrf
        <input type="submit" name="description" value="<?=$room['description']?>">
        <input type="hidden" name="id" value="<?=$room['room_2']?>">
    </form>
        <?php } ?>
    <?php endif; ?>

<?php if ($rooms[0]['name'] === 'Game over' || $rooms[0]['name'] === 'Skatten') : ?>
    <a href="{{url('/adventure')}}">Tillbaka till start</a>
<?php endif; ?>
