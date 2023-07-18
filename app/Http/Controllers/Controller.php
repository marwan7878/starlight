<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function description_search($request , $column , $Model , $view , $return_data_name , $archive_flag , $page)
    {
        $description = $request->$column;
    
        if($description == "")
            return redirect()->route($view.'.'.$page)->with('search_flag',true)->with('search_flag2',false);
        
        $words = explode(" ", $description);
        $flag = false;
        $arr = array();
        $indecies_of_words = array();
        $index_of_max = array();
        if($archive_flag == false)
            $ids = $Model::pluck('id');
        else
            $ids = $Model::onlyTrashed()->pluck('id');
        
        for ($i = 0; $i < count($ids); $i++)
            array_push($arr ,[$ids[$i],0]);
        
        $c = 0;
        for ($i = 0; $i < count($words); $i++)
        {
            if ($archive_flag == false)
                $index = $Model::where($column, 'LIKE', '%'.$words[$i].'%')->pluck('id');
            else
                $index = $Model::onlyTrashed()->where($column, 'LIKE', '%'.$words[$i].'%')->pluck('id');
            for ($x = 0; $x < count($index); $x++)
            {
                for ($m = 0; $m < count($ids); $m++)
                {
                    if($index[$x] == $ids[$m])
                    {
                        $arr[$m][1]++;
                        $indecies_of_words[ $ids[$m] ][$c] = $words[$i];
                        $c++;
                    }
                }        
            }                
        }
        foreach ($indecies_of_words as &$row)
            $row = array_values($row);
        
        
        
        if($index->count() == 0)
            return view($view.'.'.$page)->with($return_data_name , $index)->with('search_flag',false);

        
        $max = 0;
        for($j = 0; $j < count($ids); $j++)
        {
            $i = 0;
            foreach($arr as $element)
            {
                if($element[1] > $max)
                {
                    $flag = true;
                    $max = $element[1];
                    $index = $i;
                }
                $i++;
            }
            if($flag)
                array_push($index_of_max,$arr[$index][0]);

            $arr[$index][1] = -100000;
            $max = 0;
            $flag = false;
        }
        
        if($archive_flag == false)
        {
            $ret_data = $Model::whereIn('id',$index_of_max)
                ->orderByRaw($Model::raw("FIELD(id, ".implode(",", $index_of_max).")"))
                ->paginate(10);
        }
        else
        {
            $ret_data = $Model::onlyTrashed()->whereIn('id',$index_of_max)
                ->orderByRaw($Model::raw("FIELD(id, ".implode(",", $index_of_max).")"))
                ->paginate(10);
        }

        if($column == 'title')
        {
            return view($view.'.'.$page)->with($return_data_name ,$ret_data)->with('search_flag',true)
                ->with('search_flag2' , true)
                ->with('indecies_of_words',$indecies_of_words);
        }
        return view($view.'.'.$page)->with($return_data_name ,$ret_data)->with('search_flag',true)
            ->with('search_flag2' , false)
            ->with('indecies_of_words',$indecies_of_words);
    }
  
}
