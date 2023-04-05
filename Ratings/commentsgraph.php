<!DOCTYPE html>
<html>
<head>
  <title></title>
<meta charset="utf-8">
<style>

.bar {
  fill: steelblue;
}

.bar:hover {
  fill: brown;
}

.axis--x path {
  display: none;
}

</style>
</head>
<body>
<svg width="960" height="500"></svg>
<script src="https://d3js.org/d3.v4.min.js"></script>
<script>

var svg = d3.select("svg"),
    margin = {top: 20, right: 20, bottom: 30, left: 40},
    width = +svg.attr("width") - margin.left - margin.right,
    height = +svg.attr("height") - margin.top - margin.bottom;

var x = d3.scaleBand().rangeRound([0, width]).padding(0.1),
    y = d3.scaleLinear().rangeRound([height, 0]);
    console.log(y(3));

var g = svg.append("g")
    .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

//specify our data source
/*
d3.tsv("data.tsv", function(d) {
  d.frequency = +d.frequency;
  return d;
}, function(error, data) {
*/

//solution explanation: 
// 1. Copy the barchart js code from the demo; 2.
// 2. Use php code to get the selected supplierid from the get request initiated from index.php and print it out at the end of this url, which sends another get request to getData.php
// 3. Modify lines 60 and 61 to map your own variables to the variables used by the source code to generate the chart.
d3.json("getData.php", function(error, data){
  if(error) throw error;

  data.forEach(function(d){
    //replace the variables on the right-hand side with the ones defined in getData.php
    d.letter = d.userid;
    d.frequency = +d.commentcount;
  })

  console.log(data);

  if (error) throw error;

  x.domain(data.map(function(d) { return d.letter; }));
  y.domain([0, d3.max(data, function(d) { return d.frequency; })]);

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
      .attr("x", function(d) { return x(d.letter); })
      .attr("y", function(d) { return y(d.frequency); })
      .attr("width", x.bandwidth())
      .attr("height", function(d) { return height - y(d.frequency); });
});

</script>
</body>
</html>
