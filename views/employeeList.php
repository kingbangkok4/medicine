<?php
header('Content-Type: text/html; charset=utf-8');
include "./model/employee.php";
$obj = new Employee();
$obj->sql = "select * from tb_employee";
$rows = $obj->read();
//var_dump($rows);
?>
<div class="container">
    <h3><label class="label label-warning">ข้อมูลพนักงาน</label></h3>
    <br /><br>
    <div class="col-md-12 pull-right">
    	<a href="index.php?viewName=add_user" class="btn  btn-sm btn-primary pull-right">เพิ่มพนักงาน</a>
    </div>
    <br /><br>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr class="success">
                    <th>ลำดับ</th>
                    <th>ชื่อพนักงาน</th>
                    <th>อีเมล์</th>
                    <th>เบอร์โทร</th>
                    <th>ที่อยู่</th>
                    <th>เพศ</th>
					<th>ประเภท</th>
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
                            <td><?= $row["fullname"] ?></td>
                            <td><?= $row["email"] ?></td>
                            <td><?= $row["mobile"] ?></td>
                            <td><?= $row["address"] ?></td>
                            <td><?= $row["gender"] ?></td>
							<td><?= $row["type"] ?></td>
                            <td>
                                <a href="index.php?viewName=editEmployee&id=<?= $row["id"] ?>" class="btn btn-sm btn-success">
                                    แก้ไข
                                </a>
								<?php if($row["type"] == "Staff") {?>
                                <a onclick="return confirm('ยืนยันการลบพนักงาน')" href="deleteEmployee.php?user_ref=<?= $row["user_ref"] ?>" class="btn btn-sm btn-danger">
                                                                                            ลบ
                                </a>
								<?php } ?>
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