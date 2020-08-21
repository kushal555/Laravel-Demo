<?php

function  flash($type,$message){
    session()->flash('alert-class',$type);
    session()->flash('message',$message);
}
