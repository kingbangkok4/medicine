<?php
include "./model/supplier.php";
$obj = new Supplier();
$rows = $obj->read(" id = {$_REQUEST["id"]} ");
if ($rows != false) {
    $row = $rows[0];
}
?>
<div class="container">
	<h3><label class="label label-warning">แก้ไขข้อมูลบริษัทผู้ผลิต</label></h3>
	<br />
   <form action="doUpdateSupplier.php" method="post" class="form form-horizontal">		
		<input type="hidden" name="id" value="<?= $row["id"]?> " />   
        <fieldset>         
			<div class="row">
				<div class="form-group col-md-6">
					<label>รหัสบริษัทผู้ผลิต</label>
					<input type="text" name="supplier_id" value="<?= $row["supplier_id"] ?>" class="form-control" required="" />
				</div>
				<div class="form-group col-md-6">
					<label>ชื่อบริษัทผู้ผลิต</label>
					<input type="text" name="supplier_name" value="<?= $row["supplier_name"] ?>" class="form-control"  required="" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-6">
					<label>ที่อยู่บริษัทผู้ผลิต</label>
					<input type="text" name="supplier_address" value="<?= $row["supplier_address"] ?>" class="form-control"  required="" />
				</div>
				  <div class="form-group col-md-6">
					<label>เบอร์ติดต่อ</label>
					<input type="number" name="supplier_phone" value="<?= $row["supplier_phone"] ?>" class="form-control"  required="" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-6">
					<label>โทรสาร</label>
					<input type="number" name="fax" value="<?= $row["fax"] ?>" class="form-control"  required="" />
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