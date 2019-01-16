<?php
header('Content-Type: text/html; charset=utf-8');
include "./model/supplier.php";
$obj = new Supplier();
$obj->sql = "select * from tb_supplier";
$rows = $obj->read();
//var_dump($rows);
?>
<div class="container">
	<h3><label class="label label-warning">ข้อมูลบริษัทผู้ผลิต</label></h3>
    <br />
    <div class="col-md-12 pull-right">
    	<a href="index.php?viewName=add_supplier" class="btn  btn-sm btn-primary pull-right">เพิ่มบริษัทผู้ผลิต</a>
    </div>
    <br /><br>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr class="success">
                    <th>ลำดับ</th>
					<th>รหัสบริษัทผู้ผลิต</th>
                    <th>ชื่อบริษัทผู้ผลิต</th>
                    <th>ที่อยู่</th>
                    <th>เบอร์ติดต่อ</th>
                    <th>โทรสาร</th>
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
                            <td><?= $row["supplier_id"] ?></td>
                            <td><?= $row["supplier_name"] ?></td>
                            <td><?= $row["supplier_address"] ?></td>
                            <td><?= $row["supplier_phone"] ?></td>
							<td><?= $row["fax"] ?></td>
                            <td>
                                <a href="index.php?viewName=editSupplier&id=<?= $row["id"] ?>" class="btn btn-sm btn-success">
								      แก้ไข
                                </a>
                                <a onclick="return confirm('ยืนยันการลบบริษัทผู้ผลิต')" href="deleteSupplier.php?id=<?= $row["id"] ?>" class="btn btn-sm btn-danger">
                                                                                            ลบ
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