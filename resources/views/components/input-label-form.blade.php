@props(['type', 'name', 'placeholder' => ''])
<x-label-form :name="$name" />
<x-input :type="$type" :name="$name" :placeholder="$placeholder" />
