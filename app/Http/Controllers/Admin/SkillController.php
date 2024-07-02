<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SkillController extends Controller
{
    public function skillView(Request $request)
    {

        //$this->data['name'] = 'Nasim Redoy'; // assign value this way

        if (!$request->ajax()) {
            return view('backend.skill.skill',$this->data);
        }

        $data = $this->searchFilter();
        return $this->renderViewDataTable($data);
    }

    private function searchFilter()
    {

        return  Skill::query()
            ->when(request('searchFromDate') && request('searchToDate'), function ($query)  {
                $startDate = Carbon::parse(request('searchFromDate'));
                $endDate = Carbon::parse(request('searchToDate'))->endOfDay();
                return $query->whereBetween('created_at', [$startDate,$endDate]);
            })
            ->when(request('searchName'), function ($query) {
                return $query->where(function ($query) {
                    $searchQuery = request('searchName');
                    $query->where('name', 'LIKE', '%' . $searchQuery . '%');
                });
            })
            ->orderBy('id','desc');
    }

    private function renderViewDataTable($data)
    {
        return DataTables::eloquent($data)
            ->addIndexColumn()
            ->addColumn('formatted_created_at', function ($data) {
                return Carbon::parse($data->created_at)->format('d F, Y');
            })
            ->addColumn('statusBtn','backend.skill.statusBtn')
            ->addColumn('actionBtn','backend.skill.actionBtn')
            ->rawColumns(['statusBtn', 'actionBtn'])
            ->toJson();
    }


    public function store(Request $request)
    {
        list($rules, $customMessages) = $this->validationRulesAndMessages('add',null);

        $error = Validator::make($request->all(), $rules, $customMessages);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }


        $skill = new Skill();
        $skill->name = $request->name;
        $skill->percentage = $request->percentage;
        $skill->status = $request->status;

        if (!$skill->save())
            return  response()->json(['message' => 'Skill Failed to Save!'], Response::HTTP_BAD_REQUEST);

        return  response()->json(['message' => 'Skill Saved Successfully!']);
    }

    public function update(Request $request, Skill $skill)
    {
        list($rules, $customMessages) = $this->validationRulesAndMessages(null,$skill->id);

        $error = Validator::make($request->all(), $rules, $customMessages);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $skill->name = $request->name;
        $skill->percentage = $request->percentage;
        $skill->status = $request->status;

        if (!$skill->save())
            return  response()->json(['message' => 'Skill Failed to Update!'], Response::HTTP_BAD_REQUEST);

        return  response()->json(['message' => 'Skill Updated Successfully!']);
    }

    private function validationRulesAndMessages($type,$id)
    {
        $rules = [
            'percentage' => 'required|numeric|min:40|max:99',
            'status' => 'required',
        ];

        $customMessages = [
            'description.required' => 'Description field is required.',
        ];


        if ($type === 'add') {
            $rules = array_merge($rules, [
                'name' => ['required','string',Rule::unique('skills','name')],
            ]);
            $customMessages = array_merge($customMessages, [
                'name.required' => 'Name field is required.',
            ]);
        }

        if (!is_null($id)) {
            $rules = array_merge($rules, [
                'name' => ['required','string',Rule::unique('skills','name')->ignore($id)],
            ]);
            $customMessages = array_merge($customMessages, [
                'name.required' => 'Name field is required.',
            ]);
        }
        return [$rules, $customMessages];
    }


    public function getSkillById(Skill $skill)
    {
        //$category->description = $category->description;
        return response()->json(['skill' => $skill]);
    }

    public function skillStatusChangeById(Request $request)
    {
        $category = Skill::findOrFail($request->skillId);

        $updatedStatus = intval($category->status) === Skill::STATUS['active'] ? Skill::STATUS['inactive'] : Skill::STATUS['active'];

        $category->status = $updatedStatus;

        if (!$category->save())
            return  response()->json(['message' => 'Status Failed to Update!'], Response::HTTP_BAD_REQUEST);

        return  response()->json(['message' => 'Status Updated Successfully!']);
    }

    public function skillDeleteById(Request $request)
    {
        $skill = Skill::findOrFail($request->skillId);

        if (!$skill->delete())
            return  response()->json(['message' => 'Skill Failed to Delete!'], Response::HTTP_BAD_REQUEST);

        return  response()->json(['message' => 'Skill Deleted Successfully!']);
    }

}
