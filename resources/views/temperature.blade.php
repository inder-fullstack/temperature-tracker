@include('header.header')

<div class="container">
    <h1>Temperature {{ !is_null($city) ? "in ".$city->name : "" }}</h1>
    <canvas id="temperatureChart"></canvas>
    <!-- Add this debugging section -->
    <div id="debug" style="display: none;">
        <h2>Debug Data:</h2>
        <pre id="temperatureData">{{ json_encode($temperatures, JSON_PRETTY_PRINT) }}</pre>
    </div>
</div>

@include('footer.footer')
