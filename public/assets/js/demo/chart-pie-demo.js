// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    // labels: ["Pending", "On Progress", "Approved", "Rejected"],
    labels: ["Pending", "Approved", "Rejected"],
    datasets: [{
      data: [55, 30, 15],
      backgroundColor: ['#f0ad4e', '#5cb85c', '#d9534f'],
      // data: [55, 30, 15, 10],
      // backgroundColor: ['#f0ad4e', '#5bc0de', '#5cb85c', '#d9534f'],
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
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
    cutoutPercentage: 80,
  },
});
