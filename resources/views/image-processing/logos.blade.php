<div class="col-md-12">
    <div class="row">
        <strong>Logos found: {{ PHP_EOL }} {{ count($logos) }}</strong>
        <ol>
            @foreach ($logos as $logo)
                <li>
                    <h6>{{ Str::ucfirst($logo->getDescription()) }} {{ PHP_EOL }}</h6>
                Confidence: <strong>{{ number_format($logo->getScore() * 100, 2) }}</strong>
                </li>
            @endforeach
        </ol>
    </div>
</div>
