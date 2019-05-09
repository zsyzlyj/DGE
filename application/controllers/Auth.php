<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends Admin_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('model_auth');
		
		$this->load->model('model_wage');

		$this->load->model('model_daily_account');
		$this->data['user_name'] = $this->session->userdata('user_name');
        $this->data['user_id'] = $this->session->userdata('user_id');
	}
	
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
                    $this->render_template('wage_import',$this->data);
                }
                else{
                    $this->wage_excel_put();
                    redirect('auth/wage','refresh');
				}
            }
        }
        else{
            $this->render_template('wage_import',$this->data);
        }
	}
	public function wage(){
		$result=array();
		$attr=array();
		$user_data=$this->model_wage->getByName('邓敏');
		$daily_data=$this->model_daily_account->getByName('李奕银');
		$this->data['user_data']=$user_data;
		$this->data['json_data']=json_encode($user_data);
		
		foreach($daily_data->list_fields() as $k => $v){
			array_push($attr,array('title' => $v));
		}
		/**/
		foreach($daily_data->result_array() as $k => $v){
			$tmp=array();
			foreach($v as $a => $b){
				array_push($tmp,$b);
			}
			array_push($result,$tmp);
			unset($tmp);
		}
		
		$this->data['column_name']=json_encode($attr);
		$this->data['daily_data']=json_encode($result);
		$this->render_template('customer_manager',$this->data);
	}
	public function excel_put(){
        $this->load->library('phpexcel');//ci框架中引入excel类
        $this->load->library('PHPExcel/IOFactory');
        //先做一个文件上传，保存文件
        $path=$_FILES['file'];
        $filePath = 'uploads/'.$path['name'];
        move_uploaded_file($path['tmp_name'],$filePath);
        //根据上传类型做不同处理 
        if(strstr($_FILES['file']['name'],'xlsx')){
            $reader = new PHPExcel_Reader_Excel2007();
        }
        else{
            if(strstr($_FILES['file']['name'], 'xls')){
                $reader = IOFactory::createReader('Excel5'); //设置以Excel5格式(Excel97-2003工作簿)
            }
        }

        $cellName = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AV', 'AW', 'AX', 'AY', 'AZ','BA', 'BB', 'BC', 'BD', 'BE', 'BF', 'BG', 'BH', 'BI', 'BJ', 'BK', 'BL', 'BM', 'BN', 'BO', 'BP', 'BQ', 'BR', 'BS', 'BT', 'BU', 'BV', 'BW', 'BX', 'BY', 'BZ','CA', 'CB', 'CC', 'CD', 'CE', 'CF', 'CG', 'CH', 'CI', 'CJ', 'CK', 'CL', 'CM', 'CN', 'CO', 'CP', 'CQ', 'CR', 'CS', 'CT', 'CU', 'CV', 'CW', 'CX', 'CY', 'CZ','DA', 'DB', 'DC', 'DD', 'DE', 'DF', 'DG', 'DH', 'DI', 'DJ', 'DK', 'DL', 'DM', 'DN', 'DO', 'DP', 'DQ', 'DR', 'DS', 'DT', 'DU', 'DV', 'DW', 'DX', 'DY', 'DZ'); 
        $PHPExcel = $reader->load($filePath, 'utf-8'); // 载入excel文件
        $sheet = $PHPExcel->getSheet(0); // 读取第一個工作表
        $highestRow = $sheet->getHighestRow(); // 取得总行数
        $highestColumm = $sheet->getHighestColumn(); // 取得总列数
    
        $columnCnt = array_search($highestColumm, $cellName); 

        $this->model_daily_account->deleteAll();
        $account_set=array();
        $user_set=array();
        $attr=array();
        for($rowIndex = 1; $rowIndex <= $highestRow; $rowIndex++){        //循环读取每个单元格的内容。注意行从1开始，列从A开始
            for($colIndex = 0; $colIndex <= $columnCnt; $colIndex++){
                $cellId = $cellName[$colIndex].$rowIndex;  
                $cell = $sheet->getCell($cellId)->getValue();
                $cell = $sheet->getCell($cellId)->getCalculatedValue();
                if($cell instanceof PHPExcel_RichText){ //富文本转换字符串
                    $cell = $cell->__toString();
                }
                $b=$cell;
                if($rowIndex==1){
                    array_push($attr,$b);
                }
                elseif($rowIndex>1){
                    switch($attr[$colIndex]){
                        case 'ACCT_MONTH':$date_tag=$b;break;
                        case 'USER_NO':$user_id=$b;break;
                        case 'DEVICE_NUMBER':$phone_number=$b;break;
                        case 'CHARGE':$charge=$b;break;
                        case 'DEPT_NO':$dept_id=$b;break;
                        case 'FGS':$fgs=$b;break;
                        case 'PRODUCT_ID':$product_id=$b;break;
                        case 'PRODUCT_NAME':$product_name=$b;break;
                        case 'DEVELOP_STAFF_ID':$staff_id=$b;break;
                        case 'STAFF_NAME':$staff_name=$b;break;
                        case 'LX':$account_type=$b;break;
                        case 'DEVLOP_DEPART':$develop_dept=$b;break;
                        case 'VPN_NO':$vip_id=$b;break;
                        case 'JTMC':$vip_name=$b;break;
                        case 'ACTION_NAME':$activity=$b;break;
                        case 'RECV_TIME':$activity_date=$b;break;
                        case 'IN_DATE':$in_time=$b;break;
                        case 'STATE_NAME':$status=$b;break;
                        case 'CUST_NAME':$customer_name=$b;break;
                        case 'RWNY':$in_date=$b;break;
                        case 'YWLX':$celler_type1=$b;break;
                        case 'YWLX2':$celler_type2=$b;break;
                        case 'PROLX':$celler_product_type=$b;break; 
                        default:break;
                        #case 'STATE_NAME':$status=gmdate('Y-m-d',PHPExcel_Shared_Date::ExcelToPHP($b));break;
                    }
                }
            }
            if($rowIndex>1){
                //新建账单对象
                $row_data=array(
                    'date_tag' => $date_tag,
                    'user_id' => $user_id,
                    'phone_number' => $phone_number,
                    'charge' => $charge,
                    'dept_id' => $dept_id,
                    'fgs' => $fgs,
                    'product_id' => $product_id,
                    'product_name' => $product_name,
                    'staff_id' => $staff_id,
                    'staff_name' => $staff_name,
                    'account_type' => $account_type,
                    'develop_dept' => $develop_dept,
                    'vip_id' => $vip_id,
                    'vip_name' => $vip_name,
                    'activity' => $activity,
                    'activity_date' => $activity_date,
                    'in_time' => $in_time,
                    'in_date' => $in_date,
                    'status' => $status,
                    'customer_name' => $customer_name,
                    'celler_type1' => $celler_type1,
                    'celler_type2' => $celler_type2,
                    'celler_product_type' => $celler_product_type
                );
                array_push($account_set,$row_data);
                unset($row_data);
                /*
                //新建登陆用户
                //如果数据库中没有这个用户，那么就创建记录，否则不做任何事
                if(!$this->model_users->checkUserById($user_id)){
                    #$this->model_users->update();
                    $user_data=array(
                        'username' => $name,
                        'user_id' => $user_id,
                        'password' => md5(substr($user_id,-6)),
                        'permission' => 3,
                    );
                    array_push($user_set,$user_data);
                    unset($user_data);
                }
                */
            }
        }

        $this->model_daily_account->createbatch($account_set);
        #$this->model_users->createbatch($user_set);
        
        unset($wage_set);
        #unset($user_set);
    }
    public function daily_import($filename=NULL){
        if($_FILES){
            if($_FILES['file']){
                if($_FILES['file']['error'] > 0){
                    $this->session->set_flashdata('error', '请选择要上传的文件！');
                    $this->render_template('daily_import',$this->data);
                }
                else{
                    $this->excel_put();
                    redirect('auth/wage','refresh');
                }
            }
        }
        else{
            $this->render_template('daily_import',$this->data);
        } 
    }
}