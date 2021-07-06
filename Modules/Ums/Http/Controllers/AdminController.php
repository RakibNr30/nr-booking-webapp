<?php

namespace Modules\Ums\Http\Controllers;

use App\Http\Controllers\Controller;

// requests...
use Carbon\Carbon;
use Modules\Ums\DataTables\AdminDataTable;
use Modules\Ums\Http\Requests\AdminStoreRequest;
use Modules\Ums\Http\Requests\AdminUpdateRequest;

// services...
use Modules\Ums\Services\UserPersonalInfoService;
use Modules\Ums\Services\UserService;

class AdminController extends Controller
{
    /**
     * @var $userService
     */
    protected $userService;

    /**
     * @var $personalInfoService
     */
    protected $userPersonalInfoService;

    /**
     * Constructor
     *
     * @param UserService $userService
     * @param UserPersonalInfoService $userPersonalInfoService
     */
    public function __construct(UserService $userService, UserPersonalInfoService $userPersonalInfoService)
    {
        $this->userService = $userService;
        $this->userPersonalInfoService = $userPersonalInfoService;
    }

    /**
     * User list
     *
     * @param AdminDataTable $datatable
     * @return \Illuminate\View\View
     */
    public function index(AdminDataTable $datatable)
    {
        return $datatable->render('ums::admin.index');
    }

    /**
     * Create user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // return view
        return view('ums::admin.create');
    }

    /**
     * Store user
     *
     * @param AdminStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AdminStoreRequest $request)
    {
        // get data
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $data['approved_at'] = Carbon::now();
        $data['approved_by'] = auth()->user()->id;
        // create user
        $user = $this->userService->create($data);
        // assign roles
        $user->assignRole(['Admin']);
        // upload files
        $user->uploadFiles();
        // check if user created
        if ($user) {
            $data['user_id'] = $user->id;
            $data['personal_email'] = $user->email;
            $personalInfo = $this->userPersonalInfoService->create($data);
            if ($personalInfo) {
                // flash notification
                notifier()->success('Admin added successfully.');
            } else {
                // flash notification
                notifier()->error('Admin cannot be added successfully.');
            }
        } else {
            // flash notification
            notifier()->error('Admin cannot be added successfully.');
        }
        // redirect back
        return redirect()->back();
    }

    /**
     * Show user.
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        // get user
        $user = $this->userService->find($id);
        // check if user doesn't exists
        if (empty($user)) {
            // flash notification
            notifier()->error('Admin not found!');
            // redirect back
            return redirect()->back();
        }
        // return view
        return view('ums::admin.show', compact('user'));
    }

    /**
     * Show user.
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        // get user
        $user = $this->userService->find($id);
        // check if user doesn't exists
        if (empty($user)) {
            // flash notification
            notifier()->error('Admin not found!');
            // redirect back
            return redirect()->back();
        }
        // return view
        return view('ums::admin.edit', compact('user'));
    }

    /**
     * Update user
     *
     * @param AdminUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AdminUpdateRequest $request, $id)
    {
        // get user
        $user = $this->userService->find($id);
        // check if user doesn't exists
        if (empty($user)) {
            // flash notification
            notifier()->error('Admin not found!');
            // redirect back
            return redirect()->back();
        }
        // get data
        $data = $request->all();
        // upload files
        $user->uploadFiles();
        // update user
        $user = $this->userService->update($data, $id);
        // check if user updated
        if ($user) {
            $data['personal_email'] = $user->email;
            $personalInfo = $this->userPersonalInfoService->updateOrCreate(['user_id' => $user->id], $data);
            if ($personalInfo) {
                // flash notification
                notifier()->success('Admin updated successfully.');
            } else {
                // flash notification
                notifier()->error('Admin cannot be updated successfully.');
            }
        } else {
            // flash notification
            notifier()->error('Admin cannot be updated successfully.');
        }
        // redirect back
        return redirect()->back();
    }

    /**
     * Delete user
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // get user
        $user = $this->userService->find($id);
        // check if user doesn't exists
        if (empty($user)) {
            // flash notification
            notifier()->error('Admin not found!');
            // redirect back
            return redirect()->back();
        }
        // delete user
        if ($this->userService->delete($id)) {
            // flash notification
            notifier()->success('Admin deleted successfully.');
        } else {
            // flash notification
            notifier()->success('Admin cannot be deleted successfully.');
        }
        // redirect back
        return redirect()->back();
    }
}
