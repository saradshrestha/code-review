<?php

    namespace Dashboard\Repositories;

    interface DashboardInterface
    {
        public function index();
        public function passwordView($id);
        public function checkPassword($request);
        public function userPasswordSubmit($request);

    }
