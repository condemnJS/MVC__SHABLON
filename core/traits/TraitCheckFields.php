<?php

namespace Core\Traits;

trait TraitCheckFields {

    public $response;


    public $messages = [
        'required' => 'Это поле обязательное',
        'email' => 'Неверный формат email',
        'confirm' => 'Пароли не совпадают',
        'min' => 'Длина поля должна быть минимум :attr символов'
    ];
    private function required($field) {
        if(empty($this->requests[$field])) {
            $this->response[$field][] = $this->messages[__FUNCTION__];
        }
    }

    private function email($field) {
        if(!preg_match('/^((([0-9A-Za-z]{1}[-0-9A-z\.]{1,}[0-9A-Za-z]{1})|([0-9А-Яа-я]{1}[-0-9А-я\.]{1,}[0-9А-Яа-я]{1}))@([-A-Za-z]{1,}\.){1,2}[-A-Za-z]{2,})$/u', $this->requests[$field])) {
            $this->response[$field][] = $this->messages[__FUNCTION__];
        }
    }

    private function confirm($field) {
        if($this->requests[$field] !== $this->requests['password_confirmation']) {
            $this->response[$field][] = $this->messages[__FUNCTION__];
        }
    }

    private function min($field, $num) {
        $this->replacer(__FUNCTION__, $num);
        if(mb_strlen($this->requests[$field]) < $num) {
            $this->response[$field][] = $this->messages[__FUNCTION__];
        }
    }

}