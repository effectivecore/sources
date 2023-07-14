<?php

namespace effcore;

$gallery_main = new Instance('gallery', ['id' => 'main']);
if ($gallery_main->select()) {
    print Storage_Nosql_data::data_to_text($gallery_main->attributes, 'attributes').NL;
    print Storage_Nosql_data::data_to_text($gallery_main->items,      'items');
}

$page = new Instance('page', ['id' => 'gallery']);
if ($page->select()) {
    print Storage_Nosql_data::data_to_text($page->blocks['content']);
}
