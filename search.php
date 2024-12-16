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
    </div>
    <!--end of header-->    
    <h3 style = "text-align:center">Search the Partner</h3>
    <br/>
    <br/>

    <div class = "container d-flex flex-wrap" >
        <form action = "<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post"  style = 'margin-left: auto; margin-right: auto'>
            <input type = "text" name = "toSearch" class = "btn" style = "color:black; border-color: black; text-align:left;">
            &nbsp;
            <select name="searchBy" class = "btn" style = "color:black; border-color: black; text-align:left;">
                <option value="shopName">Shop Name</option>
                <option value="partner_id">ID</option>
                <option value="names">Name</option>
                <option value="email">E-mail</option>
            </select>
            <input type = "submit" value = "search" class = "btn" style = "color:black; border-color: black; text-align:left; background:green;">
            <br/>

        </form>
        <br/>
        <br/>
        <?php
            
                
                
                $connection = new mysqli("localhost","root","","bazaroman");
                //Check if there is problem in DB connection
                if (!$connection) {
                    die("Connection failed: ". 
                        mysqli_connect_error());
                }
                try{
                if (isset($_POST['toSearch'])) {

                    $search = $_POST['toSearch'];
                    $searchBy = $_POST['searchBy'];
                    
                } else {
                
                    $search = "";
                    $searchBy = "";
                
                }
               
                
                
                $toSearchStatment = "SELECT * FROM partners WHERE ".$searchBy." = '".$search."'";
                
                $stmt = $connection->prepare($toSearchStatment);
                $stmt->execute();
                $result = $stmt ->get_result();


                //Check if result is not empty
                if(mysqli_num_rows($result)>0) 
                {
                    echo "<table border = 'border' style = 'margin-left: auto; margin-right: auto' class = 'table'>";
                    echo "<tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Shop Name</td>
                                <td>E-mail</td>

                        </tr>";
                    while($row = $result ->fetch_assoc()){
                        
                        echo "<tr>
                                <td>".$row['partner_id']."</td>
                                <td>".$row['names']."</td>
                                <td>".$row['shopName']."</td>
                                <td>".$row['email']."</td>
                            </tr>";
        
                    }
                    echo "</table>";

                } 
                //if the result is empty
                else { echo "No result found";}
            } catch (mysqli_sql_exception){}
           

        ?>
    
    </div>

    

    <div>
<!-- Footer -->
<footer class="bg-dark text-white text-center text-lg-start" style="margin: 0; padding: 0; margin-top: 5rem;"> 
  <!-- Grid container -->
  <div class="container p-4">
      <div class="mb-3 mt-3 container-fluid row d-flex justify-content-center">
      
          <div class="col-8">
              <input type="text" class="form-control" id="searchingFooter" placeholder="Enter a page name you want to visit or a keyword from the paragraph">
          </div>
          <div class="col-4"> 
              <button onclick="footerTable()" class="btn btn-primary primary-button">Search</button>
          </div>
      </div><br/>

      <!--Table using JavaScript-->
    <div class="container text-center">
        <div class="d-flex justify-content-center">
            <table id="footerTable" style="border-spacing: 20px;"> 
                <!-- Table rows will be generated using JavaScript -->
            </table>
        </div>
    </div>

  </div>
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2024 Copyright:
      <a class="text-white">Bazar</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- End of footer -->



  <script>
      // Data arrays for the footer content
var logos = ["logo.png"];  // Logo for the footer
var title = "Quick Access"; 
var description = "Welcome to Bazar Oman, your trusted destination for fresh, high-quality groceries in Oman. We are committed to making your grocery shopping experience simpler, faster, and more convenient. Our mission is to bring the freshest vegetables and fruits directly from the best local markets to your doorstep, ensuring you enjoy 100% fresh and healthy produce every time.";
var links = [
    { text: "Home", href: "index.html" },
    { text: "Account", href: "account.html" },
    { text: "Be a partner", href: "be a partner.html" },
    { text: "Contact us", href: "contact us.html" },
    { text: "About us", href: "about us.html" },
    { text: "Questioner page", href: "questioner page.html" },
    { text: "Shopping cart", href: "shopping cart.html" }
];

// Get the table element by ID
var table = document.getElementById("footerTable");

// Create the first row with logo and title
var row1 = "<tr>";
row1 += `
    <th style="text-align: left;"><img src="${logos[0]}" width="8%" alt="Logo"></th>
    <th class="orange-color" style="text-align: left;"><h4><strong>${title}</strong></h4></th>
`;
row1 += "</tr>";

// Create the second row with description and links
var row2 = "<tr>";
row2 += `
    <td style="text-align: left;">${description}</td>
    <td style="text-align: left;">
        <ul class="list-unstyled mb-0" id="footerList">
`;

// Add the links dynamically to the list
for (var i = 0; i < links.length; i++) {
    row2 += `<li><a href="${links[i].href}" class="text-white" style="text-decoration-line: none;">${links[i].text}</a></li>`;
}

// Close the list and the row
row2 += "</ul></td></tr>";

// Combine both rows and insert into the table
table.innerHTML = row1 + row2;

table.style.marginLeft = "0"; 
      
function footerTable() {
  var td, tr, th, i, j, txt, table;
  var listItems, li, k, listText;

  // Get the search input value and convert to lowercase
  var input = document.getElementById("searchingFooter").value.toLowerCase();

  // Get the table and its rows
  table = document.getElementById("footerTable");
  tr = table.getElementsByTagName("tr");

  // Search in the table
  for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td");
      th = tr[i].getElementsByTagName("th");

      var rowMatch = false;

      // Check in the <th> elements 
      for (j = 0; j < th.length; j++) {
          txt = th[j].textContent || th[j].innerText; // Get the text content of the th

          if (txt.toLowerCase().indexOf(input) > -1) {
              th[j].style.backgroundColor = "#FFA500"; 
              th[j].style.color = "#efefef"; 
              th[j].scrollIntoView({ behavior: "smooth", block: "center" }); // Scroll to the matching header
          } else {
              th[j].style.backgroundColor = "";
              th[j].style.color = ""; 
          }
      }

      // Loop through all td elements in the row
      for (j = 0; j < td.length; j++) {
          txt = td[j].textContent || td[j].innerText; // Get the text content of the td

          if (txt.toLowerCase().indexOf(input) > -1) {
              rowMatch = true;
              td[j].style.backgroundColor = "#FFA500"; 
              td[j].style.color = "#efefef"; 
              td[j].scrollIntoView({ behavior: "smooth", block: "center" }); // Scroll to the matching cell

              
              tr[i].style.display = ""; // Ensure the row is shown
          } else {
              td[j].style.backgroundColor = ""; 
              td[j].style.color = ""; 
          }
      }
  }

  // Get all list items in the footer
  listItems = document.getElementById("footerList").getElementsByTagName("li");

  // Search in the list items
  for (k = 0; k < listItems.length; k++) {
      li = listItems[k];
      listText = li.textContent || li.innerText; // Get the text content of the list item

      // Check if the search input matches the list item text
      if (listText.toLowerCase().indexOf(input) > -1) {
          li.style.backgroundColor = "#E65C00"; 
          li.style.color = "#fefefe";
          li.scrollIntoView({ behavior: "smooth", block: "center" }); // Scroll to the matching item
      } else {
          li.style.backgroundColor = ""; 
          li.style.color = ""; 
      }
  }
}

</script>
</body>
</html>