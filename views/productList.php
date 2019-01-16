<?php
header('Content-Type: text/html; charset=utf-8');
include "./model/product.php";
$obj = new Product();
$rows = $obj->read();
//var_dump($rows);
?>
<div class="container">
    <h3><label class="label label-warning">ข้อมูลสินค้า</label></h3>
    <br /><br>
    <div class="col-md-12 pull-right">
    	<a href="index.php?viewName=add_product" class="btn  btn-sm btn-primary pull-right">เพิ่มสินค้า</a>
    </div>
    <br /><br>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr class="success">
                    <th>ลำดับ</th>
					<th>รหัสอ้างอิง</th>
					<th>รหัสสินค้า</th>
                    <th>ชื่อสินค้า</th>
                    <th>ประเภทสินค้า</th>
                    <th>หน่วย</th>
                    <th>วันหมดอายุ</th>
                    <th>จำนวน</th>
					<th>ราคา</th>
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
                            <td><?= $row["id"] ?></td>
                            <td><?= $row["product_id"] ?></td>
                            <td><?= $row["product_name"] ?></td>
                            <td><?= $row["type_name"] ?></td>
                            <td><?= $row["product_unit"] ?></td>
							<td><?= $row["product_expire"] ?></td>
							<td><?= $row["quantity"] ?></td>
							<td><?= number_format($row["price"], 2); ?></td>
                            <td>
                                <a href="index.php?viewName=editProduct&id=<?= $row["id"] ?>" class="btn btn-sm btn-success">
                                    แก้ไข
                                </a>
                                <a onclick="return confirm('ยืนยันการลบสินค้า')" href="deleteProduct.php?id=<?= $row["id"] ?>" class="btn btn-sm btn-danger">
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