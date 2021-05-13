<?php

/**
 * View for Dice.
 */

declare(strict_types=1);

// var_dump($data);
$adventure = $data['adventure'] ?? false;
?>
@include('includes.header')

<?php if ($adventure) : ?>
    @include('adventure')
<?php else : ?>
    <h1>Adventure</h1>
    <a href="{{ url('/adventure/quest') }}">Starta äventyret</a>

<?php endif; ?>
@include('includes.footer')
