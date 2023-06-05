<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\ProjectFile;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $models = Article::all();
        return view('article.index', compact('models'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $model = new Article();
        return view('article.create', compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $data = $request->validated();
        $model = Article::create([...$data]);
        $mainImg = $request->file('main_img') ?? null;
        $this->storeMainImg($mainImg, $model);
        $files = $request->file('galery');
        foreach ($files as $key => $file) {
            $this->storeGaleryImage($file, $model, $key);
        }


        return to_route('art.edit', $model);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $model)
    {
        return view('article.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $model)
    {
        $model->fill($request->validated())->save();
        $mainImg = $request->file('main_img') ?? null;
        if ($model->mainImg && $mainImg) {
            $model->mainImg->published = false;
            $model->mainImg->save();
        }

        $files = $request->file('galery');
        $model->setRelation('galery', $model->galery->keyBy('position'));
        if ($model->galery && $files) {
            foreach ($model->galery as $key => $item) {
                if (isset($files[$key])) {
                    $item->published = false;
                    $item->save();
                }
            }
        }
        if ($files) {
            foreach ($files as $key => $file) {
                $this->storeGaleryImage($file, $model, $key);
            }
        }

        $this->storeMainImg($mainImg, $model);
        return to_route('art.edit', $model);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }


    /**
     * @param array|\Illuminate\Http\UploadedFile|null $file
     * @param Article $model
     */
    protected function storeMainImg(array|\Illuminate\Http\UploadedFile|null $file, Article $model): void
    {
        if ($file?->isValid()) {
            Storage::putFileAs('public/main_img', $file, $file->getClientOriginalName());
            $pf = new ProjectFile();
            $pf->file_name = $file->getClientOriginalName();
            $pf->ext = $file->getClientOriginalExtension();
            $pf->entity_field = Article::MAIN_IMG;
            $pf->entity_type = 'article';
            $pf->entity_id = $model->id;
            $pf->published = true;
            $pf->save();
        }
    }

    protected function storeGaleryImage(array|\Illuminate\Http\UploadedFile|null $file, Article $model, int $position = 0): void
    {
        if ($file?->isValid()) {
            Storage::putFileAs('public/galery', $file, $file->getClientOriginalName());
            $pf = new ProjectFile();
            $pf->file_name = $file->getClientOriginalName();
            $pf->ext = $file->getClientOriginalExtension();
            $pf->entity_field = Article::GALERY;
            $pf->entity_type = 'article';
            $pf->entity_id = $model->id;
            $pf->published = true;
            $pf->position = $position;
            $pf->save();
        }
    }
}
