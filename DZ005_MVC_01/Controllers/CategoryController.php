<?php


class CategoryController extends Controller
{
    public function index()
    {
        $groups = Category::all();
        $data['categories'] = $groups;
        self::CreateView('CategoryIndexView', $data);
    }

    public function create()
    {
        $authors = Author::all();
        $data['authors'] = $authors;
        self::CreateView('CategoryAddView', $data);
    }


    public function store($request)
    {
        Category::save($request['aid'], $request['category_name'],$request['category_info'],$request['category_type']);
        $this->index();
    }

    public function edit($req)
    {
        $authors = Author::all();
        $category = Category::find($req['category_id']);
        $data['authors'] = $authors;
        $data['category'] = $category;
        self::CreateView('CategoryEditView', $data);
    }


    public function update($request)
    {

        Category::update($request['category_id'],$request['aid'], $request['category_name'],$request['category_info'],$request['category_type']);

        $this->edit(['category_id' => $request['category_id']]);
    }

    public function delete($request)
    {
        Category::delete($request['category_id']);
        $this->index();
    }
}