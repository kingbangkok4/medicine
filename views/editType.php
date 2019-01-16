<?php
include "./model/type.php";
$obj_type = new Type();
$rows_type = $obj_type->read(" id = {$_REQUEST["id"]} ");
if ($rows_type != false) {
    $row = $rows_type[0];
}
?>
<div class="container">
	 <legend>
        <h3><label class="label label-warning">แก้ไขข้อมประเภทสินค้า</label></h3>
     </legend> 
     <form action="doUpdateType.php" method="post" class="form form-horizontal">
	  <input type="hidden" name="id" value="<?=$_REQUEST["id"]?>" />
        <fieldset>          
			<div class="row">	
				<div class="form-group col-md-6">
					<label>ชื่อประเภทสินค้า</label>
					<input type="text" name="type_name" value="<?= $row["type_name"] ?>" class="form-control"  required="" />
				</div>
				<div class="form-group col-md-6">
					<label>จุดต่ำสุดของสินค้า(สินค้าที่น้อยที่สุดที่ต้องสั่งซื้อ)</label>
					<input type="number" name="low_quantity" value="<?= $row["low_quantity"] ?>" class="form-control"  required="" />
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