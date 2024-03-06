<?php

namespace effcore;

$gallery_main = new Instance('gallery', ['id' => 'main']);
if ($gallery_main->select()) {
    print Storage_Data::data_to_text($gallery_main->items, 'items');
}