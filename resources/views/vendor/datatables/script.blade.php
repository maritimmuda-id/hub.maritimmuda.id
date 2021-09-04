@php
    $namespace = config('datatables-html.namespace', 'LaravelDataTables');
@endphp

$(function(){window.{{ $namespace }}=window.{{ $namespace }}||{};window.{{ $namespace }}["%1$s"]=$("#%1$s").DataTable(%2$s);});
