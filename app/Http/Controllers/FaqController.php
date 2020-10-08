<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faq = Faq::all();
        return view('faq', compact('faq'));
    }

    public function create()
    {
        return view('faq_create');
    }
    public function store()
    {
        $faq = new Faq();
        $faq->question = request('question');
        $faq->answer = request('answer');
        $faq->save();
    }
    public function edit(Faq $faq)
    {
        return view('faq_edit', compact('faq'));
    }

    public function put(Faq $faq)
    {
        $faq->question = request('question');
        $faq->answer = request('answer');
        $faq->save();
        return redirect('/faq');
    }

    public function delete(Faq $faq)
    {
        $faq->delete();
        return redirect('/faq');
    }

}
