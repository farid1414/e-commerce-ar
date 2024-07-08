<?php

namespace App\Http\Controllers\Master;

use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Master\RatingBalasan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RatingController extends Controller
{
    const ROUTE = 'master.rating.';

    public function __construct()
    {
        view()->share('this_helper', self::ROUTE);
    }

    public function index()
    {
        $rating = Rating::orderBy('created_at', 'desc')->with('balasan')->get();

        $balasan = 0;
        $belum_balas = 0;
        $balasan = $rating->reduce(function ($carry, $item) {
            if ($item->balasan) {
                $carry += 1;
            }
            return $carry;
        }, 0);

        $belum_balas = $rating->reduce(function ($carry, $item) {
            if (!$item->balasan) {
                $carry += 1;
            }
            return $carry;
        }, 0);


        return view('admin.ratingdanulasan', [
            'rating' => $rating,
            'balasan' => $balasan,
            'belumBalas' => $belum_balas
        ]);
    }

    public function data(Request $request)
    {
        // dd($request->all());
        $rating = Rating::query()->with('balasan');
        if ($request->filter) {
            $filter = $request->filter;
            if ($filter == 'terbaru') {
                $rating = $rating->orderBy('created_at', 'asc');
            } elseif ($filter == 'terlama') {
                $rating = $rating->orderBy('created_at', 'desc');
            } elseif ($filter == 'tinggi') {
                $rating = $rating->orderBy('rating_value', 'desc');
            } elseif ($filter == 'terendah') {
                $rating = $rating->orderBy('rating_value', 'asc');
            }
        } else {
            $rating = $rating->orderBy('created_at', 'asc');
        }

        $rating = $rating->get();

        $rating = $rating->map(function ($rat) use ($request) {
            if ($rat->image) {
                $rat->image = url($rat->image);
            }
            $rat->text = nl2br($rat->text_value);
            $rat->name = $rat->user->name;
            $rat->create = $rat->dateFull();
            $rat->product_image = url($rat->product->thumbnail);

            if ($request->search) {
                if ($request->search == 'belum-dibalas') {
                    if (!$rat->balasan) {
                        return $rat;
                    }
                } elseif ($request->search == 'dibalas') {
                    if ($rat->balasan) {
                        $rat->balasan->create = $rat->balasan->created_date();
                        return $rat;
                    }
                }
            } else {
                return $rat;
            }
        });
        $rating = array_filter($rating->toArray(), function ($element) {
            return $element !== null;
        });
        return JSON_RESPONSE("Get data rating", $rating);
    }

    public function balasanRating(Request $request)
    {
        if (!empty($request->id)) return $this->update($request);
        $data = [
            'rating_id' => $request->rating_id,
            'balasan' => $request->balasan,
            'user_id' => Auth::user()->id
        ];

        $validate = Validator::make($data, RatingBalasan::RULES, RatingBalasan::MESSAGE, []);
        if ($validate->fails()) return ERROR_RESPONSE("Error validation", $validate->getMessageBag()->first() ?? null, Response::HTTP_UNPROCESSABLE_ENTITY);

        try {
            DB::beginTransaction();
            RatingBalasan::create($data);
            DB::commit();
            return JSON_RESPONSE("Succes save balasan rating");
        } catch (\Throwable $th) {
            DB::rollBack();
            return ERROR_RESPONSE("Failed to create product {$request->name} ", $th->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(Request $request)
    {
        $balasan = RatingBalasan::findOrFail($request->id);

        $data = [
            'rating_id' => $request->rating_id,
            'balasan' => $request->balasan,
            'user_id' => Auth::user()->id
        ];

        $validate = Validator::make($data, RatingBalasan::RULES, RatingBalasan::MESSAGE, []);
        if ($validate->fails()) return ERROR_RESPONSE("Error validation", $validate->getMessageBag()->first() ?? null, Response::HTTP_UNPROCESSABLE_ENTITY);

        try {
            DB::beginTransaction();
            $balasan->update($data);
            DB::commit();
            return JSON_RESPONSE("Succes update balasan");
        } catch (\Throwable $th) {
            DB::rollBack();
            return ERROR_RESPONSE("Failed to create product {$request->name} ", $th->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
