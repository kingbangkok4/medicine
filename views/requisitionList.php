<?php
include "./model/requisition.php";
$dateF  = "";
$dateT = "";
$total = 0.00;
if ($_REQUEST["dateFrom"] != "" && $_REQUEST["dateTo"] != ""){
	$dateF = $_REQUEST["dateFrom"];
	$dateT =  $_REQUEST["dateTo"];
}
$obj = new Requisition();
$rows = $obj->readAccount(" DATE_FORMAT(order_date,'%d/%m/%Y') BETWEEN '".$dateF."' AND '".$dateT."' ");
//var_dump($rows);
?>
<style>
    .color-box{
        display: inline-block;
        height: 25px;
        width: 90px;
    }
</style>
<script type="text/javascript">
	// When the document is ready
	$(document).ready(function () {		
		$('#dateFrom').datepicker({
			format: "yyyy-mm-dd"
		});  
		$('#dateTo').datepicker({
			format: "yyyy-mm-dd"
		});  
	});
</script>
<div class="container">
    <h3><label class="label label-warning">รายการบเบิกสินค้า</label></h3>
   <form action="index.php?viewName=accountList" method="post" class="form form-horizontal">
   <!--  <a href="index.php?viewName=add_tone" class="btn btn-primary">?????????????????</a> -->
    <br /><br /><br /><br /> 
    <div class="table-responsive">
    <div class="col-md-5">
            <div class="hero-unit">
                <input style="text-align:center;"  type="text" placeholder=""  id="dateFrom"  name="dateFrom"class="form-control" readonly="readonly"  value="<?= $dateF ?>" required="">
            </div>
        </div>
        <div class="col-md-2">
        <label style="text-align:center;"></label>
        </div>
        <div class="col-md-5">
            <div class="hero-unit">
                <input  style="text-align:center;" type="text" placeholder=""  id="dateTo" name="dateTo" class="form-control" readonly="readonly" value="<?= $dateT ?>" required="">
            </div>
        </div>
        <br /><br /><br /><br />
        <div class="col-md-12 col-sm-12 col-xs-12">
			 <div class="form-group pull-right">
				 <button type="submit" class="btn btn-primary pull-right" style="width:150px;"></button>
			</div>
        </div>
        <br />
        <table class="table table-bordered table-hover">
            <thead>
                <tr class="success" >
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($rows != false) {
                    $count = 1;
                    foreach ($rows as $row) {
                        ?>
                        <tr>
                            <td><?= $count++ ?></td>
                            <td><?= $row["order_date"] ?></td>
                            <td><?= number_format($row["price"]) ?></td>
                        </tr>                       
                        <?php 
						$total += $row["price"];
                    }
                }
                ?>
            </tbody>
        </table>
        <br /><br />
        <div class="col-md-12 pull-right">
        	<h4><label class="label label-success pull-right">???????????? <?php echo number_format($total); ?> ???</label></h4>
        </div>
    </div>
</div>
</form>
<script>
    $(function () {
        $(".color-box").each(function (index) {
            //console.log($(this).attr("data-code"));
            var codeHex = $(this).attr("data-code");
            $(this).css({backgroundColor: "#" + codeHex});
        });
    });
</script>