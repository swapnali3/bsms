var root1 = am5.Root.new("chartdiv");
root1.setThemes([   am5themes_Animated.new(root1) ]);
var chart1 = root1.container.children.push(am5percent.PieChart.new(root1, {  layout: root1.verticalLayout }));
var series1 = chart1.series.push(am5percent.PieSeries.new(root1, {
  valueField: "value",
  categoryField: "category"
}));
series1.data.setAll(purchase_volume_segment_wise);
function refresh_purchasevolume(data) { series1.data.setAll(data); }
series1.appear(1000, 100);
