<div class="col-md-12" style="overflow:hidden;">
    <div class="row">
        <ol>
            <strong>Best guess labels: {{ count($web->getBestGuessLabels()) }}</strong>
            @foreach ($web->getBestGuessLabels() as $label)
                <li>
                    <strong>Best guess label: {{ $label->getLabel() }}</strong>
                </li>
            @endforeach
        </ol>
        <ol>
            <strong>Pages with matching image found: {{ count($web->getPagesWithMatchingImages()) }}</strong>
            @foreach ($web->getPagesWithMatchingImages() as $page)
                <li>
                    <strong>URL: <a href="{{ $page->getUrl() }}">{{ $page->getUrl() }}</a></strong>
                </li>
            @endforeach
        </ol>
        <ol>
            <strong>Full matching image found: {{ count($web->getFullMatchingImages()) }}</strong>
            @foreach ($web->getFullMatchingImages() as $fullMatchingImage)
                <li>
                    <strong>URL: <a href="{{ $fullMatchingImage->getUrl() }}">{{ $fullMatchingImage->getUrl() }}</a></strong>
                </li>
            @endforeach
        </ol>
        <ol>
            <strong>Partial matching image found: {{ count($web->getPartialMatchingImages()) }}</strong>
            @foreach ($web->getPartialMatchingImages() as $partialMatchingImage)
                <li>
                    <strong>URL: <a href="{{ $partialMatchingImage->getUrl() }}">{{ $partialMatchingImage->getUrl() }}</a></strong>
                </li>
            @endforeach
        </ol>
        <ol>
            <strong>Visually similar image found: {{ count($web->getVisuallySimilarImages()) }}</strong>
            @foreach ($web->getVisuallySimilarImages() as $visuallySimilarImage)
                <li>
                    <strong>URL: <a href="{{ $visuallySimilarImage->getUrl() }}">{{ $visuallySimilarImage->getUrl() }}</a></strong>
                </li>
            @endforeach
        </ol>
        <ol>
            <strong>Web Entities found: {{ count($web->getWebEntities()) }}</strong>
            @foreach ($web->getWebEntities() as $entity)
                <li>
                    <strong>Description: {{ $entity->getDescription() }}</strong> <br>
                    <strong>Score: {{ number_format($entity->getScore() * 100, 2) }}</strong>
                </li>
            @endforeach
        </ol>
    </div>
</div>
