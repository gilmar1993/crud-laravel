<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditUserRequest;

use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$users = User::name($request->get('name'))->type($request->get('type'))->paginate();

		return view('admin.users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateUserRequest $request)
	{
		$user = User::create($request->all());

		return redirect()->route('admin.users.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::findOrFail($id);

		return view('admin.users.edit', compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(EditUserRequest $request,$id)
	{
		$user = User::findOrFail($id);

		$user->fill($request->all());
		$user->save();

		return redirect()->route('admin.users.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->user->delete();

		$message = $user->name.' Usuario Eliminado';

		if ($request->ajax())
		{
			return response()->json([
					'id'	=> $this->user->id,
					'message' => $message
				]);
		}
		
		Session::flash('message', $message);

		return redirect()->route('admin.users.index');
	}

}
