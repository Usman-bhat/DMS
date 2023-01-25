<script>
//find sum of items of array
function sumArray(array){
    var sum = 0;
    for (let i = 0; i < array.length; i++) {
      sum += parseInt(array[i]);
    }
    return sum;
  }

  
  <?php
    include './../Audit_API_FOL/debit_data_api.php'; 
    ?>
  $(function () {
    /* ChartJS */
    
    // console.log(monthes);
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d');

    var areaChartData = {

      // labels : monthes_food,
      labels: ['<?= __('Jan')?>', '<?= __('Fab')?>', '<?= __('March')?>', '<?= __('April')?>', '<?= __('May')?>', '<?= __('June')?>', '<?= __('July')?>', '<?= __('Aug')?>', '<?= __('Sep')?>', '<?= __('Oct')?>', '<?= __('Nov')?>', '<?= __('Dec')?>'],
      datasets: [{
          label: '<?= __('Construction')?>',
          backgroundColor: 'rgba(87, 81, 81, 0.4)',
          borderColor: 'rgba(87, 81, 81, 1)',
          pointRadius: true,
          pointColor: 'rgba(87, 81, 81, 0.4)',
          pointStrokeColor: '#c1c7d1',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(87, 81, 81, 0.4)',
          data: amount_construction
        },
        {
          label: '<?= __('Food')?>',
          backgroundColor: 'rgba(252, 186, 3, 0.9)',
          borderColor: 'rgba(252, 186, 3, 1)',
          pointRadius: true,
          pointColor: 'rgba(252, 186, 3, 0.9)',
          pointStrokeColor: '#c1c7d1',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(252, 186, 3, 0.9)',
          data: amount_food
        },
        {
          label: '<?= __('Pay')?>',
          backgroundColor: 'rgba(51,82,60,0.9)',
          borderColor: 'rgba(51,82,60,1)',
          pointRadius: true,
          pointColor: '#3b8bba',
          pointStrokeColor: 'rgba(51,82,60,0.9)',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(51,82,60,0.9)',
          data: amount_pay
        },
        {
          label: '<?= __('Bills')?>',
          backgroundColor: 'rgba(77,143,209, 0.8)',
          borderColor: 'rgba(77,143,209, 1)',
          pointRadius: true,
          pointColor: 'rgba(77,143,209, 0.8)',
          pointStrokeColor: '#c1c7d1',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(77,143,209, 0.8)',
          data: amount_bills
        },
        {
          label: '<?= __('Others')?>',
          backgroundColor: 'rgba(199,181,169, 0.7)',
          borderColor: 'rgba(199,181,169, 1)',
          pointRadius: true,
          pointColor: 'rgba(199,181,169, 0.7)',
          pointStrokeColor: '#c1c7d1',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(199,181,169,0.7)',
          data: amount_others
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio: false,
      responsive: true,
      legend: {
        display: true
      },
      scales: {
        xAxes: [{
          gridLines: {
            display: false,
          }
        }],
        yAxes: [{
          gridLines: {
            display: false,
          }
        }]
      } 
    }

    // This will get the first returned node in the jQuery collection.
    new Chart(areaChartCanvas, {
      type: 'line',
      data: areaChartData,
      options: areaChartOptions
    })
  })
  // console.log(sumArray(amount_construction));
   // Donut Chart mainnn     --------------------------------------------------------------------------------------------------
   var pieChartCanvas = $('#sales-chart-canvas').get(0).getContext('2d')
  var pieData = {
    labels: ['<?= __('Construction')?>', '<?= __('Food')?>', '<?= __('Pay')?>', '<?= __('Bills')?>', '<?= __('Others')?>'],
    datasets: [{
      data:[sumArray(amount_construction),sumArray(amount_food),sumArray(amount_pay),sumArray(amount_bills),sumArray(amount_others)] ,
      // data: ['5','521','566','145','445','566','145','445','566','145','445'],
      backgroundColor: ['#f56954', '#f0d71d', '#2f4730','#32f01d', '#00a65a']
    }]
  }
  var pieOptions = {
    legend: {
      display: true
    },
    maintainAspectRatio: false,
    responsive: true
  }
  // Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  // eslint-disable-next-line no-unused-vars
  var pieChart = new Chart(pieChartCanvas, { // lgtm[js/unused-local-variable]
    type: 'doughnut',
    data: pieData,
    options: pieOptions
  })


</script>















<!-- <script>
  /* Chart.js Charts */
  // Sales chart
  var salesChartCanvas = document.getElementById('revenue-chart-canvas1').getContext('2d')
  // $('#revenue-chart1').get(0).getContext('2d');

  var salesChartData = {
    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
    datasets: [{
        label: 'Digital Goods',
        backgroundColor: 'rgba(60,141,188,0.9)',
        borderColor: 'rgba(60,141,188,0.8)',
        pointRadius: false,
        pointColor: '#3b8bba',
        pointStrokeColor: 'rgba(60,141,188,1)',
        pointHighlightFill: '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data: [28, 48, 40, 19, 86, 27, 90]
      },
      {
        label: 'Electronics',
        backgroundColor: 'rgba(210, 214, 222, 1)',
        borderColor: 'rgba(210, 214, 222, 1)',
        pointRadius: false,
        pointColor: 'rgba(210, 214, 222, 1)',
        pointStrokeColor: '#c1c7d1',
        pointHighlightFill: '#fff',
        pointHighlightStroke: 'rgba(220,220,220,1)',
        data: [65, 59, 80, 81, 56, 55, 40]
      }
    ]
  }

  var salesChartOptions = {
    maintainAspectRatio: false,
    responsive: true,
    legend: {
      display: false
    },
    scales: {
      xAxes: [{
        gridLines: {
          display: false
        }
      }],
      yAxes: [{
        gridLines: {
          display: false
        }
      }]
    }
  }

  // This will get the first returned node in the jQuery collection.
  // eslint-disable-next-line no-unused-vars
  var salesChart = new Chart(salesChartCanvas, { // lgtm[js/unused-local-variable]
    type: 'line',
    data: salesChartData,
    options: salesChartOptions
  })

  // Donut Chart
  var pieChartCanvas = $('#sales-chart-canvas').get(0).getContext('2d')
  var pieData = {
    labels: [
      'Instore Sales',
      'Download Sales',
      'Mail-Order Sales'
    ],
    datasets: [{
      data: [30, 12, 20],
      backgroundColor: ['#f56954', '#00a65a', '#f39c12']
    }]
  }
  var pieOptions = {
    legend: {
      display: false
    },
    maintainAspectRatio: false,
    responsive: true
  }
  // Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  // eslint-disable-next-line no-unused-vars
  var pieChart = new Chart(pieChartCanvas, { // lgtm[js/unused-local-variable]
    type: 'doughnut',
    data: pieData,
    options: pieOptions
  })
</script> -->
