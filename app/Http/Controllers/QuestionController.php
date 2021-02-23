<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Options;
use App\Question;
use App\Topic;
use Illuminate\Http\Request;

class QuestionController extends Controller
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

        $questions = Question::all();

        return view('questions.index', ['questions'=>$questions]);
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
    public function store(StoreQuestionRequest $request)
    {
        //
        $topicID = $request->input('topic');
        $questionText = $request->input('question');
        $optionArray = $request->input('options');
        $correctOptions = $request->input('correct');

        $question = new Question();
        $question->topic_id = $topicID;
        $question->question_text = $questionText;
        $question->save();

        $questionToAdd = Question::latest()->first();;
        $questionID = $questionToAdd->id;

        foreach ($optionArray as $index => $opt) {
            $option = new Options();
            $option->question_id = $questionID;
            $option->option = $opt;
            foreach ($correctOptions as $correctOption) {
                if($correctOption == $index+1) {
                    $option->correct = 1;
                }
            }

            $option->save();
        }

        return redirect()->back();
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)

    {
        //

        $question = Question::find($id);

        return view('questions.show', ['question'=>$question]);
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $question = Question::find($id);
        $topics = Topic::all();

        return view('questions.edit', ['question'=>$question, 'topics'=>$topics]);

    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuestionRequest $request, $id)
    {
        //
        $topicID = $request->input('topic_id');
        $questionText = $request->input('question_text');

        $question = Question::find($id);
        $question->topic_id = $topicID;
        $question->question_text = $questionText;
        $question->save();


        return redirect(route('questions.index'));
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $question = Question::find($id);
        $question->delete();

        return redirect(route('questions.index'));

    }
}
