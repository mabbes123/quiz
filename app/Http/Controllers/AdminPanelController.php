<?php

namespace App\Http\Controllers;

use App\Question;
use App\Result;
use App\User;
use Illuminate\Http\Request;

class AdminPanelController extends Controller
{

    public function __construct() {
        $this->middleware('admin');
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $usersCount = User::all()->count();
        $questionsCount = Question::all()->count();
        $resultCount = Result::all()->count();

        return view('adminpanel.index', [
            'usersCount'=>$usersCount,
            'questionsCount'=>$questionsCount,
            'resultCount'=>$resultCount
        ]);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
