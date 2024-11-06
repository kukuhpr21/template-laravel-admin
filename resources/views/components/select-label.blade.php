@props(['name', 'val_default_select' => '', 'selected' => '', 'items', 'form' => false])
<x-label :name="$name" />
<x-select :name="$name" :val_default_select="$val_default_select" :select="$selected" :items="$items" :form="$form" />
