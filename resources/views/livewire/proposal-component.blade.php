<div class="pet-page__card-top-counts">
    <strong class="pet-page__content-card-right-counts-number">
        @if ($proposal->vote_count == 0)
            0
        @else
            {{$voteCount}}
        @endif
    </strong> @php
        $voteCount = $proposal->vote_count;
        $lastDigit = $voteCount % 10;

        if ($voteCount >= 11 && $voteCount <= 19) {
            echo 'голосів';
        } elseif ($lastDigit == 1) {
            echo 'голос';
        } elseif ($lastDigit >= 2 && $lastDigit <= 4) {
            echo 'голоси';
        } else {
            echo 'голосів';
        }
    @endphp
    <div class="pet-page__card-top-progress">
        <progress class="pet-page__progress-bar" value="{{$voteCount}}" max="5"></progress>
    </div>
</div>
