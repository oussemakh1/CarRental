<script type="text/javascript">
              (function(window, document, $, undefined) {
                      "use strict";
                      $(function() {

                    if ($('#chartjs_line').length) {
                                  var ctx = document.getElementById('chartjs_line').getContext('2d');

                                  var myChart = new Chart(ctx, {
                                          type: 'line',

                                          data: {
                                              labels: ["janvier","février","mars","avril","mai","juin","juillet","août","septembre","octobre","novembre" ,"décembre"],
                                              datasets: [{
                                                  label: 'Location',
                                                  data: [
                                                    <?php echo $totalLocationBymonth[0]; ?>,
                                                    <?php echo $totalLocationBymonth[1]; ?>,
                                                    <?php echo $totalLocationBymonth[2]; ?>,
                                                    <?php echo $totalLocationBymonth[3]; ?>,
                                                    <?php echo $totalLocationBymonth[4]; ?>,
                                                    <?php echo $totalLocationBymonth[5]; ?>,
                                                    <?php echo $totalLocationBymonth[6]; ?>,
                                                    <?php echo $totalLocationBymonth[7]; ?>,
                                                    <?php echo $totalLocationBymonth[8]; ?>,
                                                    <?php echo $totalLocationBymonth[9]; ?>,
                                                    <?php echo $totalLocationBymonth[10]; ?>,
                                                    <?php echo $totalLocationBymonth[11]; ?>
                                                  ],

                                                  backgroundColor: "rgb(50, 222, 27,0.5)",
                                                  borderColor: "rgba(89, 105, 255,0.7)",
                                                  borderWidth: 2
                                              }, {
                                                  label: 'Reservation',
                                                  data: [

                                                    <?php echo $TotalReservationBymonth[0]; ?>,
                                                    <?php echo $TotalReservationBymonth[1]; ?>,
                                                    <?php echo $TotalReservationBymonth[2]; ?>,
                                                    <?php echo $TotalReservationBymonth[3]; ?>,
                                                    <?php echo $TotalReservationBymonth[4]; ?>,
                                                    <?php echo $TotalReservationBymonth[5]; ?>,
                                                    <?php echo $TotalReservationBymonth[6]; ?>,
                                                    <?php echo $TotalReservationBymonth[7]; ?>,
                                                    <?php echo $TotalReservationBymonth[8]; ?>,
                                                    <?php echo $TotalReservationBymonth[9]; ?>,
                                                    <?php echo $TotalReservationBymonth[10]; ?>,
                                                    <?php echo $TotalReservationBymonth[11]; ?>
                                                  ],
                                                  backgroundColor: "rgb(217, 217, 48,0.5)",
                                                  borderColor: "rgba(255, 64, 123,0.7)",
                                                  borderWidth: 2
                                              }]

                                          },
                                          options: {
                                              legend: {
                                                  display: true,
                                                  position: 'bottom',

                                                  labels: {
                                                      fontColor: '#71748d',
                                                      fontFamily: 'Circular Std Book',
                                                      fontSize: 14,
                                                  }
                                              },

                                              scales: {
                                                  xAxes: [{
                                                      ticks: {
                                                          fontSize: 14,
                                                          fontFamily: 'Circular Std Book',
                                                          fontColor: '#71748d',
                                                      }
                                                  }],
                                                  yAxes: [{
                                                      ticks: {
                                                          fontSize: 14,
                                                          fontFamily: 'Circular Std Book',
                                                          fontColor: '#71748d',
                                                      }
                                                  }]
                                              }
                                          }



                                  });}







                                                    });


              })(window, document, window.jQuery);

</script>

<script type="text/javascript">

$(function() {
    "use strict";
    // ==============================================================
    // Revenue

    var ctx = document.getElementById("total-sale").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'doughnut',

        data: {
            labels: [
                <?php foreach($profitBycar as $car):?>
                "<?php echo $car['marque'];?>",
                <?php endforeach;?>
            ],
            datasets: [{
                backgroundColor: [
                    "#2aa670",
                    "#ff407b",
                    "#25d5f2",
                    "#ffc750"
                ],
                data: [
                    <?php foreach($profitBycar as $profit):?>
                    "<?php echo $profit['profit']; ?>",
                    <?php endforeach; ?>
                ]
            }]
        },
        options: {
            legend: {
                display: true

            }
        }

    });
    // ==============================================================
 var ctx = document.getElementById('revenue').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',

                data: {
                  labels: ["janvier","février","mars","avril","mai","juin","juillet","août","septembre","octobre","novembre" ,"décembre"],
                    datasets: [{
                        label: 'Profit par mois',
                        data: [
                          <?php echo $profitByMonth[0]; ?>,
                          <?php echo $profitByMonth[1]; ?>,
                          <?php echo $profitByMonth[2]; ?>,
                          <?php echo $profitByMonth[3]; ?>,
                          <?php echo $profitByMonth[4]; ?>,
                          <?php echo $profitByMonth[5]; ?>,
                          <?php echo $profitByMonth[6]; ?>,
                          <?php echo $profitByMonth[7]; ?>,
                          <?php echo $profitByMonth[8]; ?>,
                          <?php echo $profitByMonth[9]; ?>,
                          <?php echo $profitByMonth[10]; ?>,
                          <?php echo $profitByMonth[11]; ?>
                        ],
                      backgroundColor: "rgb(51, 219, 51,0.5)",
                                    borderColor: "rgba(89, 105, 255,0.7)",
                                    borderWidth: 2

                    }]
                },
                options: {

                   legend: {
                        display: true,
                        position: 'bottom',

                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                // Include a dollar sign in the ticks
                                callback: function(value, index, values) {
                                    return '$' + value;
                                }
                            }
                        }]
        },


         scales: {
                                    xAxes: [{
                                        ticks: {
                                            fontSize: 14,
                                            fontFamily: 'Circular Std Book',
                                            fontColor: '#71748d',
                                        }
                                    }],
                                    yAxes: [{
                                        ticks: {
                                            fontSize: 14,
                                            fontFamily: 'Circular Std Book',
                                            fontColor: '#71748d',
                                        }
                                    }]
                                }

                }
            });
    });





</script>