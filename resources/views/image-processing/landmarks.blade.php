<div class="col-md-12">
    <div class="row">
        <strong>Landmarks found: {{ PHP_EOL }} {{ count($landmarks) }}</strong>
        <ol>
            @foreach($landmarks as $landmark)
                <li>
                <strong>{{ $landmark->getDescription() }}</strong> <br>
                Confidence: <strong> {{ number_format($landmark->getScore() * 100, 2) }} </strong>
                </li>
            @endforeach
        </ol>
    </div>
</div>
