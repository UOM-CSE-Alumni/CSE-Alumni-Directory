<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\User;
use Excel;
use App\Mail\UserCreated;
use Illuminate\Support\Facades\Mail;

class FileController extends Controller
{


	/**
     * Return View file
     *
     * @var array
     */
	public function importExportView()
	{
		return view('admin/files/importExport');
	}

	/**
     * File Export Code
     *
     * @var array
     */
	public function exportFile(Request $request, $type)
	{
		$data = Student::get()->toArray();

		if(count($data)){
			return Excel::create('studnets', function($excel) use ($data) {
				$excel->sheet('student_details', function($sheet) use ($data)
		        {
					$sheet->fromArray($data);
		        });
			})->download($type);
		}
		else{
			echo count($data);
			return back()->with('error','There is no Student details available!');
		}
	}

	/**
     * Import file into database Code
     *
     * @var array
     */
	public function importFile(Request $request)
	{
		$students = 0;
		$sheets = 0;
		$uninserted = [];
		$users = [];

		if($request->hasFile('import_file')){
			$path = $request->file('import_file')->getRealPath();
			//$data will always take sheets since 'force_sheets_collection' is set to true in excel.php
			$data = Excel::load($path, function($reader) {})->get();

			if(!empty($data) && $data->count()){
				//dd($data->count());
				foreach ($data->toArray() as $sheet) {
					$sheets = $sheets+1;
					if(!empty($sheet)){
						try{
							foreach ($sheet as $row) {	
								$students = $students +1 ;
								//not using array_push for increase efficiency since there can be lot of data	
								$insert[] = ['name'=> $row['name'],'email'=>$row['email'],'contact_no'=>$row['contact_no'],'contact_no_visibility'=>$row['contact_no_visibility'],
											'address'=>$row['address'],'address_visibility'=>$row['address_visibility'],'country'=>$row['country'],'city'=>$row['city']];
								$tempPassword = "csealumni" . time();
								$mails[] = ['name'=> $row['name'],'email'=>$row['email'], 'tempPassword'=>$tempPassword];
								$users[] = ['name'=> $row['name'],'email'=>$row['email'], 'password'=>bcrypt($tempPassword)];
								//dump($insert);
							}
						}
						catch(\ErrorException $ex){
							// error message will be truncated to just show only the important part 
							$errorMsg = "An error occured while reading the file. Check the document's fromat. \n 			Error:" .strtok($ex->getMessage(), '(');
							//dd($ex->getMessage());
							return back()->with('error',$errorMsg);
						}
					}

					else{
						$uninserted[] = $sheets;
					}
				}

				
				if(!empty($insert)){
					try{
						Student::insert($insert);
						User::insert($users);
						foreach($mails as $mail){
							Mail::to($mail['email'])->queue(new UserCreated($mail['tempPassword']));
						}
						if(!count($uninserted)){					
							return back()->with('success', $students.'  Student Accounts Created Successfully from '.$sheets. ' sheet(s) in the documnet.');
						}
						else{
							$counted = $sheets - count($uninserted); 
							$skipped = implode(", ",$uninserted);
							return back()->with('success', $students.'  Student Accounts Created Successfully from '. $counted. ' sheet(s). '
								.$skipped. ' Sheet(s) were skipped. Check the Title row or Details in the sheets.');
						}
					}
					catch(\Illuminate\Database\QueryException $ex){
						// error message will be truncated to just show only the important part 
						$errorMsg = "Database Error Occured. Check the uploaded document's data. \n" . strtok($ex->getMessage(), '(');
						//dd($errorMsg);
						return back()->with('error',$errorMsg);
					}
				}

				else{
					return back()->with('error','No data found!');
				}
			}
		}

		return back()->with('error','Please Check your file, Something is wrong there.');
	}

}
