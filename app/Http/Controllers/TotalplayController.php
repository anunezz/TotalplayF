<?php namespace App\Http\Controllers;

use DB;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Models\ImgPromotion;
use App\Http\Models\Wallpaper;
use App\Http\Models\Contact;
use App\Http\Models\Footer2;
use App\Http\Models\FilePromotionModal;
use App\Http\Models\LevelsOfAttention;
use App\Http\Models\ImgWrallpapers;
use Illuminate\Support\Facades\Auth;
use App\Http\Models\Cats\CatState;
use App\Http\Models\Cats\CatPromotion; //quitar
use App\Http\Models\Cats\CatCodePromotion;
use App\Http\Models\Cats\CatNamePaks;
use App\Http\Models\Cats\CatTripleDoble;
use App\Http\Models\Cats\CatPackFrontier;
use App\Http\Models\Cats\CatCity;
use App\Http\Models\Cats\CatProfile;
use App\Http\Models\FirstSesion;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\exportContacts;
use App\Http\Traits\validFile;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class TotalplayController extends Controller
{
    private $phone = 'regex:/^[0-9]{10}$/im';
    private $alphanumeric = 'regex:/^[A-Za-z0-9\.,\-\"\()ÑñäÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚÂÊÎÔÛâêîôûàèìòùÀÈÌÒÙ\s]+$/im';

    public function index(){
        try{
            return view("app");
        } catch (Exception $e) {
            return response()->json([
            'success' => false,
            'message' => 'Error al mostrar información ' . $e->getMessage()
            ], 300);
        }
    }

    public function setContact(Request $request){
        try{
            if ($request->wantsJson()){

                    $request->validate([
                        'name' => 'nullable|string|max:100|'.$this->alphanumeric,
                        'city_id' => 'nullable|numeric',
                        'promotion_id' => 'nullable|numeric',
                        'phone' => 'required|string|max:10|'.$this->phone,
                        'promotion_code' => 'nullable|string|max:100'.$this->alphanumeric,
                    ]);

                    $data = $request->all();

                    $LevelsOfAttention = LevelsOfAttention::create([
                        'attention_id' => 1
                    ]);

                    $LevelsOfAttention->save();

                    Contact::create([
                        'name' => $data['name'],
                        'city_id' => $data['city_id'],
                        'promotion_id' => $data['promotion_id'],
                        'attention_id' => $LevelsOfAttention->id,
                        'phone' => $data['phone'],
                        'promotion_code' => $data['promotion_code']
                    ]);

                    return response()->json([
                        'success' => true,
                    ], 200);

                }else{
                    return response()->view('errors.404', [], 404);
                }
            } catch (Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al mostrar información ' . $e->getMessage()
                ], 300);
            }
    }

    public function getCats(){
        try{

            $CatCity = CatCity::with('state')->where('isActive',1)->orderBy('name','asc')->get();
            $Wallpaper = Wallpaper::first();

            return response()->json([
                'success' => true,
                'lResults' =>  [
                    "CatCity" => $CatCity,
                    "Wallpaper" => $Wallpaper
                ],
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al mostrar información ' . $e->getMessage()
            ], 300);
        }
    }

    public function setPacks(Request $request){
        try{
            if ($request->wantsJson()){
                $data = $request->all();

                $request->validate([
                    'city' => 'required|numeric',
                    'typePack' => 'required|boolean'
                ]);

                $data = $request->all();
                $CatCity = CatCity::find($data['city'])->frontier;
                $data['city'] = $CatCity;
                $data['type'] = 1;
                $catHome = CatPromotion::Filter($data)->get();
                $data['typePack'] = null;
                $data['type'] = 2;
                $catAmazon = CatPromotion::Filter($data)->get();
                $data['type'] = 3;
                $catNetflix = CatPromotion::Filter($data)->get();

                $imgBannerNetflix   =  optional(ImgWrallpapers::where('cat_wrallpaper_id',4)->first())->fileNameHash;
                $imgBannerAmazon    =  optional(ImgWrallpapers::where('cat_wrallpaper_id',5)->first())->fileNameHash;
                $main               =  optional(ImgWrallpapers::where('cat_wrallpaper_id',6)->first())->fileNameHash;
                $Footer2 = Footer2::count();
                if($Footer2 === 0){
                    $Footer2 = collect([
                    'isActive' => 0,
                    'message' => 'Registra un dato en la base de datos :)',
                    'cellPhone' => '555555555',
                    'background' => "red"
                    ]);
                }else{
                    $Footer2 = Footer2::first();
                }
                $imgSlider = [];

                return response()->json([
                    'success' => true,
                    'lResults' => [
                        "catHome" => $catHome,
                        "catAmazon" => $catAmazon,
                        "catNetflix" => $catNetflix,
                        "imgBannerNetflix" => $imgBannerNetflix,
                        "imgBannerAmazon" => $imgBannerAmazon,
                        "imgSlider" => $imgSlider,
                        "main" => $main,
                        "Footer2" => $Footer2
                    ],
                ], 200);
            }else{
                return response()->view('errors.404', [], 404);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al mostrar información ' . $e->getMessage()
            ], 300);
        }
    }

    public function getContacts(){
        try{

        $user = auth()->user()->id;
        $results = Contact::with('city','attention')->where('isActive',1)->orderBy('id','desc')->get();

        return response()->json([
            'success' => true,
            'lResults' =>  $results,
        ], 200);

        } catch (Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Error al mostrar información ' . $e->getMessage()
        ], 300);
        }
    }

    public function exportContacts(Request $request)
    {
        try {
            $data = $request->all();
            return Excel::download(new exportContacts($data), 'Contactos_Totalplay.xlsx');

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al mostrar información ' . $e->getMessage()
            ], 300);
        }
    }

    public function getUsers(Request $request)
    {
        try {
            $data = $request->all();
            $users = User::orderBy('updated_at', 'DESC')->paginate($data['perPage']);

            return response()->json([
                'success' => true,
                'lResults' =>  ['Users' => $users],
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al mostrar información ' . $e->getMessage()
            ], 300);
        }
    }

    public function getCatsUser()
    {
        try {
            $fields = ['id','name'];
            $CatProfile = CatProfile::where('id','!=',1)->where('isActive',1)->get($fields);

            return response()->json([
                'success' => true,
                'lResults' =>  [
                    "profiles" => $CatProfile
                ],
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al mostrar información ' . $e->getMessage()
            ], 300);
        }
    }

    public function createUser(Request $request){
        try{
            if ($request->wantsJson()){
                $data = $request->all();
                $aux = true;
                $searchUser = User::Search($data)->count();

                // $request->validate([
                //     'city' => 'required|numeric',
                //     'typePack' => 'required|boolean'
                // ]);

                if( $searchUser === 0 || true == true){

                    $CatCodePromotion = CatCodePromotion::create([
                        'name' => $data['code'],
                        'isActive' => ($data['switchCode']? 1 : 0)
                    ]);

                    $user = User::create([
                        'username'=>$data['username'],
                        'cat_profile_id' => $data['profile'],
                        'code_id' => $CatCodePromotion->id,
                        'email' => $data['email'],
                        'name' => $data['name'],
                        'firstName' => $data['firstName'],
                        'secondName' => $data['secondName'],
                        'password' => bcrypt($data['password'])
                    ]);

                    $FirstSesion = FirstSesion::create([
                        'user_id' => $user->id
                    ]);


                }else{
                    $aux =  false;
                }

                return response()->json([
                    'success' => true,
                    'lResults' => $aux,
                ], 200);
            }else{
                return response()->view('errors.404', [], 404);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al mostrar información ' . $e->getMessage()
            ], 300);
        }
    }

    public function updateUser(Request $request){
        try{
            if ($request->wantsJson()){

                // $request->validate([
                //     'city' => 'required|numeric',
                //     'typePack' => 'required|boolean'
                // ]);

                $data = $request->all();
                //dd($data);
                $user = User::find( decrypt($data['userid']) );

                if( $user ){

                    $user->cat_profile_id = $data['data']['profile'];
                    $user->name = $data['data']['name'];
                    $user->firstName = $data['data']['firstName'];
                    $user->secondName = $data['data']['secondName'];
                    if( $data['updatePassword'] ){
                        $user->password = bcrypt($data['data']['password']);
                    }
                    $user->save();

                    $FirstSesion = $user->firstSesion()->first();
                    $FirstSesion->isActive = 0;
                    $FirstSesion->save();

                    $code = $user->code()->first();
                    $code->name = $data['data']['code'];
                    $code->isActive = ($data['data']['switchCode'] === true? 1:0 );
                    $code->save();
                }

                return response()->json([
                    'success' => true,
                ], 200);
            }else{
                return response()->view('errors.404', [], 404);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al mostrar información ' . $e->getMessage()
            ], 300);
        }
    }

    public function activeUser(Request $request){
        try{
            if ($request->wantsJson()){

                $data = $request->all();

                $user = User::find( decrypt($data['userid']) );

                if( $user ){
                    $user->isActive = ( $data['active'] === true )? 1 : 0;
                    $user->save();
                }

                return response()->json([
                    'success' => true,
                ], 200);
            }else{
                return response()->view('errors.404', [], 404);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al mostrar información ' . $e->getMessage()
            ], 300);
        }
    }

    public function updatePassword(Request $request){
        try{
            if ($request->wantsJson()){

                $data = $request->all();
                $aux = true;
                $user = auth()->user();
                $user->password = bcrypt($data['password']);
                $user->save();
                $firstSesion = $user->firstSesion()->first();
                $firstSesion->isActive = 0;
                $firstSesion->save();

                return response()->json([
                    'success' => true,
                ], 200);

            }else{
                return response()->view('errors.404', [], 404);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al mostrar información ' . $e->getMessage()
            ], 300);
        }
    }

    public function getCatsPacks(Request $request){
        try{
            if ($request->wantsJson()){
                $data = $request->all();
                $packs = CatPromotion::Filters($data['filters'])->paginate($data['perPage']);

                return response()->json([
                    'success' => true,
                    'lResults' => ['packs' => $packs]
                ], 200);

            }else{
                return response()->view('errors.404', [], 404);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al mostrar información ' . $e->getMessage()
            ], 300);
        }
    }

    public function getCatsPacksForm(){
        try{
                $packNames = CatNamePaks::where('isActive',1)->get();
                $frontiers = CatPackFrontier::where('isActive',1)->get();
                $triple_double = CatTripleDoble::where('isActive',1)->get();

                $actives = collect([
                    ['id'=> 0, 'name' => 'Desactivado'],
                    ['id'=> 1, 'name' => 'Activado']
                ]);

                // collect([
                //     ['id'=> 0, 'name' => 'Double play'],
                //     ['id'=> 1, 'name' => 'Triple play']
                // ]);

                return response()->json([
                    'success' => true,
                    'lResults' => ['packNames' => $packNames,
                                    'frontiers'=> $frontiers,
                                    'actives' => $actives,
                                    'triple_double' => $triple_double]
                ], 200);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al mostrar información ' . $e->getMessage()
            ], 300);
        }
    }

    public function filePromotion(Request $request){
        try {
            DB::beginTransaction();
            if (validFile::valid($request->document)) {
                $file = new ImgPromotion();
                $document = $request->document;
                //$file->fileNameHash = asset($document->store('imgPackModal'));
                $file->fileNameHash = Storage::url($document->store('public/imgPack'));
                $file->fileName = $document->getClientOriginalName();
                $file->save();

                $imgPack = [
                    'id' => $file->id,
                    'name' => $file->fileName,
                    'url' => $file->fileNameHash
                ];

                // $document = $request->document;
                // $file->fileName = $document->getClientOriginalName();
                // $components = preg_split("/[\/]/", Storage::url($document->store('public/imgPack')));
                // $file->fileNameHash = "app/public/imgPack/$components[3]";
                // $file->save();
                // $imgPack = [
                //     'id' => $file->id,
                //     'name' => $file->fileName,
                //     'url' => $file->fileNameHash,
                //     'path' => $file->fileNameHash
                // ];

                DB::commit();

                return response()->json([
                    'success' => true,
                    'documentId' => $imgPack
                ]);

            } else {
                return response()->json([
                    'success' => false,
                ]);
            }
        } catch (Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function filePromotionModal(Request $request){
        try {
            DB::beginTransaction();
            if (validFile::valid($request->document)) {

                $file = new FilePromotionModal();
                $document = $request->document;
                //$file->fileNameHash = asset($document->store('imgPackModal'));
                $file->fileNameHash = Storage::url($document->store('public/imgPackModal'));
                $file->fileName = $document->getClientOriginalName();
                $file->save();

                $imgPack = [
                    'id' => $file->id,
                    'name' => $file->fileName,
                    'url' => $file->fileNameHash
                ];

                DB::commit();

                return response()->json([
                    'success' => true,
                    'documentId' => $imgPack
                ]);

            } else {
                return response()->json([
                    'success' => false,
                ]);
            }
        } catch (Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

        public function createPromotion(Request $request){
            try{
                if ($request->wantsJson()){

                    $data = $request->all();

                    $promotion = CatPromotion::create([
                        'type' => $data['pack_id'],
                        'frontier' => $data['frontier'],
                        'triple_double' => $data['triple_double'],
                        'name' => $data['name'],
                        'color' => $data['color'],
                        'description' => $data['description']
                    ]);

                    $ImgPromotion = ImgPromotion::find( $data['file'][0]['id'] );
                    $ImgPromotion->fileNameHash = $data['file'][0]['url'];
                    $ImgPromotion->promotion_id = $promotion->id;
                    $ImgPromotion->isActive = 1;
                    $ImgPromotion->save();

                    $FilePromotionModal = FilePromotionModal::find( $data['filesModal'][0]['id'] );
                    $FilePromotionModal->fileNameHash = $data['filesModal'][0]['url'];
                    $FilePromotionModal->promotion_id = $promotion->id;
                    $FilePromotionModal->isActive = 1;
                    $FilePromotionModal->save();

                    return response()->json([
                        'success' => true,
                    ], 200);
                }else{
                    return response()->view('errors.404', [], 404);
                }
            } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al mostrar información ' . $e->getMessage()
            ], 300);
            }
        }

        public function updatePromotion(Request $request){
            try{
                if ($request->wantsJson()){

                    $data = $request->all();
                    $d = $data['ruleForm'];

                    $promotion = CatPromotion::find($d['paquete_id']);
                    $promotion->type = $d['pack_id'];
                    $promotion->frontier = $d['frontier'];
                    $promotion->triple_double = $d['triple_double'];
                    $promotion->name = $d['name'];
                    $promotion->color = $d['color'];
                    $promotion->description = $d['description'];
                    $promotion->save();

                    $imgpromotion = ImgPromotion::where('promotion_id',$promotion->id)->get();
                    //dd($imgpromotion);
                    if( count($imgpromotion) > 0 ){
                        foreach ($imgpromotion as $prom) {
                            if($prom->id === $d['file']['id'] ){
                                $prom->fileName = $d['file']['name'];
                                $prom->fileNameHash = $d['file']['url'];
                                $prom->isActive = 1;
                                $prom->promotion_id = $promotion->id;
                                $prom->save();
                            }else{
                                $prom->delete();
                                ImgPromotion::create([
                                    'promotion_id' => $promotion->id,
                                    'fileName' => $d['file']['name'],
                                    'fileNameHash' => $d['file']['url'],
                                    'isActive' => 1
                                ]);
                            }
                        }
                    }else{
                        ImgPromotion::create([
                            'promotion_id' => $promotion->id,
                            'fileName' => $d['file']['name'],
                            'fileNameHash' => $d['file']['url'],
                            'isActive' => 1
                        ]);
                    }

                    $filesModal = $promotion->imgpromotionmodal()->first();
                    $filesModal->fileName = $d['filesModal']['name'];
                    $filesModal->fileNameHash = $d['filesModal']['url'];
                    $filesModal->isActive = 1;
                    $filesModal->save();

                    return response()->json([
                        'success' => true,
                    ], 200);
                }else{
                    return response()->view('errors.404', [], 404);
                }
            } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al mostrar información ' . $e->getMessage()
            ], 300);
            }
        }

    public function activePack(Request $request){
        try{
            if ($request->wantsJson()){

                $data = $request->all();
                $promotion = CatPromotion::find($data['packid']);
                $promotion->isActive = $data['active'] === true? 1 : 0;
                $promotion->save();

                return response()->json([
                    'success' => true,
                ], 200);
            }else{
                return response()->view('errors.404', [], 404);
            }
        } catch (Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Error al mostrar información ' . $e->getMessage()
        ], 300);
        }
    }

    public function getCatsPromotion(){
        try{
                $users = User::where('isActive',1)->get(['id','name']);
                $packs = CatPromotion::where('isActive',1)->get();
                return response()->json([
                    'success' => true,
                    'lResults' => ['users' => $users,
                                    'packs'=> $packs]
                ], 200);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al mostrar información ' . $e->getMessage()
            ], 300);
        }
    }

    public function createCodePromotion(Request $request){
        try{
            if ($request->wantsJson()){
                $data = $request->all();
                $exist = CodePromotion::where('promotion_code',$data['code'])->count();
                $aux = false;
                if( $exist === 0 ){
                    $CodePromotion = CodePromotion::create([
                        "user_id" => $data["user_id"],
                        "promotion_code" => $data["code"],
                        "promotion_id" => $data["pack_id"]
                    ]);
                }else{
                    $aux = true;
                }

                return response()->json([
                    'success' => true,
                    'lResults' => [
                        'exist' => $aux
                    ]
                ], 200);
            }else{
                return response()->view('errors.404', [], 404);
            }
        } catch (Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Error al mostrar información ' . $e->getMessage()
        ], 300);
        }
    }

    public function getCodePromotion(Request $request){
        try{
            if ($request->wantsJson()){
                $data = $request->all();
                $CodePromotion = CodePromotion::orderBy('updated_at', 'DESC')->paginate($data['perPage']);

                return response()->json([
                    'success' => true,
                    'lResults' => [ 'CodePromotion' => $CodePromotion ]
                ], 200);
            }else{
                return response()->view('errors.404', [], 404);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al mostrar información ' . $e->getMessage()
            ], 300);
        }
    }

    public function activePromotion(Request $request){
        try{
            if ($request->wantsJson()){
                $data = $request->all();
                //$CodePromotion = CodePromotion::find( decrypt($data['promotionid']) );
                $CodePromotion = CodePromotion::find( $data['promotionid'] );
                $CodePromotion->isActive = $data['active'] === true ? 1:0;
                $CodePromotion->save();

                return response()->json([
                    'success' => true
                ], 200);
            }else{
                return response()->view('errors.404', [], 404);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al mostrar información ' . $e->getMessage()
            ], 300);
        }
    }

    public function fileWallpaper(Request $request){
        try {
            DB::beginTransaction();
            if (validFile::valid($request->document)) {

                $file = Wallpaper::count();
                if( $file > 0 ){
                    $file = Wallpaper::first();
                }else{
                    $file = new Wallpaper();
                }

                $document = $request->document;
                //$file->fileNameHash = asset($document->store('imgWallpaper'));
                $file->fileNameHash = Storage::url($document->store('public/imgWallpaper'));
                $file->fileName = $document->getClientOriginalName();
                $file->save();

                $imgPack = [
                    'id' => $file->id,
                    'name' => $file->fileName,
                    'url' => $file->fileNameHash
                ];

                DB::commit();

                return response()->json([
                    'success' => true,
                    'documentId' => $imgPack
                ]);

            } else {
                return response()->json([
                    'success' => false,
                ]);
            }
        } catch (Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function saveWallpaper(Request $request){
        try{
            if ($request->wantsJson()){
                    $data = $request->all();

                    $Wallpaper = Wallpaper::count();
                    if( $Wallpaper > 0 ){
                        $Wallpaper = Wallpaper::first();
                    }else{
                        $Wallpaper = new Wallpaper();
                    }

                    //dd($Wallpaper);

                    $Wallpaper->fileName = $data['files']['name'];
                    $Wallpaper->fileNameHash = $data['files']['url'];
                    $Wallpaper->color = $data['color'];
                    $Wallpaper->isColor = ($data['isColor'] === true ? 0 : 1);
                    $Wallpaper->save();

                    return response()->json([
                        'success' => true
                    ], 200);
            }else{
                return response()->view('errors.404', [], 404);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al mostrar información ' . $e->getMessage()
            ], 300);
        }
    }

    public function getWallpaper(){
        try{

            $Wallpaper = Wallpaper::count();
            if( $Wallpaper > 0 ){
                $Wallpaper = Wallpaper::first();
            }else{
                $Wallpaper = collect([
                'fileName' => "imagenFondoPantalla",
                'fileNameHash' => null,
                'color' => "red",
                'isColor' => false,
                'id' => 11231312
                ]);
            }

            return response()->json([
                'success' => true,
                'lResults' => ["Wallpaper" => $Wallpaper],
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al mostrar información ' . $e->getMessage()
            ], 300);
        }
    }

    public function ImgWrallpapersNetflix(Request $request){
        try {
            DB::beginTransaction();
            if (validFile::valid($request->document)) {
                $file = ImgWrallpapers::where('cat_wrallpaper_id',4)->count();
                if( $file === 0 ){
                    $file = new ImgWrallpapers();
                }else{
                    $file = ImgWrallpapers::where('cat_wrallpaper_id',4)->first();
                }

                $document = $request->document;
                $file->cat_wrallpaper_id = 4;
                //$file->fileNameHash = asset($document->store('imgBannerNetflix'));
                $file->fileNameHash = Storage::url($document->store('public/imgBannerNetflix'));
                $file->fileName = $document->getClientOriginalName();
                $file->save();

                $imgPack = [
                    'id' => $file->id,
                    'name' => $file->fileName,
                    'url' => $file->fileNameHash
                ];

                DB::commit();

                return response()->json([
                    'success' => true,
                    'documentId' => $imgPack
                ]);

            } else {
                return response()->json([
                    'success' => false,
                ]);
            }
        } catch (Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function ImgWrallpapersAmazon(Request $request){
        try {
            DB::beginTransaction();
            if (validFile::valid($request->document)) {

                $file = ImgWrallpapers::where('cat_wrallpaper_id',5)->count();
                if( $file === 0 ){
                    $file = new ImgWrallpapers();
                }else{
                    $file = ImgWrallpapers::where('cat_wrallpaper_id',5)->first();
                }

                $document = $request->document;
                $file->cat_wrallpaper_id = 5;
                //$file->fileNameHash = asset($document->store('imgBannerAmazon'));
                $file->fileNameHash = Storage::url($document->store('public/imgBannerAmazon'));
                $file->fileName = $document->getClientOriginalName();
                $file->save();

                $imgPack = [
                    'id' => $file->id,
                    'name' => $file->fileName,
                    'url' => $file->fileNameHash
                ];

                DB::commit();

                return response()->json([
                    'success' => true,
                    'documentId' => $imgPack
                ]);

            } else {
                return response()->json([
                    'success' => false,
                ]);
            }
        } catch (Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function ImgWrallpapersMain(Request $request){
        try {
            DB::beginTransaction();
            if (validFile::valid($request->document)) {

                $file = ImgWrallpapers::where('cat_wrallpaper_id',6)->count();
                if( $file === 0 ){
                    $file = new ImgWrallpapers();
                }else{
                    $file = ImgWrallpapers::where('cat_wrallpaper_id',6)->first();
                }

                $document = $request->document;
                $file->cat_wrallpaper_id = 6;
                //$file->fileNameHash = asset($document->store('imgBannerMain'));
                $file->fileNameHash = Storage::url($document->store('public/imgBannerMain'));
                $file->fileName = $document->getClientOriginalName();
                $file->save();

                $imgPack = [
                    'id' => $file->id,
                    'name' => $file->fileName,
                    'url' => $file->fileNameHash
                ];

                DB::commit();

                return response()->json([
                    'success' => true,
                    'documentId' => $imgPack
                ]);

            } else {
                return response()->json([
                    'success' => false,
                ]);
            }
        } catch (Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function getBanner(){
        try{

            $netflix = ImgWrallpapers::where('cat_wrallpaper_id',4)->get(); // netflix
            $amazon  = ImgWrallpapers::where('cat_wrallpaper_id',5)->get(); // amazon
            $main    = ImgWrallpapers::where('cat_wrallpaper_id',6)->get(); // main

            return response()->json([
                'success' => true,
                'lResults' =>  [
                    "netflix" => $netflix,
                    "amazon"  => $amazon,
                    "main"    => $main
                ],
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al mostrar información ' . $e->getMessage()
            ], 300);
        }
    }

    public function ImgSlider(Request $request){
        try {
            DB::beginTransaction();
            if (validFile::valid($request->document)) {

                $file = ImgWrallpapers::where('cat_wrallpaper_id',2)->count();
                if( $file === 0 ){
                    $file = new ImgWrallpapers();
                }else{
                    $file = ImgWrallpapers::where('cat_wrallpaper_id',2)->first();
                }

                $document = $request->document;
                $file->cat_wrallpaper_id = 2;
                $file->isActive = 0;
                //$file->fileNameHash = asset($document->store('imgSlider'));
                $file->fileNameHash = Storage::url($document->store('public/imgSlider'));
                $file->fileName = $document->getClientOriginalName();
                $file->save();

                $imgPack = [
                    'id' => $file->id,
                    'name' => $file->fileName,
                    'url' => $file->fileNameHash
                ];

                DB::commit();

                return response()->json([
                    'success' => true,
                    'files' => $imgPack
                ]);

            } else {
                return response()->json([
                    'success' => false,
                ]);
            }
        } catch (Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function footer2(Request $request){
        try {
            DB::beginTransaction();
            $data = $request->all();
            //dd($data);

            $footer2 =  Footer2::count();
            if($footer2 === 0){
                $footer2 = new Footer2();
            }else{
                $footer2 =  Footer2::first();
            }

            $footer2->message = $data['message'];
            $footer2->background = $data['color'];
            $footer2->cellPhone = $data['cellPhone'];
            $footer2->isActive = ($data['isActive'] === true?1:0);
            $footer2->save();

            DB::commit();
                return response()->json([
                    'success' => true,
                ]);

        } catch (Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function getFooter2(){
        try {
            $footer2 =  Footer2::count();
            if($footer2 === 0){
                $footer2 = collect([]);
            }else{
                $footer2 =  Footer2::first();
                $footer2->isActive = ($footer2->isActive ===1 ? true: false);

            }

            return response()->json([
                'success' => true,
                'lResults' => ['footer2' => $footer2]
            ]);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

}
