<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Http\Requests\School\SchoolCreateRequest;
use App\Http\Requests\School\SchoolUpdateRequest;
use App\Repositories\Eloquent\ChildUser\SchoolRepository;
use App\Services\ChildUser\School\CreateSchoolService;
use App\Services\ChildUser\School\DeleteSchoolService;
use App\Services\ChildUser\School\updateSchoolService;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    protected $schoolRepository;
    protected $createSchoolService;
    protected $updateSchoolService;
    protected $deleteSchoolService;

    public function __construct(
        SchoolRepository $schoolRepository,
        CreateSchoolService $createSchoolService,
        updateSchoolService $updateSchoolService,
        DeleteSchoolService $deleteSchoolService
    ) {
        $this->schoolRepository = $schoolRepository;
        $this->createSchoolService = $createSchoolService;
        $this->updateSchoolService = $updateSchoolService;
        $this->deleteSchoolService = $deleteSchoolService;
    }
    public function create(SchoolCreateRequest $request)
    {
        $school = $this->createSchoolService->create($request);
        return response()->json([
            'school' => $school,
        ],201);
    }
    /**
     * @param SchoolUpdateRequest $request
     * @param mixed $id
     *
     * @return [type]
     */
    public function update(SchoolUpdateRequest $request, $id)
    {
         $this->updateSchoolService->update($request, $id);
        return response()->json([
            'message' => 'School updated successfully',
        ],201);
    }
    /**
     * @param int $id
     *
     * @return [type]
     */
    public function delete(int $id)
    {
         $this->deleteSchoolService->delete($id);
        return response()->json([
            'message' => 'School deleted successfully',
        ],200);
    }

}
