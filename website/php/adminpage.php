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
  
        <div class="wrap">
            <div class="adminBox">
                <div>
                    <form id="adminCreateProd" action="javascript:CreateProductSubmit()" method="post" target="_self">
                        <table class="addTable" style="margin:auto;">
                        <p style="color:white">ADD PRODUCT</p>
                            <tr>
                                <td><p class="submitText" style="font-family:Helvetica">Name</p></td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td><p class="submitText" style="font-family:Helvetica">Price</p></td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td><p class="submitText" style="font-family:Helvetica">Stock</p></td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td><p class="submitText" style="font-family:Helvetica">img_url</p></td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td><p class="submitText" style="font-family:Helvetica">Category</p></td>
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
                        <input type="submit" class="Button" value="Submit" style="margin:10px;">
                    </form>
                </div>
        
            <div>
                <form id="adminForm">
                    <table class="modifyTable" style="color:white; margin:auto;" >
                        <p style="color:white">MODIFY PRODUCT</p>
                        
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
                            <th><input type="text" name="product name" size="5"></th>
                            <th><input type="text" name="product price" size="5"></th>
                            <th><input type="text" name="product stock" size="5"></th>
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
                        <p style="color:white">ADD CATEGORY</p>
                        <tr>
                            <td><p class="submitText" style="font-family:Helvetica">Category name</p></td>
                                <td>
                                    <input id="catName" type="text">
                                    <input type="submit" value="Add" class="Button">
                                </td>
                        </tr>
                    </table>
                </form>
            </div>

            <div>
                <?php
                    include_once 'loadAllOrders.php';
                    loadAllOrders();
                ?>
            </div>
    </div>
</div>
       
        
</body>
</html>
