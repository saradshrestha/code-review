<?php

    namespace Post\Repositories;

    interface PostInterface
    {
        public function index();
        public function getPosts();
        public function show($id);
        public function create();
        public function store($request);
        public function edit($id);
        public function update($request, $id);
        public function destroy($id);
        public function undoDelete($id);
        public function trashPost();
        public function getTrashPosts();
        public function permanentDelete($id);
        public function statusUpdate($request, $id);
        public function publishUpdate($request, $id);
        public function filterByDate($request);
    }
