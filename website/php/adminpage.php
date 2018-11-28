<!DOCTYPE html>
<html>
    <head>
        <title>Admin panel</title>
        <script src="../js/CreateProductSubmit.js" type="text/javascript"></script>
        <script src="../js/modifyProduct.js" type="text/javascript"></script>
        <script src="../js/addCatSubmit.js" type="text/javascript"></script>
        <link href="../css/styles.css" rel="stylesheet">
        <script src="/js/initNavButtons.js" type="text/javascrtip"></script>
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body onload="initNavButtons()">
        <?php
            echo include 'initHeader.php'; 
        ?>
        <script>
            function updateCatText(id, element) {
                document.getElementById(id).value = element;
            }
        </script>
  
        <div class="adminWrap">
            <div class="adminBox">
                <div>
                    <form id="adminCreateProd" action="javascript:CreateProductSubmit()" method="post" target="_self">
                        <table class="addTable" style="margin:auto;">
                            ADD PRODUCT
                            <tr>
                                <td>Name</td>
                                <td><input class="submitField" type="text"></td>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td><input class="submitField" type="text"></td>
                            </tr>
                            <tr>
                                <td>Stock</td>
                                <td><input class="submitField" type="text"></td>
                            </tr>
                            <tr>
                                <td>img_url</td>
                                <td><input class="submitField" type="text"></td>
                            </tr>
                            <tr>
                                <td>Category</td>
                                <td><input type="hidden" id="AddForm_catID" value="1">
                                        <select name="category" onchange="updateCatText('AddForm_catID', this.value);">
                                            <?php
                                                include_once 'getCategories.php';
                                                getCategories();
                                            ?>
                                        </select>
                                </td>
                            </tr>
                        </table>
                        <button type="submit" value="Submit" style="margin:10px;">Submit</button>
                    </form>
                </div>
        
            <div>
                <form id="adminForm">
                    <table class="modifyTable" style="margin:auto;" >
                        MODIFY PRODUCT
                        
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>price</th>
                            <th>stock</th>
                            <th>category</th>
                            <th>MODIFY</th>
                        </tr>
            
                        <tr>
                            <th></th>
                            <th><input class="submitField" type="text" name="product name" size="5"></th>
                            <th><input class="submitField" type="text" name="product price" size="5"></th>
                            <th><input class="submitField" type="text" name="product stock" size="5"></th>
                            <th>
                                <input type="hidden" id="modForm_CatID" name="product category" size="5" value="1">
                                    <select name="category" onchange="updateCatText('modForm_CatID', this.value);">
                                        <?php
                                            include_once 'getCategories.php';
                                            getCategories();
                                        ?>
                                    </select>
                            </th>
                        </tr>
                            <?php
                                include_once 'listProducts.php';
                                listProducts();
                            ?>
                    </table>
                </form>
            </div>

            <div>
                <form id="adminAddCat" action="javascript:addCatSubmit()" method="post" target="_self">
                    <table class="addTable" style="margin:auto;">
                        ADD CATEGORY
                        <tr>
                            <td><p class="submitText" style="font-family:Helvetica">Category name</p></td>
                                <td>
                                    <input class="submitField" id="catName" type="text">
                                    <button type="submit" value="Add">Add</button>
                                </td>
                        </tr>
                    </table>
                </form>
            </div>

            <div>
                <p style="color:white">ALL ORDERS</p>
                <?php
                    include_once 'loadAllOrders.php';
                    loadAllOrders();
                ?>
            </div>
    </div>
</div>
       
        
</body>
</html>
