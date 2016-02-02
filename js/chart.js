// Generated by CoffeeScript 1.9.1
(function() {
  var LineChart, highlightColor, normalColor,
    bind = function(fn, me){ return function(){ return fn.apply(me, arguments); }; };

  normalColor = "rgba(0,70,224,0.6)";

  highlightColor = "rgba(255,0,85,1)";

  Highcharts.setOptions({
    lang: {
      months: ['Januar', 'Februar', 'März', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember'],
      shortMonths: ["Jan", "Feb", "Mär", "Apr", "Mai", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Dez"],
      weekdays: ['Sonntag', 'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag'],
      resetZoom: "Zoom zurücksetzen",
      resetZoomTitle: "Zoom auf 1:1 zurücksetzen",
      decimalPoint: ","
    }
  });

  LineChart = (function() {
    function LineChart(canvas) {
      this.setClass = bind(this.setClass, this);
      var c, chartConfig, days, i, maxPoints, milliPerDay, ms, numdays, pointStart;
      console.assert(classes.length > 0, "there must be classes!");
      numdays = classes[0].points.length - 1;
      milliPerDay = 24 * 3600 * 1000;
      days = ["So", "Mo", "Di", "Mi", "Do", "Fr", "Sa"];
      pointStart = Date.now() - numdays * milliPerDay;
      maxPoints = _.max(classes.map(function(c) {
        return _.last(c.points);
      }));
      chartConfig = {
        chart: {
          type: "line",
          renderTo: canvas,
          backgroundColor: "#51DB74",
          zoomType: "x"
        },
        title: {
          text: "Punkte über Zeit"
        },
        tooltip: {
          dateTimeLabelFormats: {
            millisecond: "%A, %e. %b"
          }
        },
        xAxis: {
          type: "datetime"
        },
        yAxis: {
          title: {
            text: "Punkte"
          }
        },
        legend: {
          layout: 'vertical',
          align: "right",
          verticalAlign: "middle",
          borderWidth: 0
        },
        series: ((function() {
          var j, len, ref, results;
          ref = classes.sort(function(a, b) {
            return _.last(b.points) - _.last(a.points);
          });
          results = [];
          for (j = 0, len = ref.length; j < len; j++) {
            c = ref[j];
            results.push({
              name: c.name,
              data: c.points,
              color: normalColor,
              pointStart: pointStart,
              pointInterval: milliPerDay
            });
          }
          return results;
        })()).concat((function() {
          var j, len, results;
          results = [];
          for (i = j = 0, len = milestones.length; j < len; i = ++j) {
            ms = milestones[i];
            if (i > 0 && milestones[i - 1].points > maxPoints) {
              break;
            }
            results.push({
              data: [ms.points, ms.points],
              color: "#00662A",
              dashStyle: "Dash",
              showInLegend: false,
              pointStart: pointStart,
              pointInterval: Date.now() - pointStart,
              marker: {
                enabled: false
              }
            });
          }
          return results;
        })())
      };
      this.chart = new Highcharts.Chart(chartConfig);
      onClassSelectChanged(this.setClass);
      return;
    }

    LineChart.prototype.setClass = function(id) {
      var c, i, j, len;
      if (id == null) {
        return;
      }
      for (i = j = 0, len = classes.length; j < len; i = ++j) {
        c = classes[i];
        this.chart.series[i].update({
          color: c.id === +id ? highlightColor : normalColor
        }, false);
      }
      return this.chart.redraw();
    };

    return LineChart;

  })();

  window.LineChart = LineChart;

}).call(this);
