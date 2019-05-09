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
          format: '<b><h1>{point.name}</h1></b><br>占比：{point.percentage:.1f}%<br>提成额：{point.y}元',
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
  table=$('#example').DataTable( {
    "scrollX": true,
    //"scrollCollapse": true,
    //"paging": false,
    "data": mdata["data"],
    "columns": mdata["columns"]
  });
}

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
  
  var wage_data=JSON.parse(document.getElementById("user_data").value);
  var daily_data=JSON.parse(document.getElementById("daily_data").value);
  var column_name=JSON.parse(document.getElementById("column_name").value);
  console.log(column_name);
  var mdata1={"id":'container1',"title":'本月各业务提成',"series":[{name: 'Brands',colorByPoint: true,
            data: [{ name: '业务1',y: 61.41, sliced: true,selected: true}, { name: '业务2 ',y: 11.84}, 
                  { name: '业务3', y: 10.85}, { name: '业务4',y: 4.67}, { name: '业务5',y: 4.18}, { name: '业务6',y: 1.64}, 
                  {name: '业务7', y: 1.6}, {name: '业务8', y: 1.2}, {name: '业务9',y: 2.61}]}]};

  var mdata2={"id":'container2',"title":"业务和薪酬历史记录","xAxis":['1月', '2月', '3月', '5月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
            "data":{"业务":[49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
                      '薪酬': [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
                      }};

  var mdata3={"id":'container3',"title":'各业务提成占比',"series":[{name: 'Brands',colorByPoint: true,
            data: [
              {name: '预付费',y: Number(wage_data['yff_charge'])},
              {name: '后付费',y: Number(wage_data['hff_charge'])},
              {name: '固网',y: Number(wage_data['gw_charge'])},
              {name: '存量',y: Number(wage_data['cl_charge'])},
              {name: 'QF',y: Number(wage_data['qf_charge'])},
              {name: '其他1',y: Number(wage_data['other1'])},
              {name: '其他2',y: Number(wage_data['other2'])},
              {name: '其他3',y: Number(wage_data['other3'])},
              {name: '其他4',y: Number(wage_data['other4'])}
            ]}
          ]};

  var mdata4={"id":'container4',"title":'本月业务开展情况',"series":[{name: 'Brands',colorByPoint: true,
            data: [{ name: '业务1',y: 61.41, sliced: true,selected: true}, { name: '业务2 ',y: 11.84}, 
                  { name: '业务3', y: 10.85}, { name: '业务4',y: 4.67}, { name: '业务5',y: 4.18}, { name: '业务6',y: 1.64}, 
                  {name: '业务7', y: 1.6}, {name: '业务8', y: 1.2}, {name: '业务9',y: 2.61}]}]};
  var mdata5={
    "data":daily_data,
    "columns": column_name
  };
  $('#daily_table').DataTable( {
    language:{
      "sProcessing": "处理中...",
      "sLengthMenu": "显示 _MENU_ 项",
      "sZeroRecords": "没有匹配结果",
      "sInfo": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
      "sInfoEmpty": "显示第 0 至 0 项结果，共 0 项",
      "sInfoFiltered": "(由 _MAX_ 项结果过滤)",
      "sInfoPostFix": "",
      "sSearch": "搜索:",
      "sUrl": "",
      "sEmptyTable": "表中数据为空",
      "sLoadingRecords": "载入中...",
      "sInfoThousands": ",",
      "oPaginate":{
          "sFirst": "首页",
          "sPrevious": "上页",
          "sNext": "下页",
          "sLast": "末页"
      },
      "oAria":{
          "sSortAscending": ": 以升序排列此列",
          "sSortDescending": ": 以降序排列此列"
      }
    },
    "scrollX":true,
    "columns": mdata5["columns"],
    "data": mdata5["data"]    
  });
  ////test
  //part_of_all_pie(mdata1);
  //part_of_all_pie(mdata2);
  part_of_all_pie(mdata3);
  //line_chart(mdata4);
  //show_table(mdata5);
  ////test
  /*
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
      },"json");
    }
    else
    {
    knowlegge_page1();
    }
  },"json");
  */
});
