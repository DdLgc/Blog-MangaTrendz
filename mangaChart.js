var ctx = document.getElementById('mangaChart').getContext('2d');
var mangaChart = new Chart(ctx, {
    type: 'line',
    data: {
    labels: ['2016','2017','2018','2019','2020','2021'],
    datasets: [{
        label: 'Vente de Manga',
        data: [60,70,75,80,85,90],
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
        borderColor: 'rgba(255, 99, 132, 1)',
        borderWidth: 1

    }]
},
options: {
    scales: {
        y: {
            beginAtZero: true
        }
    }
}
});