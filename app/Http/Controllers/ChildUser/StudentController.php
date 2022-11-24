<?php

namespace App\Http\Controllers\ChildUser;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChildUser\Student\StudentCreateRequest;
use App\Http\Requests\ChildUser\Student\StudentGuardianInfoUpdateRequest;
use App\Http\Requests\ChildUser\Student\StudentInfoUpdateRequest;
use App\Http\Requests\ChildUser\Student\StudentUpdateRequest;
use App\Repositories\Eloquent\ChildUser\StudentRepository;
use App\Services\ChildUser\Student\CreateStudentService;
use App\Services\ChildUser\Student\DeleteStudentService;
use App\Services\ChildUser\Student\UpdateStudentService;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $createStudentService;
    protected $updateStudentService;
    protected $deleteStudentService;
    protected $studentRepository;

    public function __construct(
        CreateStudentService $createStudentService,
        UpdateStudentService $updateStudentService,
        DeleteStudentService $deleteStudentService,
        StudentRepository $studentRepository
    )
    {
        $this->createStudentService = $createStudentService;
        $this->updateStudentService = $updateStudentService;
        $this->deleteStudentService = $deleteStudentService;
        $this->studentRepository = $studentRepository;
    }
    /**
     * @param StudentCreateRequest $request
     *
     * @return [type]
     */
    public function create(StudentCreateRequest $request)
    {
        return response()->json([
            'student' => $this->createStudentService->create($request),
        ],201);
    }
    /**
     * @param int $id
     *
     * @return [type]
     */
    public function getData(int $id)
    {
        return response()->json([
            'student' => $this->studentRepository->findById($id),
        ],200);
    }
    /**
     * @param Request $request
     * @param mixed $id
     *
     * @return [type]
     */
    public function update(StudentUpdateRequest $request, $id)
    {
        $this->updateStudentService->update($request, $id);
        return response()->json([
            'message' => 'Student updated successfully',
        ],200);
    }
    /**
     * @param Request $request
     * @param mixed $id
     *
     * @return [type]
     */
    public function updateInfo(StudentInfoUpdateRequest $request, $id)
    {
        $this->updateStudentService->updateInfo($request, $id);
        return response()->json([
            'message' => 'Student info updated successfully',
        ],200);
    }
    /**
     * @param StudentGuardianInfoUpdateRequest $request
     * @param mixed $id
     *
     * @return [type]
     */
    public function updateGuardian(StudentGuardianInfoUpdateRequest $request, $id)
    {
        $this->updateStudentService->updateGuardian($request, $id);
        return response()->json([
            'message' => 'Student guardian updated successfully',
        ],200);
    }
    /**
     * @param mixed $id
     *
     * @return [type]
     */
    public function delete($id)
    {
        $this->deleteStudentService->delete($id);
        return response()->json([
            'message' => 'Student deleted successfully',
        ],200);
    }

}
