<?php
header('Content-Type: text/html; charset=utf-8');
include "./model/product.php";
$obj = new Product();
$date_now = date("Y-m-d");
$rows = $obj->read(" DATEDIFF('".$date_now."', pd.product_expire) <= 0 AND pd.quantity > 0 ");
//echo (" DATEDIFF('".$date_now."', pd.product_expire) <= 180 AND pd.quantity > 0 ");
//var_dump($rows);
?>
<div class="container">
    <h3><label class="label label-warning">ข้อมูลสินค้า</label></h3>
    <br /><br>
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
                </tr>
            </thead>
            <tbody>
                <?php
                if ($rows != false) {
                    $count = 1;
                    foreach ($rows as $row) {
                        ?>
                        <tr class="danger">
                            <td><?= $count++; ?></td>
                            <td><?= $row["id"] ?></td>
                            <td><?= $row["product_id"] ?></td>
                            <td><?= $row["product_name"] ?></td>
                            <td><?= $row["type_name"] ?></td>
                            <td><?= $row["product_unit"] ?></td>
							<td><?= $row["product_expire"] ?></td>
							<td><?= $row["quantity"] ?></td>
							<td><?= number_format($row["price"], 2); ?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>