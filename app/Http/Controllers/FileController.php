<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Excel;

class FileController extends Controller
{


	/**
     * Return View file
     *
     * @var array
     */
	public function importExport()
	{
		return view('admin/files/importExport');
	}

	/**
     * File Export Code
     *
     * @var array
     */
	public function downloadExcel(Request $request, $type)
	{
		$data = Student::get()->toArray();
		return Excel::create('studnets', function($excel) use ($data) {
			$excel->sheet('student_details', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download($type);
	}

	/**
     * Import file into database Code
     *
     * @var array
     */
	public function importExcel(Request $request)
	{

		if($request->hasFile('import_file')){
			$path = $request->file('import_file')->getRealPath();

			$data = Excel::load($path, function($reader) {})->get();

			if(!empty($data) && $data->count()){

				foreach ($data->toArray() as $key => $value) {
					if(!empty($value)){
						foreach ($value as $col) {		
							$insert[] = ['name'=>$col['name'],'email'=>$col['email'],'contact_no'=>$col['contact_no'],'contact_no_visibility'=>$col['contact_no_visibility'],
										'address'=>$col['address'],'address_visibility'=>$col['address_visibility'],
										'country'=>$col['country'],'city'=>$col['city']];
						}
					}
				}

				
				if(!empty($insert)){
					Student::insert($insert);
					return back()->with('success','Insert Record successfully.');
				}

			}

		}

		return back()->with('error','Please Check your file, Something is wrong there.');
	}

}
