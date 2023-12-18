var s4;
am5.ready(function() {
var root4 = am5.Root.new("chartdiv4");
root4.setThemes([  am5themes_Animated.new(root4)]);
var chart4 = root4.container.children.push(am5xy.XYChart.new(root4, {
  panX: false,
  panY: false,
  wheelX: "none",
  wheelY: "none",
  paddingLeft: 0
}));

chart4.zoomOutButton.set("forceHidden", true);
var yRenderer4 = am5xy.AxisRendererY.new(root4, {
  minGridDistance: 30,
  minorGridEnabled: true
});

yRenderer4.grid.template.set("location", 1);

var yAxis4 = chart4.yAxes.push(am5xy.CategoryAxis.new(root4, {
  maxDeviation: 0,
  categoryField: "network",
  renderer: yRenderer4,
  tooltip: am5.Tooltip.new(root4, { themeTags: ["axis"] })
}));

var xAxis4 = chart4.xAxes.push(am5xy.ValueAxis.new(root4, {
  maxDeviation: 0,
  min: 0,
  numberFormatter: am5.NumberFormatter.new(root4, {
    "numberFormat": "#,###a"
  }),
  extraMax: 0.1,
  renderer: am5xy.AxisRendererX.new(root4, {
    strokeOpacity: 0.1,
    minGridDistance: 80

  })
}));

var series4 = chart4.series.push(am5xy.ColumnSeries.new(root4, {
  name: "Series 4",
  xAxis: xAxis4,
  yAxis: yAxis4,
  valueXField: "value",
  categoryYField: "network",
  tooltip: am5.Tooltip.new(root4, {
    pointerOrientation: "left",
    labelText: "{valueX}"
  })
}));

// Rounded corners for columns
series4.columns.template.setAll({
  cornerRadiusTR: 5,
  cornerRadiusBR: 5,
  strokeOpacity: 0
});

// Make each column to be of a different color
series4.columns.template.adapters.add("fill", function (fill, target) {
  return chart4.get("colors").getIndex(series4.columns.indexOf(target));
});

series4.columns.template.adapters.add("stroke", function (stroke, target) {
  return chart4.get("colors").getIndex(series4.columns.indexOf(target));
});


// Set data
var data4 = chartdiv3_data;

yAxis4.data.setAll(data4);
series4.data.setAll(data4);
sortCategoryAxis();

// Get series item by category
function getSeriesItem(category) {
  for (var i = 0; i < series4.dataItems.length; i++) {
    var dataItem4 = series4.dataItems[i];
    if (dataItem4.get("categoryY") == category) {
      return dataItem4;
    }
  }
}

chart4.set("cursor", am5xy.XYCursor.new(root4, {
  behavior: "none",
  xAxis: xAxis4,
  yAxis: yAxis4
}));


// Axis sorting
function sortCategoryAxis() {

  // Sort by value
  series4.dataItems.sort(function (x, y) {
    return x.get("valueX") - y.get("valueX"); // descending
    //return y.get("valueY") - x.get("valueX"); // ascending
  })

  // Go through each axis item
  am5.array.each(yAxis4.dataItems, function (dataItem) {
    // get corresponding series item
    var seriesDataItem4 = getSeriesItem(dataItem.get("category"));

    if (seriesDataItem4) {
      // get index of series data item
      var index4 = series4.dataItems.indexOf(seriesDataItem4);
      // calculate delta position
      var deltaPosition4 = (index4 - dataItem.get("index", 0)) / series4.dataItems.length;
      // set index to be the same as series data item index
      dataItem.set("index", index4);
      // set deltaPosition instanlty
      dataItem.set("deltaPosition", -deltaPosition4);
      // animate delta position to 0
      dataItem.animate({
        key: "deltaPosition",
        to: 0,
        duration: 1000,
        easing: am5.ease.out(am5.ease.cubic)
      })
    }
  });

  // Sort axis items by index.
  // This changes the order instantly, but as deltaPosition is set,
  // they keep in the same places and then animate to true positions.
  yAxis4.dataItems.sort(function (x, y) {
    return x.get("index") - y.get("index");
  });
}


// update data with random values each 1.5 sec
// setInterval(function () {
//   updateData();
// }, 1500)

function updateData() {
  am5.array.each(series4.dataItems, function (dataItem) {
    var value4 = dataItem.get("valueX") + Math.round(Math.random() * 1000000000 - 500000000);
    if (value4 < 0) {
      value4 = 500000000;
    }
    // both valueY and workingValueY should be changed, we only animate workingValueY
    dataItem.set("valueX", value4);
    dataItem.animate({
      key: "valueXWorking",
      to: value4,
      duration: 600,
      easing: am5.ease.out(am5.ease.cubic)
    });
  })

  sortCategoryAxis();
}

series4.appear(1000);
chart4.appear(1000, 100);

});