<?php

    namespace User\Repositories;

    interface UserInterface
    {
        public function index();
        public function getUsers();
        public function create();
        public function store($request);
        public function edit($id);
        public function update($request, $id);
        public function destroy($id);
        public function undoDelete($id);
        public function trashUser();
        public function getTrashUsers();
        public function permanentDelete($id);
        public function statusUpdate($request,$id);
        public function changePassword($id);
        public function passwordSubmit($request,$id);

    }
