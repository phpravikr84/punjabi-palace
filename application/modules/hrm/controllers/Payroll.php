<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payroll extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->db->query('SET SESSION sql_mode = ""');
		$this->load->model(array(
			'Payroll_model'
		));		 
	}

	public function emp_salary_setup_view(){   
		$this->permission->module('hrm','read')->redirect();
		$data['title']    = display('view_salary_setup');  ;
		$data['emp_sl']   = $this->Payroll_model->salary_setupView();
		$data['module']   = "hrm";
		$data['page']     = "emppay_sal_setupview";   
		echo Modules::run('template/layout', $data); 
	} 


	public function create_salary_setup(){ 
		$this->permission->module('hrm','create')->redirect();
		$data['title'] = display('selectionlist');
		#-------------------------------#
		$this->form_validation->set_rules('sal_name',display('sal_name'),'required|max_length[50]');
		$this->form_validation->set_rules('emp_sal_type',display('emp_sal_type'));
		
		#-------------------------------#
		if ($this->form_validation->run() === true) {

			$postData = [
				'sal_name'        => $this->input->post('sal_name',true),
				'emp_sal_type' 	  => $this->input->post('emp_sal_type',true),
		
			];   

			if ($this->Payroll_model->emp_salsetup_create($postData)) { 
				$this->session->set_flashdata('message', display('successfully_saved'));
			} else {
				$this->session->set_flashdata('exception',  display('please_try_again'));
			}
			redirect("hrm/Payroll/create_salary_setup");
		} else {
			$data['title']  = display('salary_type');
			$data['module'] = "hrm";
			$data['page']   = "emppayroll_salarysetup_form";
			$data['emp_sl'] = $this->Payroll_model->salary_setupView(); 
			echo Modules::run('template/layout', $data);   
			
		}   
	}
	public function delete_emp_salarysetup($id = null){ 
		$this->permission->module('hrm','delete')->redirect();

		if ($this->Payroll_model->emp_salstup_delete($id)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect("hrm/Payroll/emp_salary_setup_view");
	}




	public function update_salsetup_form($id = null){
		$this->permission->module('hrm','update')->redirect();
		$this->form_validation->set_rules('salary_type_id',null,'required|max_length[11]');
		$this->form_validation->set_rules('sal_name',display('sal_name'),'required|max_length[50]');
		$this->form_validation->set_rules('emp_sal_type',display('emp_sal_type')  ,'max_length[20]');
		#-------------------------------#
		if ($this->form_validation->run() === true) {

			$postData = [
				'salary_type_id' 	             => $this->input->post('salary_type_id',true),
				'sal_name' 	                     => $this->input->post('sal_name',true),
				'emp_sal_type' 		             => $this->input->post('emp_sal_type',true),
				
			]; 
			
			if ($this->Payroll_model->update_em_salstup($postData)) { 
				$this->session->set_flashdata('message', display('successfully_updated'));
			} else {
				$this->session->set_flashdata('exception',  display('please_try_again'));
			}
			redirect("hrm/Payroll/update_salsetup_form/". $id);

		} else {
			$data['title']  = display('update');
			$data['data']   =$this->Payroll_model->salarysetup_updateForm($id);
			$data['module'] = "hrm";
			$data['page']   = "update_salarysetup_form";   
			echo Modules::run('template/layout', $data); 
		}

	}


	public function salary_setup_view()
	{   
		$this->permission->module('hrm','read')->redirect();
		$data['title']         = display('view_salary_setup');  ;
		$data['emp_sl_setup']  = $this->Payroll_model->salary_setupindex();
		$data['module']        = "hrm";
		$data['page']          = "sal_setupview";   
		echo Modules::run('template/layout', $data); 
	} 


	public function create_s_setup(){ 
		$this->permission->module('hrm','create')->redirect();
		$data['title'] = display('selectionlist');
		#-------------------------------#
		$this->form_validation->set_rules('employee_no',display('employee_no'),'required|max_length[50]');
		$this->form_validation->set_rules('sal_type',display('sal_type'));
		$this->form_validation->set_rules('amount[]',display('amount'));
		$this->form_validation->set_rules('salary_payable',display('salary_payable'));
		$this->form_validation->set_rules('absent_deduct',display('absent_deduct'));
		$this->form_validation->set_rules('tax_manager',display('tax_manager'));
		$amount=$this->input->post('amount');
		
		#-------------------------------#
		if ($this->form_validation->run() === true) {
			$date=date('Y-m-d');

			foreach($amount as $key=>$value)
			{	
				$postData = [
					'employee_no'           => $this->input->post('employee_no',true),
					'sal_type'              => $this->input->post('sal_type',true),
					'salary_type_id' 	    => $key,
					'amount' 	            => (!empty($value)?$value:0),
					'create_date'           => $date,
					'gross_salary'          => $this->input->post('gross_salary',true),
				]; 
	
			
					$this->Payroll_model->salary_setup_create($postData);
				
			}
			if(empty($amount)){
						$postData = [
						'employee_no'           => $this->input->post('employee_no',true),
						'sal_type'              => $this->input->post('sal_type',true),
						'salary_type_id' 	    => 0,
						'amount' 	            => 0,
						'create_date'           => $date,
						'gross_salary'          => $this->input->post('gross_salary',true),
						]; 
						$this->Payroll_model->salary_setup_create($postData);
					}
			if($this->input->post('absent_deduct',true)==1)
			{
				$absent_deduct=1;	
			}
			else
			{
				$absent_deduct=0;
			}
			if($this->input->post('tax_manager',true)==1)
			{
				$tax_manager=1;	
			}
			else
			{
				$tax_manager=0;
			}
			$Data1 = [
				'employee_no'                => $this->input->post('employee_no',true),
				'salary_payable' 	         => $this->input->post('salary_payable',true),
				'absent_deduct' 	         => $absent_deduct,
				'tax_manager' 	             => $tax_manager,	
			];   
			$this->Payroll_model->salary_head_create($Data1);
			$this->session->set_flashdata('message', display('successfully_saved_saletup'));
			redirect("hrm/Payroll/create_s_setup");
		} else {
			$data['title']      = display('create');
			$data['module']     = "hrm";
			$data['slname']     = $this->Payroll_model->salary_typeName();
			$data['sldname']    = $this->Payroll_model->salary_typedName();
			$data['employee']   = $this->Payroll_model->empdropdown();
			$data['emp_sl_setup']   = $this->Payroll_model->salary_setupindex();
			$data['page']       = "salarysetup_form"; 
			echo Modules::run('template/layout', $data);   
			
		}   
	}
	public function delete_salsetup($id = null) 
	{ 
		$this->permission->module('hrm','delete')->redirect();

		if ($this->Payroll_model->delete_salsetup($id)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect("hrm/Payroll/emp_salary_setup_view");
	}



	public function salary_generate_view()
	{   
		$this->permission->module('hrm','read')->redirect();

		$data['title']    = display('view_salary_generate');  ;
		$data['salgen']   = $this->Payroll_model->salary_generateView();
		$data['module']   = "hrm";
		$data['page']     = "sal_genview";   
		echo Modules::run('template/layout', $data); 
	} 

	public function create_salary_generate()
	{ 
		$this->permission->module('hrm','create')->redirect();
		$data['title'] = display('selectionlist'); 
		#-------------------------------# 
		$this->form_validation->set_rules('name',display('name'),'required|max_length[50]');
		$this->form_validation->set_rules('start_date',display('start_date'),'required|max_length[50]');
		$this->form_validation->set_rules('end_date',display('end_date'),'max_length[50]');
		#-------------------------------#

		if ($this->form_validation->run() === true) {

			$employee = $this->db->select('employee_no')->from('employee_salary_setup')->group_by('employee_no')->get()->result();
			
			$startd    = $this->input->post('start_date');
			$ab=date('Y-m-d');
			if (sizeof($employee) > 0)
				foreach($employee as $key=>$value)
				{ 
			$postData = [
				'employee_no'         =>  $value->employee_no,
				'name'                =>  $this->input->post('name',true),
				'gdate'               =>  $ab,
				'start_date' 	      =>  $this->input->post('start_date',true), 
				'end_date' 	          =>  $this->input->post('end_date',true), 
				'generate_by' 	      =>  $this->session->userdata('fullname'), 
			]; 

		$this->db->insert('salary_sheet_generate', $postData);
		$aAmount   = $this->db->select('gross_salary,sal_type,employee_no')->from('employee_salary_setup')->where('employee_no', $value->employee_no)->get()->row();
		$Amount    = $aAmount->gross_salary;
		$startd    = $this->input->post('start_date');
		$end       = $this->input->post('end_date');
		$times     = $this->db->select('SUM(TIME_TO_SEC(staytime)) AS staytime')->from('emp_attendance')->where('date BETWEEN "'. date('Y-m-d', strtotime($startd)). '" and "'. date('Y-m-d', strtotime($end)).'"')->where("employee_no" ,$value->employee_no )->get()->row()->staytime;
		$wormin = ($times/60);
		$worhour = number_format($wormin/60,2);
		if($aAmount->sal_type == 1){
		$dStart = new DateTime($startd);
        $dEnd  = new DateTime($end);
        $dDiff = $dStart->diff($dEnd);
         $numberofdays =  $dDiff->days+1;
			$totamount = $Amount*$worhour;
			$PYI = ($totamount/$numberofdays)*365;
			$PossibleYearlyIncome = round($PYI);
		$this->db->select('*');
		$this->db->from('payroll_tax_setup');
		$this->db->where("start_amount <",$PossibleYearlyIncome);
		$query = $this->db->get();
		$taxrate = $query->result_array();
	
		$TotalTax = 0;
	    foreach($taxrate as $row){
                    // "Inside tax calculation";
	    	    if($PossibleYearlyIncome > $row['start_amount'] && $PossibleYearlyIncome > $row['end_amount']){
                   $diff=$row['end_amount']-$row['start_amount'];
                    }
                     if($PossibleYearlyIncome > $row['start_amount'] && $PossibleYearlyIncome < $row['end_amount']){
                    $diff=$PossibleYearlyIncome-$row['start_amount'];
                    }
                    $tax=(($row['rate']/100)*$diff);
                    $TotalTax += $tax;	
                } 
              $TaxAmount = ($TotalTax/365)*$numberofdays;
     
        $netAmount = number_format(($totamount-$TaxAmount),2);
		}else if($aAmount->sal_type == 2){
			$netAmount = $Amount;
		}
			$workingper   = $this->db->select('COUNT(date) AS date')->from('emp_attendance')->where('date BETWEEN "'. date('d-m-Y', strtotime($startd)). '" and "'. date('d-m-Y', strtotime($end)).'"')->where("employee_no" ,$value->employee_no )->get()->row()->date;
			$paymentData = array(
				'employee_no'           => $value->employee_no,
				'total_salary'          => $netAmount,
				'total_working_minutes' => $worhour, 
				'working_period'        => $workingper,
			);
			if(!empty($aAmount->employee_no)){
				$this->db->insert('employee_salary_payment', $paymentData);
			}
		}
				$this->session->set_flashdata('message', display('successfully_saved_saletup'));
				redirect("hrm/Payroll/create_salary_generate");
			} else {
				$data['title']  = display('create');
				$data['emplist']=$this->db->select('*')->from('employee_history')->group_by('employee_no')->get()->result();
				$data['module'] = "hrm";
				$data['page']   = "salary_generate_form"; 
				$data['salgen'] = $this->Payroll_model->salary_generateView();
				echo Modules::run('template/layout', $data);   

			}   
		}
		public function delete_sal_gen($id = null) 
		{ 
			$this->permission->module('hrm','delete')->redirect();

			if ($this->Payroll_model->salary_gen_delete($id)) {
			#set success message
				$this->session->set_flashdata('message',display('delete_successfully'));
			} else {
			#set exception message
				$this->session->set_flashdata('exception',display('please_try_again'));
			}
			redirect("hrm/Payroll/salary_generate_view");
		}

		public function update_salgen_form($id = null){
			$this->permission->module('hrm','update')->redirect();
			$this->form_validation->set_rules('ssg_id',null,'max_length[11]');
			$this->form_validation->set_rules('name',display('name'),'max_length[50]');

			$this->form_validation->set_rules('start_date',display('start_date'));
			$this->form_validation->set_rules('end_date',display('end_date'));
		#-------------------------------#
			if ($this->form_validation->run() === true) {
				$postData = [
					'ssg_id' 	             => $this->input->post('ssg_id',true),
					'name'                   => $this->input->post('name',true),
					'start_date' 	         => $this->input->post('start_date',true),
					'end_date' 	             => $this->input->post('end_date',true),
				]; 
				if ($this->Payroll_model->update_sal_gen($postData)) { 
					$this->session->set_flashdata('message', display('successfully_updated'));
				} else {
					$this->session->set_flashdata('exception',  display('please_try_again'));
				}
				redirect("hrm/Payroll/salary_generate_view");
			} else {
				$data['title']  = display('update');
				$data['data']   =$this->Payroll_model->salargen_updateForm($id);
				$data['module'] = "hrm";
				$data['page']   = "update_salarygenerate_form";   
				echo Modules::run('template/layout', $data); 
			}

		}
		/* salary setup update form  start*/
		public function updates_salstup_form($id = null){
			$this->permission->module('hrm','update')->redirect();
 		#-------------------------------#
			$this->form_validation->set_rules('employee_no',display('employee_no'),'required|max_length[50]');
			$this->form_validation->set_rules('sal_type',display('sal_type'));
			$this->form_validation->set_rules('amount[]',display('amount'));
			$this->form_validation->set_rules('salary_payable',display('salary_payable'));
			$this->form_validation->set_rules('absent_deduct',display('absent_deduct'));
			$this->form_validation->set_rules('tax_manager',display('tax_manager'));
			$amount=$this->input->post('amount');

		#-------------------------------#
			if ($this->form_validation->run() === true) {


				foreach($amount as $key=>$value)
				{

					$postData = array(
						'employee_no'        => $this->input->post('employee_no',true),
						'sal_type'           => $this->input->post('sal_type',true),
						'salary_type_id' 	 => $key,
						'amount' 	         => $value,
						'total_salary'       => $this->input->post('gross_salary',true),
					);

					$this->Payroll_model->update_sal_stup($postData);

				}
				if(empty($amount)){
						$upodate=array('gross_salary'=>$this->input->post('gross_salary',true));
						$update= $this->db->where('employee_no',$this->input->post('employee_no',true))->update("employee_salary_setup", $upodate);
					}


				if($this->input->post('absent_deduct',true)==1)
				{
					$absent_deduct=1;	
				}
				else
				{
					$absent_deduct=0;
				}


				if($this->input->post('tax_manager',true)==1)
				{
					$tax_manager=1;	
				}
				else
				{
					$tax_manager=0;
				}


				$Data = [
					'employee_no'                => $this->input->post('employee_no',true),
					'salary_payable' 	         => $this->input->post('salary_payable',true),
					'absent_deduct' 	         => $absent_deduct,
					'tax_manager' 	             => $tax_manager,


				];   


				$this->Payroll_model->update_sal_head($Data);
				$this->session->set_flashdata('message', display('successfully_saved_saletup'));
				redirect("hrm/Payroll/updates_salstup_form/". $id);
//
			} else {

			$data['title']       = display('update');//
			$data['data']        = $this->Payroll_model->salary_s_updateForm($id);
			$data['samlft']      = $this->Payroll_model->salary_amountlft($id);
			$data['amo']         = $this->Payroll_model->salary_amount($id);
			$data['bb']          = $this->Payroll_model->get_empid($id);
			$data['gt']          = $this->Payroll_model->get_type($id);
			$data['employee']    = $this->Payroll_model->empdropdown();
			$data['type']        = $this->Payroll_model->type();
			$data['payable']     = $this->Payroll_model->payable();
			$data['gt_pay']      = $this->Payroll_model->get_payable($id);
			$data['EmpRate']     = $this->Payroll_model->employee_informationId($id);
			$data['module']      = "hrm";
			$data['page']        = "update_sal_setup_form";   
			echo Modules::run('template/layout', $data); 
		}

	}
// salary with tax calculation
	public function salarywithtax(){
		$this->permission->module('hrm','read')->redirect();
		$tamount =$this->input->post('amount');
		$tax = (!empty($this->input->post('tax',true))?$this->input->post('tax',true):0);
		$amount = $tamount+$tax;
       $this->db->select('*');
		$this->db->from('payroll_tax_setup');
		$this->db->where("start_amount <",$amount);
		$query = $this->db->get();
		$taxrate = $query->result_array();
		$TotalTax = 0;
	    foreach($taxrate as $row){
                    // "Inside tax calculation";
	    	    if($amount > $row['start_amount'] && $amount > $row['end_amount']){
                   $diff=$row['end_amount']-$row['start_amount'];
                    }
                     if($amount > $row['start_amount'] && $amount < $row['end_amount']){
                    $diff=$amount-$row['start_amount'];
                    }
                    $tax=(($row['rate']/100)*$diff);
                    $TotalTax += $tax;	
                } 
		$salary = $TotalTax;
		echo json_encode($salary);
	}

//employee Basic Salary get
	public function employeebasic(){
		$this->permission->module('hrm','read')->redirect();
		$id = $this->input->post('employee_no');
		$data = $this->db->select('rate,rate_type')->from('employee_history')->where('employee_no',$id)->get()->row();
		$basic = $data->rate;
		if($data->rate_type ==1){
			$type = 'Hourly';
		}else{
			$type = 'Salary';	
		}
		$sent = array(
			'rate' =>  $data->rate,
			'rate_type' =>$data->rate_type,
			'stype' => $type
		);
		echo json_encode($sent);
	}
	
}
