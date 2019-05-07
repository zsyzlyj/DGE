  var table=null;
  var url="";
  var data2=null,data3=null;
  var mdata1={"id":'container1',"title":'个人在团队业务中的比重',"series":[{name: 'Brands',colorByPoint: true,
            data: [{name: '其他人业务量',y: 61,sliced: true,selected: true}, {name: '本人业务量',y: 39}]}]};

var mdata2={"id":'container2',"title":'本月业务开展情况',"series":[{name: 'Brands',colorByPoint: true,
            data: [{ name: '业务1',y: 61.41, sliced: true,selected: true}, { name: '业务2 ',y: 11.84}, 
                 { name: '业务3', y: 10.85}, { name: '业务4',y: 4.67}, { name: '业务5',y: 4.18}, { name: '业务6',y: 1.64}, 
                 {name: '业务7', y: 1.6}, {name: '业务8', y: 1.2}, {name: '业务9',y: 2.61}]}]};

var mdata3={"id":'container3',"title":'本月各业务提成',"series":[{name: 'Brands',colorByPoint: true,
           data: [{ name: '业务1',y: 61.41, sliced: true,selected: true}, { name: '业务2 ',y: 11.84}, 
                 { name: '业务3', y: 10.85}, { name: '业务4',y: 4.67}, { name: '业务5',y: 4.18}, { name: '业务6',y: 1.64}, 
                 {name: '业务7', y: 1.6}, {name: '业务8', y: 1.2}, {name: '业务9',y: 2.61}]}]};

