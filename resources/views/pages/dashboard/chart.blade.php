<div class="p-0">
    <div class="chart-pie">
        <canvas id="myChart"></canvas>
    </div>
    <div class="mt-4 text-center small">
        <span class="mr-2">
            <i class="fas fa-circle text-primary"></i> Headline
        </span>
        <span class="mr-2">
            <i class="fas fa-circle text-success"></i> Indepth
        </span>
        <span class="mr-2">
            <i class="fas fa-circle text-info"></i> Kebijakan
        </span>
        <span class="mr-2">
            <i class="fas fa-circle text-warning"></i> Serba Serbi
        </span>
        <span class="mr-2">
            <i class="fas fa-circle text-danger"></i> Konsultasi
        </span>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
    type: 'doughnut',

    // The data for our dataset
    data: {
        labels: ["Headline", "Indepth", "Kebijakan", "Serba Serbi", 'Konsultasi'],
        datasets: [{
            backgroundColor: ['#2979FF', '#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b'],
            data: [{{$artikel_headline}}, {{$artikel_indepth}}, {{$artikel_kebijakan}}, {{$artikel_serbaserbi}}, {{$artikel_konsultasi}}],
        }]
    },

    // Configuration options go here
    options: {
        tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#000000",
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
        },
        legend: {
            display: false
        },
        cutoutPercentage: 60,
    }
});
</script>
