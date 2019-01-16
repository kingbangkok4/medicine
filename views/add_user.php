<div class="container">
		 <h3><label class="label label-warning">เพิ่มข้อมูลพนักงาน</label></h3>
	 <br/ >
    <form action="doAddEmployee.php" method="post" class="form form-horizontal">              	
        <fieldset>
            <legend>                
				<h4><label class="label label-success">ข้อมูลสำหรับเข้าระบบ</label></h4>
            </legend>
			<div class="row">
				<div class="form-group col-md-6">
					<label>username</label>
					<input type="text" name="username" value="" class="form-control" required="" />
				</div>
				<div class="form-group col-md-6">
					<label>password</label>
					<input type="password" name="password" value="" class="form-control" required="" />
				</div>
			</div>
        </fieldset>

        <fieldset>
            <legend>        required=""
				<h4><label class="label label-success">ข้อมูลพนักงาน</label></h4>
            </legend>
			<div class="row">
				<div class="form-group col-md-6">
					<label>ชื่อ-สกุล</label>
					<input type="text" name="fullname" value="" class="form-control" required="" />
				</div>
				<div class="form-group col-md-6">
					<label>เบอร์โทรศัพท์มือถือ</label>
                    <input type="text" name="mobile" class="form-control bfh-phone" maxlength="10" data-format="+1 (ddd) ddd-dddd" required="">
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-6">
					<label>อีเมล์</label>
					<input type="email" name="email" value="" class="form-control" required=""/>
				</div>
				<div class="form-group col-md-6">
					<label>ที่อยู่</label>
					<input type="text" name="address" value="" class="form-control" required=""/>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-12">
					<label>เพศ</label>
					<input type="radio" name="gender" value="ชาย" checked=""> ชาย
					&nbsp; &nbsp; &nbsp;
					<input type="radio" name="gender" value="หญิง" > หญิง
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