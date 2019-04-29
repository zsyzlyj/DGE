  var table=null;
  var url="";
  var data2=null,data3=null;
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



$(document).ready(function() {
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
////test
part_of_all_pie(mdata1);
part_of_all_pie(mdata2);
part_of_all_pie(mdata3);
line_chart(mdata4);
show_table(mdata5);
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