var mdata4={"id":'container4',"title":"业务和薪酬历史记录","xAxis":['1月', '2月', '3月', '5月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
            "data":{"业务":[49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
                     '薪酬': [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
                     }};

var mdata5={
  "data":[['Trident','Internet Explorer 4.0','Win 95+','4','X'],['Trident','Internet Explorer 5.0','Win 95+','5','C'],
    ['Trident','Internet Explorer 5.5','Win 95+','5.5','A'],['Trident','Internet Explorer 6','Win 98+','6','A'],['Trident','Internet Explorer 7','Win XP SP2+','7','A'],
    ['Trident','AOL browser (AOL desktop)','Win XP','6','A'],['Gecko','Firefox 1.0','Win 98+ / OSX.2+','1.7','A'],['Gecko','Firefox 1.5','Win 98+ / OSX.2+','1.8','A'],
    ['Gecko','Firefox 2.0','Win 98+ / OSX.2+','1.8','A'],['Gecko','Firefox 3.0','Win 2k+ / OSX.3+','1.9','A'],['Gecko','Camino 1.0','OSX.2+','1.8','A'],
    ['Gecko','Camino 1.5','OSX.3+','1.8','A'],['Gecko','Netscape 7.2','Win 95+ / Mac OS 8.6-9.2','1.7','A'],
    ['Gecko','Netscape Browser 8','Win 98SE+','1.7','A'],['Gecko','Netscape Navigator 9','Win 98+ / OSX.2+','1.8','A'],
    ['Gecko','Mozilla 1.0','Win 95+ / OSX.1+',1,'A'],['Gecko','Mozilla 1.1','Win 95+ / OSX.1+',1.1,'A'],
    ['Gecko','Mozilla 1.2','Win 95+ / OSX.1+',1.2,'A'],['Gecko','Mozilla 1.3','Win 95+ / OSX.1+',1.3,'A'],
    ['Gecko','Mozilla 1.4','Win 95+ / OSX.1+',1.4,'A'],['Gecko','Mozilla 1.5','Win 95+ / OSX.1+',1.5,'A'],
    ['Gecko','Mozilla 1.6','Win 95+ / OSX.1+',1.6,'A'],['Gecko','Mozilla 1.7','Win 98+ / OSX.1+',1.7,'A'],
    ['Gecko','Mozilla 1.8','Win 98+ / OSX.1+',1.8,'A']],
  "columns": [{ "title": "Engine" },{ "title": "Browser" },{ "title": "Platform" },{ "title": "Version", "class": "center" },{ "title": "Grade", "class": "center" }]
};

var mdata6={"id":"container5","title":"团队一客户经理业务占比",
          "series": [{name: "Browsers", colorByPoint: true,
                  data: [{name: "经理a", y: 62.74,drilldown: "经理a"}, { name: "经理b",y: 10.57,drilldown: "经理b"},
                      { name: "经理c",y: 7.23,drilldown: "经理c"},{ name: "经理d",y: 5.58,drilldown: "经理d"},
                      { name: "经理e",y: 4.02, drilldown: "经理e"},{  name: "经理f", y: 1.92, drilldown: "经理f" },{  name: "其他",y: 7.62, drilldown: null }
                  ]}],
          "drilldown_series": [
            { name: "经理a", id: "经理a", data: [["业务a",0.1], ["业务b",1.3],["业务c",53.02 ], ["业务d",1.4],[ "业务e", 0.88 ],
                    [ "业务f",0.56],[ "业务g", 0.45],[ "业务h", 0.49],["业务i", 0.32 ],[ "业务j", 0.29 ],[ "业务k",0.79],["业务l", 0.18], ["业务m",0.13],
                    ["业务l", 2.16], ["业g务", 0.13],[ "业务y", 0.11],["业务q", 0.17],["业务s",0.26] ]},
            { name: "经理b",  id: "经理b",data: [["业务a", 1.02],["业务b",7.36],["业务c", 0.35],["业务d",0.11],
                    [ "业务e", 0.1  ],[ "业务f", 0.95], ["业务g", 0.15],["业务h",0.1],["业务i", 0.31],["业务j", 0.12]]},
            {name: "经理c",id: "经理c", data: [[ "业务a", 6.2 ],["业务b",0.29],[ "业务c",0.27], ["业务d",0.47]]},
            { name: "经理d", id: "经理d", data: [ ["业务a", 3.39], ["业务b", 0.96 ],["业务c", 0.36], [ "业务d", 0.54 ], [ "业务e", 0.13],[ "业务f", 0.2]] },
            {name: "经理e",id: "经理e",data: [ ["业务a", 2.6 ],["业务b", 0.92],["业务c",0.4],["业务d", 0.1]] },
            { name: "经理f", id: "经理f",  data: [["业务a",  0.96 ],[ "业务b", 0.82 ],["业务c",0.14 ]] }]
};

var mdata7={"id":"container6","title":"团队一业务占比",
          "series": [{name: "Browsers", colorByPoint: true,
                  data: [{name: "业务a", y: 62.74,drilldown: "业务a"}, { name: "业务b",y: 10.57,drilldown: "业务b"},
                      { name: "业务c",y: 7.23,drilldown: "业务c"},{ name: "业务d",y: 5.58,drilldown: "业务d"},
                      { name: "业务e",y: 4.02, drilldown: "业务e"},{  name: "业务f", y: 1.92, drilldown: "业务f" },{  name: "其他",y: 7.62, drilldown: null }
                  ]}],
          "drilldown_series": [
            { name: "业务a", id: "业务a", data: [["经理a",0.1], ["经理b",1.3],["经理c",53.02 ], ["经理d",1.4],[ "经理e", 0.88 ],
                    [ "v60.0",0.56]]},
            { name: "业务b",  id: "业务b",data: [["经理a", 1.02],["经理b",7.36],["经理c", 0.35],["经理d",0.11],
                    [ "v54.0", 0.1  ],[ "v52.0", 0.95], ["v51.0", 0.15],["经理c",0.1],["经理d", 0.31],["经理e", 0.12]]},
            {name: "业务c",id: "业务c", data: [[ "经理a", 6.2 ],["经理b",0.29],[ "经理c",0.27], ["经理d",0.47]]},
            { name: "业务d", id: "业务d", data: [ ["经理a", 3.39], ["经理b", 0.96 ],["经理c", 0.36], [ "经理d", 0.54 ], [ "经理e", 0.13],[ "经理e", 0.2]] },
            {name: "业务e",id: "业务e",data: [ ["经理a", 2.6 ],["经理b", 0.92],["经理c",0.4],["经理d", 0.1]] },
            { name: "业务f", id: "业务f",  data: [["经理a",  0.96 ],[ "经理b", 0.82 ],["经理c",0.14 ]] }]
};

var mdata8={"id":"container7","title":"团队业务在总业务中的历史比重",
           "xAxis":['1月', '2月', '3月', '4月', '5月'],
           "series": [{ name: '团队一', data: [50, 30, 40, 70, 20]}, { name: '团队二', data: [50, 30, 40, 70, 20]},{ name: '其他团队',data: [30, 40, 40, 20, 50] }]};

function part_of_all_pie(mdata)
{
Highcharts.chart(mdata["id"], {
    chart: {
      plotBackgroundColor: null,
      plotBorderWidth: null,
      plotShadow: false,
      type: 'pie'
    },
    title: {
      text: mdata["title"]
    },
    tooltip: {
      pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
      pie: {
        allowPointSelect: true,
        cursor: 'pointer',
        dataLabels: {
          enabled: true,
          format: '<b>{point.name}</b> {point.percentage:.1f}%: {point.y}',
          style: {
            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
          }
        }
      }
    },
    series: mdata["series"]
  });
}

function part_of_pie_drilldown(mdata)
{
  $("#show_pie").append('<div id="'+mdata["id"]+'" class="col-lg-6 col-md-6 "></div>' );
  Highcharts.chart(mdata["id"], {
    chart: {
        type: 'pie'
    },
    title: {
        text: mdata["title"]
    },
    plotOptions: {
        series: {
            dataLabels: {
                enabled: true,
                format: '{point.name}: {point.y:.1f}%'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
    },

    series:mdata["series"],
    drilldown: {
        series:mdata["drilldown_series"]
            }
});
}

function stacked_column(mdata)
{

Highcharts.chart(mdata["id"], {
    chart: {
        type: 'column'
    },
    title: {
        text:  mdata["title"]
    },
    xAxis: {
        categories:  mdata["xAxis"]
    },
    yAxis: {
        min: 0,
        title: {
            text: '业务量'
        },
        stackLabels: {
            enabled: true,
            style: {
                fontWeight: 'bold',
                color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
            }
        }
    },
    legend: {
        align: 'right',
        x: -30,
        verticalAlign: 'top',
        y: 25,
        floating: true,
        backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
        borderColor: '#CCC',
        borderWidth: 1,
        shadow: false
    },
    tooltip: {
        headerFormat: '<b>{point.x}</b><br/>',
        pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
    },
    plotOptions: {
        column: {
            stacking: 'normal',
            dataLabels: {
                enabled: true,
                color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
            }
        }
    },
    series:mdata["series"]
});
}

function line_chart(mdata)
{
Highcharts.chart(mdata["id"], {
    chart: {
        zoomType: 'xy'
    },
    title: {
        text: mdata["title"]
    },
    xAxis: {
        categories: mdata["xAxis"],
        crosshair: true
    },
   yAxis: [{ // Primary yAxis
        labels: {
            format: '{value}元',
            style: {
                color:"black"
            }
        },
        title: {
            text: '业务',
            style: {
                color:"black"
            }
        }
    }, { // Secondary yAxis
        title: {
            text: '薪酬',
            style: {
                color: "red"
            }
        },
        labels: {
            format: '{value} 元',
            style: {
                color:"red"
            }
        },
        opposite: true
    }],
    tooltip: {
        shared: true
    },
    legend: {
        layout: 'vertical',
        align: 'left',
        x: 120,
        verticalAlign: 'top',
        y: 100,
        floating: true,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || 'rgba(255,255,255,0.25)'
    },
    series: [{
        name: '业务',
        type: 'column',
        color:"black",
        data: mdata["data"]["业务"],
        tooltip: {
            valueSuffix: ' 元'
        }

    }, {
        name: '薪酬',
        type: 'spline',
        yAxis: 1,
        color:"red",
        data: mdata["data"]["薪酬"],
        tooltip: {
            valueSuffix: '元'
        }
    }]
});
}




function part_all_line_pie()
{
  Highcharts.chart("container111", {
    title: {
        text: '各团队历史业务量对比'
    },
    xAxis: {
        categories: ['一月', '二月', '三月', '四月', '五月']
    },
    labels: {
        items: [{
            html: '各团队累计业务量',
            style: {
                left: '50px',
                top: '18px',
                color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
            }
        }]
    }, plotOptions: {
        column: {
            cursor: 'pointer',
            events: {
                click: function (e) { 
                    $("#show_pie").html('' );
                    mdata6["title"]=this.name+e.point.category+"生产单元业务情况";
                    mdata7["title"]=this.name+e.point.category+"各业务情况";
                    part_of_pie_drilldown(mdata6);
                    part_of_pie_drilldown(mdata7);
                }                
            }
        }
    },
    series: [{
        type: 'column',
        name: '团队一',
        data: [3, 2, 1, 3, 4]
    }, {
        type: 'column',
        name: '团队二',
        data: [2, 3, 5, 7, 6]
    }, {
        type: 'spline',
        name: '总业务量',
        data: [5, 5, 6, 10, 10],
        marker: {
            lineWidth: 2,
            lineColor: Highcharts.getOptions().colors[3],
            fillColor: 'white'
        }
    }, {
        type: 'pie',
        name: '累计业务量',
        data: [{
            name: '团队一',
            y: 13,
            color: Highcharts.getOptions().colors[0] // Jane's color
        }, {
            name: '团队二',
            y: 23,
            color: Highcharts.getOptions().colors[1] // John's color
        }],
        center: [100, 80],
        size: 100,
        showInLegend: false,
        dataLabels: {
            enabled: false
        }
    }]
});
}



 function show_table(mdata)
 {
  if(table)
  {
   table.destroy();
 }
   table=$('#example').dataTable( {
      "scrollY": "350px",
      "scrollCollapse": true,
      "paging": false,
        "data": mdata["data"],
        "columns": mdata["columns"]
    } );
}

  Page({
      num:2,         //页码数
      startnum:1,       //指定页码
      elem:$('#page2'),   //指定的元素
      callback:function(n){ //回调函数
        console.log(n);
      }
    });
 $("#get_time_data0").click(function(){
  var data1={"data_time":0,"data_kind":"业务"};
 $.post("",data1,function(data) {
          $("#get_time_data0").attr("class","btn btn-success btn-rounded");
          $("#get_time_data1").attr("class","btn btn-primary btn-rounded");
          $("#get_time_data2").attr("class","btn btn-primary btn-rounded");
          $("#get_time_data3").attr("class","btn btn-primary btn-rounded");
          $("#get_time_data4").attr("class","btn btn-primary btn-rounded");
          $("#get_time_data5").attr("class","btn btn-primary btn-rounded");
           show_table(data);
    },"json"
    );
      });

 $("#get_time_data1").click(function(){
  var data1={"data_time":1,"data_kind":"业务"};
 $.post("",data1,function(data) {
          $("#get_time_data1").attr("class","btn btn-success btn-rounded");
          $("#get_time_data0").attr("class","btn btn-primary btn-rounded");
          $("#get_time_data2").attr("class","btn btn-primary btn-rounded");
          $("#get_time_data3").attr("class","btn btn-primary btn-rounded");
          $("#get_time_data4").attr("class","btn btn-primary btn-rounded");
          $("#get_time_data5").attr("class","btn btn-primary btn-rounded");
           show_table(data);
    },"json"
    );
      });

 $("#get_time_data2").click(function(){
  var data1={"data_time":3,"data_kind":"业务"};
 $.post("",data1,function(data) {
          $("#get_time_data2").attr("class","btn btn-success btn-rounded");
          $("#get_time_data0").attr("class","btn btn-primary btn-rounded");
          $("#get_time_data1").attr("class","btn btn-primary btn-rounded");
          $("#get_time_data3").attr("class","btn btn-primary btn-rounded");
          $("#get_time_data4").attr("class","btn btn-primary btn-rounded");
          $("#get_time_data5").attr("class","btn btn-primary btn-rounded");
           show_table(data);
    },"json"
    );
      });

 $("#get_time_data3").click(function(){
  var data1={"data_time":5,"data_kind":"业务"};
 $.post("",data1,function(data) {
          $("#get_time_data3").attr("class","btn btn-success btn-rounded");
          $("#get_time_data0").attr("class","btn btn-primary btn-rounded");
          $("#get_time_data1").attr("class","btn btn-primary btn-rounded");
          $("#get_time_data2").attr("class","btn btn-primary btn-rounded");
          $("#get_time_data4").attr("class","btn btn-primary btn-rounded");
          $("#get_time_data5").attr("class","btn btn-primary btn-rounded");
           show_table(data);
    },"json"
    );
      });

 $("#get_time_data4").click(function(){
  var data1={"data_time":6,"data_kind":"业务"};
 $.post("",data1,function(data) {
          $("#get_time_data4").attr("class","btn btn-success btn-rounded");
          $("#get_time_data0").attr("class","btn btn-primary btn-rounded");
          $("#get_time_data1").attr("class","btn btn-primary btn-rounded");
          $("#get_time_data2").attr("class","btn btn-primary btn-rounded");
          $("#get_time_data3").attr("class","btn btn-primary btn-rounded");
          $("#get_time_data5").attr("class","btn btn-primary btn-rounded");
           show_table(data);
    },"json"
    );
      });

 $("#get_time_data5").click(function(){
  var data1={"data_time":12,"data_kind":"业务"};
 $.post("",data1,function(data) {
          $("#get_time_data5").attr("class","btn btn-success btn-rounded");
          $("#get_time_data0").attr("class","btn btn-primary btn-rounded");
          $("#get_time_data1").attr("class","btn btn-primary btn-rounded");
          $("#get_time_data2").attr("class","btn btn-primary btn-rounded");
          $("#get_time_data3").attr("class","btn btn-primary btn-rounded");
          $("#get_time_data4").attr("class","btn btn-primary btn-rounded");
           show_table(data);
    },"json"
    );
      });



 $("#get_teamtime_data0").click(function(){
  var data1={"data_time":0,"data_kind":"业务"};
 $.post("",data1,function(data) {
          $("#get_teamtime_data0").attr("class","btn btn-success btn-rounded");
          $("#get_teamtime_data1").attr("class","btn btn-primary btn-rounded");
          $("#get_teamtime_data2").attr("class","btn btn-primary btn-rounded");
          $("#get_teamtime_data3").attr("class","btn btn-primary btn-rounded");
          $("#get_teamtime_data4").attr("class","btn btn-primary btn-rounded");
          $("#get_teamtime_data5").attr("class","btn btn-primary btn-rounded");
part_of_pie_drilldown(mdata6);
part_of_pie_drilldown(mdata7);
    },"json"
    );
      });

 $("#get_teamtime_data1").click(function(){
  var data1={"data_time":1,"data_kind":"业务"};
 $.post("",data1,function(data) {
          $("#get_teamtime_data1").attr("class","btn btn-success btn-rounded");
          $("#get_teamtime_data0").attr("class","btn btn-primary btn-rounded");
          $("#get_teamtime_data2").attr("class","btn btn-primary btn-rounded");
          $("#get_teamtime_data3").attr("class","btn btn-primary btn-rounded");
          $("#get_teamtime_data4").attr("class","btn btn-primary btn-rounded");
          $("#get_teamtime_data5").attr("class","btn btn-primary btn-rounded");
part_of_pie_drilldown(mdata6);
part_of_pie_drilldown(mdata7);
    },"json"
    );
      });

 $("#get_teamtime_data2").click(function(){
  var data1={"data_time":3,"data_kind":"业务"};
 $.post("",data1,function(data) {
          $("#get_teamtime_data2").attr("class","btn btn-success btn-rounded");
          $("#get_teamtime_data0").attr("class","btn btn-primary btn-rounded");
          $("#get_teamtime_data1").attr("class","btn btn-primary btn-rounded");
          $("#get_teamtime_data3").attr("class","btn btn-primary btn-rounded");
          $("#get_teamtime_data4").attr("class","btn btn-primary btn-rounded");
          $("#get_teamtime_data5").attr("class","btn btn-primary btn-rounded");
part_of_pie_drilldown(mdata6);
part_of_pie_drilldown(mdata7);
    },"json"
    );
      });

 $("#get_teamtime_data3").click(function(){
  var data1={"data_time":5,"data_kind":"业务"};
 $.post("",data1,function(data) {
          $("#get_teamtime_data3").attr("class","btn btn-success btn-rounded");
          $("#get_teamtime_data0").attr("class","btn btn-primary btn-rounded");
          $("#get_teamtime_data1").attr("class","btn btn-primary btn-rounded");
          $("#get_teamtime_data2").attr("class","btn btn-primary btn-rounded");
          $("#get_teamtime_data4").attr("class","btn btn-primary btn-rounded");
          $("#get_teamtime_data5").attr("class","btn btn-primary btn-rounded");
part_of_pie_drilldown(mdata6);
part_of_pie_drilldown(mdata7);
    },"json"
    );
      });

 $("#get_teamtime_data4").click(function(){
  var data1={"data_time":6,"data_kind":"业务"};
 $.post("",data1,function(data) {
          $("#get_teamtime_data4").attr("class","btn btn-success btn-rounded");
          $("#get_teamtime_data0").attr("class","btn btn-primary btn-rounded");
          $("#get_teamtime_data1").attr("class","btn btn-primary btn-rounded");
          $("#get_teamtime_data2").attr("class","btn btn-primary btn-rounded");
          $("#get_teamtime_data3").attr("class","btn btn-primary btn-rounded");
          $("#get_teamtime_data5").attr("class","btn btn-primary btn-rounded");
part_of_pie_drilldown(mdata6);
part_of_pie_drilldown(mdata7);
    },"json"
    );
      });

 $("#get_teamtime_data5").click(function(){
  var data1={"data_time":12,"data_kind":"业务"};
 $.post("",data1,function(data) {
          $("#get_teamtime_data5").attr("class","btn btn-success btn-rounded");
          $("#get_teamtime_data0").attr("class","btn btn-primary btn-rounded");
          $("#get_teamtime_data1").attr("class","btn btn-primary btn-rounded");
          $("#get_teamtime_data2").attr("class","btn btn-primary btn-rounded");
          $("#get_teamtime_data3").attr("class","btn btn-primary btn-rounded");
          $("#get_teamtime_data4").attr("class","btn btn-primary btn-rounded");
part_of_pie_drilldown(mdata6);
part_of_pie_drilldown(mdata7);
    },"json"
    );
      });





$(document).ready(function() {

////test
part_of_all_pie(mdata1);
part_of_all_pie(mdata2);
part_of_all_pie(mdata3);
line_chart(mdata4);
show_table(mdata5);
part_of_pie_drilldown(mdata6);
part_of_pie_drilldown(mdata7);
stacked_column(mdata8);
part_all_line_pie()
////test
var data1={"data":JSON.stringify({"num":"1"})};
           $.post(url,data1,function(data) {
             data2=data;
           if(data2.length<10)
           {
          data1={"data":JSON.stringify({"num":"2"})};
           $.post(url,data1,function(data) {
            //alert(data);
          data3=data;
          knowlegge_page1();
              },"json"
               );
         }
         else
         {
          knowlegge_page1();
         }
    },"json"
    );


  } );






