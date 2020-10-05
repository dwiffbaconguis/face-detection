<div class="row">
    <div class="col-12">
        <strong>Labels found: {{ PHP_EOL }} {{ count($labels) }}</strong>
        <ol>
            @if ($labels)
                @foreach ($labels as $label)
                    <li>
                    <h6> {{ Str::ucfirst($label->getDescription()) }} {{ PHP_EOL }} </h6>
                    Confidence: <strong> {{ number_format($label->getScore() * 100, 2) }} </strong>
                    </li>
                @endforeach
            @else
                    <strong>No label found.</strong>
            @endif
        </ol>
    </div>
</div>
