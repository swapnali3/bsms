var root3 = am5.Root.new("chartdiv2");

root3.setThemes([
    am5themes_Animated.new(root3)
]);

var chart3 = root3.container.children.push(am5xy.XYChart.new(root3, {
    panX: false,
    panY: false,
    wheelX: "panX",
    // wheelY: "zoomX",
    paddingLeft: 0,
    layout: root3.verticalLayout
}));

// chart.set("scrollbarX", am5.Scrollbar.new(root, {
//     orientation: "horizontal"
// }));

var mdata = delivery_time;
var xRenderer = am5xy.AxisRendererX.new(root3, {
    minorGridEnabled: true
});
var xAxis = chart3.xAxes.push(am5xy.CategoryAxis.new(root3, {
    categoryField: "year",
    renderer: xRenderer,
    tooltip: am5.Tooltip.new(root3, {})
}));

xRenderer.grid.template.setAll({ location: 1 })

xAxis.data.setAll(mdata);

var yAxis = chart3.yAxes.push(am5xy.ValueAxis.new(root3, {
    min: 0,
    max: 100,
    numberFormat: "#'%'",
    strictMinMax: true,
    calculateTotals: true,
    renderer: am5xy.AxisRendererY.new(root3, {
        strokeOpacity: 0.1
    })
}));

var legend = chart3.children.push(am5.Legend.new(root3, {
    centerX: am5.p50,
    x: am5.p50
}));

function makeSeries(name, fieldName) {
    var series3 = chart3.series.push(am5xy.ColumnSeries.new(root3, {
        name: name,
        stacked: true,
        xAxis: xAxis,
        yAxis: yAxis,
        valueYField: fieldName,
        valueYShow: "valueYTotalPercent",
        categoryXField: "year"
    }));

    series3.columns.template.setAll({
        tooltipText: "{name}, {categoryX}:{valueYTotalPercent.formatNumber('#.#')}%",
        tooltipY: am5.percent(10)
    });

    series3.data.setAll(mdata);
    series3.appear();

    series3.bullets.push(function () {
        return am5.Bullet.new(root3, {
            sprite: am5.Label.new(root3, {
                text: "{valueYTotalPercent.formatNumber('#.#')}%",
                fill: root3.interfaceColors.get("alternativeText"),
                centerY: am5.p50,
                centerX: am5.p50,
                populateText: true
            })
        });
    });

    legend.data.push(series3);
}

makeSeries("Early", "early");
makeSeries("On Time", "on_time");
makeSeries("Late", "late");
chart3.appear(1000, 100);

// Jthayil
function refresh_deliverytime(data) {
    xAxis.data.setAll(data);

    // Update series data
    chart3.series.each(function(series) {
        series.data.setAll(data);
    });
}