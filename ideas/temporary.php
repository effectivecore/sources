<?php

namespace effcore;

class temporary {

    function validation_cache_date_get($format = 'Y-m-d') {
        $timestmp = static::validation_id_extract_created($this->validation_id);
        return \DateTime::createFromFormat('U', $timestmp)->format($format);
    }

    protected function validation_cache_select()       {return temporary::select('validation-'.$this->validation_id,         'validation/'.$this->validation_cache_date_get().'/') ?: [];}
    protected function validation_cache_update($cache) {return temporary::update('validation-'.$this->validation_id, $cache, 'validation/'.$this->validation_cache_date_get().'/');}
    protected function validation_cache_delete()       {return temporary::delete('validation-'.$this->validation_id,         'validation/'.$this->validation_cache_date_get().'/');}

}
