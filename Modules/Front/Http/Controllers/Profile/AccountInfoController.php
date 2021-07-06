<?php

namespace Modules\Front\Http\Controllers\Profile;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Ums\Services\UserService;

class AccountInfoController extends Controller
{
    /**
     * @var $userService
     */
    protected $userService;

    /**
     * Constructor
     *
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        // first or create user
        $user = $this->userService->firstOrCreate([
            'id' => auth()->user()->id
        ]);
        // return view
        return view('front::profile.account-info.index', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
			'avatar' => 'sometimes|image|max:1024',
			'email' => 'required',
			'athlete_id' => 'required',
        ]);
        // create user
        $user = $this->userService->update($request->all(), $id);
        // upload files
        $user->uploadFiles();
        // check if user created
        if ($user) {
            // flash notification
            notifier()->success('Your account info updated successfully.');
        } else {
            // flash notification
            notifier()->error('Your account info cannot be updated.');
        }
        // redirect back
        return redirect()->back();
    }
}
