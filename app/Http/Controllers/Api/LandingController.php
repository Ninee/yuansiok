<?php

namespace App\Http\Controllers\Api;

use App\Models\RandWord;
use App\TouTiao;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LandingController extends Controller
{
    public function list()
    {
        $keyword = \request('keyword', '');

        $landings = TouTiao::select(['id', 'remark', 'rand_suffix', 'mp_weixin'])->when($keyword, function ($query) use ($keyword) {
            return $query->where('remark', 'like', '%'.$keyword.'%');
        })
            ->orderBy('id', 'desc')
            ->paginate(30);
        return json_response($landings);
    }

    public function randWord()
    {
        $words = RandWord::all()->pluck('word');
        $count = count($words);
        $arr = [];
        for ($i = 0; $i < 5; $i ++) {
            $one = random_int(0, $count - 1);
            $two = random_int(0, $count - 1);
            $three = random_int(0, $count - 1);
            if ($two == $one) {
                $two = random_int(0, $count - 1);
            }

            array_push($arr, ['word' => $words[$one] . $words[$two] . $words[$three]]);
        }

        return json_response(($arr));
    }

    public function updateWords()
    {
        $landings = \request('landings');
        $words = \request('words');

        foreach ($landings as $landing) {
            $model = TouTiao::find($landing['id']);
            $model->rand_suffix = implode(',', $words);
            $model->save();
        }
        return json_response('ok');
    }
}
