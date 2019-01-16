<?php
header('Content-Type: text/html; charset=utf-8');
include "./model/type.php";
$obj_type = new Type();
$rows_type = $obj_type->read();
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
    <form action="doAddProduct.php" method="post" class="form form-horizontal">
        <fieldset>
            <legend>
                <h3><label class="label label-warning">เพิ่มข้อมูลสินค้า</label></h3>
            </legend>
			<div class="row">
				 <div class="form-group col-md-6">
					<label>รหัสสินค้า</label>
					<input type="text" name="product_id" value="" class="form-control" required="" />
				</div>
				<div class="form-group col-md-6">
					<label>ชื่อสินค้า</label>
					<input type="text" name="product_name" value="" class="form-control"  required="" />
				</div>
			</div>
			
           <div class="row">
				<div class="form-group col-md-6">
					<label>ประเภทสินค้า</label>
					<select id="product_type_id" name="product_type_id" class="form-control">
					<?php
						if ($rows_type != false) {
							foreach ($rows_type as $row_type) {
							?>				
							  <option value="<?= $row_type["id"] ?>" ><?= $row_type["type_name"] ?></option>
						<?php } } ?>
				   </select> 
				</div>
				<div class="form-group col-md-6">
					<label>หน่วย</label>
					<input type="text" name="product_unit" value="" class="form-control"  required="" />
				</div>
			</div>
			
			 <div class="row">
				<div class="form-group col-md-6">
					<label>วันหมดอายุ</label>
					<input  style="" type="text" placeholder=""  id="product_expire" name="product_expire" class="form-control" readonly="readonly" required="">
				</div>
				<div class="form-group col-md-6">
					<label>จำนวน</label>
					<input type="number" name="quantity" value="" class="form-control"  required="" />
				</div>
			</div>
			
			<div class="row">
				<div class="form-group col-md-6">
					<label>ราคา</label>
					<input type="number" name="price" value="" class="form-control"  required="" />
				</div>
				<div class="form-group col-md-6">					
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