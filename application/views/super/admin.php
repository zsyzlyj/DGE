

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        账单信息汇总
      </h1>
    </section>

    
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <a href="<?php echo base_url('super_admin/admin_import');?>" class="btn btn-info">上传信息</a>
      <div class="row">
        <div class="col-md-12 col-xs-12">

          <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('success'); ?>
            </div>
          <?php elseif($this->session->flashdata('error')): ?>
            <div class="alert alert-error alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('error'); ?>
            </div>
          <?php endif; ?>
          <div class="box">
            <div class="box-header">
            </div>
            <div class="box-body" style>
              <div style="overflow:scroll;">
                <table id="wageTable" class="table table-striped table-bordered table-hover mytable" style="border-color:silver;overflow:scroll;white-space: nowrap;word-break:  keep-all;text-align: center;">
                  <thead>
                  <tr style="border-color:silver;">
                    <th style="text-align:center;border-color:silver;">用户编码</th>
                    <th style="text-align:center;border-color:silver;">电话号码</th>
                    <th style="text-align:center;border-color:silver;">出账金额</th>
                    <th style="text-align:center;border-color:silver;">发展部门编码</th>
                    <th style="text-align:center;border-color:silver;">分公司</th>
                    <th style="text-align:center;border-color:silver;">产品编号</th>
                    <th style="text-align:center;border-color:silver;">产品名称</th>
                    <th style="text-align:center;border-color:silver;">员工编号</th>
                    <th style="text-align:center;border-color:silver;">员工姓名</th>
                    <th style="text-align:center;border-color:silver;">LX</th>
                    <th style="text-align:center;border-color:silver;">发展部门</th>
                    <th style="text-align:center;border-color:silver;">集团编码</th>
                    <th style="text-align:center;border-color:silver;">集团名称</th>
                    <th style="text-align:center;border-color:silver;">活动名称</th>
                    <th style="text-align:center;border-color:silver;">活动办理时间</th>
                    <th style="text-align:center;border-color:silver;">入网时间</th>
                    <th style="text-align:center;border-color:silver;">入网年月</th>
                    <th style="text-align:center;border-color:silver;">状态</th>
                    <th style="text-align:center;border-color:silver;">客户姓名</th>
                    <th style="text-align:center;border-color:silver;">移网类型1</th>
                    <th style="text-align:center;border-color:silver;">移网类型2</th>
                    <th style="text-align:center;border-color:silver;">产品大类</th>
                    <th style="text-align:center;border-color:silver;">出账账期</th>
                  </tr>
                  </thead>

                  <tbody>
                    <?php foreach($data as $k => $v):?>
                    <tr>
                      <?php foreach($v as $a => $b):?>
                      <td style="border-color:silver;"><?php echo $b;?></td>
                      <?php endforeach; ?>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>

              </div>
              <!-- /.overflow:scroll -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->
      </section>
  </div>
  <!-- /.content-wrapper -->
  

  <script type="text/javascript">
    $(document).ready(function(){
      $('#wageGatherMainMenu').addClass('active');
      $('#wageTable').DataTable({
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
        }      
      });
    });
  </script>
 