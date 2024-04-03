var root2 = am5.Root.new("chartdiv3");
root2.setThemes([
  am5themes_Animated.new(root2)
]);
var chart2 = root2.container.children.push(am5percent.PieChart.new(root2, {
  layout: root2.verticalLayout
}));
var series2 = chart2.series.push(am5percent.PieSeries.new(root2, {
  valueField: "value",
  categoryField: "category"
}));
series2.data.setAll(spend_by_category);
function refresh_spendbycategory(data){ series2.data.setAll(data); }
series2.appear(1000, 100);
