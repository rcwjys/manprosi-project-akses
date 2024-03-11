<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

use Carbon\Carbon;


class EducationController extends Controller
{
    public function educationIndex()
    {
        $posts = Post::all();
        return view('admin.post')->with(compact('posts'));
    }

    public function showEducation(Request $request)
    {
        $post = Post::with('employee')->find($request->post_id);
        return view('admin.detail-post')->with(compact('post'));
    }

    public function addEducation()
    {
        return view('admin.add-education');
    }

    public function storeEducation(Request $request)
    {
        $validatePost = $request->validate([
            'post_title' => ['required', 'unique:posts'],
            'post_body' => ['required'],
            'post_description' => ['required'],
            'employeeId' => ['required']
        ]);

        Post::create($validatePost);

        session()->flash('postSuccessMessage', 'Proses Pembuatan Postingan Berhasil');

        return redirect(url('/education'));
    }

    public function editEducation(Request $request)
    {
        $post = Post::with('employee')->find($request->post_id);
        return view('admin.edit-form-education')->with(compact('post'));
    }

    public function updateEducation(Request $request)
    {
        $post = Post::find($request->post_id);
        $post->post_title = $request->post_title;
        $post->post_body = $request->post_body;
        $post->post_description = $request->post_description;
        $post->update();

        session()->flash('postUpdate', 'Data Postingan Berhasil Di Perbaharui');

        return redirect(url('/education/detail-post/' . $request->post_id));
    }

    public function destroyEducation(Request $request)
    {
        $post = Post::find($request->post_id);
        $post->delete();

        session()->flash('postDeleted', 'Data Postingan Berhasil Di Hapus');

        return redirect(url('/education'));
    }

    // * Customer Section

    public function customerIndex()
    {
        $posts = Post::all();
        return view('customer.education-page')->with(compact('posts'));
    }

    public function educationDetail(Request $request)
    {
        $post = Post::with('employee')->find($request->post_id);
        $uploadDate = Carbon::parse($post->created_at)->format('d F Y');
        return view('customer.education-detail')->with(compact(['post', 'uploadDate']));
    }
}
