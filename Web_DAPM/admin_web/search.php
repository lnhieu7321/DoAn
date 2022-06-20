<?php 
	include("config.php");
	if(isset($_POST['input'])){
		$input = $_POST['input'];
		$query = "SELECT tieuDe, d.tenDotCuuTro, noiDung, image, thoiGian, idBaiViet
                                                FROM baiviet as b, dotcuutro as d
                                                where b.idDotCuuTro = d.idDotCuuTro
                                                and  tieuDe Like '{$input}%' or noiDung Like '{$input}%' or image Like '{$input}%' or thoiGian Like '{$input}%' or d.tenDotCuuTro Like '{$input}%' LIMIT 2";
        $result = mysqli_query($db,$query);
        if(mysqli_num_rows($result)>0){?>

        <table  id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
	        <thead>
	            <tr role="row">
	                <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">STT</th>
	        
	                <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Tiêu đề</th>

	                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Đợt cứu trợ</th>

	                <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Nội dung</th>

	                <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Hình ảnh</th>


	                <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Ngày đăng</th>

	                <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Action</th>
	                
	            </tr>
	        </thead>
	        <tbody>
                <?php 
                    
                        $count=0;
                    if ($result -> num_rows >  0) {
                      
                     while ($row = $result->fetch_assoc()) 
                     {
                          $count=$count+1;
                       ?>
                       <tr>
                        <th><?php echo $count ?></th>
                          <th><?php echo $row["tieuDe"] ?></th>
                          <th><?php echo $row["tenDotCuuTro"] ?></th>
                          <th><?php echo $row["noiDung"]  ?></th>
                          <th><?php echo "<img src='img/".$row['image']."' />"  ?></th>
                          <th><?php echo $row["thoiGian"] ?></th>

                          
                           <th> <a href="up"Edit</a><a href="editBlog.php?id=<?php echo $row["idBaiViet"] ?>">Edit</a> <a href="up"Edit</a><a href="deleteBlog.php?id=<?php echo $row["idBaiViet"] ?>">Delete</a></th>
                        
                          
                        </tr>
                <?php
                     
                     }
                   }
                ?>
            </tbody>
        </table>
        <?php
          }else{
               echo "<h6 class='text-danger text-center mt-3'>No data Found</h6>";
          }
	}	
?>