<?php

namespace Interfaces;

interface Content {
    public function getOne();
    public function getAll();
    public function create();
    public function update();
    public function delete();
}