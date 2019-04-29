
 $("#context").delegate(".faq-title", "click", function(){
        var item = $(this).parent('.faq-item');

        if(item.hasClass("active"))
          $(this).find(".fa").removeClass("fa-angle-up").addClass("fa-angle-down");
        else
          $(this).find(".fa").removeClass("fa-angle-down").addClass("fa-angle-up");

        item.toggleClass("active");

        onresize(300);
      });

      $("#faqOpenAll").click(function(){
        $(".faq .faq-item").addClass("active");
        onresize(300);
      });

      $("#faqCloseAll").click(function(){
        $(".faq .faq-item").removeClass("active");
        onresize(300);
      });
 function knowlegge_page(data)
{
  var html="";
    for (var key in data)
    {
      html="<div class=\"faq-item\"><div class=\"faq-title\"><span class=\"fa glyphicon glyphicon-chevron-down\"></span>"+data[key][0]+"<div class=\"pull-right\">"+data[key][1].split(" ")[0]+"</div>"+"</div><div class=\"faq-text\"><h5>简介</h5>"+data[key][2]+"<a class=\"btn btn-info pull-right\" href=\"news_html/"+data[key][3].toString()+"\">了解更多...</a>       </div></div>"+html;

    }
    html="<div class=\"panel panel-success\"><div class=\"panel-body\"><h3 class=\"push-down-0\">资讯列表</h3></div><div class=\"panel-body faq\">"+html;
    //alert(html);
    $('#context').html(html);
  }

 function knowlegge_page1()
{
  var html="",m_data=0;
    for (var key =(data2.length-1);key>=0;key--)
    {
      if (m_data>=10) break;
     html=html+"<div class=\"faq-item\"><div class=\"faq-title\"><span class=\"fa glyphicon glyphicon-chevron-down\"></span>"+data2[key][0]+"<div class=\"pull-right\">"+data2[key][1].split(" ")[0]+"</div>"+"</div><div class=\"faq-text\"><h5>简介</h5>"+data2[key][2]+"<a class=\"btn btn-info pull-right\" href=\"news_html/"+data2[key][3].toString()+"\">了解更多...</a>       </div></div>";

      m_data=m_data+1;
    }
   // alert(data2.length)
    if(data2.length<10)
    {
      for (var key =(data3.length-1);key>=0;key--)
    {
      if (m_data>=10) break;
      html=html+"<div class=\"faq-item\"><div class=\"faq-title\"><span class=\"fa glyphicon glyphicon-chevron-down\"></span>"+data3[key][0]+"<div class=\"pull-right\">"+data3[key][1].split(" ")[0]+"</div>"+"</div><div class=\"faq-text\"><h5>简介</h5>"+data3[key][2]+"<a class=\"btn btn-info pull-right\" href=\"news_html/"+data3[key][3].toString()+"\">了解更多...</a>       </div></div>";

      m_data=m_data+1;
    }
    }
   //alert(html);
    html="<div class=\"panel panel-success\"><div class=\"panel-body\"><h3 class=\"push-down-0\">资讯列表</h3></div><div class=\"panel-body faq\">"+html;
    $('#context').html(html);
  }
