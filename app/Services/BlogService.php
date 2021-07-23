<?php


namespace App\Services;


use App\Http\Requests\Blog\UpdateRequest;
use App\Models\Blog;
use App\Repositories\BlogRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Request;

class BlogService
{
    /**
     * @var BlogRepository
     */
    protected BlogRepository $blogRepository;
    /**
     * @var BlogImageService
     */
    protected BlogImageService $blogImageService;

    /**
     * TeamService constructor.
     * @param BlogRepository $blogRepository
     * @param BlogImageService $blogImageService
     */

    public function __construct(BlogRepository $blogRepository, BlogImageService $blogImageService)
    {
        $this->blogRepository = $blogRepository;
        $this->blogImageService = $blogImageService;

    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model|null
     */
    public function get()
    {
        return $this->blogRepository->get();
    }

    /**
     * @param $filters
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model|null
     */

    public function show($filters = 2)
    {
        $filters = intval($filters);
        return $filters ? $this->blogRepository->get($filters) : null;
    }

    /**
     * @param $request
     */

    public function create($request)
    {
        $blog = $this->blogRepository->create($request,['link', 'title', 'description', 'view']);
        if ($blog->id && $request["image"] && !empty($request["image"])){
            $this->blogImageService->create($request, $blog);
        }
        return $blog;
    }

    /**
     * @param UpdateRequest $request
     * @param Blog $blog
     * @return Model
     */

    public function update(UpdateRequest $request,Blog $blog)
    {

            $updateBlog =  $this->blogRepository->update($request->all(), $blog);

//        if ($blog->id && $request["image"] && !empty($request["image"])){
//            $this->BlogImageService->update($request, $blog);
//        }

        return $updateBlog;
    }

    /**
     * @param Blog $blog
     * @return bool|null
     * @throws \Exception
     */

    public function delete(Blog $blog)
    {
            return $this->blogRepository->delete($blog);
    }

}
