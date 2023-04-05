

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Searchrating</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&amp;display=swap">
    <link rel="stylesheet" href="assets/css/Login-Form-Basic-icons.css">

    <style>
    table, th, td {
      border: 1px solid black;
    }
    table {
      border-collapse: collapse;
      empty-cells: show;
      display:"";
    }
    th {
      color: white;
      background-color: pink;
    }
    td {
      height: 20px;
      color: white;
      background-color: rgb(24, 79, 244);
    }
  </style>
  <script src="jquery-3.1.1.min.js"></script>
  <script>
    //ajex in Javascript
		var asyncRequest;

    function getAllProducts() {
      //display all products
      var url = "displayProducts.php";
        try {
          asyncRequest = new XMLHttpRequest();

          asyncRequest.onreadystatechange=stateChange;
          asyncRequest.open('GET',url,true);
          asyncRequest.send();
        }
          catch (exception) {alert("Request failed");}
    }

		function stateChange() {
			if(asyncRequest.readyState==4 && asyncRequest.status==200) {
				document.getElementById("contentArea").innerHTML=
					asyncRequest.responseText;
			}
		}

    function clearPage(){
      document.getElementById("contentArea").innerHTML = "";
    }

    function init(){

      var z3 = document.getElementById("productLink");
      z3.addEventListener("mouseover", getAllProducts);

      var z4 = document.getElementById("productLink");
      z4.addEventListener("mouseout", clearPage);
    }
    document.addEventListener("DOMContentLoaded", init);

    //ajax in jQuery
    $(function(){
      $("#userid").change(function(){
        $.ajax({
          url:"displayoverall.php?userid=" + $("#userid").val(),
          async:true,
          success: function(result){
            $("#contentArea").html(result);
          }
        })
      })
    })
	</script>
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md py-3">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="#"><span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-car">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="7" cy="17" r="2"></circle>
                        <circle cx="17" cy="17" r="2"></circle>
                        <path d="M5 17h-2v-6l2-5h9l4 5h1a2 2 0 0 1 2 2v4h-2m-4 0h-6m-6 -6h15m-6 0v-5"></path>
                    </svg></span><span>Brand</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-3"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-3">
                <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link active" href="submitrating.php">Submit</a></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"><a class="nav-link" href="updaterating.php">Update</a></li>
                    <li class="nav-item"><a class="nav-link" href="searchcomment.php">Search Comment</a></li>
                    <li class="nav-item"><a class="nav-link" href="searchoverall.php">Search Overall</a></li>
                    <li class="nav-item"><a class="nav-link" href="commentsgraph.php">Comment Graph</a></li>
                </ul><button class="btn btn-primary" type="button" style="margin: 10px;">Login</button><button class="btn btn-secondary" type="button">Sign up</button>
            </div>
        </div>
    </nav>
    <section class="position-relative py-4 py-xl-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2>Search Overall  rating</h2>
                    <p class="w-lg-50">Please tell us which driver you would like to search an overall rating for.</p>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-5">
                        <div class="card-body d-flex flex-column align-items-center" style="height: 600px;">
                            <form class="text-center" method="post">
                                <div class="mb-3">
                                        </div>
                                        <label for="userid"> Select a userid:
                                            <select name="userid" id="userid">
                                                <?php
                                                //use php to dynamically generate the option element
                                                require_once("db.php");
                                                $sql="select userid from Ratings"; //get a list of product id values from the database
                                            
                                                $result = $mydb -> query($sql);
                                                while($row= mysqli_fetch_array($result)){
                                                    echo "<option value='".$row["userid"]."'> ".$row["userid"].".</option>\n";
                                                }
                                                ?>
                                            </select>
                                        </label>
                                 <div class="mb-3"></div>
                                 <div id="contentArea">&nbsp;</div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div class="mb-3"></div>
                            </form>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>