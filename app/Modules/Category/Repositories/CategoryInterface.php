<?php

    namespace Category\Repositories;

    interface CategoryInterface
    {
        public function index();
        public function getCategories();
        public function create();
        public function store($request);
        public function show ($id);
        public function edit($id);
        public function update($request, $id);
        public function destroy($id);
        public function undoDelete($id);
        public function trashCategory();
        public function getTrashCategories();
        public function permanentDelete($id);
        public function statusUpdate( $request,$id);
    }
