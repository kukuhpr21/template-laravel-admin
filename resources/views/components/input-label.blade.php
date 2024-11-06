@props(['type', 'name', 'placeholder' => '', 'form' => false])
<x-label :name="$name" />
<x-input :type="$type" :name="$name" :placeholder="$placeholder" :form="$form"/>
