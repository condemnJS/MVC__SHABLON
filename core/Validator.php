<?php

namespace Core;

use Core\Traits\TraitCheckFields; 

class Validator {

    use TraitCheckFields;

    public $appRules;
    public $requests;
    public $errors;

    static public function make(array $requests, array $rules) {
        $validator = new self;
        $validator->errors = $validator->check($requests, $rules);
        return $validator;
    }

    private function check($requests, $rules) {
        $this->requests = $requests;
        $this->appRules = array_map(function ($item) {
            if(is_string($item)) {
                $item = explode('|', $item);
            }
            return $item;
        }, $rules);
        foreach ($this->appRules as $field => $rule) {
            foreach ($rule as $func) {
                if(stripos($func, ':')) {
                    $colon = explode(':', $func);
                    $func = $colon[0];
                    $this->$func($field, $colon[1]);
                } else {
                    $this->$func($field);
                }
            }
        }
        return $this->response;
    }

    public function validate() {
        $errors = $this->errors;
        Session::set('errors', $errors);
        if($errors) {
            return back();  
        }
    }

    private function replacer($function, $value) {
        $this->messages[$function] = str_replace(":attr", $value, $this->messages[$function]);
    }
}