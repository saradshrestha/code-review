<?php

    namespace Cart\Repositories;

    interface CartInterface
    {
        public function index();

        public function getCart();

        public function store($request);

        public function getAllCart();

        public function update($request);

        public function destroy($request);

    }
