<div class="col-md-12">
    <div class="row">
        <ol>
            <li>
                <strong>Adult</strong> {{ $likelihood[$safe->getAdult()] }} <br>
                <strong>Medical</strong> {{ $likelihood[$safe->getMedical()] }} <br>
                <strong>Spoof</strong> {{ $likelihood[$safe->getSpoof()] }} <br>
                <strong>Violence</strong> {{ $likelihood[$safe->getViolence()] }} <br>
                <strong>Racy</strong> {{ $likelihood[$safe->getRacy()] }}
            </li>
        </ol>
    </div>
</div>
