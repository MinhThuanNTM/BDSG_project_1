

const revenueChart = document.getElementById('revenueChart');


const myChart= 
new Chart("revenueChart", {
    
  type: 'line',
  data: {
    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
    datasets: [{
      label: 'Doanh thu',
      data: [12, 19, 3, 5, 2, 3],
      borderWidth: 2,
      fill: true,
    //   borderColor: 'rgb(75, 192, 192)',
      backgroundColor: 'rgb(45, 156, 219, 0.5)'
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