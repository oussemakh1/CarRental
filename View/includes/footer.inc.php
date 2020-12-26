
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5fddc3d5a8a254155ab4bd02/1ept49v1m';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

</div>
</div>
</div>


<!-- footer -->
<!-- ============================================================== -->

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
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

<!-- Export to pdf -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
<script type="text/javascript">
    $(document).on('click','#btn_pdf',function(){ let pdf = new jsPDF(); let section=$('#facture'); let page= function() { pdf.save('pagename.pdf'); }; pdf.addHTML(section,page); })
</script>
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
<!-- print -->
<script type="text/javascript">
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



</body>

</html>
