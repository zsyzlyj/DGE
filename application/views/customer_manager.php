
  <div class="page-content-wrap">
   <div class=" col-lg-1 col-md-1  col-xs-1 col-sm-1"></div>
   <div class=" col-lg-10 col-md-10 col-xs-10 col-sm-10">
    <br>
    <div class="panel panel-warning">
      <div class="panel-heading">
        <h3 class="panel-title"></h3> 
      </div>
      <input type="hidden" id='user_data' value='<?php echo $json_data;?>'/>
      <div class="panel-body">
        <h3>基本信息</h3>
        <br>
        <table class="table table-bordered table-hovered" style="text-align:center">
          <thead>
            <tr style="border-color:silver">
              <th style="border-color:silver;text-align:center"><h4>姓名</h4></th>
              <th style="border-color:silver;text-align:center"><h4>团队</h4></th>
              <th style="border-color:silver;text-align:center"><h4>出账月</h4></th>
            </tr>
          </thead>
          <tbody>
            <tr style="border-color:silver">
            <td class="col-md-3" style="border-color:silver"><?php echo $user_data['staff_name'];?></td>
            <td class="col-md-3" style="border-color:silver"><?php echo $user_data['team'];?></td>
            <td class="col-md-3" style="border-color:silver"><?php echo $user_data['acct_month'];?></td>
            </tr>
          </tbody>
        </table>
        <br />
        
        <h3>总收入情况</h3>
        <table class="table table-hovered table-bordered" style="text-align:center">
          <thead>
            <tr style="border-color:silver">
              <th style="border-color:silver;text-align:center"><h4>总收入</h4></th>
              <th style="border-color:silver;text-align:center"><h4>总提成</h4></th>
            </tr>
          </thead>
          <tbody>
            <tr>
            <td class="col-md-3" style="border-color:silver"><?php echo $user_data['total_income'];?></td>
            <td class="col-md-3" style="border-color:silver"><?php echo $user_data['end_charge'];?></td>
            </tr>
          </tbody>
        </table>
        <h3>提成情况</h3>
        <table class="table table-striped table-bordered" style="text-align:center">
          <thead>
            <tr style="border-color:silver">
              <th style="border-color:silver;text-align:center"><h4>预付费提成</h4></th>
              <th style="border-color:silver;text-align:center"><h4>后付费提成</h4></th>
              <th style="border-color:silver;text-align:center"><h4>固网提成</h4></th>
              <th style="border-color:silver;text-align:center"><h4>存量提成</h4></th>
              <th style="border-color:silver;text-align:center"><h4>QF提成</h4></th>
              <th style="border-color:silver;text-align:center"><h4>其他1</h4></th>
              <th style="border-color:silver;text-align:center"><h4>其他2</h4></th>
              <th style="border-color:silver;text-align:center"><h4>其他3</h4></th>
              <th style="border-color:silver;text-align:center"><h4>其他4</h4></th>
            </tr>
          </thead>
          <tbody>
            <tr>
            <td style="border-color:silver"><?php echo $user_data['yff_charge'];?></td>
            <td style="border-color:silver"><?php echo $user_data['hff_charge'];?></td>
            <td style="border-color:silver"><?php echo $user_data['gw_charge'];?></td>
            <td style="border-color:silver"><?php echo $user_data['cl_charge'];?></td>
            <td style="border-color:silver"><?php echo $user_data['qf_charge'];?></td>

            <td style="border-color:silver"><?php echo $user_data['other1'];?></td>
            <td style="border-color:silver"><?php echo $user_data['other1'];?></td>
            <td style="border-color:silver"><?php echo $user_data['other1'];?></td>
            <td style="border-color:silver"><?php echo $user_data['other1'];?></td>
            </tr>    
          </tbody>
        </table>
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

