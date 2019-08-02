<?php

namespace App\Repositories\Category;

use App\Category;
use DB;
use App\Music;
use App\Repositories\BaseRepository;
use Illuminate\Database\DatabaseManager;
/**
 * Class BaseRepository
 *
 * @package App\Repositories
 */
class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    /**
     * @var Category
     */
    protected $model;

    /**
     * UserRepository constructor.
     *
     * @param Category $model
     */

    public function getModel()
    {
        return Category::class;
    }

    public function deleteCategory($id)
    {
        try {
            DB::beginTransaction();
            $category = $this->model->findOrFail($id);

            $musics = $category->musics()->get();
            foreach ($musics as $music) {
                $category->musics()->detach($music->id);
                $music->albums()->detach($music->id);
                Music::where('id', $music->id)->delete();
            }// xoa music lien quan

            $category->delete();

            DB::commit();
            } catch (Exception $e) {
                DB::rollBack();
        
                throw new Exception($e->getMessage());
            } 
    }
}
