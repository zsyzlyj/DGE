<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends Admin_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('model_auth');
		
		$this->load->model('model_wage');

		$this->data['user_name'] = $this->session->userdata('user_name');
        $this->data['user_id'] = $this->session->userdata('user_id');
	}
	/*
    ============================================================
    普通员工登录
    包括：
    1、login(),系统登录界面
    2、logout(),返回登录界面
	3、setting(),修改密码界面
	4、get_captcha,生成验证码图片
    ============================================================
    */ 
	/* 
		查看登录的表格是否正确，主要是检查user_id和password是否和数据库的一致
		根据数据库中的permission设置permission，根据permission确定不同用户登录后界面上的功能
		permission的值不同分别跳转：
		0——超级管理员,index
		1——综管员,admin
		2——部门负责人，wage
		3——普通员工,staff
		4——大区负责人,domain
	*/
	/*
	public function login(){
		//检测session,若session没有过期则不需要重新登录
		$this->logged_in();
		//检测登录页面的各项是否填充
		$this->form_validation->set_rules('user_id', 'user_id', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('verify_code', 'verify_code', 'required');
		//若图片存在,则摧毁图片
		if(array_key_exists('image', $_SESSION)){
			if(file_exists($_SESSION['image'])){
				unlink($_SESSION['image']);
			}
		}
		//若登录信息都已填写,则开始校验
		if ($this->form_validation->run() == TRUE){
			//登录错误次数
			$this->data['error_counter']']=$_POST['error_counter'];
			
			if(isset($_SESSION['code'])){
				//首先判断验证码
				if(strtolower($this->input->post('verify_code'))===strtolower($_SESSION['code']) or $this->input->post('verify_code')=="0"){
					//验证码正确,则验证登录信息
					$id_exists = $this->model_auth->check_id(strtoupper($this->input->post('user_id')));
					if($id_exists == TRUE){
						$login = $this->model_auth->login($this->input->post('user_id'), $this->input->post('password'));
						if($login){
							$log=array(
								'user_id' => $login['user_id'],
								'username' => $login['username'],
								'login_ip' => $_SERVER["REMOTE_ADDR"],
								'staff_action' => '员工登录',
								'action_time' => date('Y-m-d H:i:s')
							);
							$this->model_log_action->create($log);
							$logged_in_sess = array(
								'user_name' => $login['username'],
								'user_id' => $login['user_id'],
								'permission' => $login['permission'],
								'logged_in' => TRUE
							);
							$this->data['user_name'] = $login['username'];
							$this->session->set_userdata($logged_in_sess);
							redirect('dashboard', 'refresh');
						}
						else{
							if($this->data['error_counter'] == 3){
								$this->data['errors'] = ' 密码错误3次，请联系管理员后重试';
								$this->load->view('login', $this->data);
								$this->data['error_counter']=0;
							}
							else{
								$this->data['error_counter']++;
								$this->data['errors'] = '密码错误';
								$this->load->view('login', $this->data);
							}
						}
					}
					else{
						$this->data['errors'] = '用户不存在，请联系管理员';
						$this->load->view('login', $this->data);
					}
				}
				else{
					$this->data['errors'] = '验证码不正确';
					$this->load->view('login', $this->data);
				}
			}
			else{// 打开登录界面
				$this->data['error_counter']=0;
				$this->load->view('login',$this->data);
			}
		}
		else{// 打开登录界面
			$this->data['error_counter']=0;
			$this->load->view('login',$this->data);
		}
	}
	public function logout(){	
		if(array_key_exists('user_id', $this->data)){
			if($this->data['user_id']==NULL){
				$this->session->sess_destroy();
				redirect('auth/login', 'refresh');
			}
		}
		else{
			$this->session->sess_destroy();
			redirect('auth/login', 'refresh');
		}
		$log=array(
			'user_id' => $this->data['user_id'],
			'username' => $this->data['user_name'],
			'login_ip' => $_SERVER["REMOTE_ADDR"],
			'staff_action' => '员工登出',
			'action_time' => date('Y-m-d H:i:s')
		);
		$this->model_log_action->create($log);
		unset($log);
		$this->session->sess_destroy();
		redirect('auth/login', 'refresh');
	}
	public function setting(){
		$id = $this->session->userdata('user_id');
		$this->data['user_name'] = $this->session->userdata('user_name');
		if($id){
			$this->form_validation->set_rules('username', 'username', 'trim|max_length[12]');
			if ($this->form_validation->run() == TRUE){
	            // true case
		        if(empty($this->input->post('opassword'))){
					$this->session->set_flashdata('error', '修改失败，原密码不能为空');
					redirect('auth/setting', 'refresh');
				}
				elseif(empty($this->input->post('npassword')) && empty($this->input->post('cpassword'))){
					$this->session->set_flashdata('error', '修改失败，新密码不能为空');
					redirect('auth/setting', 'refresh');
				}
		        else{
					$this->form_validation->set_rules('opassword', 'Password', 'trim|required');
					$this->form_validation->set_rules('npassword', 'Password', 'trim|required');
					$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[npassword]');
					if($this->form_validation->run() == TRUE){
						$compare = $this->model_auth->login($id, $this->input->post('opassword'));
						if($compare){
							$password = md5($this->input->post('npassword'));
							$data = array(
								'username' => $this->input->post('username'),
								'password' => $password,
							);
							$update = $this->model_users->edit($data, $id);	
							if($update == true){
								$this->session->set_flashdata('success', '修改成功！');
								$this->render_template('users/setting', $this->data);
							}
							else{
								$this->session->set_flashdata('error', '遇到未知错误!!');
								$this->render_template('users/setting', $this->data);
							}
						}
						else{
							$this->session->set_flashdata('error', '原密码错误');	
							redirect('auth/setting', 'refresh');
						}
					}
			        else{
						// false case
						redirect('auth/setting', 'refresh');
			        }
		        }
	        }
	        else{
				// false case
				$user_data = $this->model_users->getUserData($id);
				$this->data['user_data'] = $user_data;
				$this->render_template('users/setting', $this->data);	
	        }
		}
	}
	*/
	public function login(){
		$this->data['name']='';
		$this->load->view('login',$this->data);
	}
	public function wage_excel_put(){
        $this->load->library("phpexcel");//ci框架中引入excel类
        $this->load->library('PHPExcel/IOFactory');
        //先做一个文件上传，保存文件
        $path=$_FILES['file'];
        $filePath = "uploads/".$path["name"];
        move_uploaded_file($path["tmp_name"],$filePath);
        //根据上传类型做不同处理
        if(strstr($_FILES['file']['name'],'xlsx')){
            $reader = new PHPExcel_Reader_Excel2007();
        }
        else if(strstr($_FILES['file']['name'], 'xls')){
            $reader = IOFactory::createReader('Excel5'); //设置以Excel5格式(Excel97-2003工作簿)
        }
        $cellName = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AV', 'AW', 'AX', 'AY', 'AZ','BA', 'BB', 'BC', 'BD', 'BE', 'BF', 'BG', 'BH', 'BI', 'BJ', 'BK', 'BL', 'BM', 'BN', 'BO', 'BP', 'BQ', 'BR', 'BS', 'BT', 'BU', 'BV', 'BW', 'BX', 'BY', 'BZ','CA', 'CB', 'CC', 'CD', 'CE', 'CF', 'CG', 'CH', 'CI', 'CJ', 'CK', 'CL', 'CM', 'CN', 'CO', 'CP', 'CQ', 'CR', 'CS', 'CT', 'CU', 'CV', 'CW', 'CX', 'CY', 'CZ','DA', 'DB', 'DC', 'DD', 'DE', 'DF', 'DG', 'DH', 'DI', 'DJ', 'DK', 'DL', 'DM', 'DN', 'DO', 'DP', 'DQ', 'DR', 'DS', 'DT', 'DU', 'DV', 'DW', 'DX', 'DY', 'DZ'); 
        $PHPExcel = $reader->load($filePath, 'utf-8'); // 载入excel文件
        $sheet = $PHPExcel->getSheet(0); // 读取第一個工作表
        $highestRow = $sheet->getHighestRow(); // 取得总行数
        $highestColumm = $sheet->getHighestColumn(); // 取得总列数
        $columnCnt = array_search($highestColumm, $cellName); 

        $batch_counter=0;
        $data = array();
        $attr = array();
        $this->model_wage->deleteAll();
		
        for($rowIndex = 1; $rowIndex <= $highestRow; $rowIndex++){        //循环读取每个单元格的内容。注意行从1开始，列从A开始
            $wage = array();
            for($colIndex = 0; $colIndex <= $columnCnt; $colIndex++){
                $cellId = $cellName[$colIndex].$rowIndex;  
                $cell = $sheet->getCell($cellId)->getValue();
                $cell = $sheet->getCell($cellId)->getCalculatedValue();
                if($cell instanceof PHPExcel_RichText){ //富文本转换字符串
                    $cell = $cell->__toString();
				}
				if($rowIndex==1){
					$attr[$colIndex]=$cell;
				}
				elseif($rowIndex>1){
					switch($attr[$colIndex]){
						case 'ACCT_MONTH':$wage['acct_month']=(string)date('Y-m',strtotime($cell));break;
						case 'TEAM':$wage['team']=$cell;break;
						case 'STAFF_NAME':$wage['staff_name']=$cell;break;
						case 'LSR1':$wage['lsr1']=$cell;break;
						case 'LSR2':$wage['lsr2']=$cell;break;
						case 'ZS_TOTAL_INCOME':$wage['total_income']=$cell;break;
						case 'MANAGER_LVL':$wage['manager_level']=$cell;break;
						case 'BASE_SALARY':$wage['base_salary']=$cell;break;
						case 'CHARGE':$wage['charge']=$cell;break;
						case 'KPI':$wage['kpi']=$cell;break;
						case 'YFF_CHARGE':$wage['yff_charge']=$cell;break;
						case 'HFF_CHARGE':$wage['hff_charge']=$cell;break;
						case 'GW_CHARGE':$wage['gw_charge']=$cell;break;
						case 'CL_CHARGE':$wage['cl_charge']=$cell;break;
						case 'QF_CHARGE':$wage['qf_charge']=$cell;break;
						case 'OTHER1':$wage['other1']=$cell;break;
						case 'OTHER2':$wage['other2']=$cell;break;
						case 'OTHER3':$wage['other3']=$cell;break;
						case 'OTHER4':$wage['other4']=$cell;break;
						case 'END_CHARGE':$wage['end_charge']=$cell;break;
						case 'OTHER_REMARK':$wage['remark']=$cell;break;
						default:break;
					}
				}
			}
			if($rowIndex>1){
				array_push($data,$wage);
				unset($wage);
			
			}
		}
        $this->model_wage->createbatch($data);
    }

    public function wage_import(){
        #$this->data['path'] = "uploads/standard/负责人和綜管員角色表模板.xlsx";
        if($_FILES){
            if($_FILES["file"]){
                if($_FILES["file"]["error"] > 0){
                    $this->session->set_flashdata('error', '请选择要上传的文件！');
                    $this->load->view('wage_import',$this->data);
                }
                else{
                    $this->wage_excel_put();
                    $this->wage();
					#echo 'success';
				}
            }
        }
        else{
            $this->load->view('wage_import',$this->data);
        }
	}
	public function wage(){
		$this->data['user_data']=$this->model_wage->getByName('邓敏');
		$this->render_template('customer_manager',$this->data);
	}
}