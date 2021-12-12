<?php


namespace App\Http\Controllers;
use App\Kof_chilar;
use App\User;



use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userEmployee = Auth::user()->id;
        $konf = Kof_chilar::latest()->where('user_id', $userEmployee)->get();



        return view('home', compact('konf'));
    }

    public function create()
    {

        return view('admin.konfrensiya.create');
    }


    public function store(Request $request)
    {

        $image = $request->file('file_pdf');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(storage_path('app/public'), $new_name);

        // $zip = $request->file('file_zip');
        // $new_name2 = rand() . '.' . $zip->getClientOriginalExtension();
        // $zip->move(storage_path('app/public'), $new_name2);

        Kof_chilar::create([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'middle_name' => request('middle_name'),
            'title' => request('title'),
            'email' => request('email'),
            'work_phone' => request('work_phone'),
            'gender' => request('gender'),
            'country' => request('country'),
            'city' => request('city'),
            'organization' => request('organization'),
            'position' => request('position'),
            'academic_degree' => request('academic_degree'),
            'desired_status' => request('desired_status'),
            'accompanying_person' => request('accompanying_person'),
            'comments' => request('comments'),
            'hato_bormi' => request('hato_bormi'),
            'hatolarni_infosi' => request('hatolarni_infosi'),
            'user_id' => Auth::user()->id,
            'file_pdf' => $new_name,
            /*'file_zip' => $new_name2,*/
        ]);



        return redirect()->route('admin.home.index');
    }

    public function show($id){

        $konf = Kof_chilar::find($id);
        return view('show', compact('konf'));
    }

    public function edit($id)
    {

        $konf = Kof_chilar::where('id',  '=', $id)->first();

        return view('edit', compact('konf'));
    }

    public function update(Request $request, $id)
    {
        $blog = Kof_chilar::where('id', '=', $id)->first();

        $blog->update($request->all());
        return redirect()->route('admin.home.index');
    }
}
