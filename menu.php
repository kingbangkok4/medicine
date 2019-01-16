<nav class="navbar navbar-default">
    <div class="container-fluid" style="background-color:#8DC7C7">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="?viewName=employeeList">ระบบสินค้าคงคลังยาและเวชภัณฑ์</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <!--<li><a href="?viewName=customerList">ลูกค้า</a></li>-->
                <li>
				<?php if($_SESSION["userType"] == "Admin") { ?>
					<a href="?viewName=employeeList">พนักงาน <span class="sr-only">(current)</span></a>
				</li>
				<?php } ?>
                <li>
					<a href="?viewName=productList">สินค้า <span class="sr-only">(current)</span></a></li>
				</li>
                 <li>
					<a href="?viewName=productLowList">สินค้าต้องสั่งเพิ่ม <span class="sr-only">(current)</span></a></li>
				</li>
				<li>
					<a href="?viewName=typeList">ประเภทสินค้า<span class="sr-only">(current)</span></a>
				</li>              
                <li>
					<ul class="nav nav-pills" style="">
					  <li class="dropdown">
						<a class="dropdown-toggle"
						   data-toggle="dropdown"
						   href="#">
							ข้อมูลเบิกรับ
							<b class="caret"></b>
						  </a>
						<ul class="dropdown-menu">
						  <li><a href="?viewName=product_outList">รายการใบเบิกสินค้า</a></li>
						  <li><a href="?viewName=product_reciveList">รายการใบรับสินค้า</a></li>
						</ul>
					  </li>
					</ul>
				</li> 
                 <li>
                	<a href="?viewName=calculate_salesList&dateFrom=<?= date("Y-m-d") ?>&dateTo=<?= date("Y-m-d") ?>">คำนวณยอดขาย</a>
				</li>              
                <li>
                <?php if($_SESSION["userType"] == "Admin") { ?>
					<a href="?viewName=supplierList">บริษัทผู้ผลิต<span class="sr-only">(current)</span></a></li>
				<?php } ?>
				<li><a href="?viewName=productExpireList">สินค้าหมดอายุ</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php">ออกจากระบบ</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
