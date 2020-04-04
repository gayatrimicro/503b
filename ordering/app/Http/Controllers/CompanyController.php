<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Category;
use App\CompanyProduct;
use App\Location;
use PDF;
use Auth;
use Mail;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Validator;
use Session;
use Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class CompanyController extends Controller
{
	public function index()
	{
		$cat = Category::with('products')->orderby('sequence', 'ASC')->get();
		return view('company.dashboard', compact('products', 'cat'));
	}

	public function my_catalog()
	{
		$cat = Category::with('company_products')->orderby('sequence', 'ASC')->get();
		$location = Location::where('user_id', Auth::user()->id)->get();
		return view('company.my_catalog', compact('products', 'cat', 'location'));
	}

	public function do_order()
	{
		$post = request()->all();
		
		$list_ar = array();
		$list_ar1 = array();
		$total_price = 0;
		if(isset($post['location']))
		{
			$location = Location::where('id', $post['location'])->first();
			$data['location'] = $location['address1']." ".$location['city'];
			$data['address1'] = $location['address1'];
			$data['address2'] = $location['address2'];
			$data['state'] = $location['state'];
			$data['city'] = $location['city'];
			$data['zip'] = $location['zip'];
			if($location['billing_same_as_shipping']==1)
			{
				$data['billing_address1'] = $location['address1'];
				$data['billing_address2'] = $location['address2'];
				$data['billing_state'] = $location['state'];
				$data['billing_city'] = $location['city'];
				$data['billing_zip'] = $location['zip'];
			}
			else{
				$data['billing_address1'] = $location['billing_address1'];
				$data['billing_address2'] = $location['billing_address2'];
				$data['billing_state'] = $location['billing_state'];
				$data['billing_city'] = $location['billing_city'];
				$data['billing_zip'] = $location['billing_zip'];
			}
		}
		else{
			$data['location'] = "";
			$data['address1'] = "";
			$data['address2'] = "";
			$data['state'] = "";
			$data['city'] = "";
			$data['zip'] = "";
			
			$data['billing_address1'] = "";
			$data['billing_address2'] = "";
			$data['billing_state'] = "";
			$data['billing_city'] = "";
			$data['billing_zip'] = "";
		}
		foreach($post['cb'] as $row)
		{
			$total_price += ($post['qty' . $row] * $post['price' . $row]);
			
			array_push($list_ar, "<tr>
				<td>". $post['drugname' . $row]."</td>
				<td>". $post['strength' . $row] ."</td>
				<td>". $post['pellet-size' . $row] ."</td>
				<td>". $post['qty' . $row] ."</td>
				<td>$ ". $post['price' . $row] ."</td>
			</tr>");
			array_push($list_ar1, "<tr>
				<td class='tthead'><strong>Drug Name : </strong></td>
				<td >". $post['drugname' . $row]."</td></tr>
				<tr><td class='tthead'><strong>Strength : </strong></td>
				<td >". $post['strength' . $row] ."</td></tr>
				<tr><td class='tthead'><strong>Qty / Size : </strong></td>
				<td >". $post['pellet-size' . $row] ."</td></tr>
				<tr><td class='tthead'><strong>Price per unit : </strong></td>
				<td >$ ". $post['price' . $row] ."</td></tr>
				<tr><td class='tthead'><strong>Quantity : </strong></td>
				<td  class='text-center'>". $post['qty' . $row] ."</td></tr>
				</tr><tr ><td colspan='2' style='margin-bottom:20px;border-width:100px;border-bottom:1px solid black;'></td></tr><br> ");
		}
		array_push($list_ar, "<tr>
				<td colspan='4' style='text-align: right;'><strong>Total Price : </strong></td>
				<td>$ ". $total_price ."</td>
			</tr>");
		array_push($list_ar1, "<tr>
			<td class='tthead'><strong>Total Price : </strong></td>
			<td >$ ". $total_price ."</td></tr>
			 ");
		$list = implode(' ', $list_ar);		
		$list1 = implode(' ', $list_ar1);
		$pdf_name = Auth::user()->id.'-'.date('YmdHis').'.pdf';
		$path = public_path('order_pdfs/'.$pdf_name);

		$data['data'] = $list;
		$data['data1'] = $list1;
		$data['email'] = Auth::user()->email;
		$data['company_name'] = Auth::user()->company_name;
		$data['pdf_name'] = Auth::user()->id.'-'.date('YmdHis').'.pdf';

		view()->share('row', $data);
		PDF::loadView('pdf.order_sample')->save($path);
		
		Mail::send('emails.order', $data, function($message) use ($data)
		{
			$message->from($data['email'], "503b");
			$message->subject("503b facility Order request");
			$message->to("503b@aspcares.com");
			$message->to("connect.leo@gmail.com");
			$message->to("rsagi@aspcares.com");
			//$message->to("laravel@gmicro.us");
			$message->attach(public_path('order_pdfs/'.$data['pdf_name']), [
						'as' => 'Order-Form.pdf',
						'mime' => 'application/pdf'
					]);
			//$message->to('kalpesh@ibridgedigital.com');
		});
		Mail::send('emails.order', $data, function($message) use ($data)
		{
			$message->from($data['email'], "503b");
			$message->subject("503b facility your order");
			//$message->to("laravel@gmicro.us");
			$message->attach(public_path('order_pdfs/'.$data['pdf_name']), [
						'as' => 'Order-Form.pdf',
						'mime' => 'application/pdf'
					]);
			$message->to($data['email']);
			// $message->to('kalpesh@ibridgedigital.com');
		});
		return Response::json(['status' => true]);
	}

	public function do_order_for_general_products()
	{
		$post = request()->all();
		
		$list_ar = array();
		
		foreach($post['cb'] as $row)
		{
			array_push($list_ar, "<tr>
				<td class='tthead'><strong>Drug Name : </strong></td>
				<td >". $post['drugname' . $row]."</td></tr>
				<tr><td class='tthead'><strong>Strength : </strong></td>
				<td >". $post['strength' . $row] ."</td></tr>
				<tr><td class='tthead'><strong>Qty / Size : </strong></td>
				<td >". $post['pellet-size' . $row] ."</td></tr>				
				<tr><td class='tthead'><strong>Quantity : </strong></td>
				<td  class='text-center'>". $post['qty' . $row] ."</td></tr>
				</tr><tr ><td colspan='2' style='margin-bottom:20px;border-width:100px;border-bottom:1px solid black;'></td></tr><br> ");
		}
		$list = implode(' ', $list_ar);
		
		$data['data1'] = $list;		
		$data['email'] = Auth::user()->email;
		$data['company_name'] = Auth::user()->company_name;
		
		Mail::send('emails.order_for_general_products', $data, function($message) use ($data)
		{
			$message->from($data['email'], "503b");
			$message->subject("503b facility Order request");
			$message->to("503b@aspcares.com");
			$message->to("connect.leo@gmail.com");
			$message->to("rsagi@aspcares.com");
			//$message->to("laravel@gmicro.us");			
			//$message->to('kalpesh@ibridgedigital.com');
		});
		Mail::send('emails.order_for_general_products', $data, function($message) use ($data)
		{
			$message->from($data['email'], "503b");
			$message->subject("503b facility your order");
			// $message->to("laravel@gmicro.us");
			$message->to($data['email']);
			// $message->to('kalpesh@ibridgedigital.com');
		});
		return Response::json(['status' => true]);
	}

	public function location()
	{
		$data = Location::where('user_id', Auth::user()->id)->get();
		return view('company.location', compact('data'));
	}

	public function add_location(Request $request)
	{
		$post = $request->all();
		$chk_box = isset($post['billing_addess_same_as_shipping']) ? 1 : 0;
		if($chk_box == 0)
		{
			$billing_address1 = $post['billing_address1'];
			$billing_address2 = $post['billing_address2'];
			$billing_state = $post['billing_state'];
			$billing_city = $post['billing_city'];
			$billing_zip = $post['billing_zip'];
		}
		else{
			$billing_address1 = NULL;
			$billing_address2 = NULL;
			$billing_state = NULL;
			$billing_city = NULL;
			$billing_zip = NULL;
		}
		$res = Location::firstOrCreate([
				'user_id' => Auth::user()->id,
				'address1' => $post['address1'],
				'address2' => $post['address2'],
				'city' => $post['city'],
				'state' => $post['state'],
				'zip' => $post['zip'],
				
				'billing_same_as_shipping' => $chk_box,
				'billing_address1' => $billing_address1,
				'billing_address2' => $billing_address2,
				'billing_city' => $billing_city,
				'billing_state' => $billing_state,
				'billing_zip' => $billing_zip,
			
				'created_by' => Auth::user()->id
			]);
		if($res!=null)
		{
			Session::flash('success', 'New Location added successfully');
			return redirect('/location');
		}
		else{
			Session::flash('error', 'Something went wrong');
			return redirect()->back();
		}
	}

	public function update_location(Request $request)
	{
		$post = $request->all();
		
		$chk_box = isset($post['billing_addess_same_as_shipping']) ? 1 : 0;
		if($chk_box == 0)
		{
			$billing_address1 = $post['billing_address1'];
			$billing_address2 = $post['billing_address2'];
			$billing_state = $post['billing_state'];
			$billing_city = $post['billing_city'];
			$billing_zip = $post['billing_zip'];
		}
		else{
			$billing_address1 = NULL;
			$billing_address2 = NULL;
			$billing_state = NULL;
			$billing_city = NULL;
			$billing_zip = NULL;
		}

		$res = Location::find($post['id']);
		$res->address1 = $post['address1'];
		$res->address2 = $post['address2'];
		$res->city = $post['city'];
		$res->state = $post['state'];
		$res->zip = $post['zip'];
		$res->billing_same_as_shipping = $chk_box;
		$res->billing_address1 = $billing_address1;
		$res->billing_address2 = $billing_address2;
		$res->billing_city = $billing_city;
		$res->billing_state = $billing_state;
		$res->billing_zip = $billing_zip;
		$res->updated_by = Auth::user()->id;
		$res->updated_at = Carbon::now();

		if($res->save())
		{
			Session::flash('success', 'Location updated successfully');
			return redirect('/location');
		}
		else{
			Session::flash('error', 'Something went wrong');
			return redirect()->back();
		}
	}

	public function delete_location($id)
	{
		$res = Location::find($id);
		$res->deleted_by = Auth::user()->id;
		$res->save();
		if($res->delete())
		{
			Session::flash('success', 'Location deleted successfully');
			return redirect('/location');
		}
		else{
			Session::flash('error', 'Something went wrong');
			return redirect()->back();
		}
	}

	public function company_my_product()
	{
		return redirect()->back();
			// if($id != null)
			// {
			$products = CompanyProduct::with('category')->where('company_id', Auth::user()->id)
					->orderby('id', 'DESC')->get();
			//$company_name = User::where('id', $id)->first();
			// if(count($products) > 0)
			// {
				$cat = Category::all();
				return view('company.products', compact('products', 'cat'));
			// }
			// else{
			// 	return redirect('/company');
			// }
		// }
		// else{
		// 	return redirect('/company-dashboard');
		// }
	}

	public function add_company_my_product(Request $request)
	{
		return redirect()->back();
		$post = $request->all();
		$strength = (isset($post['strength'])) ? $post['strength'] : null;
		$pellet_size = (isset($post['pellet_size'])) ? $post['pellet_size'] : null;

		$seq_num = CompanyProduct::where('company_id', Auth::user()->id)->max('sequence');

		$res = CompanyProduct::firstOrCreate([
				'company_id'	=> Auth::user()->id,
				'category_id'	=> $post['category_id'],
				'sequence'		=> $seq_num + 1,
				'product_name'	=> $post['product_name'],
				'strength'		=> $strength,
				'pellet_size'	=> $pellet_size,
				'created_by'	=> Auth::user()->id
			]);
		if($res!=null)
		{
			Session::flash('company_product_success', 'New product added successfully');
			return redirect('/company/product');
		}
		else{
			Session::flash('company_product_error', 'Something went wrong');
			return redirect()->back();
		}
	}

	public function update_company_my_product(Request $request)
	{
		return redirect()->back();
		$post = $request->all();
		$strength = (isset($post['strength'])) ? $post['strength'] : null;
		$pellet_size = (isset($post['pellet_size'])) ? $post['pellet_size'] : null;

		$res = CompanyProduct::find($post['id']);
		$res->category_id = $post['category_id'];
		$res->product_name = $post['product_name'];
		$res->strength = $strength;
		$res->pellet_size = $pellet_size;
		$res->updated_by = Auth::user()->id;
		$res->updated_at = Carbon::now();

		if($res->save())
		{
			Session::flash('company_product_success', 'Product updated successfully');
			return redirect('/company/product');
		}
		else{
			Session::flash('company_product_error', 'Something went wrong');
			return redirect()->back();
		}
	}

	public function delete_company_my_product($id)
	{
		return redirect()->back();
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

	public function bulk_upload_for_my_company_products(Request $request)
	{
		return redirect()->back();
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
			$column=fgetcsv($fileD);

			$seq_num = CompanyProduct::where('company_id', Auth::user()->id)->max('sequence');

			while(!feof($fileD)){
				$rowData[]=fgetcsv($fileD);
			}
			if(count($column)==4){
				foreach ($rowData as $key => $value) {
					$seq_num++;
					if($value != false)
					{
						if(($value[0] != null)&&($value[0] != "")&&($value[0] != " ") && 
							($value[1] != null)&&($value[1] != "")&&($value[1] != " "))
						{
							$check_dup = CompanyProduct::where('company_id', Auth::user()->id)
									->where('category_id', $value[0])
									->where('product_name', $value[1])
									->where('strength', $value[2])
									->where('pellet_size', $value[3])
									->count();

							$inserted_data=array('company_id'	=> Auth::user()->id,
										'category_id'	=> $value[0],
										'sequence'		=> $seq_num,
										'product_name'	=> $value[1],
										'strength'		=> $value[2],
										'pellet_size'	=> $value[3],
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
