<?php


namespace App\Services;


use App\Http\Requests\News\UpdateRequest;
use App\Http\Requests\News_image\CreateRequest;
use App\Models\News;
use App\Models\News_image;
use App\Models\User;
use App\Repositories\NewsImageRepository;
use App\Repositories\NewsRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class NewsImageService
{

    use ImgFile;

    /**
     * @var NewsImageRepository
     */
    protected NewsImageRepository $newsImageRepository;


    /**
     * NewsImageService constructor.
     * @param NewsImageRepository $newsImageRepository
     */

    public function __construct(NewsImageRepository $newsImageRepository)
    {
        $this->newsImageRepository = $newsImageRepository;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model|null
     */
    public function get()
    {
        return $this->newsImageRepository->get();
    }

    /**
     * @param $filters
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model|null
     */

    public function show($filters)
    {
        $filters = intval($filters);
        return $filters ? $this->newsImageRepository->get($filters) : null;
    }

    /**
     * @param $request
     * @param News $news
     * @return Model|mixed
     */

    public function create(CreateRequest $request, News $news)
    {
//dd(gettype($request["image"]));
        if (gettype($request["image"] === "array")){
            foreach ($request["image"] as $img){
                $image = $this->createFile($img, 'news');
                $this->newsImageRepository->create(array_merge($request,
                    [
                        'image' => $image,
                        'news_id' => $news['id'],
                        'admin_id' => Auth::id()
                    ]
                ));
            }

        }elseif(gettype($request["image"] === "string")){
            $image = $this->createFile($request['image'], 'news');
            return $this->newsImageRepository->create(array_merge($request,
                [
                    'image' => $image,
                    'news_id' => $news['id'],
                    'admin_id' => Auth::id()
                ]
            ));
        }
    }

//    /**
//     * @param UpdateRequest $request
//     * @param News_image $news
//     * @return mixed
//     */

//    public function update(UpdateRequest $request,News_image $news)
//    {
//        if (gettype($request["image"] === "array")){
//            foreach ($request["image"] as $img){
//                $image = $this->updateFile($img, $news,'news');
//                $this->newsImageRepository->update([
//                        'image' => $image,
//                        'admin_id' => Auth::id()
//                    ],
//                );
//            }
//
//        }elseif(gettype($request["image"] === "string")){
//            $image = $this->createFile($request['image'], 'news');
//            return $this->newsImageRepository->create(array_merge($request,
//                [
//                    'image' => $image,
//                    'news_id' => $news['id'],
//                    'admin_id' => Auth::id()
//                ]
//            ));
//        }
//    }
//
    /**
     * @param News_image $news_image
     * @return bool|null
     * @throws \Exception
     */

    public function delete(News_image $news_image)
    {
            return $this->newsImageRepository->delete($news_image);
    }

}
