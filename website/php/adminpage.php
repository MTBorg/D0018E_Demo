<html>
    <head>
        <title>Admin panel</title>
        <script src="../js/CreateProductSubmit.js" type="text/javascript"></script>
        <script src="../js/modifyProduct.js" type="text/javascript"></script>
        <link href="../css/styles.css" rel="stylesheet">
    </head>
    <body>
        <header role="banner">
        <a href="../index.php" style = "text-decoration:none">
		    <h1 id="logoText"> StarTrader </h1>
		    <h3 id="logoSlogan"> The biggest market in the universe </h3>
</a>
            <nav role="navigation">


	           
            </nav>

        </header>
 
      
        <div class="wrap">
            <div class="adminBox">
                <div>
            <form action="javascript:CreateProductSubmit()" method="post" target="_self">
                <table class="addTable">
                <p style="color:white">ADD PRODUCT</p>
                    <tr>
                        <td><p class="submitText" style="font-family:Helvetica">name</p></td>
                        <td><input type="text"></td>
                    </tr>
                    <tr>
                        <td><p class="submitText" style="font-family:Helvetica">price</p></td>
                        <td><input type="text"></td>
                    </tr>
                    <tr>
                        <td><p class="submitText" style="font-family:Helvetica">stock</p></td>
                        <td><input type="text"></td>
                    </tr>
                    <tr>
                        <td><p class="submitText" style="font-family:Helvetica">img_url</p></td>
                        <td><input type="text"></td>
                    </tr>
                    <tr>
                        <td><p class="submitText" style="font-family:Helvetica">cat_id</p></td>
                        <td><input type="text"></td>
                    </tr>

                </table>
                <input type="submit" class="Button" value="Submit">
                    </form>
</div>
        
            <div>
                <form id="adminForm">
                <table class="modifyTable" style="color:white" >
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
        <th><input type="text" name="product category" size="5"></th>
        
    </tr>



                <?php
                    
                    include 'listProducts.php';
                    listProducts();

                ?>

                </table>

    </form>

    
</div>
</div>
</div>
       
        
    </body>
</html>
