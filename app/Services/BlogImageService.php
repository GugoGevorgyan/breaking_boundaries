<?php


namespace App\Services;


use App\Http\Requests\blog\UpdateRequest;
use App\Models\blog;
use App\Models\blog_image;
use App\Models\User;
use App\Repositories\BlogImageRepository;
use App\Repositories\blogRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class BlogImageService
{

    use ImgFile;

    /**
     * @var BlogImageRepository
     */
    protected BlogImageRepository $blogImageRepository;


    /**
     * blogImageService constructor.
     * @param BlogImageRepository $blogImageRepository
     */

    public function __construct(BlogImageRepository $blogImageRepository)
    {
        $this->blogImageRepository = $blogImageRepository;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model|null
     */
    public function get()
    {
        return $this->blogImageRepository->get();
    }

    /**
     * @param $filters
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model|null
     */

    public function show($filters)
    {
        $filters = intval($filters);
        return $filters ? $this->blogImageRepository->get($filters) : null;
    }

    /**
     * @param $request
     * @param blog $blog
     * @return Model|mixed
     */

    public function create($request, blog $blog)
    {
//dd(gettype($request["image"]));
        if (gettype($request["image"] === "array")){
            foreach ($request["image"] as $img){
                $image = $this->createFile($img, 'blog');
                $this->blogImageRepository->create(array_merge($request,
                    [
                        'image' => $image,
                        'blog_id' => $blog['id'],
                        'admin_id' => Auth::id()
                    ]
                ));
            }

        }elseif(gettype($request["image"] === "string")){
            $image = $this->createFile($request['image'], 'blog');
            return $this->blogImageRepository->create(array_merge($request,
                [
                    'image' => $image,
                    'blog_id' => $blog['id'],
                    'admin_id' => Auth::id()
                ]
            ));
        }
    }

//    /**
//     * @param UpdateRequest $request
//     * @param blog_image $blog
//     * @return mixed
//     */

//    public function update(UpdateRequest $request,blog_image $blog)
//    {
//        if (gettype($request["image"] === "array")){
//            foreach ($request["image"] as $img){
//                $image = $this->updateFile($img, $blog,'blog');
//                $this->blogImageRepository->update([
//                        'image' => $image,
//                        'admin_id' => Auth::id()
//                    ],
//                );
//            }
//
//        }elseif(gettype($request["image"] === "string")){
//            $image = $this->createFile($request['image'], 'blog');
//            return $this->blogImageRepository->create(array_merge($request,
//                [
//                    'image' => $image,
//                    'blog_id' => $blog['id'],
//                    'admin_id' => Auth::id()
//                ]
//            ));
//        }
//    }
//
    /**
     * @param blog_image $blog_image
     * @return bool|null
     * @throws \Exception
     */

    public function delete(blog_image $blog_image)
    {
            return $this->blogImageRepository->delete($blog_image);
    }

}
