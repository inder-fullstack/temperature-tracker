document.addEventListener('DOMContentLoaded', function () {
    var ctx = document.getElementById('temperatureChart').getContext('2d');
    var temperatures = JSON.parse(document.getElementById('temperatureData').textContent);

    console.log('Temperature data:', temperatures);  // For debugging

    new Chart(ctx, {
        type: 'line',
        data: {
            datasets: [{
                label: 'Temperature (°C)',
                data: temperatures,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    type: 'time',
                    time: {
                        parser: 'yyyy-MM-dd HH:mm:ss',  // Ensure this matches your date format
                        unit: 'hour',
                        displayFormats: {
                            hour: 'MMM d, HH:mm'  // Correct usage of 'd' for day of the month
                        }
                    },
                    title: {
                        display: true,
                        text: 'Date and Time'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Temperature (°C)'
                    }
                }
            }
        }
    });
});
