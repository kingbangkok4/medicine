
<div class="container">
	<h3><label class="label label-warning">เพิ่มข้อมูลบริษัท</label></h3>
	<br />
    <form action="doAddSupplier.php" method="post" class="form form-horizontal">			
        <fieldset>         
			<div class="row">
				<div class="form-group col-md-6">
					<label>รหัสบริษัทผู้ผลิต</label>
					<input type="text" name="supplier_id" value="" class="form-control" required="" />
				</div>
				<div class="form-group col-md-6">
					<label>ชื่อบริษัทผู้ผลิต</label>
					<input type="text" name="supplier_name" value="" class="form-control"  required="" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-6">
					<label>ที่อยู่บริษัทผู้ผลิต</label>
					<input type="text" name="supplier_address" value="" class="form-control"  required="" />
				</div>
				  <div class="form-group col-md-6">
					<label>เบอร์ติดต่อ</label>
					<input type="number" name="supplier_phone" value="" class="form-control"  required="" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-6">
					<label>โทรสาร</label>
					<input type="number" name="fax" value="" class="form-control"  required="" />
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