<?php
header('Content-Type: text/html; charset=utf-8');
include "./model/type.php";
$obj = new Type();
$rows = $obj->read();
//var_dump($rows);
?>
<div class="container">
    <h3><label class="label label-warning">ข้อมูลประเภทสินค้า</label></h3>
    <br /><br>
    <div class="col-md-12 pull-right">
    	<a href="index.php?viewName=add_type" class="btn  btn-sm btn-primary pull-right">เพิ่มประเภทสินค้า</a>
    </div>
    <br /><br>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr class="success">
                    <th>ลำดับ</th>
                    <th>ชื่อสประเภทสินค้า</th>
					<th>จุดต่ำสุดของสินค้า(สินค้าที่น้อยที่สุดที่ต้องสั่งซื้อ)</th>
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
                            <td><?= $row["type_name"] ?></td>  
							<td><?= $row["low_quantity"] ?></td>     							
                            <td>
                                <a href="index.php?viewName=editType&id=<?= $row["id"] ?>" class="btn btn-sm btn-success">
								      แก้ไข
                                </a>
                                <a onclick="return confirm('ยืนยันการลบสินค้า')" href="deleteType.php?id=<?= $row["id"] ?>" class="btn btn-sm btn-danger">
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