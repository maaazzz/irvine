var data1 = {
    datasets: [{
        data: [10, 14, 8, 12, 15, 9, 13, 18, 7, 11, 16, 6],
        backgroundColor: ['#3f9c35', '#0088ce', '#cc0000', '#ec7a07', '#f4b084', '#8ea9db', '#a6a6a6', '#ffd966', '#c9c9c9', '#757171', '#e05f5f', '#8de284']
    }]
};

var data2 = {
    datasets: [{
        data: [18, 13, 20, 9, 15, 11],
        backgroundColor: ['#0088ce', '#757171', '#c9c9c9', '#f4b084', '#8ea9db', '#ffd966']
    }]
};

var data3 = {
    datasets: [{
        data: [54, 10, 14, 22],
        backgroundColor: ['#8ea9db', '#ffd966', '#0088ce', '#ec7a07']
    }]
};

var option = {
    responsive: true,
    legend: {
        display: false
    },
    tooltips: {
        callbacks: {
            label: function (tooltipItem, data) {
                var dataset = data.datasets[tooltipItem.datasetIndex];
                var total = dataset.data.reduce(function (previousValue, currentValue, currentIndex, array) {
                    return previousValue + currentValue;
                });
                // var name = data['labels'];
                var currentValue = dataset.data[tooltipItem.index];
                var percentage = Math.floor(((currentValue / total) * 100) + 0.5);
                return percentage + "%";
            }
        },
        custom: function (tooltip) {
            if (!tooltip) return;
            tooltip.displayColors = false;
        },
    }
};

var config1 = {
    type: 'pie',
    data: data1,
    options: option
};

var config2 = {
    type: 'pie',
    data: data2,
    options: option
};

var config3 = {
    type: 'pie',
    data: data3,
    options: option
};

window.onload = function () {
    var ctx1 = document.getElementById('dashChart1').getContext('2d');
    var ctx2 = document.getElementById('dashChart2').getContext('2d');
    var ctx3 = document.getElementById('dashChart3').getContext('2d');
    var ctx4 = document.getElementById('dashChart4').getContext('2d');
    var ctx5 = document.getElementById('dashChart5').getContext('2d');
    var ctx6 = document.getElementById('dashChart6').getContext('2d');

    window.myPie1 = new Chart(ctx1, config1);
    window.myPie2 = new Chart(ctx2, config2);
    window.myPie3 = new Chart(ctx3, config3);
    window.myPie4 = new Chart(ctx4, config1);
    window.myPie5 = new Chart(ctx5, config2);
    window.myPie6 = new Chart(ctx6, config3);
};