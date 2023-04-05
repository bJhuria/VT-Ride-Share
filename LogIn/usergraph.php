<!DOCTYPE html>
<html>

<head>
  <title>User Graph</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&amp;display=swap">
  <link rel="stylesheet" href="assets/css/Login-Form-Basic-icons.css">
  <style>
    .bar {
      fill: #fcadaf;
    }

    .bar:hover {
      fill: #70ce9b;
    }

    .axis--x path {
      display: none;
    }

    
    h1 {
      text-align: center;
    }
  
  </style>
</head>

<body>
  <script src="https://d3js.org/d3.v4.min.js"></script>

    <nav class="navbar navbar-light navbar-expand-md sticky-top navbar-shrink py-3" id="mainNav">
      <div class="container"><a class="navbar-brand d-flex align-items-center" href="/"><span
            class="bs-icon-sm bs-icon-circle bs-icon-primary bg-primary border rounded-circle border-5 border-primary shadow d-flex justify-content-center align-items-center me-2 bs-icon">
          </span><span>vtrideshare</span></a><button data-bs-toggle="collapse" class="navbar-toggler"
          data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span
            class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item"><a class="nav-link" href="home.html">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="explore.html">Explore</a></li>
            <li class="nav-item"><a class="nav-link" href="map.html">Map</a></li>
            <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
            <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" aria-expanded="false"
                data-bs-toggle="dropdown" href="#">Profile&nbsp;</a>
              <div class="dropdown-menu"><a class="dropdown-item" href="profile.php">View Profile</a><a
                  class="dropdown-item" href="viewprofiles.php">Search Users</a><a class="dropdown-item"
                  href="usergraph.php">User Graph</a></div>
            </li>
          </ul><a class="btn btn-primary shadow" role="button" href="login.php" style="margin-right: 11px;">Log In</a><a
            class="btn btn-secondary bg-secondary shadow" role="button" href="signup.php">Sign up</a>
        </div>
      </div>
    </nav>  
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>

    <div class="card shadow">
    <div class="card-header py-3">
      <h1 class="text-primary m-0 fw-bold">User Chart</h1>
    </div>
  </div>

    <svg width="960" height="500"></svg>

    <script>

      var svg = d3.select("svg"),
        margin = { top: 20, right: 20, bottom: 30, left: 40 },
        width = +svg.attr("width") - margin.left - margin.right,
        height = +svg.attr("height") - margin.top - margin.bottom;

      var x = d3.scaleBand().rangeRound([0, width]).padding(0.1),
        y = d3.scaleLinear().rangeRound([height, 0]);
      console.log(y(3));

      var g = svg.append("g")
        .attr("transform", "translate(" + margin.left + "," + margin.top + ")");


      d3.json("getData.php", function (error, data) {
        if (error) throw error;

        data.forEach(function (d) {
          d.letter = d.accounttype;
          d.frequency = +d.totalValue;
        })

        console.log(data);

        if (error) throw error;

        x.domain(data.map(function (d) { return d.letter; }));
        y.domain([0, d3.max(data, function (d) { return d.frequency; })]);

        g.append("g")
          .attr("class", "axis axis--x")
          .attr("transform", "translate(0," + height + ")")
          .call(d3.axisBottom(x));

        g.append("g")
          .attr("class", "axis axis--y")
          .call(d3.axisLeft(y).ticks(4, "s"))
          .append("text")
          .attr("transform", "rotate(-90)")
          .attr("y", 6)
          .attr("dy", "0.71em")
          .attr("text-anchor", "end")
          .text("Frequency");

        g.selectAll(".bar")
          .data(data)
          .enter().append("rect")
          .attr("class", "bar")
          .attr("x", function (d) { return x(d.letter); })
          .attr("y", function (d) { return y(d.frequency); })
          .attr("width", x.bandwidth())
          .attr("height", function (d) { return height - y(d.frequency); });
      });

    </script>

</body>

</html>