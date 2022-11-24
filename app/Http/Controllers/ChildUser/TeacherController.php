<?php

namespace App\Http\Controllers\ChildUser;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChildUser\Teacher\TeacherCreateRequest;
use App\Http\Requests\ChildUser\Teacher\TeacherInfoUpdateRequest;
use App\Http\Requests\ChildUser\Teacher\TeacherOtherUpdateRequest;
use App\Http\Requests\ChildUser\Teacher\TeacherUpdateRequest;
use App\Repositories\Eloquent\ChildUser\TeacherRepository;
use App\Services\ChildUser\Teacher\CreateTeacherService;
use App\Services\ChildUser\Teacher\DeleteTeacherService;
use App\Services\ChildUser\Teacher\UpdateTeacherService;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    protected $createTeacherService;
    protected $updateTeacherService;
    protected $deleteTeacherService;
    protected $teacherRepository;

    public function __construct(
        CreateTeacherService $createTeacherService,
        UpdateTeacherService $updateTeacherService,
        DeleteTeacherService $deleteTeacherService,
        TeacherRepository $teacherRepository
    )
    {
        $this->createTeacherService = $createTeacherService;
        $this->updateTeacherService = $updateTeacherService;
        $this->deleteTeacherService = $deleteTeacherService;
        $this->teacherRepository = $teacherRepository;
    }
    /**
     * @param Request $request
     *
     * @return [type]
     */
    public function create(TeacherCreateRequest $request)
    {
        return response()->json([
            'teacher' => $this->createTeacherService->create($request),
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
            'teacher' => $this->teacherRepository->findById($id),
        ],200);
    }
    /**
     * @param Request $request
     * @param int $id
     *
     * @return [type]
     */
    public function update(TeacherUpdateRequest $request, int $id)
    {
        $this->updateTeacherService->update($request, $id);
        return response()->json([
            'teacher' => $this->teacherRepository->findById($id),
        ],200);
    }
    /**
     * @param Request $request
     * @param int $id
     *
     * @return [type]
     */
    public function updateInfo(TeacherInfoUpdateRequest $request, int $id)
    {
        $this->updateTeacherService->updateInfo($request, $id);
        return response()->json([
            'teacher' => $this->teacherRepository->findById($id),
        ],200);
    }
    /**
     * @param Request $request
     * @param int $id
     *
     * @return [type]
     */
    public function updateOther(TeacherOtherUpdateRequest $request, int $id)
    {
        $this->updateTeacherService->updateOther($request, $id);
        return response()->json([
            'teacher' => $this->teacherRepository->findById($id),
        ],200);
    }
    /**
     * @param int $id
     *
     * @return [type]
     */
    public function delete(int $id)
    {
        $this->deleteTeacherService->delete($id);
        return response()->json([
            'message' => 'Teacher deleted successfully',
        ],200);
    }
}
