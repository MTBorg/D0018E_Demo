<!DOCTYPE html>
<html>
<head>
	<link href="../css/styles.css" rel="stylesheet"> 

	<title>Log in</title>
	<script src="../js/LogInSubmit.js" type="text/javascript">
	</script>
</head>	
<body>
	<header role="banner">
	<a href="../index.php" style = "text-decoration:none">
		<h1 id="logoText"> StarTrader </h1>
		<h3 id="logoSlogan"> The biggest market in the universe </h3>
</a>

        <nav role="navigation">
           

			<a href="createUserPage.php" id="signUpMain" class="Button">Sign up</a>
        </nav>
    </header>



    <!-- Content -->

     <!-- If you want to use an element as a wrapper, i.e. for styling only, then <div> is still the element to use -->
     <div class="wrap">

<!-- The <main> element is used to enclose the main content, i.e. that which contains the central topic of a document -->
<!-- ARIA: the landmark role "main" is added here as it contains the main content of the document, and it is recommended to add it to the
<main> element until user agents implement the required role mapping. -->
<main role="main">


<div class="product">

        
        <?php
            // include 'php/loadProducts.php';
            // loadProducts();
        ?>

        <p> TEST </p>

</div>

</main>
</div>
	

</body>
</html>
