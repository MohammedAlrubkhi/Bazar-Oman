<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        @import url('headerText.css');

    </style>
    <title>Bazar Oman</title>
</head>
<body>
    <?php
        //connect to the server
        $connection = new mysqli("localhost","root","","bazaroman");
    ?>
    <!--page header which include logo and all direct access pages in the site-->

    <div class="container">
        <header class="d-flex flex-wrap  justify-content-center justify-content-md-between py-3 mb-4">
          <div class="col-md-3 mb-2 mb-md-0">
            <a href="index.html" class="d-inline-flex link-body-emphasis text-decoration-none">
              <img src = "logo.png" class="bi" height="32"/>
            </a>
          </div>
    
          <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="index.html" class="nav-link px-2" id = "headerText" style = "color:black;" >Home</a></li>
            <li><a href="markets.html" class="nav-link px-2"  id = "headerText" style = "color: black;">Markets</a></li>
            <li><a href="shopping cart.html" class="nav-link px-2" id = "headerText" style = "color: black;">Shopping cart</a></li>
            <li><a href="account.html" class="nav-link px-2"id = "headerText" style = "color:black; font-weight: bolder;" >Account</a></li>
            <li><a href="be a partner.html" class="nav-link px-2" id = "headerText" style = "color: black;">Be a patner</a></li>
            <li><a href="contact us.html" class="nav-link px-2" id = "headerText" style = "color: black;">Contact us</a></li>
            <li><a href="about us.html" class="nav-link px-2" id = "headerText" style = "color: black;">About us</a></li>
            <li><a href="funpage.html" class="nav-link px-2" id = "headerText" style = "color: black;">Fun page</a></li>
            <li><a href="questioner page.html" class="nav-link px-2" id ="headerText" style = "color: black;">Questioner Page</a></li>
          </ul>
          
          <div class="col-md text-end">
            <a href="login.html"><button type="button" class="btn btn-outline-primary normal-button" style = "color: black;">Login</button></a>
            <a href="signup.html"><button type="button" class="btn btn-primary primary-button">Sign-up</button></a>
          </div>
        </header>
        <!--end of header-->

        <!-- insert user -->
        <form action = "add.php" method = "post">
            <br/>User ID:<br/>
            <input type = "text" name = "id">
            <br/>First Name:<br/>
            <input type = "text" name = "firstname">
            <br/>Last Name:<br/>
            <input type = "text" name = "lastname">
            <br/>Email:<br/>
            <input type = "text" name = "email">
            <br/>Password:<br/>
            <input type = "password" name = "password">
            <br/>

            <input type = "submit">
            <br/>
        </form>






      <!-- php codes -->
      <div class = "container d-flex flex-wrap">
    <?php

       // function to displat the table
        function displayUsesrsTable($connection){
            
            $stmt = $connection->prepare("SELECT * FROM users");
            $stmt->execute();
            $result = $stmt ->get_result();

            echo "<table border = 'border' style = 'margin-left: auto; margin-right: auto' class = 'table'>";
            echo "<tr>
                        <td>ID</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>E-mail</td>
                        <td>Password</td>
                </tr>";
            while($row = $result ->fetch_assoc()){
                
                echo "<tr>
                        <td>".$row['id']."</td>
                        <td>".$row['firstName']."</td>
                        <td>".$row['lastName']."</td>
                        <td>".$row['email']."</td>
                        <td>".$row['pwd']."</td>
                    </tr>";

            }
            echo "</table>";
        }

        displayUsersTable($connection);
    ?>

        

    </div>



</body>
</html>