<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class EvaluateAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_evaluate = Comment::with('typeroom')->paginate(5);

        return view('pages.admin.listEvaluate', compact('data_evaluate'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function update_status(Request $request)
    {
        $data = $request->all();
        if (isset($data['id_comment']) && isset($data['status_comment'])) {
            $result = Comment::where('id', $data['id_comment'])->update(['status' => $data['status_comment']]);

            if ($result) {
                return redirect()->back()->with('success', 'Update Status Comment Success');
            } else {
                return redirect()->back()->with('error', 'Update Status Comment Fail');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid Data');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function delete_comment(Request $request)
    {
        $id = $request->id_comment;

        if (isset($id)) {
            $result = Comment::where('id', $id)->delete();

            if ($result) {
                return redirect()->back()->with('success', 'Delete Comment Success');
            } else {
                return redirect()->back()->with('error', 'Delete Comment Fail');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid Comment ID');
        }
    }

    /**
     * Display the specified resource.
     */
    public function search_comment(Request $request)
    {
        $rate = $request->rate;

        if (isset($rate)) {
            $data_evaluate = Comment::where('rate', $rate)->paginate(5);

            if ($data_evaluate) {
                return view('pages.admin.listEvaluate', compact('data_evaluate'));
            } else {
                return redirect()->back()->with('error', 'Comment Not Found');
            }
        }
    }
}
