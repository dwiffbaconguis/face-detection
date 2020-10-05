<div class="col-md-12">
    <div class="row">
        <ol>
            <strong>Properties {{ PHP_EOL }}</strong>
            @foreach ($props->getDominantColors()->getColors() as $colorInfo)
                <li>
                    <strong>
                        <span style="color:rgb({{ $colorInfo->getColor()->getRed() }}, {{ $colorInfo->getColor()->getGreen() }}, {{ $colorInfo->getColor()->getBlue() }})">
                            RGB:
                        </span>
                    </strong>
                    {{ $colorInfo->getColor()->getRed() }}, {{ $colorInfo->getColor()->getGreen() }}, {{ $colorInfo->getColor()->getBlue() }} <br>
                    <strong>Score:</strong> {{ number_format($colorInfo->getScore() * 100, 2) }} <br>
                    <strong>Pixel Fraction:</strong> {{ number_format($colorInfo->getPixelFraction() * 100, 2) }}
                </li>
            @endforeach
        </ol>
    </div>
</div>
