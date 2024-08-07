<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Packages;
use App\Models\ChatConvo;
use App\Models\ClientApp;
use App\Models\Company;
use App\Models\GroupParticipant;
use App\Models\Group;
use App\Models\Lead;
use App\Models\Subscribed;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
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
    public function index(){
        $active_users = User::where('account_is_active', 1)->get();
        $active = Count($active_users);
        $deactive_users = User::where('account_is_active', 0)->get();
        $deactive = Count($deactive_users);
        $ClientApp = ClientApp::all();
        $ClientAppCount = Count($ClientApp);

        $leads = Lead::all();
        $activeLeads = Count($leads->where('status',1));
        $inActiveleads = Count($leads->where('status',0));
        $totalLeads = Count($leads);

        return view('admin.home',get_defined_vars());
    }
    
    
    public function create_user(Request $request){
        $user = new User;
        
        if($request->has('avatar')){
             $attechment  = $request->file('avatar');
             $img_2 =  time().$attechment->getClientOriginalName();
            $attechment->move(public_path('assets/media/avatar'),$img_2);
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make('12345678');
        $user->avatar = $img_2 ?? 'avatar.png';
        $user->role = 1;
        $user->save();
        
        return redirect()->route('admin.allusers')->with('success','User account created Successfuly');

    }

    public function all_users(){
        // dd(Auth::user()->role);
        $all_user = User::where('id', '!=',Auth::user()->id)->orderBy('id','DESC')->paginate(10);
        // dd($all_user);
        return view('admin.all_users',get_defined_vars());
    }
    public function deactive_user($id){
        User::where('id',$id)->update(array(
            'account_is_active' => 0
        ));
        return redirect()->back()->with('success','User account deactivated Successfuly');
    }
    public function active_user($id){
        User::where('id',$id)->update(array(
            'account_is_active' => 1
        ));
        return redirect()->back()->with('success','User account activated Successfuly');
    }


    public function all_deactive_users(){
        $all_deactive_users = User::where('account_is_active', 0)->paginate(10);
        return view('admin.deactive_users',get_defined_vars());
    }
    public function all_active_users(){
        $all_active_users = User::where('account_is_active', 1)->where('id','!=',Auth::user()->id)->paginate(10);
        return view('admin.active_users',get_defined_vars());
    }

    public function all_packages(){
        $all_packages = Packages::all();
        return view('admin.all_packages',get_defined_vars());
    }

    public function create_package(){
        return view('admin.create_package');
    }

    public function add_package(Request $request){
        $package = new Packages;
        $package->pacakge_name = $request->package_name;
        $package->pacakge_description = $request->pacakge_description;
        $package->pacakge_price = $request->pacakge_price;
        $package->pacakge_valid = $request->pacakge_valid;
        $package->total_allow_message = $request->total_msg;
        $package->is_active = 1;
        $package->save();
        return redirect()->back()->with('success','Package Created Successfuly.');
    }

    public function activate_package($id){
        Packages::where('id',$id)->update(array(
            'is_active' => 1
        ));
        return redirect()->back()->with('success','Package Activated Successfuly.');

    }

    public function deactivate_package($id){
        Packages::where('id',$id)->update(array(
            'is_active' => 0
        ));
        return redirect()->back()->with('success','Package DeActivated Successfuly.');
    }

    public function edit_package($id){
        $package = Packages::findorfail($id);
        return view('admin.edit',get_defined_vars());
    }

    public function update_packages(Request $request, $id){

        Packages::findorfail($id)->update(array(
            'pacakge_name' => $request->package_name,
            'pacakge_description' => $request->pacakge_description,
            'pacakge_price' => $request->pacakge_price,
            'total_allow_message' => $request->total_msg,
            'pacakge_valid' => $request->pacakge_valid,
        ));
        return redirect('/admin/all-packages')->with('success','Package Updated Successfuly.');
    }

   public function Userchat(){
    $userChat = User::where('id', '!=',Auth::user()->id)->paginate(10);
            return view('admin.UserChat',get_defined_vars());
   } 

   Public Function Chat_conv($id){
       $ChatConvo = chatConvo::where('sender_id' , $id)->orwhere('reciever_id', $id)->paginate(10);
    //   dd($ChatConvo, $id);
        $chat_user = User::find($id);
        foreach ($ChatConvo as $item){
            if($item->sender_id == $id){
                    $user = User::where('id',$item->reciever_id)->first();
            }else{
                    $user = User::where('id',$item->sender_id)->first();
            }
                        
        }
        
        $convo_between = $chat_user->name .' & '. $user->name;
        // dd($convo_between);
        return view('admin.Chat_conv',get_defined_vars());
   }

   public function Chats($id){
    $chats = chatConvo::where('id',$id)->first();

    return view('admin.Chats',get_defined_vars());
   }

   public function Allusergroup(){
    $allusergroup = User::where('id', '!=',Auth::user()->id)->paginate(10);
            return view('admin.AllUser_group',get_defined_vars());
   } 

   public function usergroup($id){
    $usergroup = GroupParticipant::where('participant_id',$id)->paginate(10);
    
    return view('admin.usergroup',get_defined_vars());

   }

   public function groupchat($id){
    $chatgroup = Group::where('id',$id)->first();
        $usergroup = GroupParticipant::where('group_id',$id)->get();

    return view('admin.groupchat',get_defined_vars());
   }

  public function clientList()
  {
    $client_list = ClientApp::with('user')->paginate(10);

    foreach ($client_list as $item) {
        $leads = Lead::where('web_url',$item->website_url)->get();
        $leadsCount = count($leads);
    }
    // dd($client_list);
    // dd($leads);
    return view('admin.client_list',get_defined_vars());
  }

  public function client_status_active($id){
    ClientApp::where('id',$id)->update(array(
        'status' => 1
    ));
    return redirect()->back()->with('success','App Activated Successfuly.');

}

public function client_status_deactivate($id){
    ClientApp::where('id',$id)->update(array(
        'status' => 0
    ));
    return redirect()->back()->with('success','App De-Activated Successfuly.');
}

}
