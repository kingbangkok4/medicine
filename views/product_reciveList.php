<?php
header('Content-Type: text/html; charset=utf-8');
include "./model/product.php";
$obj = new Product();
$rows = $obj->read_recive();
//var_dump($rows);
?>
<div class="container">
    <h3><label class="label label-warning">ข้อมูลใบรับ</label></h3>
    <br /><br>
    <div class="col-md-12 pull-right">
    	<a href="index.php?viewName=recive_product&id=&name=" class="btn  btn-sm btn-primary pull-right">เพิ่มใบรับ</a>
    </div>
    <br /><br>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr class="success">
                 	<th>ลำดับ</th>
                    <th>เลขที่ใบเบิกสินค้า</th>
					<th>พนักงาน</th>
					<th>วันที่เบิกสินค้า</th>
                    <th>รหัสอ้างอิงสินค้า</th>
                    <th>จำนวน</th>
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
                            <td><?= $row["emp_user"] ?></td>
                            <td><?= $row["recive_date"] ?></td>
                            <td><?= $row["product_ref_id"] ?></td>
                            <td><?= $row["quantity"] ?></td>
                            <td>
                                <a onclick="return confirm('ยืนยันการลบสินค้า')" href="deleteProductRecive.php?id=<?= $row["id"] ?>&product_ref_id=<?= $row["product_ref_id"] ?>&quantity=<?= $row["quantity"] ?>" class="btn btn-sm btn-danger">
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