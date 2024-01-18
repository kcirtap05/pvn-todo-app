<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use App\Http\Requests\ValidationRequest;
use Image;

class TodosController extends Controller
{

   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jsonData = file_get_contents(
            "https://jsonplaceholder.typicode.com/todos");
        $data = json_decode($jsonData, TRUE);
        $array = [];
        foreach($data as $key => $test)
        {
            $array[$key]['id'] = $test['id'];
            $array[$key]['title'] = $test['title'];
           
        }
		return response()->json([
			'StatusCode'=> 1,
			'StatusDescription'=> 'success',
			'body'=> $array
		], 200);
        return view('todos.index', compact('todos'));
       
    }

    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidationRequest $request)
    { 
        $imageName = time().'.'.$request->image->extension();  
        
        $request->image->move(public_path('images'), $imageName);
        
        $todo = Todo::create(
            $request->all()
        );
        $todo->image =  $request->get('image', $imageName);
      
        if($todo->save())
        {
            return response()->json([
                'data' =>$todo,
                'msg' => 'Saved',
            ],
                        
            201);
        }
        else
        {
            return response()->json([
                'data' =>$todo,
                'msg' => 'Failed',
            ],
            400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        return $todo;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::findOrFail($id);
        return view('todos.edit', compact('todo'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        return $request->all();
        
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);
        $image = $imageName;
        
        $input = array();
        $input = $request->all();
        $input['image'] = $image;
       
        
        $todo->update($input);
        return response()->json($todo, 200);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
    public function delete(Request $request, Todo $todo) {
        // dd($id);
        $todo->delete();
        if($todo)
        {
            $todo->delete();
            return response()->json(null, 204); 
        }
        else
        {
            return response()->json(null, 403); 
        }
    }
}
