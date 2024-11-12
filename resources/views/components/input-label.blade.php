@props(['type', 'name', 'placeholder' => '', 'form' => false, 'value' => ''])
<x-label :name="$name" />
<x-input :type="$type" :name="$name" :placeholder="$placeholder" :form="$form" :value="$value"/>
