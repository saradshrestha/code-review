<?php

    namespace Image\Repositories;

    interface ImageInterface
    {
        public function imagesStore($imageNames, $id);

        public function imagesDelete($id);
    }
