<div class="container">
		 <legend>
                <h3><label class="label label-warning">เพิ่มข้อมูลประเภทสินค้า</label></h3>
          </legend>
    <form action="doAddType.php" method="post" class="form form-horizontal">
        <fieldset>          
			<div class="row">	
				<div class="form-group col-md-6">
					<label>ชื่อประเภทสินค้า</label>
					<input type="text" name="type_name" value="" class="form-control"  required="" />
				</div>
				<div class="form-group col-md-6">
					<label>จุดต่ำสุดของสินค้า(สินค้าที่น้อยที่สุดที่ต้องสั่งซื้อ)</label>
					<input type="number" name="low_quantity" value="" class="form-control"  required="" />
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