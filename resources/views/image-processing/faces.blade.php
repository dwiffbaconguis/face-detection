<div class="row">
    <div class="col-12">
    <strong>Faces found: {{ PHP_EOL }} {{ count($faces) }}</strong>
        <ol>
            @if ($faces)
                @foreach ($faces as $face)
                    <li>
                        <hr>
                         <div class="row">
                            <div class="col-4">
                                <strong>Joy</strong>
                            </div>
                            <div class="col-8">
                                <strong> {{ $likelihood[$face->getJoyLikelihood()] }} </strong>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <strong>Sorrow</strong>
                            </div>
                            <div class="col-8">
                                <strong> {{ $likelihood[$face->getSorrowLikelihood()] }} </strong>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <strong>Angry</strong>
                            </div>
                            <div class="col-8">
                                <strong> {{ $likelihood[$face->getAngerLikelihood()] }} </strong>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <strong>Surprised</strong>
                            </div>
                            <div class="col-8">
                                <strong> {{ $likelihood[$face->getSurpriseLikelihood()] }} </strong>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <strong>Under Exposed</strong>
                            </div>
                            <div class="col-8">
                                <strong> {{ $likelihood[$face->getUnderExposedLikelihood()] }} </strong>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <strong>Blurred</strong>
                            </div>
                            <div class="col-8">
                                <strong> {{ $likelihood[$face->getBlurredLikelihood()] }} </strong>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <strong>Headwear</strong>
                            </div>
                            <div class="col-8">
                                <strong> {{ $likelihood[$face->getHeadwearLikelihood()] }} </strong>
                            </div>
                        </div>
                    </li>
                @endforeach
            @endif
        </ol>
    </div>
</div>
