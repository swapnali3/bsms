// var root3 = am5.Root.new("chartdiv2");

// root3.setThemes([
//     am5themes_Animated.new(root3)
// ]);

// var chart3 = root3.container.children.push(am5xy.XYChart.new(root3, {
//     panX: false,
//     panY: false,
//     wheelX: "panX",
//     // wheelY: "zoomX",
//     paddingLeft: 0,
//     layout: root3.verticalLayout
// }));

// // chart.set("scrollbarX", am5.Scrollbar.new(root, {
// //     orientation: "horizontal"
// // }));

// var mdata = delivery_time;
// var xRenderer = am5xy.AxisRendererX.new(root3, {
//     minorGridEnabled: true
// });
// var xAxis = chart3.xAxes.push(am5xy.CategoryAxis.new(root3, {
//     categoryField: "year",
//     renderer: xRenderer,
//     tooltip: am5.Tooltip.new(root3, {})
// }));

// xRenderer.grid.template.setAll({ location: 1 })

// xAxis.data.setAll(mdata);

// var yAxis = chart3.yAxes.push(am5xy.ValueAxis.new(root3, {
//     min: 0,
//     max: 100,
//     numberFormat: "#'%'",
//     strictMinMax: true,
//     calculateTotals: true,
//     renderer: am5xy.AxisRendererY.new(root3, {
//         strokeOpacity: 0.1
//     })
// }));

// var legend = chart3.children.push(am5.Legend.new(root3, {
//     centerX: am5.p50,
//     x: am5.p50
// }));

// function makeSeries(name, fieldName) {
//     var series3 = chart3.series.push(am5xy.ColumnSeries.new(root3, {
//         name: name,
//         stacked: true,
//         xAxis: xAxis,
//         yAxis: yAxis,
//         valueYField: fieldName,
//         valueYShow: "valueYTotalPercent",
//         categoryXField: "year"
//     }));

//     series3.columns.template.setAll({
//         tooltipText: "{name}, {categoryX}:{valueYTotalPercent.formatNumber('#.#')}%",
//         tooltipY: am5.percent(10)
//     });

//     series3.data.setAll(mdata);
//     series3.appear();

//     series3.bullets.push(function () {
//         return am5.Bullet.new(root3, {
//             sprite: am5.Label.new(root3, {
//                 text: "{valueYTotalPercent.formatNumber('#.#')}%",
//                 fill: root3.interfaceColors.get("alternativeText"),
//                 centerY: am5.p50,
//                 centerX: am5.p50,
//                 populateText: true
//             })
//         });
//     });

//     legend.data.push(series3);
// }

// makeSeries("Early", "early");
// makeSeries("On Time", "on_time");
// makeSeries("Late", "late");
// chart3.appear(1000, 100);

// // Jthayil
// function refresh_deliverytime(data) {
//     xAxis.data.setAll(data);

//     // Update series data
//     chart3.series.each(function(series) {
//         series.data.setAll(data);
//     });
// }


var graph_data = [
  {
    "vendor": "0000016751",
    "early": "192",
    "on_time": "0",
    "late": "0"
  },
  {
    "vendor": "0000013644",
    "early": "166",
    "on_time": "0",
    "late": "0"
  },
  {
    "vendor": "0000028641",
    "early": "48",
    "on_time": "0",
    "late": "0"
  },
  {
    "vendor": "0000023954",
    "early": "0",
    "on_time": "14",
    "late": "0"
  },
  {
    "vendor": "0000023985",
    "early": "35",
    "on_time": "0",
    "late": "18"
  }
];

var graph_data1 = [
  {
    "vendor": "0000016751 - Viajy Print",
    "early": "183",
    "on_time": "45",
    "late": "23"
  },
  {
    "vendor": "0000013644 - Crown",
    "early": "172",
    "on_time": "21",
    "late": "32"
  },
  {
    "vendor": "0000028641 - Ganna",
    "early": "48",
    "on_time": "23",
    "late": "233"
  },
  {
    "vendor": "0000023954 - Phillipi",
    "early": "23",
    "on_time": "14",
    "late": "32"
  }
];

var graph_data2 = [
  {
    "vendor": "0000016751 - Viajy Print",
    "early": "183",
    "on_time": "45",
    "late": "23"
  },
  {
    "vendor": "0000013644 - Crown",
    "early": "172",
    "on_time": "21",
    "late": "32"
  },
  
];

function refresh_deliverytime(data) {
  for (var j = 0; j < data.length; j++) {
    var barSelector = '.' + getClass(j);
    var heights = [
      parseInt(data[j].early),
      parseInt(data[j].on_time),
      parseInt(data[j].late)
    ];
    var total = heights.reduce((acc, val) => acc + val, 0);
    var percentages = heights.map(val => total === 0 ? 0 : (val / total) * 100);
    setHeightsAndContent(barSelector, percentages, data[j].vendor);
  }

  for (var k = data.length; k < 5; k++) {
    var excessBarSelector = '.' + getClass(k);
    document.querySelector(excessBarSelector).style.display = 'none';
  }

  for (var l = 0; l < data.length; l++) {
    var visibleBarSelector = '.' + getClass(l);
    document.querySelector(visibleBarSelector).style.display = 'flex';
  }
}

refresh_graph(graph_data);

function setHeightsAndContent(selector, heights, vendor) {
  var total = heights.reduce((acc, val) => acc + val, 0);
  if (total === 0) {
    document.querySelector(selector).style.display = 'none';
    return;
  }
  var elements = document.querySelectorAll(selector + ' > div');
  elements.forEach(function (element, index) {
    if (heights[index] === 0) {
      element.style.display = 'none';
    } else {
      element.style.display = 'block';
      element.style.height = heights[index] + '%';
      element.textContent = heights[index].toFixed(0) + '%';
    }
  });
  var spanElement = document.querySelector(selector + ' > span');
  spanElement.innerHTML = vendor;
}


function getClass(index) {
  return ['one', 'two', 'three', 'four', 'five'][index];
}