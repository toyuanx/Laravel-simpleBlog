<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Comment;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }
	
	public function edit($id)
    {
        return view('admin/comment/edit')->withComment(Comment::find($id));
    }
	
	public function comment()
    {
		return view('admin.comment.index')->withComments(Comment::with('hasOneArticle')->get());
    }
	
	public function destroy($id)
    {
        Comment::find($id)->delete();
        return redirect()->back()->withInput()->withErrors('删除成功！');
    }
	
	public function update(Request $request, $id)
    {
		 $this->validate($request, [
            'nickname' => 'required|max:255',
            'article_id' => 'required', 
        ]);
        $comment = Comment::find($id);
		$comment->nickname = $request->get('nickname');
		$comment->email = $request->get('email');
		$comment->website = $request->get('website');
		$comment->content = $request->get('content');
		$comment->article_id = $request->get('article_id');
		
        if ($comment ->save()) {
            return redirect('admin/comment');
        } else {
            return redirect()->back()->withInput()->withErrors('更新失败！');
        }
    }
}
