<?php
include "./model/product.php";
include "./model/type.php";
$obj = new Product();
$obj_type = new Type();
$rows = $obj->read(" p.id = {$_REQUEST["id"]} AND pd.product_ref_id = {$_REQUEST["id"]} ");
$rows_type = $obj_type->read();
if ($rows != false) {
    $row = $rows[0];
}
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
		<h3><label class="label label-warning">แก้ไขข้อมูลสินค้า</label></h3>
  </legend> 
    <form action="doUpdateProduct.php" method="post" class="form form-horizontal">
	  <input type="hidden" name="id" value="<?=$_REQUEST["id"]?>" />
        <fieldset>
			<div class="row">
				<div class="form-group col-md-6">
					<label>รหัสสินค้า</label>
					<input type="text" name="product_id" value="<?= $row["product_id"] ?>" class="form-control" required="" />
				</div>
				<div class="form-group col-md-6">
					<label>ชื่อสินค้า</label>
					<input type="text" name="product_name" value="<?= $row["product_name"] ?>" class="form-control"  required="" />
				</div>
			</div>
			
			<div class="row">
				<div class="form-group col-md-6">
					<label>ประเภทสินค้า</label>
					<select id="product_type_id" name="product_type_id"  class="form-control">
							<?php
								if ($rows_type != false) {
									foreach ($rows_type as $row_type) {
							?>					
									<option <?php if ($row_type["id"] == $row["product_type_id"]) echo 'selected' ; ?> value="<?= $row_type["id"] ?>"><?= $row_type["type_name"] ?></option>
							<?php } } ?>
					</select> 
				</div>			
				<div class="form-group col-md-6">
					<label>หน่วย</label>
					<input type="text" name="product_unit" value="<?= $row["product_unit"] ?>" class="form-control"  required="" />
					</div>
					<div class="form-group col-md-6">
						<label>วันหมดอายุ</label>
						<input  style="" type="text" placeholder=""  id="product_expire" name="product_expire" value="<?= $row["product_expire"] ?>" class="form-control" readonly="readonly" required="">
					</div>
					<div class="form-group col-md-6">
						<label>จำนวน</label>
						<input type="number" name="quantity" value="<?= $row["quantity"] ?>" class="form-control"  required="" />
				</div>
			</div>
			
			<div class="row">
				<div class="form-group col-md-6">
					<label>ราคา</label>
					<input type="number" name="price" value="<?= $row["price"] ?>" class="form-control"  required="" />
				</div>
				<div class="form-group col-md-6">
				</div>
			</div>
            <div class="form-group  col-md-12">
                <button type="submit" class="btn btn-primary">
                    บันทึกข้อมูล
                </button>
            </div>
        </fieldset>
    </form>
</div>