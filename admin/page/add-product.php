<?php
if(isset($_POST['addProduct'])&&$_POST['addProduct']) {
    add_product();
};
?>

<form action=""method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-6">
                            <label class="form-label" >Tên sản phẩm</label>
                            <input type="text" class="form-control"  name="name">
                            <label class="form-label" >giá</label>
                            <input type="text" class="form-control"  name="price">
                            <label class="form-label" >số lượng</label>
                            <input type="text" class="form-control"  name="qty">
                            <label class="form-label" >danh mục</label>
                            <select id="category" name="category">
                                <?php category_select();?>
                            </select><br>
                            <label class="form-label" >giảm giá</label>
                            <input type="text" class="form-control"  name="sale">
                            <label class="form-label" >mô tả</label>
                            <input type="text" class="form-control"  name="decription">
                            <!-- <?php
                   
                            ?> -->
                            <br>
                            <input  type="submit" class="btn btn-primary" name="addProduct" value="ADD">
                        </div>
                        <div class="col-6">
                            <label for=""> </label>
                            <br>
                            <div style="height:100px;">
                            <img src="../user/img/product/<?php echo $_SESSION['add-image']?>" height="100px" >
                            </div>
                            <br>
                            <input type="file" class="btn btn-primary my-3" name="fileToUpload" value="Choose an image">
                            <input type="submit" class="btn btn-primary" name="loadUploadedFile" value="Load image">
                            <br>
                            <label class="form-label" >Image will be save as:</label>
                            <input type="text" disabled class="form-control" value='<?php echo $_SESSION['add-image']?>' name="image">
                            <!-- <?php
                            ?> -->
                        </div>
                    </div>
                </form>