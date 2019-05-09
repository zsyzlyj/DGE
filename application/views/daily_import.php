
  <div class="page-content-wrap">
    <br>
    <div class=" col-lg-1 col-md-1 "></div>
    <div class=" col-lg-10 col-md-10 col-xs-12 col-sm-12">
      <div class="panel panel-warning">
        <div class="panel-heading">
          <h3 class="panel-title">上传文件</h3> 
        </div>
        <div class="panel-body" id="student_infor">   
          <form action="<?php echo base_url('auth/daily_import') ?>" method="post"
              name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
              <div>
                  <label><h4>选择</h4></label> 
                  <br />
                  <br />
                  <h5><input type="file" name="file" id="file" accept=".xls,.xlsx"/></h5>
                  <br />
                  <button type="submit" id="submit" name="import" class="btn btn-warning" >导入</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>                    
  <!-- END PAGE CONTENT WRAPPER -->
