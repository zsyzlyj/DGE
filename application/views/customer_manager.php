
  <div class="page-content-wrap">
   <div class=" col-lg-1 col-md-1  col-xs-1 col-sm-1"></div>
   <div class=" col-lg-10 col-md-10 col-xs-10 col-sm-10">
    <br>
    <div class="panel panel-warning">
      <div class="panel-heading">
        <h3 class="panel-title">基本信息</h3> 
      </div>
      <div class="panel-body" id="student_infor">    
        <ul class="list-group border-bottom ">
          <li class="col-md-3 list-group-item">姓名<p class="pull-right"><?php echo $user_data['staff_name'];?></p></li>
          <li class="col-md-3 list-group-item">团队<p class="pull-right"><?php echo $user_data['team'];?></p></li>
          <li class="col-md-3 list-group-item">出账月<p class="pull-right"><?php echo $user_data['acct_month'];?></p></li>
          <li class="col-md-3 list-group-item">总收入<p class="pull-right"><?php echo $user_data['total_income'];?></p></li>
        </ul>
        <br>
        <ul class="list-group border-bottom ">
          <li class="col-md-3 list-group-item">总提成<p class="pull-right"><?php echo $user_data['end_charge'];?></p></li>
          <li class="col-md-3 list-group-item">预付费提成<p class="pull-right"><?php echo $user_data['yff_charge'];?></p></li>
          <li class="col-md-3 list-group-item">后付费提成<p class="pull-right"><?php echo $user_data['hff_charge'];?></p></li>
          <li class="col-md-3 list-group-item">固网提成<p class="pull-right"><?php echo $user_data['gw_charge'];?></p></li>
          <li class="col-md-3 list-group-item">CL提成<p class="pull-right"><?php echo $user_data['cl_charge'];?></p></li>
          <li class="col-md-3 list-group-item">QF提成<p class="pull-right"><?php echo $user_data['qf_charge'];?></p></li>
          <li class="col-md-3 list-group-item">其他1<p class="pull-right"><?php echo $user_data['other1'];?></p></li>
          <li class="col-md-3 list-group-item">其他2<p class="pull-right"><?php echo $user_data['other2'];?></p></li>
          <li class="col-md-3 list-group-item">其他3<p class="pull-right"><?php echo $user_data['other3'];?></p></li>
          <li class="col-md-3 list-group-item">其他4<p class="pull-right"><?php echo $user_data['other4'];?></p></li>
        </ul>   
      </div>
      <div class="panel-footer">
      </div>
    </div>
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">

      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default tabs">                            
            <ul class="nav nav-tabs" role="tablist">
              <li class="active"><a href="#tab-first" role="tab" data-toggle="tab">业务情况</a></li>
              <li><a href="#tab-second" role="tab" data-toggle="tab">薪酬展示</a></li>
              <li><a href="#tab-third" role="tab" data-toggle="tab">消息<span class="badge badge-info">0</span></a></li>
            </ul>
            <div class="panel-body tab-content">
              <div class="tab-pane active" id="tab-first">
                <div class="row">
                  <div id="container1" class="col-lg-6 col-md-3 "></div>  
                  <div id="container2" class="col-lg-6 col-md-3  "></div>  
                </div>
                <div class="panel panel-info">
                  <div class="panel-heading">
                      <h3 class="panel-title">业务明细</h3>
                    <div class="pull-right">
                      <button type="button" id="get_time_data0" class="btn btn-success btn-rounded">本月</button>
                      <button type="button" id="get_time_data1"  class="btn btn-primary btn-rounded">上个月</button>
                      <button type="button" id="get_time_data2"  class="btn btn-primary btn-rounded">近三个月</button>
                      <button type="button" id="get_time_data3"  class="btn btn-primary btn-rounded">近五个月</button>
                      <button type="button" id="get_time_data4"  class="btn btn-primary btn-rounded">近半年</button>
                      <button type="button" id="get_time_data5"  class="btn btn-primary btn-rounded">近一年</button>
                  </div>
                  </div>
              </div>
                <table id="example"  cellspacing="0" width="100%">
                </table>  
             
              </div>
              <div class="tab-pane" id="tab-second">
                <div class="row">
                 <div id="container3"></div>     
               </div>
                <div class="row">
                 <div id="container4"></div>
               </div>
             </div>                                   
             <div class="tab-pane" id="tab-third">
              <div class="push-up-10">
                <div class="pull-left">
                  <button class="btn btn-primary" id="faqOpenAll"><span class="fa fa-angle-down"></span> 展开消息</button>
                  <button class="btn btn-primary" id="faqCloseAll"><span class="fa fa-angle-up"></span> 合并消息</button>
                </div>                                       
              </div>  
              <!-- PAGE CONTENT WRAPPER -->
              <div class="panel panel-info">
                <div class="pull-left">
                  <ul class="pagination" id="page2">
                  </ul>
                </div>
                <div class="panel-body faq" id="context">
                  <div class="faq-item">
                    <div class="faq-title"><span class="badge badge-primary">>>></span>Cras at turpis vestibulum mauris gravida commodo?</div>
                    <div class="faq-text">
                      <h5>Aliquam at ipsum sapien</h5>
                      <p>Maecenas risus sapien, sollicitudin quis nisl vehicula, sagittis venenatis elit. Cras at turpis vestibulum mauris gravida commodo. Fusce tellus metus, eleifend vel ultrices quis, fermentum ut justo. Ut hendrerit ante sed rutrum sagittis. Nam ac nulla posuere, mattis risus nec, sagittis purus. Praesent in justo rhoncus, molestie velit laoreet, viverra sem.</p>
                      <p>Sed sit amet lacus sem. Sed vel fermentum mi, sit amet hendrerit purus. Duis nec posuere dolor. Fusce sed faucibus turpis, a cursus nunc.</p>
                    </div>
                  </div>
                  <div class="faq-item">
                    <div class="faq-title"><span class="badge badge-primary">>>></span>Nulla ullamcorper, ex in ultrices fringilla?</div>
                    <div class="faq-text">
                      <h5>Cras ac odio faucibus tortor pretium</h5>
                      <p>Cras ac odio faucibus tortor pretium tristique in id nisl. Donec libero nisl, hendrerit vel tempus at, posuere vel urna. Nam sed consectetur lectus. Sed sit amet risus dolor. Duis accumsan lorem ac quam egestas pretium.</p>
                      <p>Curabitur finibus nisl ac aliquet mattis. Aliquam convallis bibendum lorem sed lobortis. Cras aliquam urna sed luctus tincidunt.</p>
                      <h5>Nulla ullamcorper</h5>
                      <p>In diam turpis, tristique nec cursus in, blandit vel elit. Nulla ullamcorper, ex in ultrices fringilla, nisi sapien hendrerit dolor, in suscipit mauris turpis id erat.</p>
                      <p>Nunc facilisis odio vitae eros rutrum, eget rutrum nulla rhoncus. Etiam laoreet pretium ex ut gravida. In venenatis turpis sit amet volutpat bibendum.</p>
                    </div>
                  </div>
                </div>
              </div>
              <!-- END PAGE CONTENT WRAPPER -->                       
            </div>  
          </div>
          <div class="panel-footer">                     
          </div>
        </div>                                
      </div>
    </div>                    
    <!-- END PAGE CONTENT WRAPPER -->    
  </div>

