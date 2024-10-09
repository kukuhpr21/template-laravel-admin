@props(['type', 'name', 'placeholder' => ''])
<x-label :name="$name" />
<x-input :type="$type" :name="$name" :placeholder="$placeholder" />
