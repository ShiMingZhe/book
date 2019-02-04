<?php
/**
 * Created by PhpStorm.
 * User: shimingzhe
 * Date: 2018/12/31
 * Time: 10:39 PM
 */

namespace App\Http\Controllers\MiniProgram;


use App\Http\Controllers\Controller;
use App\Models\Knowledges;
use App\Models\MiniModels\OuterBrandKnowledges;
use App\Units\CommonFunctions;
use Illuminate\Support\Facades\Input;

class OuterKnowledgeController extends Controller
{
    /**
     * 侧边栏目
     */
    public function list()
    {
        $knowledges = Knowledges::get();
        foreach ($knowledges as $knowledge) {
            if ($knowledge->category == 1) {
                $knowledge->category = '免费';
            } elseif($knowledge->category == 2) {
                $knowledge->category = '人气';
            } elseif($knowledge->category == 3) {
                $knowledge->category = '精选';
            } else {
                $knowledge->category = '未知';
            }
        }

        return view('admin.knowledge.index', ['knowledges' => $knowledges]);
    }

    /**
     * 新增知识付费项目
     */
    public function createKnowledge()
    {
        return view('admin.knowledge.knowledge_editor');
    }

    /**
     * 保存知识付费项目
     */
    public function storageKnowledge()
    {
        $input = Input::except(['_token']);
        $data = [
            'name' => $input['name'],
            'category' => $input['category'],
            'price' => $input['price'],
            'content' => $input['content'],
            'origin' => $input['origin'],
        ];
        $knowledge = Knowledges::create($data);
        if ($knowledge) {
            return redirect('/outer/knowledge/index');
        } else {
            return redirect('/outer/knowledge/create');
        }
    }

    /**
     * 知识付费管理编辑
     */
    public function editorKnowledge()
    {
        $knowledgeId = \Route::input('knowledgeId');
        $knowledge = Knowledges::where('id', $knowledgeId)->first();

        return view('admin.knowledge.knowledge_editor', ['knowledge' => $knowledge]);
    }

    /**
     * 更新知识付费管理
     */
    public function updateKnowledge()
    {
        $input = Input::except(['_token']);
        $data = [
            'name' => $input['name'],
            'category' => $input['category'],
            'price' => $input['price'],
            'content' => $input['content'],
            'origin' => $input['origin'],
        ];
        $knowledge = Knowledges::where('id', $input['id'])->update($data);
        if ($knowledge) {
            return redirect('/outer/knowledge/index');
        } else {
            return redirect('/outer/knowledge/editor/'.$input['id']);
        }
    }

    /**
     * 内部更加知识id查询
     */
    public function findKnowledge()
    {
        $knowledgeId = \Route::input('knowledgeId');
        $knowledge = Knowledges::where('id', $knowledgeId)->first();

        return view('admin.knowledge.knowledge_content', ['knowledge' => $knowledge]);
    }

    public function index()
    {
        $knowledges = Knowledges::get();
        foreach ($knowledges as $knowledge) {
            $bind = OuterBrandKnowledges::where('id', $knowledge->id)->first();
            if ($bind) {
                if ($bind->status == '1') {
                    $knowledge->status = '1';
                } else {
                    $knowledge->status = '0';
                }
            } else {
                $knowledge->status = '0';
            }
            if ($knowledge->category == 1) {
                $knowledge->category = '免费';
            } elseif($knowledge->category == 2) {
                $knowledge->category = '人气';
            } elseif($knowledge->category == 3) {
                $knowledge->category = '精选';
            } else {
                $knowledge->category = '未知';
            }
        }

        return view('miniprogram.knowledge.index', ['knowledges' => $knowledges]);
    }

    /**
     * 外部更加知识id查询
     */
    public function findOuterKnowledge()
    {
        $knowledgeId = \Route::input('knowledgeId');
        $knowledge = Knowledges::where('id', $knowledgeId)->first();

        return view('miniprogram.knowledge.knowledge_content', ['knowledge' => $knowledge]);
    }

    public function bindBrandKnowledge()
    {
        $brandId = CommonFunctions::getBrandId(CommonFunctions::getBrandUserId());
        $knowledgeId = \Route::input('knowledgeId');
        $data = [
            'brand_id' => $brandId,
            'knowledge_id' => $knowledgeId,
        ];
        $bind = OuterBrandKnowledges::where('brand_id', $brandId)->where('knowledge_id', $knowledgeId)->first();
        if ($bind) {
            OuterBrandKnowledges::where('brand_id', $brandId)->where('knowledge_id', $knowledgeId)->update(['status' => '1']);
            return redirect('/outer/knowledge/list');
        } else {
            $createBind = OuterBrandKnowledges::create($data);
            if ($createBind) {
                return redirect('/outer/knowledge/list');
            }
        }
    }

    /**
     * 取消绑定
     */
    public function cancelBindBrandKnowledge()
    {
        $brandId = CommonFunctions::getBrandId(CommonFunctions::getBrandUserId());
        $knowledgeId = \Route::input('knowledgeId');
        OuterBrandKnowledges::where('brand_id', $brandId)->where('knowledge_id', $knowledgeId)->update(['status' => '0']);

        return redirect('/outer/knowledge/list');
    }
}