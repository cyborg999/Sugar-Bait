<?php include_once "header.php";?>

	<link rel="stylesheet" href="reports/chosen/docsupport/style.css">
	<link rel="stylesheet" href="reports/chosen/docsupport/prism.css">
  <link rel="stylesheet" href="reports/chosen/chosen.css">
  <link rel="stylesheet" href="../js/jqueryui/jquery-ui.min.css">
  <link rel="stylesheet" href="../js/fontawesome/web-fonts-with-css/css/fontawesome.min.css">
  <link rel="stylesheet" href="../js/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css">
  <style type="text/css">
    a {
      color: #337ab7;
    }
  </style>
</head>

</head>
<body>
  <?php $packages = $model->getAllPackages(); ?>
	<main class="container">
  <?php $active="report"; include_once "nav.php"; ?>
    <article class="row">
      <div class="columns col-sm-12">
        <ol class="breadcrumb">
          <li class="s"><a href="report.php">Yearly Sales Report</a></li>
          <li>Export</li>
        </ol>
        <h2>Export Report</h2>
      </div>
      <div class="columns col-sm-5">
        <label for="from">From</label>
        <input type="text" required id="from" name="from">
        <label for="to">to</label>
        <input type="text" required id="to" name="to">
        <label>Status</label>
        <select id="status">
          <option value="0">On Process</option>
          <option value="1">Pending</option>
          <option value="2">Deal</option>
        </select>
      </div>
      <div class="columns col-sm-6">
        <form id="form">
          <em>Products</em>
          <select id="products" data-placeholder="Your Favorite Types of Bear" multiple class="chosen-select" tabindex="8">
            <option value=""></option>
            <?php foreach($packages as $idx => $package) : ?>
            <option selected value="<?= $package['id']; ?>"><?= $package['name']; ?></option>
            <?php endforeach ?>
          </select>
          <button class="filter">Filter <i class="fas fa-search fa-sm"></i></button>
          <!-- <button class="btns">PDF <i class="fas fa-file-pdf fa-sm"></i></button> -->
        </form>    
          <a id="csv" href="csv.php"><button">Export CSV <i class="fas fa-file-alt fa-sm"></i></button></a>
      </div>
    </article> 
    <article class="row">
      <div class="col-sm-12">
        <table class="table">
          <tr>
            <th width=10%>Package</th>
            <th width=15%>Name</th>
            <th width=10%>Status</th>
            <th width=10%>Date</th>
          </tr>
          <tbody id="tbody">
            <?php foreach($reservePackage as $idx => $package): ?>
              <tr class="tr">
              <td><?= $package['name'] ?></td>
              <td><?= $package['firstname'] . " " . $package['lastname'] ?></td>
              <td>
                  <?php
                    if($package['status'] == 0){
                      echo "ON PROCESS";
                    } elseif($package['status'] == 1){
                      echo "PENDING";
                    } else {
                      echo "DEAL";
                    }
                  ?>
              </td>
              <td><?= $package['date'] ?></td>
            </tr>
            <?php endforeach ?>  
          </tbody>
        </table> 
      </div>
    </article>
  </main>
<script type="text/html" id="tr">
    <tr class="tr">
      <td>[PACKAGE]</td>
      <td>[NAME]</td>
      <td>[STATUS]</td>
      <td>[DATE]</td>
    </tr>
</script>
<script src="reports/chosen/docsupport/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="reports/chosen/chosen.jquery.js" type="text/javascript"></script>
<script src="../js/jqueryui/jquery-ui.min.js" type="text/javascript"></script>
<script src="reports/chosen/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
<script src="reports/chosen/docsupport/init.js" type="text/javascript" charset="utf-8"></script>
 <script>
  (function($){
    $(document).ready(function(){
      var form = $("#form");

      form.on("submit", function(e){
        e.preventDefault();

        var status = $("#status").val();
        var products = $("#products").val();
        var year1 = $("#from").val();
        var year2 = $("#to").val();

        var url = "csv.php?getProducts=true&status="+status+"&products="+products+"&from="+year1+"&to="+year2;
        
        $("#csv").attr("href",url);

        $.ajax({
          url : "../process.php",
          data : { getProducts : true, status : status, products : products , from : year1, to :year2},
          type : 'POST',
          dataType : 'JSON',
          success : function(res){
            console.log(res.result);
            $(".tr").remove();

            for(var i in res.result){
              var tr = $("#tr").html();
              var tbody = $("#tbody"); 
              var status = res.result[i].status;

              switch(status){
                case '0' :
                  status = "ON PROCESS";
                  break;
                case '1' : 
                  status = "PENDING";
                  break;
                case '3' : 
                  status = "DEAL";
                  break;

              }

              tr = tr.replace("[PACKAGE]", res.result[i].name).
                  replace("[NAME]", res.result[i].firstname).
                  replace("[STATUS]", status).
                  replace("[DATE]", res.result[i].date);
              tbody.append(tr);
            }

          }
        });
      });

      var dateFormat = "Y-m-d",
      from = $( "#from" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 1
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#to" ).datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 1
        })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
      function getDate( element ) {
        var date;
        try {
          date = $.datepicker.parseDate( dateFormat, element.value );
        } catch( error ) {
          date = null;
        }
   
        return date;
      }
    }); 
  })(jQuery);   
  </script>
<?php include_once "footer.php"; ?>
