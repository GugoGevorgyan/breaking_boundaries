<?php


namespace App\Services;


use App\Http\Requests\News\UpdateRequest;
use App\Models\News;
use App\Repositories\NewsRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Request;

class NewsService
{
    /**
     * @var NewsRepository
     */
    protected NewsRepository $newsRepository;
    /**
     * @var NewsImageService
     */
    protected NewsImageService $newsImageService;

    /**
     * TeamService constructor.
     * @param NewsRepository $newsRepository
     * @param NewsImageService $newsImageService
     */

    public function __construct(NewsRepository $newsRepository, NewsImageService $newsImageService)
    {
        $this->newsRepository = $newsRepository;
        $this->newsImageService = $newsImageService;

    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model|null
     */
    public function get()
    {
        return $this->newsRepository->get();
    }

    /**
     * @param $filters
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model|null
     */

    public function show($filters)
    {
        $filters = intval($filters);
        return $filters ? $this->newsRepository->get($filters) : null;
    }

    /**
     * @param $request
     */

    public function create($request)
    {
        $news = $this->newsRepository->create($request,['link', 'title', 'description', 'view']);
        if ($news->id && $request["image"] && !empty($request["image"])){
            $this->newsImageService->create($request, $news);
        }
        return $news;
    }

    /**
     * @param UpdateRequest $request
     * @param News $news
     * @return Model
     */

    public function update(UpdateRequest $request,News $news)
    {

            $updateNews =  $this->newsRepository->update($request->all(), $news);

//        if ($news->id && $request["image"] && !empty($request["image"])){
//            $this->newsImageService->update($request, $news);
//        }

        return $updateNews;
    }

    /**
     * @param News $news
     * @return bool|null
     * @throws \Exception
     */

    public function delete(News $news)
    {
            return $this->newsRepository->delete($news);
    }

}
