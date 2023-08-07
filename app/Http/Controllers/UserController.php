<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Article;
use App\Models\User;
use App\Models\Client;  
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id=Auth::user()->id;
        $artDis=Article::where('user_id',$id)->get();
        $artAlert=Article::where('user_id',$id)->
                         where('quantite','<',10)->get();
        $artEpuise=Article::where('user_id',$id)->
                         where('quantite','=',0)->get();
        $nba=Article::count();
        $nbc=Client::count();
        return view('main.home',['artD'=>$artDis,'artA'=>$artAlert,'artE'=>$artEpuise,'nba'=>$nba,'nbc'=>$nbc]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     // $user=Auth::user();
    //     if ($id == Auth::id()) {
    //         $user=Auth::user();
    //         // dd(Auth::user());  
    //         return view('auth.editUser',['user'=>$user,'id'=>$id]);
    //     }else{
    //         return back();
    //     }
    // }
    public function edit(string $id)
{
    if ($id == Auth::id()) {
        $user = Auth::user();
        return view('auth.editUser', ['user' => $user, 'id' => $id]);
    } else {
        return back();
    }
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // dd($request->id);
        $id=$request->id;
        // some errors to handle here !!!!!!!!!!!!!!!!!!!error
        // dump($request->post());
        $Uid=Auth::id();
        $user=DB::table('users')->where('id',$id);
        dd($user);
        // dd($request->post());
        if ($id == $Uid) {    
            if ($request->hasFile('img')) {
                $img = time() . '-' . $request->file('img')->getClientOriginalName();
                $request['img'] = $img;
                $request->file('img')->move(\public_path('profiles'), $img);
            }
            
            // $user->fill($request->post())->save();

            return view('auth.editUser')->with('success','modified successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function inscription(UserRequest $request)
    {
        $user = $request->validated();
        $user['name'] = $request->email;
        User::create($user);
        // dd($user);
        return to_route('connexion')->with('success', 'Compte créé avec succès');
    }

    public function login(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $credencials = ['email' => $request->email, 'password' => $request->password];
        if (Auth::attempt($credencials)) {
            $request->session()->regenerate();
            if(Auth::user()->status==='test'){
                return to_route('payement');
            }else{
                return to_route('home');
            };
        } else {
            return back()->withErrors(['email' => 'Email ou mot de passe incorrect']);
        };
        // $user = User::where('email', $request->email)->where('password', $request->password)->first();
        // if ($user) {
        //     // $request->session()->regenerate();
        //     Auth::login($user);
        //     // dd(Auth::user());
        //     if(Auth::user()->status==='test'){
        //             return to_route('payement');
        //         }else{
        //             return to_route('home');
        //         };
        //     } else {
        //         return back()->withErrors(['email' => 'Email ou mot de passe incorrect']);
        //     };
    }

    public function logout()
    {
        session()->flush();
        Auth::logout();
        return to_route('connexion')->with('success', 'déconnexion avec succès');
    }

    public function forgetPwd()
    {
        return view('auth.password.forget_pwd');
    }
    public function forgetPwdPost(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users']);
        $email = $request->email;

        $res = DB::table('password_reset_tokens')->where(['email' => $email])->first();
        if ($res) {
            return redirect()->to(route('forgetPwd'))->with('info', 'Nous avons déjà envoyé un e-mail pour réinitialiser votre mot de passe');
            // dd($res);
        }

        $token = Str::random(64);
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        Mail::send('emails.forget-pwd', ['token' => $token, 'email' => $email], function ($message) use ($request) {
            // Mail::send('emails.forget-pwd',['token'=>$token],function($message) use ($request){

            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return redirect()->to(route('forgetPwd'))->with('success', 'Nous avons envoyé un e-mail pour réinitialiser votre mot de passe');
    }

    public function resetPwd($token, $email)
    {
        return view('auth.password.reset_pwd', compact('token', 'email'));
    }

    public function resetPwdPost(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);
        $updatePwd = DB::table('password_reset_tokens')->where([
            'email' => $request->email,
            'token' => $request->token
        ])->first();
        if (!$updatePwd) {
            return to_route('forgetPwd')->with('info', 'Ce lien a expiré, demandez à nouveau de réinitialiser le mot de passe');
        }
        User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);
        DB::table('password_reset_tokens')->where(['token' => $request->token])->delete();
        return to_route('connexion')->with('success', 'Le mot de passe a été changé avec succès');
    }

    public function contact(Request $request){
        $data=[
            'nom'=>$request->nom,
            'telephone'=>$request->telephone,
            'message'=>$request->message
        ];
        // dump($data);
        // dd($request->post());
        Mail::send('emails.contact',['data'=>$data],function($message) use ($request){
            $message->from($request->email);
            $message->to("contact@worfac.com");
            $message->subject($request->subject);
        });
        return to_route('contact')->with('success','Message envoye');
    }

}
