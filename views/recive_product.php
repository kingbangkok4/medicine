<?php
header('Content-Type: text/html; charset=utf-8');
include "./model/product.php";
$obj = new Product();
$name = $_REQUEST["name"];
$id = $_REQUEST["id"];
$rows = $obj->read(" p.product_name LIKE '%{$name}%' AND pd.quantity > 0 ");
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
		$('#product_expire').datepicker({
			format: "yyyy-mm-dd"
		});   
	});
</script>
           
<div class="container">
<legend>
    <h3><label class="label label-warning">รับสินค้า</label></h3>
</legend>	
 <form class="form-horizontal" role="form" method="post" action="?viewName=recive_product">
            <div class="row">
				 <div class="form-group col-md-12">
					<label>ชื่อสินค้า</label>
					<input type="text" name="name" value="<?= $name ?>" class="form-control" />
                    <input type="hidden" name="id" />
				</div>			
			</div>	
            
            <div class="row">
				 <div class="form-group col-md-12">
				<button class="btn btn-success pull-right form-control" type="submit" data-toggle="modal" data-target="#myModal">
                    ค้นหาสินค้า
                </button>
				</div>				
			</div>
            
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">เลือกสินค้า</h4>
              </div>
              <div class="modal-body">
                <p style="text-align:center"></p>								   
                        <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr class="success">
                                    <th>ลำดับ</th>
                                    <th>รหัสอ้างอิง</th>
                                    <th>รหัสสินค้า</th>
                                    <th>ชื่อสินค้า</th>
                                    <th>ประเภทสินค้า</th>
                                    <th>หน่วย</th>
                                    <th>วันหมดอายุ</th>
                                    <th>จำนวน</th>
                                    <th>ราคา</th>
                                    <th>ดำเนินการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($rows != false) {
                                    $count = 1;
                                    foreach ($rows as $row) {
                                        ?>
                                        <tr>
                                            <td><?= $count++; ?></td>
                                            <td><?= $row["id"] ?></td>
                                            <td><?= $row["product_id"] ?></td>
                                            <td><?= $row["product_name"] ?></td>
                                            <td><?= $row["type_name"] ?></td>
                                            <td><?= $row["product_unit"] ?></td>
                                            <td><?= $row["product_expire"] ?></td>
                                            <td><?= $row["quantity"] ?></td>
                                            <td><?= number_format($row["price"], 2); ?></td>
                                            <td>
                                                <a href="index.php?viewName=recive_product&id=<?= $row["id"] ?>&name=" class="btn btn-sm btn-primary">
                                                    เลืิอก
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                 </div>
              </div>           
            </div><!-- /.modal-content -->
    </form>
            
    <form action="doAddRecive.php" method="post" class="form form-horizontal">
        <fieldset>          
            <div class="row">
				 <div class="form-group col-md-12">
					<label>รหัสสินค้าอ้างอิง</label>
					<input type="text" name="id" readonly="readonly" value="<?= $id ?>" class="form-control" required="" />
				</div>			
			</div>	
            
			<div class="row">
				<div class="form-group col-md-12">
					<label>จำนวน</label>
					<input type="number" name="quantity" value="0" class="form-control"  required="" />
				</div>
			</div>
			
			
            <div class="form-group col-md-12">
                <button type="submit" class="btn btn-primary">
                    บันทึกข้อมูล
                </button>
            </div>
        </fieldset>
    </form>
</div>
