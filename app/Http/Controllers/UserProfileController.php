<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserProfileRequest;
use App\Http\Requests\UpdateUserProfileRequest;
use App\Models\ProjectFile;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $models = UserProfile::all();
        return view('user_profile.index', compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $model = new UserProfile();
        return view('user_profile.create', compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserProfileRequest $request)
    {
        $data = $request->validated();

        /** @var UserProfile $model */
        $model = UserProfile::create([...$data]);
        $contractPdf = $request->file('contract_pdf') ?? null;
        $this->storeContract($contractPdf, $model);
        $avatarImg = $request->file('avatar_img') ?? null;
        $this->storeAvatar($avatarImg, $model);
        $avatarImg = $request->file('id_scan_img') ?? null;
        $this->storeIdScan($avatarImg, $model);

        return to_route('up.edit', $model);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserProfile $model)
    {
        return view('user_profile.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserProfileRequest $request, UserProfile $model)
    {
        $model->fill($request->validated())->save();

        $contractPdf = $request->file('contract_pdf') ?? null;
        if ($model->contractPdf && $contractPdf) {
            $model->contractPdf->published = false;
            $model->contractPdf->save();
        }
        $this->storeContract($contractPdf, $model);

        $avatarImg = $request->file('avatar_img') ?? null;
        if ($model->avatarImg && $avatarImg) {
            $model->avatarImg->published = false;
            $model->avatarImg->save();
        }
        $this->storeAvatar($avatarImg, $model);

        $avatarImg = $request->file('id_scan_img') ?? null;
        if ($model->idScanImg && $avatarImg) {
            $model->idScanImg->published = false;
            $model->idScanImg->save();
        }
        $this->storeIdScan($avatarImg, $model);


        return to_route('up.edit', $model);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserProfile $userProfile)
    {
        //
    }

    /**
     * @param array|\Illuminate\Http\UploadedFile|null $file
     * @param UserProfile $model
     */
    protected function storeContract(array|\Illuminate\Http\UploadedFile|null $file, UserProfile $model): void
    {
        if ($file?->isValid()) {
            Storage::putFileAs('public/contract_pdf', $file, $file->getClientOriginalName());
            $pf = new ProjectFile();
            $pf->file_name = $file->getClientOriginalName();
            $pf->ext = $file->getClientOriginalExtension();
            $pf->entity_field = UserProfile::CONTRACT_PDF;
            $pf->entity_type = 'profile';
            $pf->entity_id = $model->id;
            $pf->published = true;
            $pf->save();
        }
    }

    protected function storeAvatar(array|\Illuminate\Http\UploadedFile|null $file, UserProfile $model): void
    {
        if ($file?->isValid()) {
            Storage::putFileAs('public/avatar_img', $file, $file->getClientOriginalName());
            $pf = new ProjectFile();
            $pf->file_name = $file->getClientOriginalName();
            $pf->ext = $file->getClientOriginalExtension();
            $pf->entity_field = UserProfile::AVATAR_IMG;
            $pf->entity_type = 'profile';
            $pf->entity_id = $model->id;
            $pf->published = true;
            $pf->save();
        }
    }

    protected function storeIdScan(array|\Illuminate\Http\UploadedFile|null $contractPdf, UserProfile $model): void
    {
        if ($contractPdf?->isValid()) {
            Storage::putFileAs('public/id_scan_img', $contractPdf, $contractPdf->getClientOriginalName());
            $pf = new ProjectFile();
            $pf->file_name = $contractPdf->getClientOriginalName();
            $pf->ext = $contractPdf->getClientOriginalExtension();
            $pf->entity_field = UserProfile::ID_SCAN_IMG;
            $pf->entity_type = 'profile';
            $pf->entity_id = $model->id;
            $pf->published = true;
            $pf->save();
        }
    }


}
