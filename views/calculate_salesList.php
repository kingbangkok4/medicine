<?php
include "./model/product.php";
$dateF  = "";
$dateT = "";
$total = 0.00;
if ($_REQUEST["dateFrom"] != "" && $_REQUEST["dateTo"] != ""){
	$dateF = $_REQUEST["dateFrom"];
	$dateT =  $_REQUEST["dateTo"];
}
$obj = new Product();
$rows = $obj->read_sale(" DATE_FORMAT(po.out_date,'%Y-%m-%d') >= '".$dateF."' AND DATE_FORMAT(po.out_date,'%Y-%m-%d') <= '".$dateT."' ");

//echo ($rows);
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
    <h3><label class="label label-warning">รายงานยอดขายแต่ละเดือน</label></h3>
   <form action="index.php?viewName=rptMonthList" method="post" class="form form-horizontal">
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
				 <button type="submit" class="btn btn-primary pull-right" style="width:150px;">ค้นหา</button>
			</div>
        </div>
        <br />
        <br />
        <table class="table table-bordered table-hover">
            <thead>
                <tr class="success" >
                    <th>ลำดับ</th>
                    <th>เลขที่ใบเบิก</th>
                    <th>ผู้เบิก</th>
                    <th>วันที่เบิก</th>
                    <th>รหัสอ้างอิงสินค้า</th>
					<th>รหัสสินค้า</th>
					<th>ชื่อสินค้า</th>
					<th>จำนวน</th>
                    <th>ราคา</th>
                    <th>ราคารวม</th>
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
                            <td><?= $row["id"] ?></td>
                            <td><?= $row["emp_user"] ?></td>
                            <td><?= $row["out_date"] ?></td>
                            <td><?= $row["product_ref_id"] ?></td>
							<td><?= $row["product_id"] ?></td>
							<td><?= $row["product_name"] ?></td>
							<td><?= number_format($row["quantity"]) ?></td>		
                            <td><?= number_format($row["price"]) ?></td>
                            <td><?= number_format($row["sum_price"]) ?></td>
                        </tr>                       
                        <?php 
						$total += $row["sum_price"];
                    }
                }
                ?>
            </tbody>
        </table>
        <br /><br />
        <div class="col-md-12 pull-right">
        	<h4><label class="label label-success pull-right">รวมยอดขายทั้งหมด <?php echo " ".number_format($total)." "; ?> บาท</label></h4>
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