var root1 = am5.Root.new("chartdiv");
root1.setThemes([   am5themes_Animated.new(root1) ]);
var chart1 = root1.container.children.push(am5percent.PieChart.new(root1, {  layout: root1.verticalLayout }));
var series1 = chart1.series.push(am5percent.PieSeries.new(root1, {
  valueField: "value",
  categoryField: "category"
}));
series1.get("colors").set("colors", [
  am5.color(0xF4B678),
  am5.color(0xEF9234),
  am5.color(0xFFBF00),
  am5.color(0xFBCEB1),
  am5.color(0xFF7F50)
]);
series1.data.setAll(purchase_volume_segment_wise);
function refresh_purchasevolume(data) { series1.data.setAll(data); }
series1.appear(1000, 100);
