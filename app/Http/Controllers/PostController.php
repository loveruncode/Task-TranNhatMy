<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Spatie\Backtrace\Arguments\ReducedArgument\ReducedArgument;
use Yajra\DataTables\Contracts\DataTable;

class PostController extends Controller
{
   protected $post;
public function __construct(Post $post)
{
    $this->post = $post;
}
    public function index(Request $request)
    {

        // $posts = Post::paginate(2);
        // return view('Blogadmin.AdminQL', compact('posts'));
        $keyword = $request->search;

        $posts = $this->post->when($keyword, function ($query) use ($keyword) {
            return $query->where('title', 'like', '%' . $keyword . '%')
                ->orWhere('content', 'like', '%' . $keyword . '%');
        })->paginate(2);

        return view('Blogadmin.AdminQL', compact('posts'));
    }




    public function insertPost(Request $request)
    {
        //// title
        // is_featured
        // status
        // image
        // excerpt
        // content
        // slug
        $validator  = Validator::make($request->all(), [
            'title' => 'required|string|max:30',
            'image' =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'content' => 'required',


        ], [
            'title.required' => 'Title không được nhập ký tự đặc biệt',
            'title.min' => 'Title không được ngắn hơn 5 ký tự',
            'image.required' => 'Vui lòng chọn hình khác',
            'content.required' => 'Content khong duoc bo trong',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        Storage::putFileAs('public/images/', $image, $imageName);
        $title = $request->input('title');
        $status = $request->input('status');
        $content = $request->input('content');
        $is_featured = $request->input('is_featured');
        $excerpt = $request->input('excerpt');
        $slug = Str::slug($title);


        $post = new Post();
        $post->title = $title;
        $post->status = $status;
        $post->image = $imageName;
        $post->is_featured = $is_featured;
        $post->slug = $slug;
        $post->excerpt = $excerpt;
        $post->content = $content;

        $post->save();
        // dd($post);
        return redirect()->back()->with('success', 'Bài viết đã được thêm thành công');
    }

    public function delete($id)
    {

        $post = Post::find($id);

        if (!$post) {
            return redirect()->back()->with('error', 'Xoá Thất Bại');
        }
        $post->delete();

        return redirect()->back()->with('success', 'Đã Xoá Thành Công');
    }


    public function update(Request $request, $id)
    {


        $id = request('id');

        return view('Blogadmin.update', compact('id'));
    }

    public function Updateform(Request $request, $id)
    {
        //// title
        // is_featured
        // status
        // image
        // excerpt
        // content
        // slug

        $post = Post::find($id);


        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        Storage::putFileAs('public/images/', $image, $imageName);

        $post->title = $request->input('title');
        $post->is_featured = $request->input('is_featured');
        $post->status = $request->input('status');
        $post->content = $request->input('content');
        $post->excerpt = $request->input('excerpt');
        $post->slug = Str::slug($request->title);
        $post->image = $imageName;


        $post->update();

        return redirect()->back()->with('success', 'Đã thay đổi thành công');
    }



    public function deleteSelect(Request $request)
    {

        $ids = $request->ids;
        Post::whereIn('id', $ids)->delete();

        return redirect()->back()->with('success', 'Đã xoá các mục đã chọn');
    }
}
