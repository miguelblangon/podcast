<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\PodcastController;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $podcastController;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct( PodcastController $podcast )
    {
        $this->middleware('auth');
        $this->podcastController = $podcast;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->rol=='admin') {
            return view('home')->with(['users'=> User::withTrashed()->get(), 
            'podcast_admin'=> $this->podcastController->admin_index(),
            'podcast_user'=> $this->podcastController->user_index()]);
        }else{
            return view('home')->with([ 'podcast_user'=> $this->podcastController->user_index()]);
        }
        
    }
    public function show(User $user)
    {
        return view('users.admin.admin_update_user')->with('user',$user);
    }
    public function update(Request $request )
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'last_name'=>'required|max:255',
            'password' => 'nullable|string|min:8|confirmed', 
        ]);
        if ($request->email!= auth()->user()->email ) {
            $this->validate($request, [
                'name' => 'required|max:255',
                'last_name'=>'required|max:255',
                'email' => 'email|max:255|unique:users',
                'password' => 'nullable|string|min:8|confirmed', 
            ]);
        }
        $user = User::findOrfail( auth()->user()->id );
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email=$request->email;
        $request->password!=null?  $user->password= bcrypt($request->password):null ;
        $user->save(); 
        return redirect('home')->with(['status'=>'Guardado Satisfactoriamente !','rol'=>'success' ]  );
    }


    
    public function updateAdmin(Request $request, User $user )
    {
       // dd($request);
       $this->validate($request, [
        'name' => 'required|max:255',
        'last_name'=>'required|max:255',
    ]);
    if ($request->email!= $user->email ) {
        $this->validate($request, [
            'name' => 'required|max:255',
            'last_name'=>'required|max:255',
            'email' => 'email|max:255|unique:users', 
        ]);
    }
    
    $user->name = $request->name;
    $user->last_name = $request->last_name;
    $user->email = $request->email;
    $user->rol = $request->rol;
    $user->save(); 
    return redirect('home')->with(['status'=>'Guardado Satisfactoriamente !','rol'=>'success' ]  );



    }

    public function delete(User $user )
    {
        if (auth()->user()->rol=='user') 
            return back();
        

        $user->deleted_at = now();
        $user->save();
        return redirect('home')->with(['status'=>'Borrado Satisfactoriamente !','rol'=>'success' ]  );

    }
    public function restore($id) 
    {
        if (auth()->user()->rol=='user') 
        return back();
        
        User::where('id', $id)->withTrashed()->restore();

        return redirect('home')->with(['status'=>'Activado Satisfactoriamente !','rol'=>'success' ]  );
    }

}
