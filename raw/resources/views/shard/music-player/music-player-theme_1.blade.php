<?php
$musics = [
    ['name' => 'Instrument 1', 'source' => '/assets/audio/mp3/InstrumenAplas_1.mp3'],
    ['name' => 'Instrument 2', 'source' => '/assets/audio/mp3/InstrumenAplas_2.mp3'],
    ['name' => 'Instrument 3', 'source' => '/assets/audio/mp3/InstrumenAplas_3.mp3'],
    ['name' => 'Instrument 4', 'source' => '/assets/audio/mp3/InstrumenAplas_4.mp3'],
    ['name' => 'Instrument 5', 'source' => '/assets/audio/mp3/InstrumenAplas_5.mp3'],
    ['name' => 'Instrument 6', 'source' => '/assets/audio/mp3/InstrumenAplas_6.mp3'],
    ['name' => 'Instrument 7', 'source' => '/assets/audio/mp3/InstrumenAplas_7.mp3'],
    ['name' => 'Instrument 8', 'source' => '/assets/audio/mp3/InstrumenAplas_8.mp3'],
    ['name' => 'Instrument 9', 'source' => '/assets/audio/mp3/InstrumenAplas_9.mp3'],
    ['name' => 'Instrument 10', 'source' => '/assets/audio/mp3/InstrumenAplas_10.mp3']
]
?>
<div id="cover">
    <div class="panel panel-default">
        <audio id="audio" tabindex="0" controls>
            <source src="{{$musics[0]['source']}}">
        </audio>
    </div>

    <ul id="playlist">
        @foreach($musics as $k => $music)
            <li class="{{$k === 0 ? 'active' : ''}} list-group-item">
                <a href="{{$music['source']}}">
                    {{$music['name']}}
                </a>
            </li>
        @endforeach
    </ul>
</div>
