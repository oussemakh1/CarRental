

</div>
</div>
</div>


<!-- footer -->
<!-- ============================================================== -->
<div class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                 Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="text-md-right footer-links d-none d-sm-block">
                    <a href="javascript: void(0);">About</a>
                    <a href="javascript: void(0);">Support</a>
                    <a href="javascript: void(0);">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- end footer -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- end wrapper  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- end main wrapper  -->
<!-- ============================================================== -->
<!-- Optional JavaScript -->
<!-- jquery 3.3.1 -->
<script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<!-- bootstap bundle js -->
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<!-- slimscroll js -->
<script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
<!-- main js -->
<script src="../assets/libs/js/main-js.js"></script>
<!-- chart chartist js -->
<script src="../assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
<!-- sparkline js -->
<script src="../assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
<!-- morris js -->
<script src="../assets/vendor/charts/morris-bundle/raphael.min.js"></script>
<script src="../assets/vendor/charts/morris-bundle/morris.js"></script>
<!-- chart c3 js -->
<script src="../assets/vendor/charts/c3charts/c3.min.js"></script>
<script src="../assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
<script src="../assets/vendor/charts/c3charts/C3chartjs.js"></script>
<script src="../assets/libs/js/dashboard-ecommerce.js"></script>

<script src="../assets/vendor/charts/charts-bundle/Chart.bundle.js"></script>
<script src="../assets/vendor/charts/charts-bundle/chartjs.js"></script>
<script src="print.js"></script>
<!-- excel export -->
<script type="text/javascript" >
    document.getElementById('export_excel').onclick=function(){
        var tableId= document.getElementById('facture').id;
        htmlTableToExcel(tableId, filename = '');
    }
   var htmlTableToExcel= function(tableId, fileName = ''){
    var downloadedFileName='excel_table_data';
    var TableDataType = 'application/vnd.ms-excel';
    var selectTable = document.getElementById(tableId);
    var htmlTable = selectTable.outerHTML.replace(/ /g, '%20');

    filename = filename?filename+'.xls':downloadedFileName+'.xls';
    var downloadingURL = document.createElement("a");
    document.body.appendChild(downloadingURL);

    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', htmlTable], {
            type: TableDataType
        });
        navigator.msSaveOrOpenBlob( blob, fileName);
    }else{

        downloadingURL.href = 'data:' + TableDataType + ', ' + htmlTable;
        downloadingURL.download = fileName;
        downloadingURL.click();
    }
}
</script>

<!-- Export to pdf -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
<script type="text/javascript">
$(document).on('click','#btn_pdf',function(){ let pdf = new jsPDF(); let section=$('#facture'); let page= function() { pdf.save('pagename.pdf'); }; pdf.addHTML(section,page); })
</script>

<!-- print -->
<script>
function printDiv(divID) {
  //Get the HTML of div
  var divElements = document.getElementById(divID).innerHTML;
  //Get the HTML of whole page
  var oldPage = document.body.innerHTML;

  //Reset the page's HTML with div's HTML only
  document.body.innerHTML =
      "<html><head><title></title></head><body>" + divElements + "</body>";

  //window.print();
  //document.body.innerHTML = oldPage;

  //Print Page
  setTimeout(function () {
      print_page();
  }, 2000);

  function print_page() {
      window.print();
  }

  //Restore orignal HTML
  setTimeout(function () {
      restore_page();
  }, 3000);

  function restore_page() {
      document.body.innerHTML = oldPage;
  }
}
 </script>


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
                          <?php echo$profitByMonth[1]; ?>,
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
                           display: false

                       }
                   }

               });



</script>

</body>

</html>
