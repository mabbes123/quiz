<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTopicRequest;
use App\Http\Requests\UpdateTopicRequest;
use App\Question;
use App\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin')->except(['index', 'show']);


    }
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $topics = Topic::all();

        return view('topics.index', ['topics' => $topics]);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $topics = Topic::all();

        return view('topics.create', ['topics'=>$topics]);
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTopicRequest $request)
    {
        //

        $topic = new Topic();
        $topic->title = $request->input('title');
        $topic->save();

        return redirect(route('topics.index'));
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $topic = Topic::find($id);

        return view('topics.show', ['topic' => $topic]);
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $topic = Topic::find($id);

        return view('topics.edit', ['topic'=>$topic]);
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTopicRequest $request, $id)
    {
        //
        $topic = Topic::find($id);
        $topic->title = $request->input('title');
        $topic->save();

        return redirect(route('topics.index'));
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $topic = Topic::find($id);
        $topic->delete();

        return redirect(route('topics.index'));
    }
}
