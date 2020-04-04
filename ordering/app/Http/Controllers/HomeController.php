<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\User;
use App\CompanyProduct;

use Illuminate\Support\Facades\Hash;
use Auth;
use Mail;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Validator;
use Session;
use Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$cat = Category::with('products')->orderby('sequence', 'ASC')->get();
		return view('home', compact('products', 'cat'));
	}

	public function products()
	{
		$products = Product::with('category')->get();
		$cat = Category::all();
		return view('products', compact('products', 'cat'));
	}

	public function add_product(Request $request)
	{
		$post = $request->all();
		$strength = (isset($post['strength'])) ? $post['strength'] : null;
		$pellet_size = (isset($post['pellet_size'])) ? $post['pellet_size'] : null;

		$seq_num = Product::max('sequence');

		$res = Product::firstOrCreate([
				'category_id' => $post['category_id'],
				'sequence' => $seq_num + 1,
				'product_name' => $post['product_name'],
				'strength' => $strength,
				'pellet_size' => $pellet_size,
				'created_by' => Auth::user()->id
			]);
		if($res!=null)
		{
			Session::flash('product_success', 'New product added successfully');
			return redirect('/products');
		}
		else{
			Session::flash('product_error', 'Something went wrong');
			return redirect()->back();
		}
	}

	public function update_product(Request $request)
	{
		$post = $request->all();
		$strength = (isset($post['strength'])) ? $post['strength'] : null;
		$pellet_size = (isset($post['pellet_size'])) ? $post['pellet_size'] : null;

		$res = Product::find($post['id']);
		$res->category_id = $post['category_id'];
		$res->product_name = $post['product_name'];
		$res->strength = $strength;
		$res->pellet_size = $pellet_size;
		$res->updated_by = Auth::user()->id;
		$res->updated_at = Carbon::now();

		if($res->save())
		{
			Session::flash('product_success', 'Product updated successfully');
			return redirect('/products');
		}
		else{
			Session::flash('product_error', 'Something went wrong');
			return redirect()->back();
		}
	}

	public function delete_product($id)
	{
		$res = Product::find($id);
		$res->deleted_by = Auth::user()->id;
		$res->save();
		if($res->delete())
		{
			Session::flash('product_success', 'Product deleted successfully');
			return redirect('/products');
		}
		else{
			Session::flash('product_error', 'Something went wrong');
			return redirect()->back();
		}
	}

	public function product_arrange_in_sequence($sequence)
	{
		$seq_ar = explode(',', $sequence);
		$i = 1;
		foreach ($seq_ar as $value) {
			$data = Product::find($value);
			$data->sequence = $i;
			$data->save();
			$i++;
		}
		return Response::json(['status' => true]);
	}

	public function category()
	{
		$data = Category::orderby('sequence', 'ASC')->get();
		return view('category', compact('data'));
	}

	public function add_category(Request $request)
	{
		$post = $request->all();

		$seq_num = Category::max('sequence');

		$res = Category::firstOrCreate([
				'category' => $post['category'],
				'sequence' => $seq_num + 1,
				'created_by' => Auth::user()->id
			]);
		if($res!=null)
		{
			Session::flash('category_success', 'New category added successfully');
			return redirect('/category');
		}
		else{
			Session::flash('category_error', 'Something went wrong');
			return redirect()->back();
		}
	}

	public function update_category(Request $request)
	{
		$post = $request->all();

		$res = Category::find($post['id']);
		$res->category = $post['category'];
		$res->updated_by = Auth::user()->id;
		$res->updated_at = Carbon::now();

		if($res->save())
		{
			Session::flash('category_success', 'Category updated successfully');
			return redirect('/category');
		}
		else{
			Session::flash('category_error', 'Something went wrong');
			return redirect()->back();
		}
	}

	public function delete_category($id)
	{
		$res = Category::find($id);
		$res->deleted_by = Auth::user()->id;
		$res->save();
		if($res->delete())
		{
			Session::flash('category_success', 'Category deleted successfully');
			return redirect('/category');
		}
		else{
			Session::flash('category_error', 'Something went wrong');
			return redirect()->back();
		}
	}

	public function company()
	{
		$data = User::where('user_type', 'company')->get();
		return view('company', compact('data'));
	}

	public function add_company(Request $request)
	{
		$post = $request->all();
		$validator = Validator::make($request->all(), [
			'name' => ['required', 'string', 'max:255'],
			'company_name' => ['required', 'string', 'max:200'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
		]);
		if($validator->fails())
		{
			Session::flash('company_error', 'Error in insertion');
			return redirect()->back()->withInput()->withErrors($validator);
		}
		else
		{
			$res = User::firstOrCreate([
					'user_type'		=> "company",
					'name'			=> $post['name'],
					'company_name'	=> $post['company_name'],
					'email'			=> $post['email'],
					'password'		=> Hash::make($post['password'])
				]);
			$data['name'] = $post['name'];
			$data['company_name'] = $post['company_name'];
			$data['email'] = $post['email'];
			$data['password'] = $post['password'];
			if($res!=null)
			{
				Mail::send('emails.company_registration_mail', $data, function($message) use ($data)
				{
					$message->from('askapic@aspcares.com', "503b");
					$message->subject("Company Registration");
					$message->to($data['email']);
				});
				Session::flash('company_success', 'New company record added successfully');
				return redirect('/company');
			}
			else{
				Session::flash('company_error', 'Something went wrong');
				return redirect()->back();
			}
		}
	}

	public function update_company(Request $request)
	{
		$post = $request->all();
		$validator = Validator::make($request->all(), [
			'name' => ['required', 'string', 'max:255'],
			'company_name' => ['required', 'string', 'max:200'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,'.$post['id']],
		]);
		if($validator->fails())
		{
			Session::flash('company_error', 'Error in insertion');
			return redirect()->back()->withInput()->withErrors($validator);
		}
		else
		{
			$res = User::find($post['id']);
			$res->name			= $post['name'];
			$res->company_name	= $post['company_name'];
			$res->email			= $post['email'];			
			
			if($res->save())
			{
				Session::flash('company_success', 'Company record updated successfully');
				return redirect('/company');
			}
			else{
				Session::flash('company_error', 'Something went wrong');
				return redirect()->back();
			}
		}
	}

	public function delete_company($id)
	{
		$res = User::find($id);
		$res->deleted_by = Auth::user()->id;
		$res->save();
		if($res->delete())
		{
			Session::flash('company_success', 'Company record deleted successfully');
			return redirect('/company');
		}
		else{
			Session::flash('company_error', 'Something went wrong');
			return redirect()->back();
		}
	}

	public function bulk_upload_form()
	{
		return view('bulk_upload');
	}

	public function bulk_upload(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'import_file' => 'required'
		]);
		if($validator->fails())
		{
			return redirect()->back()->withInput()->withErrors($validator);
		}
		else
		{
			$not_done = 0;
			$done = 0;
			$row = 0;
			$left_rows = array();
			$path = Input::file('import_file');

			$fileD = fopen($path, "r");
			$column = fgetcsv($fileD);

			while(!feof($fileD))
			{
				$rowData[] = fgetcsv($fileD);
			}
			
			foreach ($rowData as $key => $value) 
			{
				if(($value[0] != null)&&($value[0] != "")&&($value[0] != " ") && 
					($value[1] != null)&&($value[1] != "")&&($value[1] != " "))
				{
					$category_id = trim($value[0]);
					$product_name = trim($value[1]);
					$strength = trim($value[2]);
					$pellet_size = trim($value[3]);

					$res = Product::firstOrCreate([
							'category_id'	=> $category_id,
							'product_name'	=> $product_name,
							'strength'		=> $strength,
							'pellet_size'	=> $pellet_size,
							'created_by'	=> Auth::user()->id
						]);
					$done++;
				}
				else{
					array_push($left_rows, $row+1);
					$not_done++;
				}
				$row++;
			}

			if($done>0)
			{				
				Session::flash('bulk_upload_success', $done. ' rows imported successfully.');
				return redirect('bulk-import');
			
			}
			else
			{
				Session::flash('bulk_upload_error', implode(',' ,$left_rows). ' rows are not imported.');
				return redirect('bulk-import');
			}
			
		}
	}

	public function company_products($id)
	{
		if($id != null)
		{
			$products = CompanyProduct::with('category')->where('company_id', $id)
					->orderby('sequence', 'ASC')->get();
			$company_name = User::where('id', $id)->first();
			// if(count($products) > 0)
			// {
				$cat = Category::all();
				return view('company_products', compact('products', 'cat', 'id', 'company_name'));
			// }
			// else{
			// 	return redirect('/company');
			// }
		}
		else{
			return redirect('/company');
		}
	}

	public function add_company_product(Request $request)
	{
		$post = $request->all();
		$strength = (isset($post['strength'])) ? $post['strength'] : null;
		$pellet_size = (isset($post['pellet_size'])) ? $post['pellet_size'] : null;

		$seq_num = CompanyProduct::where('company_id', $post['company_id'])->max('sequence');

		$res = CompanyProduct::firstOrCreate([
				'company_id'	=> $post['company_id'],
				'category_id'	=> $post['category_id'],
				'sequence'		=> $seq_num + 1,
				'product_name'	=> $post['product_name'],
				'strength'		=> $strength,
				'pellet_size'	=> $pellet_size,
				'price'			=> $post['price'],
				'created_by'	=> Auth::user()->id
			]);
		if($res!=null)
		{
			Session::flash('company_product_success', 'New product added successfully');
			return redirect('/company-products/'.$post['company_id']);
		}
		else{
			Session::flash('company_product_error', 'Something went wrong');
			return redirect()->back();
		}
	}

	public function update_company_product(Request $request)
	{
		$post = $request->all();
		$strength = (isset($post['strength'])) ? $post['strength'] : null;
		$pellet_size = (isset($post['pellet_size'])) ? $post['pellet_size'] : null;

		$res = CompanyProduct::find($post['id']);
		$res->category_id = $post['category_id'];
		$res->product_name = $post['product_name'];
		$res->strength = $strength;
		$res->pellet_size = $pellet_size;
		$res->price = $post['price'];
		$res->updated_by = Auth::user()->id;
		$res->updated_at = Carbon::now();

		if($res->save())
		{
			Session::flash('company_product_success', 'Product updated successfully');
			return redirect('/company-products/'.$post['company_id']);
		}
		else{
			Session::flash('company_product_error', 'Something went wrong');
			return redirect()->back();
		}
	}

	public function delete_company_product($id)
	{
		$res = CompanyProduct::find($id);
		$res->deleted_by = Auth::user()->id;
		$res->save();
		if($res->delete())
		{
			Session::flash('company_product_success', 'Product deleted successfully');
			return redirect()->back();
		}
		else{
			Session::flash('company_product_error', 'Something went wrong');
			return redirect()->back();
		}
	}

	public function company_product_arrange_in_sequence($sequence, $comp_id)
	{
		$seq_ar = explode(',', $sequence);
		$i = 1;
		foreach ($seq_ar as $value) {
			$data = CompanyProduct::where('id', $value)->where('company_id', $comp_id)->first();
			$data->sequence = $i;
			$data->save();
			$i++;
		}
		return Response::json(['status' => true]);
	}

	public function arrange_in_sequence($sequence)
	{
		$seq_ar = explode(',', $sequence);
		$i = 1;
		foreach ($seq_ar as $value) {
			$data = Category::find($value);
			$data->sequence = $i;
			$data->save();
			$i++;
		}
		return Response::json(['status' => true]);
	}

	public function update_initial_product_sequence()
	{
		// $data = Product::get();

		// foreach($data as $row)
		// {
		// 	$update_product = Product::find($row['id']);
		// 	$update_product->sequence = $row['id'];
		// 	$update_product->save();
		// }
		return true;
	}

	public function company_change_password(Request $request)
	{
		$post = $request->all();
		$validator = Validator::make($request->all(), [
			'password' => ['required', 'string', 'min:8'],
		]);
		if($validator->fails())
		{
			Session::flash('company_error', 'Something went wrong');
			return redirect()->back()->withInput()->withErrors($validator);
		}
		else
		{			
			$data['name'] = $post['name'];
			$data['company_name'] = $post['company_name'];
			$data['email'] = $post['email'];
			$data['password'] = $post['password'];

			$res = User::find($post['id']);
			$res->password = Hash::make($post['password']);
			if($res->save())
			{
				Mail::send('emails.company_password_change_mail', $data, function($message) use ($data)
				{
					$message->from('askapic@aspcares.com', "503b");
					$message->subject("Your password has been changed");
					$message->to($data['email']);
				});
				Session::flash('company_success', 'Password has been sent successfully');
				return redirect('/company');
			}
			else{
				Session::flash('company_error', 'Something went wrong');
				return redirect()->back();
			}
		}
	}

	public function bulk_upload_for_my_company_products(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'import_file' => 'required'
		]);
		if($validator->fails())
		{
			return redirect()->back()->withInput()->withErrors($validator);
		}
		else{
			$not_done = 0;
			$done = 0;
			$row = 1;
			$left_rows = array();
			$path = Input::file('import_file');

			$fileD = fopen($path,"r");
			$column = fgetcsv($fileD);
			$post = $request->all();

			$seq_num = CompanyProduct::where('company_id', $post['company_id'])->max('sequence');
			
			while(!feof($fileD)){
				$rowData[]=fgetcsv($fileD);
			}
			if(count($column)==5){
				foreach ($rowData as $key => $value) {
					$seq_num++;
					if($value != false)
					{
						if(($value[0] != null)&&($value[0] != "")&&($value[0] != " ") && 
							($value[1] != null)&&($value[1] != "")&&($value[1] != " "))
						{
							$check_dup = CompanyProduct::where('company_id', $post['company_id'])
									->where('category_id', $value[0])
									->where('product_name', $value[1])
									->where('strength', $value[2])
									->where('pellet_size', $value[3])
									->count();

							$inserted_data=array('company_id'	=> $post['company_id'],
										'category_id'	=> $value[0],
										'sequence'		=> $seq_num,
										'product_name'	=> $value[1],
										'strength'		=> $value[2],
										'pellet_size'	=> $value[3],
										'price'			=> $value[4],
										'created_by'	=> Auth::user()->id
									);
							if($check_dup == 0)
							{
								if(CompanyProduct::create($inserted_data)){
									$done++;
								}
								else{
									array_push($left_rows, $row+1);
									$not_done++;
								}
							}
						}
						else{
							array_push($left_rows, $row+1);
							$not_done++;
						}
						$row++;
					}
				}
			}
			else{
				Session::flash('files_not_done', "CSV file format not correct");
			}
			if($done>0)
			{
				Session::flash('files_done', $done);
				if(count($left_rows)>0)
				{
					Session::flash('files_not_done', implode(',' ,$left_rows). ' no. of rows are not imported.');
				}
			}
			
			return redirect()->back();
		}
	}
}
