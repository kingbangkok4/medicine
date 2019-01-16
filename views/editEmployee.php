<?php
include "./model/employee.php";
$obj = new Employee();
$obj->sql = "select * from tb_employee";
$rows = $obj->read("e.id = {$_REQUEST["id"]}");
if ($rows != false) {
    $row = $rows[0];
    $users = $obj->get_user(" id={$row["user_ref"]}");
	$user = $users[0];
}
?>
<div class="container">
 <h3><label class="label label-warning">แก้ไขข้อมูลพนักงาน</label></h3>
  <br/ >
    <form action="doUpdateEmployee.php" method="post" class="form form-horizontal">
        <input type="hidden" name="id" value="<?=$_REQUEST["id"]?>" />
        <fieldset>
            <legend>
				<h4><label class="label label-success">ข้อมูลสำหรับเข้าระบบ</label></h4>     
			</legend>
			<div class="row">
				<div class="form-group col-md-6">
					<label>username</label>
					<input type="text" name="username" value="<?= $user["username"] ?>" class="form-control" required="" />
				</div>
				<div class="form-group col-md-6">
					<label>password</label>
					<input type="password" name="password" value="<?= $user["password"] ?>" class="form-control" required="" />
				</div>
			</div>
        </fieldset>

        <fieldset>
            <legend>
                <h4><label class="label label-success">ข้อมูลพนักงาน</label></h4>
            </legend>
            </legend>
			<div class="row">
				<div class="form-group col-md-6">
					<label>ชื่อ-สกุล</label>
					<input type="text" name="fullname" value="<?= $row["fullname"] ?>" class="form-control" required="" />
				</div>
				<div class="form-group col-md-6">
					<label>เบอร์โทรศัพท์</label>
					<input type="tel" name="mobile" value="<?= $row["mobile"] ?>" class="form-control" />
				</div>
			</div>
			
			<div class="row">
				<div class="form-group col-md-6">
					<label>อีเมล์</label>
					<input type="email" name="email" value="<?= $row["email"] ?>" class="form-control" />
				</div>
				<div class="form-group col-md-6">
					<label>ที่อยู่</label>
					<input type="text" name="address" value="<?= $row["address"] ?>" class="form-control" />
				</div>
			</div>
			
			<div class="row">
				<div class="form-group col-md-12">
					<label>เพศ</label>
					<input type="radio" name="gender" value="ชาย" checked="" <?php echo ($row["gender"] == "ชาย") ? "checked" : "" ?> > ชาย
					&nbsp; &nbsp; &nbsp;
					<input type="radio" name="gender" value="หญิง" <?php echo ($row["gender"] == "หญิง") ? "checked" : "" ?> > หญิง
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