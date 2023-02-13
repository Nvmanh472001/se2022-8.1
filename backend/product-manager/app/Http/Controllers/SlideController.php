<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Storage;
use DB; 

class SlideController extends Controller
{
    //
    use StorageImageTrait;
    protected $guarded = [];
    private $slide;
    public function __construct(Slide $slide)
    {
        $this->slide = $slide;
    }

    //Home Slide
    public function index()
    {
        $slide = $this->slide->paginate(5);
        
        return view('admins.slide.index', compact('slide'));
    }

    //Add Slide
    public function create()
    {
        return view('admins.slide.add');
    }

    //Add Slide function
    public function postAdd(Request $request)
    {
        $dataImage = $this->storageFileUpload($request, 'image_path', 'slide');
        $slide = $this->slide;
        $slide->description = $request->description;
        if (!empty($dataImage)) {
            $slide->name = $dataImage['filename'];
            $slide->image = $dataImage['filepath'];
        }
        $slide->save();
        return redirect()->route('admins.slides.index')->with('msg', 'Thêm hình ảnh thành công');

    }

    //View Edit Slide
    public function edit($id){
        $slide = $this->slide->find($id);
        return view('admins.slide.edit',compact('slide'));
    }

    // Function Update Slide
    public function update(Request $request,$id)
    {
       try {
        DB::beginTransaction();
        $slide =$this->slide->find($id);
            $slide->description = $request->description;
        $dataImage = $this->storageFileUpload($request, 'image_path', 'slide');
        if (!empty($dataImage)) {
            $slide->name = $dataImage['filename'];
            $slide->image = $dataImage['filepath'];
        }
        $slide->update();
       
        DB::commit();
        return redirect()->back()->with('msg', 'Sửa thành công');
        //code...
       } catch (\Exception$exception) {
        DB::rollBack();
        Log::error('Message: ' . $exception->getMessage() . ' --- Line : ' . $exception->getLine());
    }

    }


    // Function delete Slide
    public function delete($id)
    {

        
        try{
            DB::beginTransaction();
            $this->slide->find($id)->delete();
            DB::commit();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);
        } catch (\Exception $exception) {
            Log::error('Message: ' . $exception->getMessage() . ' --- Line : ' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }
    }
    
}
