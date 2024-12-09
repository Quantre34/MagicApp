<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Main;
use App\Models\Clinic;
use App\Models\Client;
use Lang;
use App;
    /*
    * @param <request>
    * @return <json>
    */

class UserController extends Controller
{

    function __construct(){

        $this->action = request('action');
        if (!empty($_SESSION['User'])){
            $this->User = $_SESSION['User'];
        }
        if (empty($_SESSION['Locale'])) {
            $_SESSION['Locale'] = 'en';
            App::setlocale($_SESSION['Locale']);
        }
        $this->Lang = $_SESSION['Locale'];
    }
    ///
    public function HomePage(){
        return view('main.Home');
    }
    ///
    public function WelcomePage(){
        return view('main.Statement');
    }
    ///
    public function Login(){
        return view('main.Login-1', ['isMobile' => $this->isMobile()]);
    }
    ///
    public function Appointment(){
        return view('main.Appointment');
    }
    public function CheckApp($uid){
        $Order = $this->toArray(DB::table('appointment')->where('uid',$uid)->first() );
        if ($Order) {
            $Order['User'] = $this->toArray(DB::table('user')->where('uid',$Order['UserId'])->first());
            $Order['Package'] = $this->toArray(DB::table('package')->where('Id',$Order['PackageId'])->first());
            $Order['Category'] = $this->toArray(DB::table('category')->where('Id',$Order['CategoryId'])->first());
            $Order['Treatment'] = $this->toArray(DB::table('treatment')->where('Id', $Order['TreatmentId'])->first());
            $Order['Package'] = $this->toArray(DB::table('package')->where('Id',$Order['PackageId'])->first());
            $Order['Agency'] = $this->toArray(DB::table('agency')->where('uid',$Order['AgencyId'])->first());
            $Order['Client'] = $this->toArray(DB::table('client')->where('uid',$Order['ClientId'])->first());
            $Order['Client']['Background'] = $this->toArray(DB::table('background')->where('ClientId', $Order['ClientId'])->first());
            $Order['PaymentMethod'] = $this->toArray(DB::table('payment_method')->where('Id',$Order['PaymentMethod'])->first());
            $Features = [];
            foreach(json_decode($Order['Features'],true) as $Feature){
                $Features[] = $this->toArray(DB::table('feature')->where('Id',$Feature)->first());
            }
            $Order['Features'] = $Features;
            $result = ['outcome'=>true,'route'=>'main.AppDetails','data'=>[
                'Order'=>$Order
            ]];
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.NotFound')];
        }
        // return response()->json($result);
        if ($result['outcome']) {
            return view($result['route'],$result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function Categories($Slug=false){
            $Categories = DB::table('category')->where('Lang',$this->Lang)->where('Status', '1');
            if ($Slug) {
                $Categories->where('Slug',$Slug);
            }
            $Categories = $this->toArray($Categories->get());
            foreach($Categories as $key => $Category){
                $Treatments= $this->toArray(DB::table('treatment')->where('ParentId', $Category['Id'])->get());
                $Categories[$key]['Treatments'] = $Treatments;
            }
            $result = ['outcome'=>true,'route'=>'main.Categories','data'=>[
                'Categories'=>$Categories
            ]];
        if ($result['outcome']) {
            return view($result['route'], $result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function Articles(){
        if (!empty($this->User)) {
                $Categories = $this->toArray(DB::table('category')->where('Lang',$this->Lang)->where('Status', '1')->get());
                foreach($Categories as $key => $Category){
                    $Categories[$key]['Treatments']= $this->toArray(DB::table('treatment')->where('ParentId', $Category['Id'])->where('Lang',$this->Lang)->where('Status', '1')->get());
                }
                $Articles = $this->toArray(DB::table('article')->where('Lang',$this->Lang)->where('Status', '1')->orderBy('Order', 'asc')->limit(6)->get());
                if (count($Articles)!=0) {
                    $result = ['outcome'=>true,'route'=>'panel.Articles','data'=>[
                        'Categories'=>$Categories,
                        'Articles'=>$Articles
                    ]];
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.NotFound')];
                }
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
        }
        if ($result['outcome']) {
            return view($result['route'], $result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function ArticleDetail($Slug){
        if (!empty($this->User)) {
            $Articles = $this->toArray(DB::table('article')->where('Lang',$this->Lang)->where('Status', '1')->orderBy('Order', 'asc')->get());
            $Article = $this->toArray( DB::table('article')->where('Slug',$Slug)->first() );
            $result = ['outcome'=>true,'route'=>'panel.Articles-Detail','data'=>[
                'Article'=>$Article,
                'Articles'=>$Articles
            ]];
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut'), 'route'=>' '];
        }
        if ($result['outcome']) {
            return view($result['route'], $result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function Results(){
        $Results = $this->toArray(DB::table('results')->where('Status','1')->get());
        return view('panel.Results', ['Results'=>$Results]);
    }
    ///
    public function ResultDetail($uid){
        $Result = $this->toArray(DB::table('results')->where('uid', $uid)->first());
        return view('panel.Results-Detail',['Result'=>$Result]);
    }
    ///
    public function OrderDetail($uid){
        $Order = $this->toArray(DB::table('appointment')->where('uid',$uid)->first() );
        if ($Order) {
            $Order['User'] = $this->toArray(DB::table('user')->where('uid', $Order['UserId'])->first());
            $Order['Package'] = $this->toArray(DB::table('package')->where('Id',$Order['PackageId'])->first());
            $Order['Category'] = $this->toArray(DB::table('category')->where('Id',$Order['CategoryId'])->first());
            $Order['Treatment'] = $this->toArray(DB::table('treatment')->where('Id', $Order['TreatmentId'])->first());
            $Order['Package'] = $this->toArray(DB::table('package')->where('Id',$Order['PackageId'])->first());
            $Order['Agency'] = $this->toArray(DB::table('agency')->where('uid',$Order['AgencyId'])->first());
            $Order['Client'] = $this->toArray(DB::table('client')->where('uid',$Order['ClientId'])->first());
            $Order['Client']['Background'] = $this->toArray(DB::table('background')->where('ClientId', $Order['ClientId'])->first());
            $Order['PaymentMethod'] = $this->toArray(DB::table('payment_method')->where('Id',$Order['PaymentMethod'])->first());
            $Features = [];
            foreach(json_decode($Order['Features'],true) as $Feature){
                $Features[] = $this->toArray(DB::table('feature')->where('Id',$Feature)->first());
            }
            $Order['Features'] = $Features;
            $result = ['outcome'=>true,'route'=>'panel.OrderDetail','data'=>[
                'Order'=>$Order
            ]];
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.NotFound')];
        }
        // return response()->json($result);
        if ($result['outcome']) {
            return view($result['route'],$result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function Treatments(){
        return view('main.Treatments');
    }
    ///
    public function TreatmentDetail($Slug){
        $data = $this->toArray(DB::table('treatment')->where('Slug',$Slug)->first());
        $Blogs = $this->toArray(DB::table('article')->where('Type','1')->where('Status','1')->get());
        $data['Description'] = $this->toArray(DB::table('descriptions')->where('ProductId',$data['uid'])->first());
        return view('main.TreatmentDetail',[
            'Treatment'=>$data,
            'Blogs'=>$Blogs
        ]);
    }
    ///
    public function Blogs(){
        $Blogs = $this->toArray(DB::table('article')->where('Type','1')->where('Status','1')->get());
        return view('main.Blogs',['Blogs'=>$Blogs]);
    }
    public function Blog($Slug){
        $Blog = $this->toArray(DB::table('article')->where('Slug', $Slug)->where('Status','1')->first());
        $Blogs = $this->toArray(DB::table('article')->where('Type','1')->where('Status','1')->where('Id','!=',$Blog['Id'])->get());
        if(!empty($Blog)){
            $result = ['outcome'=>true,'route'=>'main.Blog','data'=>[
                'Blog'=>$Blog,
                'Blogs'=>$Blogs
            ]];
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.NotFound')];
        }

        if ($result['outcome']) {
            return view($result['route'],$result['data']);
        }else {
            return redirect()->back()->with($result);
        }

    }
    ///
    public function About(){
        return view('main.About');
    }


    /*
    *   The End of the Class
    */
}

